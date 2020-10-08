<?php $__env->startSection('content'); ?>
<div class="col-12 body-sec">
  <div class="card">
    <!-- card header start@ -->
    <div class="card-header px-2">
      <div class="row">
        <div class="col-4">
          <h3>List Users</h3>
        </div>
        <div class="col-8 mr-auto">
         
          <ul class="h-right-btn mb-0 pl-0">
            <li><button type="button" class="btn btn-success"><a href="<?php echo e(url('master/user/create')); ?>">Add Users</a></button></li>
          </ul>
         
        </div>
      </div>
    </div>
    <!-- card header end@ -->
    <div class="card-body">
      <table id="master" class="table table-striped table-bordered" style="width:100%">
        <thead>
          <tr>
            <th>S.No</th>
            <th>User</th>
            <th> User Name</th>
            <th>Role</th>
             <th>Action </th>
          </tr>
        </thead>
        <tbody>
          <?php
              $i=0;
          ?>
          <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <?php if(isset($value->employee->name)): ?>
             <tr>
             <td><?php echo e($i+1); ?> </td>
              <td><?php echo e(isset($value->employee->name) ? $value->employee->name : ""); ?></td>
              <td><?php echo e($value->user_name); ?></td>
              <td><?php echo e($value->role->name); ?></td>
              
              
           
              <td> 
                <a href="<?php echo e(url('master/user/show/'.$value->id )); ?>" class="px-2 py-1 bg-info text-white rounded"><i class="fa fa-eye" aria-hidden="true"></i></a>
                <a href="<?php echo e(url('master/user/edit/'.$value->id )); ?>" class="px-2 py-1 bg-success text-white rounded"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                <a onclick="return confirm('Are you sure ?')" href="<?php echo e(url('master/user/delete/'.$value->id )); ?>" class="px-2 py-1 bg-danger text-white rounded"><i class="fa fa-trash" aria-hidden="true"></i></a>
              </td>
            </tr>
          <?php endif; ?>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
         
        </tbody>
      </table>

    </div>
    <!-- card body end@ -->
  </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ns_pollachi\resources\views/admin/master/user/view.blade.php ENDPATH**/ ?>