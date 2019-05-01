<?php $__env->startSection('title', trans('admin.update_user_page_title') .' < '. get_site_title()); ?>

<?php $__env->startSection('content'); ?>
<?php echo $__env->make('pages-message.form-submit', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('pages-message.notify-msg-success', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
  <input type="hidden" name="_token" id="_token" value="<?php echo e(csrf_token()); ?>">
  <input type="hidden" name="hf_post_type" id="hf_post_type" value="update">
 
  <div class="box box-solid">
    <div class="box-header">
      <h3 class="box-title"><?php echo e(trans('admin.update_new_user_title')); ?> &nbsp;&nbsp;&nbsp;&nbsp;<a class="btn btn-default btn-sm" href="<?php echo e(route('admin.users_list')); ?>"><?php echo e(trans('admin.user_list_title')); ?></a></h3>
      <div class="box-tools pull-right">
        <button class="btn btn-primary pull-right btn-sm" type="submit"><?php echo e(trans('admin.update')); ?></button>
      </div>
    </div>
  </div>
  
 <div class="box box-solid">
    <div class="box-body">
      <div class="form-group">
        <div class="row">  
          <div class="col-sm-4">
            <label class="control-label" for="inputUserDisplayName"><?php echo e(trans('admin.user_display_name_title')); ?></label>
          </div>
          <div class="col-sm-8">
            <input type="text" placeholder="<?php echo e(trans('admin.user_display_name_title')); ?>" class="form-control" value="<?php echo e($user_edit_details['user_display_name']); ?>" id="user_display_name" name="user_display_name">
          </div>
        </div>    
      </div>

      <div class="form-group">
        <div class="row">  
          <div class="col-sm-4">
            <label class="control-label" for="inputUserName"><?php echo e(trans('admin.user_name_title')); ?></label>
          </div>
          <div class="col-sm-8">
            <input type="text" placeholder="<?php echo e(trans('admin.user_name_title')); ?>" class="form-control" value="<?php echo e($user_edit_details['user_name']); ?>" id="user_name" name="user_name">
          </div>
        </div>    
      </div>

      <div class="form-group">
        <div class="row">  
          <div class="col-sm-4">
            <label class="control-label" for="inputEmail"><?php echo e(trans('admin.email')); ?></label>
          </div>
          <div class="col-sm-8">
            <input type="text" placeholder="<?php echo e(trans('admin.email')); ?>" class="form-control" value="<?php echo e($user_edit_details['user_email']); ?>" id="user_email" name="user_email">
          </div>
        </div>    
      </div>

      <div class="form-group">
        <div class="row">  
          <div class="col-sm-4">
            <label class="control-label" for="inputPassword"><?php echo e(trans('admin.user_new_password_title')); ?></label>
          </div>
          <div class="col-sm-8">
            <input type="password" placeholder="<?php echo e(trans('admin.password')); ?>" class="form-control" value="" id="user_password" name="user_password">
          </div>
        </div>    
      </div>

      <div class="form-group">
        <div class="row">  
          <div class="col-sm-4">
            <label class="control-label" for="inputSecretKey"><?php echo e(trans('admin.user_new_secret_key_title')); ?></label>
          </div>
          <div class="col-sm-8">
            <input type="text" placeholder="<?php echo e(trans('admin.secret_key')); ?>" class="form-control" value="" id="user_secret_key" name="user_secret_key">
          </div>
        </div>    
      </div>

      <div class="form-group">
        <div class="row">  
          <div class="col-sm-4">
            <label class="control-label" for="inputUserRole"><?php echo e(trans('admin.user_role_title')); ?></label>
          </div>
          <div class="col-sm-8">
            <select id="user_role" name="user_role" class="form-control select2" style="width: 100%;">
              <?php if(count(get_available_user_roles()) > 0): ?>
                <?php $__currentLoopData = get_available_user_roles(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($val['slug'] == $user_edit_details['user_role_slug']): ?>
                  <option selected="selected" value="<?php echo e($val['slug']); ?>"> <?php echo e(ucwords($val['role_name'])); ?> </option>
                <?php else: ?>
                  <option value="<?php echo e($val['slug']); ?>"> <?php echo e(ucwords($val['role_name'])); ?> </option>
                <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              <?php endif; ?>
            </select>
          </div>
        </div>    
      </div>
    </div>
  </div>
  
</form>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>