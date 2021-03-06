@extends('admin.layout.app')
@section('content')
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

</style>

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
              <label for="validationCustom01" class="col-sm-2 col-form-label">Role <span class="mandatory">*</span></label>
              <div class="col-sm-8">
                <select class="js-example-basic-multiple col-12 custom-select bank_id" name="role_id" required>
                  <option value="">Choose Role</option>
                 /* @foreach($roles as $value)
                  <option value="{{ $value->id }}" {{ old('role_id') == $value->id ? 'selected' : '' }} >{{ $value->name }}</option>
                  @endforeach */
                </select>
                <span class="mandatory"> {{ $errors->first('role_id')  }} </span>
                <div class="invalid-feedback">
                  Enter valid Role
                </div>
              </div>
             
          </div>
          </div>

			<div id="accordionExample" style="width: -webkit-fill-available; padding: 5px;">  
			
			<div class="parent" id="masters_div">
     
			<div class="card-header masterbg margintop" id="heading">
                            
					<button type="button" class="btn btn-link" data-toggle="collapse" data-target="#collapseOne"><i class="fa fa-plus addbg"></i></button>	
				
							 <input style=" text-align: center;" value="h1" type="checkbox"  class="masters_head" id="masters_head" name="permission[]"/> <b>Master</b></h4>
							 
           </div>
				
	   
   		    <div id="collapseOne" class="collapse" data-parent="#accordionExample">			
		
			<div id="accordionExample1">
				
				<div class="subparent">
					
						 <div class="card-header locationbg">
							<button type="button" class="btn btn-link" data-toggle="collapse" data-target="#collapselocation"><i class="fa fa-plus addbg"></i></button>
							 <input type="checkbox" name="checkAll" id="location_head"/> Location
						</div>
					
					
						<div id="collapselocation" class="collapse" data-parent="#accordionExample1">
							
							<div class="locationdivbg">
								
				<div class="row" id="location_div">
                    <div class="col-lg-2 mastersubheading2">
                        <div class="" id="tab1">		
                        <input type="checkbox" name="permission[]" class="all_state_list_master all_classname permission" value="state_list">  
                        <label class="control-label">Select All</label>
                        <br>
                        <label class="control-label">State</label>
                        <br>
                        <input type="checkbox" name="permission[]" class="state_list permission" value="1">  
                        <span class="control-label">List</span>
                        <br>                                                                                    
                        <input type="checkbox" name="permission[]" class="state_list permission" value="2">  
                        <span class="control-label">Create</span>
                        <br>                                                                                        
                        <input type="checkbox" name="permission[]" class="state_list permission" value="3">  
                        <span class="control-label">Edit</span>
                        <br>
                        <input type="checkbox" name="permission[]" class="state_list permission" value="4">  
                        <span class="control-label">Delete</span>
                        <br>                                                                                                                                    
                    </div>	
                </div>
									
									
				<div class="col-lg-2 mastersubheading2">
                    <div class="" id="tab2">	                                                                                                                                                <input type="checkbox" name="permission[]" class="all_district_list_master all_classname permission" value="district_list">  
                        <label class="control-label">Select All</label>
                        <br>
                        <label class="control-label">District</label>
                        <br>                       
                        <input type="checkbox" name="permission[]" class="district_list permission" value="5">  
                        <span class="control-label">List</span>
                        <br>                        
                        <input type="checkbox" name="permission[]" class="district_list permission" value="6">  
                        <span class="control-label">Create</span>
                        <br>                        
                        <input type="checkbox" name="permission[]" class="district_list permission" value="7">  
                        <span class="control-label">Edit</span>
                        <br>                    
                        <input type="checkbox" name="permission[]" class="district_list permission" value="8">  
                        <span class="control-label">Delete</span>
                        <br>
                    </div>	
                </div>
                <div class="col-lg-2 mastersubheading2">
                    <div class="" id="tab3">
                       <input type="checkbox" name="permission[]" class="all_city_list_master all_classname permission" value="city_list">  
                       <label class="control-label">Select All</label>
                       <br>
                       <label class="control-label">City</label>
                       <br>     
                       <input type="checkbox" name="permission[]" class="city_list permission" value="9">  
                       <span class="control-label">List</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="city_list permission" value="10">  
                       <span class="control-label">Create</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="city_list permission" value="11">  
                       <span class="control-label">Edit</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="city_list permission" value="12">  
                       <span class="control-label">Delete</span>
                       <br>
                    </div>
                 </div>									
                 <div class="col-lg-2 mastersubheading2">
                    <div class="" id="tab4">	
                       <input type="checkbox" name="permission[]" class="all_address_type_list_master all_classname permission" value="address_type_list">  
                       <label class="control-label">Select All</label>
                       <br>
                       <label class="control-label">Address Type</label>
                       <br>
                       <input type="checkbox" name="permission[]" class="address_type_list permission" value="17">  
                       <span class="control-label">List</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="address_type_list permission" value="18">  
                       <span class="control-label">Create</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="address_type_list permission" value="19">  
                       <span class="control-label">Edit</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="address_type_list permission" value="20">  
                       <span class="control-label">Delete</span>
                       <br>
                    </div>
                 </div>    
                 <div class="col-lg-2 mastersubheading2">
                    <div class="" id="tab5">	
                       <input type="checkbox" name="permission[]" class="all_location_type_list_master all_classname permission" value="location_type_list">  
                       <label class="control-label">Select All</label>
                       <br>
                       <label class="control-label">Location Type</label>
                       <br>
                       <input type="checkbox" name="permission[]" class="location_type_list permission" value="13">  
                       <span class="control-label">List</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="location_type_list permission" value="14">  
                       <span class="control-label">Create</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="location_type_list permission" value="15">  
                       <span class="control-label">Edit</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="location_type_list permission" value="16">  
                       <span class="control-label">Delete</span>
                       <br>
                    </div>
                 </div>
                 <div class="col-lg-2 mastersubheading2">
                    <div class="" id="tab6">
                       <input type="checkbox" name="permission[]" class="all_company_location_list_master all_classname permission" value="company_location_list">  
                       <label class="control-label">Select All</label>
                       <br>
                       <label class="control-label">Company Location</label>
                       <br>
                       <input type="checkbox" name="permission[]" class="company_location_list permission" value="274">  
                       <span class="control-label">List</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="company_location_list permission" value="275">  
                       <span class="control-label">Create</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="company_location_list permission" value="276">  
                       <span class="control-label">Edit</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="company_location_list permission" value="277">  
                       <span class="control-label">Delete</span>
                       <br>
                    </div>
                 </div>
                 <div class="col-lg-2 mastersubheading2">
                    <div class="" id="tab7">	
                       <input type="checkbox" name="permission[]" class="all_head_office_detail_list_master all_classname permission" value="head_office_detail_list">  
                       <label class="control-label">Select All</label>
                       <br>
                       <label class="control-label">Head Office Detail</label>
                       <br>
                       <input type="checkbox" name="permission[]" class="head_office_detail_list permission" value="278">  
                       <span class="control-label">List</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="head_office_detail_list permission" value="279">  
                       <span class="control-label">Create</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="head_office_detail_list permission" value="280">  
                       <span class="control-label">Edit</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="head_office_detail_list permission" value="281">  
                       <span class="control-label">Delete</span>
                       <br>
                    </div>
                 </div>
								
				</div>
        </div>
							
						</div>	
					
				</div>
				
				
				
				<div class="subparent">
					
						 <div class="card-header locationbg">
							<button type="button" class="btn btn-link" data-toggle="collapse" data-target="#collapsebank"><i class="fa fa-plus addbg"></i></button>
							 <input type="checkbox" name="checkAll8" id="bank_head"/> Bank
						</div>
					
					
						<div id="collapsebank" class="collapse" data-parent="#accordionExample1">
							
							<div class="locationdivbg">
								
				<div class="row masterdivleft" id="bank_div">
                <div class="col-lg-2 mastersubheading2">
                    <div class="" id="tab8">		
                       <input type="checkbox" name="permission[]" class="all_bank_list_master all_classname permission" value="bank_list">  
                       <label class="control-label">Select All</label>
                       <br>
                       <label class="control-label">Bank</label>
                       <br>
                       <input type="checkbox" name="permission[]" class="bank_list permission" value="25">  
                       <span class="control-label">List</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="bank_list permission" value="26">  
                       <span class="control-label">Create</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="bank_list permission" value="27">  
                       <span class="control-label">Edit</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="bank_list permission" value="28">  
                       <span class="control-label">Delete</span>
                       <br>
                    </div>
                 </div>
                 <div class="col-lg-2 mastersubheading2">
                    <div class="" id="tab9">	
                       <input type="checkbox" name="permission[]" class="all_bank_branch_list_master all_classname permission" value="bank_branch_list">  
                       <label class="control-label">Select All</label>
                       <br>
                       <label class="control-label">Bank Branch</label>
                       <br>
                       <input type="checkbox" name="permission[]" class="bank_branch_list permission" value="29">  
                       <span class="control-label">List</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="bank_branch_list permission" value="30">  
                       <span class="control-label">Create</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="bank_branch_list permission" value="31">  
                       <span class="control-label">Edit</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="bank_branch_list permission" value="32">  
                       <span class="control-label">Delete</span>
                       <br>
                    </div>
                 </div>
                 <div class="col-lg-2 mastersubheading2">
                    <div class="" id="tab10">
                       <input type="checkbox" name="permission[]" class="all_denomination_list_master all_classname permission" value="denomination_list">  
                       <label class="control-label">Select All</label>
                       <br>
                       <label class="control-label">Denomination</label>
                       <br>
                       <input type="checkbox" name="permission[]" class="denomination_list permission" value="33">  
                       <span class="control-label">List</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="denomination_list permission" value="34">  
                       <span class="control-label">Create</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="denomination_list permission" value="35">  
                       <span class="control-label">Edit</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="denomination_list permission" value="36">  
                       <span class="control-label">Delete</span>
                       <br>
                    </div>
                 </div>
                 <div class="col-lg-2 mastersubheading2">
                    <div class="" id="tab11">	
                       <input type="checkbox" name="permission[]" class="all_accounts_type_list_master all_classname permission" value="accounts_type_list">  
                       <label class="control-label">Select All</label>
                       <br>
                       <label class="control-label">Accounts Type</label>
                       <br>
                       <input type="checkbox" name="permission[]" class="accounts_type_list permission" value="37">  
                       <span class="control-label">List</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="accounts_type_list permission" value="38">  
                       <span class="control-label">Create</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="accounts_type_list permission" value="39">  
                       <span class="control-label">Edit</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="accounts_type_list permission" value="40">  
                       <span class="control-label">Delete</span>
                       <br>
                    </div>
                 </div>
			</div>
        </div>
							
						</div>	
					
				</div>
				
				
				
				<div class="subparent">
					
						 <div class="card-header locationbg">
							<button type="button" class="btn btn-link" data-toggle="collapse" data-target="#collapseEmployee"><i class="fa fa-plus addbg"></i></button>
							 <input type="checkbox" name="checkAll1" id="employee_head"/> Employee
						</div>
					
					
					
						<div id="collapseEmployee" class="collapse" data-parent="#accordionExample1">
							
							<div class="locationdivbg">
							
								<div class="row masterdivleft" id="employee_div">
                <div class="col-lg-2 mastersubheading2">
                    <div class="" id="tab12">		
                       <input type="checkbox" name="permission[]" class="all_department_list_master all_classname permission" value="department_list">  
                       <label class="control-label">Select All</label>
                       <br>
                       <label class="control-label">Accounts Type</label>
                       <br>
                       <input type="checkbox" name="permission[]" class="department_list permission" value="41">  
                       <span class="control-label">List</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="department_list permission" value="42">  
                       <span class="control-label">Create</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="department_list permission" value="43">  
                       <span class="control-label">Edit</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="department_list permission" value="44">  
                       <span class="control-label">Delete</span>
                       <br>
                    </div>
                 </div>
                 <div class="col-lg-2 mastersubheading2">
                    <div class="" id="tab13">	
                       <input type="checkbox" name="permission[]" class="all_desigination_list_master all_classname permission" value="desigination_list">  
                       <label class="control-label">Select All</label>
                       <br>
                       <label class="control-label">Desigination</label>
                       <br>
                       <input type="checkbox" name="permission[]" class="desigination_list permission" value="45">  
                       <span class="control-label">List</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="desigination_list permission" value="46">  
                       <span class="control-label">Create</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="desigination_list permission" value="47">  
                       <span class="control-label">Edit</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="desigination_list permission" value="48">  
                       <span class="control-label">Delete</span>
                       <br>
                    </div>
                 </div>
                 <div class="col-lg-2 mastersubheading2">
                    <div class="" id="tab14">
                       <input type="checkbox" name="permission[]" class="all_employee_list_master all_classname permission" value="employee_list">  
                       <label class="control-label">Select All</label>
                       <br>
                       <label class="control-label">Employee</label>
                       <br>
                       <input type="checkbox" name="permission[]" class="employee_list permission" value="49">  
                       <span class="control-label">List</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="employee_list permission" value="50">  
                       <span class="control-label">Create</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="employee_list permission" value="51">  
                       <span class="control-label">Edit</span>
                       <br>
                       <input type="checkbox" name="permission[]" class="employee_list permission" value="52">  
                       <span class="control-label">Delete</span>
                       <br>
                    </div>
                 </div>
            </div>
				
        				</div>
							
						</div>	
					
				</div>
	
				
				
				<div class="subparent">
					
                    <div class="card-header locationbg">
                       <button type="button" class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseUser" aria-expanded="false"><i class="fa addbg fa-plus"></i></button>
                       <input type="checkbox" name="checkAll1" id="user_head"> User
                   </div>
               
               
               
                   <div id="collapseUser" class="collapse" data-parent="#accordionExample1" style="">
                       
                       <div class="locationdivbg">
                       
                        <div class="row masterdivleft" id="user_div">
                            <div class="col-lg-2 mastersubheading2">
                                <div class="" id="tab15">		
                                   <input type="checkbox" name="permission[]" class="all_user_list_master all_classname permission" value="user_list">  
                                   <label class="control-label">Select All</label>
                                   <br>
                                   <label class="control-label">User</label>
                                   <br>
                                   <input type="checkbox" name="permission[]" class="user_list permission" value="125">  
                                   <span class="control-label">List</span>
                                   <br>
                                   <input type="checkbox" name="permission[]" class="user_list permission" value="126">  
                                   <span class="control-label">Create</span>
                                   <br>
                                   <input type="checkbox" name="permission[]" class="user_list permission" value="127">  
                                   <span class="control-label">Edit</span>
                                   <br>
                                   <input type="checkbox" name="permission[]" class="user_list permission" value="128">  
                                   <span class="control-label">Delete</span>
                                   <br>
                                </div>
                             </div>
                             <div class="col-lg-2 mastersubheading2">
                                <div class="" id="tab16">	
                                   <input type="checkbox" name="permission[]" class="all_role_list_master all_classname permission" value="role_list">  
                                   <label class="control-label">Select All</label>
                                   <br>
                                   <label class="control-label">Role</label>
                                   <br>
                                   <input type="checkbox" name="permission[]" class="role_list permission" value="129">  
                                   <span class="control-label">List</span>
                                   <br>
                                   <input type="checkbox" name="permission[]" class="role_list permission" value="130">  
                                   <span class="control-label">Create</span>
                                   <br>
                                   <input type="checkbox" name="permission[]" class="role_list permission" value="131">  
                                   <span class="control-label">Edit</span>
                                   <br>
                                   <input type="checkbox" name="permission[]" class="role_list permission" value="132">  
                                   <span class="control-label">Delete</span>
                                   <br>
                                </div>
                             </div>
                        </div>
           
                   </div>
                       
                   </div>	
               
            </div>

			<div class="subparent">
					
                    <div class="card-header locationbg">
                       <button type="button" class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseOffers" aria-expanded="false"><i class="fa addbg fa-plus"></i></button>
                       <input type="checkbox" name="checkAll1" id="account_head"> Offers
                   </div>
               
               
               
                   <div id="collapseOffers" class="collapse" data-parent="#accordionExample1" style="">
                       
                       <div class="locationdivbg">
                       
                        <div class="row masterdivleft" id="account_div">
                            <div class="col-lg-2 mastersubheading2">
                                <div class="" id="tab17">		
                                   <input type="checkbox" name="permission[]" class="all_gift_voucher_matser_list_master all_classname permission" value="gift_voucher_matser_list">  
                                   <label class="control-label">Select All</label>
                                   <br>
                                   <label class="control-label">Gift Voucher Master List</label>
                                   <br>
                                   <input type="checkbox" name="permission[]" class="gift_voucher_matser_list permission" value="65">  
                                   <span class="control-label">List</span>
                                   <br>
                                   <input type="checkbox" name="permission[]" class="gift_voucher_matser_list permission" value="66">  
                                   <span class="control-label">Create</span>
                                   <br>
                                   <input type="checkbox" name="permission[]" class="gift_voucher_matser_list permission" value="67">  
                                   <span class="control-label">Edit</span>
                                   <br>
                                   <input type="checkbox" name="permission[]" class="gift_voucher_matser_list permission" value="68">  
                                   <span class="control-label">Delete</span>
                                   <br>
                                </div>
                             </div>
                             <div class="col-lg-2 mastersubheading2">
                                <div class="" id="tab18">	
                                   <input type="checkbox" name="permission[]" class="all_offers_list_master all_classname permission" value="offers_list">  
                                   <label class="control-label">Select All</label>
                                   <br>
                                   <label class="control-label">Offers List</label>
                                   <br>
                                   <input type="checkbox" name="permission[]" class="offers_list permission" value="282">  
                                   <span class="control-label">List</span>
                                   <br>
                                   <input type="checkbox" name="permission[]" class="offers_list permission" value="283">  
                                   <span class="control-label">Create</span>
                                   <br>
                                   <input type="checkbox" name="permission[]" class="offers_list permission" value="284">  
                                   <span class="control-label">Edit</span>
                                   <br>
                                   <input type="checkbox" name="permission[]" class="offers_list permission" value="285">  
                                   <span class="control-label">Delete</span>
                                   <br>
                                </div>
                             </div>
                                                    
                            </div>
           
                   </div>
                       
                   </div>	
               
            </div>
             
            <div class="subparent">
					
                <div class="card-header locationbg">
                   <button type="button" class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseCategory" aria-expanded="false"><i class="fa addbg fa-plus"></i></button>
                   <input type="checkbox" name="checkAll1" id="Category_head"> Category
               </div>
           
           
           
               <div id="collapseCategory" class="collapse" data-parent="#accordionExample1" style="">
                   
                   <div class="locationdivbg">
                   
                    <div class="row masterdivleft" id="Category_div">
                        <div class="col-lg-2 mastersubheading2">
                            <div class="" id="tab19">		
                               <input type="checkbox" name="permission[]" class="all_category_name_master_list_master all_classname permission" value="category_name_master_list">  
                               <label class="control-label">Select All</label>
                               <br>
                               <label class="control-label">Category Name List</label>
                               <br>
                               <input type="checkbox" name="permission[]" class="category_name_master_list permission" value="77">  
                               <span class="control-label">List</span>
                               <br>
                               <input type="checkbox" name="permission[]" class="category_name_master_list permission" value="78">  
                               <span class="control-label">Create</span>
                               <br>
                               <input type="checkbox" name="permission[]" class="category_name_master_list permission" value="79">  
                               <span class="control-label">Edit</span>
                               <br>
                               <input type="checkbox" name="permission[]" class="category_name_master_list permission" value="80">  
                               <span class="control-label">Delete</span>
                               <br>
                            </div>
                         </div>
                         <div class="col-lg-2 mastersubheading2">
                            <div class="" id="tab20">	
                               <input type="checkbox" name="permission[]" class="all_brand_list_master all_classname permission" value="brand_list">  
                               <label class="control-label">Select All</label>
                               <br>
                               <label class="control-label">Brand List</label>
                               <br>
                               <input type="checkbox" name="permission[]" class="brand_list permission" value="133">  
                               <span class="control-label">List</span>
                               <br>
                               <input type="checkbox" name="permission[]" class="brand_list permission" value="134">  
                               <span class="control-label">Create</span>
                               <br>
                               <input type="checkbox" name="permission[]" class="brand_list permission" value="135">  
                               <span class="control-label">Edit</span>
                               <br>
                               <input type="checkbox" name="permission[]" class="brand_list permission" value="136">  
                               <span class="control-label">Delete</span>
                               <br>
                            </div>
                         </div>
                                        </div>
       
               </div>
                   
               </div>	
           
            </div>

            <div class="subparent">
					
                <div class="card-header locationbg">
                   <button type="button" class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseLanguage" aria-expanded="false"><i class="fa addbg fa-plus"></i></button>
                   <input type="checkbox" name="checkAll" id="Language_head"> Language
               </div>
           
           
           
               <div id="collapseLanguage" class="collapse" data-parent="#accordionExample1" style="">
                   
                   <div class="locationdivbg">
                   
                     <div class="row masterdivleft" id="Language_div">
            <div class="col-lg-2 mastersubheading2">
                <div class="" id="tab21">		
                   <input type="checkbox" name="permission[]" class="all_language_master_list_master all_classname permission" value="language_master_list">  
                   <label class="control-label">Select All</label>
                   <br>
                   <label class="control-label">Language Master List</label>
                   <br>
                   <input type="checkbox" name="permission[]" class="language_master_list permission" value="73">  
                   <span class="control-label">List</span>
                   <br>
                   <input type="checkbox" name="permission[]" class="language_master_list permission" value="74">  
                   <span class="control-label">Create</span>
                   <br>
                   <input type="checkbox" name="permission[]" class="language_master_list permission" value="75">  
                   <span class="control-label">Edit</span>
                   <br>
                   <input type="checkbox" name="permission[]" class="language_master_list permission" value="76">  
                   <span class="control-label">Delete</span>
                   <br>
                </div>
             </div>								
			</div>
       
               </div>
                   
               </div>	
           
            </div>

            <div class="subparent">
					
                <div class="card-header locationbg">
                   <button type="button" class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseItem" aria-expanded="false"><i class="fa addbg fa-plus"></i></button>
                   <input type="checkbox" name="checkAll" id="item_head"> Item
               </div>
           
           
           
               <div id="collapseItem" class="collapse" data-parent="#accordionExample1" style="">
                   
                   <div class="locationdivbg">
                   
                    <div class="row" id="item_div">
                        <div class="col-lg-2 mastersubheading2">
                            <div class="" id="tab22">	
                               <input type="checkbox" name="permission[]" class="all_item_master_list_master all_classname permission" value="item_master_list">  
                               <label class="control-label">Select All</label>
                               <br>
                               <label class="control-label">Item Master</label>
                               <br>
                               <input type="checkbox" name="permission[]" class="item_master_list permission" value="113">  
                               <span class="control-label">List</span>
                               <br>
                               <input type="checkbox" name="permission[]" class="item_master_list permission" value="114">  
                               <span class="control-label">Create</span>
                               <br>
                               <input type="checkbox" name="permission[]" class="item_master_list permission" value="115">  
                               <span class="control-label">Edit</span>
                               <br>
                               <input type="checkbox" name="permission[]" class="item_master_list permission" value="116">  
                               <span class="control-label">Delete</span>
                               <br>
                            </div>
                         </div>
                         <div class="col-lg-2 mastersubheading2">
                            <div class="" id="tab23">		
                               <input type="checkbox" name="permission[]" class="all_tax_list_master all_classname permission" value="tax_list">  
                               <label class="control-label">Select All</label>
                               <br>
                               <label class="control-label">Tax</label>
                               <br>
                               <input type="checkbox" name="permission[]" class="tax_list permission" value="286">  
                               <span class="control-label">List</span>
                               <br>
                               <input type="checkbox" name="permission[]" class="tax_list permission" value="287">  
                               <span class="control-label">Create</span>
                               <br>
                               <input type="checkbox" name="permission[]" class="tax_list permission" value="288">  
                               <span class="control-label">Edit</span>
                               <br>
                               <input type="checkbox" name="permission[]" class="tax_list permission" value="289">  
                               <span class="control-label">Delete</span>
                               <br>
                            </div>
                         </div>
                         <div class="col-lg-2 mastersubheading2">
                            <div class="" id="tab24">		
                               <input type="checkbox" name="permission[]" class="all_uom_list_master all_classname permission" value="uom_list">  
                               <label class="control-label">Select All</label>
                               <br>
                               <label class="control-label">Uom</label>
                               <br>
                               <input type="checkbox" name="permission[]" class="uom_list permission" value="69">  
                               <span class="control-label">List</span>
                               <br>
                               <input type="checkbox" name="permission[]" class="uom_list permission" value="70">  
                               <span class="control-label">Create</span>
                               <br>
                               <input type="checkbox" name="permission[]" class="uom_list permission" value="71">  
                               <span class="control-label">Edit</span>
                               <br>
                               <input type="checkbox" name="permission[]" class="uom_list permission" value="72">  
                               <span class="control-label">Delete</span>
                               <br>
                            </div>
                         </div>
                         <div class="col-lg-2 mastersubheading2">
                            <div class="" id="tab25">		
                               <input type="checkbox" name="permission[]" class="all_item_tax_details_list_master all_classname permission" value="item_tax_details_list">  
                               <label class="control-label">Select All</label>
                               <br>
                               <label class="control-label">Item Tax Details</label>
                               <br>
                               <input type="checkbox" name="permission[]" class="item_tax_details_list permission" value="121">  
                               <span class="control-label">List</span>
                               <br>
                               <input type="checkbox" name="permission[]" class="item_tax_details_list permission" value="122">  
                               <span class="control-label">Create</span>
                               <br>
                               <input type="checkbox" name="permission[]" class="item_tax_details_list permission" value="123">  
                               <span class="control-label">Edit</span>
                               <br>
                               <input type="checkbox" name="permission[]" class="item_tax_details_list permission" value="124">  
                               <span class="control-label">Delete</span>
                               <br>
                            </div>
                         </div>
                                        
                                    </div>
       
               </div>
                   
               </div>	
           
            </div>

            <div class="subparent">
					
                <div class="card-header locationbg">
                   <button type="button" class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseVendor" aria-expanded="false"><i class="fa addbg fa-plus"></i></button>
                   <input type="checkbox" name="checkAll1" id="Vendor_head"> Vendor
               </div>
           
           
           
               <div id="collapseVendor" class="collapse" data-parent="#accordionExample1" style="">
                   
                   <div class="locationdivbg">
                   
                    <div class="row" id="Vendor_div">
                        <div class="col-lg-2 mastersubheading2">
                            <div class="" id="tab26">		
                               <input type="checkbox" name="permission[]" class="all_agent_list_master all_classname permission" value="agent_list">  
                               <label class="control-label">Select All</label>
                               <br>
                               <label class="control-label">Agent</label>
                               <br>
                               <input type="checkbox" name="permission[]" class="agent_list permission" value="93">  
                               <span class="control-label">List</span>
                               <br>
                               <input type="checkbox" name="permission[]" class="agent_list permission" value="94">  
                               <span class="control-label">Create</span>
                               <br>
                               <input type="checkbox" name="permission[]" class="agent_list permission" value="95">  
                               <span class="control-label">Edit</span>
                               <br>
                               <input type="checkbox" name="permission[]" class="agent_list permission" value="96">  
                               <span class="control-label">Delete</span>
                               <br>
                            </div>
                         </div>									
                         <div class="col-lg-2 mastersubheading2">
                            <div class="" id="tab27">		
                               <input type="checkbox" name="permission[]" class="all_customer_list_master all_classname permission" value="customer_list">  
                               <label class="control-label">Select All</label>
                               <br>
                               <label class="control-label">Customer Name List</label>
                               <br>
                               <input type="checkbox" name="permission[]" class="customer_list permission" value="97">  
                               <span class="control-label">List</span>
                               <br>
                               <input type="checkbox" name="permission[]" class="customer_list permission" value="98">  
                               <span class="control-label">Create</span>
                               <br>
                               <input type="checkbox" name="permission[]" class="customer_list permission" value="99">  
                               <span class="control-label">Edit</span>
                               <br>
                               <input type="checkbox" name="permission[]" class="customer_list permission" value="100">  
                               <span class="control-label">Delete</span>
                               <br>
                            </div>
                         </div>
                         <div class="col-lg-2 mastersubheading2">
                            <div class="" id="tab28">		
                               <input type="checkbox" name="permission[]" class="all_supplier_list_master all_classname permission" value="supplier_list">  
                               <label class="control-label">Select All</label>
                               <br>
                               <label class="control-label">Supplier</label>
                               <br>
                               <input type="checkbox" name="permission[]" class="supplier_list permission" value="101">  
                               <span class="control-label">List</span>
                               <br>
                               <input type="checkbox" name="permission[]" class="supplier_list permission" value="102">  
                               <span class="control-label">Create</span>
                               <br>
                               <input type="checkbox" name="permission[]" class="supplier_list permission" value="103">  
                               <span class="control-label">Edit</span>
                               <br>
                               <input type="checkbox" name="permission[]" class="supplier_list permission" value="104">  
                               <span class="control-label">Delete</span>
                               <br>
                            </div>
                         </div>
                         <div class="col-lg-2 mastersubheading2">
                            <div class="" id="tab29">		
                               <input type="checkbox" name="permission[]" class="all_salesman_list_master all_classname permission" value="salesman_list">  
                               <label class="control-label">Select All</label>
                               <br>
                               <label class="control-label">Salesman</label>
                               <br>
                               <input type="checkbox" name="permission[]" class="salesman_list permission" value="294">  
                               <span class="control-label">List</span>
                               <br>
                               <input type="checkbox" name="permission[]" class="salesman_list permission" value="295">  
                               <span class="control-label">Create</span>
                               <br>
                               <input type="checkbox" name="permission[]" class="salesman_list permission" value="296">  
                               <span class="control-label">Edit</span>
                               <br>
                               <input type="checkbox" name="permission[]" class="salesman_list permission" value="297">  
                               <span class="control-label">Delete</span>
                               <br>
                            </div>
                         </div>
                                                
                                            </div>
       
               </div>
                   
               </div>	
           
            </div>

            <div class="subparent">
					
                <div class="card-header locationbg">
                   <button type="button" class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseArea" aria-expanded="false"><i class="fa addbg fa-plus"></i></button>
                   <input type="checkbox" name="checkAll" id="Area_head"> Area
               </div>
           
           
           
               <div id="collapseArea" class="collapse" data-parent="#accordionExample1" style="">
                   
                   <div class="locationdivbg">
                   
                    <div class="row" id="Area_div">
                        <div class="col-lg-2 mastersubheading2">
                            <div class="" id="tab30">		
                               <input type="checkbox" name="permission[]" class="all_area_list_master all_classname permission" value="area_list">  
                               <label class="control-label">Select All</label>
                               <br>
                               <label class="control-label">Area Name</label>
                               <br>
                               &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                               <input type="checkbox" name="permission[]" class="area_list permission" value="105">  
                               <span class="control-label">List</span>
                               <br>
                               &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                               <input type="checkbox" name="permission[]" class="area_list permission" value="106">  
                               <span class="control-label">Create</span>
                               <br>
                               &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                               <input type="checkbox" name="permission[]" class="area_list permission" value="107">  
                               <span class="control-label">Edit</span>
                               <br>
                               &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                               <input type="checkbox" name="permission[]" class="area_list permission" value="108">  
                               <span class="control-label">Delete</span>
                               <br>
                            </div>
                         </div>
                                        </div>
       
               </div>
                   
               </div>	
           
            </div>

            <div class="subparent">
					
                <div class="card-header locationbg">
                   <button type="button" class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseGroup" aria-expanded="false"><i class="fa addbg fa-plus"></i></button>
                   <input type="checkbox" name="checkAll" id="AccountGroup_head"> Account Group
               </div>         
           
           
               <div id="collapseGroup" class="collapse" data-parent="#accordionExample1" style="">
                   
                   <div class="locationdivbg">
                   
                    <div class="row" id="AccountGroup_div">
                        <div class="col-lg-2 mastersubheading2">
                            <div class="" id="tab31">		
                               <input type="checkbox" name="permission[]" class="all_account_group_list_master all_classname permission" value="account_group_list">  
                               <label class="control-label">Select All</label>
                               <br>
                               <label class="control-label">Account Group</label>
                               <br>
                               &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                               <input type="checkbox" name="permission[]" class="account_group_list permission" value="302">  
                               <span class="control-label">List</span>
                               <br>
                               &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                               <input type="checkbox" name="permission[]" class="account_group_list permission" value="303">  
                               <span class="control-label">Create</span>
                               <br>
                               &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                               <input type="checkbox" name="permission[]" class="account_group_list permission" value="304">  
                               <span class="control-label">Edit</span>
                               <br>
                               &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                               <input type="checkbox" name="permission[]" class="account_group_list permission" value="305">  
                               <span class="control-label">Delete</span>
                               <br>
                            </div>
                         </div>
                                            
                         <div class="col-lg-2 mastersubheading2">
                            <div class="" id="tab32">		
                               <input type="checkbox" name="permission[]" class="all_account_head_list_master all_classname permission" value="account_head_list">  
                               <label class="control-label">Select All</label>
                               <br>
                               <label class="control-label">Account Head</label>
                               <br>
                               &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                               <input type="checkbox" name="permission[]" class="account_head_list permission" value="306">  
                               <span class="control-label">List</span>
                               <br>
                               &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                               <input type="checkbox" name="permission[]" class="account_head_list permission" value="307">  
                               <span class="control-label">Create</span>
                               <br>
                               &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                               <input type="checkbox" name="permission[]" class="account_head_list permission" value="308">  
                               <span class="control-label">Edit</span>
                               <br>
                               &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                               <input type="checkbox" name="permission[]" class="account_head_list permission" value="309">  
                               <span class="control-label">Delete</span>
                               <br>
                            </div>
                         </div>
                         <div class="col-lg-2 mastersubheading2">
                            <div class="" id="tab33">		
                               <input type="checkbox" name="permission[]" class="all_account_group_tax_list_master all_classname permission" value="account_group_tax_list">  
                               <label class="control-label">Select All</label>
                               <br>
                               <label class="control-label">Account Group Tax</label>
                               <br>
                               &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                               <input type="checkbox" name="permission[]" class="account_group_tax_list permission" value="310">  
                               <span class="control-label">List</span>
                               <br>
                               &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                               <input type="checkbox" name="permission[]" class="account_group_tax_list permission" value="311">  
                               <span class="control-label">Create</span>
                               <br>
                               &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                               <input type="checkbox" name="permission[]" class="account_group_tax_list permission" value="312">  
                               <span class="control-label">Edit</span>
                               <br>
                               &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                               <input type="checkbox" name="permission[]" class="account_group_tax_list permission" value="313">  
                               <span class="control-label">Delete</span>
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
				
							 <input style=" text-align: center;" type="checkbox" class="employee_head" id="transaction_management"/>
				<b>Transaction Management</b>			
           </div>		
	  
				
		    <div id="collapsetwo" class="collapse" data-parent="#accordionExample">			
		
			<div id="accordionExample2">
				
				<div class="subparent">
					
						 <div class="card-header locationbg">
							<button type="button" class="btn btn-link" data-toggle="collapse" data-target="#collapsePurchase"><i class="fa fa-plus addbg"></i></button>
							<input type="checkbox" name="checkAll1" id="purchase_head"/> Purchase
						</div>
					
					
					
						<div id="collapsePurchase" class="collapse" data-parent="#accordionExample2">
							
							<div class="locationdivbg">
							
								<div class="row" id="purchase_div">
									
					<div class="col-lg-2 mastersubheading2">
   <div class="" id="tab34">		
      <input type="checkbox" name="permission[]" class="all_estimation_list_master all_classname permission" value="estimation_list">  
      <label class="control-label">Select All</label>
      <br>
      <label class="control-label">Estimation</label>
      <br>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <input type="checkbox" name="permission[]" class="estimation_list permission" value="141">  
      <span class="control-label">List</span>
      <br>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <input type="checkbox" name="permission[]" class="estimation_list permission" value="142">  
      <span class="control-label">Create</span>
      <br>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <input type="checkbox" name="permission[]" class="estimation_list permission" value="144">  
      <span class="control-label">Edit</span>
      <br>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <input type="checkbox" name="permission[]" class="estimation_list permission" value="145">  
      <span class="control-label">Delete</span>
      <br>
   </div>
