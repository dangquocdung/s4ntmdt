<div class="user-dashboard-notice">
  <h4><?php echo e(trans('frontend.hi_single_label')); ?> <?php echo e($login_user_details['user_display_name']); ?></h4>
  <p><?php echo e(trans('frontend.user_db_notice_label')); ?></p>
</div><br>
 
<div class="row">
  <div class="col-lg-4 col-xs-12">
    <div class="small-box bg-gray">
      <div class="inner">
        <h3><?php echo $dashboard_data['todays_order']; ?></h3>
        <p><?php echo e(trans('frontend.user_account_todays_order_label')); ?></p>
      </div>
      <div class="icon">
        <i class="fa fa-area-chart"></i>
      </div>
      <a href="<?php echo e(route('my-orders-page')); ?>" class="small-box-footer"><?php echo e(trans('frontend.user_account_more_info_label')); ?> <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
    
  <div class="col-lg-4 col-xs-12">
    <div class="small-box bg-gray">
      <div class="inner">
        <h3><?php echo $dashboard_data['total_order']; ?></h3>
        <p><?php echo e(trans('frontend.user_account_totals_order_label')); ?></p>
      </div>
      <div class="icon">
        <i class="fa fa-area-chart"></i>
      </div>
      <a href="<?php echo e(route('my-orders-page')); ?>" class="small-box-footer"><?php echo e(trans('frontend.user_account_more_info_label')); ?> <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
    
  <div class="col-lg-4 col-xs-12">
    <div class="small-box bg-gray">
      <div class="inner">
        <h3><?php echo $dashboard_data['recent_coupon']; ?></h3>
        <p><?php echo e(trans('frontend.user_account_recent_coupon_label')); ?></p>
      </div>
      <div class="icon">
        <i class="fa fa-percent"></i>
      </div>
      <a href="<?php echo e(route('my-coupons-page')); ?>" class="small-box-footer"><?php echo e(trans('frontend.user_account_more_info_label')); ?> <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>    
</div>
