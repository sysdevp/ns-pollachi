<?php $__env->startSection('content'); ?>
<div class="col-12 body-sec">
  <div class="card container px-0">
    <!-- card header start@ -->
    <div class="card-header px-2">
      <div class="row">
        <div class="col-4">
          <h3>Add State</h3>
        </div>
        <div class="col-8 mr-auto">
          <ul class="h-right-btn mb-0 pl-0">
            <li><button type="button" class="btn btn-success"><a href="<?php echo e(url('master/state')); ?>">Back</a></button></li>
          </ul>
        </div>
      </div>
    </div>
    <!-- card header end@ -->
    <div class="card-body">
    
      <form  method="post" class="form-horizontal needs-validation" novalidate action="<?php echo e(url('master/state/store')); ?>" enctype="multipart/form-data">
      <?php echo e(csrf_field()); ?>


        <div class="form-row">
          <div class="col-md-7">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">State Name <span class="mandatory">*</span></label>
              <div class="col-sm-8">
                <input type="text" class="form-control name only_allow_alp_num_dot_com_amp caps" placeholder="State Name" name="name" value="<?php echo e(old('name')); ?>" required>
                <span class="mandatory"> <?php echo e($errors->first('name')); ?> </span>
                <div class="invalid-feedback">
                  Enter valid State Name
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-7">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">State Code <span class="mandatory">*</span></label>
              <div class="col-sm-8">
                <input type="text" class="form-control code only_allow_digit" placeholder="State Code" name="code" value="<?php echo e(old('code')); ?>"  required>
                <span class="mandatory"> <?php echo e($errors->first('code')); ?> </span>
                <div class="invalid-feedback">
                  Enter valid State Code
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-7">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Remark </label>
              <div class="col-sm-8">
                <input type="text" class="form-control remark" name="remark" value="<?php echo e(old('remark')); ?>" placeholder="Remark">
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-7 text-right">
          <button class="btn btn-success" name="add" type="submit">Submit</button>
        </div>
      </form>
      <!--
<button type="button" class="btn btn-success add_row">Add</button>
      <table class="table">
        <tr>
          <td>Type</td>
          <td><input type="date" class="form-control"></td>
        </tr>
        <tr>
          <td>Hotel</td>
          <td><input type="text" class="form-control"></td>
        </tr>
        <tr>
          <td>Petrol</td>
          <td><input type="text" class="form-control"></td>
        </tr>
        <tr>
          <td>Food</td>
          <td><input type="text" class="form-control"></td>
        </tr>
      </table> -->
    </div>
    <!-- card body end@ -->
  </div>
</div>
<script src="<?php echo e(asset('assets/js/master/capitalize.js')); ?>"></script>
<script>

  $(document).on('input','.name',function(){

    $(this).val($(this).val().replace(/[^a-zA-Z ]/gi, ''));

  });

  $(document).on('input','.code',function(){

    $(this).val($(this).val().replace(/[^0-9.0-9]/gi, ''));
    if ($(this).val().replace(/[^.]/g, "").length > 1)
    {
    $(this).val(''); 
    }
    else
    {

    }

  });

 /*  $(document).on("click",".add_row",function()
  {
   $('.table tr').each(function(key,value)
      {
          if(key == 0)
          {

            $(this).append('<td><input type="date" class="form-control"><label class="btn btn-danger delete_column">Delete</label></td>');
    }else
          {

            $(this).append('<td><input type="text" class="form-control"></td>');
          
          }
      });
  });

  $(document).on("click",".delete_column",function(){
    var colIndex = $(this).closest("td").index();
    $('table tr').find('td:eq('+ colIndex +')').remove();
}); */
</script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ns_pollachi\resources\views/admin/master/state/add.blade.php ENDPATH**/ ?>