</div>
					
					<div class="col-lg-2 mastersubheading2">
   <div class="" id="tab35">		
      <input type="checkbox" name="permission[]" class="all_purchase_order_list_master all_classname permission" value="purchase_order_list">  
      <label class="control-label">Select All</label>
      <br>
      <label class="control-label">Purchase</label>
      <br>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <input type="checkbox" name="permission[]" class="purchase_order_list permission" value="146">  
      <span class="control-label">List</span>
      <br>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <input type="checkbox" name="permission[]" class="purchase_order_list permission" value="147">  
      <span class="control-label">Create</span>
      <br>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <input type="checkbox" name="permission[]" class="purchase_order_list permission" value="148">  
      <span class="control-label">Edit</span>
      <br>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <input type="checkbox" name="permission[]" class="purchase_order_list permission" value="149">  
      <span class="control-label">Delete</span>
      <br>
   </div>
</div>
					
					<div class="col-lg-2 mastersubheading2">
   <div class="" id="tab36">		
      <input type="checkbox" name="permission[]" class="all_receipt_note_list_master all_classname permission" value="receipt_note_list">  
      <label class="control-label">Select All</label>
      <br>
      <label class="control-label">Receipt Note</label>
      <br>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <input type="checkbox" name="permission[]" class="receipt_note_list permission" value="150">  
      <span class="control-label">List</span>
      <br>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <input type="checkbox" name="permission[]" class="receipt_note_list permission" value="151">  
      <span class="control-label">Create</span>
      <br>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <input type="checkbox" name="permission[]" class="receipt_note_list permission" value="152">  
      <span class="control-label">Edit</span>
      <br>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <input type="checkbox" name="permission[]" class="receipt_note_list permission" value="153">  
      <span class="control-label">Delete</span>
      <br>
   </div>
