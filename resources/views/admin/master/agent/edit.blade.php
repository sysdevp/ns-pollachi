@extends('admin.layout.app')
@section('content')
<div class="col-12 body-sec">
  <div class="card container px-0">
    <!-- card header start@ -->
    <div class="card-header px-2">
      <div class="row">
        <div class="col-4">
          <h3>Edit Agent </h3>
        </div>
        <div class="col-8 mr-auto">
          <ul class="h-right-btn mb-0 pl-0">
            <li><button type="button" class="btn btn-success"><a href="{{url('master/agent')}}">Back</a></button></li>
          </ul>
        </div>
      </div>
    </div>
    <!-- card header end@ -->
    <div class="card-body">
    
      <form  method="post" class="form-horizontal needs-validation" novalidate action="{{url('master/agent/update/'.$agent->id)}}" enctype="multipart/form-data">
      {{csrf_field()}}

      <div class="form-row">
         

        <div class="col-md-8">
        <h4>Professional details:</h4>
        </div>
        <div class="col-md-6">
          
          <div class="form-group row">
            <label for="validationCustom01" class="col-sm-4 col-form-label">Agent Name <span class="mandatory">*</span></label>
            <div class="col-sm-8">
          <div class="input-group">
          <div class="input-group-prepend">
            <select class="form-control required_for_valid salutation" name="salutation" error-data="Enter valid Salutation" >
                <option value="Mr" {{ old('salutation',$agent->salutation) == 'Mr' ? 'selected' : '' }}>Mr</option>
                <option value="Mrs" {{ old('salutation',$agent->salutation) == 'Mrs' ? 'selected' : '' }} >Mrs</option>
            </select>
            <span class="mandatory"> {{ $errors->first('salutation')  }} </span>
          </div>
          <input type="text" class="form-control required_for_valid name" name="name" error-data="Agent Name Field is required" onchange="checkname()" aria-label="Text input with dropdown button" value={{old('name',$agent->name)}}>
          
          <div class="invalid-feedback">
            Enter valid Agent Name
          </div>
          
        </div>
        <span class="mandatory"> {{ $errors->first('name')  }} </span>
        <span class="mandatory"> {{ $errors->first('salutation')  }} </span>
        </div>
        </div>

        </div>
<div class="col-md-6">
          <div class="form-group row">
            <label for="validationCustom01" class="col-sm-4 col-form-label">Agent Code <span class="mandatory">*</span></label>
            <div class="col-sm-8">
              <input type="text" class="form-control code only_allow_alp_num_dot_com_amp required_for_valid" error-data="Enter valid Agent Code" placeholder="Agent Code" name="code" value="{{old('code',$agent->code)}}" >
              <span class="mandatory"> {{ $errors->first('code')  }} </span>
              <div class="invalid-feedback">
                Enter valid Agent Code
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group row">
            <label for="validationCustom01" class="col-sm-4 col-form-label">Phone No <span class="mandatory">*</span></label>
            <div class="col-sm-8">
              <input type="text" class="form-control  phone_no only_allow_digit required_for_valid" input-type="phone_no" pattern="[1-9]{1}[0-9]{9}" error-data="Enter valid Phone No" placeholder="Phone No" name="phone_no" value="{{old('phone_no',$agent->phone_no)}}" >
              <span class="mandatory"> {{ $errors->first('phone_no')  }} </span>
              <div class="invalid-feedback">
                
                Enter valid Phone No
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group row">
            <label for="validationCustom01" class="col-sm-4 col-form-label">Email</label>
            <div class="col-sm-8">
              <input type="email" class="form-control email" input-type="email" error_data="Enter valid Email" placeholder="Email" name="email" value="{{old('email',$agent->email)}}" >
              <span class="mandatory"> {{ $errors->first('email')  }} </span>
              <div class="invalid-feedback">
                Enter valid Email
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group row">
            <label for="validationCustom01" class="col-sm-4 col-form-label">DOB <span class="mandatory">*</span></label>
            <div class="col-sm-8">
              <?php 
                $dob=isset($agent->dob) && $agent->dob !="" ? date('d-m-Y',strtotime($agent->dob)) : "" ;
                
                ?>
              <input type="text" class="form-control dob required_for_valid" error-data="Enter valid DOB" placeholder="dd-mm-yyyy" name="dob" value="{{old('dob',$dob)}}" >
              <span class="mandatory"> {{ $errors->first('dob')  }} </span>
              <div class="invalid-feedback">
                Enter valid DOB
              </div>
            </div>
          </div>
        </div>

        
