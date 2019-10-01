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
            <p>{!! $login_user_account_data->address_details->account_bill_first_name .' '. $login_user_account_data->address_details->account_bill_last_name !!}</p>

            <p><strong>{{ trans('admin.address_1') }}:</strong> {!! $login_user_account_data->address_details->account_bill_adddress_line_1 !!}</p>

            @if($login_user_account_data->address_details->account_bill_adddress_line_2)
                <p><strong>{{ trans('admin.address_2') }}:</strong> {!! $login_user_account_data->address_details->account_bill_adddress_line_2 !!}</p>
            @endif

            <p><strong>{{ trans('admin.city') }}:</strong> {!! $login_user_account_data->address_details->account_bill_town_or_city !!}</p>

            <p><strong>{{ trans('admin.country') }}:</strong> {!! get_country_by_code( $login_user_account_data->address_details->account_bill_select_country ) !!}</p>

            <br>

            @if($login_user_account_data->address_details->account_bill_phone_number)
                <p><strong>{{ trans('admin.phone') }}:</strong> {!! $login_user_account_data->address_details->account_bill_phone_number !!}</p>
            @endif

            @if($login_user_account_data->address_details->account_bill_fax_number)
                <p><strong>{{ trans('admin.fax') }}:</strong> {!! $login_user_account_data->address_details->account_bill_fax_number !!}</p>
            @endif

            <p><strong>{{ trans('admin.email') }}:</strong> {!! $login_user_account_data->address_details->account_bill_email_address !!}</p>

         @else
            <p>{{ trans('admin.billing_address_not_available') }}</p>
         @endif
         </div>
         <div class="col-md-6 address-content-sub">
         <h4>{!! trans('frontend.shipping_address') !!}</h4><br>

         @if(!empty($login_user_account_data) && !empty($login_user_account_data->address_details))
         <p>{!! $login_user_account_data->address_details->account_shipping_first_name .' '. $login_user_account_data->address_details->account_shipping_last_name !!}</p>

         @if($login_user_account_data->address_details->account_shipping_company_name)
             <p><strong>{{ trans('admin.company') }}:</strong> {!! $login_user_account_data->address_details->account_shipping_company_name !!}</p>
         @endif

         <p><strong>{{ trans('admin.address_1') }}:</strong> {!! $login_user_account_data->address_details->account_shipping_adddress_line_1 !!}</p>

         @if($login_user_account_data->address_details->account_shipping_adddress_line_2)
             <p><strong>{{ trans('admin.address_2') }}:</strong> {!! $login_user_account_data->address_details->account_shipping_adddress_line_2 !!}</p>
         @endif

         <p><strong>{{ trans('admin.city') }}:</strong> {!! $login_user_account_data->address_details->account_shipping_town_or_city !!}</p>

         <p><strong>{{ trans('admin.postCode') }}:</strong> {!! $login_user_account_data->address_details->account_shipping_zip_or_postal_code !!}</p>
         <p><strong>{{ trans('admin.country') }}:</strong> {!! get_country_by_code( $login_user_account_data->address_details->account_shipping_select_country ) !!}</p>

         <br>

         @if($login_user_account_data->address_details->account_shipping_phone_number)
             <p><strong>{{ trans('admin.phone') }}:</strong> {!! $login_user_account_data->address_details->account_shipping_phone_number !!}</p>
         @endif

         @if($login_user_account_data->address_details->account_shipping_fax_number)
             <p><strong>{{ trans('admin.fax') }}:</strong> {!! $login_user_account_data->address_details->account_shipping_fax_number !!}</p>
         @endif

         <p><strong>{{ trans('admin.email') }}:</strong> {!! $login_user_account_data->address_details->account_shipping_email_address !!}</p>

         @else
         <p>{{ trans('admin.shipping_address_not_available') }}</p>
         @endif
         </div>
     </div>
     </div>
 </div>
@endif
    
@endsection