</div>
					
					<div class="col-lg-2 mastersubheading2">
   <div class="" id="tab37">		
      <input type="checkbox" name="permission[]" class="all_purchase_entry_list_master all_classname permission" value="purchase_entry_list">  
      <label class="control-label">Select All</label>
      <br>
      <label class="control-label">Purchase Entry</label>
      <br>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <input type="checkbox" name="permission[]" class="purchase_entry_list permission" value="154">  
      <span class="control-label">List</span>
      <br>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <input type="checkbox" name="permission[]" class="purchase_entry_list permission" value="155">  
      <span class="control-label">Create</span>
      <br>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <input type="checkbox" name="permission[]" class="purchase_entry_list permission" value="156">  
      <span class="control-label">Edit</span>
      <br>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <input type="checkbox" name="permission[]" class="purchase_entry_list permission" value="157">  
      <span class="control-label">Delete</span>
      <br>
   </div>
</div>
					
					<div class="col-lg-2 mastersubheading2">
   <div class="" id="tab38">		
      <input type="checkbox" name="permission[]" class="all_rejection_out_list_master all_classname permission" value="rejection_out_list">  
      <label class="control-label">Select All</label>
      <br>
      <label class="control-label">Rejection Out</label>
      <br>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <input type="checkbox" name="permission[]" class="rejection_out_list permission" value="158">  
      <span class="control-label">List</span>
      <br>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <input type="checkbox" name="permission[]" class="rejection_out_list permission" value="159">  
      <span class="control-label">Create</span>
      <br>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <input type="checkbox" name="permission[]" class="rejection_out_list permission" value="160">  
      <span class="control-label">Edit</span>
      <br>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <input type="checkbox" name="permission[]" class="rejection_out_list permission" value="161">  
      <span class="control-label">Delete</span>
      <br>
   </div>
