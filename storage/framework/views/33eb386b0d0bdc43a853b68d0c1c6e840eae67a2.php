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
                  <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <option value="<?php echo e($value->id); ?>" <?php echo e(old('role_id') == $value->id ? 'selected' : ''); ?> ><?php echo e($value->name); ?></option>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
								<input type="checkbox" name="checkAll" id="checkAll"/></label>
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
							    <input type="checkbox" name="checkAll1" id="checkAll1"/></label>
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
                                <input type="checkbox" name="checkAll2" id="checkAll2"/></label>
								<label class="control-label">Select All</label>
								<br>							
								<input type="checkbox" value="c1" class="City masters" id="scheme" name="permission[]"/></label>
								<label class="control-label">City</label>
								<br>
						 		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="c2" class="City_scheme masters" id="City_add" name="permission[]"/></label>
								<span class="control-label">Add</span>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="c3" class="City_scheme masters" id="City_edit" name="permission[]"/></label>
								<span class="control-label">Edit</span>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="c4" class="City_scheme masters" id="City_delete" name="permission[]"/></label>
								<span class="control-label">Delete</span>
							</div>	
									</div>
									
								
								
								
								
								<div class="col-lg-2">
										<div class="" id="tab5">	
							    <input type="checkbox" name="checkAll1" id="checkAll1"/></label>
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
							    <input type="checkbox" name="checkAll1" id="checkAll1"/></label>
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
										<div class="" id="tab5">	
							    <input type="checkbox" name="checkAll1" id="checkAll1"/></label>
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
										<div class="" id="tab5">	
							    <input type="checkbox" name="checkAll1" id="checkAll1"/></label>
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
							<input type="checkbox" name="checkAll" id="checkAll"/></label>
								<label class="control-label"><b>Bank</b></label>
								<div class="row">
									<div class="col-lg-2">
										<div class="" id="tab1">		
								<input type="checkbox" name="checkAll" id="checkAll"/></label>
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
										<div class="" id="tab2">	
							    <input type="checkbox" name="checkAll1" id="checkAll1"/></label>
								<label class="control-label">Select All</label>
								<br>
								<input type="checkbox" value="i1" class="bank masters" id="branch" name="permission[]"/></label>
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
											<div class="" id="tab3">
                                <input type="checkbox" name="checkAll2" id="checkAll2"/></label>
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
										<div class="" id="tab5">	
							    <input type="checkbox" name="checkAll1" id="checkAll1"/></label>
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
							<input type="checkbox" name="checkAll" id="checkAll"/></label>
								<label class="control-label"><b>Employee</b></label>
								<div class="row">
									<div class="col-lg-2">
										<div class="" id="tab1">		
								<input type="checkbox" name="checkAll" id="checkAll"/></label>
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
										<div class="" id="tab2">	
							    <input type="checkbox" name="checkAll1" id="checkAll1"/></label>
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
											<div class="" id="tab3">
                                <input type="checkbox" name="checkAll2" id="checkAll2"/></label>
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
							<input type="checkbox" name="checkAll" id="checkAll"/></label>
								<label class="control-label"><b>User</b></label>
								<div class="row">
									<div class="col-lg-2">
										<div class="" id="tab1">		
								<input type="checkbox" name="checkAll" id="checkAll"/></label>
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
										<div class="" id="tab2">	
							    <input type="checkbox" name="checkAll1" id="checkAll1"/></label>
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
							<input type="checkbox" name="checkAll" id="checkAll"/></label>
								<label class="control-label"><b>Accounts</b></label>
								<div class="row">
									<div class="col-lg-2">
										<div class="" id="tab1">		
								<input type="checkbox" name="checkAll" id="checkAll"/></label>
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
										<div class="" id="tab2">	
							    <input type="checkbox" name="checkAll1" id="checkAll1"/></label>
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
							<input type="checkbox" name="checkAll" id="checkAll"/></label>
								<label class="control-label"><b>Category</b></label>
								<div class="row">
									<div class="col-lg-2">
										<div class="" id="tab1">		
								<input type="checkbox" name="checkAll" id="checkAll"/></label>
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
										<div class="" id="tab2">	
							    <input type="checkbox" name="checkAll1" id="checkAll1"/></label>
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
										<div class="" id="tab1">		
								<input type="checkbox" name="checkAll" id="checkAll"/></label>
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
										<div class="" id="tab1">		
								<input type="checkbox" name="checkAll" id="checkAll"/></label>
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
										<div class="" id="tab1">		
								<input type="checkbox" name="checkAll" id="checkAll"/></label>
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
										<div class="" id="tab1">		
								<input type="checkbox" name="checkAll" id="checkAll"/></label>
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
										<div class="" id="tab1">		
								<input type="checkbox" name="checkAll" id="checkAll"/></label>
								<label class="control-label">Select All</label>
								<br>
								<input type="checkbox" value="y1" class="items masters"  id="zone" name="permission[]"/></label>
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
							<input type="checkbox" name="checkAll" id="checkAll"/></label>
								<label class="control-label"><b>Vendor</b></label>
								<div class="row">
									<div class="col-lg-2">
										<div class="" id="tab1">		
								<input type="checkbox" name="checkAll" id="checkAll"/></label>
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
										<div class="" id="tab1">		
								<input type="checkbox" name="checkAll" id="checkAll"/></label>
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
										<div class="" id="tab1">		
								<input type="checkbox" name="checkAll" id="checkAll"/></label>
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
										<div class="" id="tab1">		
								<input type="checkbox" name="checkAll" id="checkAll"/></label>
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
										<div class="" id="tab1">		
								<input type="checkbox" name="checkAll" id="checkAll"/></label>
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
										<div class="" id="tab1">		
								<input type="checkbox" name="checkAll" id="checkAll"/></label>
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
										<div class="" id="tab1">		
								<input type="checkbox" name="checkAll" id="checkAll"/></label>
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
										<div class="" id="tab1">		
								<input type="checkbox" name="checkAll" id="checkAll"/></label>
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
							<input type="checkbox" name="checkAll" id="checkAll"/></label>
								<label class="control-label"><b>Purchase</b></label>
								<div class="row">
									<div class="col-lg-2">
										<div class="" id="tab1">		
								<input type="checkbox" name="checkAll" id="checkAll"/></label>
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
										<div class="" id="tab1">		
								<input type="checkbox" name="checkAll" id="checkAll"/></label>
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
										<div class="" id="tab1">		
								<input type="checkbox" name="checkAll" id="checkAll"/></label>
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
										<div class="" id="tab1">		
								<input type="checkbox" name="checkAll" id="checkAll"/></label>
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
										<div class="" id="tab1">		
								<input type="checkbox" name="checkAll" id="checkAll"/></label>
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
										<div class="" id="tab1">		
								<input type="checkbox" name="checkAll" id="checkAll"/></label>
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
										<div class="" id="tab1">		
								<input type="checkbox" name="checkAll" id="checkAll"/></label>
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
										<div class="" id="tab1">		
								<input type="checkbox" name="checkAll" id="checkAll"/></label>
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
										<div class="" id="tab1">		
								<input type="checkbox" name="checkAll" id="checkAll"/></label>
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
										<div class="" id="tab1">		
								<input type="checkbox" name="checkAll" id="checkAll"/></label>
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
										<div class="" id="tab1">		
								<input type="checkbox" name="checkAll" id="checkAll"/></label>
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
										<div class="" id="tab1">		
								<input type="checkbox" name="checkAll" id="checkAll"/></label>
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
										<div class="" id="tab1">		
								<input type="checkbox" name="checkAll" id="checkAll"/></label>
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
										<div class="" id="tab1">		
								<input type="checkbox" name="checkAll" id="checkAll"/></label>
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
										<div class="" id="tab1">		
								<input type="checkbox" name="checkAll" id="checkAll"/></label>
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
										<div class="" id="tab1">		
								<input type="checkbox" name="checkAll" id="checkAll"/></label>
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
										<div class="" id="tab1">		
								<input type="checkbox" name="checkAll" id="checkAll"/></label>
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
										<div class="" id="tab1">		
								<input type="checkbox" name="checkAll" id="checkAll"/></label>
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
										<div class="" id="tab1">		
								<input type="checkbox" name="checkAll" id="checkAll"/></label>
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
										<div class="" id="tab1">		
								<input type="checkbox" name="checkAll" id="checkAll"/></label>
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
										<div class="" id="tab1">		
								<input type="checkbox" name="checkAll" id="checkAll"/></label>
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
										<div class="" id="tab1">		
								<input type="checkbox" name="checkAll" id="checkAll"/></label>
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
										<div class="" id="tab1">		
								<input type="checkbox" name="checkAll" id="checkAll"/></label>
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
										<div class="" id="tab1">		
								<input type="checkbox" name="checkAll" id="checkAll"/></label>
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
										<div class="" id="tab1">		
								<input type="checkbox" name="checkAll" id="checkAll"/></label>
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
										<div class="" id="tab1">		
								<input type="checkbox" name="checkAll" id="checkAll"/></label>
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
							 <input type="checkbox" name="checkAll" id="checkAll"/></label>
								<label class="control-label"><b>Selling Price</b></label>
								<div class="row">
									<div class="col-lg-3">
										<div class="" id="tab1">		
								
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
							<input type="checkbox" name="checkAll" id="checkAll"/></label>
								<label class="control-label"><b>POS</b></label>
								<div class="row">
									<div class="col-lg-3">
										<div class="" id="tab1">		
								
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
							<input type="checkbox" name="checkAll" id="checkAll"/></label>
								<label class="control-label"><b>Day Book</b></label>
								<div class="row">
									<div class="col-lg-2">
										<div class="" id="tab1">		
								
								<input type="checkbox" value="lll1" class="bank masters"  id="zone" name="permission[]"/></label>
								<label class="control-label">Day Book</label>
							</div>	
									</div>
								</div>
								
							</div>	</br></br></br>
							
							<div class="container">
							<input type="checkbox" name="checkAll" id="checkAll"/></label>
								<label class="control-label"><b>Stock Report</b></label>
								<div class="row">
									<div class="col-lg-3">
										<div class="" id="tab1">		
								
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
							<input type="checkbox" name="checkAll" id="checkAll"/></label>
								<label class="control-label"><b>Individual Report</b></label>
								<div class="row">
									<div class="col-lg-2">
										<div class="" id="tab1">		
								
								<input type="checkbox" value="ppp1" class="bank masters"  id="zone" name="permission[]"/></label>
								<label class="control-label">Individual Report</label>
							</div>	
									</div>
								</div>
								
							</div>	</br></br></br>
                         
						 <div class="container">
							<input type="checkbox" name="checkAll" id="checkAll"/></label>
								<label class="control-label"><b>GST Report</b></label>
								<div class="row">
									<div class="col-lg-2">
										<div class="" id="tab1">		
								
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
    $("#tab1 #checkAll").click(function () {
        if ($("#tab1 #checkAll").is(':checked')) {
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
$(".child_zone").change(function(){
    var all = $('.child_zone');
    if (all.length === all.filter(':checked').length) {
        $("#checkAll").prop("checked", true);
    } else {
        $("#checkAll").prop("checked", false);
    }
});

$(function () {
    $("#tab2 #checkAll1").click(function () {
        if ($("#tab2 #checkAll1").is(':checked')) {
            $("#tab2 input[type=checkbox]").each(function () {
                $(this).prop("checked", true);
            });
       
        } else {
            $("#tab2 input[type=checkbox]").each(function () {
                $(this).prop("checked", false);
            });
        }
    });
});
$(".child_branch").change(function(){
    var all = $('.child_branch');
    if (all.length === all.filter(':checked').length) {
        $("#checkAll1").prop("checked", true);
    } else {
        $("#checkAll1").prop("checked", false);
    }
});

$(function () {
    $("#tab3 #checkAll2").click(function () {
        if ($("#tab3 #checkAll2").is(':checked')) {
            $("#tab3 input[type=checkbox]").each(function () {
                $(this).prop("checked", true);
            });
       
        } else {
            $("#tab3 input[type=checkbox]").each(function () {
                $(this).prop("checked", false);
            });
        }
    });
});
$(".child_scheme").change(function(){
    var all = $('.child_scheme');
    if (all.length === all.filter(':checked').length) {
        $("#checkAll2").prop("checked", true);
    } else {
        $("#checkAll2").prop("checked", false);
    }
});

$(function () {
    $("#tab4 #checkAll3").click(function () {
        if ($("#tab4 #checkAll3").is(':checked')) {
            $("#tab4 input[type=checkbox]").each(function () {
                $(this).prop("checked", true);
            });
       
        } else {
            $("#tab4 input[type=checkbox]").each(function () {
                $(this).prop("checked", false);
            });
        }
    });
});
$(".child_group").change(function(){
    var all = $('.child_group');
    if (all.length === all.filter(':checked').length) {
        $("#checkAll3").prop("checked", true);
    } else {
        $("#checkAll3").prop("checked", false);
    }
});

$(function () {
    $("#tab5 #checkAll4").click(function () {
        if ($("#tab5 #checkAll4").is(':checked')) {
            $("#tab5 input[type=checkbox]").each(function () {
                $(this).prop("checked", true);
            });
       
        } else {
            $("#tab5 input[type=checkbox]").each(function () {
                $(this).prop("checked", false);
            });
        }
    });
});
$(".child_employee").change(function(){
    var all = $('.child_employee');
    if (all.length === all.filter(':checked').length) {
        $("#checkAll4").prop("checked", true);
    } else {
        $("#checkAll4").prop("checked", false);
    }
});


$(function () {
    $("#tab6 #checkAll5").click(function () {
        if ($("#tab6 #checkAll5").is(':checked')) {
            $("#tab6 input[type=checkbox]").each(function () {
                $(this).prop("checked", true);
            });
       
        } else {
            $("#tab6 input[type=checkbox]").each(function () {
                $(this).prop("checked", false);
            });
        }
    });
});
$(".child_login").change(function(){
    var all = $('.child_login');
    if (all.length === all.filter(':checked').length) {
        $("#checkAll5").prop("checked", true);
    } else {
        $("#checkAll5").prop("checked", false);
    }
});

$(function () {
    $("#tab7 #checkAll6").click(function () {
        if ($("#tab7 #checkAll6").is(':checked')) {
            $("#tab7 input[type=checkbox]").each(function () {
                $(this).prop("checked", true);
            });
       
        } else {
            $("#tab7 input[type=checkbox]").each(function () {
                $(this).prop("checked", false);
            });
        }
    });
});
$(".child_agent").change(function(){
    var all = $('.child_agent');
    if (all.length === all.filter(':checked').length) {
        $("#checkAll6").prop("checked", true);
    } else {
        $("#checkAll6").prop("checked", false);
    }
});

$(function () {
    $("#tab8 #checkAll7").click(function () {
        if ($("#tab8 #checkAll7").is(':checked')) {
            $("#tab8 input[type=checkbox]").each(function () {
                $(this).prop("checked", true);
            });
       
        } else {
            $("#tab8 input[type=checkbox]").each(function () {
                $(this).prop("checked", false);
            });
        }
    });
});
$(".child_customer").change(function(){
    var all = $('.child_customer');
    if (all.length === all.filter(':checked').length) {
        $("#checkAll7").prop("checked", true);
    } else {
        $("#checkAll7").prop("checked", false);
    }
});


$(function () {
    $("#tab9 #checkAll8").click(function () {
        if ($("#tab9 #checkAll8").is(':checked')) {
            $("#tab9 input[type=checkbox]").each(function () {
                $(this).prop("checked", true);
            });
       
        } else {
            $("#tab9 input[type=checkbox]").each(function () {
                $(this).prop("checked", false);
            });
        }
    });
});
$(".child_enroll").change(function(){
    var all = $('.child_enroll');
    if (all.length === all.filter(':checked').length) {
        $("#checkAll8").prop("checked", true);
    } else {
        $("#checkAll8").prop("checked", false);
    }
});

$(function () {
    $("#tab10 #checkAll9").click(function () {
        if ($("#tab10 #checkAll9").is(':checked')) {
            $("#tab10 input[type=checkbox]").each(function () {
                $(this).prop("checked", true);
            });
       
        } else {
            $("#tab10 input[type=checkbox]").each(function () {
                $(this).prop("checked", false);
            });
        }
    });
});
$(".child_document").change(function(){
    var all = $('.child_document');
    if (all.length === all.filter(':checked').length) {
        $("#checkAll9").prop("checked", true);
    } else {
        $("#checkAll9").prop("checked", false);
    }
});

$(function () {
    $("#tab17 #checkAll17").click(function () {
        if ($("#tab17 #checkAll17").is(':checked')) {
            $("#tab17 input[type=checkbox]").each(function () {
                $(this).prop("checked", true);
            });
       
        } else {
            $("#tab17 input[type=checkbox]").each(function () {
                $(this).prop("checked", false);
            });
        }
    });
});
$(".child_report").change(function(){
    var all = $('.child_report');
    if (all.length === all.filter(':checked').length) {
        $("#checkAll17").prop("checked", true);
    } else {
        $("#checkAll17").prop("checked", false);
    }
});

$(function () {
    $("#tab11 #checkAll10").click(function () {
        if ($("#tab11 #checkAll10").is(':checked')) {
            $("#tab11 input[type=checkbox]").each(function () {
                $(this).prop("checked", true);
            });
       
        } else {
            $("#tab11 input[type=checkbox]").each(function () {
                $(this).prop("checked", false);
            });
        }
    });
});
$(".child_auction").change(function(){
    var all = $('.child_auction');
    if (all.length === all.filter(':checked').length) {
        $("#checkAll10").prop("checked", true);
    } else {
        $("#checkAll10").prop("checked", false);
    }
});


$(function () {
    $("#tab12 #checkAll11").click(function () {
        if ($("#tab12 #checkAll11").is(':checked')) {
            $("#tab12 input[type=checkbox]").each(function () {
                $(this).prop("checked", true);
            });
       
        } else {
            $("#tab12 input[type=checkbox]").each(function () {
                $(this).prop("checked", false);
            });
        }
    });
});
$(".child_collection").change(function(){
    var all = $('.child_collection');
    if (all.length === all.filter(':checked').length) {
        $("#checkAll11").prop("checked", true);
    } else {
        $("#checkAll11").prop("checked", false);
    }
});


$(function () {
    $("#tab13 #checkAll12").click(function () {
        if ($("#tab13 #checkAll12").is(':checked')) {
            $("#tab13 input[type=checkbox]").each(function () {
                $(this).prop("checked", true);
            });
       
        } else {
            $("#tab13 input[type=checkbox]").each(function () {
                $(this).prop("checked", false);
            });
        }
    });
});
$(".child_payment").change(function(){
    var all = $('.child_payment');
    if (all.length === all.filter(':checked').length) {
        $("#checkAll12").prop("checked", true);
    } else {
        $("#checkAll12").prop("checked", false);
    }
});


$(function () {
    $("#tab16 #checkAll16").click(function () {
        if ($("#tab16 #checkAll16").is(':checked')) {
            $("#tab16 input[type=checkbox]").each(function () {
                $(this).prop("checked", true);
            });
       
        } else {
            $("#tab16 input[type=checkbox]").each(function () {
                $(this).prop("checked", false);
            });
        }
    });
});
$(".child_config").change(function(){
    var all = $('.child_config');
    if (all.length === all.filter(':checked').length) {
        $("#checkAll16").prop("checked", true);
    } else {
        $("#checkAll16").prop("checked", false);
    }
});

$(function () {
    $("#tab15 #checkAll15").click(function () {
        if ($("#tab15 #checkAll15").is(':checked')) {
            $("#tab15 input[type=checkbox]").each(function () {
                $(this).prop("checked", true);
            });
       
        } else {
            $("#tab15 input[type=checkbox]").each(function () {
                $(this).prop("checked", false);
            });
        }
    });
});
$(".child_feedback").change(function(){
    var all = $('.child_feedback');
    if (all.length === all.filter(':checked').length) {
        $("#checkAll15").prop("checked", true);
    } else {
        $("#checkAll15").prop("checked", false);
    }
});



$(function () {
    $("#tab19 #checkAll19").click(function () {
        if ($("#tab19 #checkAll19").is(':checked')) {
            $("#tab19 input[type=checkbox]").each(function () {
                $(this).prop("checked", true);
            });
       
        } else {
            $("#tab19 input[type=checkbox]").each(function () {
                $(this).prop("checked", false);
            });
        }
    });
});
$(".child_bank").change(function(){
    var all = $('.child_bank');
    if (all.length === all.filter(':checked').length) {
        $("#checkAll19").prop("checked", true);
    } else {
        $("#checkAll19").prop("checked", false);
    }
});

$(function () {
    $("#tab21 #checkAll21").click(function () {
        if ($("#tab21 #checkAll21").is(':checked')) {
            $("#tab21 input[type=checkbox]").each(function () {
                $(this).prop("checked", true);
            });
       
        } else {
            $("#tab21 input[type=checkbox]").each(function () {
                $(this).prop("checked", false);
            });
        }
    });
});
$(".child_area").change(function(){
    var all = $('.child_area');
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
            $("#tab22 input[type=checkbox]").each(function () {
                $(this).prop("checked", false);
            });
        }
    });
});
$(".child_designation").change(function(){
    var all = $('.child_designation');
    if (all.length === all.filter(':checked').length) {
        $("#checkAll22").prop("checked", true);
    } else {
        $("#checkAll22").prop("checked", false);
    }
});

