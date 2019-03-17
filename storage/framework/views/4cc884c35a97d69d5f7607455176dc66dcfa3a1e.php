<div id="vendor_profile">
  <div class="vendor-profile-logo">
    <?php if(!empty($user_photo_url)): ?>
    <img src="<?php echo e(get_image_url($user_photo_url)); ?>" alt="<?php echo e(basename($user_photo_url)); ?>">
    <?php else: ?>
    <img src="<?php echo e(default_placeholder_img_src()); ?>" alt="<?php echo e(default_placeholder_img_src()); ?>">
    <?php endif; ?>
  </div>
  
  <div class="profile-details">
    <table>
      <tr>
        <td><?php echo trans('admin.display_name'); ?></td>
        <td><?php echo $user_display_name; ?></td>
      </tr>
      <tr>
        <td><?php echo trans('admin.user_name_title'); ?></td>
        <td><?php echo $user_name; ?></td>
      </tr>
      <tr>
        <td><?php echo trans('admin.vendors_table_header_shop_name'); ?></td>
        <td><?php echo $details['profile_details']->store_name; ?></td>
      </tr>
      <tr>
        <td><?php echo trans('admin.vendor_status_label'); ?></td>
        <?php if($user_status == 1): ?>
        <td class="vendor-enable"><?php echo trans('admin.enable'); ?></td>
        <?php else: ?>
        <td class="vendor-disable"><?php echo trans('admin.disable'); ?></td>
        <?php endif; ?>
      </tr>
      <tr>
        <td><?php echo trans('admin.address_1'); ?></td>
        <td><?php echo $details['profile_details']->address_line_1; ?></td>
      </tr>
      
      <?php if(!empty($details['profile_details']->address_line_2)): ?>
      <tr>
        <td><?php echo trans('admin.address_2'); ?></td>
        <td><?php echo $details['profile_details']->address_line_2; ?></td>
      </tr>
      <?php endif; ?>

      <tr>
        <td><?php echo trans('admin.city'); ?></td>
        <td><?php echo $details['profile_details']->city; ?></td>
      </tr>
      <tr>
        <td><?php echo trans('admin.vendor_state_label'); ?></td>
        <td><?php echo $details['profile_details']->state; ?></td>
      </tr>
      <tr>
        <td><?php echo trans('admin.country'); ?></td>
        <td><?php echo $details['profile_details']->country; ?></td>
      </tr>
      <tr>
        <td><?php echo trans('admin.vendor_zip_postal_label'); ?></td>
        <td><?php echo $details['profile_details']->zip_postal_code; ?></td>
      </tr>
      <tr>
        <td><?php echo trans('admin.email'); ?></td>
        <td><?php echo $user_email; ?></td>
      </tr>
      <tr>
        <td><?php echo trans('admin.phone'); ?></td>
        <td><?php echo $details['profile_details']->phone; ?></td>
      </tr>
    </table>
  </div>  
</div>