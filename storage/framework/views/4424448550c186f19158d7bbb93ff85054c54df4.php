<?php $__env->startSection('content'); ?>
<div class="col-12 body-sec">
  <div class="card container px-0">
    <!-- card header start@ -->
    <div class="card-header px-2">
      <div class="row">
        <div class="col-4">
          <h3>Account Group</h3>
        </div>
        <div class="col-8 mr-auto">
          <ul class="h-right-btn mb-0 pl-0">
            <li><button type="button" class="btn btn-success"><a href="<?php echo e(route('account_group.index')); ?>">Back</a></button></li>
          </ul>
        </div>
      </div>
    </div>
    <!-- card header end@ -->
    <div class="card-body">
    
      <form  method="post" class="form-horizontal needs-validation" action="<?php echo e(route('account_group.store')); ?>" enctype="multipart/form-data">
      <?php echo e(csrf_field()); ?>


        <div class="form-row">
          <div class="col-md-6">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Name<span class="mandatory">*</span></label>
              <div class="col-sm-8">
                <input type="text" class="form-control name" placeholder="Name" required="" name="name" value="">
              </div>
            </div>
          </div>

        <div class="col-md-6">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Under <span class="mandatory">*</span> </label>
              <div class="col-sm-8">
                <select class="js-example-basic-multiple col-12 form-control custom-select under"  name="under" id="under" required="">
                  <option value="">Choose Any</option>
                  <option value="Primary">Primary</option>
                  <option value="Cash">Cash</option>
                  <option value="Bank">Bank</option>
                  <option value="Incomes">Incomes</option>
                  <option value="Expense">Expense</option>
                  <option value="Asset">Asset</option>
                  <option value="Liabilities">Liabilities</option>
                  <?php $__currentLoopData = $account_group; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <option value="<?php echo e($value->id); ?>"><?php echo e($value->name); ?></option>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
              </div>
            </div>
          </div>
        </div>
        <br>

        <!-- <div class="form-row">
          <div class="col-md-6">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Tax:</label>
              <label for="validationCustom01" class="col-sm-3 col-form-label">Yes</label>
              
                <input type="radio" class="tax" checked="" placeholder="Name" onclick="yes()" name="tax" value="1">
                
              
              <label for="validationCustom01" class="col-sm-3 col-form-label">No</label>
              
                <input type="radio" class="tax" placeholder="Name" onclick="no()"  name="tax" value="0">
                
            </div>
          </div>
        </div> -->
        <!-- <br> -->

        <!-- <div class="form-row col-md-12 tax_details">
          <div class="col-md-4">
            <label for="validationCustom01" class="col-sm-4 col-form-label">Name</label><br>
            <select class="js-example-basic-multiple col-12 form-control custom-select type"  name="tax_name" id="tax_name">
                  <option value="">Choose Any</option>
                  <?php $__currentLoopData = $tax; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <option value="<?php echo e($value->id); ?>"><?php echo e($value->name); ?></option>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select> -->
            <!-- <input type="text" class="form-control tax_name" placeholder="Name" name="tax_name" value=""> -->
          <!-- </div>
          <div class="col-md-4">
            <label for="validationCustom01" class="col-sm-4 col-form-label">Rate Of Tax</label><br>
            <input type="text" class="form-control tax_rate" placeholder="Rate Of Tax" name="tax_rate" value="">
          </div>
          <div class="col-md-4">
            <label for="validationCustom01" class="col-sm-4 col-form-label">Type</label><br>
          <select class="js-example-basic-multiple col-12 form-control custom-select type"  name="type" id="type">
                  <option value="">Choose Any</option>
                  <option value="1">Goods</option>
                  <option value="2">Service</option>
                        </select>
          
        </div>
      </div> -->
      <!-- <br> -->


        <div class="col-md-7 text-right">
          <button class="btn btn-success add" name="add" type="submit">Submit</button>
          <button class="btn btn-warning cancel" name="cancel" type="button">Cancel</button>
          <!-- <input type="submit" class="btn btn-success add" name="add" value="Submit">
          <input type="button" class="btn btn-warning cancel" name="cancel" value="Cancel"> -->
        </div>
        <div class="col-md-7 text-right">
          
        </div>
      </form>
    </div>
    <script src="<?php echo e(asset('assets/js/master/capitalize.js')); ?>"></script>
    <!-- card body end@ -->
  </div>
</div>

<script type="text/javascript">
  
  function yes()
  {
    $('.tax_details').show();
  } 
  function no()
  {
    $('.tax_details').hide();
  } 

  $(document).on('input','.name',function(){

    $(this).val($(this).val().replace(/[^a-zA-Z ]/gi, ''));

  });

  $(document).on('input','.tax_rate',function(){

    $(this).val($(this).val().replace(/[^0-9.0-9]/gi, ''));
    if ($(this).val().replace(/[^.]/g, "").length > 1)
    {
    $(this).val(''); 
    }
    else
    {

    }

  });

  $(document).on('click','.cancel', function(){
    $('input').val('');
    $('select').val('');
    $('select').select2();
  });
</script>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ns_pollachi\resources\views/admin/master/account_group/add.blade.php ENDPATH**/ ?>