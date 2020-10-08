<?php $__env->startSection('content'); ?>
<div class="col-12 body-sec">
  <div class="card container px-0">
    <!-- card header start@ -->
    <div class="card-header px-2">
      <div class="row">
        <div class="col-4">
          <h3>View Sales Men</h3>
        </div>
        <div class="col-8 mr-auto">
          <ul class="h-right-btn mb-0 pl-0">
            <li><button type="button" class="btn btn-success"><a href="<?php echo e(route('sales_man.index')); ?>">Back</a></button></li>
          </ul>
        </div>
      </div>
    </div>
    <!-- card header end@ -->
    <div class="card-body">
      <div class="form-row">
        <div class="col-md-7">
          <div class="form-group row">
            <label for="validationCustom01" class="col-sm-4 col-form-label">Name :</label>
            <label for="validationCustom01" class="col-sm-4 col-form-label"> <?php echo e($sales_man->name); ?></label>
          </div>
        </div>
        <div class="col-md-7">
          <div class="form-group row">
            <label for="validationCustom01" class="col-sm-4 col-form-label">Employee Code :</label>
            <label for="validationCustom01" class="col-sm-4 col-form-label"><?php echo e($sales_man->code); ?> </label>
          </div>
        </div>

        <div class="col-md-7">
          <div class="form-group row">
            <label for="validationCustom01" class="col-sm-4 col-form-label">Address :</label>
            <label for="validationCustom01" class="col-sm-4 col-form-label"><?php echo e($sales_man->address); ?> </label>
          </div>
        </div>

        <div class="col-md-7">
          <div class="form-group row">
            <label for="validationCustom01" class="col-sm-4 col-form-label">Phone No:</label>
            <label for="validationCustom01" class="col-sm-4 col-form-label"><?php echo e($sales_man->phone_no); ?> </label>
          </div>
        </div>

        <div class="col-md-7">
          <div class="form-group row">
            <label for="validationCustom01" class="col-sm-4 col-form-label">Email Id :</label>
            <label for="validationCustom01" class="col-sm-4 col-form-label"><?php echo e($sales_man->email); ?> </label>
          </div>
        </div>
        
      </div>
    </div>
    <!-- card body end@ -->
  </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ns_pollachi\resources\views/admin/master/sales_man/show.blade.php ENDPATH**/ ?>