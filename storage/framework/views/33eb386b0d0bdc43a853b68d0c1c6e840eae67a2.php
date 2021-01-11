<?php $__env->startSection('content'); ?>
<main class="page-content">

<div class="col-12 body-sec">
  <div class="card container-fluid px-0">
    <!-- card header start@ -->
    <div class="card-header px-2">
      <div class="row">
        <div class="col-4">
          <h3>Add Role</h3>
        </div>
        <div class="col-8 mr-auto">
          <ul class="h-right-btn mb-0 pl-0">
            <li><button type="button" class="btn btn-success"><a href="<?php echo e(url('master/role')); ?>">Back</a></button></li>
          </ul>
        </div>
      </div>
    </div>
    <!-- card header end@ -->
    <div class="card-body">
    
      <form  method="post" class="form-horizontal needs-validation" novalidate action="<?php echo e(url('master/role/store')); ?>" enctype="multipart/form-data">
      <?php echo e(csrf_field()); ?>


        <div class="form-row">
            <span class="mandatory"> <?php echo e($errors->first('permission.*')); ?> </span>
         
		  <div class="col-md-12">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-2 col-form-label">Role <span class="mandatory">*</span></label>
              <div class="col-sm-8">
                <select class="js-example-basic-multiple col-12 custom-select bank_id" name="role_id" required>
                  <option value="">Choose Role</option>
                 /* <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <option value="<?php echo e($value->id); ?>" <?php echo e(old('role_id') == $value->id ? 'selected' : ''); ?> ><?php echo e($value->name); ?></option>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> */
                </select>
                <span class="mandatory"> <?php echo e($errors->first('role_id')); ?> </span>
                <div class="invalid-feedback">
                  Enter valid Role
                </div>
              </div>
             
          </div>
          </div>

         

          	<div class="container">
                             <div class="panel panel-default" id="heading">
                             <div class="panel-heading"><h4 style=" text-align: center;"> 
							 <input style=" text-align: center;" value="h1" type="checkbox"  class="masters_head" id="masters_head" name="permission[]"/> <b>Masters</b></h4>
							 </div>
                             </div>
                             </div>
						<div id="masters_div" class="masters_div form-group" style="display:none; width:100%">
							
							<div class="container">
							<input type="checkbox" name="checkAll" id="checkAll"/></label>
								<label class="control-label"><b>location</b></label>
								<div class="row">
									<div class="col-lg-2">
										<div class="" id="tab1">		
								<input type="checkbox" name="checkAll1" id="checkAll1"/></label>
								<label class="control-label">Select All</label>
								<br>
								<input type="checkbox" value="a1" class="state masters"  id="zone" name="permission[]"/></label>
								<label class="control-label">State</label>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="a2" class="state masters " id="state_add" name="permission[]"/></label>
								<span class="control-label">Add</span>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="a3" class="state masters" id="state_edit" name="permission[]"/></label>
								<span class="control-label">Edit</span>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="a4" class="state masters" id="state_delete" name="permission[]"/></label>
								<span class="control-label">Delete</span>
							</div>	
									</div>
									
									
									<div class="col-lg-2">
										<div class="" id="tab2">	
							    <input type="checkbox" name="checkAll2" id="checkAll2"/></label>
								<label class="control-label">Select All</label>
								<br>
								<input type="checkbox" value="b1" class="District masters" id="branch" name="permission[]"/></label>
								<label class="control-label">District</label>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="b2" class="District masters" id="district_add" name="permission[]"/></label>
								<span class="control-label">Add</span>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="b3" class="District masters" id="district_edit" name="permission[]"/></label>
								<span class="control-label">Edit</span>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="b4" class="District masters" id="district_delete" name="permission[]"/></label>
								<span class="control-label">Delete</span>
							</div>	
									</div>
									
									
									<div class="col-lg-2">
											<div class="" id="tab3">
                                <input type="checkbox" name="checkAll3" id="checkAll3"/></label>
								<label class="control-label">Select All</label>
								<br>							
								<input type="checkbox" value="c1" class="City masters" id="scheme" name="permission[]"/></label>
								<label class="control-label">City</label>
								<br>
						 		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="c2" class="City masters" id="City_add" name="permission[]"/></label>
								<span class="control-label">Add</span>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="c3" class="City masters" id="City_edit" name="permission[]"/></label>
								<span class="control-label">Edit</span>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="c4" class="City masters" id="City_delete" name="permission[]"/></label>
								<span class="control-label">Delete</span>
							</div>	
									</div>
									
								
								
								
								
								<div class="col-lg-2">
										<div class="" id="tab4">	
							    <input type="checkbox" name="checkAll4" id="checkAll4"/></label>
								<label class="control-label">Select All</label>
								<br>
								<input type="checkbox" value="d1" class="address_type masters" id="branch" name="permission[]"/></label>
								<label class="control-label">Address Type</label>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="d2" class="address_type masters" id="address_type_add" name="permission[]"/></label>
								<span class="control-label">Add</span>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="d3" class="address_type masters" id="address_type_edit" name="permission[]"/></label>
								<span class="control-label">Edit</span>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="d4" class="address_type masters" id="address_type_delete" name="permission[]"/></label>
								<span class="control-label">Delete</span>
							</div>	
									</div>
									
									<div class="col-lg-2">
										<div class="" id="tab5">	
							    <input type="checkbox" name="checkAll5" id="checkAll5"/></label>
								<label class="control-label">Select All</label>
								<br>
								<input type="checkbox" value="e1" class="location_type masters" id="branch" name="permission[]"/></label>
								<label class="control-label">Location Type</label>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="e2" class="location_type masters" id="location_type_add" name="permission[]"/></label>
								<span class="control-label">Add</span>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="e3" class="location_type masters" id="location_type_edit" name="permission[]"/></label>
								<span class="control-label">Edit</span>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="e4" class="location_type masters" id="location_type_delete" name="permission[]"/></label>
								<span class="control-label">Delete</span>
							</div>	
									</div>
									
									<div class="col-lg-2">
										<div class="" id="tab6">	
							    <input type="checkbox" name="checkAll6" id="checkAll6"/></label>
								<label class="control-label">Select All</label>
								<br>
								<input type="checkbox" value="f1" class="company_location masters" id="branch" name="permission[]"/></label>
								<label class="control-label">Company Location</label>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="f2" class="company_location masters" id="company_location_add" name="permission[]"/></label>
								<span class="control-label">Add</span>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="f3" class="company_location masters" id="company_location_edit" name="permission[]"/></label>
								<span class="control-label">Edit</span>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="f4" class="company_location masters" id="company_location_delete" name="permission[]"/></label>
								<span class="control-label">Delete</span>
							</div>	
									</div>
									
									
									<div class="col-lg-2">
										<div class="" id="tab7">	
							    <input type="checkbox" name="checkAll7" id="checkAll7"/></label>
								<label class="control-label">Select All</label>
								<br>
								<input type="checkbox" value="g1" class="head_office_detail masters" id="branch" name="permission[]"/></label>
								<label class="control-label">Head office Detail</label>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="g2" class="head_office_detail masters" id="head_office_detail_add" name="permission[]"/></label>
								<span class="control-label">Add</span>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="g3" class="head_office_detail masters" id="head_office_detail_edit" name="permission[]"/></label>
								<span class="control-label">Edit</span>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="g4" class="head_office_detail masters" id="head_office_detail_delete" name="permission[]"/></label>
								<span class="control-label">Delete</span>
							</div>	
									</div>
									
								
									
								</div>
							</div>	</br> </br>		
							
							<div class="container">
							<input type="checkbox" name="checkAll8" id="checkAll8"/></label>
								<label class="control-label"><b>Bank</b></label>
								<div class="row">
									<div class="col-lg-2">
										<div class="" id="tab8">		
								<input type="checkbox" name="checkAll8" id="checkAll8"/></label>
								<label class="control-label">Select All</label>
								<br>
								<input type="checkbox" value="h1" class="bank masters"  id="zone" name="permission[]"/></label>
								<label class="control-label">Bank</label>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="h2" class="bank masters " id="Bank_add" name="permission[]"/></label>
								<span class="control-label">Add</span>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="h3" class="bank masters" id="Bank_edit" name="permission[]"/></label>
								<span class="control-label">Edit</span>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="h4" class="bank masters" id="Bank_delete" name="permission[]"/></label>
								<span class="control-label">Delete</span>
							</div>	
									</div>
									
									
									<div class="col-lg-2">
										<div class="" id="tab9">	
							    <input type="checkbox" name="checkAll9" id="checkAll9"/></label>
								<label class="control-label">Select All</label>
								<br>
								<input type="checkbox" value="i1" class="bank_branch masters" id="branch" name="permission[]"/></label>
								<label class="control-label">Bank Branch</label>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="i2" class="bank_branch masters" id="bank_branch_add" name="permission[]"/></label>
								<span class="control-label">Add</span>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="i3" class="bank_branch masters" id="bank_branch_edit" name="permission[]"/></label>
								<span class="control-label">Edit</span>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="i4" class="bank_branch masters" id="bank_branch_delete" name="permission[]"/></label>
								<span class="control-label">Delete</span>
							</div>	
									</div>
									
									
									<div class="col-lg-2">
											<div class="" id="tab10">
                                <input type="checkbox" name="checkAll10" id="checkAll10"/></label>
								<label class="control-label">Select All</label>
								<br>							
								<input type="checkbox" value="j1" class="denomination masters" id="scheme" name="permission[]"/></label>
								<label class="control-label">Denomination</label>
								<br>
						 		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="j2" class="denomination masters" id="denomination_add" name="permission[]"/></label>
								<span class="control-label">Add</span>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="j3" class="denomination masters" id="denomination_edit" name="permission[]"/></label>
								<span class="control-label">Edit</span>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="j4" class="denomination masters" id="denomination_delete" name="permission[]"/></label>
								<span class="control-label">Delete</span>
							</div>	
									</div>
									
								
								
								
								
								<div class="col-lg-2">
										<div class="" id="tab11">	
							    <input type="checkbox" name="checkAll11" id="checkAll11"/></label>
								<label class="control-label">Select All</label>
								<br>
								<input type="checkbox" value="k1" class="account_type masters" id="branch" name="permission[]"/></label>
								<label class="control-label">Account Type</label>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="k2" class="account_type masters" id="account_type_add" name="permission[]"/></label>
								<span class="control-label">Add</span>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="k3" class="account_type masters" id="account_type_edit" name="permission[]"/></label>
								<span class="control-label">Edit</span>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="k4" class="account_type masters" id="account_type_delete" name="permission[]"/></label>
								<span class="control-label">Delete</span>
							</div>	
									</div>
									
								
									
								</div>
							</div>	
							
							 </br></br></br>
							
							<div class="container">
							<input type="checkbox" name="checkAll1" id="checkAll1"/></label>
								<label class="control-label"><b>Employee</b></label>
								<div class="row">
									<div class="col-lg-2">
										<div class="" id="tab12">		
								<input type="checkbox" name="checkAll12" id="checkAll12"/></label>
								<label class="control-label">Select All</label>
								<br>
								<input type="checkbox" value="l1" class="department masters"  id="zone" name="permission[]"/></label>
								<label class="control-label">Department</label>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="l2" class="department masters " id="department_add" name="permission[]"/></label>
								<span class="control-label">Add</span>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="l3" class="department masters" id="department_edit" name="permission[]"/></label>
								<span class="control-label">Edit</span>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="l4" class="department masters" id="department_delete" name="permission[]"/></label>
								<span class="control-label">Delete</span>
							</div>	
									</div>
									
									
									<div class="col-lg-2">
										<div class="" id="tab13">	
							    <input type="checkbox" name="checkAll13" id="checkAll13"/></label>
								<label class="control-label">Select All</label>
								<br>
								<input type="checkbox" value="m1" class="designation masters" id="branch" name="permission[]"/></label>
								<label class="control-label">Designation</label>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="m2" class="designation masters" id="designation_add" name="permission[]"/></label>
								<span class="control-label">Add</span>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="m3" class="designation masters" id="designation_edit" name="permission[]"/></label>
								<span class="control-label">Edit</span>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="m4" class="designation masters" id="designation_delete" name="permission[]"/></label>
								<span class="control-label">Delete</span>
							</div>	
									</div>
									
									
									<div class="col-lg-2">
											<div class="" id="tab14">
                                <input type="checkbox" name="checkAll14" id="checkAll14"/></label>
								<label class="control-label">Select All</label>
								<br>							
								<input type="checkbox" value="n1" class="employee masters" id="scheme" name="permission[]"/></label>
								<label class="control-label">Employee</label>
								<br>
						 		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="n2" class="employee masters" id="employee_add" name="permission[]"/></label>
								<span class="control-label">Add</span>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="n3" class="employee masters" id="employee_edit" name="permission[]"/></label>
								<span class="control-label">Edit</span>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="n4" class="employee masters" id="employee_delete" name="permission[]"/></label>
								<span class="control-label">Delete</span>
							</div>	
									</div>
									
							
									
								</div>
							</div>	
							 </br></br></br>
							 
							 <div class="container">
							<input type="checkbox" name="checkAll1" id="checkAll1"/></label>
								<label class="control-label"><b>User</b></label>
								<div class="row">
									<div class="col-lg-2">
										<div class="" id="tab15">		
								<input type="checkbox" name="checkAll15" id="checkAll15"/></label>
								<label class="control-label">Select All</label>
								<br>
								<input type="checkbox" value="o1" class="user masters"  id="zone" name="permission[]"/></label>
								<label class="control-label">User</label>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="o2" class="user masters " id="user_add" name="permission[]"/></label>
								<span class="control-label">Add</span>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="o3" class="user masters" id="user_edit" name="permission[]"/></label>
								<span class="control-label">Edit</span>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="o4" class="user masters" id="user_delete" name="permission[]"/></label>
								<span class="control-label">Delete</span>
							</div>	
									</div>
									
									
									<div class="col-lg-2">
										<div class="" id="tab16">	
							    <input type="checkbox" name="checkAll16" id="checkAll16"/></label>
								<label class="control-label">Select All</label>
								<br>
								<input type="checkbox" value="p1" class="role masters" id="branch" name="permission[]"/></label>
								<label class="control-label">Role</label>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="p2" class="role masters" id="role_add" name="permission[]"/></label>
								<span class="control-label">Add</span>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="p3" class="role masters" id="role_edit" name="permission[]"/></label>
								<span class="control-label">Edit</span>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="p4" class="role masters" id="role_delete" name="permission[]"/></label>
								<span class="control-label">Delete</span>
							</div>	
									</div>
									
								</div>
							</div>	
							
							 </br></br></br>
							 
							  <div class="container">
							<input type="checkbox" name="checkAll1" id="checkAll1"/></label>
								<label class="control-label"><b>Accounts</b></label>
								<div class="row">
									<div class="col-lg-2">
										<div class="" id="tab17">		
								<input type="checkbox" name="checkAll17" id="checkAll17"/></label>
								<label class="control-label">Select All</label>
								<br>
								<input type="checkbox" value="q1" class="gift_voucher masters"  id="zone" name="permission[]"/></label>
								<label class="control-label">Gift Vouchers</label>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="q2" class="gift_voucher masters " id="gift_voucher_add" name="permission[]"/></label>
								<span class="control-label">Add</span>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="q3" class="gift_voucher masters" id="gift_voucher_edit" name="permission[]"/></label>
								<span class="control-label">Edit</span>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="q4" class="gift_voucher masters" id="gift_voucher_delete" name="permission[]"/></label>
								<span class="control-label">Delete</span>
							</div>	
									</div>
									
									
									<div class="col-lg-2">
										<div class="" id="tab18">	
							    <input type="checkbox" name="checkAll18" id="checkAll18"/></label>
								<label class="control-label">Select All</label>
								<br>
								<input type="checkbox" value="r1" class="offers masters" id="branch" name="permission[]"/></label>
								<label class="control-label">Offers</label>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="r2" class="offers masters" id="offers_add" name="permission[]"/></label>
								<span class="control-label">Add</span>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="r3" class="offers masters" id="offers_edit" name="permission[]"/></label>
								<span class="control-label">Edit</span>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="r4" class="offers masters" id="offers_delete" name="permission[]"/></label>
								<span class="control-label">Delete</span>
							</div>	
									</div>
									
								</div>
							</div>	
							
							 </br></br></br>
							  <div class="container">
							<input type="checkbox" name="checkAll1" id="checkAll1"/></label>
								<label class="control-label"><b>Category</b></label>
								<div class="row">
									<div class="col-lg-2">
										<div class="" id="tab19">		
								<input type="checkbox" name="checkAll19" id="checkAll19"/></label>
								<label class="control-label">Select All</label>
								<br>
								<input type="checkbox" value="s1" class="category masters"  id="zone" name="permission[]"/></label>
								<label class="control-label">Category</label>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="s2" class="category masters " id="category_add" name="permission[]"/></label>
								<span class="control-label">Add</span>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="s3" class="category masters" id="category_edit" name="permission[]"/></label>
								<span class="control-label">Edit</span>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="s4" class="category masters" id="category_delete" name="permission[]"/></label>
								<span class="control-label">Delete</span>
							</div>	
									</div>
									
									
									<div class="col-lg-2">
										<div class="" id="tab20">	
							    <input type="checkbox" name="checkAll20" id="checkAll20"/></label>
								<label class="control-label">Select All</label>
								<br>
								<input type="checkbox" value="t1" class="brand masters" id="branch" name="permission[]"/></label>
								<label class="control-label">Brand</label>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="t2" class="brand masters" id="brand_add" name="permission[]"/></label>
								<span class="control-label">Add</span>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="t3" class="brand masters" id="brand_edit" name="permission[]"/></label>
								<span class="control-label">Edit</span>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="t4" class="brand masters" id="brand_delete" name="permission[]"/></label>
								<span class="control-label">Delete</span>
							</div>	
									</div>
									
								</div>
							</div>	
							  </br></br></br>
							  
							  <div class="container">
							<input type="checkbox" name="checkAll" id="checkAll"/></label>
								<label class="control-label"><b>Language</b></label>
								<div class="row">
									<div class="col-lg-2">
										<div class="" id="tab21">		
								<input type="checkbox" name="checkAll21" id="checkAll21"/></label>
								<label class="control-label">Select All</label>
								<br>
								<input type="checkbox" value="u1" class="language masters"  id="zone" name="permission[]"/></label>
								<label class="control-label">Category</label>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="u2" class="language masters " id="language_add" name="permission[]"/></label>
								<span class="control-label">Add</span>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="u3" class="language masters" id="language_edit" name="permission[]"/></label>
								<span class="control-label">Edit</span>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="u4" class="language masters" id="language_delete" name="permission[]"/></label>
								<span class="control-label">Delete</span>
							</div>	
									</div>
									
								</div>
							</div>	
							 </br></br></br>
							 <div class="container">
							<input type="checkbox" name="checkAll" id="checkAll"/></label>
								<label class="control-label"><b>Item</b></label>
								<div class="row">
									<div class="col-lg-2">
										<div class="" id="tab22">	
								<input type="checkbox" name="checkAll22" id="checkAll22"/></label>
								<label class="control-label">Select All</label>
								<br>
								<input type="checkbox" value="v1" class="uom masters"  id="zone" name="permission[]"/></label>
								<label class="control-label">Uom</label>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="v2" class="uom masters " id="uom_add" name="permission[]"/></label>
								<span class="control-label">Add</span>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="v3" class="uom masters" id="uom_edit" name="permission[]"/></label>
								<span class="control-label">Edit</span>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="v4" class="uom masters" id="uom_delete" name="permission[]"/></label>
								<span class="control-label">Delete</span>
							</div>	
									</div>
									
									<div class="col-lg-2">
										<div class="" id="tab23">		
								<input type="checkbox" name="checkAll23" id="checkAll23"/></label>
								<label class="control-label">Select All</label>
								<br>
								<input type="checkbox" value="w1" class="tax masters"  id="zone" name="permission[]"/></label>
								<label class="control-label">Tax</label>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="w2" class="tax masters " id="tax_add" name="permission[]"/></label>
								<span class="control-label">Add</span>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="w3" class="tax masters" id="tax_edit" name="permission[]"/></label>
								<span class="control-label">Edit</span>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="w4" class="tax masters" id="tax_delete" name="permission[]"/></label>
								<span class="control-label">Delete</span>
							</div>	
									</div>
									
									<div class="col-lg-2">
										<div class="" id="tab24">		
								<input type="checkbox" name="checkAll24" id="checkAll24"/></label>
								<label class="control-label">Select All</label>
								<br>
								<input type="checkbox" value="x1" class="items masters"  id="zone" name="permission[]"/></label>
								<label class="control-label">Item</label>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="x2" class="items masters " id="items_add" name="permission[]"/></label>
								<span class="control-label">Add</span>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="x3" class="items masters" id="items_edit" name="permission[]"/></label>
								<span class="control-label">Edit</span>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="x4" class="items masters" id="items_delete" name="permission[]"/></label>
								<span class="control-label">Delete</span>
							</div>	
									</div>
									
																		<div class="col-lg-2">
										<div class="" id="tab25">		
								<input type="checkbox" name="checkAll25" id="checkAll25"/></label>
								<label class="control-label">Select All</label>
								<br>
								<input type="checkbox" value="y1" class="item_tax_detail masters"  id="zone" name="permission[]"/></label>
								<label class="control-label">Item Tax Details</label>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="y2" class="item_tax_detail masters " id="item_tax_detail_add" name="permission[]"/></label>
								<span class="control-label">Add</span>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="y3" class="item_tax_detail masters" id="item_tax_detail_edit" name="permission[]"/></label>
								<span class="control-label">Edit</span>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="y4" class="item_tax_detail masters" id="item_tax_detail_delete" name="permission[]"/></label>
								<span class="control-label">Delete</span>
							</div>	
									</div>
									
								</div>
							</div>	
							</br></br></br>
							
							 <div class="container">
							<input type="checkbox" name="checkAll1" id="checkAll1"/></label>
								<label class="control-label"><b>Vendor</b></label>
								<div class="row">
									<div class="col-lg-2">
										<div class="" id="tab26">		
								<input type="checkbox" name="checkAll26" id="checkAll26"/></label>
								<label class="control-label">Select All</label>
								<br>
								<input type="checkbox" value="z1" class="agent masters"  id="zone" name="permission[]"/></label>
								<label class="control-label">Agent</label>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="z2" class="agent masters " id="agent_add" name="permission[]"/></label>
								<span class="control-label">Add</span>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="z3" class="agent masters" id="agent_edit" name="permission[]"/></label>
								<span class="control-label">Edit</span>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="z4" class="agent masters" id="agent_delete" name="permission[]"/></label>
								<span class="control-label">Delete</span>
							</div>	
									</div>
									
									<div class="col-lg-2">
										<div class="" id="tab27">		
								<input type="checkbox" name="checkAll27" id="checkAll27"/></label>
								<label class="control-label">Select All</label>
								<br>
								<input type="checkbox" value="aa1" class="customer masters"  id="zone" name="permission[]"/></label>
								<label class="control-label">Customer</label>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="aa2" class="customer masters " id="customer_add" name="permission[]"/></label>
								<span class="control-label">Add</span>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="aa3" class="customer masters" id="customer_edit" name="permission[]"/></label>
								<span class="control-label">Edit</span>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="aa4" class="customer masters" id="customer_delete" name="permission[]"/></label>
								<span class="control-label">Delete</span>
							</div>	
									</div>
									
									<div class="col-lg-2">
										<div class="" id="tab28">		
								<input type="checkbox" name="checkAll28" id="checkAll28"/></label>
								<label class="control-label">Select All</label>
								<br>
								<input type="checkbox" value="bb1" class="supplier masters"  id="zone" name="permission[]"/></label>
								<label class="control-label">Supplier</label>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="bb2" class="supplier masters " id="supplier_add" name="permission[]"/></label>
								<span class="control-label">Add</span>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="bb3" class="supplier masters" id="supplier_edit" name="permission[]"/></label>
								<span class="control-label">Edit</span>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="bb4" class="supplier masters" id="supplier_delete" name="permission[]"/></label>
								<span class="control-label">Delete</span>
							</div>	
									</div>
									
								<div class="col-lg-2">
								<div class="" id="tab29">		
								<input type="checkbox" name="checkAll29" id="checkAll29"/></label>
								<label class="control-label">Select All</label>
								<br>
								<input type="checkbox" value="cc1" class="salesman masters"  id="zone" name="permission[]"/></label>
								<label class="control-label">Salesman</label>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="cc2" class="salesman masters " id="salesman_add" name="permission[]"/></label>
								<span class="control-label">Add</span>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="cc3" class="salesman masters" id="salesman_edit" name="permission[]"/></label>
								<span class="control-label">Edit</span>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="cc4" class="salesman masters" id="salesman_delete" name="permission[]"/></label>
								<span class="control-label">Delete</span>
							</div>	
									</div>
									
								</div>
							</div>	
							 </br></br></br>
							 
							 <div class="container">
							<input type="checkbox" name="checkAll" id="checkAll"/></label>
								<label class="control-label"><b>Area</b></label>
								<div class="row">
									<div class="col-lg-2">
										<div class="" id="tab30">		
								<input type="checkbox" name="checkAll30" id="checkAll30"/></label>
								<label class="control-label">Select All</label>
								<br>
								<input type="checkbox" value="dd1" class="area masters"  id="zone" name="permission[]"/></label>
								<label class="control-label">Area</label>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="dd2" class="area masters " id="area_add" name="permission[]"/></label>
								<span class="control-label">Add</span>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="dd3" class="area masters" id="area_edit" name="permission[]"/></label>
								<span class="control-label">Edit</span>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="dd4" class="area masters" id="area_delete" name="permission[]"/></label>
								<span class="control-label">Delete</span>
							</div>	
								</div>
								</div>
							</div>
							 </br></br></br>
							 <div class="container">
							<input type="checkbox" name="checkAll" id="checkAll"/></label>
								<label class="control-label"><b>Account Group</b></label>
								<div class="row">
									<div class="col-lg-2">
										<div class="" id="tab31">		
								<input type="checkbox" name="checkAll31" id="checkAll31"/></label>
								<label class="control-label">Select All</label>
								<br>
								<input type="checkbox" value="ee1" class="account_group masters"  id="zone" name="permission[]"/></label>
								<label class="control-label">Account Group</label>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="ee2" class="account_group masters " id="account_group_add" name="permission[]"/></label>
								<span class="control-label">Add</span>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="ee3" class="account_group masters" id="account_group_edit" name="permission[]"/></label>
								<span class="control-label">Edit</span>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="ee4" class="account_group masters" id="account_group_delete" name="permission[]"/></label>
								<span class="control-label">Delete</span>
							</div>	
								</div>
								
								<div class="col-lg-2">
										<div class="" id="tab32">		
								<input type="checkbox" name="checkAll32" id="checkAll32"/></label>
								<label class="control-label">Select All</label>
								<br>
								<input type="checkbox" value="ff1" class="account_head masters"  id="zone" name="permission[]"/></label>
								<label class="control-label">Account Head</label>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="ff2" class="account_head masters " id="account_head_add" name="permission[]"/></label>
								<span class="control-label">Add</span>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="ff3" class="account_head masters" id="account_head_edit" name="permission[]"/></label>
								<span class="control-label">Edit</span>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="ff4" class="account_head masters" id="account_head_delete" name="permission[]"/></label>
								<span class="control-label">Delete</span>
							</div>	
								</div>
								
								<div class="col-lg-2">
										<div class="" id="tab33">		
								<input type="checkbox" name="checkAll33" id="checkAll33"/></label>
								<label class="control-label">Select All</label>
								<br>
								<input type="checkbox" value="gg1" class="tax_for_account_grp masters"  id="zone" name="permission[]"/></label>
								<label class="control-label">Tax for account Group</label>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="gg2" class="tax_for_account_grp masters " id="tax_for_account_grp_add" name="permission[]"/></label>
								<span class="control-label">Add</span>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="gg3" class="tax_for_account_grp masters" id="tax_for_account_grp_edit" name="permission[]"/></label>
								<span class="control-label">Edit</span>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="gg4" class="tax_for_account_grp masters" id="tax_for_account_grp_delete" name="permission[]"/></label>
								<span class="control-label">Delete</span>
							</div>	
								</div>
								</div>
							</div>
							 </br></br></br>
						
						</div> 
						 </br></br></br>
						
						<div class="form-group col-sm-12 col-md-12">
						    <div class="container">
                             <div class="panel panel-default"  id="heading">
                             <div class="panel-heading"><h4 style=" text-align: center;">
							 <input style=" text-align: center;" type="checkbox" value="h2" class="employee_head" id="transaction_management" name="permission[]"/>
							 <b>Transaction Management</b></h4></div>
                             </div>
                            </div>
							<div id="transaction_management_div" class="trans_div form-group" style="display:none; width:100%">
							<input type="checkbox" name="checkAll1" id="checkAll1"/></label>
								<label class="control-label"><b>Purchase</b></label>
								<div class="row">
									<div class="col-lg-2">
										<div class="" id="tab34">		
								<input type="checkbox" name="checkAll34" id="checkAll34"/></label>
								<label class="control-label">Select All</label>
								<br>
								<input type="checkbox" value="hh1" class="estimation masters"  id="zone" name="permission[]"/></label>
								<label class="control-label">Estimation</label>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="hh2" class="estimation masters " id="estimation_add" name="permission[]"/></label>
								<span class="control-label">Add</span>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="hh3" class="estimation masters" id="estimation_edit" name="permission[]"/></label>
								<span class="control-label">Edit</span>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="hh4" class="estimation masters" id="estimation_delete" name="permission[]"/></label>
								<span class="control-label">Delete</span>
							</div>	
								</div>
								
								<div class="col-lg-2">
										<div class="" id="tab35">		
								<input type="checkbox" name="checkAll35" id="checkAll35"/></label>
								<label class="control-label">Select All</label>
								<br>
								<input type="checkbox" value="ii1" class="purchase masters"  id="zone" name="permission[]"/></label>
								<label class="control-label">Purchase</label>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="ii2" class="purchase masters " id="purchase_add" name="permission[]"/></label>
								<span class="control-label">Add</span>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="ii3" class="purchase masters" id="purchase_edit" name="permission[]"/></label>
								<span class="control-label">Edit</span>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="ii4" class="purchase masters" id="purchase_delete" name="permission[]"/></label>
								<span class="control-label">Delete</span>
							</div>	
								</div>
								
								<div class="col-lg-2">
										<div class="" id="tab36">		
								<input type="checkbox" name="checkAll36" id="checkAll36"/></label>
								<label class="control-label">Select All</label>
								<br>
								<input type="checkbox" value="jj1" class="receipt_note masters"  id="zone" name="permission[]"/></label>
								<label class="control-label">Receipt Note</label>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="jj2" class="receipt_note masters " id="receipt_note_add" name="permission[]"/></label>
								<span class="control-label">Add</span>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="jj3" class="receipt_note masters" id="receipt_note_edit" name="permission[]"/></label>
								<span class="control-label">Edit</span>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="jj4" class="receipt_note masters" id="receipt_note_delete" name="permission[]"/></label>
								<span class="control-label">Delete</span>
							</div>	
								</div>
								
								<div class="col-lg-2">
										<div class="" id="tab37">		
								<input type="checkbox" name="checkAll37" id="checkAll37"/></label>
								<label class="control-label">Select All</label>
								<br>
								<input type="checkbox" value="kk1" class="purchase_entry masters"  id="zone" name="permission[]"/></label>
								<label class="control-label">Purchase Entry</label>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="kk2" class="purchase_entry masters " id="purchase_entry_add" name="permission[]"/></label>
								<span class="control-label">Add</span>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="kk3" class="purchase_entry masters" id="purchase_entry_edit" name="permission[]"/></label>
								<span class="control-label">Edit</span>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="kk4" class="purchase_entry masters" id="purchase_entry_delete" name="permission[]"/></label>
								<span class="control-label">Delete</span>
							</div>	
								</div>
								
								<div class="col-lg-2">
										<div class="" id="tab38">		
								<input type="checkbox" name="checkAll38" id="checkAll38"/></label>
								<label class="control-label">Select All</label>
								<br>
								<input type="checkbox" value="ll1" class="rejection_out masters"  id="zone" name="permission[]"/></label>
								<label class="control-label">Rejection Out</label>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="ll2" class="rejection_out masters " id="rejection_out_add" name="permission[]"/></label>
								<span class="control-label">Add</span>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="ll3" class="rejection_out masters" id="rejection_out_edit" name="permission[]"/></label>
								<span class="control-label">Edit</span>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="ll4" class="rejection_out masters" id="rejection_out_delete" name="permission[]"/></label>
								<span class="control-label">Delete</span>
							</div>	
								</div>
								<div class="col-lg-2">
										<div class="" id="tab39">		
								<input type="checkbox" name="checkAll39" id="checkAll39"/></label>
								<label class="control-label">Select All</label>
								<br>
								<input type="checkbox" value="mm1" class="purchase_gate_entry masters"  id="zone" name="permission[]"/></label>
								<label class="control-label">Purchase Gate Pass Entry</label>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="mm2" class="purchase_gate_entry masters " id="purchase_gate_entry_add" name="permission[]"/></label>
								<span class="control-label">Add</span>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="mm3" class="purchase_gate_entry masters" id="purchase_gate_entry_edit" name="permission[]"/></label>
								<span class="control-label">Edit</span>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="mm4" class="purchase_gate_entry masters" id="purchase_gate_entry_delete" name="permission[]"/></label>
								<span class="control-label">Delete</span>
							</div>	
								</div>
								
								<div class="col-lg-2">
										<div class="" id="tab40">		
								<input type="checkbox" name="checkAll40" id="checkAll40"/></label>
								<label class="control-label">Select All</label>
								<br>
								<input type="checkbox" value="nn1" class="debit_note masters"  id="zone" name="permission[]"/></label>
								<label class="control-label">Debit Note</label>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="nn2" class="debit_note masters " id="debit_note_add" name="permission[]"/></label>
								<span class="control-label">Add</span>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="nn3" class="debit_note masters" id="debit_note_edit" name="permission[]"/></label>
								<span class="control-label">Edit</span>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="nn4" class="debit_note masters" id="debit_note_delete" name="permission[]"/></label>
								<span class="control-label">Delete</span>
							</div>	
								</div>
								
								</div>
							
							</br></br></br>
							   <input type="checkbox" name="checkAll" id="checkAll"/>
								<label class="control-label"><b>Sales</b></label>
								<div class="row">
									<div class="col-lg-2">
										<div class="" id="tab41">		
								<input type="checkbox" name="checkAll41" id="checkAll41"/></label>
								<label class="control-label">Select All</label>
								<br>
								<input type="checkbox" value="oo1" class="sales_estimation masters"  id="zone" name="permission[]"/></label>
								<label class="control-label">Sales Estimation</label>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="oo2" class="sales_estimation masters " id="sales_estimation_add" name="permission[]"/></label>
								<span class="control-label">Add</span>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="oo2" class="sales_estimation masters" id="sales_estimation_edit" name="permission[]"/></label>
								<span class="control-label">Edit</span>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="002" class="sales_estimation masters" id="sales_estimation_delete" name="permission[]"/></label>
								<span class="control-label">Delete</span>
							</div>	
								</div>
								
								<div class="col-lg-2">
										<div class="" id="tab42">		
								<input type="checkbox" name="checkAll42" id="checkAll42"/></label>
								<label class="control-label">Select All</label>
								<br>
								<input type="checkbox" value="pp1" class="sales_order masters"  id="zone" name="permission[]"/></label>
								<label class="control-label">Sales Order</label>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="pp2" class="sales_order masters " id="sales_order_add" name="permission[]"/></label>
								<span class="control-label">Add</span>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="pp3" class="sales_order masters" id="sales_order_edit" name="permission[]"/></label>
								<span class="control-label">Edit</span>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="pp4" class="sales_order masters" id="sales_order_delete" name="permission[]"/></label>
								<span class="control-label">Delete</span>
							</div>	
								</div>
								
								<div class="col-lg-2">
										<div class="" id="tab43">		
								<input type="checkbox" name="checkAll43" id="checkAll43"/></label>
								<label class="control-label">Select All</label>
								<br>
								<input type="checkbox" value="qq1" class="delivery_notes masters"  id="zone" name="permission[]"/></label>
								<label class="control-label">Delivery Notes</label>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="qq2" class="delivery_notes masters " id="delivery_notes_add" name="permission[]"/></label>
								<span class="control-label">Add</span>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="qq3" class="delivery_notes masters" id="delivery_notes_edit" name="permission[]"/></label>
								<span class="control-label">Edit</span>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="qq4" class="delivery_notes masters" id="delivery_notes_delete" name="permission[]"/></label>
								<span class="control-label">Delete</span>
							</div>	
								</div>
							
								
								<div class="col-lg-2">
										<div class="" id="tab44">		
								<input type="checkbox" name="checkAll44" id="checkAll44"/></label>
								<label class="control-label">Select All</label>
								<br>
								<input type="checkbox" value="rr1" class="sales_entry masters"  id="zone" name="permission[]"/></label>
								<label class="control-label">Sales Entry</label>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="rr2" class="sales_entry masters " id="sales_entry_add" name="permission[]"/></label>
								<span class="control-label">Add</span>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="rr3" class="sales_entry masters" id="sales_entry_edit" name="permission[]"/></label>
								<span class="control-label">Edit</span>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="rr4" class="sales_entry masters" id="sales_entry_delete" name="permission[]"/></label>
								<span class="control-label">Delete</span>
							</div>	
								</div>
								
								<div class="col-lg-2">
										<div class="" id="tab45">		
								<input type="checkbox" name="checkAll45" id="checkAll45"/></label>
								<label class="control-label">Select All</label>
								<br>
								<input type="checkbox" value="ss1" class="rejection_in masters"  id="zone" name="permission[]"/></label>
								<label class="control-label">Rejection In</label>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="ss2" class="rejection_in masters " id="rejection_in_add" name="permission[]"/></label>
								<span class="control-label">Add</span>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="ss3" class="rejection_in masters" id="rejection_in_edit" name="permission[]"/></label>
								<span class="control-label">Edit</span>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="ss4" class="rejection_in masters" id="rejection_in_delete" name="permission[]"/></label>
								<span class="control-label">Delete</span>
							</div>	
								</div>
								<div class="col-lg-2">
										<div class="" id="tab46">		
								<input type="checkbox" name="checkAll46" id="checkAll46"/></label>
								<label class="control-label">Select All</label>
								<br>
								<input type="checkbox" value="tt1" class="sales_gate_entry masters"  id="zone" name="permission[]"/></label>
								<label class="control-label">Sales Gate Pass Entry</label>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="tt2" class="sales_gate_entry masters " id="sales_gate_entry_add" name="permission[]"/></label>
								<span class="control-label">Add</span>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="tt3" class="sales_gate_entry masters" id="sales_gate_entry_edit" name="permission[]"/></label>
								<span class="control-label">Edit</span>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="tt4" class="sales_gate_entry masters" id="sales_gate_entry_delete" name="permission[]"/></label>
								<span class="control-label">Delete</span>
							</div>	
								</div>
								
								<div class="col-lg-2">
										<div class="" id="tab47">		
								<input type="checkbox" name="checkAll47" id="checkAll47"/></label>
								<label class="control-label">Select All</label>
								<br>
								<input type="checkbox" value="uu1" class="credit_note masters"  id="zone" name="permission[]"/></label>
								<label class="control-label">Credit Note</label>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="uu2" class="credit_note masters " id="credit_note_add" name="permission[]"/></label>
								<span class="control-label">Add</span>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="uu3" class="credit_note masters" id="credit_note_edit" name="permission[]"/></label>
								<span class="control-label">Edit</span>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="uu4" class="credit_note masters" id="credit_note_delete" name="permission[]"/></label>
								<span class="control-label">Delete</span>
							</div>	
								</div>
								
								</div>
							
							 </br></br></br>
								
								<input type="checkbox" name="checkAll" id="checkAll"/></label>
								<label class="control-label"><b>Payments</b></label>
								<div class="row">
									<div class="col-lg-2">
										<div class="" id="tab48">		
								<input type="checkbox" name="checkAll48" id="checkAll48"/></label>
								<label class="control-label">Select All</label>
								<br>
								<input type="checkbox" value="vv1" class="payment_request masters"  id="zone" name="permission[]"/></label>
								<label class="control-label">Payment Request</label>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="vv2" class="payment_request masters " id="sales_estimation_add" name="permission[]"/></label>
								<span class="control-label">Add</span>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="vv3" class="payment_request masters" id="sales_estimation_edit" name="permission[]"/></label>
								<span class="control-label">Edit</span>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="vv4" class="payment_request masters" id="sales_estimation_delete" name="permission[]"/></label>
								<span class="control-label">Delete</span>
							</div>	
								</div>
								
								<div class="col-lg-2">
										<div class="" id="tab49">		
								<input type="checkbox" name="checkAll49" id="checkAll49"/></label>
								<label class="control-label">Select All</label>
								<br>
								<input type="checkbox" value="ww1" class="payment_process masters"  id="zone" name="permission[]"/></label>
								<label class="control-label">Payment Process</label>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="ww2" class="payment_process masters " id="sales_order_add" name="permission[]"/></label>
								<span class="control-label">Add</span>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="ww3" class="payment_process masters" id="sales_order_edit" name="permission[]"/></label>
								<span class="control-label">Edit</span>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="ww4" class="payment_process masters" id="sales_order_delete" name="permission[]"/></label>
								<span class="control-label">Delete</span>
							</div>	
								</div>
								
								<div class="col-lg-2">
										<div class="" id="tab50">		
								<input type="checkbox" name="checkAll50" id="checkAll50"/></label>
								<label class="control-label">Select All</label>
								<br>
								<input type="checkbox" value="xx1" class="payment_expense masters"  id="zone" name="permission[]"/></label>
								<label class="control-label">Payment Expenses</label>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="xx2" class="payment_expense masters " id="delivery_notes_add" name="permission[]"/></label>
								<span class="control-label">Add</span>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="xx3" class="payment_expense masters" id="delivery_notes_edit" name="permission[]"/></label>
								<span class="control-label">Edit</span>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="xx4" class="payment_expense masters" id="delivery_notes_delete" name="permission[]"/></label>
								<span class="control-label">Delete</span>
							</div>	
								</div>

							</div> <br> <br> <br>
						
						
						
								<input type="checkbox" name="checkAll" id="checkAll"/></label>
								<label class="control-label"><b>Receipts</b></label>
								<div class="row">
									<div class="col-lg-2">
										<div class="" id="tab51">		
								<input type="checkbox" name="checkAll51" id="checkAll51"/></label>
								<label class="control-label">Select All</label>
								<br>
								<input type="checkbox" value="yy1" class="receipt_request masters"  id="zone" name="permission[]"/></label>
								<label class="control-label">Receipt Request</label>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="yy2" class="receipt_request masters " id="sales_estimation_add" name="permission[]"/></label>
								<span class="control-label">Add</span>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="yy3" class="receipt_request masters" id="sales_estimation_edit" name="permission[]"/></label>
								<span class="control-label">Edit</span>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="yy4" class="receipt_request masters" id="sales_estimation_delete" name="permission[]"/></label>
								<span class="control-label">Delete</span>
							</div>	
								</div>
								
								<div class="col-lg-2">
										<div class="" id="tab52">		
								<input type="checkbox" name="checkAll52" id="checkAll52"/></label>
								<label class="control-label">Select All</label>
								<br>
								<input type="checkbox" value="zz1" class="receipt_process masters"  id="zone" name="permission[]"/></label>
								<label class="control-label">Receipt Process</label>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="zz2" class="receipt_process masters " id="sales_order_add" name="permission[]"/></label>
								<span class="control-label">Add</span>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="zz3" class="receipt_process masters" id="sales_order_edit" name="permission[]"/></label>
								<span class="control-label">Edit</span>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="zz4" class="receipt_process masters" id="sales_order_delete" name="permission[]"/></label>
								<span class="control-label">Delete</span>
							</div>	
								</div>
								
								<div class="col-lg-2">
										<div class="" id="tab53">		
								<input type="checkbox" name="checkAll53" id="checkAll53"/></label>
								<label class="control-label">Select All</label>
								<br>
								<input type="checkbox" value="aaa1" class="payment_expense masters"  id="zone" name="permission[]"/></label>
								<label class="control-label">Receipt Income</label>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="aaa2" class="payment_expense masters " id="delivery_notes_add" name="permission[]"/></label>
								<span class="control-label">Add</span>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="aaa3" class="payment_expense masters" id="delivery_notes_edit" name="permission[]"/></label>
								<span class="control-label">Edit</span>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="aaa4" class="payment_expense masters" id="delivery_notes_delete" name="permission[]"/></label>
								<span class="control-label">Delete</span>
							</div>	
								</div>

							</div> <br> <br> <br>
							
							
							<input type="checkbox" name="checkAll" id="checkAll"/></label>
								<label class="control-label"><b>Advance</b></label>
								<div class="row">
									<div class="col-lg-3">
										<div class="" id="tab54">		
								<input type="checkbox" name="checkAll54" id="checkAll54"/></label>
								<label class="control-label">Select All</label>
								<br>
								<input type="checkbox" value="bbb1" class="payment_advance masters"  id="zone" name="permission[]"/></label>
								<label class="control-label">Advance to Suppliers</label>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="bbb2" class="payment_advance masters " id="sales_estimation_add" name="permission[]"/></label>
								<span class="control-label">Add</span>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="bbb3" class="payment_advance masters" id="sales_estimation_edit" name="permission[]"/></label>
								<span class="control-label">Edit</span>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="bbb4" class="payment_advance masters" id="sales_estimation_delete" name="permission[]"/></label>
								<span class="control-label">Delete</span>
							</div>	
								</div>
								
								<div class="col-lg-3">
										<div class="" id="tab55">		
								<input type="checkbox" name="checkAll55" id="checkAll55"/></label>
								<label class="control-label">Select All</label>
								<br>
								<input type="checkbox" value="ccc1" class="receipt_advance masters"  id="zone" name="permission[]"/></label>
								<label class="control-label">Advance from Customers</label>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="ccc2" class="receipt_advance masters " id="sales_order_add" name="permission[]"/></label>
								<span class="control-label">Add</span>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="ccc3" class="receipt_advance masters" id="sales_order_edit" name="permission[]"/></label>
								<span class="control-label">Edit</span>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="ccc4" class="receipt_advance masters" id="sales_order_delete" name="permission[]"/></label>
								<span class="control-label">Delete</span>
							</div>	
								</div>
								</div> <br> <br> <br>
							
							<input type="checkbox" name="checkAll" id="checkAll"/></label>
								<label class="control-label"><b>Account Expense</b></label>
								<div class="row">
									<div class="col-lg-2">
										<div class="" id="tab56">		
								<input type="checkbox" name="checkAll56" id="checkAll56"/></label>
								<label class="control-label">Select All</label>
								<br>
								<input type="checkbox" value="ddd1" class="account_expense masters"  id="zone" name="permission[]"/></label>
								<label class="control-label">Account Expense</label>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="ddd2" class="account_expense masters " id="sales_estimation_add" name="permission[]"/></label>
								<span class="control-label">Add</span>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="ddd3" class="account_expense masters" id="sales_estimation_edit" name="permission[]"/></label>
								<span class="control-label">Edit</span>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="ddd4" class="account_expense masters" id="sales_estimation_delete" name="permission[]"/></label>
								<span class="control-label">Delete</span>
							</div>	
								</div>
								</div></div></div> <br> <br> <br>
								
						<div class="form-group col-sm-12 col-md-12"> 
						<div class="container">
                             <div class="panel panel-default"  id="heading">
                             <div class="panel-heading"><h4 style=" text-align: center;">
							 <input style=" text-align: center;" type="checkbox" value="h3" class="prize_updation" id="prize_updation" name="permission[]"/>
							 <b>Price Updation</b></h4></div>
                             </div>
                             </div>
							 						<div id="prize_updation_div" class="prize_updation_div form-group" style="display:none; width:100%">
							 <div class="col-lg-3">
										<div class="" id="tab57">		
								<input type="checkbox" name="checkAll57" id="checkAll57"/></label>
								<label class="control-label">Select All</label>
								<br>
								<input type="checkbox" value="bbb1" class="price_updation masters"  id="zone" name="permission[]"/></label>
								<label class="control-label">Price Updation</label>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="eee2" class="price_updation masters " id="sales_estimation_add" name="permission[]"/></label>
								<span class="control-label">Add</span>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="eee3" class="price_updation masters" id="sales_estimation_edit" name="permission[]"/></label>
								<span class="control-label">Edit</span>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="eee4" class="price_updation masters" id="sales_estimation_delete" name="permission[]"/></label>
								<span class="control-label">Delete</span>
							</div>	
								</div>
								
							 
							 
							 </div> </div> </br></br></br>
							
					
						
						<div class="form-group col-sm-12 col-md-12"> 
						<div class="container">
                             <div class="panel panel-default"  id="heading">
                             <div class="panel-heading"><h4 style=" text-align: center;">
							 <input style=" text-align: center;" type="checkbox" value="h3" class="customer_head" id="outstanding" name="permission[]"/>
							 <b>Outstanding</b></h4></div>
                             </div>
                             </div>
							 <div id="outstanding_div" class="outstanding_div form-group" style="display:none; width:100%">
							 <input type="checkbox" name="checkAll" id="checkAll"/></label>
								<label class="control-label"><b>Receivables</b></label>
								<div class="row">
									<div class="col-lg-3">
										<div class="" id="tab58">		
								<input type="checkbox" name="checkAll58" id="checkAll58"/></label>
								<label class="control-label">Select All</label>
								<br>
								<input type="checkbox" value="fff1" class="receivables masters"  id="zone" name="permission[]"/></label>
								<label class="control-label">Billwise Receivables</label><br>
								<input type="checkbox" value="ggg1" class="receivables masters"  id="zone" name="permission[]"/></label>
								<label class="control-label">Partywise Receivables</label>
							</div>	
								</div>
							 
									<div class="col-lg-3">
									 <input type="checkbox" name="checkAll" id="checkAll"/></label>
								<label class="control-label"><b>Payables</b></label>
										<div class="" id="tab59">		
								<input type="checkbox" name="checkAll59" id="checkAll59"/></label>
								<label class="control-label">Select All</label>
								<br>
								<input type="checkbox" value="hhh1" class="payables masters"  id="zone" name="permission[]"/></label>
								<label class="control-label">Billwise Payables</label><br>
								<input type="checkbox" value="iii1" class="payables masters"  id="zone" name="permission[]"/></label>
								<label class="control-label">Partywise Payables</label>
							</div>	
								</div>
							 </div> 
							 </div></div> </br></br></br>
						
						<div class="form-group col-sm-12 col-md-12"> 
						<div class="container">
                             <div class="panel panel-default"  id="heading">
                             <div class="panel-heading"><h4 style=" text-align: center;">
							 <input style=" text-align: center;" type="checkbox" value="h3" class="customer_head" id="settings" name="permission[]"/>
							 <b>Settings</b></h4></div>
                             </div>
                             </div>
							 <div id="settings_div" class="outstanding_div form-group" style="display:none; width:100%">
							 <input type="checkbox" name="checkAll60" id="checkAll60"/></label>
								<label class="control-label"><b>Selling Price</b></label>
								<div class="row">
									<div class="col-lg-3">
										<div class="" id="tab60">		
								
								<input type="checkbox" value="jjj1" class="receivables masters"  id="zone" name="permission[]"/></label>
								<label class="control-label">Selling Price setup</label><br>
							</div>	
								</div>
							 </div>
							 </div></div></br></br></br>
						
						
						<div class="form-group col-sm-12 col-md-12"> 
						<div class="container">
                             <div class="panel panel-default"  id="heading">
                             <div class="panel-heading"><h4 style=" text-align: center;">
							 <input style=" text-align: center;" type="checkbox" value="h3" class="customer_head" id="pos" name="permission[]"/>
							 <b>POS</b></h4></div>
                             </div>
                             </div>
							 <div id="pos_div" class="prize_updation_div form-group" style="display:none; width:100%">
							<input type="checkbox" name="checkAll61" id="checkAll61"/></label>
								<label class="control-label"><b>POS</b></label>
								<div class="row">
									<div class="col-lg-3">
										<div class="" id="tab61">		
								
								<input type="checkbox" value="kkk1" class="receivables masters"  id="zone" name="permission[]"/></label>
								<label class="control-label">POS</label><br>
							</div>	
								</div>
							 </div>								
						</div></div> </br></br></br>
						
						
					<div class="form-group col-sm-12 col-md-12"> 
						<div class="container">
                             <div class="panel panel-default"  id="heading">
                             <div class="panel-heading"><h4 style=" text-align: center;">
							 <input style=" text-align: center;" type="checkbox" value="h3" class="customer_head" id="reports" name="permission[]"/>
							 <b>Reports</b></h4></div>
                             </div>
                             </div>	
							 <div id="reports_div" class="reports_div form-group" style="display:none; width:100%">
						<div class="container">
							<input type="checkbox" name="checkAll62" id="checkAll62"/></label>
								<label class="control-label"><b>Day Book</b></label>
								<div class="row">
									<div class="col-lg-2">
										<div class="" id="tab62">		
								
								<input type="checkbox" value="lll1" class="bank masters"  id="zone" name="permission[]"/></label>
								<label class="control-label">Day Book</label>
							</div>	
									</div>
								</div>
								
							</div>	</br></br></br>
							
							<div class="container">
							<input type="checkbox" name="checkAll63" id="checkAll63"/></label>
								<label class="control-label"><b>Stock Report</b></label>
								<div class="row">
									<div class="col-lg-3">
										<div class="" id="tab63">		
								
								<input type="checkbox" value="mmm1" class="bank masters"  id="zone" name="permission[]"/></label>
								<label class="control-label">Stock Report</label>
								</div>
								<div>
								<input type="checkbox" value="nnn1" class="bank masters"  id="zone" name="permission[]"/></label>
								<label class="control-label">Stock Summary Report</label>
								</div>
								<div>
								<input type="checkbox" value="ooo1" class="bank masters"  id="zone" name="permission[]"/></label>
								<label class="control-label">Stock Ageing Report</label>
							</div>	
									</div>
								</div>
								
							</div>	</br></br></br>
                         
						 <div class="container">
							<input type="checkbox" name="checkAll64" id="checkAll64"/></label>
								<label class="control-label"><b>Individual Report</b></label>
								<div class="row">
									<div class="col-lg-2">
										<div class="" id="tab64">		
								
								<input type="checkbox" value="ppp1" class="bank masters"  id="zone" name="permission[]"/></label>
								<label class="control-label">Individual Report</label>
							</div>	
									</div>
								</div>
								
							</div>	</br></br></br>
                         
						 <div class="container">
							<input type="checkbox" name="checkAll65" id="checkAll65"/></label>
								<label class="control-label"><b>GST Report</b></label>
								<div class="row">
									<div class="col-lg-2">
										<div class="" id="tab65">		
								
								<input type="checkbox" value="qqq1" class="bank masters"  id="zone" name="permission[]"/></label>
								<label class="control-label">GST Report</label>
							</div>	
									</div>
								</div></div>
								
							</div>	
                         
        </div>
        </div>
        <div class="col-md-7 text-right">
          <button class="btn btn-success submit" name="add" type="submit">Submit</button>
        </div>
      </form>
    </div>
     <script src="<?php echo e(asset('assets/js/master/capitalize.js')); ?>"></script>
    <!-- card body end@ -->
  </div>
