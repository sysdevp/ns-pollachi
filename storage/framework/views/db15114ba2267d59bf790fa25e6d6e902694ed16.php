<?php $__env->startSection('content'); ?>
<main class="page-content">

<div class="col-12 body-sec">
  <div class="card">
    <!-- card header start@ -->
    <div class="card-header px-2">
      <div class="row">
        <div class="col-4">
          <h3>List Location</h3>
        </div>
        <div class="col-8 mr-auto">
          <ul class="h-right-btn mb-0 pl-0">
            <li><button type="button" class="btn btn-success"><a href="<?php echo e(url('master/location/create')); ?>">Add Location</a></button></li>
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
            <th>Location Name</th>
            <th>Location Type</th>
            <th>Address</th>
           <th>Action </th>
          </tr>
        </thead>
        <tbody>
          
          <?php $__currentLoopData = $location; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
              <td><?php echo e($key+1); ?></td>
              <td><?php echo e($value->name); ?></td>
              <td><?php echo e(isset($value->location_type->name) && !empty($value->location_type->name) ? $value->location_type->name : ""); ?></td>
              <td>
                  <?php if($value->address_line_1 != ""): ?>
                  <?php echo e($value->address_line_1); ?>,</br>
                  <?php endif; ?>
                  <?php if($value->address_line_2 != ""): ?>
                  <?php echo e($value->address_line_2); ?>,</br>
                  <?php endif; ?>
                  
                
                  <?php if($value->land_mark != ""): ?>
                  <?php echo e($value->land_mark); ?>,
                  <?php endif; ?>
                  <?php if(isset($value->city->name) && $value->city->name != ""): ?>
                  <?php echo e($value->city->name); ?>,
                  <?php endif; ?>

                  <?php if(isset($value->district->name) && $value->district->name != ""): ?>
                  <?php echo e($value->district->name); ?>,
                  <?php endif; ?>
</br>

                  <?php if(isset($value->state->name) && $value->state->name != ""): ?>
                  <?php echo e($value->state->name); ?>

                  <?php endif; ?>
                  <?php if($value->postal_code != ""): ?>
                 - <?php echo e($value->postal_code); ?>,</br>
                  <?php endif; ?>

                


            
             </td>
              <td> 
                <a href="<?php echo e(url('master/location/show/'.$value->id )); ?>" class="px-2 py-1 bg-info text-white rounded"><i class="fa fa-eye" aria-hidden="true"></i></a>
                <a href="<?php echo e(url('master/location/edit/'.$value->id )); ?>" class="px-2 py-1 bg-success text-white rounded"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                <a onclick="return confirm('Are you sure ?')" href="<?php echo e(url('master/location/delete/'.$value->id )); ?>" class="px-2 py-1 bg-danger text-white rounded"><i class="fa fa-trash" aria-hidden="true"></i></a>
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
<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ns_pollachi\resources\views/admin/master/location/view.blade.php ENDPATH**/ ?>