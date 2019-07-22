<?php $__env->startSection('title', trans('admin.earning_reports_label') .' < '. get_site_title()); ?>

<?php $__env->startSection('content'); ?>
<div id="reports_type_list">
  <h3><?php echo trans('admin.reports'); ?></h3><hr>  
  <ul>
    <li><a <?php echo $tab_activation['day']; ?> href="<?php echo e(route('admin.earning_reports_content_by_tab', 'by-day')); ?>"><?php echo trans('admin.by_day_label'); ?> </a> | </li>
    <li><a <?php echo $tab_activation['year']; ?>  href="<?php echo e(route('admin.earning_reports_content_by_tab', 'by-year')); ?>"><?php echo trans('admin.by_year_label'); ?> </a> | </li>
    <li><a <?php echo $tab_activation['vendor']; ?>  href="<?php echo e(route('admin.earning_reports_content_by_tab', 'by-vendor')); ?>"><?php echo trans('admin.by_vendor_label'); ?> </a></li>
  </ul><br> 
  
  <?php if(Request::is('admin/vendors/earning-reports') || Request::is('admin/vendors/earning-reports/by-day')): ?>
    <?php echo $__env->make('pages.admin.vendors.report-by-day', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  <?php elseif(Request::is('admin/vendors/earning-reports/by-year')): ?>
    <?php echo $__env->make('pages.admin.vendors.report-by-year', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  <?php elseif(Request::is('admin/vendors/earning-reports/by-vendor')): ?>
    <?php echo $__env->make('pages.admin.vendors.report-by-vendor', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>