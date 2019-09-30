@extends('layouts.frontend.master')
@section('title', trans('frontend.frontend_user_login_title') .' - '. get_site_title())
@section('content')

<div class="container custom-extra-top-style">  
  <div class="row justify-content-center">
    <div class="col-md-6 text-center">
      <div class="panel panel-login">
        <div class="panel-heading">
          <div class="row justify-content-center">
            <div class="col-xs-12 text-center">
              <h3>{{ trans('frontend.frontend_user_login') }}</h3>
            </div>
          </div>
          <hr>
        </div>
        <div class="panel-body">
          @include('pages-message.notify-msg-error')
          @include('pages-message.form-submit')

          <form method="post" action="" enctype="multipart/form-data">
            <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">

            <div class="form-group has-feedback">
              <input name="login_username" id="login_username" tabindex="1" class="form-control" placeholder="{{ trans('frontend.frontend_username_placeholder') }}" value="{{ $frontend_login_data['user'] }}" type="text">
              <span class="fa fa-user form-control-feedback"></span>
            </div>

            <div class="form-group has-feedback">
              <input name="login_password" id="login_password" tabindex="2" class="form-control" placeholder="{{ trans('frontend.password') }}" type="password" value="{{ $frontend_login_data['pass'] }}">
              <span class="fa fa-lock form-control-feedback"></span>
            </div>

            @if($frontend_login_data['is_enable_recaptcha'] == true)
            <div class="form-group">
              <div class="captcha-style">{!! app('captcha')->display(); !!}</div>
            </div>
            @endif

            <div class="form-group text-center">
              @if (Cookie::has('frontend_remember_me_data'))
              <input tabindex="3" class="shopist-iCheck" name="login_remember_me" id="login_remember_me" type="checkbox" checked>
              <label for="remember"> {{ trans('frontend.remember_me') }}</label>
              @else
              <input tabindex="3" class="shopist-iCheck" name="login_remember_me" id="login_remember_me" type="checkbox">
              <label for="remember"> {{ trans('frontend.remember_me') }}</label>
              @endif  
            </div>

            <div class="form-group">
              <div class="row justify-content-center">
                <div class="col-sm-6 text-center">
                  <input name="login_submit" id="login_submit" tabindex="4" class="form-control btn btn-secondary" value="{{ trans('frontend.frontend_log_in') }}" type="submit">
                </div>
              </div>
            </div>

            <div class="form-group">
              <div class="row">
                <div class="col-lg-12">
                  <div class="text-center">
                    <a href="{{ route('user-forgot-password-page') }}" tabindex="5" class="forgot-password">{{ trans('frontend.forgot_password') }}</a>&nbsp;&nbsp;&nbsp;&nbsp;
                    @if($settings_data['general_options']['allow_registration_for_frontend'])
                    <a href="{{ route('user-registration-page') }}" tabindex="5" class="register-new-user">{{ trans('frontend.register_as_a_new_user') }}</a>
                    @endif
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>

        <form class="login-box" method="post">
            <div class="row margin-bottom-1x">
              <div class="col-xl-4 col-md-6 col-sm-4"><a class="btn btn-sm btn-block facebook-btn" href="#"><i class="socicon-facebook"></i>&nbsp;Facebook login</a></div>
              <div class="col-xl-4 col-md-6 col-sm-4"><a class="btn btn-sm btn-block twitter-btn" href="#"><i class="socicon-twitter"></i>&nbsp;Twitter login</a></div>
              <div class="col-xl-4 col-md-6 col-sm-4"><a class="btn btn-sm btn-block google-btn" href="#"><i class="socicon-googleplus"></i>&nbsp;Google+ login</a></div>
            </div>
            <h4 class="margin-bottom-1x">Or using form below</h4>
            <div class="form-group input-group">
              <input class="form-control" type="email" placeholder="Email" required><span class="input-group-addon"><i class="icon-mail"></i></span>
            </div>
            <div class="form-group input-group">
              <input class="form-control" type="password" placeholder="Password" required><span class="input-group-addon"><i class="icon-lock"></i></span>
            </div>
            <div class="d-flex flex-wrap justify-content-between padding-bottom-1x">
              <div class="custom-control custom-checkbox">
                <input class="custom-control-input" type="checkbox" id="remember_me" checked>
                <label class="custom-control-label" for="remember_me">Remember me</label>
              </div><a class="navi-link" href="account-password-recovery.html">Forgot password?</a>
            </div>
            <div class="text-center text-sm-right">
              <button class="btn btn-primary margin-bottom-none" type="submit">Login</button>
            </div>
          </form>
          
      </div>
    </div>
  </div>
</div>  
@endsection