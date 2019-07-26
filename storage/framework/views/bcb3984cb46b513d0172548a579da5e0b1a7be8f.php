<?php $__env->startSection('vendor-categories-page-content'); ?>
<div class="product-categories-accordian">
  <h2><span><?php echo e(trans('frontend.category_label')); ?></span></h2>
  <?php if(count($productCategoriesTree) > 0): ?>
  <div class="panel-group category-accordian" id="accordian">
    <?php $__currentLoopData = $productCategoriesTree; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<?php if(in_array($data['id'], $vendor_selected_cats_id)): ?>
								<?php echo $__env->make('pages.common.vendor-category-frontend-loop', $data, array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
						<?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </div>
  <?php else: ?>
  <h5><?php echo e(trans('frontend.no_categories_yet')); ?></h5>
  <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>