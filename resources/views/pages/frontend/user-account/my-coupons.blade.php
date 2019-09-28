@if(count($login_user_coupon_data) > 0)  

  <div class="table-responsive">
    <table class="table table-hover mb-0">
      <thead>
        <tr>
            <th>{!! trans('admin.user_account_active_title') !!}</th>
            <th>{!! trans('admin.user_account_coupon_code_title') !!}</th>
            <th>{!! trans('admin.user_account_valid_till_title') !!}</th>
            <th>{!! trans('admin.user_account_amount_title') !!}</th>
            <th>{!! trans('frontend.coupon_condition_type') !!}</th>
        </tr>
      </thead>
      <tbody>

          @foreach($login_user_coupon_data as $row)
            <tr class="ui-borderTop">
              @if($row['coupon_status'] == 1)  
              <td>{!! trans('frontend.yes') !!}</td>
              @else
              <td>{!! trans('frontend.no') !!}</td>
              @endif

              <td>{!! $row['coupon_code'] !!}</td>
              <td>{!! Carbon\Carbon::parse($row['usage_range_end_date'])->format('F d, Y') !!}</td>  
              <td>{!! price_html($row['coupon_amount'], get_frontend_selected_currency()) !!}</td>
              <td>{!! $row['coupon_condition_type'] !!}</td>
            </tr>
          @endforeach

      </tbody>
    </table>
  </div>

@else
<p>{{ trans('frontend.no_coupons_items') }}</p>
@endif