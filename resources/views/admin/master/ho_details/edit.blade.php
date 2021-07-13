@extends('admin.layout.app')
@section('content')
<main class="page-content">

<div class="col-12 body-sec">
  <div class="card container px-0">
    <!-- card header start@ -->
    <div class="card-header px-2">
      <div class="row">
        <div class="col-4">
          <h3>Edit Head Office Details</h3>
        </div>
        <div class="col-8 mr-auto">
          <ul class="h-right-btn mb-0 pl-0">
            <li><button type="button" class="btn btn-success"><a href="{{url('master/ho_details')}}">Back</a></button></li>
          </ul>
        </div>
      </div>
    </div>
    <!-- card header end@ -->
    <div class="card-body">
    
      <form  method="post" class="form-horizontal needs-validation" novalidate action="{{url('master/ho_details/update/'.$location->id)}}" enctype="multipart/form-data">
      {{csrf_field()}}

      <div class="form-row">
          <div class="col-md-6">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Location Name <span class="mandatory">*</span></label>
              <div class="col-sm-8">
                <input type="text" class="form-control name only_allow_alp_num_dot_com_amp caps" placeholder="Location Name" name="name" value="{{old('name',$location->name)}}" required tabindex="1" autofocus>
                <span class="mandatory"> {{ $errors->first('name')  }} </span>
                <div class="invalid-feedback">
                  Enter valid Location Name
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">GST Number <span class="mandatory">*</span></label>
              <div class="col-sm-8">
                <input type="text" class="form-control gst_number" style="text-transform: uppercase;" placeholder="GST Number" name="gst_number" value="{{old('name',$location->gst_number)}}" maxlength="15" required tabindex="2">
                <span class="mandatory"> {{ $errors->first('gst_number')  }} </span>
                <div class="invalid-feedback">
                  Enter valid GST Number
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Address Line 1 <span class="mandatory">*</span></label>
              <div class="col-sm-8">
                <input type="text" class="form-control address_line_1 caps" placeholder="Address Line 1" name="address_line_1" value="{{old('address_line_1',$location->address_line_1)}}" required tabindex="3">
                <span class="mandatory"> {{ $errors->first('address_line_1')  }} </span>
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
                <input type="text" class="form-control address_line_2 caps" placeholder="Address Line 2" name="address_line_2" value="{{old('address_line_2',$location->address_line_2)}}" tabindex="4">
                <span class="mandatory"> {{ $errors->first('address_line_2')  }} </span>
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
                <input type="text" class="form-control land_mark caps" placeholder="Land Mark" name="land_mark" value="{{old('land_mark',$location->land_mark)}}" tabindex="5">
                <span class="mandatory"> {{ $errors->first('land_mark')  }} </span>
                <div class="invalid-feedback">
                Enter valid Land Mark
                </div>
              </div>
            </div>
          </div>

          
          <div class="col-md-6">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">State <span class="mandatory">*</span></label>
              <div class="col-sm-6">
                <select class="js-example-basic-multiple form-control col-12 custom-select state_id" name="state_id" required tabindex="6">
                  <option value="">Choose State</option>
                  @foreach($state as $value)
                  <option value="{{ $value->id }}" {{ old('state_id',$location->state_id) == $value->id ? 'selected' : '' }}>{{ $value->name }}</option>
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
              <label for="validationCustom01" class="col-sm-4 col-form-label">District </label>
              <div class="col-sm-6">
                <select class="js-example-basic-multiple form-control col-12 custom-select district_id" name="district_id" tabindex="7">
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
              <label for="validationCustom01" class="col-sm-4 col-form-label">City </label>
              <div class="col-sm-6">
                <select class="js-example-basic-multiple form-control col-12 custom-select city_id" name="city_id" tabindex="8">
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
              <label for="land_mark" class="col-sm-4 col-form-label">Postal Code <span class="mandatory">*</span></label>
              <div class="col-sm-8">
                <input type="text" class="form-control only_allow_digit postal_code" maxlength="6" placeholder="Postal Code" name="postal_code" value="{{old('postal_code',$location->postal_code)}}" required tabindex="9">
                <span class="mandatory"> {{ $errors->first('postal_code')  }} </span>
                <div class="invalid-feedback">
                  Enter valid Postal Code
                </div>
              </div>
            </div>
          </div>

        </div>
        <div class="col-md-7 text-right">
          <button class="btn btn-success" type="submit" tabindex="10">Submit</button>
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
  var old_state_id="{{ old('state_id') }}";
  var old_district_id="{{ old('district_id') }}"; 
  var old_city_id="{{ old('city_id') }}"; 
  var new_state_id="{{ $location->state_id }}";
  var new_district_id="{{ $location->district_id }}";
  var new_city_id="{{ $location->city_id }}";
  var state_id="";
  var district_id="";
  var city_id="";

  if(old_state_id == ""){
  state_id =new_state_id;
  district_id=new_district_id;
  city_id=new_city_id;
}else{
  state_id =old_state_id;
  district_id=old_district_id;
  city_id=old_city_id;

}

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