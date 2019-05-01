<?php $__env->startSection('title', trans('admin.vendors_settings_page_title') .' < '. get_site_title()); ?>

<?php $__env->startSection('content'); ?>
<style type="text/css">
 @media (min-width: 768px) {
  .sidebar-nav .navbar .navbar-collapse {
    padding: 0;
    max-height: none;
  }
  .sidebar-nav .navbar ul {
    float: none;
  }
  .sidebar-nav .navbar ul:not {
    display: block;
  }
  .sidebar-nav .navbar li {
    float: none;
    display: block;
  }
  .sidebar-nav .navbar li a {
    padding-top: 12px;
    padding-bottom: 12px;
  }
}

.sidebar-nav .navbar li.active{
    border-left:3px solid #333; 
}
</style>
<div class="row">
  <div class="col-md-12">
    <?php echo $__env->make('pages-message.notify-msg-success', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> 
    <form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
    <input type="hidden" name="_token" id="_token" value="<?php echo e(csrf_token()); ?>">
    
    <div class="row">
      <div class="col-md-12">
        <div class="clearfix">
          <button class="btn btn-primary pull-right" type="submit"><?php echo e(trans('admin.save')); ?></button>
        </div>
        <br>  
      </div>
    </div>    
     
    <div class="row">
      <div class="col-md-3">
        <div class="vendor-settings-sidebar-nav">
          <div class="navbar navbar-expand-lg" role="navigation">
            <div id="settings_tab" class="collapse navbar-collapse sidebar-navbar-collapse">
              <ul class="nav navbar-nav">
                <li <?php if(Session::has('update-target') && Session::get('update-target') == 'general'): ?>class="active" <?php endif; ?> data-target="general"><a href="#general" data-toggle="tab"><?php echo trans('admin.general'); ?></a></li>
                <li <?php if(Session::has('update-target') && Session::get('update-target') == 'social_media'): ?>class="active" <?php endif; ?> data-target="social_media"><a href="#social_media" data-toggle="tab"><?php echo trans('admin.social_media_label'); ?></a></li>
                <li <?php if(Session::has('update-target') && Session::get('update-target') == 'profile'): ?>class="active" <?php endif; ?> data-target="profile"><a href="#profile" data-toggle="tab"><?php echo trans('admin.profile'); ?></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-9">
        <div class="tab-content">
          <div class="tab-pane <?php if(Session::has('update-target') && Session::get('update-target') == 'general'): ?>active <?php endif; ?>" id="general">
            <?php echo $__env->make('pages.admin.vendors.vendors-general-settings', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <?php echo $__env->yieldContent('vendors-general-settings-page-content'); ?>
          </div>
          <div class="tab-pane <?php if(Session::has('update-target') && Session::get('update-target') == 'social_media'): ?>active <?php endif; ?>" id="social_media">
            <?php echo $__env->make('pages.admin.vendors.vendors-social-media', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <?php echo $__env->yieldContent('vendors-social-media-settings-page-content'); ?>
          </div>  
          <div class="tab-pane <?php if(Session::has('update-target') && Session::get('update-target') == 'profile'): ?>active <?php endif; ?>" id="profile" >
            <?php echo $__env->make('pages.admin.vendors.update-vendors-profile', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <?php echo $__env->yieldContent('vendors-profile-page-content'); ?>
          </div>
        </div>
      </div>
    </div>    
    <input type="hidden" name="hf_settings_target_tab" id="hf_settings_target_tab" value="<?php echo e($update_target); ?>">
    </form>      
  </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>