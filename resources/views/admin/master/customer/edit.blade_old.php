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
<h3> <u>Professional details :</u> </h3>
</div>
<div class="col-md-8">
  <div class="form-group row">
    <label for="validationCustom01" class="col-sm-4 col-form-label">Agent Name <span class="mandatory">*</span></label>
    <div class="col-sm-2">
    <select class="js-example-basic-multiple col-12 custom-select salutation" placeholder="Choose Salutation" name="salutation" required>
        <option value="">Choose Salutation</option>
        <option value="Mr" {{ old('salutation' ,$agent->salutation) == 'Mr' ? 'selected' : '' }}>Mr</option>
        <option value="Mrs" {{ old('salutation',$agent->salutation) == 'Mrs' ? 'selected' : '' }} >Mrs</option>
      </select>
      <span class="mandatory"> {{ $errors->first('salutation')  }} </span>
      <div class="invalid-feedback">
      Salutation field is required
      </div>
    </div>
    <div class="col-sm-6">
      <input type="text" class="form-control name only_allow_alp_num_dot_com_amp" placeholder="Agent Name" name="name" value="{{old('name',$agent->name)}}" required>
      <span class="mandatory"> {{ $errors->first('name')  }} </span>
      <div class="invalid-feedback">
        Enter valid Agent Name
      </div>
    </div>
  </div>
</div>



<div class="col-md-6">
  <div class="form-group row">
    <label for="validationCustom01" class="col-sm-4 col-form-label">Agent Code <span class="mandatory">*</span></label>
    <div class="col-sm-8">
      <input type="text" class="form-control code only_allow_alp_num_dot_com_amp" placeholder="Agent Code" name="code" value="{{old('code',$agent->code)}}" required>
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
      <input type="text" class="form-control phone_no " placeholder="Phone No" name="phone_no" value="{{old('phone_no',$agent->phone_no)}}" required>
      <span class="mandatory"> {{ $errors->first('phone_no')  }} </span>
      <div class="invalid-feedback">
        Enter valid Phone No
      </div>
    </div>
  </div>
</div>

<div class="col-md-6">
  <div class="form-group row">
    <label for="validationCustom01" class="col-sm-4 col-form-label">Email <span class="mandatory">*</span></label>
    <div class="col-sm-8">
      <input type="text" class="form-control email" placeholder="Email" name="email" value="{{old('email',$agent->email)}}" required>
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
      
      <input type="text" class="form-control dob" placeholder="dd-mm-yyyy" name="dob" value="{{old('dob',$agent->dob)}}" required>
      <span class="mandatory"> {{ $errors->first('dob')  }} </span>
      <div class="invalid-feedback">
        Enter valid DOB
      </div>
    </div>
  </div>
</div>


</div>
<div class="row">
<div class="col-md-8">
<h3> <u>Personal Details :</u> </h3>
</div>

