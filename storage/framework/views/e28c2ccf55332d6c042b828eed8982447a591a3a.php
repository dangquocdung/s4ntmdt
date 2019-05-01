<?php $__env->startSection('title', trans('frontend.frontend_user_registration_title') .' - '. get_site_title()); ?>
<?php $__env->startSection('content'); ?>

<?php if($settings_data['general_options']['allow_registration_for_frontend']): ?>
<div id="user_registration" class="container custom-extra-top-style">
  <div class="row justify-content-center">
    <div class="col-xs-12 col-sm-8 col-md-6 text-center">
      <?php echo $__env->make('pages-message.notify-msg-error', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
      <?php echo $__env->make('pages-message.form-submit', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>    

      <form method="post" action="" enctype="multipart/form-data">
        <input type="hidden" name="_token" id="_token" value="<?php echo e(csrf_token()); ?>">
        
        <h2><?php echo trans('frontend.please_sign_up_label'); ?> <small><?php echo trans('frontend.sign_up_free_label'); ?></small></h2>
        <hr class="colorgraph">
        
        <div class="row">
          <div class="col-xs-12 col-sm-6 col-md-6">
            <div class="form-group has-feedback">
              <input type="text" placeholder="<?php echo e(trans('frontend.display_name')); ?>" class="form-control" value="<?php echo e(old('user_reg_display_name')); ?>" id="user_reg_display_name" name="user_reg_display_name">
              <span class="fa fa-user form-control-feedback"></span>
            </div>
          </div>
          <div class="col-xs-12 col-sm-6 col-md-6">
            <div class="form-group has-feedback">
              <input type="text" placeholder="<?php echo e(trans('frontend.user_name')); ?>" class="form-control" value="<?php echo e(old('user_reg_name')); ?>" id="user_reg_name" name="user_reg_name">
              <span class="fa fa-user form-control-feedback"></span>
            </div>
          </div>
        </div>
        
        <div class="form-group has-feedback">
          <input type="email" placeholder="<?php echo e(ucfirst( trans('frontend.email') )); ?>" class="form-control" id="reg_email_id" value="<?php echo e(old('reg_email_id')); ?>" name="reg_email_id">
          <span class="fa fa-envelope form-control-feedback"></span>
        </div>
        
        <div class="row">
          <div class="col-xs-12 col-sm-6 col-md-6">
            <div class="form-group has-feedback">
              <input type="password" placeholder="<?php echo e(ucfirst(trans('frontend.password'))); ?>" class="form-control" id="reg_password" name="reg_password">
              <span class="fa fa-lock form-control-feedback"></span>
            </div>
          </div>
          <div class="col-xs-12 col-sm-6 col-md-6">
            <div class="form-group has-feedback">
              <input type="password" placeholder="<?php echo e(trans('frontend.retype_password')); ?>" class="form-control" id="reg_password_confirmation" name="reg_password_confirmation">
              <span class="fa fa-lock form-control-feedback"></span>
            </div>
          </div>
        </div>
        
        <div class="form-group has-feedback">
          <input type="text" placeholder="<?php echo e(ucfirst(trans('frontend.secret_key'))); ?>" class="form-control" id="reg_secret_key" name="reg_secret_key">
          <span class="fa fa-lock form-control-feedback"></span>
        </div>
        
        <?php if(!empty($is_enable_recaptcha) && $is_enable_recaptcha == true): ?>
        <div class="form-group">
          <div class="captcha-style"><?php echo app('captcha')->display();; ?></div>
        </div>
        <?php endif; ?>
        
        <hr class="colorgraph">
        <div class="row">
          <div class="col-xs-12 col-md-6"><input name="user_reg_submit" id="user_reg_submit" class="btn btn-secondary btn-block btn-md" value="<?php echo e(trans('frontend.registration')); ?>" type="submit"> </div>
          <div class="col-xs-12 col-md-6"><a href="<?php echo e(route('user-login-page')); ?>" class="btn btn-secondary btn-block btn-md user-reg-log-in-text"><?php echo e(trans('frontend.signin_account_label')); ?></a></div>
        </div>
      </form>
    </div>
  </div>
</div>  
<?php else: ?>
<br>
<p><?php echo e(trans('frontend.user_reg_not_available_label')); ?></p>
<?php endif; ?>
<?php $__env->stopSection(); ?>  
<?php echo $__env->make('layouts.frontend.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>