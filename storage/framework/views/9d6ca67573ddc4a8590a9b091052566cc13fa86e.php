<?php $__env->startSection('vendors-products-page-content'); ?>
<style type="text/css">
  #store_details .dropdown-menu{
    height: 220px !important;
    background-color: #F9F9FA !important;
  }
</style>
<div id="vendor_products_content">
  <div class="products-list-top">
    <div class="row">
      <div class="col-xs-12 col-md-12">
        <div class="product-views pull-left">
          <?php if($vendor_products['selected_view'] == 'grid'): ?>
              <a class="active" href="<?php echo e($vendor_products['action_url_grid_view']); ?>" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('frontend.grid_label')); ?>"><i class="fa fa-th"></i></a> 
          <?php else: ?>  
              <a href="<?php echo e($vendor_products['action_url_grid_view']); ?>" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('frontend.grid_label')); ?>"><i class="fa fa-th"></i></a> 
          <?php endif; ?>

          <?php if($vendor_products['selected_view'] == 'list'): ?>
              <a class="active" href="<?php echo e($vendor_products['action_url_list_view']); ?>" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('frontend.list_label')); ?>"><i class="fa fa-th-list"></i></a>
          <?php else: ?>  
              <a href="<?php echo e($vendor_products['action_url_list_view']); ?>" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('frontend.list_label')); ?>"><i class="fa fa-th-list"></i></a>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
  
  <div class="products-list">
    <br>  
    <?php echo $__env->make('includes.frontend.vendor-products', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php echo $__env->yieldContent('vendor-products-content'); ?>
  </div>
</div>
<?php $__env->stopSection(); ?> 