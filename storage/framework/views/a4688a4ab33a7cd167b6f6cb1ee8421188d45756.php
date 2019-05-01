<?php if(Request::is('user/account')): ?>
  <?php $__env->startSection('title',  trans('frontend.frontend_user_dashboard_title') .' < '. get_site_title() ); ?>
<?php elseif(Request::is('user/account/dashboard')): ?>
  <?php $__env->startSection('title',  trans('frontend.frontend_user_dashboard_title') .' < '. get_site_title() ); ?>
<?php elseif(Request::is('user/account/my-address')): ?>
  <?php $__env->startSection('title',  trans('frontend.frontend_user_address_title') .' < '. get_site_title() ); ?>
<?php elseif(Request::is('user/account/my-address/add')): ?>
  <?php $__env->startSection('title',  trans('frontend.frontend_user_address_add_title') .' < '. get_site_title() ); ?> 
<?php elseif(Request::is('user/account/my-address/edit')): ?>
  <?php $__env->startSection('title',  trans('frontend.frontend_user_address_edit_title') .' < '. get_site_title() ); ?>
<?php elseif(Request::is('user/account/my-profile')): ?>
  <?php $__env->startSection('title',  trans('frontend.frontend_user_profile_edit_title') .' < '. get_site_title() ); ?>
<?php elseif(Request::is('user/account/my-orders')): ?>
  <?php $__env->startSection('title',  trans('frontend.frontend_my_order_title') .' < '. get_site_title() ); ?>
<?php elseif(Request::is('user/account/my-saved-items')): ?>
  <?php $__env->startSection('title',  trans('frontend.frontend_wishlist_items_title') .' < '. get_site_title() ); ?> 
<?php elseif(Request::is('user/account/my-coupons')): ?>
  <?php $__env->startSection('title',  trans('frontend.frontend_coupons_items_title') .' < '. get_site_title() ); ?>
<?php elseif(Request::is('user/account/download')): ?>
  <?php $__env->startSection('title',  trans('frontend.frontend_download_options_title') .' < '. get_site_title() ); ?>  
<?php elseif(Request::is('user/account/order-details/*')): ?>
  <?php $__env->startSection('title',  trans('frontend.user_order_details_page_title') .' < '. get_site_title() ); ?>  
<?php endif; ?>

