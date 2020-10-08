<?php $__env->startSection('content'); ?>
<div class="col-12 body-sec">
  <div class="card container px-0">
    <!-- card header start@ -->
    <div class="card-header px-2">
      <div class="row">
        <div class="col-4">
          <h3>Edit District</h3>
        </div>
        <div class="col-8 mr-auto">
          <ul class="h-right-btn mb-0 pl-0">
            <li><button type="button" class="btn btn-success"><a href="<?php echo e(url('master/district')); ?>">Back</a></button></li>
          </ul>
        </div>
      </div>
    </div>
    <!-- card header end@ -->
    <div class="card-body">
    
      <form  method="post" class="form-horizontal needs-validation" novalidate action="<?php echo e(url('master/district/update/'.$district->id)); ?>" enctype="multipart/form-data">
      <?php echo e(csrf_field()); ?>

      <div class="form-row">
          <div class="col-md-8">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">District Name <span class="mandatory">*</span></label>
              <div class="col-sm-8">
                <input type="text" class="form-control name only_allow_alp_num_dot_com_amp" placeholder="District Name" name="name" value="<?php echo e(old('name',$district->name)); ?>" required>
                <span class="mandatory"> <?php echo e($errors->first('name')); ?> </span>
                <div class="invalid-feedback">
                  Enter valid District Name
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-8">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">State <span class="mandatory">*</span></label>
              <div class="col-sm-6">
                <select class="js-example-basic-multiple form-control col-12 custom-select state_id" name="state_id" required>
                  <option value="">Choose States</option>
                  <?php $__currentLoopData = $state; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                 <option value="<?php echo e($value->id); ?>" <?php echo e(old('state_id', $district->state_id) == $value->id ? 'selected' : ''); ?>><?php echo e($value->name); ?></option>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <span class="mandatory"> <?php echo e($errors->first('state_id')); ?> </span>
                <div class="invalid-feedback">
                  Enter valid State 
                </div>
              </div>
              <a href="<?php echo e(url('master/state/create')); ?>" target="_blank">
                <button type="button"  class="px-3 btn btn-success ml-2" title="Add State"><i class="fa fa-plus-circle" aria-hidden="true"></i></button></a>
               <button type="button"  class="px-3 btn btn-success mx-2 refresh_state_id" title="Refresh"><i class="fa fa-refresh" aria-hidden="true"></i></button>
           
            </div>
          </div>
          <div class="col-md-8">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Remark </label>
              <div class="col-sm-8">
                <input type="text" class="form-control remark" name="remark" value="<?php echo e($district->remark); ?><?php echo e(old('remark')); ?>" placeholder="Remark">
              </div>
            </div>
          </div>
        </div>
        
        <div class="col-md-7 text-right">
          <button class="btn btn-success" type="submit">Submit</button>
        </div>
      </form>
    </div>
    <script src="<?php echo e(asset('assets/js/master/capitalize.js')); ?>"></script>
    <!-- card body end@ -->
  </div>
</div>
<script>

  $(document).on('input','.name',function(){

  $(this).val($(this).val().replace(/[^a-zA-Z ]/gi, ''));

  });

  $(document).on("click",".refresh_state_id",function(){
     var state_dets=refresh_state_master_details();
    $(".state_id").html(state_dets);
  });
  </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ns_pollachi\resources\views/admin/master/district/edit.blade.php ENDPATH**/ ?>