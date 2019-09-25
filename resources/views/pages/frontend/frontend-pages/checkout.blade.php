@extends('layouts.frontend.master')
@section('title', trans('frontend.shopist_checkout') .' | '. get_site_title() )

@section('content')

  <!-- Page Title-->
  <div class="page-title">
    <div class="container">
      <div class="column">
        <h1>{{ trans('frontend.checkout') }}</h1>
      </div>
      <div class="column">
        <ul class="breadcrumbs">
          <li>
            <a href="{{ route('home-page') }}">{{ trans('frontend.home') }}</a>
          </li>
          <li class="separator">&nbsp;</li>
          <li>{{ trans('frontend.checkout') }}</li>
        </ul>
      </div>
    </div>
  </div>

  <!-- Page Content-->
  <div id="checkout_page" class="container">
      @if( Cart::count() >0 )
      <form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{ csrf_token() }}"> 
        <div class="row">
          <div class="col-md-10 col-sm-12 col-centered">    
            <div class="checkout-content">
              @if (count($errors) > 0)
                <div class="alert alert-danger">
                  <strong>{!! trans('validation.whoops') !!}</strong> {!! trans('validation.input_error') !!}<br /><br />
                  <ul>
                    @foreach ($errors->all() as $error)
                      <li>{!! $error !!}</li>
                    @endforeach
                  </ul>
                </div>
              @endif

              <div class="progress">
                <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
              </div>

              <div id="cart_summary" class="step well">
                <!-- <h2 class="step-title">{!! trans('frontend.shopping_cart_summary_label') !!}</h2><hr> -->
                <div class="shopping-cart-summary-content">
                  <div class="table-responsive shopping-cart">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>{!! trans('frontend.cart_item') !!}</th>
                          <th class="text-center">{!! trans('frontend.quantity') !!}</th>
                          <th class="text-center">{!! trans('frontend.price') !!}</th>
                          <th class="text-center">
                            <input type="submit" name="empty_cart" class="btn btn-sm btn-outline-danger" value="{{ trans('frontend.clear_cart') }}">  
                          </th>

                        </tr>
                      </thead>
                      <tbody>

                        @foreach(Cart::items() as $index => $items)
                        
                        <tr>
                          <td>
                            <div class="product-item">
                              <a class="product-thumb" href="{{ route('details-page', get_product_slug($items->id)) }}" target="_blank">
                                @if($items->img_src)
                                  <img src="{{ get_image_url($items->img_src) }}" alt="product">
                                @else
                                  <img src="{{ default_placeholder_img_src() }}" alt="no_image">
                                @endif
                              </a>

                              <div class="product-info">
                                <h4 class="product-title"><a href="{{ route('details-page', get_product_slug($items->id)) }}" target="_blank">{!! $items->name !!}</a></h4>
                                @if(count($items->options) > 0)
                                  @foreach($items->options as $key => $val)
                                    @if($count == count($items->options))
                                      {!! $key .' &#8658; '. $val !!}
                                    @else
                                      {!! $key .' &#8658; '. $val. ' , ' !!}
                                    @endif
                                    <?php $count ++ ; ?>
                                  @endforeach
                                @endif
                                @if(get_product_type($items->id) === 'customizable_product')
                                  @if($items->acces_token)
                                    @if(count(get_customize_images_by_access_token($items->acces_token))>0)
                                      <button class="btn btn-block btn-sm view-customize-images" data-images="{{ json_encode( get_customize_images_by_access_token($items->acces_token) ) }}">{{ trans('frontend.design_images') }}</button>
                                    @endif
                                  @endif
                                @endif
                                
                                @if( count(get_vendor_details_by_product_id($items->product_id)) >0 )
                                  <p class="vendor-title"><strong>{!! trans('frontend.vendor_label') !!}</strong> : {!! get_vendor_name_by_product_id( $items->product_id) !!}</p>
                                @endif
                              </div>
                            </div>
                          </td>

                          <td class="text-center">

                            <!-- <input type="number" class="form-control text-center" name="cart_quantity[{{ $index }}]" value="{{ $items->quantity }}" min="1"> -->

                            <div class="count-input">
                              <select class="form-control" name="cart_quantity[{{ $index }}]">
                                @for( $i=1; $i<=10; $i++)
                                  <option {{ ($i==$items->quantity?'selected':'' )}}>{{$i}}</option>
                                @endfor

                              </select>
                            </div>
                          </td>
                          <td class="text-center text-lg">
                            {!! price_html( get_product_price_html_by_filter( $items->price ), get_frontend_selected_currency() ) !!}
                          </td>
                        
                          <td class="text-center"><a class="remove-from-cart" href="{{ route('removed-item-from-cart', $index)}}" data-toggle="tooltip" title="Remove item"><i class="icon-x"></i></a></td>

                        </tr>

                        @endforeach

                      </tbody>
                    </table>
                  </div>
                </div>
              </div>

              <!-- Xác định người dùng -->
              @if($_settings_data['general_settings']['checkout_options']['enable_guest_user'] == true || $_settings_data['general_settings']['checkout_options']['enable_login_user'] == true)
                <div id="user_mode" class="step well">
                  <!-- <h2 class="step-title">{!! trans('frontend.user_mode_label') !!}</h2><hr>   -->
                  <div class="checkout-process-user-mode">
                  
                    <ul style="list-style:none">

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

              <!-- Địa chỉ khách hàng -->
              @if($_settings_data['general_settings']['checkout_options']['enable_guest_user'] == true || ($_settings_data['general_settings']['checkout_options']['enable_guest_user'] == false && $_settings_data['general_settings']['checkout_options']['enable_login_user'] == false))
                <div id="guest_user_address" class="step well">
                  <div class="user-address-content mt-3">
                    <div class="address-information clearfix">
                      <div class="address-content-sub">
                        <h4>{!! trans('frontend.thong-tin-khach-hang') !!}</h4>
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

                <script>
                    $('#account_bill_select_country').on('change',function(){
                      $.ajax({
                        url: $('#hf_base_url').val() + '/ajax/quan-huyen',
                        type: 'POST',
                        cache: false,
                        datatype: 'html',
                        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                        data: { data: this.value },
                        success: function(data) {
                            if (data.success == true) {
                              $("#account_bill_town_or_city").empty();
                              $("#account_bill_town_or_city").html(data.html);
                              $("#account_bill_xa_phuong").empty();
                            }else{
                              console.log('chua duoc');
                            }
                        },
                        error: function() {}
                      });
                    });

                    $('#account_bill_town_or_city').on('click',function(){
                      $.ajax({
                        url: $('#hf_base_url').val() + '/ajax/xa-phuong',
                        type: 'POST',
                        cache: false,
                        datatype: 'html',
                        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                        data: { data: this.value },
                        success: function(data) {
                            if (data.success == true) {
                              $("#account_bill_xa_phuong").empty();
                              $("#account_bill_xa_phuong").html(data.html);
                            }else{
                              console.log('chua duoc');
                            }
                        },
                        error: function() {}
                      });

                    });

                    $('#account_shipping_select_country').on('change',function(){
                      $.ajax({
                        url: $('#hf_base_url').val() + '/ajax/quan-huyen',
                        type: 'POST',
                        cache: false,
                        datatype: 'html',
                        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                        data: { data: this.value },
                        success: function(data) {
                            if (data.success == true) {
                              $("#account_shipping_town_or_city").empty();
                              $("#account_shipping_town_or_city").html(data.html);
                              $("#account_shipping_xa_phuong").empty();
                            }else{
                              console.log('chua duoc');
                            }
                        },
                        error: function() {}
                      });

                    });

                    $('#account_shipping_town_or_city').on('click',function(){
                      $.ajax({
                        url: $('#hf_base_url').val() + '/ajax/xa-phuong',
                        type: 'POST',
                        cache: false,
                        datatype: 'html',
                        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                        data: { data: this.value },
                        success: function(data) {
                            if (data.success == true) {
                              $("#account_shipping_xa_phuong").empty();
                              $("#account_shipping_xa_phuong").html(data.html);
                            }else{
                              console.log('chua duoc');
                            }
                        },
                        error: function() {}
                      });

                    })
                  </script>
              @endif

              @if($_settings_data['general_settings']['checkout_options']['enable_login_user'] == true && $is_user_login == false)
              <div id="authentication" class="step well">
                <h2 class="step-title">{!! trans('frontend.authentication_label') !!}</h2><hr>  
                <div class="user-login-content">
                  <div class="login-information clearfix">
                    <div class="login-content-sub">
                      <h3 class="page-subheading">{!! trans('frontend.create_an_account_label') !!}</h3>
                      <div class="form_content">
                        <p>{!! trans('frontend.no_user_account_msg') !!}</p>
                        <a class="btn btn-secondary" href="{{ route('user-registration-page') }}">{!! trans('frontend.create_account_label') !!}</a>
                      </div>
                    </div>
                    <div class="login-content-sub">
                      <h3 class="page-subheading">{!! trans('frontend.already_registered_label') !!}</h3>
                      <div class="form_content">
                        <p>{!! trans('frontend.has_user_account_msg') !!}</p>
                        <a class="btn btn-secondary" href="{{ route('user-login-page') }}">{!! trans('frontend.signin_account_label') !!}</a>
                      </div>
                    </div>
                  </div>  
                </div>
              </div>
              @endif

              @if($_settings_data['general_settings']['checkout_options']['enable_login_user'] == true && $is_user_login == true)
              <div id="login_user_address" class="step well">
                <h2 class="step-title">{!! trans('frontend.checkout_address_label') !!}</h2><hr> 
                <div class="text-right">
                  @if(!empty($login_user_account_data) && !empty($login_user_account_data->address_details))
                    <a href="{{ route('my-address-edit-page') }}" class="btn btn-secondary btn-sm">{{ trans('frontend.edit_address') }}</a>
                  @else
                    <a href="{{ route('my-address-add-page') }}" class="btn btn-secondary btn-sm">{{ trans('frontend.add_address') }}</a>
                  @endif
                </div>
                <br>
                <div class="user-address-content">
                  <div class="address-information clearfix">
                    <div class="address-content-sub">
                      <h3 class="page-subheading">{!! trans('frontend.billing_address') !!}</h3><br>
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
                    <div class="address-content-sub">
                      <h3 class="page-subheading">{!! trans('frontend.shipping_address') !!}</h3><br>

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

              @if($_settings_data['general_settings']['checkout_options']['enable_guest_user'] == true || ($_settings_data['general_settings']['checkout_options']['enable_login_user'] == true && $is_user_login == true) || ($_settings_data['general_settings']['checkout_options']['enable_guest_user'] == false && $_settings_data['general_settings']['checkout_options']['enable_login_user'] == false))
              <div id="payment" class="step well">
                <h2 class="step-title">{!! trans('frontend.choose_payment') !!}</h2><hr>
                @if($payment_method_data['payment_option']['enable_payment_method'] == 'yes' && ($payment_method_data['bacs']['enable_option'] == 'yes' || $payment_method_data['cod']['enable_option'] == 'yes' || $payment_method_data['paypal']['enable_option'] == 'yes' || $payment_method_data['stripe']['enable_option'] == 'yes'))
                  <div class="payment-options">
                   @if($payment_method_data['bacs']['enable_option'] == 'yes')
                    <span>
                     <label>
                       @if(old('payment_option') == 'bacs')
                       <input type="radio" class="shopist-iCheck" checked name="payment_option" value="bacs"> {{ $payment_method_data['bacs']['method_title'] }}
                       @else
                        <input type="radio" class="shopist-iCheck" name="payment_option" value="bacs"> {{ $payment_method_data['bacs']['method_title'] }}
                       @endif
                     </label>
                    </span>
                   @endif

                   @if($payment_method_data['cod']['enable_option'] == 'yes')
                    <span>
                     <label>
                       @if(old('payment_option') == 'cod')
                        <input type="radio" checked name="payment_option" class="shopist-iCheck" value="cod"> {{ $payment_method_data['cod']['method_title'] }}
                       @else
                        <input type="radio" name="payment_option" class="shopist-iCheck" value="cod"> {{ $payment_method_data['cod']['method_title'] }}
                       @endif
                     </label>
                    </span>
                   @endif

                   @if($payment_method_data['paypal']['enable_option'] == 'yes')
                    <span>
                     <label>
                       @if(old('payment_option') == 'paypal')
                        <input type="radio" checked name="payment_option" class="shopist-iCheck" value="paypal"> {{ $payment_method_data['paypal']['method_title'] }}
                       @else
                        <input type="radio" name="payment_option" class="shopist-iCheck" value="paypal"> {{ $payment_method_data['paypal']['method_title'] }}
                       @endif
                     </label>
                    </span>
                   @endif

                   @if($payment_method_data['stripe']['enable_option'] == 'yes')
                    <script src='https://js.stripe.com/v2/' type='text/javascript'></script>
                    <input type="hidden" name="stripe_api_key" value="{{ $stripe_api_key }}" id="stripe_api_key">
                    <span>
                     <label>
                       @if(old('payment_option') == 'stripe')
                        <input type="radio" checked name="payment_option" class="shopist-iCheck" value="stripe"> {{ $payment_method_data['stripe']['method_title'] }}
                       @else
                        <input type="radio" name="payment_option" class="shopist-iCheck" value="stripe"> {{ $payment_method_data['stripe']['method_title'] }}
                       @endif
                     </label>
                    </span>
                   @endif

                   @if($payment_method_data['2checkout']['enable_option'] == 'yes')
                   <script type="text/javascript" src="https://www.2checkout.com/checkout/api/2co.min.js"></script>
                   <input type="hidden" name="2checkout_api_data" value="{{ $twocheckout_api_data }}" id="2checkout_api_data">
                    <span>
                     <label>
                       @if(old('payment_option') == '2checkout')
                        <input type="radio" checked name="payment_option" class="shopist-iCheck" value="2checkout"> {{ $payment_method_data['2checkout']['method_title'] }}
                       @else
                        <input type="radio" name="payment_option" class="shopist-iCheck" value="2checkout"> {{ $payment_method_data['2checkout']['method_title'] }}
                       @endif
                     </label>
                    </span>
                   @endif

                   @if($payment_method_data['bacs']['enable_option'] == 'yes')
                    <div id="bacsPopover">
                      <p>{{ $payment_method_data['bacs']['method_description'] }}</p>
                    </div>
                   @endif
                   @if($payment_method_data['cod']['enable_option'] == 'yes')
                    <div id="codPopover">
                      <p>{{ $payment_method_data['cod']['method_description'] }}</p>
                    </div>
                   @endif
                   @if($payment_method_data['paypal']['enable_option'] == 'yes')
                    <div id="paypalPopover">
                      <p>{{ $payment_method_data['paypal']['method_description'] }}</p>
                    </div>
                   @endif

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

              @if($_settings_data['general_settings']['checkout_options']['enable_guest_user'] == true || ($_settings_data['general_settings']['checkout_options']['enable_login_user'] == true && $is_user_login == true) || ($_settings_data['general_settings']['checkout_options']['enable_guest_user'] == false && $_settings_data['general_settings']['checkout_options']['enable_login_user'] == false))
              <div id="order_notes" class="step well">
                <h2 class="step-title">{!! trans('frontend.order_notes') !!}</h2><hr>
                <div class="order-extra-notes">
                  <textarea name="checkout_order_extra_message" id="checkout_order_extra_message"  placeholder="{{ trans('frontend.notes_about_your_order') }}" class="form-control">{!! old('checkout_order_extra_message') !!}</textarea>
                </div>
              </div>
              @endif

              <br>
              <button class="action next btn btn-secondary">{!! trans('frontend.proceed_to_checkout_label') !!}</button>
              <button name="checkout_proceed" class="action submit btn btn-secondary place-order" type="submit" value="checkout_proceed">{{ trans('frontend.place_order') }}</button>
            </div>
          </div>  
        </div>    
        <input type="hidden" id="selected_user_mode" name="selected_user_mode">
        <input type="hidden" id="is_user_login" name="is_user_login" value="{{ $is_user_login }}">
        <input type="hidden" id="selected_payment_method" name="selected_payment_method">
        @if(!empty($login_user_account_data) && !empty($login_user_account_data->address_details))
        <input type="hidden" id="is_login_user_address_exists" name="is_login_user_address_exists" value="address_added">
        @endif
      </form>    
      @else
        <p>@include('pages-message.notify-msg-error')</p>
        <h2 class="cart-shopping-label">{{ trans('frontend.checkout_process') }}</h2>
        <div class="empty-cart-msg">{{ trans('frontend.empty_cart_msg') }}</div>
        <div class="cart-return-shop"><a class="btn btn-secondary check_out" href="{{ route('shop-page') }}">{{ trans('frontend.return_to_shop') }}</a></div>
      @endif
  </div>
@endsection