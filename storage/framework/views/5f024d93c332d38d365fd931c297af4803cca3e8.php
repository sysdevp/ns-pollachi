<?php $__env->startSection('content'); ?>
<main class="page-content">

<div class="col-12 body-sec">
  <div class="card">
    <!-- card header start@ -->
    <div class="card-header px-2">
      <div class="row">
        <div class="col-4">
          <h3>List Estimation</h3>
        </div>
        <div class="col-8 mr-auto">
          <ul class="h-right-btn mb-0 pl-0">
            <?php if($check_id != 1): ?>
            <li><button type="button" class="btn btn-success"><a href="<?php echo e(route('estimation.create')); ?>">Estimation</a></button></li>
            <?php endif; ?>
          </ul>
        </div>
      </div>
    </div>
    <?php if($check_id == 1): ?>
    <div class="card-body">
    <form  method="post" class="form-horizontal needs-validation" novalidate action="<?php echo e(url('estimation-report')); ?>" enctype="multipart/form-data">
      <?php echo e(csrf_field()); ?>

      <div class="col-md-12 row mb-3">

      <div class="col-md-12 form-row mb-3">
            <div class="col-md-2">
              <label>From</label>
            <input type="date" class="form-control from" name="from" id="from" value="<?php if(isset($from)): ?><?php echo e($from); ?><?php endif; ?>" required>
            </div>

            <div class="col-md-2">
              <label>To</label>
            <input type="date" class="form-control to" name="to" id="to" value="<?php if(isset($to)): ?><?php echo e($to); ?><?php endif; ?>" required>
            </div>

           
            <div class="col-md-3">
              <label>Supplier</label>
              <select class="js-example-basic-multiple col-12 form-control custom-select supplier_id" name="supplier_id" id="supplier_id">
                           <option value="">Choose Party Name</option>
                           <?php $__currentLoopData = $supplier; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $suppliers): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                           <option value="<?php echo e($suppliers->id); ?>" <?php if(isset($cond['supplier_id'])): ?><?php echo e(($suppliers->id==$cond['supplier_id']) ? 'selected' : ''); ?><?php endif; ?>><?php echo e($suppliers->name); ?></option>
                           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>

          </div>
          <div class="col-md-3">
              <label>Agent</label>
              <select class="js-example-basic-multiple col-12 form-control custom-select agent_id" name="agent_id" id="agent_id">
                           <option value="">Choose Agent Name</option>
                           <?php $__currentLoopData = $agent; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                           <option value="<?php echo e($data->id); ?>" <?php if(isset($cond['agent_id'])): ?><?php echo e(($data->id==$cond['agent_id']) ? 'selected' : ''); ?><?php endif; ?>><?php echo e($data->name); ?></option>
                           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                        </select>

          </div>


          </div>

           <div class="col-md-2">
            <label> </label>
            <input type="submit" class="btn btn-success" name="add" value="Submit">
            
          </div>
        <br>

    </form>

    </div>
    <?php endif; ?>
    
    <!-- card header end@ -->
    <div class="card-body" id="DivIdToPrint">
      <table id="master" class="table table-bordered table-hover">
        <thead>
          <tr>
            <th>S.No</th>
            <th>Voucher No </th>
            <th>Voucher Date </th>
            <th>Supplier Name</th>
            <th>Agent Name</th>
            <th>overall Discount</th>
            <!-- <th>Round Off</th> -->
            <th>Total Expense</th>
            <th>Taxable Value</th>
            <th>Tax Value</th>
            <th>Net Value</th>
           <th>Action </th>
          </tr>
        </thead>
        <tbody>
          <?php $__currentLoopData = $estimation; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
              <td><?php echo e($key+1); ?></td>
              <td><?php echo e($value->estimation_no); ?></td>
              <td><?php echo e($value->estimation_date); ?></td>
              <?php if(isset($value->supplier->name) && !empty($value->supplier->name)): ?>
              <td><?php echo e($value->supplier->name); ?></td>
              <?php else: ?>
              <td></td>
              <?php endif; ?>
              <?php if(isset($value->agent->name) && !empty($value->agent->name)): ?>
              <td><?php echo e($value->agent->name); ?></td>
              <?php else: ?>
              <td></td>
              <?php endif; ?>
              <td><?php echo e($total_discount[$key]); ?></td>
              <!-- <td><?php echo e($value->round_off); ?></td> -->
              <td><?php echo e($expense_total[$key]); ?></td>
              <td><?php echo e($taxable_value[$key]); ?></td>
              <td><?php echo e($tax_value[$key]); ?></td>
              <td><?php echo e($total[$key]); ?></td>
              <td class="icon">
	<span class="tdshow"> 
                <?php if($value->status == '0'): ?>
                <a href="<?php echo e(route('estimation.show',$value->estimation_no)); ?>"  class="px-2 py-1 bg-info text-white rounded" title="View">
				<i class="fa fa-eye" aria-hidden="true"></i></a>
                <a href="<?php echo e(route('estimation.edit',$value->estimation_no)); ?>" class="px-2 py-1 bg-success text-white rounded"  title="Edit">
				<i class="fa fa-pencil" aria-hidden="true"></i></a>
                <a href="<?php echo e(url('estimation/delete/'.$value->estimation_no )); ?>" onclick="return confirm('Are you sure ?')" class="px-2 py-1 bg-danger text-white rounded" title="Delete">
				<i class="fa fa-trash" aria-hidden="true" ></i></a>
                <a href="<?php echo e(url('estimation/cancel/'.$value->estimation_no)); ?>" class="px-2 py-1   bg-info text-white rounded" title="Cancel">
				<i class="fa fa-ban" aria-hidden="true" ></i></a>


                
                <a href="<?php echo e(url('estimation/item_details/'.$value->estimation_no )); ?>" class="px-1 py-0 bg-info text-white rounded" title="Item Details">
				<i class="fa fa-info-circle" aria-hidden="true" ></i></a>
                <a href="<?php echo e(url('estimation/expense_details/'.$value->estimation_no )); ?>" class="px-1 py-0 bg-info text-white rounded" title="Expenses Details">
				<i class="fa fa-inr" aria-hidden="true"></i></a>
                <?php else: ?>
                <a href="<?php echo e(url('estimation/retrieve/'.$value->estimation_no)); ?>" class="px-2 py-1 bg-primary text-white rounded">Retrieve</a>

                <?php endif; ?>
	</span>
              </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
         
        </tbody>
      </table>

    </div>
    
    <!-- card body end@ -->
  </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ns_pollachi\resources\views/admin/estimation/view.blade.php ENDPATH**/ ?>