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

   

    <!-- Địa chỉ khách hàng -->
    @if($_settings_data['general_settings']['checkout_options']['enable_guest_user'] == true || ($_settings_data['general_settings']['checkout_options']['enable_guest_user'] == false && $_settings_data['general_settings']['checkout_options']['enable_login_user'] == false))
    <div id="guest_user_address" class="step well">
    
    <div class="user-address-content">
        <div class="address-information clearfix">

        <div class="address-content-sub">
            <h4>{!! trans('frontend.contact-address') !!}</h4>
            <hr class="padding-bottom-1x">

            <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                <label for="inputAccountFirstName">{{ trans('frontend.account_first_name') }}</label>
                <input type="text" class="form-control" placeholder="{{ trans('frontend.first_name') }}" name="account_bill_first_name" id="account_bill_first_name" value="{{ old('account_bill_first_name') }}">
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                <label for="inputAccountLastName">{{ trans('frontend.account_last_name') }}</label>
                <input type="text" class="form-control" placeholder="{{ trans('frontend.last_name') }}" name="account_bill_last_name" id="account_bill_last_name" value="{{ old('account_bill_last_name') }}">
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                <label for="inputAccountEmailAddress">{{ trans('frontend.account_email') }}</label>
                <input type="email" class="form-control" placeholder="{{ trans('frontend.email') }}" name="account_bill_email_address" id="account_bill_email_address" value="{{ old('account_bill_email_address') }}">
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                <label for="inputAccountPhoneNumber">{{ trans('frontend.account_phone_number') }}</label>
                <input type="number" class="form-control" placeholder="{{ trans('frontend.phone') }}" name="account_bill_phone_number" id="account_bill_phone_number" value="{{ old('account_bill_phone_number') }}">
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="form-group">
                <label class="control-label" for="inputAccountSelectCountry">{{ trans('frontend.checkout_select_country_label') }}</label>
                    <select class="form-control" id="account_bill_select_country" name="account_bill_select_country">
                    @foreach(get_country_list() as $key => $val)
                        @if(old('account_bill_select_country') == $key || $key==42 )
                        <option selected value="{{ $key }}"> {!! $val !!}</option>
                        @else
                        <option value="{{ $key }}"> {!! $val !!}</option>
                        @endif
                    @endforeach
                    </select>
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                <label class="control-label" for="inputAccountTownCity">{{ trans('frontend.account_address_town_city') }}</label>
                <select class="form-control" name="account_bill_town_or_city" id="account_bill_town_or_city">
                    @foreach(get_quanhuyen_list(42) as $val)
                    <option value="{{ $val['maqh'] }}" {{ ($loop->iteration == 1)?'selected':'' }}> {!! $val['name'] !!}</option>

                    @php 
                        if ($loop->iteration == 1){
                        $maqh =  $val['maqh'];
                        }
                    @endphp

                    @endforeach
                </select>
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                <label class="control-label" for="inputAccountXaPhuong">{{ trans('frontend.account_address_xa_phuong') }}</label>
                <select class="form-control" name="account_bill_xa_phuong" id="account_bill_xa_phuong">
                    <option value=""> {{ trans('frontend.xa_phuong') }} </option>
                    @foreach(get_xaphuong_list($maqh) as $val)
                    <option value="{{ $val['xaid'] }}" {{ ($loop->iteration == 1)?'selected':'' }}> {!! $val['name'] !!}</option>
                    @endforeach
                </select>
                </div>
            </div>

            <div class="col-md-12">
                <div class="form-group">
                <label class="control-label" for="inputAccountAddressLine1">{{ trans('frontend.account_address_line_1') }}</label>
                <textarea class="form-control" id="account_bill_adddress_line_1" name="account_bill_adddress_line_1" placeholder="{{ trans('frontend.address_line_1') }}">{{ old('account_shipping_adddress_line_1') }}</textarea>
                </div>
            </div>

            </div>
        </div>

        <br>
        <div class="address-content-sub">

            <h4>{!! trans('frontend.shipping_address') !!}</h4>
            <hr class="padding-bottom-1x">

            <input type="checkbox" name="different_shipping_address" id="different_shipping_address" class="shopist-iCheck" value="different_address"> {{ trans('frontend.different_shipping_label') }}
            
            <div class="row different-shipping-address mt-3" style="display:none">

            <div class="col-sm-6">
                <div class="form-group">
                <label class="control-label" for="inputAccountLastName">{{ trans('frontend.account_last_name') }}</label>
                <input type="text" class="form-control" placeholder="{{ trans('frontend.last_name') }}" name="account_shipping_last_name" id="account_shipping_last_name" value="{{ old('account_shipping_last_name') }}">
                </div>
            </div>

            <div class="col-sm-6">
                <div class="form-group">
                <label class="control-label" for="inputAccountFirstName">{{ trans('frontend.account_first_name') }}</label>
                <input type="text" class="form-control" placeholder="{{ trans('frontend.first_name') }}" name="account_shipping_first_name" id="account_shipping_first_name" value="{{ old('account_shipping_first_name') }}">
                </div>
            </div>

            <div class="col-sm-6">
                <div class="form-group">
                <label class="control-label" for="inputAccountEmailAddress">{{ trans('frontend.account_email') }}</label>
                <input type="email" class="form-control" placeholder="{{ trans('frontend.email') }}" name="account_shipping_email_address" id="account_shipping_email_address" value="{{ old('account_shipping_email_address') }}">
                </div>
            </div>

            <div class="col-sm-6">
                <div class="form-group">
                <label class="control-label" for="inputAccountPhoneNumber">{{ trans('frontend.account_phone_number') }}</label>
                <input type="number" class="form-control" placeholder="{{ trans('frontend.phone') }}" name="account_shipping_phone_number" id="account_shipping_phone_number" value="{{ old('account_shipping_phone_number') }}">
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label class="control-label" for="inputAccountSelectCountry">{{ trans('frontend.checkout_select_country_label') }}</label>
                    <select class="form-control" id="account_shipping_select_country" name="account_shipping_select_country">
                        @foreach(get_country_list() as $key => $val)
                        @if(old('account_shipping_select_country') == $key || $key==42 )
                            <option selected value="{{ $key }}"> {!! $val !!}</option>
                        @else
                            <option value="{{ $key }}"> {!! $val !!}</option>
                        @endif
                        @endforeach
                        </select>
                </div>
                </div>

                <div class="col-md-4">
                <div class="form-group">
                    <label class="control-label" for="inputAccountTownCity">{{ trans('frontend.account_address_town_city') }}</label>
                    <select class="form-control" name="account_shipping_town_or_city" id="account_shipping_town_or_city">
                    @foreach(get_quanhuyen_list(42) as $val)
                        <option value="{{ $val['maqh'] }}" {{ ($loop->iteration == 1)?'selected':'' }}> {!! $val['name'] !!}</option>

                        @php 
                        if ($loop->iteration == 1){
                            $maqh =  $val['maqh'];
                        }
                        @endphp

                    @endforeach
                    </select>
                </div>
                </div>

                <div class="col-md-4">
                <div class="form-group">
                    <label class="control-label" for="inputAccountXaPhuong">{{ trans('frontend.account_address_xa_phuong') }}</label>
                    <select class="form-control" name="account_shipping_xa_phuong" id="account_shipping_xa_phuong">
                    @foreach(get_xaphuong_list($maqh) as $val)
                        <option value="{{ $val['xaid'] }}" {{ ($loop->iteration == 1)?'selected':'' }}> {!! $val['name'] !!}</option>
                    @endforeach
                    </select>
                </div>
                </div>

            <div class="col-md-12">
                <div class="form-group">
                <label class="control-label" for="inputAccountAddressLine1">{{ trans('frontend.account_address_line_1') }}</label>
                <textarea class="form-control" id="account_shipping_adddress_line_1" name="account_shipping_adddress_line_1" placeholder="{{ trans('frontend.address_line_1') }}">{{ old('account_shipping_adddress_line_1') }}</textarea>
                </div>
            </div>
            </div>

        </div>
        
        </div>  
    </div>
    </div>
    @endif

    <!-- Xác thực người dùng -->
    @if($_settings_data['general_settings']['checkout_options']['enable_login_user'] == true && $is_user_login == false)

    <div id="authentication" class="step well">
        <div class="user-login-contentb">
        <h4>{!! trans('frontend.authentication_label') !!}</h4>
        <div class="user-login-content">
            <div class="login-information clearfix">
            <div class="row">
                <div class="col-sm-6">
                <div class="form_content">
                    <p>{!! trans('frontend.no_user_account_msg') !!}</p>
                    <a class="btn btn-secondary" href="{{ route('user-registration-page') }}">{!! trans('frontend.create_account_label') !!}</a>
                </div>
                </div>

                <div class="col-sm-6">
                <div class="form_content">
                    <p>{!! trans('frontend.has_user_account_msg') !!}</p>
                    <a class="btn btn-secondary" href="{{ route('user-login-page') }}">{!! trans('frontend.signin_account_label') !!}</a>
                </div>
                </div>
            </div>
            </div>
        </div>

        </div>

    </div>

    @endif

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

            @if($login_user_account_data->address_details->account_bill_company_name)
                <p><strong>{{ trans('admin.company') }}:</strong> {!! $login_user_account_data->address_details->account_bill_company_name !!}</p>
            @endif

            <p><strong>{{ trans('admin.address_1') }}:</strong> {!! $login_user_account_data->address_details->account_bill_adddress_line_1 !!}</p>

            @if($login_user_account_data->address_details->account_bill_adddress_line_2)
                <p><strong>{{ trans('admin.address_2') }}:</strong> {!! $login_user_account_data->address_details->account_bill_adddress_line_2 !!}</p>
            @endif

            <p><strong>{{ trans('admin.city') }}:</strong> {!! $login_user_account_data->address_details->account_bill_town_or_city !!}</p>

            <p><strong>{{ trans('admin.postCode') }}:</strong> {!! $login_user_account_data->address_details->account_bill_zip_or_postal_code !!}</p>
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

    <!-- Payment -->
    @if($_settings_data['general_settings']['checkout_options']['enable_guest_user'] == true || ($_settings_data['general_settings']['checkout_options']['enable_login_user'] == true && $is_user_login == true) || ($_settings_data['general_settings']['checkout_options']['enable_guest_user'] == false && $_settings_data['general_settings']['checkout_options']['enable_login_user'] == false))
    <div id="payment" class="step well">
        <h4>{!! trans('frontend.choose_payment') !!}</h4>
        <hr class="padding-bottom-1x">

        @if($payment_method_data['payment_option']['enable_payment_method'] == 'yes' && ($payment_method_data['bacs']['enable_option'] == 'yes' || $payment_method_data['cod']['enable_option'] == 'yes' || $payment_method_data['paypal']['enable_option'] == 'yes' || $payment_method_data['stripe']['enable_option'] == 'yes'))
        <div class="table-responsive">
            <table class="table table-hover"> 
            <tbody>  

                @if($payment_method_data['bacs']['enable_option'] == 'yes')
                <tr>
                    <td class="align-middle">
                        @if(old('payment_option') == 'bacs')
                        <input type="radio" class="shopist-iCheck" checked name="payment_option" value="bacs"> 
                        @else
                        <input type="radio" class="shopist-iCheck" name="payment_option" value="bacs"> 
                        @endif

                    </td>
                    <td class="align-middle">
                    <span class="text-gray-dark">{{ $payment_method_data['bacs']['method_title'] }}</span><br>
                    <span class="text-muted text-sm">{{ $payment_method_data['bacs']['method_description'] }}</span>
                    </td>
                </tr>
                @endif

                @if($payment_method_data['cod']['enable_option'] == 'yes')
                <tr>
                    <td class="align-middle">
                        @if(old('payment_option') == 'cod')
                        <input type="radio" class="shopist-iCheck" checked name="payment_option" value="cod"> 
                        @else
                        <input type="radio" class="shopist-iCheck" name="payment_option" value="cod"> 
                        @endif

                    </td>
                    <td class="align-middle">
                    <span class="text-gray-dark">{{ $payment_method_data['cod']['method_title'] }}</span><br>
                    <span class="text-muted text-sm">{{ $payment_method_data['bacs']['method_description'] }}</span>
                    </td>
                </tr>
                @endif

                @if($payment_method_data['paypal']['enable_option'] == 'yes')
                <tr>
                    <td class="align-middle">
                        @if(old('payment_option') == 'paypal')
                        <input type="radio" class="shopist-iCheck" checked name="payment_option" value="paypal"> 
                        @else
                        <input type="radio" class="shopist-iCheck" name="payment_option" value="paypal"> 
                        @endif

                    </td>
                    <td class="align-middle">
                    <span class="text-gray-dark">{{ $payment_method_data['paypal']['method_title'] }}</span><br>
                    <span class="text-muted text-sm">{{ $payment_method_data['bacs']['method_description'] }}</span>
                    </td>
                </tr>
                @endif

                @if($payment_method_data['stripe']['enable_option'] == 'yes')
                <script src='https://js.stripe.com/v2/' type='text/javascript'></script>
                <input type="hidden" name="stripe_api_key" value="{{ $stripe_api_key }}" id="stripe_api_key">
                <tr>
                    <td class="align-middle">
                        @if(old('payment_option') == 'stripe')
                        <input type="radio" class="shopist-iCheck" checked name="payment_option" value="stripe"> 
                        @else
                        <input type="radio" class="shopist-iCheck" name="payment_option" value="stripe"> 
                        @endif

                    </td>
                    <td class="align-middle">
                    <span class="text-gray-dark">{{ $payment_method_data['stripe']['method_title'] }}</span><br>
                    <span class="text-muted text-sm">{{ $payment_method_data['bacs']['method_description'] }}</span>
                    </td>
                </tr>
                @endif

                @if($payment_method_data['2checkout']['enable_option'] == 'yes')
                <script type="text/javascript" src="https://www.2checkout.com/checkout/api/2co.min.js"></script>
                <input type="hidden" name="2checkout_api_data" value="{{ $twocheckout_api_data }}" id="2checkout_api_data">
                <tr>
                    <td class="align-middle">
                        @if(old('payment_option') == '2checkout')
                        <input type="radio" class="custom-control-input shopist-iCheck" checked name="payment_option" value="2checkout"> 
                        @else
                        <input type="radio" class="custom-control-input shopist-iCheck" name="payment_option" value="2checkout"> 
                        @endif
                    </td>
                    <td class="align-middle">
                    <span class="text-gray-dark">{{ $payment_method_data['2checkout']['method_title'] }}</span><br>
                    <span class="text-muted text-sm">{{ $payment_method_data['bacs']['method_description'] }}</span>
                    </td>
                </tr>
                @endif
            </tbody>
            </table>

            @if($payment_method_data['stripe']['enable_option'] == 'yes')
            <div id="stripePopover">
                <p>{{ $payment_method_data['stripe']['method_description'] }}</p><br>

                <div id="stripe_content">
                <div class="input-group row">
                    <div class="col-xs-12 required">    
                    <label class="control-label">{!! trans('frontend.email_address_label') !!}</label> 
                    <input class="form-control" type="email" id="email_address" name="email_address" placeholder="email address">
                    </div>
                </div>

                <div class="input-group row">
                    <div class="col-xs-12 required">      
                    <label class="control-label">{!! trans('frontend.card_number_label') !!}</label> 
                    <input class="form-control" type="text" id="card_number" name="card_number" placeholder="card number">
                    </div>
                </div>

                <div class="input-group row">
                    <div class="col-xs-4 required">  
                    <label class="control-label">{!! trans('frontend.cvc_label') !!}</label> 
                    <input class="form-control" type="text" id="card_cvc" name="card_cvc" placeholder="ex. 311">
                    </div>
                    <div class="col-xs-4 required">  
                    <label class="control-label">{!! trans('frontend.expiration_month_label') !!}</label> 
                    <input class="form-control" type="text" id="card_expiry_month" name="card_expiry_month" placeholder="MM">
                    </div>
                    <div class="col-xs-4 required">  
                    <label class="control-label">{!! trans('frontend.expiration_year_label') !!}</label> 
                    <input class="form-control" type="text" id="card_expiry_year" name="card_expiry_year" placeholder="YYYY">
                    </div>  
                </div>
                </div>
            </div>
            @endif

            @if($payment_method_data['2checkout']['enable_option'] == 'yes')
            <div id="twocheckoutPopover">
                <p>{{ $payment_method_data['2checkout']['method_description'] }}</p><br>

                <div id="2checkout_content" style="padding-left: 15px;">  
                <div class="input-group row">
                    <div class="col-xs-12 required">      
                    <label class="control-label">{!! trans('frontend.card_number_label') !!}</label> 
                    <input class="form-control" type="text" id="2checkout_card_number" name="2checkout_card_number" placeholder="card number">
                    </div>
                </div>

                <div class="input-group row">
                    <div class="col-xs-4 required">  
                    <label class="control-label">{!! trans('frontend.cvc_label') !!}</label> 
                    <input class="form-control" type="text" id="2checkout_card_cvc" name="2checkout_card_cvc" placeholder="ex. 123">
                    </div>
                    <div class="col-xs-4 required">  
                    <label class="control-label">{!! trans('frontend.expiration_month_label') !!}</label> 
                    <input class="form-control" type="text" id="2checkout_card_expiry_month" name="2checkout_card_expiry_month" placeholder="MM">
                    </div>
                    <div class="col-xs-4 required">  
                    <label class="control-label">{!! trans('frontend.expiration_year_label') !!}</label> 
                    <input class="form-control" type="text" id="2checkout_card_expiry_year" name="2checkout_card_expiry_year" placeholder="YYYY">
                    </div>  
                </div>
                </div>
            </div>
            @endif
        </div>
        @else
        <p>{{ trans('frontend.checkout_payment_method_label') }}</p>
        @endif
    </div>
    @endif

    <!-- Order note -->
    @if($_settings_data['general_settings']['checkout_options']['enable_guest_user'] == true || ($_settings_data['general_settings']['checkout_options']['enable_login_user'] == true && $is_user_login == true) || ($_settings_data['general_settings']['checkout_options']['enable_guest_user'] == false && $_settings_data['general_settings']['checkout_options']['enable_login_user'] == false))
    <div id="order_notes" class="step well">
        <h4>{!! trans('frontend.order_notes') !!}</h4>
        <div class="row">
        <div class="col-md-12">
            <div class="form-group order-extra-notes">
            <textarea name="checkout_order_extra_message" id="checkout_order_extra_message"  placeholder="{{ trans('frontend.notes_about_your_order') }}" class="form-control">{!! old('checkout_order_extra_message') !!}</textarea>
            </div>
        </div>
        </div>
    </div>
    @endif
