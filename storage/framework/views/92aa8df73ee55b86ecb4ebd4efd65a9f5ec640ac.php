<form class="form-horizontal" method="get" action="<?php echo e($action_url); ?>" enctype="multipart/form-data">
  <div class="row">
    <div class="col-12">
      <div class="filter-elements">
        <div class="filter-label"><?php echo trans('admin.only_year_label'); ?>:</div>
        <div class="filter-input">
          <select name="filter_year" id="filter_year" class="select2" style="width:250px;">
            <?php $__currentLoopData = $year; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $count): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <?php if($count == $filter_year): ?>
              <option selected="selected" value="<?php echo e($count); ?>"><?php echo $count; ?></option>
              <?php else: ?>
              <option value="<?php echo e($count); ?>"><?php echo $count; ?></option>
              <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </select>  
        </div>
      </div>&nbsp;&nbsp;
      
      <div class="filter-elements"><button class="btn btn-primary" type="submit"><?php echo trans('admin.only_show_label'); ?></button></div>
    </div>
  </div>
</form>
<br><br>

<div class="row">
  <div class="col-md-3">
    <div class="reports-left-sidebar">
      <div class="box box-solid">
        <ul class="chart-legend">
          <li><strong><?php echo price_html($vendor_reports_total_details['total_earning']); ?></strong><?php echo trans('admin.total_earning_label'); ?></li>
          <li><strong><?php echo price_html($vendor_reports_total_details['order_total']); ?></strong> <?php echo trans('admin.order_total_label'); ?></li>
          <li><strong><?php echo $vendor_reports_total_details['number_of_order']; ?></strong><?php echo trans('admin.order_placed_label'); ?></li>
        </ul>
      </div>
    </div>
  </div>
    
  <div class="col-md-9">
    <div class="reports-chart-container">
    <div class="box box-solid">
      <div id="chart"></div>
      </div>
    </div>
  </div>
</div>
<br><br>

<div class="row">
  <div class="col-12">
    <h4><?php echo trans('admin.filter_data'); ?></h4>  
    <div class="box">
      <div class="box-body">
        <table id="table_for_manufacturers_list" class="table table-bordered admin-data-table admin-data-list">
          <thead class="thead-dark">
            <tr>
              <th><?php echo e(trans('admin.order_id')); ?></th>
              <th><?php echo e(trans('admin.vendor_name_label')); ?></th>
              <th><?php echo e(trans('admin.order_total')); ?></th>
              <th><?php echo e(trans('admin.vendor_earning_label')); ?></th>
              <th><?php echo e(trans('admin.commision_label')); ?></th>
              <th><?php echo e(trans('admin.created_date_label')); ?></th>
              <th><?php echo e(trans('admin.status')); ?></th>
            </tr>
          </thead>
          <tbody>
            <?php if(!empty($vendor_reports_log) && $vendor_reports_log->count() > 0): ?>
              <?php $__currentLoopData = $vendor_reports_log; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr>
                <td>#<?php echo $row->order_id; ?></td>
                <td><?php echo get_user_name_by_user_id($row->vendor_id); ?></td>
                <td><?php echo price_html($row->order_total); ?></td>
                <td><?php echo price_html( (float)$row->order_total - (float)$row->net_amount); ?></td>
                <td><?php echo price_html($row->net_amount); ?></td>
                <td><?php echo Carbon\Carbon::parse(  $row->created_at )->format('F d, Y'); ?></td>
                <td><?php echo $row->order_status; ?></td>
              </tr>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php else: ?>
              <tr><td colspan="7"><i class="fa fa-exclamation-triangle"></i> <?php echo trans('admin.no_data_found_label'); ?></td></tr>
            <?php endif; ?>
          </tbody>
          <tfoot class="thead-dark">
            <th><?php echo e(trans('admin.order_id')); ?></th>
            <th><?php echo e(trans('admin.vendor_name_label')); ?></th>
            <th><?php echo e(trans('admin.order_total')); ?></th>
            <th><?php echo e(trans('admin.vendor_earning_label')); ?></th>
            <th><?php echo e(trans('admin.commision_label')); ?></th>
            <th><?php echo e(trans('admin.created_date_label')); ?></th>
            <th><?php echo e(trans('admin.status')); ?></th>
          </tfoot>
        </table>
          <br>  
        <div class="products-pagination"><?php echo $vendor_reports_log->appends(Request::capture()->except('page'))->render(); ?></div>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
$(document).ready(function(){
  $('.select2').select2();
});

var months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
Morris.Line({
  element: 'chart',
  data:<?php echo json_encode($vendor_reports); ?>,
  lineColors: ['#819C79', '#fc8710', '#FF6541'],
  xkey: 'date',
  ykeys: ['total_order','order_total_amount','commision'],
  labels: ['Number of Order', 'Order Totals', 'Commision'],
  xLabels: 'month',
  xLabelAngle: 45,
  hideHover:true,
  xLabelFormat: function (x) { return months[x.getMonth()]; },
  resize: true
});
</script>