@section('guest_user_address')

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

@endsection
