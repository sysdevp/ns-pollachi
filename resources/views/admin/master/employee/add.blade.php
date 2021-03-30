@extends('admin.layout.app')
@section('content')
<?php
use App\Mandatoryfields;
?>
<main class="page-content">

<div class="col-12 body-sec">
  <div class="card container px-0">
    <!-- card header start@ -->
    <div class="card-header px-2">
      <div class="row">
        <div class="col-4">
          <h3>Add Employee</h3>
        </div>
        <div class="col-8 mr-auto">
          <ul class="h-right-btn mb-0 pl-0">
            <li><button type="button" class="btn btn-success"><a href="{{url('master/employee')}}">Back</a></button></li>
          </ul>
        </div>
      </div>
    </div>
    <!-- card header end@ -->
    <div class="card-body">
    
      <form  method="post" class="form-horizontal needs-validation" 
      novalidate action="{{url('master/employee/store')}}" enctype="multipart/form-data">
      {{csrf_field()}}


     
        <div class="form-row">
         <div class="col-md-8">
          <h4>Professional details:</h4>
          </div>
          <div class="col-md-6">
             <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Employee Name <?php echo Mandatoryfields::mandatory('employee_name');?></label>
              <div class="col-sm-8">
            <div class="input-group">
            <div class="input-group-prepend">
              <select class="form-control required_for_valid salutation" name="salutation" error-data="Enter valid Salutation" tabindex="1" autofocus>
                  <option value="Mr" {{ old('salutation') == 'Mr' ? 'selected' : '' }}>Mr</option>
                  <option value="Mrs" {{ old('salutation') == 'Mrs' ? 'selected' : '' }} >Mrs</option>
              </select>
              <span class="mandatory"> {{ $errors->first('salutation')  }} </span>
            </div>
            <input type="text" class="form-control only_allow_alp_numeric name caps" name="name" error-data="Employee Name Field is required" aria-label="Text input with dropdown button" value="{{old('name')}}" <?php echo Mandatoryfields::validation('employee_name');?> tabindex="2">
            
            <div class="invalid-feedback">
              Enter valid Employee Name
            </div>
            
          </div>
          <span class="mandatory"> {{ $errors->first('name')  }} </span>
          <span class="mandatory"> {{ $errors->first('salutation')  }} </span>
          </div>
          </div>

          </div>
       <div class="col-md-6">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Employee Code <?php echo Mandatoryfields::mandatory('employee_code');?></label>
              <div class="col-sm-8">
                <input type="text" class="form-control code only_allow_alp_numeric " error-data="Enter valid Employee Code" placeholder="Employee Code" name="code" value="{{old('code')}}" <?php echo Mandatoryfields::validation('employee_code');?> tabindex="3">
                <span class="mandatory"> {{ $errors->first('code')  }} </span>
                <div class="invalid-feedback">
                  Enter valid Employee Code
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Phone No <?php echo Mandatoryfields::mandatory('employee_phoneno');?></label>
              <div class="col-sm-8">
                <input type="text" class="form-control only_allow_digit phone_no " input-type="phone_no" pattern="[1-9]{1}[0-9]{9}" error-data="Enter valid Phone No" placeholder="Phone No" name="phone_no" value="{{old('phone_no')}}" <?php echo Mandatoryfields::validation('employee_phoneno');?> tabindex="4">
                <span class="mandatory"> {{ $errors->first('phone_no')  }} </span>
                <div class="invalid-feedback">
                  Enter valid Phone No
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Email <?php echo Mandatoryfields::mandatory('employee_email');?></label>
              <div class="col-sm-8">
                <input type="email" class="form-control email" input-type="email" error_data="Enter valid Email" placeholder="Email" name="email" value="{{old('email')}}" <?php echo Mandatoryfields::validation('employee_email');?> tabindex="5">
                <span class="mandatory"> {{ $errors->first('email')  }} </span>
                <div class="invalid-feedback">
                  Enter valid Email
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">DOB <?php echo Mandatoryfields::mandatory('employee_dob');?></label>
              <div class="col-sm-8">
                <input type="text" class="form-control dob " error-data="Enter valid DOB" placeholder="dd-mm-yyyy" name="dob" value="{{old('dob')}}" <?php echo Mandatoryfields::validation('employee_dob');?> tabindex="6">
                <span class="mandatory"> {{ $errors->first('dob')  }} </span>
                <div class="invalid-feedback">
                  Enter valid DOB
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Department <?php echo Mandatoryfields::mandatory('employee_departmentid');?></label>
              <div class="col-sm-6">
                <select class="js-example-basic-multiple col-12 form-control custom-select department_id " 
              error-data="Enter valid Department" data-placeholder="Choose Department" name="department_id" <?php echo Mandatoryfields::validation('employee_departmentid');?> tabindex="7">
                <option value="">Choose Department</option>
                  @foreach($department as $value)
                  <option value="{{ $value->id}}" {{ old('department_id') == $value->id  ? 'selected' : '' }}>{{$value->name}}</option>
                  @endforeach
               </select>
                <span class="mandatory"> {{ $errors->first('department_id')  }} </span>
                <div class="invalid-feedback">
                  Enter valid Department
                </div>
              </div>
              <a href="{{ url('master/department/create')}}" target="_blank">
                <button type="button"  class="px-2 btn btn-success ml-2 " title="Add Department"><i class="fa fa-plus-circle" aria-hidden="true"></i></button></a>
               <button type="button"  class="px-2 btn btn-success mx-2 refresh_department_id" title="Refresh"><i class="fa fa-refresh" aria-hidden="true"></i></button>
       
            </div>
          </div>
 </div>
 <div class="form-row">
 <div class="col-md-8">
          <h4>Personal Details :</h4>
          </div>

          <div class="col-md-6">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Father's Name <?php echo Mandatoryfields::mandatory('employee_fathername');?></label>
              <div class="col-sm-8">
                <input type="text" class="form-control father_name only_allow_alp_numeric  caps" error-data="Enter valid Father's Name" placeholder="Father's Name" name="father_name" value="{{old('father_name')}}" <?php echo Mandatoryfields::validation('employee_fathername');?> tabindex="8">
                <span class="mandatory"> {{ $errors->first('father_name')  }} </span>
                <div class="invalid-feedback">
                  Enter valid Father's Name
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Blood Group <?php echo Mandatoryfields::mandatory('employee_bloodgroup');?></label>
              <div class="col-sm-8">
                <input type="text" class="form-control blood_group " error-data="Enter valid Blood Group" placeholder="Blood Group" name="blood_group" value="{{old('blood_group')}}" <?php echo Mandatoryfields::validation('employee_bloodgroup');?> tabindex="9">
                <span class="mandatory"> {{ $errors->first('blood_group')  }} </span>
                <div class="invalid-feedback">
                  Enter valid Blood Group
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Material Status <?php echo Mandatoryfields::mandatory('employee_materialstatus');?></label>
              <div class="col-sm-8">
              <select class="js-example-basic-multiple col-12 form-control material_status select custom-select " 
              error-data="Enter valid Material Status" data-placeholder="Choose Material " name="material_status" <?php echo Mandatoryfields::validation('employee_materialstatus');?> tabindex="10">
              <option value=""></option>
                 <option value="Married"  {{ old('material_status') == 'Married' ? 'selected' : '' }}>Married</option>
                  <option value="Single" {{ old('material_status') == 'Single' ? 'selected' : '' }}>Single</option>
                  <option value="Divorced" {{ old('material_status') == 'Divorced' ? 'selected' : '' }}>Divorced</option> 
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
              <label for="validationCustom01" class="col-sm-4 col-form-label">Photo <?php echo Mandatoryfields::mandatory('employee_profile');?></label>
              <div class="col-sm-8">
                <input type="file" class="form-control profile " placeholder="Father's Name" name="profile" value="{{old('profile')}}" <?php echo Mandatoryfields::validation('employee_profile');?> tabindex="11">
                <button type="button" id="cus-btn">CHOOSE A FILE</button>
                <span class="mandatory"> {{ $errors->first('profile')  }} </span>
                <div class="invalid-feedback">
                  Enter valid profile
                </div>  
              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Access No <?php echo Mandatoryfields::mandatory('employee_accessno');?></label>
              <div class="col-sm-8">
                <input type="text" class="form-control access_no only_allow_alp_numeric " error-data="Enter valid Access No" placeholder="Access No" name="access_no" value="{{old('access_no')}}" <?php echo Mandatoryfields::validation('employee_accessno');?> tabindex="12">
                <span class="mandatory"> {{ $errors->first('access_no')  }} </span>
                <div class="invalid-feedback">
                  Enter valid Access No
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
              <button type="button" class="btn-sm btn-success add_address" tabindex="13">Add Address</button>  
          </div>
            </div>
 </div>
          
          </div>
          <div class="common_address_div">
            
            
          
              @if (old('address_line_1'))
                
              @foreach (old('address_line_1') as $key=>$item)
            
                            <div class="form-row address_div">
      <div class="col-md-7">
        <div class="form-group row">
        <div class="col-md-7">
        <h3 class="address_label"></h3>
        </div>
        <div class="col-md-4">
        <h3 class="address_delete_label"><button type="button" class="btn btn-danger remove_address" tabindex="14"> Delete </button></h3>
            </div>
        </div>
        </div>



                <div class="col-md-6">
              <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Address Type <?php echo Mandatoryfields::mandatory('employee_addresstypeid');?></label>
                <div class="col-sm-6">
                <select class="js-example-basic-multiple col-12 form-control custom-select address_type_id " error-data="Enter valid Address Type" name="address_type_id[]" <?php echo Mandatoryfields::validation('employee_addresstypeid');?> >
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
                <label for="validationCustom01" class="col-sm-4 col-form-label">Address Line 1 <?php echo Mandatoryfields::mandatory('employee_addressline1');?></label>
                <div class="col-sm-8">
                <input type="text" class="form-control address_line_1" error-data="Enter valid Address" placeholder="Address Line 1" name="address_line_1[]" value="{{ old('address_line_1.'.$key) }}" <?php echo Mandatoryfields::validation('employee_addressline1');?> tabindex="16">
                  <span class="mandatory"> {{ $errors->first('address_line_1.'.$key)  }} </span>
                  <div class="invalid-feedback">
                  Enter valid Address
                  </div>
                </div>
              </div>
            </div>
  <div class="col-md-6">
              <div class="form-group row">
                <label for="validationCustom01" class="col-sm-4 col-form-label">Address Line 2 <?php echo Mandatoryfields::mandatory('employee_addressline2');?></label>
                <div class="col-sm-8">
                  <input type="text" class="form-control address_line_2" placeholder="Address Line 2" name="address_line_2[]" value="{{ old('address_line_2.'.$key) }}" <?php echo Mandatoryfields::validation('employee_addressline2');?> tabindex="17">
                  <span class="mandatory"> {{ $errors->first('address_line_2.'.$key)  }} </span>
                  <div class="invalid-feedback">
                  Enter valid Address
                  </div>
                </div>
              </div>
            </div>
    <div class="col-md-6">
              <div class="form-group row">
                <label for="land_mark" class="col-sm-4 col-form-label">Land Mark <?php echo Mandatoryfields::mandatory('employee_landmark');?></label>
                <div class="col-sm-8">
                  <input type="text" class="form-control land_mark" placeholder="Land Mark" name="land_mark[]" value="{{ old('land_mark.'.$key) }}" <?php echo Mandatoryfields::validation('employee_landmark');?> tabindex="18">
                  <span class="mandatory"> {{ $errors->first('land_mark.'.$key)  }} </span>
                  <div class="invalid-feedback">
                  Enter valid Land Mark
                  </div>
                </div>
              </div>
            </div>
            <!-- Old Values For Dropdown Start Here  -->
          <input type="hidden" class="form-control old_state_id" value="{{ old('state_id.'.$key)}}">
          <input type="hidden" class="form-control old_district_id" value="{{ old('district_id.'.$key)}}">
          <input type="hidden" class="form-control old_city_id" value="{{ old('city_id.'.$key)}}">
            <!-- Old Values For Dropdown End Here  -->
  <div class="col-md-6">
              <div class="form-group row">
                <label for="validationCustom01" class="col-sm-4 col-form-label">State <?php echo Mandatoryfields::mandatory('employee_stateid');?></label>
                <div class="col-sm-6">
                  <select class="js-example-basic-multiple col-12 form-control custom-select state_id" error-data="Enter valid State" name="state_id[]" <?php echo Mandatoryfields::validation('employee_stateid');?> tabindex="19">
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
                <label for="validationCustom01" class="col-sm-4 col-form-label">District <?php echo Mandatoryfields::mandatory('employee_districtid');?></label>
                <div class="col-sm-6">
                  <select class="js-example-basic-multiple col-12 form-control custom-select district_id" name="district_id[]" <?php echo Mandatoryfields::validation('employee_districtid');?> tabindex="20">
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
                <label for="validationCustom01" class="col-sm-4 col-form-label">City <?php echo Mandatoryfields::mandatory('employee_cityid');?></label>
                <div class="col-sm-6">
                  <select class="js-example-basic-multiple col-12 form-control custom-select city_id" name="city_id[]" <?php echo Mandatoryfields::validation('employee_cityid');?> tabindex="21">
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
                <label for="land_mark" class="col-sm-4 col-form-label">Postal Code <?php echo Mandatoryfields::mandatory('employee_postalcode');?></label>
                <div class="col-sm-8">
                <input type="text" class="form-control postal_code only_allow_digit" error-data="Enter valid Postal Code" placeholder="Postal Code" name="postal_code[]" value="{{ old('postal_code.'.$key) }}" <?php echo Mandatoryfields::validation('employee_postalcode');?> tabindex="22">
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
                    <th> Files </th>
                    <th>Action </th>
                  </thead>
                  <tbody class="append_proof_details">
                    <tr>
                      <td><span class="s_no"> 1 </span></td>
                      <td>
                        <div class="form-group row">
                          <div class="col-sm-12">
                          <input type="text" class="form-control proof_name required_for_proof_valid" error-data="Enter valid Postal Code" placeholder="Proof Name" name="proof_name[]" value="{{ old('proof_name.0') }}" <?php echo Mandatoryfields::validation('employee_proofname');?> tabindex="23">
                            <span class="mandatory"> {{ $errors->first('proof_name.0')  }} </span>
                            <div class="invalid-feedback">
                              Enter valid Proof Name
                            </div>
                          </div>
                        </div>
                      </td>
                   <td>
                            <div class="form-group row">
                              <div class="col-sm-12">
                              <input type="text" class="form-control proof_number only_allow_digit required_for_proof_valid" error-data="Enter valid Postal Code" placeholder="Proof Number" name="proof_number[]" value="{{ old('proof_number.0') }}" <?php echo Mandatoryfields::validation('employee_proofnumber');?> tabindex="24">
                                <span class="mandatory"> {{ $errors->first('proof_number.0')  }} </span>
                                <div class="invalid-feedback">
                                  Enter valid Proof Number
                                </div>
                              </div>
                            </div>
                          </td>

                          <td>
                              <div class="form-group row">
                                <div class="col-sm-12">
                                <input type="file" class="form-control proof_file  required_for_proof_valid" error-data="Enter valid Postal Code" placeholder="Proof Name" name="proof_file[]" value="{{ old('proof_file.0') }}" <?php echo Mandatoryfields::validation('employee_file');?> tabindex="25">
                                  <span class="mandatory"> {{ $errors->first('proof_file.0')  }} </span>
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
                                    <div class="col-sm-3">
                                      <label class="btn btn-danger remove_proof_details">-</label>
                                      </div>
                                  </div>
                            </td>

                    </tr>

                    @if (old('proof_name'))
            @foreach (old('proof_name') as $key=>$value)
            @if($key > 0)
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
                        <input type="text" class="form-control proof_number  only_allow_digit required_for_proof_valid" error-data="Enter valid Postal Code" placeholder="Proof Number" name="proof_number[]" value="{{ old('proof_number.'.$key) }}" >
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
                          <input type="file" class="form-control proof_file  required_for_proof_valid" error-data="Enter valid Postal Code" placeholder="Proof Name" name="proof_file[]" value="{{ old('proof_file.'.$key) }}" >
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
                              <div class="col-sm-3">
                                <label class="btn btn-danger remove_proof_details">-</label>
                                </div>
                            </div>
                      </td>

              </tr>
              @endif
            @endforeach
            @endif
                  </tbody>

                </table>

              </div>


                       </div>

        <div class="col-md-7 text-right">
          <button class="btn btn-success submit" name="add" type="button" tabindex="26">Submit</button>
        </div>
      </form>
    </div>
    <script src="{{asset('assets/js/master/capitalize.js')}}"></script>
    <!-- card body end@ -->
  </div>
