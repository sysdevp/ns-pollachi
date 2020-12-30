<?php $__env->startSection('content'); ?>
<main class="page-content">

<div class="col-12 body-sec">
  <div class="card">
    <!-- card header start@ -->
    <div class="card-header px-2">
      <div class="row">
        <div class="col-4">
          <h3>List Rejection In</h3>
        </div>
        <div class="col-8 mr-auto">
          <ul class="h-right-btn mb-0 pl-0">
            <?php if($check_id != 1): ?>
            <li><button type="button" class="btn btn-success"><a href="<?php echo e(route('rejection_in.create')); ?>">Rejection In</a></button></li>
            <?php else: ?>
            <?php endif; ?>
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
            <th>Voucher No </th>
            <th>Voucher Date </th>
            <th>Sale Entry No </th>
            <th>Sale Entry Date </th>
            <th>Delivery Note No</th>
            <th>Delivery Note Date</th>
            <th>Sale Order No</th>
            <th>Sale Order Date</th>
            <th>Customer Name</th>
            <th>Sales Man Name</th>
            <th>Location</th>
            <th>overall Discount</th>
            <!-- <th>Round Off</th> -->
            <th>Total Expense</th>
            <th>Taxable Value</th>
            <th>Tax Value</th>
            <th>Net Value</th>
           <th>Action </th>
          </tr>
        </thead>
        <tbody>
          <?php $__currentLoopData = $rejection_in; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
              <td><?php echo e($key+1); ?></td>
              <td><?php echo e($value->r_in_no); ?></td>
              <td><?php echo e($value->r_in_date); ?></td>
              <td><?php echo e($value->s_no); ?></td>
              <td><?php echo e($value->s_date); ?></td>
              <td><?php echo e($value->d_no); ?></td>
              <td><?php echo e($value->d_date); ?></td>
              <td></td>
              <td></td>
              <?php if(isset($value->customer->name) && !empty($value->customer->name)): ?>
              <td><?php echo e($value->customer->name); ?></td>
              <?php else: ?>
              <td></td>
              <?php endif; ?>
              <?php if(isset($value->salesman->name) && !empty($value->salesman->name)): ?>
              <td><?php echo e($value->salesman->name); ?></td>
              <?php else: ?>
              <td></td>
              <?php endif; ?>
              <td><?php echo e(@$value->locations->name); ?></td>
              <td><?php echo e($total_discount[$key]); ?></td>
              <!-- <td><?php echo e($value->round_off); ?></td> -->
              <td><?php echo e($expense_total[$key]); ?></td>
              <td><?php echo e($taxable_value[$key]); ?></td>
              <td><?php echo e($tax_value[$key]); ?></td>
              <td><?php echo e($total[$key]); ?></td>
              <td> 
                <!-- <a href="<?php echo e(route('rejection_in.show',$value->r_in_no)); ?>" class="px-2 py-1 bg-info text-white rounded"><i class="fa fa-eye" aria-hidden="true"></i></a> -->
                <?php if($value->cancel_status == 0): ?>
                <?php if($value->d_no == ''): ?>
                <a href="<?php echo e(url('rejection_in/delete/'.$value->s_no )); ?>" onclick="return confirm('Are you sure ?')" class="px-2 py-1 bg-danger text-white rounded"><i class="fa fa-trash" aria-hidden="true"></i></a>
                <?php else: ?>
                <a href="<?php echo e(url('rejection_in/delete/'.$value->d_no )); ?>" onclick="return confirm('Are you sure ?')" class="px-2 py-1 bg-danger text-white rounded"><i class="fa fa-trash" aria-hidden="true"></i></a>
                <?php endif; ?>
                <a href="<?php echo e(url('rejection_in/cancel/'.$value->r_in_no)); ?>" class="px-2 py-1 bg-warning text-white rounded">Cancel</a>
                <br><br>
                <a href="<?php echo e(url('rejection_in/item_details/'.$value->r_in_no )); ?>" class="px-1 py-0 bg-info text-white rounded"><i class="fa fa-eye" aria-hidden="true"></i>Rejected Item Details</a>
                <a href="<?php echo e(url('rejection_in/expense_details/'.$value->r_in_no )); ?>" class="px-1 py-0 bg-info text-white rounded"><i class="fa fa-eye" aria-hidden="true"></i>Expense Details</a>
                <?php else: ?>
                <a href="<?php echo e(url('rejection_in/retrieve/'.$value->r_in_no)); ?>" class="px-2 py-1 bg-primary text-white rounded">Retrieve</a>
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
<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ns_pollachi\resources\views/admin/rejection_in/view.blade.php ENDPATH**/ ?>