</div>
					
					<div class="col-lg-2 mastersubheading2">
   <div class="" id="tab39">		
      <input type="checkbox" name="permission[]" class="all_purchase_gate_entry_list_master all_classname permission" value="purchase_gate_entry_list">  
      <label class="control-label">Select All</label>
      <br>
      <label class="control-label">Purchase Gate Pass Entry</label>
      <br>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <input type="checkbox" name="permission[]" class="purchase_gate_entry_list permission" value="162">  
      <span class="control-label">List</span>
      <br>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <input type="checkbox" name="permission[]" class="purchase_gate_entry_list permission" value="163">  
      <span class="control-label">Create</span>
      <br>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <input type="checkbox" name="permission[]" class="purchase_gate_entry_list permission" value="164">  
      <span class="control-label">Edit</span>
      <br>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <input type="checkbox" name="permission[]" class="purchase_gate_entry_list permission" value="165">  
      <span class="control-label">Delete</span>
      <br>
   </div>
</div>
					
					<div class="col-lg-2 mastersubheading2">
   <div class="" id="tab40">		
      <input type="checkbox" name="permission[]" class="all_debit_note_list_master all_classname permission" value="debit_note_list">  
      <label class="control-label">Select All</label>
      <br>
      <label class="control-label">Debit Note</label>
      <br>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <input type="checkbox" name="permission[]" class="debit_note_list permission" value="166">  
      <span class="control-label">List</span>
      <br>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <input type="checkbox" name="permission[]" class="debit_note_list permission" value="167">  
      <span class="control-label">Create</span>
      <br>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <input type="checkbox" name="permission[]" class="debit_note_list permission" value="168">  
      <span class="control-label">Edit</span>
      <br>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <input type="checkbox" name="permission[]" class="debit_note_list permission" value="169">  
      <span class="control-label">Delete</span>
      <br>
   </div>
