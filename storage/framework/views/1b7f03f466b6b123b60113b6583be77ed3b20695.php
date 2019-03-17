<a href="" class="main show-mini-cart" data-id="2"> <span class="d-none d-md-inline"><?php echo trans('frontend.menu_my_cart'); ?></span> <span class="fa fa-shopping-cart"></span> <span class="cart-count"><span id="total_count_by_ajax"><?php echo Cart::count(); ?></span></span></a>

<div class="mini-cart-dropdown">
  <div class="dropdown-menu slide-from-top">
    <div class="container">
      <a href="#" class="close-cart"><i class="fa fa-close"></i></a>
      <?php if( Cart::count() >0 ): ?>
      <div class="top-title"><?php echo trans('frontend.mini_cart_top_label'); ?></div>
      <ul>
        <?php $__currentLoopData = Cart::items(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $items): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li class="item">
          <div class="img">
            <?php if($items->img_src): ?>  
            <a href="<?php echo e(route('details-page', get_product_slug($items->id))); ?>"><img src="<?php echo e(get_image_url($items->img_src)); ?>" alt="product"></a>
            <?php else: ?>
            <a href="<?php echo e(route('details-page', get_product_slug($items->id))); ?>"><img src="<?php echo e(default_placeholder_img_src()); ?>" alt="no_image"></a>
            <?php endif; ?>
          </div>
          <div class="info">
            <div class="title-col">
              <h2 class="title">
                <a href="<?php echo e(route('details-page', get_product_slug($items->id))); ?>"><?php echo $items->name; ?></a>
              </h2>
              <div class="details">
                <?php $count = 1; ?>
                <?php if(count($items->options) > 0): ?>
                <p>
                  <?php $__currentLoopData = $items->options; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($count == count($items->options)): ?>
                      <?php echo $key .' &#8658; '. $val; ?>

                    <?php else: ?>
                      <?php echo $key .' &#8658; '. $val. ' , '; ?>

                    <?php endif; ?>
                    <?php $count ++ ; ?>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </p>
                <?php endif; ?>
              </div>
            </div>
            <div class="price">
            <?php echo price_html( get_product_price_html_by_filter( $items->price ), get_frontend_selected_currency() ); ?>

            </div>
            <div class="qty">
              <div class="qty-label"><?php echo trans('frontend.qty_label'); ?>:</div>
              <div class="style-2 input-counter">
                <span class="minus-btn"></span>
                <input value="<?php echo e($items->quantity); ?>" size="100" type="text">
                <span class="plus-btn"></span>
              </div>
            </div>
          </div>
          <div class="item-control">
          <div class="delete"><a href="<?php echo e(route('removed-item-from-cart', $index)); ?>" class="icon icon-delete" title="Delete"><i class="fa fa-trash-o"></i></a></div>
          </div>
        </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </ul>
      <div class="cart-bottom">
        <div class="float-right checkout">
          <div class="float-left">
            <div class="cart-total"><?php echo trans('frontend.total'); ?>:  <span> <?php echo price_html( get_product_price_html_by_filter(Cart::getTotal()) ); ?></span></div>
          </div>
          <a href="<?php echo e(route('checkout-page')); ?>" class="btn btn-light icon-btn-left"><span class="fa fa-check-circle-o"></span> <?php echo trans('frontend.check_out'); ?></a>
        </div>
        <div class="pull-left cart">
          <a href="<?php echo e(route('cart-page')); ?>" class="btn btn-light icon-btn-left"><span class="fa fa-shopping-bag"></span> <?php echo trans('frontend.view_cart_label'); ?></a>
        </div>
      </div>
      <?php else: ?>
      <h4 class="empty-cart-js"><?php echo trans('frontend.empty_cart_msg'); ?></h4>
      <?php endif; ?>
    </div>
  </div>
</div>