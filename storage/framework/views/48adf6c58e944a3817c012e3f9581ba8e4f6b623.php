<?php $__env->startSection('content'); ?>
<div class="col-12 body-sec">
  <div class="card">
    <!-- card header start@ -->
    <div class="card-header px-2">
      <div class="row">
        <div class="col-4">
          <h3>List Cart</h3>
        </div>
        
      </div>
    </div>
    <!-- card header end@ -->
    <div class="card-body">
        <table id="master" class="table table-striped table-bordered" style="width:100%">
        <thead>
          <tr>
            <th>S.No</th>
            <th>Date</th>
            <th>Supplier Name</th>
            <th>Type</th>
            <th> Supplier Invoice No</th>
            <th> Supplier Delivery No</th>
            <th> Taxable Value</th>
            <th> Tax Value </th>
            <th> Load Bill</th>
            <th>Load Live</th>
            <th>Unload Bill</th>
            <th>Unload Live</th>
            
            
            <th>Action </th>
          </tr>
        </thead>
        <tbody>
          <?php 
          $count=1;
          ?>
          <?php $__currentLoopData = $cart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $carts): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          
            <tr>
              <td><?php echo e($count); ?></td>
              <td><?php echo e($carts->date); ?></td>
              <td><?php echo e($carts->name); ?></td>
              <?php if($carts->type == 1): ?>
              <td> Invoice </td>
              <?php else: ?>
              <td> Delivery Note </td>
              <?php endif; ?>
              <td><?php echo e($carts->supplier_invoice_number); ?></td>
              <td><?php echo e($carts->supplier_delivery_number); ?></td>
              <td><?php echo e($carts->taxable_value); ?></td>
              <td><?php echo e($carts->tax_value); ?></td>
              <td><?php echo e($carts->load_bill); ?></td>
              <td><?php echo e($carts->load_live); ?></td>
              <td><?php echo e($carts->unload_bill); ?></td>
              <td><?php echo e($carts->unload_live); ?></td>
              
              <td> 
                <a href="<?php echo e(route('cart.edit',$carts->cart_id)); ?>" class="px-3 py-0 btn btn-success text-white rounded"><i class="fa fa-plus" aria-hidden="true"></i></a>
              </td>
              <!-- <td> 
                <a href="<?php echo e(url('to_gatepass/cart',$carts->id)); ?>" class="px-3 py-0 bg-info text-white rounded"><i class="fa fa-pencil" aria-hidden="true"></i></a>
              </td> -->
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
<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ns_pollachi\resources\views/admin/cart/view.blade.php ENDPATH**/ ?>