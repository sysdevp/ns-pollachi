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
          <h3>Add Location</h3>
        </div>
        <div class="col-8 mr-auto">
          <ul class="h-right-btn mb-0 pl-0">
            <li><button type="button" class="btn btn-success"><a href="{{url('master/location')}}">Back</a></button></li>
          </ul>
        </div>
      </div>
    </div>
    <!-- card header end@ -->
    <div class="card-body">
    
      <form  method="post" class="form-horizontal needs-validation" novalidate action="{{url('master/location/store')}}" enctype="multipart/form-data">
      {{csrf_field()}}

        <div class="form-row">
          <div class="col-md-6">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Location Name <?php echo Mandatoryfields::mandatory('companylocation_name');?></label>
              <div class="col-sm-8">
                <input type="text" class="form-control name only_allow_alp_num_dot_com_amp caps" placeholder="Location Name" name="name" value="{{old('name')}}" <?php echo Mandatoryfields::validation('companylocation_name');?> tabindex="1" autofocus>
                <span class="mandatory"> {{ $errors->first('name')  }} </span>
                <div class="invalid-feedback">
                  Enter valid Location Name
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Location Type <?php echo Mandatoryfields::mandatory('companylocation_locationtypeid');?></label>
              <div class="col-sm-6">
                <select class="js-example-basic-multiple col-12 form-control custom-select location_type_id" name="location_type_id" <?php echo Mandatoryfields::validation('companylocation_locationtypeid');?> tabindex="2">
                  <option value="">Choose Location Type</option>
                  @foreach($location_type as $value)
                  <option value="{{ $value->id }}" {{ old('location_type_id') == $value->id ? 'selected' : '' }}>{{ $value->name }}</option>
                  @endforeach
                </select>
                <span class="mandatory"> {{ $errors->first('location_type_id')  }} </span>
                <div class="invalid-feedback">
                  Enter valid Location Type
                </div>
              </div>
              <a href="{{ url('master/location-type/create')}}" target="_blank">
                <button type="button"  class="px-2 btn btn-success ml-2" title="Add Location Type"><i class="fa fa-plus-circle" aria-hidden="true"></i></button></a>
               <button type="button"  class="px-2 btn btn-success mx-2 refresh_location_type_id" title="Refresh"><i class="fa fa-refresh" aria-hidden="true"></i></button>
          
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Address Line 1 <?php echo Mandatoryfields::mandatory('companylocation_addressline1');?></label>
              <div class="col-sm-8">
                <input type="text" class="form-control address_line_1" placeholder="Address Line 1" name="address_line_1" value="{{old('address_line_1')}}" <?php echo Mandatoryfields::validation('companylocation_addressline1');?> tabindex="3">
                <span class="mandatory"> {{ $errors->first('address_line_1')  }} </span>
                <div class="invalid-feedback">
                Enter valid Address
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Address Line 2 <?php echo Mandatoryfields::mandatory('companylocation_addressline2');?></label>
              <div class="col-sm-8">
                <input type="text" class="form-control address_line_2" placeholder="Address Line 2" name="address_line_2" value="{{old('address_line_2')}}" <?php echo Mandatoryfields::validation('companylocation_addressline2');?> tabindex="4">
                <span class="mandatory"> {{ $errors->first('address_line_2')  }} </span>
                <div class="invalid-feedback">
                Enter valid Address
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group row">
              <label for="land_mark" class="col-sm-4 col-form-label">Land Mark <?php echo Mandatoryfields::mandatory('companylocation_landmark');?></label>
              <div class="col-sm-8">
                <input type="text" class="form-control land_mark" placeholder="Land Mark" name="land_mark" value="{{old('land_mark')}}" <?php echo Mandatoryfields::validation('companylocation_landmark');?> tabindex="5">
                <span class="mandatory"> {{ $errors->first('land_mark')  }} </span>
                <div class="invalid-feedback">
                Enter valid Land Mark
                </div>
              </div>
            </div>
          </div>

          
          <div class="col-md-6">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">State <?php echo Mandatoryfields::mandatory('companylocation_stateid');?></label>
              <div class="col-sm-6">
                <select class="js-example-basic-multiple form-control col-12 custom-select state_id" name="state_id" <?php echo Mandatoryfields::validation('companylocation_stateid');?> tabindex="6">
                  <option value="">Choose State</option>
                  @foreach($state as $value)
                  <option value="{{ $value->id }}" {{ old('state_id') == $value->id ? 'selected' : '' }}>{{ $value->name }}</option>
                  @endforeach
                </select>
                <span class="mandatory"> {{ $errors->first('state_id')  }} </span>
                <div class="invalid-feedback">
                  Enter valid State 
                </div>
              </div>
              <a href="{{ url('master/state/create')}}" target="_blank">
                <button type="button"  class="px-2 btn btn-success ml-2" title="Add State"><i class="fa fa-plus-circle" aria-hidden="true"></i></button></a>
               <button type="button"  class="px-2 btn btn-success mx-2 refresh_state_id" title="Refresh"><i class="fa fa-refresh" aria-hidden="true"></i></button>
          
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">District <?php echo Mandatoryfields::mandatory('companylocation_districtid');?></label>
              <div class="col-sm-6">
                <select class="js-example-basic-multiple col-12 custom-select district_id" name="district_id" <?php echo Mandatoryfields::validation('companylocation_districtid');?> tabindex="7">
                  <option value="">Choose District</option>
                  
                </select>
                <span class="mandatory"> {{ $errors->first('district_id')  }} </span>
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
              <label for="validationCustom01" class="col-sm-4 col-form-label">City <?php echo Mandatoryfields::mandatory('companylocation_cityid');?></label>
              <div class="col-sm-6">
                <select class="js-example-basic-multiple col-12 custom-select city_id" name="city_id" <?php echo Mandatoryfields::validation('companylocation_cityid');?> tabindex="8">
                  <option value="">Choose City</option>
                 </select>
                <span class="mandatory"> {{ $errors->first('city_id')  }} </span>
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
              <label for="land_mark" class="col-sm-4 col-form-label">Postal Code <?php echo Mandatoryfields::mandatory('companylocation_postalcode');?></label>
              <div class="col-sm-8">
                <input type="text" class="form-control only_allow_digit postal_code" placeholder="Postal Code" name="postal_code" value="{{old('postal_code')}}" <?php echo Mandatoryfields::validation('companylocation_postalcode');?> tabindex="9">
                <span class="mandatory"> {{ $errors->first('postal_code')  }} </span>
                <div class="invalid-feedback">
                  Enter valid Postal Code
                </div>
              </div>
            </div>
          </div>

        </div>
        <div class="col-md-7 text-right">
          <button class="btn btn-success" name="add" type="submit" tabindex="10">Submit</button>
        </div>
      </form>
    </div>
    <script src="{{asset('assets/js/master/capitalize.js')}}"></script>
    <!-- card body end@ -->
  </div>
