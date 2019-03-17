<div id="user_download">
  <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
      <h5><label><?php echo e(trans('admin.frontend_user_download_list')); ?></label></h5><hr>
      <br>
      <table id="table_user_account_download_list" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
        <thead>
          <tr>
            <th><?php echo e(trans('admin.user_account_order_id')); ?></th>
            <th><?php echo e(trans('admin.user_account_order_status')); ?></th>
            <th><?php echo e(trans('admin.user_account_order_total')); ?></th>
            <th><?php echo e(trans('admin.user_account_order_date')); ?></th> 
            <th><?php echo e(trans('admin.user_account_order_action')); ?></th>  
          </tr>
        </thead>
        <tbody>
          <?php if(count($orders_list_data) > 0): ?> 
            <?php $__currentLoopData = $orders_list_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr>
                <td>#<?php echo $row['_post_id']; ?></td>
                <td><?php echo $row['_order_status']; ?></td>
                <td><?php echo price_html($row['_final_order_total'], $row['_order_currency']); ?></td>  
                <td><?php echo Carbon\Carbon::parse($row['_order_date'])->format('F d, Y'); ?></td>  
                <td>
                  <?php if(count($row['_download_history']) > 0): ?>  
                    <?php $__currentLoopData = $row['_download_history']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $items): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <?php if(!empty($items['download_data'])): ?>
                        <?php echo download_file_html( $items['id'], $items['download_data'], $row['_post_id']); ?>

                      <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  <?php else: ?>
                  <?php echo trans('frontend.no_downloaded_file_label'); ?>

                  <?php endif; ?>
                </td>
              </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          <?php endif; ?>
        </tbody>
        <tfoot>
          <tr>
            <th><?php echo e(trans('admin.user_account_order_id')); ?></th>
            <th><?php echo e(trans('admin.user_account_order_status')); ?></th>
            <th><?php echo e(trans('admin.user_account_order_total')); ?></th>
            <th><?php echo e(trans('admin.user_account_order_date')); ?></th> 
            <th><?php echo e(trans('admin.user_account_order_action')); ?></th>  
          </tr>
        </tfoot>
      </table>
    </div>
  </div>  
</div>