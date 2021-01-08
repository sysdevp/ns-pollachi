@extends('admin.layout.app')
@section('content')
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
            <li><button type="button" class="btn btn-success"><a href="{{url('master/role')}}">Back</a></button></li>
          </ul>
        </div>
      </div>
    </div>
    <!-- card header end@ -->
    <div class="card-body">
    
      <form  method="post" class="form-horizontal needs-validation" novalidate action="{{url('master/role/store')}}" enctype="multipart/form-data">
      {{csrf_field()}}

        <div class="form-row">
            <span class="mandatory"> {{ $errors->first('permission.*')  }} </span>
          <div class="col-md-12">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-2 col-form-label">Role Name <span class="mandatory">*</span></label>
              <div class="col-sm-8">
              <input type="text" class="form-control name only_allow_alp_num_dot_com_amp caps" placeholder="Role Name" name="name" value="{{old('name')}}" required>
                <span class="mandatory"> {{ $errors->first('name')  }} </span>
                <div class="invalid-feedback">
                  Enter valid Role Name
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
								<div class="row">
									<div class="col-lg-2">
										<div class="" id="tab1">		
								<input type="checkbox" name="checkAll" id="checkAll"/></label>
								<label class="control-label">Select All</label>
								<br>
								<input type="checkbox" value="1" class="child_zone masters"  id="zone" name="permission[]"/></label>
								<label class="control-label">State</label>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="1.1" class="child_zone masters " id="zone_add" name="add[]"/></label>
								<span class="control-label">Add</span>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="1.2" class="child_zone masters" id="zone_edit" name="edit[]"/></label>
								<span class="control-label">Edit</span>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="1.3" class="child_zone masters" id="zone_delete" name="delete[]"/></label>
								<span class="control-label">Delete</span>
							</div>	
									</div>
									
									
									<div class="col-lg-2">
										<div class="" id="tab2">	
							    <input type="checkbox" name="checkAll1" id="checkAll1"/></label>
								<label class="control-label">Select All</label>
								<br>
								<input type="checkbox" value="2" class="child_branch masters" id="branch" name="permission[]"/></label>
								<label class="control-label">District</label>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="2.1" class="child_branch masters" id="branch_add" name="add[]"/></label>
								<span class="control-label">Add</span>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="2.2" class="child_branch masters" id="branch_edit" name="edit[]"/></label>
								<span class="control-label">Edit</span>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="2.3" class="child_branch masters" id="branch_delete" name="delete[]"/></label>
								<span class="control-label">Delete</span>
							</div>	
									</div>
									
									
									<div class="col-lg-2">
											<div class="" id="tab3">
                                <input type="checkbox" name="checkAll2" id="checkAll2"/></label>
								<label class="control-label">Select All</label>
								<br>							
								<input type="checkbox" value="3" class="child_scheme masters" id="scheme" name="permission[]"/></label>
								<label class="control-label">City</label>
								<br>
						 		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="3.1" class="child_scheme masters" id="scheme_add" name="add[]"/></label>
								<span class="control-label">Add</span>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="3.2" class="child_scheme masters" id="scheme_edit" name="edit[]"/></label>
								<span class="control-label">Edit</span>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="3.3" class="child_scheme masters" id="scheme_delete" name="delete[]"/></label>
								<span class="control-label">Delete</span>
							</div>	
									</div>
									
								
								
								
								
								<div class="col-lg-2">
										<div class="" id="tab5">	
							    <input type="checkbox" name="checkAll1" id="checkAll1"/></label>
								<label class="control-label">Select All</label>
								<br>
								<input type="checkbox" value="2" class="child_branch masters" id="branch" name="permission[]"/></label>
								<label class="control-label">Address Type</label>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="2.1" class="child_branch masters" id="branch_add" name="add[]"/></label>
								<span class="control-label">Add</span>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="2.2" class="child_branch masters" id="branch_edit" name="edit[]"/></label>
								<span class="control-label">Edit</span>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="2.3" class="child_branch masters" id="branch_delete" name="delete[]"/></label>
								<span class="control-label">Delete</span>
							</div>	
									</div>
									
								
								
								
								<div class="col-lg-2">
										<div class="" id="tab5">	
							    <input type="checkbox" name="checkAll1" id="checkAll1"/></label>
								<label class="control-label">Select All</label>
								<br>
								<input type="checkbox" value="2" class="child_branch masters" id="branch" name="permission[]"/></label>
								<label class="control-label">Address Type</label>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="2.1" class="child_branch masters" id="branch_add" name="add[]"/></label>
								<span class="control-label">Add</span>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="2.2" class="child_branch masters" id="branch_edit" name="edit[]"/></label>
								<span class="control-label">Edit</span>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="2.3" class="child_branch masters" id="branch_delete" name="delete[]"/></label>
								<span class="control-label">Delete</span>
							</div>	
									</div>
									
								
								
								
								<div class="col-lg-2">
										<div class="" id="tab5">	
							    <input type="checkbox" name="checkAll1" id="checkAll1"/></label>
								<label class="control-label">Select All</label>
								<br>
								<input type="checkbox" value="2" class="child_branch masters" id="branch" name="permission[]"/></label>
								<label class="control-label">Address Type</label>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="2.1" class="child_branch masters" id="branch_add" name="add[]"/></label>
								<span class="control-label">Add</span>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="2.2" class="child_branch masters" id="branch_edit" name="edit[]"/></label>
								<span class="control-label">Edit</span>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="2.3" class="child_branch masters" id="branch_delete" name="delete[]"/></label>
								<span class="control-label">Delete</span>
							</div>	
									</div>
									
									
									
									<div class="col-lg-2">
										<div class="" id="tab5">	
							    <input type="checkbox" name="checkAll1" id="checkAll1"/></label>
								<label class="control-label">Select All</label>
								<br>
								<input type="checkbox" value="2" class="child_branch masters" id="branch" name="permission[]"/></label>
								<label class="control-label">Address Type</label>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="2.1" class="child_branch masters" id="branch_add" name="add[]"/></label>
								<span class="control-label">Add</span>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="2.2" class="child_branch masters" id="branch_edit" name="edit[]"/></label>
								<span class="control-label">Edit</span>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="2.3" class="child_branch masters" id="branch_delete" name="delete[]"/></label>
								<span class="control-label">Delete</span>
							</div>	
									</div>
									
								
									
								</div>
								
							</div>
							
							<div class="container">
								<div class="row">
									
									
									
									<div class="col-lg-4">
										<div class="" id="tab5">	
							    <input type="checkbox" name="checkAll1" id="checkAll1"/></label>
								<label class="control-label">Select All</label>
								<br>
								<input type="checkbox" value="2" class="child_branch masters" id="branch" name="permission[]"/></label>
								<label class="control-label">Address Type</label>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="2.1" class="child_branch masters" id="branch_add" name="add[]"/></label>
								<span class="control-label">Add</span>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="2.2" class="child_branch masters" id="branch_edit" name="edit[]"/></label>
								<span class="control-label">Edit</span>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="2.3" class="child_branch masters" id="branch_delete" name="delete[]"/></label>
								<span class="control-label">Delete</span>
							</div>	
									</div>
									
									
									<div class="col-lg-4">
											  <div class="" id="tab15">	
							    <input type="checkbox" name="checkAll15" id="checkAll15"/></label>
								<label class="control-label">Select All</label>
								<br>
								<input type="checkbox" value="24" class="child_feedback masters" id="child_feedback" name="permission[]"/></label>
								<label class="control-label">Company Location</label>	
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="24.1" class="child_feedback masters" id="child_feedback" name="add[]"/></label>
								<span class="control-label">Add</span>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="24.2" class="child_feedback masters" id="child_feedback" name="edit[]"/></label>
								<span class="control-label">Edit</span>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="24.3" class="child_feedback masters" id="child_feedback" name="delete[]"/></label>
								<span class="control-label">Delete</span>
							</div>	
									</div>
									
				           <div class="col-lg-4">
									<div class="" style="margin-top:20px" id="tab16">	
							    <input type="checkbox" name="checkAll16" id="checkAll16"/></label>
								<label class="control-label">Select All</label>
								<br>
								<input type="checkbox" value="16" class="child_config masters" id="child_config" name="permission[]"/></label>
								<label class="control-label">Branch Configuration</label>	
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="16.1" class="child_config masters" id="child_config" name="add[]"/></label>
								<span class="control-label">Add</span>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="16.2" class="child_config masters" id="child_config" name="edit[]"/></label>
								<span class="control-label">Edit</span>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="16.3" class="child_config masters" id="child_config" name="delete[]"/></label>
								<span class="control-label">Delete</span>
							</div>		
									</div>
									
								
									
								</div>
								
							</div>
							
						
						
							
							
							
							
							
							
									

                           

                           		<br> <br> <br>		
                            <div class="col-sm-3" style="margin-top:20px" id="tab19">	
							    <input type="checkbox" name="checkAll19" id="checkAll19"/></label>
								<label class="control-label">Select All</label>
								<br>
								<input type="checkbox" value="19" class="child_bank masters" id="child_bank" name="permission[]"/></label>
								<label class="control-label">Bank Branch Master</label>	
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="19.1" class="child_bank masters" id="child_bank" name="add[]"/></label>
								<span class="control-label">Add</span>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="19.2" class="child_bank masters" id="child_bank" name="edit[]"/></label>
								<span class="control-label">Edit</span>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="19.3" class="child_bank masters" id="child_bank" name="delete[]"/></label>
								<span class="control-label">Delete</span>
							</div>
							<div class="col-sm-3" style="margin-top:20px" id="tab20">	
							    <input type="checkbox" name="checkAll20" id="checkAll20"/></label>
								<label class="control-label">Select All</label>
								<br>
								<input type="checkbox" value="20" class="child_slab masters" id="child_slab" name="permission[]"/></label>
								<label class="control-label">Slab Master</label>	
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="20.1" class="child_slab masters" id="child_slab" name="add[]"/></label>
								<span class="control-label">Add</span>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="hidden" value="20.2" class="child_slab masters" id="child_slab" name="edit[]"/></label>
								<span class="control-label"></span>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="hidden" value="20.3" class="child_slab masters" id="child_slab" name="delete[]"/></label>
								<span class="control-label"></span>
							</div>	
							<div class="col-sm-3" style="margin-top:20px" id="tab21">	
							    <input type="checkbox" name="checkAll21" id="checkAll21"/></label>
								<label class="control-label">Select All</label>
								<br>
								<input type="checkbox" value="21" class="child_area masters" id="child_area" name="permission[]"/></label>
								<label class="control-label">Collection Area</label>	
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="21.1" class="child_area masters" id="child_area" name="add[]"/></label>
								<span class="control-label">Add</span>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="21.2" class="child_area masters" id="child_area" name="edit[]"/></label>
								<span class="control-label">Edit</span>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="21.3" class="child_area masters" id="child_area" name="delete[]"/></label>
								<span class="control-label">Delete</span>
							</div>	
							<div class="col-sm-3" style="margin-top:20px" id="tab22">	
							    <input type="checkbox" name="checkAll22" id="checkAll22"/></label>
								<label class="control-label">Select All</label>
								<br>
								<input type="checkbox" value="22" class="child_designation masters" id="child_designation" name="permission[]"/></label>
								<label class="control-label">Designation Master</label>	
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="22.1" class="child_designation masters" id="child_designation" name="add[]"/></label>
								<span class="control-label">Add</span>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="22.2" class="child_designation masters" id="child_designation" name="edit[]"/></label>
								<span class="control-label">Edit</span>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="22.3" class="child_designation masters" id="child_designation" name="delete[]"/></label>
								<span class="control-label">Delete</span>
							</div>	
                             <div class="col-sm-3" style="margin-top:20px" id="tab23">	
							    <input type="checkbox" name="checkAll23" id="checkAll23"/></label>
								<label class="control-label">Select All</label>
								<br>
								<input type="checkbox" value="23" class="child_role masters" id="child_role" name="permission[]"/></label>
								<label class="control-label">Role Master</label>	
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="23.1" class="child_role masters" id="child_role" name="add[]"/></label>
								<span class="control-label">Add</span>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="23.2" class="child_role masters" id="child_role" name="edit[]"/></label>
								<span class="control-label">Edit</span>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="23.3" class="child_role masters" id="child_role" name="delete[]"/></label>
								<span class="control-label">Delete</span>
							</div>	
