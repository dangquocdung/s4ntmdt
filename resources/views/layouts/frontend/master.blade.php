<!DOCTYPE html>
<html lang="vi">
  <head>
    @include('includes.frontend.head')
    
  </head>
  <!-- Body-->
  <body>

    @if(get_appearance_settings()['general']['custom_css'] == true)
    @include('includes.frontend.content-custom-css')
    @endif
    
    @include('includes.frontend.header')

    <!-- Off-Canvas Wrapper-->

    <!-- Off-Canvas Wrapper-->
    <div class="offcanvas-wrapper">

        @if(!Request::is('/'))
        <!-- Page Title-->
        <div class="page-title">
          <div class="container">
            <div class="column">
              <h1>@yield('breadcrumbs')</h1>
            </div>
            <div class="column">
              <ul class="breadcrumbs">
                <li>
                  <a href="{{ route('home-page') }}">Trang chủ</a>
                </li>
                <li class="separator">&nbsp;</li>
                <li>@yield('breadcrumbs')</li>
              </ul>
            </div>
          </div>
        </div>
        @endif

        @yield('content')

        @include('includes.frontend.footer')


        <div class="add-to-cart-loader">
          <img src="{{ asset('/images/loading.gif') }}" id="img-load" />
          <div class="cart-updating-msg">{{ trans('frontend.cart_updating_msg') }}</div>
        </div>

    </div>

    <input type="hidden" name="lang_code" id="lang_code" value="{{ $selected_lang_code }}">  
    <input type="hidden" name="subscription_type" id="subscription_type" value="{{ $subscriptions_data['subscribe_type'] }}">

    <input type="hidden" name="hf_base_url" id="hf_base_url" value="{{ url('/') }}">
    <input type="hidden" name="cart_url" id="cart_url" value="{{ route('cart-page') }}">
    <input type="hidden" name="currency_symbol" id="currency_symbol" value="{{ $_currency_symbol }}">

    <!-- Back To Top Button-->
    <a class="scroll-to-top-btn" href="#"><i class="icon-arrow-up"></i></a>
    <!-- Backdrop-->
    <div class="site-backdrop"></div>
  
  </body>
</html>