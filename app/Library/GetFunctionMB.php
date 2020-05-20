<?php
namespace dungthinh\Library;

use Illuminate\Support\Facades\DB;
use dungthinh\Models\Post;
use dungthinh\Models\PostExtra;
use dungthinh\Models\CategoriesList;
use dungthinh\Models\UsersCustomDesign;
use dungthinh\Models\User;
use dungthinh\Models\OrdersItem;
use Session;
use Anam\Phpcart\Cart;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Lang;
use dungthinh\Models\UsersDetail;
use dungthinh\Models\ManageLanguage;
use dungthinh\Models\RoleUser;
use dungthinh\Models\VendorWithdraw;
use dungthinh\Models\VendorPackage;
use dungthinh\Models\VendorOrder;
use Cookie;
use Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use dungthinh\Http\Controllers\OptionController; 
use dungthinh\Http\Controllers\CMSController;
use dungthinh\Http\Controllers\Admin\UserController;
use dungthinh\Http\Controllers\ProductsController;
use dungthinh\Library\CommonFunction;
use dungthinh\Models\Term;
use dungthinh\Models\TermExtra;

use dungthinh\Mail\ShopistMail;
use dungthinh\Models\ProductExtra;
use dungthinh\Models\Product;
use dungthinh\Models\QuanHuyen;
use dungthinh\Models\XaPhuong;
use dungthinh\Models\TinhThanh;

class GetFunctionMB
{
  public $str = '';
  public $products_details;
  public $cart;
  public $shipping = array();
  public $payment  = array();
  public $current_product_id = 0;
  public $carbonObject;
  public $settingsData = array();
  public $seoData = array();
  public $subscriptionData = array();
  public $subscriptionSettingsData = array();
  
  public $CMS;
  public $user;
  public $option;
  public $product;
  public $classCommonFunction;

  public function __construct() 
  {
    $this->carbonObject =  new Carbon();

    $this->CMS      =  new CMSController();
    $this->user     =  new UserController();
    $this->product   =  new ProductsController();
    $this->classCommonFunction  =   new CommonFunction();
    $this->cart     =  new Cart();
    
    if(\Schema::hasTable('options')){
      $this->option   =  new OptionController();
      $this->shipping   = $this->option->getShippingMethodData();
      $this->payment    =  $this->option->getPaymentMethodData();
      $this->settingsData =   $this->option->getSettingsData();
      $this->subscriptionData =   $this->option->getSubscriptionData();
      $this->subscriptionSettingsData =   $this->option->getSubscriptionSettingsData();
    }
  }
  
  /**
   * Get function for reports
   *
   * @param Start date, End date
   * @return obj
   */

