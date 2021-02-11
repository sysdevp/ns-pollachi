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
				
							 <input style=" text-align: center;"  type="checkbox"  class="menu"  value="collapseOne" /> <b>Master</b></h4>
							 
           </div>
				
	   
   		    <div id="collapseOne" class="collapse" data-parent="#accordionExample">			
		
			<div id="accordionExample1">
				
				<div class="subparent">
					
						 <div class="card-header locationbg">
							<button type="button" class="btn btn-link" data-toggle="collapse" data-target="#collapselocation"><i class="fa fa-plus addbg"></i></button>
							 <input type="checkbox" name="checkAll" id="location" class="submenu"/> Location
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
        </div>
							
						</div>	
					
				</div>
				
				
				
				<div class="subparent">
					
						 <div class="card-header locationbg">
							<button type="button" class="btn btn-link" data-toggle="collapse" data-target="#collapsebank"><i class="fa fa-plus addbg"></i></button>
							 <input type="checkbox" name="checkAll8" id="bank" class="submenu"/> Bank
						</div>
					
					
						<div id="collapsebank" class="collapse" data-parent="#accordionExample1">
							
							<div class="locationdivbg">
								
				<div class="row masterdivleft" id="bank_div">
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
        </div>
							
						</div>	
					
				</div>
				
				
				
				<div class="subparent">
					
						 <div class="card-header locationbg">
							<button type="button" class="btn btn-link" data-toggle="collapse" data-target="#collapseEmployee"><i class="fa fa-plus addbg"></i></button>
							 <input type="checkbox" name="checkAll1" id="Employee" class="submenu"/> Employee
						</div>
					
					
					
						<div id="collapseEmployee" class="collapse" data-parent="#accordionExample1">
							
							<div class="locationdivbg">
							
								<div class="row masterdivleft" id="employee_div">
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
				
        				</div>
							
						</div>	
					
				</div>
	
				
				
				<div class="subparent">
					
                    <div class="card-header locationbg">
                       <button type="button" class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseUser" aria-expanded="false"><i class="fa addbg fa-plus"></i></button>
                       <input type="checkbox" name="checkAll1" id="User" class="submenu"> User
                   </div>
               
               
               
                   <div id="collapseUser" class="collapse" data-parent="#accordionExample1" style="">
                       
                       <div class="locationdivbg">
                       
                        <div class="row masterdivleft" id="user_div">
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
                @endforeach		
                                </div>
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
           
                   </div>
                       
                   </div>	
               
            </div>

			<div class="subparent">
					
                    <div class="card-header locationbg">
                       <button type="button" class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseOffers" aria-expanded="false"><i class="fa addbg fa-plus"></i></button>
                       <input type="checkbox" name="checkAll1" id="Offers" class="submenu"> Offers
                   </div>
               
               
               
                   <div id="collapseOffers" class="collapse" data-parent="#accordionExample1" style="">
                       
                       <div class="locationdivbg">
                       
                        <div class="row masterdivleft" id="account_div">
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
           
                   </div>
                       
                   </div>	
               
            </div>
             
            <div class="subparent">
					
                <div class="card-header locationbg">
                   <button type="button" class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseCategory" aria-expanded="false"><i class="fa addbg fa-plus"></i></button>
                   <input type="checkbox" name="checkAll1" id="Category" class="submenu"> Category
               </div>
           
           
           
               <div id="collapseCategory" class="collapse" data-parent="#accordionExample1" style="">
                   
                   <div class="locationdivbg">
                   
                    <div class="row masterdivleft" id="Category_div">
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
       
               </div>
                   
               </div>	
           
            </div>

            <div class="subparent">
					
                <div class="card-header locationbg">
                   <button type="button" class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseLanguage" aria-expanded="false"><i class="fa addbg fa-plus"></i></button>
                   <input type="checkbox" name="checkAll" id="Language" class="submenu"> Language
               </div>
           
           
           
               <div id="collapseLanguage" class="collapse" data-parent="#accordionExample1" style="">
                   
                   <div class="locationdivbg">
                   
                     <div class="row masterdivleft" id="Language_div">
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
       
               </div>
                   
               </div>	
           
            </div>

            <div class="subparent">
					
                <div class="card-header locationbg">
                   <button type="button" class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseItem" aria-expanded="false"><i class="fa addbg fa-plus"></i></button>
                   <input type="checkbox" name="checkAll" id="Item" class="submenu"> Item
               </div>
           
           
           
               <div id="collapseItem" class="collapse" data-parent="#accordionExample1" style="">
                   
                   <div class="locationdivbg">
                   
                    <div class="row" id="item_div">
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
       
               </div>
                   
               </div>	
           
            </div>

            <div class="subparent">
					
                <div class="card-header locationbg">
                   <button type="button" class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseVendor" aria-expanded="false"><i class="fa addbg fa-plus"></i></button>
                   <input type="checkbox" name="checkAll1" id="Vendor" class="submenu"> Vendor
               </div>
           
           
           
               <div id="collapseVendor" class="collapse" data-parent="#accordionExample1" style="">
                   
                   <div class="locationdivbg">
                   
                    <div class="row" id="Vendor_div">
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
       
               </div>
                   
               </div>	
           
            </div>

            <div class="subparent">
					
                <div class="card-header locationbg">
                   <button type="button" class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseArea" aria-expanded="false"><i class="fa addbg fa-plus"></i></button>
                   <input type="checkbox" name="checkAll" id="Area" class="submenu"> Area
               </div>
           
           
           
               <div id="collapseArea" class="collapse" data-parent="#accordionExample1" style="">
                   
                   <div class="locationdivbg">
                   
                    <div class="row" id="Area_div">
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
       
               </div>
                   
               </div>	
           
            </div>

            <div class="subparent">
					
                <div class="card-header locationbg">
                   <button type="button" class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseGroup" aria-expanded="false"><i class="fa addbg fa-plus"></i></button>
                   <input type="checkbox" name="checkAll" id="Group" class="submenu"> Account Group
               </div>         
           
           
               <div id="collapseGroup" class="collapse" data-parent="#accordionExample1" style="">
                   
                   <div class="locationdivbg">
                   
                    <div class="row" id="AccountGroup_div">
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
                   
               </div>	
           
            </div>
				
		  </div>
		  
      
	  
      </div>
				
				
			<div class="card-header masterbg margintop" id="heading" >
                            
					<button type="button" class="btn btn-link" data-toggle="collapse" data-target="#collapsetwo"><i class="fa fa-plus addbg"></i></button>	
				
							 <input style=" text-align: center;" type="checkbox" class="menu" value="collapsetwo" />
				<b>Transaction Management</b>			
           </div>		
	  
				
		    <div id="collapsetwo" class="collapse" data-parent="#accordionExample">			
		
			<div id="accordionExample2">
				
				<div class="subparent">
					
						 <div class="card-header locationbg">
							<button type="button" class="btn btn-link" data-toggle="collapse" data-target="#collapsePurchase"><i class="fa fa-plus addbg"></i></button>
							<input type="checkbox" name="checkAll1" id="Purchase" class="submenu"/> Purchase
						</div>
					
					
					
						<div id="collapsePurchase" class="collapse" data-parent="#accordionExample2">
							
							<div class="locationdivbg">
							
								<div class="row" id="purchase_div">
									
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
                @endforeach		
   </div>
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
				
        				</div>
							
						</div>	
					
				</div>
				
				<div class="subparent">
					
						 <div class="card-header locationbg">
							<button type="button" class="btn btn-link" data-toggle="collapse" data-target="#collapseSales"><i class="fa fa-plus addbg"></i></button>
							<input type="checkbox" name="checkAll" id="Sales" class="submenu"/> Sales
						</div>
					
					
					
						<div id="collapseSales" class="collapse" data-parent="#accordionExample2">
							
							<div class="locationdivbg">
							
								<div class="row" id="Sales_div">
									
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
                        <label class="control-label">Sales Entry</label>
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
				
        				</div>
							
						</div>	
					
				</div>
				
				
				<div class="subparent">
					
						 <div class="card-header locationbg">
							<button type="button" class="btn btn-link" data-toggle="collapse" data-target="#collapsePayments"><i class="fa fa-plus addbg"></i></button>
							<input type="checkbox" name="checkAll" id="Payments" class="submenu"/> Payments
						</div>
					
					
					
						<div id="collapsePayments" class="collapse" data-parent="#accordionExample2">
							
							<div class="locationdivbg">
							
								<div class="row" id="Payments_div">
									
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
					
					
							
								
									
								</div>
				
        				</div>
							
						</div>	
					
				</div>
				
				
				<div class="subparent">
					
						 <div class="card-header locationbg">
							<button type="button" class="btn btn-link" data-toggle="collapse" data-target="#collapseReceipts"><i class="fa fa-plus addbg"></i></button>
							<input type="checkbox" name="checkAll" id="Receipts" class="submenu"/> Receipts
						</div>
					
					
					
						<div id="collapseReceipts" class="collapse" data-parent="#accordionExample2">
							
							<div class="locationdivbg">
							
								<div class="row" id="Receipts_div">
									
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
				
							 <input style=" text-align: center;" type="checkbox" class="menu" id="prize_updation" value="collapsethree"/>
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
            
                <input style=" text-align: center;" type="checkbox" class="menu" id="outstanding" value="collapsefour">
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
				
							 <input style=" text-align: center;" type="checkbox" class="menu" value="collapsefive" id="settings"/>
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
        
            <input style=" text-align: center;" type="checkbox" class="menu" value="collapsesix" id="pos"/>
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
				
							  <input style=" text-align: center;" type="checkbox" class="menu" value="collapseseven" id="reports"/>
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
// Master Menu check fn
    $(".menu").click(function () {

        var id = $(this).val(); // id for collapse
        // alert(id);
             //var collapse = id;
            if ($(".menu").is(':checked'))
            {

            $("#"+id+" input[type=checkbox]").each(function () {
                $(this).prop("checked", true);
            });
        }
         else {
            $("#"+id+" input[type=checkbox]").each(function () {
                $(this).prop("checked", false);
            });
        }
        });
// submenus
        $(".submenu").click(function () {
            var id = $(this).attr('id');
             var collapse = "#collapse"+id;

            if ($(".submenu").is(':checked'))
            {

            $(collapse+" input[type=checkbox]").each(function () {
                $(this).prop("checked", true);
            });
        }
         else {
            $(collapse+" input[type=checkbox]").each(function () {
                $(this).prop("checked", false);
            });
        }

        });

// Permission Select All
$(".permission").click(function (e) {

    var master = ["state_list","district_list"];

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
                    alert('ss');
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
</script>

@endsection

