<div id="vendor_profile">
  <div class="vendor-profile-logo">
    @if(!empty($user_photo_url))
    <img src="{{ get_image_url($user_photo_url) }}" alt="{{ basename($user_photo_url) }}">
    @else
    <img src="{{ default_placeholder_img_src() }}" alt="{{ default_placeholder_img_src() }}">
    @endif
  </div>
  
  <div class="profile-details">
    <table>
      <tr>
        <td>{!! trans('admin.display_name')!!}</td>
        <td>{!! $user_display_name !!}</td>
      </tr>
      <tr>
        <td>{!! trans('admin.user_name_title')!!}</td>
        <td>{!! $user_name !!}</td>
      </tr>
      <tr>
        <td>{!! trans('admin.vendors_table_header_shop_name')!!}</td>
        <td>{!! $details['profile_details']->store_name !!}</td>
      </tr>
      <tr>
        <td>{!! trans('admin.vendor_status_label')!!}</td>
        @if($user_status == 1)
        <td class="vendor-enable">{!! trans('admin.enable') !!}</td>
        @else
        <td class="vendor-disable">{!! trans('admin.disable') !!}</td>
        @endif
      </tr>
      <tr>
        <td>{!! trans('admin.address_1')!!}</td>
        <td>{!! $details['profile_details']->address_line_1 !!}</td>
      </tr>
      
      @if(!empty($details['profile_details']->address_line_2))
      <tr>
        <td>{!! trans('admin.address_2')!!}</td>
        <td>{!! $details['profile_details']->address_line_2 !!}</td>
      </tr>
      @endif

      <tr>
        <td>{!! trans('admin.city')!!}</td>
        <?php $id = (int)$details['profile_details']->city ?>
        <td>{{ get_xaphuong($id) }}</td>
      </tr>

      <tr>
        <td>{!! trans('admin.vendor_state_label')!!}</td>
        <?php $id = (int)$details['profile_details']->state ?>
        <td>{{ get_quanhuyen($id) }}</td>
      </tr>

      <tr>
        <td>{!! trans('admin.country')!!}</td>
        <?php $id = (int)$details['profile_details']->country ?>
        <td>{{ get_tinhthanh($id) }}</td>
      </tr>

      <tr>
        <td>{!! trans('admin.email')!!}</td>
        <td>{!! $user_email !!}</td>
      </tr>

      <tr>
        <td>{!! trans('admin.phone')!!}</td>
        <td>{!! $details['profile_details']->phone !!}</td>
      </tr>
      
    </table>
  </div>  
</div>