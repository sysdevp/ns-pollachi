<?php $__env->startSection('content'); ?>
<div class="col-12 body-sec">
  <div class="card">
    <!-- card header start@ -->
    <div class="card-header px-2">
      <div class="row">
        <div class="col-4">
          <h3>List Rejection Out</h3>
        </div>
        <div class="col-8 mr-auto">
          <ul class="h-right-btn mb-0 pl-0">
            <?php if($check_id != 1): ?>
            <li><button type="button" class="btn btn-success"><a href="<?php echo e(route('rejection_out.create')); ?>">Rejection Out</a></button></li>
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
            <th>Purchase Entry No </th>
            <th>Purchase Entry Date </th>
            <th>Receipt Note No</th>
            <th>Receipt Note Date</th>
            <th>Purchase Order No</th>
            <th>Purchase Order Date</th>
            <th>Supplier Name</th>
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
          <?php $__currentLoopData = $rejection_out; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
              <td><?php echo e($key+1); ?></td>
              <td><?php echo e($value->r_out_no); ?></td>
              <td><?php echo e($value->r_out_date); ?></td>
              <td><?php echo e($value->p_no); ?></td>
              <td><?php echo e($value->p_date); ?></td>
              <td><?php echo e($value->rn_no); ?></td>
              <td><?php echo e($value->rn_date); ?></td>
              <td></td>
              <td></td>
              <?php if(isset($value->supplier->name) && !empty($value->supplier->name)): ?>
              <td><?php echo e($value->supplier->name); ?></td>
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
                <!-- <a href="<?php echo e(route('rejection_out.show',$value->r_out_no)); ?>" class="px-2 py-1 bg-info text-white rounded"><i class="fa fa-eye" aria-hidden="true"></i></a> -->
                <?php if($value->cancel_status == 0): ?>
                <?php if($value->rn_no == ''): ?>
                <a href="<?php echo e(url('rejection_out/delete/'.$value->p_no,$value->r_out_no )); ?>" onclick="return confirm('Are you sure ?')" class="px-2 py-1 bg-danger text-white rounded"><i class="fa fa-trash" aria-hidden="true"></i></a>
                <?php else: ?>
                <a href="<?php echo e(url('rejection_out/delete/'.$value->rn_no,$value->r_out_no )); ?>" onclick="return confirm('Are you sure ?')" class="px-2 py-1 bg-danger text-white rounded"><i class="fa fa-trash" aria-hidden="true"></i></a>
                
                <?php endif; ?>
                
                
                <a href="<?php echo e(url('rejection_out/cancel/'.$value->r_out_no)); ?>" class="px-2 py-1 bg-warning text-white rounded">Cancel</a>
                <br><br>
                <a href="<?php echo e(url('rejection_out/item_details/'.$value->r_out_no )); ?>" class="px-1 py-0 bg-info text-white rounded"><i class="fa fa-eye" aria-hidden="true"></i>Rejected Item Details</a>
                <a href="<?php echo e(url('rejection_out/expense_details/'.$value->r_out_no )); ?>" class="px-1 py-0 bg-info text-white rounded"><i class="fa fa-eye" aria-hidden="true"></i>Expense Details</a>
                <?php else: ?>

                <a href="<?php echo e(url('rejection_out/retrieve/'.$value->r_out_no)); ?>" class="px-2 py-1 bg-primary text-white rounded">Retrieve</a>
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
<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ns_pollachi\resources\views/admin/rejection_out/view.blade.php ENDPATH**/ ?>