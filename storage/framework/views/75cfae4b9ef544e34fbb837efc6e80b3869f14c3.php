<?php $__env->startSection('content'); ?>
<div class="col-12 body-sec">
  <div class="card container px-0">
    <!-- card header start@ -->
    <div class="card-header px-2">
      <div class="row">
        <div class="col-4">
          <h3>Edit Account Group Tax</h3>
        </div>
        <div class="col-8 mr-auto">
          <ul class="h-right-btn mb-0 pl-0">
            <li><button type="button" class="btn btn-success"><a href="<?php echo e(route('account_group_tax.index')); ?>">Back</a></button></li>
          </ul>
        </div>
      </div>
    </div>
    <!-- card header end@ -->
    <div class="card-body">
    
      <form  method="post" class="form-horizontal needs-validation" action="<?php echo e(route('account_group_tax.update',$account_group_tax->id)); ?>" enctype="multipart/form-data">
      <?php echo e(csrf_field()); ?>

      <?php echo method_field('PATCH'); ?>


        <div class="form-row col-md-12 tax_details mb-3">
          <div class="col-md-4">
            <label for="validationCustom01" class="col-sm-4 col-form-label">Account Group</label><br>
            <select class="js-example-basic-multiple col-12 form-control custom-select group"  name="group" id="group" required="">
                  <option value="<?php echo e(@$account_group_tax->under_data->id); ?>"><?php echo e(@$account_group_tax->under_data->name); ?></option>
                  <?php $__currentLoopData = $account_group; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <option value="<?php echo e($value->id); ?>"><?php echo e($value->name); ?></option>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
          </div>
        </div>


        <div class="form-row col-md-12 tax_details mb-3">
          <div class="col-md-4">
            <label for="validationCustom01" class="col-sm-4 col-form-label">Tax Name</label><br>
            <select class="js-example-basic-multiple col-12 form-control custom-select type"  name="tax_name" id="tax_name" required="">
                  <option value="<?php echo e(@$account_group_tax->taxes->id); ?>"><?php echo e(@$account_group_tax->taxes->name); ?></option>
                  <?php $__currentLoopData = $tax; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <option value="<?php echo e($value->id); ?>"><?php echo e($value->name); ?></option>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
          </div>
          <div class="col-md-4">
            <label for="validationCustom01" class="col-sm-4 col-form-label">Tax%</label><br>
            <input type="text" class="form-control tax_rate" placeholder="Rate Of Tax" name="tax_rate" value="<?php echo e(@$account_group_tax->tax_value); ?>" required="">
          </div>
          <div class="col-md-4">
            <label for="validationCustom01" class="col-sm-4 col-form-label">Type</label><br>
          <select class="js-example-basic-multiple col-12 form-control custom-select type"  name="type" id="type" required="">
            <?php if($account_group_tax->type == 1): ?>
            <option value="1">CR</option>
            <?php else: ?>
            <option value="2">DR</option>
            <?php endif; ?>
            <option value="1">CR</option>
            <option value="2">DR</option>
                  </select>
          
        </div>
      </div>
      <!-- <br> -->


        <div class="col-md-7 text-right">
          <button class="btn btn-success add" name="add" type="submit">Update</button>
          <button class="btn btn-warning cancel" name="cancel" type="button">Cancel</button>
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


<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ns_pollachi\resources\views/admin/master/account_group_tax/edit.blade.php ENDPATH**/ ?>