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
  <div id="checkout_page" class="container padding-bottom-3x mb-1">
    <div class="row">

      <div class="col-xl-9 col-lg-8">

        @if( Cart::named('thanh-toan')->count() >0 )
        <form class="form-horizontal" method="post" action="{{ route('checkout-process') }}" enctype="multipart/form-data">
          <input type="hidden" name="_token" value="{{ csrf_token() }}"> 
          <div class="checkout-content cart-data">
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

            @include('includes.checkout.step1_cart_summary')
            @yield('cart_summary')

            @include('includes.checkout.step2_user_mode')
            @yield('user_mode')

            @include('includes.checkout.step3_guest_user_address')
            @yield('guest_user_address')

            @include('includes.checkout.step4_authentication')
            @yield('authentication')

            @include('includes.checkout.step5_login_user_address')
            @yield('login_user_address')

            @include('includes.checkout.step6_payment')
            @yield('payment')

            @include('includes.checkout.step7_order_notes')
            @yield('order_notes')

            <br>
            <div class="shopping-cart-footer">
              <div class="column">
                <button class="action next btn btn-primary" style="float:right">{!! trans('frontend.proceed_to_checkout_label') !!}</button>
              </div>
              <div class="column">
                <button name="checkout_proceed" class="action submit btn btn-danger place-order" type="submit" value="checkout_proceed">{{ trans('frontend.place_order') }}</button>
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
          <div class="empty-cart-msg">{{ trans('frontend.empty_cart_msg') }}</div>
          <br>
          <div class="cart-return-shop">
            <a class="btn btn-secondary check_out" href="{{ route('shop-page') }}">{{ trans('frontend.return_to_shop') }}</a>
          </div>
        @endif

      </div>

      <!-- Sidebar -->
      <div class="col-xl-3 col-lg-4">
        <aside class="sidebar">
          <div class="padding-top-2x hidden-lg-up"></div>
          <!-- Order Summary Widget-->
          @include('pages.ajax-pages.cart-total-html')
          
          <!-- Featured Products Widget-->
          @if ($seen_items <> '')

            <section class="widget widget-featured-products">
              <h3 class="widget-title">{{ trans('frontend.sp_da_xem') }}</h3>

              @foreach($seen_items as $products)
                <?php 
                    $reviews          = get_comments_rating_details($products['id'], 'product');
                    $reviews_settings = get_reviews_settings_data($products['id']);      
                ?>

                <!-- Entry-->
                <div class="entry">
                  <div class="entry-thumb" style="width:80px"> 
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
                        {!! price_html( get_product_price_html_by_filter(get_role_based_price_by_product_id($products['id'], $products['product_regular_price'])), get_frontend_selected_currency()) !!}
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
          {{-- <a class="card border-0 bg-secondary" href="shop-grid-ls.html">
            <div class="card-body"><span class="d-block text-lg text-thin mb-2">Limited Time Deals</span>
              <h3>Surface Pro 4</h3>
              <p class="d-inline-block bg-warning text-white">&nbsp;&nbsp;Shop Now&nbsp;<i class="icon-chevron-right d-inline-block align-middle"></i>&nbsp;</p>
            </div><img class="d-block mx-auto" src="img/shop/widget/promo.jpg" alt="Surface Pro">
          </a> --}}
        </aside>
      </div>

    </div>
      
  </div>
@endsection