</div>
									
								
									
								</div>
				
        				</div>
							
						</div>	
					
				</div>
				
				<div class="subparent">
					
						 <div class="card-header locationbg">
							<button type="button" class="btn btn-link" data-toggle="collapse" data-target="#collapseSales"><i class="fa fa-plus addbg"></i></button>
							<input type="checkbox" name="checkAll" id="Sales_head"/> Sales
						</div>
					
					
					
						<div id="collapseSales" class="collapse" data-parent="#accordionExample2">
							
							<div class="locationdivbg">
							
								<div class="row" id="Sales_div">
									
				<div class="col-lg-2 mastersubheading2">
   <div class="" id="tab41">		
      <input type="checkbox" name="permission[]" class="all_sales_estimation_list_master all_classname permission" value="sales_estimation_list">  
      <label class="control-label">Select All</label>
      <br>
      <label class="control-label">Sales Estimation</label>
      <br>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <input type="checkbox" name="permission[]" class="sales_estimation_list permission" value="170">  
      <span class="control-label">List</span>
      <br>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <input type="checkbox" name="permission[]" class="sales_estimation_list permission" value="171">  
      <span class="control-label">Create</span>
      <br>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <input type="checkbox" name="permission[]" class="sales_estimation_list permission" value="172">  
      <span class="control-label">Edit</span>
      <br>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <input type="checkbox" name="permission[]" class="sales_estimation_list permission" value="173">  
      <span class="control-label">Delete</span>
      <br>
   </div>
</div>
					
					<div class="col-lg-2 mastersubheading2">
   <div class="" id="tab42">		
      <input type="checkbox" name="permission[]" class="all_sales_order_list_master all_classname permission" value="sales_order_list">  
      <label class="control-label">Select All</label>
      <br>
      <label class="control-label">Sales Order</label>
      <br>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <input type="checkbox" name="permission[]" class="sales_order_list permission" value="174">  
      <span class="control-label">List</span>
      <br>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <input type="checkbox" name="permission[]" class="sales_order_list permission" value="175">  
      <span class="control-label">Create</span>
      <br>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <input type="checkbox" name="permission[]" class="sales_order_list permission" value="176">  
      <span class="control-label">Edit</span>
      <br>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <input type="checkbox" name="permission[]" class="sales_order_list permission" value="177">  
      <span class="control-label">Delete</span>
      <br>
   </div>
