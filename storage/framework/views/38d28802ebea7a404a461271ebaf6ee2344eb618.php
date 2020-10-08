<?php $__env->startSection('content'); ?>
<div class="col-12 body-sec">
  <div class="card">
    <!-- card header start@ -->
    <div class="card-header px-2">
      <div class="row">
        <div class="col-4">
          <h3>List Receipt Request</h3>
        </div>
        <div class="col-8 mr-auto">
          <ul class="h-right-btn mb-0 pl-0">
            <li><button type="button" class="btn btn-success"><a href="<?php echo e(route('receipt_request.create')); ?>">Receipt Request</a></button></li>
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
            <th>Party Name </th>
            <th>Request No </th>
            <th>Request Date</th>
            <th>Bill No</th>
            <th>Bill Date</th>
            <th>Taxable Value</th>
            <th>Tax Value</th>
            <th>Net Value</th>
            <th>Paid Amount</th>
            <th>Paid Date</th>
           <th>Action </th>
          </tr>
        </thead>
        <tbody>
            <tr>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td> 
                <!-- <a href="" class="px-2 py-1 bg-info text-white rounded"><i class="fa fa-eye" aria-hidden="true"></i></a>
                <a href="" class="px-2 py-1 bg-success text-white rounded"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                <a href="" onclick="return confirm('Are you sure ?')" class="px-2 py-1 bg-danger text-white rounded"><i class="fa fa-trash" aria-hidden="true"></i></a> -->

                
              </td>
            </tr>
         
        </tbody>
      </table>

    </div>
    <!-- card body end@ -->
  </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ns_pollachi\resources\views/admin/receipt_request/view.blade.php ENDPATH**/ ?>