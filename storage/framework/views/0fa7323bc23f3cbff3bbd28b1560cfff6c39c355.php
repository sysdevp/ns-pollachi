<?php $__env->startSection('content'); ?>
<div class="col-12 body-sec">
  <div class="card">
    <!-- card header start@ -->
    <div class="card-header px-2">
      <div class="row">
        <div class="col-4">
          <h3> List Item Tax Details </h3>
        </div>
        <div class="col-8 mr-auto">
          <ul class="h-right-btn mb-0 pl-0">
            
            <li><button type="button" onclick="refresh()" style="width: 40px; height: 25px;" class="btn btn-success fa fa-refresh"></button></li>
            <li><button type="button" class="btn btn-success"><a href="<?php echo e(url('master/item-tax-details/create')); ?>">Add Item Tax Details </a></button></li>
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
            <th>Item Name</th>
            
            <th>Brand</th>
            <th>Category</th>
            <th>Tax Name</th>
            <!-- <?php $__currentLoopData = $taxes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <th><?php echo e($value->name); ?></th>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> -->
            <th>Tax %</th>
            <th>Effective From Date</th>
            <th> Action </th>
          </tr>
        </thead>
        <tbody>
          
          <?php $__currentLoopData = $item_tax_details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <?php
              $barnd_name="";
              if($value->item->brand_id > 0 && isset($value->item->brand->name))
              {
                $barnd_name=$value->item->brand->name;
              }
              else if($value->item->brand_id == 0)
              {
                $barnd_name="Not Applicable";
              }
            
            ?>
            <tr>
              <td><?php echo e($key+1); ?></td>
              <td><?php echo e(isset($value->item->name) && !empty($value->item->name) ? $value->item->name : ""); ?></td>
              <td><?php echo e($barnd_name); ?></td>
              <td><?php echo e(isset($value->item->category->name) && !empty($value->item->category->name) ? $value->item->category->name : ""); ?></td>
              <td><?php echo e($value->tax->name); ?></td>
            <td><?php echo e($value->value); ?></td>
            
              <td><?php echo e($value->valid_from !="" ? date('d-m-Y',strtotime($value->valid_from )) : ""); ?></td>
            
              
              <td> 
                <a href="<?php echo e(url('master/item-tax-details/show/'.$value->id )); ?>" class="px-1 py-0 bg-info text-white rounded"><i class="fa fa-eye" aria-hidden="true"></i></a>
                <a href="<?php echo e(url('master/item/edit/'.$value->item->id )); ?>" target="_blank" class="px-1 py-0 bg-success text-white rounded"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                <!-- <a onclick="return confirm('Are you sure ?')" href="<?php echo e(url('master/item-tax-details/delete/'.$value->id )); ?>" class="px-1 py-0 bg-danger text-white rounded"><i class="fa fa-trash" aria-hidden="true"></i></a> -->
               </td>
            </tr>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
         
        </tbody>
      </table>

    </div>
    <script type="text/javascript">
      function refresh()
      {
        window.location.reload();
      }
    </script>
    <!-- card body end@ -->
  </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ns_pollachi\resources\views/admin/master/item_tax_details/view.blade.php ENDPATH**/ ?>