@include('pages-message.notify-msg-success')
@include('pages-message.form-submit')
@include('pages-message.notify-msg-error')
      
<form class="row" method="post" action="" enctype="multipart/form-data">
  <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">

  <div class="col-md-6">
    <div class="form-group">
      <label for="display_name">{{ ucfirst( trans('frontend.display_name') ) }}</label>
      <input type="text" placeholder="{{ trans('frontend.display_name') }}" class="form-control" value="{{ $user_details['user_display_name'] }}" id="display_name" name="display_name">
    </div>
  </div>
  <div class="col-md-6">
    <div class="form-group">
      <label for="user_name">{{ trans('frontend.user_name') }}</label>
      <input type="text" placeholder="{{ trans('frontend.user_name') }}" class="form-control" value="{{ $user_details['user_name'] }}" id="user_name" name="user_name">
    </div>
  </div>
  <div class="col-md-6">
    <div class="form-group">

        <label for="email_id">{{ trans('frontend.email') }}</label>
        <input type="text" placeholder="{{ trans('frontend.email') }}" class="form-control" value="{{ $user_details['user_email'] }}" id="email_id" name="email_id" readonly>

    </div>
  </div>
  <div class="col-md-6">
    <div class="form-group">

      <label for="password">{{ trans('frontend.new_password') }}</label>
      <input type="password" placeholder="{{ trans('frontend.new_password') }}" class="form-control" value="" id="password" name="password">
    </div>
  </div>
  <div class="col-8 offset-2">
    <div class="form-group profile-picture">

      @if($user_details['user_photo_url'])
        <img class="d-block mx-auto img-thumbnail rounded-circle mb-3" src="{{ get_image_url($user_details['user_photo_url']) }}" alt="Image" style="width:50%">
        <div class="text-center">
          <button type="button" class="btn btn-secondary remove-frontend-profile-picture">{{ trans('frontend.remove_image') }}</button>
        </div>
      @else
        <img class="d-block mx-auto img-thumbnail rounded-circle mb-3" src="{{ default_avatar_img_src() }}" alt="Image" style="width:50%">
        <div class="text-center">
          <button data-toggle="modal" data-target="#frontendUserUploadProfilePicture" type="button" class="btn btn-warning btn-sm profile-picture-uploader">{{ trans('frontend.upload_image') }}</button>
        </div>
      @endif
    </div>
  </div>

  <div class="col-12">
    <hr class="mt-2 mb-3">
    <div class="text-right">
      {{-- <div class="custom-control custom-checkbox d-block">
        <input class="custom-control-input" type="checkbox" id="subscribe_me" checked>
        <label class="custom-control-label" for="subscribe_me">{{ trans('frontend.subscribe_to_our_newsletter') }}</label>
      </div> --}}

      <button type="submit" class="btn btn-primary margin-right-none">{{ trans('frontend.update_profile') }}</button>

    </div>
  </div>

</form>

<!-- Default Modal-->
<div class="modal fade" id="frontendUserUploadProfilePicture" tabindex="-1" role="dialog" aria-labelledby="userUploadProfilePicture" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title">{{ trans('frontend.you_can_upload_1_image') }}</h6>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
        <div class="uploadform dropzone no-margin dz-clickable frontend-user-profile-picture-uploader" id="frontend_user_profile_picture_uploader" name="frontend_user_profile_picture_uploader">
          <div class="dz-default dz-message">
            <span>{{ trans('frontend.drop_your_cover_picture_here') }}</span>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-secondary btn-sm attachtopost" data-dismiss="modal">{{ trans('frontend.close') }}</button>
      </div>
    </div>
  </div>
</div>
<input type="hidden" name="hf_frontend_profile_picture" id="hf_frontend_profile_picture" value="">