</div>
</div>
<div style="clear:both;"></div>

<script type="text/javascript">

  $(document).on("keyup",".name",function() {
  var string = $( this).val();
  var Capitalized = string.replace(/\w\S*/g, function(txt){return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();});
  $(this).val(Capitalized);

});

  $(document).on("keyup",".proof_name",function() {
  var string = $( this).val();
  var Capitalized = string.replace(/\w\S*/g, function(txt){return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();});
  $(this).val(Capitalized);

  });

  $(document).on("keyup",".father_name",function() {
  var string = $( this).val();
  var Capitalized = string.replace(/\w\S*/g, function(txt){return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();});
  $(this).val(Capitalized);

  });

  $(document).on('input','.blood_group ',function(){

    $(this).val($(this).val().replace(/[^a-zA-Z+]/gi, ''));
    if ($(this).val().replace(/[^+]/g, "").length > 1)
    {
    $(this).val(''); 
    }
    else
    {

    }

  });

  $(document).on('input','.proof_name ',function(){

    $(this).val($(this).val().replace(/[^a-zA-Z ]/gi, ''));

  });

$(document).on("click",".refresh_state_id",function(){
   var state_dets=refresh_state_master_details();
   $(this).closest(".address_div").find(".state_id").html(state_dets);
   $(this).closest(".address_div").find(".district_id").html("<option value=''>Choose District</option>");
   $(this).closest(".address_div").find(".city_id").html("<option value=''>Choose City</option>");
});

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

