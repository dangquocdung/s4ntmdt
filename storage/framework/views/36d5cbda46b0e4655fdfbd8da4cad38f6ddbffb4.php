<div class="row" style="margin-top: 50px;">
  <div class="col-xs-12 col-sm-12 col-md-12">
    <?php echo $__env->make('pages-message.notify-msg-success', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    
    <div class="text-right">
      <?php if(!empty($frontend_account_details) && !empty($frontend_account_details->address_details)): ?>
        <a href="<?php echo e(route('my-address-edit-page')); ?>" class="btn btn-light btn-sm"><?php echo e(trans('frontend.edit_address')); ?></a>
      <?php else: ?>
        <a href="<?php echo e(route('my-address-add-page')); ?>" class="btn btn-light btn-sm"><?php echo e(trans('frontend.add_address')); ?></a>
      <?php endif; ?>
    </div>
  </div>
</div><br>

<div class="row">
  <div class="col-xs-12 col-sm-6 col-md-6">
    <h5><label><?php echo e(trans('frontend.billing_address')); ?></label></h5><hr>
    
    <br>
    <?php if(!empty($frontend_account_details) && !empty($frontend_account_details->address_details)): ?>
      <p><?php echo $frontend_account_details->address_details->account_bill_first_name .' '. $frontend_account_details->address_details->account_bill_last_name; ?></p>

      <?php if($frontend_account_details->address_details->account_bill_company_name): ?>
        <p><strong><?php echo e(trans('admin.company')); ?>:</strong> <?php echo $frontend_account_details->address_details->account_bill_company_name; ?></p>
      <?php endif; ?>

      <p><strong><?php echo e(trans('admin.address_1')); ?>:</strong> <?php echo $frontend_account_details->address_details->account_bill_adddress_line_1; ?></p>

      <?php if($frontend_account_details->address_details->account_bill_adddress_line_2): ?>
        <p><strong><?php echo e(trans('admin.address_2')); ?>:</strong> <?php echo $frontend_account_details->address_details->account_bill_adddress_line_2; ?></p>
      <?php endif; ?>

      <p><strong><?php echo e(trans('admin.city')); ?>:</strong> <?php echo $frontend_account_details->address_details->account_bill_town_or_city; ?></p>

      <p><strong><?php echo e(trans('admin.postCode')); ?>:</strong> <?php echo $frontend_account_details->address_details->account_bill_zip_or_postal_code; ?></p>
      <p><strong><?php echo e(trans('admin.country')); ?>:</strong> <?php echo get_country_by_code( $frontend_account_details->address_details->account_bill_select_country ); ?></p>

      <br>

      <?php if($frontend_account_details->address_details->account_bill_phone_number): ?>
        <p><strong><?php echo e(trans('admin.phone')); ?>:</strong> <?php echo $frontend_account_details->address_details->account_bill_phone_number; ?></p>
      <?php endif; ?>


      <?php if($frontend_account_details->address_details->account_bill_fax_number): ?>
        <p><strong><?php echo e(trans('admin.fax')); ?>:</strong> <?php echo $frontend_account_details->address_details->account_bill_fax_number; ?></p>
      <?php endif; ?>

      <p><strong><?php echo e(trans('admin.email')); ?>:</strong> <?php echo $frontend_account_details->address_details->account_bill_email_address; ?></p>
    
    <?php else: ?>
      <p><?php echo e(trans('admin.billing_address_not_available')); ?></p>
    <?php endif; ?>
        
  </div>
  <div class="col-xs-12 col-sm-6 col-md-6">
    <h5><label><?php echo e(trans('frontend.shipping_address')); ?></label></h5><hr>
    
    <br>
    <?php if(!empty($frontend_account_details) && !empty($frontend_account_details->address_details)): ?>
      <p><?php echo $frontend_account_details->address_details->account_shipping_first_name .' '. $frontend_account_details->address_details->account_shipping_last_name; ?></p>

      <?php if($frontend_account_details->address_details->account_shipping_company_name): ?>
        <p><strong><?php echo e(trans('admin.company')); ?>:</strong> <?php echo $frontend_account_details->address_details->account_shipping_company_name; ?></p>
      <?php endif; ?>

      <p><strong><?php echo e(trans('admin.address_1')); ?>:</strong> <?php echo $frontend_account_details->address_details->account_shipping_adddress_line_1; ?></p>

      <?php if($frontend_account_details->address_details->account_shipping_adddress_line_2): ?>
        <p><strong><?php echo e(trans('admin.address_2')); ?>:</strong> <?php echo $frontend_account_details->address_details->account_shipping_adddress_line_2; ?></p>
      <?php endif; ?>

      <p><strong><?php echo e(trans('admin.city')); ?>:</strong> <?php echo $frontend_account_details->address_details->account_shipping_town_or_city; ?></p>

      <p><strong><?php echo e(trans('admin.postCode')); ?>:</strong> <?php echo $frontend_account_details->address_details->account_shipping_zip_or_postal_code; ?></p>
      <p><strong><?php echo e(trans('admin.country')); ?>:</strong> <?php echo get_country_by_code( $frontend_account_details->address_details->account_shipping_select_country ); ?></p>

      <br>

      <?php if($frontend_account_details->address_details->account_shipping_phone_number): ?>
        <p><strong><?php echo e(trans('admin.phone')); ?>:</strong> <?php echo $frontend_account_details->address_details->account_shipping_phone_number; ?></p>
      <?php endif; ?>


      <?php if($frontend_account_details->address_details->account_shipping_fax_number): ?>
        <p><strong><?php echo e(trans('admin.fax')); ?>:</strong> <?php echo $frontend_account_details->address_details->account_shipping_fax_number; ?></p>
      <?php endif; ?>

      <p><strong><?php echo e(trans('admin.email')); ?>:</strong> <?php echo $frontend_account_details->address_details->account_shipping_email_address; ?></p>
    
    <?php else: ?>
      <p><?php echo e(trans('admin.shipping_address_not_available')); ?></p>
    <?php endif; ?>
  </div>
</div>