</div>
					
					
					<div class="col-lg-2 mastersubheading2">
   <div class="" id="tab43">		
      <input type="checkbox" name="permission[]" class="all_delivery_note_list_master all_classname permission" value="delivery_note_list">  
      <label class="control-label">Select All</label>
      <br>
      <label class="control-label">Delivery Notes</label>
      <br>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <input type="checkbox" name="permission[]" class="delivery_note_list permission" value="178">  
      <span class="control-label">List</span>
      <br>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <input type="checkbox" name="permission[]" class="delivery_note_list permission" value="179">  
      <span class="control-label">Create</span>
      <br>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <input type="checkbox" name="permission[]" class="delivery_note_list permission" value="180">  
      <span class="control-label">Edit</span>
      <br>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <input type="checkbox" name="permission[]" class="delivery_note_list permission" value="181">  
      <span class="control-label">Delete</span>
      <br>
   </div>
</div>
					
					
					
					<div class="col-lg-2 mastersubheading2">
   <div class="" id="tab44">		
      <input type="checkbox" name="permission[]" class="all_sales_entry_list_master all_classname permission" value="sales_entry_list">  
      <label class="control-label">Select All</label>
      <br>
      <label class="control-label">Sales Entry</label>
      <br>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <input type="checkbox" name="permission[]" class="sales_entry_list permission" value="182">  
      <span class="control-label">List</span>
      <br>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <input type="checkbox" name="permission[]" class="sales_entry_list permission" value="183">  
      <span class="control-label">Create</span>
      <br>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <input type="checkbox" name="permission[]" class="sales_entry_list permission" value="184">  
      <span class="control-label">Edit</span>
      <br>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <input type="checkbox" name="permission[]" class="sales_entry_list permission" value="185">  
      <span class="control-label">Delete</span>
      <br>
   </div>
</div>
					
					
					
					<div class="col-lg-2 mastersubheading2">
   <div class="" id="tab45">		
      <input type="checkbox" name="permission[]" class="all_rejection_in_list_master all_classname permission" value="rejection_in_list">  
      <label class="control-label">Select All</label>
      <br>
      <label class="control-label">Rejection In</label>
      <br>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <input type="checkbox" name="permission[]" class="rejection_in_list permission" value="186">  
      <span class="control-label">List</span>
      <br>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <input type="checkbox" name="permission[]" class="rejection_in_list permission" value="187">  
      <span class="control-label">Create</span>
      <br>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <input type="checkbox" name="permission[]" class="rejection_in_list permission" value="188">  
      <span class="control-label">Edit</span>
      <br>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <input type="checkbox" name="permission[]" class="rejection_in_list permission" value="189">  
      <span class="control-label">Delete</span>
      <br>
   </div>
</div>	
					
					
					<div class="col-lg-2 mastersubheading2">
   <div class="" id="tab46">		
      <input type="checkbox" name="permission[]" class="all_sales_gatepass_entry_list_master all_classname permission" value="sales_gatepass_entry_list">  
      <label class="control-label">Select All</label>
      <br>
      <label class="control-label">Sales Gatepass Entry</label>
      <br>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <input type="checkbox" name="permission[]" class="sales_gatepass_entry_list permission" value="190">  
      <span class="control-label">List</span>
      <br>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <input type="checkbox" name="permission[]" class="sales_gatepass_entry_list permission" value="191">  
      <span class="control-label">Create</span>
      <br>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <input type="checkbox" name="permission[]" class="sales_gatepass_entry_list permission" value="192">  
      <span class="control-label">Edit</span>
      <br>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <input type="checkbox" name="permission[]" class="sales_gatepass_entry_list permission" value="193">  
      <span class="control-label">Delete</span>
      <br>
   </div>
</div>
					
					
					
					<div class="col-lg-2 mastersubheading2">
   <div class="" id="tab47">		
      <input type="checkbox" name="permission[]" class="all_credit_note_list_master all_classname permission" value="credit_note_list">  
      <label class="control-label">Select All</label>
      <br>
      <label class="control-label">Credit Note</label>
      <br>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <input type="checkbox" name="permission[]" class="credit_note_list permission" value="194">  
      <span class="control-label">List</span>
      <br>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <input type="checkbox" name="permission[]" class="credit_note_list permission" value="195">  
      <span class="control-label">Create</span>
      <br>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <input type="checkbox" name="permission[]" class="credit_note_list permission" value="196">  
      <span class="control-label">Edit</span>
      <br>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <input type="checkbox" name="permission[]" class="credit_note_list permission" value="197">  
      <span class="control-label">Delete</span>
      <br>
   </div>
</div>
					
					
							
								
									
								</div>
				
        				</div>
							
						</div>	
					
				</div>
				
				
				<div class="subparent">
					
						 <div class="card-header locationbg">
							<button type="button" class="btn btn-link" data-toggle="collapse" data-target="#collapsePayments"><i class="fa fa-plus addbg"></i></button>
							<input type="checkbox" name="checkAll" id="Payments_head"/> Payments
						</div>
					
					
					
						<div id="collapsePayments" class="collapse" data-parent="#accordionExample2">
							
							<div class="locationdivbg">
							
								<div class="row" id="Payments_div">
									
				<div class="col-lg-2 mastersubheading2">
   <div class="" id="tab48">		
      <input type="checkbox" name="permission[]" class="all_payment_request_list_master all_classname permission" value="payment_request_list">  
      <label class="control-label">Select All</label>
      <br>
      <label class="control-label">Payment Request</label>
      <br>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <input type="checkbox" name="permission[]" class="payment_request_list permission" value="198">  
      <span class="control-label">List</span>
      <br>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <input type="checkbox" name="permission[]" class="payment_request_list permission" value="199">  
      <span class="control-label">Create</span>
      <br>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <input type="checkbox" name="permission[]" class="payment_request_list permission" value="200">  
      <span class="control-label">Edit</span>
      <br>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <input type="checkbox" name="permission[]" class="payment_request_list permission" value="201">  
      <span class="control-label">Delete</span>
      <br>
   </div>
</div>
					
					
					
					<div class="col-lg-2 mastersubheading2">
   <div class="" id="tab49">		
      <input type="checkbox" name="permission[]" class="all_payment_process_list_master all_classname permission" value="payment_process_list">  
      <label class="control-label">Select All</label>
      <br>
      <label class="control-label">Payment Process</label>
      <br>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <input type="checkbox" name="permission[]" class="payment_process_list permission" value="202">  
      <span class="control-label">List</span>
      <br>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <input type="checkbox" name="permission[]" class="payment_process_list permission" value="203">  
      <span class="control-label">Create</span>
      <br>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <input type="checkbox" name="permission[]" class="payment_process_list permission" value="204">  
      <span class="control-label">Edit</span>
      <br>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <input type="checkbox" name="permission[]" class="payment_process_list permission" value="205">  
      <span class="control-label">Delete</span>
      <br>
   </div>
</div>
					
					
					
					
					<div class="col-lg-2 mastersubheading2">
   <div class="" id="tab50">		
      <input type="checkbox" name="permission[]" class="all_payment_expenses_list_master all_classname permission" value="payment_expenses_list">  
      <label class="control-label">Select All</label>
      <br>
      <label class="control-label">Payment Expenses</label>
      <br>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <input type="checkbox" name="permission[]" class="payment_expenses_list permission" value="206">  
      <span class="control-label">List</span>
      <br>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <input type="checkbox" name="permission[]" class="payment_expenses_list permission" value="207">  
      <span class="control-label">Create</span>
      <br>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <input type="checkbox" name="permission[]" class="payment_expenses_list permission" value="208">  
      <span class="control-label">Edit</span>
      <br>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <input type="checkbox" name="permission[]" class="payment_expenses_list permission" value="209">  
      <span class="control-label">Delete</span>
      <br>
   </div>
</div>
					
					
							
								
									
								</div>
				
        				</div>
							
						</div>	
					
				</div>
				
				
				<div class="subparent">
					
						 <div class="card-header locationbg">
							<button type="button" class="btn btn-link" data-toggle="collapse" data-target="#collapseReceipts"><i class="fa fa-plus addbg"></i></button>
							<input type="checkbox" name="checkAll" id="Receipts_head"/> Receipts
						</div>
					
					
					
						<div id="collapseReceipts" class="collapse" data-parent="#accordionExample2">
							
							<div class="locationdivbg">
							
								<div class="row" id="Receipts_div">
									
					<div class="col-lg-2 mastersubheading2">
   <div class="" id="tab51">		
      <input type="checkbox" name="permission[]" class="all_receipt_request_list_master all_classname permission" value="receipt_request_list">  
      <label class="control-label">Select All</label>
      <br>
      <label class="control-label">Receipt Request</label>
      <br>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <input type="checkbox" name="permission[]" class="receipt_request_list permission" value="210">  
      <span class="control-label">List</span>
      <br>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <input type="checkbox" name="permission[]" class="receipt_request_list permission" value="211">  
      <span class="control-label">Create</span>
      <br>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <input type="checkbox" name="permission[]" class="receipt_request_list permission" value="212">  
      <span class="control-label">Edit</span>
      <br>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <input type="checkbox" name="permission[]" class="receipt_request_list permission" value="213">  
      <span class="control-label">Delete</span>
      <br>
   </div>
