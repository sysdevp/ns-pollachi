<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker3.css" type="text/css" />
<?php $__env->startSection('content'); ?>
<div class="col-12 body-sec">
  <div class="card container px-0">
    <!-- card header start@ -->
    <div class="card-header px-2">
      <div class="row">
        <div class="col-4">
          <h3>Add Gift Voucher</h3>
        </div>
        <div class="col-8 mr-auto">
          <ul class="h-right-btn mb-0 pl-0">
            <li><button type="button" class="btn btn-success"><a href="<?php echo e(url('master/gift-voucher')); ?>">Back</a></button></li>
          </ul>
        </div>
      </div>
    </div>
    <!-- card header end@ -->
    <div class="card-body">
    
      <form  method="post" class="form-horizontal needs-validation" novalidate action="<?php echo e(url('master/gift-voucher/store')); ?>" enctype="multipart/form-data">
      <?php echo e(csrf_field()); ?>


        <div class="form-row">
       
          <div class="col-md-6">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Gift Voucher Name <span class="mandatory">*</span></label>
              <div class="col-sm-8">
                <input type="text" class="form-control name only_allow_alp_num_dot_com_amp" placeholder="Gift Voucher Name" name="name" value="<?php echo e(old('name')); ?>" required>
                <span class="mandatory"> <?php echo e($errors->first('name')); ?> </span>
                <div class="invalid-feedback">
                  Enter valid Gift Voucher Name
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Gift Voucher Code <span class="mandatory">*</span></label>
              <div class="col-sm-8">
                <input type="text" class="form-control only_allow_alp_num_dot_com_amp code" placeholder="Gift Voucher Code" name="code" value="<?php echo e(old('code')); ?>" required>
                <span class="mandatory"> <?php echo e($errors->first('name')); ?> </span>
                <div class="invalid-feedback">
                  Enter valid Gift Voucher Code
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Gift Voucher Value <span class="mandatory">*</span></label>
              <div class="col-sm-8">
                <input type="text" class="form-control only_allow_digit value" placeholder="Gift Voucher Value" name="value" value="<?php echo e(old('value')); ?>" required>
                <span class="mandatory"> <?php echo e($errors->first('value')); ?> </span>
                <div class="invalid-feedback">
                  Enter valid Gift Voucher Value
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Valid From Date <span class="mandatory">*</span></label>
              <div class="col-sm-8">
                <input type="text" class="form-control from_date" placeholder="dd-mm-yyyy" name="valid_from" value="<?php echo e(old('valid_from')); ?>" required>
                <span class="mandatory"> <?php echo e($errors->first('valid_from')); ?> </span>
                <div class="invalid-feedback">
                  Enter valid From Date
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Valid To Date <span class="mandatory">*</span></label>
              <div class="col-sm-8">
                <input type="text" class="form-control to_date" placeholder="dd-mm-yyyy" name="valid_to" value="<?php echo e(old('valid_to')); ?>" required>
                <span class="mandatory"> <?php echo e($errors->first('valid_to')); ?> </span>
                <div class="invalid-feedback">
                  Enter valid To Date
                </div>
              </div>
            </div>
          </div>



          <div class="col-md-6">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Remark </label>
              <div class="col-sm-8">
                <input type="text" class="form-control  remark" placeholder="Remark" name="remark" value="<?php echo e(old('remark')); ?>">
                <span class="mandatory"> <?php echo e($errors->first('remark')); ?> </span>
                <div class="invalid-feedback">
                  Enter valid Bank Code
                </div>
              </div>
            </div>
          </div>
          
        </div>
        <div class="col-md-7 text-right">
          <button class="btn btn-success" name="add" type="submit">Submit</button>
        </div>
      </form>
    </div>
    <!-- card body end@ -->
  </div>
</div>
<script>
    $(document).ready(function () {
        var date1 = new Date();
        $(".from_date").datepicker({
          format: 'dd-mm-yyyy',
          todayHighlight: true,
           autoclose: true, 
           startDate: date1,
           endDate: '',
          setDate: date1
          }).on('changeDate', function (selected) {
            var startDate = new Date(selected.date.valueOf());

            $('.to_date').datepicker('setStartDate', startDate);
        }).on('clearDate', function (selected) {
            $('.to_date').datepicker('setStartDate', null);
        });
        $(".to_date").datepicker({
          format: 'dd-mm-yyyy', 
          todayHighlight: true,
          autoclose: true,
          endDate: '',
          startDate: date1,
          setDate: date1, 
          }).on('changeDate', function (selected) {
            var endDate = new Date(selected.date.valueOf());
            $('.from_date').datepicker('setEndDate', endDate);
        }).on('clearDate', function (selected) {
            $('.from_date').datepicker('setEndDate', null);
        });


    });
</script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ns_pollachi\resources\views/admin/master/gift_voucher/add.blade.php ENDPATH**/ ?>