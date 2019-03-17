<?php $__env->startSection('title', trans('admin.update_clipart_category') .' < '. get_site_title()); ?>

<?php $__env->startSection('content'); ?>
<?php echo $__env->make('pages-message.notify-msg-success', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('pages-message.form-submit', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
  <input type="hidden" name="_token" id="_token" value="<?php echo e(csrf_token()); ?>">
  
  <div class="box box-info">
    <div class="box-header">
      <h3 class="box-title"><?php echo e(trans('admin.update_art_category')); ?> &nbsp;&nbsp;&nbsp;&nbsp;<a class="btn btn-default btn-sm" href="<?php echo e(route('admin.art_categories_list_content')); ?>"><?php echo e(trans('admin.art_categories_lists')); ?></a>&nbsp;&nbsp;<a class="btn btn-default btn-sm" href="<?php echo e(route('admin.art_new_category_content')); ?>"><?php echo e(trans('admin.add_more_category')); ?></a></h3>
      <div class="box-tools pull-right">
        <button class="btn btn-primary pull-right btn-sm" type="submit"><?php echo e(trans('admin.update')); ?></button>
      </div>
    </div>
  </div>
  
 <div class="box box-solid">
    <div class="box-body">
      <div class="row">
        <div class="col-md-12">
          <div class="form-group">
            <div class="row">  
              <label class="col-sm-4 control-label pull-left" for="inputCategoryName"><?php echo e(trans('admin.category_name')); ?></label>
              <div class="col-sm-8">
                <input type="text" placeholder="<?php echo e(trans('admin.category_name')); ?>" id="inputCategoryName" name="inputCategoryName" class="form-control" value="<?php echo e($art_cat_update_data_by_id['name']); ?>">
              </div>
            </div>  
          </div>
          <div class="form-group">
            <div class="row">  
              <label class="col-sm-4 control-label pull-left" for="inputCategoryStatus"><?php echo e(trans('admin.category_status')); ?></label>
              <div class="col-sm-8">
                <select name="inputCategoryStatus" id="inputCategoryStatus" class="form-control select2" style="width: 100%;">
                  <?php if($art_cat_update_data_by_id['status'] == 1): ?>
                  <option selected="selected" value="1"><?php echo e(trans('admin.enable')); ?></option>
                  <?php else: ?>
                  <option value="1"><?php echo e(trans('admin.enable')); ?></option>
                  <?php endif; ?>

                  <?php if($art_cat_update_data_by_id['status'] == 0): ?>
                  <option selected="selected" value="0"><?php echo e(trans('admin.disable')); ?></option>
                  <?php else: ?>
                  <option value="0"><?php echo e(trans('admin.disable')); ?></option>
                  <?php endif; ?>
                </select>
              </div>
            </div>  
          </div>
        </div>
      </div>  
    </div>
  </div>
  
</form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>