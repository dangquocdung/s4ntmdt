<?php $__env->startSection('title', trans('frontend.vendor_details_title_label') .' < '. get_site_title()); ?>

<?php $__env->startSection('content'); ?>
<style>
  #location_map {
  height: 400px;
  width: 100%;
  }
 
  /* arrow buttons */
  .btn-arrow {
    position: relative;
  }
  .btn-arrow:after, .btn-arrow:before {
    position: absolute;
    line-height: 0;
    content: '';
  }
  .btn-arrow:before {
    z-index: 10;
  }
  .btn-arrow:after {
    z-index: 9;
  }

  .btn-arrow-bottom:before,
  .btn-arrow-up:before {
    border-right: 6px solid transparent;
    border-left: 6px solid transparent;
    left: 50%;
    margin-left: -6px;
  }
  .btn-arrow-bottom:after,
  .btn-arrow-up:after {
    border-right: 8px solid transparent;
    border-left: 8px solid transparent;
    left: 50%;
    margin-left: -8px;
  }
  .btn-default.btn-arrow-bottom:before {
    border-top: 6px solid #333;
    bottom: -6px;
  }
  .btn-default.btn-arrow-bottom:after {
    border-top: 8px solid #333;
    bottom: -8px;
  }
  .btn-default.btn-arrow-bottom.focus:before, .btn-default.btn-arrow-bottom:focus:before {
    border-top-color: #333;
  }
  .btn-default.btn-arrow-bottom.focus:after, .btn-default.btn-arrow-bottom:focus:after {
    border-top-color: #333;
  }
  .btn-default.btn-arrow-bottom:hover:before {
    border-top-color: #333;
  }
  .btn-default.btn-arrow-bottom:hover:after {
    border-top-color: #333;
  }
</style>

<script>
  <?php if($vendor_package_details->show_map_on_store_page == true): ?>
    function initMap() {
      var position = { lat: <?php echo $vendor_settings->general_details->latitude; ?>, lng: <?php echo $vendor_settings->general_details->longitude; ?> };
      var map = new google.maps.Map(document.getElementById('location_map'), {
        zoom: 7,
        center: position
      });

      var marker = new google.maps.Marker({
        position: position,
        map: map
      });
    }
  <?php endif; ?>
</script>
<?php if($vendor_package_details->show_map_on_store_page == true): ?>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=<?php echo e($vendor_settings->general_details->google_map_app_key); ?>&callback=initMap"></script>
<?php endif; ?>

