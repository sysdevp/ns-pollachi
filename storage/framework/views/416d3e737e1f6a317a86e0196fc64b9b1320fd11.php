<?php $__env->startSection('content'); ?>
<div class="col-12 body-sec">
  <div class="card">
    <!-- card header start@ -->
    <div class="card-header px-2">
      <div class="row">
        <div class="col-4">
          <h3>List Purchase Gatepass Entry</h3>
        </div>
        <div class="col-8 mr-auto">
          <ul class="h-right-btn mb-0 pl-0">
            <?php if($check_id != 1): ?>
            <li><button type="button" class="btn btn-success"><a href="<?php echo e(route('purchase_gatepass_entry.create')); ?>">Purchase Gatepass Entry</a></button></li>
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
            <th>Supplier Name</th>
            <th>Load Live</th>
            <th>Unload Live</th>
            <th>Load Bill</th>
            <th>Unload Bill</th>
           <th>Action </th>
          </tr>
        </thead>
        <tbody>
          <?php $__currentLoopData = $purchase_gatepass; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
              <td><?php echo e($key+1); ?></td>
              <td><?php echo e($value->purchase_gatepass_no); ?></td>
              <td><?php echo e($value->purchase_gatepass_date); ?></td>
              <?php if(isset($value->supplier->name) && !empty($value->supplier->name)): ?>
              <td><?php echo e($value->supplier->name); ?></td>
              <?php else: ?>
              <td></td>
              <?php endif; ?>
              
              <td><?php echo e($value->load_live); ?></td>
              <td><?php echo e($value->unload_live); ?></td>
              <td><?php echo e($value->load_bill); ?></td>
              <td><?php echo e($value->unload_bill); ?></td>
              <td> 
                <a href="<?php echo e(route('purchase_gatepass_entry.show',$value->purchase_gatepass_no)); ?>" class="px-2 py-1 bg-info text-white rounded"><i class="fa fa-eye" aria-hidden="true"></i></a>
                <a href="<?php echo e(route('purchase_gatepass_entry.edit',$value->purchase_gatepass_no)); ?>" class="px-2 py-1 bg-success text-white rounded"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                <a href="<?php echo e(url('purchase_gatepass_entry/delete/'.$value->purchase_gatepass_no )); ?>" onclick="return confirm('Are you sure ?')" class="px-2 py-1 bg-danger text-white rounded"><i class="fa fa-trash" aria-hidden="true"></i></a>

                
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
<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ns_pollachi\resources\views/admin/purchase_gatepass/view.blade.php ENDPATH**/ ?>