</div>
<div class="form-row">
<div class="col-md-8">
        <h4>Personal Details :</h4>
        </div>
<div class="col-md-6">
          <div class="form-group row">
            <label for="validationCustom01" class="col-sm-4 col-form-label">Father's Name <span class="mandatory">*</span></label>
            <div class="col-sm-8">
              <input type="text" class="form-control father_name required_for_valid" error-data="Enter valid Father's Name" placeholder="Father's Name" name="father_name" value="{{old('father_name',$agent->father_name)}}">
              <span class="mandatory"> {{ $errors->first('father_name')  }} </span>
              <div class="invalid-feedback">
                Enter valid Father's Name
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group row">
            <label for="validationCustom01" class="col-sm-4 col-form-label">Blood Group <span class="mandatory">*</span></label>
            <div class="col-sm-8">
              <input type="text" class="form-control blood_group required_for_valid" error-data="Enter valid Blood Group" placeholder="Blood Group" name="blood_group" value="{{old('blood_group',$agent->blood_group)}}" >
              <span class="mandatory"> {{ $errors->first('blood_group')  }} </span>
              <div class="invalid-feedback">
                Enter valid Blood Group
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group row">
            <label for="validationCustom01" class="col-sm-4 col-form-label">Material Status <span class="mandatory">*</span></label>
            <div class="col-sm-8">
            <select class="js-example-basic-multiple col-12 form-control material_status select custom-select required_for_valid" 
            error-data="Enter valid Material Status" data-placeholder="Choose Material " name="material_status" >
            <option value=""></option>
               <option value="Married"  {{ old('material_status',$agent->material_status) == 'Married' ? 'selected' : '' }}>Married</option>
                <option value="Single" {{ old('material_status',$agent->material_status) == 'Single' ? 'selected' : '' }}>Single</option>
                <option value="Divorced" {{ old('material_status',$agent->material_status) == 'Divorced' ? 'selected' : '' }}>Divorced</option> 
             </select>
             
                <span class="mandatory"> {{ $errors->first('material_status')  }} </span>
                <div class="invalid-feedback">
                  Enter valid Material Status
                </div>
            </div>
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group row">
            <label for="validationCustom01" class="col-sm-4 col-form-label">Photo <span class="mandatory">*</span></label>
            <div class="col-sm-8">
              <input type="file" class="form-control profile " placeholder="Father's Name" name="profile" value="{{old('profile')}}" >
              <button type="button" id="cus-btn">CHOOSE A FILE</button>
              <span class="mandatory"> {{ $errors->first('profile')  }} </span>
              <div class="invalid-feedback">
                Enter valid profile
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
            @foreach($agent_address_details as $key=>$values)
            <div class="form-row address_div">
                <div class="col-md-7">
                    <div class="form-group row">
                    <div class="col-md-7">
                    <h3 class="address_label"></h3>
                    </div>
                    <div class="col-md-4">
                    <h3 class="address_delete_label"><label class="btn btn-danger remove_address" attr-id="{{$values->id}}"> Delete </label></h3>
                        </div>
                    </div>
                    </div>
                          <div class="col-md-6">
                        <div class="form-group row">
                        <label for="validationCustom01" class="col-sm-4 col-form-label">Address Type <span class="mandatory">*</span></label>
                          <div class="col-sm-6">
                          <select class="js-example-basic-multiple col-12 form-control custom-select old_address_type_id required_for_valid required_for_address_valid" error-data="Enter valid Address Type" name="old_address_type_id[]">
                              <option value="">Choose Address Type</option>
                              @foreach($address_type as $value)
                              <option value="{{ $value->id }}" {{ old('old_address_type_id.'.$key,$values->address_type_id) == $value->id ? 'selected' : '' }} >{{ $value->name }}</option>
                              @endforeach
                            </select>
                            <span class="mandatory"> {{ $errors->first('old_address_type_id.'.$key)  }} </span>
                           <div class="invalid-feedback">
                              Enter valid Address Type
                            </div>
                          </div>
                          <a href="{{ url('master/address-type/create')}}" target="_blank">
                            <button type="button"  class="px-2 btn btn-success ml-2 " title="Add Address Type"><i class="fa fa-plus-circle" aria-hidden="true"></i></button></a>
                           <button type="button"  class="px-2 btn btn-success mx-2 refresh_address_type_id" title="Refresh"><i class="fa fa-refresh" aria-hidden="true"></i></button>
                        </div>
                      </div>
                <div class="col-md-6">
                        <div class="form-group row">
                          <label for="validationCustom01" class="col-sm-4 col-form-label">Address Line 1 <span class="mandatory">*</span></label>
                          <div class="col-sm-8">
                          <input type="text" class="form-control old_address_line_1 required_for_valid required_for_address_valid" error-data="Enter valid Address" placeholder="Address Line 1" name="old_address_line_1[]" value="{{ old('old_address_line_1.'.$key,$values->address_line_1) }}" >
                            <span class="mandatory"> {{ $errors->first('old_address_line_1.'.$key)  }} </span>
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
                            <input type="text" class="form-control old_address_line_2" placeholder="Address Line 2" name="old_address_line_2[]" value="{{ old('old_address_line_2.'.$key,$values->address_line_2) }}">
                            <span class="mandatory"> {{ $errors->first('old_address_line_2.'.$key)  }} </span>
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
                            <input type="text" class="form-control old_land_mark" placeholder="Land Mark" name="old_land_mark[]" value="{{ old('old_land_mark.'.$key,$values->land_mark) }}">
                            <span class="mandatory"> {{ $errors->first('old_land_mark.'.$key)  }} </span>
                            <div class="invalid-feedback">
                            Enter valid Land Mark
                            </div>
                          </div>
                        </div>
                      </div>
                       <!-- Old Values For Dropdown Start Here  -->
              <input type="hidden" class="form-control address_details_id" name="address_details_id[]" value="{{ old('address_details_id.'.$key,$values->id)}}">
              <input type="hidden" class="form-control exist_old_state_id" value="{{ old('old_state_id.'.$key,$values->state_id)}}">
              <input type="hidden" class="form-control exist_old_district_id" value="{{ old('old_district_id.'.$key,$values->district_id)}}">
              <input type="hidden" class="form-control exist_old_city_id" value="{{ old('old_city_id.'.$key,$values->city_id)}}">
                <!-- Old Values For Dropdown End Here  -->
            <div class="col-md-6">
                        <div class="form-group row">
                          <label for="validationCustom01" class="col-sm-4 col-form-label">State <span class="mandatory">*</span></label>
                          <div class="col-sm-6">
                            <select class="js-example-basic-multiple col-12 form-control custom-select state_id old_state_id required_for_valid required_for_address_valid" error-data="Enter valid State" name="old_state_id[]" >
                              <option value="">Choose State</option>
                              @foreach($state as $value)
                              <option value="{{ $value->id }}" {{ old('old_state_id.'.$key,$values->state_id) == $value->id ? 'selected' : '' }}  >{{ $value->name }}</option>
                              @endforeach
                            </select>
                            <span class="mandatory"> {{ $errors->first('old_state_id.'.$key)  }} </span>
                          <div class="invalid-feedback">
                              Enter valid State 
                            </div>
                          </div>
                          <a href="{{ url('master/state/create')}}" target="_blank">
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
                             <span class="mandatory"> {{ $errors->first('old_district_id.'.$key)  }} </span>
                             <div class="invalid-feedback">
                              Enter valid District
                            </div>
                          </div>
                          <a href="{{ url('master/district/create')}}" target="_blank">
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
                            <span class="mandatory"> {{ $errors->first('old_city_id.'.$key)  }} </span>
                           <div class="invalid-feedback">
                              Enter valid City
                            </div>
                          </div>
                          <a href="{{ url('master/city/create')}}" target="_blank">
                            <button type="button"  class="px-2 btn btn-success ml-2 " title="Add City"><i class="fa fa-plus-circle" aria-hidden="true"></i></button></a>
                           <button type="button"  class="px-2 btn btn-success mx-2 refresh_city_id" title="Refresh"><i class="fa fa-refresh" aria-hidden="true"></i></button>
                        </div>
                      </div>
             <div class="col-md-6">
                        <div class="form-group row">
                          <label for="land_mark" class="col-sm-4 col-form-label">Postal Code <span class="mandatory">*</span></label>
                          <div class="col-sm-8">
                          <input type="text" class="form-control old_postal_code  only_allow_digit required_for_valid required_for_address_valid" error-data="Enter valid Postal Code" placeholder="Postal Code" name="old_postal_code[]" value="{{ old('old_postal_code.'.$key,$values->postal_code) }}" >
                            <span class="mandatory"> {{ $errors->first('old_postal_code.'.$key)  }} </span>
                            <div class="invalid-feedback">
                              Enter valid Postal Code
                            </div>
                          </div>
                        </div>
                      </div>
                      </div><hr>

            @endforeach
            <!-- Exist Address Details Grid End Here -->

            <!-- Set Old Values for Address Details Grid Newly Added Row Start Here -->
            @if (old('address_line_1'))
            @foreach (old('address_line_1') as $key=>$item)
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
                              @foreach($address_type as $value)
                              <option value="{{ $value->id }}" {{ old('address_type_id.'.$key) == $value->id ? 'selected' : '' }} >{{ $value->name }}</option>
                              @endforeach
                            </select>
                            <span class="mandatory"> {{ $errors->first('address_type_id.'.$key)  }} </span>
                           <div class="invalid-feedback">
                              Enter valid Address Type
                            </div>
                          </div>
                          <a href="{{ url('master/address-type/create')}}" target="_blank">
                            <button type="button"  class="px-2 btn btn-success ml-2 " title="Add Address Type"><i class="fa fa-plus-circle" aria-hidden="true"></i></button></a>
                           <button type="button"  class="px-2 btn btn-success mx-2 refresh_address_type_id" title="Refresh"><i class="fa fa-refresh" aria-hidden="true"></i></button>
                        </div>
                      </div>
                <div class="col-md-6">
                        <div class="form-group row">
                          <label for="validationCustom01" class="col-sm-4 col-form-label">Address Line 1 <span class="mandatory">*</span></label>
                          <div class="col-sm-8">
                          <input type="text" class="form-control address_line_1 required_for_valid required_for_address_valid" error-data="Enter valid Address" placeholder="Address Line 1" name="address_line_1[]" value="{{ old('address_line_1.'.$key) }}" >
                            <span class="mandatory"> {{ $errors->first('address_line_1.'.$key)  }} </span>
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
                            <input type="text" class="form-control address_line_2" placeholder="Address Line 2" name="address_line_2[]" value="{{ old('address_line_2.'.$key) }}">
                            <span class="mandatory"> {{ $errors->first('address_line_2.'.$key)  }} </span>
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
                            <input type="text" class="form-control land_mark" placeholder="Land Mark" name="land_mark[]" value="{{ old('land_mark.'.$key) }}">
                            <span class="mandatory"> {{ $errors->first('land_mark.'.$key)  }} </span>
                            <div class="invalid-feedback">
                            Enter valid Land Mark
                            </div>
                          </div>
                        </div>
                      </div>
                <!-- Old Values For Dropdown Start Here  -->
          <input type="hidden" class="form-control new_state_id" value="{{ old('state_id.'.$key)}}">
          <input type="hidden" class="form-control new_district_id" value="{{ old('district_id.'.$key)}}">
          <input type="hidden" class="form-control new_city_id" value="{{ old('city_id.'.$key)}}">
            <!-- Old Values For Dropdown End Here  -->
            <div class="col-md-6">
                        <div class="form-group row">
                          <label for="validationCustom01" class="col-sm-4 col-form-label">State <span class="mandatory">*</span></label>
                          <div class="col-sm-6">
                            <select class="js-example-basic-multiple col-12 form-control custom-select state_id required_for_valid required_for_address_valid" error-data="Enter valid State" name="state_id[]" >
                              <option value="">Choose State</option>
                              @foreach($state as $value)
                              <option value="{{ $value->id }}" {{ old('state_id.'.$key) == $value->id ? 'selected' : '' }}  >{{ $value->name }}</option>
                              @endforeach
                            </select>
                            <span class="mandatory"> {{ $errors->first('state_id.'.$key)  }} </span>
                          <div class="invalid-feedback">
                              Enter valid State 
                            </div>
                          </div>
                          <a href="{{ url('master/state/create')}}" target="_blank">
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
                             <span class="mandatory"> {{ $errors->first('district_id.'.$key)  }} </span>
                             <div class="invalid-feedback">
                              Enter valid District
                            </div>
                          </div>
                          <a href="{{ url('master/district/create')}}" target="_blank">
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
                            <span class="mandatory"> {{ $errors->first('city_id.'.$key)  }} </span>
                           <div class="invalid-feedback">
                              Enter valid City
                            </div>
                          </div>
                          <a href="{{ url('master/city/create')}}" target="_blank">
                            <button type="button"  class="px-2 btn btn-success ml-2 " title="Add City"><i class="fa fa-plus-circle" aria-hidden="true"></i></button></a>
                           <button type="button"  class="px-2 btn btn-success mx-2 refresh_city_id" title="Refresh"><i class="fa fa-refresh" aria-hidden="true"></i></button>
                        </div>
                      </div>
             <div class="col-md-6">
                        <div class="form-group row">
                          <label for="land_mark" class="col-sm-4 col-form-label">Postal Code <span class="mandatory">*</span></label>
                          <div class="col-sm-8">
                          <input type="text" class="form-control postal_code only_allow_digit required_for_valid required_for_address_valid" error-data="Enter valid Postal Code" placeholder="Postal Code" name="postal_code[]" value="{{ old('postal_code.'.$key) }}" >
                            <span class="mandatory"> {{ $errors->first('postal_code.'.$key)  }} </span>
                            <div class="invalid-feedback">
                              Enter valid Postal Code
                            </div>
                          </div>
                        </div>
                      </div>
                      </div><hr>
            @endforeach
            @endif

            <!-- Set Old Values for Address Details Grid Newly Added Row End Here -->

           </div>

           <div class="form-row">
              <div class="col-md-8">
                       <div class="form-group row">
                       <div class="col-md-4">
                       <label for="validationCustom01" class=" col-form-label"><h4>Proof Details :</h4> </label>
                           
                       </div>
                         </div>
              </div>
              <div class="col-md-12">
                <table class="table">
                  <thead>
                    <th> S.no </th>
                    <th> Proof Name</th>
                    <th> Proof Number</th>
                    <th> Upload </th>
                    <th> Files </th>
                    <th>Action </th>
                  </thead>
                  <tbody class="append_proof_details">
