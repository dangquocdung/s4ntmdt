<?php $__env->startSection('title', trans('frontend.frontend_vendor_registration_title') .' - '. get_site_title()); ?>
<?php $__env->startSection('content'); ?>

<div id="vendor_registration" class="container custom-extra-top-style">
  <div class="row justify-content-center">
    <div class="col-xs-12 col-sm-8 col-md-6 text-center">
      <?php echo $__env->make('pages-message.notify-msg-error', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
      <?php echo $__env->make('pages-message.form-submit', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
						<?php echo $__env->make('pages-message.notify-msg-success', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

      <form method="post" action="" enctype="multipart/form-data">
        <input type="hidden" name="_token" id="_token" value="<?php echo e(csrf_token()); ?>">
        
        <h2><?php echo trans('frontend.please_sign_up_label'); ?> <small><?php echo trans('frontend.sign_up_free_label'); ?></small></h2>
        <hr class="colorgraph">
        
        <div class="row">
          <div class="col-xs-12 col-sm-6 col-md-6">
            <div class="form-group has-feedback">
              <input type="text" placeholder="<?php echo e(trans('frontend.display_name')); ?>" class="form-control" value="<?php echo e(old('vendor_reg_display_name')); ?>" id="vendor_reg_display_name" name="vendor_reg_display_name">
              <span class="fa fa-user form-control-feedback"></span>
            </div>
          </div>
          <div class="col-xs-12 col-sm-6 col-md-6">
            <div class="form-group has-feedback">
              <input type="text" placeholder="<?php echo e(trans('frontend.user_name')); ?>" class="form-control" value="<?php echo e(old('vendor_reg_name')); ?>" id="vendor_reg_name" name="vendor_reg_name">
              <span class="fa fa-user form-control-feedback"></span>
            </div>
          </div>
        </div>
        
        <div class="form-group has-feedback">
          <input type="email" placeholder="<?php echo e(ucfirst( trans('frontend.email') )); ?>" class="form-control" id="vendor_reg_email_id" value="<?php echo e(old('vendor_reg_email_id')); ?>" name="vendor_reg_email_id">
          <span class="fa fa-envelope form-control-feedback"></span>
        </div>
        
        <div class="row">
          <div class="col-xs-12 col-sm-6 col-md-6">
            <div class="form-group has-feedback">
              <input type="password" placeholder="<?php echo e(ucfirst(trans('frontend.password'))); ?>" class="form-control" id="vendor_reg_password" name="vendor_reg_password">
              <span class="fa fa-lock form-control-feedback"></span>
            </div>
          </div>
          <div class="col-xs-12 col-sm-6 col-md-6">
            <div class="form-group has-feedback">
              <input type="password" placeholder="<?php echo e(trans('frontend.retype_password')); ?>" class="form-control" id="vendor_reg_password_confirmation" name="vendor_reg_password_confirmation">
              <span class="fa fa-lock form-control-feedback"></span>
            </div>
          </div>
        </div>
        
				<div class="form-group has-feedback">
          <input type="text" placeholder="<?php echo e(trans('frontend.store_name_label')); ?>" class="form-control" id="vendor_reg_store_name" name="vendor_reg_store_name" value="<?php echo e(old('vendor_reg_store_name')); ?>">
          <span class="fa fa-home form-control-feedback"></span>
        </div>
								
        <div class="form-group has-feedback">
          <textarea id="vendor_reg_address_line_1" placeholder="<?php echo e(trans('frontend.address_line_1')); ?>" class="form-control" name="vendor_reg_address_line_1"><?php echo old('vendor_reg_address_line_1'); ?></textarea>
        </div>

        <div class="form-group has-feedback">
          <textarea id="vendor_reg_address_line_2" placeholder="<?php echo e(trans('frontend.address_line_2')); ?>" class="form-control" name="vendor_reg_address_line_2"><?php echo old('vendor_reg_address_line_2'); ?></textarea>
        </div>
								
				<div class="row">
          <div class="col-xs-12 col-sm-6 col-md-6">
            <div class="form-group has-feedback">
              <input type="text" placeholder="<?php echo e(trans('frontend.city')); ?>" class="form-control" value="<?php echo e(old('vendor_reg_city')); ?>" id="vendor_reg_city" name="vendor_reg_city">
              <span class="fa fa-text-width form-control-feedback"></span>
            </div>
          </div>
          <div class="col-xs-12 col-sm-6 col-md-6">
            <div class="form-group has-feedback">
              <input type="text" placeholder="<?php echo e(trans('frontend.state_label')); ?>" class="form-control" value="<?php echo e(old('vendor_reg_state')); ?>" id="vendor_reg_state" name="vendor_reg_state">
              <span class="fa fa-text-width form-control-feedback"></span>
            </div>
          </div>
        </div>
								
				<div class="row">
          <div class="col-xs-12 col-sm-6 col-md-6">
            <div class="form-group has-feedback">
              <input type="text" placeholder="<?php echo e(trans('frontend.country')); ?>" class="form-control" value="<?php echo e(old('vendor_reg_country')); ?>" id="vendor_reg_country" name="vendor_reg_country">
              <span class="fa fa-text-width form-control-feedback"></span>
            </div>
          </div>
          <div class="col-xs-12 col-sm-6 col-md-6">
            <div class="form-group has-feedback">
              <input type="number" placeholder="<?php echo e(trans('frontend.zip_postal_code')); ?>" class="form-control" value="<?php echo e(old('vendor_reg_zip_code')); ?>" id="vendor_reg_zip_code" name="vendor_reg_zip_code">
            </div>
          </div>
        </div>
        
        <div class="form-group has-feedback">
          <input type="number" placeholder="<?php echo e(ucfirst(trans('frontend.phone'))); ?>" class="form-control" id="vendor_reg_phone_number" name="vendor_reg_phone_number" value="<?php echo e(old('vendor_reg_phone_number')); ?>" min="0">
        </div>
								
        <div class="form-group has-feedback">
          <input type="text" placeholder="<?php echo e(ucfirst(trans('frontend.secret_key'))); ?>" class="form-control" id="vendor_reg_secret_key" name="vendor_reg_secret_key">
          <span class="fa fa-lock form-control-feedback"></span>
        </div>
        
        <?php if(!empty($is_enable_recaptcha) && $is_enable_recaptcha == true): ?>
        <div class="form-group">
          <div class="captcha-style"><?php echo app('captcha')->display();; ?></div>
        </div>
        <?php endif; ?>
        
        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-12">
            <span class="button-checkbox t-and-c-button-checkbox">
              <input type="checkbox" name="t_and_c" id="t_and_c" class="shopist-iCheck" value="1"> &nbsp;
              <a href="#" data-toggle="modal" data-target="#t_and_c_m"> <?php echo trans('frontend.t_and_c_label'); ?> </a>
            </span>
          </div>
        </div>
        
        <hr class="colorgraph">
        <div class="row">
          <div class="col-xs-12 col-md-6"><input name="vendor_reg_submit" id="vendor_reg_submit" class="btn btn-secondary btn-block btn-md" value="<?php echo e(trans('frontend.vendor_registration')); ?>" type="submit"> </div>
          <div class="col-xs-12 col-md-6"><a target="_blank" href="<?php echo e(route('admin.login')); ?>" class="btn btn-secondary btn-block btn-md vendor-reg-log-in-text"><?php echo e(trans('frontend.signin_account_label')); ?></a></div>
        </div>
      </form>
    </div>
  </div>
</div>  

<div class="modal fade" id="t_and_c_m" tabindex="-1" role="dialog" aria-labelledby="t_and_c_m_l" aria-hidden="true">    
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><?php echo trans('frontend.t_and_c_label'); ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php echo string_decode(get_vendor_settings_data()['term_n_conditions']); ?>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal"><?php echo trans('frontend.agree_label'); ?></button>
      </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>  
<?php echo $__env->make('layouts.frontend.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>