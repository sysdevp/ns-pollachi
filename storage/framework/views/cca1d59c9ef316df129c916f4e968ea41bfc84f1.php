<?php $__env->startSection('content'); ?>
<div class="col-12 body-sec">
  <div class="card container px-0">
    <!-- card header start@ -->
    <div class="card-header px-2">
      <div class="row">
        <div class="col-4">
          <h3>View Location</h3>
        </div>
        <div class="col-8 mr-auto">
          <ul class="h-right-btn mb-0 pl-0">
            <li><button type="button" class="btn btn-success"><a href="<?php echo e(url('master/location')); ?>">Back</a></button></li>
          </ul>
        </div>
      </div>
    </div>
    <!-- card header end@ -->
    <div class="card-body">
      <div class="form-row">
        <div class="col-md-6">
          <div class="form-group row">
            <label for="validationCustom01" class="col-sm-4 col-form-label">Location Name :</label>
            <label for="validationCustom01" class="col-sm-4 col-form-label"> <?php echo e($location->name); ?></label>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group row">
            <label for="validationCustom01" class="col-sm-4 col-form-label">Location Type :</label>
            <label for="validationCustom01" class="col-sm-4 col-form-label"><?php echo e(isset($location->location_type->name) && !empty($location->location_type->name) ? $location->location_type->name : ""); ?> </label>
          </div>
        </div>
        <div class="col-md-7">
          <div class="form-group row">
            <label for="validationCustom01" class="col-sm-4 col-form-label">Address :</label>
            <label for="validationCustom01" class="col-sm-4 col-form-label">
            <?php if($location->address_line_1 != ""): ?>
                  <?php echo e($location->address_line_1); ?>,</br>
                  <?php endif; ?>
                  <?php if($location->address_line_2 != ""): ?>
                  <?php echo e($location->address_line_2); ?>,</br>
                  <?php endif; ?>
                  
                  <?php if($location->land_mark != "" || $location->city->name != ""  || $location->district->name != "" ): ?>
                  <?php if($location->land_mark != ""): ?>
                  <?php echo e($location->land_mark); ?>,
                  <?php endif; ?>
                  <?php if(isset($location->city->name) && $location->city->name != ""): ?>
                  <?php echo e($location->city->name); ?>,
                  <?php endif; ?>

                  <?php if(isset($location->district->name) && $location->district->name != ""): ?>
                  <?php echo e($location->district->name); ?>,
                  <?php endif; ?>
</br>
<?php endif; ?>
                  <?php if(isset($location->state->name) && $location->state->name != ""): ?>
                  <?php echo e($location->state->name); ?>

                  <?php endif; ?>
                  <?php if($location->postal_code != ""): ?>
                 - <?php echo e($location->postal_code); ?>,</br>
                  <?php endif; ?>    
          
          </label>
          </div>
        </div>
      </div>
    </div>
    <!-- card body end@ -->
  </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ns_pollachi\resources\views/admin/master/location/show.blade.php ENDPATH**/ ?>