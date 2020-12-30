<?php $__env->startSection('content'); ?>
<main class="page-content">

<div class="col-12 body-sec">
  <div class="card">
    <!-- card header start@ -->
    <div class="card-header px-2">
      <div class="row">
        <div class="col-4">
          <h3>List Account Group Tax</h3>
        </div>
        <div class="col-8 mr-auto">
          <ul class="h-right-btn mb-0 pl-0">
            <li><button type="button" class="btn btn-success"><a href="<?php echo e(route('account_group_tax.create')); ?>">Add Account Group Tax</a></button></li>
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
            <th>Account Group Name</th>
            <th>Name Of Tax</th>
            <th>Rate Of Tax</th>
            <th>Type</th>
           <th>Action </th>
          </tr>
        </thead>
        <tbody>
          
          <?php $__currentLoopData = $account_group_tax; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
              <td><?php echo e($key+1); ?></td>
              <?php if($value->under == 'Primary'): ?>
              <td>Primary</td>
              <?php else: ?>
              <?php if(isset($value->under_data->name) && !empty($value->under_data->name)): ?>
              <td><?php echo e($value->under_data->name); ?></td>
              <?php endif; ?>
              <?php endif; ?>
              <td><?php echo e(@$value->taxes->name); ?></td>
              <td><?php echo e($value->tax_value); ?></td>
              <?php if($value->type == 1): ?>
              <td>Credit</td>
              <?php elseif($value->type == 2): ?>
              <td>Debit</td>
              <?php else: ?>
              <td></td>
              <?php endif; ?>
              <td> 
                <a href="<?php echo e(route('account_group_tax.show',$value->id)); ?>" class="px-2 py-1 bg-info text-white rounded"><i class="fa fa-eye" aria-hidden="true"></i></a>
                <a href="<?php echo e(route('account_group_tax.edit',$value->id)); ?>" class="px-2 py-1 bg-success text-white rounded"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                <a onclick="return confirm('Are you sure ?')" href="<?php echo e(url('account_group_tax/delete/'.$value->id )); ?>" class="px-2 py-1 bg-danger text-white rounded"><i class="fa fa-trash" aria-hidden="true"></i></a>
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
<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ns_pollachi\resources\views/admin/master/account_group_tax/view.blade.php ENDPATH**/ ?>