</div>
					
					
					<div class="col-lg-2 mastersubheading2">
   <div class="" id="tab52">		
      <input type="checkbox" name="permission[]" class="all_receipt_process_list_master all_classname permission" value="receipt_process_list">  
      <label class="control-label">Select All</label>
      <br>
      <label class="control-label">Receipt Process</label>
      <br>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <input type="checkbox" name="permission[]" class="receipt_process_list permission" value="214">  
      <span class="control-label">List</span>
      <br>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <input type="checkbox" name="permission[]" class="receipt_process_list permission" value="215">  
      <span class="control-label">Create</span>
      <br>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <input type="checkbox" name="permission[]" class="receipt_process_list permission" value="216">  
      <span class="control-label">Edit</span>
      <br>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <input type="checkbox" name="permission[]" class="receipt_process_list permission" value="217">  
      <span class="control-label">Delete</span>
      <br>
   </div>
</div>
					
					
					<div class="col-lg-2 mastersubheading2">
   <div class="" id="tab53">		
      <input type="checkbox" name="permission[]" class="all_receipt_income_list_master all_classname permission" value="receipt_income_list">  
      <label class="control-label">Select All</label>
      <br>
      <label class="control-label">Receipt Income</label>
      <br>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <input type="checkbox" name="permission[]" class="receipt_income_list permission" value="218">  
      <span class="control-label">List</span>
      <br>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <input type="checkbox" name="permission[]" class="receipt_income_list permission" value="219">  
      <span class="control-label">Create</span>
      <br>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <input type="checkbox" name="permission[]" class="receipt_income_list permission" value="220">  
      <span class="control-label">Edit</span>
      <br>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <input type="checkbox" name="permission[]" class="receipt_income_list permission" value="221">  
      <span class="control-label">Delete</span>
      <br>
   </div>
</div>
					
					
							
								
									
								</div>
				
        				</div>
							
						</div>	
					
				</div>
				
				<div class="subparent">
					
						 <div class="card-header locationbg">
							<button type="button" class="btn btn-link" data-toggle="collapse" data-target="#collapseAdvance"><i class="fa fa-plus addbg"></i></button>
							<input type="checkbox" name="checkAll" id="Advance_head"/> Advance
						</div>
					
					
					
						<div id="collapseAdvance" class="collapse" data-parent="#accordionExample2">
							
							<div class="locationdivbg">
							
								<div class="row" id="Advance_div">
									
					<div class="col-lg-3 mastersubheading2">
   <div class="" id="tab54">		
      <input type="checkbox" name="permission[]" class="all_advance_to_suppliers_list_master all_classname permission" value="advance_to_suppliers_list">  
      <label class="control-label">Select All</label>
      <br>
      <label class="control-label">Advance To Suppliers</label>
      <br>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <input type="checkbox" name="permission[]" class="advance_to_suppliers_list permission" value="222">  
      <span class="control-label">List</span>
      <br>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <input type="checkbox" name="permission[]" class="advance_to_suppliers_list permission" value="223">  
      <span class="control-label">Create</span>
      <br>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <input type="checkbox" name="permission[]" class="advance_to_suppliers_list permission" value="224">  
      <span class="control-label">Edit</span>
      <br>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <input type="checkbox" name="permission[]" class="advance_to_suppliers_list permission" value="225">  
      <span class="control-label">Delete</span>
      <br>
   </div>
</div>
					
					
					<div class="col-lg-3 mastersubheading2">
   <div class="" id="tab55">		
      <input type="checkbox" name="permission[]" class="all_advance_from_customers_list_master all_classname permission" value="advance_from_customers_list">  
      <label class="control-label">Select All</label>
      <br>
      <label class="control-label">Advance From Customers</label>
      <br>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <input type="checkbox" name="permission[]" class="advance_from_customers_list permission" value="226">  
      <span class="control-label">List</span>
      <br>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <input type="checkbox" name="permission[]" class="advance_from_customers_list permission" value="227">  
      <span class="control-label">Create</span>
      <br>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <input type="checkbox" name="permission[]" class="advance_from_customers_list permission" value="228">  
      <span class="control-label">Edit</span>
      <br>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <input type="checkbox" name="permission[]" class="advance_from_customers_list permission" value="229">  
      <span class="control-label">Delete</span>
      <br>
   </div>
</div>
					
					
							
								
									
								</div>
				
        				</div>
							
						</div>	
					
				</div>
				
				
				<div class="subparent">
					
						 <div class="card-header locationbg">
							<button type="button" class="btn btn-link" data-toggle="collapse" data-target="#collapseAccount"><i class="fa fa-plus addbg"></i></button>
							<input type="checkbox" name="checkAll" id="AccountExpense_head"/> Account Expense
						</div>
					
					
					
						<div id="collapseAccount" class="collapse" data-parent="#accordionExample2">
							
							<div class="locationdivbg">
							
								<div class="row" id="AccountExpense_div">
									
					<div class="col-lg-2 mastersubheading2">
   <div class="" id="tab56">		
      <input type="checkbox" name="permission[]" class="all_account_expense_list_master all_classname permission" value="account_expense_list">  
      <label class="control-label">Select All</label>
      <br>
      <label class="control-label">Account Expense</label>
      <br>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <input type="checkbox" name="permission[]" class="account_expense_list permission" value="230">  
      <span class="control-label">List</span>
      <br>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <input type="checkbox" name="permission[]" class="account_expense_list permission" value="231">  
      <span class="control-label">Create</span>
      <br>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <input type="checkbox" name="permission[]" class="account_expense_list permission" value="232">  
      <span class="control-label">Edit</span>
      <br>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <input type="checkbox" name="permission[]" class="account_expense_list permission" value="233">  
      <span class="control-label">Delete</span>
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
                            
					<button type="button" class="btn btn-link" data-toggle="collapse" data-target="#collapsethree"><i class="fa fa-plus addbg"></i></button>	
				
							 <input style=" text-align: center;" type="checkbox" class="prize_updation" id="prize_updation"/>
							 <b>Price Updation</b>				
        	   </div>
				
				
				<div id="collapsethree" class="collapse" data-parent="#accordionExample">			
		
			<div id="accordionExample3">
				
				<div class="subparent">
					
						 <div class="card-header locationbg">
							<div class="locationdivbg">
							
								<div class="col-lg-3 mastersubheading2">
   <div class="" id="tab57">		
      <input type="checkbox" name="permission[]" class="all_price_updation_list_master all_classname permission" value="price_updation_list">  
      <label class="control-label">Select All</label>
      <br>
      <label class="control-label">Price Updation</label>
      <br>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <input type="checkbox" name="permission[]" class="price_updation_list permission" value="314">  
      <span class="control-label">List</span>
      <br>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <input type="checkbox" name="permission[]" class="price_updation_list permission" value="315">  
      <span class="control-label">Create</span>
      <br>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <input type="checkbox" name="permission[]" class="price_updation_list permission" value="316">  
      <span class="control-label">Edit</span>
      <br>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <input type="checkbox" name="permission[]" class="price_updation_list permission" value="317">  
      <span class="control-label">Delete</span>
      <br>
   </div>
