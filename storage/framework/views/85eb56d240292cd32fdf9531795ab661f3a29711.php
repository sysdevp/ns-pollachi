<?php $__env->startSection('content'); ?>
<div class="col-12 body-sec">
  <div class="card">
    <!-- card header start@ -->
    <div class="card-header px-2">
      <div class="row">
        <div class="col-4">
          <h3>List Gift Voucher</h3>
        </div>
        <div class="col-8 mr-auto">
          <ul class="h-right-btn mb-0 pl-0">
            <li><button type="button" class="btn btn-success"><a href="<?php echo e(url('master/gift-voucher/create')); ?>">Add Gift Voucher</a></button></li>
          </ul>
        </div>
      </div>
    </div>

    <!-- card header end@ -->
    <div class="card-body">
      <table id="master" class="table table-striped table-bordered" style="width:100%">
        <thead>
          <tr>
            <th>S.No</th>
            <th>Gift Voucher Name</th>
            <th>Gift Voucher Code</th>
            <th>Gift Voucher Value</th>
            <th> Voucher Valid From Date</th>
            <th> Voucher Valid To Date</th>
            <th>Remark</th>
           <th>Action </th>
          </tr>
        </thead>
        <tbody>
          
          <?php $__currentLoopData = $gift_voucher; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
              <td><?php echo e($key+1); ?></td>
              <td><?php echo e($value->name); ?></td>
              <td><?php echo e($value->code); ?></td>
              <td><?php echo e($value->value); ?></td>
             
              <td><?php echo e($value->valid_from !="" ? date('d-m-Y',strtotime($value->valid_from)) : ""); ?></td>
              <td><?php echo e($value->valid_to !="" ? date('d-m-Y',strtotime($value->valid_to)) : ""); ?></td>
               <td><?php echo e($value->remark); ?></td>
              <td> 
                <a href="<?php echo e(url('master/gift-voucher/show/'.$value->id )); ?>" class="px-2 py-1 bg-info text-white rounded"><i class="fa fa-eye" aria-hidden="true"></i></a>
                <a href="<?php echo e(url('master/gift-voucher/edit/'.$value->id )); ?>" class="px-2 py-1 bg-success text-white rounded"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                <a onclick="return confirm('Are you sure ?')" href="<?php echo e(url('master/gift-voucher/delete/'.$value->id )); ?>" class="px-2 py-1 bg-danger text-white rounded"><i class="fa fa-trash" aria-hidden="true"></i></a>
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
<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ns_pollachi\resources\views/admin/master/gift_voucher/view.blade.php ENDPATH**/ ?>