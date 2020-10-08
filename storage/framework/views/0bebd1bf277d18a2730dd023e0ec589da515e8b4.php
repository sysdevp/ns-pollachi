<?php $__env->startSection('content'); ?>
<div class="col-12 body-sec">
  <div class="card container px-0">
    <!-- card header start@ -->
    <div class="card-header px-2">
      <div class="row">
        <div class="col-4">
          <h3>Edit Supplier </h3>
        </div>
        <div class="col-8 mr-auto">
          <ul class="h-right-btn mb-0 pl-0">
            <li><button type="button" class="btn btn-success"><a href="<?php echo e(url('master/supplier')); ?>">Back</a></button></li>
          </ul>
        </div>
      </div>
    </div>
    <!-- card header end@ -->
    <div class="card-body">
    
      <form  method="post" class="form-horizontal needs-validation" novalidate action="<?php echo e(url('master/supplier/update/'.$supplier->id)); ?>" enctype="multipart/form-data">
      <?php echo e(csrf_field()); ?>



      <div class="form-row">
         

          <div class="col-md-8">
          <h4>Professional details:</h4>
          </div>
          <div class="col-md-6">
              <div class="form-group row">
                <label for="validationCustom01" class="col-sm-4 col-form-label">Company Name<span class="mandatory">*</span></label>
                <div class="col-sm-8">
                  <input type="text" class="form-control only_allow_alp_num_dot_com_amp company_name required_for_valid" error-data="Enter valid Company Name" placeholder="Company Name" name="company_name" value="<?php echo e(old('company_name',$supplier->company_name)); ?>" >
                  <span class="mandatory"> <?php echo e($errors->first('company_name')); ?> </span>
                  <div class="invalid-feedback">
                    Enter valid Company Name
                  </div>
                </div>
              </div>
            </div>
        <!--  <div class="col-md-6">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Supplier Name </label>
              <div class="col-sm-8">
            <div class="input-group">
            <div class="input-group-prepend">
              <select class="form-control salutation" name="salutation" error-data="Enter valid Salutation" >
                  <option value="Mr" <?php echo e(old('salutation',$supplier->salutation) == 'Mr' ? 'selected' : ''); ?>>Mr</option>
                  <option value="Mrs" <?php echo e(old('salutation',$supplier->salutation) == 'Mrs' ? 'selected' : ''); ?> >Mrs</option>
              </select>
              <span class="mandatory"> <?php echo e($errors->first('salutation')); ?> </span>
            </div>
            <input type="text" class="form-control only_allow_alp_num_dot_com_amp name" name="name" error-data="Supplier Name Field is required" aria-label="Text input with dropdown button" value=<?php echo e(old('name',$supplier->name)); ?>>
            
            <div class="invalid-feedback">
              Enter valid Supplier Name
            </div>
            
          </div>
          <span class="mandatory"> <?php echo e($errors->first('name')); ?> </span>
          <span class="mandatory"> <?php echo e($errors->first('salutation')); ?> </span>
          </div>
          </div>

          </div> -->

          <div class="col-md-6">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Supplier Type <span class="mandatory">*</span></label>
              <div class="col-sm-8">
                <div class="form-check d-inline">
                  <label class="form-check-label">
                    <input type="radio" class="form-check-input supplier_type" value="1" <?php echo e(old('supplier_type',$supplier->supplier_type) == 1 ? 'checked' : ''); ?> name="supplier_type">Exist
                  </label>
                </div>

                <div class="form-check d-inline mx-4 ">
                  <label class="form-check-label">
                    <input type="radio" class="form-check-input supplier_type" value="0" <?php echo e(old('supplier_type',$supplier->supplier_type) == 0 ? 'checked' : ''); ?> name="supplier_type">New
                  </label>
                </div>

                <span class="mandatory"> <?php echo e($errors->first('supplier_type')); ?> </span>
                <div class="invalid-feedback">
                  Enter valid Supplier Type
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6 new_supplier_div">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Supplier Name </label>
              <div class="col-sm-8">
                <div class="input-group">
                  <div class="input-group-prepend">
                    <select class="form-control  salutation" name="salutation" error-data="Enter valid Salutation">
                      <option value="Mr" <?php echo e(old('salutation',$supplier->salutation) == 'Mr' ? 'selected' : ''); ?>>Mr</option>
                      <option value="Mrs" <?php echo e(old('salutation',$supplier->salutation) == 'Mrs' ? 'selected' : ''); ?>>Mrs</option>
                    </select>
                    <span class="mandatory"> <?php echo e($errors->first('salutation')); ?> </span>
                  </div>
                  <input type="text" class="form-control only_allow_alp_num_dot_com_amp name" name="name" error-data="Customer Name Field is required" aria-label="Text input with dropdown button" value=<?php echo e(old('name',$supplier->name)); ?>>

                  <div class="invalid-feedback">
                    Enter valid Supplier Name
                  </div>

                </div>
                <span class="mandatory"> <?php echo e($errors->first('name')); ?> </span>
                <span class="mandatory"> <?php echo e($errors->first('salutation')); ?> </span>
              </div>
            </div>

          </div>


          <div class="col-md-6 exist_supplier_div" style="display:none">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Supplier Name<span class="mandatory">*</span></label>
              <div class="col-sm-6">
                <select class="js-example-basic-multiple col-12 form-control exist_supplier_name select custom-select" error-data="Enter valid Supplier" data-placeholder="Choose Supplier" name="exist_supplier_name">
                  <option value="">Choose Supplier</option>
