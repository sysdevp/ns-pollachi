<?php $__env->startSection('content'); ?>
<div class="col-12 body-sec">
  <div class="card">
    <!-- card header start@ -->
    <div class="card-header px-2">
      <div class="row">
        <div class="col-4">
          <h3>List Purchase</h3>
        </div>
        <div class="col-8 mr-auto">
          <ul class="h-right-btn mb-0 pl-0">
            <li><button type="button" class="btn btn-success"><a href="<?php echo e(route('purchase.create')); ?>">Purchase</a></button></li>
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
            <th>Gate Pass No</th>
            <th>Voucher No </th>
            <th>Voucher Date </th>
            <th>Receipt Note No </th>
            <th>Supplier Invoice No </th>
            <th>Supplier Invoice Date </th>
            <th>Supplier Details </th>
            <th>Order Details </th>
            <th>Transport Details </th>
            <th>Remarks </th>
            <th>Supplier Invoice Value </th>
            <th>Total Amount</th>
            <th>Total Net Price</th>
           <th>Action </th>
          </tr>
        </thead>
        <tbody>
          <?php 
          $count=1;
          ?>
          <?php $__currentLoopData = $purchases; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $purchase): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          
            <tr>
              <td><?php echo e($count); ?></td>
              <td><a href="<?php echo e(url('purchase/item_details/'.$purchase->gatepass_id)); ?>"><?php echo e($purchase->gatepassentries_gatepass_no); ?></a></td>
              <td><?php echo e($purchase->voucher_no); ?></td>
              <td><?php echo e($purchase->voucher_date); ?></td>
              <td><?php echo e($purchase->receipt_note_no); ?></td>
              <td><?php echo e($purchase->supplier_invoice_no); ?></td>
              <td><?php echo e($purchase->supplier_invoice_date); ?></td>
              <td><?php echo e($purchase->supplier_details); ?></td>
              <td><?php echo e($purchase->order_details); ?></td>
              <td><?php echo e($purchase->transport_details); ?></td>
              <td><?php echo e($purchase->remarks); ?></td>
              <td><?php echo e($purchase->supplier_invoice_value); ?></td>
              <td><?php echo e($purchase->total_amount); ?></td>
              <td><?php echo e($purchase->total_price); ?></td>
              <td> 
                <a href="" class="px-2 py-1 bg-info text-white rounded"><i class="fa fa-eye" aria-hidden="true"></i></a>
                <a href="" class="px-2 py-1 bg-success text-white rounded"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                <a onclick="return confirm('Are you sure ?')" href="" class="px-2 py-1 bg-danger text-white rounded"><i class="fa fa-trash" aria-hidden="true"></i></a>
              </td>
            </tr>
            <?php
            $count++;
            ?>
          

         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
         
        </tbody>
      </table>

    </div>
    <!-- card body end@ -->
  </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ns_pollachi\resources\views/admin/purchase/view.blade.php ENDPATH**/ ?>