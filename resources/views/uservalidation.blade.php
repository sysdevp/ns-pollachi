@extends('admin.layout.app')
@section('content')
<?php
use App\Mandatoryfields;
?>
<style>
.maseterheading{
	background: #e0dddd;
    padding: 13px;
    margin-bottom: 10px;
}
.mastersubheading{
width: 100%;
    background: #efefef;
    padding: 15px;
    margin: 21px;
    margin-top: 0px;
}
.mastersubheading1{
    width: 100%;
    background: #efefef;
    padding: 15px;
    margin: 21px;
    margin-top: 0px;
    margin-left: 15px;
    margin-right: -59px;
}
.mastersubheading2{
background: #fff;
    margin: 15px;
    padding: 15px;
    border-radius: 10px;
    margin-top: 4px;
	
	}
	.close {
    float: right;
    font-size: 1.5rem;
    font-weight: 700;
    line-height: 1;
    color: #000 !important ;
    text-shadow: none !important;
    /* opacity: .5; */
}
	.masterdivleft{margin-left: 8px;}


input:checked + .tab-label {
}
input:checked + .tab-label::after {
  transform: rotate(90deg);
}
input:checked ~ .tab-content {
  max-height: 100vh;
  padding: 3px;
}
  
  .plus{        font-weight: bold;
    font-size: 26px;
    line-height: 47px;
    position: absolute;
   left: 53px;
    margin-top: -15px;}
	
	 .plus1{        font-weight: bold;
    font-size: 26px;
    line-height: 57px;
    position: absolute;
    left: 15px;
    margin-top: -9px;}
	
	
	.accordionWrapper{padding:30px;background:#fff;float:left;width:100%;box-sizing:border-box; }
.accordionItem{
    float:left;
    display:block;
    width:100%;
    box-sizing: border-box;
    font-family:'Open-sans',Arial,sans-serif;
}
.accordionItemHeading{
   cursor: pointer;
    margin: 0px 0px 10px 0px;
    padding: 15px;
    background: #e0dddd;
    color: #000;
    width: 6%;
    box-sizing: border-box;
	    text-align: center; font-size:15px;
}
.close .accordionItemContent{
    height:0px;
    transition:height 1s ease-out;
	transform: scaleY(0);
    float:left;
    display:block;
    
    
}
.open .accordionItemContent{
        padding: 10px;
    background-color: #fff;
    border: 1px solid #ddd;
    width: 100%;
    margin: 0px 0px 10px 0px;
    display:block;
	transform: scaleY(1);
	transform-origin: top;
	transition: transform 0.4s ease;
        box-sizing: border-box;
		    background: #efefef;
}

.open .accordionItemHeading{
  
}
.masterbg{ background: #e3e0e0;
    padding: 10px;
    margin-bottom: 13px;
    margin-top: -40px;}
	
	
	.locationbg{background: #efefef;}
	.locationdivbg {background: #efefef;padding: 18px;}
	.addbg{font-size: 18px; color: #000;}
		.margintop{margin-top:10px !important;}

        .page-wrapper {
    height: auto;
    overflow: hidden;
}

</style>

<main class="page-content">

<div class="col-12 body-sec">
  <div class="card container-fluid px-0">
    <!-- card header start@ -->
    <div class="card-header px-2">
      <div class="row">
        <div class="col-4">
          <h3>Mandatory Fields</h3>
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
    
      <form  method="post" class="form-horizontal needs-validation" novalidate action="{{url('mandatoryfields/store')}}" enctype="multipart/form-data">
      {{csrf_field()}}

        <div class="form-row">
            <span class="mandatory"> {{ $errors->first('permission.*')  }} </span>
         
		  
          </div>

			<div id="accordionExample" style="width: -webkit-fill-available; padding: 5px;">  
			
			<div class="parent" id="masters_div">
     
			<div class="card-header masterbg margintop" id="heading">
                            
					<button type="button" class="btn btn-link" data-toggle="collapse" data-target="#collapseOne"><i class="fa fa-plus addbg"></i></button>	
				
							 <!-- <input style=" text-align: center;" value="h1" type="checkbox"  class="masters_head" id="masters_head" name="permission[]"/> -->
                              <b>Master</b></h4>
							 
           </div>
				
	   
   		    <div id="collapseOne" class="collapse" data-parent="#accordionExample">			
		
			<div id="accordionExample1">
				
				<div class="subparent">
					
						 <div class="card-header locationbg">
							<button type="button" class="btn btn-link" data-toggle="collapse" data-target="#collapselocation"><i class="fa fa-plus addbg"></i></button>
							 <!-- <input type="checkbox" name="checkAll" id="location_head"/> -->
                              Location
						</div>
					
					
						<div id="collapselocation" class="collapse" data-parent="#accordionExample1">
							
							<div class="locationdivbg">
								
				<div class="row" id="location_div">

        <!-- State -->
                    <div class="col-lg-2 mastersubheading2">
                        <div class="" id="tab1">		

                        <label class="control-label">State</label>
                        <br>
                        <!-- <input type="checkbox"  c >  
                        <label class="control-label">Select All</label>
                        <br> -->
                        <input type="checkbox"  name="permission[]" class="state_list" value="state_name" <?php echo Mandatoryfields::checkbox('state_name'); ?>>  
                        <span class="control-label">State Name</span>
                        <br>                                                                                    
                        <input type="checkbox" name="permission[]" class="state_list" value="state_code" <?php echo Mandatoryfields::checkbox('state_code'); ?>>  
                        <span class="control-label">State Code</span>
                        <br>                                                                                        
                        <input type="checkbox" name="permission[]" class="state_list" value="state_remark" <?php echo Mandatoryfields::checkbox('state_remark'); ?>>  
                        <span class="control-label">Remarks</span>
                    </div>	
                </div>
									
									<!-- District -->
				<div class="col-lg-2 mastersubheading2">
                    <div class="" id="tab2">
                        <label class="control-label">District</label>
                        <br>                       
                        <input type="checkbox" name="permission[]" class="district_list" value="district_name" <?php echo Mandatoryfields::checkbox('district_name'); ?>>   
                        <span class="control-label">District Name</span>
                        <br>                    
                        <input type="checkbox" name="permission[]" class="district_list" value="district_state_id" <?php echo Mandatoryfields::checkbox('district_state_id'); ?>>  
                        <span class="control-label">State Name</span>
                        <br>                    
                        <input type="checkbox" name="permission[]" class="district_list" value="district_remark" <?php echo Mandatoryfields::checkbox('district_remark'); ?>>  
                        <span class="control-label">Remarks</span>
                    </div>	
                </div>
           							<!--City  -->
           
                         <div class="col-lg-2 mastersubheading2">
                    <div class="" id="tab3">
                        <label class="control-label">City</label>
                        <br>                       
                        <input type="checkbox" name="permission[]" class="city_list" value="city_state_id" <?php echo Mandatoryfields::checkbox('city_state_id'); ?>>  
                        <span class="control-label">State</span>
                        <br>                       
                        <input type="checkbox" name="permission[]" class="city_list" value="city_district_id" <?php echo Mandatoryfields::checkbox('city_district_id'); ?>>  
                        <span class="control-label">District</span>
                        <br>                    
                        <input type="checkbox" name="permission[]" class="city_list" value="city_name" <?php echo Mandatoryfields::checkbox('city_name'); ?>>   
                        <span class="control-label">City Name</span>
                        <br>                    
                        <input type="checkbox" name="permission[]" class="city_list" value="city_remark" <?php echo Mandatoryfields::checkbox('city_remark'); ?>>  
                        <span class="control-label">Remarks</span>
                    </div>	
                </div>   
            <!--Location type  -->

            <div class="col-lg-2 mastersubheading2">
                    <div class="" id="tab4">
                        <label class="control-label">Location Type</label>
                        <br>                    
                        <input type="checkbox" name="permission[]" class="locationtype_name" value="locationtype_name" <?php echo Mandatoryfields::checkbox('locationtype_name'); ?>>   
                        <span class="control-label">Location Type</span>
                        <br>                    
                        <input type="checkbox" name="permission[]" class="locationtype_remark" value="locationtype_remark" <?php echo Mandatoryfields::checkbox('locationtype_remark'); ?>>  
                        <span class="control-label">Remarks</span>
                    </div>	
                </div>   

            <!--Address Type  -->
            <div class="col-lg-2 mastersubheading2">
                    <div class="" id="tab5">
                        <label class="control-label">Address Type</label>
                        <br>                    
                        <input type="checkbox" name="permission[]" class="addresstype_name" value="addresstype_name" <?php echo Mandatoryfields::checkbox('addresstype_name'); ?>>   
                        <span class="control-label">Address Type</span>
                        <br>                    
                        <input type="checkbox" name="permission[]" class="addresstype_remark" value="addresstype_remark" <?php echo Mandatoryfields::checkbox('addresstype_remark'); ?>>  
                        <span class="control-label">Remarks</span>
                    </div>	
                </div>  

                <!--Company Location  -->
            <div class="col-lg-2 mastersubheading2">
                    <div class="" id="tab5">
                        <label class="control-label">Company Location</label>
                        <br>                    
                        <input type="checkbox" name="permission[]" class="companylocation_name" value="companylocation_name" <?php echo Mandatoryfields::checkbox('companylocation_name'); ?>>   
                        <span class="control-label">Locatio Name</span>
                        <br>                    
                        <input type="checkbox" name="permission[]" class="companylocation_locationtypeid" value="companylocation_locationtypeid" <?php echo Mandatoryfields::checkbox('companylocation_locationtypeid'); ?>>  
                        <span class="control-label">Location Type</span>
                        <br>
                        <input type="checkbox" name="permission[]" class="companylocation_addressline1" value="companylocation_addressline1" <?php echo Mandatoryfields::checkbox('companylocation_addressline1'); ?>>  
                        <span class="control-label">Address Line 1</span>
                        <br>
                        <input type="checkbox" name="permission[]" class="companylocation_addressline2" value="companylocation_addressline2" <?php echo Mandatoryfields::checkbox('companylocation_addressline2'); ?>>  
                        <span class="control-label">Address Line 2</span>
                        <br>
                        <input type="checkbox" name="permission[]" class="companylocation_landmark" value="companylocation_landmark" <?php echo Mandatoryfields::checkbox('companylocation_landmark'); ?>>  
                        <span class="control-label">Land Mark</span>
                        <br>
                        <input type="checkbox" name="permission[]" class="companylocation_stateid" value="companylocation_stateid" <?php echo Mandatoryfields::checkbox('companylocation_stateid'); ?>>  
                        <span class="control-label">State</span>
                        <br>
                        <input type="checkbox" name="permission[]" class="companylocation_districtid" value="companylocation_districtid" <?php echo Mandatoryfields::checkbox('companylocation_districtid'); ?>>  
                        <span class="control-label">District</span>
                        <br>
                        <input type="checkbox" name="permission[]" class="companylocation_cityid" value="companylocation_cityid" <?php echo Mandatoryfields::checkbox('companylocation_cityid'); ?>>  
                        <span class="control-label">City</span>
                        <br>
                        <input type="checkbox" name="permission[]" class="companylocation_postalcode" value="companylocation_postalcode" <?php echo Mandatoryfields::checkbox('companylocation_postalcode'); ?>>  
                        <span class="control-label">Postal Code</span>
                        <br>
                    </div>  
                </div> 

            <!-- Ho Details -->
            <!-- <div class="col-lg-2 mastersubheading2">
                    <div class="" id="tab6">
                        <label class="control-label">Ho Details</label>
                        <br>                    
                        <input type="checkbox" name="permission[]" class="location_name" value="addresstype_name" <?php echo Mandatoryfields::checkbox('addresstype_name'); ?>>   
                        <span class="control-label">Location Name</span>
                        <br>                    
                        <input type="checkbox" name="permission[]" class="addresstype_remark" value="addresstype_remark" <?php echo Mandatoryfields::checkbox('addresstype_remark'); ?>>  
                        <span class="control-label">Address Line1</span>
                        <br>                    
                        <input type="checkbox" name="permission[]" class="addresstype_remark" value="addresstype_remark" <?php echo Mandatoryfields::checkbox('addresstype_remark'); ?>>  
                        <span class="control-label">Address Line2</span>
                        <br>                    
                        <input type="checkbox" name="permission[]" class="addresstype_remark" value="addresstype_remark" <?php echo Mandatoryfields::checkbox('addresstype_remark'); ?>>  
                        <span class="control-label">Land Mark</span>
                        <br>                    
                        <input type="checkbox" name="permission[]" class="addresstype_remark" value="addresstype_remark" <?php echo Mandatoryfields::checkbox('addresstype_remark'); ?>>  
                        <span class="control-label">State</span>
                        <br>                    
                        <input type="checkbox" name="permission[]" class="addresstype_remark" value="addresstype_remark" <?php echo Mandatoryfields::checkbox('addresstype_remark'); ?>>  
                        <span class="control-label">District</span>
                        <br>                    
                        <input type="checkbox" name="permission[]" class="addresstype_remark" value="addresstype_remark" <?php echo Mandatoryfields::checkbox('addresstype_remark'); ?>>  
                        <span class="control-label">City</span>

                        <br>                    
                        <input type="checkbox" name="permission[]" class="addresstype_remark" value="addresstype_remark" <?php echo Mandatoryfields::checkbox('addresstype_remark'); ?>>  
                        <span class="control-label">Postal Code</span>

                    </div>	
                </div>   -->


                <!-- div end -->
								
				</div>
        </div>
							
						</div>	
					
				</div>
				
				
				
				<div class="subparent">
					
						 <div class="card-header locationbg">
							<button type="button" class="btn btn-link" data-toggle="collapse" data-target="#collapsebank"><i class="fa fa-plus addbg"></i></button>
							 <!-- <input type="checkbox" name="checkAll8" id="bank_head"/>  -->
                             Bank
						</div>
					
					
						<div id="collapsebank" class="collapse" data-parent="#accordionExample1">
							
							<div class="locationdivbg">
								
				<div class="row masterdivleft" id="bank_div">
                <div class="col-lg-2 mastersubheading2">
                    <div class="" id="tab8">		
                       <label class="control-label">Bank</label>
                       <br>

                       <input type="checkbox" name="permission[]" class="bank_name" value="bank_name" <?php echo Mandatoryfields::checkbox('bank_name'); ?>>  
                       <span class="control-label">Bank Name</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="bank_code" value="bank_code" <?php echo Mandatoryfields::checkbox('bank_code'); ?>>  
                       <span class="control-label">Bank Code</span>
                       <br>
                    </div>
                 </div>
                
                
                 <div class="col-lg-2 mastersubheading2">
                    <div class="" id="tab11">	

                       <label class="control-label">Bank Branch</label>

                       <br>
                       <input type="checkbox" name="permission[]" class="bankbranch_branch" value="bankbranch_branch" <?php echo Mandatoryfields::checkbox('bankbranch_branch'); ?>>  
                       <span class="control-label">Branch Name</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="bankbranch_bankid" value="bankbranch_bankid" <?php echo Mandatoryfields::checkbox('bankbranch_bankid'); ?>>  
                       <span class="control-label">Bank Name</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="bankbranch_ifsc" value="bankbranch_ifsc" <?php echo Mandatoryfields::checkbox('bankbranch_ifsc'); ?>>  
                       <span class="control-label">IFSC</span>
                       <br>
                    </div>
                 </div>

                 <div class="col-lg-2 mastersubheading2">
                    <div class="" id="tab8">        
                       <label class="control-label">Denomination</label>
                       <br>

                       <input type="checkbox" name="permission[]" class="denomination_amount" value="denomination_amount" <?php echo Mandatoryfields::checkbox('denomination_amount'); ?>>  
                       <span class="control-label">Amount</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="denomination_remark" value="denomination_remark" <?php echo Mandatoryfields::checkbox('denomination_remark'); ?>>  
                       <span class="control-label">Remark</span>
                       <br>
                    </div>
                 </div>

                 <div class="col-lg-2 mastersubheading2">
                    <div class="" id="tab8">        
                       <label class="control-label">Accounts Type</label>
                       <br>

                       <input type="checkbox" name="permission[]" class="accountstype_name" value="accountstype_name" <?php echo Mandatoryfields::checkbox('accountstype_name'); ?>>  
                       <span class="control-label">Account Type</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="accountstype_remark" value="accountstype_remark" <?php echo Mandatoryfields::checkbox('accountstype_remark'); ?>>  
                       <span class="control-label">Remark</span>
                       <br>
                    </div>
                 </div>

                 <div class="col-lg-2 mastersubheading2">
                    <div class="" id="tab8">        
                       <label class="control-label">Company Bank</label>
                       <br>

                       <input type="checkbox" name="permission[]" class="companybank_bankid" value="companybank_bankid" <?php echo Mandatoryfields::checkbox('companybank_bankid'); ?>>  
                       <span class="control-label">Bank</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="companybank_bankbranchid" value="companybank_bankbranchid" <?php echo Mandatoryfields::checkbox('companybank_bankbranchid'); ?>>  
                       <span class="control-label">Branch Name</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="companybank_accounttypeid" value="companybank_accounttypeid" <?php echo Mandatoryfields::checkbox('companybank_accounttypeid'); ?>>  
                       <span class="control-label">Account Type</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="companybank_holdername" value="companybank_holdername" <?php echo Mandatoryfields::checkbox('companybank_holdername'); ?>>  
                       <span class="control-label">Account Holder</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="companybank_accountno" value="companybank_accountno" <?php echo Mandatoryfields::checkbox('companybank_accountno'); ?>>  
                       <span class="control-label">Account No</span>
                       <br>
                       
                    </div>
                 </div>

			</div>
        </div>
							
						</div>	
					
				</div>





                <div class="subparent">
                    
                         <div class="card-header locationbg">
                            <button type="button" class="btn btn-link" data-toggle="collapse" data-target="#collapseemployee"><i class="fa fa-plus addbg"></i></button>
                             <!-- <input type="checkbox" name="checkAll8" id="bank_head"/>  -->
                            Employee
                        </div>
                    
                    
                        <div id="collapseemployee" class="collapse" data-parent="#accordionExample1">
                            
                            <div class="locationdivbg">
                                
                <div class="row masterdivleft" id="employee_div">
                <div class="col-lg-2 mastersubheading2">
                    <div class="" id="tab8">        
                       <label class="control-label">Department</label>
                       <br>

                       <input type="checkbox" name="permission[]" class="department_name" value="department_name" <?php echo Mandatoryfields::checkbox('department_name'); ?>>  
                       <span class="control-label">Department Name</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="department_shortname" value="department_shortname" <?php echo Mandatoryfields::checkbox('department_shortname'); ?>>  
                       <span class="control-label">Short Name</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="department_remark" value="department_remark" <?php echo Mandatoryfields::checkbox('department_remark'); ?>>  
                       <span class="control-label">Remark</span>
                       <br>
                    </div>
                 </div>
                
                <div class="col-lg-2 mastersubheading2">
                    <div class="" id="tab8">        
                       <label class="control-label">Role</label>
                       <br>

                       <input type="checkbox" name="permission[]" class="designation_name" value="designation_name" <?php echo Mandatoryfields::checkbox('designation_name'); ?>>  
                       <span class="control-label">Role Name</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="designation_shortname" value="designation_shortname" <?php echo Mandatoryfields::checkbox('designation_shortname'); ?>>  
                       <span class="control-label">Short Name</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="designation_remark" value="designation_remark" <?php echo Mandatoryfields::checkbox('designation_remark'); ?>>  
                       <span class="control-label">Remark</span>
                       <br>
                    </div>
                 </div>

                 <div class="col-lg-2 mastersubheading2">
                    <div class="" id="tab8">        
                       <label class="control-label">Employee</label>
                       <br>

                       <input type="checkbox" name="permission[]" class="employee_name" value="employee_name" <?php echo Mandatoryfields::checkbox('employee_name'); ?>>  
                       <span class="control-label">Employee Name</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="employee_code" value="employee_code" <?php echo Mandatoryfields::checkbox('employee_code'); ?>>  
                       <span class="control-label">Employee Code</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="employee_phoneno" value="employee_phoneno" <?php echo Mandatoryfields::checkbox('employee_phoneno'); ?>>  
                       <span class="control-label">Phone No</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="employee_email" value="employee_email" <?php echo Mandatoryfields::checkbox('employee_email'); ?>>  
                       <span class="control-label">Email</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="employee_dob" value="employee_dob" <?php echo Mandatoryfields::checkbox('employee_dob'); ?>>  
                       <span class="control-label">DOB</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="employee_departmentid" value="employee_departmentid" <?php echo Mandatoryfields::checkbox('employee_departmentid'); ?>>  
                       <span class="control-label">Department</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="employee_fathername" value="employee_fathername" <?php echo Mandatoryfields::checkbox('employee_fathername'); ?>>  
                       <span class="control-label">Father Name</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="employee_bloodgroup" value="employee_bloodgroup" <?php echo Mandatoryfields::checkbox('employee_bloodgroup'); ?>>  
                       <span class="control-label">Blood Group</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="employee_materialstatus" value="employee_materialstatus" <?php echo Mandatoryfields::checkbox('employee_materialstatus'); ?>>  
                       <span class="control-label">Marital Status</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="employee_profile" value="employee_profile" <?php echo Mandatoryfields::checkbox('employee_profile'); ?>>  
                       <span class="control-label">Photo</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="employee_accessno" value="employee_accessno" <?php echo Mandatoryfields::checkbox('employee_accessno'); ?>>  
                       <span class="control-label">Access No</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="employee_addresstypeid" value="employee_addresstypeid" <?php echo Mandatoryfields::checkbox('employee_addresstypeid'); ?>>  
                       <span class="control-label">Address Type</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="employee_addressline1" value="employee_addressline1" <?php echo Mandatoryfields::checkbox('employee_addressline1'); ?>>  
                       <span class="control-label">Address Line 1</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="employee_addressline2" value="employee_addressline2" <?php echo Mandatoryfields::checkbox('employee_addressline2'); ?>>  
                       <span class="control-label">Address Line 2</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="employee_landmark" value="employee_landmark" <?php echo Mandatoryfields::checkbox('employee_landmark'); ?>>  
                       <span class="control-label">Land Mark</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="employee_stateid" value="employee_stateid" <?php echo Mandatoryfields::checkbox('employee_stateid'); ?>>  
                       <span class="control-label">State</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="employee_districtid" value="employee_districtid" <?php echo Mandatoryfields::checkbox('employee_districtid'); ?>>  
                       <span class="control-label">District</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="employee_cityid" value="employee_cityid" <?php echo Mandatoryfields::checkbox('employee_cityid'); ?>>  
                       <span class="control-label">City</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="employee_postalcode" value="employee_postalcode" <?php echo Mandatoryfields::checkbox('employee_postalcode'); ?>>  
                       <span class="control-label">Postal Code</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="employee_proofname" value="employee_proofname" <?php echo Mandatoryfields::checkbox('employee_proofname'); ?>>  
                       <span class="control-label">Proof Name</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="employee_proofnumber" value="employee_proofnumber" <?php echo Mandatoryfields::checkbox('employee_proofnumber'); ?>>  
                       <span class="control-label">Proof Number</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="employee_file" value="employee_file" <?php echo Mandatoryfields::checkbox('employee_file'); ?>>  
                       <span class="control-label">Proof File</span>
                       <br>

                    </div>
                 </div>
                

            </div>
        </div>
                            
                        </div>  
                    
                </div>



                <div class="subparent">
                    
                         <div class="card-header locationbg">
                            <button type="button" class="btn btn-link" data-toggle="collapse" data-target="#collapseuser"><i class="fa fa-plus addbg"></i></button>
                             <!-- <input type="checkbox" name="checkAll8" id="user_head"/>  -->
                            User
                        </div>
                    
                    
                        <div id="collapseuser" class="collapse" data-parent="#accordionExample1">
                            
                            <div class="locationdivbg">
                                
                <div class="row masterdivleft" id="user_div">
                <div class="col-lg-2 mastersubheading2">
                    <div class="" id="tab8">        
                       <label class="control-label">User Creation</label>
                       <br>

                       <input type="checkbox" name="permission[]" class="usercreation_employeeid" value="usercreation_employeeid" <?php echo Mandatoryfields::checkbox('usercreation_employeeid'); ?>>  
                       <span class="control-label">Name</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="usercreation_username" value="usercreation_username" <?php echo Mandatoryfields::checkbox('usercreation_username'); ?>>  
                       <span class="control-label">User Name</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="usercreation_password" value="usercreation_password" <?php echo Mandatoryfields::checkbox('usercreation_password'); ?>>  
                       <span class="control-label">Password</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="usercreation_confirmpassword" value="usercreation_confirmpassword" <?php echo Mandatoryfields::checkbox('usercreation_confirmpassword'); ?>>  
                       <span class="control-label">Confirm Password</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="usercreation_roleid" value="usercreation_roleid" <?php echo Mandatoryfields::checkbox('usercreation_roleid'); ?>>  
                       <span class="control-label">Role</span>
                       <br>
                    </div>
                 </div>
                
                
                 <div class="col-lg-2 mastersubheading2">
                    <div class="" id="tab11">   

                       <label class="control-label">User Access</label>

                       <br>
                       <input type="checkbox" name="permission[]" class="useraccess_role" value="useraccess_role" <?php echo Mandatoryfields::checkbox('useraccess_role'); ?>>  
                       <span class="control-label">Role</span>
                       <br>
                    </div>
                 </div>


            </div>
        </div>
                            
                        </div>  
                    
                </div>


                <div class="subparent">
                    
                         <div class="card-header locationbg">
                            <button type="button" class="btn btn-link" data-toggle="collapse" data-target="#collapseoffer"><i class="fa fa-plus addbg"></i></button>
                             <!-- <input type="checkbox" name="checkAll8" id="user_head"/>  -->
                            Offers
                        </div>
                    
                    
                        <div id="collapseoffer" class="collapse" data-parent="#accordionExample1">
                            
                            <div class="locationdivbg">
                                
                <div class="row masterdivleft" id="offer_div">
                <div class="col-lg-2 mastersubheading2">
                    <div class="" id="tab8">        
                       <label class="control-label">Gift Voucher</label>
                       <br>

                       <input type="checkbox" name="permission[]" class="giftvoucher_name" value="giftvoucher_name" <?php echo Mandatoryfields::checkbox('giftvoucher_name'); ?>>  
                       <span class="control-label">Gift Voucher Name</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="giftvoucher_code" value="giftvoucher_code" <?php echo Mandatoryfields::checkbox('giftvoucher_code'); ?>>  
                       <span class="control-label">Gift Voucher Prefix Code</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="giftvoucher_value" value="giftvoucher_value" <?php echo Mandatoryfields::checkbox('giftvoucher_value'); ?>>  
                       <span class="control-label">Gift Voucher Value</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="giftvoucher_quantity" value="giftvoucher_quantity" <?php echo Mandatoryfields::checkbox('giftvoucher_quantity'); ?>>  
                       <span class="control-label">Quantity</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="giftvoucher_validfrom" value="giftvoucher_validfrom" <?php echo Mandatoryfields::checkbox('giftvoucher_validfrom'); ?>>  
                       <span class="control-label">Valid From Date</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="giftvoucher_validto" value="giftvoucher_validto" <?php echo Mandatoryfields::checkbox('giftvoucher_validto'); ?>>  
                       <span class="control-label">Valid To Date</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="giftvoucher_remark" value="giftvoucher_remark" <?php echo Mandatoryfields::checkbox('giftvoucher_remark'); ?>>  
                       <span class="control-label">Remark</span>
                       <br>
                    </div>
                 </div>
                
                
                 <div class="col-lg-2 mastersubheading2">
                    <div class="" id="tab11">   

                       <label class="control-label">Offers</label>

                       <br>
                       <input type="checkbox" name="permission[]" class="offer_name" value="offer_name" <?php echo Mandatoryfields::checkbox('offer_name'); ?>>  
                       <span class="control-label">Offer Name</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="offer_categoryid" value="offer_categoryid" <?php echo Mandatoryfields::checkbox('offer_categoryid'); ?>>  
                       <span class="control-label">Choose Category</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="offer_items" value="offer_items" <?php echo Mandatoryfields::checkbox('offer_items'); ?>>  
                       <span class="control-label">Select Items</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="offer_offertype" value="offer_offertype" <?php echo Mandatoryfields::checkbox('offer_offertype'); ?>>  
                       <span class="control-label">Select Offer Type</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="offer_validfrom" value="offer_validfrom" <?php echo Mandatoryfields::checkbox('offer_validfrom'); ?>>  
                       <span class="control-label">Select From  Offer date</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="offer_validto" value="offer_validto" <?php echo Mandatoryfields::checkbox('offer_validto'); ?>>  
                       <span class="control-label">Select To  Offer date</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="offer_variable" value="offer_variable" <?php echo Mandatoryfields::checkbox('offer_variable'); ?>>  
                       <span class="control-label">Select variable type</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="offer_fromtime" value="offer_fromtime" <?php echo Mandatoryfields::checkbox('offer_fromtime'); ?>>  
                       <span class="control-label">Select Offer time</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="offer_value" value="offer_value" <?php echo Mandatoryfields::checkbox('offer_value'); ?>>  
                       <span class="control-label">Enter variable value</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="offer_comments" value="offer_comments" <?php echo Mandatoryfields::checkbox('offer_comments'); ?>>  
                       <span class="control-label">Comments</span>
                       <br>
                    </div>
                 </div>

                 <div class="col-lg-2 mastersubheading2">
                    <div class="" id="tab11">   

                       <label class="control-label">Item Wise Offers</label>

                       <br>
                       <input type="checkbox" name="permission[]" class="itemwiseoffer_name" value="itemwiseoffer_name" <?php echo Mandatoryfields::checkbox('itemwiseoffer_name'); ?>>  
                       <span class="control-label">Offer Name</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="itemwiseoffer_code" value="itemwiseoffer_code" <?php echo Mandatoryfields::checkbox('itemwiseoffer_code'); ?>>  
                       <span class="control-label">Offer Code</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="itemwiseoffer_validfrom" value="itemwiseoffer_validfrom" <?php echo Mandatoryfields::checkbox('itemwiseoffer_validfrom'); ?>>  
                       <span class="control-label">Valid From Date</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="itemwiseoffer_validto" value="itemwiseoffer_validto" <?php echo Mandatoryfields::checkbox('itemwiseoffer_validto'); ?>>  
                       <span class="control-label">Valid To Date</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="itemwiseoffer_buyitemid" value="itemwiseoffer_buyitemid" <?php echo Mandatoryfields::checkbox('itemwiseoffer_buyitemid'); ?>>  
                       <span class="control-label">Buy Item Name</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="itemwiseoffer_buyitemquantity" value="itemwiseoffer_buyitemquantity" <?php echo Mandatoryfields::checkbox('itemwiseoffer_buyitemquantity'); ?>>  
                       <span class="control-label">Buy Quantity</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="itemwiseoffer_getitemid" value="itemwiseoffer_getitemid" <?php echo Mandatoryfields::checkbox('itemwiseoffer_getitemid'); ?>>  
                       <span class="control-label">Get Item Name</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="itemwiseoffer_getitemquantity" value="itemwiseoffer_getitemquantity" <?php echo Mandatoryfields::checkbox('itemwiseoffer_getitemquantity'); ?>>  
                       <span class="control-label">Get Item Quantity</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="itemwiseoffer_remark" value="itemwiseoffer_remark" <?php echo Mandatoryfields::checkbox('itemwiseoffer_remark'); ?>>  
                       <span class="control-label">Remark</span>
                       <br>
                       
                    </div>
                 </div>

                 <div class="col-lg-2 mastersubheading2">
                    <div class="" id="tab8">        
                       <label class="control-label">Item Wastage</label>
                       <br>

                       <input type="checkbox" name="permission[]" class="itemwastage_locationid" value="itemwastage_locationid" <?php echo Mandatoryfields::checkbox('itemwastage_locationid'); ?>>  
                       <span class="control-label">Location</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="itemwastage_entrydate" value="itemwastage_entrydate" <?php echo Mandatoryfields::checkbox('itemwastage_entrydate'); ?>>  
                       <span class="control-label">Date</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="itemwastage_itemid" value="itemwastage_itemid" <?php echo Mandatoryfields::checkbox('itemwastage_itemid'); ?>>  
                       <span class="control-label">Wastage Item Name</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="itemwastage_quantity" value="itemwastage_quantity" <?php echo Mandatoryfields::checkbox('itemwastage_quantity'); ?>>  
                       <span class="control-label">Quantity</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="itemwastage_uomid" value="itemwastage_uomid" <?php echo Mandatoryfields::checkbox('itemwastage_uomid'); ?>>  
                       <span class="control-label">UOM</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="itemwastage_remark" value="itemwastage_remark" <?php echo Mandatoryfields::checkbox('itemwastage_remark'); ?>>  
                       <span class="control-label">Remark</span>
                       <br>
                    </div>
                 </div>


            </div>
        </div>
                            
                        </div>  
                    
                </div>


                <div class="subparent">
                    
                         <div class="card-header locationbg">
                            <button type="button" class="btn btn-link" data-toggle="collapse" data-target="#collapsecategory"><i class="fa fa-plus addbg"></i></button>
                             <!-- <input type="checkbox" name="checkAll8" id="user_head"/>  -->
                            Category
                        </div>
                    
                    
                        <div id="collapsecategory" class="collapse" data-parent="#accordionExample1">
                            
                            <div class="locationdivbg">
                                
                <div class="row masterdivleft" id="category_div">
                <div class="col-lg-2 mastersubheading2">
                    <div class="" id="tab8">        
                       <label class="control-label">Category</label>
                       <br>

                       <input type="checkbox" name="permission[]" class="category_parentid" value="category_parentid" <?php echo Mandatoryfields::checkbox('category_parentid'); ?>>  
                       <span class="control-label">Belongs To</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="category_name" value="category_name" <?php echo Mandatoryfields::checkbox('category_name'); ?>>  
                       <span class="control-label">Category Name</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="category_hsn" value="category_hsn" <?php echo Mandatoryfields::checkbox('category_hsn'); ?>>  
                       <span class="control-label">HSN</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="category_gstno" value="category_gstno" <?php echo Mandatoryfields::checkbox('category_gstno'); ?>>  
                       <span class="control-label">GST</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="category_remark" value="category_remark" <?php echo Mandatoryfields::checkbox('category_remark'); ?>>  
                       <span class="control-label">Remark</span>
                       <br>
                    </div>
                 </div>
                
                
                 <div class="col-lg-2 mastersubheading2">
                    <div class="" id="tab11">   

                       <label class="control-label">Brand</label>

                       <br>
                       <input type="checkbox" name="permission[]" class="brand_name" value="brand_name" <?php echo Mandatoryfields::checkbox('brand_name'); ?>>  
                       <span class="control-label">Brand Name</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="brand_code" value="brand_code" <?php echo Mandatoryfields::checkbox('brand_code'); ?>>  
                       <span class="control-label">Brand Code</span>
                       <br>
                    </div>
                 </div>


            </div>
        </div>
                            
                        </div>  
                    
                </div>


                <div class="subparent">
                    
                         <div class="card-header locationbg">
                            <button type="button" class="btn btn-link" data-toggle="collapse" data-target="#collapselanguage"><i class="fa fa-plus addbg"></i></button>
                             <!-- <input type="checkbox" name="checkAll8" id="user_head"/>  -->
                            Language
                        </div>
                    
                    
                        <div id="collapselanguage" class="collapse" data-parent="#accordionExample1">
                            
                            <div class="locationdivbg">
                                
                <div class="row masterdivleft" id="language_div">
                <div class="col-lg-2 mastersubheading2">
                    <div class="" id="tab8">        
                       <label class="control-label">Language</label>
                       <br>

                       <input type="checkbox" name="permission[]" class="language_language1" value="language_language1" <?php echo Mandatoryfields::checkbox('language_language1'); ?>>  
                       <span class="control-label">Language 1</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="language_language2" value="language_language2" <?php echo Mandatoryfields::checkbox('language_language2'); ?>>  
                       <span class="control-label">language 2</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="language_language3" value="language_language3" <?php echo Mandatoryfields::checkbox('language_language3'); ?>>  
                       <span class="control-label">language 3</span>
                       <br>
                    </div>
                 </div>


            </div>
        </div>
                            
                        </div>  
                    
                </div>



                <div class="subparent">
                    
                         <div class="card-header locationbg">
                            <button type="button" class="btn btn-link" data-toggle="collapse" data-target="#collapseitem"><i class="fa fa-plus addbg"></i></button>
                             <!-- <input type="checkbox" name="checkAll8" id="user_head"/>  -->
                            Item
                        </div>
                    
                    
                        <div id="collapseitem" class="collapse" data-parent="#accordionExample1">
                            
                            <div class="locationdivbg">
                                
                <div class="row masterdivleft" id="item_div">
                <div class="col-lg-2 mastersubheading2">
                    <div class="" id="tab8">        
                       <label class="control-label">UOM</label>
                       <br>

                       <input type="checkbox" name="permission[]" class="uom_name" value="uom_name" <?php echo Mandatoryfields::checkbox('uom_name'); ?>>  
                       <span class="control-label">Name</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="uom_description" value="uom_description" <?php echo Mandatoryfields::checkbox('uom_description'); ?>>  
                       <span class="control-label">Description</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="uom_remark" value="uom_remark" <?php echo Mandatoryfields::checkbox('uom_remark'); ?>>  
                       <span class="control-label">Remark</span>
                       <br>
                    </div>
                 </div>

                 <div class="col-lg-2 mastersubheading2">
                    <div class="" id="tab8">        
                       <label class="control-label">Tax</label>
                       <br>

                       <input type="checkbox" name="permission[]" class="tax_taxname" value="tax_taxname" <?php echo Mandatoryfields::checkbox('tax_taxname'); ?>>  
                       <span class="control-label">Tax Name</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="tax_remark" value="tax_remark" <?php echo Mandatoryfields::checkbox('tax_remark'); ?>>  
                       <span class="control-label">Remark</span>
                       <br>
                       
                    </div>
                 </div>

                 <div class="col-lg-2 mastersubheading2">
                    <div class="" id="tab8">        
                       <label class="control-label">item</label>
                       <br>

                       <input type="checkbox" name="permission[]" class="item_name" value="item_name" <?php echo Mandatoryfields::checkbox('item_name'); ?>>  
                       <span class="control-label">Item Name</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="item_code" value="item_code" <?php echo Mandatoryfields::checkbox('item_code'); ?>>  
                       <span class="control-label">item Code</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="item_brandid" value="item_brandid" <?php echo Mandatoryfields::checkbox('item_brandid'); ?>>  
                       <span class="control-label">Brand</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="item_categoryid" value="item_categoryid" <?php echo Mandatoryfields::checkbox('item_categoryid'); ?>>  
                       <span class="control-label">Category</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="item_itemtype" value="item_itemtype" <?php echo Mandatoryfields::checkbox('item_itemtype'); ?>>  
                       <span class="control-label">Item type</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="item_weightingrams" value="item_weightingrams" <?php echo Mandatoryfields::checkbox('item_weightingrams'); ?>>  
                       <span class="control-label">Weight In Grams</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="item_printnameinenglish" value="item_printnameinenglish" <?php echo Mandatoryfields::checkbox('item_printnameinenglish'); ?>>  
                       <span class="control-label">Print Name In English</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="item_printnameinlanguage1" value="item_printnameinlanguage1" <?php echo Mandatoryfields::checkbox('item_printnameinlanguage1'); ?>>  
                       <span class="control-label">Print Name In Tamil</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="item_printnameinlanguage2" value="item_printnameinlanguage2" <?php echo Mandatoryfields::checkbox('item_printnameinlanguage2'); ?>>  
                       <span class="control-label">Print Name in Malayalam</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="item_printnameinlanguage3" value="item_printnameinlanguage3" <?php echo Mandatoryfields::checkbox('item_printnameinlanguage3'); ?>>  
                       <span class="control-label">Print Name in Telugu</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="item_hsn" value="item_hsn" <?php echo Mandatoryfields::checkbox('item_hsn'); ?>>  
                       <span class="control-label">HSN Code</span>
                       <br> 
                       <input type="checkbox" name="permission[]" class="item_mrp" value="item_mrp" <?php echo Mandatoryfields::checkbox('item_mrp'); ?>>  
                       <span class="control-label">MRP</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="item_defaultsellingprice" value="item_defaultsellingprice" <?php echo Mandatoryfields::checkbox('item_defaultsellingprice'); ?>>  
                       <span class="control-label">Default Selling Price</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="item_uomid" value="item_uomid" <?php echo Mandatoryfields::checkbox('item_uomid'); ?>>  
                       <span class="control-label">UOM</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="item_supplierid" value="item_supplierid" <?php echo Mandatoryfields::checkbox('item_supplierid'); ?>>  
                       <span class="control-label">Supplier</span>
                       <br>
                    </div>
                 </div>


            </div>
        </div>
                            
                        </div>  
                    
                </div>


                <div class="subparent">
                    
                         <div class="card-header locationbg">
                            <button type="button" class="btn btn-link" data-toggle="collapse" data-target="#collapsepricelevel"><i class="fa fa-plus addbg"></i></button>
                             <!-- <input type="checkbox" name="checkAll8" id="user_head"/>  -->
                            Price level Settings
                        </div>
                    
                    
                        <div id="collapsepricelevel" class="collapse" data-parent="#accordionExample1">
                            
                            <div class="locationdivbg">
                                
                <div class="row masterdivleft" id="pricelevel_div">
                <div class="col-lg-2 mastersubheading2">
                    <div class="" id="tab8">        
                       <label class="control-label">Price Level</label>
                       <br>

                       <input type="checkbox" name="permission[]" class="pricelevel_level" value="pricelevel_level" <?php echo Mandatoryfields::checkbox('pricelevel_level'); ?>>  
                       <span class="control-label">Name</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="pricelevel_value" value="pricelevel_value" <?php echo Mandatoryfields::checkbox('pricelevel_value'); ?>>  
                       <span class="control-label">Value</span>
                       <br>
                    </div>
                 </div>



            </div>
        </div>
                            
                        </div>  
                    
                </div>


                 <div class="subparent">
                    
                         <div class="card-header locationbg">
                            <button type="button" class="btn btn-link" data-toggle="collapse" data-target="#collapsearea"><i class="fa fa-plus addbg"></i></button>
                             <!-- <input type="checkbox" name="checkAll8" id="user_head"/>  -->
                            Area
                        </div>
                    
                    
                        <div id="collapsearea" class="collapse" data-parent="#accordionExample1">
                            
                            <div class="locationdivbg">
                                
                <div class="row masterdivleft" id="area_div">
                <div class="col-lg-2 mastersubheading2">
                    <div class="" id="tab8">        
                       <label class="control-label">Area</label>
                       <br>

                       <input type="checkbox" name="permission[]" class="area_name" value="area_name" <?php echo Mandatoryfields::checkbox('area_name'); ?>>  
                       <span class="control-label">Area Name</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="area_code" value="area_code" <?php echo Mandatoryfields::checkbox('area_code'); ?>>  
                       <span class="control-label">Postal Code</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="area_remark" value="area_remark" <?php echo Mandatoryfields::checkbox('area_remark'); ?>>  
                       <span class="control-label">Remark</span>
                       <br>
                    </div>
                 </div>



            </div>
        </div>
                            
                        </div>  
                    
                </div>


                <div class="subparent">
                    
                         <div class="card-header locationbg">
                            <button type="button" class="btn btn-link" data-toggle="collapse" data-target="#collapseaccountgroup"><i class="fa fa-plus addbg"></i></button>
                             <!-- <input type="checkbox" name="checkAll8" id="user_head"/>  -->
                            Account Group
                        </div>
                    
                    
                        <div id="collapseaccountgroup" class="collapse" data-parent="#accordionExample1">
                            
                            <div class="locationdivbg">
                                
                <div class="row masterdivleft" id="accountgroup_div">
                <div class="col-lg-2 mastersubheading2">
                    <div class="" id="tab8">        
                       <label class="control-label">Account Group</label>
                       <br>

                       <input type="checkbox" name="permission[]" class="accountgroup_name" value="accountgroup_name" <?php echo Mandatoryfields::checkbox('accountgroup_name'); ?>>  
                       <span class="control-label">Name</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="accountgroup_under" value="accountgroup_under" <?php echo Mandatoryfields::checkbox('accountgroup_under'); ?>>  
                       <span class="control-label">Under</span>
                       <br>
                    </div>
                 </div>

                 <div class="col-lg-2 mastersubheading2">
                    <div class="" id="tab8">        
                       <label class="control-label">Account Head</label>
                       <br>

                       <input type="checkbox" name="permission[]" class="accounthead_name" value="accounthead_name" <?php echo Mandatoryfields::checkbox('accounthead_name'); ?>>  
                       <span class="control-label">Name</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="accounthead_under" value="accounthead_under" <?php echo Mandatoryfields::checkbox('accounthead_under'); ?>>  
                       <span class="control-label">Under</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="accounthead_balance" value="accounthead_balance" <?php echo Mandatoryfields::checkbox('accounthead_balance'); ?>>  
                       <span class="control-label">Opening Balance</span>
                       <br>
                    </div>
                 </div>

                 <div class="col-lg-2 mastersubheading2">
                    <div class="" id="tab8">        
                       <label class="control-label">Account Group Tax</label>
                       <br>

                       <input type="checkbox" name="permission[]" class="accountgrouptax_group" value="accountgrouptax_group" <?php echo Mandatoryfields::checkbox('accountgrouptax_group'); ?>>  
                       <span class="control-label">Account Group</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="accountgrouptax_taxname" value="accountgrouptax_taxname" <?php echo Mandatoryfields::checkbox('accountgrouptax_taxname'); ?>>  
                       <span class="control-label">Tax Name</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="accountgrouptax_taxrate" value="accountgrouptax_taxrate" <?php echo Mandatoryfields::checkbox('accountgrouptax_taxrate'); ?>>  
                       <span class="control-label">Tax</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="accountgrouptax_type" value="accountgrouptax_type" <?php echo Mandatoryfields::checkbox('accountgrouptax_type'); ?>>  
                       <span class="control-label">Type</span>
                       <br>
                    </div>
                 </div>


            </div>
        </div>
                            
                        </div>  
                    
                </div>


                <div class="subparent">
                    
                         <div class="card-header locationbg">
                            <button type="button" class="btn btn-link" data-toggle="collapse" data-target="#collapsebom"><i class="fa fa-plus addbg"></i></button>
                             <!-- <input type="checkbox" name="checkAll8" id="user_head"/>  -->
                            BOM
                        </div>
                    
                    
                        <div id="collapsebom" class="collapse" data-parent="#accordionExample1">
                            
                            <div class="locationdivbg">
                                
                <div class="row masterdivleft" id="bom_div">
                <div class="col-lg-2 mastersubheading2">
                    <div class="" id="tab8">        
                       <label class="control-label">BOM</label>
                       <br>

                       <input type="checkbox" name="permission[]" class="bom_itemname" value="bom_itemname" <?php echo Mandatoryfields::checkbox('bom_itemname'); ?>>  
                       <span class="control-label">Item Name</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="bom_itemcode" value="bom_itemcode" <?php echo Mandatoryfields::checkbox('bom_itemcode'); ?>>  
                       <span class="control-label">Item Code</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="bom_quantity" value="bom_quantity" <?php echo Mandatoryfields::checkbox('bom_quantity'); ?>>  
                       <span class="control-label">Quantity</span>
                       <br>
                    </div>
                 </div>



            </div>
        </div>
                            
                        </div>  
                    
                </div>


                <div class="subparent">
                    
                         <div class="card-header locationbg">
                            <button type="button" class="btn btn-link" data-toggle="collapse" data-target="#collapsevouchertype"><i class="fa fa-plus addbg"></i></button>
                             <!-- <input type="checkbox" name="checkAll8" id="user_head"/>  -->
                            Voucher Types 
                        </div>
                    
                    
                        <div id="collapsevouchertype" class="collapse" data-parent="#accordionExample1">
                            
                            <div class="locationdivbg">
                                
                <div class="row masterdivleft" id="area_div">
                <div class="col-lg-2 mastersubheading2">
                    <div class="" id="tab8">        
                       <label class="control-label">Purchase Voucher Type</label>
                       <br>

                       <input type="checkbox" name="permission[]" class="purchasevoucher_name" value="purchasevoucher_name" <?php echo Mandatoryfields::checkbox('purchasevoucher_name'); ?>>  
                       <span class="control-label">Purchase Voucher Name</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="purchasevoucher_type" value="purchasevoucher_type" <?php echo Mandatoryfields::checkbox('purchasevoucher_type'); ?>>  
                       <span class="control-label">Type</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="purchasevoucher_prefix" value="purchasevoucher_prefix" <?php echo Mandatoryfields::checkbox('purchasevoucher_prefix'); ?>>  
                       <span class="control-label">Prefix</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="purchasevoucher_suffix" value="purchasevoucher_suffix" <?php echo Mandatoryfields::checkbox('purchasevoucher_suffix'); ?>>  
                       <span class="control-label">Suffix</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="purchasevoucher_starting" value="purchasevoucher_starting" <?php echo Mandatoryfields::checkbox('purchasevoucher_starting'); ?>>  
                       <span class="control-label">Starting No</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="purchasevoucher_digits" value="purchasevoucher_digits" <?php echo Mandatoryfields::checkbox('purchasevoucher_digits'); ?>>  
                       <span class="control-label">No Of Digits</span>
                       <br>
                    </div>
                 </div>


                 <div class="col-lg-2 mastersubheading2">
                    <div class="" id="tab8">        
                       <label class="control-label">Sales Voucher Type</label>
                       <br>

                       <input type="checkbox" name="permission[]" class="salesvoucher_name" value="salesvoucher_name" <?php echo Mandatoryfields::checkbox('salesvoucher_name'); ?>>  
                       <span class="control-label">Sales Voucher Name</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="salesvoucher_type" value="salesvoucher_type" <?php echo Mandatoryfields::checkbox('salesvoucher_type'); ?>>  
                       <span class="control-label">Type</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="salesvoucher_prefix" value="salesvoucher_prefix" <?php echo Mandatoryfields::checkbox('salesvoucher_prefix'); ?>>  
                       <span class="control-label">Prefix</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="salesvoucher_suffix" value="salesvoucher_suffix" <?php echo Mandatoryfields::checkbox('salesvoucher_suffix'); ?>>  
                       <span class="control-label">Suffix</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="salesvoucher_starting" value="salesvoucher_starting" <?php echo Mandatoryfields::checkbox('salesvoucher_starting'); ?>>  
                       <span class="control-label">Starting No</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="salesvoucher_digits" value="salesvoucher_digits" <?php echo Mandatoryfields::checkbox('salesvoucher_digits'); ?>>  
                       <span class="control-label">No Of Digits</span>
                       <br>
                    </div>
                 </div>


                 <div class="col-lg-2 mastersubheading2">
                    <div class="" id="tab8">        
                       <label class="control-label">Payment Voucher Type</label>
                       <br>

                       <input type="checkbox" name="permission[]" class="paymentvoucher_name" value="paymentvoucher_name" <?php echo Mandatoryfields::checkbox('paymentvoucher_name'); ?>>  
                       <span class="control-label">Payment Voucher Name</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="paymentvoucher_type" value="paymentvoucher_type" <?php echo Mandatoryfields::checkbox('paymentvoucher_type'); ?>>  
                       <span class="control-label">Type</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="paymentvoucher_prefix" value="paymentvoucher_prefix" <?php echo Mandatoryfields::checkbox('paymentvoucher_prefix'); ?>>  
                       <span class="control-label">Prefix</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="paymentvoucher_suffix" value="paymentvoucher_suffix" <?php echo Mandatoryfields::checkbox('paymentvoucher_suffix'); ?>>  
                       <span class="control-label">Suffix</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="paymentvoucher_starting" value="paymentvoucher_starting" <?php echo Mandatoryfields::checkbox('paymentvoucher_starting'); ?>>  
                       <span class="control-label">Starting No</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="paymentvoucher_digits" value="paymentvoucher_digits" <?php echo Mandatoryfields::checkbox('paymentvoucher_digits'); ?>>  
                       <span class="control-label">No Of Digits</span>
                       <br>
                    </div>
                 </div>

                 <div class="col-lg-2 mastersubheading2">
                    <div class="" id="tab8">        
                       <label class="control-label">Receipt Voucher Type</label>
                       <br>

                       <input type="checkbox" name="permission[]" class="receiptvoucher_name" value="receiptvoucher_name" <?php echo Mandatoryfields::checkbox('receiptvoucher_name'); ?>>  
                       <span class="control-label">Receipt Voucher Name</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="receiptvoucher_type" value="receiptvoucher_type" <?php echo Mandatoryfields::checkbox('receiptvoucher_type'); ?>>  
                       <span class="control-label">Type</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="receiptvoucher_prefix" value="receiptvoucher_prefix" <?php echo Mandatoryfields::checkbox('receiptvoucher_prefix'); ?>>  
                       <span class="control-label">Prefix</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="receiptvoucher_suffix" value="receiptvoucher_suffix" <?php echo Mandatoryfields::checkbox('receiptvoucher_suffix'); ?>>  
                       <span class="control-label">Suffix</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="receiptvoucher_starting" value="receiptvoucher_starting" <?php echo Mandatoryfields::checkbox('receiptvoucher_starting'); ?>>  
                       <span class="control-label">Starting No</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="receiptvoucher_digits" value="receiptvoucher_digits" <?php echo Mandatoryfields::checkbox('receiptvoucher_digits'); ?>>  
                       <span class="control-label">No Of Digits</span>
                       <br>
                    </div>
                 </div>



            </div>



        </div>
                            
                        </div>  
                    
                </div>
				
							
						</div>	
					
				</div>
	
				
		
			<div class="card-header masterbg margintop" id="heading" >
                            
					<button type="button" class="btn btn-link" data-toggle="collapse" data-target="#collapsetwo"><i class="fa fa-plus addbg"></i></button>	
				
							 <!-- <input style=" text-align: center;" type="checkbox" class="employee_head" id="transaction_management"/> -->
				<b>Transaction Management</b>			
           </div>		
	  
				
		    <div id="collapsetwo" class="collapse" data-parent="#accordionExample">			
		
			<div id="accordionExample2">
				
				<div class="subparent">
                    
                         <div class="card-header locationbg">
                            <button type="button" class="btn btn-link" data-toggle="collapse" data-target="#collapsepurchase"><i class="fa fa-plus addbg"></i></button>
                             <!-- <input type="checkbox" name="checkAll8" id="user_head"/>  -->
                            Purchase
                        </div>
                    
                    
                        <div id="collapsepurchase" class="collapse" data-parent="#accordionExample1">
                            
                            <div class="locationdivbg">
                                
                <div class="row masterdivleft" id="purchase_div">
                <div class="col-lg-2 mastersubheading2">
                    <div class="" id="tab8">        
                       <label class="control-label">Estimation</label>
                       <br>

                       <input type="checkbox" name="permission[]" class="estimation_vouchertype" value="estimation_vouchertype" <?php echo Mandatoryfields::checkbox('estimation_vouchertype'); ?>>  
                       <span class="control-label">Voucher Type</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="estimation_voucherdate" value="estimation_voucherdate" <?php echo Mandatoryfields::checkbox('estimation_voucherdate'); ?>>  
                       <span class="control-label">Voucher Date</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="estimation_supplierid" value="estimation_supplierid" <?php echo Mandatoryfields::checkbox('estimation_supplierid'); ?>>  
                       <span class="control-label">Party Name</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="estimation_agentid" value="estimation_agentid" <?php echo Mandatoryfields::checkbox('estimation_agentid'); ?>>  
                       <span class="control-label">Agent Name</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="estimation_overall_discount" value="estimation_overall_discount" <?php echo Mandatoryfields::checkbox('estimation_overall_discount'); ?>>  
                       <span class="control-label">Overall Discount</span>
                       <br>
                    </div>
                 </div>

                 <div class="col-lg-2 mastersubheading2">
                    <div class="" id="tab8">        
                       <label class="control-label">Purchase Order</label>
                       <br>

                       <input type="checkbox" name="permission[]" class="purchaseorder_vouchertype" value="purchaseorder_vouchertype" <?php echo Mandatoryfields::checkbox('purchaseorder_vouchertype'); ?>>  
                       <span class="control-label">Voucher Type</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="purchaseorder_voucherdate" value="purchaseorder_voucherdate" <?php echo Mandatoryfields::checkbox('purchaseorder_voucherdate'); ?>>  
                       <span class="control-label">Voucher Date</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="purchaseorder_supplierid" value="purchaseorder_supplierid" <?php echo Mandatoryfields::checkbox('purchaseorder_supplierid'); ?>>  
                       <span class="control-label">Party Name</span>
                       <br>
                       <!-- <input type="checkbox" name="permission[]" class="purchaseorder_estimation_no" value="purchaseorder_estimation_no" <?php echo Mandatoryfields::checkbox('purchaseorder_estimation_no'); ?>>  
                       <span class="control-label">Estimation No</span>
                       <br> -->
                       <input type="checkbox" name="permission[]" class="purchaseorder_location" value="purchaseorder_location" <?php echo Mandatoryfields::checkbox('purchaseorder_location'); ?>>  
                       <span class="control-label">Company Location</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="purchaseorder_overall_discount" value="purchaseorder_overall_discount" <?php echo Mandatoryfields::checkbox('purchaseorder_overall_discount'); ?>>  
                       <span class="control-label">Overall Discount</span>
                       <br>
                    </div>
                 </div>

                 <div class="col-lg-2 mastersubheading2">
                    <div class="" id="tab8">        
                       <label class="control-label">Receipt Note</label>
                       <br>

                       <input type="checkbox" name="permission[]" class="receiptnote_vouchertype" value="receiptnote_vouchertype" <?php echo Mandatoryfields::checkbox('receiptnote_vouchertype'); ?>>  
                       <span class="control-label">Voucher Type</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="receiptnote_voucherdate" value="receiptnote_voucherdate" <?php echo Mandatoryfields::checkbox('receiptnote_voucherdate'); ?>>  
                       <span class="control-label">Voucher Date</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="receiptnote_supplierid" value="receiptnote_supplierid" <?php echo Mandatoryfields::checkbox('receiptnote_supplierid'); ?>>  
                       <span class="control-label">Party Name</span>
                       <br>
                       <!-- <input type="checkbox" name="permission[]" class="receiptnote_po_no" value="receiptnote_po_no" <?php echo Mandatoryfields::checkbox('receiptnote_po_no'); ?>>  
                       <span class="control-label">Purchase Order</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="receiptnote_estimation_no" value="receiptnote_estimation_no" <?php echo Mandatoryfields::checkbox('receiptnote_estimation_no'); ?>>  
                       <span class="control-label">Estimation No</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="receiptnote_rejection_out_no" value="receiptnote_rejection_out_no" <?php echo Mandatoryfields::checkbox('receiptnote_rejection_out_no'); ?>>  
                       <span class="control-label">Rejection Out No</span>
                       <br> -->
                       <input type="checkbox" name="permission[]" class="receiptnote_location" value="receiptnote_location" <?php echo Mandatoryfields::checkbox('receiptnote_location'); ?>>  
                       <span class="control-label">Company Location</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="receiptnote_overall_discount" value="receiptnote_overall_discount" <?php echo Mandatoryfields::checkbox('receiptnote_overall_discount'); ?>>  
                       <span class="control-label">Overall Discount</span>
                       <br>
                    </div>
                 </div>

                 <div class="col-lg-2 mastersubheading2">
                    <div class="" id="tab8">        
                       <label class="control-label">Purchase Entry</label>
                       <br>

                       <input type="checkbox" name="permission[]" class="purchaseentry_vouchertype" value="purchaseentry_vouchertype" <?php echo Mandatoryfields::checkbox('purchaseentry_vouchertype'); ?>>  
                       <span class="control-label">Voucher Type</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="purchaseentry_voucherdate" value="purchaseentry_voucherdate" <?php echo Mandatoryfields::checkbox('purchaseentry_voucherdate'); ?>>  
                       <span class="control-label">Voucher Date</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="purchaseentry_supplierid" value="purchaseentry_supplierid" <?php echo Mandatoryfields::checkbox('purchaseentry_supplierid'); ?>>  
                       <span class="control-label">Party Name</span>
                       <br>
                       <!-- <input type="checkbox" name="permission[]" class="purchaseentry_po_no" value="purchaseentry_po_no" <?php echo Mandatoryfields::checkbox('purchaseentry_po_no'); ?>>  
                       <span class="control-label">Purchase Order</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="purchaseentry_estimation_no" value="purchaseentry_estimation_no" <?php echo Mandatoryfields::checkbox('purchaseentry_estimation_no'); ?>>  
                       <span class="control-label">Estimation No</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="purchaseentry_receipt_no" value="purchaseentry_receipt_no" <?php echo Mandatoryfields::checkbox('purchaseentry_receipt_no'); ?>>  
                       <span class="control-label">Receipt No</span>
                       <br> -->
                       <input type="checkbox" name="permission[]" class="purchaseentry_location" value="purchaseentry_location" <?php echo Mandatoryfields::checkbox('purchaseentry_location'); ?>>  
                       <span class="control-label">Company Location</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="purchaseentry_overall_discount" value="purchaseentry_overall_discount" <?php echo Mandatoryfields::checkbox('purchaseentry_overall_discount'); ?>>  
                       <span class="control-label">Overall Discount</span>
                       <br>
                    </div>
                 </div>

                 <div class="col-lg-2 mastersubheading2">
                    <div class="" id="tab8">        
                       <label class="control-label">Rejection Out</label>
                       <br>

                       <input type="checkbox" name="permission[]" class="rejectionout_vouchertype" value="rejectionout_vouchertype" <?php echo Mandatoryfields::checkbox('rejectionout_vouchertype'); ?>>  
                       <span class="control-label">Voucher Type</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="rejectionout_voucherdate" value="rejectionout_voucherdate" <?php echo Mandatoryfields::checkbox('rejectionout_voucherdate'); ?>>  
                       <span class="control-label">Voucher Date</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="rejectionout_supplierid" value="rejectionout_supplierid" <?php echo Mandatoryfields::checkbox('rejectionout_supplierid'); ?>>  
                       <span class="control-label">Party Name</span>
                       <br>
                       <!-- <input type="checkbox" name="permission[]" class="rejectionout_po_no" value="rejectionout_po_no" <?php echo Mandatoryfields::checkbox('rejectionout_po_no'); ?>>  
                       <span class="control-label">Purchase Order</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="rejectionout_estimation_no" value="rejectionout_estimation_no" <?php echo Mandatoryfields::checkbox('rejectionout_estimation_no'); ?>>  
                       <span class="control-label">Estimation No</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="rejectionout_rejection_out_no" value="rejectionout_rejection_out_no" <?php echo Mandatoryfields::checkbox('rejectionout_rejection_out_no'); ?>>  
                       <span class="control-label">Rejection Out No</span>
                       <br> -->
                       <input type="checkbox" name="permission[]" class="rejectionout_location" value="rejectionout_location" <?php echo Mandatoryfields::checkbox('rejectionout_location'); ?>>  
                       <span class="control-label">Company Location</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="rejectionout_overall_discount" value="rejectionout_overall_discount" <?php echo Mandatoryfields::checkbox('rejectionout_overall_discount'); ?>>  
                       <span class="control-label">Overall Discount</span>
                       <br>
                    </div>
                 </div>

                 <div class="col-lg-2 mastersubheading2">
                    <div class="" id="tab8">        
                       <label class="control-label">Debit Note</label>
                       <br>

                       <input type="checkbox" name="permission[]" class="debitnote_vouchertype" value="debitnote_vouchertype" <?php echo Mandatoryfields::checkbox('debitnote_vouchertype'); ?>>  
                       <span class="control-label">Voucher Type</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="debitnote_voucherdate" value="debitnote_voucherdate" <?php echo Mandatoryfields::checkbox('debitnote_voucherdate'); ?>>  
                       <span class="control-label">Voucher Date</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="debitnote_supplierid" value="debitnote_supplierid" <?php echo Mandatoryfields::checkbox('debitnote_supplierid'); ?>>  
                       <span class="control-label">Party Name</span>
                       <br>
                       <!-- <input type="checkbox" name="permission[]" class="debitnote_po_no" value="debitnote_po_no" <?php echo Mandatoryfields::checkbox('debitnote_po_no'); ?>>  
                       <span class="control-label">Purchase Order</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="debitnote_estimation_no" value="debitnote_estimation_no" <?php echo Mandatoryfields::checkbox('debitnote_estimation_no'); ?>>  
                       <span class="control-label">Estimation No</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="debitnote_rejection_out_no" value="debitnote_rejection_out_no" <?php echo Mandatoryfields::checkbox('debitnote_rejection_out_no'); ?>>  
                       <span class="control-label">Rejection Out No</span>
                       <br> -->
                       <input type="checkbox" name="permission[]" class="debitnote_location" value="debitnote_location" <?php echo Mandatoryfields::checkbox('debitnote_location'); ?>>  
                       <span class="control-label">Company Location</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="debitnote_overall_discount" value="debitnote_overall_discount" <?php echo Mandatoryfields::checkbox('debitnote_overall_discount'); ?>>  
                       <span class="control-label">Overall Discount</span>
                       <br>
                    </div>
                 </div>


            </div>
        </div>
                            
                        </div>  
                    
                </div>


                <div class="subparent">
                    
                         <div class="card-header locationbg">
                            <button type="button" class="btn btn-link" data-toggle="collapse" data-target="#collapsesales"><i class="fa fa-plus addbg"></i></button>
                             <!-- <input type="checkbox" name="checkAll8" id="user_head"/>  -->
                            Sales
                        </div>
                    
                    
                        <div id="collapsesales" class="collapse" data-parent="#accordionExample1">
                            
                            <div class="locationdivbg">
                                
                <div class="row masterdivleft" id="sales_div">
                <div class="col-lg-2 mastersubheading2">
                    <div class="" id="tab8">        
                       <label class="control-label">Sales Estimation</label>
                       <br>

                       <input type="checkbox" name="permission[]" class="salesestimation_vouchertype" value="salesestimation_vouchertype" <?php echo Mandatoryfields::checkbox('salesestimation_vouchertype'); ?>>  
                       <span class="control-label">Voucher Type</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="salesestimation_voucherdate" value="salesestimation_voucherdate" <?php echo Mandatoryfields::checkbox('salesestimation_voucherdate'); ?>>  
                       <span class="control-label">Voucher Date</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="salesestimation_customerid" value="salesestimation_customerid" <?php echo Mandatoryfields::checkbox('salesestimation_customerid'); ?>>  
                       <span class="control-label">Customer Name</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="salesestimation_salesmenid" value="salesestimation_salesmenid" <?php echo Mandatoryfields::checkbox('salesestimation_salesmenid'); ?>>  
                       <span class="control-label">Sales Men Name</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="salesestimation_agentid" value="salesestimation_agentid" <?php echo Mandatoryfields::checkbox('salesestimation_agentid'); ?>>  
                       <span class="control-label">Agent Name</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="salesestimation_overall_discount" value="salesestimation_overall_discount" <?php echo Mandatoryfields::checkbox('salesestimation_overall_discount'); ?>>  
                       <span class="control-label">Overall Discount</span>
                       <br>
                    </div>
                 </div>

                 <div class="col-lg-2 mastersubheading2">
                    <div class="" id="tab8">        
                       <label class="control-label">Sale Order</label>
                       <br>

                       <input type="checkbox" name="permission[]" class="saleorder_vouchertype" value="saleorder_vouchertype" <?php echo Mandatoryfields::checkbox('saleorder_vouchertype'); ?>>  
                       <span class="control-label">Voucher Type</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="saleorder_voucherdate" value="saleorder_voucherdate" <?php echo Mandatoryfields::checkbox('saleorder_voucherdate'); ?>>  
                       <span class="control-label">Voucher Date</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="saleorder_customerid" value="saleorder_customerid" <?php echo Mandatoryfields::checkbox('saleorder_customerid'); ?>>  
                       <span class="control-label">Customer Name</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="saleorder_salesmenid" value="saleorder_salesmenid" <?php echo Mandatoryfields::checkbox('saleorder_salesmenid'); ?>>  
                       <span class="control-label">Sales Men Name</span>
                       <br>
                       <!-- <input type="checkbox" name="permission[]" class="saleorder_estimation_no" value="saleorder_estimation_no" <?php echo Mandatoryfields::checkbox('saleorder_estimation_no'); ?>>  
                       <span class="control-label">Estimation No</span>
                       <br> -->
                       <input type="checkbox" name="permission[]" class="saleorder_location" value="saleorder_location" <?php echo Mandatoryfields::checkbox('saleorder_location'); ?>>  
                       <span class="control-label">Company Location</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="saleorder_overall_discount" value="saleorder_overall_discount" <?php echo Mandatoryfields::checkbox('saleorder_overall_discount'); ?>>  
                       <span class="control-label">Overall Discount</span>
                       <br>
                    </div>
                 </div>

                 <div class="col-lg-2 mastersubheading2">
                    <div class="" id="tab8">        
                       <label class="control-label">Delivery Note</label>
                       <br>

                       <input type="checkbox" name="permission[]" class="deliverynote_vouchertype" value="deliverynote_vouchertype" <?php echo Mandatoryfields::checkbox('deliverynote_vouchertype'); ?>>  
                       <span class="control-label">Voucher Type</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="deliverynote_voucherdate" value="deliverynote_voucherdate" <?php echo Mandatoryfields::checkbox('deliverynote_voucherdate'); ?>>  
                       <span class="control-label">Voucher Date</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="deliverynote_customerid" value="deliverynote_customerid" <?php echo Mandatoryfields::checkbox('deliverynote_customerid'); ?>>  
                       <span class="control-label">Customer Name</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="deliverynote_salesmenid" value="deliverynote_salesmenid" <?php echo Mandatoryfields::checkbox('deliverynote_salesmenid'); ?>>  
                       <span class="control-label">Sales Men Name</span>
                       <br>
                       <!-- <input type="checkbox" name="permission[]" class="deliverynote_po_no" value="deliverynote_po_no" <?php echo Mandatoryfields::checkbox('deliverynote_po_no'); ?>>  
                       <span class="control-label">Purchase Order</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="deliverynote_estimation_no" value="deliverynote_estimation_no" <?php echo Mandatoryfields::checkbox('deliverynote_estimation_no'); ?>>  
                       <span class="control-label">Estimation No</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="deliverynote_rejection_out_no" value="deliverynote_rejection_out_no" <?php echo Mandatoryfields::checkbox('deliverynote_rejection_out_no'); ?>>  
                       <span class="control-label">Rejection Out No</span>
                       <br> -->
                       <input type="checkbox" name="permission[]" class="deliverynote_location" value="deliverynote_location" <?php echo Mandatoryfields::checkbox('deliverynote_location'); ?>>  
                       <span class="control-label">Company Location</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="deliverynote_overall_discount" value="deliverynote_overall_discount" <?php echo Mandatoryfields::checkbox('deliverynote_overall_discount'); ?>>  
                       <span class="control-label">Overall Discount</span>
                       <br>
                    </div>
                 </div>

                 <div class="col-lg-2 mastersubheading2">
                    <div class="" id="tab8">        
                       <label class="control-label">Sales Entry</label>
                       <br>

                       <input type="checkbox" name="permission[]" class="saleentry_vouchertype" value="saleentry_vouchertype" <?php echo Mandatoryfields::checkbox('saleentry_vouchertype'); ?>>  
                       <span class="control-label">Voucher Type</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="saleentry_voucherdate" value="saleentry_voucherdate" <?php echo Mandatoryfields::checkbox('saleentry_voucherdate'); ?>>  
                       <span class="control-label">Voucher Date</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="saleentry_customerid" value="saleentry_customerid" <?php echo Mandatoryfields::checkbox('saleentry_customerid'); ?>>  
                       <span class="control-label">Customer Name</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="saleentry_salesmenid" value="saleentry_salesmenid" <?php echo Mandatoryfields::checkbox('saleentry_salesmenid'); ?>>  
                       <span class="control-label">Sales Men Name</span>
                       <br>
                       <!-- <input type="checkbox" name="permission[]" class="saleentry_po_no" value="saleentry_po_no" <?php echo Mandatoryfields::checkbox('saleentry_po_no'); ?>>  
                       <span class="control-label">sale Order</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="saleentry_estimation_no" value="saleentry_estimation_no" <?php echo Mandatoryfields::checkbox('saleentry_estimation_no'); ?>>  
                       <span class="control-label">Estimation No</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="saleentry_receipt_no" value="saleentry_receipt_no" <?php echo Mandatoryfields::checkbox('saleentry_receipt_no'); ?>>  
                       <span class="control-label">Receipt No</span>
                       <br> -->
                       <input type="checkbox" name="permission[]" class="saleentry_location" value="saleentry_location" <?php echo Mandatoryfields::checkbox('saleentry_location'); ?>>  
                       <span class="control-label">Company Location</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="saleentry_overall_discount" value="saleentry_overall_discount" <?php echo Mandatoryfields::checkbox('saleentry_overall_discount'); ?>>  
                       <span class="control-label">Overall Discount</span>
                       <br>
                    </div>
                 </div>

                 <div class="col-lg-2 mastersubheading2">
                    <div class="" id="tab8">        
                       <label class="control-label">Rejection In</label>
                       <br>

                       <input type="checkbox" name="permission[]" class="rejectionin_vouchertype" value="rejectionin_vouchertype" <?php echo Mandatoryfields::checkbox('rejectionin_vouchertype'); ?>>  
                       <span class="control-label">Voucher Type</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="rejectionin_voucherdate" value="rejectionin_voucherdate" <?php echo Mandatoryfields::checkbox('rejectionin_voucherdate'); ?>>  
                       <span class="control-label">Voucher Date</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="rejectionin_customerid" value="rejectionin_customerid" <?php echo Mandatoryfields::checkbox('rejectionin_customerid'); ?>>  
                       <span class="control-label">Customer Name</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="rejectionin_salesmenid" value="rejectionin_salesmenid" <?php echo Mandatoryfields::checkbox('rejectionin_salesmenid'); ?>>  
                       <span class="control-label">Sales Men Name</span>
                       <br>
                       <!-- <input type="checkbox" name="permission[]" class="rejectionin_po_no" value="rejectionin_po_no" <?php echo Mandatoryfields::checkbox('rejectionin_po_no'); ?>>  
                       <span class="control-label">Purchase Order</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="rejectionin_estimation_no" value="rejectionin_estimation_no" <?php echo Mandatoryfields::checkbox('rejectionin_estimation_no'); ?>>  
                       <span class="control-label">Estimation No</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="rejectionin_rejection_in_no" value="rejectionin_rejection_in_no" <?php echo Mandatoryfields::checkbox('rejectionin_rejection_in_no'); ?>>  
                       <span class="control-label">Rejection in No</span>
                       <br> -->
                       <input type="checkbox" name="permission[]" class="rejectionin_location" value="rejectionin_location" <?php echo Mandatoryfields::checkbox('rejectionin_location'); ?>>  
                       <span class="control-label">Company Location</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="rejectionin_overall_discount" value="rejectionin_overall_discount" <?php echo Mandatoryfields::checkbox('rejectionin_overall_discount'); ?>>  
                       <span class="control-label">Overall Discount</span>
                       <br>
                    </div>
                 </div>

                 <div class="col-lg-2 mastersubheading2">
                    <div class="" id="tab8">        
                       <label class="control-label">Credit Note</label>
                       <br>

                       <input type="checkbox" name="permission[]" class="creditnote_vouchertype" value="creditnote_vouchertype" <?php echo Mandatoryfields::checkbox('creditnote_vouchertype'); ?>>  
                       <span class="control-label">Voucher Type</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="creditnote_voucherdate" value="creditnote_voucherdate" <?php echo Mandatoryfields::checkbox('creditnote_voucherdate'); ?>>  
                       <span class="control-label">Voucher Date</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="creditnote_customerid" value="creditnote_customerid" <?php echo Mandatoryfields::checkbox('creditnote_customerid'); ?>>  
                       <span class="control-label">Customer Name</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="creditnote_salesmanid" value="creditnote_salesmanid" <?php echo Mandatoryfields::checkbox('creditnote_salesmanid'); ?>>  
                       <span class="control-label">Sales Men Name</span>
                       <br>
                       <!-- <input type="checkbox" name="permission[]" class="creditnote_po_no" value="creditnote_po_no" <?php echo Mandatoryfields::checkbox('creditnote_po_no'); ?>>  
                       <span class="control-label">Purchase Order</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="creditnote_estimation_no" value="creditnote_estimation_no" <?php echo Mandatoryfields::checkbox('creditnote_estimation_no'); ?>>  
                       <span class="control-label">Estimation No</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="creditnote_rejection_out_no" value="creditnote_rejection_out_no" <?php echo Mandatoryfields::checkbox('creditnote_rejection_out_no'); ?>>  
                       <span class="control-label">Rejection Out No</span>
                       <br> -->
                       <input type="checkbox" name="permission[]" class="creditnote_location" value="creditnote_location" <?php echo Mandatoryfields::checkbox('creditnote_location'); ?>>  
                       <span class="control-label">Company Location</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="creditnote_overall_discount" value="creditnote_overall_discount" <?php echo Mandatoryfields::checkbox('creditnote_overall_discount'); ?>>  
                       <span class="control-label">Overall Discount</span>
                       <br>
                    </div>
                 </div>


            </div>
        </div>




                            
                        </div>  
                    
                </div>
	
							
						</div>	


                        <div class="subparent">
                    
                         <div class="card-header locationbg">
                            <button type="button" class="btn btn-link" data-toggle="collapse" data-target="#collapsepayment"><i class="fa fa-plus addbg"></i></button>
                             <!-- <input type="checkbox" name="checkAll8" id="user_head"/>  -->
                            Payment
                        </div>
                    
                    
                        <div id="collapsepayment" class="collapse" data-parent="#accordionExample1">
                            
                            <div class="locationdivbg">
                                
                <div class="row masterdivleft" id="payment_div">
                <div class="col-lg-2 mastersubheading2">
                    <div class="" id="tab8">        
                       <label class="control-label">Payment Request</label>
                       <br>

                       <input type="checkbox" name="permission[]" class="paymentrequest_vouchertype" value="paymentrequest_vouchertype" <?php echo Mandatoryfields::checkbox('paymentrequest_vouchertype'); ?>>  
                       <span class="control-label">Voucher Type</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="paymentrequest_requestdate" value="paymentrequest_requestdate" <?php echo Mandatoryfields::checkbox('paymentrequest_requestdate'); ?>>  
                       <span class="control-label">Voucher Date</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="paymentrequest_supplierid" value="paymentrequest_supplierid" <?php echo Mandatoryfields::checkbox('paymentrequest_supplierid'); ?>>  
                       <span class="control-label">Party Name</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="paymentrequest_ledger" value="paymentrequest_ledger" <?php echo Mandatoryfields::checkbox('paymentrequest_ledger'); ?>>  
                       <span class="control-label">Ledger</span>
                       <br>
                    </div>
                 </div>

                 <div class="col-lg-2 mastersubheading2">
                    <div class="" id="tab8">        
                       <label class="control-label">Payment Process</label>
                       <br>

                       <input type="checkbox" name="permission[]" class="paymentprocess_vouchertype" value="paymentprocess_vouchertype" <?php echo Mandatoryfields::checkbox('paymentprocess_vouchertype'); ?>>  
                       <span class="control-label">Voucher Type</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="paymentprocess_voucherdate" value="paymentprocess_voucherdate" <?php echo Mandatoryfields::checkbox('paymentprocess_voucherdate'); ?>>  
                       <span class="control-label">Voucher Date</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="paymentprocess_supplierid" value="paymentprocess_supplierid" <?php echo Mandatoryfields::checkbox('paymentprocess_supplierid'); ?>>  
                       <span class="control-label">Party Name</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="paymentprocess_purchaseentryno" value="paymentprocess_purchaseentryno" <?php echo Mandatoryfields::checkbox('paymentprocess_purchaseentryno'); ?>>  
                       <span class="control-label">Purchase Entry No</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="paymentprocess_nature" value="paymentprocess_nature" <?php echo Mandatoryfields::checkbox('paymentprocess_nature'); ?>>  
                       <span class="control-label">Ledger</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="paymentprocess_mode" value="paymentprocess_mode" <?php echo Mandatoryfields::checkbox('paymentprocess_mode'); ?>>  
                       <span class="control-label">Mode</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="paymentprocess_billamount" value="paymentprocess_billamount" <?php echo Mandatoryfields::checkbox('paymentprocess_billamount'); ?>>  
                       <span class="control-label">Bill Amount</span>
                       <br>
                    </div>
                 </div>


            </div>
        </div>
                            
                        </div>  
                    
                </div>


                <div class="subparent">
                    
                         <div class="card-header locationbg">
                            <button type="button" class="btn btn-link" data-toggle="collapse" data-target="#collapsereceipt"><i class="fa fa-plus addbg"></i></button>
                             <!-- <input type="checkbox" name="checkAll8" id="user_head"/>  -->
                            Receipt
                        </div>
                    
                    
                        <div id="collapsereceipt" class="collapse" data-parent="#accordionExample1">
                            
                            <div class="locationdivbg">
                                
                <div class="row masterdivleft" id="receipt_div">
                <div class="col-lg-2 mastersubheading2">
                    <div class="" id="tab8">        
                       <label class="control-label">Receipt Request</label>
                       <br>

                       <input type="checkbox" name="permission[]" class="receiptrequest_vouchertype" value="receiptrequest_vouchertype" <?php echo Mandatoryfields::checkbox('receiptrequest_vouchertype'); ?>>  
                       <span class="control-label">Voucher Type</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="receiptrequest_requestdate" value="receiptrequest_requestdate" <?php echo Mandatoryfields::checkbox('receiptrequest_requestdate'); ?>>  
                       <span class="control-label">Voucher Date</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="receiptrequest_supplierid" value="receiptrequest_supplierid" <?php echo Mandatoryfields::checkbox('receiptrequest_supplierid'); ?>>  
                       <span class="control-label">Party Name</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="receiptrequest_ledger" value="receiptrequest_ledger" <?php echo Mandatoryfields::checkbox('receiptrequest_ledger'); ?>>  
                       <span class="control-label">Ledger</span>
                       <br>
                    </div>
                 </div>

                 <div class="col-lg-2 mastersubheading2">
                    <div class="" id="tab8">        
                       <label class="control-label">Receipt Process</label>
                       <br>

                       <input type="checkbox" name="permission[]" class="receiptprocess_vouchertype" value="receiptprocess_vouchertype" <?php echo Mandatoryfields::checkbox('receiptprocess_vouchertype'); ?>>  
                       <span class="control-label">Voucher Type</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="receiptprocess_voucherdate" value="receiptprocess_voucherdate" <?php echo Mandatoryfields::checkbox('receiptprocess_voucherdate'); ?>>  
                       <span class="control-label">Voucher Date</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="receiptprocess_supplierid" value="receiptprocess_supplierid" <?php echo Mandatoryfields::checkbox('receiptprocess_supplierid'); ?>>  
                       <span class="control-label">Party Name</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="receiptprocess_saleentryno" value="receiptprocess_saleentryno" <?php echo Mandatoryfields::checkbox('receiptprocess_saleentryno'); ?>>  
                       <span class="control-label">Sale Entry No</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="receiptprocess_nature" value="receiptprocess_nature" <?php echo Mandatoryfields::checkbox('receiptprocess_nature'); ?>>  
                       <span class="control-label">Ledger</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="receiptprocess_mode" value="receiptprocess_mode" <?php echo Mandatoryfields::checkbox('receiptprocess_mode'); ?>>  
                       <span class="control-label">Mode</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="receiptprocess_billamount" value="receiptprocess_billamount" <?php echo Mandatoryfields::checkbox('receiptprocess_billamount'); ?>>  
                       <span class="control-label">Bill Amount</span>
                       <br>
                    </div>
                 </div>


            </div>
        </div>
                            
                        </div>  
                    
                </div>


                <div class="subparent">
                    
                         <div class="card-header locationbg">
                            <button type="button" class="btn btn-link" data-toggle="collapse" data-target="#collapseadvancesettlement"><i class="fa fa-plus addbg"></i></button>
                             <!-- <input type="checkbox" name="checkAll8" id="user_head"/>  -->
                            Adavnce Settlement
                        </div>
                    
                    
                        <div id="collapseadvancesettlement" class="collapse" data-parent="#accordionExample1">
                            
                            <div class="locationdivbg">
                                
                <div class="row masterdivleft" id="advancesettlement_div">
                <div class="col-lg-2 mastersubheading2">
                    <div class="" id="tab8">        
                       <label class="control-label">Advance To Suppliers</label>
                       <br>
                       <input type="checkbox" name="permission[]" class="advancetosupplier_supplierid" value="advancetosupplier_supplierid" <?php echo Mandatoryfields::checkbox('advancetosupplier_supplierid'); ?>>  
                       <span class="control-label">Party Name</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="advancetosupplier_voucher_no" value="advancetosupplier_voucher_no" <?php echo Mandatoryfields::checkbox('advancetosupplier_voucher_no'); ?>>  
                       <span class="control-label">Payment Voucher No</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="advancetosupplier_date" value="advancetosupplier_date" <?php echo Mandatoryfields::checkbox('advancetosupplier_date'); ?>>  
                       <span class="control-label">Date</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="advancetosupplier_advance_amount" value="advancetosupplier_advance_amount" <?php echo Mandatoryfields::checkbox('advancetosupplier_advance_amount'); ?>>  
                       <span class="control-label">Total Advance Amount</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="advancetosupplier_remark" value="advancetosupplier_remark" <?php echo Mandatoryfields::checkbox('advancetosupplier_remark'); ?>>  
                       <span class="control-label">Remark</span>
                       <br>
                    </div>
                 </div>

                 <div class="col-lg-2 mastersubheading2">
                    <div class="" id="tab8">        
                       <label class="control-label">Advance From Customer</label>
                       <br>
                       <input type="checkbox" name="permission[]" class="advancefromcustomer_customerid" value="advancefromcustomer_customerid" <?php echo Mandatoryfields::checkbox('advancefromcustomer_customerid'); ?>>  
                       <span class="control-label">Customer Name</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="advancefromcustomer_voucher_no" value="advancefromcustomer_voucher_no" <?php echo Mandatoryfields::checkbox('advancefromcustomer_voucher_no'); ?>>  
                       <span class="control-label">Voucher No</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="advancefromcustomer_date" value="advancefromcustomer_date" <?php echo Mandatoryfields::checkbox('advancefromcustomer_date'); ?>>  
                       <span class="control-label">Date</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="advancefromcustomer_advanceamount" value="advancefromcustomer_advanceamount" <?php echo Mandatoryfields::checkbox('advancefromcustomer_advanceamount'); ?>>  
                       <span class="control-label">Advance Amount</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="advancefromcustomer_remark" value="advancefromcustomer_remark" <?php echo Mandatoryfields::checkbox('advancefromcustomer_remark'); ?>>  
                       <span class="control-label">Remark</span>
                       <br>
                    </div>
                 </div>


            </div>
        </div>
                            
                        </div>  
                    
                </div>

                <div class="subparent">
                    
                         <div class="card-header locationbg">
                            <button type="button" class="btn btn-link" data-toggle="collapse" data-target="#collapseaccountexpense"><i class="fa fa-plus addbg"></i></button>
                             <!-- <input type="checkbox" name="checkAll8" id="user_head"/>  -->
                            Account Expenses
                        </div>
                    
                    
                        <div id="collapseaccountexpense" class="collapse" data-parent="#accordionExample1">
                            
                            <div class="locationdivbg">
                                
                <div class="row masterdivleft" id="accountexpense_div">
                <div class="col-lg-2 mastersubheading2">
                    <div class="" id="tab8">        
                       <label class="control-label">Account Transaction</label>
                       <br>
                       <input type="checkbox" name="permission[]" class="accountexpense_location_id" value="accountexpense_location_id" <?php echo Mandatoryfields::checkbox('accountexpense_location_id'); ?>>  
                       <span class="control-label">Location</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="accountexpense_date" value="accountexpense_date" <?php echo Mandatoryfields::checkbox('accountexpense_date'); ?>>  
                       <span class="control-label">Date</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="accountexpense_voucher_no" value="accountexpense_voucher_no" <?php echo Mandatoryfields::checkbox('accountexpense_voucher_no'); ?>>  
                       <span class="control-label"> Voucher No</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="accountexpense_remark" value="accountexpense_remark" <?php echo Mandatoryfields::checkbox('accountexpense_remark'); ?>>  
                       <span class="control-label">Remark</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="accountexpense_debit_expense_type" value="accountexpense_debit_expense_type" <?php echo Mandatoryfields::checkbox('accountexpense_debit_expense_type'); ?>>  
                       <span class="control-label">Debit Head Name</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="accountexpense_debit_expense_amount" value="accountexpense_debit_expense_amount" <?php echo Mandatoryfields::checkbox('accountexpense_debit_expense_amount'); ?>>  
                       <span class="control-label">Debit Amount</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="accountexpense_debit_remark" value="accountexpense_debit_remark" <?php echo Mandatoryfields::checkbox('accountexpense_debit_remark'); ?>>  
                       <span class="control-label">Debit Remark</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="accountexpense_expense_type_credit" value="accountexpense_expense_type_credit" <?php echo Mandatoryfields::checkbox('accountexpense_expense_type_credit'); ?>>  
                       <span class="control-label">Credit Head Name</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="accountexpense_expense_amoun_credit" value="accountexpense_expense_amoun_credit" <?php echo Mandatoryfields::checkbox('accountexpense_expense_amoun_credit'); ?>>  
                       <span class="control-label">Credit Amount</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="accountexpense_remark_debit_credit" value="accountexpense_remark_debit_credit" <?php echo Mandatoryfields::checkbox('accountexpense_remark_debit_credit'); ?>>  
                       <span class="control-label">Credit Remark</span>
                       <br>
                    </div>
                 </div>

            </div>
        </div>
                            
                        </div>  
                    
                </div>


                <div class="subparent">
                    
                         <div class="card-header locationbg">
                            <button type="button" class="btn btn-link" data-toggle="collapse" data-target="#collapseproductionmodule"><i class="fa fa-plus addbg"></i></button>
                             <!-- <input type="checkbox" name="checkAll8" id="user_head"/>  -->
                            Production Module
                        </div>
                    
                    
                        <div id="collapseproductionmodule" class="collapse" data-parent="#accordionExample1">
                            
                            <div class="locationdivbg">
                                
                <div class="row masterdivleft" id="productionmodule_div">
                <div class="col-lg-2 mastersubheading2">
                    <div class="" id="tab8">        
                       <label class="control-label">Production</label>
                       <br>
                       <input type="checkbox" name="permission[]" class="productionmodule_location_id" value="productionmodule_location_id" <?php echo Mandatoryfields::checkbox('productionmodule_location_id'); ?>>  
                       <span class="control-label">Production Location</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="productionmodule_entry_date" value="productionmodule_entry_date" <?php echo Mandatoryfields::checkbox('productionmodule_entry_date'); ?>>  
                       <span class="control-label">Production Date</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="productionmodule_item_id" value="productionmodule_item_id" <?php echo Mandatoryfields::checkbox('productionmodule_item_id'); ?>>  
                       <span class="control-label"> Production Item Name</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="productionmodule_quantity" value="productionmodule_quantity" <?php echo Mandatoryfields::checkbox('productionmodule_quantity'); ?>>  
                       <span class="control-label">Production Quantity</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="productionmodule_uom_id" value="productionmodule_uom_id" <?php echo Mandatoryfields::checkbox('productionmodule_uom_id'); ?>>  
                       <span class="control-label">UOM</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="productionmodule_remark" value="productionmodule_remark" <?php echo Mandatoryfields::checkbox('productionmodule_remark'); ?>>  
                       <span class="control-label">Remark</span>
                       <br>
                    </div>
                 </div>

            </div>
        </div>
                            
                        </div>  
                    
                </div>


                <div class="subparent">
                    
                         <div class="card-header locationbg">
                            <button type="button" class="btn btn-link" data-toggle="collapse" data-target="#collapseunclearedcheques"><i class="fa fa-plus addbg"></i></button>
                             <!-- <input type="checkbox" name="checkAll8" id="user_head"/>  -->
                            Uncleared Cheques
                        </div>
                    
                    
                        <div id="collapseunclearedcheques" class="collapse" data-parent="#accordionExample1">
                            
                            <div class="locationdivbg">
                                
                <div class="row masterdivleft" id="unclearedcheques_div">
                <div class="col-lg-2 mastersubheading2">
                    <div class="" id="tab8">        
                       <label class="control-label">Received Cheques from sale entry (Cleared)</label>
                       <br>
                       <!-- Received Cheques from sale entry (Cleared)-->
                       <input type="checkbox" name="permission[]" class="receivedsalecleared_companybankid" value="receivedsalecleared_companybankid" <?php echo Mandatoryfields::checkbox('receivedsalecleared_companybankid'); ?>>  
                       <span class="control-label">Bank Account Holder</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="receivedsalecleared_cleareddate" value="receivedsalecleared_cleareddate" <?php echo Mandatoryfields::checkbox('receivedsalecleared_cleareddate'); ?>>  
                       <span class="control-label">Cleared Date</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="receivedsalecleared_remarks" value="receivedsalecleared_remarks" <?php echo Mandatoryfields::checkbox('receivedsalecleared_remarks'); ?>>  
                       <span class="control-label">Remark</span>
                       <br>
                    </div>
                 </div>

                 <div class="col-lg-2 mastersubheading2">
                    <div class="" id="tab8">        
                       <label class="control-label">Received Cheques from sale entry (Returned)</label>
                       <br>
                       <!-- Received Cheques from sale entry (Returned)-->
                       <input type="checkbox" name="permission[]" class="receivedsalereturned_companybankid" value="receivedsalereturned_companybankid" <?php echo Mandatoryfields::checkbox('receivedsalereturned_companybankid'); ?>>  
                       <span class="control-label">Bank Account Holder</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="receivedsalereturned_cleareddate" value="receivedsalereturned_cleareddate" <?php echo Mandatoryfields::checkbox('receivedsalereturned_cleareddate'); ?>>  
                       <span class="control-label">Cleared Date</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="receivedsalereturned_charges" value="receivedsalereturned_charges" <?php echo Mandatoryfields::checkbox('receivedsalereturned_charges'); ?>>  
                       <span class="control-label">Charge</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="receivedsalereturned_remarks" value="receivedsalereturned_remarks" <?php echo Mandatoryfields::checkbox('receivedsalereturned_remarks'); ?>>  
                       <span class="control-label">Remark</span>
                       <br>
                    </div>
                 </div>

                 <div class="col-lg-2 mastersubheading2">
                    <div class="" id="tab8">        
                       <label class="control-label">Received Cheques from pos (Cleared)</label>
                       <br>
                       <!-- Received Cheques from sale entry (Cleared)-->
                       <input type="checkbox" name="permission[]" class="receivedposcleared_companybankid" value="receivedposcleared_companybankid" <?php echo Mandatoryfields::checkbox('receivedposcleared_companybankid'); ?>>  
                       <span class="control-label">Bank Account Holder</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="receivedposcleared_cleareddate" value="receivedposcleared_cleareddate" <?php echo Mandatoryfields::checkbox('receivedposcleared_cleareddate'); ?>>  
                       <span class="control-label">Cleared Date</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="receivedposcleared_remarks" value="receivedposcleared_remarks" <?php echo Mandatoryfields::checkbox('receivedposcleared_remarks'); ?>>  
                       <span class="control-label">Remark</span>
                       <br>
                    </div>
                 </div>

                 <div class="col-lg-2 mastersubheading2">
                    <div class="" id="tab8">        
                       <label class="control-label">Received Cheques from pos (Returned)</label>
                       <br>
                       <!-- Received Cheques from sale entry (Cleared)-->
                       <input type="checkbox" name="permission[]" class="receivedposreturned_companybankid" value="receivedposreturned_companybankid" <?php echo Mandatoryfields::checkbox('receivedposreturned_companybankid'); ?>>  
                       <span class="control-label">Bank Account Holder</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="receivedposreturned_cleareddate" value="receivedposreturned_cleareddate" <?php echo Mandatoryfields::checkbox('receivedposreturned_cleareddate'); ?>>  
                       <span class="control-label">Cleared Date</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="receivedposreturned_charges" value="receivedposreturned_charges" <?php echo Mandatoryfields::checkbox('receivedposreturned_charges'); ?>>  
                       <span class="control-label">Charge</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="receivedposreturned_remarks" value="receivedposreturned_remarks" <?php echo Mandatoryfields::checkbox('receivedposreturned_remarks'); ?>>  
                       <span class="control-label">Remark</span>
                       <br>
                    </div>
                 </div>

                 <div class="col-lg-2 mastersubheading2">
                    <div class="" id="tab8">        
                       <label class="control-label">Paid Cheques from purchase entry (Cleared)</label>
                       <br>
                       <!-- Received Cheques from sale entry (Cleared)-->
                       <input type="checkbox" name="permission[]" class="paidcleared_companybankid" value="paidcleared_companybankid" <?php echo Mandatoryfields::checkbox('paidcleared_companybankid'); ?>>  
                       <span class="control-label">Bank Account Holder</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="paidcleared_cleareddate" value="paidcleared_cleareddate" <?php echo Mandatoryfields::checkbox('paidcleared_cleareddate'); ?>>  
                       <span class="control-label">Cleared Date</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="paidcleared_remarks" value="paidcleared_remarks" <?php echo Mandatoryfields::checkbox('paidcleared_remarks'); ?>>  
                       <span class="control-label">Remark</span>
                       <br>
                    </div>
                 </div>

                 <div class="col-lg-2 mastersubheading2">
                    <div class="" id="tab8">        
                       <label class="control-label">Paid Cheques from purchase entry (Returned)</label>
                       <br>
                       <!-- Received Cheques from sale entry (Cleared)-->
                       <input type="checkbox" name="permission[]" class="receivedposreturned_companybankid" value="paidreturned_companybankid" <?php echo Mandatoryfields::checkbox('paidreturned_companybankid'); ?>>  
                       <span class="control-label">Bank Account Holder</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="paidreturned_cleareddate" value="paidreturned_cleareddate" <?php echo Mandatoryfields::checkbox('paidreturned_cleareddate'); ?>>  
                       <span class="control-label">Cleared Date</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="paidreturned_charges" value="paidreturned_charges" <?php echo Mandatoryfields::checkbox('paidreturned_charges'); ?>>  
                       <span class="control-label">Charge</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="paidreturned_remarks" value="paidreturned_remarks" <?php echo Mandatoryfields::checkbox('paidreturned_remarks'); ?>>  
                       <span class="control-label">Remark</span>
                       <br>
                    </div>
                 </div>


            </div>
        </div>
                            
                        </div>  
                    
                </div>

					
				</div>
				
		
             
          

		  </div>
		  
      
	  
      </div>
				
		
		  </div>
		  
      
	  
      </div>
				
				
			
		  
		   
		
		  
		  
		  
		  
		  
		  
		  
		  
		  
	
        <div class="col-md-7 text-right">
          <button class="btn btn-success submit"  type="submit">Submit</button>
        </div>
      </form>
    </div>
     <script src="{{asset('assets/js/master/capitalize.js')}}"></script>
    <!-- card body end@ -->
  </div>
</div>
<br/><br/><br/><br/><br/>
<script>
    $(document).ready(function(){
        // Add minus icon for collapse element which is open by default
        $(".collapse.show").each(function(){
        	$(this).prev(".card-header").find(".fa").addClass("fa-minus").removeClass("fa-plus");
        });
        
        // Toggle plus minus icon on show hide of collapse element
        $(".collapse").on('show.bs.collapse', function(){
        	$(this).prev(".card-header").find(".fa").removeClass("fa-plus").addClass("fa-minus");
        }).on('hide.bs.collapse', function(){
        	$(this).prev(".card-header").find(".fa").removeClass("fa-minus").addClass("fa-plus");
        });
    });
    // $(".select_all").click(function (e) {
    //     var get_id = $(this).attr('id');
    //     if($(".select_all").is(':checked'))
    //     {

    //         $("."+get_id).prop("checked",true);

    //     }
    //     else
    //     {
    //       $("."+get_id).prop("checked",false);

    //     }


    // });
//  $(".select_all").click(function (e) {
//   var get_id = $(this).attr('id');
//   var get_class = $(this).attr('class');
//     if($('#'+get_id).is(":checked"))
//     {
//       $("#"+id+" input[type=checkbox]").each(function () {

//       $(this).prop("checked",true);
//     });
//     }

//     alert(get_id);
//  });    
</script>

@endsection

