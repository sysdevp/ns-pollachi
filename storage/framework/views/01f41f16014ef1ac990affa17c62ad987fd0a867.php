<?php $__env->startSection('content'); ?>
<div class="col-12 body-sec">
  <div class="card container px-0">
    <!-- card header start@ -->
    <div class="card-header px-2">
      <div class="row">
        <div class="col-4">
          <h3>Edit Account Head</h3>
        </div>
        <div class="col-8 mr-auto">
          <ul class="h-right-btn mb-0 pl-0">
            <li><button type="button" class="btn btn-success"><a href="<?php echo e(route('account_head.index')); ?>">Back</a></button></li>
          </ul>
        </div>
      </div>
    </div>
    <!-- card header end@ -->
    <div class="card-body">
    
      <form  method="post" class="form-horizontal needs-validation" action="<?php echo e(route('account_head.update',$account_head->id)); ?>" enctype="multipart/form-data">
      <?php echo e(csrf_field()); ?>

      <?php echo method_field('PATCH'); ?>

        <div class="form-row">
          <div class="col-md-6">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Name:</label>
              <div class="col-sm-8">
                <input type="text" required="" class="form-control name" placeholder="Name" name="name" value="<?php echo e($account_head->name); ?>">
                
              </div>
            </div>
          </div>

        <div class="col-md-6">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Under : </label>
              <div class="col-sm-8">
                <select class="js-example-basic-multiple col-12 form-control custom-select under"  name="under" id="under" required="">
                  <?php if(isset($account_head->under_data->id) && !empty($account_head->under_data->id)): ?>
                  <option value="<?php echo e($account_head->under_data->id); ?>"><?php echo e($account_head->under_data->name); ?></option>
                  <?php elseif($account_head->under == 'Primary'): ?>
                  <option value="Primary">Primary</option>
                  <?php elseif($account_head->under == 'Cash'): ?>
                  <option value="Cash">Cash</option>
                  <?php elseif($account_head->under == 'Bank'): ?>
                  <option value="Bank">Bank</option>
                  <?php elseif($account_head->under == 'Incomes'): ?>
                  <option value="Incomes">Incomes</option>
                  <?php elseif($account_head->under == 'Expense'): ?>
                  <option value="Expense">Expense</option>
                  <?php elseif($account_head->under == 'Assets'): ?>
                  <option value="Assets">Assets</option>
                  <?php elseif($account_head->under == 'Liabilities'): ?>
                  <option value="Liabilities">Liabilities</option>
                  <?php endif; ?>
                  <option value="Primary">Primary</option>
                  <option value="Cash">Cash</option>
                  <option value="Bank">Bank</option>
                  <option value="Incomes">Incomes</option>
                  <option value="Expense">Expense</option>
                  <option value="Assets">Assets</option>
                  <option value="Liabilities">Liabilities</option>
                  <?php $__currentLoopData = $group; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <option value="<?php echo e($value->id); ?>"><?php echo e($value->name); ?></option>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
              </div>
            </div>
          </div>
        </div>

        <!-- <div class="form-row">
          <div class="col-md-6">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Tax:</label>
               <?php if($account_head->tax == 1): ?>
              <label for="validationCustom01" class="col-sm-3 col-form-label">Yes</label>
              <input type="radio" class="tax" checked="" placeholder="Name" onclick="yes()" name="tax" value="1">
              <label for="validationCustom01" class="col-sm-3 col-form-label">No</label>
                <input type="radio" class="tax" placeholder="Name" onclick="no()" name="tax" value="0">
                <?php else: ?>
                <label for="validationCustom01" class="col-sm-3 col-form-label">Yes</label>
              <input type="radio" class="tax" placeholder="Name" onclick="yes()" name="tax" value="1">
              <label for="validationCustom01" class="col-sm-3 col-form-label">No</label>
                <input type="radio" class="tax" placeholder="Name"  checked="" onclick="no()" name="tax" value="0">
                <?php endif; ?>
                
            </div>
          </div>
        </div>
        <br> -->
        <!-- <div class="form-row col-md-12 tax_details">
          <div class="col-md-4">
            <label for="validationCustom01" class="col-sm-4 col-form-label">Name</label><br>
            <select class="js-example-basic-multiple col-12 form-control custom-select type"  name="tax_name" id="tax_name">
                <?php if($account_head->name_of_tax != ''): ?>
                  <option value="<?php echo e($account_head->taxes->id); ?>"><?php echo e($account_head->taxes->name); ?></option>
                  <?php else: ?>
                  <option value="">Choose Any</option>
                  <?php endif; ?>
                  <?php $__currentLoopData = $tax; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <option value="<?php echo e($value->id); ?>"><?php echo e($value->name); ?></option>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select> -->
            <!-- <input type="text" class="form-control tax_name" placeholder="Name" name="tax_name" value="<?php echo e($account_head->name_of_tax); ?>"> -->
          <!-- </div>
          <div class="col-md-4">
            <label for="validationCustom01" class="col-sm-4 col-form-label">Rate Of Tax</label><br>
            <input type="text" class="form-control tax_rate" placeholder="Rate Of Tax" name="tax_rate" value="<?php echo e($account_head->rate_of_tax); ?>">
          </div>
          <div class="col-md-4">
            <label for="validationCustom01" class="col-sm-4 col-form-label">Type</label><br>
          <select class="js-example-basic-multiple col-12 form-control custom-select type"  name="type" id="type">
                  <?php if($account_head->type == 1): ?>
                  <option value="1">Goods</option>
                  <?php elseif($account_head->type == 2): ?>
                  <option value="2">Service</option>
                  <?php else: ?>
                  <option value="">Choose Any</option>
                  <?php endif; ?>
                  <option value="1">Goods</option>
                  <option value="2">Service</option>
                        </select>
          
        </div>
      </div> -->
      <!-- <div class="form-row">
          <div class="col-md-6">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Opening Balance:</label>
              <div class="col-sm-8">
                <input type="text" class="form-control balance" placeholder="Opening Balance" name="balance" value="<?php echo e($account_head->opening_balance); ?>">
                
              </div>
            </div>
          </div>

        <div class="col-md-6">
            <div class="form-group row">
              <div class="col-sm-3">
                <select class=" col-12 form-control custom-select dr_or_cr"  name="dr_or_cr" id="dr_or_cr">
                  <?php if($account_head->dr_or_cr == 1): ?>
                  <option value="1">CR</option>
                  <?php elseif($account_head->dr_or_cr == 2): ?>
                  <option value="2">DR</option>
                  <?php else: ?>
                  <option value="">Choose Any</option>
                  <?php endif; ?>
                  <option value="1">CR</option>
                  <option value="2">DR</option>
                        </select>
              </div>
            </div>
          </div>
        </div> -->
      <!-- 
      <div class="form-row col-md-12 tax_details" style="display: none;">
          <div class="col-md-4">
            <label for="validationCustom01" class="col-sm-4 col-form-label">Name</label><br>
            <input type="text" class="form-control tax_name" placeholder="Name" name="tax_name" value="<?php echo e($account_head->name_of_tax); ?>">
          </div>
          <div class="col-md-4">
            <label for="validationCustom01" class="col-sm-4 col-form-label">Rate Of Tax</label><br>
            <input type="text" class="form-control tax_rate" placeholder="Rate Of Tax" name="tax_rate" value="<?php echo e($account_head->rate_of_tax); ?>">
          </div>
          <div class="col-md-4">
            <label for="validationCustom01" class="col-sm-4 col-form-label">Type</label><br>
          <select class="js-example-basic-multiple col-12 form-control custom-select type"  name="type" id="type">
                  <?php if($account_head->type == 1): ?>
                  <option value="1">Goods</option>
                  <?php elseif($account_head->type == 2): ?>
                  <option value="2">Service</option>
                  <?php else: ?>
                  <option value="">Choose Any</option>
                  <?php endif; ?>
                  <option value="1">Goods</option>
                  <option value="2">Service</option>
                        </select>
          
        </div>
      </div>
      <br> -->
      <div class="form-row">
          <div class="col-md-6">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Opening Balance:</label>
              <div class="col-sm-8">
                <input type="text" class="form-control balance" placeholder="Opening Balance" name="balance" value="<?php echo e($account_head->opening_balance); ?>">
                
              </div>
            </div>
          </div>

        <div class="col-md-6">
            <div class="form-group row">
              <div class="col-sm-3">
                <select class=" col-12 form-control custom-select dr_or_cr"  name="dr_or_cr" id="dr_or_cr">
                  <?php if($account_head->dr_or_cr == '1'): ?>
                  <option value="1">Credit</option>
                  <?php elseif($account_head->dr_or_cr == '2'): ?>
                  <option value="2">Debit</option>
                  <?php else: ?>
                  <option value="">Choose Any</option>
                  <?php endif; ?>
                  <option value="">Choose Any</option>
                  <option value="1">Credit</option>
                  <option value="2">Debit</option>
                </select>
              </div>
            </div>
          </div>
        </div>

        <div class="form-row">
          <div class="col-md-6">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Tax Included:</label>
              <div class="col-sm-8">
                <?php if($account_head->status == '1'): ?>
                <input type="checkbox" class="check" checked="" name="check" value="1">
                <?php else: ?>
                <input type="checkbox" class="check" name="check" value="0">
                <?php endif; ?>
              </div>
            </div>
          </div>
        </div>
      <br>



        <div class="col-md-7 text-right">
          <button class="btn btn-success" name="add" type="submit">Update</button>
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

  $(document).on('input','.balance',function(){

    if($(this).val())
    {
      $('.dr_or_cr').attr('required','required');
    }
    else
    {
      $('.dr_or_cr').removeAttr('required');
    }

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

  $(document).on('input','.balance',function(){
    
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

<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ns_pollachi\resources\views/admin/master/account_head/edit.blade.php ENDPATH**/ ?>