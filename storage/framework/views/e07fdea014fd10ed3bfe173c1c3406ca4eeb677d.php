<?php $__env->startSection('title', trans('admin.update_bacs_payment') .' < '. get_site_title()); ?>

<?php $__env->startSection('content'); ?>
<?php if(count($payment_method_data) >0): ?>

<?php echo $__env->make('pages-message.notify-msg-success', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  
<form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
  <input type="hidden" name="_token" id="_token" value="<?php echo e(csrf_token()); ?>">
  <input type="hidden" name="_payment_method_type" value="bacs">
  
  <div class="box box-info">
    <div class="box-header">
      <h3 class="box-title"><?php echo e(trans('admin.direct_bank_transfer')); ?></h3>
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
                <?php if($payment_method_data['bacs']['enable_option'] == 'yes'): ?>
                <input type="checkbox" checked="checked" class="shopist-iCheck" name="inputEnablePaymentBACSMethod" id="inputEnablePaymentBACSMethod"> <?php echo e(trans('admin.enable_bank_transfer')); ?>

                <?php else: ?>
                <input type="checkbox" class="shopist-iCheck" name="inputEnablePaymentBACSMethod" id="inputEnablePaymentBACSMethod"> <?php echo e(trans('admin.enable_bank_transfer')); ?>

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
                <input type="text" placeholder="<?php echo e(trans('admin.title')); ?>" class="form-control" name="inputBACSTitle" id="inputBACSTitle" value="<?php echo e($payment_method_data['bacs']['method_title']); ?>">
              </div>
            </div>    
          </div>
            
          <div class="form-group">
            <div class="row">  
              <div class="col-sm-5">
                <?php echo e(trans('admin.method_description')); ?>

              </div>
              <div class="col-sm-7">
                  <textarea id="inputBACSDescription" name="inputBACSDescription" placeholder="<?php echo e(trans('admin.description')); ?>" class="form-control"><?php echo $payment_method_data['bacs']['method_description']; ?></textarea>
              </div>
            </div>    
          </div>
            
          <div class="form-group">
            <div class="row">  
              <div class="col-sm-5">
                <?php echo e(trans('admin.method_instructions')); ?>

              </div>
              <div class="col-sm-7">
                  <textarea id="inputBACSInstructions" name="inputBACSInstructions" placeholder="<?php echo e(trans('admin.instructions')); ?>" class="form-control"><?php echo $payment_method_data['bacs']['method_instructions']; ?></textarea>
              </div>
            </div>    
          </div>
          
          <h5><?php echo e(trans('admin.account_details')); ?></h5><hr>
          <div class="form-group">
            <div class="row">  
              <div class="col-sm-5">
                <?php echo e(trans('admin.account_name')); ?>

              </div>
              <div class="col-sm-7">
                <input type="text" placeholder="<?php echo e(trans('admin.account_name')); ?>" class="form-control" name="inputBACSAccountName" id="inputBACSAccountName" value="<?php echo e($payment_method_data['bacs']['account_details']['account_name']); ?>">
              </div>
            </div>    
          </div>
          
          <div class="form-group">
            <div class="row">  
              <div class="col-sm-5">
                <?php echo e(trans('admin.account_number')); ?>

              </div>
              <div class="col-sm-7">
                <input type="number" placeholder="<?php echo e(trans('admin.account_number')); ?>" step="any" class="form-control" name="inputBACSAccountNumber" id="inputBACSAccountNumber" value="<?php echo e($payment_method_data['bacs']['account_details']['account_number']); ?>">
              </div>
            </div>    
          </div>
          
          <div class="form-group">
            <div class="row">  
              <div class="col-sm-5">
                <?php echo e(trans('admin.bank_name')); ?>

              </div>
              <div class="col-sm-7">
                <input type="text" placeholder="<?php echo e(trans('admin.bank_name')); ?>" class="form-control" name="inputBACSBankName" id="inputBACSBankName" value="<?php echo e($payment_method_data['bacs']['account_details']['bank_name']); ?>">
              </div>
            </div>    
          </div>
          
          <div class="form-group">
            <div class="row">  
              <div class="col-sm-5">
                <?php echo e(trans('admin.bank_short_code')); ?>

              </div>
              <div class="col-sm-7">
                <input type="text" placeholder="<?php echo e(trans('admin.bank_short_code')); ?>" class="form-control" name="inputBACSShortCode" id="inputBACSShortCode" value="<?php echo e($payment_method_data['bacs']['account_details']['short_code']); ?>">
              </div>
            </div>    
          </div>
          
          <div class="form-group">
            <div class="row">  
              <div class="col-sm-5">
                <?php echo e(trans('admin.bank_iban')); ?>

              </div>
              <div class="col-sm-7">
                <input type="text" placeholder="<?php echo e(trans('admin.bank_iban')); ?>" class="form-control" name="inputBACSIBAN" id="inputBACSIBAN" value="<?php echo e($payment_method_data['bacs']['account_details']['iban']); ?>">
              </div>
            </div>    
          </div>
          
          <div class="form-group">
            <div class="row">  
              <div class="col-sm-5">
                <?php echo e(trans('admin.bank_swift')); ?>

              </div>
              <div class="col-sm-7">
                <input type="text" placeholder="<?php echo e(trans('admin.bank_swift')); ?>" class="form-control" name="inputBACSSwift" id="inputBACSSwift" value="<?php echo e($payment_method_data['bacs']['account_details']['swift']); ?>">
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