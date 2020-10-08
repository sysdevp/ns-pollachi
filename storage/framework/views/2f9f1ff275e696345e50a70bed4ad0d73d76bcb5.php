<?php $__env->startSection('content'); ?>
<div class="col-12 body-sec">
  <div class="card">
    <!-- card header start@ -->
    <div class="card-header px-2">
      <div class="row">
        <div class="col-4">
          <h3> Item Tax Details </h3>
        </div>
        <div class="col-8 mr-auto">
          <ul class="h-right-btn mb-0 pl-0">
            <li><button type="button" class="btn btn-success"><a href="<?php echo e(url('master/item-tax-details')); ?>">Back </a></button></li>
          </ul>
        </div>
      </div>
    </div>
    <!-- card header end@ -->
    <div class="card-body">
      <table id="master" class="table table-striped table-bordered" style="width:100%">
        <thead>
          <tr>
            
            <?php $__currentLoopData = $taxes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <th><?php echo e($value->name); ?></th>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <th>Effective From Date</th>
          </tr>
        </thead>
        <tbody>
          
            <tr>
              <?php $__currentLoopData = $tax_value; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tax): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <td><?php echo e($tax->value); ?></td>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              <?php $__currentLoopData = $valid_from; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $valid_date): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <td><?php echo e($valid_date->valid_from); ?></td> 
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tr>
          
         
        </tbody>
      </table>

    </div>
    <!-- card body end@ -->
  </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ns_pollachi\resources\views/admin/master/item_tax_details/tax_details.blade.php ENDPATH**/ ?>