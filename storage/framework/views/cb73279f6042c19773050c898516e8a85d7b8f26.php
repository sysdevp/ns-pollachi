<?php $__env->startSection('content'); ?>
<div class="col-12 body-sec">
  <div class="card">
    <!-- card header start@ -->
    <div class="card-header px-2">
      <div class="row">
        <div class="col-4">
          <h3>Purchased Item Details</h3>
        </div>
        <div class="col-8 mr-auto">
          <ul class="h-right-btn mb-0 pl-0">
            <li><button type="button" class="btn btn-success"><a href="<?php echo e(route('purchase.index')); ?>">Back</a></button></li>
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
            <th>Invoice S.No</th>
           <th>Item Code</th>
           <th>Item Name</th>
           <th>MRP</th>
           <th>HSN</th>
           <th>Quantity</th>
           <th>Tax Rate</th>
           <th>Rate Exclusive Tax</th>
           <th>Rate Inclusive Tax</th>
           <th>Amount</th>
           <th>Discount</th>
           <th>Net Price</th>
           <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php 
          $count=1;
          ?>
          <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <?php if($item->item_code == ''): ?>
          <?php else: ?>
            <tr>
              <td><?php echo e($count); ?></td>
              <td><?php echo e($item->invoice_no); ?></td>
              <td><?php echo e($item->code); ?></td>
              <td><?php echo e($item->item_name); ?></td>
              <td><?php echo e($item->mrp); ?></td>
              <td><?php echo e($item->hsn); ?></td>
              <td><?php echo e($item->quantity); ?></td>
              <td><?php echo e($item->tax_rate); ?></td>
              <td><?php echo e($item->rate_exclusive); ?></td>
              <td><?php echo e($item->rate_inclusive); ?></td>
              <td><?php echo e($item->amount); ?></td>
              <td><?php echo e($item->discount); ?></td>
              <td><?php echo e($item->net_price); ?></td>
              <td> 
                <a href="" class="px-2 py-1 bg-info text-white rounded"><i class="fa fa-eye" aria-hidden="true"></i></a>
                <a href="" class="px-2 py-1 bg-success text-white rounded"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                <a onclick="return confirm('Are you sure ?')" href="" class="px-2 py-1 bg-danger text-white rounded"><i class="fa fa-trash" aria-hidden="true"></i></a>
              </td>
            </tr>
            <?php
            $count++;
            ?>
          
          <?php endif; ?>
         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
         
        </tbody>
      </table>

    </div>
    <!-- card body end@ -->
  </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ns_pollachi\resources\views/admin/purchase/item_details.blade.php ENDPATH**/ ?>