</div>

<script type="text/javascript">
$(document).ready(function(){
$(function () {
    $("#tab1 #checkAll1").click(function () {
        if ($("#tab1 #checkAll1").is(':checked')) {
            $("#tab1 input[type=checkbox]").each(function () {
                $(this).prop("checked", true);
            });
       
        } else {
            $("#tab1 input[type=checkbox]").each(function () {
                $(this).prop("checked", false);
            });
        }
    });
});
$(".state").change(function(){
    var all = $('.state');
    if (all.length === all.filter(':checked').length) {
        $("#checkAll1").prop("checked", true);
    } else {
        $("#checkAll1").prop("checked", false);
    }
});

$(function () {
    $("#tab2 #checkAll2").click(function () {
        if ($("#tab2 #checkAll2").is(':checked')) {
            $("#tab2 input[type=checkbox]").each(function () {
                $(this).prop("checked", true);
            });
       
        } else {
            $("#tab1 input[type=checkbox]").each(function () {
                $(this).prop("checked", false);
            });
        }
    });
});
$(".District").change(function(){
    var all = $('.District');
    if (all.length === all.filter(':checked').length) {
        $("#checkAll2").prop("checked", true);
    } else {
        $("#checkAll2").prop("checked", false);
    }
});


$(function () {
    $("#tab3 #checkAll3").click(function () {
        if ($("#tab3 #checkAll3").is(':checked')) {
            $("#tab3 input[type=checkbox]").each(function () {
                $(this).prop("checked", true);
            });
       
        } else {
            $("#tab1 input[type=checkbox]").each(function () {
                $(this).prop("checked", false);
            });
        }
    });
});
$(".City").change(function(){
    var all = $('.City');
    if (all.length === all.filter(':checked').length) {
        $("#checkAll3").prop("checked", true);
    } else {
        $("#checkAll3").prop("checked", false);
    }
});



$(function () {
    $("#tab4 #checkAll4").click(function () {
        if ($("#tab4 #checkAll4").is(':checked')) {
            $("#tab4 input[type=checkbox]").each(function () {
                $(this).prop("checked", true);
            });
       
        } else {
            $("#tab1 input[type=checkbox]").each(function () {
                $(this).prop("checked", false);
            });
        }
    });
});
$(".address_type").change(function(){
    var all = $('.address_type');
    if (all.length === all.filter(':checked').length) {
        $("#checkAll4").prop("checked", true);
    } else {
        $("#checkAll4").prop("checked", false);
    }
});


$(function () {
    $("#tab5 #checkAll5").click(function () {
        if ($("#tab5 #checkAll5").is(':checked')) {
            $("#tab5 input[type=checkbox]").each(function () {
                $(this).prop("checked", true);
            });
       
        } else {
            $("#tab1 input[type=checkbox]").each(function () {
                $(this).prop("checked", false);
            });
        }
    });
});
$(".location_type").change(function(){
    var all = $('.location_type');
    if (all.length === all.filter(':checked').length) {
        $("#checkAll5").prop("checked", true);
    } else {
        $("#checkAll5").prop("checked", false);
    }
});

$(function () {
    $("#tab6 #checkAll6").click(function () {
        if ($("#tab6 #checkAll6").is(':checked')) {
            $("#tab6 input[type=checkbox]").each(function () {
                $(this).prop("checked", true);
            });
       
        } else {
            $("#tab1 input[type=checkbox]").each(function () {
                $(this).prop("checked", false);
            });
        }
    });
});
$(".company_location").change(function(){
    var all = $('.company_location');
    if (all.length === all.filter(':checked').length) {
        $("#checkAll6").prop("checked", true);
    } else {
        $("#checkAll6").prop("checked", false);
    }
});



$(function () {
    $("#tab7 #checkAll7").click(function () {
        if ($("#tab7 #checkAll7").is(':checked')) {
            $("#tab7 input[type=checkbox]").each(function () {
                $(this).prop("checked", true);
            });
       
        } else {
            $("#tab1 input[type=checkbox]").each(function () {
                $(this).prop("checked", false);
            });
        }
    });
});
$(".head_office_detail").change(function(){
    var all = $('.head_office_detail');
    if (all.length === all.filter(':checked').length) {
        $("#checkAll7").prop("checked", true);
    } else {
        $("#checkAll7").prop("checked", false);
    }
});


$(function () {
    $("#tab8 #checkAll8").click(function () {
        if ($("#tab8 #checkAll8").is(':checked')) {
            $("#tab8 input[type=checkbox]").each(function () {
                $(this).prop("checked", true);
            });
       
        } else {
            $("#tab1 input[type=checkbox]").each(function () {
                $(this).prop("checked", false);
            });
        }
    });
});
$(".bank").change(function(){
    var all = $('.bank');
    if (all.length === all.filter(':checked').length) {
        $("#checkAll8").prop("checked", true);
    } else {
        $("#checkAll8").prop("checked", false);
    }
});


$(function () {
    $("#tab9 #checkAll9").click(function () {
        if ($("#tab9 #checkAll9").is(':checked')) {
            $("#tab9 input[type=checkbox]").each(function () {
                $(this).prop("checked", true);
            });
       
        } else {
            $("#tab1 input[type=checkbox]").each(function () {
                $(this).prop("checked", false);
            });
        }
    });
});
$(".bank_branch").change(function(){
    var all = $('.bank_branch');
    if (all.length === all.filter(':checked').length) {
        $("#checkAll9").prop("checked", true);
    } else {
        $("#checkAll9").prop("checked", false);
    }
});

$(function () {
    $("#tab10 #checkAll10").click(function () {
        if ($("#tab10 #checkAll10").is(':checked')) {
            $("#tab10 input[type=checkbox]").each(function () {
                $(this).prop("checked", true);
            });
       
        } else {
            $("#tab1 input[type=checkbox]").each(function () {
                $(this).prop("checked", false);
            });
        }
    });
});
$(".denomination").change(function(){
    var all = $('.denomination');
    if (all.length === all.filter(':checked').length) {
        $("#checkAll10").prop("checked", true);
    } else {
        $("#checkAll10").prop("checked", false);
    }
});


$(function () {
    $("#tab11 #checkAll11").click(function () {
        if ($("#tab11 #checkAll11").is(':checked')) {
            $("#tab11 input[type=checkbox]").each(function () {
                $(this).prop("checked", true);
            });
       
        } else {
            $("#tab1 input[type=checkbox]").each(function () {
                $(this).prop("checked", false);
            });
        }
    });
});
$(".account_type").change(function(){
    var all = $('.account_type');
    if (all.length === all.filter(':checked').length) {
        $("#checkAll11").prop("checked", true);
    } else {
        $("#checkAll11").prop("checked", false);
    }
});

$(function () {
    $("#tab12 #checkAll12").click(function () {
        if ($("#tab12 #checkAll12").is(':checked')) {
            $("#tab12 input[type=checkbox]").each(function () {
                $(this).prop("checked", true);
            });
       
        } else {
            $("#tab1 input[type=checkbox]").each(function () {
                $(this).prop("checked", false);
            });
        }
    });
});
$(".department").change(function(){
    var all = $('.department');
    if (all.length === all.filter(':checked').length) {
        $("#checkAll12").prop("checked", true);
    } else {
        $("#checkAll12").prop("checked", false);
    }
});


$(function () {
    $("#tab13 #checkAll13").click(function () {
        if ($("#tab13 #checkAll13").is(':checked')) {
            $("#tab13 input[type=checkbox]").each(function () {
                $(this).prop("checked", true);
            });
       
        } else {
            $("#tab1 input[type=checkbox]").each(function () {
                $(this).prop("checked", false);
            });
        }
    });
});
$(".designation").change(function(){
    var all = $('.designation');
    if (all.length === all.filter(':checked').length) {
        $("#checkAll13").prop("checked", true);
    } else {
        $("#checkAll13").prop("checked", false);
    }
});


$(function () {
    $("#tab14 #checkAll14").click(function () {
        if ($("#tab14 #checkAll14").is(':checked')) {
            $("#tab14 input[type=checkbox]").each(function () {
                $(this).prop("checked", true);
            });
       
        } else {
            $("#tab1 input[type=checkbox]").each(function () {
                $(this).prop("checked", false);
            });
        }
    });
});
$(".employee").change(function(){
    var all = $('.employee');
    if (all.length === all.filter(':checked').length) {
        $("#checkAll14").prop("checked", true);
    } else {
        $("#checkAll14").prop("checked", false);
    }
});

$(function () {
    $("#tab15 #checkAll15").click(function () {
        if ($("#tab15 #checkAll15").is(':checked')) {
            $("#tab15 input[type=checkbox]").each(function () {
                $(this).prop("checked", true);
            });
       
        } else {
            $("#tab1 input[type=checkbox]").each(function () {
                $(this).prop("checked", false);
            });
        }
    });
});
$(".user").change(function(){
    var all = $('.user');
    if (all.length === all.filter(':checked').length) {
        $("#checkAll15").prop("checked", true);
    } else {
        $("#checkAll15").prop("checked", false);
    }
});

$(function () {
    $("#tab16 #checkAll16").click(function () {
        if ($("#tab16 #checkAll16").is(':checked')) {
            $("#tab16 input[type=checkbox]").each(function () {
                $(this).prop("checked", true);
            });
       
        } else {
            $("#tab1 input[type=checkbox]").each(function () {
                $(this).prop("checked", false);
            });
        }
    });
});
$(".role").change(function(){
    var all = $('.role');
    if (all.length === all.filter(':checked').length) {
        $("#checkAll16").prop("checked", true);
    } else {
        $("#checkAll16").prop("checked", false);
    }
});

$(function () {
    $("#tab17 #checkAll17").click(function () {
        if ($("#tab17 #checkAll17").is(':checked')) {
            $("#tab17 input[type=checkbox]").each(function () {
                $(this).prop("checked", true);
            });
       
        } else {
            $("#tab1 input[type=checkbox]").each(function () {
                $(this).prop("checked", false);
            });
        }
    });
});
$(".gift_voucher").change(function(){
    var all = $('.gift_voucher');
    if (all.length === all.filter(':checked').length) {
        $("#checkAll17").prop("checked", true);
    } else {
        $("#checkAll17").prop("checked", false);
    }
});

$(function () {
    $("#tab18 #checkAll18").click(function () {
        if ($("#tab18 #checkAll18").is(':checked')) {
            $("#tab18 input[type=checkbox]").each(function () {
                $(this).prop("checked", true);
            });
       
        } else {
            $("#tab1 input[type=checkbox]").each(function () {
                $(this).prop("checked", false);
            });
        }
    });
});
$(".offers").change(function(){
    var all = $('.offers');
    if (all.length === all.filter(':checked').length) {
        $("#checkAll18").prop("checked", true);
    } else {
        $("#checkAll18").prop("checked", false);
    }
});


$(function () {
    $("#tab19 #checkAll19").click(function () {
        if ($("#tab19 #checkAll19").is(':checked')) {
            $("#tab19 input[type=checkbox]").each(function () {
                $(this).prop("checked", true);
            });
       
        } else {
            $("#tab1 input[type=checkbox]").each(function () {
                $(this).prop("checked", false);
            });
        }
    });
});
$(".category").change(function(){
    var all = $('.category');
    if (all.length === all.filter(':checked').length) {
        $("#checkAll19").prop("checked", true);
    } else {
        $("#checkAll19").prop("checked", false);
    }
});

$(function () {
    $("#tab20 #checkAll20").click(function () {
        if ($("#tab20 #checkAll20").is(':checked')) {
            $("#tab20 input[type=checkbox]").each(function () {
                $(this).prop("checked", true);
            });
       
        } else {
            $("#tab1 input[type=checkbox]").each(function () {
                $(this).prop("checked", false);
            });
        }
    });
});
$(".brand").change(function(){
    var all = $('.brand');
    if (all.length === all.filter(':checked').length) {
        $("#checkAll20").prop("checked", true);
    } else {
        $("#checkAll20").prop("checked", false);
    }
});


$(function () {
    $("#tab21 #checkAll21").click(function () {
        if ($("#tab21 #checkAll21").is(':checked')) {
            $("#tab21 input[type=checkbox]").each(function () {
                $(this).prop("checked", true);
            });
       
        } else {
            $("#tab1 input[type=checkbox]").each(function () {
                $(this).prop("checked", false);
            });
        }
    });
});
$(".language").change(function(){
    var all = $('.language');
    if (all.length === all.filter(':checked').length) {
        $("#checkAll21").prop("checked", true);
    } else {
        $("#checkAll21").prop("checked", false);
    }
});

$(function () {
    $("#tab22 #checkAll22").click(function () {
        if ($("#tab22 #checkAll22").is(':checked')) {
            $("#tab22 input[type=checkbox]").each(function () {
                $(this).prop("checked", true);
            });
       
        } else {
            $("#tab1 input[type=checkbox]").each(function () {
                $(this).prop("checked", false);
            });
        }
    });
});
$(".uom").change(function(){
    var all = $('.uom');
    if (all.length === all.filter(':checked').length) {
        $("#checkAll22").prop("checked", true);
    } else {
        $("#checkAll22").prop("checked", false);
    }
});

$(function () {
    $("#tab23 #checkAll23").click(function () {
        if ($("#tab23 #checkAll23").is(':checked')) {
            $("#tab23 input[type=checkbox]").each(function () {
                $(this).prop("checked", true);
            });
       
        } else {
            $("#tab1 input[type=checkbox]").each(function () {
                $(this).prop("checked", false);
            });
        }
    });
});
$(".tax").change(function(){
    var all = $('.tax');
    if (all.length === all.filter(':checked').length) {
        $("#checkAll23").prop("checked", true);
    } else {
        $("#checkAll23").prop("checked", false);
    }
});

$(function () {
    $("#tab24 #checkAll24").click(function () {
        if ($("#tab24 #checkAll24").is(':checked')) {
            $("#tab24 input[type=checkbox]").each(function () {
                $(this).prop("checked", true);
            });
       
        } else {
            $("#tab1 input[type=checkbox]").each(function () {
                $(this).prop("checked", false);
            });
        }
    });
});
$(".items").change(function(){
    var all = $('.items');
    if (all.length === all.filter(':checked').length) {
        $("#checkAll24").prop("checked", true);
    } else {
        $("#checkAll24").prop("checked", false);
    }
});

$(function () {
    $("#tab25 #checkAll25").click(function () {
        if ($("#tab25 #checkAll25").is(':checked')) {
            $("#tab25 input[type=checkbox]").each(function () {
                $(this).prop("checked", true);
            });
       
        } else {
            $("#tab1 input[type=checkbox]").each(function () {
                $(this).prop("checked", false);
            });
        }
    });
});
$(".item_tax_detail").change(function(){
    var all = $('.item_tax_detail');
    if (all.length === all.filter(':checked').length) {
        $("#checkAll25").prop("checked", true);
    } else {
        $("#checkAll25").prop("checked", false);
    }
});


$(function () {
    $("#tab26 #checkAll26").click(function () {
        if ($("#tab26 #checkAll26").is(':checked')) {
            $("#tab26 input[type=checkbox]").each(function () {
                $(this).prop("checked", true);
            });
       
        } else {
            $("#tab1 input[type=checkbox]").each(function () {
                $(this).prop("checked", false);
            });
        }
    });
});
$(".agent").change(function(){
    var all = $('.agent');
    if (all.length === all.filter(':checked').length) {
        $("#checkAll26").prop("checked", true);
    } else {
        $("#checkAll26").prop("checked", false);
    }
});

$(function () {
    $("#tab27 #checkAll27").click(function () {
        if ($("#tab27 #checkAll27").is(':checked')) {
            $("#tab27 input[type=checkbox]").each(function () {
                $(this).prop("checked", true);
            });
       
        } else {
            $("#tab1 input[type=checkbox]").each(function () {
                $(this).prop("checked", false);
            });
        }
    });
});
$(".customer").change(function(){
    var all = $('.customer');
    if (all.length === all.filter(':checked').length) {
        $("#checkAll27").prop("checked", true);
    } else {
        $("#checkAll27").prop("checked", false);
    }
});


$(function () {
    $("#tab28 #checkAll28").click(function () {
        if ($("#tab28 #checkAll28").is(':checked')) {
            $("#tab28 input[type=checkbox]").each(function () {
                $(this).prop("checked", true);
            });
       
        } else {
            $("#tab1 input[type=checkbox]").each(function () {
                $(this).prop("checked", false);
            });
        }
    });
});
$(".supplier").change(function(){
    var all = $('.supplier');
    if (all.length === all.filter(':checked').length) {
        $("#checkAll28").prop("checked", true);
    } else {
        $("#checkAll28").prop("checked", false);
    }
});

$(function () {
    $("#tab29 #checkAll29").click(function () {
        if ($("#tab29 #checkAll29").is(':checked')) {
            $("#tab29 input[type=checkbox]").each(function () {
                $(this).prop("checked", true);
            });
       
        } else {
            $("#tab1 input[type=checkbox]").each(function () {
                $(this).prop("checked", false);
            });
        }
    });
});
$(".salesman").change(function(){
    var all = $('.salesman');
    if (all.length === all.filter(':checked').length) {
        $("#checkAll29").prop("checked", true);
    } else {
        $("#checkAll29").prop("checked", false);
    }
});


$(function () {
    $("#tab30 #checkAll30").click(function () {
        if ($("#tab30 #checkAll30").is(':checked')) {
            $("#tab30 input[type=checkbox]").each(function () {
                $(this).prop("checked", true);
            });
       
        } else {
            $("#tab1 input[type=checkbox]").each(function () {
                $(this).prop("checked", false);
            });
        }
    });
});
$(".area").change(function(){
    var all = $('.area');
    if (all.length === all.filter(':checked').length) {
        $("#checkAll30").prop("checked", true);
    } else {
        $("#checkAll30").prop("checked", false);
    }
});

$(function () {
    $("#tab31 #checkAll31").click(function () {
        if ($("#tab31 #checkAll31").is(':checked')) {
            $("#tab31 input[type=checkbox]").each(function () {
                $(this).prop("checked", true);
            });
       
        } else {
            $("#tab1 input[type=checkbox]").each(function () {
                $(this).prop("checked", false);
            });
        }
    });
});
$(".account_group").change(function(){
    var all = $('.account_group');
    if (all.length === all.filter(':checked').length) {
        $("#checkAll31").prop("checked", true);
    } else {
        $("#checkAll31").prop("checked", false);
    }
});

$(function () {
    $("#tab32 #checkAll32").click(function () {
        if ($("#tab32 #checkAll32").is(':checked')) {
            $("#tab32 input[type=checkbox]").each(function () {
                $(this).prop("checked", true);
            });
       
        } else {
            $("#tab1 input[type=checkbox]").each(function () {
                $(this).prop("checked", false);
            });
        }
    });
});
$(".account_head").change(function(){
    var all = $('.account_head');
    if (all.length === all.filter(':checked').length) {
        $("#checkAll32").prop("checked", true);
    } else {
        $("#checkAll32").prop("checked", false);
    }
});

$(function () {
    $("#tab33 #checkAll33").click(function () {
        if ($("#tab33 #checkAll33").is(':checked')) {
            $("#tab33 input[type=checkbox]").each(function () {
                $(this).prop("checked", true);
            });
       
        } else {
            $("#tab1 input[type=checkbox]").each(function () {
                $(this).prop("checked", false);
            });
        }
    });
});
$(".tax_for_account_grp").change(function(){
    var all = $('.tax_for_account_grp');
    if (all.length === all.filter(':checked').length) {
        $("#checkAll33").prop("checked", true);
    } else {
        $("#checkAll33").prop("checked", false);
    }
});


$(function () {
    $("#tab34 #checkAll34").click(function () {
        if ($("#tab34 #checkAll34").is(':checked')) {
            $("#tab34 input[type=checkbox]").each(function () {
                $(this).prop("checked", true);
            });
       
        } else {
            $("#tab1 input[type=checkbox]").each(function () {
                $(this).prop("checked", false);
            });
        }
    });
});
$(".estimation").change(function(){
    var all = $('.estimation');
    if (all.length === all.filter(':checked').length) {
        $("#checkAll34").prop("checked", true);
    } else {
        $("#checkAll34").prop("checked", false);
    }
});


$(function () {
    $("#tab35 #checkAll35").click(function () {
        if ($("#tab35 #checkAll35").is(':checked')) {
            $("#tab35 input[type=checkbox]").each(function () {
                $(this).prop("checked", true);
            });
       
        } else {
            $("#tab1 input[type=checkbox]").each(function () {
                $(this).prop("checked", false);
            });
        }
    });
});
$(".purchase").change(function(){
    var all = $('.purchase');
    if (all.length === all.filter(':checked').length) {
        $("#checkAll35").prop("checked", true);
    } else {
        $("#checkAll35").prop("checked", false);
    }
});

$(function () {
    $("#tab36 #checkAll36").click(function () {
        if ($("#tab36 #checkAll36").is(':checked')) {
            $("#tab36 input[type=checkbox]").each(function () {
                $(this).prop("checked", true);
            });
       
        } else {
            $("#tab1 input[type=checkbox]").each(function () {
                $(this).prop("checked", false);
            });
        }
    });
});
$(".receipt_note").change(function(){
    var all = $('.receipt_note');
    if (all.length === all.filter(':checked').length) {
        $("#checkAll36").prop("checked", true);
    } else {
        $("#checkAll36").prop("checked", false);
    }
});


$(function () {
    $("#tab37 #checkAll37").click(function () {
        if ($("#tab37 #checkAll37").is(':checked')) {
            $("#tab37 input[type=checkbox]").each(function () {
                $(this).prop("checked", true);
            });
       
        } else {
            $("#tab1 input[type=checkbox]").each(function () {
                $(this).prop("checked", false);
            });
        }
    });
});
$(".purchase_entry").change(function(){
    var all = $('.purchase_entry');
    if (all.length === all.filter(':checked').length) {
        $("#checkAll37").prop("checked", true);
    } else {
        $("#checkAll37").prop("checked", false);
    }
});


$(function () {
    $("#tab38 #checkAll38").click(function () {
        if ($("#tab38 #checkAll38").is(':checked')) {
            $("#tab38 input[type=checkbox]").each(function () {
                $(this).prop("checked", true);
            });
       
        } else {
            $("#tab1 input[type=checkbox]").each(function () {
                $(this).prop("checked", false);
            });
        }
    });
});
$(".rejection_out").change(function(){
    var all = $('.rejection_out');
    if (all.length === all.filter(':checked').length) {
        $("#checkAll38").prop("checked", true);
    } else {
        $("#checkAll38").prop("checked", false);
    }
});

$(function () {
    $("#tab39 #checkAll39").click(function () {
        if ($("#tab39 #checkAll39").is(':checked')) {
            $("#tab39 input[type=checkbox]").each(function () {
                $(this).prop("checked", true);
            });
       
        } else {
            $("#tab1 input[type=checkbox]").each(function () {
                $(this).prop("checked", false);
            });
        }
    });
});
$(".purchase_gate_entry").change(function(){
    var all = $('.purchase_gate_entry');
    if (all.length === all.filter(':checked').length) {
        $("#checkAll39").prop("checked", true);
    } else {
        $("#checkAll39").prop("checked", false);
    }
});


$(function () {
    $("#tab40 #checkAll40").click(function () {
        if ($("#tab40 #checkAll40").is(':checked')) {
            $("#tab40 input[type=checkbox]").each(function () {
                $(this).prop("checked", true);
            });
       
        } else {
            $("#tab1 input[type=checkbox]").each(function () {
                $(this).prop("checked", false);
            });
        }
    });
});
$(".debit_note").change(function(){
    var all = $('.debit_note');
    if (all.length === all.filter(':checked').length) {
        $("#checkAll40").prop("checked", true);
    } else {
        $("#checkAll40").prop("checked", false);
    }
});

$(function () {
    $("#tab41 #checkAll41").click(function () {
        if ($("#tab41 #checkAll41").is(':checked')) {
            $("#tab41 input[type=checkbox]").each(function () {
                $(this).prop("checked", true);
            });
       
        } else {
            $("#tab1 input[type=checkbox]").each(function () {
                $(this).prop("checked", false);
            });
        }
    });
});
$(".sales_estimation").change(function(){
    var all = $('.sales_estimation');
    if (all.length === all.filter(':checked').length) {
        $("#checkAll41").prop("checked", true);
    } else {
        $("#checkAll41").prop("checked", false);
    }
});

$(function () {
    $("#tab42 #checkAll42").click(function () {
        if ($("#tab42 #checkAll42").is(':checked')) {
            $("#tab42 input[type=checkbox]").each(function () {
                $(this).prop("checked", true);
            });
       
        } else {
            $("#tab1 input[type=checkbox]").each(function () {
                $(this).prop("checked", false);
            });
        }
    });
});
$(".sales_order").change(function(){
    var all = $('.sales_order');
    if (all.length === all.filter(':checked').length) {
        $("#checkAll42").prop("checked", true);
    } else {
        $("#checkAll42").prop("checked", false);
    }
});

$(function () {
    $("#tab43 #checkAll43").click(function () {
        if ($("#tab43 #checkAll43").is(':checked')) {
            $("#tab43 input[type=checkbox]").each(function () {
                $(this).prop("checked", true);
            });
       
        } else {
            $("#tab1 input[type=checkbox]").each(function () {
                $(this).prop("checked", false);
            });
        }
    });
});
$(".delivery_notes").change(function(){
    var all = $('.delivery_notes');
    if (all.length === all.filter(':checked').length) {
        $("#checkAll43").prop("checked", true);
    } else {
        $("#checkAll43").prop("checked", false);
    }
});


$(function () {
    $("#tab44 #checkAll44").click(function () {
        if ($("#tab44 #checkAll44").is(':checked')) {
            $("#tab44 input[type=checkbox]").each(function () {
                $(this).prop("checked", true);
            });
       
        } else {
            $("#tab1 input[type=checkbox]").each(function () {
                $(this).prop("checked", false);
            });
        }
    });
});
$(".sales_entry").change(function(){
    var all = $('.sales_entry');
    if (all.length === all.filter(':checked').length) {
        $("#checkAll44").prop("checked", true);
    } else {
        $("#checkAll44").prop("checked", false);
    }
});

$(function () {
    $("#tab45 #checkAll45").click(function () {
        if ($("#tab45 #checkAll45").is(':checked')) {
            $("#tab45 input[type=checkbox]").each(function () {
                $(this).prop("checked", true);
            });
       
        } else {
            $("#tab1 input[type=checkbox]").each(function () {
                $(this).prop("checked", false);
            });
        }
    });
});
$(".rejection_in").change(function(){
    var all = $('.rejection_in');
    if (all.length === all.filter(':checked').length) {
        $("#checkAll45").prop("checked", true);
    } else {
        $("#checkAll45").prop("checked", false);
    }
});


$(function () {
    $("#tab46 #checkAll46").click(function () {
        if ($("#tab46 #checkAll46").is(':checked')) {
            $("#tab46 input[type=checkbox]").each(function () {
                $(this).prop("checked", true);
            });
       
        } else {
            $("#tab1 input[type=checkbox]").each(function () {
                $(this).prop("checked", false);
            });
        }
    });
});
$(".sales_gate_entry").change(function(){
    var all = $('.sales_gate_entry');
    if (all.length === all.filter(':checked').length) {
        $("#checkAll46").prop("checked", true);
    } else {
        $("#checkAll46").prop("checked", false);
    }
});

$(function () {
    $("#tab47 #checkAll47").click(function () {
        if ($("#tab47 #checkAll47").is(':checked')) {
            $("#tab47 input[type=checkbox]").each(function () {
                $(this).prop("checked", true);
            });
       
        } else {
            $("#tab1 input[type=checkbox]").each(function () {
                $(this).prop("checked", false);
            });
        }
    });
});
$(".credit_note").change(function(){
    var all = $('.credit_note');
    if (all.length === all.filter(':checked').length) {
        $("#checkAll47").prop("checked", true);
    } else {
        $("#checkAll47").prop("checked", false);
    }
});


$(function () {
    $("#tab48 #checkAll48").click(function () {
        if ($("#tab48 #checkAll48").is(':checked')) {
            $("#tab48 input[type=checkbox]").each(function () {
                $(this).prop("checked", true);
            });
       
        } else {
            $("#tab1 input[type=checkbox]").each(function () {
                $(this).prop("checked", false);
            });
        }
    });
});
$(".payment_request").change(function(){
    var all = $('.payment_request');
    if (all.length === all.filter(':checked').length) {
        $("#checkAll48").prop("checked", true);
    } else {
        $("#checkAll48").prop("checked", false);
    }
});


$(function () {
    $("#tab49 #checkAll49").click(function () {
        if ($("#tab49 #checkAll49").is(':checked')) {
            $("#tab49 input[type=checkbox]").each(function () {
                $(this).prop("checked", true);
            });
       
        } else {
            $("#tab1 input[type=checkbox]").each(function () {
                $(this).prop("checked", false);
            });
        }
    });
});
$(".payment_process").change(function(){
    var all = $('.payment_process');
    if (all.length === all.filter(':checked').length) {
        $("#checkAll49").prop("checked", true);
    } else {
        $("#checkAll49").prop("checked", false);
    }
});

$(function () {
    $("#tab50 #checkAll50").click(function () {
        if ($("#tab50 #checkAll50").is(':checked')) {
            $("#tab50 input[type=checkbox]").each(function () {
                $(this).prop("checked", true);
            });
       
        } else {
            $("#tab1 input[type=checkbox]").each(function () {
                $(this).prop("checked", false);
            });
        }
    });
});
$(".payment_expense").change(function(){
    var all = $('.payment_expense');
    if (all.length === all.filter(':checked').length) {
        $("#checkAll50").prop("checked", true);
    } else {
        $("#checkAll50").prop("checked", false);
    }
});

$(function () {
    $("#tab51 #checkAll51").click(function () {
        if ($("#tab51 #checkAll51").is(':checked')) {
            $("#tab51 input[type=checkbox]").each(function () {
                $(this).prop("checked", true);
            });
       
        } else {
            $("#tab1 input[type=checkbox]").each(function () {
                $(this).prop("checked", false);
            });
        }
    });
});
$(".receipt_request").change(function(){
    var all = $('.receipt_request');
    if (all.length === all.filter(':checked').length) {
        $("#checkAll51").prop("checked", true);
    } else {
        $("#checkAll51").prop("checked", false);
    }
});

$(function () {
    $("#tab52 #checkAll52").click(function () {
        if ($("#tab52 #checkAll52").is(':checked')) {
            $("#tab52 input[type=checkbox]").each(function () {
                $(this).prop("checked", true);
            });
       
        } else {
            $("#tab1 input[type=checkbox]").each(function () {
                $(this).prop("checked", false);
            });
        }
    });
});
$(".receipt_process").change(function(){
    var all = $('.receipt_process');
    if (all.length === all.filter(':checked').length) {
        $("#checkAll52").prop("checked", true);
    } else {
        $("#checkAll52").prop("checked", false);
    }
});


$(function () {
    $("#tab53 #checkAll53").click(function () {
        if ($("#tab53 #checkAll53").is(':checked')) {
            $("#tab53 input[type=checkbox]").each(function () {
                $(this).prop("checked", true);
            });
       
        } else {
            $("#tab1 input[type=checkbox]").each(function () {
                $(this).prop("checked", false);
            });
        }
    });
});
$(".payment_expense").change(function(){
    var all = $('.payment_expense');
    if (all.length === all.filter(':checked').length) {
        $("#checkAll53").prop("checked", true);
    } else {
        $("#checkAll53").prop("checked", false);
    }
});

$(function () {
    $("#tab54 #checkAll54").click(function () {
        if ($("#tab54 #checkAll54").is(':checked')) {
            $("#tab54 input[type=checkbox]").each(function () {
                $(this).prop("checked", true);
            });
       
        } else {
            $("#tab1 input[type=checkbox]").each(function () {
                $(this).prop("checked", false);
            });
        }
    });
});
$(".payment_advance").change(function(){
    var all = $('.payment_advance');
    if (all.length === all.filter(':checked').length) {
        $("#checkAll54").prop("checked", true);
    } else {
        $("#checkAll54").prop("checked", false);
    }
});

$(function () {
    $("#tab55 #checkAll55").click(function () {
        if ($("#tab55 #checkAll55").is(':checked')) {
            $("#tab55 input[type=checkbox]").each(function () {
                $(this).prop("checked", true);
            });
       
        } else {
            $("#tab1 input[type=checkbox]").each(function () {
                $(this).prop("checked", false);
            });
        }
    });
});
$(".receipt_advance").change(function(){
    var all = $('.receipt_advance');
    if (all.length === all.filter(':checked').length) {
        $("#checkAll55").prop("checked", true);
    } else {
        $("#checkAll55").prop("checked", false);
    }
});

$(function () {
    $("#tab56 #checkAll56").click(function () {
        if ($("#tab56 #checkAll56").is(':checked')) {
            $("#tab56 input[type=checkbox]").each(function () {
                $(this).prop("checked", true);
            });
       
        } else {
            $("#tab1 input[type=checkbox]").each(function () {
                $(this).prop("checked", false);
            });
        }
    });
});
$(".account_expense").change(function(){
    var all = $('.account_expense');
    if (all.length === all.filter(':checked').length) {
        $("#checkAll56").prop("checked", true);
    } else {
        $("#checkAll56").prop("checked", false);
    }
});

$(function () {
    $("#tab57 #checkAll57").click(function () {
        if ($("#tab57 #checkAll57").is(':checked')) {
            $("#tab57 input[type=checkbox]").each(function () {
                $(this).prop("checked", true);
            });
       
        } else {
            $("#tab1 input[type=checkbox]").each(function () {
                $(this).prop("checked", false);
            });
        }
    });
});
$(".price_updation").change(function(){
    var all = $('.price_updation');
    if (all.length === all.filter(':checked').length) {
        $("#checkAll57").prop("checked", true);
    } else {
        $("#checkAll57").prop("checked", false);
    }
});


$(function () {
    $("#tab58 #checkAll58").click(function () {
        if ($("#tab58 #checkAll58").is(':checked')) {
            $("#tab58 input[type=checkbox]").each(function () {
                $(this).prop("checked", true);
            });
       
        } else {
            $("#tab1 input[type=checkbox]").each(function () {
                $(this).prop("checked", false);
            });
        }
    });
});
$(".receivables").change(function(){
    var all = $('.receivables');
    if (all.length === all.filter(':checked').length) {
        $("#checkAll58").prop("checked", true);
    } else {
        $("#checkAll58").prop("checked", false);
    }
});


$(function () {
    $("#tab59 #checkAll59").click(function () {
        if ($("#tab59 #checkAll59").is(':checked')) {
            $("#tab59 input[type=checkbox]").each(function () {
                $(this).prop("checked", true);
            });
       
        } else {
            $("#tab1 input[type=checkbox]").each(function () {
                $(this).prop("checked", false);
            });
        }
    });
});
$(".payables").change(function(){
    var all = $('.payables');
    if (all.length === all.filter(':checked').length) {
        $("#checkAll59").prop("checked", true);
    } else {
        $("#checkAll59").prop("checked", false);
    }
});


// $(function () {
    // $("#tab60 #checkAll60").click(function () {
        // if ($("#tab60 #checkAll60").is(':checked')) {
            // $("#tab60 input[type=checkbox]").each(function () {
                // $(this).prop("checked", true);
            // });
       
        // } else {
            // $("#tab1 input[type=checkbox]").each(function () {
                // $(this).prop("checked", false);
            // });
        // }
    // });
// });
// $(".payables").change(function(){
    // var all = $('.payables');
    // if (all.length === all.filter(':checked').length) {
        // $("#checkAll60").prop("checked", true);
    // } else {
        // $("#checkAll60").prop("checked", false);
    // }
// });


// $(function () {
    // $("#tab61 #checkAll61").click(function () {
        // if ($("#tab61 #checkAll61").is(':checked')) {
            // $("#tab61 input[type=checkbox]").each(function () {
                // $(this).prop("checked", true);
            // });
       
        // } else {
            // $("#tab1 input[type=checkbox]").each(function () {
                // $(this).prop("checked", false);
            // });
        // }
    // });
// });
// $(".receivables").change(function(){
    // var all = $('.receivables');
    // if (all.length === all.filter(':checked').length) {
        // $("#checkAll61").prop("checked", true);
    // } else {
        // $("#checkAll61").prop("checked", false);
    // }
// });


// $(function () {
    // $("#tab62 #checkAll62").click(function () {
        // if ($("#tab62 #checkAll62").is(':checked')) {
            // $("#tab62 input[type=checkbox]").each(function () {
                // $(this).prop("checked", true);
            // });
       
        // } else {
            // $("#tab1 input[type=checkbox]").each(function () {
                // $(this).prop("checked", false);
            // });
        // }
    // });
// });
// $(".bank").change(function(){
    // var all = $('.bank');
    // if (all.length === all.filter(':checked').length) {
        // $("#checkAll62").prop("checked", true);
    // } else {
        // $("#checkAll62").prop("checked", false);
    // }
// });

// $(function () {
    // $("#tab63 #checkAll63").click(function () {
        // if ($("#tab63 #checkAll63").is(':checked')) {
            // $("#tab63 input[type=checkbox]").each(function () {
                // $(this).prop("checked", true);
            // });
       
        // } else {
            // $("#tab1 input[type=checkbox]").each(function () {
                // $(this).prop("checked", false);
            // });
        // }
    // });
// });
// $(".bank").change(function(){
    // var all = $('.bank');
    // if (all.length === all.filter(':checked').length) {
        // $("#checkAll63").prop("checked", true);
    // } else {
        // $("#checkAll63").prop("checked", false);
    // }
// });

// $(function () {
    // $("#tab64 #checkAll64").click(function () {
        // if ($("#tab64 #checkAll64").is(':checked')) {
            // $("#tab64 input[type=checkbox]").each(function () {
                // $(this).prop("checked", true);
            // });
       
        // } else {
            // $("#tab1 input[type=checkbox]").each(function () {
                // $(this).prop("checked", false);
            // });
        // }
    // });
// });
// $(".bank").change(function(){
    // var all = $('.bank');
    // if (all.length === all.filter(':checked').length) {
        // $("#checkAll64").prop("checked", true);
    // } else {
        // $("#checkAll64").prop("checked", false);
    // }
// });

// $(function () {
    // $("#tab65 #checkAll65").click(function () {
        // if ($("#tab65 #checkAll65").is(':checked')) {
            // $("#tab65 input[type=checkbox]").each(function () {
                // $(this).prop("checked", true);
            // });
       
        // } else {
            // $("#tab1 input[type=checkbox]").each(function () {
                // $(this).prop("checked", false);
            // });
        // }
    // });
// });
// $(".bank").change(function(){
    // var all = $('.bank');
    // if (all.length === all.filter(':checked').length) {
        // $("#checkAll65").prop("checked", true);
    // } else {
        // $("#checkAll65").prop("checked", false);
    // }
// });
});

