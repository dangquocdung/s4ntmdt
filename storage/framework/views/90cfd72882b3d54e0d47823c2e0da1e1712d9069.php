<?php $__env->startSection('title', trans('admin.vendor_package_select') .' < '. get_site_title()); ?>

<?php $__env->startSection('content'); ?>
<div id="vendor_package_select_option">
  <form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
    <input type="hidden" name="_token" id="_token" value="<?php echo e(csrf_token()); ?>">  
    <div class="row">
      <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7">
        <h5><?php echo trans('admin.suitable_package_label'); ?></h5>
      </div>
      <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
        <div class="pull-right">
          <button class="btn btn-block btn-primary btn-sm" type="submit"><?php echo e(trans('admin.save')); ?></button>
        </div>  
      </div>
    </div>
    <br>
    <div class="row">
      <div class="col-md-12">
        <div class="box box-solid">
          <div class="box-body">
            <table id="table_for_products_list" class="table table-bordered admin-data-table admin-data-list">
              <thead class="thead-dark">
                <tr>
                  <th><?php echo trans('admin.vendor_package_title_label'); ?></th>
                  <th><?php echo trans('admin.created_date_label'); ?></th>
                  <th><?php echo trans('admin.action'); ?></th>
                </tr>
              </thead>
              <tbody>
                <?php if(count($vendors_packages) > 0): ?>  
                  <?php $__currentLoopData = $vendors_packages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tr>
                    <td><?php echo $row['package_type']; ?></td>
                    <td><?php echo e(Carbon\Carbon::parse(  $row['created_at'] )->format('d, M Y')); ?></td>
                    <td>
                      <ul class="select-package-option">
                        <li><a data-title="<?php echo e($row['package_type']); ?>" data-package_details="<?php echo e($row['options']); ?>" class="vendor-package-details" href="#"><i class="fa fa-eye"></i> &nbsp;<?php echo trans('admin.view'); ?></a></li>  
                        
                        <?php if(!empty($selected_package) && $row['id'] == $selected_package): ?>
                        <li><input type="radio" checked="checked" name="package_name" class="shopist-iCheck" value="<?php echo e($row['id']); ?>"> <?php echo trans('admin.select_label'); ?></li>
                        <?php else: ?>
                        <li><input type="radio" name="package_name" class="shopist-iCheck" value="<?php echo e($row['id']); ?>"> <?php echo trans('admin.select_label'); ?></li>
                        <?php endif; ?>
                      </ul>
                    </td>
                  </tr>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php else: ?>
                <tr><td colspan="3"><i class="fa fa-exclamation-triangle"></i> <?php echo trans('admin.no_data_found_label'); ?></td></tr>  
                <?php endif; ?>
              </tbody>
              <tfoot class="thead-dark">
                <tr>
                  <th><?php echo trans('admin.vendor_package_title_label'); ?></th>
                  <th><?php echo trans('admin.created_date_label'); ?></th>
                  <th><?php echo trans('admin.action'); ?></th>
                </tr>
              </tfoot>
            </table>
          </div>
        </div>
      </div>
    </div>
  </form>    
  <div class="modal fade" id="vendorPackageDetails" tabindex="-1" role="dialog" aria-labelledby="updater" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <p class="no-margin"><?php echo trans('admin.vendor_package_details_label'); ?></p>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>    
        <div class="modal-body"></div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default attachtopost" data-dismiss="modal"><?php echo trans('admin.close'); ?></button>
        </div>
      </div>
    </div>
  </div>  
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>