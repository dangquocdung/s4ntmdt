<!DOCTYPE html>
<html lang="en">
  <head>
    @include('includes.frontend.head')

  </head>
  <!-- Body-->
  <body>
    @if(get_appearance_settings()['general']['custom_css'] == true)
      @include('includes.frontend.content-custom-css')
    @endif
    <!-- Header-->
    <!-- Remove "navbar-sticky" class to make navigation bar scrollable with the page.-->

    @include('includes.frontend.header')
      
    <!-- Page Content-->

    @yield('content')

    <!-- Site Footer-->
    @include('includes.frontend.footer')

    <div class="add-to-cart-loader">
      <img src="{{ asset('/images/loading.gif') }}" id="img-load" />
      <!-- <div class="cart-updating-msg">{{ trans('frontend.cart_updating_msg') }}</div> -->
    </div>

    <input type="hidden" name="lang_code" id="lang_code" value="{{ $selected_lang_code }}">  
    <input type="hidden" name="subscription_type" id="subscription_type" value="{{ $subscriptions_data['subscribe_type'] }}">

    <input type="hidden" name="hf_base_url" id="hf_base_url" value="{{ url('/') }}">
    <input type="hidden" name="cart_url" id="cart_url" value="{{ route('cart-page') }}">
    <input type="hidden" name="currency_symbol" id="currency_symbol" value="{{ $_currency_symbol }}">

    @if(Request::is('san-pham/chi-tiet/*'))
    <!-- Photoswipe container-->
    
    @endif
    
    <!-- Back To Top Button-->
    <a class="scroll-to-top-btn" href="#"><i class="icon-chevron-up"></i></a>
    <!-- Backdrop-->
    <div class="site-backdrop"></div>
    <!-- JavaScript (jQuery) libraries, plugins and custom scripts-->
    <script src="/js/vendor.min.js"></script>
    <!-- <script src="js/scripts.min.js"></script> -->
    <script src="{{ mix('/js/app.js') }}"></script>

  </body>
</html>