  public static function users_by_display_name($role_id, $extra_search_term = null, $flag = null){

    if(($flag == -1) || is_null($flag)){
        $where = ['role_user.role_id' => $role_id];
    }
    else{
        $where = ['role_user.role_id' => $role_id, 'users.user_status' => $flag ];
    }
				
    if(!is_null($extra_search_term) || !empty($extra_search_term)){
      $get_users = DB::table('users')
                   ->where($where)
                   ->where('users.name', 'LIKE', '%'. $extra_search_term. '%')
                   ->join('role_user', 'users.id', '=', 'role_user.user_id')
                   ->join('users_details', 'users.id', '=', 'users_details.user_id')
                   ->select('users.*','users_details.details')
                   ->orderBy('users.id', 'asc')
                   ->get()
                   ->toArray();
    }
    else{
      $get_users = DB::table('users')
                   ->where($where)
                   ->join('role_user', 'users.id', '=', 'role_user.user_id')
                   ->leftJoin('users_details', 'users.id', '=', 'users_details.user_id')
                   ->select('users.*','users_details.details')
                   ->orderBy('users.id', 'asc')
                   ->get()
                   ->toArray();
    }

    // $vendor_details = get_current_vendor_user_info();
    // $get_user_details = json_decode(get_user_account_details_by_user_id( $vendor_details['user_id'] )[0]['details']);

    $vendors = array();

    foreach ($get_users as $row){

      $user_data = array();

      $parse_user_data = json_decode($row->details,true);

      $user_data['id'] = strval($row->id);
      $user_data['name'] = $parse_user_data['profile_details']['store_name'];
      $user_data['description'] = $parse_user_data['profile_details']['address_line_1'].', '.get_xaphuong($parse_user_data['profile_details']['city']).', '.get_quanhuyen($parse_user_data['profile_details']['state']).', '.get_tinhthanh($parse_user_data['profile_details']['country']);
      $user_data['email'] = $row->email;
      $user_data['phone'] = $parse_user_data['profile_details']['phone'];
      $user_data['address'] = $parse_user_data['profile_details']['address_line_1'];

      $user_data['coordinate'] =  '';
      $user_data['lat'] = $parse_user_data['general_details']['latitude'];
      $user_data['lng'] = $parse_user_data['general_details']['longitude'];

      $user_data['paypal_enabled'] = strval((int)$parse_user_data['payment_method']['paypal']['status']);
      $user_data['stripe_enabled'] = strval((int)$parse_user_data['payment_method']['stripe']['status']);
      $user_data['cod_enabled'] = strval((int)$parse_user_data['payment_method']['cod']['status']);
      $user_data['banktransfer_enabled'] = strval((int)$parse_user_data['payment_method']['dbt']['status']);

      $user_data['paypal_email'] = $parse_user_data['payment_method']['paypal']['email_id'];
      $user_data['paypal_environment'] = '';
      $user_data['paypal_appid_live'] = '';
      $user_data['paypal_merchantname'] = '';
      $user_data['paypal_customerid'] = '';
      $user_data['paypal_ipnurl'] = '';
      $user_data['paypal_memo'] = '';
      
      $user_data['bank_account'] = $parse_user_data['payment_method']['dbt']['account_number'];
      $user_data['bank_name'] = $parse_user_data['payment_method']['dbt']['bank_name'];
      $user_data['bank_code'] = $parse_user_data['payment_method']['dbt']['short_code'];
      $user_data['branch_code'] = $parse_user_data['payment_method']['dbt']['IBAN'];
      $user_data['swift_code'] = $parse_user_data['payment_method']['dbt']['SWIFT'];

      $user_data['cod_email'] = $parse_user_data['payment_method']['cod']['title'];

      $user_data['stripe_publishable_key'] = '';
      $user_data['stripe_secret_key'] = '';

      $user_data['currency_symbol'] = '₫';
      $user_data['currency_short_form'] = 'VNĐ';
      $user_data['sender_email'] = '';
      $user_data['added'] = $row->created_at;
      $user_data['status'] = strval($row->user_status);
      $user_data['item_count'] = 0;
      $user_data['category_count'] = 0;
      $user_data['sub_category_count'] = 0;
      $user_data['follow_count'] = 0;
      $user_data['price_decimal_place'] = 0;
      $user_data['cover_image_file'] = strval($row->user_photo_url);
      $user_data['cover_image_width'] = '600';
      $user_data['cover_image_height'] = '400';
      $user_data['cover_image_description'] = $parse_user_data['profile_details']['store_name'];
      $user_data['categories'] = array();

      $user_details = get_user_account_details_by_user_id( $row->id );

      if(count($user_details) > 0){
        $get_user_details = json_decode($user_details[0]['details']);
      } 

      if(!empty($get_user_details->general_details->vendor_home_page_cats)){
        
        $vendor_home_cats = json_decode($get_user_details->general_details->vendor_home_page_cats);
        
        if(count($vendor_home_cats) > 0){
          foreach($vendor_home_cats as $cat){

            $explod_val = explode('#', $cat);
            $get_id = end($explod_val);

            $get_categories_details   =   Term::where('term_id', $get_id)->first();

            $categories_details = array();

            $categories_details['id'] = $get_categories_details['term_id'];
            $categories_details['shop_id'] = $row->id;
            $categories_details['name'] = $get_categories_details['name'];
            $categories_details['is_published'] = $get_categories_details['status'];
            // $categories_details['added'] = $get_categories_details['created_at'];

            $term_extra = TermExtra:: where(['term_id' => $get_categories_details['term_id']])->get();
            if(!empty($term_extra) && $term_extra->count() > 0){
              foreach($term_extra as $term_extra_row){
                
                if(!empty($term_extra_row) && $term_extra_row->key_name == '_category_img_url'){
                  if(!empty($term_extra_row->key_value)){
                    $categories_details['cover_image_file'] = $term_extra_row->key_value;
                  }
                  else{
                    $categories_details['cover_image_file'] = '';
                  }
                }
              }
            }
    
            $categories_details['cover_image_width'] = '292';
            $categories_details['cover_image_height'] = '173';

            $categories_details['sub_categories'] = array();

            $get_sub_categories_details   =   Term::where('parent', $get_id)->get();

            if(!empty($get_sub_categories_details) && $get_sub_categories_details->count() > 0){

              foreach($get_sub_categories_details as $get_sub_categories_detail){

                $sub_categories_details = array();

                $sub_categories_details['id'] = $get_sub_categories_detail['term_id'];
                $sub_categories_details['shop_id'] = $row->id;
                $sub_categories_details['name'] = $get_sub_categories_detail['name'];
                $sub_categories_details['is_published'] = $get_sub_categories_detail['status'];
                // $categories_details['added'] = $get_categories_details['created_at'];
    
                $sub_term_extra = TermExtra:: where(['term_id' => $get_sub_categories_detail['term_id']])->get();
                if(!empty($sub_term_extra) && $sub_term_extra->count() > 0){
                  foreach($sub_term_extra as $sub_term_extra_row){
                    
                    if(!empty($sub_term_extra_row) && $sub_term_extra_row->key_name == '_category_img_url'){
                      if(!empty($sub_term_extra_row->key_value)){
                        $sub_categories_details['cover_image_file'] = $sub_term_extra_row->key_value;
                      }
                      else{
                        $sub_categories_details['cover_image_file'] = '';
                      }
                    }
                  }
                }
                $sub_categories_details['cover_image_width'] = '292';
                $sub_categories_details['cover_image_height'] = '173';
    
                array_push($categories_details['sub_categories'], $sub_categories_details);

              }

            }

            array_push($user_data['categories'], $categories_details);
          }
        }
      }

      array_push($vendors, $user_data);
    }

    // return $get_users;

    // return $parse_user_data;

    return $vendors;
    
  }

    /**
   * Get function for reports
   *
   * @param Start date, End date
   * @return obj
   */

  public static function vendor_by_id($id){
      
    $get_user = DB::table('users')
                  ->where(['users.id' => $id])
                  ->join('role_user', 'users.id', '=', 'role_user.user_id')
                  ->leftJoin('users_details', 'users.id', '=', 'users_details.user_id')
                  ->select('users.*','users_details.details')
                  ->get();

    return json_decode($get_user);
               
  }

}