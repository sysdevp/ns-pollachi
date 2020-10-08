<?php $__env->startSection('content'); ?>
<div class="col-12 body-sec">
  <div class="card container px-0">
    <!-- card header start@ -->
    <div class="card-header px-2">
      <div class="row">
        <div class="col-4">
          <h3>Add Employee</h3>
        </div>
        <div class="col-8 mr-auto">
          <ul class="h-right-btn mb-0 pl-0">
            <li><button type="button" class="btn btn-success"><a href="<?php echo e(url('master/employee')); ?>">Back</a></button></li>
          </ul>
        </div>
      </div>
    </div>
    <!-- card header end@ -->
    <div class="card-body">
    
      <form  method="post" class="form-horizontal needs-validation" 
      novalidate action="<?php echo e(url('master/employee/store')); ?>" enctype="multipart/form-data">
      <?php echo e(csrf_field()); ?>



     
        <div class="form-row">
         <div class="col-md-8">
          <h4>Professional details:</h4>
          </div>
          <div class="col-md-6">
             <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Employee Name <span class="mandatory">*</span></label>
              <div class="col-sm-8">
            <div class="input-group">
            <div class="input-group-prepend">
              <select class="form-control required_for_valid salutation" name="salutation" error-data="Enter valid Salutation" >
                  <option value="Mr" <?php echo e(old('salutation') == 'Mr' ? 'selected' : ''); ?>>Mr</option>
                  <option value="Mrs" <?php echo e(old('salutation') == 'Mrs' ? 'selected' : ''); ?> >Mrs</option>
              </select>
              <span class="mandatory"> <?php echo e($errors->first('salutation')); ?> </span>
            </div>
            <input type="text" class="form-control required_for_valid only_allow_alp_numeric name" name="name" error-data="Employee Name Field is required" aria-label="Text input with dropdown button" value=<?php echo e(old('name')); ?>>
            
            <div class="invalid-feedback">
              Enter valid Employee Name
            </div>
            
          </div>
          <span class="mandatory"> <?php echo e($errors->first('name')); ?> </span>
          <span class="mandatory"> <?php echo e($errors->first('salutation')); ?> </span>
          </div>
          </div>

          </div>
       <div class="col-md-6">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Employee Code <span class="mandatory">*</span></label>
              <div class="col-sm-8">
                <input type="text" class="form-control code only_allow_alp_numeric required_for_valid" error-data="Enter valid Employee Code" placeholder="Employee Code" name="code" value="<?php echo e(old('code')); ?>" >
                <span class="mandatory"> <?php echo e($errors->first('code')); ?> </span>
                <div class="invalid-feedback">
                  Enter valid Employee Code
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Phone No <span class="mandatory">*</span></label>
              <div class="col-sm-8">
                <input type="text" class="form-control only_allow_digit phone_no required_for_valid" input-type="phone_no" pattern="[1-9]{1}[0-9]{9}" error-data="Enter valid Phone No" placeholder="Phone No" name="phone_no" value="<?php echo e(old('phone_no')); ?>" >
                <span class="mandatory"> <?php echo e($errors->first('phone_no')); ?> </span>
                <div class="invalid-feedback">
                  Enter valid Phone No
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Email <span class="mandatory">*</span></label>
              <div class="col-sm-8">
                <input type="email" class="form-control email required_for_valid" input-type="email" error_data="Enter valid Email" placeholder="Email" name="email" value="<?php echo e(old('email')); ?>" >
                <span class="mandatory"> <?php echo e($errors->first('email')); ?> </span>
                <div class="invalid-feedback">
                  Enter valid Email
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">DOB <span class="mandatory">*</span></label>
              <div class="col-sm-8">
                <input type="text" class="form-control dob required_for_valid" error-data="Enter valid DOB" placeholder="dd-mm-yyyy" name="dob" value="<?php echo e(old('dob')); ?>" >
                <span class="mandatory"> <?php echo e($errors->first('dob')); ?> </span>
                <div class="invalid-feedback">
                  Enter valid DOB
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Department <span class="mandatory">*</span></label>
              <div class="col-sm-6">
                <select class="js-example-basic-multiple col-12 form-control custom-select department_id required_for_valid" 
              error-data="Enter valid Department" data-placeholder="Choose Department" name="department_id" >
                <option value="">Choose Department</option>
                  <?php $__currentLoopData = $department; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <option value="<?php echo e($value->id); ?>" <?php echo e(old('department_id') == $value->id  ? 'selected' : ''); ?>><?php echo e($value->name); ?></option>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
               </select>
                <span class="mandatory"> <?php echo e($errors->first('department_id')); ?> </span>
                <div class="invalid-feedback">
                  Enter valid Department
                </div>
              </div>
              <a href="<?php echo e(url('master/department/create')); ?>" target="_blank">
                <button type="button"  class="px-2 btn btn-success ml-2 " title="Add Department"><i class="fa fa-plus-circle" aria-hidden="true"></i></button></a>
               <button type="button"  class="px-2 btn btn-success mx-2 refresh_department_id" title="Refresh"><i class="fa fa-refresh" aria-hidden="true"></i></button>
       
            </div>
          </div>
 </div>
 <div class="form-row">
 <div class="col-md-8">
          <h4>Personal Details :</h4>
          </div>

          <div class="col-md-6">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Father's Name <span class="mandatory">*</span></label>
              <div class="col-sm-8">
                <input type="text" class="form-control father_name only_allow_alp_numeric required_for_valid" error-data="Enter valid Father's Name" placeholder="Father's Name" name="father_name" value="<?php echo e(old('father_name')); ?>">
                <span class="mandatory"> <?php echo e($errors->first('father_name')); ?> </span>
                <div class="invalid-feedback">
                  Enter valid Father's Name
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Blood Group <span class="mandatory">*</span></label>
              <div class="col-sm-8">
                <input type="text" class="form-control blood_group required_for_valid" error-data="Enter valid Blood Group" placeholder="Blood Group" name="blood_group" value="<?php echo e(old('blood_group')); ?>" >
                <span class="mandatory"> <?php echo e($errors->first('blood_group')); ?> </span>
                <div class="invalid-feedback">
                  Enter valid Blood Group
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Material Status <span class="mandatory">*</span></label>
              <div class="col-sm-8">
              <select class="js-example-basic-multiple col-12 form-control material_status select custom-select required_for_valid" 
              error-data="Enter valid Material Status" data-placeholder="Choose Material " name="material_status" >
              <option value=""></option>
                 <option value="Married"  <?php echo e(old('material_status') == 'Married' ? 'selected' : ''); ?>>Married</option>
                  <option value="Single" <?php echo e(old('material_status') == 'Single' ? 'selected' : ''); ?>>Single</option>
                  <option value="Divorced" <?php echo e(old('material_status') == 'Divorced' ? 'selected' : ''); ?>>Divorced</option> 
               </select>
               
                  <span class="mandatory"> <?php echo e($errors->first('material_status')); ?> </span>
                  <div class="invalid-feedback">
                    Enter valid Material Status
                  </div>
              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Photo <span class="mandatory">*</span></label>
              <div class="col-sm-8">
                <input type="file" class="form-control profile " placeholder="Father's Name" name="profile" value="<?php echo e(old('profile')); ?>" >
                <button type="button" id="cus-btn">CHOOSE A FILE</button>
                <span class="mandatory"> <?php echo e($errors->first('profile')); ?> </span>
                <div class="invalid-feedback">
                  Enter valid profile
                </div>  
              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Access No <span class="mandatory">*</span></label>
              <div class="col-sm-8">
                <input type="text" class="form-control access_no only_allow_alp_numeric required_for_valid" error-data="Enter valid Access No" placeholder="Access No" name="access_no" value="<?php echo e(old('access_no')); ?>" >
                <span class="mandatory"> <?php echo e($errors->first('access_no')); ?> </span>
                <div class="invalid-feedback">
                  Enter valid Access No
                </div>
              </div>
            </div>
          </div>

          


 </div>

 <div class="form-row">
 <div class="col-md-8">
          <div class="form-group row">
          <div class="col-md-4">
          <label for="validationCustom01" class=" col-form-label">Address details : </label>
              <label for="validationCustom01" class="btn-sm btn-success add_address">Add Address</label>  
          </div>
            </div>
 </div>
          
          </div>
          <div class="common_address_div">
            
            
          
              <?php if(old('address_line_1')): ?>
                
              <?php $__currentLoopData = old('address_line_1'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            
                            <div class="form-row address_div">
      <div class="col-md-7">
        <div class="form-group row">
        <div class="col-md-7">
        <h3 class="address_label"></h3>
        </div>
        <div class="col-md-4">
        <h3 class="address_delete_label"><label class="btn btn-danger remove_address"> Delete </label></h3>
            </div>
        </div>
        </div>



                <div class="col-md-6">
              <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Address Type <span class="mandatory">*</span></label>
                <div class="col-sm-6">
                <select class="js-example-basic-multiple col-12 form-control custom-select address_type_id required_for_valid required_for_address_valid" error-data="Enter valid Address Type" name="address_type_id[]">
                    <option value="">Choose Address Type</option>
                    <?php $__currentLoopData = $address_type; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($value->id); ?>" <?php echo e(old('address_type_id.'.$key) == $value->id ? 'selected' : ''); ?> ><?php echo e($value->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </select>
                  <span class="mandatory"> <?php echo e($errors->first('address_type_id.'.$key)); ?> </span>
                 <div class="invalid-feedback">
                    Enter valid Address Type
                  </div>
                </div>
                <a href="<?php echo e(url('master/address-type/create')); ?>" target="_blank">
                  <button type="button"  class="px-2 btn btn-success ml-2 " title="Add Address Type"><i class="fa fa-plus-circle" aria-hidden="true"></i></button></a>
                 <button type="button"  class="px-2 btn btn-success mx-2 refresh_address_type_id" title="Refresh"><i class="fa fa-refresh" aria-hidden="true"></i></button>
            
              </div>
            </div>
      <div class="col-md-6">
              <div class="form-group row">
                <label for="validationCustom01" class="col-sm-4 col-form-label">Address Line 1 <span class="mandatory">*</span></label>
                <div class="col-sm-8">
                <input type="text" class="form-control address_line_1 required_for_valid required_for_address_valid" error-data="Enter valid Address" placeholder="Address Line 1" name="address_line_1[]" value="<?php echo e(old('address_line_1.'.$key)); ?>" >
                  <span class="mandatory"> <?php echo e($errors->first('address_line_1.'.$key)); ?> </span>
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
                  <input type="text" class="form-control address_line_2" placeholder="Address Line 2" name="address_line_2[]" value="<?php echo e(old('address_line_2.'.$key)); ?>">
                  <span class="mandatory"> <?php echo e($errors->first('address_line_2.'.$key)); ?> </span>
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
                  <input type="text" class="form-control land_mark" placeholder="Land Mark" name="land_mark[]" value="<?php echo e(old('land_mark.'.$key)); ?>">
                  <span class="mandatory"> <?php echo e($errors->first('land_mark.'.$key)); ?> </span>
                  <div class="invalid-feedback">
                  Enter valid Land Mark
                  </div>
                </div>
              </div>
            </div>
            <!-- Old Values For Dropdown Start Here  -->
          <input type="hidden" class="form-control old_state_id" value="<?php echo e(old('state_id.'.$key)); ?>">
          <input type="hidden" class="form-control old_district_id" value="<?php echo e(old('district_id.'.$key)); ?>">
          <input type="hidden" class="form-control old_city_id" value="<?php echo e(old('city_id.'.$key)); ?>">
            <!-- Old Values For Dropdown End Here  -->
  <div class="col-md-6">
              <div class="form-group row">
                <label for="validationCustom01" class="col-sm-4 col-form-label">State <span class="mandatory">*</span></label>
                <div class="col-sm-6">
                  <select class="js-example-basic-multiple col-12 form-control custom-select state_id required_for_valid required_for_address_valid" error-data="Enter valid State" name="state_id[]" >
                    <option value="">Choose State</option>
                    <?php $__currentLoopData = $state; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($value->id); ?>" <?php echo e(old('state_id.'.$key) == $value->id ? 'selected' : ''); ?>  ><?php echo e($value->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </select>
                  <span class="mandatory"> <?php echo e($errors->first('state_id.'.$key)); ?> </span>
                <div class="invalid-feedback">
                    Enter valid State 
                  </div>
                </div>
                <a href="<?php echo e(url('master/state/create')); ?>" target="_blank">
                  <button type="button"  class="px-2 btn btn-success ml-2 " title="Add State"><i class="fa fa-plus-circle" aria-hidden="true"></i></button></a>
                 <button type="button"  class="px-2 btn btn-success mx-2 refresh_state_id" title="Refresh"><i class="fa fa-refresh" aria-hidden="true"></i></button>
             </div>
            </div>
  <div class="col-md-6">
              <div class="form-group row">
                <label for="validationCustom01" class="col-sm-4 col-form-label">District </label>
                <div class="col-sm-6">
                  <select class="js-example-basic-multiple col-12 form-control custom-select district_id" name="district_id[]">
                    <option value="">Choose District</option>
                    </select>
                   <span class="mandatory"> <?php echo e($errors->first('district_id.'.$key)); ?> </span>
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
                  <select class="js-example-basic-multiple col-12 form-control custom-select city_id" name="city_id[]" >
                    <option value="">Choose City</option>
                  </select>
                  <span class="mandatory"> <?php echo e($errors->first('city_id.'.$key)); ?> </span>
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
                <input type="text" class="form-control postal_code only_allow_digit required_for_valid required_for_address_valid" error-data="Enter valid Postal Code" placeholder="Postal Code" name="postal_code[]" value="<?php echo e(old('postal_code.'.$key)); ?>" >
                  <span class="mandatory"> <?php echo e($errors->first('postal_code.'.$key)); ?> </span>
                  <div class="invalid-feedback">
                    Enter valid Postal Code
                  </div>
                </div>
              </div>
            </div>
            </div><hr>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              <?php endif; ?>

          </div>

          <div class="form-row">
              <div class="col-md-8">
                       <div class="form-group row">
                       <div class="col-md-4">
                       <label for="validationCustom01" class=" col-form-label"><h4>Proof Details :</h4> </label>
                           
                       </div>
                         </div>
              </div>
              <div class="col-md-12">
                <table class="table">
                  <thead>
                    <th> S.no </th>
                    <th> Proof Name</th>
                    <th> Proof Number</th>
                    <th> Files </th>
                    <th>Action </th>
                  </thead>
                  <tbody class="append_proof_details">
                    <tr>
                      <td><span class="s_no"> 1 </span></td>
                      <td>
                        <div class="form-group row">
                          <div class="col-sm-12">
                          <input type="text" class="form-control proof_name required_for_proof_valid" error-data="Enter valid Postal Code" placeholder="Proof Name" name="proof_name[]" value="<?php echo e(old('proof_name.0')); ?>" >
                            <span class="mandatory"> <?php echo e($errors->first('proof_name.0')); ?> </span>
                            <div class="invalid-feedback">
                              Enter valid Proof Name
                            </div>
                          </div>
                        </div>
                      </td>
                   <td>
                            <div class="form-group row">
                              <div class="col-sm-12">
                              <input type="text" class="form-control proof_number only_allow_digit required_for_proof_valid" error-data="Enter valid Postal Code" placeholder="Proof Number" name="proof_number[]" value="<?php echo e(old('proof_number.0')); ?>" >
                                <span class="mandatory"> <?php echo e($errors->first('proof_number.0')); ?> </span>
                                <div class="invalid-feedback">
                                  Enter valid Proof Number
                                </div>
                              </div>
                            </div>
                          </td>

                          <td>
                              <div class="form-group row">
                                <div class="col-sm-12">
                                <input type="file" class="form-control proof_file  required_for_proof_valid" error-data="Enter valid Postal Code" placeholder="Proof Name" name="proof_file[]" value="<?php echo e(old('proof_file.0')); ?>" >
                                  <span class="mandatory"> <?php echo e($errors->first('proof_file.0')); ?> </span>
                                  <div class="invalid-feedback">
                                    Enter valid Proof file
                                  </div>
                                </div>
                              </div>
                            </td>

                            <td>
                                <div class="form-group row">
                                    <div class="col-sm-3">
                                    <label class="btn btn-success add_proof_details">+</label>
                                    </div>
                                    <div class="col-sm-3">
                                      <label class="btn btn-danger remove_proof_details">-</label>
                                      </div>
                                  </div>
                            </td>

                    </tr>

                    <?php if(old('proof_name')): ?>
            <?php $__currentLoopData = old('proof_name'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($key > 0): ?>
            <tr>
                <td><span class="s_no"> 1 </span></td>
                <td>
                  <div class="form-group row">
                    <div class="col-sm-12">
                    <input type="text" class="form-control proof_name required_for_proof_valid" error-data="Enter valid Postal Code" placeholder="Proof Name" name="proof_name[]" value="<?php echo e(old('proof_name.'.$key)); ?>" >
                       <span class="mandatory"> <?php echo e($errors->first('proof_name.'.$key)); ?> </span>
                      <div class="invalid-feedback">
                        Enter valid Proof Name
                      </div>
                    </div>
                  </div>
                </td>
             <td>
                      <div class="form-group row">
                        <div class="col-sm-12">
                        <input type="text" class="form-control proof_number  only_allow_digit required_for_proof_valid" error-data="Enter valid Postal Code" placeholder="Proof Number" name="proof_number[]" value="<?php echo e(old('proof_number.'.$key)); ?>" >
                          <span class="mandatory"> <?php echo e($errors->first('proof_number.'.$key)); ?> </span>
                          <div class="invalid-feedback">
                            Enter valid Proof Number
                          </div>
                        </div>
                      </div>
                    </td>

                    <td>
                        <div class="form-group row">
                          <div class="col-sm-12">
                          <input type="file" class="form-control proof_file  required_for_proof_valid" error-data="Enter valid Postal Code" placeholder="Proof Name" name="proof_file[]" value="<?php echo e(old('proof_file.'.$key)); ?>" >
                            <span class="mandatory"> <?php echo e($errors->first('proof_file.'.$key)); ?> </span>
                            <div class="invalid-feedback">
                              Enter valid Proof file
                            </div>
                          </div>
                        </div>
                      </td>

                      <td>
                          <div class="form-group row">
                              <div class="col-sm-3">
                              <label class="btn btn-success add_proof_details">+</label>
                              </div>
                              <div class="col-sm-3">
                                <label class="btn btn-danger remove_proof_details">-</label>
                                </div>
                            </div>
                      </td>

              </tr>
              <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
                  </tbody>

                </table>

              </div>


                       </div>

        <div class="col-md-7 text-right">
          <button class="btn btn-success submit" name="add" type="button">Submit</button>
        </div>
      </form>
    </div>
    <!-- <script src="<?php echo e(asset('assets/js/master/capitalize.js')); ?>"></script> -->
    <!-- card body end@ -->
  </div>
</div>
<div style="clear:both;"></div>

<script type="text/javascript">

  $(document).on("keyup",".name",function() {
  var string = $( this).val();
  var Capitalized = string.replace(/\w\S*/g, function(txt){return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();});
  $(this).val(Capitalized);

});

  $(document).on("keyup",".proof_name",function() {
  var string = $( this).val();
  var Capitalized = string.replace(/\w\S*/g, function(txt){return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();});
  $(this).val(Capitalized);

  });

  $(document).on("keyup",".father_name",function() {
  var string = $( this).val();
  var Capitalized = string.replace(/\w\S*/g, function(txt){return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();});
  $(this).val(Capitalized);

  });

  $(document).on('input','.blood_group ',function(){

    $(this).val($(this).val().replace(/[^a-zA-Z+]/gi, ''));
    if ($(this).val().replace(/[^+]/g, "").length > 1)
    {
    $(this).val(''); 
    }
    else
    {

    }

  });

  $(document).on('input','.proof_name ',function(){

    $(this).val($(this).val().replace(/[^a-zA-Z ]/gi, ''));

  });

$(document).on("click",".refresh_state_id",function(){
   var state_dets=refresh_state_master_details();
   $(this).closest(".address_div").find(".state_id").html(state_dets);
   $(this).closest(".address_div").find(".district_id").html("<option value=''>Choose District</option>");
   $(this).closest(".address_div").find(".city_id").html("<option value=''>Choose City</option>");
});

$(document).on("click",".refresh_district_id",function(){
  var state_id= $(this).closest(".address_div").find(".state_id").val();
  if(state_id !="")
  {
    var district_dets=refresh_district_master_details(state_id);
    $(this).closest(".address_div").find(".district_id").html(district_dets);
    $(this).closest(".address_div").find(".city_id").html("<option value=''>Choose City</option>");
  }
 });

 $(document).on("click",".refresh_city_id",function(){
  var state_id= $(this).closest(".address_div").find(".state_id").val();
  var district_id= $(this).closest(".address_div").find(".district_id").val();
  if(state_id !="" && district_id !="")
  {
    var city_dets=refresh_city_master_details(state_id,district_id);
    $(this).closest(".address_div").find(".city_id").html(city_dets);
  }
 });

$(document).on("click",".refresh_department_id",function(){
   var department_dets=refresh_department_master_details();
  $(".department_id").html(department_dets);
});

$(document).on("click",".refresh_address_type_id",function(){
   var address_type_dets=refresh_address_type_master_details();
   $(this).closest(".address_div").find(".address_type_id").html(address_type_dets);
  
});

function proof_details_validation()
{
  
  var error_count=0;
  $(".required_for_proof_valid").each(function(){
   $(this).removeClass("is-invalid");
      if($(this).val() !="")
      {
        $(this).removeClass("is-invalid");
        $(this).addClass("is-valid");
      }else
      {
        error_count++;
        $(this).removeClass("is-valid");
        $(this).addClass("is-invalid");
      }
  });
  return error_count;
}

$(document).ready(function(){
    set_sno_for_proof_details();
  });

  function set_sno_for_proof_details(){
    $(".s_no").each(function(key,index){
      $(this).html((key+1));
    });
  }

  /* Add Proof Details Start Here */
  $(document).on("click",".add_proof_details",function(){
    var validation_count=proof_details_validation();
    if(validation_count == 0)
    {
        var proof_details='<tr>\
                      <td><span class="s_no"> 1 </span></td>\
                      <td>\
                        <div class="form-group row">\
                          <div class="col-sm-12">\
                          <input type="text" class="form-control proof_name  required_for_proof_valid" error-data="Enter valid Postal Code" placeholder="Proof Name" name="proof_name[]" value="" >\
                           <div class="invalid-feedback">\
                              Enter valid Proof Name\
                            </div>\
                          </div>\
                        </div>\
                      </td>\
                       <td>\
                            <div class="form-group row">\
                              <div class="col-sm-12">\
                              <input type="text" class="form-control proof_number only_allow_digit required_for_proof_valid" error-data="Enter valid Postal Code" placeholder="Proof Number" name="proof_number[]" value="" >\
                               <div class="invalid-feedback">\
                                  Enter valid Proof Number\
                                </div>\
                              </div>\
                            </div>\
                          </td>\
                            <td>\
                              <div class="form-group row">\
                                <div class="col-sm-12">\
                                <input type="file" class="form-control proof_file   required_for_proof_valid" error-data="Enter valid Postal Code" placeholder="Proof Name" name="proof_file[]" value="" >\
                                  <div class="invalid-feedback">\
                                    Enter valid Proof file\
                                  </div>\
                                </div>\
                              </div>\
                            </td>\
                            <td>\
                                <div class="form-group row">\
                                    <div class="col-sm-3">\
                                    <label class="btn btn-success add_proof_details">+</label>\
                                    </div>\
                                    <div class="col-sm-3">\
                                      <label class="btn btn-danger remove_proof_details">-</label>\
                                      </div>\
                                  </div>\
                            </td>\
                          </tr>';

    $(".append_proof_details").append(proof_details);
    set_sno_for_proof_details();
                        }

  });
  /* Add Proof Details End Here */
  /* Remove Proof Details Start Here */
  $(document).on("click",".remove_proof_details",function(){
    if($(".remove_proof_details").length > 1){
      $(this).closest("tr").remove();
    set_sno_for_proof_details();
    }else{
      alert("Atleast One Row Present");
    }
    
  });
  /* Remove Proof Details End Here */

$(document).on("click",".remove_address",function(){
if($(".remove_address").length >1){
  $(this).closest(".address_div").remove();
  $(".address_label").each(function(key,index){
  $(this).html("Address Details - " + (key+1));
  });

}else{
  alert("Atleast One Row Present ");
}
  
});

  $(document).on("blur change",".required_for_valid,.required_for_proof_valid",function(){
         $(this).removeClass("is-invalid");
          $(this).removeClass("is-valid");
             if($(this).val() !=""){
              $(this).removeClass("is-invalid");
              $(this).addClass("is-valid");
              if($(this).attr('input-type') == "phone_no"){
                 var phone_no=$(this).val();
                  if(phone_no_validation(phone_no) == 0){
                   $(this).removeClass("is-valid");
                   $(this).addClass("is-invalid");
                  }
                   }
  
                   if($(this).attr('input-type') == "email"){
                 var email=$(this).val();
                 
                 if(!email_validation(email)){
                 
                  $(this).removeClass("is-valid");
                   $(this).addClass("is-invalid");
                 }
                 
                   }
  }else{
               $(this).removeClass("is-valid");
              $(this).addClass("is-invalid");
          }
   });
  
  function email_validation(email){
    var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
     return emailPattern.test(email); 
  }
  function phone_no_validation(phone_no){
    if(phone_no.length != 10){
                  return 0
                  }else{
                    return 1;
                  }
  }
  
  function validation(){
    
         var error_count=0;
         $(".required_for_valid").each(function(){
          $(this).removeClass("is-invalid");
             if($(this).val() !=""){
              $(this).removeClass("is-invalid");
              $(this).addClass("is-valid");
              if($(this).attr('input-type') == "phone_no"){
                 var phone_no=$(this).val();
                  if(phone_no_validation(phone_no) == 0){
                    error_count++;
                  $(this).removeClass("is-valid");
                   $(this).addClass("is-invalid");
                  }
                   }
  
                   if($(this).attr('input-type') == "email"){
                 var email=$(this).val();
                 if(!email_validation(email)){
                  error_count++;
                  $(this).removeClass("is-valid");
                   $(this).addClass("is-invalid");
                 }
                 
                   }
  
  
          }else{
             error_count++;
             $(this).removeClass("is-valid");
              $(this).addClass("is-invalid");
          }
         });
         return error_count;
     }
  
  
     $(document).on("click",".submit",function(){
      var error_count=validation();
      var address_error_count=address_details_validation();
      var common_error_count=parseInt(error_count)+parseInt(address_error_count);
      if(common_error_count == 0){
        if($(".required_for_address_valid").length >0){
        
      }else{
        common_error_count++;
        alert("Please Add Atleast One Address ");
       
      }
      if(common_error_count == 0){
  
        $("form").submit();
      }
  
      }
  
     });
  
  
    $(document).on("click",".add_address",function(){
      add_address();
      });
     
  
    function address_details_validation(){
      var error_count=0;
        $(".required_for_address_valid").each(function(){
          $(this).removeClass("is-invalid");
             if($(this).val() !=""){
               
              $(this).removeClass("is-invalid");
              $(this).addClass("is-valid");
          }else{
             error_count++;
             $(this).removeClass("is-valid");
              $(this).addClass("is-invalid");
          }
         });
         return error_count;
    }
  
    function add_address(id="",text=""){
      var address_details_validation_count=address_details_validation();
      if(address_details_validation_count == 0){
  
      
    var address='';
      address+='<div class="form-row address_div">\
       <div class="col-md-7">\
                    <div class="form-group row">\
                    <div class="col-md-7">\
                    <h3 class="address_label"></h3>\
                    </div>\
                    <div class="col-md-4">\
                    <h3 class="address_delete_label"><label class="btn btn-danger remove_address"> Delete </label></h3>\
                        </div>\
                    </div>\
                    </div>\
                <div class="col-md-6">\
              <div class="form-group row">\
                <label for="validationCustom01" class="col-sm-4 col-form-label">Address Type <span class="mandatory">*</span></label>\
                <div class="col-sm-6">\
                  <select class="js-example-basic-multiple col-12 form-control custom-select address_type_id required_for_valid required_for_address_valid" error-data="Enter valid Address Type" name="address_type_id[]">\
                    <option value="">Choose Address Type</option>\
                    <?php $__currentLoopData = $address_type; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>\
                    <option value="<?php echo e($value->id); ?>" ><?php echo e($value->name); ?></option>\
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>\
                  </select>\
                 <div class="invalid-feedback">\
                    Enter valid Address Type\
                  </div>\
                </div>\
                <a href="<?php echo e(url("master/address-type/create")); ?>" target="_blank">\
                <button type="button"  class="px-2 btn btn-success ml-2 " title="Add Address Type"><i class="fa fa-plus-circle" aria-hidden="true"></i></button></a>\
               <button type="button"  class="px-2 btn btn-success mx-2 refresh_address_type_id" title="Refresh"><i class="fa fa-refresh" aria-hidden="true"></i></button>\
            </div>\
            </div>\
      <div class="col-md-6">\
              <div class="form-group row">\
                <label for="validationCustom01" class="col-sm-4 col-form-label">Address Line 1 <span class="mandatory">*</span></label>\
                <div class="col-sm-8">\
                  <input type="text" class="form-control address_line_1 required_for_valid required_for_address_valid" error-data="Enter valid Address" placeholder="Address Line 1" name="address_line_1[]" value="" >\
                 <div class="invalid-feedback">\
                  Enter valid Address\
                  </div>\
                </div>\
              </div>\
            </div>\
  <div class="col-md-6">\
              <div class="form-group row">\
                <label for="validationCustom01" class="col-sm-4 col-form-label">Address Line 2 </label>\
                <div class="col-sm-8">\
                  <input type="text" class="form-control address_line_2" placeholder="Address Line 2" name="address_line_2[]" value="">\
                  <div class="invalid-feedback">\
                  Enter valid Address\
                  </div>\
                </div>\
              </div>\
            </div>\
    <div class="col-md-6">\
              <div class="form-group row">\
                <label for="land_mark" class="col-sm-4 col-form-label">Land Mark </label>\
                <div class="col-sm-8">\
                  <input type="text" class="form-control land_mark" placeholder="Land Mark" name="land_mark[]" value="">\
                 <div class="invalid-feedback">\
                  Enter valid Land Mark\
                  </div>\
                </div>\
              </div>\
            </div>\
  <div class="col-md-6">\
              <div class="form-group row">\
                <label for="validationCustom01" class="col-sm-4 col-form-label">State <span class="mandatory">*</span></label>\
                <div class="col-sm-6">\
                  <select class="js-example-basic-multiple col-12 form-control custom-select state_id required_for_valid required_for_address_valid" error-data="Enter valid State" name="state_id[]" >\
                    <option value="">Choose State</option>\
                    <?php $__currentLoopData = $state; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>\
                    <option value="<?php echo e($value->id); ?>" ><?php echo e($value->name); ?></option>\
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>\
                  </select>\
                <div class="invalid-feedback">\
                    Enter valid State \
                  </div>\
                </div>\
                <a href="<?php echo e(url("master/state/create")); ?>" target="_blank">\
                <button type="button"  class="px-2 btn btn-success ml-2 " title="Add state"><i class="fa fa-plus-circle" aria-hidden="true"></i></button></a>\
               <button type="button"  class="px-2 btn btn-success mx-2 refresh_state_id" title="Refresh"><i class="fa fa-refresh" aria-hidden="true"></i></button>\
              </div>\
            </div>\
  <div class="col-md-6">\
              <div class="form-group row">\
                <label for="validationCustom01" class="col-sm-4 col-form-label">District </label>\
                <div class="col-sm-6">\
                  <select class="js-example-basic-multiple col-12 form-control custom-select district_id" name="district_id[]">\
                    <option value="">Choose District</option>\
                   </select>\
                   <div class="invalid-feedback">\
                    Enter valid District\
                  </div>\
                </div>\
                <a href="<?php echo e(url("master/district/create")); ?>" target="_blank">\
                <button type="button"  class="px-2 btn btn-success ml-2 " title="Add District"><i class="fa fa-plus-circle" aria-hidden="true"></i></button></a>\
               <button type="button"  class="px-2 btn btn-success mx-2 refresh_district_id" title="Refresh"><i class="fa fa-refresh" aria-hidden="true"></i></button>\
             </div>\
            </div>\
             <div class="col-md-6">\
              <div class="form-group row">\
                <label for="validationCustom01" class="col-sm-4 col-form-label">City </label>\
                <div class="col-sm-6">\
                  <select class="js-example-basic-multiple col-12 form-control custom-select city_id" name="city_id[]" >\
                    <option value="">Choose City</option>\
                  </select>\
                 <div class="invalid-feedback">\
                    Enter valid City\
                  </div>\
                </div>\
                <a href="<?php echo e(url("master/city/create")); ?>" target="_blank">\
                <button type="button"  class="px-2 btn btn-success ml-2 " title="Add City"><i class="fa fa-plus-circle" aria-hidden="true"></i></button></a>\
               <button type="button"  class="px-2 btn btn-success mx-2 refresh_city_id" title="Refresh"><i class="fa fa-refresh" aria-hidden="true"></i></button>\
              </div>\
            </div>\
   <div class="col-md-6">\
              <div class="form-group row">\
                <label for="land_mark" class="col-sm-4 col-form-label">Postal Code <span class="mandatory">*</span></label>\
                <div class="col-sm-8">\
                  <input type="text" class="form-control only_allow_digit postal_code required_for_valid required_for_address_valid" error-data="Enter valid Postal Code" placeholder="Postal Code" name="postal_code[]" value="" >\
                <div class="invalid-feedback">\
                    Enter valid Postal Code\
                  </div>\
                </div>\
              </div>\
            </div>\
            </div><hr>';
  
  
            $(".common_address_div").append(address);
      $(".address_label").each(function(key,index){
  $(this).html("Address Details - " + (key+1));
  });
            $("select").select2();
      }
   }
  
  
  function state_based_district(){
    
    
  
  $(".state_id").each(function(key,index){
    
      var $tr=$(this).closest(".address_div");
      $tr.find(".city_id").html("<option value=''>Choose City</option>");
     var state_id=$tr.find(".old_state_id").val();
    var district_id=$tr.find(".old_district_id").val();
   $.ajax({
                type: "post",
                url: "<?php echo e(url('common/get-state-based-district')); ?>",
                data: {state_id: state_id,district_id:district_id},
                success: function (res)
                {
                   result = JSON.parse(res);
                 $tr.find(".district_id").html(result.option);
                 }
            });
  });
  
  }
  
  
  function district_based_city(){
  $(".district_id").each(function(key,index){
      var $tr=$(this).closest(".address_div");
      var district_id=$tr.find(".old_district_id").val();
    var city_id=$tr.find(".old_city_id").val();
    $.ajax({
                type: "post",
                url: "<?php echo e(url('common/get-district-based-city')); ?>",
                data: {district_id: district_id,city_id:city_id},
                success: function (res)
                {
                  result = JSON.parse(res);
                  $tr.find(".city_id").html(result.option);
                }
            });
  });
  
  }
  
  
  $(document).ready(function(){
    state_based_district();
    district_based_city();
  });
  
  
  
  
    $(document).on("change",".state_id",function(){
     var $tr=$(this).closest(".address_div");
     var state_id=$(this).val();
     $tr.find(".city_id").html("<option value=''>Choose City</option>");
      $.ajax({
                type: "post",
                url: "<?php echo e(url('common/get-state-based-district')); ?>",
                data: {state_id: state_id},
                success: function (res)
                {
                  result = JSON.parse(res);
                //  alert($tr.find(".state_id").attr("class"));
                  $tr.find(".district_id").html(result.option);
                  
                }
            });
  });
  
  
  
    $(document).on("change",".district_id",function(){
       var $tr=$(this).closest(".address_div");
      var district_id=$(this).val();
      $.ajax({
                type: "post",
                url: "<?php echo e(url('common/get-district-based-city')); ?>",
                data: {district_id: district_id},
                success: function (res)
                {
                  result = JSON.parse(res);
                  $tr.find(".city_id").html(result.option);
                }
            });
  
  
      
    });
  
    $('.phone_no').change(function(){
      var no = $(this).val();
      
      if(no.length != 10){
         return false
      }
    });
  
  </script>

<?php $__env->stopSection(); ?>



<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ns_pollachi\resources\views/admin/master/employee/add.blade.php ENDPATH**/ ?>