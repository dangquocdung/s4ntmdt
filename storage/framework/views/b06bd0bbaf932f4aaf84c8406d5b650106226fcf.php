<?php $__env->startSection('vendors-home-page-content'); ?>
<style type="text/css">
.slick-dots li.slick-active button::before, .slick-dots li button::before{
  color:#1FC0A0;
}
</style>

<div id="vendor_home_content">
  <h2 class="cat-box-top"><?php echo trans('frontend.shop_by_cat_label'); ?> <span class="responsive-accordian"></span></h2>
  <?php if(count($vendor_home_page_cats) > 0): ?>  
  <div class="vendor-categories">
    <div class="row">
      <div class="col-md-12">
        <div class="vendor-top-collection">
          <?php $__currentLoopData = $vendor_home_page_cats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cats): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <div>
            <div class="vendor-category-content clearfix">
              <div class="vendor-category-name">
                <h2><?php echo $cats['parent_cat']['name']; ?> <span class="responsive-accordian"></span></h2>
                <div class="vendor-categories-list">
                  <?php if(count($cats['child_cat']) > 0): ?>  
                    <ul>
                      <?php $__currentLoopData = $cats['child_cat']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $child_cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <li><a href="<?php echo e(route('store-products-cat-page-content', array($child_cat['slug'], $vendor_info->name))); ?>"><?php echo $child_cat['name']; ?></a></li>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                  <?php endif; ?>
                </div>
              </div>
              <div class="vendor-category-image">
                <?php if(!empty(get_image_url($cats['parent_cat']['category_img_url']))): ?>
                  <img class="img-fluid" src="<?php echo e(get_image_url($cats['parent_cat']['category_img_url'])); ?>">
                <?php else: ?>
                  <img class="img-fluid" src="<?php echo e(default_placeholder_img_src()); ?>">
                <?php endif; ?>
              </div>
            </div>
          </div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>  
      </div>
    </div>
  </div>
  <?php else: ?>
  <p style="text-align:center;padding-top:25px;"><?php echo trans('frontend.product_not_available'); ?></p>
  <?php endif; ?>
  
  <div class="row">
    <div class="col-12">
      <div class="vendor-special-products">
        <div id="latest_items">
          <h2 class="cat-box-top"><?php echo trans('frontend.only_latest_label'); ?> <span class="responsive-accordian"></span></h2>   
          <?php if(count($vendor_advanced_items['latest_items']) > 0): ?>  
          <div class="latest-items special-items">
            <?php $__currentLoopData = $vendor_advanced_items['latest_items']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $latest): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            
            <?php $reviews  = get_comments_rating_details($latest->id, 'product');?>
            <div>
              <div class="hover-product">
                <div class="hover">
                  <?php if(!empty($latest->image_url)): ?>  
                  <img src="<?php echo e(get_image_url($latest->image_url)); ?>" alt="">
                  <?php else: ?>
                  <img src="<?php echo e(default_placeholder_img_src()); ?>" alt="">
                  <?php endif; ?>
                  <div class="overlay">
                    <button class="info quick-view-popup" data-id="<?php echo e($latest->id); ?>"><?php echo trans('frontend.quick_view_label'); ?></button>
                  </div>
                </div> 
                <div class="single-product-bottom-section">
                  <a href="<?php echo e(route('details-page', $latest->slug)); ?>"><h3><?php echo get_product_title( $latest->id ); ?></h3></a>
                  <?php if(get_product_type($latest->id) == 'simple_product'): ?>
                    <p><strong><?php echo price_html( get_product_price_html_by_filter(get_role_based_price_by_product_id($latest->id, $latest->price)), get_frontend_selected_currency()); ?></strong></p>
                  <?php elseif(get_product_type($latest->id) == 'configurable_product'): ?>
                    <p><strong><?php echo get_product_variations_min_to_max_price_html(get_frontend_selected_currency(), $latest->id); ?></strong></p>
                  <?php elseif(get_product_type($latest->id) == 'customizable_product' || get_product_type($latest->id) == 'downloadable_product'): ?>
                    <?php if(count(get_product_variations($latest->id))>0): ?>
                      <p><strong><?php echo get_product_variations_min_to_max_price_html(get_frontend_selected_currency(), $latest->id); ?></strong></p>
                    <?php else: ?>
                      <p><strong><?php echo price_html( get_product_price_html_by_filter(get_role_based_price_by_product_id($latest->id, $latest->price)), get_frontend_selected_currency()); ?></strong></p>
                    <?php endif; ?>
                  <?php endif; ?>
                  <div class="text-center rating-content">
                    <div class="star-rating">
                      <span style="width:<?php echo e($reviews['percentage']); ?>%"></span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </div>
          <?php else: ?>
          <p style="text-align:center;"><?php echo trans('frontend.product_not_available'); ?></p>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
  
  <div class="row">
    <div class="col-12">
      <div class="vendor-special-products">
        <div id="best_sales_items">
          <h2 class="cat-box-top"><?php echo trans('frontend.best_sales_label'); ?> <span class="responsive-accordian"></span></h2>   
          <?php if(count($vendor_advanced_items['best_sales']) > 0): ?>  
          <div class="best-sales-items special-items">
            <?php $__currentLoopData = $vendor_advanced_items['best_sales']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $best_sales): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            
            <?php $reviews  = get_comments_rating_details($best_sales['id'], 'product');?>
            <div>
              <div class="hover-product">
                <div class="hover">
                  <?php if(!empty($best_sales['post_image_url'])): ?>  
                  <img src="<?php echo e(get_image_url($best_sales['post_image_url'])); ?>" alt="">
                  <?php else: ?>
                  <img src="<?php echo e(default_placeholder_img_src()); ?>" alt="">
                  <?php endif; ?>
                  <div class="overlay">
                    <button class="info quick-view-popup" data-id="<?php echo e($best_sales['id']); ?>"><?php echo trans('frontend.quick_view_label'); ?></button>
                  </div>
                </div> 
                <div class="single-product-bottom-section">
                  <a href="<?php echo e(route('details-page', $best_sales['post_slug'])); ?>"><h3><?php echo get_product_title( $best_sales['id'] ); ?></h3></a>
                  <?php if(get_product_type($best_sales['id']) == 'simple_product'): ?>
                    <p><strong><?php echo price_html( get_product_price_html_by_filter(get_role_based_price_by_product_id($best_sales['id'], $best_sales['post_price'])), get_frontend_selected_currency()); ?></strong></p>
                  <?php elseif(get_product_type($best_sales['id']) == 'configurable_product'): ?>
                    <p><strong><?php echo get_product_variations_min_to_max_price_html(get_frontend_selected_currency(), $best_sales['id']); ?></strong></p>
                  <?php elseif(get_product_type($best_sales['id']) == 'customizable_product' || get_product_type($best_sales['id']) == 'downloadable_product'): ?>
                    <?php if(count(get_product_variations($best_sales['id']))>0): ?>
                      <p><strong><?php echo get_product_variations_min_to_max_price_html(get_frontend_selected_currency(), $best_sales['id']); ?></strong></p>
                    <?php else: ?>
                      <p><strong><?php echo price_html( get_product_price_html_by_filter(get_role_based_price_by_product_id($best_sales['id'], $best_sales['post_price'])), get_frontend_selected_currency()); ?></strong></p>
                    <?php endif; ?>
                  <?php endif; ?>
                  <div class="text-center rating-content">
                    <div class="star-rating">
                      <span style="width:<?php echo e($reviews['percentage']); ?>%"></span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
          <?php else: ?>
          <br>
          <p style="text-align:center;"><?php echo trans('frontend.product_not_available'); ?></p>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
  
  <div class="row">
    <div class="col-12">
      <div class="vendor-special-products">
        <div id="featured_items">
          <h2 class="cat-box-top"><?php echo trans('frontend.featured_products_label'); ?> <span class="responsive-accordian"></span></h2>
          <?php if(count($vendor_advanced_items['features_items']) > 0): ?>  
            <div class="featured-items special-items">
              <?php $__currentLoopData = $vendor_advanced_items['features_items']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $features_items): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              
              <?php $reviews  = get_comments_rating_details($features_items->id, 'product');?>
              <div>
                <div class="hover-product">
                  <div class="hover">
                    <?php if(!empty($features_items->image_url)): ?>  
                    <img src="<?php echo e(get_image_url( $features_items->image_url )); ?>" alt="">
                    <?php else: ?>
                    <img src="<?php echo e(default_placeholder_img_src()); ?>" alt="">
                    <?php endif; ?>
                    <div class="overlay">
                      <button class="info quick-view-popup" data-id="<?php echo e($features_items->id); ?>"><?php echo trans('frontend.quick_view_label'); ?></button>
                    </div>
                  </div> 
                  <div class="single-product-bottom-section">
                    <a href="<?php echo e(route('details-page', $features_items->slug)); ?>"><h3><?php echo get_product_title( $features_items->id ); ?></h3></a>
                    <?php if(get_product_type($features_items->id) == 'simple_product'): ?>
                      <p><strong><?php echo price_html( get_product_price_html_by_filter(get_role_based_price_by_product_id($features_items->id, $features_items->price)), get_frontend_selected_currency()); ?></strong></p>
                    <?php elseif(get_product_type($features_items->id) == 'configurable_product'): ?>
                      <p><strong><?php echo get_product_variations_min_to_max_price_html(get_frontend_selected_currency(), $features_items->id); ?></strong></p>
                    <?php elseif(get_product_type($features_items->id) == 'customizable_product' || get_product_type($features_items->id) == 'downloadable_product'): ?>
                      <?php if(count(get_product_variations($features_items->id))>0): ?>
                        <p><strong><?php echo get_product_variations_min_to_max_price_html(get_frontend_selected_currency(), $features_items->id); ?></strong></p>
                      <?php else: ?>
                        <p><strong><?php echo price_html( get_product_price_html_by_filter(get_role_based_price_by_product_id($features_items->id, $features_items->price)), get_frontend_selected_currency()); ?></strong></p>
                      <?php endif; ?>
                    <?php endif; ?>
                    <div class="text-center rating-content">
                      <div class="star-rating">
                        <span style="width:<?php echo e($reviews['percentage']); ?>%"></span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </div>
            <?php else: ?>
            <p style="text-align:center;"><?php echo trans('frontend.product_not_available'); ?></p>
            <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
  
  <div class="row">
    <div class="col-12">
      <div class="vendor-special-products">
        <div id="recommended_items">
          <h2 class="cat-box-top"><?php echo trans('frontend.recommended_items'); ?> <span class="responsive-accordian"></span></h2>
          <?php if(count($vendor_advanced_items['recommended_items']) > 0): ?>  
            <div class="recommended-items special-items">
              <?php $__currentLoopData = $vendor_advanced_items['recommended_items']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $recommended_items): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              
              <?php $reviews  = get_comments_rating_details($recommended_items->id, 'product');?>
              <div>
                <div class="hover-product">
                  <div class="hover">
                    <?php if(!empty($recommended_items->image_url)): ?>  
                    <img src="<?php echo e(get_image_url( $recommended_items->image_url )); ?>" alt="">
                    <?php else: ?>
                    <img src="<?php echo e(default_placeholder_img_src()); ?>" alt="">
                    <?php endif; ?>
                    <div class="overlay">
                      <button class="info quick-view-popup" data-id="<?php echo e($recommended_items->id); ?>"><?php echo trans('frontend.quick_view_label'); ?></button>
                    </div>
                  </div> 
                  <div class="single-product-bottom-section">
                    <a href="<?php echo e(route('details-page', $recommended_items->slug)); ?>"><h3><?php echo get_product_title( $recommended_items->id ); ?></h3></a>
                    <?php if(get_product_type($recommended_items->id) == 'simple_product'): ?>
                      <p><strong><?php echo price_html( get_product_price_html_by_filter(get_role_based_price_by_product_id($recommended_items->id, $recommended_items->price)), get_frontend_selected_currency()); ?></strong></p>
                    <?php elseif(get_product_type($recommended_items->id) == 'configurable_product'): ?>
                      <p><strong><?php echo get_product_variations_min_to_max_price_html(get_frontend_selected_currency(), $recommended_items->id); ?></strong></p>
                    <?php elseif(get_product_type($recommended_items->id) == 'customizable_product' || get_product_type($recommended_items->id) == 'downloadable_product'): ?>
                      <?php if(count(get_product_variations($recommended_items->id))>0): ?>
                        <p><strong><?php echo get_product_variations_min_to_max_price_html(get_frontend_selected_currency(), $recommended_items->id); ?></strong></p>
                      <?php else: ?>
                        <p><strong><?php echo price_html( get_product_price_html_by_filter(get_role_based_price_by_product_id($recommended_items->id, $recommended_items->price)), get_frontend_selected_currency()); ?></strong></p>
                      <?php endif; ?>
                    <?php endif; ?>
                    <div class="text-center rating-content">
                      <div class="star-rating">
                        <span style="width:<?php echo e($reviews['percentage']); ?>%"></span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </div>
            <?php else: ?>
            <p style="text-align:center;"><?php echo trans('frontend.product_not_available'); ?></p>
            <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>