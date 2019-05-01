<?php $__env->startSection('title', trans('admin.add_new_font') .' < '. get_site_title()); ?>

<?php $__env->startSection('content'); ?>

<?php echo $__env->make('pages-message.form-submit', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('pages-message.notify-msg-success', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('pages-message.notify-msg-error', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
  <input type="hidden" name="_token" id="_token" value="<?php echo e(csrf_token()); ?>">
  <input type="hidden" name="post_type" id="post_type" value="save">
  
  <div class="box box-info">
    <div class="box-header">
      <h3 class="box-title"><?php echo e(trans('admin.add_new_font')); ?> &nbsp;&nbsp;<a class="btn btn-default btn-sm" href="<?php echo e(route('admin.fonts_list_content')); ?>"><?php echo e(trans('admin.font_lists')); ?></a></h3>
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
              <label class="col-sm-4 control-label pull-left" for="inputFontName"><?php echo e(trans('admin.name')); ?></label>
              <div class="col-sm-8">
                <input type="text" placeholder="<?php echo e(trans('admin.name')); ?>" id="inputFontName" name="inputFontName" class="form-control">
              </div>
            </div>  
          </div>
            
          <div class="form-group">
            <div class="row">  
              <label class="col-sm-4 control-label pull-left" for="uploadFont"><?php echo e(trans('admin.upload_font_label')); ?></label>
              <div class="col-sm-8">
                  <input type="file" name="font_upload" id="font_upload"><br>
                  <span class="font-msg-style">
                  *<?php echo trans('admin.font_format_msg'); ?> <br>
                  *<?php echo trans('admin.font_converter_msg'); ?>

                  </span>
              </div>
            </div>  
          </div>  
          
          <div class="form-group">
            <div class="row">  
              <label class="col-sm-4 control-label pull-left" for="inputFontStatus"><?php echo e(trans('admin.status')); ?></label>
              <div class="col-sm-8">
                <select name="inputFontStatus" id="inputFontStatus" class="form-control select2" style="width: 100%;">
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