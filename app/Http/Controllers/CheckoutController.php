<?php
namespace dungthinh\Http\Controllers;

use dungthinh\Http\Controllers\Controller;
use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\PaymentExecution;
use PayPal\Api\Transaction;
use Session;
use Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Validator;
use dungthinh\Models\Post;
use dungthinh\Models\PostExtra;
use dungthinh\Models\Product;
use dungthinh\Models\ProductExtra;
use dungthinh\Models\OrdersItem;
use dungthinh\Models\VendorOrder;
use dungthinh\Models\VendorTotal;
use dungthinh\Models\Role;
use Anam\Phpcart\Cart;
use dungthinh\Models\UsersCustomDesign;
use Illuminate\Support\Facades\Cache;
use dungthinh\Library\GetFunction;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Input;
use dungthinh\Library\CommonFunction;
use dungthinh\Http\Controllers\OptionController;
use Illuminate\Support\Facades\App;
use dungthinh\Library\TwocheckoutLib\Twocheckout;
use dungthinh\Library\TwocheckoutLib\Twocheckout\Twocheckout_Charge;

class CheckoutController extends Controller
{
  private $_api_context;
  public $settingsData   = array();
  public $classGetFunction;
  public $checkoutData   = array() ;
  public $cart;
  public $cartBuy;
  public $classCommonFunction;
  public $cartObject;
  public $env;
  public $nexmo_data;
  
  public function __construct()
  {
    $this->cart = new Cart('gio-hang');
    $this->cartBuy = new Cart('thanh-toan');
    $this->classGetFunction     =  new GetFunction();
    $this->classCommonFunction  = new CommonFunction();
    $option  =  new OptionController();
    
    // setup PayPal api context
    $paypal_conf = $this->classGetFunction->getPaypalConfig();

    $this->_api_context = new ApiContext(new OAuthTokenCredential($paypal_conf['client_id'], $paypal_conf['secret']));
    $this->_api_context->setConfig($paypal_conf['settings']);

    $this->settingsData   =  $option->getSettingsData();
    $this->cartObject     =  $this->cartBuy->getItems()->toArray();
    $this->env = App::environment();
    $this->nexmo_data = get_nexmo_data();
  }
  
  /**
   * 
   *Checkout process 
   *
   * @param null
   * @return void
   */
  
