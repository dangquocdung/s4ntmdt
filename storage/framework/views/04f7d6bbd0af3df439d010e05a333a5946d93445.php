<?php $__env->startSection('vendors-profile-page-content'); ?>
<div id="vendor_profile">
  <div class="box box-solid">
    <div class="row">
      <div class="col-md-12">
        <div class="box-body">
          <div class="form-group">
            <div class="row">  
              <label class="col-sm-4 control-label" for="inputDisplayName"><?php echo e(trans('admin.display_name')); ?></label>
              <div class="col-sm-8">
                <input type="text" class="form-control" id="inputDisplayName" name="inputDisplayName" value="<?php echo e($user_details->user_display_name); ?>" placeholder="<?php echo e(trans('admin.display_name')); ?>"/>
              </div>
            </div>  
          </div>

          <div class="form-group">
            <div class="row">  
              <label class="col-sm-4 control-label" for="inputUserName"><?php echo e(trans('admin.user_name')); ?></label>
              <div class="col-sm-8">
                <input type="text" class="form-control" id="inputUserName" name="inputUserName" value="<?php echo e($user_details->user_name); ?>" placeholder="<?php echo e(trans('admin.user_name')); ?>"/>
              </div>
            </div>  
          </div>

          <div class="form-group">
            <div class="row">   
              <label class="col-sm-4 control-label" for="inputEmail"><?php echo e(trans('admin.email')); ?></label>
              <div class="col-sm-8">
                <input type="text" class="form-control" id="inputEmail" name="inputEmail" value="<?php echo e($user_details->user_email); ?>" placeholder="<?php echo e(trans('admin.email')); ?>"/>
              </div>
            </div>  
          </div>

          <div class="form-group">
            <div class="row">  
              <label class="col-sm-4 control-label" for="inputNewPassword"><?php echo e(trans('admin.new_password')); ?></label>
              <div class="col-sm-8">
                <input type="password" class="form-control" id="inputNewPassword" name="inputNewPassword" placeholder="<?php echo e(trans('admin.new_password')); ?>"/>
              </div>
            </div>  
          </div>

          <div class="form-group">
            <div class="row">  
              <label class="col-sm-4 control-label" for="inputStoreName"><?php echo e(trans('admin.vendors_table_header_shop_name')); ?></label>
              <div class="col-sm-8">
                <input type="text" class="form-control" id="inputStoreName" name="inputStoreName" value="<?php echo e($vendors_settings->profile_details->store_name); ?>" placeholder="<?php echo e(trans('admin.vendors_table_header_shop_name')); ?>"/>
              </div>
            </div>  
          </div>

          <div class="form-group">
            <div class="row">  
              <label class="col-sm-4 control-label" for="inputAddress1"><?php echo e(trans('admin.address_1')); ?></label>
              <div class="col-sm-8">
                <textarea class="form-control" name="inputAddress1" id="inputAddress1" placeholder="<?php echo e(trans('admin.address_1')); ?>"><?php echo $vendors_settings->profile_details->address_line_1; ?></textarea>
              </div>
            </div>  
          </div>
          
          <div class="form-group">
            <div class="row">  
              <label class="col-sm-4 control-label" for="inputAddress2"><?php echo e(trans('admin.address_2')); ?></label>
              <div class="col-sm-8">
                <textarea class="form-control" name="inputAddress2" id="inputAddress2" placeholder="<?php echo e(trans('admin.address_2')); ?>"><?php echo $vendors_settings->profile_details->address_line_2; ?></textarea>
              </div>
            </div>  
          </div>
          
          <div class="form-group">
            <div class="row">  
              <label class="col-sm-4 control-label" for="inputCity"><?php echo e(trans('admin.city')); ?></label>
              <div class="col-sm-8">
                <input type="text" class="form-control" id="inputCity" name="inputCity" value="<?php echo e($vendors_settings->profile_details->city); ?>" placeholder="<?php echo e(trans('admin.city')); ?>"/>
              </div>
            </div>  
          </div>  
          
          <div class="form-group">
            <div class="row">  
              <label class="col-sm-4 control-label" for="inputState"><?php echo e(trans('admin.vendor_state_label')); ?></label>
              <div class="col-sm-8">
                <input type="text" class="form-control" id="inputState" name="inputState" value="<?php echo e($vendors_settings->profile_details->state); ?>" placeholder="<?php echo e(trans('admin.vendor_state_label')); ?>"/>
              </div>
            </div>  
          </div>
            
          <div class="form-group">
            <div class="row">  
              <label class="col-sm-4 control-label" for="inputCountry"><?php echo e(trans('admin.country')); ?></label>
              <div class="col-sm-8">
                <input type="text" class="form-control" id="inputCountry" name="inputCountry" value="<?php echo e($vendors_settings->profile_details->country); ?>" placeholder="<?php echo e(trans('admin.country')); ?>"/>
              </div>
            </div>  
          </div> 
          
          <div class="form-group">
            <div class="row">  
              <label class="col-sm-4 control-label" for="inputZipPostalCode"><?php echo e(trans('admin.vendor_zip_postal_label')); ?></label>
              <div class="col-sm-8">
                <input type="number" class="form-control" id="inputZipPostalCode" name="inputZipPostalCode" value="<?php echo e($vendors_settings->profile_details->zip_postal_code); ?>" placeholder="<?php echo e(trans('admin.vendor_zip_postal_label')); ?>"/>
              </div>
            </div>  
          </div>   
            
          <div class="form-group">
            <div class="row">  
              <label class="col-sm-4 control-label" for="inputPhoneNumber"><?php echo e(trans('admin.vendors_table_header_phone_number')); ?></label>
              <div class="col-sm-8">
                <input type="number" class="form-control" id="inputPhoneNumber" name="inputPhoneNumber" value="<?php echo e($vendors_settings->profile_details->phone); ?>" placeholder="<?php echo e(trans('admin.vendors_table_header_phone_number')); ?>"/>
              </div>
            </div>  
          </div> 
            
          <div class="form-group">
            <div class="row">  
              <div class="col-sm-4">
                <label class="control-label" for="inputProfilePicture"><?php echo e(trans('admin.profile_picture')); ?></label>
              </div>
              <div class="col-sm-8 profile-picture-content">
                 <?php if(!empty($user_details->user_photo_url)): ?>
                  <div class="profile-picture">
                    <div class="img-div"><img src="<?php echo e(get_image_url($user_details->user_photo_url)); ?>" class="user-image" alt=""/></div><br>
                    <div class="btn-div"><button type="button" class="btn btn-default btn-sm remove-profile-picture"><?php echo e(trans('admin.remove_image')); ?></button></div>
                  </div>
                  <div class="no-profile-picture" style="display:none;">
                    <div class="img-div"><img src="<?php echo e(default_upload_sample_img_src()); ?>" class="user-image" alt=""/></div><br>
                    <div class="btn-div"><button data-toggle="modal" data-target="#uploadprofilepicture" type="button" class="btn btn-default btn-sm profile-picture-uploader"><?php echo e(trans('admin.upload_image')); ?></button></div>
                  </div>
                 <?php else: ?>
                 <div class="profile-picture" style="display:none;">
                    <div class="img-div"><img src="" class="user-image" alt=""/></div><br>
                    <div class="btn-div"><button type="button" class="btn btn-default btn-sm remove-profile-picture"><?php echo e(trans('admin.remove_image')); ?></button></div>
                  </div>
                 <div class="no-profile-picture">
                    <div class="img-div"><img src="<?php echo e(default_upload_sample_img_src()); ?>" class="user-image" alt=""/></div><br>
                    <div class="btn-div"><button data-toggle="modal" data-target="#uploadprofilepicture" type="button" class="btn btn-default btn-sm profile-picture-uploader"><?php echo e(trans('admin.upload_image')); ?></button></div>
                 </div>
                 <?php endif; ?>
              </div>
            </div>    
          </div>
        </div>
      </div>
    </div>
  </div>
</div>    
<div class="modal fade" id="uploadprofilepicture" tabindex="-1" role="dialog" aria-labelledby="updater" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <p class="no-margin"><?php echo trans('admin.you_can_upload_1_image'); ?></p>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>    
      <div class="modal-body">             
        <div class="uploadform dropzone no-margin dz-clickable profile-picture-uploader" id="profile-picture-uploader" name="profile-picture-uploader">
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
<input type="hidden" name="hf_profile_picture" id="hf_profile_picture" value="<?php echo e($user_details->user_photo_url); ?>">
<input type="hidden" name="hf_update_vendor_profile" id="hf_update_vendor_profile" value="update_vendor_profile">
<?php $__env->stopSection(); ?>