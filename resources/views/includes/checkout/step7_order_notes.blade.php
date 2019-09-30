@section('order_notes')
    <!-- Order note -->
    @if($_settings_data['general_settings']['checkout_options']['enable_guest_user'] == true || ($_settings_data['general_settings']['checkout_options']['enable_login_user'] == true && $is_user_login == true) || ($_settings_data['general_settings']['checkout_options']['enable_guest_user'] == false && $_settings_data['general_settings']['checkout_options']['enable_login_user'] == false))
    <div id="order_notes" class="step well">
        <h4>{!! trans('frontend.order_notes') !!}</h4>
        <div class="row">
        <div class="col-md-12">
            <div class="form-group order-extra-notes">
            <textarea name="checkout_order_extra_message" id="checkout_order_extra_message"  placeholder="{{ trans('frontend.notes_about_your_order') }}" class="form-control">{!! old('checkout_order_extra_message') !!}</textarea>
            </div>
        </div>
        </div>
    </div>
    @endif
@endsection