<?php $__env->startSection('title', trans('admin.update_paypal_payment') .' < '. get_site_title()); ?>

<?php $__env->startSection('content'); ?>
<?php if(!empty($payment_method_data)): ?>

<?php echo $__env->make('pages-message.notify-msg-success', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
  <input type="hidden" name="_token" id="_token" value="<?php echo e(csrf_token()); ?>">
  <input type="hidden" name="_payment_method_type" value="paypal">
  
  <div class="box box-info">
    <div class="box-header">
      <h3 class="box-title"><?php echo e(trans('admin.paypal')); ?></h3>
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
              <div class="col-sm-5">
                <?php echo e(trans('admin.enable_disable')); ?>

              </div>
              <div class="col-sm-7">
                <?php if($payment_method_data->paypal->status == 'yes'): ?>
                <input type="checkbox" checked="checked" class="shopist-iCheck" name="inputEnablePaymentPaypalMethod" id="inputEnablePaymentPaypalMethod">  <?php echo trans('admin.enable_payPal'); ?>

                <?php else: ?>
                <input type="checkbox" class="shopist-iCheck" name="inputEnablePaymentPaypalMethod" id="inputEnablePaymentPaypalMethod"> <?php echo trans('admin.enable_payPal'); ?>

                <?php endif; ?>
              </div>
            </div>    
          </div>
            
          <div class="form-group">
            <div class="row">  
              <div class="col-sm-5">
                <?php echo e(trans('admin.method_title')); ?>

              </div>
              <div class="col-sm-7">
                <input type="text" placeholder="<?php echo e(trans('admin.title')); ?>" class="form-control" name="inputPaypalTitle" id="inputPaypalTitle" value="<?php echo e($payment_method_data->paypal->title); ?>">
              </div>
            </div>    
          </div>
          
          <div class="form-group">
            <div class="row">  
              <div class="col-sm-5">
                <?php echo e(trans('admin.vendor_paypal_email')); ?>

              </div>
              <div class="col-sm-7">
                <input type="email" placeholder="<?php echo e(trans('admin.email')); ?>" class="form-control" name="inputPaypalEmail" id="inputPaypalEmail" value="<?php echo e($payment_method_data->paypal->email_id); ?>">
              </div>
            </div>    
          </div>
            
          <div class="form-group">
            <div class="row">  
              <div class="col-sm-5">
                <?php echo e(trans('admin.method_description')); ?>

              </div>
              <div class="col-sm-7">
                  <textarea id="inputPaypalDescription" name="inputPaypalDescription" placeholder="<?php echo e(trans('admin.method_description')); ?>" class="form-control"><?php echo e($payment_method_data->paypal->description); ?></textarea>
              </div>
            </div>    
          </div>
        </div>
      </div>  
    </div>
  </div>
</form>

<?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>