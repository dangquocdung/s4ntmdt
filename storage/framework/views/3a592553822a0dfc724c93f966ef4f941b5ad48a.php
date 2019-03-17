<?php $__env->startSection('vendor-withdraw-history-page-content'); ?>
<div id="vendor_withdraw_history_content">
  <div class="box box-solid">
    <div class="row">
      <div class="col-12">
        <div class="box-body">
          <table id="table_for_products_list" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th><?php echo trans('admin.amount_solid_label'); ?></th>
                <th><?php echo trans('admin.payment_method_label'); ?></th>
                <th><?php echo trans('admin.processed_date_label'); ?></th>
                <th><?php echo trans('admin.status'); ?></th>
              </tr>
            </thead>
            <tbody>
              <?php if(count($withdraw_history_data) > 0): ?>  
                <?php $__currentLoopData = $withdraw_history_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                  <td><?php echo price_html($row['amount']); ?></td>
                  
                  <?php if($row['payment_method'] == 'dbt'): ?>
                  <td><?php echo trans('admin.direct_bank_transfer'); ?></td>
                  <?php elseif($row['payment_method'] == 'cod'): ?>
                  <td><?php echo trans('admin.cash_on_delivery'); ?></td>
                  <?php elseif($row['payment_method'] == 'paypal'): ?>
                  <td><?php echo trans('admin.paypal'); ?></td>
                  <?php elseif($row['payment_method'] == 'stripe'): ?>
                 <td><?php echo trans('admin.stripe'); ?></td>
                  <?php endif; ?>
                  
                  <td><?php echo e(Carbon\Carbon::parse($row['updated_at'])->format('d, M Y')); ?></td>
                  <td>
                    <?php if($row['status'] == 'COMPLETED'): ?>  
                    <span style="color:#00a65a;"><?php echo trans('admin.completed'); ?></span>
                    <?php elseif($row['status'] == 'CANCELLED'): ?>
                    <span style="color:#ff0084;"><?php echo trans('admin.cancelled'); ?></span>
                    <?php elseif($row['status'] == 'ON_HOLD'): ?>
                    <span style="color:#3c8dbc;"><?php echo trans('admin.pending'); ?></span>
                    <?php endif; ?>
                  </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              <?php else: ?>
                <tr><td colspan="4"><i class="fa fa-exclamation-triangle"></i> <?php echo trans('admin.no_data_found_label'); ?></td></tr>  
              <?php endif; ?>
            </tbody>
            <tfoot>
              <tr>
                <th><?php echo trans('admin.amount_solid_label'); ?></th>
                <th><?php echo trans('admin.payment_method_label'); ?></th>
                <th><?php echo trans('admin.processed_date_label'); ?></th>
                <th><?php echo trans('admin.status'); ?></th>
              </tr>
            </tfoot>
          </table>
            <br>  
          <div class="products-pagination"><?php echo $withdraw_history_data->appends(Request::capture()->except('page'))->render(); ?></div>  
        </div>
      </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>