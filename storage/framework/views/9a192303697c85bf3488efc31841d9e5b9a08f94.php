<?php $__env->startSection('vendor-categories-content'); ?>

<div class="product-categories-accordian">
  <h2><span><?php echo trans('frontend.category_label'); ?></span></h2>
  
  <?php if(count($productCategoriesTree) > 0): ?>
  <div class="category">
    <ul class="products-categories list-unstyled">
      <?php $__currentLoopData = $productCategoriesTree; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
         <?php if(in_array($data['id'], $vendor_selected_cats_id)): ?>
         
          <li class="product-parent-categories">
            <?php if(count($data['children'])>0): ?>
            <?php $img = $data['img_url'];?>
            <div class="dropdown">
              <a class="btn btn-default d-none d-md-inline" id="dropdownMenu2" href="<?php echo e(route('store-products-cat-page-content', array($data['slug'], $user_name))); ?>"> <?php echo $data['name']; ?> <span class="caret pull-right"></span></a>
              <button class="btn btn-default d-md-none d-xs-inline" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $data['name']; ?><span class="caret pull-right"></span></button>

              <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                <div class="row">
                  <div class="cat-list-area col-sm-9">
                    <div class="row">
                      <?php $__currentLoopData = $data['children']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php echo $__env->make('pages.common.vendor-children-category', array('data' => $data, 'user_name' => $user_name), array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>  
                  </div> 
                  <div class="product-cat-img-area col-sm-3">
                    <?php if(!empty($img)): ?>
                    <img class="img-responsive" src="<?php echo e(get_image_url($img)); ?>" alt="cat-img">
                    <?php else: ?>
                    <img class="img-responsive" src="<?php echo e(default_placeholder_img_src()); ?>" alt="cat-img">
                    <?php endif; ?>
                  </div>
                </div>  
              </div>
            </div>
            <?php else: ?>
            <a href="<?php echo e(route('store-products-cat-page-content', array($data['slug'], $user_name))); ?>"> <?php echo $data['name']; ?> </a>
            <?php endif; ?>
          </li>
        <?php endif; ?>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>  
  </div>    
  <?php else: ?>
  <h5><?php echo e(trans('frontend.no_categories_yet')); ?></h5>
  <?php endif; ?>
</div>

<?php $__env->stopSection(); ?> 