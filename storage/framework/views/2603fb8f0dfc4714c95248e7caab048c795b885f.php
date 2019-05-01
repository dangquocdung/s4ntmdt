<?php $__env->startSection('title', trans('admin.manage_menu_content') .' < '. get_site_title()); ?>

<?php $__env->startSection('content'); ?>
<div class="box">
  <div class="box-header">
    <h3 class="box-title"><?php echo e(trans('admin.menu_settings')); ?></h3>
    <div class="box-tools pull-right">
      <button class="btn btn-primary pull-right update_menu btn-sm" type="button"><?php echo trans('admin.save'); ?></button>
    </div>
  </div>
</div>
<p><?php echo trans('admin.menu_to_label_message'); ?></p>

<div class="box box-solid">
  <div class="row">
    <div class="col-md-12">
      <div class="box-body"> 
        <ul id="menu_sortable">
        <?php echo $menu_html; ?>  
        </ul>
      </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>