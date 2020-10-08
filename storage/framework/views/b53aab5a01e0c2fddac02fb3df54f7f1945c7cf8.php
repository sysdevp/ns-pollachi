<?php $__env->startSection('content'); ?>
<div class="col-12 body-sec">
  <div class="card container px-0">
    <!-- card header start@ -->
    <div class="card-header px-2">
      <div class="row">
        <div class="col-4">
          <h3>Edit Category </h3>
        </div>
        <div class="col-8 mr-auto">
          <ul class="h-right-btn mb-0 pl-0">
            <li><button type="button" class="btn btn-success"><a href="<?php echo e(url('master/category')); ?>">Back</a></button></li>
          </ul>
        </div>
      </div>
    </div>
    <!-- card header end@ -->
    <div class="card-body">
    
      <form  method="post" class="form-horizontal needs-validation" novalidate action="<?php echo e(url('master/category/update/'.$category->id)); ?>" enctype="multipart/form-data">
      <?php echo e(csrf_field()); ?>


        <iv class="form-row">
          <div class="col-md-7">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Belongs To<span class="mandatory">*</span></label>
              <div class="col-sm-8">
                <select class="js-example-basic-multiple form-control col-12 custom-select parent_id" name="parent_id" required>
                  <option value="">Choose Category</option>
                  <option value="0" <?php echo e(old('parent_id',$category->parent_id) == 0 ? 'selected' : ''); ?>>Parent</option>
                  <?php $__currentLoopData = $category_all; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <option value="<?php echo e($value->id); ?>" <?php echo e(old('parent_id',$category->parent_id) == $value->id ? 'selected' : ''); ?>><?php echo e($value->name); ?></option>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <span class="mandatory"> <?php echo e($errors->first('parent_id')); ?> </span>
                <div class="invalid-feedback">
                  Enter valid Belongs To
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-7">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Name<span class="mandatory">*</span></label>
              <div class="col-sm-8">
                <input type="text" class="form-control name only_allow_alp_num_dot_com_amp" placeholder="Name" name="name" value="<?php echo e(old('name',$category->name)); ?>" required>
                <span class="mandatory"> <?php echo e($errors->first('name')); ?> </span>
                <div class="invalid-feedback">
                  Enter valid Name
                </div>
              </div>
            </div>
          </div>


          <div class="col-md-7">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">HSN</label>
              <div class="col-sm-8">
                <input type="text" class="form-control hsn" placeholder="HSN" name="hsn" value="<?php echo e(old('hsn',$category->hsn)); ?>">
              </div>
            </div>
          </div>


          <div class="col-md-7">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">GST %</label>
              <div class="col-sm-8">
                <input type="text" class="form-control gst_no" placeholder="GST %" onkeypress="return isNumberKey(event)" name="gst_no" value="<?php echo e(old('gst_no',$category->gst_no)); ?>">
              </div>
            </div>
          </div>

          

            <div class="col-md-7">
                <div class="form-group row">
                  <label for="validationCustom01" class="col-sm-4 col-form-label"> Remark </label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control remark only_allow_alp_num_dot_com_amp" placeholder="Remark" name="remark" value="<?php echo e(old('remark',$category->remark)); ?>">
                    <span class="mandatory"> <?php echo e($errors->first('remark')); ?> </span>
                    <div class="invalid-feedback">
                      Enter valid Remark
                    </div>
                  </div>
                </div>
              </div>

          
          
          
         
          
        </div>
        <div class="col-md-7 text-right">
          <button class="btn btn-success" type="submit">Submit</button>
        </div>
      </form>
      <SCRIPT language=Javascript>
       function isNumberKey(evt)
       {
          var charCode = (evt.which) ? evt.which : evt.keyCode;
          if (charCode != 46 && charCode > 31 && (charCode < 48 || charCode > 57))
            return false;

            return true;
       }

       $(document).on('input','.hsn ',function(){

        $(this).val($(this).val().replace(/[^0-9]/gi, ''));
        if($(this).val().replace(/[^0-9]/gi, '').length > 6)
        {
          $(this).val('');
        }
        else
        {
          
        }

      });
       
    </SCRIPT>
    </div>
    <script src="<?php echo e(asset('assets/js/master/capitalize.js')); ?>"></script>
    <!-- card body end@ -->
  </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ns_pollachi\resources\views/admin/master/category/edit.blade.php ENDPATH**/ ?>