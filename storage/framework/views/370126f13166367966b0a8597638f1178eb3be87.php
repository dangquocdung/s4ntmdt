<?php $__env->startSection('vendors-categoty-products-page-content'); ?>
<?php if(isset($vendor_products['breadcrumb_html'])){?>
  <div class="categories-products-list">
    <?php echo $__env->make('pages.frontend.frontend-pages.vendor-categories-products', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php echo $__env->yieldContent('vendor-categories-products-content'); ?>
  </div>
<?php }?>
<?php $__env->stopSection(); ?> 