<div class="container">
  <div id="store_details">
    <div class="row">
      <div class="col-12">
        <div class="store-banner">
          <?php if( !empty($vendor_settings) && !empty($vendor_settings->general_details->cover_img) ): ?>  
          <img class="img-fluid" src="<?php echo e(get_image_url( $vendor_settings->general_details->cover_img )); ?>">
          <?php else: ?>
          <img class="img-fluid" src="<?php echo e(default_vendor_cover_img_src()); ?>">
          <?php endif; ?>
          
          <div class="profile-overlay">
            <div class="profile-details-content">
                <div class="profile-image">
                  <?php if(!empty($vendor_info) && !empty($vendor_info->user_photo_url)): ?>
                  <img src="<?php echo e(get_image_url( $vendor_info->user_photo_url )); ?>">
                  <?php else: ?>
                  <img src="<?php echo e(default_placeholder_img_src()); ?>">
                  <?php endif; ?>
                </div>
                <div class="profile-details">
                  <div class="vendor-name"><h3><?php echo $vendor_settings->profile_details->store_name; ?></h3></div>
                  <table>
                      <tr class="vendor-address"><td><i class="fa fa-map-marker" aria-hidden="true"></i></td><td><?php echo $vendor_settings->profile_details->address_line_1; ?></td></tr>
                      <tr class="vendor-phone"><td><i class="fa fa-mobile-phone" aria-hidden="true"></i></td><td><?php echo $vendor_settings->profile_details->phone; ?></td></tr>
                      <tr class="vendor-email"><td><i class="fa fa-envelope-open" aria-hidden="true"></i></td><td><?php echo $vendor_info->email; ?></td></tr>
                  </table>
                  <div class="vendor-created"><strong><i class="fa fa-calendar" aria-hidden="true"></i> <?php echo trans('frontend.member_since_label'); ?>:</strong> &nbsp;<?php echo Carbon\Carbon::parse( $vendor_info->created_at )->format('F d, Y'); ?></div>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
     
    <div class="row">
      <div class="col-12">
        <div class="small-profile-details-content">
          <div class="profile-details-content">
            <div class="profile-image">
              <?php if(!empty($vendor_info) && !empty($vendor_info->user_photo_url)): ?>
              <img src="<?php echo e(get_image_url( $vendor_info->user_photo_url )); ?>">
              <?php else: ?>
              <img src="<?php echo e(default_placeholder_img_src()); ?>">
              <?php endif; ?>
            </div>
            <div class="profile-details">
              <div class="vendor-name"><h3><?php echo $vendor_settings->profile_details->store_name; ?></h3></div>
              <table>
                  <tr class="vendor-address"><td><i class="fa fa-map-marker" aria-hidden="true"></i></td><td><?php echo $vendor_settings->profile_details->address_line_1; ?></td></tr>
                  <tr class="vendor-phone"><td><i class="fa fa-mobile-phone" aria-hidden="true"></i></td><td><?php echo $vendor_settings->profile_details->phone; ?></td></tr>
                  <tr class="vendor-email"><td><i class="fa fa-envelope-open" aria-hidden="true"></i></td><td><?php echo $vendor_info->email; ?></td></tr>
              </table>
              <div class="vendor-created"><strong><i class="fa fa-calendar" aria-hidden="true"></i> <?php echo trans('frontend.member_since_label'); ?>:</strong> &nbsp;<?php echo Carbon\Carbon::parse( $vendor_info->created_at )->format('F d, Y'); ?></div>
            </div>
          </div>
        </div>  
      </div>    
    </div>      
    
    <?php if($vendor_package_details->show_social_media_follow_btn_on_store_page == true): ?>  
    <div class="row"> 
      <div class="col-xs-12 col-md-12 col-lg-6">
        <div class="vendor-social-media">
          <ul class="social-media">
            <li><a class="facebook" href="//<?php echo e($vendor_settings->social_media->fb_follow_us_url); ?>" data-toggle="tooltip" data-placement="top" title="" data-original-title="Follow on Facebook"><i class="fa fa-facebook"></i></a></li>
            <li><a class="twitter" href="//<?php echo e($vendor_settings->social_media->twitter_follow_us_url); ?>" data-toggle="tooltip" data-placement="top" title="" data-original-title="Follow on Twitter"><i class="fa fa-twitter"></i></a></li>
            <li><a class="linkedin" href="//<?php echo e($vendor_settings->social_media->linkedin_follow_us_url); ?>" data-toggle="tooltip" data-placement="top" title="" data-original-title="Follow on Linkedin"><i class="fa fa-linkedin"></i></a></li>
            <li><a class="dribbble" href="//<?php echo e($vendor_settings->social_media->dribbble_follow_us_url); ?>" data-toggle="tooltip" data-placement="top" title="" data-original-title="Follow on Dribbble"><i class="fa fa-dribbble"></i></a></li>
            <li><a class="google-plus" href="//<?php echo e($vendor_settings->social_media->google_plus_follow_us_url); ?>" data-toggle="tooltip" data-placement="top" title="" data-original-title="Follow on Google Plus"><i class="fa fa-google-plus"></i></a></li>
            <li><a class="instagram" href="//<?php echo e($vendor_settings->social_media->instagram_follow_us_url); ?>" data-toggle="tooltip" data-placement="top" title="" data-original-title="Follow on Instagram"><i class="fa fa-instagram"></i></a></li>
            <li><a class="youtube-play" href="//<?php echo e($vendor_settings->social_media->youtube_follow_us_url); ?>" data-toggle="tooltip" data-placement="top" title="" data-original-title="Follow on Youtube"><i class="fa fa-youtube-play"></i></a></li>
          </ul>
        </div>
      </div>
      <div class="col-xs-12 col-md-12 col-lg-6">
        <div class="vendor-review"><div class="review-stars"><div class="star-rating"><span style="width:<?php echo e($vendor_reviews_rating_details['percentage']); ?>%"></span></div></div>
        </div>
      </div>  
    </div> 
    <hr><br>
    <?php endif; ?>
    
    <div class="row">
      <div class="col-xs-12 col-md-12 col-lg-3">
        <div class="vendor-details-left-panel">
          <?php if(Request::is('store/details/products/*') || Request::is('store/details/cat/products/*')): ?>  

          <?php if(Request::is('store/details/products/*')): ?>
          <div class="product-categories-list">
              <?php echo $__env->make('includes.frontend.vendor-categories', array('user_name' => $vendor_info->name), array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
              <?php echo $__env->yieldContent('vendor-categories-content'); ?>  
          </div>
          <?php elseif(Request::is('store/details/cat/products/*')): ?>
          <div class="product-categories-list">
              <?php echo $__env->make('includes.frontend.vendor-categories-page', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
              <?php echo $__env->yieldContent('vendor-categories-page-content'); ?>
          </div>		
          <?php endif; ?>

            <div class="filter-panel">
              <div class="filter-option-title"><?php echo e(trans('frontend.filter_options_label')); ?></div>
              <form action="<?php echo e($vendor_products['action_url']); ?>" method="get">
                <div class="price-filter">
                  <h2><span><?php echo trans('frontend.price_range_label'); ?></span></h2>
                  <div class="price-slider-option">
                    <input type="text" class="span2" value="" data-slider-min="<?php echo e(get_appearance_settings()['general']['filter_price_min']); ?>" data-slider-max="<?php echo e(get_appearance_settings()['general']['filter_price_max']); ?>" data-slider-step="5" data-slider-value="[<?php echo e($vendor_products['min_price']); ?>,<?php echo e($vendor_products['max_price']); ?>]" id="price_range" ><br />
                    <b><?php echo price_html(get_appearance_settings()['general']['filter_price_min'], get_frontend_selected_currency()); ?></b> <b class="pull-right"><?php echo price_html(get_appearance_settings()['general']['filter_price_max'], get_frontend_selected_currency()); ?></b>

                    <input name="price_min" id="price_min" value="<?php echo e($vendor_products['min_price']); ?>" type="hidden">
                    <input name="price_max" id="price_max" value="<?php echo e($vendor_products['max_price']); ?>" type="hidden">
                  </div>
                </div>  
																
                <?php if(count($colors_list_data) > 0): ?>
                <div class="colors-filter">
                  <h2><span><?php echo trans('frontend.choose_color_label'); ?></span></h2>
                  <div class="colors-filter-option">
                    <?php $__currentLoopData = $colors_list_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $terms): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="colors-filter-elements">
                      <div class="chk-filter">
                        <?php if(count($vendor_products['selected_colors']) > 0 && in_array($terms['slug'], $vendor_products['selected_colors'])): ?>  
                        <input type="checkbox" checked class="shopist-iCheck chk-colors-filter" value="<?php echo e($terms['slug']); ?>">
                        <?php else: ?>
                        <input type="checkbox" class="shopist-iCheck chk-colors-filter" value="<?php echo e($terms['slug']); ?>">
                        <?php endif; ?>
                      </div>
                      <div class="filter-terms">
                        <div class="filter-terms-appearance"><span style="background-color:#<?php echo e($terms['color_code']); ?>;width:21px;height:20px;display:block;"></span></div>
                        <div class="filter-terms-name">&nbsp; <?php echo $terms['name']; ?></div>
                      </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </div>
                  <?php if($vendor_products['selected_colors_hf']): ?>
                  <input name="selected_colors" id="selected_colors" value="<?php echo e($vendor_products['selected_colors_hf']); ?>" type="hidden">
                  <?php endif; ?>
                </div>
                <?php endif; ?>
																
                <?php if(count($sizes_list_data) > 0): ?>
                <div class="size-filter">
                  <h2><span><?php echo trans('frontend.choose_size_label'); ?></span></h2>
                  <div class="size-filter-option">
                    <?php $__currentLoopData = $sizes_list_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $terms): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="size-filter-elements">
                      <div class="chk-filter">
                        <?php if(count($vendor_products['selected_sizes']) > 0 && in_array($terms['slug'], $vendor_products['selected_sizes'])): ?>  
                        <input type="checkbox" checked class="shopist-iCheck chk-size-filter" value="<?php echo e($terms['slug']); ?>">
                        <?php else: ?>
                        <input type="checkbox" class="shopist-iCheck chk-size-filter" value="<?php echo e($terms['slug']); ?>">
                        <?php endif; ?>
                      </div>
                      <div class="filter-terms">
                        <div class="filter-terms-name"><?php echo $terms['name']; ?></div>
                      </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </div> 
                  <?php if($vendor_products['selected_sizes_hf']): ?>
                  <input name="selected_sizes" id="selected_sizes" value="<?php echo e($vendor_products['selected_sizes_hf']); ?>" type="hidden">
                  <?php endif; ?>
                </div>
                <?php endif; ?>
																
                <div class="btn-filter clearfix">
                  <button class="btn btn-sm" type="submit"><i class="fa fa-filter" aria-hidden="true"></i> <?php echo trans('frontend.filter_label'); ?></button>
                  <a class="btn btn-sm" href="<?php echo e(route('store-products-page-content', $vendor_info->name)); ?>"><i class="fa fa-close" aria-hidden="true"></i> <?php echo trans('frontend.clear_filter_label'); ?></a>  
                </div>
              </form>
            </div>
          <?php else: ?>
            <?php if($vendor_package_details->show_map_on_store_page == true): ?>
            <div class="vendor-location">
              <div class="vendor-location-content">
                <h2><span><?php echo trans('frontend.store_location_label'); ?></span></h2>
                <div id="location_map"></div>
              </div>    
            </div>  
            <br><br>
            <?php endif; ?>
            
            <?php if($vendor_package_details->show_contact_form_on_store_page == true): ?>
            <div class="contact-vendor">
              <div class="contact-vendor-content clearfix">
                <h2><span><?php echo trans('frontend.contact_vendor_label'); ?></span></h2>
                <div class="form-group">
                  <input class="form-control" name="contact_name" id="contact_name" placeholder="<?php echo e(trans('frontend.enter_name_label')); ?>" type="text">
                </div>
                <div class="form-group">
                  <input class="form-control" name="contact_email_id" id="contact_email_id" placeholder="<?php echo e(trans('frontend.enter_email_label')); ?>" type="text">
                </div>
                <div class="form-group">
                  <textarea class="form-control" name="contact_message" id="contact_message" placeholder="<?php echo e(trans('frontend.enter_your_message_label')); ?>"></textarea>
                </div>  
                <button class="pull-right btn btn-default btn-style" type="button" id="sendVendorContactMessage" name="sendVendorContactMessage"><?php echo trans('frontend.send_label'); ?> <i class="fa fa-arrow-circle-right"></i></button>  
              </div>
            </div> 
            <?php endif; ?>
          <?php endif; ?>
        </div>
      </div>
      <div class="col-xs-12 col-md-12 col-lg-9">
        <div class="row">
            <div class="col-xs-12 col-md-12 col-lg-7">
              <div class="vendor-page-menu">
                <ul>
                  <li>
                    <?php if(Request::is('store/details/home/*')): ?>  
                      <a class="btn btn-arrow btn-arrow-bottom btn-default vendor-menu-hover" href="<?php echo e(route('store-details-page-content', $vendor_info->name)); ?>"><?php echo trans('frontend.shopist_home_title'); ?></a>
                    <?php else: ?>
                      <a class="btn btn-default btn-style" href="<?php echo e(route('store-details-page-content', $vendor_info->name)); ?>"><?php echo trans('frontend.shopist_home_title'); ?></a>
                    <?php endif; ?>
                  </li>
                  <li>
                    <?php if(Request::is('store/details/products/*')): ?>  
                      <a class="btn btn-arrow btn-arrow-bottom btn-default vendor-menu-hover" href="<?php echo e(route('store-products-page-content', $vendor_info->name)); ?>"><?php echo trans('frontend.all_products_label'); ?></a>
                    <?php else: ?>
                      <a class="btn btn-default btn-style" href="<?php echo e(route('store-products-page-content', $vendor_info->name)); ?>"><?php echo trans('frontend.all_products_label'); ?></a>
                    <?php endif; ?>  
                  </li>  
                  <li>
                    <?php if(Request::is('store/details/reviews/*')): ?>  
                      <a class="btn btn-arrow btn-arrow-bottom btn-default vendor-menu-hover" href="<?php echo e(route('store-reviews-page-content', $vendor_info->name)); ?>"><?php echo trans('frontend.reviews_label'); ?></a>
                    <?php else: ?>
                      <a class="btn btn-default btn-style" href="<?php echo e(route('store-reviews-page-content', $vendor_info->name)); ?>"><?php echo trans('frontend.reviews_label'); ?></a>
                    <?php endif; ?> 
                  </li>
                </ul>
              </div>
            </div> 
            
            <?php if($vendor_package_details->show_social_media_share_btn_on_store_page == true): ?>  
            <div class="col-xs-12 col-md-12 col-lg-5">
              <div class="vendor-share-list">
                <ul>
                  <li><?php echo trans('frontend.share_label'); ?></li>
                  <li><a href="" data-name="fb"><i class="fa fa-facebook"></i></a></li>
                  <li><a href="" data-name="gplus"><i class="fa fa-google-plus"></i></a></li>
                  <li><a href="" data-name="tweet"><i class="fa fa-twitter"></i></a></li>
                  <li><a href="" data-name="pi"><i class="fa fa-pinterest"></i></a></li>
                </ul>
              </div> 
            </div> 
            <?php endif; ?> 
        </div>
        <hr>     
        <div class="row">
          <div class="col-12">
            <div class="vendor-menu-content">
              <?php if(Request::is('store/details/home/*')): ?>
                <?php echo $__env->make('pages.frontend.vendors.vendors-home', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <?php echo $__env->yieldContent('vendors-home-page-content'); ?>
              <?php endif; ?>

              <?php if(Request::is('store/details/products/*')): ?>
                <?php echo $__env->make('pages.frontend.vendors.vendors-products', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <?php echo $__env->yieldContent('vendors-products-page-content'); ?>
              <?php endif; ?>
              
              <?php if(Request::is('store/details/cat/products/*')): ?>
                <?php echo $__env->make('pages.frontend.vendors.vendors-category-products', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <?php echo $__env->yieldContent('vendors-categoty-products-page-content'); ?>
              <?php endif; ?>

              <?php if(Request::is('store/details/reviews/*')): ?>
                <?php echo $__env->make('pages.frontend.vendors.vendors-reviews', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <?php echo $__env->yieldContent('vendors-reviews-page-content'); ?>  
              <?php endif; ?>
            </div>  
          </div>      
        </div>
      </div>
    </div>
    
    <input type="hidden" name="product_title" id="product_title" value="<?php echo e(trans('frontend.vendor_details_title_label')); ?>">
    <?php if( !empty($vendor_settings) && !empty($vendor_settings->general_details->cover_img) ): ?>  
    <input type="hidden" name="product_img" id="product_img" value="<?php echo e(get_image_url( $vendor_settings->general_details->cover_img )); ?>">
    <?php else: ?>
    <input type="hidden" name="product_img" id="product_img" value="<?php echo e(default_vendor_cover_img_src()); ?>">
    <?php endif; ?>
  </div>
</div>    
<input type="hidden" name="vendor_email" id="vendor_email" value="<?php echo e($vendor_info->email); ?>">

<script type="text/javascript">
  $(document).ready(function(){
    $('#sendVendorContactMessage').on('click', function(){
      if($('#contact_name').val() == '' || $('#contact_name').val() == null){
        alert('please insert name!');
        return false;
      }
      
      if($('#contact_email_id').val() == '' || $('#contact_email_id').val() == null){
        alert('please insert valid email id!');
        return false;
      }
      
      if($('#contact_message').val() == '' || $('#contact_message').val() == null){
        alert('please insert message!');
        return false;
      }
      
      if($('#contact_name').val().length> 0 && $('#contact_email_id').val().length> 0 && $('#contact_message').val().length>0){
        $.ajax({
              url: $('#hf_base_url').val() + '/ajax/contact-with-vendor',
              type: 'POST',
              cache: false,
              datatype: 'json',
              data: {vendor_mail:Base64.encode($('#vendor_email').val()), name: Base64.encode($('#contact_name').val()), customer_email: Base64.encode($('#contact_email_id').val()), message: Base64.encode($('#contact_message').val())},
              headers: { 'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content') },
              success: function(data){
                if(data && data.status == 'success'){
                  alert("your message successfully sent to the vendor");
                }
              },
              error:function(){alert('Something wrong!');}
        });
      }
    });
    
    if($('#store_details #price_range').length>0){
      $('#store_details #price_range').slider();
    }
    
    if($('#store_details .price-slider-option #price_range').length>0){
      $('#store_details .price-slider-option #price_range') .slider()
        .on('slideStop', function(ev){
          $('#price_min').val(ev.value[0]);
          $('#price_max').val(ev.value[1]);
          $('.price-slider-option .tooltip-inner').html(ev.value[0] + ':' + ev.value[1]);
        });
    }
  });
</script>
<?php $__env->stopSection(); ?> 
<?php echo $__env->make('layouts.frontend.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>