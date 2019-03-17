<form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
  <input type="hidden" name="_token" id="_token" value="<?php echo e(csrf_token()); ?>">
  <div class="row">
    <div class="col-md-12">
      
      <h5><label><?php echo e(trans('frontend.update_profile')); ?></label></h5><hr>

      <?php echo $__env->make('pages-message.notify-msg-success', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
      <?php echo $__env->make('pages-message.form-submit', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
      <?php echo $__env->make('pages-message.notify-msg-error', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
      
      <div class="form-group">
        <div class="col-sm-4">
          <label class="control-label" for="inputDisplayName"><?php echo e(ucfirst( trans('admin.display_name') )); ?></label>
        </div>
        <div class="col-sm-8">
          <input type="text" placeholder="<?php echo e(trans('admin.display_name')); ?>" class="form-control" value="<?php echo e($user_details['user_display_name']); ?>" id="display_name" name="display_name">
        </div>
      </div>

      <div class="form-group">
        <div class="col-sm-4">
          <label class="control-label" for="inputUserName"><?php echo e(trans('admin.user_name')); ?></label>
        </div>
        <div class="col-sm-8">
          <input type="text" placeholder="<?php echo e(trans('admin.user_name')); ?>" class="form-control" value="<?php echo e($user_details['user_name']); ?>" id="user_name" name="user_name">
        </div>
      </div> 

      <div class="form-group">
        <div class="col-sm-4">
          <label class="control-label" for="inputEmail"><?php echo e(trans('admin.email')); ?></label>
        </div>
        <div class="col-sm-8">
          <input type="text" placeholder="<?php echo e(trans('admin.email')); ?>" class="form-control" value="<?php echo e($user_details['user_email']); ?>" id="email_id" name="email_id">
        </div>
      </div> 
      
      <div class="form-group">
        <div class="col-sm-4">
          <label class="control-label" for="inputNewPassword"><?php echo e(trans('admin.new_password')); ?></label>
        </div>
        <div class="col-sm-8">
           <input type="password" placeholder="<?php echo e(trans('admin.new_password')); ?>" class="form-control" value="" id="password" name="password">
        </div>
      </div>
      
      <div class="form-group">
        <div class="col-sm-4">
          <label class="control-label" for="inputProfilePicture"><?php echo e(trans('admin.profile_picture')); ?></label>
        </div>
        <div class="col-sm-8 profile-picture-content">
           <?php if($user_details['user_photo_url']): ?>
            <div class="profile-picture">
              <div class="img-div"><img src="<?php echo e(get_image_url($user_details['user_photo_url'])); ?>" class="user-image" alt=""/></div><br>
              <div class="btn-div"><button type="button" class="btn btn-default btn-sm remove-frontend-profile-picture"><?php echo e(trans('admin.remove_image')); ?></button></div>
            </div>
            <div class="no-profile-picture" style="display:none;">
              <div class="img-div"><img src="<?php echo e(default_avatar_img_src()); ?>" class="user-image" alt=""/></div><br>
              <div class="btn-div"><button data-toggle="modal" data-target="#frontendUserUploadProfilePicture" type="button" class="btn btn-default btn-sm profile-picture-uploader"><?php echo e(trans('admin.upload_image')); ?></button></div>
            </div>
           <?php else: ?>
           <div class="profile-picture" style="display:none;">
              <div class="img-div"><img src="" class="user-image" alt=""/></div><br>
              <div class="btn-div"><button type="button" class="btn btn-default btn-sm remove-frontend-profile-picture"><?php echo e(trans('admin.remove_image')); ?></button></div>
            </div>
           <div class="no-profile-picture">
              <div class="img-div"><img src="<?php echo e(default_avatar_img_src()); ?>" class="user-image" alt=""/></div><br>
              <div class="btn-div"><button data-toggle="modal" data-target="#frontendUserUploadProfilePicture" type="button" class="btn btn-default btn-sm profile-picture-uploader"><?php echo e(trans('admin.upload_image')); ?></button></div>
           </div>
           <?php endif; ?>
        </div>
      </div>  

      <div class="modal fade" id="frontendUserUploadProfilePicture" tabindex="-1" role="dialog" aria-labelledby="userUploadProfilePicture" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <p class="no-margin"><?php echo e(trans('admin.you_can_upload_1_image')); ?></p>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>  
            <div class="modal-body">             
              <div class="uploadform dropzone no-margin dz-clickable frontend-user-profile-picture-uploader" id="frontend_user_profile_picture_uploader" name="frontend_user_profile_picture_uploader">
                <div class="dz-default dz-message">
                  <span><?php echo e(trans('admin.drop_your_cover_picture_here')); ?></span>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default attachtopost" data-dismiss="modal"><?php echo e(trans('admin.close')); ?></button>
            </div>
          </div>
        </div>
      </div> 
      <input type="hidden" name="hf_frontend_profile_picture" id="hf_frontend_profile_picture" value="">

    </div>
  </div>
  
  <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
      <div class="text-right">
          <button type="submit" class="btn btn-light btn-sm"><?php echo e(trans('frontend.update_profile')); ?></button>
      </div>
    </div>
  </div>
</form>