@foreach($agent_proof_details as $key=>$proof_value)

                    <tr>
                      <td><span class="s_no"> {{ $key+1}} </span>
                        <input type="hidden" name="proof_details_id[]" value={{$proof_value->id}}>
                      </td>
                      <td>
                        <div class="form-group row">
                          <div class="col-sm-12">
                          <input type="text" class="form-control old_proof_name  required_for_proof_valid" error-data="Enter valid Postal Code" placeholder="Proof Name" name="old_proof_name[]" value="{{ old('old_proof_name.'.$key,$proof_value->name) }}" >
                            <span class="mandatory"> {{ $errors->first('old_proof_name.'.$key)  }} </span>
                            <div class="invalid-feedback">
                              Enter valid Proof Name
                            </div>
                          </div>
                        </div>
                      </td>
                   <td>
                            <div class="form-group row">
                              <div class="col-sm-12">
                              <input type="text" class="form-control old_proof_number only_allow_alp_num_dot_com_amp required_for_proof_valid" error-data="Enter valid Postal Code" placeholder="Proof Number" name="old_proof_number[]" value="{{ old('old_proof_number.'.$key,$proof_value->number) }}" >
                                <span class="mandatory"> {{ $errors->first('old_proof_number.'.$key)  }} </span>
                                <div class="invalid-feedback">
                                  Enter valid Proof Number
                                </div>
                              </div>
                            </div>
                          </td>

                          <td>
                              <div class="form-group row">
                                <div class="col-sm-12">
                                <input type="file" class="form-control old_proof_file only_allow_digit  required_for_proof_valid" error-data="Enter valid Postal Code" placeholder="Proof Name" name="old_proof_file[]" value="" >
                                  <span class="mandatory"> {{ $errors->first('old_proof_file.'.$key)  }} </span>
                                  <div class="invalid-feedback">
                                    Enter valid Proof file
                                  </div>
                                </div>
                                
                              </div>
                            </td>
                            <td>
                                <a href="{{asset('storage/agent_proof_details/'.$proof_value->file)}}" download><img src="{{asset('storage/agent_proof_details/'.$proof_value->file)}}" class="img-fluid" style="max-width:60px;" alt="logo" /></a>
                            </td>

                            <td>
                                <div class="form-group row">
                                    <div class="col-sm-3">
                                    <label class="btn btn-success add_proof_details">+</label>
                                    </div>
                                    <div class="col-sm-3 mx-2">
                                    <label class="btn btn-danger perment_proof_details" attr-id="{{$proof_value->id}}">-</label>
                                      </div>
                                  </div>
                            </td>

                    </tr>
                    @endforeach

                    @if (old('proof_name'))
            @foreach (old('proof_name') as $key=>$value)
           
            <tr>
                <td><span class="s_no"> 1 </span></td>
                <td>
                  <div class="form-group row">
                    <div class="col-sm-12">
                    <input type="text" class="form-control proof_name required_for_proof_valid" error-data="Enter valid Postal Code" placeholder="Proof Name" name="proof_name[]" value="{{ old('proof_name.'.$key) }}" >
                       <span class="mandatory"> {{ $errors->first('proof_name.'.$key)  }} </span>
                      <div class="invalid-feedback">
                        Enter valid Proof Name
                      </div>
                    </div>
                  </div>
                </td>
             <td>
                      <div class="form-group row">
                        <div class="col-sm-12">
                        <input type="text" class="form-control proof_number  required_for_proof_valid" error-data="Enter valid Postal Code" placeholder="Proof Number" name="proof_number[]" value="{{ old('proof_number.'.$key) }}" >
                          <span class="mandatory"> {{ $errors->first('proof_number.'.$key)  }} </span>
                          <div class="invalid-feedback">
                            Enter valid Proof Number
                          </div>
                        </div>
                      </div>
                    </td>

                    <td>
                        <div class="form-group row">
                          <div class="col-sm-12">
                          <input type="file" class="form-control proof_file   required_for_proof_valid" error-data="Enter valid Postal Code" placeholder="Proof Name" name="proof_file[]" value="{{ old('proof_file.'.$key) }}" >
                            <span class="mandatory"> {{ $errors->first('proof_file.'.$key)  }} </span>
                            <div class="invalid-feedback">
                              Enter valid Proof file
                            </div>
                          </div>
                        </div>
                      </td>

                      <td>
                          <div class="form-group row">
                              <div class="col-sm-3">
                              <label class="btn btn-success add_proof_details">+</label>
                              </div>
                              <div class="col-sm-3 mx-2">
                                <label class="btn btn-danger remove_proof_details">-</label>
                                </div>
                            </div>
                      </td>

                     

              </tr>
            
            @endforeach
            @endif
                  </tbody>

                </table>

              </div>


                       </div>






