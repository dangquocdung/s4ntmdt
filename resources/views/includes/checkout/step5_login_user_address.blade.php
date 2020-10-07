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

        @if(!empty($login_user_account_data) && !empty($login_user_account_data->address_details))

            <div class="address-content-sub">
                <h4>{!! trans('frontend.shipping_address') !!}</h4>
                <hr class="padding-bottom-1x">

                <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="inputAccountLastName">{{ trans('frontend.account_last_name') }}</label>
                        <input type="text" class="form-control" name="account_shipping_last_name" id="account_shipping_last_name" value={!! $login_user_account_data->address_details->account_shipping_last_name  !!} disabled>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="inputAccountFirstName">{{ trans('frontend.account_first_name') }}</label>
                        <input type="text" class="form-control" name="account_shipping_first_name" id="account_shipping_first_name" value={!! $login_user_account_data->address_details->account_shipping_first_name !!} disabled>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="inputAccountEmailAddress">{{ trans('frontend.account_email') }}</label>
                        <input type="email" class="form-control" name="account_shipping_email_address" id="account_bill_email_address" value={!! $user_info['user_email'] !!} disabled>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="inputAccountPhoneNumber">{{ trans('frontend.account_phone_number') }}</label>
                        <input type="number" class="form-control" name="account_shipping_phone_number" id="account_bill_phone_number" value={!! $login_user_account_data->address_details->account_shipping_phone_number !!} disabled>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                    <label class="control-label" for="account_shipping_select_country">{{ trans('frontend.checkout_select_country_label') }}</label>
                        <select class="form-control" id="account_shipping_select_country" name="account_shipping_select_country" disabled>
                        @foreach(get_country_list() as $val)
                            @if ( $val['matp'] == ($login_user_account_data->address_details->account_shipping_select_country))
                                <option selected value="{{ $val['matp'] }}"> {!! $val['name'] !!}</option>
                            @else
                                <option value="{{ $val['matp'] }}"> {!! $val['name'] !!}</option>
                            @endif
                        @endforeach
                        </select>
                    </div>
                </div>
            
                <div class="col-md-4">
                    <div class="form-group">
                    <label class="control-label" for="account_shipping_select_state">{{ trans('frontend.account_address_town_city') }}</label>
                    <select class="form-control" name="account_shipping_select_state" id="account_shipping_select_state" disabled>
                        <option selected value={!! $login_user_account_data->address_details->account_shipping_select_state !!}> {!! get_quanhuyen($login_user_account_data->address_details->account_shipping_select_state) !!}</option>
                    </select>
                    </div>
                </div>
            
                <div class="col-md-4">
                    <div class="form-group">
                    <label class="control-label" for="account_shipping_select_city">{{ trans('frontend.account_address_select_city') }}</label>
                    <select class="form-control" name="account_shipping_select_city" id="account_shipping_select_city" disabled>
                        <option selected value= {!! ($login_user_account_data->address_details->account_shipping_select_city) !!}> {!! get_xaphuong($login_user_account_data->address_details->account_shipping_select_city) !!}</option>
                    </select>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        <label class="control-label" for="inputAccountAddressLine1">{{ trans('frontend.account_address_line_1') }}</label>
                        <textarea class="form-control" id="account_shipping_address_line_1" name="account_shipping_address_line_1" disabled>{{  $login_user_account_data->address_details->account_shipping_address_line_1 }}</textarea>
                    </div>
                </div>

                </div>
            </div>

            <br>

            <div class="address-content-sub">
                <h4>{!! trans('frontend.billing_address') !!}</h4>
                <hr class="padding-bottom-1x">

                <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="inputAccountLastName">{{ trans('frontend.account_last_name') }}</label>
                        <input type="text" class="form-control" name="account_bill_last_name" id="account_bill_last_name" value={!! $login_user_account_data->address_details->account_bill_last_name  !!} disabled>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="inputAccountFirstName">{{ trans('frontend.account_first_name') }}</label>
                        <input type="text" class="form-control" name="account_bill_first_name" id="account_bill_first_name" value={!! $login_user_account_data->address_details->account_bill_first_name !!} disabled>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="inputAccountEmailAddress">{{ trans('frontend.account_email') }}</label>
                        <input type="email" class="form-control" name="account_bill_email_address" id="account_bill_email_address" value={!! $user_info['user_email'] !!} disabled>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="inputAccountPhoneNumber">{{ trans('frontend.account_phone_number') }}</label>
                        <input type="number" class="form-control" name="account_bill_phone_number" id="account_bill_phone_number" value={!! $login_user_account_data->address_details->account_bill_phone_number !!} disabled>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                    <label class="control-label" for="account_bill_select_country">{{ trans('frontend.checkout_select_country_label') }}</label>
                        <select class="form-control" id="account_bill_select_country" name="account_bill_select_country" disabled>
                        @foreach(get_country_list() as $val)
                            @if ( $val['matp'] == ($login_user_account_data->address_details->account_bill_select_country))
                                <option selected value="{{ $val['matp'] }}"> {!! $val['name'] !!}</option>
                            @else
                                <option value="{{ $val['matp'] }}"> {!! $val['name'] !!}</option>
                            @endif
                        @endforeach
                        </select>
                    </div>
                </div>
            
                <div class="col-md-4">
                    <div class="form-group">
                    <label class="control-label" for="account_bill_select_state">{{ trans('frontend.account_address_town_city') }}</label>
                    <select class="form-control" name="account_bill_select_state" id="account_bill_select_state" disabled>
                        <option selected value={!! $login_user_account_data->address_details->account_bill_select_state !!}> {!! get_quanhuyen($login_user_account_data->address_details->account_bill_select_state) !!}</option>
                    </select>
                    </div>
                </div>
            
                <div class="col-md-4">
                    <div class="form-group">
                    <label class="control-label" for="account_bill_select_city">{{ trans('frontend.account_address_select_city') }}</label>
                    <select class="form-control" name="account_bill_select_city" id="account_bill_select_city" disabled>
                        <option selected value= {!! ($login_user_account_data->address_details->account_bill_select_city) !!}> {!! get_xaphuong($login_user_account_data->address_details->account_bill_select_city) !!}</option>
                    </select>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        <label class="control-label" for="inputAccountAddressLine1">{{ trans('frontend.account_address_line_1') }}</label>
                        <textarea class="form-control" id="account_bill_address_line_1" name="account_bill_address_line_1" disabled>{{  $login_user_account_data->address_details->account_bill_address_line_1 }}</textarea>
                    </div>
                </div>

                </div>
            </div>


            <div class="col-md-6 address-content-sub">
                <h4>{!! trans('frontend.billing_address') !!}</h4><br>

                    <p>{!! $login_user_account_data->address_details->account_bill_last_name .' '. $login_user_account_data->address_details->account_bill_first_name !!}</p>

                    @if($login_user_account_data->address_details->account_bill_phone_number)
                        <p><strong>{{ trans('frontend.phone') }}:</strong> {!! $login_user_account_data->address_details->account_bill_phone_number !!}</p>
                    @endif

                    @if($login_user_account_data->address_details->account_bill_email_address)
                        <p><strong>{{ trans('frontend.email') }}:</strong> {!! $login_user_account_data->address_details->account_bill_email_address !!}</p>
                    @endif


                    <p><strong>{{ trans('frontend.address_1') }}:</strong> {!! $login_user_account_data->address_details->account_bill_address_line_1 !!}</p>

                    <p><strong>{{ trans('frontend.city') }}:</strong> {!! get_xaphuong($login_user_account_data->address_details->account_bill_select_city) !!}</p>

                    <p><strong>{{ trans('frontend.state') }}:</strong> {!! get_quanhuyen($login_user_account_data->address_details->account_bill_select_state) !!}</p>

                    <p><strong>{{ trans('frontend.country') }}:</strong> {{ get_tinhthanh($login_user_account_data->address_details->account_bill_select_country) }}</p>

                    <br>
            </div>

            <div class="col-md-6 address-content-sub">
                <h4>{!! trans('frontend.shipping_address') !!}</h4><br>
                    <p>{!! $login_user_account_data->address_details->account_shipping_last_name .' '. $login_user_account_data->address_details->account_shipping_first_name !!}</p>

                    @if($login_user_account_data->address_details->account_shipping_phone_number)
                        <p><strong>{{ trans('frontend.phone') }}:</strong> {!! $login_user_account_data->address_details->account_shipping_phone_number !!}</p>
                    @endif
                    
                    @if($login_user_account_data->address_details->account_shipping_email_address)
                        <p><strong>{{ trans('frontend.email') }}:</strong> {!! $login_user_account_data->address_details->account_shipping_email_address !!}</p>
                    @endif


                    <p><strong>{{ trans('frontend.address_1') }}:</strong> {!! $login_user_account_data->address_details->account_shipping_address_line_1 !!}</p>
                    
                    <p><strong>{{ trans('frontend.city') }}:</strong> {!! get_xaphuong($login_user_account_data->address_details->account_shipping_select_city) !!}</p>

                    <p><strong>{{ trans('frontend.account_address_town_city') }}:</strong> {!! get_quanhuyen($login_user_account_data->address_details->account_shipping_select_state) !!}</p>

                    <p><strong>{{ trans('frontend.country') }}:</strong> {{ get_tinhthanh($login_user_account_data->address_details->account_shipping_select_country) }}</p>

                    <br>

            </div>
        @else
            <p>{{ trans('frontend.shipping_address_not_available') }}</p>
        @endif

     </div>
     </div>
 </div>
@endif
    
@endsection