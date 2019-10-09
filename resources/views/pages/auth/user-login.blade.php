@extends('layouts.frontend.master')
@section('title', trans('frontend.frontend_user_login_title') .' - '. get_site_title())

@section('content')

<!-- Page Title-->
<div class="page-title">
  <div class="container">
    <div class="column">
      <h1>{{ trans('frontend.frontend_user_login_title') }}</h1>
    </div>
    <div class="column">
      <ul class="breadcrumbs">
        <li>
          <a href="{{ route('home-page') }}">{{ trans('frontend.home') }}</a>
        </li>
        <li class="separator">&nbsp;</li>
        <li>{{ trans('frontend.frontend_user_login_title') }}</li>
      </ul>
    </div>
  </div>
</div>

<!-- Page Content-->
<div class="container padding-bottom-3x mb-2" >
    <div class="row">
      <div class="col-md-6 col-sm-12" id="login-page">
        
        @include('pages-message.notify-msg-error')
        @include('pages-message.form-submit')

        <form class="login-box" method="post" action="" enctype="multipart/form-data">
          <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">


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
                <label class="custom-control-label" for="remember_me">{{ trans('frontend.remember_me') }}</label>
              @else
                <input class="custom-control-input" type="checkbox" id="remember_me">
                <label class="custom-control-label" for="remember_me">{{ trans('frontend.remember_me') }}</label>
              @endif
            </div>
            <a class="navi-link" href="{{ route('user-registration-page') }}">{{ trans('frontend.frontend_user_registration_title') }}</a>

            <!-- <a class="navi-link" href="{{ route('user-forgot-password-page') }}">{{ trans('frontend.forgot_password') }}</a>&nbsp;&nbsp;&nbsp;&nbsp; -->
          </div>

          <h6 class="margin-bottom-1x">Hoặc dùng tài khoản mạng xã hội:</h6>


          <div class="row margin-bottom-1x">
            <div class="col-sm-4"><a class="btn btn-sm btn-block facebook-btn" href="#"><i class="socicon-facebook"></i>&nbsp;Dùng Facebook</a></div>
            <div class="col-sm-4"><a class="btn btn-sm btn-block twitter-btn" href="#"><i class="socicon-twitter"></i>&nbsp;Dùng Twitter</a></div>
            <div class="col-sm-4"><a class="btn btn-sm btn-block google-btn" href="#"><i class="socicon-googleplus"></i>&nbsp;Dùng Google+</a></div>
          </div>
  
  
  
  

          <div class="text-center text-sm-right">
            <!-- <input name="login_submit" id="login_submit" tabindex="4" class="form-control btn btn-secondary" value="{{ trans('frontend.frontend_log_in') }}" type="submit"> -->

            <button class="btn btn-primary margin-bottom-none" type="submit" name="login_submit" id="login_submit" tabindex="4">{{ trans('frontend.frontend_log_in') }}</button>

          </div>
        </form>
      </div>
      
    </div>
  </div>

@endsection