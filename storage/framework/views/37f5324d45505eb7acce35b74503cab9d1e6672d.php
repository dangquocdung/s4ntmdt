<li>
  <a href="<?php echo e(route('store-products-cat-page-content', array($data['slug'], $vendor_info->name))); ?>">
    <i class="fa fa-angle-right"></i> &nbsp; 
    <?php if(in_array($data['id'], $vendor_products['selected_cat'])){?>
    <span class="active"><?php echo $data['name']; ?></span>
    <?php } else {?>
    <span><?php echo $data['name']; ?></span>
    <?php }?>
  </a>
</li>
<?php $__currentLoopData = $data['children']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php echo $__env->make('pages.common.vendor-category-frontend-loop-extra', $data, array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>