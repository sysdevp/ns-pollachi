<?php $__env->startSection('content'); ?>
<div class="col-12 body-sec">
  <div class="card container px-0">
    <!-- card header start@ -->
    <div class="card-header px-2">
      <div class="row">
        <div class="col-4">
          <h3>Add Location</h3>
        </div>
        <div class="col-8 mr-auto">
          <ul class="h-right-btn mb-0 pl-0">
            <li><button type="button" class="btn btn-success"><a href="<?php echo e(url('master/location')); ?>">Back</a></button></li>
          </ul>
        </div>
      </div>
    </div>
    <!-- card header end@ -->
    <div class="card-body">
    
      <form  method="post" class="form-horizontal needs-validation" novalidate action="<?php echo e(url('master/location/store')); ?>" enctype="multipart/form-data">
      <?php echo e(csrf_field()); ?>


        <div class="form-row">
          <div class="col-md-6">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Location Name <span class="mandatory">*</span></label>
              <div class="col-sm-8">
                <input type="text" class="form-control name only_allow_alp_num_dot_com_amp" placeholder="Location Name" name="name" value="<?php echo e(old('name')); ?>" required>
                <span class="mandatory"> <?php echo e($errors->first('name')); ?> </span>
                <div class="invalid-feedback">
                  Enter valid Location Name
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Location Type <span class="mandatory">*</span></label>
              <div class="col-sm-6">
                <select class="js-example-basic-multiple col-12 form-control custom-select location_type_id" name="location_type_id" required>
                  <option value="">Choose Location Type</option>
                  <?php $__currentLoopData = $location_type; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <option value="<?php echo e($value->id); ?>" <?php echo e(old('location_type_id') == $value->id ? 'selected' : ''); ?>><?php echo e($value->name); ?></option>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <span class="mandatory"> <?php echo e($errors->first('location_type_id')); ?> </span>
                <div class="invalid-feedback">
                  Enter valid Location Type
                </div>
              </div>
              <a href="<?php echo e(url('master/location-type/create')); ?>" target="_blank">
                <button type="button"  class="px-2 btn btn-success ml-2" title="Add Location Type"><i class="fa fa-plus-circle" aria-hidden="true"></i></button></a>
               <button type="button"  class="px-2 btn btn-success mx-2 refresh_location_type_id" title="Refresh"><i class="fa fa-refresh" aria-hidden="true"></i></button>
          
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Address Line 1 <span class="mandatory">*</span></label>
              <div class="col-sm-8">
                <input type="text" class="form-control address_line_1" placeholder="Address Line 1" name="address_line_1" value="<?php echo e(old('address_line_1')); ?>" required>
                <span class="mandatory"> <?php echo e($errors->first('address_line_1')); ?> </span>
                <div class="invalid-feedback">
                Enter valid Address
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Address Line 2 </label>
              <div class="col-sm-8">
                <input type="text" class="form-control address_line_2" placeholder="Address Line 2" name="address_line_2" value="<?php echo e(old('address_line_2')); ?>">
                <span class="mandatory"> <?php echo e($errors->first('address_line_2')); ?> </span>
                <div class="invalid-feedback">
                Enter valid Address
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group row">
              <label for="land_mark" class="col-sm-4 col-form-label">Land Mark </label>
              <div class="col-sm-8">
                <input type="text" class="form-control land_mark" placeholder="Land Mark" name="land_mark" value="<?php echo e(old('land_mark')); ?>">
                <span class="mandatory"> <?php echo e($errors->first('land_mark')); ?> </span>
                <div class="invalid-feedback">
                Enter valid Land Mark
                </div>
              </div>
            </div>
          </div>

          
          <div class="col-md-6">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">State <span class="mandatory">*</span></label>
              <div class="col-sm-6">
                <select class="js-example-basic-multiple form-control col-12 custom-select state_id" name="state_id" required>
                  <option value="">Choose State</option>
                  <?php $__currentLoopData = $state; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <option value="<?php echo e($value->id); ?>" <?php echo e(old('state_id') == $value->id ? 'selected' : ''); ?>><?php echo e($value->name); ?></option>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <span class="mandatory"> <?php echo e($errors->first('state_id')); ?> </span>
                <div class="invalid-feedback">
                  Enter valid State 
                </div>
              </div>
              <a href="<?php echo e(url('master/state/create')); ?>" target="_blank">
                <button type="button"  class="px-2 btn btn-success ml-2" title="Add State"><i class="fa fa-plus-circle" aria-hidden="true"></i></button></a>
               <button type="button"  class="px-2 btn btn-success mx-2 refresh_state_id" title="Refresh"><i class="fa fa-refresh" aria-hidden="true"></i></button>
          
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">District </label>
              <div class="col-sm-6">
                <select class="js-example-basic-multiple col-12 custom-select district_id" name="district_id">
                  <option value="">Choose District</option>
                  
                </select>
                <span class="mandatory"> <?php echo e($errors->first('district_id')); ?> </span>
                <div class="invalid-feedback">
                  Enter valid District
                </div>
              </div>
              <a href="<?php echo e(url('master/district/create')); ?>" target="_blank">
                <button type="button"  class="px-2 btn btn-success ml-2 " title="Add District"><i class="fa fa-plus-circle" aria-hidden="true"></i></button></a>
               <button type="button"  class="px-2 btn btn-success mx-2 refresh_district_id" title="Refresh"><i class="fa fa-refresh" aria-hidden="true"></i></button>
            </div>
          </div>


          
          <div class="col-md-6">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">City </label>
              <div class="col-sm-6">
                <select class="js-example-basic-multiple col-12 custom-select city_id" name="city_id" >
                  <option value="">Choose City</option>
                 </select>
                <span class="mandatory"> <?php echo e($errors->first('city_id')); ?> </span>
                <div class="invalid-feedback">
                  Enter valid City
                </div>
              </div>
              <a href="<?php echo e(url('master/city/create')); ?>" target="_blank">
                <button type="button"  class="px-2 btn btn-success ml-2 " title="Add City"><i class="fa fa-plus-circle" aria-hidden="true"></i></button></a>
               <button type="button"  class="px-2 btn btn-success mx-2 refresh_city_id" title="Refresh"><i class="fa fa-refresh" aria-hidden="true"></i></button>
            
            </div>
          </div>


          <div class="col-md-6">
            <div class="form-group row">
              <label for="land_mark" class="col-sm-4 col-form-label">Postal Code <span class="mandatory">*</span></label>
              <div class="col-sm-8">
                <input type="text" class="form-control only_allow_digit postal_code" placeholder="Postal Code" name="postal_code" value="<?php echo e(old('postal_code')); ?>" required>
                <span class="mandatory"> <?php echo e($errors->first('postal_code')); ?> </span>
                <div class="invalid-feedback">
                  Enter valid Postal Code
                </div>
              </div>
            </div>
          </div>

        </div>
        <div class="col-md-7 text-right">
          <button class="btn btn-success" name="add" type="submit">Submit</button>
        </div>
      </form>
    </div>
    <script src="<?php echo e(asset('assets/js/master/capitalize.js')); ?>"></script>
    <!-- card body end@ -->
  </div>
