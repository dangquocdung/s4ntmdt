@include('pages-message.notify-msg-success')

<h5>{{ trans('frontend.contact-address') }}</h5>
<hr class="padding-bottom-1x">
<div class="row address-content-sub">

  @if(!empty($frontend_account_details) && !empty($frontend_account_details->address_details))

    <div class="col-sm-6">
      <div class="form-group">
        <label for="account_bill_last_name">{{ trans('frontend.account_last_name') }}</label>
        <input type="text" class="form-control" placeholder="{{ trans('frontend.last_name') }}" name="account_bill_last_name" id="account_bill_last_name" value="{{ $frontend_account_details->address_details->account_bill_last_name }}" disabled>
      </div>
    </div>

    <div class="col-sm-6">
      <div class="form-group">
        <label for="account_bill_first_name">{{ trans('frontend.account_first_name') }}</label>
        <input type="text" class="form-control" placeholder="{{ trans('frontend.first_name') }}" name="account_bill_first_name" id="account_bill_first_name" value="{{ $frontend_account_details->address_details->account_bill_first_name }}" disabled>
      </div>
    </div>


    <div class="col-sm-6">
      <div class="form-group">
        <label for="account_bill_phone_number">{{ trans('frontend.account_phone_number') }}</label>
        <input type="number" class="form-control" placeholder="{{ trans('frontend.phone') }}" name="account_bill_phone_number" id="account_bill_phone_number" value="{{  $frontend_account_details->address_details->account_bill_phone_number }}" disabled>
      </div>
    </div>
    <div class="col-sm-6">
      <div class="form-group">
        <label for="account_bill_email_address">{{ trans('frontend.email_address') }}</label>
        <input type="email" class="form-control" placeholder="{{ trans('frontend.email_address') }}" name="account_bill_email_address" id="account_bill_email_address" value="{{  $user_info['user_email'] }}" disabled>
      </div>
    </div>

  
    <div class="col-md-4">
      <div class="form-group">
        <label class="control-label" for="account_bill_select_country">{{ trans('frontend.checkout_select_country_label') }}</label>
          <select class="form-control" id="account_bill_select_country" name="account_bill_select_country"  disabled>
            @foreach(get_country_list() as $val)
              @if( $frontend_account_details->address_details->account_bill_select_country==$val['matp'] )
                <option selected value="{{ $val['matp'] }}"> {!! $val['name'] !!}</option>
              @endif
            @endforeach
          </select>
      </div>
    </div>

    <div class="col-md-4">
      <div class="form-group">
        <label class="control-label" for="account_bill_select_state">{{ trans('frontend.account_address_town_city') }}</label>
        <select class="form-control" name="account_bill_select_state" id="account_bill_select_state" disabled>

          @foreach(get_quanhuyen_list($frontend_account_details->address_details->account_bill_select_country) as $val)

          @if( $frontend_account_details->address_details->account_bill_select_state==$val['maqh'] )

            <option selected value="{{ $val['maqh'] }}"> {!! $val['name'] !!}</option>

          @endif

          @endforeach



        </select>
      </div>
    </div>

    <div class="col-md-4">
      <div class="form-group">
        <label class="control-label" for="account_bill_select_city">{{ trans('frontend.account_address_select_city') }}</label>
        <select class="form-control" name="account_bill_select_city" id="account_bill_select_city" disabled>

          @foreach(get_xaphuong_list($frontend_account_details->address_details->account_bill_select_state) as $val)

            @if( $frontend_account_details->address_details->account_bill_select_city==$val['xaid'] )

              <option selected value="{{ $val['xaid'] }}"> {!! $val['name'] !!}</option>

            @endif

          @endforeach



        </select>
      </div>
    </div>

    <div class="col-md-12">
      <div class="form-group">
        <label class="control-label" for="inputAccountAddressLine1">{{ trans('frontend.account_address_line_1') }}</label>
        <input type="text" class="form-control" id="account_bill_address_line_1" name="account_bill_address_line_1" placeholder="{{ trans('frontend.address_line_1') }}" value="{{ $frontend_account_details->address_details->account_bill_address_line_1 }}" disabled>
      </div>
    </div>
  
  @else
    <div class="col-md-12">
      <p>{{ trans('frontend.contact_address_not_available') }}</p>
    </div>
  @endif

</div>

