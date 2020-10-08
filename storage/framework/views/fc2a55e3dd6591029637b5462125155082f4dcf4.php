<?php $__env->startSection('content'); ?>
<div class="col-12 body-sec">
  <div class="card container px-0">
    <!-- card header start@ -->
    <div class="card-header px-2">
      <div class="row">
        <div class="col-4">
          <h3>View Item Tax Details</h3>
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
      <div class="form-row">
        <div class="col-md-6">
          <div class="form-group row">
            <label for="validationCustom01" class="col-sm-4 col-form-label">Item Name :</label>
            <label for="validationCustom01" class="col-sm-4 col-form-label"> <?php echo e($item_tax_details->item->name); ?></label>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group row">
            <label for="validationCustom01" class="col-sm-4 col-form-label">Item Code :</label>
            <label for="validationCustom01" class="col-sm-4 col-form-label"><?php echo e($item_tax_details->item->code); ?> </label>
          </div>
        </div>

        
            <?php $__currentLoopData = $tax; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <div class="col-md-6">
                  <div class="form-group row">
                    <label for="validationCustom01" class="col-sm-4 col-form-label"><?php echo e($value->name); ?> (%) :</label>
                    <label for="validationCustom01" class="col-sm-4 col-form-label"><?php echo e($item_tax_details->value); ?> </label>
                  </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    <div class="col-md-6">
                        <div class="form-group row">
                          <label for="validationCustom01" class="col-sm-4 col-form-label">Effective From :</label>
                          <label for="validationCustom01" class="col-sm-4 col-form-label"><?php echo e($item_tax_details->valid_from !="" ? date('d-m-Y',strtotime($item_tax_details->valid_from))  : ""); ?> </label>
                        </div>
                      </div>






          


                          

        
      </div>
    </div>
    <!-- card body end@ -->
  </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ns_pollachi\resources\views/admin/master/item_tax_details/show.blade.php ENDPATH**/ ?>