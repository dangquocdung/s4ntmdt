@include('pages-message.notify-msg-success')

<h5>{{ trans('frontend.contact-address') }}</h5>
<hr class="padding-bottom-1x">
<form class="row">

  @if(!empty($frontend_account_details) && !empty($frontend_account_details->address_details))

    <div class="col-sm-6">
      <div class="form-group">
        <label for="account_bill_first_name">{{ trans('frontend.account_first_name') }}</label>
        <input type="text" class="form-control" placeholder="{{ trans('frontend.first_name') }}" name="account_bill_first_name" id="account_bill_first_name" value="{{ $frontend_account_details->address_details->account_bill_first_name }}">
      </div>
    </div>
    <div class="col-sm-6">
      <div class="form-group">
        <label for="account_bill_last_name">{{ trans('frontend.account_last_name') }}</label>
        <input type="text" class="form-control" placeholder="{{ trans('frontend.last_name') }}" name="account_bill_last_name" id="account_bill_last_name" value="{{ $frontend_account_details->address_details->account_bill_last_name }}">
      </div>
    </div>

    <div class="col-sm-6">
      <div class="form-group">
        <label for="account_bill_phone_number">{{ trans('frontend.account_phone_number') }}</label>
        <input type="number" class="form-control" placeholder="{{ trans('frontend.phone') }}" name="account_bill_phone_number" id="account_bill_phone_number" value="{{  $frontend_account_details->address_details->account_bill_phone_number }}">
      </div>
    </div>
  
    <div class="col-md-6">
      <div class="form-group">
        <label class="control-label" for="account_bill_tinh_thanh">{{ trans('frontend.checkout_select_country_label') }}</label>
          <select class="form-control" id="account_bill_tinh_thanh" name="account_bill_tinh_thanh">
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

    <div class="col-md-6">
      <div class="form-group">
        <label class="control-label" for="account_bill_quan_huyen">{{ trans('frontend.account_address_town_city') }}</label>
        <select class="form-control" name="account_bill_quan_huyen" id="account_bill_quan_huyen">
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

    <div class="col-md-6">
      <div class="form-group">
        <label class="control-label" for="account_bill_xa_phuong">{{ trans('frontend.account_address_xa_phuong') }}</label>
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
        <textarea class="form-control" id="account_bill_adddress_line_1" name="account_bill_adddress_line_1" placeholder="{{ trans('frontend.address_line_1') }}">{{ $frontend_account_details->address_details->account_bill_adddress_line_1 }}</textarea>
      </div>
    </div>

    <div class="col-md-12">
      <div class="form-group">
        <label class="control-label" for="inputAccountAddressLine1">{{ trans('frontend.account_address_line_1') }}</label>
        <textarea class="form-control" id="account_bill_adddress_line_2" name="account_bill_adddress_line_2" placeholder="{{ trans('frontend.address_line_2') }}"> {{ $frontend_account_details->address_details->account_bill_adddress_line_2 }} </textarea>
      </div>
    </div>
  

  @else
    <div class="col-md-12">
      <p>{{ trans('frontend.contact_address_not_available') }}</p>
    </div>
  @endif

  <div class="col-12 padding-top-1x">
    <h5>{{ trans('frontend.shipping-address') }}</h5>
    <hr class="padding-bottom-1x">

    @if(!empty($frontend_account_details) && !empty($frontend_account_details->address_details))

      <div class="custom-control custom-checkbox d-block">
        <input class="custom-control-input" type="checkbox" id="same_address" checked>
        <label class="custom-control-label" for="same_address">{{ trans('frontend.same-contact-address') }}</label>
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
  </div>
</form>