<div class="col-sm-3" style="margin-top:20px" id="tab25">	
							    <input type="checkbox" name="checkAll25" id="checkAll25"/></label>
								<label class="control-label">Select All</label>
								<br>
								<input type="checkbox" value="25" class="child_city masters" id="child_city" name="permission[]"/></label>
								<label class="control-label">City Master</label>	
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="25.1" class="child_city masters" id="child_city" name="add[]"/></label>
								<span class="control-label">Add</span>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="25.2" class="child_city masters" id="child_city" name="edit[]"/></label>
								<span class="control-label">Edit</span>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="25.3" class="child_city masters" id="child_city" name="delete[]"/></label>
								<span class="control-label">Delete</span>
							</div>			
                            <div class="col-sm-3" style="margin-top:20px" id="tab30">	
							    <input type="checkbox" name="checkAll30" id="checkAll30"/></label>
								<label class="control-label">Select All</label>
								<br>
								<input type="checkbox" value="30" class="child_charge masters" id="child_charge" name="permission[]"/></label>
								<label class="control-label">Charge Type Master</label>	
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="30.1" class="child_charge masters" id="child_charge" name="add[]"/></label>
								<span class="control-label">Add</span>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="30.2" class="child_charge masters" id="child_charge" name="edit[]"/></label>
								<span class="control-label">Edit</span>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="30.3" class="child_charge masters" id="child_charge" name="delete[]"/></label>
								<span class="control-label">Delete</span>
							</div>	
                            <div class="col-sm-3" style="margin-top:40px">
								<input type="checkbox" value="u22" class="child_upload report" id="child_upload" name="permission[]"/></label>
								<span class="control-label"><b> Upload Subcriber Advance Excel</b></span>	
							</div>								
						</div> 
						</div>  </br></br></br>
						
						<div class="form-group col-sm-12 col-md-12">
						    <div class="container">
                             <div class="panel panel-default"  id="heading">
                             <div class="panel-heading"><h4 style=" text-align: center;">
							 <input style=" text-align: center;" type="checkbox" value="h2" class="employee_head" id="employee_head" name="permission[]"/>
							 <b>Transaction Management</b></h4></div>
                             </div>
                            </div>
							<div id="employee_div" class="employee_div form-group" style="display:none">
							<div class="col-sm-4 col-md-4" id="tab5">		
                                <input type="checkbox" name="checkAll4" id="checkAll4"/></label>
								<label class="control-label">Select All</label>
								<br>							
								<input type="checkbox" value="5" class="child_employee emply" id="employee" name="permission[]"/></label>
								<label class="control-label">Employee Details</label>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="5.1" class="child_employee emply" id="emply_add" name="add[]"/></label>
								<span class="control-label">Add</span>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="5.2" class="child_employee emply" id="emply_edit" name="edit[]"/></label>
								<span class="control-label">Edit</span>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="5.3" class="child_employee emply" id="emply_delete" name="delete[]"/></label>
								<span class="control-label">Delete</span>
							</div>	
							
							<div class="col-sm-4" id="tab6">	
							    <input type="checkbox" name="checkAll5" id="checkAll5"/></label>
								<label class="control-label">Select All</label>
								<br>
								<input type="checkbox" value="6" class="child_login emply" id="login" name="permission[]"/></label>
								<label class="control-label">Login Details</label>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="6.1" class="child_login emply" id="login_add" name="add[]"/></label>
								<span class="control-label">Add</span>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="6.2" class="child_login emply" id="login_edit" name="edit[]"/></label>
								<span class="control-label">Edit</span>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="6.3" class="child_login emply" id="login_delete" name="delete[]"/></label>
								<span class="control-label">Delete</span>
							</div>	
							
							<div class="col-sm-3" id="tab7">	
							    <input type="checkbox" name="checkAll6" id="checkAll6"/></label>
								<label class="control-label">Select All</label>
								<br>
								<input type="checkbox" value="7" class="child_agent emply" id="agent" name="permission[]"/></label>
								<label class="control-label">Agent Details</label>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="7.1" class="child_agent emply" id="agent_add" name="add[]"/></label>
								<span class="control-label">Add</span>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="7.2" class="child_agent emply" id="agent_edit" name="edit[]"/></label>
								<span class="control-label">Edit</span>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="7.3" class="child_agent emply" id="agent_delete" name="delete[]"/></label>
								<span class="control-label">Delete</span>
							</div>	
						</div> </div> <br> <br> <br>
						
						<div class="form-group col-sm-12 col-md-12">
						    <div class="container">
                             <div class="panel panel-default"  id="heading">
                             <div class="panel-heading"><h4 style=" text-align: center;">
							 <input style=" text-align: center;" type="checkbox" value="h7" class="lead_head" id="lead_head" name="permission[]"/>
							 <b>Registers</b></h4></div>
                             </div>
                            </div>
							<div id="lead_div" class="lead_div form-group" style="display:none">
							<div class="col-sm-4 col-md-4" id="tab32">		
                                <input type="checkbox" name="checkAll32" id="checkAll32"/></label>
								<label class="control-label">Select All</label>
								<br>							
								<input type="checkbox" value="32" class="child_lead lead" id="lead" name="permission[]"/></label>
								<label class="control-label">Subscriber Lead</label>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="32.1" class="child_lead lead" id="lead_add" name="add[]"/></label>
								<span class="control-label">Add</span>
								<br>
								
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="32.3" class="child_lead lead" id="lead_delete" name="delete[]"/></label>
								<span class="control-label">Delete</span>
							</div>	
					 	</div> </div> <br> <br> <br>
						
						<div class="form-group col-sm-12 col-md-12"> 
						<div class="container">
                             <div class="panel panel-default"  id="heading">
                             <div class="panel-heading"><h4 style=" text-align: center;">
							 <input style=" text-align: center;" type="checkbox" value="h3" class="customer_head" id="customer_head" name="permission[]"/>
							 <b>Price Updation</b></h4></div>
                             </div>
                             </div>
							 <div id="customer_div" class="customer_div form-group" style="display:none">
							<div class="col-sm-2 col-md-2" id="tab8">			
							    <input type="checkbox" name="checkAll7" id="checkAll7"/></label>
								<label class="control-label">Select All</label>
								<br>
								<input type="checkbox" value="8" class="child_customer customer" id="customer" name="permission[]"/></label>
								<label class="control-label">Subcriber </label>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="8.1" class="child_customer customer" id="customer_add" name="add[]"/></label>
								<span class="control-label">Add</span>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="8.2" class="child_customer customer" id="customer_edit" name="edit[]"/></label>
								<span class="control-label">Edit</span>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="8.3" class="child_customer customer" id="customer_delete" name="delete[]"/></label>
								<span class="control-label">Delete</span>
							</div>	
							
							<div class="col-sm-2 col-md-2" id="tab9">	
							    <input type="checkbox" name="checkAll8" id="checkAll8"/></label>
								<label class="control-label">Select All</label>
								<br>
								<input type="checkbox" value="9" class="child_enroll customer" id="enroll" name="permission[]"/></label>
								<label class="control-label">Enrollment </label>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="9.1" class="child_enroll customer" id="enroll_add" name="add[]"/></label>
								<span class="control-label">Add</span>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="9.2" class="child_enroll customer" id="enroll_edit" name="edit[]"/></label>
								<span class="control-label">Edit</span>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="9.3" class="child_enroll customer" id="enroll_delete" name="delete[]"/></label>
								<span class="control-label">Delete</span>
							</div>	
							
							<div class="col-sm-2 col-md-2" id="tab10">	
							    <input type="checkbox" name="checkAll9" id="checkAll9"/></label>
								<label class="control-label">Select All</label>
								<br>
								<input type="checkbox" value="10" class="child_document customer" id="document" name="permission[]"/></label>
								<label class="control-label">Document </label>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="10.1" class="child_document customer" id="document_add" name="add[]"/></label>
								<span class="control-label">Add</span>
								<br>
							</div>	
							
							<div class="col-sm-2 col-md-2" id="tab11">	
							    <input type="checkbox" name="checkAll10" id="checkAll10"/></label>
								<label class="control-label">Select All</label>
								<br>
								<input type="checkbox" value="11" class="child_auction customer" id="auction" name="permission[]"/></label>
								<label class="control-label">Auction </label>	
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="11.1" class="child_auction customer" id="auction_add" name="add[]"/></label>
								<span class="control-label">Add</span>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="11.2" class="child_auction customer" id="auction_edit" name="edit[]"/></label>
								<span class="control-label">Edit</span>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="11.3" class="child_auction customer" id="auction_delete" name="delete[]"/></label>
								<span class="control-label">Delete</span>
							</div>		
							
                            <div class="col-sm-2 col-md-2" id="tab12">	
							   <input type="checkbox" name="checkAll11" id="checkAll11"/>
								<label class="control-label">Select All</label>
								<br>
								<input type="checkbox" value="12" class="child_collection customer" id="collection" name="permission[]"/></label>
								<label class="control-label">Feedback</label>	
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="12.1" class="child_collection customer" id="collection_add" name="add[]"/></label>
								<span class="control-label">Add</span>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="hidden" value="12.1" class="child_collection customer" id="collection_delete" name="delete[]"/></label>
								<span class="control-label"></span>
								<br>
							</div>			

                               <div class="col-sm-1 col-md-1" id="tab75">	
								<input type="checkbox" value="d13" class="child_collection customer" id="collection" name="permission[]"/></label>
								<label class="control-label">Dummy chits </label>	
								<br>
								</div>
								<div class="col-sm-1 col-md-1" id="tab75">	
								<input type="checkbox" value="r75" class="child_collection customer" id="collection" name="permission[]"/></label>
								<label class="control-label">Subscriber Document details </label>	
								<br>
							</div>									
						</div></div> </br></br></br>
						
						<div class="form-group col-sm-12 col-md-12"> 
						<div class="container">
                             <div class="panel panel-default"  id="heading">
                             <div class="panel-heading"><h4 style=" text-align: center;">
							 <input style=" text-align: center;" type="checkbox" value="h3" class="customer_head" id="customer_head" name="permission[]"/>
							 <b>Outstanding</b></h4></div>
                             </div>
                             </div>
							 <div id="customer_div" class="customer_div form-group" style="display:none">
							<div class="col-sm-2 col-md-2" id="tab8">			
							    <input type="checkbox" name="checkAll7" id="checkAll7"/></label>
								<label class="control-label">Select All</label>
								<br>
								<input type="checkbox" value="8" class="child_customer customer" id="customer" name="permission[]"/></label>
								<label class="control-label">Subcriber </label>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="8.1" class="child_customer customer" id="customer_add" name="add[]"/></label>
								<span class="control-label">Add</span>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="8.2" class="child_customer customer" id="customer_edit" name="edit[]"/></label>
								<span class="control-label">Edit</span>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="8.3" class="child_customer customer" id="customer_delete" name="delete[]"/></label>
								<span class="control-label">Delete</span>
							</div>	
							
							<div class="col-sm-2 col-md-2" id="tab9">	
							    <input type="checkbox" name="checkAll8" id="checkAll8"/></label>
								<label class="control-label">Select All</label>
								<br>
								<input type="checkbox" value="9" class="child_enroll customer" id="enroll" name="permission[]"/></label>
								<label class="control-label">Enrollment </label>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="9.1" class="child_enroll customer" id="enroll_add" name="add[]"/></label>
								<span class="control-label">Add</span>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="9.2" class="child_enroll customer" id="enroll_edit" name="edit[]"/></label>
								<span class="control-label">Edit</span>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="9.3" class="child_enroll customer" id="enroll_delete" name="delete[]"/></label>
								<span class="control-label">Delete</span>
							</div>	
							
							<div class="col-sm-2 col-md-2" id="tab10">	
							    <input type="checkbox" name="checkAll9" id="checkAll9"/></label>
								<label class="control-label">Select All</label>
								<br>
								<input type="checkbox" value="10" class="child_document customer" id="document" name="permission[]"/></label>
								<label class="control-label">Document </label>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="10.1" class="child_document customer" id="document_add" name="add[]"/></label>
								<span class="control-label">Add</span>
								<br>
							</div>	
							
							<div class="col-sm-2 col-md-2" id="tab11">	
							    <input type="checkbox" name="checkAll10" id="checkAll10"/></label>
								<label class="control-label">Select All</label>
								<br>
								<input type="checkbox" value="11" class="child_auction customer" id="auction" name="permission[]"/></label>
								<label class="control-label">Auction </label>	
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="11.1" class="child_auction customer" id="auction_add" name="add[]"/></label>
								<span class="control-label">Add</span>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="11.2" class="child_auction customer" id="auction_edit" name="edit[]"/></label>
								<span class="control-label">Edit</span>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="11.3" class="child_auction customer" id="auction_delete" name="delete[]"/></label>
								<span class="control-label">Delete</span>
							</div>		
							
                            <div class="col-sm-2 col-md-2" id="tab12">	
							   <input type="checkbox" name="checkAll11" id="checkAll11"/>
								<label class="control-label">Select All</label>
								<br>
								<input type="checkbox" value="12" class="child_collection customer" id="collection" name="permission[]"/></label>
								<label class="control-label">Feedback</label>	
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="12.1" class="child_collection customer" id="collection_add" name="add[]"/></label>
								<span class="control-label">Add</span>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="hidden" value="12.1" class="child_collection customer" id="collection_delete" name="delete[]"/></label>
								<span class="control-label"></span>
								<br>
							</div>			

                               <div class="col-sm-1 col-md-1" id="tab75">	
								<input type="checkbox" value="d13" class="child_collection customer" id="collection" name="permission[]"/></label>
								<label class="control-label">Dummy chits </label>	
								<br>
								</div>
								<div class="col-sm-1 col-md-1" id="tab75">	
								<input type="checkbox" value="r75" class="child_collection customer" id="collection" name="permission[]"/></label>
								<label class="control-label">Subscriber Document details </label>	
								<br>
							</div>									
						</div></div> </br></br></br>
						
						<div class="form-group col-sm-12 col-md-12"> 
						<div class="container">
                             <div class="panel panel-default"  id="heading">
                             <div class="panel-heading"><h4 style=" text-align: center;">
							 <input style=" text-align: center;" type="checkbox" value="h3" class="customer_head" id="customer_head" name="permission[]"/>
							 <b>Settings</b></h4></div>
                             </div>
                             </div>
							 <div id="customer_div" class="customer_div form-group" style="display:none">
							<div class="col-sm-2 col-md-2" id="tab8">			
							    <input type="checkbox" name="checkAll7" id="checkAll7"/></label>
								<label class="control-label">Select All</label>
								<br>
								<input type="checkbox" value="8" class="child_customer customer" id="customer" name="permission[]"/></label>
								<label class="control-label">Subcriber </label>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="8.1" class="child_customer customer" id="customer_add" name="add[]"/></label>
								<span class="control-label">Add</span>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="8.2" class="child_customer customer" id="customer_edit" name="edit[]"/></label>
								<span class="control-label">Edit</span>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="8.3" class="child_customer customer" id="customer_delete" name="delete[]"/></label>
								<span class="control-label">Delete</span>
							</div>	
							
							<div class="col-sm-2 col-md-2" id="tab9">	
							    <input type="checkbox" name="checkAll8" id="checkAll8"/></label>
								<label class="control-label">Select All</label>
								<br>
								<input type="checkbox" value="9" class="child_enroll customer" id="enroll" name="permission[]"/></label>
								<label class="control-label">Enrollment </label>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="9.1" class="child_enroll customer" id="enroll_add" name="add[]"/></label>
								<span class="control-label">Add</span>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="9.2" class="child_enroll customer" id="enroll_edit" name="edit[]"/></label>
								<span class="control-label">Edit</span>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="9.3" class="child_enroll customer" id="enroll_delete" name="delete[]"/></label>
								<span class="control-label">Delete</span>
							</div>	
							
							<div class="col-sm-2 col-md-2" id="tab10">	
							    <input type="checkbox" name="checkAll9" id="checkAll9"/></label>
								<label class="control-label">Select All</label>
								<br>
								<input type="checkbox" value="10" class="child_document customer" id="document" name="permission[]"/></label>
								<label class="control-label">Document </label>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="10.1" class="child_document customer" id="document_add" name="add[]"/></label>
								<span class="control-label">Add</span>
								<br>
							</div>	
							
							<div class="col-sm-2 col-md-2" id="tab11">	
							    <input type="checkbox" name="checkAll10" id="checkAll10"/></label>
								<label class="control-label">Select All</label>
								<br>
								<input type="checkbox" value="11" class="child_auction customer" id="auction" name="permission[]"/></label>
								<label class="control-label">Auction </label>	
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="11.1" class="child_auction customer" id="auction_add" name="add[]"/></label>
								<span class="control-label">Add</span>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="11.2" class="child_auction customer" id="auction_edit" name="edit[]"/></label>
								<span class="control-label">Edit</span>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="11.3" class="child_auction customer" id="auction_delete" name="delete[]"/></label>
								<span class="control-label">Delete</span>
							</div>		
							
                            <div class="col-sm-2 col-md-2" id="tab12">	
							   <input type="checkbox" name="checkAll11" id="checkAll11"/>
								<label class="control-label">Select All</label>
								<br>
								<input type="checkbox" value="12" class="child_collection customer" id="collection" name="permission[]"/></label>
								<label class="control-label">Feedback</label>	
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="12.1" class="child_collection customer" id="collection_add" name="add[]"/></label>
								<span class="control-label">Add</span>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="hidden" value="12.1" class="child_collection customer" id="collection_delete" name="delete[]"/></label>
								<span class="control-label"></span>
								<br>
							</div>			

                               <div class="col-sm-1 col-md-1" id="tab75">	
								<input type="checkbox" value="d13" class="child_collection customer" id="collection" name="permission[]"/></label>
								<label class="control-label">Dummy chits </label>	
								<br>
								</div>
								<div class="col-sm-1 col-md-1" id="tab75">	
								<input type="checkbox" value="r75" class="child_collection customer" id="collection" name="permission[]"/></label>
								<label class="control-label">Subscriber Document details </label>	
								<br>
							</div>									
						</div></div></br></br></br>
						
						<div class="form-group col-sm-12 col-md-12"> 
						<div class="container">
                             <div class="panel panel-default"  id="heading">
                             <div class="panel-heading"><h4 style=" text-align: center;">
							 <input style=" text-align: center;" type="checkbox" value="h3" class="customer_head" id="customer_head" name="permission[]"/>
							 <b>Price Updation</b></h4></div>
                             </div>
                             </div>
							 <div id="customer_div" class="customer_div form-group" style="display:none">
							<div class="col-sm-2 col-md-2" id="tab8">			
							    <input type="checkbox" name="checkAll7" id="checkAll7"/></label>
								<label class="control-label">Select All</label>
								<br>
								<input type="checkbox" value="8" class="child_customer customer" id="customer" name="permission[]"/></label>
								<label class="control-label">Subcriber </label>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="8.1" class="child_customer customer" id="customer_add" name="add[]"/></label>
								<span class="control-label">Add</span>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="8.2" class="child_customer customer" id="customer_edit" name="edit[]"/></label>
								<span class="control-label">Edit</span>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="8.3" class="child_customer customer" id="customer_delete" name="delete[]"/></label>
								<span class="control-label">Delete</span>
							</div>	
							
							<div class="col-sm-2 col-md-2" id="tab9">	
							    <input type="checkbox" name="checkAll8" id="checkAll8"/></label>
								<label class="control-label">Select All</label>
								<br>
								<input type="checkbox" value="9" class="child_enroll customer" id="enroll" name="permission[]"/></label>
								<label class="control-label">Enrollment </label>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="9.1" class="child_enroll customer" id="enroll_add" name="add[]"/></label>
								<span class="control-label">Add</span>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="9.2" class="child_enroll customer" id="enroll_edit" name="edit[]"/></label>
								<span class="control-label">Edit</span>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="9.3" class="child_enroll customer" id="enroll_delete" name="delete[]"/></label>
								<span class="control-label">Delete</span>
							</div>	
							
							<div class="col-sm-2 col-md-2" id="tab10">	
							    <input type="checkbox" name="checkAll9" id="checkAll9"/></label>
								<label class="control-label">Select All</label>
								<br>
								<input type="checkbox" value="10" class="child_document customer" id="document" name="permission[]"/></label>
								<label class="control-label">Document </label>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="10.1" class="child_document customer" id="document_add" name="add[]"/></label>
								<span class="control-label">Add</span>
								<br>
							</div>	
							
							<div class="col-sm-2 col-md-2" id="tab11">	
							    <input type="checkbox" name="checkAll10" id="checkAll10"/></label>
								<label class="control-label">Select All</label>
								<br>
								<input type="checkbox" value="11" class="child_auction customer" id="auction" name="permission[]"/></label>
								<label class="control-label">Auction </label>	
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="11.1" class="child_auction customer" id="auction_add" name="add[]"/></label>
								<span class="control-label">Add</span>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="11.2" class="child_auction customer" id="auction_edit" name="edit[]"/></label>
								<span class="control-label">Edit</span>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="11.3" class="child_auction customer" id="auction_delete" name="delete[]"/></label>
								<span class="control-label">Delete</span>
							</div>		
							
                            <div class="col-sm-2 col-md-2" id="tab12">	
							   <input type="checkbox" name="checkAll11" id="checkAll11"/>
								<label class="control-label">Select All</label>
								<br>
								<input type="checkbox" value="12" class="child_collection customer" id="collection" name="permission[]"/></label>
								<label class="control-label">Feedback</label>	
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="12.1" class="child_collection customer" id="collection_add" name="add[]"/></label>
								<span class="control-label">Add</span>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="hidden" value="12.1" class="child_collection customer" id="collection_delete" name="delete[]"/></label>
								<span class="control-label"></span>
								<br>
							</div>			

                               <div class="col-sm-1 col-md-1" id="tab75">	
								<input type="checkbox" value="d13" class="child_collection customer" id="collection" name="permission[]"/></label>
								<label class="control-label">Dummy chits </label>	
								<br>
								</div>
								<div class="col-sm-1 col-md-1" id="tab75">	
								<input type="checkbox" value="r75" class="child_collection customer" id="collection" name="permission[]"/></label>
								<label class="control-label">Subscriber Document details </label>	
								<br>
							</div>									
						</div></div></br></br></br>
						
						<div class="form-group col-sm-12 col-md-12"> 
						<div class="container">
                             <div class="panel panel-default"  id="heading">
                             <div class="panel-heading"><h4 style=" text-align: center;">
							 <input style=" text-align: center;" type="checkbox" value="h3" class="customer_head" id="customer_head" name="permission[]"/>
							 <b>POS</b></h4></div>
                             </div>
                             </div>
							 <div id="customer_div" class="customer_div form-group" style="display:none">
							<div class="col-sm-2 col-md-2" id="tab8">			
							    <input type="checkbox" name="checkAll7" id="checkAll7"/></label>
								<label class="control-label">Select All</label>
								<br>
								<input type="checkbox" value="8" class="child_customer customer" id="customer" name="permission[]"/></label>
								<label class="control-label">Subcriber </label>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="8.1" class="child_customer customer" id="customer_add" name="add[]"/></label>
								<span class="control-label">Add</span>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="8.2" class="child_customer customer" id="customer_edit" name="edit[]"/></label>
								<span class="control-label">Edit</span>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="8.3" class="child_customer customer" id="customer_delete" name="delete[]"/></label>
								<span class="control-label">Delete</span>
							</div>	
							
							<div class="col-sm-2 col-md-2" id="tab9">	
							    <input type="checkbox" name="checkAll8" id="checkAll8"/></label>
								<label class="control-label">Select All</label>
								<br>
								<input type="checkbox" value="9" class="child_enroll customer" id="enroll" name="permission[]"/></label>
								<label class="control-label">Enrollment </label>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="9.1" class="child_enroll customer" id="enroll_add" name="add[]"/></label>
								<span class="control-label">Add</span>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="9.2" class="child_enroll customer" id="enroll_edit" name="edit[]"/></label>
								<span class="control-label">Edit</span>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="9.3" class="child_enroll customer" id="enroll_delete" name="delete[]"/></label>
								<span class="control-label">Delete</span>
							</div>	
							
							<div class="col-sm-2 col-md-2" id="tab10">	
							    <input type="checkbox" name="checkAll9" id="checkAll9"/></label>
								<label class="control-label">Select All</label>
								<br>
								<input type="checkbox" value="10" class="child_document customer" id="document" name="permission[]"/></label>
								<label class="control-label">Document </label>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="10.1" class="child_document customer" id="document_add" name="add[]"/></label>
								<span class="control-label">Add</span>
								<br>
							</div>	
							
							<div class="col-sm-2 col-md-2" id="tab11">	
							    <input type="checkbox" name="checkAll10" id="checkAll10"/></label>
								<label class="control-label">Select All</label>
								<br>
								<input type="checkbox" value="11" class="child_auction customer" id="auction" name="permission[]"/></label>
								<label class="control-label">Auction </label>	
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="11.1" class="child_auction customer" id="auction_add" name="add[]"/></label>
								<span class="control-label">Add</span>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="11.2" class="child_auction customer" id="auction_edit" name="edit[]"/></label>
								<span class="control-label">Edit</span>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="11.3" class="child_auction customer" id="auction_delete" name="delete[]"/></label>
								<span class="control-label">Delete</span>
							</div>		
							
                            <div class="col-sm-2 col-md-2" id="tab12">	
							   <input type="checkbox" name="checkAll11" id="checkAll11"/>
								<label class="control-label">Select All</label>
								<br>
								<input type="checkbox" value="12" class="child_collection customer" id="collection" name="permission[]"/></label>
								<label class="control-label">Feedback</label>	
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="12.1" class="child_collection customer" id="collection_add" name="add[]"/></label>
								<span class="control-label">Add</span>
								<br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="hidden" value="12.1" class="child_collection customer" id="collection_delete" name="delete[]"/></label>
								<span class="control-label"></span>
								<br>
							</div>			

                               <div class="col-sm-1 col-md-1" id="tab75">	
								<input type="checkbox" value="d13" class="child_collection customer" id="collection" name="permission[]"/></label>
								<label class="control-label">Dummy chits </label>	
								<br>
								</div>
								<div class="col-sm-1 col-md-1" id="tab75">	
								<input type="checkbox" value="r75" class="child_collection customer" id="collection" name="permission[]"/></label>
								<label class="control-label">Subscriber Document details </label>	
								<br>
							</div>									
						</div></div>


         
          
        </div>
        <div class="col-md-7 text-right">
          <button class="btn btn-success submit" name="add" type="button">Submit</button>
        </div>
      </form>
    </div>
     <script src="{{asset('assets/js/master/capitalize.js')}}"></script>
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
	var mas_id = $("#employee_head");
    $('#employee_head').change(function(){
        if(this.checked)
            $('#employee_div').fadeIn('slow');
        else
            $('#employee_div').fadeOut('slow');

    });
});

