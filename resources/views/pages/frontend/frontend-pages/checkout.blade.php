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
    <div class="container padding-bottom-3x mb-2">

    @if( Cart::count() >0 )

      <div class="row">
        <!-- Checkout Adress-->
        <div class="col-xl-9 col-lg-8">
          <div class="steps flex-sm-nowrap mb-5">
            <a class="step" href="{{ route('checkout-process') }}">
              <h4 class="step-title">1. {{ trans('frontend.address') }}</h4>
            </a>
            <a class="step" href="#">
              <h4 class="step-title">2. Shipping</h4>
            </a>
            <a class="step" href="#">
              <h4 class="step-title">3. Payment</h4></a>
            <a class="step" href="#">
              <h4 class="step-title">4. Review</h4>
            </a>
          </div>

          <h4>{{ trans('frontend.billing_address') }}</h4>

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
          
            <input type="hidden" id="account_bill_select_country" name="account_bill_select_country" value="VN">

            <div class="col-sm-12">
              <div class="form-group">
                <label class="control-label" for="inputAccountAddressLine1">{{ trans('frontend.account_address_line_1') }}</label>
                <textarea class="form-control" id="account_bill_adddress_line_1" name="account_bill_adddress_line_1" placeholder="{{ trans('frontend.address_line_1') }}">{{ old('account_bill_adddress_line_1') }}</textarea>
              </div>
            </div>
          
            <div class="col-sm-6">
              <div class="form-group">

                <label class="control-label" for="inputAccountTownCity">{{ trans('frontend.account_address_town_city') }}</label>
                <input type="text" class="form-control" placeholder="{{ trans('frontend.town_city') }}" name="account_shipping_town_or_city" id="account_shipping_town_or_city" value="{{ old('account_shipping_town_or_city') }}">
            
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">

                <label class="control-label" for="inputAccountZipPostalCode">{{ trans('frontend.checkout_zip_postal_label') }}</label>
                <input type="number" class="form-control" placeholder="{{ trans('frontend.zip_postal_code') }}" name="account_shipping_zip_or_postal_code" id="account_shipping_zip_or_postal_code" value="{{ old('account_shipping_zip_or_postal_code') }}">
              </div>
            </div>
          </div>

          <br>

          <h4>{!! trans('frontend.shipping_address') !!}</h4>
          <hr class="padding-bottom-1x">
          <div class="form-group">

          <input type="checkbox" name="different_shipping_address" id="different_shipping_address" class="shopist-iCheck" value="different_address"> {{ trans('frontend.different_shipping_label') }}

          </div>



          <div class="row different-shipping-address" style="display:none">

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
          
            <input type="hidden" id="account_bill_select_country" name="account_bill_select_country" value="VN">

            <div class="col-sm-12">
              <div class="form-group">
                <label class="control-label" for="inputAccountAddressLine1">{{ trans('frontend.account_address_line_1') }}</label>
                <textarea class="form-control" id="account_bill_adddress_line_1" name="account_bill_adddress_line_1" placeholder="{{ trans('frontend.address_line_1') }}">{{ old('account_bill_adddress_line_1') }}</textarea>
              </div>
            </div>
          
            <div class="col-sm-6">
              <div class="form-group">

                <label class="control-label" for="inputAccountTownCity">{{ trans('frontend.account_address_town_city') }}</label>
                <input type="text" class="form-control" placeholder="{{ trans('frontend.town_city') }}" name="account_shipping_town_or_city" id="account_shipping_town_or_city" value="{{ old('account_shipping_town_or_city') }}">
            
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">

                <label class="control-label" for="inputAccountZipPostalCode">{{ trans('frontend.checkout_zip_postal_label') }}</label>
                <input type="number" class="form-control" placeholder="{{ trans('frontend.zip_postal_code') }}" name="account_shipping_zip_or_postal_code" id="account_shipping_zip_or_postal_code" value="{{ old('account_shipping_zip_or_postal_code') }}">
              </div>
            </div>
          </div>

          <script>

            $(document).ready(function(){

              if ($('#different_shipping_address').length > 0) {

                $('#different_shipping_address').on('ifChecked', function(event) {
                    $('.different-shipping-address').show();
                });
                $('#different_shipping_address').on('ifUnchecked', function(event) {
                    $('.different-shipping-address').hide();
                });

              }

            })

      

    </script>

          <div class="d-flex justify-content-between paddin-top-1x mt-4"><a class="btn btn-outline-secondary" href="cart.html"><i class="icon-arrow-left"></i><span class="hidden-xs-down">&nbsp;Back To Cart</span></a><a class="btn btn-primary" href="checkout-shipping.html"><span class="hidden-xs-down">Continue&nbsp;</span><i class="icon-arrow-right"></i></a></div>
        </div>
        <!-- Sidebar-->
        <div class="col-xl-3 col-lg-4">
          <aside class="sidebar">
            <div class="padding-top-2x hidden-lg-up"></div>

            <!-- Order Summary Widget-->
            @include('pages.ajax-pages.cart-total-html')

            @if ($seen_items <> '')
              <!-- Featured Products Widget-->
              <section class="widget widget-featured-products">
                <h3 class="widget-title">{{ trans('frontend.sp_da_xem') }}</h3>

                @foreach($seen_items as $products)
                <?php 
                    $reviews          = get_comments_rating_details($products['id'], 'product');
                    $reviews_settings = get_reviews_settings_data($products['id']);      
                ?>

                <!-- Entry-->
                <div class="entry">
                  <div class="entry-thumb">
                    <a href="{{ route('details-page', $products['post_slug']) }}">
                      @if($products['product_image'])
                      <img src="{{ get_image_url($products['product_image']) }}" alt="{{ basename($products['product_image']) }}" />
                      @else
                      <img src="{{ default_placeholder_img_src() }}" alt="" />
                      @endif
                    </a>
                  </div>
                  <div class="entry-content">
                    <h4 class="entry-title">
                      <a href="{{ route('details-page', $products['post_slug']) }}">{!! $products['post_title'] !!}</a>
                    </h4>
                    <span class="entry-meta">

                    @if ( $products['product_price'] < $products['product_regular_price'] )
                    <del>
                        {!! price_html( get_product_price_html_by_filter(get_role_based_price_by_product_id($products['id'], $products['regular_price'])), get_frontend_selected_currency()) !!}
                    </del>
                    @endif
                    @if(get_product_type($products['id']) == 'simple_product')
                    {!! price_html( get_product_price($products['id']), get_frontend_selected_currency() ) !!}
                    @elseif(get_product_type($products['id']) == 'configurable_product')
                    {!! get_product_variations_min_to_max_price_html(get_frontend_selected_currency(), $products['id']) !!}
                    @elseif(get_product_type($products['id']) == 'customizable_product' || get_product_type($products['id']) == 'downloadable_product')
                    @if(count(get_product_variations($products['id']))>0)
                        {!! get_product_variations_min_to_max_price_html(get_frontend_selected_currency(), $products['id']) !!}
                    @else
                        {!! price_html( get_product_price($products['id']), get_frontend_selected_currency() ) !!}
                    @endif
                    @endif
                      
                    </span>
                  </div>
                </div>

                @endforeach

              </section>
            @endif

            <!-- Promo Banner-->
            <a class="card border-0 bg-secondary" href="#">
              <div class="card-body"><span class="d-block text-lg text-thin mb-2">Limited Time Deals</span>
                <h3>Surface Pro 4</h3>
                <p class="d-inline-block bg-warning text-white">&nbsp;&nbsp;Shop Now&nbsp;<i class="icon-chevron-right d-inline-block align-middle"></i>&nbsp;</p>
              </div><img class="d-block mx-auto" src="img/shop/widget/promo.jpg" alt="Surface Pro"></a>
          </aside>
        </div>
      </div>

      @else

        <div class="alert alert-info alert-dismissible fade show text-center" style="margin-bottom: 30px;">
          <span class="alert-close" data-dismiss="alert"></span>
          {{ trans('frontend.empty_cart_msg') }}
        </div>

        @include('pages-message.notify-msg-error')

        <div class="shopping-cart-footer">
          <div class="column">
            <a class="btn btn-outline-secondary" href="{{ route('shop-page') }}" style="margin-left:0; float:left">
              <i class="icon-arrow-left"></i>&nbsp;{{ trans('frontend.return_to_shop') }}
            </a>
          </div>
        </div>

      @endif

    </div>



    

@endsection