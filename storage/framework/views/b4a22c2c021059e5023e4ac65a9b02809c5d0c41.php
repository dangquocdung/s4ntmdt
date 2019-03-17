<?php $__env->startSection('title', trans('admin.user_role_list_title') .' < '. get_site_title()); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
  <div class="col-6">
    <h5><?php echo trans('admin.user_role_list_title'); ?></h5>
  </div>
  <div class="col-6">
    <div class="pull-right">
      <a href="<?php echo e(route('admin.add_roles')); ?>" class="btn btn-primary pull-right btn-sm"><?php echo e(trans('admin.add_new_role_title')); ?></a>
    </div>  
  </div>
</div>
<br>

<div class="row">
  <div class="col-12">
    <div class="box">
      <div class="box-body">
        <div id="table_search_option">
          <form action="<?php echo e(route('admin.users_roles_list')); ?>" method="GET"> 
            <div class="row">
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="input-group">
                  <input type="text" name="term_user_role" class="search-query form-control" placeholder="Enter user role to search" value="<?php echo e($search_value); ?>" />
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
        <table id="table_for_user_list" class="table table-bordered admin-data-table admin-data-list">
          <thead class="thead-dark">
            <tr>
              <th><?php echo e(trans('admin.user_role_list_table_header_title_1')); ?></th>
              <th><?php echo e(trans('admin.action')); ?></th>
            </tr>
          </thead>
          <tbody>
            <?php if(count($user_role_list_data)>0): ?>
            <?php $__currentLoopData = $user_role_list_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
              <td><?php echo $row['role_name']; ?></td> 
              <td>
                <?php if(($row['slug'] == 'vendor') || ($row['slug'] == 'site-user')): ?> 
                  <?php echo trans('admin.no_permission_label'); ?>

                <?php else: ?>
                  <div class="btn-group">
                    <button class="btn btn-success btn-flat" type="button"><?php echo e(trans('admin.action')); ?></button>
                    <button data-toggle="dropdown" class="btn btn-success btn-flat dropdown-toggle" type="button">
                      <span class="caret"></span>
                      <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    <ul role="menu" class="dropdown-menu">
                      <li><a href="<?php echo e(route('admin.update_roles', $row['id'])); ?>"><i class="fa fa-edit"></i><?php echo e(trans('admin.edit')); ?></a></li>
                      <?php if($row['slug'] != 'administrator'): ?>
                      <li><a class="remove-selected-data-from-list" data-track_name="user_roles" data-id="<?php echo e($row['id']); ?>" href="#"><i class="fa fa-remove"></i><?php echo e(trans('admin.delete')); ?></a></li>
                      <?php endif; ?>
                    </ul>
                  </div>
                <?php endif; ?>
              </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
          </tbody>
          <tfoot class="thead-dark">
            <tr>
              <th><?php echo e(trans('admin.user_role_list_table_header_title_1')); ?></th>
              <th><?php echo e(trans('admin.action')); ?></th>
            </tr>
          </tfoot>
        </table>
          <br>
        <div class="products-pagination"><?php echo $user_role_list_data->appends(Request::capture()->except('page'))->render(); ?></div>
      </div>
    </div>
  </div>
</div>
<div class="eb-overlay"></div>
<div class="eb-overlay-loader"></div>

<input type="hidden" name="_token" id="_token" value="<?php echo e(csrf_token()); ?>">
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>