<?php $__currentLoopData = $exist_supplier_dets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($value->id); ?>" <?php echo e(old('exist_supplier_name',$supplier->supplier_id) == $value->id ? 'selected' : ''); ?> ><?php echo e($value->name); ?></option>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
     </select>

                <span class="mandatory"> <?php echo e($errors->first('exist_supplier_name')); ?> </span>
                <div class="invalid-feedback">
                  Enter valid supplier Name
                </div>
              </div>
              <a href="<?php echo e(url('master/supplier/create')); ?>" target="_blank">
                <button type="button" class="px-2 btn btn-success ml-2 " title="Add Supplier"><i class="fa fa-plus-circle" aria-hidden="true"></i></button></a>
              <button type="button" class="px-2 btn btn-success mx-2 refresh_supplier_id" title="Refresh"><i class="fa fa-refresh" aria-hidden="true"></i></button>
            </div>
          </div>


          <div class="col-md-6">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Phone No <span class="mandatory">*</span></label>
              <div class="col-sm-8">
                <input type="text" class="form-control  phone_no only_allow_digit required_for_valid" input-type="phone_no" pattern="[1-9]{1}[0-9]{9}" error-data="Enter valid Phone No" placeholder="Phone No" name="phone_no" value="<?php echo e(old('phone_no',$supplier->phone_no)); ?>" >
                <span class="mandatory"> <?php echo e($errors->first('phone_no')); ?> </span>
                <div class="invalid-feedback">
                  Enter valid Phone No
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Whatsapp No </label>
              <div class="col-sm-8">
                <input type="text" class="form-control whatsapp_no only_allow_digit" input-type="phone_no" pattern="[1-9]{1}[0-9]{9}" error-data="Enter valid Whatsapp No" placeholder="Whatsapp No" name="whatsapp_no" value="<?php echo e(old('whatsapp_no',$supplier->whatsapp_no)); ?>" >
                <span class="mandatory"> <?php echo e($errors->first('whatsapp_no')); ?> </span>
                <div class="invalid-feedback">
                  Enter valid Whatsapp No
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Email</label>
              <div class="col-sm-8">
                <input type="email" class="form-control email" input-type="email" error_data="Enter valid Email" placeholder="Email" name="email" value="<?php echo e(old('email',$supplier->email)); ?>" >
                <!-- <span class="mandatory"> <?php echo e($errors->first('email')); ?> </span> -->
                <div class="invalid-feedback">
                  Enter valid Email
                </div>
              </div>
            </div>
          </div>

          

          <div class="col-md-6">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Gst No <span class="mandatory">*</span></label>
              <div class="col-sm-8">
                <input type="text" class="form-control gst_no required_for_valid" input-type="gst_no" error_data="Enter valid Gst No" placeholder="Gst No" name="gst_no" value="<?php echo e(old('gst_no',$supplier->gst_no)); ?>" >
                <span class="mandatory"> <?php echo e($errors->first('gst_no')); ?> </span>
                <div class="invalid-feedback">
                  Enter valid Gst No
                </div>
              </div>
            </div>
          </div>

          

         

          <div class="col-md-6">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Opening Balance</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" input-type="opening_balance" error_data="Enter valid Opening Balance" placeholder="Opening Balance" name="opening_balance" value="<?php echo e(old('opening_balance',$supplier->opening_balance)); ?>" >
                <!-- <span class="mandatory"> <?php echo e($errors->first('opening_balance')); ?> </span> -->
                <div class="invalid-feedback">
                  Enter valid Opening Balance
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Remark</label>
              <div class="col-sm-8">
                <input type="text" class="form-control remark" input-type="remark" error_data="Enter valid Remark" placeholder="Remark" name="remark" value="<?php echo e(old('remark',$supplier->remark)); ?>" >
                <span class="mandatory"> <?php echo e($errors->first('remark')); ?> </span>
                <div class="invalid-feedback">
                  Enter valid Remark
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
             <!-- Exist Address Details Grid Start Here -->
            <?php $__currentLoopData = $supplier_address_details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$values): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="form-row address_div">
                <div class="col-md-7">
                    <div class="form-group row">
                    <div class="col-md-7">
                    <h3 class="address_label"></h3>
                    </div>
                    <div class="col-md-4">
                    <h3 class="address_delete_label"><label class="btn btn-danger remove_address" attr-id="<?php echo e($values->id); ?>"> Delete </label></h3>
                        </div>
                    </div>
                    </div>
                          <div class="col-md-6">
                        <div class="form-group row">
                        <label for="validationCustom01" class="col-sm-4 col-form-label">Address Type <span class="mandatory">*</span></label>
                          <div class="col-sm-6">
                          <select class="js-example-basic-multiple col-12 form-control custom-select old_address_type_id required_for_valid required_for_address_valid" error-data="Enter valid Address Type" name="old_address_type_id[]">
                              <option value="">Choose Address Type</option>
                              <?php $__currentLoopData = $address_type; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <option value="<?php echo e($value->id); ?>" <?php echo e(old('old_address_type_id.'.$key,$values->address_type_id) == $value->id ? 'selected' : ''); ?> ><?php echo e($value->name); ?></option>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <span class="mandatory"> <?php echo e($errors->first('old_address_type_id.'.$key)); ?> </span>
                           <div class="invalid-feedback">
                              Enter valid Address Type
                            </div>
                          </div>
                          <a href="<?php echo e(url('master/address_type/create')); ?>" target="_blank">
                            <button type="button"  class="px-2 btn btn-success ml-2 " title="Add Address Type"><i class="fa fa-plus-circle" aria-hidden="true"></i></button></a>
                           <button type="button"  class="px-2 btn btn-success mx-2 refresh_address_type_id" title="Refresh"><i class="fa fa-refresh" aria-hidden="true"></i></button>
                        </div>
                      </div>
                <div class="col-md-6">
                        <div class="form-group row">
                          <label for="validationCustom01" class="col-sm-4 col-form-label">Address Line 1 <span class="mandatory">*</span></label>
                          <div class="col-sm-8">
                          <input type="text" class="form-control old_address_line_1 required_for_valid required_for_address_valid" error-data="Enter valid Address" placeholder="Address Line 1" name="old_address_line_1[]" value="<?php echo e(old('old_address_line_1.'.$key,$values->address_line_1)); ?>" >
                            <span class="mandatory"> <?php echo e($errors->first('old_address_line_1.'.$key)); ?> </span>
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
                            <input type="text" class="form-control old_address_line_2" placeholder="Address Line 2" name="old_address_line_2[]" value="<?php echo e(old('old_address_line_2.'.$key,$values->address_line_2)); ?>">
                            <span class="mandatory"> <?php echo e($errors->first('old_address_line_2.'.$key)); ?> </span>
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
                            <input type="text" class="form-control old_land_mark" placeholder="Land Mark" name="old_land_mark[]" value="<?php echo e(old('old_land_mark.'.$key,$values->land_mark)); ?>">
                            <span class="mandatory"> <?php echo e($errors->first('old_land_mark.'.$key)); ?> </span>
                            <div class="invalid-feedback">
                            Enter valid Land Mark
                            </div>
                          </div>
                        </div>
                      </div>
                       <!-- Old Values For Dropdown Start Here  -->
              <input type="hidden" class="form-control address_details_id" name="address_details_id[]" value="<?php echo e(old('address_details_id.'.$key,$values->id)); ?>">
              <input type="hidden" class="form-control exist_old_state_id" value="<?php echo e(old('old_state_id.'.$key,$values->state_id)); ?>">
              <input type="hidden" class="form-control exist_old_district_id" value="<?php echo e(old('old_district_id.'.$key,$values->district_id)); ?>">
              <input type="hidden" class="form-control exist_old_city_id" value="<?php echo e(old('old_city_id.'.$key,$values->city_id)); ?>">
                <!-- Old Values For Dropdown End Here  -->
            <div class="col-md-6">
                        <div class="form-group row">
                          <label for="validationCustom01" class="col-sm-4 col-form-label">State <span class="mandatory">*</span></label>
                          <div class="col-sm-6">
                            <select class="js-example-basic-multiple col-12 form-control custom-select state_id old_state_id required_for_valid required_for_address_valid" error-data="Enter valid State" name="old_state_id[]" >
                              <option value="">Choose State</option>
                              <?php $__currentLoopData = $state; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <option value="<?php echo e($value->id); ?>" <?php echo e(old('old_state_id.'.$key,$values->state_id) == $value->id ? 'selected' : ''); ?>  ><?php echo e($value->name); ?></option>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <span class="mandatory"> <?php echo e($errors->first('old_state_id.'.$key)); ?> </span>
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
                            <select class="js-example-basic-multiple col-12 form-control custom-select district_id old_district_id" name="old_district_id[]">
                              <option value="">Choose District</option>
                              </select>
                             <span class="mandatory"> <?php echo e($errors->first('old_district_id.'.$key)); ?> </span>
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
                            <select class="js-example-basic-multiple col-12 form-control custom-select city_id old_city_id" name="old_city_id[]" >
                              <option value="">Choose City</option>
                            </select>
                            <span class="mandatory"> <?php echo e($errors->first('old_city_id.'.$key)); ?> </span>
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
                          <input type="text" class="form-control old_postal_code  only_allow_digit required_for_valid required_for_address_valid" error-data="Enter valid Postal Code" placeholder="Postal Code" name="old_postal_code[]" value="<?php echo e(old('old_postal_code.'.$key,$values->postal_code)); ?>" >
                            <span class="mandatory"> <?php echo e($errors->first('old_postal_code.'.$key)); ?> </span>
                            <div class="invalid-feedback">
                              Enter valid Postal Code
                            </div>
                          </div>
                        </div>
                      </div>
                      </div><hr>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <!-- Exist Address Details Grid End Here -->

            <!-- Set Old Values for Address Details Grid Newly Added Row Start Here -->
            <?php if(old('address_line_1')): ?>
            <?php $__currentLoopData = old('address_line_1'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="form-row address_div">
                <div class="col-md-8">
                <h3 class="address_label"></h3>
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
                          <a href="<?php echo e(url('master/address_type/create')); ?>" target="_blank">
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
          <input type="hidden" class="form-control new_state_id" value="<?php echo e(old('state_id.'.$key)); ?>">
          <input type="hidden" class="form-control new_district_id" value="<?php echo e(old('district_id.'.$key)); ?>">
          <input type="hidden" class="form-control new_city_id" value="<?php echo e(old('city_id.'.$key)); ?>">
            <!-- Old Values For Dropdown End Here  -->
            <div class="col-md-6">
                        <div class="form-group row">
                          <label for="validationCustom01" class="col-sm-4 col-form-label">State <span class="mandatory">*</span></label>
                          <div class="col-sm-6">
                            <select class="js-example-basic-multiple col-12 form-control custom-select state_id new_state_id required_for_valid required_for_address_valid" error-data="Enter valid State" name="state_id[]" >
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
                            <select class="js-example-basic-multiple col-12 form-control custom-select district_id new_district_id" name="district_id[]">
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
                            <select class="js-example-basic-multiple col-12 form-control custom-select city_id new_city_id" name="city_id[]" >
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

            <!-- Set Old Values for Address Details Grid Newly Added Row End Here -->

           </div>

           <div class="form-row">
              <div class="col-md-8">
                       <div class="form-group row">
                       <div class="col-md-4">
                       <label for="validationCustom01" class=" col-form-label"><h4>Bank Details :</h4> </label>
                           
                       </div>
                         </div>
              </div>
              <div class="col-md-12">
                <table class="table bank_dtails">
                  <thead>
                      <th>S.no</th>
                      <th class="tbl_wd"> Bank   Name</th>
                      <th class="tbl_wd"> Branch Name</th>
                      <th> Ifsc Code </th>
                      <th class="tbl_wd">Account Type </th>
                      <th>Account Holder Name </th>
                      <th>Account No </th>
                      <th>Action</th>
                 </thead>
                 <tbody class="append_bank_details">

                  <?php $__currentLoopData = $supplier_bank_details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bank_key=>$bank_value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                      <td><span class="bank_s_no"> <?php echo e($bank_key+1); ?> </span>
                      <input type="hidden" name="bank_details_id[]" value="<?php echo e($bank_value->id); ?>">
                      <input type="hidden" class="exist_old_bank_id" value="<?php echo e(old('old_bank_id.'.$bank_key,$bank_value->bank_id)); ?>">
                      <input type="hidden" class="exist_old_branch_id" value="<?php echo e(old('old_branch_id.'.$bank_key,$bank_value->branch_id)); ?>">
                    </td>

                      <td>
                        <div class="form-group row">
                            <div class="col-sm-8">
                              <select class="js-example-basic-multiple col-12 form-control custom-select bank_id old_bank_id required_for_valid" error-data="Enter valid Bank" name="old_bank_id[]" >
                                <option value="">Choose Bank</option>
                                <?php $__currentLoopData = $bank; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($value->id); ?>" <?php echo e(old('old_bank_id.'.$bank_key,$bank_value->bank_id) == $value->id ? 'selected' : ''); ?>  ><?php echo e($value->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                              </select>
                              <span class="mandatory"> <?php echo e($errors->first('old_bank_id.'.$bank_key)); ?> </span>
                            <div class="invalid-feedback">
                                Enter valid Bank Name 
                              </div>
                            </div>
                            <a href="<?php echo e(url('master/bank/create')); ?>" target="_blank">
                              <button type="button"  class="px-1 btn btn-success ml-3 " title="Add Bank"><i class="fa fa-plus-circle" aria-hidden="true"></i></button></a>
                             <button type="button"  class="px-1 btn btn-success mx-1 refresh_bank_id" title="Refresh"><i class="fa fa-refresh" aria-hidden="true"></i></button>
                          </div>
                       </td>

                       <td>
                        <div class="form-group row">
                            <div class="col-sm-8">
                              <select class="js-example-basic-multiple col-12 form-control custom-select branch_id old_branch_id required_for_valid" error-data="Enter valid Branch Name" name="old_branch_id[]" >
                                <option value="">Choose Branch Name</option>
                                </select>
                              <span class="mandatory"> <?php echo e($errors->first('old_branch_id.'.$bank_key)); ?> </span>
                            <div class="invalid-feedback">
                                Enter valid Branch Name 
                              </div>
                            </div>
                            <a href="<?php echo e(url('master/bank-branch/create')); ?>" target="_blank">
                              <button type="button"  class="px-1 btn btn-success ml-3 " title="Add Bank branch"><i class="fa fa-plus-circle" aria-hidden="true"></i></button></a>
                             <button type="button"  class="px-1 btn btn-success mx-1 refresh_branch_id" title="Refresh"><i class="fa fa-refresh" aria-hidden="true"></i></button>
                          </div>
                       </td>

                       
                      <td>
                        <div class="form-group row">
                          <div class="col-sm-12">
                          <input type="text" class="form-control ifsc old_ifsc" error-data="Enter valid Ifsc Code" readonly placeholder="IFSC Code" name="old_ifsc[]" value="<?php echo e(old('old_ifsc.'.$bank_key,$bank_value->ifsc)); ?>" >
                            <span class="mandatory"> <?php echo e($errors->first('old_ifsc.'.$bank_key)); ?> </span>
                            <div class="invalid-feedback">
                              Enter valid IFSC Code
                            </div>
                          </div>
                        </div>
                      </td>

                      <td>
                        <div class="form-group row">
                            <div class="col-sm-8">
                              <select class="js-example-basic-multiple col-12 form-control custom-select account_type_id old_account_type_id required_for_valid" error-data="Enter valid Account Type" name="old_account_type_id[]" >
                                <option value="">Choose Account Type</option>
                                <?php $__currentLoopData = $account_type; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($value->id); ?>" <?php echo e(old('old_account_type_id.'.$bank_key,$bank_value->account_type_id) == $value->id ? 'selected' : ''); ?>  ><?php echo e($value->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                              </select>
                              <span class="mandatory"> <?php echo e($errors->first('old_account_type_id.'.$bank_key)); ?> </span>
                            <div class="invalid-feedback">
                                Enter valid Account Type 
                              </div>
                            </div>
                            <a href="<?php echo e(url('master/accounts-type/create')); ?>" target="_blank">
                              <button type="button"  class="px-1 btn btn-success ml-3 " title="Add Accounts Type"><i class="fa fa-plus-circle" aria-hidden="true"></i></button></a>
                             <button type="button"  class="px-1 btn btn-success mx-1 refresh_accounts_type_id" title="Refresh"><i class="fa fa-refresh" aria-hidden="true"></i></button>
                          </div>
                       </td>

                      <td>
                        <div class="form-group row">
                          <div class="mm">
                          <input type="text" class="form-control account_holder_name old_account_holder_name " error-data="Enter valid Account Holder Name" placeholder="Account Holder Name" name="old_account_holder_name[]" value="<?php echo e(old('old_account_holder_name.'.$bank_key,$bank_value->account_holder_name)); ?>" >
                            <span class="mandatory"> <?php echo e($errors->first('old_account_holder_name.'.$bank_key)); ?> </span>
                            <div class="invalid-feedback">
                              Enter valid Account Holder Name
                            </div>
                          </div>
                        </div>
                      </td>

                      <td>
                        <div class="form-group row">
                          <div class="mm">
                          <input type="text" class="form-control account_no old_account_no " error-data="Enter valid Account No"  placeholder="Account No" name="old_account_no[]" value="<?php echo e(old('old_account_no.'.$bank_key,$bank_value->account_no)); ?>" >
                            <span class="mandatory"> <?php echo e($errors->first('old_account_no.'.$key)); ?> </span>
                            <div class="invalid-feedback">
                              Enter valid Account No
                            </div>
                          </div>
                        </div>
                      </td>
                    <td>
                                <div class="form-group row">
                                    <div class="col-sm-3 mr-1">
                                    <label class="btn btn-success add_bank_details">+</label>
                                    </div>
                                    <div class="col-sm-3 mx-2">
                                    <label class="btn btn-danger perment_delete_bank" attr-id="<?php echo e($bank_value->id); ?>">-</label>
                                      </div>
                                  </div>
                            </td>

                    </tr>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    <?php if(old('bank_id')): ?>
                    <?php $__currentLoopData = old('bank_id'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><span class="bank_s_no"> 1 </span>
                        
                          <input type="hidden" class="old_bank_id" value="<?php echo e(old('bank_id.'.$key)); ?>">
                          <input type="hidden" class="old_branch_id" value="<?php echo e(old('branch_id.'.$key)); ?>"></td>
  
                        <td>
                          <div class="form-group row">
                              <div class="col-sm-8">
                                <select class="js-example-basic-multiple col-12 form-control custom-select bank_id required_for_valid" error-data="Enter valid Bank" name="bank_id[]" >
                                  <option value="">Choose Bank</option>
                                  <?php $__currentLoopData = $bank; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                  <option value="<?php echo e($value->id); ?>" <?php echo e(old('bank_id.'.$key) == $value->id ? 'selected' : ''); ?>  ><?php echo e($value->name); ?></option>
                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <span class="mandatory"> <?php echo e($errors->first('bank_id.'.$key)); ?> </span>
                              <div class="invalid-feedback">
                                  Enter valid Bank Name 
                                </div>
                              </div>
                              <a href="<?php echo e(url('master/bank/create')); ?>" target="_blank">
                                <button type="button"  class="px-1 btn btn-success ml-3 " title="Add Bank"><i class="fa fa-plus-circle" aria-hidden="true"></i></button></a>
                               <button type="button"  class="px-1 btn btn-success mx-1 refresh_bank_id" title="Refresh"><i class="fa fa-refresh" aria-hidden="true"></i></button>
                            </div>
                         </td>
  
                         <td>
                          <div class="form-group row">
                              <div class="col-sm-8">
                                <select class="js-example-basic-multiple col-12 form-control custom-select branch_id required_for_valid" error-data="Enter valid Branch Name" name="branch_id[]" >
                                  <option value="">Choose Branch Name</option>
                                  </select>
                                <span class="mandatory"> <?php echo e($errors->first('branch_id.'.$key)); ?> </span>
                              <div class="invalid-feedback">
                                  Enter valid Branch Name 
                                </div>
                              </div>
                              <a href="<?php echo e(url('master/bank-branch/create')); ?>" target="_blank">
                                <button type="button"  class="px-1 btn btn-success ml-3 " title="Add Bank Branch"><i class="fa fa-plus-circle" aria-hidden="true"></i></button></a>
                               <button type="button"  class="px-1 btn btn-success mx-1 refresh_branch_id" title="Refresh"><i class="fa fa-refresh" aria-hidden="true"></i></button>
                            </div>
                         </td>
  
                         
                        <td>
                          <div class="form-group row">
                            <div class="col-sm-12">
                            <input type="text" class="form-control ifsc  required_for_proof_valid" error-data="Enter valid Ifsc Code" readonly placeholder="IFSC Code" name="ifsc[]" value="<?php echo e(old('ifsc.'.$key)); ?>" >
                              <span class="mandatory"> <?php echo e($errors->first('ifsc.'.$key)); ?> </span>
                              <div class="invalid-feedback">
                                Enter valid IFSC Code
                              </div>
                            </div>
                          </div>
                        </td>
  
                        <td>
                          <div class="form-group row">
                              <div class="col-sm-8">
                                <select class="js-example-basic-multiple col-12 form-control custom-select account_type_id required_for_valid" error-data="Enter valid Account Type" name="account_type_id[]" >
                                  <option value="">Choose Account Type</option>
                                  <?php $__currentLoopData = $account_type; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                  <option value="<?php echo e($value->id); ?>" <?php echo e(old('account_type_id.'.$key) == $value->id ? 'selected' : ''); ?>  ><?php echo e($value->name); ?></option>
                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <span class="mandatory"> <?php echo e($errors->first('account_type_id.'.$key)); ?> </span>
                              <div class="invalid-feedback">
                                  Enter valid Account Type 
                                </div>
                              </div>
                              <a href="<?php echo e(url('master/accounts-type/create')); ?>" target="_blank">
                                <button type="button"  class="px-1 btn btn-success ml-3 " title="Add Accounts Type"><i class="fa fa-plus-circle" aria-hidden="true"></i></button></a>
                               <button type="button"  class="px-1 btn btn-success mx-1 refresh_accounts_type_id" title="Refresh"><i class="fa fa-refresh" aria-hidden="true"></i></button>
                            </div>
                         </td>
  
                        <td>
                          <div class="form-group row">
                            <div class="mm">
                            <input type="text" class="form-control account_holder_name required_for_proof_valid" error-data="Enter valid Account Holder Name" placeholder="Account Holder Name" name="account_holder_name[]" value="<?php echo e(old('account_holder_name.'.$key)); ?>" >
                              <span class="mandatory"> <?php echo e($errors->first('account_holder_name.'.$key)); ?> </span>
                              <div class="invalid-feedback">
                                Enter valid Account Holder Name
                              </div>
                            </div>
                          </div>
                        </td>
  
                        <td>
                          <div class="form-group row">
                            <div class="mm">
                            <input type="text" class="form-control account_no required_for_proof_valid" error-data="Enter valid Account No"  placeholder="Account No" name="account_no[]" value="<?php echo e(old('account_no.'.$key)); ?>" >
                              <span class="mandatory"> <?php echo e($errors->first('account_no.'.$key)); ?> </span>
                              <div class="invalid-feedback">
                                Enter valid Account No
                              </div>
                            </div>
                          </div>
                        </td>
                      <td>
                                  <div class="form-group row">
                                      <div class="col-sm-3 mr-1">
                                      <label class="btn btn-success add_bank_details">+</label>
                                      </div>
                                      <div class="col-sm-3 mx-2">
                                        <label class="btn btn-danger remove_bank_details">-</label>
                                        </div>
                                    </div>
                              </td>
  
                      </tr>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>




                   
                  </tbody>

                </table>

              </div>


                       </div>


                       <div class="state_id_div" style="display:none">
                          <?php $__currentLoopData = $state; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <option value="<?php echo e($value->id); ?>" ><?php echo e($value->name); ?></option>\
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                        
                        <div class="address_type_id_div" style="display:none">
                            <?php $__currentLoopData = $address_type; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($value->id); ?>" ><?php echo e($value->name); ?></option>\
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          </div>
                        
                          <div class="bank_id_div" style="display:none">
                              <?php $__currentLoopData = $bank; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <option value="<?php echo e($value->id); ?>" ><?php echo e($value->name); ?></option>\
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        
                            <div class="account_type_id_div" style="display:none">
                                <?php $__currentLoopData = $account_type; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($value->id); ?>" ><?php echo e($value->name); ?></option>\
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                              </div>



<div class="col-md-7 text-right">
  <input type="hidden" name="edit" >
          <button class="btn btn-success submit" type="button">Submit</button>
        </div>
      </form>
    </div>
    <!-- card body end@ -->
  </div>
</div>
<script src="<?php echo e(asset('assets/js/master/add_more_branch_details.js')); ?>"></script>

<script>
  function supplier_type(type) {
    /* Type => 0 => New */
    /* Type => 1 => Exist */
    if (type == 0) {
      $(".new_supplier_div").css("display", "block");
      $(".exist_supplier_div").css("display", "none");
    } else {
      $(".new_supplier_div").css("display", "none");
      $(".exist_supplier_div").css("display", "block");

    }

  }

  $(document).ready(function() {
    var type = $(".supplier_type:checked").val();
    supplier_type(type);
  });

  $(document).on("click", ".supplier_type", function() {
    var type = $(this).val();
    supplier_type(type);
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
   $(this).closest(".address_div").find(".old_address_type_id").html(address_type_dets);
   $(this).closest(".address_div").find(".address_type_id").html(address_type_dets);
  
});
/* Proof Perment Details Start Here */
/* Address Perement Delete Start Here */
$(document).on("click",".perment_proof_details",function(){
  var proof_details_id=$(this).attr("attr-id");
  var $tr=$(this).closest("tr");
  if($(".perment_proof_details").length >1){
  if(confirm('Are You Sure Want to Delete this ?')){
   $.ajax({
                      type: "post",
                      url: "<?php echo e(url('master/supplier/delete-agent-proof-details')); ?>",
                      data: {proof_details_id: proof_details_id},
                      success: function (res)
                      {
                       if(res == 1){
                         $tr.remove();
                         set_sno_for_proof_details();
                          alert("Deleted Successfully ");

                       }else{
alert("Something Went Worng");
                       }
                      }
                  });

  }
}else{
  alert("Atleast One Address Details Present ");
}
  

 });
/* Proof Perment Details End Here */


  

$(document).on("blur change",".required_for_valid",function(){
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
  
function state_based_district_for_edit(){
    $(".old_state_id").each(function(key,index){
    console.log("old_state_id"+ key + "== " + $(this).val());
      if($(this).val() !=""){
      var $tr=$(this).closest(".address_div");
        $tr.find(".old_city_id").html("<option value=''>Choose City</option>");
       var state_id=$tr.find(".exist_old_state_id").val();
      var district_id=$tr.find(".exist_old_district_id").val();
     $.ajax({
                  type: "post",
                  url: "<?php echo e(url('common/get-state-based-district')); ?>",
                  data: {state_id: state_id,district_id:district_id},
                  success: function (res)
                  {
                     result = JSON.parse(res);
                   $tr.find(".old_district_id").html(result.option);
                   }
              });
            }
    });


    $(".new_state_id").each(function(key,index){
      console.log("new_state_id == ",$(this).val());
      if($(this).val() !=""){
        var $tr=$(this).closest(".address_div");
        $tr.find(".city_id").html("<option value=''>Choose City</option>");
        var state_id=$tr.find(".new_state_id").val();
        var district_id=$tr.find(".new_district_id").val();
        $.ajax({
                  type: "post",
                  url: "<?php echo e(url('common/get-state-based-district')); ?>",
                  data: {state_id: state_id,district_id:district_id},
                  success: function (res)
                  {
                     result = JSON.parse(res);
                   $tr.find(".district_id").html(result.option);
                   $("select").select2();
                   }
              });
            }
    });
  
    
    }

    function district_based_city_for_edit(){
       $(".old_district_id").each(function(key,index){
          var $tr=$(this).closest(".address_div");
          var district_id=$tr.find(".exist_old_district_id").val();
           var city_id=$tr.find(".exist_old_city_id").val();
          if(district_id !="" ){
           $.ajax({
                      type: "post",
                      url: "<?php echo e(url('common/get-district-based-city')); ?>",
                      data: {district_id: district_id,city_id:city_id},
                      success: function (res)
                      {
                        result = JSON.parse(res);
                        $tr.find(".old_city_id").html(result.option);
                      }
                  });
                }
         });

         $(".new_district_id").each(function(key,index){
          var $tr=$(this).closest(".address_div");
          var district_id=$tr.find(".new_district_id").val();
           var city_id=$tr.find(".new_city_id").val();
          if(district_id !="" ){
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
                }
         });
        
        }
$(document).ready(function(){
  $(".address_label").each(function(key,index){
$(this).html("Address Details - " + (key+1));
//$(this).closest(".address_div").find(".remove_address").html("Delete Address Details - " + (key+1));
});
  state_based_district_for_edit();
  district_based_city_for_edit();
  bank_based_branch_edit();
 });

 $(document).on("change",".district_id",function(){
        var $tr=$(this).closest(".address_div");
       
          var district_id=$(this).val();
         if(district_id !="" ){
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
                }

 });


 $(document).on("change",".state_id",function(){
        var $tr=$(this).closest(".address_div");
        $tr.find(".city_id").html("<option value=''>Choose City</option>");
        var state_id=$(this).val();
          if(state_id !="" ){
           $.ajax({
                      type: "post",
                      url: "<?php echo e(url('common/get-state-based-district')); ?>",
                      data: {state_id: state_id},
                      success: function (res)
                      {
                        result = JSON.parse(res);
                        $tr.find(".district_id").html(result.option);
                      }
                  });
                }

 });

/* Exist State District City based Values End Here */

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
          <h3 class="address_delete_label"><label class="btn btn-danger remove_new_address"> Delete </label></h3>\
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
                            <button type="button"  class="px-2 btn btn-success ml-2 " title="Add State"><i class="fa fa-plus-circle" aria-hidden="true"></i></button></a>\
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
                <input type="text" class="form-control postal_code only_allow_digit required_for_valid required_for_address_valid" error-data="Enter valid Postal Code" placeholder="Postal Code" name="postal_code[]" value="" >\
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

 /* Address Perement Delete Start Here */
 $(document).on("click",".remove_address",function(){
   var $tr=$(this).closest(".address_div");
if($(".remove_address").length >1){
  var address_details_id=$(this).attr("attr-id");
  if(confirm('Are You Sure Want to Delete this ?')){

    $.ajax({
                      type: "post",
                      url: "<?php echo e(url('master/supplier/delete-supplier-address-details')); ?>",
                      data: {address_details_id: address_details_id},
                      success: function (res)
                      {
                       if(res == 1){
                         $tr.remove();
                          alert("Deleted Successfully ");

                       }else{
alert("Something Went Worng");
                       }
                      }
                  });






//$(this).closest(".address_div").remove();
$(".address_label").each(function(key,index){
//$(this).html("Address Details - " + (key+1));
});
  }
}else{
  alert("Atleast One Address Details Present ");
}
  

 });


 /* Address Perement Delete End Here */

 /* Address Tempory Delete Start Here */
 

 $(document).on("click",".remove_new_address",function(){
   var $tr=$(this).closest(".address_div");
   $(this).closest(".address_div").remove();

  });
 /* Address Tempory Delete End Here */





  /* Bank based Branch  Details Ajax Start Here */
  $(document).on("change",".bank_id",function(){
   var $tr=$(this).closest("tr");
   var bank_id=$(this).val();
   $tr.find(".ifsc").val("");
    $.ajax({
              type: "post",
              url: "<?php echo e(url('common/get-bank-based-branch')); ?>",
              data: {bank_id: bank_id},
              success: function (res)
              {
                result = JSON.parse(res);
               $tr.find(".branch_id").html(result.option);
                
              }
          });
});
/* Bank based Branch  Details Ajax End Here */

/* Branch based IFSC  Details Ajax Start Here */
$(document).on("change",".branch_id",function(){
   var $tr=$(this).closest("tr");
   var branch_id=$(this).val();
   $.ajax({
              type: "post",
              url: "<?php echo e(url('common/get-branch-based-ifsc')); ?>",
              data: {branch_id: branch_id},
              success: function (res)
              {
                result = JSON.parse(res);
               $tr.find(".ifsc").val(result.value);
                
              }
          });
});
/* Branch based IFSC  Details Ajax End Here */


function bank_based_branch_edit(){
       $(".old_bank_id").each(function(key,index){
          var $tr=$(this).closest("tr");

          var bank_id=$tr.find(".exist_old_bank_id").val();
           var branch_id=$tr.find(".exist_old_branch_id").val();
          if(bank_id !="" ){
            $.ajax({
              type: "post",
              url: "<?php echo e(url('common/get-bank-based-branch')); ?>",
              data: {bank_id: bank_id,branch_id:branch_id},
              success: function (res)
              {
                result = JSON.parse(res);
               $tr.find(".branch_id").html(result.option);
                
              }
          });
                }
         });

         $(".new_bank_id").each(function(key,index){
          var $tr=$(this).closest("tr");

          var bank_id=$tr.find(".new_old_bank_id").val();
           var branch_id=$tr.find(".new_old_branch_id").val();
          if(bank_id !="" ){
            $.ajax({
              type: "post",
              url: "<?php echo e(url('common/get-bank-based-branch')); ?>",
              data: {bank_id: bank_id},
              success: function (res)
              {
                result = JSON.parse(res);
               $tr.find(".branch_id").html(result.option);
                
              }
          });
                }
         });

        
        
        }


        /* Remove Bank Details Start Here */
        $(document).on("click",".perment_delete_bank",function(){
   var $tr=$(this).closest("tr");
if($(".perment_delete_bank").length >1){
  var bank_details_id=$(this).attr("attr-id");
  if(confirm('Are You Sure Want to Delete this ?')){

    $.ajax({
                      type: "post",
                      url: "<?php echo e(url('master/supplier/delete-supplier-bank-details')); ?>",
                      data: {bank_details_id: bank_details_id},
                      success: function (res)
                      {
                       if(res == 1){
                         $tr.remove();
                          alert("Deleted Successfully ");

                       }else{
alert("Something Went Worng");
                       }
                      }
                  });






//$(this).closest(".address_div").remove();
$(".address_label").each(function(key,index){
//$(this).html("Address Details - " + (key+1));
});
  }
}else{
  alert("Atleast One Address Details Present ");
}
  

 });
        /* Remove Bank Details End Here */











</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ns_pollachi\resources\views/admin/master/supplier/edit.blade.php ENDPATH**/ ?>