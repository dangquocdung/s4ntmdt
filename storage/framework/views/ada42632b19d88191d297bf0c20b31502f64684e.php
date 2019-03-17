<?php $__env->startSection('title', trans('admin.update_2checkout_payment') .' < '. get_site_title()); ?>

<?php $__env->startSection('content'); ?>
<?php if(!empty($payment_method_data)): ?>

<?php echo $__env->make('pages-message.notify-msg-success', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
  <input type="hidden" name="_token" id="_token" value="<?php echo e(csrf_token()); ?>">
  <input type="hidden" name="_payment_method_type" value="2checkout">
  
  <div class="box box-info">
    <div class="box-header">
      <h3 class="box-title"><?php echo e(trans('admin.two_checkout')); ?></h3>
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
                <?php if($payment_method_data->twocheckout->status == 'yes'): ?>
                <input type="checkbox" checked="checked" class="shopist-iCheck" name="inputEnablePayment2CheckoutMethod" id="inputEnablePayment2CheckoutMethod">  <?php echo e(trans('admin.enable_2checkout')); ?>

                <?php else: ?>
                <input type="checkbox" class="shopist-iCheck" name="inputEnablePayment2CheckoutMethod" id="inputEnablePayment2CheckoutMethod"> <?php echo e(trans('admin.enable_2checkout')); ?>

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
                <input type="text" placeholder="<?php echo e(trans('admin.title')); ?>" class="form-control" name="input2CheckoutTitle" id="input2CheckoutTitle" value="<?php echo e($payment_method_data->twocheckout->title); ?>">
              </div>
            </div>    
          </div>
            
          <div class="form-group">
            <div class="row">  
              <div class="col-sm-5">
                <?php echo e(trans('admin.vendor_stripe_card_number')); ?>

              </div>
              <div class="col-sm-7">
                <input type="text" placeholder="<?php echo e(trans('admin.vendor_stripe_card_number')); ?>" class="form-control" name="input2CheckoutCardNumber" id="input2CheckoutCardNumber" value="<?php echo e($payment_method_data->twocheckout->card_number); ?>">
              </div>
            </div>    
          </div>  
            
          <div class="form-group">
            <div class="row">  
              <div class="col-sm-5">
                <?php echo e(trans('admin.vendor_stripe_card_cvc')); ?>

              </div>
              <div class="col-sm-7">
                <input type="text" placeholder="<?php echo e(trans('admin.vendor_stripe_card_cvc')); ?>" class="form-control" name="input2CheckoutCardCVC" id="input2CheckoutCardCVC" value="<?php echo e($payment_method_data->twocheckout->cvc); ?>">
              </div>
            </div>    
          </div>   
            
          <div class="form-group">
            <div class="row">  
              <div class="col-sm-5">
                <?php echo e(trans('admin.vendor_stripe_card_expiration_month')); ?>

              </div>
              <div class="col-sm-7">
                <input type="text" placeholder="<?php echo e(trans('admin.vendor_stripe_card_expiration_month')); ?>" class="form-control" name="input2CheckoutCardExpirationMonth" id="input2CheckoutCardExpirationMonth" value="<?php echo e($payment_method_data->twocheckout->expiration_month); ?>">
              </div>
            </div>    
          </div>    
            
          <div class="form-group">
            <div class="row">  
              <div class="col-sm-5">
                <?php echo e(trans('admin.vendor_stripe_card_expiration_year')); ?>

              </div>
              <div class="col-sm-7">
                <input type="text" placeholder="<?php echo e(trans('admin.vendor_stripe_card_expiration_year')); ?>" class="form-control" name="input2CheckoutCardExpirationYear" id="input2CheckoutCardExpirationYear" value="<?php echo e($payment_method_data->twocheckout->expiration_year); ?>">
              </div>
            </div>    
          </div>    
            
          <div class="form-group">
            <div class="row">  
              <div class="col-sm-5">
                <?php echo e(trans('admin.method_description')); ?>

              </div>
              <div class="col-sm-7">
                  <textarea id="input2CheckoutDescription" name="input2CheckoutDescription" placeholder="<?php echo e(trans('admin.method_description')); ?>" class="form-control"><?php echo e($payment_method_data->twocheckout->description); ?></textarea>
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