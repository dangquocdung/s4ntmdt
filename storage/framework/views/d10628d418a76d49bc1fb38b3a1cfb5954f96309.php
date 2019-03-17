<?php $__env->startSection('vendor-withdrawal-account-page-content'); ?>
<div id="vendor_withdraw_request_content">
  <div class="box box-solid">
    <div class="row">
      <div class="col-md-12">
        <div class="box-body">
          <div class="row">  
            <div class="col-md-6">
              <h5><?php echo trans('admin.default_withdrawals_type_label'); ?></h5><hr>
              <div class="default-withdraw-type-content">
                <?php if(count($withdraw_request_data) > 0): ?>
                <p><i class="fa fa-check"></i> <?php echo $withdraw_request_data['selected_payment_type']; ?></p>
                <?php if($withdraw_request_data['payment_type'] == 'single_payment_with_custom_values'): ?>
                <p><i class="fa fa-check"></i> <?php echo trans('admin.custom_values_label'); ?> <?php echo get_current_currency_symbol(); ?><?php echo $withdraw_request_data['custom_amount']; ?></p>
                <?php endif; ?>
                <p><i class="fa fa-check"></i> <?php echo trans('admin.requested_label'); ?> <?php echo Carbon\Carbon::parse( $withdraw_request_data['created_at'] )->format('d, M Y'); ?></p><br>
                <?php else: ?>
                <p><i class="fa fa-close"></i> <?php echo trans('admin.default_no_withdraw_for_processing_msg'); ?></p>
                <?php endif; ?>
              </div>
            </div>
            <div class="col-md-6">
              <h5><?php echo trans('admin.default_withdrawals_method_label'); ?></h5><hr>
              <div class="default-withdraw-method-content">
                <?php if(count($withdraw_request_data) > 0): ?>
                <p><i class="fa fa-check"></i> <?php echo $withdraw_request_data['selected_payment_method']; ?></p>
                <p><i class="fa fa-check"></i> <?php echo trans('admin.requested_label'); ?> <?php echo Carbon\Carbon::parse( $withdraw_request_data['created_at'] )->format('d, M Y'); ?></p><br>
                <?php else: ?>
                <p><i class="fa fa-close"></i> <?php echo trans('admin.default_no_withdraw_paymenthod_method_for_processing_msg'); ?></p>
                <?php endif; ?>
              </div>
            </div>
          </div>    
          <?php if(count($withdraw_request_data) > 0): ?>  
          <div class="row">
            <div class="col-md-12">
              <div class="clearfix">
                <div class="pull-right">
                  <a class="btn btn-primary btn-md" href="<?php echo e(route('admin.withdraws_content_update', $withdraw_request_data['id'])); ?>"><?php echo trans('admin.change_withdraw_request_label'); ?></a>
                  <a class="btn btn-primary btn-md" href="<?php echo e(route('admin.delete_withdraws_request', $withdraw_request_data['id'])); ?>"><?php echo trans('admin.delete_withdraw_request_label'); ?></a>
                </div>  
              </div><br>
            </div>  
          </div>    
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
</div> 
<?php $__env->stopSection(); ?>