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
	-webkit-box-shadow: 0px 13px 15px -11px rgba(0,0,0,0.56);
-moz-box-shadow: 0px 13px 15px -11px rgba(0,0,0,0.56);
box-shadow: 0px 13px 15px -11px rgba(0,0,0,0.56);
	}
	.masterdivleft{margin-left: 8px;}
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
              <input type="text" class="form-control name only_allow_alp_num_dot_com_amp caps" placeholder="Role Name" name="name" value="{{old('name')}}" required>

                <span class="mandatory"> {{ $errors->first('role_id')  }} </span>
                <div class="invalid-feedback">
                  Enter valid Role
                </div>
              </div>
             
          </div>
          </div>

         
<div class="form-group col-sm-12 col-md-12"> 
          	<div class="container">
                             <div class="panel panel-default" id="heading">
                             <div class="panel-heading maseterheading"><h4 style=" text-align: center;"> 
							 <input style=" text-align: center;" value="" type="checkbox"  class="masters_head" id="masters_head" name=""/> <b>Masters</b></h4>
							 </div>
                             </div>
                             </div>
						</div>
							<div class="container mastersubheading"  id="masters_div"  style="display:none;">
							
					
							<div class="container">
								<input type="checkbox" name="checkAll" id="location_head"/></label>
								<label class="control-label"><b>location</b></label>
								</div>
								
								
								<div class="row masterdivleft" id="location_div" style="display:none; width:100%;">
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

							</div>	
									</div>
									
									
									<div class="col-lg-2 mastersubheading2">
											<div class="" id="tab3">
                                            @foreach($permission as $value)
                @if($value->label == "City List")
                <input type="checkbox" name="permission[]" class="all_{{ $value->class }}_master all_classname permission"  value="{{$value->class}}">  
                        <label class="control-label">Select All</label>
                        <br>
                        <label class="control-label">City</label>
                        <br>
                @endif
                    @if($value->class == "city_list")
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" name="permission[]" class="{{ $value->class }} permission"  value="{{$value->id}}">  
					<span class="control-label">{{$value->name1}}</span>
					<br>
                    @endif
                @endforeach   

							</div>	
									</div>
									
								
								
								
								
								<div class="col-lg-2 mastersubheading2">
										<div class="" id="tab4">	
                                        @foreach($permission as $value)
                @if($value->label == "Address Type List")
                <input type="checkbox" name="permission[]" class="all_{{ $value->class }}_master all_classname permission"  value="{{$value->class}}">  
                        <label class="control-label">Select All</label>
                        <br>
                        <label class="control-label">Address Type</label>
                        <br>
                @endif
                    @if($value->class == "address_type_list")
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" name="permission[]" class="{{ $value->class }} permission"  value="{{$value->id}}">  
					<span class="control-label">{{$value->name1}}</span>
					<br>
                    @endif
                @endforeach   
							</div>	
									</div>
									
									<div class="col-lg-2 mastersubheading2">
										<div class="" id="tab5">	
                                        @foreach($permission as $value)
                @if($value->label == "Location Type List")
                <input type="checkbox" name="permission[]" class="all_{{ $value->class }}_master all_classname permission"  value="{{$value->class}}">  
                        <label class="control-label">Select All</label>
                        <br>
                        <label class="control-label">Location Type</label>
                        <br>
                @endif
                    @if($value->class == "location_type_list")
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" name="permission[]" class="{{ $value->class }} permission"  value="{{$value->id}}">  
					<span class="control-label">{{$value->name1}}</span>
					<br>
                    @endif
                @endforeach   
							</div>	
									</div>
									
									<div class="col-lg-2 mastersubheading2">
										<div class="" id="tab6">
                                        @foreach($permission as $value)
                @if($value->label == "Company Location")
                <input type="checkbox" name="permission[]" class="all_{{ $value->class }}_master all_classname permission"  value="{{$value->class}}">  
                        <label class="control-label">Select All</label>
                        <br>
                        <label class="control-label">Company Location</label>
                        <br>
                @endif
                    @if($value->class == "company_location_list")
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" name="permission[]" class="{{ $value->class }} permission"  value="{{$value->id}}">  
					<span class="control-label">{{$value->name1}}</span>
					<br>
                    @endif
                @endforeach	
                                      
							</div>	
									</div>
									
									
									<div class="col-lg-2 mastersubheading2">
										<div class="" id="tab7">	
                                        @foreach($permission as $value)
                @if($value->label == "Head Office Detail List")
                <input type="checkbox" name="permission[]" class="all_{{ $value->class }}_master all_classname permission"  value="{{$value->class}}">  
                        <label class="control-label">Select All</label>
                        <br>
                        <label class="control-label">Head Office Detail</label>
                        <br>
                @endif
                    @if($value->class == "head_office_detail_list")
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" name="permission[]" class="{{ $value->class }} permission"  value="{{$value->id}}">  
					<span class="control-label">{{$value->name1}}</span>
					<br>
                    @endif
                @endforeach
							</div>	
									</div>
									
								
									
								</div>
							
							

							<div class="container" >
							<input type="checkbox" name="checkAll8" id="bank_head"/></label>
								<label class="control-label"><b>Bank</b></label>
								</div>
								<div class="row masterdivleft" id="bank_div" style="display:none; width:100%">
									<div class="col-lg-2 mastersubheading2">
										<div class="" id="tab8">		
                                        @foreach($permission as $value)
                @if($value->label == "Bank List")
                <input type="checkbox" name="permission[]" class="all_{{ $value->class }}_master all_classname permission"  value="{{$value->class}}">  
                        <label class="control-label">Select All</label>
                        <br>
                        <label class="control-label">Bank</label>
                        <br>
                @endif
                    @if($value->class == "bank_list")
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" name="permission[]" class="{{ $value->class }} permission"  value="{{$value->id}}">  
					<span class="control-label">{{$value->name1}}</span>
					<br>
                    @endif
                @endforeach
							</div>	
									</div>
									
									
									<div class="col-lg-2 mastersubheading2">
										<div class="" id="tab9">	
                                        @foreach($permission as $value)
                @if($value->label == "Bank Branch List")
                <input type="checkbox" name="permission[]" class="all_{{ $value->class }}_master all_classname permission"  value="{{$value->class}}">  
                        <label class="control-label">Select All</label>
                        <br>
                        <label class="control-label">Bank Branch</label>
                        <br>
                @endif
                    @if($value->class == "bank_branch_list")
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" name="permission[]" class="{{ $value->class }} permission"  value="{{$value->id}}">  
					<span class="control-label">{{$value->name1}}</span>
					<br>
                    @endif
                @endforeach
							</div>	
									</div>
									
									
									<div class="col-lg-2 mastersubheading2">
											<div class="" id="tab10">
                                            @foreach($permission as $value)
                @if($value->label == "Denomination List")
                <input type="checkbox" name="permission[]" class="all_{{ $value->class }}_master all_classname permission"  value="{{$value->class}}">  
                        <label class="control-label">Select All</label>
                        <br>
                        <label class="control-label">Denomination</label>
                        <br>
                @endif
                    @if($value->class == "denomination_list")
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" name="permission[]" class="{{ $value->class }} permission"  value="{{$value->id}}">  
					<span class="control-label">{{$value->name1}}</span>
					<br>
                    @endif
                @endforeach

							</div>	
									</div>
									
								
								
								
								
								<div class="col-lg-2 mastersubheading2">
										<div class="" id="tab11">	
                                        @foreach($permission as $value)
                @if($value->label == "Accounts Type List")
                <input type="checkbox" name="permission[]" class="all_{{ $value->class }}_master all_classname permission"  value="{{$value->class}}">  
                        <label class="control-label">Select All</label>
                        <br>
                        <label class="control-label">Accounts Type</label>
                        <br>
                @endif
                    @if($value->class == "accounts_type_list")
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" name="permission[]" class="{{ $value->class }} permission"  value="{{$value->id}}">  
					<span class="control-label">{{$value->name1}}</span>
					<br>
                    @endif
                @endforeach
							</div>	
									</div>
									
								
									
								</div>
							
							
							<div class="container">
							<input type="checkbox" name="checkAll1" id="employee_head"/></label>
								<label class="control-label"><b>Employee</b></label>
								</div>
								<div class="row masterdivleft" id="employee_div" style="display:none; width:100%">
									<div class="col-lg-2 mastersubheading2">
										<div class="" id="tab12">		
                                        @foreach($permission as $value)
                @if($value->label == "Department List")
                <input type="checkbox" name="permission[]" class="all_{{ $value->class }}_master all_classname permission"  value="{{$value->class}}">  
                        <label class="control-label">Select All</label>
                        <br>
                        <label class="control-label">Accounts Type</label>
                        <br>
                @endif
                    @if($value->class == "department_list")
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" name="permission[]" class="{{ $value->class }} permission"  value="{{$value->id}}">  
					<span class="control-label">{{$value->name1}}</span>
					<br>
                    @endif
                @endforeach
							</div>	
									</div>
									
									
									<div class="col-lg-2 mastersubheading2">
										<div class="" id="tab13">	
                                        @foreach($permission as $value)
                @if($value->label == "Desigination List")
                <input type="checkbox" name="permission[]" class="all_{{ $value->class }}_master all_classname permission"  value="{{$value->class}}">  
                        <label class="control-label">Select All</label>
                        <br>
                        <label class="control-label">Desigination</label>
                        <br>
                @endif
                    @if($value->class == "desigination_list")
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" name="permission[]" class="{{ $value->class }} permission"  value="{{$value->id}}">  
					<span class="control-label">{{$value->name1}}</span>
					<br>
                    @endif
                @endforeach
							</div>	
									</div>
									
									
									<div class="col-lg-2 mastersubheading2">
											<div class="" id="tab14">
                                            @foreach($permission as $value)
                @if($value->label == "Employee List")
                <input type="checkbox" name="permission[]" class="all_{{ $value->class }}_master all_classname permission"  value="{{$value->class}}">  
                        <label class="control-label">Select All</label>
                        <br>
                        <label class="control-label">Employee</label>
                        <br>
                @endif
                    @if($value->class == "employee_list")
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" name="permission[]" class="{{ $value->class }} permission"  value="{{$value->id}}">  
					<span class="control-label">{{$value->name1}}</span>
					<br>
                    @endif
                @endforeach
							</div>	
									</div>
									
							
									
								</div>
							
							
							 
							 <div class="container">
							<input type="checkbox" name="checkAll1" id="user_head"/></label>
								<label class="control-label"><b>User</b></label>
								</div>
								<div class="row masterdivleft" id="user_div" style="display:none; width:100%">
									<div class="col-lg-2 mastersubheading2">
										<div class="" id="tab15">		
                                        @foreach($permission as $value)
                @if($value->label == "User List")
                <input type="checkbox" name="permission[]" class="all_{{ $value->class }}_master all_classname permission"  value="{{$value->class}}">  
                        <label class="control-label">Select All</label>
                        <br>
                        <label class="control-label">User</label>
                        <br>
                @endif
                    @if($value->class == "user_list")
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" name="permission[]" class="{{ $value->class }} permission"  value="{{$value->id}}">  
					<span class="control-label">{{$value->name1}}</span>
					<br>
                    @endif
                @endforeach							</div>	
									</div>
									
									
									<div class="col-lg-2 mastersubheading2">
										<div class="" id="tab16">	
                                        @foreach($permission as $value)
                @if($value->label == "Role List")
                <input type="checkbox" name="permission[]" class="all_{{ $value->class }}_master all_classname permission"  value="{{$value->class}}">  
                        <label class="control-label">Select All</label>
                        <br>
                        <label class="control-label">Role</label>
                        <br>
                @endif
                    @if($value->class == "role_list")
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" name="permission[]" class="{{ $value->class }} permission"  value="{{$value->id}}">  
					<span class="control-label">{{$value->name1}}</span>
					<br>
                    @endif
                @endforeach		
							</div>	
									</div>
									
								</div>
						
							
							
							 
							  <div class="container">
							<input type="checkbox" name="checkAll1" id="account_head"/></label>
								<label class="control-label"><b>Offers</b></label>
								</div>
								<div class="row masterdivleft" id="account_div" style="display:none; width:100%">
									<div class="col-lg-2 mastersubheading2">
										<div class="" id="tab17">		
                                        @foreach($permission as $value)
                @if($value->label == "Gift Voucher Master List")
                <input type="checkbox" name="permission[]" class="all_{{ $value->class }}_master all_classname permission"  value="{{$value->class}}">  
                        <label class="control-label">Select All</label>
                        <br>
                        <label class="control-label">{{$value->label}}</label>
                        <br>
                @endif
                    @if($value->class == "gift_voucher_matser_list")
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" name="permission[]" class="{{ $value->class }} permission"  value="{{$value->id}}">  
					<span class="control-label">{{$value->name1}}</span>
					<br>
                    @endif
                @endforeach		
							</div>	
									</div>
									
									
									<div class="col-lg-2 mastersubheading2">
										<div class="" id="tab18">	
                                        @foreach($permission as $value)
                @if($value->label == "Offers List")
                <input type="checkbox" name="permission[]" class="all_{{ $value->class }}_master all_classname permission"  value="{{$value->class}}">  
                        <label class="control-label">Select All</label>
                        <br>
                        <label class="control-label">{{$value->label}}</label>
                        <br>
                @endif
                    @if($value->class == "offers_list")
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" name="permission[]" class="{{ $value->class }} permission"  value="{{$value->id}}">  
					<span class="control-label">{{$value->name1}}</span>
					<br>
                    @endif
                @endforeach	
							</div>	
									</div>
									
								</div>
							
							
							
							  <div class="container">
							<input type="checkbox" name="checkAll1" id="Category_head"/></label>
								<label class="control-label"><b>Category</b></label>
								</div>
								<div class="row masterdivleft" id="Category_div" style="display:none; width:100%">
									<div class="col-lg-2 mastersubheading2">
										<div class="" id="tab19">		
                                        @foreach($permission as $value)
                @if($value->label == "Category Name List")
                <input type="checkbox" name="permission[]" class="all_{{ $value->class }}_master all_classname permission"  value="{{$value->class}}">  
                        <label class="control-label">Select All</label>
                        <br>
                        <label class="control-label">{{$value->label}}</label>
                        <br>
                @endif
                    @if($value->class == "category_name_master_list")
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" name="permission[]" class="{{ $value->class }} permission"  value="{{$value->id}}">  
					<span class="control-label">{{$value->name1}}</span>
					<br>
                    @endif
                @endforeach
							</div>	
									</div>
									
									
									<div class="col-lg-2 mastersubheading2">
										<div class="" id="tab20">	
                                        @foreach($permission as $value)
                @if($value->label == "Brand List")
                <input type="checkbox" name="permission[]" class="all_{{ $value->class }}_master all_classname permission"  value="{{$value->class}}">  
                        <label class="control-label">Select All</label>
                        <br>
                        <label class="control-label">{{$value->label}}</label>
                        <br>
                @endif
                    @if($value->class == "brand_list")
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" name="permission[]" class="{{ $value->class }} permission"  value="{{$value->id}}">  
					<span class="control-label">{{$value->name1}}</span>
					<br>
                    @endif
                @endforeach
							</div>	
									</div>
									
								</div>
							
							  
							  <div class="container">
							<input type="checkbox" name="checkAll" id="Language_head"/></label>
								<label class="control-label"><b>Language</b></label>
								</div>
								<div class="row masterdivleft" id="Language_div" style="display:none; width:100%">
									<div class="col-lg-2 mastersubheading2">
										<div class="" id="tab21">		
                                        @foreach($permission as $value)
                @if($value->label == "Language Master List")
                <input type="checkbox" name="permission[]" class="all_{{ $value->class }}_master all_classname permission"  value="{{$value->class}}">  
                        <label class="control-label">Select All</label>
                        <br>
                        <label class="control-label">{{$value->label}}</label>
                        <br>
                @endif
                    @if($value->class == "language_master_list")
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" name="permission[]" class="{{ $value->class }} permission"  value="{{$value->id}}">  
					<span class="control-label">{{$value->name1}}</span>
					<br>
                    @endif
                @endforeach
							</div>	
									</div>
									
								</div>
							
							 <div class="container">
							<input type="checkbox" name="checkAll" id="item_head"/></label>
								<label class="control-label"><b>Item</b></label>
								</div>
								<div class="row masterdivleft" id="item_div" style="display:none; width:100%">
									<div class="col-lg-2 mastersubheading2">
										<div class="" id="tab22">	
                                        @foreach($permission as $value)
                @if($value->label == "Item Master List")
                <input type="checkbox" name="permission[]" class="all_{{ $value->class }}_master all_classname permission"  value="{{$value->class}}">  
                        <label class="control-label">Select All</label>
                        <br>
                        <label class="control-label">Item Master</label>
                        <br>
                @endif
                    @if($value->class == "item_master_list")
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" name="permission[]" class="{{ $value->class }} permission"  value="{{$value->id}}">  
					<span class="control-label">{{$value->name1}}</span>
					<br>
                    @endif
                @endforeach
							</div>	
									</div>
									
									<div class="col-lg-2 mastersubheading2">
										<div class="" id="tab23">		
							            @foreach($permission as $value)
                @if($value->label == "Tax List")
                <input type="checkbox" name="permission[]" class="all_{{ $value->class }}_master all_classname permission"  value="{{$value->class}}">  
                        <label class="control-label">Select All</label>
                        <br>
                        <label class="control-label">Tax</label>
                        <br>
                @endif
                    @if($value->class == "tax_list")
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" name="permission[]" class="{{ $value->class }} permission"  value="{{$value->id}}">  
					<span class="control-label">{{$value->name1}}</span>
					<br>
                    @endif
                @endforeach
							</div>	
									</div>
									
									<div class="col-lg-2 mastersubheading2">
										<div class="" id="tab24">		
                                        @foreach($permission as $value)
                @if($value->label == "Uom List")
                <input type="checkbox" name="permission[]" class="all_{{ $value->class }}_master all_classname permission"  value="{{$value->class}}">  
                        <label class="control-label">Select All</label>
                        <br>
                        <label class="control-label">Uom</label>
                        <br>
                @endif
                    @if($value->class == "uom_list")
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" name="permission[]" class="{{ $value->class }} permission"  value="{{$value->id}}">  
					<span class="control-label">{{$value->name1}}</span>
					<br>
                    @endif
                @endforeach
							</div>	
									</div>
									
																		<div class="col-lg-2 mastersubheading2">
										<div class="" id="tab25">		
                                        @foreach($permission as $value)
                @if($value->label == "Item Tax Details List")
                <input type="checkbox" name="permission[]" class="all_{{ $value->class }}_master all_classname permission"  value="{{$value->class}}">  
                        <label class="control-label">Select All</label>
                        <br>
                        <label class="control-label">Item Tax Details</label>
                        <br>
                @endif
                    @if($value->class == "item_tax_details_list")
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" name="permission[]" class="{{ $value->class }} permission"  value="{{$value->id}}">  
					<span class="control-label">{{$value->name1}}</span>
					<br>
                    @endif
                @endforeach
							</div>	
									</div>
									
								</div>
							
							 <div class="container">
							<input type="checkbox" name="checkAll1" id="Vendor_head"/></label>
								<label class="control-label"><b>Vendor</b></label>
								</div>
								<div class="row masterdivleft" id="Vendor_div" style="display:none; width:100%">
									<div class="col-lg-2 mastersubheading2">
										<div class="" id="tab26">		
                                        @foreach($permission as $value)
                @if($value->label == "Agent List")
                <input type="checkbox" name="permission[]" class="all_{{ $value->class }}_master all_classname permission"  value="{{$value->class}}">  
                        <label class="control-label">Select All</label>
                        <br>
                        <label class="control-label">Agent</label>
                        <br>
                @endif
                    @if($value->class == "agent_list")
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" name="permission[]" class="{{ $value->class }} permission"  value="{{$value->id}}">  
					<span class="control-label">{{$value->name1}}</span>
					<br>
                    @endif
                @endforeach
							</div>	
									</div>
									
									<div class="col-lg-2 mastersubheading2">
										<div class="" id="tab27">		
                                        @foreach($permission as $value)
                @if($value->label == "Customer Name List")
                <input type="checkbox" name="permission[]" class="all_{{ $value->class }}_master all_classname permission"  value="{{$value->class}}">  
                        <label class="control-label">Select All</label>
                        <br>
                        <label class="control-label">Customer Name List</label>
                        <br>
                @endif
                    @if($value->class == "customer_list")
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" name="permission[]" class="{{ $value->class }} permission"  value="{{$value->id}}">  
					<span class="control-label">{{$value->name1}}</span>
					<br>
                    @endif
                @endforeach
							</div>	
									</div>
									
									<div class="col-lg-2 mastersubheading2">
										<div class="" id="tab28">		
                                        @foreach($permission as $value)
                @if($value->label == "Supplier List")
                <input type="checkbox" name="permission[]" class="all_{{ $value->class }}_master all_classname permission"  value="{{$value->class}}">  
                        <label class="control-label">Select All</label>
                        <br>
                        <label class="control-label">Supplier</label>
                        <br>
                @endif
                    @if($value->class == "supplier_list")
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" name="permission[]" class="{{ $value->class }} permission"  value="{{$value->id}}">  
					<span class="control-label">{{$value->name1}}</span>
					<br>
                    @endif
                @endforeach
							</div>	
									</div>
									
								<div class="col-lg-2 mastersubheading2">
								<div class="" id="tab29">		
                                @foreach($permission as $value)
                @if($value->label == "Salesman List")
                <input type="checkbox" name="permission[]" class="all_{{ $value->class }}_master all_classname permission"  value="{{$value->class}}">  
                        <label class="control-label">Select All</label>
                        <br>
                        <label class="control-label">Salesman</label>
                        <br>
                @endif
                    @if($value->class == "salesman_list")
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" name="permission[]" class="{{ $value->class }} permission"  value="{{$value->id}}">  
					<span class="control-label">{{$value->name1}}</span>
					<br>
                    @endif
                @endforeach
							</div>	
									</div>
									
								</div>
							
							 
							 <div class="container">
							<input type="checkbox" name="checkAll" id="Area_head"/></label>
								<label class="control-label"><b>Area</b></label>
								</div>
								<div class="row masterdivleft" id="Area_div" style="display:none; width:100%">
									<div class="col-lg-2 mastersubheading2">
										<div class="" id="tab30">		
                                        @foreach($permission as $value)
                @if($value->label == "Area Name List")
                <input type="checkbox" name="permission[]" class="all_{{ $value->class }}_master all_classname permission"  value="{{$value->class}}">  
                        <label class="control-label">Select All</label>
                        <br>
                        <label class="control-label">Area Name</label>
                        <br>
                @endif
                    @if($value->class == "area_list")
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" name="permission[]" class="{{ $value->class }} permission"  value="{{$value->id}}">  
					<span class="control-label">{{$value->name1}}</span>
					<br>
                    @endif
                @endforeach
							</div>	
								</div>
								</div>
							
							 <div class="container">
							<input type="checkbox" name="checkAll" id="AccountGroup_head"/></label>
								<label class="control-label"><b>Account Group</b></label>
								</div>
								<div class="row masterdivleft" id="AccountGroup_div" style="display:none; width:100%">
									<div class="col-lg-2 mastersubheading2">
										<div class="" id="tab31">		
                                        @foreach($permission as $value)
                @if($value->label == "Account Group List")
                <input type="checkbox" name="permission[]" class="all_{{ $value->class }}_master all_classname permission"  value="{{$value->class}}">  
                        <label class="control-label">Select All</label>
                        <br>
                        <label class="control-label">Account Group</label>
                        <br>
                @endif
                    @if($value->class == "account_group_list")
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" name="permission[]" class="{{ $value->class }} permission"  value="{{$value->id}}">  
					<span class="control-label">{{$value->name1}}</span>
					<br>
                    @endif
                @endforeach
							</div>	
								</div>
								
								<div class="col-lg-2 mastersubheading2">
										<div class="" id="tab32">		
                                        @foreach($permission as $value)
                @if($value->label == "Account Head List")
                <input type="checkbox" name="permission[]" class="all_{{ $value->class }}_master all_classname permission"  value="{{$value->class}}">  
                        <label class="control-label">Select All</label>
                        <br>
                        <label class="control-label">Account Head</label>
                        <br>
                @endif
                    @if($value->class == "account_head_list")
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" name="permission[]" class="{{ $value->class }} permission"  value="{{$value->id}}">  
					<span class="control-label">{{$value->name1}}</span>
					<br>
                    @endif
                @endforeach
							</div>	
								</div>
								
								<div class="col-lg-2 mastersubheading2">
										<div class="" id="tab33">		
                                        @foreach($permission as $value)
                @if($value->label == "Account Group Tax List")
                <input type="checkbox" name="permission[]" class="all_{{ $value->class }}_master all_classname permission"  value="{{$value->class}}">  
                        <label class="control-label">Select All</label>
                        <br>
                        <label class="control-label">Account Group Tax</label>
                        <br>
                @endif
                    @if($value->class == "account_group_tax_list")
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" name="permission[]" class="{{ $value->class }} permission"  value="{{$value->id}}">  
					<span class="control-label">{{$value->name1}}</span>
					<br>
                    @endif
                @endforeach
							</div>	
								</div>
								</div>
							
						
						</div> 
						 </br></br></br>
						
						
						
						
						
						
						<div class="form-group col-sm-12 col-md-12">
						    <div class="container">
                             <div class="panel panel-default"  id="heading">
                             <div class="panel-heading maseterheading"><h4 style=" text-align: center;">
							 <input style=" text-align: center;" type="checkbox"  class="employee_head" id="transaction_management" />
							 <b>Transaction Management</b></h4></div>
                             </div>
                            </div>
							

							<div id="transaction_management_div" class="trans_div form-group container mastersubheading1" style="display:none; width:97%">
							<input type="checkbox" name="checkAll1" id="purchase_head"/></label>
								<label class="control-label"><b>Purchase</b></label>
								<div class="row" id="purchase_div" style="display:none; width:100%">
									<div class="col-lg-2 mastersubheading2">
										<div class="" id="tab34">		
							       @foreach($permission as $value)
                @if($value->label == "Estimation List")
                <input type="checkbox" name="permission[]" class="all_{{ $value->class }}_master all_classname permission"  value="{{$value->class}}">  
                        <label class="control-label">Select All</label>
                        <br>
                        <label class="control-label">Estimation</label>
                        <br>
                @endif
                    @if($value->class == "estimation_list")
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" name="permission[]" class="{{ $value->class }} permission"  value="{{$value->id}}">  
					<span class="control-label">{{$value->name1}}</span>
					<br>
                    @endif
                @endforeach
							</div>	
								</div>
								
								<div class="col-lg-2 mastersubheading2">
										<div class="" id="tab35">		
                                        @foreach($permission as $value)
                @if($value->label == "Purchase Order List")
                <input type="checkbox" name="permission[]" class="all_{{ $value->class }}_master all_classname permission"  value="{{$value->class}}">  
                        <label class="control-label">Select All</label>
                        <br>
                        <label class="control-label">Purchase</label>
                        <br>
                @endif
                    @if($value->class == "purchase_order_list")
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" name="permission[]" class="{{ $value->class }} permission"  value="{{$value->id}}">  
					<span class="control-label">{{$value->name1}}</span>
					<br>
                    @endif
                @endforeach
							</div>	
								</div>
								
								<div class="col-lg-2 mastersubheading2">
										<div class="" id="tab36">		
                                        @foreach($permission as $value)
                @if($value->label == "Receipt Note List")
                <input type="checkbox" name="permission[]" class="all_{{ $value->class }}_master all_classname permission"  value="{{$value->class}}">  
                        <label class="control-label">Select All</label>
                        <br>
                        <label class="control-label">Receipt Note</label>
                        <br>
                @endif
                    @if($value->class == "receipt_note_list")
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" name="permission[]" class="{{ $value->class }} permission"  value="{{$value->id}}">  
					<span class="control-label">{{$value->name1}}</span>
					<br>
                    @endif
                @endforeach			</div>	
								</div>
								
								<div class="col-lg-2 mastersubheading2">
										<div class="" id="tab37">		
                                        @foreach($permission as $value)
                @if($value->label == "Purchase Entry List")
                <input type="checkbox" name="permission[]" class="all_{{ $value->class }}_master all_classname permission"  value="{{$value->class}}">  
                        <label class="control-label">Select All</label>
                        <br>
                        <label class="control-label">Purchase Entry</label>
                        <br>
                @endif
                    @if($value->class == "purchase_entry_list")
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" name="permission[]" class="{{ $value->class }} permission"  value="{{$value->id}}">  
					<span class="control-label">{{$value->name1}}</span>
					<br>
                    @endif
                @endforeach	
							</div>	
								</div>
								
								<div class="col-lg-2 mastersubheading2">
										<div class="" id="tab38">		
                                        @foreach($permission as $value)
                @if($value->label == "Rejection Out List")
                <input type="checkbox" name="permission[]" class="all_{{ $value->class }}_master all_classname permission"  value="{{$value->class}}">  
                        <label class="control-label">Select All</label>
                        <br>
                        <label class="control-label">Rejection Out</label>
                        <br>
                @endif
                    @if($value->class == "rejection_out_list")
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" name="permission[]" class="{{ $value->class }} permission"  value="{{$value->id}}">  
					<span class="control-label">{{$value->name1}}</span>
					<br>
                    @endif
                @endforeach	
							</div>	
								</div>
								<div class="col-lg-2 mastersubheading2">
										<div class="" id="tab39">		
                                        @foreach($permission as $value)
                @if($value->label == "Purchase Gate Pass Entry List")
                <input type="checkbox" name="permission[]" class="all_{{ $value->class }}_master all_classname permission"  value="{{$value->class}}">  
                        <label class="control-label">Select All</label>
                        <br>
                        <label class="control-label">Purchase Gate Pass Entry</label>
                        <br>
                @endif
                    @if($value->class == "purchase_gate_entry_list")
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" name="permission[]" class="{{ $value->class }} permission"  value="{{$value->id}}">  
					<span class="control-label">{{$value->name1}}</span>
					<br>
                    @endif
                @endforeach	
							</div>	
								</div>
								
								<div class="col-lg-2 mastersubheading2">
										<div class="" id="tab40">		
                                        @foreach($permission as $value)
                @if($value->label == "Debit Note List")
                <input type="checkbox" name="permission[]" class="all_{{ $value->class }}_master all_classname permission"  value="{{$value->class}}">  
                        <label class="control-label">Select All</label>
                        <br>
                        <label class="control-label">Debit Note</label>
                        <br>
                @endif
                    @if($value->class == "debit_note_list")
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" name="permission[]" class="{{ $value->class }} permission"  value="{{$value->id}}">  
					<span class="control-label">{{$value->name1}}</span>
					<br>
                    @endif
                @endforeach	
							</div>	
								</div>
								
								</div>
							
							</br>
							   <input type="checkbox" name="checkAll" id="Sales_head"/>
								<label class="control-label"><b>Sales</b></label>
								<div class="row" id="Sales_div" style="display:none; width:100%">
									<div class="col-lg-2 mastersubheading2">
										<div class="" id="tab41">		
								        @foreach($permission as $value)
                @if($value->label == "Sales Estimation List")
                <input type="checkbox" name="permission[]" class="all_{{ $value->class }}_master all_classname permission"  value="{{$value->class}}">  
                        <label class="control-label">Select All</label>
                        <br>
                        <label class="control-label">Sales Estimation</label>
                        <br>
                @endif
                    @if($value->class == "sales_estimation_list")
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" name="permission[]" class="{{ $value->class }} permission"  value="{{$value->id}}">  
					<span class="control-label">{{$value->name1}}</span>
					<br>
                    @endif
                @endforeach
							</div>	
								</div>
								
								<div class="col-lg-2 mastersubheading2">
										<div class="" id="tab42">		
                                        @foreach($permission as $value)
                @if($value->label == "Sales Order List")
                <input type="checkbox" name="permission[]" class="all_{{ $value->class }}_master all_classname permission"  value="{{$value->class}}">  
                        <label class="control-label">Select All</label>
                        <br>
                        <label class="control-label">Sales Order</label>
                        <br>
                @endif
                    @if($value->class == "sales_order_list")
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" name="permission[]" class="{{ $value->class }} permission"  value="{{$value->id}}">  
					<span class="control-label">{{$value->name1}}</span>
					<br>
                    @endif
                @endforeach
							</div>	
								</div>
								
								<div class="col-lg-2 mastersubheading2">
										<div class="" id="tab43">		
                                        @foreach($permission as $value)
                @if($value->label == "Delivery Notes List")
                <input type="checkbox" name="permission[]" class="all_{{ $value->class }}_master all_classname permission"  value="{{$value->class}}">  
                        <label class="control-label">Select All</label>
                        <br>
                        <label class="control-label">Delivery Notes</label>
                        <br>
                @endif
                    @if($value->class == "delivery_note_list")
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" name="permission[]" class="{{ $value->class }} permission"  value="{{$value->id}}">  
					<span class="control-label">{{$value->name1}}</span>
					<br>
                    @endif
                @endforeach
							</div>	
								</div>
							
								
								<div class="col-lg-2 mastersubheading2">
										<div class="" id="tab44">		
                                        @foreach($permission as $value)
                @if($value->label == "Sales Entry List")
                <input type="checkbox" name="permission[]" class="all_{{ $value->class }}_master all_classname permission"  value="{{$value->class}}">  
                        <label class="control-label">Select All</label>
                        <br>
                        <label class="control-label">Delivery Notes</label>
                        <br>
                @endif
                    @if($value->class == "sales_entry_list")
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" name="permission[]" class="{{ $value->class }} permission"  value="{{$value->id}}">  
					<span class="control-label">{{$value->name1}}</span>
					<br>
                    @endif
                @endforeach
							</div>	
								</div>
								
								<div class="col-lg-2 mastersubheading2">
										<div class="" id="tab45">		
                                        @foreach($permission as $value)
                @if($value->label == "Rejection In List")
                <input type="checkbox" name="permission[]" class="all_{{ $value->class }}_master all_classname permission"  value="{{$value->class}}">  
                        <label class="control-label">Select All</label>
                        <br>
                        <label class="control-label">Rejection In</label>
                        <br>
                @endif
                    @if($value->class == "rejection_in_list")
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" name="permission[]" class="{{ $value->class }} permission"  value="{{$value->id}}">  
					<span class="control-label">{{$value->name1}}</span>
					<br>
                    @endif
                @endforeach
							</div>	
								</div>
								<div class="col-lg-2 mastersubheading2">
										<div class="" id="tab46">		
                                        @foreach($permission as $value)
                @if($value->label == "Sales Gatepass Entry List")
                <input type="checkbox" name="permission[]" class="all_{{ $value->class }}_master all_classname permission"  value="{{$value->class}}">  
                        <label class="control-label">Select All</label>
                        <br>
                        <label class="control-label">Sales Gatepass Entry</label>
                        <br>
                @endif
                    @if($value->class == "sales_gatepass_entry_list")
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" name="permission[]" class="{{ $value->class }} permission"  value="{{$value->id}}">  
					<span class="control-label">{{$value->name1}}</span>
					<br>
                    @endif
                @endforeach
							</div>	
								</div>
								
								<div class="col-lg-2 mastersubheading2">
										<div class="" id="tab47">		
                                        @foreach($permission as $value)
                @if($value->label == "Credit Note List")
                <input type="checkbox" name="permission[]" class="all_{{ $value->class }}_master all_classname permission"  value="{{$value->class}}">  
                        <label class="control-label">Select All</label>
                        <br>
                        <label class="control-label">Credit Note</label>
                        <br>
                @endif
                    @if($value->class == "credit_note_list")
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" name="permission[]" class="{{ $value->class }} permission"  value="{{$value->id}}">  
					<span class="control-label">{{$value->name1}}</span>
					<br>
                    @endif
                @endforeach
							</div>	
								</div>
								
								</div>
							
							 </br>
								
								<input type="checkbox" name="checkAll" id="Payments_head"/></label>
								<label class="control-label"><b>Payments</b></label>
								<div class="row" id="Payments_div" style="display:none; width:100%">
									<div class="col-lg-2 mastersubheading2">
										<div class="" id="tab48">		
                                        @foreach($permission as $value)
                @if($value->label == "Payment Request List")
                <input type="checkbox" name="permission[]" class="all_{{ $value->class }}_master all_classname permission"  value="{{$value->class}}">  
                        <label class="control-label">Select All</label>
                        <br>
                        <label class="control-label">Payment Request</label>
                        <br>
                @endif
                    @if($value->class == "payment_request_list")
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" name="permission[]" class="{{ $value->class }} permission"  value="{{$value->id}}">  
					<span class="control-label">{{$value->name1}}</span>
					<br>
                    @endif
                @endforeach
							</div>	
								</div>
								
								<div class="col-lg-2 mastersubheading2">
										<div class="" id="tab49">		
                                        @foreach($permission as $value)
                @if($value->label == "Payment Process List")
                <input type="checkbox" name="permission[]" class="all_{{ $value->class }}_master all_classname permission"  value="{{$value->class}}">  
                        <label class="control-label">Select All</label>
                        <br>
                        <label class="control-label">Payment Process</label>
                        <br>
                @endif
                    @if($value->class == "payment_process_list")
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" name="permission[]" class="{{ $value->class }} permission"  value="{{$value->id}}">  
					<span class="control-label">{{$value->name1}}</span>
					<br>
                    @endif
                @endforeach
							</div>	
								</div>
								
								<div class="col-lg-2 mastersubheading2">
										<div class="" id="tab50">		
                                @foreach($permission as $value)
                @if($value->label == "Payment Expenses List")
                <input type="checkbox" name="permission[]" class="all_{{ $value->class }}_master all_classname permission"  value="{{$value->class}}">  
                        <label class="control-label">Select All</label>
                        <br>
                        <label class="control-label">Payment Expenses</label>
                        <br>
                @endif
                    @if($value->class == "payment_expenses_list")
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" name="permission[]" class="{{ $value->class }} permission"  value="{{$value->id}}">  
					<span class="control-label">{{$value->name1}}</span>
					<br>
                    @endif
                @endforeach
							</div>	
								</div>

							</div> <br> 
						
						
						
								<input type="checkbox" name="checkAll" id="Receipts_head"/></label>
								<label class="control-label"><b>Receipts</b></label>
								<div class="row" id="Receipts_div" style="display:none; width:100%">
									<div class="col-lg-2 mastersubheading2">
										<div class="" id="tab51">		
                                       	
                                @foreach($permission as $value)
                @if($value->label == "Receipt Request List")
                <input type="checkbox" name="permission[]" class="all_{{ $value->class }}_master all_classname permission"  value="{{$value->class}}">  
                        <label class="control-label">Select All</label>
                        <br>
                        <label class="control-label">Receipt Request</label>
                        <br>
                @endif
                    @if($value->class == "receipt_request_list")
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" name="permission[]" class="{{ $value->class }} permission"  value="{{$value->id}}">  
					<span class="control-label">{{$value->name1}}</span>
					<br>
                    @endif
                @endforeach
							</div>	
								</div>
								
								<div class="col-lg-2 mastersubheading2">
										<div class="" id="tab52">		
                                        @foreach($permission as $value)
                @if($value->label == "Receipt Process List")
                <input type="checkbox" name="permission[]" class="all_{{ $value->class }}_master all_classname permission"  value="{{$value->class}}">  
                        <label class="control-label">Select All</label>
                        <br>
                        <label class="control-label">Receipt Process</label>
                        <br>
                @endif
                    @if($value->class == "receipt_process_list")
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" name="permission[]" class="{{ $value->class }} permission"  value="{{$value->id}}">  
					<span class="control-label">{{$value->name1}}</span>
					<br>
                    @endif
                @endforeach
							</div>	
								</div>
								
								<div class="col-lg-2 mastersubheading2">
										<div class="" id="tab53">		
                                        @foreach($permission as $value)
                @if($value->label == "Receipt Income List")
                <input type="checkbox" name="permission[]" class="all_{{ $value->class }}_master all_classname permission"  value="{{$value->class}}">  
                        <label class="control-label">Select All</label>
                        <br>
                        <label class="control-label">Receipt Income</label>
                        <br>
                @endif
                    @if($value->class == "receipt_income_list")
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" name="permission[]" class="{{ $value->class }} permission"  value="{{$value->id}}">  
					<span class="control-label">{{$value->name1}}</span>
					<br>
                    @endif
                @endforeach
							</div>	
								</div>

							</div> <br>
							
							
							<input type="checkbox" name="checkAll" id="Advance_head"/></label>
								<label class="control-label"><b>Advance</b></label>
								<div class="row" id="Advance_div" style="display:none; width:100%">
									<div class="col-lg-3 mastersubheading2">
										<div class="" id="tab54">		
                                        @foreach($permission as $value)
                @if($value->label == "Advance To Suppliers List")
                <input type="checkbox" name="permission[]" class="all_{{ $value->class }}_master all_classname permission"  value="{{$value->class}}">  
                        <label class="control-label">Select All</label>
                        <br>
                        <label class="control-label">Advance To Suppliers</label>
                        <br>
                @endif
                    @if($value->class == "advance_to_suppliers_list")
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" name="permission[]" class="{{ $value->class }} permission"  value="{{$value->id}}">  
					<span class="control-label">{{$value->name1}}</span>
					<br>
                    @endif
                @endforeach
							</div>	
								</div>
								
								<div class="col-lg-3 mastersubheading2">
										<div class="" id="tab55">		
                                        @foreach($permission as $value)
                @if($value->label == "Advance From Customers List")
                <input type="checkbox" name="permission[]" class="all_{{ $value->class }}_master all_classname permission"  value="{{$value->class}}">  
                        <label class="control-label">Select All</label>
                        <br>
                        <label class="control-label">Advance From Customers</label>
                        <br>
                @endif
                    @if($value->class == "advance_from_customers_list")
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" name="permission[]" class="{{ $value->class }} permission"  value="{{$value->id}}">  
					<span class="control-label">{{$value->name1}}</span>
					<br>
                    @endif
                @endforeach
							</div>	
								</div>
								</div> <br>
							
							<input type="checkbox" name="checkAll" id="AccountExpense_head"/></label>
								<label class="control-label"><b>Account Expense</b></label>
								<div class="row" id="AccountExpense_div" style="display:none; width:100%">
									<div class="col-lg-2 mastersubheading2">
										<div class="" id="tab56">		
                                        @foreach($permission as $value)
                @if($value->label == "Account Expense List")
                <input type="checkbox" name="permission[]" class="all_{{ $value->class }}_master all_classname permission"  value="{{$value->class}}">  
                        <label class="control-label">Select All</label>
                        <br>
                        <label class="control-label">Account Expense</label>
                        <br>
                @endif
                    @if($value->class == "account_expense_list")
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" name="permission[]" class="{{ $value->class }} permission"  value="{{$value->id}}">  
					<span class="control-label">{{$value->name1}}</span>
					<br>
                    @endif
                @endforeach
							</div>	
								</div>
								</div></div></div> <br> 
								
						<div class="form-group col-sm-12 col-md-12"> 
						<div class="container">
                             <div class="panel panel-default"  id="heading">
                             <div class="panel-heading maseterheading"><h4 style=" text-align: center;">
							 <input style=" text-align: center;" type="checkbox"  class="prize_updation" id="prize_updation"/>
							 <b>Price Updation</b></h4></div>
                             </div>
                             </div>
							 						<div id="prize_updation_div" class="prize_updation_div form-group mastersubheading1" style="display:none; width:97%">
							 <div class="col-lg-3 mastersubheading2">
										<div class="" id="tab57">		
                                        @foreach($permission as $value)
                @if($value->label == "Price Updation List")
                <input type="checkbox" name="permission[]" class="all_{{ $value->class }}_master all_classname permission"  value="{{$value->class}}">  
                        <label class="control-label">Select All</label>
                        <br>
                        <label class="control-label">Price Updation</label>
                        <br>
                @endif
                    @if($value->class == "price_updation_list")
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" name="permission[]" class="{{ $value->class }} permission"  value="{{$value->id}}">  
					<span class="control-label">{{$value->name1}}</span>
					<br>
                    @endif
                @endforeach
							</div>	
								</div>
								
							 
							 
							 </div> </div> </br>
							
					
						
						<div class="form-group col-sm-12 col-md-12"> 
						<div class="container">
                             <div class="panel panel-default"  id="heading">
                             <div class="panel-heading maseterheading"><h4 style=" text-align: center;">
							 <input style=" text-align: center;" type="checkbox"  class="customer_head" id="outstanding" />
							 <b>Outstanding</b></h4></div>
                             </div>
                             </div>
							 <div id="outstanding_div" class="outstanding_div form-group mastersubheading1" style="display:none; width:97%">
							 <input type="checkbox" name="checkAll" id="Receivables_head"/></label>
								<label class="control-label"><b>Receivables</b></label>
								<div class="row" id="Receivables_div" style="display:none; width:100%">
									<div class="col-lg-3 mastersubheading2">
										<div class="" id="tab58">		
								<!-- <input type="checkbox" name="checkAll58" id="checkAll58"/></label>
								<label class="control-label">Select All</label>
								<br> -->
                                @foreach($permission as $value)
                                @if($value->class == "billwise_receivables")
								<input type="checkbox"    name="permission[]" class="{{ $value->class }} permission"  value="{{$value->id}}"/></label>
								<label class="control-label">Billwise Receivables</label><br>
                                @endif
                                @if($value->class == "partywise_receivables")
								<input type="checkbox"   name="permission[]" class="{{ $value->class }} permission"  value="{{$value->id}}"/></label>
								<label class="control-label">Partywise Receivables</label>
                                @endif
                                @endforeach
							</div>	
								</div>
								</div>
								
								<br/>
								
							  <input type="checkbox" name="checkAll" id="Payables_head"/></label>
								<label class="control-label"><b>Payables</b></label>
								<div class="row" id="Payables_div" style="display:none; width:100%">
									<div class="col-lg-3 mastersubheading2">									
										<div class="" id="tab59">		
								<!-- <input type="checkbox" name="checkAll59" id="checkAll59"/></label>
								<label class="control-label">Select All</label>
								<br> -->
                                @foreach($permission as $value)
                                @if($value->class == "payable_billwise")

								<input type="checkbox"   name="permission[]" class="{{ $value->class }} permission"  value="{{$value->id}}"/></label>
								<label class="control-label">Billwise Payables</label><br>
                                @endif
                                @if($value->class == "payable_partywise")
								<input type="checkbox"   name="permission[]" class="{{ $value->class }} permission"  value="{{$value->id}}"/></label>
								<label class="control-label">Partywise Payables</label>
                                @endif
                                @endforeach
							</div>	
								</div>
							 </div> 
							 </div></div> </br>
						
						<div class="form-group col-sm-12 col-md-12"> 
						<div class="container">
                             <div class="panel panel-default"  id="heading">
                             <div class="panel-heading maseterheading"><h4 style=" text-align: center;">
							 <input style=" text-align: center;" type="checkbox"  class="customer_head" id="settings" />
							 <b>Settings</b></h4></div>
                             </div>
                             </div>
							 <div id="settings_div" class="outstanding_div form-group mastersubheading1" style="display:none; width:97%">
							 <input type="checkbox" name="checkAll60" id="checkAll60"/></label>
								<label class="control-label"><b>Selling Price</b></label>
								<div class="row">
									<div class="col-lg-3 mastersubheading2">
										<div class="" id="tab60">		
								
                                        @foreach($permission as $value)
                @if($value->label == "Selling Price Setup")
                <!-- <input type="checkbox" name="permission[]" class="all_{{ $value->class }}_master all_classname permission"  value="{{$value->class}}">  
                        <label class="control-label">Select All</label>
                        <br> -->
                        <label class="control-label">Selling Price Setup</label>
                        <br>
                @endif
                    @if($value->class == "selling_price_setup")
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" name="permission[]" class="{{ $value->class }} permission"  value="{{$value->id}}">  
					<span class="control-label">{{$value->name1}}</span>
					<br>
                    @endif
                @endforeach
							</div>	
								</div>
							 </div>
							 </div></div></br></br></br>
						
						
						<div class="form-group col-sm-12 col-md-12"> 
						<div class="container">
                             <div class="panel panel-default"  id="heading">
                             <div class="panel-heading maseterheading"><h4 style=" text-align: center;">
							 <input style=" text-align: center;" type="checkbox"  class="customer_head" id="pos" />
							 <b>POS</b></h4></div>
                             </div>
                             </div>
							 <div id="pos_div" class="prize_updation_div form-group mastersubheading1" style="display:none; width:97%">
							<input type="checkbox" name="checkAll61" id="checkAll61"/></label>
								<label class="control-label"><b>POS</b></label>
								<div class="row">
									<div class="col-lg-3 mastersubheading2">
										<div class="" id="tab61">		
								
                                        @foreach($permission as $value)
                @if($value->label == "Pos List")
                <input type="checkbox" name="permission[]" class="all_{{ $value->class }}_master all_classname permission"  value="{{$value->class}}">  
                        <label class="control-label">Select All</label>
                        <br>
                        <label class="control-label">Pos</label>
                        <br>
                @endif
                    @if($value->class == "pos_list")
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" name="permission[]" class="{{ $value->class }} permission"  value="{{$value->id}}">  
					<span class="control-label">{{$value->name1}}</span>
					<br>
                    @endif
                @endforeach
							</div>	
								</div>
							 </div>								
						</div></div> </br></br></br>
						
						
					<div class="form-group col-sm-12 col-md-12"> 
						<div class="container">
                             <div class="panel panel-default"  id="heading">
                             <div class="panel-heading maseterheading"><h4 style=" text-align: center;">
							 <input style=" text-align: center;" type="checkbox"  class="customer_head" id="reports" />
							 <b>Reports</b></h4></div>
                             </div>
                             </div>	
							 <div id="reports_div" class="reports_div form-group mastersubheading1" style="display:none; width:97%">
						<div class="container">
							<input type="checkbox" name="checkAll62" id="day_head"/></label>
								<label class="control-label"><b>Day Book</b></label>
								<div class="row" id="day_div" style="display:none; width:100%">
									<div class="col-lg-2 mastersubheading2">
										<div class="" id="tab62">		
								
                                        @foreach($permission as $value)
                @if($value->label == "Day Book")
                <!-- <input type="checkbox" name="permission[]" class="all_{{ $value->class }}_master all_classname permission"  value="{{$value->class}}">  
                        <label class="control-label">Select All</label>
                        <br> -->
                        <label class="control-label">Day Book</label>
                        <br>
                @endif
                    @if($value->class == "daybook")
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" name="permission[]" class="{{ $value->class }} permission"  value="{{$value->id}}">  
					<span class="control-label">{{$value->name1}}</span>
					<br>
                    @endif
                @endforeach
							</div>	
									</div>
								</div>
								
							</div>
							
							<div class="container">
							<input type="checkbox" name="checkAll63" id="reortStock_head"/></label>
								<label class="control-label"><b>Stock Report</b></label>
								<div class="row" id="reortStock_div" style="display:none; width:100%">
									<div class="col-lg-3 mastersubheading2">
										<div class="" id="tab63">		
								
                                @foreach($permission as $value)
                                @if($value->class == "stock_report")
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" name="permission[]" class="{{ $value->class }} permission"  value="{{$value->id}}">  
					<span class="control-label">{{$value->name1}}</span>
					<br>
                    @endif
                @endforeach
								</div>
								<div>
                                @foreach($permission as $value)
                                @if($value->class == "stock_summary")
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" name="permission[]" class="{{ $value->class }} permission"  value="{{$value->id}}">  
					<span class="control-label">{{$value->name1}}</span>
					<br>
                    @endif
                @endforeach								</div>
								<div>
                                @foreach($permission as $value)
                                @if($value->class == "stock_ageing")
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" name="permission[]" class="{{ $value->class }} permission"  value="{{$value->id}}">  
					<span class="control-label">{{$value->name1}}</span>
					<br>
                    @endif
                @endforeach	
							</div>	
									</div>
								</div>
								
							</div>
                         
						 <div class="container">
							<input type="checkbox" name="checkAll64" id="IndividualReport_head"/></label>
								<label class="control-label"><b>Individual Report</b></label>
								<div class="row" id="IndividualReport_div" style="display:none; width:100%">
									<div class="col-lg-2 mastersubheading2">
										<div class="" id="tab64">		
								
                                        @foreach($permission as $value)
                    @if($value->class == "individual_ledger")
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" name="permission[]" class="{{ $value->class }} permission"  value="{{$value->id}}">  
					<span class="control-label">{{$value->name1}}</span>
					<br>
                    @endif
                @endforeach
							</div>	
									</div>
								</div>
								
							</div>
                         
						 <div class="container">
							<input type="checkbox" name="checkAll65" id="GSTReport_head"/></label>
								<label class="control-label"><b>GST Report</b></label>
								<div class="row" id="GSTReport_div" style="display:none; width:100%">
									<div class="col-lg-2 mastersubheading2">
										<div class="" id="tab65">		
								
                                        @foreach($permission as $value)
                    @if($value->class == "gst_report")
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" name="permission[]" class="{{ $value->class }} permission"  value="{{$value->id}}">  
					<span class="control-label">{{$value->name1}}</span>
					<br>
                    @endif
                @endforeach
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
     <script src="{{asset('assets/js/master/capitalize.js')}}"></script>
    <!-- card body end@ -->
  </div>