$(document).ready(function(){
	var mas_id = $("#masters_head");
    $('#masters_head').change(function(){
        if(this.checked)
            $('#masters_div').fadeIn('slow');
        else
            $('#masters_div').fadeOut('slow');

    });
});

$(document).ready(function(){
	var mas_id = $("#transaction_management");
    $('#transaction_management').change(function(){
        if(this.checked)
            $('#transaction_management_div').fadeIn('slow');
        else
            $('#transaction_management_div').fadeOut('slow');

    });
});

$(document).ready(function(){
	var mas_id = $("#prize_updation");
    $('#prize_updation').change(function(){
        if(this.checked)
            $('#prize_updation_div').fadeIn('slow');
        else
            $('#prize_updation_div').fadeOut('slow');

    });
});

$(document).ready(function(){
	var mas_id = $("#outstanding");
    $('#outstanding').change(function(){
        if(this.checked)
            $('#outstanding_div').fadeIn('slow');
        else
            $('#outstanding_div').fadeOut('slow');

    });
});

$(document).ready(function(){
	var mas_id = $("#reports");
    $('#reports').change(function(){
        if(this.checked)
            $('#reports_div').fadeIn('slow');
        else
            $('#reports_div').fadeOut('slow');

    });
});

$(document).ready(function(){
	var mas_id = $("#pos");
    $('#pos').change(function(){
        if(this.checked)
            $('#pos_div').fadeIn('slow');
        else
            $('#pos_div').fadeOut('slow');

    });
});

