<form class="form-horizontal" method="get" action="<?php echo e($action_url); ?>" enctype="multipart/form-data">
  <div class="row">
    <div class="col-12">
      <div class="filter-elements">
        <div class="filter-label"><?php echo trans('admin.vendor_name_label'); ?>:</div>
        <div class="filter-input">
          <select name="vendor_name" id="vendor_name" class="select2" style="width:250px;"> 
            <option value=""><?php echo trans('admin.select_a_vendor'); ?></option>
            <?php if(count($all_vendor) > 0): ?>
              <?php $__currentLoopData = $all_vendor; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vendor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($vendor->name == $vendor_name): ?>
                <option selected="selected" value="<?php echo e($vendor->name); ?>"><?php echo $vendor->display_name; ?></option>
                <?php else: ?>
                <option value="<?php echo e($vendor->name); ?>"><?php echo $vendor->display_name; ?></option>
                <?php endif; ?>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
          </select>  
        </div>
      </div>&nbsp;&nbsp;

      <div class="filter-elements">
        <div class="filter-label"><?php echo trans('admin.from_label'); ?>:</div>
        <div class="filter-input"><input type="text" readonly="readonly" name="date_from" id="filter_date_from" class="form-control" value="<?php echo e($start_date); ?>"></div>
      </div>&nbsp;&nbsp;

      <div class="filter-elements">
        <div class="filter-label"><?php echo trans('admin.only_to_label'); ?>:</div>
        <div class="filter-input"><input type="text" readonly="readonly" name="date_to" id="filter_date_to" class="form-control" value="<?php echo e($current_date); ?>"></div>
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
  $('#filter_date_from, #filter_date_to').datepicker({ format: 'yyyy-mm-dd'});
});

Morris.Line({
    element: 'chart',
    data:<?php echo json_encode($vendor_reports); ?>,
    lineColors: ['#819C79', '#fc8710', '#FF6541'],
    xkey: 'dates',
    ykeys: ['total_order','order_total_amount','commision'],
    labels: ['Number of Order', 'Order Totals', 'Commision'],
    xLabels: 'day',
    xLabelAngle: 45,
    hideHover:true,
    xLabelFormat: function (d) {
      var weekdays = new Array(7);
      weekdays[0] = "SUN";
      weekdays[1] = "MON";
      weekdays[2] = "TUE";
      weekdays[3] = "WED";
      weekdays[4] = "THU";
      weekdays[5] = "FRI";
      weekdays[6] = "SAT";

      return weekdays[d.getDay()] + '-' + 
             ("0" + (d.getMonth() + 1)).slice(-2) + '-' + 
             ("0" + (d.getDate())).slice(-2);
    },
    resize: true
  });  
</script>
