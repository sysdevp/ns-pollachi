<?php $__env->startSection('content'); ?>
<div class="col-12 body-sec">
  <div class="card container px-0">
    <!-- card header start@ -->
    <div class="card-header px-2">
      <div class="row">
        <div class="col-4">
          <h3>View Account Head</h3>
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
      <div class="form-row">
        <div class="col-md-6">
          <div class="form-group row">
            <label for="validationCustom01" class="col-sm-3 col-form-label">Name :</label>
            <label for="validationCustom01" class="col-sm-3 col-form-label"> <?php echo e($account_head->name); ?></label>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group row">
            <label for="validationCustom01" class="col-sm-3 col-form-label">Under :</label>
            <?php if($account_head->under == 'Primary'): ?>
            <label for="validationCustom01" class="col-sm-3 col-form-label">Primary </label>
            <?php elseif($account_head->under == 'Cash'): ?>
            <label for="validationCustom01" class="col-sm-3 col-form-label">Cash </label>
            <?php elseif($account_head->under == 'Bank'): ?>
            <label for="validationCustom01" class="col-sm-3 col-form-label">Bank </label>
            <?php elseif($account_head->under == 'Incomes'): ?>
            <label for="validationCustom01" class="col-sm-3 col-form-label">Incomes </label>
            <?php elseif($account_head->under == 'Expense'): ?>
            <label for="validationCustom01" class="col-sm-3 col-form-label">Expense </label>
            <?php elseif($account_head->under == 'Assets'): ?>
            <label for="validationCustom01" class="col-sm-3 col-form-label">Assets </label>
            <?php elseif($account_head->under == 'Liabilities'): ?>
            <label for="validationCustom01" class="col-sm-3 col-form-label">Liabilities </label>
            <?php else: ?>
            <label for="validationCustom01" class="col-sm-3 col-form-label"><?php echo e(@$account_head->under_data->name); ?> </label>
            <?php endif; ?>
          </div>
        </div>
        <!-- <div class="col-md-6">
          <div class="form-group row">
            <label for="validationCustom01" class="col-sm-3 col-form-label">Tax Name :</label>
            <label for="validationCustom01" class="col-sm-3 col-form-label"><?php echo e($account_head->name_of_tax); ?> </label>
          </div>
        </div> -->

        <!-- <div class="col-md-6">
          <div class="form-group row">
            <label for="validationCustom01" class="col-sm-3 col-form-label">Rate Of Tax :</label>
            <label for="validationCustom01" class="col-sm-3 col-form-label"><?php echo e($account_head->rate_of_tax); ?> </label>
          </div>
        </div> -->
        <div class="col-md-6">
          <div class="form-group row">
            <label for="validationCustom01" class="col-sm-3 col-form-label">Type :</label>
            <?php if($account_head->dr_or_cr == 1): ?>
            <label for="validationCustom01" class="col-sm-3 col-form-label">Credit </label>
            <?php else: ?>
            <label for="validationCustom01" class="col-sm-3 col-form-label">Debit </label>
            <?php endif; ?>
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group row">
            <label for="validationCustom01" class="col-sm-3 col-form-label">Opening Balance :</label>
            <label for="validationCustom01" class="col-sm-3 col-form-label"><?php echo e($account_head->opening_balance); ?> </label>
          </div>
        </div>
        
      </div>
    </div>
    <!-- card body end@ -->
  </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ns_pollachi\resources\views/admin/master/account_head/show.blade.php ENDPATH**/ ?>