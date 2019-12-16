@section('login_user_address')

 <!-- Login user address -->
 @if($_settings_data['general_settings']['checkout_options']['enable_login_user'] == true && $is_user_login == true)
 <div id="login_user_address" class="step well">
     <div class="text-right">
     @if(!empty($login_user_account_data) && !empty($login_user_account_data->address_details))
         <a href="{{ route('my-address-edit-page') }}" class="btn btn-secondary btn-sm">{{ trans('frontend.edit_address') }}</a>
     @else
         <a href="{{ route('my-address-add-page') }}" class="btn btn-secondary btn-sm">{{ trans('frontend.add_address') }}</a>
     @endif
     </div>
     <br>
     <div class="user-address-content">
     <div class="row address-information clearfix">
         <div class="col-md-6 address-content-sub">
         <h4>{!! trans('frontend.billing_address') !!}</h4><br>
         @if(!empty($login_user_account_data) && !empty($login_user_account_data->address_details))

            <p>{!! $login_user_account_data->address_details->account_bill_last_name .' '. $login_user_account_data->address_details->account_bill_first_name !!}</p>

            @if($login_user_account_data->address_details->account_bill_phone_number)
                <p><strong>{{ trans('frontend.phone') }}:</strong> {!! $login_user_account_data->address_details->account_bill_phone_number !!}</p>
            @endif

            <p><strong>{{ trans('frontend.address_1') }}:</strong> {!! $login_user_account_data->address_details->account_bill_adddress_line_1 !!}</p>

            <p><strong>{{ trans('frontend.city') }}:</strong> {!! get_xaphuong($login_user_account_data->address_details->account_bill_select_city) !!}</p>

            <p><strong>{{ trans('frontend.state') }}:</strong> {!! get_quanhuyen($login_user_account_data->address_details->account_bill_select_state) !!}</p>

            <p><strong>{{ trans('frontend.country') }}:</strong> {{ get_tinhthanh($login_user_account_data->address_details->account_bill_select_country) }}</p>

            <br>

         @else
            <p>{{ trans('frontend.billing_address_not_available') }}</p>
         @endif
         </div>
         <div class="col-md-6 address-content-sub">
         <h4>{!! trans('frontend.shipping_address') !!}</h4><br>

         @if(!empty($login_user_account_data) && !empty($login_user_account_data->address_details))

            <p>{!! $login_user_account_data->address_details->account_shipping_last_name .' '. $login_user_account_data->address_details->account_shipping_first_name !!}</p>

            @if($login_user_account_data->address_details->account_shipping_phone_number)
                <p><strong>{{ trans('frontend.phone') }}:</strong> {!! $login_user_account_data->address_details->account_shipping_phone_number !!}</p>
            @endif

            <p><strong>{{ trans('frontend.address_1') }}:</strong> {!! $login_user_account_data->address_details->account_shipping_adddress_line_1 !!}</p>
            
            <p><strong>{{ trans('frontend.city') }}:</strong> {!! get_xaphuong($login_user_account_data->address_details->account_shipping_select_city) !!}</p>

            <p><strong>{{ trans('frontend.account_address_town_city') }}:</strong> {!! get_quanhuyen($login_user_account_data->address_details->account_shipping_select_state) !!}</p>

            <p><strong>{{ trans('frontend.country') }}:</strong> {{ get_tinhthanh($login_user_account_data->address_details->account_shipping_select_country) }}</p>

            <br>

         @else
            <p>{{ trans('frontend.shipping_address_not_available') }}</p>
         @endif
         </div>
     </div>
     </div>
 </div>
@endif
    
@endsection