<?php
namespace dungthinh\Http\Controllers\MobileApp;

use dungthinh\Http\Controllers\Controller;
use Request;
use Illuminate\Support\Facades\Input;
use dungthinh\Library\GetFunction;
use dungthinh\Models\Post;
use dungthinh\Models\PostExtra;
use dungthinh\Models\Product;
use Anam\Phpcart\Cart;
use dungthinh\Models\DownloadExtra;
use dungthinh\Models\User;
use dungthinh\Models\UsersDetail;
use dungthinh\Models\Term;
use dungthinh\Models\TermExtra;


use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Lang;
use Cookie;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
use dungthinh\Http\Controllers\ProductsController;
use dungthinh\Library\CommonFunction;
use dungthinh\Http\Controllers\CMSController;
use dungthinh\Http\Controllers\OptionController;
use dungthinh\Models\OrdersItem;
use dungthinh\Http\Controllers\MobileApp\VendorsMBController;
use dungthinh\Models\SaveCustomDesign;

class MobileAppFrontendController extends Controller
{
  public $classGetFunction;
  public $cart;
  public $product;
  public $classCommonFunction;
  public $CMS;
  public $option;
  public $vendorsmb;
  
  public function __construct() {

    $this->product              =  new ProductsController();
    $this->classCommonFunction  =  new CommonFunction();
    $this->cart                 =  new Cart();
    $this->classGetFunction     =  new GetFunction();
    $this->CMS                  =  new CMSController();
    $this->option               =  new OptionController();
    $this->vendorsmb              =  new VendorsMBController();

  }
  
  /**
   * 
   * Multivendor store list page content
   *
   * @param null
   * @return void 
   */
  public function multivendorStoreListPageContent(){

    $data = array();

    $data['status'] = 'success';
    
    $data['data'] = $this->vendorsmb->getAllVendors( false, null, 1 );

    return response()->json($data);
    
  }

