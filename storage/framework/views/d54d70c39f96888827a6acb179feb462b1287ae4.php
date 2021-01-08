<?php $__env->startSection('content'); ?>
<main class="page-content">

<div class="col-12 body-sec">
  <div class="card container-fluid px-0">
    <!-- card header start@ -->
    <div class="card-header px-2">
      <div class="row">
        <div class="col-4">
          <h3>Add Supplier</h3>
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
    
      <form  method="post" class="form-horizontal needs-validation" 
      novalidate action="<?php echo e(url('master/supplier/store')); ?>" enctype="multipart/form-data">
      <?php echo e(csrf_field()); ?>

   

     
        <div class="form-row">
         

          <div class="col-md-8">
          <h4>Professional details:</h4>
          </div>
          <div class="col-md-6">
              <div class="form-group row">
                <label for="validationCustom01" class="col-sm-4 col-form-label">Company Name<span class="mandatory">*</span></label>
                <div class="col-sm-8">
                  <input type="text" class="form-control only_allow_alp_num_dot_com_amp company_name required_for_valid caps"  error-data="Enter valid Company Name" placeholder="Company Name" name="company_name" value="<?php echo e(old('company_name')); ?>" >
                  <span class="mandatory"> <?php echo e($errors->first('company_name')); ?> </span>
                  <div class="invalid-feedback">
                    Enter valid Company Name
                  </div>
                </div>
              </div>
            </div>
      <!-- <div class="col-md-6">
             <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Supplier Name </label>
              <div class="col-sm-8">
            <div class="input-group">
            <div class="input-group-prepend">
              <select class="form-control salutation" name="salutation" error-data="Enter valid Salutation" >
                  <option value="Mr" <?php echo e(old('salutation') == 'Mr' ? 'selected' : ''); ?>>Mr</option>
                  <option value="Mrs" <?php echo e(old('salutation') == 'Mrs' ? 'selected' : ''); ?> >Mrs</option>
              </select>
              <span class="mandatory"> <?php echo e($errors->first('salutation')); ?> </span>
            </div>
            <input type="text" class="form-control only_allow_alp_num_dot_com_amp name" name="name" error-data="Supplier Name Field is required" aria-label="Text input with dropdown button" value=<?php echo e(old('name')); ?>>
            
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
                    <input type="radio" class="form-check-input supplier_type" value="1" <?php echo e(old('supplier_type') == 1 ? 'checked' : ''); ?> name="supplier_type">Exist
                  </label>
                </div>

                <div class="form-check d-inline mx-4 ">
                  <label class="form-check-label">
                    <input type="radio" class="form-check-input supplier_type" value="0" <?php echo e(old('supplier_type') == 0 ? 'checked' : ''); ?> name="supplier_type">New
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
              <label for="validationCustom01" class="col-sm-4 col-form-label">Supplier Name<span class="mandatory">*</span> </label>
              <div class="col-sm-8">
                <div class="input-group">
                  <div class="input-group-prepend">
                    <select class="form-control  salutation" name="salutation" error-data="Enter valid Salutation">
                      <option value="Mr" <?php echo e(old('salutation') == 'Mr' ? 'selected' : ''); ?>>Mr</option>
                      <option value="Mrs" <?php echo e(old('salutation') == 'Mrs' ? 'selected' : ''); ?>>Mrs</option>
                    </select>
                    <span class="mandatory"> <?php echo e($errors->first('salutation')); ?> </span>
                  </div>
                  <input type="text" class="form-control only_allow_alp_num_dot_com_amp name caps" name="name" error-data="Customer Name Field is required" onchange="checkname()" aria-label="Text input with dropdown button" value=<?php echo e(old('name')); ?>>

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
                <option value="<?php echo e($value->id); ?>" <?php echo e(old('exist_supplier_name') == $value->id ? 'selected' : ''); ?> ><?php echo e($value->name); ?></option>
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
                <input type="text" class="form-control  phone_no only_allow_digit required_for_valid" input-type="phone_no" pattern="[1-9]{1}[0-9]{9}" error-data="Enter valid Phone No" placeholder="Phone No" name="phone_no" value="<?php echo e(old('phone_no')); ?>" >
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
                <input type="text" class="form-control whatsapp_no only_allow_digit" input-type="phone_no" pattern="[1-9]{1}[0-9]{9}" error-data="Enter valid Whatsapp No" placeholder="Whatsapp No" name="whatsapp_no" value="<?php echo e(old('whatsapp_no')); ?>" >
                <span class="mandatory"> <?php echo e($errors->first('whatsapp_no')); ?> </span>
                <div class="invalid-feedback">
                  Enter valid Whatsapp No
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Email<!--  <span class="mandatory">*</span> --></label>
              <div class="col-sm-8">
                <input type="email" class="form-control email" input-type="email" error_data="Enter valid Email" placeholder="Email" name="email" value="<?php echo e(old('email')); ?>" >
                <span class="mandatory"> <?php echo e($errors->first('email')); ?> </span>
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
                <input type="text" class="form-control gst_no required_for_valid" input-type="gst_no" error_data="Enter valid Gst No" placeholder="Gst No" name="gst_no" value="<?php echo e(old('gst_no')); ?>" >
                <span class="mandatory"> <?php echo e($errors->first('gst_no')); ?> </span>
                <div class="invalid-feedback">
                  Enter valid Gst No
                </div>
              </div>
            </div>
          </div>

         

          

          <div class="col-md-6">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Opening Balance<!--  <span class="mandatory">*</span> --></label>
              <div class="col-sm-8">
                <input type="text" class="form-control  opening_balance only_allow_digit" input-type="opening_balance" error_data="Enter valid Opening Balance" placeholder="Opening Balance" name="opening_balance" value="<?php echo e(old('opening_balance')); ?>" >
                <span class="mandatory"> <?php echo e($errors->first('opening_balance')); ?> </span>
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
                <input type="text" class="form-control remark" input-type="remark" error_data="Enter valid Remark" placeholder="Remark" name="remark" value="<?php echo e(old('remark')); ?>" >
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
                    <tr>
                      <td><span class="bank_s_no"> 1 </span>
                      
                      <input type="hidden" class="old_bank_id" value="<?php echo e(old('bank_id.0')); ?>">
                      <input type="hidden" class="old_branch_id" value="<?php echo e(old('branch_id.0')); ?>">
                    </td>

                      <td>
                        <div class="form-group row">
                            <div class="col-sm-8">
                              <select class="js-example-basic-multiple col-12 form-control custom-select bank_id required_for_valid" error-data="Enter valid Bank" name="bank_id[]" >
                                <option value="">Choose Bank</option>
                                <?php $__currentLoopData = $bank; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($value->id); ?>" <?php echo e(old('bank_id.0') == $value->id ? 'selected' : ''); ?>  ><?php echo e($value->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                              </select>
                              <span class="mandatory"> <?php echo e($errors->first('bank_id.0')); ?> </span>
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
                              <span class="mandatory"> <?php echo e($errors->first('branch_id.0')); ?> </span>
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
                          <input type="text" class="form-control ifsc only_allow_digit  required_for_proof_valid" error-data="Enter valid Ifsc Code" readonly placeholder="IFSC Code" name="ifsc[]" value="<?php echo e(old('ifsc.0')); ?>" >
                            <span class="mandatory"> <?php echo e($errors->first('ifsc.0')); ?> </span>
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
                                <option value="<?php echo e($value->id); ?>" <?php echo e(old('account_type_id.0') == $value->id ? 'selected' : ''); ?>  ><?php echo e($value->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                              </select>
                              <span class="mandatory"> <?php echo e($errors->first('account_type_id')); ?> </span>
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
                          <input type="text" class="form-control account_holder_name required_for_proof_valid" error-data="Enter valid Account Holder Name" placeholder="Account Holder Name" name="account_holder_name[]" value="<?php echo e(old('account_holder_name.0')); ?>" >
                            <span class="mandatory"> <?php echo e($errors->first('account_holder_name.0')); ?> </span>
                            <div class="invalid-feedback">
                              Enter valid Account Holder Name
                            </div>
                          </div>
                        </div>
                      </td>

                      <td>
                        <div class="form-group row">
                          <div class="mm">
                          <input type="text" class="form-control account_no required_for_proof_valid" error-data="Enter valid Account No"  placeholder="Account No" name="account_no[]" value="<?php echo e(old('account_no.0')); ?>" >
                            <span class="mandatory"> <?php echo e($errors->first('account_no.0')); ?> </span>
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

                    <?php if(old('bank_id')): ?>
                    <?php $__currentLoopData = old('bank_id'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($key > 0): ?>

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

                    <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>




                   
                  </tbody>

                </table>

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

                       </div>
        <div class="col-md-7 text-right">
          <input type="hidden" name="add">
          <button class="btn btn-success submit" type="button">Submit</button>
        </div>
      </form>
    </div>
    <!-- card body end@ -->
  </div>
</div>
<script src="<?php echo e(asset('assets/js/master/add_more_address_details.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/master/add_more_branch_details.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/validation/common_validation.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/master/capitalize.js')); ?>"></script>
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

  function checkname()
  {
    var name = $('.name').val();
    $.ajax({
        type: "POST",
        url: "<?php echo e(url('master/supplier/checkname/')); ?>",
        data: {name: name,},
        success: function(data) {
          if(data == 1)
          {
            alert('Name Already Taken');
            $('.name').val('');
          }
        }
      });
  }

  $(document).ready(function() {
    var type = $(".supplier_type:checked").val();
    supplier_type(type);
  });

  $(document).on("click", ".supplier_type", function() {
    var type = $(this).val();
    supplier_type(type);
  });
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

function bank_based_branch(){
  $(".bank_id").each(function(key,index){
    var $tr=$(this).closest("tr");
    var branch_id=$tr.find(".old_branch_id").val();
  var bank_id=$tr.find(".old_bank_id").val();
  if(bank_id !=""){

  
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

}


$(document).ready(function(){
  state_based_district();
  district_based_city();
  bank_based_branch();
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

 

</script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ns_pollachi\resources\views/admin/master/supplier/add.blade.php ENDPATH**/ ?>