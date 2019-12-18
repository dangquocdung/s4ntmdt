<!DOCTYPE html>
<html lang="en">
  <head>
    @include('includes.frontend.head')

  </head>
  <!-- Body-->
  <body>

    @if( Request::is('/') )

      <style>

        .fb_dialog.fb_dialog_advanced {
            left: 18pt;
        }

        iframe.fb_customer_chat_bounce_in_v2 {
            left: 9pt;
        }
        iframe.fb_customer_chat_bounce_out_v2 {
            left: 9pt;
        }      
      </style>
      <!-- Load Facebook SDK for JavaScript -->
      <div id="fb-root"></div>
        <script>
          window.fbAsyncInit = function() {
            FB.init({
              xfbml            : true,
              version          : 'v4.0'
            });
          };

          (function(d, s, id) {
          var js, fjs = d.getElementsByTagName(s)[0];
          if (d.getElementById(id)) return;
          js = d.createElement(s); js.id = id;
          js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js';
          fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
      </script>

      <!-- Your customer chat code -->
      <div class="fb-customerchat"
        attribution=setup_tool
        page_id="123433239059181"
        theme_color="#0084ff">
      </div>

    @endif

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

    @include('modal.quick-view')

    <!-- Back To Top Button-->
    <a class="scroll-to-top-btn" href="#"><i class="icon-chevron-up"></i></a>
    <!-- Backdrop-->
    <div class="site-backdrop"></div>

    <!-- JavaScript (jQuery) libraries, plugins and custom scripts-->
    <!-- Main Template Styles-->
    <script type="text/javascript" src="{{ URL::asset('/js/vendor.min.js') }}"></script>

    <script type="text/javascript" src="{{ URL::asset('/dropzone/dropzone.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('/frontend/js/jquery.scrollUp.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('/sweetalert/sweetalert.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('/plugins/select2/select2.full.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('/modal/js/modal.js') }}"></script>

    <script type="text/javascript" src="{{ URL::asset('/frontend/js/social-network.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('/slick/slick.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('/common/base64.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('/plugins/iCheck/icheck.min.js') }}"></script>    
    	
    <!-- Sweet Alert2 Core js -->
	  <!-- <script type="text/javascript" src="{{ URL::asset('vendor/sweetalert2/sweetalert2.all.min.js') }}"></script> -->
        
    <script type="text/javascript" src="{{ mix('/js/app.js') }}"></script>

    <script type="text/javascript">
      var modalRequestProduct   = document.getElementById('request_product_modal');
      var modalQuickView        = document.getElementById('quick_view_modal');
      var modalProductVideo     = document.getElementById('product_video_modal');
      var modalSubscription     = document.getElementById('subscriptions_modal');
  
      if (typeof(modalRequestProduct) != 'undefined' && modalRequestProduct != null){
        var modalRequestProductInst = new Modal( modalRequestProduct );
        modalRequestProductInst.init();
      }
      
      if (typeof(modalQuickView) != 'undefined' && modalQuickView != null){
        var modalQuickViewInst = new Modal( modalQuickView );
        modalQuickViewInst.init();
      }
      
      if (typeof(modalProductVideo) != 'undefined' && modalProductVideo != null){
        var modalProductVideoInst = new Modal( modalProductVideo, {
          openCallback:function(){
            if($('#product_youtube_video').length>0 && $('#product_youtube_video_url').length>0 && !$('#product_youtube_video').attr('src')){
              $('#product_youtube_video').attr('src', $('#product_youtube_video_url').val());
            }
            
            if($('#product_video').length>0 && $('#product_video_url').length>0){
              if($('#product_video_extension').val() == 'mp4'){
                $("#product_video").html('<source src="'+ $('#product_video_url').val() +'" type="video/mp4"></source>' );
              }
              else if($('#product_video_extension').val() == 'ogv'){
                $("#product_video").html('<source src="'+ $('#product_video_url').val() +'" type="video/ogg"></source>' );
              }
            } 
          },
          closeCallback:function(){
            if($('#product_youtube_video').length>0 && $('#product_youtube_video').attr('src')){
              $('#product_youtube_video').attr('src', '');
            }
            
            if($('#product_video').length>0 && $('#product_video').find('source')){
              $('#product_video').html('');
            }
          }
        });
        modalProductVideoInst.init();
      }
      
      if (typeof(modalSubscription) != 'undefined' && modalSubscription != null){
        var modalSubscriptionInst = new Modal( modalSubscription );
        modalSubscriptionInst.init();
      }
      
      $(document).ready(function(){
        if($('.request-product').length>0){
          $('.request-product').on('click', function(){
            if($('#request_product_name').length>0){
              $('#request_product_name').val('');
            }
            if($('#request_product_email').length>0){
              $('#request_product_email').val('');
            }
            if($('#request_product_phone_number').length>0){
              $('#request_product_phone_number').val('');
            }
            if($('#request_product_description').length>0){
              $('#request_product_description').val('');
            }
            if($('.request-field-message').length>0){
              $('.request-field-message').remove();
            }
            
            modalRequestProductInst.openModal();
          });
        }
        
        if($('.quick-view-popup').length>0){
          $('.quick-view-popup').on('click', function(){
            
            $.ajax({
                url: $('#hf_base_url').val() + '/ajax/get-quick-view-data-by-product-id',
                type: 'POST',
                cache: false,
                datatype: 'json',
                headers: { 'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content') },
                data: { product_id: $(this).data('id') },
                success: function(data){
                  if(data.success == true){
                    $('#quick_view_modal').find('.modal__content').html( data.html );
                     modalQuickViewInst.openModal();
                  }
                },
                error:function(){}
            });
          });
        }
        
        if($('.product-video').length>0){
          $('.product-video').on('click', function(){
             modalProductVideoInst.openModal();
          });
        }
        
        if($('#subscriptions_modal').length>0){
          @if($subscriptions_data['subscription_visibility'] == true && !$is_subscribe_cookie_exists && (!empty(get_current_page_name()) && is_array($subscriptions_data['popup_display_page']) && count($subscriptions_data['popup_display_page']) > 0 && in_array(get_current_page_name(), $subscriptions_data['popup_display_page'])))
            setTimeout(function(){ modalSubscriptionInst.openModal(); }, 3000);
          @endif
        }
        
        if($('.set-popup-cookie').length>0){
          $('.set-popup-cookie').on('click', function(e){
            e.preventDefault();
            setCookieForSubscriptionPopup();
          });
        }
        
         var setCookieForSubscriptionPopup = function(){
          $.ajax({
                url: $('#hf_base_url').val() + '/ajax/set_subscription_popup_cookie',
                type: 'POST',
                cache: false,
                dataType: 'json',
                headers: { 'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content') },
                success: function(data)
                {
                  if(data.status == 'saved'){
                    modalSubscriptionInst.closeModal();
                  }
                },
                error:function(){}
          });
        }
      });
    </script>

    <script>

      //upload profile image
      if ($('#frontend_user_profile_picture_uploader').length > 0) {
          Dropzone.autoDiscover = false;
          $("#frontend_user_profile_picture_uploader").dropzone({
              url: $('#hf_base_url').val() + "/upload/product-related-image",
              paramName: "profile_picture",
              acceptedFiles: "image/*",
              uploadMultiple: false,
              maxFiles: 1,
              autoProcessQueue: true,
              parallelUploads: 100,
              addRemoveLinks: true,
              maxFilesize: 1,
              dataType: 'json',
              headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },

              init: function() {
                  this.on("maxfilesexceeded", function(file) {
                      swal("", frontendLocalizationString.maxfilesexceeded_msg);
                  });
                  this.on("error", function(file, message) {
                      if (file.size > 1 * 1024 * 1024) {
                          swal("", frontendLocalizationString.file_larger);
                          this.removeFile(file)
                          return false;
                      }
                      if (!file.type.match('image.*')) {
                          swal("", frontendLocalizationString.image_file_validation);
                          this.removeFile(file)
                          return false;
                      }
                  });

                  this.on("success", function(file, responseText) {
                      if (responseText.status === 'success') {
                          $('.profile-picture').find('img').attr('src', $('#hf_base_url').val() + '/uploads/' + responseText.name);
                          $('.profile-picture').show();
                          $('.no-profile-picture').hide();
                          $('#frontendUserUploadProfilePicture').modal('hide');
                          $('#hf_frontend_profile_picture').val('/uploads/' + responseText.name);

                          this.removeAllFiles();
                      }
                  });
              }
          });
      }

      if ($('.remove-frontend-profile-picture').length > 0) {
          $('.remove-frontend-profile-picture').on('click', function() {
              $('.no-profile-picture').show();
              $('.profile-picture').hide();
              $('#hf_frontend_profile_picture').val('');
          });
      }
        
    </script>

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

        if ($('#login-page').length > 0){

          var win = $(this);

          if (win.width() > 768) { 
            $('#login-page').addClass('offset-3');
          }
          else
          {
            $('#login-page').removeClass('offset-3');
          }

        }
      })

    </script>

    <script>

      $(window).on('resize', function(){

        if ($('#login-page').length > 0){

          var win = $(this);

          if (win.width() > 768) { 
            $('#login-page').addClass('offset-3');

          }
          else
          {
            $('#login-page').removeClass('offset-3');

          }
        }
      });

      if ($('#sendVendorContactMessage').length > 0) {
        $('#sendVendorContactMessage').on('click', function () {
          if ($('#contact_name').val() == '' || $('#contact_name').val() == null) {
            swal({
              type: 'error',
              title: 'Opps...!',
              text: 'Bạn chưa nhập tên!'
						});

            return false;
          }

          if ($('#contact_email_id').val() == '' || $('#contact_email_id').val() == null || !IsEmail($('#contact_email_id').val()) ) {
            swal({
              type: 'error',
              title: 'Opps...!',
              text: 'Bạn chưa nhập địa chỉ email hoặc email chưa đúng!'
						});
            return false;
          }

          if ($('#contact_message').val() == '' || $('#contact_message').val() == null) {
            swal({
              type: 'error',
              title: 'Opps...!',
              text: 'Bạn chưa nhập nội dung!'
						});
            return false;
          }

          if ($('#contact_name').val().length > 0 && $('#contact_email_id').val().length > 0 && $('#contact_message').val().length > 0) {
            $.ajax({
              url: $('#hf_base_url').val() + '/ajax/contact-with-vendor',
              type: 'POST',
              cache: false,
              datatype: 'json',
              data: {
                vendor_mail: Base64.encode($('#vendor_email').val()),
                name: Base64.encode($('#contact_name').val()),
                customer_email: Base64.encode($('#contact_email_id').val()),
                message: Base64.encode($('#contact_message').val())
              },
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },

              beforeSend:function() {
                $('#sendVendorContactMessage').attr('disabled', 'disabled');
                $('#sendVendorContactMessage').html('Đang gửi...');
              },

              success: function success(data) {
                $('#sendVendorContactMessage').attr('disabled', false);
                $('#sendVendorContactMessage').html('Gửi');

                if (data && data.status == 'success') {
                  $('#form-feedback')[0].reset();

                  swal({
                    type: 'success',
                    title: 'Thành công!',
                    text: 'Tin nhắn của bạn đã được gửi đến nhà cung cấp!'
                  });

                }
                // alert(JSON.stringify(data));
              },
              error: function error() {
                swal({
                  type: 'error',
                  title: 'Ồ...!',
                  text: 'Đã có lỗi xảy ra!'
                });

              }
            });
          }
        });
      }

      function IsEmail(email) {
        var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        if(!regex.test(email)) {
           return false;
        }else{
           return true;
        }
      }

    </script>

  </body>
</html>