</div>
<script>


$(".permission").click(function (e) {
        var id = $(this).val();
        if (id == "all_permission")
        {
            if ($(this).prop('checked') != true) {
                $('.permission').prop('checked', false);
            } else
            {
                $('.permission').prop('checked', true);
            }
        } else
        {
            var id_new = "all_" + $(this).val() + "_master";
            var id_newest = $(this).val();
            if ($(this).hasClass(id_new) == true)
            {
                if ($(this).prop('checked') != true) {
                    $("." + id_newest).prop('checked', false);
                } else
                {
                    $("." + id_newest).prop('checked', true);
                }
            } else
            {
                var classname = "." + $(this).attr("class").split(' ')[0];
                var all_classname = ".all_" + $(this).attr("class").split(' ')[0]+"_master";
                var counter = 0;
                $(classname).each(function () {
                    if ($(this).prop('checked') != true && $(all_classname).attr("class") != $(this).attr("class")) {
                        counter++;
                    }
                });
                if (counter > 0)
                {
                    $(all_classname).prop('checked', false);
                } else
                {
                    $(all_classname).prop('checked', true);
                }
            }
        }
    });

function checked_count()
{
  var checked_count=0;
  $(".permission").each(function(){
    if($(this). prop("checked") == true)
    {
      checked_count++;

    }
  });

  return checked_count;

}

