<?php if(isset($cat_sub['children']) && count($cat_sub['children']) > 0): ?>
  <?php $__currentLoopData = $cat_sub['children']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat_sub): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <li class="product-sub-cat"><a href="<?php echo e(route('categories-page', $cat_sub['slug'])); ?>"><?php echo $cat_sub['name']; ?></a></li>
    <?php if(isset($cat_sub['children']) && count($cat_sub['children']) > 0): ?>
      <?php echo $__env->make('pages.common.category-frontend-loop-home', $cat_sub, array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php endif; ?>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>