<?php $__env->startSection('content'); ?>
<div id="user_account" class="container new-container">
  <br> 
  <div class="row">
    <div class="col-md-12 account-type"><h5><i class="fa fa-user-plus"></i> <?php echo trans('frontend.user_account_label'); ?></h5><hr></div>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-2">
      <div class="account-tab-main">
        <ul class="nav flex-column">
          <?php if(Request::is('user/account/dashboard') || Request::is('user/account')): ?>
          <li class="nav-item"><a class="nav-link active" href="<?php echo e(route('user-dashboard-page')); ?>"><i class="fa fa-dashboard"></i> <?php echo e(trans('frontend.dashboard')); ?></a></li>
          <?php else: ?>
          <li class="nav-item"><a class="nav-link" href="<?php echo e(route('user-dashboard-page')); ?>"><i class="fa fa-dashboard"></i> <?php echo e(trans('frontend.dashboard')); ?></a></li>
          <?php endif; ?>
          
          <?php if( Request::is('user/account/my-address') ||  Request::is('user/account/my-address/add') ||  Request::is('user/account/my-address/edit') ): ?>
            <li class="nav-item"><a class="nav-link active" href="<?php echo e(route('my-address-page')); ?>"><i class="fa fa-map-marker"></i> <?php echo e(trans('frontend.my_address')); ?></a></li>
          <?php else: ?>
            <li class="nav-item"><a class="nav-link" href="<?php echo e(route('my-address-page')); ?>"><i class="fa fa-map-marker"></i> <?php echo e(trans('frontend.my_address')); ?></a></li>
          <?php endif; ?>
          
          <?php if(Request::is('user/account/my-orders') || Request::is('user/account/order-details/**')): ?>
            <li class="nav-item"><a class="nav-link active" href="<?php echo e(route('my-orders-page')); ?>"><i class="fa fa-file-text-o"></i> <?php echo e(trans('frontend.my_orders')); ?></a></li>
          <?php else: ?>
            <li class="nav-item"><a class="nav-link" href="<?php echo e(route('my-orders-page')); ?>"><i class="fa fa-file-text-o"></i> <?php echo e(trans('frontend.my_orders')); ?></a></li>
          <?php endif; ?>
          
          <?php if(Request::is('user/account/my-saved-items')): ?>
            <li class="nav-item"><a class="nav-link active" href="<?php echo e(route('my-saved-items-page')); ?>"><i class="fa fa-save"></i> <?php echo e(trans('frontend.my_saved_items')); ?></a></li>
          <?php else: ?>
            <li class="nav-item"><a class="nav-link" href="<?php echo e(route('my-saved-items-page')); ?>"><i class="fa fa-save"></i> <?php echo e(trans('frontend.my_saved_items')); ?></a></li>
          <?php endif; ?>
          
          <?php if(Request::is('user/account/my-coupons')): ?>
            <li class="nav-item"><a class="nav-link active" href="<?php echo e(route('my-coupons-page')); ?>"><i class="fa fa-scissors"></i> <?php echo e(trans('frontend.my_coupons')); ?></a></li>
          <?php else: ?>
            <li class="nav-item"><a class="nav-link" href="<?php echo e(route('my-coupons-page')); ?>"><i class="fa fa-scissors"></i> <?php echo e(trans('frontend.my_coupons')); ?></a></li>
          <?php endif; ?>
          
          <?php if(Request::is('user/account/download')): ?>
            <li class="nav-item"><a class="nav-link active" href="<?php echo e(route('download-page')); ?>"><i class="fa fa-download"></i> <?php echo e(trans('frontend.user_account_download_title')); ?></a></li>
          <?php else: ?>
            <li class="nav-item"><a class="nav-link" href="<?php echo e(route('download-page')); ?>"><i class="fa fa-download"></i> <?php echo e(trans('frontend.user_account_download_title')); ?></a></li>
          <?php endif; ?>
          
          <?php if(Request::is('user/account/my-profile')): ?>
            <li class="nav-item"><a class="nav-link active" href="<?php echo e(route('my-profile-page')); ?>"><i class="fa fa-user"></i> <?php echo e(trans('frontend.my_profile')); ?></a></li>
          <?php else: ?>
            <li class="nav-item"><a class="nav-link" href="<?php echo e(route('my-profile-page')); ?>"><i class="fa fa-user"></i> <?php echo e(trans('frontend.my_profile')); ?></a></li>
          <?php endif; ?>
          
          <?php if(is_frontend_user_logged_in()): ?>
          <form method="post" action="<?php echo e(route('user-logout')); ?>" enctype="multipart/form-data">
            <input type="hidden" name="_token" id="_token" value="<?php echo e(csrf_token()); ?>">  
            <li><button type="submit" class="btn btn-default btn-block"><i class="fa fa-circle-o-notch"></i> <?php echo trans('admin.sign_out'); ?></button>  </li>
          </form>
          <?php endif; ?>
        </ul>
      </div>  
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-10">
      <div class="panel panel-default">
        <div class="panel-heading text-right">
          <div class="new-media">
            <div class="new-media-left">
              <?php if($login_user_details['user_photo_url']): ?>
                <img class="new-media-object" src="<?php echo e(get_image_url($login_user_details['user_photo_url'])); ?>" alt="">
              <?php else: ?>
                <img class="new-media-object" src="<?php echo e(default_avatar_img_src()); ?>" alt="">
              <?php endif; ?>
            </div>
              
            <div class="new-media-body">
              <h5 class="new-media-heading"><?php echo e($login_user_details['user_display_name']); ?></h5>
              <h6 class="new-media-heading"><?php echo trans('frontend.member_since_label'); ?> <?php echo Carbon\Carbon::parse($login_user_details['member_since'])->format('d, M Y'); ?></h6>
             </div>
          </div>
        </div>
        <div class="panel-body">
          <?php if(Request::is('user/account/dashboard') || Request::is('user/account')): ?>
            <?php echo $__env->make('pages.frontend.user-account.my-dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
          <?php elseif(Request::is('user/account/my-address')): ?>  
            <?php echo $__env->make('pages.frontend.user-account.my-address', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
          <?php elseif(Request::is('user/account/my-address/add')): ?>  
            <?php echo $__env->make('pages.frontend.user-account.add-address', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
          <?php elseif(Request::is('user/account/my-address/edit')): ?>  
            <?php echo $__env->make('pages.frontend.user-account.edit-address', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
          <?php elseif(Request::is('user/account/my-profile') ): ?>  
            <?php echo $__env->make('pages.frontend.user-account.user-profile', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>  
          <?php elseif(Request::is('user/account/my-orders') ): ?>
            <?php echo $__env->make('pages.frontend.user-account.my-orders', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> 
          <?php elseif(Request::is('user/account/view-orders-details/*') ): ?>
            <?php echo $__env->make('pages.frontend.user-account.user-order-details', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
          <?php elseif(Request::is('user/account/my-saved-items') ): ?>
            <?php echo $__env->make('pages.frontend.user-account.my-wishlist', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> 
          <?php elseif(Request::is('user/account/my-coupons') ): ?>
            <?php echo $__env->make('pages.frontend.user-account.my-coupons', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
          <?php elseif(Request::is('user/account/download') ): ?>
            <?php echo $__env->make('pages.frontend.user-account.download', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>  
          <?php elseif(Request::is('user/account/order-details/*') ): ?>
            <?php echo $__env->make('pages.frontend.user-account.order-details', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>  
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>  
<?php echo $__env->make('layouts.frontend.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>