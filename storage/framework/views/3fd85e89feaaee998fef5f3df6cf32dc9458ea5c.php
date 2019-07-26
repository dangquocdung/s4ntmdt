<div id="coupons_details">
  <h5><label><?php echo trans('frontend.frontend_my_coupons_list'); ?></label></h5><hr>
  <div class="table-responsive">
    <table id="coupons_list" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
      <thead>
        <tr>
          <th><?php echo trans('admin.user_account_active_title'); ?></th>
          <th><?php echo trans('admin.user_account_coupon_code_title'); ?></th>
          <th><?php echo trans('admin.user_account_valid_till_title'); ?></th>
          <th><?php echo trans('admin.user_account_amount_title'); ?></th>
          <th><?php echo trans('frontend.coupon_condition_type'); ?></th>
        </tr>
      </thead>
      <tbody class="couponListItems">
        <?php if(count($login_user_coupon_data) > 0): ?>  
          <?php $__currentLoopData = $login_user_coupon_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr class="ui-borderTop">
              <?php if($row['coupon_status'] == 1): ?>  
              <td><?php echo trans('frontend.yes'); ?></td>
              <?php else: ?>
              <td><?php echo trans('frontend.no'); ?></td>
              <?php endif; ?>

              <td><?php echo $row['coupon_code']; ?></td>
              <td><?php echo Carbon\Carbon::parse($row['usage_range_end_date'])->format('F d, Y'); ?></td>  
              <td><?php echo price_html($row['coupon_amount'], get_frontend_selected_currency()); ?></td>
              <td><?php echo $row['coupon_condition_type']; ?></td>
            </tr>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
      </tbody>
      <tfoot>
        <tr>
          <th><?php echo trans('admin.user_account_active_title'); ?></th>
          <th><?php echo trans('admin.user_account_coupon_code_title'); ?></th>
          <th><?php echo trans('admin.user_account_valid_till_title'); ?></th>
          <th><?php echo trans('admin.user_account_amount_title'); ?></th>  
          <th><?php echo trans('frontend.coupon_condition_type'); ?></th>
        </tr>
      </tfoot>
    </table>
  </div>
</div>