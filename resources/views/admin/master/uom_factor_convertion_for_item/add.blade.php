@extends('admin.layout.app')
@section('content')
<main class="page-content">
<div class="container-fuild" style="background:#28a745">
				<div class="text-right pr-3">sdfjsdfjl</div>
		</div>
<div class="col-12 body-sec">
  <div class="card container-fluid px-0">
    <!-- card header start@ -->
    <div class="card-header px-2">
      <div class="row">
        <div class="col-4">
          <h3>Add Item</h3>
        </div>
        <div class="col-8 mr-auto">
          <ul class="h-right-btn mb-0 pl-0">
            <li><button type="button" class="btn btn-success"><a href="{{url('master/item')}}">Back</a></button></li>
          </ul>
        </div>
      </div>
    </div>
    <!-- card header end@ -->
    <div class="card-body">
    
      <form  method="post" class="form-horizontal needs-validation" novalidate action="{{url('master/item/store')}}" enctype="multipart/form-data">
      {{csrf_field()}}

        <div class="form-row">
          <div class="col-md-6">
                <div class="form-group row">
                  <label for="validationCustom01" class="col-sm-4 col-form-label">{{ $category_1}} <span class="mandatory">*</span></label>
                  <div class="col-sm-8">
                    <select class="js-example-basic-multiple col-12 form-control custom-select category_1" name="category_1" required>
                      <option value="">Choose {{ $category_1}}</option>
                      @foreach ($category_one as $value)
                      <option value="{{ $value->id }}" {{ old('category_1') == $value->id ? 'selected' : '' }}  >{{ $value->name }}</option>
                      @endforeach
                    </select>
                    <span class="mandatory"> {{ $errors->first('category_1')  }} </span>
                   <div class="invalid-feedback">
                      Enter valid {{ $category_1}}
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-md-6">
                  <div class="form-group row">
                    <label for="validationCustom01" class="col-sm-4 col-form-label">{{$category_2}} </label>
                    <div class="col-sm-8">
                      <select class="js-example-basic-multiple col-12 form-control custom-select category_2" name="category_2" >
                        <option value="">Choose {{$category_2}}</option>
                      </select>
                      <span class="mandatory"> {{ $errors->first('category_2')  }} </span>
                     <div class="invalid-feedback">
                        Enter valid {{$category_2}}
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group row">
                      <label for="validationCustom01" class="col-sm-4 col-form-label">{{$category_3}} </label>
                      <div class="col-sm-8">
                        <select class="js-example-basic-multiple col-12 form-control custom-select category_3" name="category_3" >
                          <option value="">Choose {{$category_3}}</option>
                        </select>
                        <span class="mandatory"> {{ $errors->first('category_3')  }} </span>
                       <div class="invalid-feedback">
                          Enter valid {{$category_3}}
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group row">
                      <label for="validationCustom01" class="col-sm-4 col-form-label"> Item <span class="mandatory">*</span></label>
                      <div class="col-sm-8">
                        <select class="js-example-basic-multiple col-12 form-control custom-select item_id" name="item_id" required>
                          <option value="">Choose Item</option>
                          @foreach ($item as $value)
                          <option value="{{ $value->id }}" {{ old('item_id') == $value->id ? 'selected' : '' }}  >{{ $value->name }}</option>
                          @endforeach
                        </select>
                        <span class="mandatory"> {{ $errors->first('item_id')  }} </span>
                       <div class="invalid-feedback">
                          Enter valid Item
                        </div>
                      </div>
                    </div>
                  </div>                                      
 </div>

 <div class="form-row single_view">
  <div class="col-md-12">
  <h4 class="mb-4"> Uom Factor Convertion :</h4>
  </div>
</div>


<div class="form-row">
    <div class="col-md-12">
  <table class="table">
      <thead class="table">
        <th> S.no </th>
        <th> Uom </th>
        <th> Convertion Factor </th>
        </thead>
      <tbody class="append_row">
      
       
      </tbody>
  </table>
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
 function get_category_one_based_category_two(category_one_id,category_two_id)
{
  $.ajax({
              type: "post",
              url: "{{ url('common/get-category-one-based-category-two')}}",
              data: {category_one_id: category_one_id, category_two_id:category_two_id},
              success: function (res)
              {
                result = JSON.parse(res);
                $(".category_2").html(result.option);
                $(".category_3").html("<option value=''>Choose Category 3</option>");
              }
          });

}

function get_category_two_based_category_three(category_two_id,category_three_id)
{
  $.ajax({
              type: "post",
              url: "{{ url('common/get-category-two-based-category-three')}}",
              data: {category_two_id: category_two_id, category_three_id:category_three_id},
              success: function (res)
              {
                result = JSON.parse(res);
                $(".category_3").html(result.option);
              }
          });

}

$(document).on("change",".category_1",function(){
  if($(this).val() != ""){
    get_category_one_based_category_two($(this).val(),category_two_id ="");
  }
  
});

$(document).on("change",".category_2",function(){
  if($(this).val() != ""){
    get_category_two_based_category_three($(this).val(),category_three_id ="");
  }
  
});

$(document).on("click",".is_expiry_date",function(){
  var is_expiry_date=$(".is_expiry_date:checked").val();
  console.log("is_expiry_date == " + is_expiry_date);
  if(is_expiry_date == 1){
    $(".expiry_date_div").css("display","block");
  }else{
    $(".expiry_date_div").css("display","none");
  }
});

$(document).ready(function(){
  var old_expiry_date="{{ old('is_expiry_date')}}";
  var is_expiry_date="";
  is_expiry_date=$(".is_expiry_date :checked").val();
  if(old_expiry_date != ""){
    is_expiry_date=old_expiry_date;
  }
  
  if(is_expiry_date == 1){
    $(".expiry_date_div").css("display","block");
  }else{
    $(".expiry_date_div").css("display","none");
  }
});
</script>


@endsection

