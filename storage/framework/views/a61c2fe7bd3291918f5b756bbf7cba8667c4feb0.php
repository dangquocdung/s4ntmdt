<?php $__env->startSection('title', trans('admin.coupon_manager_page_title') .' < '. get_site_title()); ?>

<?php $__env->startSection('content'); ?>
<?php echo $__env->make('pages-message.notify-msg-error', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('pages-message.form-submit', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
  <input type="hidden" name="_token" id="_token" value="<?php echo e(csrf_token()); ?>">
  <input type="hidden" name="hf_post_type" id="hf_post_type" value="add">
  
  <div class="row">
    <div class="col-md-12">
      <div class="box box-info">
        <div class="box-header">
          <h3 class="box-title"><?php echo e(trans('admin.create_new_coupon_label')); ?></h3>
          <div class="box-tools pull-right">
            <button class="btn btn-block btn-primary btn-sm" type="submit"><?php echo e(trans('admin.save')); ?></button>
          </div>
        </div>
      </div>
    </div>

    <div class="col-md-7">
      <div class="box box-solid">
        <div class="box-header with-border">
          <h3 class="box-title"><?php echo e(trans('admin.coupon_code_label')); ?></h3>
        </div> 
        <div class="box-body">
          <div><input type="text" placeholder="<?php echo e(trans('admin.enter_coupon_code_label')); ?>" class="form-control" name="coupon_code" id="coupon_code" value=""></div><br>
          <div><textarea id="coupon_description" name="coupon_description" class="dynamic-editor" placeholder="<?php echo e(trans('admin.coupon_desc_label')); ?>"></textarea></div>
        </div>
      </div>
      
      <div class="box box-solid">
        <div class="box-header with-border">
          <h3 class="box-title"><?php echo e(trans('admin.coupon_conditions_label')); ?></h3>
        </div> 
        <div class="box-body">
          <div class="form-group">
            <div class="row">  
              <label class="col-sm-4 control-label" for="inputConditionsType"><?php echo e(trans('admin.conditions_type_label')); ?></label>
              <div class="col-sm-8">
                <select id="change_conditions_type" name="change_conditions_type" class="form-control select2" style="width: 100%;">
                  <option selected="selected" value=""><?php echo e(trans('admin.select_type_label')); ?></option>
                  <option value="discount_from_product"><?php echo e(trans('admin.discount_from_product_label')); ?></option>
                  <option value="percentage_discount_from_product"><?php echo e(trans('admin.percentage_discount_from_product_label')); ?></option>
                  <option value="discount_from_total_cart"><?php echo e(trans('admin.discount_from_total_cart_label')); ?></option>
                  <option value="percentage_discount_from_total_cart"><?php echo e(trans('admin.percentage_discount_from_total_cart_label')); ?></option>
                </select>
              </div>
            </div>  
          </div>
          <div class="form-group">
            <div class="row">  
              <label class="col-sm-4 control-label" for="inputCouponAmount"><?php echo e(trans('admin.coupon_amount_label')); ?></label>
              <div class="col-sm-8">
                <input type="number" placeholder="<?php echo e(trans('admin.enter_coupon_amount_label')); ?>" class="form-control" name="coupon_amount" id="coupon_amount" value="">
              </div>
            </div>  
          </div>
          <div class="form-group" style="display: none;">
            <div class="row">  
              <label class="col-sm-4 control-label" for="inputAllowShipping"><?php echo e(trans('admin.allow_free_shipping_label')); ?></label>
              <div class="col-sm-8">
                <input type="checkbox" name="allow_free_shipping" id="allow_free_shipping" class="shopist-iCheck">
              </div>
            </div>  
          </div>
        </div>
      </div>
      
      <div class="box box-solid">
        <div class="box-header with-border">
          <h3 class="box-title"><?php echo e(trans('admin.usage_restriction')); ?></h3>
        </div> 
        <div class="box-body">
          <div class="form-group">
            <div class="row">  
              <label class="col-sm-4 control-label" for="inputMinAmount"><?php echo e(trans('admin.min_amount_usage_restriction')); ?></label>
              <div class="col-sm-8">
                <input type="number" placeholder="<?php echo e(trans('admin.enter_min_amount_usage_restriction')); ?>" class="form-control" name="min_restriction_amount" id="min_restriction_amount" value="">
              </div>
            </div>  
          </div>
          <div class="form-group">
            <div class="row">  
              <label class="col-sm-4 control-label" for="inputMaxAmount"><?php echo e(trans('admin.max_amount_usage_restriction')); ?></label>
              <div class="col-sm-8">
                <input type="number" placeholder="<?php echo e(trans('admin.enter_max_amount_usage_restriction')); ?>" class="form-control" name="max_restriction_amount" id="max_restriction_amount" value="">
              </div>
            </div>  
          </div>
          <div class="form-group">
            <div class="row">  
              <label class="col-sm-4 control-label" for="inputMaxAmount"><?php echo e(trans('admin.user_role_usage_restriction')); ?></label>
              <div class="col-sm-8">
                <select name="user_role_usage_restriction" id="user_role_usage_restriction" class="form-control select2" style="width: 100%;">
                  <option value="no_role"><?php echo trans('admin.select_role_title'); ?></option>
                  <?php if(count($user_role_list_data)> 0): ?>
                    <?php $__currentLoopData = $user_role_list_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $roles): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <option value="<?php echo e($roles['slug']); ?>"><?php echo $roles['role_name']; ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  <?php endif; ?>
                </select>
              </div>
            </div>  
          </div>
        </div>
      </div>
      
      
    </div>

    <div class="col-md-5">
      <div class="box box-solid">
        <div class="box-header with-border">
          <h3 class="box-title"><?php echo e(trans('admin.usage_range')); ?></h3>
        </div> 
        <div class="box-body">
          <div class="form-group" style="display: none;">
            <div class="row">  
              <label class="col-sm-3 control-label" for="inputUsageStartDate"><?php echo e(trans('admin.usage_range_start_date')); ?></label>
              <div class="col-sm-9">                  
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" placeholder="<?php echo e(trans('admin.date_format')); ?>" id="inputUsageStartDate" name="inputUsageStartDate" class="form-control" value="">
                </div>
              </div>
            </div>  
          </div>
          <div class="form-group">
            <div class="row">  
              <label class="col-sm-4 control-label" for="inputUsageEndDate"><?php echo e(trans('admin.usage_range_end_date')); ?></label>
              <div class="col-sm-8">
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1"><i class="fa fa-calendar"></i></span>
                  </div>
                  <input type="text" placeholder="<?php echo e(trans('admin.date_format')); ?>" id="inputUsageEndDate" name="inputUsageEndDate" class="form-control" value="">
                </div>  
              </div>
            </div>  
          </div>
        </div>
      </div>
      <div class="box box-solid">
        <div class="box-header with-border">
          <i class="fa fa-eye"></i>
          <h3 class="box-title"><?php echo e(trans('admin.visibility')); ?></h3>
        </div>
        <div class="box-body">
          <div class="form-group">
            <div class="row">  
              <label class="col-sm-4 control-label" for="inputVisibility"><?php echo e(trans('admin.enable_coupon')); ?></label>
              <div class="col-sm-8">
                <select class="form-control select2" name="coupon_visibility" style="width: 100%;">
                  <option selected="selected" value="1"><?php echo e(trans('admin.enable')); ?></option>
                  <option value="0"><?php echo e(trans('admin.disable')); ?></option>                  
                </select>                                         
              </div>
            </div>  
          </div>
        </div>
      </div>
    </div>
  </div>
</form>  
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>