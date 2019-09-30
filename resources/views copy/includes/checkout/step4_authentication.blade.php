@section('authentication')
<!-- Xác thực người dùng -->
@if($_settings_data['general_settings']['checkout_options']['enable_login_user'] == true && $is_user_login == false)

<div id="authentication" class="step well">
    <div class="user-login-contentb">
    <h4>{!! trans('frontend.authentication_label') !!}</h4>
    <div class="user-login-content">
        <div class="login-information clearfix">
        <div class="row">
            <div class="col-sm-6">
            <div class="form_content">
                <p>{!! trans('frontend.no_user_account_msg') !!}</p>
                <a class="btn btn-secondary" href="{{ route('user-registration-page') }}">{!! trans('frontend.create_account_label') !!}</a>
            </div>
            </div>

            <div class="col-sm-6">
            <div class="form_content">
                <p>{!! trans('frontend.has_user_account_msg') !!}</p>
                <a class="btn btn-secondary" href="{{ route('user-login-page') }}">{!! trans('frontend.signin_account_label') !!}</a>
            </div>
            </div>
        </div>
        </div>
    </div>

    </div>

</div>

@endif
    
@endsection