@if(!empty($frontend_account_details) && !empty($frontend_account_details->address_details))

  <!-- <hr class="margin-top-1x margin-bottom-1x">    -->
  <br>

  <h5>{{ trans('frontend.shipping-address') }}</h5>
  <hr class="padding-bottom-1x">

  <div class="row address-content-sub">

    <div class="col-sm-6">
        <div class="form-group">
        <label class="control-label" for="inputAccountLastName">{{ trans('frontend.account_last_name') }}</label>
        <input type="text" class="form-control" placeholder="{{ trans('frontend.last_name') }}" name="account_shipping_last_name" id="account_shipping_last_name" value="{{ $frontend_account_details->address_details->account_shipping_last_name }}"  disabled>
        </div>
    </div>

    <div class="col-sm-6">
        <div class="form-group">
        <label class="control-label" for="inputAccountFirstName">{{ trans('frontend.account_first_name') }}</label>
        <input type="text" class="form-control" placeholder="{{ trans('frontend.first_name') }}" name="account_shipping_first_name" id="account_shipping_first_name" value="{{ $frontend_account_details->address_details->account_shipping_first_name }}"  disabled>
        </div>
    </div>

    <div class="col-sm-6">
        <div class="form-group">
        <label class="control-label" for="inputAccountPhoneNumber">{{ trans('frontend.account_phone_number') }}</label>
        <input type="number" class="form-control" placeholder="{{ trans('frontend.phone') }}" name="account_shipping_phone_number" id="account_shipping_phone_number" value="{{ $frontend_account_details->address_details->account_shipping_phone_number }}"  disabled>
        </div>
    </div>

    <div class="col-sm-6">
      <div class="form-group">
        <label for="account_shipping_email_address">{{ trans('frontend.email_address') }}</label>
        <input type="email" class="form-control" placeholder="{{ trans('frontend.email_address') }}" name="account_shipping_email_address" id="account_shipping_email_address" value="{{  $user_info['user_email'] }}" disabled>
      </div>
    </div>


    <div class="col-md-4">
      <div class="form-group">
          <label class="control-label" for="inputAccountSelectCountry">{{ trans('frontend.checkout_select_country_label') }}</label>
          <select class="form-control" id="account_shipping_select_country" name="account_shipping_select_country"  disabled>
            @foreach(get_country_list() as $val)
              @if( $frontend_account_details->address_details->account_shipping_select_country==$val['matp'] )
                <option selected value="{{ $val['matp'] }}"> {!! $val['name'] !!}</option>
              @endif
            @endforeach


          </select>
      </div>
    </div>

    <div class="col-md-4">
      <div class="form-group">
          <label class="control-label" for="inputAccountTownCity">{{ trans('frontend.account_address_town_city') }}</label>
          <select class="form-control" name="account_shipping_select_city" id="account_shipping_select_city"  disabled>
            @foreach(get_quanhuyen_list($frontend_account_details->address_details->account_shipping_select_country) as $val)

            @if( $frontend_account_details->address_details->account_shipping_select_state==$val['maqh'] )

              <option selected value="{{ $val['maqh'] }}"> {!! $val['name'] !!}</option>

            @endif

            @endforeach



          </select>
      </div>
    </div>

    <div class="col-md-4">
      <div class="form-group">
          <label class="control-label" for="inputAccountXaPhuong">{{ trans('frontend.account_address_select_city') }}</label>
          <select class="form-control" name="account_shipping_select_city" id="account_shipping_select_city"  disabled>
          
          @foreach(get_xaphuong_list($frontend_account_details->address_details->account_shipping_select_state) as $val)

            @if( $frontend_account_details->address_details->account_shipping_select_city==$val['xaid'] )

              <option selected value="{{ $val['xaid'] }}"> {!! $val['name'] !!}</option>

            @endif

          @endforeach



          </select>
      </div>
    </div>

    <div class="col-md-12">
      <div class="form-group">
        <label class="control-label" for="inputAccountAddressLine1">{{ trans('frontend.account_address_line_1') }}</label>
        <input type="text" class="form-control"  id="account_shipping_address_line_1" name="account_shipping_address_line_1" placeholder="{{ trans('frontend.address_line_1') }}" value="{{ $frontend_account_details->address_details->account_shipping_address_line_1 }}" disabled>
      </div>
    </div>

  </div>

@else
  <p>{{ trans('admin.shipping_address_not_available') }}</p>
@endif

<hr class="margin-top-1x margin-bottom-1x">

<div class="text-right">

  @if(!empty($frontend_account_details) && !empty($frontend_account_details->address_details))
    <a href="{{ route('my-address-edit-page') }}" class="btn btn-primary margin-bottom-none">{{ trans('frontend.edit_address') }}</a>
  @else
    <a href="{{ route('my-address-add-page') }}" class="btn btn-primary margin-bottom-none">{{ trans('frontend.add_address') }}</a>
  @endif
</div>