    /**
   * 
   * Singlevendor store list page content
   *
   * @param null
   * @return void 
   */
  public function singlevendorStoreListPageContent($id){

    $data = array();

    $cat_ary = array();

    $data['status'] = 'success';
    
    $row = User::where('id',$id)->first();

    $vd = UsersDetail::where('user_id',$row->id)->first();

    $parse_user_data = json_decode($vd->details,true);

    $data['data']['id'] = strval($row->id);
    $data['data']['name'] = $parse_user_data['profile_details']['store_name'];
    $data['data']['description'] = $parse_user_data['profile_details']['address_line_1'].', '.get_xaphuong($parse_user_data['profile_details']['city']).', '.get_quanhuyen($parse_user_data['profile_details']['state']).', '.get_tinhthanh($parse_user_data['profile_details']['country']);
    $data['data']['email'] = $row->email;
    $data['data']['phone'] = $parse_user_data['profile_details']['phone'];
    $data['data']['address'] = $parse_user_data['profile_details']['address_line_1'];

    $data['data']['coordinate'] =  '';
    $data['data']['lat'] = $parse_user_data['general_details']['latitude'];
    $data['data']['lng'] = $parse_user_data['general_details']['longitude'];

    $data['data']['paypal_enabled'] = strval((int)$parse_user_data['payment_method']['paypal']['status']);
    $data['data']['stripe_enabled'] = strval((int)$parse_user_data['payment_method']['stripe']['status']);
    $data['data']['cod_enabled'] = strval((int)$parse_user_data['payment_method']['cod']['status']);
    $data['data']['banktransfer_enabled'] = strval((int)$parse_user_data['payment_method']['dbt']['status']);

    $data['data']['paypal_email'] = $parse_user_data['payment_method']['paypal']['email_id'];
    $data['data']['paypal_environment'] = '';
    $data['data']['paypal_appid_live'] = '';
    $data['data']['paypal_merchantname'] = '';
    $data['data']['paypal_customerid'] = '';
    $data['data']['paypal_ipnurl'] = '';
    $data['data']['paypal_memo'] = '';
    
    $data['data']['bank_account'] = $parse_user_data['payment_method']['dbt']['account_number'];
    $data['data']['bank_name'] = $parse_user_data['payment_method']['dbt']['bank_name'];
    $data['data']['bank_code'] = $parse_user_data['payment_method']['dbt']['short_code'];
    $data['data']['branch_code'] = $parse_user_data['payment_method']['dbt']['IBAN'];
    $data['data']['swift_code'] = $parse_user_data['payment_method']['dbt']['SWIFT'];

    $data['data']['cod_email'] = $parse_user_data['payment_method']['cod']['title'];

    $data['data']['stripe_publishable_key'] = '';
    $data['data']['stripe_secret_key'] = '';

    $data['data']['currency_symbol'] = '₫';
    $data['data']['currency_short_form'] = 'VNĐ';
    $data['data']['sender_email'] = '';
    $data['data']['added'] = $row->created_at;
    $data['data']['status'] = strval($row->user_status);
    $data['data']['item_count'] = 0;
    $data['data']['category_count'] = 0;
    $data['data']['sub_category_count'] = 0;
    $data['data']['follow_count'] = 0;
    $data['data']['price_decimal_place'] = 0;
    $data['data']['cover_image_file'] = strval($parse_user_data['general_details']['cover_img']);
    $data['data']['cover_image_width'] = '600';
    $data['data']['cover_image_height'] = '400';
    $data['data']['cover_image_description'] = $parse_user_data['profile_details']['store_name'];
    $data['data']['categories'] = array();

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

            $categories_details['id'] = strval($get_categories_details['term_id']);
            $categories_details['shop_id'] = strval($row->id);
            $categories_details['name'] = $get_categories_details['name'];
            $categories_details['is_published'] = strval($get_categories_details['status']);
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

                $sub_categories_details['id'] = strval($get_sub_categories_detail['term_id']);
                $sub_categories_details['shop_id'] = strval($row->id);
                $sub_categories_details['name'] = $get_sub_categories_detail['name'];
                $sub_categories_details['is_published'] = strval($get_sub_categories_detail['status']);
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

            array_push($data['data']['categories'], $categories_details);
          }
        }
      }





    return response()->json($data);

    return response()->json($vd);

    
  }

  
    /**
   * 
   * Multivendor store single page products categories content
   *
   * @param null
   * @return void 
   */
  public function multivendorStoreSinglePageProductsCatContent( $params, $params1, $params2, $params3 ){

    $data = array();
    $vd = $params;
    $cat = $params1;
    $limit = $params2;
    $offset = $params3;
    
    $data['status'] = 'success';
    
    $data['data'] =  $this->product->getProductByCatID($vd,$cat,$limit,$offset);

    return response()->json($data);

  }

    /**
   * 
   * Product single page content
   *
   * @param null
   * @return void 
   */
  public function productSinglePageContent( $params, $params1 ){

    $data = array();

    $id = $params;
    
    $data['status'] = 'success';
    
    $data['data'] =  $this->product->getProductDataByIdApp($id);

    return response()->json($data);


    
  }


  /**
   * 
   * Multivendor store single page home content
   *
   * @param null
   * @return void 
   */
  public function multivendorStoreSinglePageHomeContent( $params ){
    $data = array();
    $user = $params;
    
    $get_user = User::where(['name' => $user, 'user_status' => 1])->first();
    if(empty($get_user)){
      return view('errors.vendor_not_active');
    }
    
    $data = $this->classCommonFunction->get_dynamic_frontend_content_data();
    $data['vendor_settings'] = null;
    $data['vendor_selected_cats_id'] = array();
    
    $get_user = User::where(['name' => $user])->first();
    if(!empty($get_user)){
      if(is_vendor_expired( $get_user->id )){
        return view('errors.vendor_expired');
      }
      
      $data['vendor_package_details'] = get_package_details_by_vendor_id($get_user->id);
      $data['vendor_settings'] = null;
      $get_user_details = null;
      $user_details = get_user_account_details_by_user_id( $get_user->id );

      if(count($user_details) > 0){
        $get_user_details = json_decode($user_details[0]['details']);
      } 

      $data['vendor_info'] = $get_user;
      $data['vendor_settings'] = $get_user_details;
      
      $get_global_seo = get_seo_data();
      $store_seo = $get_user_details->seo;

      $data['store_seo_meta_keywords'] = null;
      $data['store_seo_meta_description'] = null;

      if(isset($get_global_seo['meta_tag']['meta_keywords']) && !empty($store_seo->meta_keywords)){
        $data['store_seo_meta_keywords'] = trim($get_global_seo['meta_tag']['meta_keywords'].', '.$store_seo->meta_keywords, ',');
      }
      elseif(isset($get_global_seo['meta_tag']['meta_keywords']) && empty($store_seo->meta_keywords)){
        $data['store_seo_meta_keywords'] = $get_global_seo['meta_tag']['meta_keywords'];
      }
      else{
        $data['store_seo_meta_keywords'] = $store_seo->meta_keywords;
      }

      if(!empty($store_seo->meta_decription)){
        $data['store_seo_meta_description'] = $store_seo->meta_decription;
      }
      
      $data['vendor_home_page_cats'] = array();
      if(!empty($get_user_details->general_details->vendor_home_page_cats)){
        $vendor_home_cats = json_decode($get_user_details->general_details->vendor_home_page_cats);
        
        if(count($vendor_home_cats) > 0){
          foreach($vendor_home_cats as $cat){
            $explod_val = explode('#', $cat);
            $get_id = end($explod_val);
            $parent_cat = $this->product->getTermDataById( $get_id );

            array_push($data['vendor_home_page_cats'], array('parent_cat' => array_shift($parent_cat), 'child_cat' => $this->product->get_categories($get_id, 'product_cat')));
          }
        }
      }

      $data['vendor_advanced_items'] = $this->product->getVendorAdvancedProducts( $get_user->id );
      $data['vendor_reviews_rating_details']  =  get_comments_rating_details( $get_user->id, 'vendor' );
      
      return view('pages.frontend.vendors.vendor-details', $data);
    }
    else{
      return view('errors.no_data');
    }
  }
  
  /**
   * 
   * Multivendor store single page products content
   *
   * @param null
   * @return void 
   */
  public function multivendorStoreSinglePageProductsContent( $params ){
    $data = array();
    $user = $params;
    
    $get_user = User::where(['name' => $user, 'user_status' => 1])->first();
    if(empty($get_user)){
      return view('errors.vendor_not_active');
    }
    
    $data = $this->classCommonFunction->get_dynamic_frontend_content_data();
    $data['vendor_settings'] = null;
    $data['vendor_selected_cats_id'] = array();
    
    $get_user = User::where(['name' => $user])->first();
    if(!empty($get_user)){
      if(is_vendor_expired( $get_user->id )){
        return view('errors.vendor_expired');
      }
      
      $data['vendor_package_details'] = get_package_details_by_vendor_id($get_user->id);
      $data['vendor_settings'] = null;
      $get_user_details = null;
      $user_details = get_user_account_details_by_user_id( $get_user->id );

      if(count($user_details) > 0){
        $get_user_details = json_decode($user_details[0]['details']);
      } 

      $data['vendor_info'] = $get_user;
      $data['vendor_settings'] = $get_user_details;
      
      $get_global_seo = get_seo_data();
      $store_seo = $get_user_details->seo;

      $data['store_seo_meta_keywords'] = null;
      $data['store_seo_meta_description'] = null;

      if(isset($get_global_seo['meta_tag']['meta_keywords']) && !empty($store_seo->meta_keywords)){
        $data['store_seo_meta_keywords'] = trim($get_global_seo['meta_tag']['meta_keywords'].', '.$store_seo->meta_keywords, ',');
      }
      elseif(isset($get_global_seo['meta_tag']['meta_keywords']) && empty($store_seo->meta_keywords)){
        $data['store_seo_meta_keywords'] = $get_global_seo['meta_tag']['meta_keywords'];
      }
      else{
        $data['store_seo_meta_keywords'] = $store_seo->meta_keywords;
      }

      if(!empty($store_seo->meta_decription)){
        $data['store_seo_meta_description'] = $store_seo->meta_decription;
      }
      
      $data['vendor_home_page_cats'] = array();
      if(!empty($get_user_details->general_details->vendor_home_page_cats)){
        $vendor_home_cats = json_decode($get_user_details->general_details->vendor_home_page_cats);
        
        if(count($vendor_home_cats) > 0){
          foreach($vendor_home_cats as $cat){
            $explod_val = explode('#', $cat);
            $get_id = end($explod_val);
            $parent_cat = $this->product->getTermDataById( $get_id );
            array_push($data['vendor_selected_cats_id'], $get_id);
            array_push($data['vendor_home_page_cats'], array('parent_cat' => array_shift($parent_cat), 'child_cat' => $this->product->get_categories($get_id, 'product_cat')));
          }
        }
      }

      $data['vendor_advanced_items'] = $this->product->getVendorAdvancedProducts( $get_user->id );
      $data['vendor_reviews_rating_details']  =  get_comments_rating_details( $get_user->id, 'vendor' );
      
      //
      $sort = null;
      $price_min = null;
      $price_max = null;
      $selected_colors = null;
      $selected_sizes = null;

      if(isset($_GET['sort_by'])){
        $sort = $_GET['sort_by'];
      }

      if(isset($_GET['price_min'])){
        $price_min = $_GET['price_min'];
      }

      if(isset($_GET['price_max'])){
        $price_max = $_GET['price_max'];
      }

      if(isset($_GET['selected_colors'])){
        $selected_colors = $_GET['selected_colors'];
      }

      if(isset($_GET['selected_sizes'])){
        $selected_sizes = $_GET['selected_sizes'];
      }

      $data['popular_tags_list']  =   $this->product->getTermData( 'product_tag', false, null, 1 );
      $data['colors_list_data']   =   $this->product->getTermData( 'product_colors', false, null, 1 );
      $data['sizes_list_data']    =   $this->product->getTermData( 'product_sizes', false, null, 1 );

      $get_product = $this->product->getProductsByUserId( $get_user->id, $params, array('sort' => $sort, 'price_min' => $price_min, 'price_max' => $price_max, 'selected_colors' => $selected_colors, 'selected_sizes' => $selected_sizes) );

      if(count($get_product) > 0){
        $data['vendor_products'] = $get_product;

        if(count($data['vendor_products']) > 0){
          $data['vendor_products']['action_url'] = Request::url();

          $currentQuery = Request::query();

          if(count($currentQuery) > 0){
            if(isset($currentQuery['view'])){
              unset($currentQuery['view']);
            }

            if(count($currentQuery) > 0){
              $currentQuery['view'] = 'list';
              $data['vendor_products']['action_url_list_view'] = Request::url(). '?' . http_build_query($currentQuery);
              $currentQuery['view'] = 'grid';
              $data['vendor_products']['action_url_grid_view'] = Request::url(). '?' . http_build_query($currentQuery);
            }
            else{
              $data['vendor_products']['action_url_list_view'] = Request::url(). '?view=list';
              $data['vendor_products']['action_url_grid_view'] = Request::url(). '?view=grid';
            }
          }
          else{
            $data['vendor_products']['action_url_list_view'] = Request::url(). '?view=list';
            $data['vendor_products']['action_url_grid_view'] = Request::url(). '?view=grid';
          }

          if(isset($_GET['view']) && $_GET['view'] == 'list'){
            $data['vendor_products']['selected_view'] = 'list'; 
          }
          elseif(isset($_GET['view']) && $_GET['view'] == 'grid'){
            $data['vendor_products']['selected_view'] = 'grid'; 
          }
          else{
            $data['vendor_products']['selected_view'] = 'grid';
          }
        }
      }
      else{
        return view('errors.no_data');
      }

      // return response()->json($data);
      
      return view('pages.frontend.vendors.vendor-details', $data);
    }
    else{
      return view('errors.no_data');
    }
  }
  
  /**
   * 
   * Multivendor store single page review content
   *
   * @param null
   * @return void 
   */
  public function multivendorStoreSinglePageReviewContent( $params ){
    $data = array();
    $user = $params;
    
    $get_user = User::where(['name' => $user, 'user_status' => 1])->first();
    if(empty($get_user)){
      return view('errors.vendor_not_active');
    }
    
    $data = $this->classCommonFunction->get_dynamic_frontend_content_data();
    $data['vendor_settings'] = null;
    $data['vendor_selected_cats_id'] = array();
    
    $get_user = User::where(['name' => $user])->first();
    if(!empty($get_user)){
      if(is_vendor_expired( $get_user->id )){
        return view('errors.vendor_expired');
      }
      
      $data['vendor_package_details'] = get_package_details_by_vendor_id($get_user->id);
      $data['vendor_settings'] = null;
      $get_user_details = null;
      $user_details = get_user_account_details_by_user_id( $get_user->id );

      if(count($user_details) > 0){
        $get_user_details = json_decode($user_details[0]['details']);
      } 

      $data['vendor_info'] = $get_user;
      $data['vendor_settings'] = $get_user_details;
      
      $get_global_seo = get_seo_data();
      $store_seo = $get_user_details->seo;

      $data['store_seo_meta_keywords'] = null;
      $data['store_seo_meta_description'] = null;

      if(isset($get_global_seo['meta_tag']['meta_keywords']) && !empty($store_seo->meta_keywords)){
        $data['store_seo_meta_keywords'] = trim($get_global_seo['meta_tag']['meta_keywords'].', '.$store_seo->meta_keywords, ',');
      }
      elseif(isset($get_global_seo['meta_tag']['meta_keywords']) && empty($store_seo->meta_keywords)){
        $data['store_seo_meta_keywords'] = $get_global_seo['meta_tag']['meta_keywords'];
      }
      else{
        $data['store_seo_meta_keywords'] = $store_seo->meta_keywords;
      }

      if(!empty($store_seo->meta_decription)){
        $data['store_seo_meta_description'] = $store_seo->meta_decription;
      }
      
      $data['comments_details']               =  get_comments_data_by_object_id( $get_user->id, 'vendor' );
      $data['comments_rating_details']        =  get_comments_rating_details( $get_user->id, 'vendor' );
      $data['vendor_reviews_rating_details']  =  get_comments_rating_details( $get_user->id, 'vendor' );
      $data['user_name']                      =  $user;
      
      return view('pages.frontend.vendors.vendor-details', $data);

      // return response()->json($data['comments_details']);

    }
    else{
      return view('errors.no_data');
    }
  }
  
  /**
   * 
   * Product comparison page content
   *
   * @param null
   * @return void 
   */
  public function productComparisonPageContent(){
    $data = array();
    
    $data = $this->classCommonFunction->get_dynamic_frontend_content_data();
    $data['compare_product_data']  = array();
    $data['compare_product_label'] = null;

    $compare_data     =  $this->option->getProductCompareData();
    $custom_data      =  array('Image', 'Product', 'Price');

    if(!empty($compare_data)){
      $data['compare_product_label'] = (object) array_merge($custom_data, (array) $compare_data);
    }
    else{
      $data['compare_product_label'] = (object) $custom_data;
    }

    if(Session::has('shopist_selected_compare_product_ids') && count(Session::get('shopist_selected_compare_product_ids')) > 0){
      $get_comparison_product = Session::get('shopist_selected_compare_product_ids');

      foreach($get_comparison_product as $product){
        array_push($data['compare_product_data'],	$this->product->getProductDataById( $product ));
      }
    }
    
    return view('pages.frontend.frontend-pages.product-comparison', $data);
  }
  
  /**
   * 
   * Tag single page content
   *
   * @param null
   * @return void 
   */
  public function tagSinglePageContent( $params ){
    $data = array();
    $get_tag_by_slug = get_products_by_product_tag_slug( $params );
      
    if(count($get_tag_by_slug) > 0){
      $data = $this->classCommonFunction->get_dynamic_frontend_content_data();
      $data['tag_single_details']  =  $get_tag_by_slug;
      $data['popular_tags_list']   =  $this->product->getTermData( 'product_tag', false, null, 1 );
      
      return view('pages.frontend.frontend-pages.tag-single-page', $data);
    }
    else{
      return view('errors.no_data');
    }
  }
  
  /**
   * 
   * Designer single page content
   *
   * @param null
   * @return void 
   */
  public function designerSinglePageContent( $params ){
    $get_product = Product::where(['slug' => $params, 'status' => 1])->first();
      
    if(!empty($get_product)){
      $data = array();
      $product_id  = $get_product->id;
      $get_product_type = get_product_type($product_id);
      
      if($get_product_type == 'customizable_product'){
        $get_current_user_data  =  get_current_frontend_user_info();

        $data = $this->classCommonFunction->get_dynamic_frontend_content_data();
        $data['single_product_details']  =  $this->product->getProductDataById( $product_id );

        if(is_frontend_user_logged_in() && isset($get_current_user_data['user_role_slug']) && $data['single_product_details']['_is_role_based_pricing_enable'] == 'yes'){
          if(isset($data['single_product_details']['_role_based_pricing'][$get_current_user_data['user_role_slug']])){

            $regular_price = $data['single_product_details']['_role_based_pricing'][$get_current_user_data['user_role_slug']]['regular_price'];
            $sale_price = $data['single_product_details']['_role_based_pricing'][$get_current_user_data['user_role_slug']]['sale_price'];

            if(isset($regular_price) && $regular_price && isset($sale_price) && $sale_price && $regular_price > $sale_price){
              $data['single_product_details']['offer_price'] = get_product_price_html_by_filter($regular_price);
              $data['single_product_details']['solid_price'] = get_product_price_html_by_filter($sale_price);
            }
            elseif(isset($regular_price) && $regular_price){
              $data['single_product_details']['offer_price'] = null;
              $data['single_product_details']['solid_price'] = get_product_price_html_by_filter($regular_price);
            }
            else{
              $data['single_product_details']['offer_price'] = null;
              $data['single_product_details']['solid_price'] = 0;
            }
          }
        }  
        else{
          if($data['single_product_details']['post_regular_price'] && $data['single_product_details']['post_regular_price'] >0 && $data['single_product_details']['post_sale_price'] && $data['single_product_details']['post_sale_price']>0 && $data['single_product_details']['post_regular_price'] > $data['single_product_details']['post_sale_price'] ){
            $data['single_product_details']['offer_price'] = get_product_price_html_by_filter($data['single_product_details']['post_regular_price']);
          }
          else{
            $data['single_product_details']['offer_price'] = null;
          }

          $data['single_product_details']['solid_price']   = get_product_price_html_by_filter($data['single_product_details']['post_price']);
        }

        $data['single_product_details']['is_user_login']   = 'no';
        $data['single_product_details']['login_user_slug'] = '';

        if(is_frontend_user_logged_in()){
          $data['single_product_details']['is_user_login'] = 'yes';
        }

        if(count($get_current_user_data) > 0 && isset($get_current_user_data['user_role_slug'])){
          $data['single_product_details']['login_user_slug'] = $get_current_user_data['user_role_slug'];
        }

        if(Cookie::has('shopist_multi_currency')){
          $current_currency_name = get_current_currency_name();
          $to_currency    =  Cookie::get('shopist_multi_currency');
        }

        $product_url = default_placeholder_img_src();
        $data['product_zoom_image'] = $product_url;

        if($data['single_product_details']['_product_related_images_url']->product_image){
          $product_url = $data['single_product_details']['_product_related_images_url']->product_image;
          $data['product_zoom_image'] = $this->classCommonFunction->createZoomImageUrl( $product_url );
        }

        $data['single_product_details']['_product_related_images_url']->product_image = $product_url;

        $product = (object) array('id' => time(), 'url' => $product_url);
        $data['single_product_details']['_product_related_images_url']->product_gallery_images[0] = $product;

        $gallery_images = $data['single_product_details']['_product_related_images_url']->product_gallery_images;
        if(count($gallery_images) > 0){
          foreach($gallery_images as $images){
            $images->zoom_img_url = $this->classCommonFunction->createZoomImageUrl( $images->url );
          }
        }

        $data['attr_lists']               =   $this->product->getAllAttributes( $product_id );
        $data['related_items']            =   $this->product->getRelatedItems( $product_id );  
        $data['comments_details']         =   get_comments_data_by_object_id( $product_id, 'product' );
        $data['comments_rating_details']  =   get_comments_rating_details( $product_id, 'product' );
        $data['vendor_reviews_rating_details']  =   get_comments_rating_details( get_vendor_id_by_product_id($product_id), 'vendor' );
        $data['fonts_list']               =   $this->product->getFontsList( false, null, 1 );
        $data['shape_list']               =   $this->product->getShapeList( false, null, 1 );

        $get_seo_data = get_seo_data();

        if(isset($get_seo_data['meta_tag']['meta_keywords']) && isset($data['single_product_details']['_product_seo_keywords'])){
          $data['single_product_details']['meta_keywords'] = trim( trim($get_seo_data['meta_tag']['meta_keywords'], ','). ',' .trim($data['single_product_details']['_product_seo_keywords'], ','), ',');
        }
        elseif(!isset($get_seo_data['meta_tag']['meta_keywords']) && isset($data['single_product_details']['_product_seo_keywords'])){
          $data['single_product_details']['meta_keywords'] = trim($data['single_product_details']['_product_seo_keywords'], ',');
        }
        elseif(isset($get_seo_data['meta_tag']['meta_keywords']) && !isset($data['single_product_details']['_product_seo_keywords'])){
          $data['single_product_details']['meta_keywords'] = trim($get_seo_data['meta_tag']['meta_keywords'], ',');
        }
        else{
          $data['single_product_details']['meta_keywords'] = null;
        }

        $data['upsell_products'] = get_upsell_products( $product_id );
        $data['designer_settings'] = $this->option->getCustomDesignerSettingsData();
        $data['art_cat_lists_data']  =   $this->product->getTermData( 'designer_cat', false, null, 1 );

        if($data['single_product_details']['_product_custom_designer_settings']['enable_global_settings'] == 'yes'){
          if(count($data['designer_settings'])>0){
            $data['designer_hf_data'] = $data['designer_settings']['general_settings'];
          }
        }
        elseif($data['single_product_details']['_product_custom_designer_settings']['enable_global_settings'] == 'no'){
          if(count($data['single_product_details']['_product_custom_designer_settings']) >0){
            $data['designer_hf_data'] = $data['single_product_details']['_product_custom_designer_settings'];
          }
        }

        $get_data = SaveCustomDesign ::where('product_id', $product_id)->first();

        if(!empty($get_data)){
          $data['design_json_data'] = $get_data['design_data'];
        }
        else{
          $data['design_json_data'] = null;
        }
        
        $get_variation_data = get_product_variations_with_data( $product_id );
      
        if(count($get_variation_data) > 0){
          $variation_data = array();

          foreach($get_variation_data as $row){
            if(isset($row['_variation_post_price'])){
              $row['_variation_post_price'] = price_html( get_product_price_html_by_filter(get_role_based_price_by_product_id($row['id'], $row['_variation_post_price'])), get_frontend_selected_currency());
            }
            
            $get_current_user_data  =  get_current_frontend_user_info();
    
            if(is_frontend_user_logged_in() && isset($get_current_user_data['user_role_slug']) ){
              if($row['_is_role_based_pricing_enable'] == true){
                if(isset($row['_role_based_pricing_array'][$get_current_user_data['user_role_slug']])){
                  $regular_price =  $row['_role_based_pricing_array'][$get_current_user_data['user_role_slug']]['regular_price'];
                  $sale_price    =  $row['_role_based_pricing_array'][$get_current_user_data['user_role_slug']]['sale_price'];

                  $row['regular_price_comp_val'] = $regular_price;
                  $row['sales_price_comp_val']   = $sale_price;

                  $row['regular_price'] = price_html( get_product_price_html_by_filter(get_role_based_price_by_product_id($row['id'], $regular_price)), get_frontend_selected_currency());
                  $row['sales_price']   = price_html( get_product_price_html_by_filter(get_role_based_price_by_product_id($row['id'], $sale_price)), get_frontend_selected_currency());
                }
              }
            } 

            array_push($variation_data, $row);
          }

          $data['variations_data'] = $variation_data;
        }
        else{
          $data['variations_data'] = $get_variation_data;
        }

        return view('pages.frontend.frontend-pages.frontend-designer', $data);
      }
      else{
        return view('errors.no_data');
      }
    }
    else{
      return view('errors.no_data');
    }
  }
  
  /**
   * 
   * Checkout received order
   *
   * @param order_id, order_processing_id
   * @return void 
   */
  public function thankyouPageContent( $params, $params2 ){

    $data = array();

    $is_user_login = false;
    $get_user_login_data = get_current_frontend_user_info();

    if(Session::has('shopist_frontend_user_id') && isset($get_user_login_data['user_id'])){
      $is_user_login = true;
    }

    $get_order_data = $this->classCommonFunction->get_order_details_by_order_id(array('order_id' => $params, 'order_process_id' => $params2));
    $data = $this->classCommonFunction->get_dynamic_frontend_content_data();
    
    if(count($get_order_data) > 0){
      $get_order_data['settings'] = $this->option->getSettingsData();  
      $data['order_details_for_thank_you_page'] = $get_order_data;
    }
    else{
      $data['order_details_for_thank_you_page'] = array();
    }

    $data['is_user_login'] = $is_user_login;

    // return response()->json($data['is_user_login']);
    
    return view('pages.frontend.frontend-pages.thank-you', $data);
  }

  /**
   * 
   *Manage for cart page
   *
   * @param null
   * @return void 
   */
  public function doActionFromCartPage(){
    $data = Input::all();
            
    if( Request::isMethod('post') && isset($data['empty_cart']) && Session::token() == Input::get('_token')){
      $this->cart->clear();
      return redirect()->back();
    }
    elseif( Request::isMethod('post') && isset($data['update_cart']) && Session::token() == Input::get('_token')){
      if(count($data['cart_quantity']) > 0){
        foreach($data['cart_quantity'] as $key => $qty){
          $this->cart->updateQty($key, $qty);
        }
      }
      return redirect()->back();
    }
    elseif( Request::isMethod('post') && isset($data['checkout']) && Session::token() == Input::get('_token')){
      if($this->cart->getItems()){
        foreach($this->cart->getItems() as $items){
          if($items->variation_id && count($items->options) > 0){
            $variation_product_data = $this->classCommonFunction->get_variation_and_data_by_post_id( $items->variation_id );
            
            if($variation_product_data['_variation_post_price'] == 0){
              Session::flash('message', Lang::get('frontend.sorry_label') .' '. get_product_title($variation_product_data['parent_id']) .' '. Lang::get('frontend.price_zero_validation'));
              $this->cart->clear();
              return redirect()->back();
            }

            if($variation_product_data['_variation_post_manage_stock'] == 1){
              if($variation_product_data['_variation_post_manage_stock_qty'] == 0){
                Session::flash('message', Lang::get('frontend.sorry_label') .' '.get_product_title($variation_product_data['parent_id']) .' '. Lang::get('frontend.stock_validation'));
                $this->cart->clear();
                return redirect()->back();
              }

              if(isset($this->cart->get($items->id)->quantity)){
               $cat_qty = $this->cart->get($items->id)->quantity;

               if($cat_qty > $variation_product_data['_variation_post_manage_stock_qty']){
                 Session::flash('message', Lang::get('frontend.sorry_label') .' '.get_product_title($variation_product_data['parent_id']) .' '. Lang::get('frontend.stock_validation'));
                 $this->cart->clear();
                 return redirect()->back();
               }
              }
            }
          }
          else{
            $product_data = $this->classCommonFunction->get_product_data_by_product_id( $items->id );
          
            if($product_data['product_price'] == 0){
              Session::flash('message', Lang::get('frontend.sorry_label') .' '.$product_data['post_title'] .' '. Lang::get('frontend.price_zero_validation'));
              $this->cart->clear();
              return redirect()->back();
            }

            if($product_data['product_manage_stock'] == 'yes'){
              if($product_data['product_manage_stock_qty'] == 0){
                Session::flash('message', Lang::get('frontend.sorry_label') .' '.$product_data['post_title'] .' '. Lang::get('frontend.stock_validation'));
                $this->cart->clear();
                return redirect()->back();
              }

              if(isset($this->cart->get($items->id)->quantity)){
               $cat_qty = $this->cart->get($items->id)->quantity;

               if($cat_qty > $product_data['product_manage_stock_qty']){
                 Session::flash('message', Lang::get('frontend.sorry_label') .' '.$product_data['post_title'] .' '. Lang::get('frontend.stock_validation'));
                 $this->cart->clear();
                 return redirect()->back();
               }
              }
            }
          }
        }
        
        return redirect()->route('checkout-page');
      }
    }
  }

  /**
   * 
   *Item remove from cart
   *
   * @param item id
   * @return void
   */
  public function doActionForRemoveItem( $item_id ){
    if($item_id){
      if( $this->cart->remove( $item_id ) ){
        return redirect()->back();
      }
    }
  }
  
  /**
   * 
   *Remove compare product from list
   *
   * @param product id
   * @return void
   */
  public function doActionForRemoveCompareProduct( $product_id ){
    if($product_id){
      if(Session::has('shopist_selected_compare_product_ids') && count(Session::get('shopist_selected_compare_product_ids')) > 0){
        $array = array();
        foreach(Session::get('shopist_selected_compare_product_ids') as $val){
          if($val != $product_id){
            array_push($array, $val);
          }
        }
        
        Session::forget('shopist_selected_compare_product_ids');
        Session::put('shopist_selected_compare_product_ids', $array);
        
        return redirect()->back();
      }
    }
  }
  
  /**
   * 
   * Force file download for downloadable product
   *
   * @param product id, file key
   * @return void
   */
  public function forceDownload( $post_id, $order_id, $file_key, $target ){
    $get_orders_items  =   OrdersItem::where(['order_id' => $order_id])->first();
    
    if(!empty($get_orders_items)){
      $orders_items = json_decode( $get_orders_items->order_data, TRUE );
    }
    
    if( $this->classCommonFunction->checkDownloadRequired( $orders_items[$post_id]['download_data'], $order_id, $orders_items[$post_id]['download_data']['downloadable_files'][$file_key]['file_name'] ) && isset($orders_items[$post_id]['download_data']['downloadable_files'][$file_key]) && isset($orders_items[$post_id]['download_data']['downloadable_files'][$file_key][$target]) ){
      $parse_url = explode('uploads', $orders_items[$post_id]['download_data']['downloadable_files'][$file_key][$target]);
      
      if(count($parse_url) > 0 && isset($parse_url[1])){
        $file_path = public_path().'/uploads'.$parse_url[1];
        
        if(File::exists($file_path)){
          $get_extension = File::extension($file_path);
          $get_content_type = File::mimeType($file_path);

          if(!empty($get_extension) && !empty($get_content_type)){
            $filename = time().'-'.uniqid(true).'.'.$get_extension;
            
            $user_id = 0;
            $get_post = PostExtra::where(['post_id' => $order_id, 'key_name' => '_order_process_key'])->first();

            if(is_frontend_user_logged_in()){
              $get_user_info = get_current_frontend_user_info();
              $user_id = $get_user_info['user_id'];
            }
            
            //save download data
            $downloadextra = new DownloadExtra;
            $downloadextra->post_id      =   $post_id;
            $downloadextra->order_id     =   $order_id;
            $downloadextra->order_key		  =   $get_post->key_value;
            $downloadextra->user_id			   =   $user_id;
            $downloadextra->file_name		  =   $orders_items[$post_id]['download_data']['downloadable_files'][$file_key]['file_name'];
            $downloadextra->file_url		   =   $parse_url[1];
            
            if($downloadextra->save()){
              header('Content-Description: File Transfer');
              header('Cache-Control: public');
              header('Content-Type: '.$get_content_type);
              header("Content-Transfer-Encoding: binary");
              header('Content-Disposition: attachment; filename='. $filename);
              header('Content-Length: '.filesize($file_path));
              ob_clean(); 
              flush();
              readfile($file_path);
              exit;
            }
          }
        } 
      }
    }

  }

  /**
   * 
   * Seen Items
   *
   * @return void
   */

  public function seenProducts(){

    //Lấy related item

    $products_id = session()->get('products.recently_viewed');

    if (!empty($products_id)){

      $products_id = array_unique($products_id);

      $seen_items = array();

      foreach($products_id as $row){

        $get_post = Product :: where('id', $row)->where('status',1)->first();

        if(!empty($get_post)){

          $sp = $this->classCommonFunction->get_product_data_by_product_id( $row );
        
          array_push($seen_items, $sp);

        }
      }

    }else{

      $seen_items = '';

    }

    return $seen_items;
    
  }

}