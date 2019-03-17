<div id="wishlists_details">
  <h5><label><?php echo e(trans('frontend.frontend_my_saved_items')); ?></label></h5><hr>
  
  <?php if(!empty($frontend_account_details) && $frontend_account_details->wishlists_details): ?>
  <div class="table-responsive"> 
    <table class="table table-bordered">
      <thead>
        <tr class="cart_menu">
          <td class="image"><?php echo e(trans('frontend.image')); ?></td>
          <td class="description"><?php echo e(trans('frontend.description')); ?></td>
          <td class="description"><?php echo e(trans('frontend.availability')); ?></td>
          <td class="price"><?php echo e(trans('frontend.price')); ?></td>
          <td class="action"><?php echo e(trans('frontend.action')); ?></td>
        </tr>
      </thead>
      <?php $__currentLoopData = $frontend_account_details->wishlists_details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $items): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
          <td>
            <?php if(get_product_image($items) && get_product_image($items) != '/images/no-image.png'): ?>
            <a href="<?php echo e(route('details-page', get_product_slug($items))); ?>" target="_blank"><img src="<?php echo e(get_image_url(get_product_image($items))); ?>" alt=""></a>
            <?php else: ?>
              <a href="<?php echo e(route('details-page', get_product_slug($items))); ?>" target="_blank"><img src="<?php echo e(default_placeholder_img_src()); ?>" alt=""></a>
            <?php endif; ?>
          </td>
          <td>
            <p><a href="<?php echo e(route('details-page', get_product_slug($items))); ?>" target="_blank"><?php echo get_product_title($items); ?></a></p>
          </td>
          <td>
            <p> <?php echo get_product_availability($items); ?> </p>
          </td>
          <td>
            <p> <?php echo price_html(get_product_price($items), get_frontend_selected_currency()); ?> </p>
          </td>
          <td>
            <a class="delete_item_from_wishlist" href="" data-id="<?php echo e($items); ?>"><i class="fa fa-close"></i></a>
          </td>
        </tr>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </table>  
  </div>
  <?php else: ?>
    <p><?php echo e(trans('frontend.no_saved_items_yet_label')); ?></p>
  <?php endif; ?>
</div>