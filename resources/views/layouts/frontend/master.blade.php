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

    <input type="hidden" name="hf_base_url" id="hf_base_url" value="{{ url('/') }}">
    <input type="hidden" name="cart_url" id="cart_url" value="{{ route('cart-page') }}">
    <input type="hidden" name="currency_symbol" id="currency_symbol" value="{{ $_currency_symbol }}">

    <div id="shadow-layer"></div>
    <div id="loader-1"></div>
    <div id="loader-2"></div>
    <div id="loader-3"></div>

    @if(Request::is('product/customize/*') || Request::is('/san-pham/chi-tiet/*'))
      @if(get_product_type($single_product_details['id']) == 'configurable_product' || get_product_type($single_product_details['id']) == 'customizable_product' || get_product_type($single_product_details['id']) == 'downloadable_product')
        <input type="hidden" name="selected_variation_id" id="selected_variation_id">
      @endif
    @endif
    
    @if(Request::is('checkout') || Request::is('cart'))
      <div class="modal fade" id="customizeImages" tabindex="-1" role="dialog" aria-labelledby="updater" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">  
            <div class="modal-header">
              <p class="no-margin">{!! trans('frontend.all_design_images') !!}</p>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>    
            <div class="modal-body" style="text-align: center;"></div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default attachtopost" data-dismiss="modal">{{ trans('frontend.close') }}</button>
            </div>
          </div>
        </div>
      </div>
    @endif

    <div class="add-to-cart-loader">
      <div class="spinner-border text-primary m-2" role="status"><span class="sr-only">Loading...</span></div>
      <!-- <div class="spinner-border text-gray-dark m-2" style="width: 3rem; height: 3rem;" role="status"><span class="sr-only">Loading...</span></div> -->
      <!-- <img src="{{ asset('/images/loading.gif') }}" id="img-load" />
      <div class="cart-updating-msg">{{ trans('frontend.cart_updating_msg') }}</div> -->
    </div>
    
    <input type="hidden" name="lang_code" id="lang_code" value="{{ $selected_lang_code }}">  
    <input type="hidden" name="subscription_type" id="subscription_type" value="{{ $subscriptions_data['subscribe_type'] }}">

    @if( Request::is('/san-pham/chi-tiet/*') )

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

    @endif
    
    <!-- Back To Top Button-->
    <a class="scroll-to-top-btn" href="#"><i class="icon-chevron-up"></i></a>
    <!-- Backdrop-->
    <div class="site-backdrop"></div>

    <!-- JavaScript (jQuery) libraries, plugins and custom scripts-->
    <script type="text/javascript" src="{{ URL::asset('/js/common.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('/js/vendor.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('/plugins/iCheck/icheck.min.js') }}"></script>
    <script type="text/javascript" src="{{ mix('/js/app.js') }}"></script>

    <script>
      $(document).ready(function(){
        // console.log($('.comparison-item:first-child').css('height'));

        // $('.comparison-item').not(':first').css('height',$('.comparison-item:first-child').css('height'));

        if ( $('div.comparison-item').length ){

          var maxHeight = -1;

          $('div.comparison-item').each(function() {
              if ($(this).height() > maxHeight) {
                  maxHeight = $(this).height();
              }
          });
          $('div.comparison-item').height(maxHeight);

        }

      })

    </script>

  </body>
</html>