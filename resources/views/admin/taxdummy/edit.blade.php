@extends('admin.layout.app')
@section('content')
<main class="page-content">

<div class="col-12 body-sec">
  <div class="card container px-0">
    <!-- card header start@ -->
    <div class="card-header px-2">
      <div class="row">
        <div class="col-4">
          <h3>Edit Item</h3>
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
    
      <form  method="post" class="form-horizontal needs-validation" novalidate action="{{url('master/item/update/'.$item->id)}}" enctype="multipart/form-data">
      {{csrf_field()}}

      <div class="form-row">
        <div class="col-md-6">
          <div class="form-group row">
            <label for="validationCustom01" class="col-sm-4 col-form-label">Item Name <span class="mandatory">*</span></label>
            <div class="col-sm-8">
              <input type="text" class="form-control name only_allow_alp_num_dot_com_amp" placeholder="Item Name" name="name" value="{{old('name',$item->name)}}" required>
              <span class="mandatory"> {{ $errors->first('name')  }} </span>
              <div class="invalid-feedback">
                Enter valid Item Name
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-6">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Item Code <span class="mandatory">*</span></label>
              <div class="col-sm-8">
                <input type="text" class="form-control code only_allow_alp_num_dot_com_amp" placeholder="Item Code" name="code" value="{{old('code',$item->code)}}" required>
                <span class="mandatory"> {{ $errors->first('code')  }} </span>
                <div class="invalid-feedback">
                  Enter valid Item Code
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-6">
              <div class="form-group row">
                <label for="validationCustom01" class="col-sm-4 col-form-label">{{ $category_1}} <span class="mandatory">*</span></label>
                <div class="col-sm-8">
                  <select class="js-example-basic-multiple col-12 form-control custom-select category_1" name="category_1" required>
                    <option value="">Choose {{ $category_1}}</option>
                    @foreach ($category_one as $value)
                    <option value="{{ $value->id }}" {{ old('category_1',$item->category_1) == $value->id ? 'selected' : '' }}  >{{ $value->name }}</option>
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
                    <label for="validationCustom01" class="col-sm-4 col-form-label"> {{$category_3}} </label>
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
                      <label for="validationCustom01" class="col-sm-4 col-form-label">Print Name in English <span class="mandatory">*</span></label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control print_name_in_english only_allow_alp_num_dot_com_amp" placeholder="Print Name in English " name="print_name_in_english" value="{{old('print_name_in_english',$item->print_name_in_english)}}" required>
                        <span class="mandatory"> {{ $errors->first('print_name_in_english')  }} </span>
                        <div class="invalid-feedback">
                          Enter valid Print Name in English 
                        </div>
                      </div>
                    </div>
                  </div>
                 
                  

                  <div class="col-md-6">
                      <div class="form-group row">
                      <label for="validationCustom01" class="col-sm-4 col-form-label">Print Name in {{$language_1}}</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control print_name_in_language_1 only_allow_alp_num_dot_com_amp" placeholder="Print Name in {{ $language_1 }}" name="print_name_in_language_1" value="{{old('print_name_in_language_1',$item->print_name_in_language_1)}}" required>
                          <span class="mandatory"> {{ $errors->first('print_name_in_language_1')  }} </span>
                          <div class="invalid-feedback">
                            Enter valid Print Name in {{ $language_1 }}
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group row">
                          <label for="validationCustom01" class="col-sm-4 col-form-label">Print Name in {{$language_2}} </label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control print_name_in_language_2 only_allow_alp_num_dot_com_amp" placeholder="Print Name in {{ $language_2 }}" name="print_name_in_language_2" value="{{old('print_name_in_language_2',$item->print_name_in_language_2)}}" required>
                            <span class="mandatory"> {{ $errors->first('print_name_in_language_2')  }} </span>
                            <div class="invalid-feedback">
                              Enter valid Print Name in {{ $language_2 }}
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-6">
                          <div class="form-group row">
                            <label for="validationCustom01" class="col-sm-4 col-form-label">Print Name in {{$language_3}} </label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control print_name_in_language_3 only_allow_alp_num_dot_com_amp" placeholder="Print Name in {{ $language_3 }}" name="print_name_in_language_3" value="{{old('print_name_in_language_3',$item->print_name_in_language_3)}}" required>
                              <span class="mandatory"> {{ $errors->first('print_name_in_language_3')  }} </span>
                              <div class="invalid-feedback">
                                Enter valid Print Name in {{ $language_3 }}
                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group row">
                              <label for="validationCustom01" class="col-sm-4 col-form-label">PTC Code <span class="mandatory">*</span></label>
                              <div class="col-sm-8">
                                <input type="text" class="form-control ptc only_allow_alp_num_dot_com_amp" placeholder="PTC Code" name="ptc" value="{{old('ptc',$item->ptc)}}" required>
                                <span class="mandatory"> {{ $errors->first('ptc')  }} </span>
                                <div class="invalid-feedback">
                                  Enter valid PTC Code 
                                </div>
                              </div>
                            </div>
                          </div>

                          <div class="col-md-6">
                              <div class="form-group row">
                                <label for="validationCustom01" class="col-sm-4 col-form-label">EAN Code <span class="mandatory">*</span></label>
                                <div class="col-sm-8">
                                  <input type="text" class="form-control ean only_allow_alp_num_dot_com_amp" placeholder="EAN Code" name="ean" value="{{old('ean',$item->ean)}}" required>
                                  <span class="mandatory"> {{ $errors->first('ean')  }} </span>
                                  <div class="invalid-feedback">
                                    Enter valid EAN Code 
                                  </div>
                                </div>
                              </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group row">
                                  <label for="validationCustom01" class="col-sm-4 col-form-label">MRP <span class="mandatory">*</span></label>
                                  <div class="col-sm-8">
                                    <input type="text" class="form-control only_allow_digit_and_dot mrp only_allow_alp_num_dot_com_amp" placeholder="MRP" name="mrp" value="{{old('mrp',$item->mrp)}}" required>
                                    <span class="mandatory"> {{ $errors->first('mrp')  }} </span>
                                    <div class="invalid-feedback">
                                      Enter valid MRP 
                                    </div>
                                  </div>
                                </div>
                              </div>

                              <div class="col-md-6">
                                  <div class="form-group row">
                                    <label for="validationCustom01" class="col-sm-4 col-form-label">Default Selling Price <span class="mandatory">*</span></label>
                                    <div class="col-sm-8">
                                      <input type="text" class="form-control only_allow_digit_and_dot default_selling_price only_allow_alp_num_dot_com_amp" placeholder="Default Selling Price" name="default_selling_price" value="{{old('default_selling_price',$item->default_selling_price)}}" required>
                                      <span class="mandatory"> {{ $errors->first('default_selling_price')  }} </span>
                                      <div class="invalid-feedback">
                                        Enter valid Default Selling Price 
                                      </div>
                                    </div>
                                  </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group row">
                                      <label for="validationCustom01" class="col-sm-4 col-form-label">UOM <span class="mandatory">*</span></label>
                                      <div class="col-sm-8">
                                        <select class="js-example-basic-multiple col-12 form-control custom-select uom_id" name="uom_id" required>
                                          <option value="">Choose UOM</option>
                                          @foreach ($uom as $value)
                                          <option value="{{ $value->id }}" {{ old('uom_id',$item->uom_id) == $value->id ? 'selected' : '' }}  >{{ $value->name }}</option>
                                          @endforeach
                                        </select>
                                        <span class="mandatory"> {{ $errors->first('uom_id')}} </span>
                                       <div class="invalid-feedback">
                                          Enter valid UOM
                                        </div>
                                      </div>
                                    </div>
                                  </div>


                                  <div class="col-md-6">
                                      <div class="form-group row">
                                        <label for="validationCustom01" class="col-sm-4 col-form-label">Is Expiry Date Applicable <span class="mandatory">*</span></label>
                                        <div class="col-sm-8">
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                  <input type="radio" class="form-check-input is_expiry_date" value ="1" {{ old('is_expiry_date',$item->is_expiry_date) == 1 ? 'checked' : '' }}  name="is_expiry_date">Yes
                                                </label>
                                              </div>

                                              <div class="form-check">
                                                  <label class="form-check-label">
                                                    <input type="radio" class="form-check-input is_expiry_date" value ="0" {{ old('is_expiry_date',$item->is_expiry_date) == 0 ? 'checked' : '' }}  name="is_expiry_date">No
                                                  </label>
                                                </div>
                                          
                                          <span class="mandatory"> {{ $errors->first('uom_id')}} </span>
                                         <div class="invalid-feedback">
                                            Enter valid UOM
                                          </div>
                                        </div>
                                      </div>
                                    </div>

                                    <div class="col-md-6 expiry_date_div" style="display: none">

                                      @php
                                      $expiry_date="";
                                          if(old('expiry_date') !=""){
                                            $expiry_date=date('d-m-Y',strtotime(old('expiry_date')));
                                          }else if($item->expiry_date !=""){
                                            $expiry_date=date('d-m-Y',strtotime($item->expiry_date));
                                          }
                                      @endphp
                                        <div class="form-group row">
                                          <label for="validationCustom01" class="col-sm-4 col-form-label">Expiry Date <span class="mandatory">*</span></label>
                                          <div class="col-sm-8">
                                            <input type="text" class="form-control expiry_date" placeholder="Expiry Date" name="expiry_date" value="{{old('expiry_date',$expiry_date)}}">
                                            <span class="mandatory"> {{ $errors->first('expiry_date')  }} </span>
                                            <div class="invalid-feedback">
                                              Enter valid Expiry Date 
                                            </div>
                                          </div>
                                        </div>
                                      </div>

                                      <div class="col-md-6">
                                          <div class="form-group row">
                                            <label for="validationCustom01" class="col-sm-4 col-form-label">Product Image </label>
                                            <div class="col-sm-8">
                                              <input type="file" class="form-control image" placeholder="Product Image" name="image" value="{{old('image')}}">
                                              <span class="mandatory"> {{ $errors->first('image')  }} </span>
                                              <div class="invalid-feedback">
                                                Enter valid Product Image 
                                              </div>
                                            </div>
                                          </div>
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
                 //$(".category_3").html("<option value=''>Choose Category 3</option>");
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
   is_expiry_date="{{ $item->is_expiry_date }}";
   if(old_expiry_date != ""){
     is_expiry_date=old_expiry_date;
   }
   
   if(is_expiry_date == 1){
     $(".expiry_date_div").css("display","block");
   }else{
     $(".expiry_date_div").css("display","none");
   }

   /* Category Based Subcategory Ajax Start Here */
   var category_1="";
   var category_2="";
   var category_3="";

   var new_category_1=$(".category_1").val();
   var new_category_2="{{ $item->category_2}}";
   var new_category_3="{{ $item->category_3}}";
   var old_category_1="{{ old('category_1') }}";
   var old_category_2="{{ old('category_2') }}";
   var old_category_3="{{ old('category_3') }}";

   category_1=old_category_1 !="" ? old_category_1 : new_category_1;
   category_2=old_category_2 !="" ? old_category_2 : new_category_2;
   category_3=old_category_3 !="" ? old_category_3 : new_category_3;
if(category_1 !=""){
  get_category_one_based_category_two(category_1,category_2);
}

if(category_2 !=""){
  get_category_two_based_category_three(category_2,category_3);
}
  
  


   /* Category Based Subcategory Ajax End Here */

});






 </script>

@endsection