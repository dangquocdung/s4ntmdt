<?php $__env->startSection('title', trans('admin.add_currency') .' < '. get_site_title()); ?>

<?php $__env->startSection('content'); ?>
<?php echo $__env->make('pages-message.form-submit', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
  <input type="hidden" name="_token" id="_token" value="<?php echo e(csrf_token()); ?>">
  <div class="box">
    <div class="box-header">
      <h3 class="box-title"><?php echo e(trans('admin.add_currency')); ?> &nbsp;&nbsp;&nbsp;&nbsp;<a class="btn btn-default btn-sm" href="<?php echo e(route('admin.custom_currency_settings_list_content')); ?>"><?php echo e(trans('admin.currency_list')); ?></a></h3>
      <div class="box-tools pull-right">
        <button class="btn btn-primary btn-block btn-sm" type="submit"><?php echo e(trans('admin.save')); ?></button>
      </div>
    </div>
  </div>
  
  <div class="row">
    <div class="col-md-12">
      <div class="box box-solid">
        <div class="box-body">
          <div class="form-group">
            <div class="row">  
              <label class="col-sm-3 control-label" for="inputCurrencyName"><?php echo e(trans('admin.currency_name_label')); ?></label>
              <div class="col-sm-9">
                <input type="text" placeholder="<?php echo e(trans('admin.currency_name_label')); ?>" class="form-control" name="currency_name" id="currency_name">
              </div>
            </div>  
          </div>
          
          <div class="form-group">
            <div class="row">  
              <label class="col-sm-3 control-label" for="selectCurrency"><?php echo e(trans('admin.select_currency_label')); ?></label>
              <div class="col-sm-9">
                <select class="form-control select2" name="select_currency" style="width: 100%;"> 
                  <?php if(count(get_available_currency_name())>0): ?>
                    <?php $__currentLoopData = get_available_currency_name(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $currency_code => $currency_name): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <option value="<?php echo e($currency_code); ?>"><?php echo $currency_name; ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  <?php endif; ?>
                </select>
              </div>
            </div>  
          </div>
          
          <div class="form-group">
            <div class="row">  
              <label class="col-sm-3 control-label" for="inputCurrencyValue"><?php echo e(trans('admin.currency_value_label')); ?></label>
              <div class="col-sm-9">
                  <input type="number" placeholder="<?php echo e(trans('admin.currency_value_label')); ?>" class="form-control" name="currency_value" id="currency_value" step="any">
                [ <?php echo trans('admin.currency_value_msg'); ?> ]
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