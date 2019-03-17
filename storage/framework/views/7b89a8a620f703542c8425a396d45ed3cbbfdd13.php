<?php $__env->startSection('title', trans('admin.vendors_list_page_title') .' < '. get_site_title()); ?>

<?php $__env->startSection('content'); ?>
<h4 class="box-title"><?php echo trans('admin.vendors_list_label'); ?></h4><hr class="text-border-bottom">
<div class="vendor-list-status">
  <div class="row">
    <div class="col-md-12">
      <ul>
        <li><a <?php echo e($vendor_all); ?> href="<?php echo e(route('admin.vendors_list_content')); ?>"><?php echo trans('admin.only_all_label'); ?>  </a></li> &nbsp; | &nbsp;  
        <li><a <?php echo e($vendor_active); ?> href="<?php echo e(route('admin.vendors_list_with_status', 'active')); ?>"><?php echo trans('admin.user_account_active_title'); ?>  </a></li> &nbsp; | &nbsp;
        <li><a <?php echo e($vendor_pending); ?> href="<?php echo e(route('admin.vendors_list_with_status', 'pending')); ?>"><?php echo trans('admin.pending'); ?>  </a></li>
      </ul>
    </div>
  </div>
</div>    

<div class="row">
  <div class="col-12">
    <div class="box">
      <div class="box-body">
        <div id="table_search_option">
          <form action="<?php echo e(route('admin.vendors_list_content')); ?>" method="GET"> 
            <div class="row">
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="input-group">
                  <input type="text" name="term_vendors" class="search-query form-control" placeholder="<?php echo e(trans('admin.vendors_list_search_place_holder')); ?>" value="<?php echo e($search_value); ?>" />
                  <div class="input-group-btn">
                    <button class="btn btn-primary" type="submit">
                      <span class="fa fa-search"></span>
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </form>  
        </div>      
        <table id="table_for_vendors_list" class="table table-bordered admin-data-table admin-data-list">
          <thead class="thead-dark">
            <tr>
              <th><?php echo e(trans('admin.image')); ?></th>
              <th><?php echo e(trans('admin.user_display_name')); ?></th>
              <th><?php echo e(trans('admin.vendors_table_header_shop_name')); ?></th>
              <th><?php echo e(trans('admin.email')); ?></th>
              <th><?php echo e(trans('admin.vendors_table_header_products')); ?></th>
              <th><?php echo e(trans('admin.vendors_table_header_phone_number')); ?></th>
              <th><?php echo e(trans('admin.status')); ?></th>
              <th><?php echo e(trans('admin.action')); ?></th>
            </tr>
          </thead>
          <tbody>
            <?php if(count($vendors_list_data)>0): ?>
              <?php $__currentLoopData = $vendors_list_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php $details = json_decode($row->details);?>
                <tr>
                  <?php if(!empty($row->user_photo_url)): ?>
                  <td><img src="<?php echo e(get_image_url($row->user_photo_url)); ?>" alt="<?php echo e(basename ($row->user_photo_url)); ?>"></td>
                  <?php else: ?>
                  <td><img src="<?php echo e(default_placeholder_img_src()); ?>" alt=""></td>
                  <?php endif; ?>
                  
                  <td><?php echo $row->name; ?></td>
                  <td><a target="_blank" href="<?php echo e(route('store-details-page-content', $row->name)); ?>"><?php echo $details->profile_details->store_name; ?></a></td>
                  <td><?php echo $row->email; ?></td>
                  <td><a href="<?php echo e(route('admin.product_list', $row->id)); ?>"><?php echo get_author_total_products( $row->id ); ?></a></td>
                  <td><?php echo $details->profile_details->phone; ?></td>
                  
                  <?php if($row->user_status == 1): ?>
                  <td class="status-enable"><?php echo e(trans('admin.enable')); ?></td>
                  <?php else: ?>
                  <td class="status-disable"><?php echo e(trans('admin.disable')); ?></td>
                  <?php endif; ?>

                  <td>
                    <div class="btn-group">
                      <button class="btn btn-success btn-flat" type="button"><?php echo e(trans('admin.action')); ?></button>
                      <button data-toggle="dropdown" class="btn btn-success btn-flat dropdown-toggle" type="button">
                        <span class="caret"></span>
                        <span class="sr-only">Toggle Dropdown</span>
                      </button>
                      <ul role="menu" class="dropdown-menu">
                        <li><a href="#" data-toggle="modal" data-target="#vendors_profile" class="vendors-profile" data-id="<?php echo e($row->id); ?>"><i class="fa fa-user"></i><?php echo e(trans('admin.profile')); ?></a></li>  
                        
                        <?php if($row->user_status == 1): ?>
                        <li><a href="#" class="vendor-status-change" data-id="<?php echo e($row->id); ?>" data-target="disable"><i class="fa fa-times-rectangle-o"></i><?php echo e(trans('admin.disable')); ?></a></li>
                        <?php else: ?>
                        <li><a href="#" class="vendor-status-change" data-id="<?php echo e($row->id); ?>" data-target="enable"><i class="fa fa-check-square-o"></i><?php echo e(trans('admin.enable')); ?></a></li>
                        <?php endif; ?>
                        
                        <li><a class="remove-selected-data-from-list" data-track_name="vendors_list" data-id="<?php echo e($row->id); ?>" href="#"><i class="fa fa-remove"></i><?php echo e(trans('admin.remove_label')); ?></a></li>
                      </ul>
                    </div>
                  </td>
                </tr>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php else: ?>
            <tr><td colspan="9"><i class="fa fa-exclamation-triangle"></i> <?php echo trans('admin.no_data_found_label'); ?></td></tr>
            <?php endif; ?>
          </tbody>
          <tfoot class="thead-dark">
            <th><?php echo e(trans('admin.image')); ?></th>
            <th><?php echo e(trans('admin.user_display_name')); ?></th>
            <th><?php echo e(trans('admin.vendors_table_header_shop_name')); ?></th>
            <th><?php echo e(trans('admin.email')); ?></th>
            <th><?php echo e(trans('admin.vendors_table_header_products')); ?></th>
            <th><?php echo e(trans('admin.vendors_table_header_phone_number')); ?></th>
            <th><?php echo e(trans('admin.status')); ?></th>
            <th><?php echo e(trans('admin.action')); ?></th>
          </tfoot>
        </table>
        <br>  
        <div class="products-pagination"><?php echo $vendors_list_data->appends(Request::capture()->except('page'))->render(); ?></div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="vendors_profile" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <p class="no-margin"><?php echo trans('admin.vendors_user_profile_label'); ?></p>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="eb-overlay-loader"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal"><?php echo trans('admin.close'); ?></button>
      </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>