</div>
<script>

  $(document).on('input','.name',function(){

  $(this).val($(this).val().replace(/[^a-zA-Z ]/gi, ''));

  });

$(document).on("click",".refresh_state_id",function(){
   var state_dets=refresh_state_master_details();
  $(".state_id").html(state_dets);
  $(".district_id").html("<option value=''>Choose District</option>");
  $(".city_id").html("<option value=''>Choose City</option>");
});

$(document).on("click",".refresh_location_type_id",function(){
  var location_type_dets=refresh_location_type_master_details();
  $(".location_type_id").html(location_type_dets);
});

$(document).on("click",".refresh_district_id",function(){
  var state_id=$(".state_id").val();
  if(state_id !="")
  {
    var district_dets=refresh_district_master_details(state_id);
    $(".district_id").html(district_dets);
    $(".city_id").html("<option value=''>Choose City</option>");
  }
 });

 $(document).on("click",".refresh_city_id",function(){
  var state_id=$(".state_id").val();
  var district_id=$(".district_id").val();
  if(state_id !="" && district_id !="")
  {
    var city_dets=refresh_city_master_details(state_id,district_id);
    $(".city_id").html(city_dets);
  }
 });

function get_state_based_district(state_id,district_id)
{
  $.ajax({
              type: "post",
              url: "{{ url('common/get-state-based-district')}}",
              data: {state_id: state_id,district_id:district_id},
              success: function (res)
              {
                result = JSON.parse(res);
                $(".district_id").html(result.option);
              }
          });

}

function get_district_based_city(district_id,city_id)
{
  $.ajax({
              type: "post",
              url: "{{ url('common/get-district-based-city')}}",
              data: {district_id: district_id,city_id:city_id},
              success: function (res)
              {
                result = JSON.parse(res);
                $(".city_id").html(result.option);
              }
          });

}

$(document).ready(function(){
  var state_id="{{ old('state_id') }}";
  var district_id="{{ old('district_id') }}"; 
  var city_id="{{ old('city_id') }}"; 
 if(state_id != ""){
  get_state_based_district(state_id,district_id);
 }
 if(district_id !=""){
  get_district_based_city(district_id,city_id);
 }

});


  $(document).on("change",".state_id",function(){
    var state_id=$(this).val();
    $(".city_id").html("<option value=''>Choose City</option>");
    get_state_based_district(state_id,"");
    
  });



  $(document).on("change",".district_id",function(){
    var district_id=$(this).val();
    get_district_based_city(district_id,"");
  });


  </script>

@endsection

