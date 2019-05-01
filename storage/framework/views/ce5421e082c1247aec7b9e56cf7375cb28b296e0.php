<form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
  <input type="hidden" name="_token" id="_token" value="<?php echo e(csrf_token()); ?>">
  <input type="hidden" name="_account_post_type" value="address">
  
  <div class="row">
    <div class="col-md-12">
      <?php echo $__env->make('pages-message.form-submit', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </div>
  </div>  
  
  <div class="row">
    <div class="col-md-12">
      <h5><label><?php echo e(trans('frontend.billing_address')); ?></label></h5><hr>
      <div class="form-group">
        <div class="col-sm-4">
          <label class="control-label" for="inputAccountTitle"><?php echo e(trans('frontend.account_title')); ?></label>
        </div>
        <div class="col-sm-8">
          <input type="text" class="form-control" placeholder="<?php echo e(trans('frontend.title')); ?>" name="account_bill_title" id="account_bill_title" value="<?php echo e(old('account_bill_title')); ?>">
        </div>
      </div>

      <div class="form-group">
        <div class="col-sm-4">
          <label class="control-label" for="inputAccountCompanyName"><?php echo e(trans('frontend.account_company_name')); ?></label>
        </div>
        <div class="col-sm-8">
          <input type="text" class="form-control" placeholder="<?php echo e(trans('frontend.company_name')); ?>" name="account_bill_company_name" id="account_bill_company_name" value="<?php echo e(old('account_bill_company_name')); ?>">
        </div>
      </div>
      
      <div class="form-group required">
        <div class="col-sm-4">
          <label class="control-label" for="inputAccountFirstName"><?php echo e(trans('frontend.account_first_name')); ?></label>
        </div>
        <div class="col-sm-8">
          <input type="text" class="form-control" placeholder="<?php echo e(trans('frontend.first_name')); ?>" name="account_bill_first_name" id="account_bill_first_name" value="<?php echo e(old('account_bill_first_name')); ?>">
        </div>
      </div>
      
      <div class="form-group required">
        <div class="col-sm-4">
          <label class="control-label" for="inputAccountLastName"><?php echo e(trans('frontend.account_last_name')); ?></label>
        </div>
        <div class="col-sm-8">
          <input type="text" class="form-control" placeholder="<?php echo e(trans('frontend.last_name')); ?>" name="account_bill_last_name" id="account_bill_last_name" value="<?php echo e(old('account_bill_last_name')); ?>">
        </div>
      </div>
      
      <div class="form-group required">
        <div class="col-sm-4">
          <label class="control-label" for="inputAccountEmailAddress"><?php echo e(trans('frontend.account_email')); ?></label>
        </div>
        <div class="col-sm-8">
          <input type="email" class="form-control" placeholder="<?php echo e(trans('frontend.email')); ?>" name="account_bill_email_address" id="account_bill_email_address" value="<?php echo e(old('account_bill_email_address')); ?>">
        </div>
      </div>
      
      <div class="form-group required">
        <div class="col-sm-4">
          <label class="control-label" for="inputAccountPhoneNumber"><?php echo e(trans('frontend.account_phone_number')); ?></label>
        </div>
        <div class="col-sm-8">
          <input type="number" class="form-control" placeholder="<?php echo e(trans('frontend.phone')); ?>" name="account_bill_phone_number" id="account_bill_phone_number" value="<?php echo e(old('account_bill_phone_number')); ?>">
        </div>
      </div>
      
      <div class="form-group required">
        <div class="col-sm-4">
          <label class="control-label" for="inputAccountSelectCountry"><?php echo e(trans('frontend.account_select_country')); ?></label>
        </div>
        <div class="col-sm-8">
          <select class="form-control" id="account_bill_select_country" name="account_bill_select_country">
            <option value=""> <?php echo e(trans('frontend.select_country')); ?> </option>
            <?php $__currentLoopData = get_country_list(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <?php if(old('account_bill_select_country') == $key): ?>
                <option selected value="<?php echo e($key); ?>"> <?php echo $val; ?></option>
              <?php else: ?>
                <option value="<?php echo e($key); ?>"> <?php echo $val; ?></option>
              <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
           </select>
        </div>
      </div>
      
      <div class="form-group required">
        <div class="col-sm-4">
          <label class="control-label" for="inputAccountAddressLine1"><?php echo e(trans('frontend.account_address_line_1')); ?></label>
        </div>
        <div class="col-sm-8">
          <textarea class="form-control" id="account_bill_adddress_line_1" name="account_bill_adddress_line_1" placeholder="<?php echo e(trans('frontend.address_line_1')); ?>"><?php echo e(old('account_bill_adddress_line_1')); ?></textarea>
        </div>
      </div>
      
      <div class="form-group">
        <div class="col-sm-4">
          <label class="control-label" for="inputAccountAddressLine2"><?php echo e(trans('frontend.account_address_line_2')); ?></label>
        </div>
        <div class="col-sm-8">
          <textarea class="form-control" id="account_bill_adddress_line_2" name="account_bill_adddress_line_2" placeholder="<?php echo e(trans('frontend.address_line_2')); ?>"><?php echo e(old('account_bill_adddress_line_2')); ?></textarea>
        </div>
      </div>
      
      <div class="form-group required">
        <div class="col-sm-4">
          <label class="control-label" for="inputAccountTownCity"><?php echo e(trans('frontend.account_address_town_city')); ?></label>
        </div>
        <div class="col-sm-8">
          <input type="text" class="form-control" placeholder="<?php echo e(trans('frontend.town_city')); ?>" name="account_bill_town_or_city" id="account_bill_town_or_city" value="<?php echo e(old('account_bill_town_or_city')); ?>">
        </div>
      </div>
      
      <div class="form-group required">
        <div class="col-sm-4">
          <label class="control-label" for="inputAccountZipPostalCode"><?php echo e(trans('frontend.account_address_zip_postal_code')); ?></label>
        </div>
        <div class="col-sm-8">
          <input type="number" class="form-control" placeholder="<?php echo e(trans('frontend.zip_postal_code')); ?>" name="account_bill_zip_or_postal_code" id="account_bill_zip_or_postal_code" value="<?php echo e(old('account_bill_zip_or_postal_code')); ?>">
        </div>
      </div>
      
      <div class="form-group">
        <div class="col-sm-4">
          <label class="control-label" for="inputAccountFaxNumber"><?php echo e(trans('frontend.account_fax_number')); ?></label>
        </div>
        <div class="col-sm-8">
          <input type="number" class="form-control" placeholder="<?php echo e(trans('frontend.fax')); ?>" name="account_bill_fax_number" id="account_bill_fax_number" value="<?php echo e(old('account_bill_fax_number')); ?>">
        </div>
      </div>
      
    </div>
  </div>
  
  <br>
  
  <div class="row">
    <div class="col-md-12">
      <h5><label><?php echo e(trans('frontend.shipping_address')); ?></label></h5><hr>
      <div class="form-group">
        <div class="col-sm-4">
          <label class="control-label" for="inputAccountTitle"><?php echo e(trans('frontend.account_title')); ?></label>
        </div>
        <div class="col-sm-8">
          <input type="text" class="form-control" placeholder="<?php echo e(trans('frontend.title')); ?>" name="account_shipping_title" id="account_shipping_title" value="<?php echo e(old('account_shipping_title')); ?>">
        </div>
      </div>

      <div class="form-group">
        <div class="col-sm-4">
          <label class="control-label" for="inputAccountCompanyName"><?php echo e(trans('frontend.account_company_name')); ?></label>
        </div>
        <div class="col-sm-8">
          <input type="text" class="form-control" placeholder="<?php echo e(trans('frontend.company_name')); ?>" name="account_shipping_company_name" id="account_shipping_company_name" value="<?php echo e(old('account_shipping_company_name')); ?>">
        </div>
      </div>
      
      <div class="form-group required">
        <div class="col-sm-4">
          <label class="control-label" for="inputAccountFirstName"><?php echo e(trans('frontend.account_first_name')); ?></label>
        </div>
        <div class="col-sm-8">
          <input type="text" class="form-control" placeholder="<?php echo e(trans('frontend.first_name')); ?>" name="account_shipping_first_name" id="account_shipping_first_name" value="<?php echo e(old('account_shipping_first_name')); ?>">
        </div>
      </div>
      
      <div class="form-group required">
        <div class="col-sm-4">
          <label class="control-label" for="inputAccountLastName"><?php echo e(trans('frontend.account_last_name')); ?></label>
        </div>
        <div class="col-sm-8">
          <input type="text" class="form-control" placeholder="<?php echo e(trans('frontend.last_name')); ?>" name="account_shipping_last_name" id="account_shipping_last_name" value="<?php echo e(old('account_shipping_last_name')); ?>">
        </div>
      </div>
      
      <div class="form-group required">
        <div class="col-sm-4">
          <label class="control-label" for="inputAccountEmailAddress"><?php echo e(trans('frontend.account_email')); ?></label>
        </div>
        <div class="col-sm-8">
          <input type="email" class="form-control" placeholder="<?php echo e(trans('frontend.email')); ?>" name="account_shipping_email_address" id="account_shipping_email_address" value="<?php echo e(old('account_shipping_email_address')); ?>">
        </div>
      </div>
      
      <div class="form-group required">
        <div class="col-sm-4">
          <label class="control-label" for="inputAccountPhoneNumber"><?php echo e(trans('frontend.account_phone_number')); ?></label>
        </div>
        <div class="col-sm-8">
          <input type="number" class="form-control" placeholder="<?php echo e(trans('frontend.phone')); ?>" name="account_shipping_phone_number" id="account_shipping_phone_number" value="<?php echo e(old('account_shipping_phone_number')); ?>">
        </div>
      </div>
      
      <div class="form-group required">
        <div class="col-sm-4">
          <label class="control-label" for="inputAccountSelectCountry"><?php echo e(trans('frontend.account_select_country')); ?></label>
        </div>
        <div class="col-sm-8">
          <select class="form-control" id="account_shipping_select_country" name="account_shipping_select_country">
            <option value=""> <?php echo e(trans('frontend.select_country')); ?> </option>
            <?php $__currentLoopData = get_country_list(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <?php if(old('account_bill_select_country') == $key): ?>
                <option selected value="<?php echo e($key); ?>"> <?php echo $val; ?></option>
              <?php else: ?>
                <option value="<?php echo e($key); ?>"> <?php echo $val; ?></option>
              <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
           </select>
        </div>
      </div>
      
      <div class="form-group required">
        <div class="col-sm-4">
          <label class="control-label" for="inputAccountAddressLine1"><?php echo e(trans('frontend.account_address_line_1')); ?></label>
        </div>
        <div class="col-sm-8">
          <textarea class="form-control" id="account_shipping_adddress_line_1" name="account_shipping_adddress_line_1" placeholder="<?php echo e(trans('frontend.address_line_1')); ?>"><?php echo e(old('account_shipping_adddress_line_1')); ?></textarea>
        </div>
      </div>
      
      <div class="form-group">
        <div class="col-sm-4">
          <label class="control-label" for="inputAccountAddressLine2"><?php echo e(trans('frontend.account_address_line_2')); ?></label>
        </div>
        <div class="col-sm-8">
          <textarea class="form-control" id="account_shipping_adddress_line_2" name="account_shipping_adddress_line_2" placeholder="<?php echo e(trans('frontend.address_line_2')); ?>"><?php echo e(old('account_shipping_adddress_line_2')); ?></textarea>
        </div>
      </div>
      
      <div class="form-group required">
        <div class="col-sm-4">
          <label class="control-label" for="inputAccountTownCity"><?php echo e(trans('frontend.account_address_town_city')); ?></label>
        </div>
        <div class="col-sm-8">
          <input type="text" class="form-control" placeholder="<?php echo e(trans('frontend.town_city')); ?>" name="account_shipping_town_or_city" id="account_shipping_town_or_city" value="<?php echo e(old('account_shipping_town_or_city')); ?>">
        </div>
      </div>
      
      <div class="form-group required">
        <div class="col-sm-4">
          <label class="control-label" for="inputAccountZipPostalCode"><?php echo e(trans('frontend.account_address_zip_postal_code')); ?></label>
        </div>
        <div class="col-sm-8">
          <input type="number" class="form-control" placeholder="<?php echo e(trans('frontend.zip_postal_code')); ?>" name="account_shipping_zip_or_postal_code" id="account_shipping_zip_or_postal_code" value="<?php echo e(old('account_shipping_zip_or_postal_code')); ?>">
        </div>
      </div>
      
      <div class="form-group">
        <div class="col-sm-4">
          <label class="control-label" for="inputAccountFaxNumber"><?php echo e(trans('frontend.account_fax_number')); ?></label>
        </div>
        <div class="col-sm-8">
          <input type="number" class="form-control" placeholder="<?php echo e(trans('frontend.fax')); ?>" name="account_shipping_fax_number" id="account_shipping_fax_number" value="<?php echo e(old('account_shipping_fax_number')); ?>">
        </div>
      </div>
      
    </div>
  </div>
  
  <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
      <div class="text-right">
          <button type="submit" class="btn btn-light btn-sm"><?php echo e(trans('frontend.save_address')); ?></button>
      </div>
    </div>
  </div>
 
</form>