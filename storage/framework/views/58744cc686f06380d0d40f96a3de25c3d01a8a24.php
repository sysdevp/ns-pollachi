<?php $__env->startSection('content'); ?>
<main class="page-content">

		
	<div class="container-fuild">
    <div id="page-content-wrapper">
<div class="col-12 body-sec">
  <div class="card">
    <!-- card header start@ -->
    <div class="card-header px-2">
      <div class="row">
        <div class="col-4">
          <h3>List State</h3>
        </div>
        <div class="col-8 mr-auto">
          <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('state_create')): ?>
          <ul class="h-right-btn mb-0 pl-0">
            <li><button type="button" class="btn btn-success"><a href="<?php echo e(url('master/state/create')); ?>">Add State</a></button></li>
          </ul>
          <?php endif; ?>
        </div>
      </div>
    </div>
    <!-- card header end@ -->
    <div class="card-body">
      <table id="master" class="table table-striped table-bordered" style="width:100%">
        <thead>
          <tr>
            <th>S.No</th>
            <th>Name</th>
            <th>Code</th>
            <th>Remarks</th>
            <th>Action </th>
          </tr>
        </thead>
        <tbody>
          
          <?php $__currentLoopData = $state; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
              <td><?php echo e($key+1); ?></td>
              <td><?php echo e($value->name); ?></td>
              <td><?php echo e($value->code); ?></td>
              <td><?php echo e($value->remark); ?></td>
              <td> 
                  <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('state_list')): ?>
                <a href="<?php echo e(url('master/state/show/'.$value->id )); ?>" class="px-1 py-0 bg-info text-white rounded"><i class="fa fa-eye" aria-hidden="true"></i></a>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('state_edit')): ?>
                <a href="<?php echo e(url('master/state/edit/'.$value->id )); ?>" class="px-1 py-0 bg-success text-white rounded"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('state_delete')): ?>
                <a onclick="return confirm('Are you sure ?')" href="<?php echo e(url('master/state/delete/'.$value->id )); ?>" class="px-1 py-0 bg-danger text-white rounded"><i class="fa fa-trash" aria-hidden="true"></i></a>
                <?php endif; ?>
                
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
<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ns_pollachi\resources\views/admin/master/state/view.blade.php ENDPATH**/ ?>