<div class="col-md-7 text-right">
          <button class="btn btn-success submit" type="button">Submit</button>
        </div>
      </form>
    </div>
    <script src="{{asset('assets/js/master/capitalize.js')}}"></script>
    <!-- card body end@ -->
  </div>
</div>

<script>
$(document).on("click",".refresh_state_id",function(){
   var state_dets=refresh_state_master_details();
   $(this).closest(".address_div").find(".state_id").html(state_dets);
   $(this).closest(".address_div").find(".district_id").html("<option value=''>Choose District</option>");
   $(this).closest(".address_div").find(".city_id").html("<option value=''>Choose City</option>");
});

function checkname()
  {
    var name = $('.name').val();
    $.ajax({
        type: "POST",
        url: "{{ url('master/agent/checkname/')}}",
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
                      url: "{{ url('master/agent/delete-agent-proof-details')}}",
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


  

$(document).on("blur change",".required_for_valid,.required_for_proof_valid",function(){
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

   function proof_details_validation(){
  
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
    var proof_details_count=proof_details_validation();
    var common_error_count=parseInt(error_count)+parseInt(address_error_count)+parseInt(proof_details_count);

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
                  url: "{{ url('common/get-state-based-district')}}",
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
      if($(this).val() !=""){
        var $tr=$(this).closest(".address_div");
        $tr.find(".city_id").html("<option value=''>Choose City</option>");
        var state_id=$tr.find(".new_state_id").val();
        var district_id=$tr.find(".new_district_id").val();
        $.ajax({
                  type: "post",
                  url: "{{ url('common/get-state-based-district')}}",
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
                      url: "{{ url('common/get-district-based-city')}}",
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
                      url: "{{ url('common/get-district-based-city')}}",
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
 });

 $(document).on("change",".district_id",function(){
        var $tr=$(this).closest(".address_div");
       
          var district_id=$(this).val();
         if(district_id !="" ){
           $.ajax({
                      type: "post",
                      url: "{{ url('common/get-district-based-city')}}",
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
                      url: "{{ url('common/get-state-based-district')}}",
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
                  @foreach($address_type as $value)\
                  <option value="{{ $value->id }}" >{{ $value->name }}</option>\
                  @endforeach\
                </select>\
               <div class="invalid-feedback">\
                  Enter valid Address Type\
                </div>\
              </div>\
              <a href="{{ url("master/state/create")}}" target="_blank">\
                  <button type="button"  class="px-2 btn btn-success ml-2 " title="Add State"><i class="fa fa-plus-circle" aria-hidden="true"></i></button></a>\
                 <button type="button"  class="px-2 btn btn-success mx-2 refresh_state_id" title="Refresh"><i class="fa fa-refresh" aria-hidden="true"></i></button>\
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
                  @foreach($state as $value)\
                  <option value="{{ $value->id }}" >{{ $value->name }}</option>\
                  @endforeach\
                </select>\
              <div class="invalid-feedback">\
                  Enter valid State \
                </div>\
              </div>\
              <a href="{{ url("master/state/create")}}" target="_blank">\
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
              <a href="{{ url("master/district/create")}}" target="_blank">\
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
              <a href="{{ url("master/city/create")}}" target="_blank">\
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
                      url: "{{ url('master/agent/delete-agent-address-details')}}",
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



 $(document).ready(function(){
    set_sno_for_proof_details();
  });

  function set_sno_for_proof_details(){
    $(".s_no").each(function(key,index){
      $(this).html((key+1));
    });
  }

  /* Add Proof Details Start Here */
  $(document).on("click",".add_proof_details",function(){

    var proof_details='<tr>\
                      <td><span class="s_no"> 1 </span></td>\
                      <td>\
                        <div class="form-group row">\
                          <div class="col-sm-12">\
                          <input type="text" class="form-control proof_name  required_for_proof_valid" error-data="Enter valid Postal Code" placeholder="Proof Name" name="proof_name[]" value="" >\
                           <div class="invalid-feedback">\
                              Enter valid Proof Name\
                            </div>\
                          </div>\
                        </div>\
                      </td>\
                       <td>\
                            <div class="form-group row">\
                              <div class="col-sm-12">\
                              <input type="text" class="form-control proof_number only_allow_digit  required_for_proof_valid" error-data="Enter valid Postal Code" placeholder="Proof Number" name="proof_number[]" value="" >\
                               <div class="invalid-feedback">\
                                  Enter valid Proof Number\
                                </div>\
                              </div>\
                            </div>\
                          </td>\
                            <td>\
                              <div class="form-group row">\
                                <div class="col-sm-12">\
                                <input type="file" class="form-control proof_file  required_for_proof_valid" error-data="Enter valid Postal Code" placeholder="Proof Name" name="proof_file[]" value="" >\
                                  <div class="invalid-feedback">\
                                    Enter valid Proof file\
                                  </div>\
                                </div>\
                              </div>\
                            </td><td></td>\
 <td>\
                                <div class="form-group row">\
                                    <div class="col-sm-3">\
                                    <label class="btn btn-success add_proof_details">+</label>\
                                    </div>\
                                    <div class="col-sm-3 mx-2">\
                                      <label class="btn btn-danger remove_proof_details">-</label>\
                                      </div>\
                                  </div>\
                            </td>\
                          </tr>';

    $(".append_proof_details").append(proof_details);
    set_sno_for_proof_details();

  });
  /* Add Proof Details End Here */
  /* Remove Proof Details Start Here */
  $(document).on("click",".remove_proof_details",function(){
    $(this).closest("tr").remove();
    set_sno_for_proof_details();
  });
  /* Remove Proof Details End Here */











</script>

@endsection