</div>
				
        				</div>
						</div>
					
				</div>
				
				
				
		  </div>
		  
      
	  
      </div>
				
				
				
				 <div class="card-header masterbg margintop" id="heading">
                            
                <button type="button" class="btn btn-link" data-toggle="collapse" data-target="#collapsefour"><i class="fa fa-plus addbg"></i></button>	
            
                <input style=" text-align: center;" type="checkbox" class="customer_head" id="outstanding">
                <b>Outstanding</b>			
           </div>
				
				
           <div id="collapsefour" class="collapse" data-parent="#accordionExample">			
		
			<div id="accordionExample4">
				
				<div class="subparent">
					
						 <div class="card-header locationbg">
							<button type="button" class="btn btn-link" data-toggle="collapse" data-target="#collapseReceivables"><i class="fa fa-plus addbg"></i></button>
							<input type="checkbox" name="checkAll" id="Receivables_head"/> Receivables
						</div>		
                        
                       
					
						<div id="collapseReceivables" class="collapse" data-parent="#accordionExample4">
							
							<div class="locationdivbg">
                                <div class="row" id="Receivables_div">
								    <div class="col-lg-3 mastersubheading2">
                                        <div class="" id="tab58">
                                           <!-- <input type="checkbox" name="checkAll58" id="checkAll58"/></label>
                                              <label class="control-label">Select All</label>
                                              <br> -->
                                           <input type="checkbox" name="permission[]" class="billwise_receivables permission" value="318"/></label>
                                           <label class="control-label">Billwise Receivables</label><br>
                                           <input type="checkbox" name="permission[]" class="partywise_receivables permission" value="319"/></label>
                                           <label class="control-label">Partywise Receivables</label>
                                        </div>
                                     </div>
                                     </div>
                                </div>    
        				    </div>
							
                        </div>	
                        
                <div class="subparent">
                    <div class="card-header locationbg">
                        <button type="button" class="btn btn-link" data-toggle="collapse" data-target="#collapsePayables"><i class="fa fa-plus addbg"></i></button>
                        <input type="checkbox" name="checkAll" id="Payables_head"/> Payables
                    </div>	
                    <div id="collapsePayables" class="collapse" data-parent="#accordionExample4">
                    <div class="locationdivbg">
                        <div class="row" id="Payables_div">
                            <div class="col-lg-3 mastersubheading2">
                                <div class="" id="tab59">
                                   <!-- <input type="checkbox" name="checkAll59" id="checkAll59"/></label>
                                      <label class="control-label">Select All</label>
                                      <br> -->
                                   <input type="checkbox" name="permission[]" class="payable_billwise permission" value="320"/></label>
                                   <label class="control-label">Billwise Payables</label><br>
                                   <input type="checkbox" name="permission[]" class="payable_partywise permission" value="321"/></label>
                                   <label class="control-label">Partywise Payables</label>
                                </div>
                             </div>
                             </div> 
                        </div> 
                    </div>
                </div> 

			</div>
				
			
				
		  </div>
				
				
				
				<div class="card-header masterbg margintop" id="heading" >
                            
					<button type="button" class="btn btn-link" data-toggle="collapse" data-target="#collapsefive"><i class="fa fa-plus addbg"></i></button>	
				
							 <input style=" text-align: center;" type="checkbox" class="customer_head" id="settings"/>
							 <b>Settings</b>				
        	   </div>
				
				
				<div id="collapsefive" class="collapse" data-parent="#accordionExample">			
		
			<div id="accordionExample5">
				
					<div class="subparent">
					
						 <div class="card-header locationbg">
							<div class="locationdivbg">
							 <input type="checkbox" name="checkAll60" id="checkAll60"/></label>
								<label class="control-label"><b>Selling Price</b></label>
								<div class="col-lg-3 mastersubheading2">
																			<div class="" id="tab60">  
										   <label class="control-label">Selling Price Setup</label>
										   <br>
										   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										   <input type="checkbox" name="permission[]" class="selling_price_setup permission" value="322">  
										   <span class="control-label">Selling Price Setup</span>
										   <br>
										</div>
										</div>
								</div>
				
        				</div>
						</div>
					
				</div>			
		  </div>
		  
      <div class="card-header masterbg margintop" id="heading">
                            
            <button type="button" class="btn btn-link" data-toggle="collapse" data-target="#collapsesix"><i class="fa fa-plus addbg"></i></button>	
        
            <input style=" text-align: center;" type="checkbox" class="customer_head" id="pos"/>
            <b>POS</b>			
        </div>
    
        <div id="collapsesix" class="collapse" data-parent="#accordionExample">			
		
			<div id="accordionExample6">
				
				<div class="subparent">
					
						 <div class="card-header locationbg">	
							 <div class="locationdivbg">
							<input type="checkbox" name="checkAll" id="Receivables_head"/> Pos
							 
							 <div class="col-lg-3 mastersubheading2">
                                    <div class="" id="tab61">		
                                       <input type="checkbox" name="permission[]" class="all_pos_list_master all_classname permission" value="pos_list">  
                                       <label class="control-label">Select All</label>
                                       <br>
                                       <label class="control-label">Pos</label>
                                       <br>
                                       &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                       <input type="checkbox" name="permission[]" class="pos_list permission" value="238">  
                                       <span class="control-label">List</span>
                                       <br>
                                       &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                       <input type="checkbox" name="permission[]" class="pos_list permission" value="239">  
                                       <span class="control-label">Create</span>
                                       <br>
                                       &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                       <input type="checkbox" name="permission[]" class="pos_list permission" value="240">  
                                       <span class="control-label">Edit</span>
                                       <br>
                                       &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                       <input type="checkbox" name="permission[]" class="pos_list permission" value="241">  
                                       <span class="control-label">Delete</span>
                                       <br>
                                    </div>
                                 </div>
								 
								 </div>
						</div>	
					
					
					 
        				    </div>
							
                        </div>	
                    </div>
	  
			
			<div class="card-header masterbg margintop" id="heading" >
                            
					<button type="button" class="btn btn-link" data-toggle="collapse" data-target="#collapseseven"><i class="fa fa-plus addbg"></i></button>	
				
							  <input style=" text-align: center;" type="checkbox" class="customer_head" id="reports"/>
							 <b>Reports</b>			
        	   </div>
			
			
			<div id="collapseseven" class="collapse" data-parent="#accordionExample">			
		
			<div id="accordionExample7">
				
					<div class="subparent">
					
						 <div class="card-header locationbg">
							<button type="button" class="btn btn-link" data-toggle="collapse" data-target="#collapseDayBook"><i class="fa fa-plus addbg"></i></button>
							<input type="checkbox" name="checkAll62" id="day_head"/> Day Book
						</div>
					
					
					
						<div id="collapseDayBook" class="collapse" data-parent="#accordionExample7">
							
							<div class="locationdivbg">
							
								<div class="row" id="reports_div">
									
									<div class="col-lg-2 mastersubheading2">
   <div class="" id="tab62">    
      <label class="control-label">Day Book</label>
      <br>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <input type="checkbox" name="permission[]" class="daybook permission" value="323">  
      <span class="control-label">Day Book</span>
      <br>
   </div>
</div>
									
								</div>
				
        				</div>
							
						</div>	
					
				</div>
				
				
				<div class="subparent">
					
						 <div class="card-header locationbg">
							<button type="button" class="btn btn-link" data-toggle="collapse" data-target="#collapseStockReport"><i class="fa fa-plus addbg"></i></button>
							<input type="checkbox" name="permission[]" class="stock_report permission" value="326"> Stock Report
						</div>
					
					
					
						<div id="collapseStockReport" class="collapse" data-parent="#accordionExample7">
							
							<div class="locationdivbg">
							
								<div class="row" id="reports_div">
									
								<div class="col-lg-3 mastersubheading2">
<div class="" id="tab63">		
   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   <input type="checkbox" name="permission[]" class="stock_report permission" value="326">  
   <span class="control-label">Stock Report</span>
   <br>
</div>
<div>
   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   <input type="checkbox" name="permission[]" class="stock_summary permission" value="327">  
   <span class="control-label">Stock Summary</span>
   <br>
</div>
<div>
   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   <input type="checkbox" name="permission[]" class="stock_ageing permission" value="328">  
   <span class="control-label">Stock Ageing</span>
   <br>
</div>
									
								</div>
				
        				</div>
							
						</div>	
					
				</div>
					
				</div>	
				
				<div class="subparent">
					
						 <div class="card-header locationbg">
							<button type="button" class="btn btn-link" data-toggle="collapse" data-target="#collapseIndividual"><i class="fa fa-plus addbg"></i></button>
							<input type="checkbox" name="checkAll64" id="IndividualReport_head"/> Individual Report
						</div>
					
					
					
						<div id="collapseIndividual" class="collapse" data-parent="#accordionExample7">
							
							<div class="locationdivbg">
							
								<div class="row" id="IndividualReport_div">
									
								<div class="col-lg-3 mastersubheading2">
									<input type="checkbox" name="permission[]" class="individual_ledger permission" value="324">  
					<span class="control-label">Individual Ledger</span>
					<br>
									
								</div>
				
        				</div>
							
						</div>	
					
				</div>
					
				</div>
				
				
				
				<div class="subparent">
					
						 <div class="card-header locationbg">
							<button type="button" class="btn btn-link" data-toggle="collapse" data-target="#collapseIndividual"><i class="fa fa-plus addbg"></i></button>
							<input type="checkbox" name="checkAll65" id="GSTReport_head"/> GST Report
						</div>
					
					
					
						<div id="collapseIndividual" class="collapse" data-parent="#accordionExample7">
							
							<div class="locationdivbg">
							
								<div class="row" id="GSTReport_div">
									
								<div class="col-lg-2 mastersubheading2">
   <div class="" id="tab65">		
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <input type="checkbox" name="permission[]" class="gst_report permission" value="325">  
      <span class="control-label">Gst Report</span>
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
          <button class="btn btn-success submit" name="add" type="submit">Submit</button>
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
</script>
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
</script>

@endsection

