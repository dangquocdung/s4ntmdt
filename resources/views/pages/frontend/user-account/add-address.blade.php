@include('pages-message.form-submit')

<h5>{{ trans('frontend.contact-address') }}</h5>
<hr class="padding-bottom-1x">

<form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
  <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
  <input type="hidden" name="_account_post_type" value="address">

  <div class="user-address-content">
    <div class="address-information clearfix">
      <div class="address-content-sub">

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
              <label for="inputAccountPhoneNumber">{{ trans('frontend.account_phone_number') }}</label>
              <input type="number" class="form-control" placeholder="{{ trans('frontend.phone') }}" name="account_bill_phone_number" id="account_bill_phone_number" value="{{ old('account_bill_phone_number') }}">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label class="control-label" for="account_bill_tinh_thanh">{{ trans('frontend.checkout_select_country_label') }}</label>
                <select class="form-control" id="account_bill_select_country" name="account_bill_tinh_thanh">
                @foreach(get_country_list() as $val)
                    @if( $val['matp']==42 )
                      <option selected value="{{ $val['matp'] }}"> {!! $val['name'] !!}</option>
                    @else
                      <option value="{{ $val['matp'] }}"> {!! $val['name'] !!}</option>
                    @endif
                  @endforeach
                  </select>
            </div>
          </div>
      
          <div class="col-md-6">
            <div class="form-group">
              <label class="control-label" for="account_bill_quan_huyen">{{ trans('frontend.account_address_town_city') }}</label>
              <select class="form-control" name="account_bill_quan_huyen" id="account_bill_quan_huyen">
                @foreach(get_quanhuyen_list(42) as $val)
                 <option value="{{ $val['maqh'] }}"> {!! $val['name'] !!}</option>
                @endforeach

              </select>
            </div>
          </div>
      
          <div class="col-md-6">
            <div class="form-group">
              <label class="control-label" for="account_bill_xa_phuong">{{ trans('frontend.account_address_xa_phuong') }}</label>
              <select class="form-control" name="account_bill_xa_phuong" id="account_bill_xa_phuong">
                @foreach(get_xaphuong_list(436) as $val)
                  <option value="{{ $val['xaid'] }}"> {!! $val['name'] !!}</option>
                @endforeach
              </select>
            </div>
          </div>
      
          <div class="col-md-12">
            <div class="form-group">
              <label class="control-label" for="inputAccountAddressLine1">{{ trans('frontend.account_address_line_1') }}</label>
              <input type="text" class="form-control" id="account_bill_adddress_line_1" name="account_bill_adddress_line_1" placeholder="{{ trans('frontend.address_line_1') }}" value="{{ old('account_bill_adddress_line_1') }}">
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
              <label class="control-label" for="inputAccountFirstName">{{ trans('frontend.account_first_name') }}</label>
              <input type="text" class="form-control" placeholder="{{ trans('frontend.first_name') }}" name="account_shipping_first_name" id="account_shipping_first_name" value="{{ old('account_shipping_first_name') }}">
            </div>
          </div>

          <div class="col-sm-6">
            <div class="form-group">
              <label class="control-label" for="inputAccountLastName">{{ trans('frontend.account_last_name') }}</label>
              <input type="text" class="form-control" placeholder="{{ trans('frontend.last_name') }}" name="account_shipping_last_name" id="account_shipping_last_name" value="{{ old('account_shipping_last_name') }}">
            </div>
          </div>

          <div class="col-sm-6">
            <div class="form-group">
              <label class="control-label" for="inputAccountPhoneNumber">{{ trans('frontend.account_phone_number') }}</label>
              <input type="number" class="form-control" placeholder="{{ trans('frontend.phone') }}" name="account_shipping_phone_number" id="account_shipping_phone_number" value="{{ old('account_shipping_phone_number') }}">
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group">
                <label class="control-label" for="inputAccountSelectCountry">{{ trans('frontend.checkout_select_country_label') }}</label>
                <select class="form-control" id="account_shipping_select_country" name="account_shipping_tinh_thanh" >
                  @foreach(get_country_list() as $val)
                    @if( $val['matp']==42 )
                      <option selected value="{{ $val['matp'] }}"> {!! $val['name'] !!}</option>
                    @else
                      <option value="{{ $val['matp'] }}"> {!! $val['name'] !!}</option>
                    @endif
                  @endforeach
                </select>
            </div>
          </div>
      
          <div class="col-md-6">
            <div class="form-group">
                <label class="control-label" for="inputAccountTownCity">{{ trans('frontend.account_address_town_city') }}</label>
                <select class="form-control" name="account_shipping_quan_huyen" id="account_shipping_quan_huyen">

                  @foreach(get_quanhuyen_list(42) as $val)

                      <option value="{{ $val['maqh'] }}"> {!! $val['name'] !!}</option>

                  @endforeach

                </select>
            </div>
          </div>
      
          <div class="col-md-6">
            <div class="form-group">
                <label class="control-label" for="inputAccountXaPhuong">{{ trans('frontend.account_address_xa_phuong') }}</label>
                <select class="form-control" name="account_shipping_xa_phuong" id="account_shipping_xa_phuong" >

                  @foreach(get_xaphuong_list(436) as $val)

                      <option value="{{ $val['xaid'] }}"> {!! $val['name'] !!}</option>

                  @endforeach

                </select>
            </div>
          </div>
      
          <div class="col-md-12">
            <div class="form-group">
              <label class="control-label" for="inputAccountAddressLine1">{{ trans('frontend.account_address_line_1') }}</label>
              <input type="text" class="form-control"  id="account_shipping_adddress_line_1" name="account_shipping_adddress_line_1" placeholder="{{ trans('frontend.address_line_1') }}" value="{{ old('account_shipping_adddress_line_1') }}">
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