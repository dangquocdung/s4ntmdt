@extends('layouts.frontend.master')
@section('title', trans('frontend.frontend_user_forgot_password') .' - '. get_site_title())

@section('content')

<!-- Page Title-->
<div class="page-title">
  <div class="container">
    <div class="column">
      <h1>{{ trans('frontend.forgot_password') }}</h1>
    </div>
    <div class="column">
      <ul class="breadcrumbs">
        <li>
          <a href="{{ route('home-page') }}">{{ trans('frontend.home') }}</a>
        </li>
        <li class="separator">&nbsp;</li>
        <li>{{ trans('frontend.forgot_password') }}</li>
      </ul>
    </div>
  </div>
</div>

<!-- Page Content-->
<!-- Page Content-->
<div class="container custom-extra-top-style padding-bottom-2x">


  <div class="row justify-content-center">
    <div class="col-xs-12 col-sm-8 col-md-6 text-center">

      @include('pages-message.notify-msg-error')
      @include('pages-message.form-submit')

      <form class="card margin-top-1x" method="post" action="" enctype="multipart/form-data">
        <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
      
        <div class="card-body">
          <div class="form-group input-group">
            <input type="email" placeholder="{{ ucfirst( trans('frontend.email') ) }}" class="form-control" id="user_forgot_pass_email_id" name="user_forgot_pass_email_id">
            <span class="input-group-addon"><i class="icon-mail"></i></span>
          </div>
          <div class="form-group input-group">
            <input type="password" placeholder="{{ ucfirst(trans('frontend.enter_new_password')) }}" class="form-control" id="user_forgot_new_password" name="user_forgot_new_password">
            <span class="input-group-addon"><i class="icon-lock"></i></span>
          </div>

          <div class="form-group input-group">
            <input type="text" placeholder="{{ ucfirst(trans('frontend.secret_key')) }}" class="form-control" id="user_forgot_secret_key" name="user_forgot_secret_key">
            <span class="input-group-addon"><i class="icon-lock"></i></span>
          </div>

          <div class="text-center text-sm-right">
            <button class="btn btn-primary margin-bottom-none" type="submit" name="user_forgot_pass_submit" id="user_forgot_pass_submit" tabindex="4">{{ trans('frontend.reset_my_password') }}</button>
          </div>
        </div>
      </form>
    </div>

    
    
  </div>
</div>

@endsection  