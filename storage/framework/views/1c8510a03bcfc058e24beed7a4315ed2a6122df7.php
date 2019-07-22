<a href="<?php echo e(route('cart-page')); ?>">
  <div>
    <span class="cart-icon"><i class="icon-shopping-cart"></i>
      <span class="count-label"><?php echo Cart::count(); ?>   </span>
    </span>
    <span class="text-label"><?php echo trans('frontend.menu_my_cart'); ?></span>
  </div>
</a>

<?php if( Cart::count() >0 ): ?>
<div class="toolbar-dropdown cart-dropdown widget-cart hidden-on-mobile">
    <?php $__currentLoopData = Cart::items(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $items): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <!-- Entry-->
    <div class="entry">
      <div class="entry-thumb">
          <?php if($items->img_src): ?>  
          <a href="<?php echo e(route('details-page', get_product_slug($items->id))); ?>"><img src="<?php echo e(get_image_url($items->img_src)); ?>" alt="product"></a>
          <?php else: ?>
          <a href="<?php echo e(route('details-page', get_product_slug($items->id))); ?>"><img src="<?php echo e(default_placeholder_img_src()); ?>" alt="no_image"></a>
          <?php endif; ?>
          
      </div>
      <div class="entry-content">
        <h4 class="entry-title">
          <a href="<?php echo e(route('details-page', get_product_slug($items->id))); ?>"><?php echo $items->name; ?></a>
          
        </h4>
        <span class="entry-meta">1 x $910.00</span>
      </div>
      <div class="entry-delete">
        <a href="<?php echo e(route('removed-item-from-cart', $index)); ?>" class="icon icon-delete" title="Delete">
          <i class="icon-x"></i>
        </a>

        
      </div>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    

    <div class="text-right">
      <p class="text-gray-dark py-2 mb-0"><span class='text-muted'>Subtotal:</span> &nbsp;$2,548.50</p>
    </div>
    <div class="d-flex">
      <div class="pr-2 w-50"><a class="btn btn-secondary btn-sm btn-block mb-0" href="cart.html">Expand Cart</a></div>
      <div class="pl-2 w-50"><a class="btn btn-primary btn-sm btn-block mb-0" href="checkout.html">Checkout</a></div>
    </div>
  </div>
  <?php endif; ?>