$(document).on("click",".refresh_department_id",function(){
   var department_dets=refresh_department_master_details();
  $(".department_id").html(department_dets);
});

$(document).on("click",".refresh_address_type_id",function(){
   var address_type_dets=refresh_address_type_master_details();
   $(this).closest(".address_div").find(".address_type_id").html(address_type_dets);
  
});

function proof_details_validation()
{
  
  var error_count=0;
  $(".required_for_proof_valid").each(function(){
   $(this).removeClass("is-invalid");
      if($(this).val() !="")
      {
        $(this).removeClass("is-invalid");
        $(this).addClass("is-valid");
      }else
      {
        error_count++;
        $(this).removeClass("is-valid");
        $(this).addClass("is-invalid");
      }
  });
  return error_count;
}

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
    var validation_count=proof_details_validation();
    if(validation_count == 0)
    {
        var proof_details='<tr>\
                      <td><span class="s_no"> 1 </span></td>\
                      <td>\
                        <div class="form-group row">\
                          <div class="col-sm-12">\
                          <input type="text" class="form-control proof_name  required_for_proof_valid" error-data="Enter valid Postal Code" placeholder="Proof Name" name="proof_name[]" value="" <?php echo Mandatoryfields::validation('employee_proofname');?>>\
                           <div class="invalid-feedback">\
                              Enter valid Proof Name\
                            </div>\
                          </div>\
                        </div>\
                      </td>\
                       <td>\
                            <div class="form-group row">\
                              <div class="col-sm-12">\
                              <input type="text" class="form-control proof_number only_allow_digit required_for_proof_valid" error-data="Enter valid Postal Code" placeholder="Proof Number" name="proof_number[]" value="" <?php echo Mandatoryfields::validation('employee_proofnumber');?>>\
                               <div class="invalid-feedback">\
                                  Enter valid Proof Number\
                                </div>\
                              </div>\
                            </div>\
                          </td>\
                            <td>\
                              <div class="form-group row">\
                                <div class="col-sm-12">\
                                <input type="file" class="form-control proof_file   required_for_proof_valid" error-data="Enter valid Postal Code" placeholder="Proof Name" name="proof_file[]" value="" <?php echo Mandatoryfields::validation('employee_file');?>>\
                                  <div class="invalid-feedback">\
                                    Enter valid Proof file\
                                  </div>\
                                </div>\
                              </div>\
                            </td>\
                            <td>\
                                <div class="form-group row">\
                                    <div class="col-sm-3">\
                                    <label class="btn btn-success add_proof_details">+</label>\
                                    </div>\
                                    <div class="col-sm-3">\
                                      <label class="btn btn-danger remove_proof_details">-</label>\
                                      </div>\
                                  </div>\
                            </td>\
                          </tr>';

    $(".append_proof_details").append(proof_details);
    set_sno_for_proof_details();
                        }

  });
  /* Add Proof Details End Here */
  /* Remove Proof Details Start Here */
  $(document).on("click",".remove_proof_details",function(){
    if($(".remove_proof_details").length > 1){
      $(this).closest("tr").remove();
    set_sno_for_proof_details();
    }else{
      alert("Atleast One Row Present");
    }
    
  });
  /* Remove Proof Details End Here */