$(document).ready(function(){
	var mas_id = $("#settings");
    $('#settings').change(function(){
        if(this.checked)
            $('#settings_div').fadeIn('slow');
        else
            $('#settings_div').fadeOut('slow');

    });
});

$(document).ready(function(){
	var mas_id = $("#report_head_coll");
    $('#report_head_coll').change(function(){
        if(this.checked)
            $('#report_div_coll').fadeIn('slow');
        else
            $('#report_div_coll').fadeOut('slow');

    });
});

$(document).ready(function(){
	var mas_id = $("#report_head_trans");
    $('#report_head_trans').change(function(){
        if(this.checked)
            $('#report_div_trans').fadeIn('slow');
        else
            $('#report_div_trans').fadeOut('slow');

    });
});

$(document).ready(function(){
	var mas_id = $("#report_head_enrl");
    $('#report_head_enrl').change(function(){
        if(this.checked)
            $('#report_div_enrl').fadeIn('slow');
        else
            $('#report_div_enrl').fadeOut('slow');

    });
});

$(document).ready(function(){
	var mas_id = $("#report_head_ho");
    $('#report_head_ho').change(function(){
        if(this.checked)
            $('#report_div_ho').fadeIn('slow');
        else
            $('#report_div_ho').fadeOut('slow');

    });
});


$(document).ready(function(){
	var mas_id = $("#trans_head");
    $('#trans_head').change(function(){
        if(this.checked)
            $('#trans_div').fadeIn('slow');
        else
            $('#trans_div').fadeOut('slow');

    });
});

$(document).ready(function(){
	var mas_id = $("#report_head");
    $('#report_head').change(function(){
        if(this.checked)
            $('#report_div').fadeIn('slow');
        else
            $('#report_div').fadeOut('slow');

    });
});

$(document).ready(function(){
	var mas_id = $("#lead_head");
    $('#lead_head').change(function(){
        if(this.checked)
            $('#lead_div').fadeIn('slow');
        else
            $('#lead_div').fadeOut('slow');

    });
});
</script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ns_pollachi\resources\views/admin/master/role/add.blade.php ENDPATH**/ ?>