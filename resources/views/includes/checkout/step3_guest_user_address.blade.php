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
                    <label for="inputAccountLastName">{{ trans('frontend.account_last_name') }}</label>
                    <input type="text" class="form-control" placeholder="{{ trans('frontend.last_name') }}" name="guest_bill_last_name" id="guest_bill_last_name" value="{{ old('guest_bill_last_name') }}">
                </div>
            </div>

            <div class="col-sm-6">
                <div class="form-group">
                    <label for="inputAccountFirstName">{{ trans('frontend.account_first_name') }}</label>
                    <input type="text" class="form-control" placeholder="{{ trans('frontend.first_name') }}" name="guest_bill_first_name" id="guest_bill_first_name" value="{{ old('guest_bill_first_name') }}">
                </div>
            </div>

            <div class="col-sm-6">
                <div class="form-group">
                    <label for="inputAccountEmailAddress">{{ trans('frontend.account_email') }}</label>
                    <input type="email" class="form-control" placeholder="{{ trans('frontend.email') }}" name="guest_bill_email_address" id="account_bill_email_address" value="{{ old('guest_bill_email_address') }}">
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="inputAccountPhoneNumber">{{ trans('frontend.account_phone_number') }}</label>
                    <input type="number" class="form-control" placeholder="{{ trans('frontend.phone') }}" name="guest_bill_phone_number" id="guest_bill_phone_number" value="{{ old('guest_bill_phone_number') }}">
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                  <label class="control-label" for="guest_bill_select_country">{{ trans('frontend.checkout_select_country_label') }}</label>
                    <select class="form-control" id="account_bill_select_country" name="guest_bill_select_country">
                      <option selected>{!! trans('frontend.chon-tinh-thanh') !!}</option>
                      @foreach(get_country_list() as $val)
                          <option value="{{ $val['matp'] }}"> {!! $val['name'] !!}</option>
                      @endforeach
                    </select>
                </div>
              </div>
          
              <div class="col-md-4">
                <div class="form-group">
                  <label class="control-label" for="guest_bill_select_state">{{ trans('frontend.account_address_town_city') }}</label>
                  <select class="form-control" name="guest_bill_select_state" id="account_bill_select_state">
                    <option selected>{!! trans('frontend.chon-quan-huyen') !!}</option>
                  </select>
                </div>
              </div>
          
              <div class="col-md-4">
                <div class="form-group">
                  <label class="control-label" for="guest_bill_select_city">{{ trans('frontend.account_address_select_city') }}</label>
                  <select class="form-control" name="guest_bill_select_city" id="account_bill_select_city">
                    <option selected>{!! trans('frontend.chon-xa-phuong') !!}</option>
                  </select>
                </div>
              </div>

            <div class="col-md-12">
                <div class="form-group">
                <label class="control-label" for="inputAccountAddressLine1">{{ trans('frontend.account_address_line_1') }}</label>
                <textarea class="form-control" id="guest_bill_address_line_1" name="guest_bill_address_line_1" placeholder="{{ trans('frontend.address_line_1') }}">{{ old('guest_shipping_address_line_1') }}</textarea>
                </div>
            </div>

            </div>
        </div>

                
        </div>  
    </div>
  </div>
  @endif

@endsection
