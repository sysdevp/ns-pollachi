<?php $__env->startSection('content'); ?>
<div class="col-12 body-sec">
  <div class="card">
    <!-- card header start@ -->
    <div class="card-header px-2">
      <div class="row">
        <div class="col-4">
          <h3>List Item</h3>
        </div>
        <div class="col-8 mr-auto">
          <ul class="h-right-btn mb-0 pl-0">
            <li><button type="button" class="btn btn-success"><a href="<?php echo e(url('master/item/create')); ?>">Add Item</a></button></li>
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
            <th>Item Code</th>
            <th>Category </th>
            <th>Brand Name </th>
            <th> Item Type</th>
            <th> Bulk Item Name</th>
            <th> Weight In Grams </th>
            <th> Weight In Kg</th>
            <th>Item Name in English</th>
            <th>Item Name in Tamil</th>
            <th>Item Name in Malayalam</th>
            <th>Item Name in Hindi</th>
            <th>Default Selling Price</th>
            <th>Mrp</th>
            <th>Uom</th>
            
            <th>Action </th>
          </tr>
        </thead>
        <tbody>
          
          <?php $__currentLoopData = $item; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
              $barnd_name="";
              if($value->brand_id > 0 && isset($value->brand->name))
              {
                $barnd_name=$value->brand->name;
              }
              else if($value->brand_id == 0)
              {
                $barnd_name="Not Applicable";
              }
            ?>
            <tr>
              <td><?php echo e($key+1); ?></td>
              <td><?php echo e($value->name); ?></td>
              <td><?php echo e($value->code); ?></td>
              <td><?php echo e(isset($value->category->name) ? $value->category->name : ""); ?></td>
              <td><?php echo e($barnd_name); ?></td>
              <td><?php echo e($value->item_type); ?></td>
              <td><?php echo e(isset($value->bulk_item->name) ? $value->bulk_item->name : ""); ?></td>
              <td><?php echo e($value->weight_in_grams); ?></td>
              <td><?php echo e($value->weight_in_kg); ?></td>
              <td><?php echo e($value->print_name_in_english); ?></td>
              <td><?php echo e($value->print_name_in_language_1); ?></td>
              <td><?php echo e($value->print_name_in_language_2); ?></td>
              <td><?php echo e($value->print_name_in_language_3); ?></td>
              <td class="amount"><?php echo e($value->default_selling_price); ?></td>
              <td class="amount"><?php echo e($value->mrp); ?></td>
              <td><?php echo e(isset($value->uom->name) ? $value->uom->name : ""); ?></td>
              
              <td> 
                <a href="<?php echo e(url('master/item/show/'.$value->id )); ?>" class="px-1 py-0 bg-info text-white rounded"><i class="fa fa-eye" aria-hidden="true"></i></a>
                <a href="<?php echo e(url('master/item/edit/'.$value->id )); ?>" class="px-1 py-0 bg-success text-white rounded"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                <a onclick="return confirm('Are you sure ?')" href="<?php echo e(url('master/item/delete/'.$value->id )); ?>" class="px-1 py-0 bg-danger text-white rounded"><i class="fa fa-trash" aria-hidden="true"></i></a>
                <!-- <?php if($value->item_type == "Bulk"): ?>
                <a href="<?php echo e(url('master/item/uom-factor-convertion-for-item/'.$value->id )); ?>" class="px-1 py-0 bg-info text-white rounded"><i class="fa fa-plus" aria-hidden="true"></i>Uom Factor Convertion</a>
                <?php endif; ?> -->
               
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
<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ns_pollachi\resources\views/admin/master/item/view.blade.php ENDPATH**/ ?>