$(document).on("click",".remove_address",function(){
if($(".remove_address").length >1){
  $(this).closest(".address_div").remove();
  $(".address_label").each(function(key,index){
  $(this).html("Address Details - " + (key+1));
  });

}else{
  alert("Atleast One Row Present ");
}
  
});

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
                    <h3 class="address_delete_label"><button type="button" class="btn btn-danger remove_address" tabindex="15"> Delete </button></h3>\
                        </div>\
                    </div>\
                    </div>\
                <div class="col-md-6">\
              <div class="form-group row">\
                <label for="validationCustom01" class="col-sm-4 col-form-label">Address Type <?php echo Mandatoryfields::mandatory('employee_addresstypeid');?></label>\
                <div class="col-sm-6">\
                  <select class="js-example-basic-multiple col-12 form-control custom-select address_type_id" error-data="Enter valid Address Type" name="address_type_id[]" <?php echo Mandatoryfields::validation('employee_addresstypeid');?> tabindex="16">\
                    <option value="">Choose Address Type</option>\
                    @foreach($address_type as $value)\
                    <option value="{{ $value->id }}" >{{ $value->name }}</option>\
                    @endforeach\
                  </select>\
                 <div class="invalid-feedback">\
                    Enter valid Address Type\
                  </div>\
                </div>\
                <a href="{{ url("master/address-type/create")}}" target="_blank">\
                <button type="button"  class="px-2 btn btn-success ml-2 " title="Add Address Type"><i class="fa fa-plus-circle" aria-hidden="true"></i></button></a>\
               <button type="button"  class="px-2 btn btn-success mx-2 refresh_address_type_id" title="Refresh"><i class="fa fa-refresh" aria-hidden="true"></i></button>\
            </div>\
            </div>\
      <div class="col-md-6">\
              <div class="form-group row">\
                <label for="validationCustom01" class="col-sm-4 col-form-label">Address Line 1 <?php echo Mandatoryfields::mandatory('employee_addressline1');?></label>\
                <div class="col-sm-8">\
                  <input type="text" class="form-control address_line_1" error-data="Enter valid Address" placeholder="Address Line 1" name="address_line_1[]" value="" <?php echo Mandatoryfields::validation('employee_addressline1');?> tabindex="17">\
                 <div class="invalid-feedback">\
                  Enter valid Address\
                  </div>\
                </div>\
              </div>\
            </div>\
  <div class="col-md-6">\
              <div class="form-group row">\
                <label for="validationCustom01" class="col-sm-4 col-form-label">Address Line 2 <?php echo Mandatoryfields::mandatory('employee_addressline2');?></label>\
                <div class="col-sm-8">\
                  <input type="text" class="form-control address_line_2" placeholder="Address Line 2" name="address_line_2[]" value="" <?php echo Mandatoryfields::validation('employee_addressline2');?> tabindex="18">\
                  <div class="invalid-feedback">\
                  Enter valid Address\
                  </div>\
                </div>\
              </div>\
            </div>\
    <div class="col-md-6">\
              <div class="form-group row">\
                <label for="land_mark" class="col-sm-4 col-form-label">Land Mark <?php echo Mandatoryfields::mandatory('employee_landmark');?></label>\
                <div class="col-sm-8">\
                  <input type="text" class="form-control land_mark" placeholder="Land Mark" name="land_mark[]" value="" <?php echo Mandatoryfields::validation('employee_landmark');?> tabindex="19">\
                 <div class="invalid-feedback">\
                  Enter valid Land Mark\
                  </div>\
                </div>\
              </div>\
            </div>\
  <div class="col-md-6">\
              <div class="form-group row">\
                <label for="validationCustom01" class="col-sm-4 col-form-label">State <?php echo Mandatoryfields::mandatory('employee_stateid');?></label>\
                <div class="col-sm-6">\
                  <select class="js-example-basic-multiple col-12 form-control custom-select state_id" error-data="Enter valid State" name="state_id[]" <?php echo Mandatoryfields::validation('employee_stateid');?> tabindex="20">\
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
                <button type="button"  class="px-2 btn btn-success ml-2 " title="Add state"><i class="fa fa-plus-circle" aria-hidden="true"></i></button></a>\
               <button type="button"  class="px-2 btn btn-success mx-2 refresh_state_id" title="Refresh"><i class="fa fa-refresh" aria-hidden="true"></i></button>\
              </div>\
            </div>\
  <div class="col-md-6">\
              <div class="form-group row">\
                <label for="validationCustom01" class="col-sm-4 col-form-label">District <?php echo Mandatoryfields::mandatory('employee_districtid');?></label>\
                <div class="col-sm-6">\
                  <select class="js-example-basic-multiple col-12 form-control custom-select district_id" name="district_id[]" <?php echo Mandatoryfields::validation('employee_districtid');?> tabindex="21">\
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
                <label for="validationCustom01" class="col-sm-4 col-form-label">City <?php echo Mandatoryfields::mandatory('employee_cityid');?></label>\
                <div class="col-sm-6">\
                  <select class="js-example-basic-multiple col-12 form-control custom-select city_id" name="city_id[]" <?php echo Mandatoryfields::validation('employee_cityid');?> tabindex="22">\
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
                <label for="land_mark" class="col-sm-4 col-form-label">Postal Code <?php echo Mandatoryfields::mandatory('employee_postalcode');?></label>\
                <div class="col-sm-8">\
                  <input type="text" class="form-control only_allow_digit postal_code  " error-data="Enter valid Postal Code" placeholder="Postal Code" name="postal_code[]" value="" <?php echo Mandatoryfields::validation('employee_postalcode');?> tabindex="23">\
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
  
  
  function state_based_district(){
    
    
  
  $(".state_id").each(function(key,index){
    
      var $tr=$(this).closest(".address_div");
      $tr.find(".city_id").html("<option value=''>Choose City</option>");
     var state_id=$tr.find(".old_state_id").val();
    var district_id=$tr.find(".old_district_id").val();
   $.ajax({
                type: "post",
                url: "{{ url('common/get-state-based-district')}}",
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
                url: "{{ url('common/get-district-based-city')}}",
                data: {district_id: district_id,city_id:city_id},
                success: function (res)
                {
                  result = JSON.parse(res);
                  $tr.find(".city_id").html(result.option);
                }
            });
  });
  
  }
  
  
  $(document).ready(function(){
    state_based_district();
    district_based_city();
  });
  
  
  
  
    $(document).on("change",".state_id",function(){
     var $tr=$(this).closest(".address_div");
     var state_id=$(this).val();
     $tr.find(".city_id").html("<option value=''>Choose City</option>");
      $.ajax({
                type: "post",
                url: "{{ url('common/get-state-based-district')}}",
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
                url: "{{ url('common/get-district-based-city')}}",
                data: {district_id: district_id},
                success: function (res)
                {
                  result = JSON.parse(res);
                  $tr.find(".city_id").html(result.option);
                }
            });
  
  
      
    });
  
    $('.phone_no').change(function(){
      var no = $(this).val();
      
      if(no.length != 10){
         return false
      }
    });
  
  </script>

@endsection