$(document).on("click",".submit",function(){
  var checked_count_value=checked_count();
  var error_count=0;
  if($(".name").val() !="")
  {
    $(".name").removeClass("is-invalid");
     $(".name").addClass("is-valid");
  }else{
    error_count++;  
    $(".name").removeClass("is-valid");
     $(".name").addClass("is-invalid");
  }

  if(checked_count_value == 0){
    error_count++; 
    alert("Please Choose Atleast One Permission");
  }

  if(error_count == 0){
$("form").submit();
  }
});
</script>
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

$(document).ready(function(){
	var mas_id = $("#location_head");
    $('#location_head').change(function(){
        if(this.checked)
            $('#location_div').fadeIn('slow');
        else
            $('#location_div').fadeOut('slow');

    });
});

$(document).ready(function(){
	var mas_id = $("#bank_head");
    $('#bank_head').change(function(){
        if(this.checked)
            $('#bank_div').fadeIn('slow');
        else
            $('#bank_div').fadeOut('slow');

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
	var mas_id = $("#user_head");
    $('#user_head').change(function(){
        if(this.checked)
            $('#user_div').fadeIn('slow');
        else
            $('#user_div').fadeOut('slow');

    });
});


$(document).ready(function(){
	var mas_id = $("#account_head");
    $('#account_head').change(function(){
        if(this.checked)
            $('#account_div').fadeIn('slow');
        else
            $('#account_div').fadeOut('slow');

    });
});


$(document).ready(function(){
	var mas_id = $("#Category_head");
    $('#Category_head').change(function(){
        if(this.checked)
            $('#Category_div').fadeIn('slow');
        else
            $('#Category_div').fadeOut('slow');

    });
});


$(document).ready(function(){
	var mas_id = $("#Language_head");
    $('#Language_head').change(function(){
        if(this.checked)
            $('#Language_div').fadeIn('slow');
        else
            $('#Language_div').fadeOut('slow');

    });
});


$(document).ready(function(){
	var mas_id = $("#item_head");
    $('#item_head').change(function(){
        if(this.checked)
            $('#item_div').fadeIn('slow');
        else
            $('#item_div').fadeOut('slow');

    });
});


$(document).ready(function(){
	var mas_id = $("#Vendor_head");
    $('#Vendor_head').change(function(){
        if(this.checked)
            $('#Vendor_div').fadeIn('slow');
        else
            $('#Vendor_div').fadeOut('slow');

    });
});



$(document).ready(function(){
	var mas_id = $("#Area_head");
    $('#Area_head').change(function(){
        if(this.checked)
            $('#Area_div').fadeIn('slow');
        else
            $('#Area_div').fadeOut('slow');

    });
});


$(document).ready(function(){
	var mas_id = $("#AccountGroup_head");
    $('#AccountGroup_head').change(function(){
        if(this.checked)
            $('#AccountGroup_div').fadeIn('slow');
        else
            $('#AccountGroup_div').fadeOut('slow');

    });
});

$(document).ready(function(){
	var mas_id = $("#purchase_head");
    $('#purchase_head').change(function(){
        if(this.checked)
            $('#purchase_div').fadeIn('slow');
        else
            $('#purchase_div').fadeOut('slow');

    });
});

$(document).ready(function(){
	var mas_id = $("#Sales_head");
    $('#Sales_head').change(function(){
        if(this.checked)
            $('#Sales_div').fadeIn('slow');
        else
            $('#Sales_div').fadeOut('slow');

    });
});


$(document).ready(function(){
	var mas_id = $("#Payments_head");
    $('#Payments_head').change(function(){
        if(this.checked)
            $('#Payments_div').fadeIn('slow');
        else
            $('#Payments_div').fadeOut('slow');

    });
});

$(document).ready(function(){
	var mas_id = $("#Receipts_head");
    $('#Receipts_head').change(function(){
        if(this.checked)
            $('#Receipts_div').fadeIn('slow');
        else
            $('#Receipts_div').fadeOut('slow');

    });
});


$(document).ready(function(){
	var mas_id = $("#Receipts_head");
    $('#Receipts_head').change(function(){
        if(this.checked)
            $('#Receipts_div').fadeIn('slow');
        else
            $('#Receipts_div').fadeOut('slow');

    });
});

$(document).ready(function(){
	var mas_id = $("#Advance_head");
    $('#Advance_head').change(function(){
        if(this.checked)
            $('#Advance_div').fadeIn('slow');
        else
            $('#Advance_div').fadeOut('slow');

    });
});

$(document).ready(function(){
	var mas_id = $("#AccountExpense_head");
    $('#AccountExpense_head').change(function(){
        if(this.checked)
            $('#AccountExpense_div').fadeIn('slow');
        else
            $('#AccountExpense_div').fadeOut('slow');

    });
});


$(document).ready(function(){
	var mas_id = $("#Receivables_head");
    $('#Receivables_head').change(function(){
        if(this.checked)
            $('#Receivables_div').fadeIn('slow');
        else
            $('#Receivables_div').fadeOut('slow');

    });
});



$(document).ready(function(){
	var mas_id = $("#Payables_head");
    $('#Payables_head').change(function(){
        if(this.checked)
            $('#Payables_div').fadeIn('slow');
        else
            $('#Payables_div').fadeOut('slow');

    });
});


$(document).ready(function(){
	var mas_id = $("#day_head");
    $('#day_head').change(function(){
        if(this.checked)
            $('#day_div').fadeIn('slow');
        else
            $('#day_div').fadeOut('slow');

    });
});


$(document).ready(function(){
	var mas_id = $("#StockReport_head");
    $('#StockReport_head').change(function(){
        if(this.checked)
            $('#StockReport_div').fadeIn('slow');
        else
            $('#StockReport_div').fadeOut('slow');

    });
});

$(document).ready(function(){
	var mas_id = $("#reortStock_head");
    $('#reortStock_head').change(function(){
        if(this.checked)
            $('#reortStock_div').fadeIn('slow');
        else
            $('#reortStock_div').fadeOut('slow');

    });
});

$(document).ready(function(){
	var mas_id = $("#IndividualReport_head");
    $('#IndividualReport_head').change(function(){
        if(this.checked)
            $('#IndividualReport_div').fadeIn('slow');
        else
            $('#IndividualReport_div').fadeOut('slow');

    });
});

$(document).ready(function(){
	var mas_id = $("#GSTReport_head");
    $('#GSTReport_head').change(function(){
        if(this.checked)
            $('#GSTReport_div').fadeIn('slow');
        else
            $('#GSTReport_div').fadeOut('slow');

    });
});

</script>
@endsection

