<form class="row" method="post" action="" enctype="multipart/form-data">
  <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">

  @include('pages-message.notify-msg-success')
  @include('pages-message.form-submit')
  @include('pages-message.notify-msg-error')

  <div class="col-md-6">
    <div class="form-group">
      <label for="display_name">{{ ucfirst( trans('admin.display_name') ) }}</label>
      <input type="text" placeholder="{{ trans('admin.display_name') }}" class="form-control" value="{{ $user_details['user_display_name'] }}" id="display_name" name="display_name">
    </div>
  </div>
  <div class="col-md-6">
    <div class="form-group">
      <label for="user_name">{{ trans('admin.user_name') }}</label>
      <input type="text" placeholder="{{ trans('admin.user_name') }}" class="form-control" value="{{ $user_details['user_name'] }}" id="user_name" name="user_name">
    </div>
  </div>
  <div class="col-md-6">
    <div class="form-group">

        <label for="email_id">{{ trans('admin.email') }}</label>
        <input type="text" placeholder="{{ trans('admin.email') }}" class="form-control" value="{{ $user_details['user_email'] }}" id="email_id" name="email_id" disabled>

    </div>
  </div>
  <div class="col-md-6">
    <div class="form-group">

      <label for="password">{{ trans('admin.new_password') }}</label>
      <input type="password" placeholder="{{ trans('admin.new_password') }}" class="form-control" value="" id="password" name="password">
    </div>
  </div>
  <div class="col-md-6">
    <div class="form-group">

      @if($user_details['user_photo_url'])
        <img class="d-block mx-auto img-thumbnail rounded-circle mb-3" src="{{ get_image_url($user_details['user_photo_url']) }}" alt="Image" style="width:50%">
        <div class="text-center">
          <button type="button" class="btn btn-secondary remove-frontend-profile-picture">{{ trans('admin.remove_image') }}</button>
        </div>
      @else
        <img class="d-block mx-auto img-thumbnail rounded-circle mb-3" src="{{ default_avatar_img_src() }}" alt="Image" style="width:50%">
        <div class="text-center">
          <button data-toggle="modal" data-target="#frontendUserUploadProfilePicture" type="button" class="btn btn-secondary profile-picture-uploader">{{ trans('admin.upload_image') }}</button>
        </div>
      @endif
    </div>
  </div>

  <div class="col-12">
    <hr class="mt-2 mb-3">
    <div class="d-flex flex-wrap justify-content-between align-items-center">
      <div class="custom-control custom-checkbox d-block">
        <input class="custom-control-input" type="checkbox" id="subscribe_me" checked>
        <label class="custom-control-label" for="subscribe_me">Subscribe me to Newsletter</label>
      </div>

      <button type="submit" class="btn btn-primary margin-right-none" data-toast data-toast-position="topRight" data-toast-type="success" data-toast-icon="icon-check-circle" data-toast-title="Success!" data-toast-message="Your profile updated successfuly.">{{ trans('frontend.update_profile') }}</button>

    </div>
  </div>
</form>

<!-- Default Modal-->
<div class="modal fade" id="frontendUserUploadProfilePicture" tabindex="-1" role="dialog" aria-labelledby="userUploadProfilePicture" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title">{{ trans('admin.you_can_upload_1_image') }}</h6>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
        <div class="uploadform dropzone no-margin dz-clickable frontend-user-profile-picture-uploader" id="frontend_user_profile_picture_uploader" name="frontend_user_profile_picture_uploader">
          <div class="dz-default dz-message">
            <span>{{ trans('admin.drop_your_cover_picture_here') }}</span>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-secondary btn-sm attachtopost" data-dismiss="modal">{{ trans('admin.close') }}</button>
      </div>
    </div>
  </div>
</div>
<input type="hidden" name="hf_frontend_profile_picture" id="hf_frontend_profile_picture" value="">

<script>
  //upload profile image
  if ($('#frontend_user_profile_picture_uploader').length > 0) {
      Dropzone.autoDiscover = false;
      $("#frontend_user_profile_picture_uploader").dropzone({
          url: $('#hf_base_url').val() + "/upload/product-related-image",
          paramName: "profile_picture",
          acceptedFiles: "image/*",
          uploadMultiple: false,
          maxFiles: 1,
          autoProcessQueue: true,
          parallelUploads: 100,
          addRemoveLinks: true,
          maxFilesize: 1,
          dataType: 'json',
          headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },

          init: function() {
              this.on("maxfilesexceeded", function(file) {
                  swal("", frontendLocalizationString.maxfilesexceeded_msg);
              });
              this.on("error", function(file, message) {
                  if (file.size > 1 * 1024 * 1024) {
                      swal("", frontendLocalizationString.file_larger);
                      this.removeFile(file)
                      return false;
                  }
                  if (!file.type.match('image.*')) {
                      swal("", frontendLocalizationString.image_file_validation);
                      this.removeFile(file)
                      return false;
                  }
              });

              this.on("success", function(file, responseText) {
                  if (responseText.status === 'success') {
                      $('.profile-picture').find('img').attr('src', $('#hf_base_url').val() + '/uploads/' + responseText.name);
                      $('.profile-picture').show();
                      $('.no-profile-picture').hide();
                      $('#frontendUserUploadProfilePicture').modal('hide');
                      $('#hf_frontend_profile_picture').val('/uploads/' + responseText.name);

                      this.removeAllFiles();
                  }
              });
          }
      });
  }

  if ($('.remove-frontend-profile-picture').length > 0) {
      $('.remove-frontend-profile-picture').on('click', function() {
          $('.no-profile-picture').show();
          $('.profile-picture').hide();
          $('#hf_frontend_profile_picture').val('');
      });
  }
    
</script>