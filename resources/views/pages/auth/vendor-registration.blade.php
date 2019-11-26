@extends('layouts.frontend.master')
@section('title', trans('frontend.frontend_vendor_registration_title') .' - '. get_site_title())

@section('content')

<!-- Page Title-->
<div class="page-title">
  <div class="container">
    <div class="column">
      <h1>{{ trans('frontend.frontend_vendor_registration_title') }}</h1>
    </div>
    <div class="column">
      <ul class="breadcrumbs">
        <li>
          <a href="{{ route('home-page') }}">{{ trans('frontend.home') }}</a>
        </li>
        <li class="separator">&nbsp;</li>
        <li>{{ trans('frontend.frontend_vendor_registration_title') }}</li>
      </ul>
    </div>
  </div>
</div>

<!-- Page Content-->
<div id="user_registration" class="container custom-extra-top-style padding-bottom-2x">
  <div class="row justify-content-center">
    <div class="col-xs-12 col-sm-8 col-md-6 text-center">

      @include('pages-message.notify-msg-error')
      @include('pages-message.form-submit')
      @include('pages-message.notify-msg-success')
      
      <div class="padding-top-1x hidden-md-up"></div>
      {{-- <h3 class="margin-bottom-1x">{!! trans('frontend.please_sign_up_label') !!}</h3>
      <p>{!! trans('frontend.sign_up_free_label') !!}</p> --}}

      <form method="post" action="" enctype="multipart/form-data" class="padding-top-1x">
        <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">

        <div class="row">
                
          <div class="col-md-12">
            <div class="form-group">
              <label for="reg-fn">Tên gian hàng</label>
              <input type="text" placeholder="{{ trans('frontend.store_name_label') }}" class="form-control" id="vendor_reg_store_name" name="vendor_reg_store_name" value="{{ old('vendor_reg_store_name') }}">
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group">
              <label for="reg-fn">Tên viết tắt</label>
              <input type="text" placeholder="{{ trans('frontend.display_name') }}" class="form-control" value="{{ old('vendor_reg_display_name') }}" id="vendor_reg_display_name" name="vendor_reg_display_name">
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group">
              <label for="reg-fn">Tên truy cập (đường dẫn)</label>
              <input type="text" placeholder="{{ trans('frontend.user_name') }}" class="form-control" value="{{ old('vendor_reg_name') }}" id="vendor_reg_name" name="vendor_reg_name">
            </div>
          </div>

          <div class="col-md-6">
        
            <div class="form-group">
              <label for="reg-fn">Địa chỉ e-mail</label>

              <input type="email" placeholder="{{ ucfirst( trans('frontend.email') ) }}" class="form-control" id="vendor_reg_email_id" value="{{ old('vendor_reg_email_id') }}" name="vendor_reg_email_id">
            </div>
            </div>

          <div class="col-md-6">

            <div class="form-group">
              <label for="reg-fn">Số điện thoại</label>
              <input type="number" placeholder="{{ ucfirst(trans('frontend.phone')) }}" class="form-control" id="vendor_reg_phone_number" name="vendor_reg_phone_number" value="{{ old('vendor_reg_phone_number') }}" min="0">
            </div>

          </div>

          <div class="col-md-12">
            <div class="form-group">
              <label for="reg-fn">Địa chỉ</label>
              <input type="text" id="vendor_reg_address_line_1" placeholder="{{ trans('frontend.address_line_1') }}" class="form-control" name="vendor_reg_address_line_1" value="{{  old('vendor_reg_address_line_1') }}">
            </div>
          </div>

          <div class="col-md-4">
            <div class="form-group">
              <label for="reg-fn">{{ trans('frontend.country') }}</label>
              <select class="form-control" id="vendor_country" name="vendor_reg_country">
                @foreach(get_country_list() as $val)
                  @if( $val['matp']=='42' || $val['matp']==old('vendor_reg_country') )
                    <option selected value="{{ $val['matp'] }}"> {!! $val['name'] !!}</option>
                  @else
                    <option value="{{ $val['matp'] }}"> {!! $val['name'] !!}</option>
                  @endif
                @endforeach
              </select>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="reg-fn">{{ trans('frontend.state') }}</label>
              <select class="form-control" id="vendor_state" name="vendor_reg_state">
                @foreach(get_quanhuyen_list(42) as $val)
                  @if (  $val['maqh']== '436' || $val['maqh']== old('vendor_reg_state') )
                    <option value="{{ $val['maqh'] }}" selected> {!! $val['name'] !!}</option>
                  @else
                    <option value="{{ $val['maqh'] }}"> {!! $val['name'] !!}</option>
                  @endif
                @endforeach
              </select>
            </div>
          </div>
          <div class="col-md-4">
              <div class="form-group">
                <label for="reg-fn">{{ trans('frontend.city') }}</label>
                <select class="form-control" id="vendor_city" name="vendor_reg_city">
                  @foreach(get_xaphuong_list(436) as $val)
                    @if (  $val['xaid']== '18070' || $val['xaid']==old('vendor_reg_city') )
                      <option value="{{ $val['xaid'] }}" selected> {!! $val['name'] !!}</option>
                    @else
                      <option value="{{ $val['xaid'] }}"> {!! $val['name'] !!}</option>
                    @endif
                  @endforeach
                </select>
  
              </div>
            </div>
  
          <div class="col-md-6">
            <div class="form-group">
            <label for="reg-fn">Mật khẩu</label>

              <input type="password" placeholder="{{ ucfirst(trans('frontend.password')) }}" class="form-control" id="vendor_reg_password" name="vendor_reg_password">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
            <label for="reg-fn">Nhập lại mật khẩu</label>

              <input type="password" placeholder="{{ trans('frontend.retype_password') }}" class="form-control" id="vendor_reg_password_confirmation" name="vendor_reg_password_confirmation">
            </div>
          </div>

          <div class="col-md-12">

            <div class="form-group">
              <label for="reg-fn">Khoá bí mật</label>

              <input type="text" placeholder="{{ ucfirst(trans('frontend.secret_key')) }}" class="form-control" id="vendor_reg_secret_key" name="vendor_reg_secret_key">
            </div>
          </div>
          <div class="col-md-12">
          <div class="form-group">

            <span class="button-checkbox t-and-c-button-checkbox">
              <input type="checkbox" name="t_and_c" id="t_and_c" class="shopist-iCheck" value="1"> &nbsp;
              <a href="#" data-toggle="modal" data-target="#t_and_c_m"> {!! trans('frontend.t_and_c_label') !!} </a>
            </span>
            </div>
          </div>

          @if(!empty($is_enable_recaptcha) && $is_enable_recaptcha == true)
              <div class="captcha-style">{!! app('captcha')->display(); !!}</div>
          @endif

          <div class="col-xs-12 col-md-6"><input name="vendor_reg_submit" id="vendor_reg_submit" class="btn btn-primary btn-block btn-md" value="{{ trans('frontend.vendor_registration') }}" type="submit"> </div>
          <div class="col-xs-12 col-md-6"><a target="_blank" href="{{ route('admin.login') }}" class="btn btn-secondary btn-block btn-md vendor-reg-log-in-text">{{ trans('frontend.signin_account_label') }}</a></div>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="t_and_c_m" tabindex="-1" role="dialog" aria-labelledby="t_and_c_m_l" aria-hidden="true">    
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">{!! trans('frontend.t_and_c_label') !!}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body-2" style="padding:20px">
        {!! string_decode(get_vendor_settings_data()['term_n_conditions']) !!}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">{!! trans('frontend.agree_label') !!}</button>
      </div>
    </div>
  </div>
</div>
@endsection  