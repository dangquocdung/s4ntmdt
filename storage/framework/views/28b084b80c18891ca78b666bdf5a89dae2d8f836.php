<?php $__env->startSection('title', trans('admin.update_announcement_label') .' < '. get_site_title()); ?>

<?php $__env->startSection('content'); ?>
<?php echo $__env->make('pages-message.form-submit', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('pages-message.notify-msg-error', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('pages-message.notify-msg-success', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
  <div class="box">
    <div class="box-header">
        <h3 class="box-title"><?php echo e(trans('admin.add_new_post_top_title')); ?> &nbsp;&nbsp;&nbsp;&nbsp;<a class="btn btn-default btn-sm" href="<?php echo e(route('admin.announcement_list_content')); ?>"><?php echo e(trans('admin.posts_list')); ?></a> &nbsp;<a class="btn btn-default btn-sm" href="<?php echo e(route('admin.announcement_content')); ?>"><?php echo e(trans('admin.add_new_post')); ?></a></h3>
      <div class="box-tools pull-right">
        <button class="btn btn-primary btn-block btn-sm" type="submit"><?php echo e(trans('admin.update')); ?></button>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-8">
      <div class="box box-solid">
        <div class="box-header with-border">
          <i class="fa fa-text-width"></i>
          <h3 class="box-title"><?php echo e(trans('admin.post_title')); ?></h3>
        </div>
        <div class="box-body">
          <input type="text" placeholder="<?php echo e(trans('admin.post_title_placeholder')); ?>" class="form-control" name="vendor_announcement_post_title" id="vendor_announcement_post_title" value="<?php echo e($vendor_announcement->post_title); ?>">
        </div>
      </div>
        
      <div class="box box-solid">
        <div class="box-header with-border">
          <i class="fa fa-text-width"></i>
          <h3 class="box-title"><?php echo e(trans('admin.post_description')); ?></h3>
        </div>
        <div class="box-body">
          <textarea id="announcement_description_editor" name="announcement_description_editor" class="dynamic-editor" placeholder="<?php echo e(trans('admin.post_description_placeholder')); ?>"><?php echo $vendor_announcement->post_content; ?></textarea>
        </div>
      </div>  
        
      <div class="box box-solid">
        <div class="box-header with-border">
          <i class="fa fa-text-width"></i>
          <h3 class="box-title"><?php echo e(trans('admin.announcement_settings_label')); ?></h3>
        </div>
        <div class="box-body">
          <div class="form-group">
            <div class="row">  
              <label class="col-sm-5 control-label" for="inputSendAnnouncement"><?php echo e(trans('admin.send_announcement_to_label')); ?></label>
              <div class="col-sm-7">
                <select id="send_announcement" name="send_announcement" class="form-control select2" style="width: 100%;">
                  <option value=""><?php echo trans('admin.select_option_label'); ?></option>

                  <?php if($vendor_announcement->announcement_receiver_name == 'all_vendor'): ?>
                  <option selected="selected" value="all_vendor"><?php echo trans('admin.all_vendor_label'); ?></option>
                  <?php else: ?>
                  <option value="all_vendor"><?php echo trans('admin.all_vendor_label'); ?></option>
                  <?php endif; ?>

                  <?php if($vendor_announcement->announcement_receiver_name == 'selected_vendor'): ?>
                  <option selected="selected" value="selected_vendor"><?php echo trans('admin.selected_vendor_label'); ?></option>
                  <?php else: ?>
                  <option value="selected_vendor"><?php echo trans('admin.selected_vendor_label'); ?></option>
                  <?php endif; ?>
                </select>   
              </div>
            </div>  
          </div>
          <?php if($vendor_announcement->announcement_receiver_name == 'selected_vendor'): ?>  
          <div id="send_selected_vendor" class="form-group">
            <div class="row">    
              <label class="col-sm-5 control-label" for="inputSelectVendor"><?php echo e(trans('admin.select_vendor_label')); ?></label>
              <div class="col-sm-7">
                <input type="text" name="vendor_lists" placeholder="<?php echo e(trans('admin.vendor_search_placeholder_label')); ?>" class="typeahead vendor-lists-typeahead tm-input vendor-lists-input form-control tm-input-info"/>
              </div>
            </div>  
          </div>  
          <?php else: ?>
          <div id="send_selected_vendor" class="form-group" style="display:none;">
            <div class="row">    
              <label class="col-sm-5 control-label" for="inputSelectVendor"><?php echo e(trans('admin.select_vendor_label')); ?></label>
              <div class="col-sm-7">
                <input type="text" name="vendor_lists" placeholder="<?php echo e(trans('admin.vendor_search_placeholder_label')); ?>" class="typeahead vendor-lists-typeahead tm-input vendor-lists-input form-control tm-input-info"/>
              </div>
            </div>
          </div>  
          <?php endif; ?>
        </div>
      </div>    
    </div>
    <div class="col-md-4">
      <div class="box box-solid">
        <div class="box-header with-border">
          <i class="fa fa-eye"></i>
          <h3 class="box-title"><?php echo e(trans('admin.visibility')); ?></h3>
        </div>
        <div class="box-body">
          <div class="form-group">
            <div class="row">  
              <label class="col-sm-3 control-label" for="inputVisibility"><?php echo e(trans('admin.status')); ?></label>
              <div class="col-sm-9">
                <select class="form-control select2" name="announcement_post_visibility" style="width: 100%;">
                  <?php if($vendor_announcement->post_status == 1): ?>  
                  <option selected="selected" value="1"><?php echo e(trans('admin.enable')); ?></option>
                  <?php else: ?>
                  <option value="1"><?php echo e(trans('admin.enable')); ?></option>
                  <?php endif; ?>

                  <?php if($vendor_announcement->post_status == 0): ?>  
                  <option selected="selected" value="0"><?php echo e(trans('admin.disable')); ?></option>
                  <?php else: ?>
                  <option value="0"><?php echo e(trans('admin.disable')); ?></option>                  
                  <?php endif; ?>
                </select>                                         
              </div>
            </div>  
          </div>
        </div>
      </div> 
    </div>
  </div>
  <input type="hidden" name="selected_vendors" id="selected_vendors" value="<?php echo e($vendor_announcement->post_json_data); ?>"> 
  <input type="hidden" name="_token" id="_token" value="<?php echo e(csrf_token()); ?>">
</form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>