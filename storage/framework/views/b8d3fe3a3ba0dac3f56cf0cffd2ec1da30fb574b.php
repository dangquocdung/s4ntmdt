<?php $__env->startSection('title', trans('admin.settings') .' < '. get_site_title()); ?>

<?php $__env->startSection('content'); ?>
<?php echo $__env->make('pages-message.notify-msg-success', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	
<div id="vendor_settings_content">
  <div class="row">
    <div class="col-md-12">
      <h4><?php echo trans('admin.terms_and_conditions_label'); ?></h4><hr>
      <form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
        <input type="hidden" name="_token" id="_token" value="<?php echo e(csrf_token()); ?>">
        <div class="box box-solid"> 
          <div class="box-body">
            <div><textarea id="terms_and_conditions_content" name="terms_and_conditions_content" class="dynamic-editor" placeholder="<?php echo e(trans('admin.terms_and_conditions_label')); ?>"><?php echo string_decode($vendor_settings_data['term_n_conditions']); ?></textarea></div>
          </div>
          <div class="clearfix">
            <div class="pull-right" style="padding:10px;">
              <button class="btn btn-block btn-primary" type="submit"><?php echo e(trans('admin.save')); ?></button>
            </div>
          </div>      
        </div>
      </form>    
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>