  public function doCheckoutProcess(){
    $data = Input::all();

    if( Request::isMethod('post') && isset($data['empty_cart']) && $data['empty_cart'] == 'empty_cart' && Session::token() == Input::get('_token')){
      $this->cartBuy->clear();
      return redirect()->back();
    }
    elseif( Request::isMethod('post') && isset($data['update_cart']) && $data['update_cart'] == 'update_cart' && Session::token() == Input::get('_token')){
      if(count($data['cart_quantity']) > 0){
        foreach($data['cart_quantity'] as $key => $qty){
          $this->cartBuy->updateQty($key, $qty);
        }
      }
      return redirect()->back();
    }
    elseif( Request::isMethod('post') && isset($data['checkout_proceed']) && $data['checkout_proceed'] == 'checkout_proceed' && Session::token() == Input::get('_token')){
      
      // return response()->json($data);

      if(!empty($this->cartBuy->getItems())){
        foreach($this->cartBuy->getItems() as $items){
          if($items->variation_id && count($items->options) > 0){
            $variation_product_data = $this->classCommonFunction->get_variation_and_data_by_post_id( $items->variation_id );
            if($variation_product_data['_variation_post_price'] == 0){
              Session::flash('message', Lang::get('frontend.sorry_label') .' '. get_product_title($variation_product_data['parent_id']) .' '. Lang::get('frontend.price_zero_validation'));
              $this->cartBuy->clear();
              return redirect()->back();
            }

            if($variation_product_data['_variation_post_manage_stock'] == 1){
              if(isset($this->cartBuy->get($items->id)->quantity)){
               $cat_qty = $this->cartBuy->get($items->id)->quantity;

               if($variation_product_data['_variation_post_back_to_order'] == 'variation_not_allow' && $variation_product_data['_variation_post_manage_stock_qty'] >0 && $cat_qty > $variation_product_data['_variation_post_manage_stock_qty']){
                 Session::flash('message', Lang::get('frontend.sorry_label') .' '.get_product_title($variation_product_data['parent_id']) .' '. Lang::get('frontend.stock_validation'));
                 $this->cartBuy->clear();
                 return redirect()->back();
               }
              }
            }
          }
          else{
            $product_data = $this->classCommonFunction->get_product_data_by_product_id( $items->id );
          
            if($product_data['product_manage_stock'] == 'yes'){
              if(isset($this->cartBuy->get($items->id)->quantity)){
               $cat_qty = $this->cartBuy->get($items->id)->quantity;
       
               if($product_data['product_stock_back_to_order'] == 'not_allow' && $product_data['product_manage_stock_qty'] >0 && $cat_qty > $product_data['product_manage_stock_qty']){
                 Session::flash('message', Lang::get('frontend.sorry_label') .' '.$product_data['post_title'] .' '. Lang::get('frontend.stock_validation'));
                 $this->cartBuy->clear();
                 return redirect()->back();
               }
              }
            }
          }
        }
        
        if(Input::get('payment_option') === 'stripe' && !Input::has('stripeToken')){
          Session::flash('message', Lang::get('validation.stripe_required_msg'));
          return redirect()->back();
        }
								
        if(Input::get('payment_option') === '2checkout' && !Input::has('twoCheckoutToken')){
          Session::flash('message', Lang::get('validation.twocheckout_required_msg'));
          return redirect()->back();
        }
								
        $checkout_user = '';
        if( (isset($data['user_checkout_complete_type']) && $data['user_checkout_complete_type'] == 'login_user') || ( isset($data['selected_user_mode']) && $data['selected_user_mode'] == 'login_user' ) || ( isset($data['is_user_login']) && $data['is_user_login'] == true ) ){
          $checkout_user = 'login';
        }
        else{
          $checkout_user = 'guest';
        }
        
        //if login user do not have address, it will redirect to back
        if(!empty($checkout_user) && $checkout_user == 'login' && Session::has('dt_frontend_user_id')){
          $get_data_by_user_id     =  get_user_account_details_by_user_id( Session::get('dt_frontend_user_id') );
          $get_array_shift_data    =  array_shift($get_data_by_user_id);
          $user_account_parse_data =  json_decode($get_array_shift_data['details']);
          
          if(empty($user_account_parse_data) && empty($user_account_parse_data->address_details)){
            return redirect()-> back();
          }
        }
        
        if(!empty($checkout_user) && $checkout_user == 'guest'){
          $rules = [
                 'account_bill_first_name'                =>  'required',
                 'account_bill_last_name'                 =>  'required',
                 'account_bill_email_address'             =>  'required|email',
                 'account_bill_phone_number'              =>  'required',
                 'account_bill_select_country'            =>  'required',
                 'account_bill_select_state'              =>  'required',
                 'account_bill_select_city'               =>  'required',
                 'account_bill_adddress_line_1'           =>  'required',
                 ];
          
          $get_shipping_status = Input::get('different_shipping_address');

          if(isset($get_shipping_status) && $get_shipping_status == 'different_address'){
            $rules['account_shipping_first_name']         = 'required';
            $rules['account_shipping_last_name']          = 'required';
            $rules['account_shipping_email_address']      = 'required|email';
            $rules['account_shipping_phone_number']       = 'required';
            $rules['account_shipping_select_country']     = 'required';
            $rules['account_shipping_select_state']       = 'required';
            $rules['account_shipping_select_city']       = 'required';
            $rules['account_shipping_adddress_line_1']    = 'required';
          }
          
          $messages = [
                'account_bill_first_name.required' => Lang::get('validation.billing_fill_first_name_field'),
                'account_bill_last_name.required' => Lang::get('validation.billing_fill_last_name_field'),
                'account_bill_email_address.required' => Lang::get('validation.billing_fill_email_field'),
                'account_bill_email_address.email' => Lang::get('validation.billing_fill_valid_email_field'),
                'account_bill_phone_number.required' => Lang::get('validation.billing_fill_phone_number_field'),
                'account_bill_select_country.required' => Lang::get('validation.billing_country_name_field'),
                'account_bill_select_state.required' => Lang::get('validation.billing_fill_state_name_field'),
                'account_bill_select_city.required' => Lang::get('validation.billing_fill_town_city_field'),
                'account_bill_adddress_line_1.required' => Lang::get('validation.billing_address_line_1_field'),
              ];
          
          if(isset($get_shipping_status) && $get_shipping_status == 'different_address'){
            $messages['account_shipping_first_name.required'] = Lang::get('validation.shipping_fill_first_name_field');
            $messages['account_shipping_last_name.required'] = Lang::get('validation.shipping_fill_last_name_field');
            $messages['account_shipping_email_address.required'] = Lang::get('validation.shipping_fill_email_field');
            $messages['account_shipping_email_address.email'] = Lang::get('validation.shipping_fill_valid_email_field');
            $messages['account_shipping_phone_number.required'] = Lang::get('validation.shipping_fill_phone_number_field');
            $messages['account_shipping_select_country.required'] = Lang::get('validation.shipping_country_name_field');
            $messages['account_shipping_select_state.required'] = Lang::get('validation.shipping_fill_state_name_field');
            $messages['account_shipping_select_city.required'] = Lang::get('validation.shipping_fill_city_name');
            $messages['account_shipping_adddress_line_1.required'] = Lang::get('validation.shipping_address_line_1_field');
          }
        }
      
        $rules['payment_option']  = 'required';
        $messages['payment_option.required']  =  Lang::get('validation.fill_payment_gateway');
        
        if(Input::get('payment_option') === 'stripe' && Input::has('stripeToken')){
          $rules['stripeToken']  = 'required';
          $messages['stripeToken.required']  =  Lang::get('validation.stripe_required_msg');
        }
								
        if(Input::get('payment_option') === '2checkout' && Input::has('twoCheckoutToken')){
          $rules['twoCheckoutToken']  = 'required';
          $messages['twoCheckoutToken.required']  =  Lang::get('validation.twocheckout_required_msg');
        }
      
        $validator = Validator::make(Input::all(), $rules, $messages);
      
        if($validator->fails()){
          return redirect()-> back()
          ->withInput()
          ->withErrors( $validator );
        }
        elseif($validator->passes())
        {
          if(!empty($checkout_user) && $checkout_user == 'guest'){
            // $shipping_title                 =   Input::get('account_bill_title');
            $shipping_first_name            =   Input::get('account_bill_first_name');
            $shipping_last_name             =   Input::get('account_bill_last_name');
            // $shipping_company_name          =   Input::get('account_bill_company_name');
            $shipping_email_address         =   Input::get('account_bill_email_address');
            $shipping_phone_number          =   Input::get('account_bill_phone_number');
            // $shipping_fax_number            =   Input::get('account_bill_fax_number');
            $shipping_select_country        =   Input::get('account_bill_select_country');
            $shipping_select_state          =   Input::get('account_bill_select_state');
            $shipping_select_city           =   Input::get('account_bill_select_city');
            $shipping_adddress_line_1       =   Input::get('account_bill_adddress_line_1');
            // $shipping_address_line_2        =   Input::get('account_bill_adddress_line_2');
            
            if(isset($get_shipping_status) && $get_shipping_status == 'different_address'){
              // $shipping_title                 =   Input::get('account_shipping_title');
              $shipping_first_name            =   Input::get('account_shipping_first_name');
              $shipping_last_name             =   Input::get('account_shipping_last_name');
              // $shipping_company_name          =   Input::get('account_shipping_company_name');
              $shipping_email_address         =   Input::get('account_shipping_email_address');
              $shipping_phone_number          =   Input::get('account_shipping_phone_number');
              // $shipping_fax_number            =   Input::get('account_shipping_fax_number');
              $shipping_select_country        =   Input::get('account_shipping_select_country');
              $shipping_select_state          =   Input::get('account_shipping_select_state');
              $shipping_select_city           =   Input::get('account_shipping_select_city');
              $shipping_adddress_line_1       =   Input::get('account_shipping_adddress_line_1');
              // $shipping_address_line_2        =   Input::get('account_shipping_adddress_line_2');
            }
            
            // $this->checkoutData['billing_title']              =   Input::get('account_bill_title');
            $this->checkoutData['bill_first_name']            =   Input::get('account_bill_first_name');
            $this->checkoutData['bill_last_name']             =   Input::get('account_bill_last_name');
            // $this->checkoutData['bill_company_name']          =   Input::get('account_bill_company_name');
            $this->checkoutData['bill_email_address']         =   Input::get('account_bill_email_address');
            $this->checkoutData['bill_phone_number']          =   Input::get('account_bill_phone_number');
            // $this->checkoutData['bill_fax_number']            =   Input::get('account_bill_fax_number');
            $this->checkoutData['bill_select_country']        =   Input::get('account_bill_select_country');
            $this->checkoutData['bill_select_state']          =   Input::get('account_bill_select_state');
            $this->checkoutData['bill_select_city']           =   Input::get('account_bill_select_city');
            $this->checkoutData['bill_adddress_line_1']       =   Input::get('account_bill_adddress_line_1');
            // $this->checkoutData['bill_address_line_2']        =   Input::get('account_bill_adddress_line_2');
            
            // $this->checkoutData['shipping_title']              =   $shipping_title;
            $this->checkoutData['shipping_first_name']         =   $shipping_first_name;
            $this->checkoutData['shipping_last_name']          =   $shipping_last_name;
            // $this->checkoutData['shipping_company_name']       =   $shipping_company_name;
            $this->checkoutData['shipping_email_address']      =   $shipping_email_address;
            $this->checkoutData['shipping_phone_number']       =   $shipping_phone_number;
            // $this->checkoutData['shipping_fax_number']         =   $shipping_fax_number;
            $this->checkoutData['shipping_select_country']     =   $shipping_select_country;
            $this->checkoutData['shipping_select_state']      =   $shipping_select_state;
            $this->checkoutData['shipping_select_city']       =   $shipping_select_city;
            $this->checkoutData['shipping_adddress_line_1']    =   $shipping_adddress_line_1;
            // $this->checkoutData['shipping_address_line_2']     =   $shipping_address_line_2;
          }
          
          $this->checkoutData['payment_method']             =   Input::get('payment_option');
          $this->checkoutData['payment_method_title']       =   Input::get('payment_option');
          $this->checkoutData['order_note']                 =   Input::get('checkout_order_extra_message');
          $this->checkoutData['user_mode']                  =   $checkout_user;  
          
          if(Session::get('checkout_post_details')){
            Session::forget('checkout_post_details');
            Session::put('checkout_post_details', json_encode($this->checkoutData));
          }
          else{
            Session::put('checkout_post_details', json_encode($this->checkoutData));
          }
          
          $email_options = get_emails_option_data();
          
          if(Input::get('payment_option') === 'bacs' || Input::get('payment_option') === 'cod' ){
            $mailData = array();
            $adminMailData = array();
            $order_id = $this->save_checkout_data();
            
            $adminMailData['source']           =   'admin_order_confirmation';
            $adminMailData['data']             =   array('order_id' => $order_id['order_id']);

            if($order_id['order_id'] > 0 && $this->env === 'production'){
              $this->classGetFunction->sendCustomMail( $adminMailData );
            }
            
            if(isset($email_options['new_order']['enable_disable']) && $email_options['new_order']['enable_disable'] == true){
              //load mailData Array
              $mailData['source']           =   'order_confirmation';
              $mailData['data']             =   array('order_id' => $order_id['order_id']);

              if($order_id['order_id'] > 0 && $this->env === 'production'){
                $this->classGetFunction->sendCustomMail( $mailData );
              }
            }
            
            if($this->nexmo_data['enable_nexmo_option'] == true){
              $this->classCommonFunction->sendSMSToAdmin();
            }

            return \Redirect::route('frontend-order-received', array('order_id' => $order_id['order_id'], 'order_key' => $order_id['process_id']));
          }
          elseif(Input::get('payment_option') === 'vnpay'){

            $vnp_Amount = $this->cartBuy->getTotal() * 100;


            // return response()->json($vnp_Amount);

            $order_id = $this->save_checkout_data();

            $vnp_TmnCode = "ZGOVKSHZ"; //Mã website tại VNPAY 
            $vnp_HashSecret = "LYQSHBHMXGPPIFXKOBMGMPZJIJGQXMRR"; //Chuỗi bí mật
            $vnp_Url = "http://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
            $vnp_Returnurl = "https://hatinhtrade.com.vn/vnpay_php/vnpay_return.php";

            $vnp_TxnRef = $order_id['order_id']; //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
            
            // $vnp_OrderInfo = $_POST['order_desc'];
            // $vnp_OrderType = $_POST['order_type'];
            // $vnp_Amount = $_POST['amount'] * 100;
            // $vnp_Locale = $_POST['language'];
            // $vnp_BankCode = $_POST['bank_code'];

            $vnp_OrderInfo = "Thanh toán hóa đơn phí dich vụ";
            $vnp_OrderType = 'billpayment';
            // $vnp_Amount = $this->cartBuy->getTotal() * 100;
            $vnp_Locale = 'vn';
            $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];

            $inputData = array(
                "vnp_Version" => "2.0.0",
                "vnp_TmnCode" => $vnp_TmnCode,
                "vnp_Amount" => $vnp_Amount,
                "vnp_Command" => "pay",
                "vnp_CreateDate" => date('YmdHis'),
                "vnp_CurrCode" => "VND",
                "vnp_IpAddr" => $vnp_IpAddr,
                "vnp_Locale" => $vnp_Locale,
                "vnp_OrderInfo" => $vnp_OrderInfo,
                "vnp_OrderType" => $vnp_OrderType,
                "vnp_ReturnUrl" => $vnp_Returnurl,
                "vnp_TxnRef" => $vnp_TxnRef,
            );

            if (isset($vnp_BankCode) && $vnp_BankCode != "") {
                $inputData['vnp_BankCode'] = $vnp_BankCode;
            }
            ksort($inputData);
            $query = "";
            $i = 0;
            $hashdata = "";
            foreach ($inputData as $key => $value) {
                if ($i == 1) {
                    $hashdata .= '&' . $key . "=" . $value;
                } else {
                    $hashdata .= $key . "=" . $value;
                    $i = 1;
                }
                $query .= urlencode($key) . "=" . urlencode($value) . '&';
            }

            $vnp_Url = $vnp_Url . "?" . $query;
            if (isset($vnp_HashSecret)) {
              // $vnpSecureHash = md5($vnp_HashSecret . $hashdata);
                $vnpSecureHash = hash('sha256', $vnp_HashSecret . $hashdata);
                $vnp_Url .= 'vnp_SecureHashType=SHA256&vnp_SecureHash=' . $vnpSecureHash;
            }

            return \Redirect::away($vnp_Url);


          }
          elseif(Input::get('payment_option') === 'paypal'){
            //process items
            $payer = new Payer();
            $payer->setPaymentMethod('paypal');

            $items_ary = array();
            if($this->cartBuy->getItems() && $this->cartBuy->getItems()->count()>0)
            {
              foreach($this->cartBuy->getItems() as $items)
              {
                $itemObj = new Item();
                $itemObj->setName( $items->name )
                        ->setCurrency( get_frontend_selected_currency() ) 
                        ->setQuantity( $items->quantity )
                        ->setPrice( $items->price );

                array_push($items_ary, $itemObj);
              }
            }

            //amount details
            $amount_details = new Details();
            $amount_details-> setSubtotal( $this->cartBuy->getTotal() )
                           -> setShipping( $this->cartBuy->getShippingCost() ) 
                           -> setTax( $this->cartBuy->getTax() ) ;

            // add item to list
            $item_list = new ItemList();
            $item_list->setItems( $items_ary );

            //to ammount 
            $amount = new Amount();
            $amount->setCurrency( get_frontend_selected_currency() )
                   ->setTotal( $this->cartBuy->getCartTotal() )
                   ->setDetails( $amount_details );

            //transaction
            $transaction = new Transaction();
            $transaction->setAmount($amount)
                        ->setItemList($item_list)
                        ->setDescription('Your transaction description');

            $redirect_urls = new RedirectUrls();
            $redirect_urls->setReturnUrl(URL::route('payment.status'))
                          ->setCancelUrl(URL::route('payment.status'));    

            $payment = new Payment();
            $payment->setIntent('Sale')
                    ->setPayer($payer)
                    ->setRedirectUrls($redirect_urls)
                    ->setTransactions(array($transaction));

            try 
            {
              $payment->create($this->_api_context);
            } 
            catch (\PayPal\Exception\PPConnectionException $ex) 
            {
              if (\Config::get('app.debug')) {
                  echo "Exception: " . $ex->getMessage() . PHP_EOL;
                  $err_data = json_decode($ex->getData(), true);
                  exit;
              } else {
                  die('Some error occur, sorry for inconvenient');
              }
            }

            foreach($payment->getLinks() as $link) {
              if($link->getRel() == 'approval_url') {
                  $redirect_url = $link->getHref();
                  break;
              }
            }

            Session::put('paypal_payment_id', $payment->getId());

            if(isset($redirect_url)) {
              // redirect to paypal
              return \Redirect::away($redirect_url);
            }

            return \Redirect::route('cart-page');
          }
        }
      }
    }
  }

  public function doCheckoutProcess_bk(){
    $data = Input::all();
            
    if( Request::isMethod('post') && isset($data['empty_cart']) && $data['empty_cart'] == 'empty_cart' && Session::token() == Input::get('_token')){
      $this->cartBuy->clear();
      return redirect()->back();
    }
    elseif( Request::isMethod('post') && isset($data['update_cart']) && $data['update_cart'] == 'update_cart' && Session::token() == Input::get('_token')){
      if(count($data['cart_quantity']) > 0){
        foreach($data['cart_quantity'] as $key => $qty){
          $this->cartBuy->updateQty($key, $qty);
        }
      }
      return redirect()->back();
    }
    elseif( Request::isMethod('post') && isset($data['checkout_proceed']) && $data['checkout_proceed'] == 'checkout_proceed' && Session::token() == Input::get('_token')){
      
      if(!empty($this->cartBuy->getItems())){
        foreach($this->cartBuy->getItems() as $items){
          if($items->variation_id && count($items->options) > 0){
            $variation_product_data = $this->classCommonFunction->get_variation_and_data_by_post_id( $items->variation_id );
            if($variation_product_data['_variation_post_price'] == 0){
              Session::flash('message', Lang::get('frontend.sorry_label') .' '. get_product_title($variation_product_data['parent_id']) .' '. Lang::get('frontend.price_zero_validation'));
              $this->cartBuy->clear();
              return redirect()->back();
            }

            if($variation_product_data['_variation_post_manage_stock'] == 1){
              if(isset($this->cartBuy->get($items->id)->quantity)){
               $cat_qty = $this->cartBuy->get($items->id)->quantity;

               if($variation_product_data['_variation_post_back_to_order'] == 'variation_not_allow' && $variation_product_data['_variation_post_manage_stock_qty'] >0 && $cat_qty > $variation_product_data['_variation_post_manage_stock_qty']){
                 Session::flash('message', Lang::get('frontend.sorry_label') .' '.get_product_title($variation_product_data['parent_id']) .' '. Lang::get('frontend.stock_validation'));
                 $this->cartBuy->clear();
                 return redirect()->back();
               }
              }
            }
          }
          else{
            $product_data = $this->classCommonFunction->get_product_data_by_product_id( $items->id );
          
            if($product_data['product_manage_stock'] == 'yes'){
              if(isset($this->cartBuy->get($items->id)->quantity)){
               $cat_qty = $this->cartBuy->get($items->id)->quantity;
       
               if($product_data['product_stock_back_to_order'] == 'not_allow' && $product_data['product_manage_stock_qty'] >0 && $cat_qty > $product_data['product_manage_stock_qty']){
                 Session::flash('message', Lang::get('frontend.sorry_label') .' '.$product_data['post_title'] .' '. Lang::get('frontend.stock_validation'));
                 $this->cartBuy->clear();
                 return redirect()->back();
               }
              }
            }
          }
        }
        
        if(Input::get('payment_option') === 'stripe' && !Input::has('stripeToken')){
          Session::flash('message', Lang::get('validation.stripe_required_msg'));
          return redirect()->back();
        }
								
        if(Input::get('payment_option') === '2checkout' && !Input::has('twoCheckoutToken')){
          Session::flash('message', Lang::get('validation.twocheckout_required_msg'));
          return redirect()->back();
        }
								
        $checkout_user = '';
        if( (isset($data['user_checkout_complete_type']) && $data['user_checkout_complete_type'] == 'login_user') || ( isset($data['selected_user_mode']) && $data['selected_user_mode'] == 'login_user' ) || ( isset($data['is_user_login']) && $data['is_user_login'] == true ) ){
          $checkout_user = 'login';
        }
        else{
          $checkout_user = 'guest';
        }
        
        //if login user do not have address, it will redirect to back
        if(!empty($checkout_user) && $checkout_user == 'login' && Session::has('dt_frontend_user_id')){
          $get_data_by_user_id     =  get_user_account_details_by_user_id( Session::get('dt_frontend_user_id') );
          $get_array_shift_data    =  array_shift($get_data_by_user_id);
          $user_account_parse_data =  json_decode($get_array_shift_data['details']);
          
          if(empty($user_account_parse_data) && empty($user_account_parse_data->address_details)){
            return redirect()-> back();
          }
        }
        
        if(!empty($checkout_user) && $checkout_user == 'guest'){
          $rules = [
                 'account_bill_first_name'                =>  'required',
                 'account_bill_last_name'                 =>  'required',
                 'account_bill_email_address'             =>  'required|email',
                 'account_bill_phone_number'              =>  'required',
                 'account_bill_select_country'            =>  'required',
                 'account_bill_select_state'              =>  'required',
                 'account_bill_select_city'               =>  'required',
                 'account_bill_adddress_line_1'           =>  'required',
                 ];
          
          $get_shipping_status = Input::get('different_shipping_address');

          if(isset($get_shipping_status) && $get_shipping_status == 'different_address'){
            $rules['account_shipping_first_name']         = 'required';
            $rules['account_shipping_last_name']          = 'required';
            $rules['account_shipping_email_address']      = 'required|email';
            $rules['account_shipping_phone_number']       = 'required';
            $rules['account_shipping_select_country']     = 'required';
            $rules['account_shipping_select_state']       = 'required';
            $rules['account_shipping_select_city']       = 'required';
            $rules['account_shipping_adddress_line_1']    = 'required';
          }
          
          $messages = [
                'account_bill_first_name.required' => Lang::get('validation.billing_fill_first_name_field'),
                'account_bill_last_name.required' => Lang::get('validation.billing_fill_last_name_field'),
                'account_bill_email_address.required' => Lang::get('validation.billing_fill_email_field'),
                'account_bill_email_address.email' => Lang::get('validation.billing_fill_valid_email_field'),
                'account_bill_phone_number.required' => Lang::get('validation.billing_fill_phone_number_field'),
                'account_bill_select_country.required' => Lang::get('validation.billing_country_name_field'),
                'account_bill_select_state.required' => Lang::get('validation.billing_fill_state_name_field'),
                'account_bill_select_city.required' => Lang::get('validation.billing_fill_town_city_field'),
                'account_bill_adddress_line_1.required' => Lang::get('validation.billing_address_line_1_field'),
              ];
          
          if(isset($get_shipping_status) && $get_shipping_status == 'different_address'){
            $messages['account_shipping_first_name.required'] = Lang::get('validation.shipping_fill_first_name_field');
            $messages['account_shipping_last_name.required'] = Lang::get('validation.shipping_fill_last_name_field');
            $messages['account_shipping_email_address.required'] = Lang::get('validation.shipping_fill_email_field');
            $messages['account_shipping_email_address.email'] = Lang::get('validation.shipping_fill_valid_email_field');
            $messages['account_shipping_phone_number.required'] = Lang::get('validation.shipping_fill_phone_number_field');
            $messages['account_shipping_select_country.required'] = Lang::get('validation.shipping_country_name_field');
            $messages['account_shipping_select_state.required'] = Lang::get('validation.shipping_fill_state_name_field');
            $messages['account_shipping_select_city.required'] = Lang::get('validation.shipping_fill_city_name');
            $messages['account_shipping_adddress_line_1.required'] = Lang::get('validation.shipping_address_line_1_field');
          }
        }
      
        $rules['payment_option']  = 'required';
        $messages['payment_option.required']  =  Lang::get('validation.fill_payment_gateway');
        
        if(Input::get('payment_option') === 'stripe' && Input::has('stripeToken')){
          $rules['stripeToken']  = 'required';
          $messages['stripeToken.required']  =  Lang::get('validation.stripe_required_msg');
        }
								
        if(Input::get('payment_option') === '2checkout' && Input::has('twoCheckoutToken')){
          $rules['twoCheckoutToken']  = 'required';
          $messages['twoCheckoutToken.required']  =  Lang::get('validation.twocheckout_required_msg');
        }
      
        $validator = Validator::make(Input::all(), $rules, $messages);
      
        if($validator->fails()){
          return redirect()-> back()
          ->withInput()
          ->withErrors( $validator );
        }
        elseif($validator->passes())
        {
          if(!empty($checkout_user) && $checkout_user == 'guest'){
            // $shipping_title                 =   Input::get('account_bill_title');
            $shipping_first_name            =   Input::get('account_bill_first_name');
            $shipping_last_name             =   Input::get('account_bill_last_name');
            // $shipping_company_name          =   Input::get('account_bill_company_name');
            $shipping_email_address         =   Input::get('account_bill_email_address');
            $shipping_phone_number          =   Input::get('account_bill_phone_number');
            // $shipping_fax_number            =   Input::get('account_bill_fax_number');
            $shipping_select_country        =   Input::get('account_bill_select_country');
            $shipping_select_state          =   Input::get('account_bill_select_state');
            $shipping_select_city           =   Input::get('account_bill_select_city');
            $shipping_adddress_line_1       =   Input::get('account_bill_adddress_line_1');
            // $shipping_address_line_2        =   Input::get('account_bill_adddress_line_2');
            
            if(isset($get_shipping_status) && $get_shipping_status == 'different_address'){
              // $shipping_title                 =   Input::get('account_shipping_title');
              $shipping_first_name            =   Input::get('account_shipping_first_name');
              $shipping_last_name             =   Input::get('account_shipping_last_name');
              // $shipping_company_name          =   Input::get('account_shipping_company_name');
              $shipping_email_address         =   Input::get('account_shipping_email_address');
              $shipping_phone_number          =   Input::get('account_shipping_phone_number');
              // $shipping_fax_number            =   Input::get('account_shipping_fax_number');
              $shipping_select_country        =   Input::get('account_shipping_select_country');
              $shipping_select_state          =   Input::get('account_shipping_select_state');
              $shipping_select_city           =   Input::get('account_shipping_select_city');
              $shipping_adddress_line_1       =   Input::get('account_shipping_adddress_line_1');
              // $shipping_address_line_2        =   Input::get('account_shipping_adddress_line_2');
            }
            
            // $this->checkoutData['billing_title']              =   Input::get('account_bill_title');
            $this->checkoutData['bill_first_name']            =   Input::get('account_bill_first_name');
            $this->checkoutData['bill_last_name']             =   Input::get('account_bill_last_name');
            // $this->checkoutData['bill_company_name']          =   Input::get('account_bill_company_name');
            $this->checkoutData['bill_email_address']         =   Input::get('account_bill_email_address');
            $this->checkoutData['bill_phone_number']          =   Input::get('account_bill_phone_number');
            // $this->checkoutData['bill_fax_number']            =   Input::get('account_bill_fax_number');
            $this->checkoutData['bill_select_country']        =   Input::get('account_bill_select_country');
            $this->checkoutData['bill_select_state']          =   Input::get('account_bill_select_state');
            $this->checkoutData['bill_select_city']           =   Input::get('account_bill_select_city');
            $this->checkoutData['bill_adddress_line_1']       =   Input::get('account_bill_adddress_line_1');
            // $this->checkoutData['bill_address_line_2']        =   Input::get('account_bill_adddress_line_2');
            
            // $this->checkoutData['shipping_title']              =   $shipping_title;
            $this->checkoutData['shipping_first_name']         =   $shipping_first_name;
            $this->checkoutData['shipping_last_name']          =   $shipping_last_name;
            // $this->checkoutData['shipping_company_name']       =   $shipping_company_name;
            $this->checkoutData['shipping_email_address']      =   $shipping_email_address;
            $this->checkoutData['shipping_phone_number']       =   $shipping_phone_number;
            // $this->checkoutData['shipping_fax_number']         =   $shipping_fax_number;
            $this->checkoutData['shipping_select_country']     =   $shipping_select_country;
            $this->checkoutData['shipping_select_state']      =   $shipping_select_state;
            $this->checkoutData['shipping_select_city']       =   $shipping_select_city;
            $this->checkoutData['shipping_adddress_line_1']    =   $shipping_adddress_line_1;
            // $this->checkoutData['shipping_address_line_2']     =   $shipping_address_line_2;
          }
          
          $this->checkoutData['payment_method']             =   Input::get('payment_option');
          $this->checkoutData['payment_method_title']       =   Input::get('payment_option');
          $this->checkoutData['order_note']                 =   Input::get('checkout_order_extra_message');
          $this->checkoutData['user_mode']                  =   $checkout_user;  
          
          if(Session::get('checkout_post_details')){
            Session::forget('checkout_post_details');
            Session::put('checkout_post_details', json_encode($this->checkoutData));
          }
          else{
            Session::put('checkout_post_details', json_encode($this->checkoutData));
          }
          
          $email_options = get_emails_option_data();
          
          if(Input::get('payment_option') === 'bacs' || Input::get('payment_option') === 'cod' ){
            $mailData = array();
            $adminMailData = array();
            $order_id = $this->save_checkout_data();
            
            $adminMailData['source']           =   'admin_order_confirmation';
            $adminMailData['data']             =   array('order_id' => $order_id['order_id']);

            if($order_id['order_id'] > 0 && $this->env === 'production'){
              $this->classGetFunction->sendCustomMail( $adminMailData );
            }
            
            if(isset($email_options['new_order']['enable_disable']) && $email_options['new_order']['enable_disable'] == true){
              //load mailData Array
              $mailData['source']           =   'order_confirmation';
              $mailData['data']             =   array('order_id' => $order_id['order_id']);

              if($order_id['order_id'] > 0 && $this->env === 'production'){
                $this->classGetFunction->sendCustomMail( $mailData );
              }
            }
            
            if($this->nexmo_data['enable_nexmo_option'] == true){
              $this->classCommonFunction->sendSMSToAdmin();
            }

            return \Redirect::route('frontend-order-received', array('order_id' => $order_id['order_id'], 'order_key' => $order_id['process_id']));
          }
          elseif(Input::get('payment_option') === 'paypal'){
            //process items
            $payer = new Payer();
            $payer->setPaymentMethod('paypal');

            $items_ary = array();
            if($this->cartBuy->getItems() && $this->cartBuy->getItems()->count()>0)
            {
              foreach($this->cartBuy->getItems() as $items)
              {
                $itemObj = new Item();
                $itemObj->setName( $items->name )
                        ->setCurrency( get_frontend_selected_currency() ) 
                        ->setQuantity( $items->quantity )
                        ->setPrice( $items->price );

                array_push($items_ary, $itemObj);
              }
            }

            //amount details
            $amount_details = new Details();
            $amount_details-> setSubtotal( $this->cartBuy->getTotal() )
                           -> setShipping( $this->cartBuy->getShippingCost() ) 
                           -> setTax( $this->cartBuy->getTax() ) ;

            // add item to list
            $item_list = new ItemList();
            $item_list->setItems( $items_ary );

            //to ammount 
            $amount = new Amount();
            $amount->setCurrency( get_frontend_selected_currency() )
                   ->setTotal( $this->cartBuy->getCartTotal() )
                   ->setDetails( $amount_details );

            //transaction
            $transaction = new Transaction();
            $transaction->setAmount($amount)
                        ->setItemList($item_list)
                        ->setDescription('Your transaction description');

            $redirect_urls = new RedirectUrls();
            $redirect_urls->setReturnUrl(URL::route('payment.status'))
                          ->setCancelUrl(URL::route('payment.status'));    

            $payment = new Payment();
            $payment->setIntent('Sale')
                    ->setPayer($payer)
                    ->setRedirectUrls($redirect_urls)
                    ->setTransactions(array($transaction));

            try 
            {
              $payment->create($this->_api_context);
            } 
            catch (\PayPal\Exception\PPConnectionException $ex) 
            {
              if (\Config::get('app.debug')) {
                  echo "Exception: " . $ex->getMessage() . PHP_EOL;
                  $err_data = json_decode($ex->getData(), true);
                  exit;
              } else {
                  die('Some error occur, sorry for inconvenient');
              }
            }

            foreach($payment->getLinks() as $link) {
              if($link->getRel() == 'approval_url') {
                  $redirect_url = $link->getHref();
                  break;
              }
            }

            Session::put('paypal_payment_id', $payment->getId());

            if(isset($redirect_url)) {
              // redirect to paypal
              return \Redirect::away($redirect_url);
            }

            return \Redirect::route('cart-page');
          }
        }
      }
    }
  }
  /**
   * 
   *Paypal payment status
   *
   * @param null
   * @return void
   */
  public function getPaymentStatus()
  {
    $payment_id = Session::get('paypal_payment_id');
    Session::forget('paypal_payment_id');
    $email_options = get_emails_option_data();
    
    if (empty(Input::get('PayerID')) || empty(Input::get('token'))) {
    return \Redirect::route('cart-page');
    }
    $payment = Payment::get($payment_id, $this->_api_context);
    
    $execution = new PaymentExecution();
    $execution->setPayerId(Input::get('PayerID'));
    
    //Execute the payment
    $result = $payment->execute($execution, $this->_api_context);
    
    if ($result->getState() == 'approved') {
      $mailData = array();
      $adminMailData = array();
      
      $order_id = $this->save_checkout_data();

      $adminMailData['source']           =   'admin_order_confirmation';
      $adminMailData['data']             =   array('order_id' => $order_id['order_id']);

      if($order_id['order_id'] > 0 && $this->env === 'production'){
        $this->classGetFunction->sendCustomMail( $adminMailData );
      } 
      
      if(isset($email_options['new_order']['enable_disable']) && $email_options['new_order']['enable_disable'] == true){
        //load mailData Array
        $mailData['source']           =   'order_confirmation';
        $mailData['data']             =   array('order_id' => $order_id['order_id']);

        if($order_id['order_id'] > 0 && $this->env === 'production'){
          $this->classGetFunction->sendCustomMail( $mailData );
        }
      }
      
      if($this->nexmo_data['enable_nexmo_option'] == true){
        $this->classCommonFunction->sendSMSToAdmin();
      }
      
      return \Redirect::route('frontend-order-received', array('order_id' => $order_id['order_id'], 'order_key' => $order_id['process_id']));
    }
    return \Redirect::route('cart-page');
  }
  
  /**
   * 
   *Save checkout data
   *
   * @param null
   * @return array
   */
  public function save_checkout_data(){
    $post           =     new Post;
    $postMeta       =     new PostExtra;
    $orderItems     =     new OrdersItem;
    $vendorOrders   =     new VendorOrder;
    $vendorTotals   =     new VendorTotal;
    
    $checkout_details;

    $shipping_cost   = 0;
    $shipping_method = '';
    $order_post_meta_data = array();
    $discount = 0;
    $discount_code = '';
    $is_coupon_applyed = false;

    if($this->cartBuy->getShippingMethod()){
      $getShippingData = $this->cartBuy->getShippingMethod();
      $shipping_cost   = $getShippingData['shipping_cost'];
      $shipping_method = $getShippingData['shipping_method'];
    }
    
    if(Session::has('checkout_post_details')){
      $checkout_details = json_decode(Session::get('checkout_post_details'));
    }
  
    if($checkout_details->user_mode == 'guest'){
      $get_roles = Role::where(['slug' => 'administrator'])->first();
      if(!empty($get_roles)){
        $getuserdata = Role::find($get_roles->id);
        $user_id = $getuserdata->users[0]->id;
      }
      
      $user_mode = 'guest';
      $user_id   = $user_id;
    }
    else{
      $user_mode = 'login';
      $user_id   = Session::get('dt_frontend_user_id');
    }
    
    $users_data = array('user_mode' => $user_mode, 'user_id' => $user_id);
    
    if($this->cartBuy->is_coupon_applyed()){
      $discount = $this->cartBuy->couponPrice();
      $discount_code = $this->cartBuy->couponCode();
      $is_coupon_applyed = true;
    }
    
    //best sales data save
    $get_items = $this->cartBuy->getItems()->toArray();
    $vendor_id = null;
    
    if(count($get_items) >0){
      foreach($get_items as $items){
        $get_total_sales_data_by_product = ProductExtra::where(['product_id' => $items->id, 'key_name' => '_total_sales'])->first();
        
        if(!empty($get_total_sales_data_by_product)){
          $best_data = array(
                            'key_value'    =>  $get_total_sales_data_by_product->key_value + 1
          );
          
          ProductExtra::where(['product_id' => $items->id, 'key_name' => '_total_sales'])->update($best_data);
        }
        else{
          ProductExtra::insert(array(
                                  'product_id'    =>  $items->id,
                                  'key_name'      =>  '_total_sales',
                                  'key_value'     =>  1,
                                  'created_at'    =>  date("y-m-d H:i:s", strtotime('now')),
                                  'updated_at'    =>  date("y-m-d H:i:s", strtotime('now'))
                                ));
        }
        
        $items->download_data = get_download_files($items->id);
        
        //check is vendor order
        $get_vendor_details = get_vendor_details_by_product_id( $items->product_id );
          
        if(count($get_vendor_details) > 0 && $get_vendor_details['user_role_slug'] == 'vendor'){
          $vendor_id = $get_vendor_details['user_id'];
          break;
        }
      }
    }
    
    $order_process_key = time().mt_rand().rand();
    $post->post_author_id         =   $user_id;
    $post->post_content           =   'Customer Shop Order';
    $post->post_title             =   'shop order';
    $post->post_slug              =   'shop-order';  
    $post->parent_id              =   0;
    $post->post_status            =   1;
    $post->post_type              =   'shop_order';
    
    if($post->save()){
      $order_array = array(
                        array(
                                'post_id'       =>  $post->id,
                                'key_name'      =>  '_order_currency',
                                'key_value'     =>  get_frontend_selected_currency(),
                                'created_at'    =>  date("y-m-d H:i:s", strtotime('now')),
                                'updated_at'    =>  date("y-m-d H:i:s", strtotime('now'))
                              ),
                        array(
                                'post_id'       =>  $post->id,
                                'key_name'      =>  '_customer_ip_address',
                                'key_value'     =>  Request::ip(),
                                'created_at'    =>  date("y-m-d H:i:s", strtotime('now')),
                                'updated_at'    =>  date("y-m-d H:i:s", strtotime('now'))
                              ),
                        array(
                                'post_id'       =>  $post->id,
                                'key_name'      =>  '_customer_user_agent',
                                'key_value'     =>  Request::header('User-Agent'),
                                'created_at'    =>  date("y-m-d H:i:s", strtotime('now')),
                                'updated_at'    =>  date("y-m-d H:i:s", strtotime('now'))
                              ),
                        array(
                                'post_id'       =>  $post->id,
                                'key_name'      =>  '_customer_user',
                                'key_value'     =>  serialize($users_data),
                                'created_at'    =>  date("y-m-d H:i:s", strtotime('now')),
                                'updated_at'    =>  date("y-m-d H:i:s", strtotime('now'))
                              ),
                        array(
                                'post_id'       =>  $post->id,
                                'key_name'      =>  '_order_shipping_cost',
                                'key_value'     =>  $shipping_cost,
                                'created_at'    =>  date("y-m-d H:i:s", strtotime('now')),
                                'updated_at'    =>  date("y-m-d H:i:s", strtotime('now'))
                              ),
                        array(
                                'post_id'       =>  $post->id,
                                'key_name'      =>  '_final_order_shipping_cost',
                                'key_value'     =>  get_product_price_html_by_filter($shipping_cost),
                                'created_at'    =>  date("y-m-d H:i:s", strtotime('now')),
                                'updated_at'    =>  date("y-m-d H:i:s", strtotime('now'))
                              ),      
                        array(
                                'post_id'       =>  $post->id,
                                'key_name'      =>  '_order_shipping_method',
                                'key_value'     =>  $shipping_method,
                                'created_at'    =>  date("y-m-d H:i:s", strtotime('now')),
                                'updated_at'    =>  date("y-m-d H:i:s", strtotime('now'))
                              ),
                        array(
                                'post_id'       =>  $post->id,
                                'key_name'      =>  '_payment_method',
                                'key_value'     =>  $checkout_details->payment_method,
                                'created_at'    =>  date("y-m-d H:i:s", strtotime('now')),
                                'updated_at'    =>  date("y-m-d H:i:s", strtotime('now'))
                              ),
                        array(
                                'post_id'       =>  $post->id,
                                'key_name'      =>  '_payment_method_title',
                                'key_value'     =>  $checkout_details->payment_method_title,
                                'created_at'    =>  date("y-m-d H:i:s", strtotime('now')),
                                'updated_at'    =>  date("y-m-d H:i:s", strtotime('now'))
                              ),
                        array(
                                'post_id'       =>  $post->id,
                                'key_name'      =>  '_order_tax',
                                'key_value'     =>  $this->cartBuy->getTax(),
                                'created_at'    =>  date("y-m-d H:i:s", strtotime('now')),
                                'updated_at'    =>  date("y-m-d H:i:s", strtotime('now'))
                              ),
                        array(
                                'post_id'       =>  $post->id,
                                'key_name'      =>  '_final_order_tax',
                                'key_value'     =>  get_product_price_html_by_filter($this->cartBuy->getTax()),
                                'created_at'    =>  date("y-m-d H:i:s", strtotime('now')),
                                'updated_at'    =>  date("y-m-d H:i:s", strtotime('now'))
                              ),      
                        array(
                                'post_id'       =>  $post->id,
                                'key_name'      =>  '_order_total',
                                'key_value'     =>  $this->cartBuy->getCartTotal(),
                                'created_at'    =>  date("y-m-d H:i:s", strtotime('now')),
                                'updated_at'    =>  date("y-m-d H:i:s", strtotime('now'))
                              ),
                        array(
                                'post_id'       =>  $post->id,
                                'key_name'      =>  '_final_order_total',
                                'key_value'     =>  get_product_price_html_by_filter($this->cartBuy->getCartTotal()),
                                'created_at'    =>  date("y-m-d H:i:s", strtotime('now')),
                                'updated_at'    =>  date("y-m-d H:i:s", strtotime('now'))
                              ),      
                        array(
                                'post_id'       =>  $post->id,
                                'key_name'      =>  '_order_notes',
                                'key_value'     =>  $checkout_details->order_note,
                                'created_at'    =>  date("y-m-d H:i:s", strtotime('now')),
                                'updated_at'    =>  date("y-m-d H:i:s", strtotime('now'))
                              ),
                         array(
                                'post_id'       =>  $post->id,
                                'key_name'      =>  '_order_status',
                                'key_value'     =>  'on-hold',
                                'created_at'    =>  date("y-m-d H:i:s", strtotime('now')),
                                'updated_at'    =>  date("y-m-d H:i:s", strtotime('now'))
                              ), 
                        array(
                                'post_id'       =>  $post->id,
                                'key_name'      =>  '_order_discount',
                                'key_value'     =>  $discount,
                                'created_at'    =>  date("y-m-d H:i:s", strtotime('now')),
                                'updated_at'    =>  date("y-m-d H:i:s", strtotime('now'))
                              ),
                        array(
                                'post_id'       =>  $post->id,
                                'key_name'      =>  '_final_order_discount',
                                'key_value'     =>  get_product_price_html_by_filter($discount),
                                'created_at'    =>  date("y-m-d H:i:s", strtotime('now')),
                                'updated_at'    =>  date("y-m-d H:i:s", strtotime('now'))
                              ),      
                        array(
                                'post_id'       =>  $post->id,
                                'key_name'      =>  '_order_coupon_code',
                                'key_value'     =>  $discount_code,
                                'created_at'    =>  date("y-m-d H:i:s", strtotime('now')),
                                'updated_at'    =>  date("y-m-d H:i:s", strtotime('now'))
                              ),
                        array(
                                'post_id'       =>  $post->id,
                                'key_name'      =>  '_is_order_coupon_applyed',
                                'key_value'     =>  $is_coupon_applyed,
                                'created_at'    =>  date("y-m-d H:i:s", strtotime('now')),
                                'updated_at'    =>  date("y-m-d H:i:s", strtotime('now'))
                              ),
                        array(
                                'post_id'       =>  $post->id,
                                'key_name'      =>  '_order_process_key',
                                'key_value'     =>  $order_process_key,
                                'created_at'    =>  date("y-m-d H:i:s", strtotime('now')),
                                'updated_at'    =>  date("y-m-d H:i:s", strtotime('now'))
                              )    
                      );
      
      $order_post_meta_data = $order_array;
        
      if($checkout_details->user_mode == 'guest'){
        $guest_address_array = array( 
                          // array(
                          //         'post_id'       =>  $post->id,
                          //         'key_name'      =>  '_billing_title',
                          //         'key_value'     =>  $checkout_details->billing_title,
                          //         'created_at'    =>  date("y-m-d H:i:s", strtotime('now')),
                          //         'updated_at'    =>  date("y-m-d H:i:s", strtotime('now'))
                          //     ), 
                          array(
                                  'post_id'       =>  $post->id,
                                  'key_name'      =>  '_billing_first_name',
                                  'key_value'     =>  $checkout_details->bill_first_name,
                                  'created_at'    =>  date("y-m-d H:i:s", strtotime('now')),
                                  'updated_at'    =>  date("y-m-d H:i:s", strtotime('now'))
                                ),
                          array(
                                  'post_id'       =>  $post->id,
                                  'key_name'      =>  '_billing_last_name',
                                  'key_value'     =>  $checkout_details->bill_last_name,
                                  'created_at'    =>  date("y-m-d H:i:s", strtotime('now')),
                                  'updated_at'    =>  date("y-m-d H:i:s", strtotime('now'))
                                ), 
                          // array(
                          //         'post_id'       =>  $post->id,
                          //         'key_name'      =>  '_billing_company',
                          //         'key_value'     =>  $checkout_details->bill_company_name,
                          //         'created_at'    =>  date("y-m-d H:i:s", strtotime('now')),
                          //         'updated_at'    =>  date("y-m-d H:i:s", strtotime('now'))
                          //       ),  
                          array(
                                  'post_id'       =>  $post->id,
                                  'key_name'      =>  '_billing_email',
                                  'key_value'     =>  $checkout_details->bill_email_address,
                                  'created_at'    =>  date("y-m-d H:i:s", strtotime('now')),
                                  'updated_at'    =>  date("y-m-d H:i:s", strtotime('now'))
                                ),
                          array(
                                  'post_id'       =>  $post->id,
                                  'key_name'      =>  '_billing_phone',
                                  'key_value'     =>  $checkout_details->bill_phone_number,
                                  'created_at'    =>  date("y-m-d H:i:s", strtotime('now')),
                                  'updated_at'    =>  date("y-m-d H:i:s", strtotime('now'))
                                ),
                          // array(
                          //         'post_id'       =>  $post->id,
                          //         'key_name'      =>  '_billing_fax',
                          //         'key_value'     =>  $checkout_details->bill_fax_number,
                          //         'created_at'    =>  date("y-m-d H:i:s", strtotime('now')),
                          //         'updated_at'    =>  date("y-m-d H:i:s", strtotime('now'))
                          //       ),       
                          array(
                                  'post_id'       =>  $post->id,
                                  'key_name'      =>  '_billing_country',
                                  'key_value'     =>  $checkout_details->bill_select_country,
                                  'created_at'    =>  date("y-m-d H:i:s", strtotime('now')),
                                  'updated_at'    =>  date("y-m-d H:i:s", strtotime('now'))
                                ),
                          array(
                                  'post_id'       =>  $post->id,
                                  'key_name'      =>  '_billing_state',
                                  'key_value'     =>  $checkout_details->bill_select_state,
                                  'created_at'    =>  date("y-m-d H:i:s", strtotime('now')),
                                  'updated_at'    =>  date("y-m-d H:i:s", strtotime('now'))
                                ),
                          array(
                                  'post_id'       =>  $post->id,
                                  'key_name'      =>  '_billing_address_1',
                                  'key_value'     =>  $checkout_details->bill_adddress_line_1,
                                  'created_at'    =>  date("y-m-d H:i:s", strtotime('now')),
                                  'updated_at'    =>  date("y-m-d H:i:s", strtotime('now'))
                                ),
                          // array(
                          //         'post_id'       =>  $post->id,
                          //         'key_name'      =>  '_billing_address_2',
                          //         'key_value'     =>  $checkout_details->bill_address_line_2,
                          //         'created_at'    =>  date("y-m-d H:i:s", strtotime('now')),
                          //         'updated_at'    =>  date("y-m-d H:i:s", strtotime('now'))
                          //       ), 
                          array(
                                  'post_id'       =>  $post->id,
                                  'key_name'      =>  '_billing_city',
                                  'key_value'     =>  $checkout_details->bill_select_city,
                                  'created_at'    =>  date("y-m-d H:i:s", strtotime('now')),
                                  'updated_at'    =>  date("y-m-d H:i:s", strtotime('now'))
                                ),
                          // array(
                          //         'post_id'       =>  $post->id,
                          //         'key_name'      =>  '_billing_postcode',
                          //         'key_value'     =>  '480000',
                          //         'created_at'    =>  date("y-m-d H:i:s", strtotime('now')),
                          //         'updated_at'    =>  date("y-m-d H:i:s", strtotime('now'))
                          //       ),
                          // array(
                          //         'post_id'       =>  $post->id,
                          //         'key_name'      =>  '_shipping_title',
                          //         'key_value'     =>  $checkout_details->shipping_title,
                          //         'created_at'    =>  date("y-m-d H:i:s", strtotime('now')),
                          //         'updated_at'    =>  date("y-m-d H:i:s", strtotime('now'))
                          //     ), 
                          array(
                                  'post_id'       =>  $post->id,
                                  'key_name'      =>  '_shipping_first_name',
                                  'key_value'     =>  $checkout_details->shipping_first_name,
                                  'created_at'    =>  date("y-m-d H:i:s", strtotime('now')),
                                  'updated_at'    =>  date("y-m-d H:i:s", strtotime('now'))
                                ),
                          array(
                                  'post_id'       =>  $post->id,
                                  'key_name'      =>  '_shipping_last_name',
                                  'key_value'     =>  $checkout_details->shipping_last_name,
                                  'created_at'    =>  date("y-m-d H:i:s", strtotime('now')),
                                  'updated_at'    =>  date("y-m-d H:i:s", strtotime('now'))
                                ), 
                          // array(
                          //         'post_id'       =>  $post->id,
                          //         'key_name'      =>  '_shipping_company',
                          //         'key_value'     =>  $checkout_details->shipping_company_name,
                          //         'created_at'    =>  date("y-m-d H:i:s", strtotime('now')),
                          //         'updated_at'    =>  date("y-m-d H:i:s", strtotime('now'))
                          //       ),  
                          array(
                                  'post_id'       =>  $post->id,
                                  'key_name'      =>  '_shipping_email',
                                  'key_value'     =>  $checkout_details->shipping_email_address,
                                  'created_at'    =>  date("y-m-d H:i:s", strtotime('now')),
                                  'updated_at'    =>  date("y-m-d H:i:s", strtotime('now'))
                                ),
                          array(
                                  'post_id'       =>  $post->id,
                                  'key_name'      =>  '_shipping_phone',
                                  'key_value'     =>  $checkout_details->shipping_phone_number,
                                  'created_at'    =>  date("y-m-d H:i:s", strtotime('now')),
                                  'updated_at'    =>  date("y-m-d H:i:s", strtotime('now'))
                                ),
                          // array(
                          //         'post_id'       =>  $post->id,
                          //         'key_name'      =>  '_shipping_fax',
                          //         'key_value'     =>  $checkout_details->shipping_fax_number,
                          //         'created_at'    =>  date("y-m-d H:i:s", strtotime('now')),
                          //         'updated_at'    =>  date("y-m-d H:i:s", strtotime('now'))
                          //       ),       
                          array(
                                  'post_id'       =>  $post->id,
                                  'key_name'      =>  '_shipping_country',
                                  'key_value'     =>  $checkout_details->shipping_select_country,
                                  'created_at'    =>  date("y-m-d H:i:s", strtotime('now')),
                                  'updated_at'    =>  date("y-m-d H:i:s", strtotime('now'))
                                ),
                          array(
                                  'post_id'       =>  $post->id,
                                  'key_name'      =>  '_shipping_state',
                                  'key_value'     =>  $checkout_details->shipping_select_state,
                                  'created_at'    =>  date("y-m-d H:i:s", strtotime('now')),
                                  'updated_at'    =>  date("y-m-d H:i:s", strtotime('now'))
                                ),

                          array(
                                  'post_id'       =>  $post->id,
                                  'key_name'      =>  '_shipping_address_1',
                                  'key_value'     =>  $checkout_details->shipping_adddress_line_1,
                                  'created_at'    =>  date("y-m-d H:i:s", strtotime('now')),
                                  'updated_at'    =>  date("y-m-d H:i:s", strtotime('now'))
                                ),
                          // array(
                          //         'post_id'       =>  $post->id,
                          //         'key_name'      =>  '_shipping_address_2',
                          //         'key_value'     =>  $checkout_details->shipping_address_line_2,
                          //         'created_at'    =>  date("y-m-d H:i:s", strtotime('now')),
                          //         'updated_at'    =>  date("y-m-d H:i:s", strtotime('now'))
                          //       ), 
                          array(
                                  'post_id'       =>  $post->id,
                                  'key_name'      =>  '_shipping_city',
                                  'key_value'     =>  $checkout_details->shipping_select_city,
                                  'created_at'    =>  date("y-m-d H:i:s", strtotime('now')),
                                  'updated_at'    =>  date("y-m-d H:i:s", strtotime('now'))
                                ),
                          // array(
                          //         'post_id'       =>  $post->id,
                          //         'key_name'      =>  '_shipping_postcode',
                          //         'key_value'     =>  '480000',
                          //         'created_at'    =>  date("y-m-d H:i:s", strtotime('now')),
                          //         'updated_at'    =>  date("y-m-d H:i:s", strtotime('now'))
                          //       ),        
                      ); 
        
        $order_post_meta_data = array_merge($order_array, $guest_address_array);
      }  
      
      if(PostExtra::insert($order_post_meta_data)){
        if(!is_null($vendor_id) && $vendor_id > 0){
          $get_package_details = get_package_details_by_vendor_id($vendor_id);
          
          $vendorOrders->order_id        =   $post->id;
          $vendorOrders->vendor_id       =   $vendor_id;
          $vendorOrders->order_total     =   $this->cartBuy->getCartTotal();
          $vendorOrders->net_amount      =   ($get_package_details->vendor_commission / 100) * $this->cartBuy->getCartTotal();
          $vendorOrders->order_status    =   'ON-HOLD';
          if($vendorOrders->save()){
            $get_vendor_total = VendorTotal::where(['vendor_id' => $vendor_id])->first();
            
            if(!empty($get_vendor_total)){
              $data = array(
                      'totals' => $get_vendor_total->totals + ($get_package_details->vendor_commission / 100) * $this->cartBuy->getCartTotal()
              );
              $vendorTotals::where('vendor_id', $vendor_id)->update($data);
            }
            else{
              $vendorTotals->vendor_id = $vendor_id;
              $vendorTotals->totals    = ($get_package_details->vendor_commission / 100) * $this->cartBuy->getCartTotal();
              $vendorTotals->save();
            }
          }
        }
        
        $orderItems->order_id         =   $post->id;
        $orderItems->order_data       =   json_encode( $get_items );

        if($orderItems->save()){
          $get_design_img  =  array();

          if(Session::has('_recent_saved_custom_design_images')){
            $get_design_img  = unserialize(Session::get('_recent_saved_custom_design_images'));
          }

          if(count($this->cartBuy->getItems())>0){
            foreach($this->cartBuy->getItems() as $cart_items){
              if(get_product_type($cart_items->id) === 'customizable_product'){
                $usersCustomData =       new UsersCustomDesign;
                if($cart_items->id)
                {
                  $usersCustomData->product_id         =   $cart_items->id;
                }

                if($post->id)
                {
                  $usersCustomData->order_id           =   $post->id;
                }

                if($cart_items->acces_token)
                {
                  $usersCustomData->access_token       =   $cart_items->acces_token; 
                }

                if(isset($get_design_img[$cart_items->acces_token]))
                {
                  $usersCustomData->design_images      =   serialize($get_design_img[$cart_items->acces_token]);
                }

                if(Cache::has($cart_items->acces_token))
                {
                  $usersCustomData->design_data        =   serialize(Cache::get($cart_items->acces_token));
                  Cache::forget($cart_items->acces_token);
                }
                
                $usersCustomData->save();
              }
              
              if($cart_items->variation_id && count($cart_items->options) > 0){
                $variation_product_data = $this->classCommonFunction->get_variation_and_data_by_post_id( $cart_items->variation_id );
                
                if($variation_product_data['_variation_post_manage_stock'] == 1){
                  $current_qty = $variation_product_data['_variation_post_manage_stock_qty'] - $cart_items->quantity;
                  $new_manage_qty = array(
                                  'key_value'    =>  $current_qty
                  );

                  PostExtra::where(['post_id' => $cart_items->variation_id, 'key_name' => '_variation_post_manage_stock_qty'])->update($new_manage_qty);
                }
              }
              else{
                $product_data = $this->classCommonFunction->get_product_data_by_product_id( $cart_items->id );
                
                if($product_data['product_manage_stock'] == 'yes'){
                  $current_qty = $product_data['product_manage_stock_qty'] - $cart_items->quantity;
                  
                  $new_manage_qty = array(
                                    'stock_qty' =>  $current_qty
                  );

                  Product::where(['id' => $cart_items->id])->update($new_manage_qty);
                }
              }
            }
            
            if(count($get_design_img)>0){
              if(Session::has('_recent_saved_custom_design_images')){
                Session::forget('_recent_saved_custom_design_images');
              }
            }
          }
                  
          if(Session::has('checkout_post_details')){
            Session::forget('checkout_post_details');
          }
          
          $this->cartBuy->clear();
         
          return array('order_id' => $post->id, 'process_id' => $order_process_key);
        }
      }
    } 
  }
}