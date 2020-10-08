<?php $__env->startSection('content'); ?>

<div class="col-12 body-sec">
  <div class="card">
    <!-- card header start@ -->
    <div class="card-header px-2">
      <div class="row">
        <div class="col-4">
          <h3>List Account Head</h3>
        </div>
        <div class="col-8 mr-auto">
          <ul class="h-right-btn mb-0 pl-0">
            <li><button type="button" class="btn btn-success"><a href="<?php echo e(route('account_head.create')); ?>">Add Account Head</a></button></li>
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
            <th>Name</th>
            <th>Under</th>
            <th>Opening Balance</th>
            <th>Type</th>
           <th>Action </th>
          </tr>
        </thead>
        <tbody>
          
          <?php $__currentLoopData = $account_head; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
              <td><?php echo e($key+1); ?></td>
              <td><?php echo e($value->name); ?></td>
              <?php if($value->under == 'Primary'): ?>
              <td>Primary</td>
              <?php elseif($value->under == 'Cash'): ?>
              <td>Cash</td>
              <?php elseif($value->under == 'Bank'): ?>
              <td>Bank</td>
              <?php elseif($value->under == 'Incomes'): ?>
              <td>Incomes</td>
              <?php elseif($value->under == 'Expense'): ?>
              <td>Expense</td>
              <?php elseif($value->under == 'Assets'): ?>
              <td>Assets</td>
              <?php elseif($value->under == 'Liabilities'): ?>
              <td>Liabilities</td>
              <?php else: ?>
              <?php if(isset($value->under_data->name) && !empty($value->under_data->name)): ?>
              <td><?php echo e($value->under_data->name); ?></td>
              <?php endif; ?>
              <?php endif; ?>
              <td><?php echo e($value->opening_balance); ?></td>
              <?php if($value->dr_or_cr == 1): ?>
              <td>Credit</td>
              <?php elseif($value->dr_or_cr == 2): ?>
              <td>Debit</td>
              <?php elseif($value->dr_or_cr == ''): ?>
              <td></td>
              <?php endif; ?>
              <td> 
                <a href="<?php echo e(route('account_head.show',$value->id)); ?>" class="px-2 py-1 bg-info text-white rounded"><i class="fa fa-eye" aria-hidden="true"></i></a>
                <a href="<?php echo e(route('account_head.edit',$value->id)); ?>" class="px-2 py-1 bg-success text-white rounded"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                <a onclick="return confirm('Are you sure ?')" href="<?php echo e(url('account_head/delete/'.$value->id )); ?>" class="px-2 py-1 bg-danger text-white rounded"><i class="fa fa-trash" aria-hidden="true"></i></a>
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
<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ns_pollachi\resources\views/admin/master/account_head/view.blade.php ENDPATH**/ ?>