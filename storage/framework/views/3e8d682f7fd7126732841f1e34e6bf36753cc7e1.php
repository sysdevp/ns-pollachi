<?php $__env->startSection('content'); ?>
<div class="col-12 body-sec">
  <div class="card container px-0">
    <!-- card header start@ -->
    <div class="card-header px-2">
      <div class="row">
        <div class="col-4">
          <h3>Edit User </h3>
        </div>
        <div class="col-8 mr-auto">
          <ul class="h-right-btn mb-0 pl-0">
            <li><button type="button" class="btn btn-success"><a href="<?php echo e(url('master/user')); ?>">Back</a></button></li>
          </ul>
        </div>
      </div>
    </div>
    <!-- card header end@ -->
    <div class="card-body">
    
      <form  method="post" class="form-horizontal needs-validation" novalidate action="<?php echo e(url('master/user/update/'.$user->id)); ?>" enctype="multipart/form-data">
      <?php echo e(csrf_field()); ?>


     

            <div class="form-row">

  

                <div class="col-md-6">
                  <div class="form-group row">
                  <label for="validationCustom01" class="col-sm-4 col-form-label">Name<span class="mandatory">*</span></label>
                    <div class="col-sm-8">
                    <select class="js-example-basic-multiple col-12 form-control custom-select employee_id required_for_valid" error-data="Enter Name" name="employee_id" required>
                        <option value="">Choose Name</option>
                        <?php $__currentLoopData = $employee; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($value->id); ?>" <?php echo e(old('employee_id',$user->employee_id) == $value->id ? 'selected' : ''); ?> ><?php echo e($value->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                       
                       </select>
                      <span class="mandatory"> <?php echo e($errors->first('employee_id')); ?> </span>
                     <div class="invalid-feedback">
                        Enter valid Name 
                      </div>
                    </div>
                  </div>
                </div>
  
                <div class="col-md-6">
                  <div class="form-group row">
                    <label for="validationCustom01" class="col-sm-4 col-form-label">User Name<span class="mandatory">*</span></label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control user_name only_allow_alp_num_dot_com_amp" placeholder="User Name" name="user_name" value="<?php echo e(old('user_name',$user->user_name)); ?>" required>
                      <span class="mandatory"> <?php echo e($errors->first('user_name')); ?> </span>
                      <div class="invalid-feedback">
                        Enter valid User Name
                      </div>
                    </div>
                  </div>
                </div>
  
              <!--  <div class="col-md-6">
                  <div class="form-group row">
                    <label for="validationCustom01" class="col-sm-4 col-form-label">Password<span class="mandatory">*</span></label>
                    <div class="col-sm-8">
                      <input type="password" class="form-control user_name only_allow_alp_num_dot_com_amp" placeholder="Password" name="password" value="<?php echo e(old('password')); ?>" required>
                      <span class="mandatory"> <?php echo e($errors->first('password')); ?> </span>
                      <div class="invalid-feedback">
                        Enter valid Password
                      </div>
                    </div>
                  </div>
                </div>
  
                <div class="col-md-6">
                  <div class="form-group row">
                    <label for="validationCustom01" class="col-sm-4 col-form-label">Confirm Password<span class="mandatory">*</span></label>
                    <div class="col-sm-8">
                      <input type="password" class="form-control confirm_password only_allow_alp_num_dot_com_amp" placeholder="Confirm Password" name="confirm_password" value="<?php echo e(old('confirm_password')); ?>" required>
                      <span class="mandatory"> <?php echo e($errors->first('confirm_password')); ?> </span>
                      <div class="invalid-feedback">
                        Enter valid Confirm Password
                      </div>
                    </div>
                  </div>
                </div> -->
  
                <div class="col-md-6">
                  <div class="form-group row">
                  <label for="validationCustom01" class="col-sm-4 col-form-label">Role<span class="mandatory">*</span></label>
                    <div class="col-sm-8">
                    <select class="js-example-basic-multiple col-12 form-control custom-select role_id required_for_valid" error-data="Enter Role" name="role_id" >
                        <option value="">Choose Role</option>
                        <?php $__currentLoopData = $role; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($value->id); ?>"  <?php echo e(old('role_id',$user->role_id) == $value->id  ? 'selected' : ''); ?>><?php echo e($value->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                      <span class="mandatory"> <?php echo e($errors->first('role_id')); ?> </span>
                     <div class="invalid-feedback">
                        Enter valid Name 
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
<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ns_pollachi\resources\views/admin/master/user/edit.blade.php ENDPATH**/ ?>