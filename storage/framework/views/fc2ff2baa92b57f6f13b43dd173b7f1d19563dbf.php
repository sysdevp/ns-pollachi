<?php $__env->startSection('content'); ?>
<main class="page-content">

<div class="col-12 body-sec">
  <div class="card">
    <!-- card header start@ -->
    <div class="card-header px-2">
      <div class="row">
        <div class="col-4">
          <h3>List Employee</h3>
        </div>
        <div class="col-8 mr-auto">
          <ul class="h-right-btn mb-0 pl-0">
            <li><button type="button" class="btn btn-success"><a href="<?php echo e(url('master/employee/create')); ?>">Add Employee</a></button></li>
          </ul>
        </div>
      </div>
    </div>
    <!-- card header end@ -->
    <div class="card-body">
      <table id="master" class="table table-bordered table-hover">
        <thead>
          <tr>
            <th>S.No</th>
            <th>Employee Name</th>
            <th>Employee Code</th>
           <th>Phone No </th>
           <th>Email </th>
           <th>Department </th>
           <th>Action </th>
          </tr>
        </thead>
        <tbody>
          
          <?php $__currentLoopData = $employee; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
              <td><?php echo e($key+1); ?></td>
              <td><?php echo e($value->salutation); ?> <?php echo e($value->name); ?></td>
              <td><?php echo e($value->code); ?></td>
              <td><?php echo e($value->phone_no); ?></td>
              <td><?php echo e($value->email); ?></td>
              <td><?php echo e(isset($value->department->name) && !empty($value->department->name) ? $value->department->name : ""); ?></td>
           
              <td class="icon">
	<span class="tdshow">
                <a href="<?php echo e(url('master/employee/show/'.$value->id )); ?>" class="px-1 py-0 text-white rounded" title="View">><i class="fa fa-eye" aria-hidden="true"></i></a>
                <a href="<?php echo e(url('master/employee/edit/'.$value->id )); ?>" class="px-1 py-0  text-white rounded" title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                <a onclick="return confirm('Are you sure ?')" href="<?php echo e(url('master/employee/delete/'.$value->id )); ?>" class="px-1 py-0  text-white rounded" title="Delete"><i class="fa fa-trash" aria-hidden="true"></i></a>
				</span>
              </td>
            </tr>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
         
        </tbody>
      </table>

    </div>
    <!-- card body end@ -->
  </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ns_pollachi\resources\views/admin/master/employee/view.blade.php ENDPATH**/ ?>