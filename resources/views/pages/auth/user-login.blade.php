@extends('layouts.frontend.master')
@section('title', trans('frontend.frontend_user_login_title') .' - '. get_site_title())
@section('content')

<!-- Page Content-->
<div class="container padding-bottom-3x mb-2">
    <div class="row">
      <div class="col-md-6">
        
        @include('pages-message.notify-msg-error')
        @include('pages-message.form-submit')

        <form class="login-box" method="post" action="" enctype="multipart/form-data">
          <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">

          <div class="row margin-bottom-1x">
            <div class="col-xl-4 col-md-6 col-sm-4"><a class="btn btn-sm btn-block facebook-btn" href="#"><i class="socicon-facebook"></i>&nbsp;Facebook login</a></div>
            <div class="col-xl-4 col-md-6 col-sm-4"><a class="btn btn-sm btn-block twitter-btn" href="#"><i class="socicon-twitter"></i>&nbsp;Twitter login</a></div>
            <div class="col-xl-4 col-md-6 col-sm-4"><a class="btn btn-sm btn-block google-btn" href="#"><i class="socicon-googleplus"></i>&nbsp;Google+ login</a></div>
          </div>
          <h4 class="margin-bottom-1x">Or using form below</h4>

          <div class="form-group input-group">
            <input name="login_username" id="login_username" tabindex="1" class="form-control" placeholder="{{ trans('frontend.frontend_username_placeholder') }}" value="{{ $frontend_login_data['user'] }}" type="text">
            <span class="input-group-addon"><i class="icon-mail"></i></span>
          </div>
          <div class="form-group input-group">
            <input name="login_password" id="login_password" tabindex="2" class="form-control" placeholder="{{ trans('frontend.password') }}" type="password" value="{{ $frontend_login_data['pass'] }}">
            <span class="input-group-addon"><i class="icon-lock"></i></span>
          </div>

          @if($frontend_login_data['is_enable_recaptcha'] == true)
            <div class="form-group">
              <div class="captcha-style">{!! app('captcha')->display(); !!}</div>
            </div>
          @endif

          <div class="d-flex flex-wrap justify-content-between padding-bottom-1x">
            <div class="custom-control custom-checkbox">
              @if (Cookie::has('frontend_remember_me_data'))
                <input class="custom-control-input" type="checkbox" id="remember_me" checked>
                <label class="custom-control-label" for="remember_me">Remember me</label>
              @else
                <input class="custom-control-input" type="checkbox" id="remember_me">
                <label class="custom-control-label" for="remember_me">Remember me</label>
              @endif
            </div>
            <a class="navi-link" href="{{ route('user-forgot-password-page') }}">{{ trans('frontend.forgot_password') }}</a>&nbsp;&nbsp;&nbsp;&nbsp;
          </div>

          <div class="text-center text-sm-right">
            <input name="login_submit" id="login_submit" tabindex="4" class="form-control btn btn-secondary" value="{{ trans('frontend.frontend_log_in') }}" type="submit">

            {{-- <button class="btn btn-primary margin-bottom-none" type="submit">Login</button> --}}
          </div>
        </form>
      </div>
      <div class="col-md-6">
        <div class="padding-top-3x hidden-md-up"></div>
        <h3 class="margin-bottom-1x">No Account? Register</h3>
        <p>Registration takes less than a minute but gives you full control over your orders.</p>
        <form class="row" method="post">
          <div class="col-sm-6">
            <div class="form-group">
              <label for="reg-fn">First Name</label>
              <input class="form-control" type="text" id="reg-fn" required>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="form-group">
              <label for="reg-ln">Last Name</label>
              <input class="form-control" type="text" id="reg-ln" required>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="form-group">
              <label for="reg-email">E-mail Address</label>
              <input class="form-control" type="email" id="reg-email" required>
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
              <label for="reg-pass">Password</label>
              <input class="form-control" type="password" id="reg-pass" required>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="form-group">
              <label for="reg-pass-confirm">Confirm Password</label>
              <input class="form-control" type="password" id="reg-pass-confirm" required>
            </div>
          </div>
          <div class="col-12 text-center text-sm-right">
            <button class="btn btn-primary margin-bottom-none" type="submit">Register</button>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection