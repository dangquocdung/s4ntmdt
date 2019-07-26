<?php $__env->startSection('title', trans('admin.clipart_list') .' < '. get_site_title()); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
  <div class="col-6">
    <h5><?php echo trans('admin.art_lists'); ?></h5>
  </div>
  <div class="col-6">
    <div class="pull-right">
      <a href="<?php echo e(route('admin.add_new_art_content')); ?>" class="btn btn-primary pull-right btn-sm"><?php echo e(trans('admin.add_new_art')); ?></a>
    </div>  
  </div>
</div>
<br>
<div class="row">
  <div class="col-12">
    <div class="box">
      <div class="box-body">
        <div id="table_search_option">
          <form action="<?php echo e(route('admin.clipart_list_content')); ?>" method="GET"> 
            <div class="row">
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="input-group">
                  <input type="text" name="term_art_cat" class="search-query form-control" placeholder="Enter your cat name to search" value="<?php echo e($search_value); ?>" />
                  <div class="input-group-btn">
                    <button class="btn btn-primary" type="submit">
                      <span class="fa fa-search"></span>
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </form>  
        </div>        
        <table class="table table-bordered admin-data-table admin-data-list">
          <thead class="thead-dark">
            <tr>
              <th><?php echo e(trans('admin.images')); ?></th>
              <th><?php echo e(trans('admin.category_name')); ?></th>
              <th><?php echo e(trans('admin.status')); ?></th>
              <th><?php echo e(trans('admin.action')); ?></th>
            </tr>
          </thead>
          <tbody>
            <?php if(count($art_lists)>0): ?>
              <?php $__currentLoopData = $art_lists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr>              
                <?php if(!empty($row->art_img)): ?>
                <td><img src="<?php echo e(get_image_url($row->art_img)); ?>" alt="<?php echo e(basename ($row->art_img)); ?>"></td>
                <?php else: ?>
                <td><img src="<?php echo e(default_placeholder_img_src()); ?>" alt=""></td>
                <?php endif; ?>

                <td><?php echo $row->cat_name; ?></td>

                <?php if($row->post_status == 1): ?>
                <td><?php echo e(trans('admin.enable')); ?></td>
                <?php else: ?>
                <td><?php echo e(trans('admin.disable')); ?></td>
                <?php endif; ?>

                <td>
                  <div class="btn-group">
                    <button class="btn btn-success btn-flat" type="button"><?php echo e(trans('admin.action')); ?></button>
                    <button data-toggle="dropdown" class="btn btn-success btn-flat dropdown-toggle" type="button">
                      <span class="caret"></span>
                      <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    <ul role="menu" class="dropdown-menu">
                      <li><a href="<?php echo e(route('admin.update_clipart_content', $row->post_slug)); ?>"><i class="fa fa-edit"></i><?php echo e(trans('admin.edit')); ?></a></li>
                      <li><a class="remove-selected-data-from-list" data-track_name="art_list" data-id="<?php echo e($row->id); ?>" href="#"><i class="fa fa-remove"></i><?php echo e(trans('admin.delete')); ?></a></li>
                    </ul>
                  </div>
                </td>
              </tr>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php else: ?>
              <tr><td colspan="4"><i class="fa fa-exclamation-triangle"></i> <?php echo trans('admin.no_data_found_label'); ?></td></tr>  
            <?php endif; ?>
          </tbody>
          <tfoot class="thead-dark">
            <tr>
              <th><?php echo e(trans('admin.images')); ?></th>
              <th><?php echo e(trans('admin.category_name')); ?></th>
              <th><?php echo e(trans('admin.status')); ?></th>
              <th><?php echo e(trans('admin.action')); ?></th>
            </tr>
          </tfoot>
        </table>
          <br>
        <div class="products-pagination"><?php echo $art_lists->appends(Request::capture()->except('page'))->render(); ?></div>
      </div>
    </div>
  </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>