<div class="col-md-6">
  <div class="form-group row">
    <label for="validationCustom01" class="col-sm-4 col-form-label">Father's Name <span class="mandatory">*</span></label>
    <div class="col-sm-8">
      <input type="text" class="form-control father_name" placeholder="Father's Name" name="father_name" value="{{old('father_name',$agent->father_name)}}">
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
      <input type="text" class="form-control blood_group" placeholder="Blood Group" name="blood_group" value="{{old('blood_group',$agent->blood_group)}}" >
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
    <select class="js-example-basic-multiple col-12 custom-select material_status" placeholder="Choose Material Status" name="material_status" >
        <option value="">Choose Material Status</option>
        <option value="Married"  {{ old('material_status','Married') == 'Married' ? 'selected' : '' }}>Married</option>
        <option value="Single" {{ old('material_status','Single') == 'Single' ? 'selected' : '' }}>Single</option>
        <option value="Divorced" {{ old('material_status','Divorced') == 'Divorced' ? 'selected' : '' }}>Divorced</option>
       
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
      <input type="file" class="form-control profile" placeholder="Father's Name" name="profile" value="{{old('profile')}}" >
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
    <div class="common_address_div">
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
                    <div class="col-sm-8">
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
                      <input type="text" class="form-control land_mark" placeholder="Land Mark" name="old_land_mark[]" value="{{ old('old_land_mark.'.$key,$values->land_mark) }}">
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
                    <div class="col-sm-8">
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
                  </div>
                </div>
      <div class="col-md-6">
                  <div class="form-group row">
                    <label for="validationCustom01" class="col-sm-4 col-form-label">District </label>
                    <div class="col-sm-8">
                      <select class="js-example-basic-multiple col-12 form-control custom-select district_id old_district_id" name="old_district_id[]">
                        <option value="">Choose District</option>
                        </select>
                       <span class="mandatory"> {{ $errors->first('old_district_id.'.$key)  }} </span>
                       <div class="invalid-feedback">
                        Enter valid District
                      </div>
                    </div>
                  </div>
                </div>
                 <div class="col-md-6">
                  <div class="form-group row">
                    <label for="validationCustom01" class="col-sm-4 col-form-label">City </label>
                    <div class="col-sm-8">
                      <select class="js-example-basic-multiple col-12 form-control custom-select city_id old_city_id" name="old_city_id[]" >
                        <option value="">Choose City</option>
                      </select>
                      <span class="mandatory"> {{ $errors->first('old_city_id.'.$key)  }} </span>
                     <div class="invalid-feedback">
                        Enter valid City
                      </div>
                    </div>
                  </div>
                </div>
       <div class="col-md-6">
                  <div class="form-group row">
                    <label for="land_mark" class="col-sm-4 col-form-label">Postal Code <span class="mandatory">*</span></label>
                    <div class="col-sm-8">
                    <input type="text" class="form-control old_postal_code required_for_valid required_for_address_valid" error-data="Enter valid Postal Code" placeholder="Postal Code" name="old_postal_code[]" value="{{ old('old_postal_code.'.$key,$values->postal_code) }}" >
                      <span class="mandatory"> {{ $errors->first('old_postal_code.'.$key)  }} </span>
                      <div class="invalid-feedback">
                        Enter valid Postal Code
                      </div>
                    </div>
                  </div>
                </div>
                </div><hr>
      @endforeach

      @if (old('address_line_1'))
                
              @foreach (old('address_line_1') as $key=>$item)
            
                            <div class="form-row address_div">
      <div class="col-md-8">
      <h3 class="address_label"></h3>
      </div>
                <div class="col-md-6">
              <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Address Type <span class="mandatory">*</span></label>
                <div class="col-sm-8">
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
          <input type="hidden" class="form-control new_old_state_id" value="{{ old('state_id.'.$key)}}">
          <input type="hidden" class="form-control new_old_district_id" value="{{ old('district_id.'.$key)}}">
          <input type="hidden" class="form-control new_old_city_id" value="{{ old('city_id.'.$key)}}">
            <!-- Old Values For Dropdown End Here  -->
  <div class="col-md-6">
              <div class="form-group row">
                <label for="validationCustom01" class="col-sm-4 col-form-label">State <span class="mandatory">*</span></label>
                <div class="col-sm-8">
                  <select class="js-example-basic-multiple col-12 form-control custom-select state_id new_state_id required_for_valid required_for_address_valid" error-data="Enter valid State" name="state_id[]" >
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
              </div>
            </div>
  <div class="col-md-6">
              <div class="form-group row">
                <label for="validationCustom01" class="col-sm-4 col-form-label">District </label>
                <div class="col-sm-8">
                  <select class="js-example-basic-multiple col-12 form-control custom-select new_district_id district_id" name="district_id[]">
                    <option value="">Choose District</option>
                    </select>
                   <span class="mandatory"> {{ $errors->first('district_id.'.$key)  }} </span>
                   <div class="invalid-feedback">
                    Enter valid District
                  </div>
                </div>
              </div>
            </div>
             <div class="col-md-6">
              <div class="form-group row">
                <label for="validationCustom01" class="col-sm-4 col-form-label">City </label>
                <div class="col-sm-8">
                  <select class="js-example-basic-multiple col-12 form-control custom-select new_city_id city_id" name="city_id[]" >
                    <option value="">Choose City</option>
                  </select>
                  <span class="mandatory"> {{ $errors->first('city_id.'.$key)  }} </span>
                 <div class="invalid-feedback">
                    Enter valid City
                  </div>
                </div>
              </div>
            </div>
   <div class="col-md-6">
              <div class="form-group row">
                <label for="land_mark" class="col-sm-4 col-form-label">Postal Code <span class="mandatory">*</span></label>
                <div class="col-sm-8">
                <input type="text" class="form-control postal_code required_for_valid required_for_address_valid" error-data="Enter valid Postal Code" placeholder="Postal Code" name="postal_code[]" value="{{ old('postal_code.'.$key) }}" >
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
             
             </div>
        <div class="col-md-7 text-right">
          <button class="btn btn-success" type="submit">Submit</button>
        </div>
      </form>
    </div>
    <!-- card body end@ -->
  </div>
</div>

<script>
  
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
              <div class="col-sm-8">\
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
              <div class="col-sm-8">\
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
            </div>\
          </div>\
<div class="col-md-6">\
            <div class="form-group row">\
              <label for="validationCustom01" class="col-sm-4 col-form-label">District </label>\
              <div class="col-sm-8">\
                <select class="js-example-basic-multiple col-12 form-control custom-select district_id" name="district_id[]">\
                  <option value="">Choose District</option>\
                 </select>\
                 <div class="invalid-feedback">\
                  Enter valid District\
                </div>\
              </div>\
            </div>\
          </div>\
           <div class="col-md-6">\
            <div class="form-group row">\
              <label for="validationCustom01" class="col-sm-4 col-form-label">City </label>\
              <div class="col-sm-8">\
                <select class="js-example-basic-multiple col-12 form-control custom-select city_id" name="city_id[]" >\
                  <option value="">Choose City</option>\
                </select>\
               <div class="invalid-feedback">\
                  Enter valid City\
                </div>\
              </div>\
            </div>\
          </div>\
 <div class="col-md-6">\
            <div class="form-group row">\
              <label for="land_mark" class="col-sm-4 col-form-label">Postal Code <span class="mandatory">*</span></label>\
              <div class="col-sm-8">\
                <input type="text" class="form-control postal_code required_for_valid required_for_address_valid" error-data="Enter valid Postal Code" placeholder="Postal Code" name="postal_code[]" value="" >\
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
                      url: "{{ url('master/agent/delete-employee-address-details')}}",
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










</script>

@endsection