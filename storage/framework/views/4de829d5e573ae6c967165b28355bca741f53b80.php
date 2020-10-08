<?php $__env->startSection('content'); ?>
<div class="col-12 body-sec">
  <div class="card container px-0">
    <!-- card header start@ -->
    <div class="card-header px-2">
      <div class="row">
        <div class="col-4">
          <h3>Edit Denomination </h3>
        </div>
        <div class="col-8 mr-auto">
          <ul class="h-right-btn mb-0 pl-0">
            <li><button type="button" class="btn btn-success"><a href="<?php echo e(url('master/denomination')); ?>">Back</a></button></li>
          </ul>
        </div>
      </div>
    </div>
    <!-- card header end@ -->
    <div class="card-body">
    
      <form  method="post" class="form-horizontal needs-validation" novalidate action="<?php echo e(url('master/denomination/update/'.$denomination->id)); ?>" enctype="multipart/form-data">
      <?php echo e(csrf_field()); ?>


      <div class="form-row">
          <div class="col-md-7">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Amount <span class="mandatory">*</span></label>
              <div class="col-sm-8">
                <input type="text" class="form-control amount only_allow_alp_numeric" placeholder="Amount" name="amount" value="<?php echo e(old('amount',$denomination->amount)); ?>" required>
                <span class="mandatory"> <?php echo e($errors->first('amount')); ?> </span>
                <div class="invalid-feedback">
                  Enter valid Amount
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-7">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Remarks </label>
              <div class="col-sm-8">
                <input type="text" class="form-control remark" placeholder="Remarks" name="remark" value="<?php echo e(old('remark',$denomination->remark)); ?>" >
                <span class="mandatory"> <?php echo e($errors->first('remark')); ?> </span>
                <div class="invalid-feedback">
                  Enter valid Bank Code
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

    <script>
      
      // $(document).on('input','#amount',function(){

      // $(this).val($(this).val().replace(/[^0-9]/gi, ''));

      // });
  $(document).on('input','.amount',function(){

    $(this).val($(this).val().replace(/[^0-9.0-9]/gi, ''));
    if ($(this).val().replace(/[^.]/g, "").length > 1)
    {
    $(this).val(''); 
    }
    else
    {

    }

  });

    </script>

    <!-- card body end@ -->
  </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ns_pollachi\resources\views/admin/master/denomination/edit.blade.php ENDPATH**/ ?>