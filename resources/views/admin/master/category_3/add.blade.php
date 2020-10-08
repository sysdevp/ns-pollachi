@extends('admin.layout.app')
@section('content')
<div class="col-12 body-sec">
  <div class="card container px-0">
    <!-- card header start@ -->
    <div class="card-header px-2">
      <div class="row">
        <div class="col-4">
          <h3>Add Category - 3</h3>
        </div>
        <div class="col-8 mr-auto">
          <ul class="h-right-btn mb-0 pl-0">
            <li><button type="button" class="btn btn-success"><a href="{{url('master/category-three')}}">Back</a></button></li>
          </ul>
        </div>
      </div>
    </div>
    <!-- card header end@ -->
    <div class="card-body">
    
      <form  method="post" class="form-horizontal needs-validation" novalidate action="{{url('master/category-three/store')}}" enctype="multipart/form-data">
      {{csrf_field()}}

        <div class="form-row">

            <div class="col-md-7">
                <div class="form-group row">
                <label for="validationCustom01" class="col-sm-4 col-form-label">Category 1 <span class="mandatory">*</span></label>
                  <div class="col-sm-8">
                  <select class="js-example-basic-multiple col-12 form-control custom-select category_one_id required_for_valid" error-data="Enter valid Category 1" name="category_one_id">
                      <option value="">Choose Category 1</option>
                      @foreach($category_one as $value)
                      <option value="{{ $value->id }}" {{ old('category_one_id') == $value->id ? 'selected' : '' }} >{{ $value->name }}</option>
                      @endforeach
                    </select>
                    <span class="mandatory"> {{ $errors->first('category_one_id')  }} </span>
                   <div class="invalid-feedback">
                      Enter valid Category 1
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-md-7">
                  <div class="form-group row">
                  <label for="validationCustom01" class="col-sm-4 col-form-label">Category 2 <span class="mandatory">*</span></label>
                    <div class="col-sm-8">
                    <select class="js-example-basic-multiple col-12 form-control custom-select category_two_id required_for_valid" error-data="Enter valid Category 2" name="category_two_id">
                        <option value="">Choose Category 2</option>
                      
                      </select>
                      <span class="mandatory"> {{ $errors->first('category_two_id')  }} </span>
                     <div class="invalid-feedback">
                        Enter valid Category 2
                      </div>
                    </div>
                  </div>
                </div>
          <div class="col-md-7">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Name<span class="mandatory">*</span></label>
              <div class="col-sm-8">
                <input type="text" class="form-control name only_allow_alp_num_dot_com_amp" placeholder="Name" name="name" value="{{old('name')}}" required>
                <span class="mandatory"> {{ $errors->first('name')  }} </span>
                <div class="invalid-feedback">
                  Enter valid Name
                </div>
              </div>
            </div>
          </div>
 <div class="col-md-7">
                <div class="form-group row">
                  <label for="validationCustom01" class="col-sm-4 col-form-label"> Remark </label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control remark only_allow_alp_num_dot_com_amp" placeholder="Remark" name="remark" value="{{old('remark')}}">
                    <span class="mandatory"> {{ $errors->first('remark')  }} </span>
                    <div class="invalid-feedback">
                      Enter valid Remark
                    </div>
                  </div>
                </div>
              </div>

          
          
          
         
          
        </div>
        <div class="col-md-7 text-right">
          <button class="btn btn-success" name="add" type="submit">Submit</button>
        </div>
      </form>
    </div>
    <!-- card body end@ -->
  </div>
</div>

<script>
$(document).on("change",".category_one_id",function()
{
  var category_one_id=$(".category_one_id").val();
  var category_two_id="{{ old('category_two_id')}}";

  
});

function get_category_one_based_category_two(category_one_id,category_two_id)
{
  $.ajax({
              type: "post",
              url: "{{ url('common/get-category-one-based-category-two')}}",
              data: {category_one_id: category_one_id, category_two_id:category_two_id},
              success: function (res)
              {
                result = JSON.parse(res);
                $(".category_two_id").html(result.option);
              }
          });

}

$(document).ready(function(){
  var category_one_id="{{ old('category_one_id') }}";
  var category_two_id="{{ old('category_two_id') }}"; 
 if(category_one_id != ""){
  get_category_one_based_category_two(category_one_id,category_two_id);
 }

});
$(document).on("change",".category_one_id",function(){
  var category_one_id=$(this).val();
  get_category_one_based_category_two(category_one_id,"");
});

function get_state_based_district(state_id,district_id)
{
$.ajax({
              type: "post",
              url: "{{ url('common/get-state-based-district')}}",
              data: {state_id: state_id, district_id:district_id},
              success: function (res)
              {
                result = JSON.parse(res);
                $(".district_id").html(result.option);
              }
          });

}



</script>
@endsection

