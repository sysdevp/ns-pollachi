<?php $__env->startSection('content'); ?>
<div class="col-12 body-sec">
  <div class="card container px-0">
    <!-- card header start@ -->
    <div class="card-header px-2">
      <div class="row">
        <div class="col-4">
          <h3>Edit Role </h3>
        </div>
        <div class="col-8 mr-auto">
          <ul class="h-right-btn mb-0 pl-0">
            <li><button type="button" class="btn btn-success"><a href="<?php echo e(url('master/role')); ?>">Back</a></button></li>
          </ul>
        </div>
      </div>
    </div>
    <!-- card header end@ -->
    <div class="card-body">
    
      <form  method="post" class="form-horizontal needs-validation" novalidate action="<?php echo e(url('master/role/update/'.$role->id)); ?>" enctype="multipart/form-data">
      <?php echo e(csrf_field()); ?>

      <span class="mandatory"> <?php echo e($errors->first('permission')); ?> </span>
        <div class="form-row">
          <div class="col-md-12">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-2 col-form-label">Role Name <span class="mandatory">*</span></label>
              <div class="col-sm-7">
                <input type="text" class="form-control name only_allow_alp_num_dot_com_amp" placeholder="Role Name" name="name" value="<?php echo e(old('name', $role->name)); ?>" required>
                <span class="mandatory"> <?php echo e($errors->first('name')); ?> </span>
                <div class="invalid-feedback">
                  Enter valid Role Name
                </div>
              </div>
            </div>
          </div>

          <div class="col-12 col-sm-12 col-md-12">
            <div class="form-group row">
                <p class="col-md-2">Permission:</p>
                <br/>
                <div class="col-md-10">
                    <div class="row">
                <?php $__currentLoopData = $permission; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <label class="col-md-3"> 
                     <input type="checkbox" name="permission[]" class="permission"  <?php echo e(in_array($value->id, $rolePermissions) ? "checked" : ""); ?> value="<?php echo e($value->id); ?>"  >  
                    <?php echo e($value->label); ?>

                </label>
                    
                  
                
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </div>
           

             

              </div>
            </div>
        </div>


 
         
        </div>
        <div class="col-md-7 text-right">
          <button class="btn btn-success" type="submit">Submit</button>
        </div>
      </form>
    </div>
    <!-- <script src="<?php echo e(asset('assets/js/master/capitalize.js')); ?>"></script> -->
    <!-- card body end@ -->
  </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ns_pollachi\resources\views/admin/master/role/edit.blade.php ENDPATH**/ ?>