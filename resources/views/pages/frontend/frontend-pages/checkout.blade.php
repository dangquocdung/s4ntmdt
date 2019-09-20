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
            <a class="step active" href="{{ route('checkout-process') }}">
              <h4 class="step-title">1. Address</h4>
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

          <h4>Billing Address</h4>

          <hr class="padding-bottom-1x">
          <div class="row">
            <div class="col-sm-6">

              <div class="form-group">
                <label for="checkout-fn">First Name</label>
                <input class="form-control" type="text" id="checkout-fn">
              </div>

            </div>
            <div class="col-sm-6">
              <div class="form-group">

                <label for="checkout-ln">Last Name</label>
                <input class="form-control" type="text" id="checkout-ln">
                
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
                <label for="checkout-email">E-mail Address</label>
                <input class="form-control" type="email" id="checkout-email">
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label for="checkout-phone">Phone Number</label>
                <input class="form-control" type="text" id="checkout-phone">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
                <label for="checkout-company">Company</label>
                <input class="form-control" type="text" id="checkout-company">
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label for="checkout-country">Country</label>
                <select class="form-control" id="checkout-country">
                  <option>Choose country</option>
                  <option>Australia</option>
                  <option>Canada</option>
                  <option>France</option>
                  <option>Germany</option>
                  <option>Switzerland</option>
                  <option>USA</option>
                </select>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
                <label for="checkout-city">City</label>
                <select class="form-control" id="checkout-city">
                  <option>Choose city</option>
                  <option>Amsterdam</option>
                  <option>Berlin</option>
                  <option>Geneve</option>
                  <option>New York</option>
                  <option>Paris</option>
                </select>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label for="checkout-zip">ZIP Code</label>
                <input class="form-control" type="text" id="checkout-zip">
              </div>
            </div>
          </div>
          <div class="row padding-bottom-1x">
            <div class="col-sm-6">
              <div class="form-group">
                <label for="checkout-address1">Address 1</label>
                <input class="form-control" type="text" id="checkout-address1">
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label for="checkout-address2">Address 2</label>
                <input class="form-control" type="text" id="checkout-address2">
              </div>
            </div>
          </div>
          <h4>Shipping Address</h4>
          <hr class="padding-bottom-1x">
          <div class="form-group">
            <div class="custom-control custom-checkbox">
              <input class="custom-control-input" type="checkbox" id="same_address" checked>
              <label class="custom-control-label" for="same_address">Same as billing address</label>
            </div>
          </div>
          <div class="d-flex justify-content-between paddin-top-1x mt-4"><a class="btn btn-outline-secondary" href="cart.html"><i class="icon-arrow-left"></i><span class="hidden-xs-down">&nbsp;Back To Cart</span></a><a class="btn btn-primary" href="checkout-shipping.html"><span class="hidden-xs-down">Continue&nbsp;</span><i class="icon-arrow-right"></i></a></div>
        </div>
        <!-- Sidebar          -->
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
            <a class="card border-0 bg-secondary" href="shop-grid-ls.html">
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