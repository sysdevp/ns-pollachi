<?php $__env->startSection('content'); ?>
<main class="page-content">

<div class="col-12 body-sec">
  <div class="card">
    <!-- card header start@ -->
    <div class="card-header px-2">
      <div class="row">
        <div class="col-4">
          <h3>List Purchase Order</h3>
        </div>
        <div class="col-8 mr-auto">
          <ul class="h-right-btn mb-0 pl-0">
            <?php if($check_id != 1): ?>
            <li><button type="button" class="btn btn-success"><a href="<?php echo e(route('purchase_order.create')); ?>">Purchase Order</a></button></li>
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
            <th>Estimation No </th>
            <th>Estimation Date </th>
            <th>Supplier Name</th>
            <th>Location</th>
            <th>Purchase Type</th>
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
          <?php $__currentLoopData = $purchaseorder; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
              <td><?php echo e($key+1); ?></td>
              <td><?php echo e($value->po_no); ?></td>
              <td><?php echo e($value->po_date); ?></td>
              <td><?php echo e($value->estimation_no); ?></td>
              <td><?php echo e($value->estimation_date); ?></td>
              <?php if(isset($value->supplier->name) && !empty($value->supplier->name)): ?>
              <td><?php echo e($value->supplier->name); ?></td>
              <?php else: ?>
              <td></td>
              <?php endif; ?>

              <?php if(isset($value->locations->name) && !empty($value->locations->name)): ?>
              <td><?php echo e($value->locations->name); ?></td>
              <?php else: ?>
              <td></td>
              <?php endif; ?>

              <?php if($value->purchase_type == 1): ?>
              <td>Cash Purchase</td>
              <?php else: ?>
              <td>Credit Purchase</td>
              <?php endif; ?>
              <td><?php echo e($total_discount[$key]); ?></td>
              <!-- <td><?php echo e($value->round_off); ?></td> -->
              <td><?php echo e($expense_total[$key]); ?></td>
              <td><?php echo e($taxable_value[$key]); ?></td>
              <td><?php echo e($tax_value[$key]); ?></td>
              <td><?php echo e($total[$key]); ?></td>
              <td> 
                <?php if($value->status == 0): ?>
                <a href="<?php echo e(route('purchase_order.show',$value->po_no)); ?>" class="px-2 py-1 bg-info text-white rounded"><i class="fa fa-eye" aria-hidden="true"></i></a>
                <a href="<?php echo e(route('purchase_order.edit',$value->po_no)); ?>" class="px-2 py-1 bg-success text-white rounded"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                <a href="<?php echo e(url('purchase_order/delete/'.$value->po_no )); ?>" onclick="return confirm('Are you sure ?')" class="px-2 py-1 bg-danger text-white rounded"><i class="fa fa-trash" aria-hidden="true"></i></a>

                <a href="<?php echo e(url('purchase_order/cancel/'.$value->po_no)); ?>" class="px-2 py-1 bg-warning text-white rounded">Cancel</a>

                <br><br>
                <a href="<?php echo e(url('purchase_order/item_details/'.$value->po_no )); ?>" class="px-1 py-0 bg-info text-white rounded"><i class="fa fa-eye" aria-hidden="true"></i>Item Details</a>
                <a href="<?php echo e(url('purchase_order/expense_details/'.$value->po_no )); ?>" class="px-1 py-0 bg-info text-white rounded"><i class="fa fa-eye" aria-hidden="true"></i>Expense Details</a>
                <?php else: ?>
                <a href="<?php echo e(url('purchase_order/retrieve/'.$value->po_no)); ?>" class="px-2 py-1 bg-primary text-white rounded">Retrieve</a>
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
<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ns_pollachi\resources\views/admin/purchaseorder/view.blade.php ENDPATH**/ ?>