<?php $__env->startSection('content'); ?>
<div class="col-12 body-sec">
  <div class="card container px-0">
    <!-- card header start@ -->
    <div class="card-header px-2">
      <div class="row">
        <div class="col-4">
          <h3>Edit Item Tax Details </h3>
        </div>
        <div class="col-8 mr-auto">
          <ul class="h-right-btn mb-0 pl-0">
            <li><button type="button" class="btn btn-success"><a href="<?php echo e(url('master/item-tax-details')); ?>">Back</a></button></li>
          </ul>
        </div>
      </div>
    </div>
    <!-- card header end@ -->
    <div class="card-body">
    
      <form  method="post" class="form-horizontal needs-validation" novalidate action="<?php echo e(url('master/item-tax-details/update/'.$item_tax_details->id)); ?>" enctype="multipart/form-data">
      <?php echo e(csrf_field()); ?>

      <?php echo method_field('PATCH'); ?>

        <iv class="form-row">
          <div class="col-md-7">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Item Name</label>
              <div class="col-sm-8">
                <select class="js-example-basic-multiple form-control col-12 custom-select item_id" name="item_id" required>
                  <option value="<?php echo e($item_tax_details->item->id); ?>"><?php echo e($item_tax_details->item->name); ?></option>
                  <?php $__currentLoopData = $item; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <option value="<?php echo e($value->id); ?>" ><?php echo e($value->name); ?></option>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                
              </div>
            </div>
          </div>

          <div class="col-md-7">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Tax Name</label>
              <div class="col-sm-8">
                <select class="js-example-basic-multiple form-control col-12 custom-select tax_id" name="tax_id" required>
                  <option value="<?php echo e($item_tax_details->tax->id); ?>"><?php echo e($item_tax_details->tax->name); ?></option>
                  <?php $__currentLoopData = $tax; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <option value="<?php echo e($value->id); ?>" ><?php echo e($value->name); ?></option>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                
              </div>
            </div>
          </div>


          <div class="col-md-7">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Tax %</label>
              <div class="col-sm-8">
                <input type="text" class="form-control tax_value" placeholder="Tax %" name="tax_value" value="<?php echo e($item_tax_details->value); ?>">
              </div>
            </div>
          </div>


          <div class="col-md-7">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Effective From</label>
              <div class="col-sm-8">
                <input type="date" class="form-control valid_from" placeholder="GST %" name="valid_from" value="<?php echo e($item_tax_details->valid_from); ?>">
              </div>
            </div>
          </div>

          
         
          
        </div>
        <div class="col-md-7 text-right">
          <button class="btn btn-success" type="submit">Update</button>
        </div>
      </form>
      
    </div>
    <!-- card body end@ -->
  </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ns_pollachi\resources\views/admin/master/item_tax_details/edit.blade.php ENDPATH**/ ?>