</div>
<script>

  $(document).on('input','.name',function(){

  $(this).val($(this).val().replace(/[^a-zA-Z ]/gi, ''));

  });

$(document).on("click",".refresh_state_id",function(){
   var state_dets=refresh_state_master_details();
  $(".state_id").html(state_dets);
  $(".district_id").html("<option value=''>Choose District</option>");
  $(".city_id").html("<option value=''>Choose City</option>");
});

$(document).on("click",".refresh_location_type_id",function(){
  var location_type_dets=refresh_location_type_master_details();
  $(".location_type_id").html(location_type_dets);
});

$(document).on("click",".refresh_district_id",function(){
  var state_id=$(".state_id").val();
  if(state_id !="")
  {
    var district_dets=refresh_district_master_details(state_id);
    $(".district_id").html(district_dets);
    $(".city_id").html("<option value=''>Choose City</option>");
  }
 });

 $(document).on("click",".refresh_city_id",function(){
  var state_id=$(".state_id").val();
  var district_id=$(".district_id").val();
  if(state_id !="" && district_id !="")
  {
    var city_dets=refresh_city_master_details(state_id,district_id);
    $(".city_id").html(city_dets);
  }
 });

function get_state_based_district(state_id,district_id)
{
  $.ajax({
              type: "post",
              url: "<?php echo e(url('common/get-state-based-district')); ?>",
              data: {state_id: state_id,district_id:district_id},
              success: function (res)
              {
                result = JSON.parse(res);
                $(".district_id").html(result.option);
              }
          });

}

function get_district_based_city(district_id,city_id)
{
  $.ajax({
              type: "post",
              url: "<?php echo e(url('common/get-district-based-city')); ?>",
              data: {district_id: district_id,city_id:city_id},
              success: function (res)
              {
                result = JSON.parse(res);
                $(".city_id").html(result.option);
              }
          });

}

$(document).ready(function(){
  var state_id="<?php echo e(old('state_id')); ?>";
  var district_id="<?php echo e(old('district_id')); ?>"; 
  var city_id="<?php echo e(old('city_id')); ?>"; 
 if(state_id != ""){
  get_state_based_district(state_id,district_id);
 }
 if(district_id !=""){
  get_district_based_city(district_id,city_id);
 }

});


  $(document).on("change",".state_id",function(){
    var state_id=$(this).val();
    $(".city_id").html("<option value=''>Choose City</option>");
    get_state_based_district(state_id,"");
    
  });



  $(document).on("change",".district_id",function(){
    var district_id=$(this).val();
    get_district_based_city(district_id,"");
  });


  </script>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ns_pollachi\resources\views/admin/master/location/add.blade.php ENDPATH**/ ?>