<form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
  <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
  <input type="hidden" name="_account_post_type" value="address">

  <div class="user-address-content">
    <div class="address-information clearfix">
      <div class="address-content-sub">
        <div class="row">
          <div class="col-sm-6">
            <div class="form-group">
              <label for="account_bill_last_name">{{ trans('frontend.account_last_name') }}</label>
              <input type="text" class="form-control" placeholder="{{ trans('frontend.last_name') }}" name="account_bill_last_name" id="account_bill_last_name" value="{{ $frontend_account_details->address_details->account_bill_last_name }}">
            </div>
          </div>

          <div class="col-sm-6">
            <div class="form-group">
              <label for="account_bill_first_name">{{ trans('frontend.account_first_name') }}</label>
              <input type="text" class="form-control" placeholder="{{ trans('frontend.first_name') }}" name="account_bill_first_name" id="account_bill_first_name" value="{{ $frontend_account_details->address_details->account_bill_first_name }}">
            </div>
          </div>


          <div class="col-sm-6">
            <div class="form-group">
              <label for="account_bill_phone_number">{{ trans('frontend.account_phone_number') }}</label>
              <input type="number" class="form-control" placeholder="{{ trans('frontend.phone') }}" name="account_bill_phone_number" id="account_bill_phone_number" value="{{ $frontend_account_details->address_details->account_bill_phone_number }}">
            </div>
          </div>

          <div class="col-sm-6">
            <div class="form-group">
              <label for="account_bill_email_address">{{ trans('frontend.email_address') }}</label>
              <input type="email" class="form-control" placeholder="{{ trans('frontend.email_address') }}" name="account_bill_email_address" id="account_bill_email_address" value="{{ $frontend_account_details->address_details->account_bill_email_address }}">
            </div>
          </div>

          <div class="col-md-4">
            <div class="form-group">
              <label for="account_bill_select_country">{{ trans('frontend.checkout_select_country_label') }}</label>
                <select class="form-control" id="account_bill_select_country" name="account_bill_select_country">
                  <option>{!! trans('frontend.chon-tinh-thanh') !!}</option>

                  @foreach(get_country_list() as $val)

                    @if ( $frontend_account_details->address_details->account_bill_select_country == $val['matp'] )
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
              <label for="account_bill_select_state">{{ trans('frontend.account_address_town_city') }}</label>
              <select class="form-control" name="account_bill_select_state" id="account_bill_select_state">
                <option>{!! trans('frontend.chon-quan-huyen') !!}</option>
                @foreach(get_quanhuyen_list($frontend_account_details->address_details->account_bill_select_country) as $val)
                  @if( $frontend_account_details->address_details->account_bill_select_state==$val['maqh'] )
                    <option selected value="{{ $val['maqh'] }}"> {!! $val['name'] !!}</option>
                  @else
                    <option value="{{ $val['maqh'] }}"> {!! $val['name'] !!}</option>
                  @endif
                @endforeach
              </select>
            </div>
          </div>
      
          <div class="col-md-4">
            <div class="form-group">
              <label for="account_bill_select_city">{{ trans('frontend.account_address_select_city') }}</label>
              <select class="form-control" name="account_bill_select_city" id="account_bill_select_city">
                <option>{!! trans('frontend.chon-xa-phuong') !!}</option>
                @foreach(get_xaphuong_list($frontend_account_details->address_details->account_bill_select_state) as $val)
                  @if( $frontend_account_details->address_details->account_bill_select_city==$val['xaid'] )
                    <option selected value="{{ $val['xaid'] }}"> {!! $val['name'] !!}</option>
                  @else
                    <option value="{{ $val['xaid'] }}"> {!! $val['name'] !!}</option>
                  @endif
                @endforeach
              </select>
            </div>
          </div>
      
          <div class="col-md-12">
            <div class="form-group">
              <label for="account_bill_adddress_line_1">{{ trans('frontend.account_address_line_1') }}</label>
              <input type="text" class="form-control" id="account_bill_adddress_line_1" name="account_bill_adddress_line_1" placeholder="{{ trans('frontend.address_line_1') }}" value="{{ $frontend_account_details->address_details->account_bill_adddress_line_1 }}">
            </div>
          </div>
      
        </div>
      </div>
      <br>
      <div class="address-content-sub">
        <h5>{{ trans('frontend.shipping-address') }}</h5>
        <hr class="padding-bottom-1x">
        <input type="checkbox" name="same_shipping_address" id="same_shipping_address" class="shopist-iCheck" value="same_address"> {{ trans('frontend.same-contact-address') }}
        <div class="row different-shipping-address mt-3">

          <div class="col-sm-6">
            <div class="form-group">
              <label for="account_shipping_last_name">{{ trans('frontend.account_last_name') }}</label>
              <input type="text" class="form-control" placeholder="{{ trans('frontend.last_name') }}" name="account_shipping_last_name" id="account_shipping_last_name" value="{{ $frontend_account_details->address_details->account_shipping_last_name }}">
            </div>
          </div>
          
          <div class="col-sm-6">
            <div class="form-group">
              <label for="account_shipping_first_name">{{ trans('frontend.account_first_name') }}</label>
              <input type="text" class="form-control" placeholder="{{ trans('frontend.first_name') }}" name="account_shipping_first_name" id="account_shipping_first_name" value="{{ $frontend_account_details->address_details->account_shipping_first_name }}">
            </div>
          </div>


          <div class="col-sm-6">
            <div class="form-group">
              <label for="account_shipping_phone_number">{{ trans('frontend.account_phone_number') }}</label>
              <input type="number" class="form-control" placeholder="{{ trans('frontend.phone') }}" name="account_shipping_phone_number" id="account_shipping_phone_number" value="{{ $frontend_account_details->address_details->account_shipping_phone_number }}">
            </div>
          </div>

          <div class="col-sm-6">
            <div class="form-group">
              <label for="account_shipping_email_address">{{ trans('frontend.email_address') }}</label>
              <input type="email" class="form-control" placeholder="{{ trans('frontend.email_address') }}" name="account_shipping_email_address" id="account_shipping_email_address" value="{{ $frontend_account_details->address_details->account_shipping_email_address }}">
            </div>
          </div>


          <div class="col-md-4">
            <div class="form-group">
                <label for="account_shipping_select_country">{{ trans('frontend.checkout_select_country_label') }}</label>
                <select class="form-control" id="account_shipping_select_country" name="account_shipping_select_country" >
                  <option>{!! trans('frontend.chon-tinh-thanh') !!}</option>

                  @foreach(get_country_list() as $val)
                    @if( $frontend_account_details->address_details->account_shipping_select_country==$val['matp'] )
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
                <label for="account_shipping_select_state">{{ trans('frontend.account_address_town_city') }}</label>
                <select class="form-control" name="account_shipping_select_state" id="account_shipping_select_state">
                  <option>{!! trans('frontend.chon-tinh-thanh') !!}</option>


                  @foreach(get_quanhuyen_list($frontend_account_details->address_details->account_shipping_select_country) as $val)

                    @if( $frontend_account_details->address_details->account_shipping_select_state==$val['maqh'] )

                      <option selected value="{{ $val['maqh'] }}"> {!! $val['name'] !!}</option>

                    @else

                      <option value="{{ $val['maqh'] }}"> {!! $val['name'] !!}</option>

                    @endif

                  @endforeach

                </select>
            </div>
          </div>
      
          <div class="col-md-4">
            <div class="form-group">
                <label for="account_shipping_select_city">{{ trans('frontend.account_address_select_city') }}</label>
                <select class="form-control" name="account_shipping_select_city" id="account_shipping_select_city" >
                  <option>{!! trans('frontend.chon-tinh-thanh') !!}</option>


                  @foreach(get_xaphuong_list($frontend_account_details->address_details->account_shipping_select_state) as $val)

                    @if( $frontend_account_details->address_details->account_shipping_select_city==$val['xaid'] )

                      <option selected value="{{ $val['xaid'] }}"> {!! $val['name'] !!}</option>

                    @else

                      <option value="{{ $val['xaid'] }}"> {!! $val['name'] !!}</option>

                    @endif

                  @endforeach

                </select>
            </div>
          </div>
      
          <div class="col-md-12">
            <div class="form-group">
              <label for="account_shipping_adddress_line_1">{{ trans('frontend.account_address_line_1') }}</label>
              <input type="text" class="form-control"  id="account_shipping_adddress_line_1" name="account_shipping_adddress_line_1" placeholder="{{ trans('frontend.address_line_1') }}" value="{{ $frontend_account_details->address_details->account_shipping_adddress_line_1 }}">
            </div>
          </div>
      
        </div>

      </div>
      
    </div>  
  </div>

  <br>
  <div class="shopping-cart-footer">
    <div class="column">
      <button class="btn btn-primary" style="float:right">{!! trans('frontend.save_address') !!}</button>
    </div>
  </div>

</form>