$(document).ready(function(){
	var mas_id = $("#customer_head");
    $('#customer_head').change(function(){
        if(this.checked)
            $('#customer_div').fadeIn('slow');
        else
            $('#customer_div').fadeOut('slow');

    });
});

$(document).ready(function(){
	var mas_id = $("#report_head_out");
    $('#report_head_out').change(function(){
        if(this.checked)
            $('#report_div_out').fadeIn('slow');
        else
            $('#report_div_out').fadeOut('slow');

    });
});

$(document).ready(function(){
	var mas_id = $("#report_head_auc");
    $('#report_head_auc').change(function(){
        if(this.checked)
            $('#report_div_auc').fadeIn('slow');
        else
            $('#report_div_auc').fadeOut('slow');

    });
});

$(document).ready(function(){
	var mas_id = $("#report_head_bid");
    $('#report_head_bid').change(function(){
        if(this.checked)
            $('#report_div_bid').fadeIn('slow');
        else
            $('#report_div_bid').fadeOut('slow');

    });
});

$(document).ready(function(){
	var mas_id = $("#report_head_rec");
    $('#report_head_rec').change(function(){
        if(this.checked)
            $('#report_div_rec').fadeIn('slow');
        else
            $('#report_div_rec').fadeOut('slow');

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
@endsection