$(function () {
    $("#tab30 #checkAll30").click(function () {
        if ($("#tab30 #checkAll30").is(':checked')) {
            $("#tab30 input[type=checkbox]").each(function () {
                $(this).prop("checked", true);
            });
       
        } else {
            $("#tab30 input[type=checkbox]").each(function () {
                $(this).prop("checked", false);
            });
        }
    });
});
$(".child_charge").change(function(){
    var all = $('.child_charge');
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
            $("#tab31 input[type=checkbox]").each(function () {
                $(this).prop("checked", false);
            });
        }
    });
});
$(".child_cash_entry").change(function(){
    var all = $('.child_cash_entry');
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
            $("#tab32 input[type=checkbox]").each(function () {
                $(this).prop("checked", false);
            });
        }
    });
});
$(".child_lead").change(function(){
    var all = $('.child_lead');
    if (all.length === all.filter(':checked').length) {
        $("#checkAll32").prop("checked", true);
    } else {
        $("#checkAll32").prop("checked", false);
    }
});

$(function () {
    $("#tab29 #checkAll29").click(function () {
        if ($("#tab29 #checkAll29").is(':checked')) {
            $("#tab29 input[type=checkbox]").each(function () {
                $(this).prop("checked", true);
            });
       
        } else {
            $("#tab29 input[type=checkbox]").each(function () {
                $(this).prop("checked", false);
            });
        }
    });
});
$(".child_extra_charge").change(function(){
    var all = $('.child_extra_charge');
    if (all.length === all.filter(':checked').length) {
        $("#checkAll29").prop("checked", true);
    } else {
        $("#checkAll29").prop("checked", false);
    }
});

