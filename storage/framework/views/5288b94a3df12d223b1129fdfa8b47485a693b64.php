<?php $__env->startSection('content'); ?>
<main class="page-content">

<div class="col-12 body-sec">
  <div class="card">
    <!-- card header start@ -->
    <div class="card-header px-2">
      <div class="row">
        <div class="col-4">
          <h3>List Sales Entry</h3>
        </div>
        <div class="col-8 mr-auto">
          <ul class="h-right-btn mb-0 pl-0">
            <?php if($check_id != 1): ?>
            <input type="checkbox" name="alpha_beta" class="alpha_beta" value="1">
            <li><button type="button" class="btn btn-success"><a href="<?php echo e(route('sales_entry.create')); ?>">Sales Entry</a></button></li>
            <?php else: ?>
            <?php endif; ?>
          </ul>
        </div>
      </div>
    </div>

    <?php if($check_id == 1): ?>

    <div class="card-body">
    <form  method="post" class="form-horizontal needs-validation" novalidate action="<?php echo e(url('sales-entry-report')); ?>" enctype="multipart/form-data">
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
              <label>Customer</label>
              <select class="js-example-basic-multiple col-12 form-control custom-select customer_id" name="customer_id" id="customer_id">
              <option value="">Choose Customer Name</option>
                           <?php $__currentLoopData = $customer; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                           <option value="<?php echo e($data->id); ?>"<?php if(isset($cond['customer_id'])): ?><?php echo e(($suppliers->id==$cond['customer_id']) ? 'selected' : ''); ?><?php endif; ?>><?php echo e($data->name); ?></option>
                           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>

          </div>
          
          <div class="col-md-2">
              <label>Sales Man</label>
              <select class="js-example-basic-multiple col-12 form-control custom-select salesman_id" name="salesman_id" id="salesman_id">
                           <option value="">Choose Salesman</option>
                           <?php $__currentLoopData = $sales_man; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                           <option value="<?php echo e($data->id); ?>"<?php if(isset($cond['salesman_id'])): ?><?php echo e(($data->id==$cond['salesman_id']) ? 'selected' : ''); ?><?php endif; ?> ><?php echo e($data->name); ?></option>
                           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>

          </div>
          <div class="col-md-2">
              <label>Location</label>
              <select class="js-example-basic-multiple col-12 form-control custom-select location" name="location" id="location">
                           <option value="">Choose Location</option>
                           <?php $__currentLoopData = $location; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                           <option value="<?php echo e($data->id); ?>"<?php if(isset($cond['location'])): ?><?php echo e(($data->id==$cond['location']) ? 'selected' : ''); ?><?php endif; ?> ><?php echo e($data->name); ?></option>
                           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>

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
    <div class="card-body">
      <table id="master" class="table table-bordered table-hover">
        <thead>
          <tr>
            <th>S.No</th>
            <th>Voucher No </th>
            <th>Voucher Date </th>
            <th>Sale Estimation No </th>
            <th>Sale Order No </th>
            <th>Sale Order Date </th>
            <th>Delivery Note No </th>
            <th>Customer Name</th>
            <th>Sales Man Name</th>
            <th>Location</th>
            <th>overall Discount</th>
            <!-- <th>Round Off</th> -->
            <th>Total Expense</th>
            <th>Taxable Value</th>
            <th>Tax Value</th>
            <th>Net Value</th>
           <th>Action </th>
          </tr>
        </thead>
        <tbody id="test1">
          <?php $__currentLoopData = $sale_entry; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
              <td><?php echo e($key+1); ?></td>
              <td><?php echo e($value->s_no); ?></td>
              <td><?php echo e($value->s_date); ?></td>
              <td><?php echo e($value->sale_estimation_no); ?></td>
              <td><?php echo e($value->so_no); ?></td>
              <td><?php echo e($value->so_date); ?></td>
              <td><?php echo e($value->d_no); ?></td>
              <?php if(isset($value->customer->name) && !empty($value->customer->name)): ?>
              <td><?php echo e($value->customer->name); ?></td>
              <?php else: ?>
              <td></td>
              <?php endif; ?>
              <?php if(isset($value->salesman->name) && !empty($value->salesman->name)): ?>
              <td><?php echo e($value->salesman->name); ?></td>
              <?php else: ?>
              <td></td>
              <?php endif; ?>
              <td><?php echo e(@$value->locations->name); ?></td>
              <td><?php echo e($total_discount[$key]); ?></td>
              <!-- <td><?php echo e($value->round_off); ?></td> -->
              <td><?php echo e($expense_total[$key]); ?></td>
              <td><?php echo e($taxable_value[$key]); ?></td>
              <td><?php echo e($tax_value[$key]); ?></td>
              <td><?php echo e($total[$key]); ?></td>
              <td class="icon">
	<span class="tdshow"> 
                <?php if($value->cancel_status == 0): ?>
                <a href="<?php echo e(route('sales_entry.show',$value->s_no)); ?>"  class="px-2 py-1 bg-info text-white rounded" title="View">
				<i class="fa fa-eye" aria-hidden="true"></i></a>
                <a href="<?php echo e(route('sales_entry.edit',$value->s_no)); ?>" class="px-2 py-1 bg-success text-white rounded"  title="Edit">
				<i class="fa fa-pencil" aria-hidden="true"></i></a>
                <a href="<?php echo e(url('sales_entry/delete/'.$value->s_no )); ?>" onclick="return confirm('Are you sure ?')" class="px-2 py-1 bg-danger text-white rounded" title="Delete">
				<i class="fa fa-trash" aria-hidden="true" ></i></a>

                <a href="<?php echo e(url('sales_entry/cancel/'.$value->s_no)); ?>" class="px-2 py-1   bg-info text-white rounded" title="Cancel">
				<i class="fa fa-ban" aria-hidden="true" ></i></a>


               
                <a href="<?php echo e(url('sales_entry/item_details/'.$value->s_no )); ?>" class="px-1 py-0 bg-info text-white rounded" title="Item Details">
				<i class="fa fa-info-circle" aria-hidden="true" ></i></a>
                <a href="<?php echo e(url('sales_entry/expense_details/'.$value->s_no )); ?>" class="px-1 py-0 bg-info text-white rounded" title="Expenses Details">
				<i class="fa fa-inr" aria-hidden="true"></i></a>
                <?php else: ?>
                <a href="<?php echo e(url('sales_entry/retrieve/'.$value->s_no)); ?>" class="px-2 py-1 bg-primary text-white rounded">Retrieve</a>
                <?php endif; ?>
				</span>
              </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
         
        </tbody>

        <tbody id="test2" style="display: none;">
          <?php $__currentLoopData = $sale_entry_beta; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
              <td><?php echo e($key+1); ?></td>
              <td><?php echo e($value->s_no); ?></td>
              <td><?php echo e($value->s_date); ?></td>
              <td><?php echo e($value->sale_estimation_no); ?></td>
              <td><?php echo e($value->so_no); ?></td>
              <td><?php echo e($value->so_date); ?></td>
              <td><?php echo e($value->d_no); ?></td>
              <?php if(isset($value->customer->name) && !empty($value->customer->name)): ?>
              <td><?php echo e($value->customer->name); ?></td>
              <?php else: ?>
              <td></td>
              <?php endif; ?>
              <?php if(isset($value->salesman->name) && !empty($value->salesman->name)): ?>
              <td><?php echo e($value->salesman->name); ?></td>
              <?php else: ?>
              <td></td>
              <?php endif; ?>
              <td><?php echo e(@$value->locations->name); ?></td>
              <td><?php echo e($total_discount_beta[$key]); ?></td>
              <!-- <td><?php echo e($value->round_off); ?></td> -->
              <td><?php echo e($expense_total_beta[$key]); ?></td>
              <td><?php echo e($taxable_value_beta[$key]); ?></td>
              <td><?php echo e($tax_value_beta[$key]); ?></td>
              <td><?php echo e($total_beta[$key]); ?></td>
              <td class="icon">
	<span class="tdshow"> 
                <?php if($value->cancel_status == 0): ?>
                <a href="<?php echo e(route('sales_entry.show',$value->s_no)); ?>" class="px-1 py-0 text-white rounded" title="View">><i class="fa fa-eye" aria-hidden="true"></i></a>
                <a href="<?php echo e(url('sales_entry/edit_beta/'.$value->s_no)); ?>" class="px-2 py-1 bg-success text-white rounded"  title="Edit">
				<i class="fa fa-pencil" aria-hidden="true"></i></a>
                <a href="<?php echo e(url('sales_entry/delete/'.$value->s_no )); ?>" onclick="return confirm('Are you sure ?')" class="px-1 py-0  text-white rounded" title="Delete"><i class="fa fa-trash" aria-hidden="true"></i></a>

                <a href="<?php echo e(url('sales_entry/cancel_beta/'.$value->s_no)); ?>" class="px-2 py-1   bg-info text-white rounded" title="Cancel">
				<i class="fa fa-ban" aria-hidden="true" ></i></a>


               
                <a href="<?php echo e(url('sales_entry/item_beta_details/'.$value->s_no )); ?>" class="px-1 py-0 bg-info text-white rounded" title="Item Details">
				<i class="fa fa-info-circle" aria-hidden="true" ></i></a>
                <a href="<?php echo e(url('sales_entry/expense_beta_details/'.$value->s_no )); ?>" class="px-1 py-0 bg-info text-white rounded" title="Expenses Details">
				<i class="fa fa-inr" aria-hidden="true"></i></a>
                <?php else: ?>
                <a href="<?php echo e(url('sales_entry/retrieve_beta/'.$value->s_no)); ?>" class="px-2 py-1 bg-primary text-white rounded">Retrieve</a>
                <?php endif; ?>
				</span>
              </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
         
        </tbody>
      </table>

    </div>

    <script>
  $(document).on('click','.alpha_beta',function(){

    if($('.alpha_beta').prop('checked'))
    {
      var val = 1;

      $('#test1').hide();

      $('#test2').show();
    }
    else
    {
      var val =0;

      $('#test1').show();

      $('#test2').hide();
    }

  });
</script>
    <!-- card body end@ -->
  </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ns_pollachi\resources\views/admin/sales_entry/view.blade.php ENDPATH**/ ?>