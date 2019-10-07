@extends('layouts.frontend.master')
@section('title', trans('frontend.frontend_user_registration_title') .' - '. get_site_title())

@section('content')

<!-- Page Title-->
<div class="page-title">
  <div class="container">
    <div class="column">
      <h1>{{ trans('frontend.frontend_user_registration_title') }}</h1>
    </div>
    <div class="column">
      <ul class="breadcrumbs">
        <li>
          <a href="{{ route('home-page') }}">{{ trans('frontend.home') }}</a>
        </li>
        <li class="separator">&nbsp;</li>
        <li>{{ trans('frontend.frontend_user_registration_title') }}</li>
      </ul>
    </div>
  </div>
</div>

<!-- Page Content-->

@if($settings_data['general_options']['allow_registration_for_frontend'])
<div id="user_registration" class="container custom-extra-top-style padding-bottom-2x">
  <div class="row justify-content-center">
    <div class="col-xs-12 col-sm-8 col-md-6 text-center">
      @include('pages-message.notify-msg-error')
      @include('pages-message.form-submit')    

      <form method="post" action="" enctype="multipart/form-data">
        <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">

        <div class="row">
          <div class="col-sm-6">
            <div class="form-group">
              <label for="reg-fn">{{ trans('frontend.display_name') }}</label>
              <input type="text" placeholder="{{ trans('frontend.display_name') }}" class="form-control" value="{{ old('user_reg_display_name') }}" id="user_reg_display_name" name="user_reg_display_name">

            </div>
          </div>
          <div class="col-sm-6">
            <div class="form-group">
              <label for="reg-ln">{{ trans('frontend.user_name') }}</label>
              <input type="text" placeholder="{{ trans('frontend.user_name') }}" class="form-control" value="{{ old('user_reg_name') }}" id="user_reg_name" name="user_reg_name">
            </div>
          </div>
          <div class="col-sm-6">
            <div class="form-group">
              <label for="reg-email">{{ ucfirst( trans('frontend.email') ) }}</label>
              <input type="email" placeholder="{{ ucfirst( trans('frontend.email') ) }}" class="form-control" id="reg_email_id" value="{{ old('reg_email_id') }}" name="reg_email_id">
            </div>
          </div>
          <div class="col-sm-6">
            <div class="form-group">
              <label for="reg-phone">Phone Number</label>
              <input class="form-control" type="text" id="reg-phone" required>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="form-group">
              <label for="reg-pass">{{ ucfirst(trans('frontend.password')) }}</label>
              <input type="password" placeholder="{{ ucfirst(trans('frontend.password')) }}" class="form-control" id="reg_password" name="reg_password">
            </div>
          </div>
          <div class="col-sm-6">
            <div class="form-group">
              <label for="reg-pass-confirm">{{ trans('frontend.retype_password') }}</label>
              <input type="password" placeholder="{{ trans('frontend.retype_password') }}" class="form-control" id="reg_password_confirmation" name="reg_password_confirmation">
            </div>
          </div>
          <div class="col-sm-12">
            <div class="form-group">
              <label for="reg-pass-confirm">{{ ucfirst(trans('frontend.secret_key')) }}</label>
              <input type="text" placeholder="{{ ucfirst(trans('frontend.secret_key')) }}" class="form-control" id="reg_secret_key" name="reg_secret_key">
            </div>
          </div>

          @if(!empty($is_enable_recaptcha) && $is_enable_recaptcha == true)

            <div class="col-sm-12">
              <div class="form-group">
                <div class="captcha-style">{!! app('captcha')->display(); !!}</div>
              </div>
            </div>
          @endif

          <div class="col-12 text-center text-sm-right">
            <input name="user_reg_submit" id="user_reg_submit" class="btn btn-secondary btn-block btn-md" value="{{ trans('frontend.registration') }}" type="submit"> 
            <!-- <button class="btn btn-primary margin-bottom-none" type="submit">Register</button> -->
          </div>
        </div>

      </form>

    </div>
  </div>
</div>  
@else
<br>
<p>{{ trans('frontend.user_reg_not_available_label') }}</p>
@endif
@endsection  