$(function () {
    $("#tab23 #checkAll23").click(function () {
        if ($("#tab23 #checkAll23").is(':checked')) {
            $("#tab23 input[type=checkbox]").each(function () {
                $(this).prop("checked", true);
            });
       
        } else {
            $("#tab23 input[type=checkbox]").each(function () {
                $(this).prop("checked", false);
            });
        }
    });
});
$(".child_role").change(function(){
    var all = $('.child_role');
    if (all.length === all.filter(':checked').length) {
        $("#checkAll23").prop("checked", true);
    } else {
        $("#checkAll23").prop("checked", false);
    }
});

$(function () {
    $("#tab25 #checkAll25").click(function () {
        if ($("#tab25 #checkAll25").is(':checked')) {
            $("#tab25 input[type=checkbox]").each(function () {
                $(this).prop("checked", true);
            });
       
        } else {
            $("#tab25 input[type=checkbox]").each(function () {
                $(this).prop("checked", false);
            });
        }
    });
});
$(".child_city").change(function(){
    var all = $('.child_city');
    if (all.length === all.filter(':checked').length) {
        $("#checkAll25").prop("checked", true);
    } else {
        $("#checkAll25").prop("checked", false);
    }
});

$(function () {
    $("#tab20 #checkAll20").click(function () {
        if ($("#tab20 #checkAll20").is(':checked')) {
            $("#tab20 input[type=checkbox]").each(function () {
                $(this).prop("checked", true);
            });
       
        } else {
            $("#tab20 input[type=checkbox]").each(function () {
                $(this).prop("checked", false);
            });
        }
    });
});
$(".child_slab").change(function(){
    var all = $('.child_slab');
    if (all.length === all.filter(':checked').length) {
        $("#checkAll20").prop("checked", true);
    } else {
        $("#checkAll20").prop("checked", false);
    }
});

$(function () {
    $("#tab14 #checkAll13").click(function () {
        if ($("#tab14 #checkAll13").is(':checked')) {
            $("#tab14 input[type=checkbox]").each(function () {
                $(this).prop("checked", true);
            });
       
        } else {
            $("#tab14 input[type=checkbox]").each(function () {
                $(this).prop("checked", false);
            });
        }
    });
});

$(function () {
    $("#tab141 #checkAll113").click(function () {
        if ($("#tab141 #checkAll113").is(':checked')) {
            $("#tab141 input[type=checkbox]").each(function () {
                $(this).prop("checked", true);
            });
       
        } else {
            $("#tab141 input[type=checkbox]").each(function () {
                $(this).prop("checked", false);
            });
        }
    });
});

$(".child_recpt").change(function(){
    var all = $('.child_recpt');
    if (all.length === all.filter(':checked').length) {
        $("#checkAll13").prop("checked", true);
    } else {
        $("#checkAll13").prop("checked", false);
    }
});

$(".child_recpt").change(function(){
    var all = $('.child_recpt');
    if (all.length === all.filter(':checked').length) {
        $("#checkAll113").prop("checked", true);
    } else {
        $("#checkAll113").prop("checked", false);
    }
});

$(function () {
    $("#tab1 #checkAll").load(function () {
        if ($("#tab1 #checkAll").is(':checked')) {
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
$("#tab1").load(function(){
    var all = $('.child_zone');
    if (all.length === all.filter(':checked').length) {
        $("#checkAll").prop("checked", true);
    } else {
        $("#checkAll").prop("checked", false);
    }
});


});
//submit validation
$(document).ready(function(){
	$("#submit_chk").click(function(){ 
		var mas_id = $("#masters_head");		 
		var masters_id = $(".masters");	
		
		if (mas_id.is(':checked')) {		 
		
				if (masters_id.is(':checked')) { 
					$(".masters").prop("required", false);
				} else { 
					$(".masters").prop("required", true);
				}
		 
		
		}
	});
	
	
	$("#submit_chk").click(function(){ 
		var mas_id = $("#employee_head");		 
		var masters_id = $(".emply");	
		
		if (mas_id.is(':checked')) {		 
		
				if (masters_id.is(':checked')) { 
					$(".emply").prop("required", false);
				} else {
					$(".emply").prop("required", true);
				}
		}
	});
	
	$("#submit_chk").click(function(){ 
		var mas_id = $("#lead_head");		 
		var masters_id = $(".lead");	
		
		if (mas_id.is(':checked')) {		 
		
				if (masters_id.is(':checked')) { 
					$(".lead").prop("required", false);
				} else {
					$(".lead").prop("required", true);
				}
		}
	});
	
	$("#submit_chk").click(function(){ 
		var mas_id = $("#customer_head");		 
		var masters_id = $(".customer");	
		
		if (mas_id.is(':checked')) {		 
		
				if (masters_id.is(':checked')) { 
					$(".customer").prop("required", false);
				} else {
				 
					$(".customer").prop("required", true);
				}
		}

	});
	
	$("#submit_chk").click(function(){ 
		var mas_id = $("#report_head");		 
		var masters_id = $(".report");	
		
		if (mas_id.is(':checked')) {		 
		
				if (masters_id.is(':checked')) { 
					$(".report").prop("required", false);
				} else {
				 
					$(".report").prop("required", true);
				}
		}

	});
	
	$("#submit_chk").click(function(){ 
		var mas_id = $("#trans_head");		 
		var masters_id = $(".trans");	
		
		if (mas_id.is(':checked')) {		 
		
				if (masters_id.is(':checked')) { 
					$(".trans").prop("required", false);
				} else {
				 
					$(".trans").prop("required", true);
				}
		}

	});
	
	
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