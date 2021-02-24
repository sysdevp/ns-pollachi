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
				
							 <input style=" text-align: center;"  type="checkbox"  class="masters_head" id="masters_head" /> <b>Master</b></h4>
							 
           </div>
				
	   
   		    <div id="collapseOne" class="collapse master_menu" data-parent="#accordionExample">			
		
			<div id="accordionExample1">
				
				<div class="subparent_location_head">
					
						 <div class="card-header locationbg">
							<button type="button" class="btn btn-link" data-toggle="collapse" data-target="#collapselocation"><i class="fa fa-plus addbg"></i></button>
							 <input type="checkbox" name="checkAll" id="location_head"/> Location
						</div>
					
					
						<div id="collapselocation" class="collapse" data-parent="#accordionExample1">
							
							<div class="locationdivbg">
								
				<div class="row" id="location_div">
                    <div class="col-lg-2 mastersubheading2">
                    <div class="" id="tab1">		

                @foreach($permission as $value)
                @if($value->label == "State List")
                <input type="checkbox" name="permission[]" class="all_{{ $value->class }}_master all_classname permission"  value="{{$value->class}}">  
                        <label class="control-label">Select All</label>
                        <br>
                        <label class="control-label">State</label>
                        <br>
                @endif
                    @if($value->class == "state_list")
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" name="permission[]" class="{{ $value->class }} permission"  value="{{$value->id}}">  
					<span class="control-label">{{$value->name1}}</span>
					<br>
                    @endif
                @endforeach

              
							</div>
                        <!-- <div class="" id="tab1">		
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
                    </div>	 -->
                </div>
									
									
				<div class="col-lg-2 mastersubheading2">
                    <div class="" id="tab2">
                    @foreach($permission as $value)
                @if($value->label == "District List")
                <input type="checkbox" name="permission[]" class="all_{{ $value->class }}_master all_classname permission"  value="{{$value->class}}">  
                        <label class="control-label">Select All</label>
                        <br>
                        <label class="control-label">District</label>
                        <br>
                @endif
                    @if($value->class == "district_list")
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" name="permission[]" class="{{ $value->class }} permission"  value="{{$value->id}}">  
					<span class="control-label">{{$value->name1}}</span>
					<br>
                    @endif
                @endforeach 	                                                                                                                                                
                    <!-- <input type="checkbox" name="permission[]" class="all_district_list_master all_classname permission" value="district_list">  
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
                        <br> -->
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

<script>
    $("#master_menu #master_head").click(function () {
        alert('j');
        if ($("#master_menu #master_head").is(':checked')) {
            $("#master_menu input[type=checkbox]").each(function () {
                $(this).prop("checked", true);
            });
       
        } else {
            $("#master_menu input[type=checkbox]").each(function () {
                $(this).prop("checked", false);
            });
        }
    });
// $(".master").click(function (e) {
 
//     var id = $('.permission').val();
//     for(i==0;i<id.length;i++)
//     {
//         alert(id[i]);
//     }

// var menu = ["location_head","bank_head"];
//             for(i=0;i<menu.length;i++)
//             {

//                 var id_newest = menu[i];

//                 if($('.master').prop('checked')== true)
//                 {
//                     $("#" + id_newest).prop('checked',true);
//                 }
//                 else
//                 {
//                     $("#" + id_newest).prop('checked',false);
//                 }

//             }
// });
$(".location_head").click(function (e) {

});
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

