@extends('layouts.frontend.master')

@section('title', trans('frontend.frontend_vendor_registration_title') .' - '. get_site_title())

@section('breadcrumbs',trans('frontend.frontend_vendor_registration_title'))

@section('content')
<!-- Page Content-->
<div class="container padding-bottom-3x mb-2">
  <div class="row">
    
    <div class="col-md-12 login-box">

      @include('pages-message.notify-msg-error')
      @include('pages-message.form-submit')
      @include('pages-message.notify-msg-success')
      
      <div class="padding-top-3x hidden-md-up"></div>
      <h3 class="margin-bottom-1x">{!! trans('frontend.please_sign_up_label') !!}</h3>
      <p>{!! trans('frontend.sign_up_free_label') !!}</p>

      <form method="post" action="" enctype="multipart/form-data">
        <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
        
        <div class="row">
          <div class="col-xs-12 col-sm-6 col-md-6">
            <div class="form-group has-feedback">
              <label for="reg-fn">Tên hiển thị</label>

              <input type="text" placeholder="{{ trans('frontend.display_name') }}" class="form-control" value="{{ old('vendor_reg_display_name') }}" id="vendor_reg_display_name" name="vendor_reg_display_name">
              <span class="fa fa-user form-control-feedback"></span>
            </div>
          </div>
          <div class="col-xs-12 col-sm-6 col-md-6">
            <div class="form-group has-feedback">
              <label for="reg-fn">Tên người dùng</label>

              <input type="text" placeholder="{{ trans('frontend.user_name') }}" class="form-control" value="{{ old('vendor_reg_name') }}" id="vendor_reg_name" name="vendor_reg_name">
              <span class="fa fa-user form-control-feedback"></span>
            </div>
          </div>
        </div>

        <div class="form-group has-feedback">
          <label for="reg-fn">Tên gian hàng</label>

          <input type="text" placeholder="{{ trans('frontend.store_name_label') }}" class="form-control" id="vendor_reg_store_name" name="vendor_reg_store_name" value="{{ old('vendor_reg_store_name') }}">
          <span class="fa fa-home form-control-feedback"></span>
        </div>

        <div class="row">
          <div class="col-xs-12 col-sm-6 col-md-6">
        
            <div class="form-group has-feedback">
              <label for="reg-fn">Địa chỉ e-mail</label>

              <input type="email" placeholder="{{ ucfirst( trans('frontend.email') ) }}" class="form-control" id="vendor_reg_email_id" value="{{ old('vendor_reg_email_id') }}" name="vendor_reg_email_id">
              <span class="fa fa-envelope form-control-feedback"></span>
            </div>
          </div>

          <div class="col-xs-12 col-sm-6 col-md-6">

            <div class="form-group has-feedback">
              <label for="reg-fn">Số điện thoại</label>

              <input type="number" placeholder="{{ ucfirst(trans('frontend.phone')) }}" class="form-control" id="vendor_reg_phone_number" name="vendor_reg_phone_number" value="{{ old('vendor_reg_phone_number') }}" min="0">
            </div>

          </div>

        </div>

        <div class="form-group has-feedback">
          <label for="reg-fn">Địa chỉ</label>

          <textarea id="vendor_reg_address_line_1" placeholder="{{ trans('frontend.address_line_1') }}" class="form-control" name="vendor_reg_address_line_1">{!! old('vendor_reg_address_line_1') !!}</textarea>
        </div>

        <div class="row">
          
          <div class="col-xs-12 col-sm-6 col-md-6">
            <div class="form-group has-feedback">
              <label for="reg-fn">Huyện / Thị / Thành</label>

              <input type="text" placeholder="{{ trans('frontend.country') }}" class="form-control" value="{{ old('vendor_reg_country') }}" id="vendor_reg_country" name="vendor_reg_country">
              <span class="fa fa-text-width form-control-feedback"></span>
            </div>
          </div>

          <div class="col-xs-12 col-sm-6 col-md-6">
            <div class="form-group has-feedback">
              <label for="reg-fn">Phường / Xã</label>

              <input type="text" placeholder="{{ trans('frontend.city') }}" class="form-control" value="{{ old('vendor_reg_city') }}" id="vendor_reg_city" name="vendor_reg_city">
              <span class="fa fa-text-width form-control-feedback"></span>
            </div>
          </div>
        </div>
								
        <div class="row">
          <div class="col-xs-12 col-sm-6 col-md-6">
            <div class="form-group has-feedback">
            <label for="reg-fn">Mật khẩu</label>

              <input type="password" placeholder="{{ ucfirst(trans('frontend.password')) }}" class="form-control" id="vendor_reg_password" name="vendor_reg_password">
              <span class="fa fa-lock form-control-feedback"></span>
            </div>
          </div>
          <div class="col-xs-12 col-sm-6 col-md-6">
            <div class="form-group has-feedback">
            <label for="reg-fn">Nhập lại mật khẩu</label>

              <input type="password" placeholder="{{ trans('frontend.retype_password') }}" class="form-control" id="vendor_reg_password_confirmation" name="vendor_reg_password_confirmation">
              <span class="fa fa-lock form-control-feedback"></span>
            </div>
          </div>
        </div>

        <div class="form-group has-feedback">
          <label for="reg-fn">Khoá bí mật</label>

          <input type="text" placeholder="{{ ucfirst(trans('frontend.secret_key')) }}" class="form-control" id="vendor_reg_secret_key" name="vendor_reg_secret_key">
          <span class="fa fa-lock form-control-feedback"></span>
        </div>
        
        @if(!empty($is_enable_recaptcha) && $is_enable_recaptcha == true)
        <div class="form-group">
          <div class="captcha-style">{!! app('captcha')->display(); !!}</div>
        </div>
        @endif
        
        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-12">
            <span class="button-checkbox t-and-c-button-checkbox">
              <input type="checkbox" name="t_and_c" id="t_and_c" class="shopist-iCheck" value="1"> &nbsp;
              <a href="#" data-toggle="modal" data-target="#t_and_c_m"> {!! trans('frontend.t_and_c_label') !!} </a>
            </span>
          </div>
        </div>

        <br>
        
        <div class="row">
          <div class="col-xs-12 col-md-6"><input name="vendor_reg_submit" id="vendor_reg_submit" class="btn btn-secondary btn-block btn-md" value="{{ trans('frontend.vendor_registration') }}" type="submit"> </div>
          <div class="col-xs-12 col-md-6"><a target="_blank" href="{{ route('admin.login') }}" class="btn btn-secondary btn-block btn-md vendor-reg-log-in-text">{{ trans('frontend.signin_account_label') }}</a></div>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection  