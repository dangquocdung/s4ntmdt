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

      <!-- Page Title-->  
      @if(!Request::is('/'))
        <div class="page-title">
          <div class="container">
            <div class="column">
              <h1>@yield('breadcrumb')</h1>
            </div>
            @yield('breadcrumbs')
            {{-- <div class="column">
              <ul class="breadcrumbs">
                <li>
                  <a href="{{ route('home-page') }}">Trang chủ</a>
                </li>
                <li class="separator">&nbsp;</li>
                <li>@yield('breadcrumbs')</li>
              </ul>
            </div> --}}
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

    <!-- Photoswipe container-->
  <div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="pswp__bg"></div>
    <div class="pswp__scroll-wrap">
      <div class="pswp__container">
        <div class="pswp__item"></div>
        <div class="pswp__item"></div>
        <div class="pswp__item"></div>
      </div>
      <div class="pswp__ui pswp__ui--hidden">
        <div class="pswp__top-bar">
          <div class="pswp__counter"></div>
          <button class="pswp__button pswp__button--close" title="Close (Esc)"></button>
          <button class="pswp__button pswp__button--share" title="Share"></button>
          <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>
          <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>
          <div class="pswp__preloader">
            <div class="pswp__preloader__icn">
              <div class="pswp__preloader__cut">
                <div class="pswp__preloader__donut"></div>
              </div>
            </div>
          </div>
        </div>
        <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
          <div class="pswp__share-tooltip"></div>
        </div>
        <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)"></button>
        <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)"></button>
        <div class="pswp__caption">
          <div class="pswp__caption__center"></div>
        </div>
      </div>
    </div>
  </div>

    <!-- Back To Top Button-->
    <a class="scroll-to-top-btn" href="#"><i class="icon-arrow-up"></i></a>
    <!-- Backdrop-->
    <div class="site-backdrop"></div>

    <!-- JavaScript (jQuery) libraries, plugins and custom scripts-->
    <script type="text/javascript" src="/js/vendor.min.js"></script>
    <script type="text/javascript" src="{{ mix('/js/app.js') }}"></script>
    <!-- <script type="text/javascript" src="http://themes.rokaux.com/unishop/v3.2.1/template-1/customizer/customizer.min.js"></script> -->

  
  </body>
</html>