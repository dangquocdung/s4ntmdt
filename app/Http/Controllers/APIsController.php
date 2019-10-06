<?php

namespace shopist\Http\Controllers;

use Illuminate\Http\Request;

class APIsController extends Controller
{
    public function userAccountPageContentAPI(){
        $data = array();
        
        $dashboard_total['total_order']   = 0;
        $dashboard_total['todays_order']  = 0;
        $dashboard_total['recent_coupon'] = 0;
    
        $get_current_user_id = get_current_frontend_user_info();
    
        if(!empty($get_current_user_id) && count($get_current_user_id) > 0){
          $total_order  = Post::where(['post_author_id' => $get_current_user_id['user_id'], 'post_type' => 'shop_order'])->get()->toArray();
          $todays_order = Post::whereDate('created_at', '=', $this->carbonObject->today()->toDateString())->where(['post_author_id' => $get_current_user_id['user_id'], 'post_type' => 'shop_order'])->get()->toArray();
          $recent_coupon = PostExtra::where(['key_name' => '_coupon_allow_role_name', 'key_value' => $get_current_user_id['user_role_slug']])->get()->toArray();
    
          $dashboard_total['total_order']   = count($total_order);
          $dashboard_total['todays_order']  = count($todays_order);
          $dashboard_total['recent_coupon'] = count($recent_coupon);  
        }
        
        $data = $this->classCommonFunction->get_dynamic_frontend_content_data();
        $data['dashboard_data'] =  $dashboard_total;
        $data['login_user_details'] =  get_current_frontend_user_info();

        return response()->json($data);
        

        // return view('pages.frontend.user-account.user-account-pages', $data);
      }
    
}
