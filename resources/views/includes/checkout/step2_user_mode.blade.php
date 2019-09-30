    @section('user_mode')

     <!-- Xác định người dùng -->
     @if($_settings_data['general_settings']['checkout_options']['enable_guest_user'] == true || $_settings_data['general_settings']['checkout_options']['enable_login_user'] == true)
     <div id="user_mode" class="step well">
 
         <div class="checkout-process-user-mode">
         <h4>{!! trans('frontend.user_mode_label') !!}</h4>
         <hr class="padding-bottom-1x">
 
         <ul style="list-style:none; padding-left:0!important">
 
             @if($_settings_data['general_settings']['checkout_options']['enable_guest_user'] == true && $is_user_login == false)  
             <li>
                 <label>
                 <input type="radio" class="shopist-iCheck" name="user_checkout_complete_type" value="guest">&nbsp; {!! trans('frontend.guest_checkout') !!}
                 </label>
             </li>
             @endif
             
             @if($_settings_data['general_settings']['checkout_options']['enable_login_user'] == true)
             <li>
                 <label><input type="radio" class="shopist-iCheck" name="user_checkout_complete_type" value="login_user">&nbsp; {!! trans('frontend.login_user_checkout') !!}</label>
             </li>
             @endif
 
         </ul>
         </div>
     </div>
     @endif
    
    @endsection
