<?php $__env->startSection('title', trans('admin.add_new_shape') .' < '. get_site_title()); ?>

<?php $__env->startSection('content'); ?>

<?php echo $__env->make('pages-message.form-submit', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('pages-message.notify-msg-success', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
  <input type="hidden" name="_token" id="_token" value="<?php echo e(csrf_token()); ?>">
  <input type="hidden" name="post_type" id="post_type" value="save">
  
  <div class="box box-info">
    <div class="box-header">
      <h3 class="box-title"><?php echo e(trans('admin.add_new_shape')); ?> &nbsp;&nbsp;<a class="btn btn-default btn-sm" href="<?php echo e(route('admin.shape_list_content')); ?>"><?php echo e(trans('admin.shape_lists')); ?></a></h3>
      <div class="box-tools pull-right">
        <button class="btn btn-primary pull-right btn-sm" type="submit"><?php echo e(trans('admin.save')); ?></button>
      </div>
    </div>
  </div>
  
 <div class="box box-solid">
    <div class="box-body">
      <div class="row">
        <div class="col-md-12">
          <div class="form-group">
            <div class="row">  
              <label class="col-sm-4 control-label pull-left" for="inputShapeName"><?php echo e(trans('admin.name')); ?></label>
              <div class="col-sm-8">
                <input type="text" placeholder="<?php echo e(trans('admin.name')); ?>" id="inputShapeName" name="inputShapeName" class="form-control">
              </div>
            </div>  
          </div>
            
          <div class="form-group">
            <div class="row">  
              <label class="col-sm-4 control-label pull-left" for="inputShapeContent"><?php echo e(trans('admin.content_label')); ?></label>
              <div class="col-sm-8">
                <div class="svg-display"></div>
                <textarea name="inputShapeContent" id="inputShapeContent" placeholder="<?php echo e(trans('admin.content_label')); ?>" class="form-control"></textarea>
                <span><?php echo trans('admin.svg_content_label'); ?></span>
              </div>
            </div>  
          </div>  
          
          <div class="form-group">
            <div class="row">  
              <label class="col-sm-4 control-label pull-left" for="inputShapeStatus"><?php echo e(trans('admin.status')); ?></label>
              <div class="col-sm-8">
                <select name="inputShapeStatus" id="inputShapeStatus" class="form-control select2" style="width: 100%;">
                  <option value="1"><?php echo e(trans('admin.enable')); ?></option>
                  <option value="0"><?php echo e(trans('admin.disable')); ?></option>
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