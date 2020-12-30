@extends('admin.layout.app')
@section('content')
<main class="page-content">
<div class="container-fuild" style="background:#28a745">
				<div class="text-right pr-3">sdfjsdfjl</div>
		</div>
<div class="col-12 body-sec">
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
              <label for="validationCustom01" class="col-sm-4 col-form-label"> Brand <span class="mandatory">*</span></label>
              <div class="col-sm-6">
                <select class="js-example-basic-multiple col-12 form-control custom-select brand_id" name="brand_id" required>
                  <option value="">Choose Brand</option>
                  <option value="0" {{ old('brand_id',$item->brand_id) == "0" ? 'selected' : '' }}> Not Applicable </option>
                  @foreach ($brand as $value)
                  <option value="{{ $value->id }}" {{ old('brand_id',$item->brand_id) == $value->id ? 'selected' : '' }}  >{{ $value->name }}</option>
                  @endforeach
                </select>
                <span class="mandatory"> {{ $errors->first('brand_id')  }} </span>
               <div class="invalid-feedback">
                  Enter valid Brand
                </div>
              </div>
              <a href="{{ url('master/brand/create')}}" target="_blank">
                <button type="button"  class="px-2 btn btn-success ml-2" title="Add Brand"><i class="fa fa-plus-circle" aria-hidden="true"></i></button></a>
                <button type="button"  class="px-2 btn btn-success mx-2 refresh_brand_id" title="Add Brand"><i class="fa fa-refresh" aria-hidden="true"></i></button>
          
            </div>
          </div>

                <div class="col-md-6">
                  <div class="form-group row">
                    <label for="validationCustom01" class="col-sm-4 col-form-label"> Category <span class="mandatory">*</span></label>
                    <div class="col-sm-6">
                      <select class="js-example-basic-multiple col-12 form-control custom-select category_id" name="category_id" required>
                        <option value="">Choose Category</option>
                        @foreach ($category as $value)
                        <option value="{{ $value->id }}" {{ old('category_id',$item->category_id) == $value->id ? 'selected' : '' }}  >{{ $value->name }}</option>
                        @endforeach
                      </select>
                      <span class="mandatory"> {{ $errors->first('category_id')  }} </span>
                     <div class="invalid-feedback">
                        Enter valid Category
                      </div>
                    </div>
                    <a href="{{ url('master/category/create')}}" target="_blank">
                      <button type="button"  class="px-2 btn btn-success ml-2" title="Add Category"><i class="fa fa-plus-circle" aria-hidden="true"></i></button></a>
                      <button type="button"  class="px-2 btn btn-success mx-2 refresh_category_id" title="Refresh Category"><i class="fa fa-refresh" aria-hidden="true"></i></button>
                
                  </div>
                </div>

                

                <div class="col-md-6">
                    <div class="form-group row">
                      <label for="validationCustom01" class="col-sm-4 col-form-label"> Item Type <span class="mandatory">*</span></label>
                      <div class="col-sm-8">
                        <select class="js-example-basic-multiple col-12 form-control custom-select item_type" name="item_type" required>
                          <option value="">Choose Item Type</option>
                         <option value="Direct"   {{ old('item_type',$item->item_type) == "Direct" ? 'selected' : '' }}  >Direct</option>
                          <option value="Bulk" {{ old('item_type',$item->item_type) == "Bulk" ? 'selected' : '' }}  >Bulk</option>
                          <option value="Repack" {{ old('item_type',$item->item_type) == "Repack" ? 'selected' : '' }}  >Repack</option>
                          <option value="Parent" {{ old('item_type',$item->item_type) == "Parent" ? 'selected' : '' }}  >Parent</option>
                         <!-- <option value="Child" {{ old('item_type',$item->item_type) == "Child" ? 'selected' : '' }}  >Child</option> -->
                        </select>
                        <span class="mandatory"> {{ $errors->first('item_type')  }} </span>
                       <div class="invalid-feedback">
                          Enter valid Item Type
                        </div>
                      </div>
                    </div>
                  </div>

                  <!-- Parent child Relation Concept Start Here  -->
                  <div class="col-md-6 child_div" style="display:none">
                    <div class="form-group row">
                      <label for="validationCustom01" class="col-sm-4 col-form-label"> Child <span class="mandatory">*</span> </label>
                      <div class="col-sm-6">
                        <select class="js-example-basic-multiple col-12 form-control custom-select child_item_id" name="child_item_id">
                          <option value="">Choose Child</option>
                          @foreach ($child_item as $value)
                          <option value="{{ $value->id }}" {{ old('child_item_id',$item->child_item_id) == $value->id ? 'selected' : '' }}  >{{ $value->name }}</option>
                          @endforeach
                         </select>
                        <span class="mandatory"> {{ $errors->first('child_item_id')  }} </span>
                       <div class="invalid-feedback">
                          Enter valid Child Name
                        </div>
                      </div>
                      <a href="{{ url('master/item/create')}}" target="_blank">
                        <button type="button"  class="px-2 btn btn-success ml-2" title="Add Child Item"><i class="fa fa-plus-circle" aria-hidden="true"></i></button></a>
                        <button type="button"  class="px-2 btn btn-success mx-2 refresh_child_item_id" title="Refresh Child Item"><i class="fa fa-refresh" aria-hidden="true"></i></button>
                    </div>
                  </div>

                  <div class="col-md-6 child_div" style="display:none">
                    <div class="form-group row">
                      <label for="validationCustom01" class="col-sm-4 col-form-label"> No of Units <span class="mandatory">*</span></label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control child_unit only_allow_digit_and_dot" placeholder="Units" name="child_unit" value="{{old('child_unit',$item->child_unit)}}" >
                        <span class="mandatory"> {{ $errors->first('child_unit')  }} </span>
                       <div class="invalid-feedback">
                          Enter valid Units
                        </div>
                      </div>
                                            </div>
                  </div>
                  <!-- Parent child Relation Concept End Here  -->

                  <div class="col-md-6 bulk_item_div" style="display:none">
                    <div class="form-group row">
                      <label for="validationCustom01" class="col-sm-4 col-form-label"> Bulk Item </label>
                      <div class="col-sm-6">
                        <select class="js-example-basic-multiple col-12 form-control custom-select bulk_item_id" name="bulk_item_id">
                          <option value="">Choose Bulk Item</option>
                          @foreach ($bulk_item as $value)
                          <option value="{{ $value->id }}" {{ old('bulk_item_id') == $value->id ? 'selected' : '' }}  >{{ $value->name }}</option>
                          @endforeach
                         </select>
                        <span class="mandatory"> {{ $errors->first('bulk_item_id')  }} </span>
                       <div class="invalid-feedback">
                          Enter valid Bulk Item Name
                        </div>
                      </div>
                      <a href="{{ url('master/item/create')}}" target="_blank">
                        <button type="button"  class="px-2 btn btn-success ml-2" title="Add Bulk Item"><i class="fa fa-plus-circle" aria-hidden="true"></i></button></a>
                        <button type="button"  class="px-2 btn btn-success mx-2 refresh_item_id" title="Refresh Bulk Item"><i class="fa fa-refresh" aria-hidden="true"></i></button>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group row">
                      <label for="validationCustom01" class="col-sm-4 col-form-label">Weight In Grams <span class="mandatory">*</span></label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control weight_in_grams only_allow_digit_and_dot" placeholder="Weight In Grams " name="weight_in_grams" value="{{old('weight_in_grams',$item->weight_in_grams)}}" >
                        <span class="mandatory"> {{ $errors->first('weight_in_grams')  }} </span>
                        <div class="invalid-feedback">
                          Enter valid Weight In Grams
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
                          <input type="text" class="form-control print_name_in_language_1 only_allow_alp_num_dot_com_amp" placeholder="Print Name in {{ $language_1 }}" name="print_name_in_language_1" value="{{old('print_name_in_language_1',$item->print_name_in_language_1)}}" >
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
                            <input type="text" class="form-control print_name_in_language_2 only_allow_alp_num_dot_com_amp" placeholder="Print Name in {{ $language_2 }}" name="print_name_in_language_2" value="{{old('print_name_in_language_2',$item->print_name_in_language_2)}}">
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
                              <input type="text" class="form-control print_name_in_language_3 only_allow_alp_num_dot_com_amp" placeholder="Print Name in {{ $language_3 }}" name="print_name_in_language_3" value="{{old('print_name_in_language_3',$item->print_name_in_language_3)}}">
                              <span class="mandatory"> {{ $errors->first('print_name_in_language_3')  }} </span>
                              <div class="invalid-feedback">
                                Enter valid Print Name in {{ $language_3 }}
                              </div>
                            </div>
                          </div>
                        </div>

                        <!-- <div class="col-md-6">
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
                          </div> -->

                         

                            <div class="col-md-6">
                              <div class="form-group row">
                                <label for="validationCustom01" class="col-sm-4 col-form-label">Hsn Code <span class="mandatory">*</span></label>
                                <div class="col-sm-8">
                                  <input type="text" class="form-control hsn only_allow_alp_num_dot_com_amp" placeholder="Hsn Code" name="hsn" value="{{old('hsn',$item->hsn)}}" required>
                                  <span class="mandatory"> {{ $errors->first('hsn')  }} </span>
                                  <div class="invalid-feedback">
                                    Enter valid Hsn Code
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
                                      <div class="col-sm-6">
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
                                      <a href="{{ url('master/category/create')}}" target="_blank">
                                        <button type="button"  class="px-2 btn btn-success ml-2" title="Add Uom"><i class="fa fa-plus-circle" aria-hidden="true"></i></button></a>
                                        <button type="button"  class="px-2 btn btn-success mx-2 refresh_uom_id" title="Add Uom"><i class="fa fa-refresh" aria-hidden="true"></i></button>
                                    </div>
                                  </div>

                                  <div class="col-md-6">
                                      <div class="form-group row">
                                        <label for="validationCustom01" class="col-sm-4 col-form-label">Is Machine Weight Applicable <span class="mandatory">*</span></label>
                                        <div class="col-sm-8">
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                  <input type="radio" class="form-check-input is_machine_weight_applicable" {{ old('is_machine_weight_applicable',$item->is_machine_weight_applicable) == 1 ? 'checked' : '' }} value ="1" name="is_machine_weight_applicable">Yes
                                                </label>
                                              </div>

                                              <div class="form-check">
                                                  <label class="form-check-label">
                                                    <input type="radio" class="form-check-input is_machine_weight_applicable" value ="0" {{ old('is_machine_weight_applicable',$item->is_machine_weight_applicable) == 0 ? 'checked' : '' }} name="is_machine_weight_applicable">No
                                                  </label>
                                                </div>
                                          
                                          <span class="mandatory"> {{ $errors->first('is_machine_weight_applicable')}} </span>
                                         <div class="invalid-feedback">
                                            Enter valid Machine Weight
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
                                          <label for="validationCustom01" class="col-sm-4 col-form-label">Is Miminum Sales Qty Applicable <span class="mandatory">*</span></label>
                                          <div class="col-sm-8">
                                              <div class="form-check">
                                                  <label class="form-check-label">
                                                    <input type="radio" class="form-check-input is_minimum_sales_qty_applicable" value ="1" {{ old('is_minimum_sales_qty_applicable',$item->is_minimum_sales_qty_applicable) == 1 ? 'checked' : '' }} name="is_minimum_sales_qty_applicable">Yes
                                                  </label>
                                                </div>

                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                      <input type="radio" class="form-check-input is_minimum_sales_qty_applicable" value ="0" {{ old('is_minimum_sales_qty_applicable',$item->is_minimum_sales_qty_applicable) == 0 ? 'checked' : '' }} name="is_minimum_sales_qty_applicable">No
                                                    </label>
                                                  </div>
                                            
                                            <span class="mandatory"> {{ $errors->first('is_minimum_sales_qty_applicable')}} </span>
                                           <div class="invalid-feedback">
                                              Enter valid UOM
                                            </div>
                                          </div>
                                        </div>
                                      </div>

                                      <div class="col-md-6 minimum_sales_div" style="display: none">
                                        <div class="form-group row">
                                          <label for="validationCustom01" class="col-sm-4 col-form-label">Minimum Sales Qty <span class="mandatory">*</span></label>
                                          <div class="col-sm-8">
                                            <input type="text" class="form-control minimum_sales_qty" placeholder="Minimum Sales Qty" name="minimum_sales_qty" value="{{old('minimum_sales_qty',$item->minimum_sales_qty)}}">
                                            <span class="mandatory"> {{ $errors->first('minimum_sales_qty')  }} </span>
                                            <div class="invalid-feedback">
                                              Enter valid Minimum Sales Qty
                                            </div>
                                          </div>
                                        </div>
                                      </div>

                                      <div class="col-md-6 minimum_sales_div" style="display: none">
                                        <div class="form-group row">
                                          <label for="validationCustom01" class="col-sm-4 col-form-label">Minimum Sales Price <span class="mandatory">*</span></label>
                                          <div class="col-sm-8">
                                            <input type="text" class="form-control minimum_sales_price" placeholder="Minimum Sales Price" name="minimum_sales_price" value="{{old('minimum_sales_price',$item->minimum_sales_price)}}">
                                            <span class="mandatory"> {{ $errors->first('minimum_sales_price')  }} </span>
                                            <div class="invalid-feedback">
                                              Enter valid Minimum Sales Price
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

                                        <div class="col-md-6">
                  <div class="form-group row">
                     <label for="validationCustom01" class="col-sm-4 col-form-label">Supplier</label>
                     <div class="col-sm-6">
                        <select class="js-example-basic-multiple col-12 form-control custom-select supplier_id" name="supplier_id">
                           <option value="">Choose Supplier</option>
                           @foreach ($supplier as $value)
                           <option value="{{ $value->id }}" {{ old('supplier_id',$item->supplier_id) == $value->id ? 'selected' : '' }}  >{{ $value->name }}</option>
                           @endforeach
                        </select>
                        <span class="mandatory"> {{ $errors->first('supplier_id')}} </span>
                        <div class="invalid-feedback">
                           Enter valid Supplier
                        </div>
                     </div>
                     <a href="{{ url('master/supplier/create')}}" target="_blank">
                     <button type="button"  class="px-2 btn btn-success ml-2 " title="Add Supplier"><i class="fa fa-plus-circle" aria-hidden="true"></i></button></a>
                     <button type="button"  class="px-2 btn btn-success mx-2 refresh_supplier_id" title="Refresh"><i class="fa fa-refresh" aria-hidden="true"></i></button>
                  </div>
               </div>
 </div>


              <div class="col-md-2 mb-3">
                     <span>Opening:</span>
                  </div>
                  
                  <div class="col-md-12 openings">
                    @for($k = 0; $k < @$opening_count; $k++)
                  <div class="row mb-3 opening_row">

                    <div class="col-md-2">
                     <label for="validationCustom01" class="">Location</label>
                       <select class="js-example-basic-multiple col-12 form-control custom-select location select2-hidden-accessible" name="location[]" id="location" data-select2-id="location" tabindex="-1" aria-hidden="true">
                           <option value="{{ @$opening_data[$k][0]['location'] }}" data-select2-id="6">{{ @$opening_data[$k][0]['name'] }}</option>
                           @foreach($location as $key => $value)
                           <option value="{{$value->id}}">{{$value->name}}</option>
                           @endforeach
                        </select>
                       <span class="mandatory"> {{ $errors->first('location')}} </span>
                     <div class="invalid-feedback">
                           Enter valid Location
                     </div>
               </div>

                     <div class="col-md-1">
                     <label for="validationCustom01" class="">Batch No</label>
                       <input type="text" placeholder="Batch No" required="" name="batch_no[]" value="{{ @$opening_data[$k][0]['batch_no'] }}" class="form-control mandatory" >
                       <span class="mandatory"> </span>
                     <div class="invalid-feedback">
                           Enter valid Batch No
                     </div>
               </div>

                  <div class="col-md-2">
                     <label for="validationCustom01" class="">Opening Quantity<span class="mandatory">*</span></label>
                       <input type="number" required="" id="quantity" placeholder="Opening Quantity" name="quantity[]" value="{{ @$opening_data[$k][0]['opening_qty'] }}" class="form-control quantity mandatory" >
                     <span class="mandatory"> {{ $errors->first('quantity')}} </span>
                     <div class="invalid-feedback">
                           Enter valid Quantity
                     </div>
               </div>

                                 <div class="col-md-1">
                     <label for="validationCustom01" class="">Rate</label>
                       <input type="text" placeholder="Rate" value="{{ @$opening_data[$k][0]['rate'] }}" id="rate" name="rate[]" class="form-control rate" >
               </div>

                                 <div class="col-md-1">
                     <label for="validationCustom01" class="">Amount</label>
                       <input type="text" name="amount[]" value="{{ @$opening_data[$k][0]['amount'] }}" readonly="" id="amount" placeholder="Amount" class="form-control amount" >
               </div>

                                 <div class="col-md-2">
                     <label for="validationCustom01" class="">Applicable Date</label>
                       <input type="date" name="applicable_date[]" value="{{ @$opening_data[$k][0]['applicable_date'] }}" class="form-control" >
               </div>

               <div class="col-md-1">
                     <label for="validationCustom01" class="">W/B</label>
                       <select class="form-control" name="black_or_white[]">
                        @if($opening_data[$k][0]['black_or_white'] == 1)
                        <option value="1">W</option>
                        @else
                        <option value="0">B</option>
                        @endif
                          <option value="1">W</option>
                          <option value="0">B</option>
                       </select>
               </div>

               <div class="col-md-2 mt-4">
                  <input type="button" id="add_opening" class="btn btn-success mb-3" name="" value="+">
                  <input type="button" id="remove_opening" class="btn btn-danger mb-3" name="" value="-">
               </div>

            </div>
            @endfor
            <input type="hidden" name="opening_cnt" id="opening_cnt" value="{{ $opening_count }}">
         </div> 
         
         


 <div class="form-row">
  <div class="col-md-8">
  <h4> Item Tax Details :</h4>
  </div>
</div>
<input type="hidden" name="count" id="count" value="{{ $tax_detail_count }}">
 <div class="form-row">

  <table class="table">
    <thead class="thead-gray">
      <tr>
        <th class="text-center">S.No</th>
        <!-- <th class="text-center">IGST (%) <input type="text" class="w-50 border-radius common_igst" placeholder="IGST (%)"> </th>
        <th class="text-center">CGST (%)</th> -->
        @foreach($tax as $key => $value)
        <th class="text-center">{{$value->name}} (%) </th>
        @endforeach
        <th class="text-center">Effective From  </th>
        <th class="text-center">Action  <!-- <label class="btn btn-success add_tax_details">+</label></th> -->
      </tr>
    </thead>
    <tbody class="append_row">
      @foreach($tax_details as $i =>$val) 
      <tr>
         <td class="s_no">{{$i+1}}</td>
        @foreach($tax as $key=> $value)
        
        <td>
            <div class="col-sm-12">
            <input type="hidden" name="{{$value->name}}[]" class="" id="{{$value->name}}[]" value="{{$value->id }}">
            <input type="text" class="form-control {{ $value->name }}_id only_allow_digit_and_dot common" name="{{ $value->name }}_id[]"  placeholder="{{ $value->name }}" value="{{ @$tax_value[$i][$key]['value'] }}" required >
           
            </div>
          </td>
         
          @endforeach
          <td>
             <div class="col-sm-12">
                <input type="text" class="form-control valid_from" name="valid_from[]" placeholder="dd-mm-yyyy" value="{{ @$tax_value[$i][$key]['valid_from'] }}" required>

               
                <span class="mandatory"> {{ $errors->first('valid_from.0')  }} 
             </div>
          </td>
        
                <td>
                  <div class="form-group row">
                   <div class="col-sm-3 mr-1">
                     <label class="btn btn-success add_tax_details">+</label>
                   </div>
                   <div class="col-sm-3 mx-2">
                     <label class="btn btn-danger remove_tax_details">-</label>
                   </div>
                 </div>
                </td>
                
    </tr>
      @endforeach
      
     @if (old('igst'))
         @foreach (old('igst') as $old_key=>$old_value)
   <tr>
         <td class="s_no"></td> 
         <td>
             <div class="col-sm-12">
             <input type="text" class="form-control igst only_allow_digit_and_dot" name="igst[]" placeholder="IGST" value="{{ old('igst.'.$old_key) }}" required>
             <span class="mandatory"> {{ $errors->first('igst.'.$old_key)  }} </span>
             <div class="invalid-feedback">
                 Enter valid IGST
               </div>
             </div>
           </td>
         <td>
             <div class="col-sm-12">
             <input type="text" class="form-control cgst only_allow_digit_and_dot" name="cgst[]" readonly placeholder="CGST" value="{{ old('cgst.'.$old_key) }}" required>
             <span class="mandatory"> {{ $errors->first('cgst.'.$old_key)  }} </span>
             <div class="invalid-feedback">
                 Enter valid CGST
               </div>
             </div>
           </td>

       <td>
                 <div class="col-sm-12">
                 <input type="text" class="form-control sgst only_allow_digit_and_dot" name="sgst[]" readonly placeholder="SGST" value="{{ old('sgst.'.$old_key) }}" required>
                 <span class="mandatory"> {{ $errors->first('sgst.'.$old_key)  }} </span>
                 <div class="invalid-feedback">
                     Enter valid SGST
                   </div>
                 </div>
               </td>

               <td>
                   <div class="col-sm-12">
                    <input type="text" class="form-control valid_from" name="valid_from[]" placeholder="dd-mm-yyyy" value="{{ old('valid_from.'.$old_key) }}" required>
                    <span class="mandatory"> {{ $errors->first('valid_from.'.$old_key)  }} </span>
                    <div class="invalid-feedback">
                       Enter valid Effective From Date
                     </div>
                   </div>
                 </td>
                 <td>
                  <div class="form-group row">
                   <div class="col-sm-3 mr-1">
                     <label class="btn btn-success add_tax_details">+</label>
                   </div>
                   <div class="col-sm-3 mx-2">
                     <label class="btn btn-danger remove_tax_details">-</label>
                   </div>
                 </div>
                </td> 
      </tr>
   
         @endforeach
     @endif

    </tbody>
  </table>
       
 </div>

 <div class="form-row">
  <table class="table">
     <thead class="thead-gray">
        <tr>
           <th class="text-center">S.No</th>
           <th class="text-center">Barcode</th>
           <th class="text-center">Confirm Barcode</th>
           <th class="text-center">Action <label class="btn btn-success add_barcode_details">+</label></th>
        </tr>
     </thead>
     <tbody class="append_barcode_dets">
       @foreach ($item->item_barcode_details as $item_barcode_key=>$item_barcode_value)
       <tr>
       <td class="barcode_s_no">{{ $item_barcode_key+1 }}</td>
        <td>
           <div class="col-sm-12">
             <input type="hidden" class="form-control item_barcode_details_id" name="item_barcode_details_id[]" value="{{ old('item_barcode_details_id.'.$item_barcode_key,$item_barcode_value->id) }}">
              <input type="text" class="form-control barcode" name="old_barcode[]"  placeholder="Barcode" value="{{ old('old_barcode.'.$item_barcode_key,$item_barcode_value->barcode) }}" required>
              <span class="mandatory"> {{ $errors->first('old_barcode.'.$item_barcode_key)  }} </span>
              <div class="invalid-feedback">
                 Enter valid Barcode
              </div>
           </div>
        </td>
        <td>
           <div class="col-sm-12">
              <input type="text" class="form-control confirm_barcode" name="old_barcode_confirmation[]"  placeholder="Confirm Barcode" value="{{ old('old_barcode_confirmation.'.$item_barcode_key,$item_barcode_value->barcode) }}" required>
              <span class="mandatory"> {{ $errors->first('old_barcode_confirmation.'.$item_barcode_key)  }} </span>
              <div class="invalid-feedback">
                 Enter valid Confirm Barcode
              </div>
           </div>
        </td>
        <td>
           <div class="form-group row">
              <div class="col-sm-3 mr-1">
                 <label class="btn btn-success add_barcode_details">+</label>
              </div>
              <div class="col-sm-3 mx-1">
                 <label class="btn btn-danger remove_existing_barcode">-</label>
              </div>
           </div>
        </td>
     </tr>
       @endforeach
       
        @if (old('barcode'))
        @foreach (old('barcode') as $old_barcode_key=>$old_barcode_value)
       
        <tr>
           <td class="barcode_s_no">1</td>
           <td>
              <div class="col-sm-12">
                 <input type="text" class="form-control barcode" name="barcode[]"  placeholder="Barcode" value="{{ old('barcode.'.$old_barcode_key) }}" required>
                 <span class="mandatory"> {{ $errors->first('barcode.'.$old_barcode_key)  }} </span>
                 <div class="invalid-feedback">
                    Enter valid Barcode
                 </div>
              </div>
           </td>
           <td>
              <div class="col-sm-12">
                 <input type="text" class="form-control confirm_barcode" name="barcode_confirmation[]"  placeholder="Confirm Barcode" value="{{ old('barcode_confirmation.'.$old_barcode_key) }}" required>
                 <span class="mandatory"> {{ $errors->first('barcode_confirmation.'.$old_barcode_key)  }} </span>
                 <div class="invalid-feedback">
                    Enter valid Confirm Barcode
                 </div>
              </div>
           </td>
           <td>
              <div class="form-group row">
                 <div class="col-sm-2 mr-1">
                    <label class="btn btn-success add_barcode_details">+</label>
                 </div>
                 <div class="col-sm-2 mx-1">
                    <label class="btn btn-danger remove_barcode_details">-</label>
                 </div>
              </div>
           </td>
        </tr>
      
        @endforeach
        @endif
     </tbody>
  </table>
</div>

        <div class="col-md-7 text-right">
          <button class="btn btn-success" type="submit">Submit</button>
        </div>
      </form>
    </div>
    <!-- card body end@ -->
  </div>
</div>

<!-- <script src="{{asset('assets/js/master/add_more_item_tax_details.js')}}"></script> -->
<script src="{{asset('assets/js/master/capitalize.js')}}"></script>
<script src="{{asset('assets/js/master/add_more_barcode_details.js')}}"></script>
<!-- <script src="{{asset('assets/js/master/add_more_opening_details.js')}}"></script> -->
<script>

$(document).on("submit",".submit_form2",function(){
  var error_count=barcode_validation();
  if(error_count == 0){
   return true;
  }else{
    return false;
  }
});

      $(document).on('input','.hsn ',function(e){
         e.preventDefault();
        $(this).val($(this).val().replace(/[^0-9]/gi, ''));
        if($(this).val().replace(/[^0-9]/gi, '').length > 6)
        {
         return false
        }
        else
        {
          
        }

      });


var i = 0;
var j =$('#opening_cnt').val();
var cnt = 0;
function add_item_tax_details() {
   i++;
    var item_tax_dets = "";
    item_tax_dets += '<tr class="row_count">\
                        <td class="s_no">1</td>\
                        @foreach($tax as $key => $value)\
                        <td>\
                           <div class="col-sm-12">\
                              <input type="text" class="form-control {{$value->name}}_id only_allow_digit_and_dot common" name="{{$value->name}}_id[]"  placeholder="{{$value->name}}" value="0" id="{{$value->name}}_id'+i+'"  required>\
                              <input type="hidden" name="{{$value->name}}[]" id="{{$value->name}}[]" value="{{ $value->id }}">\
                              <span class="mandatory">  </span>\
                              <div class="invalid-feedback">\
                                 Enter valid {{$value->name}}\
                              </div>\
                           </div>\
                        </td>\
                        @endforeach\
                        <td>\
                           <div class="col-sm-12">\
                              <input type="text" class="form-control valid_from" name="valid_from[]" placeholder="dd-mm-yyyy" value="" required>\
                              <span class="mandatory"> </span>\
                              <div class="invalid-feedback">\
                                 Enter valid Effective From Date\
                              </div>\
                           </div>\
                        </td>\
                        <td>\
                           <div class="form-group row">\
                              <div class="col-sm-3 mr-1">\
                                 <label class="btn btn-success add_tax_details">+</label>\
                              </div>\
                              <div class="col-sm-3 mx-2">\
                                 <label class="btn btn-danger remove_tax_details">-</label>\
                              </div>\
                           </div>\
                        </td>\
                     </tr>';

    $(".append_row").append(item_tax_dets);
    $(".append_row").length;
    $('#count').val($(".row_count").length);
    var currentDate = new Date();
    $('.valid_from').datepicker({
        format: "dd-mm-yyyy",
        todayHighlight: true,
        startDate: currentDate,
        endDate: '',
        setDate: currentDate,
        autoclose: true
    });
    s_no();
    //common_igst_calculation();
}

$(document).on('click','#add_opening',function(){

   
/*Current Date*/
   var d = new Date();

   var month = d.getMonth()+1;
   var day = d.getDate();

   var output = ((''+day).length<2 ? '0' : '') + day + '/' +
       ((''+month).length<2 ? '0' : '') + month + '/' +
       d.getFullYear();

/*Current Date*/   

   
   $('.location').each(function(key){

      if($(this).val() == '')
      {
         alert('Select Location');
         key.preventDefault();
         
      }

   });   

   $('.batch_no').each(function(key){

      if($(this).val() == '')
      {
         alert('Enter Batch No');
         key.preventDefault();
         $(this).closest($('.opening_row')).remove();
         
      }

   });

   $('.quantity').each(function(key){

      if($(this).val() == '')
      {
         alert('Enter Quantity No');
         key.preventDefault();
         
      }

   });

   $('.rate').each(function(key){

      if($(this).val() == '')
      {
         alert('Enter Rate No');
         key.preventDefault();
         

      }

   });

   var opening_details = "";

   opening_details+= '<div class="row mb-3 opening_row">\
   <div class="col-md-2">\
                     <label for="validationCustom01" class="">Location</label>\
                       <select class="js-example-basic-multiple col-12 form-control custom-select location" name="location[]" id="location" data-select2-id="location" tabindex="-1" aria-hidden="true">\
                           <option value="" data-select2-id="6">Choose Location</option>\
                           @foreach($location as $key => $value)\
                           <option value="{{$value->id}}">{{$value->name}}</option>\
                           @endforeach\
                        </select>\
                       <span class="mandatory"> </span>\
                     <div class="invalid-feedback">\
                           Enter valid Location\
                     </div>\
               </div>\
                     <div class="col-md-1">\
                  <!-- <div class="form-group row"> -->\
                     <label for="validationCustom01" class="">Batch No</label>\
                     <!-- <div class="col-sm-8"> -->\
                       <input type="text" placeholder="Batch No" required="" name="batch_no[]" class="form-control batch_no" >\
                     <span class="mandatory"> </span>\
                     <div class="invalid-feedback">\
                           Enter valid Batch No\
                     </div>\
                     <!-- /div>\
                  </div> -->\
               </div>\
                  <div class="col-md-2">\
                  <!-- <div class="form-group row"> -->\
                     <label for="validationCustom01" class="">Opening Quantity<span class="mandatory">*</span></label>\
                     <!-- <div class="col-sm-8"> -->\
                       <input type="text" required="" placeholder="Opening Quantity" name="quantity[]" class="form-control quantity mandatory" >\
                     <!-- </div> -->\
                     <span class="mandatory"> </span>\
                     <div class="invalid-feedback">\
                           Enter valid Quantity\
                     </div>\
                  <!-- </div> -->\
               </div>\
                                 <div class="col-md-1">\
                  <!-- <div class="form-group row"> -->\
                     <label for="validationCustom01" class="">Rate</label>\
                     <!-- <div class="col-sm-8"> -->\
                       <input type="text" placeholder="Rate" name="rate[]" class="form-control rate" >\
                     <!-- /div>\
                  </div> -->\
               </div>\
                                 <div class="col-md-1">\
                  <!-- <div class="form-group row"> -->\
                     <label for="validationCustom01" class="">Amount</label>\
                     <!-- <div class="col-sm-8"> -->\
                       <input type="text" name="amount[]" readonly placeholder="Amount" class="form-control amount" >\
                     <!-- </div>\
                     \
                  </div> -->\
               </div>\
                                 <div class="col-md-2">\
                  <!-- <div class="form-group row"> -->\
                     <label for="validationCustom01" class="">Applicable Date</label>\
                     <!-- <div class="col-sm-8"> -->\
                       <input type="date" name="applicable_date[]" value="" class="form-control applicable_date" >\
                     <!-- /div>\
                  </div> -->\
               </div>\
               <div class="col-md-1">\
                  <!-- <div class="form-group row"> -->\
                     <label for="validationCustom01" class="">W/B</label>\
                     <!-- <div class="col-sm-8"> -->\
                       <select class="form-control" name="black_or_white[]">\
                          <option value="1">W</option>\
                          <option value="0">B</option>\
                       </select>\
                     <!-- /div>\
                  </div> -->\
               </div>\
               <div class="col-md-2 mt-4">\
                  <input type="button" id="add_opening" class="btn btn-success mb-3" name="" value="+">\
                  <input type="button" id="remove_opening" class="btn btn-danger mb-3" name="" value="-">\
               </div>\
            </div>';
$("select").select2();
$('.openings').append(opening_details);
++j;
$('#opening_cnt').val(j);
});


$(document).on('change','.batch_no',function(){
var batch = Array();
   $('.batch_no').each(function(key){

      batch.push($(this).val());
   });

   for(var m=0;m<batch.length;m++)
   {
      var first = batch[m];

      for(var n=m+1;n<=batch.length;n++)
      {
         var second = batch[n];

         if(typeof second == 'undefined')
         {

         }
         else
         {
            if(first == second)
            {
               alert('uesd');
               $(this).val('');
               $(this).focus();
            }  
            else
            {

            }
         }
      }
   }

});

$(document).on('change','.applicable_date',function(){
var applicable_date = Array();

   $('.applicable_date').each(function(key){

      applicable_date.push($(this).val());
   });

   for(var m=0;m<applicable_date.length;m++)
   {
      var first = applicable_date[m];

      for(var n=m+1;n<=applicable_date.length;n++)
      {
         var second = applicable_date[n];

         if(typeof second == 'undefined')
         {

         }
         else
         {
            if(first == second)
            {
               alert('uesd');
               $(this).val('');
               $(this).focus();
            }  
            else
            {

            }
         }
      }
   }

});




$(document).on('click','#remove_opening',function (){

   var count = $('.opening_cnt').val();
   if(count == 1)
   {
      alert('Atleast One Row Present!');
   }
   else
   {
      $(this).closest($('.opening_row')).remove();
      $('#opening_cnt').val(--j);
   }


});

$(document).on('input','.rate',function(){
var quantity = $(this).closest($('.opening_row')).find('.quantity').val();
var rate = $(this).closest($('.opening_row')).find('.rate').val();
if(quantity == '')
{
   alert('Enter Quantity First');
   $(this).closest($('.opening_row')).find('.rate').val('');
}
else
{
   var amount = parseInt(quantity)*parseFloat(rate);
   $(this).closest($('.opening_row')).find('.amount').val(parseFloat(amount).toFixed(2));
}

});

$(document).on('input','.quantity',function(){
   var quantity = $(this).closest($('.opening_row')).find('.quantity').val();
    var rate = $(this).closest($('.opening_row')).find('.rate').val();

   if(rate != '')
   {
      $(this).closest($('.opening_row')).find('.rate').val('');
      $(this).closest($('.opening_row')).find('.amount').val('');
   }
});



 
$(document).on('change','.valid_from',function(){
var valid_from = Array();

console.log($(this).val());

  $('.valid_from').each(function(key){

    valid_from.push($(this).val());
  });

  for(var m=0;m<valid_from.length;m++)
  {
    var first = valid_from[m];

    for(var n=m+1;n<=valid_from.length;n++)
    {
      var second = valid_from[n];

      if(typeof second == 'undefined')
      {

      }
      else
      {
        if(first == second)
        {
          alert('uesd');
          $(this).val('');
          $(this).focus();
        } 
        else
        {

        }
      }
    }
  }

});   

function confirm_barcode()
{
   barcode_validation();
}

function testing(val)
{
    var value = $('#num'+val).val();
     test($('.barcode').val(),value);
}

   
   $(document).on("click", ".remove_tax_details", function() {
    var $tr = $(this).closest("tr");
    if ($(".remove_tax_details").length > 1) {
        $(this).closest("tr").remove();
        s_no();
        i--;
        $('#count').val($(".row_count").length);
    } else {
        alert("Atleast One Row Present");
    }
});

   $(document).on("input", ".common", function() {

      var common=$(this).val();
   //newfun($(this).attr('id'),common);
   
   var tax_name = $(this).attr('class').split(' ')[1].slice(0,-3).toLowerCase();
   //alert(tax_name);
   if(tax_name == 'igst')
   {
      //alert('hi');
    var gst_lower = $(this).attr('class').split(' ')[1].slice(0,-3).toLowerCase();
    var gst_upper = $(this).attr('class').split(' ')[1].slice(0,-3).toUpperCase();
    var gst = tax_name.substr(0,1).toUpperCase()+tax_name.substr(1);

    var igst_upper = $(this).closest("tr").find("."+gst_upper+"_id").val();
    var igst_lower = $(this).closest("tr").find("."+gst_lower+"_id").val();
    var igst = $(this).closest("tr").find("."+gst+"_id").val();

    var half_lower = parseFloat(igst_lower)/2;
    var half_upper = parseFloat(igst_upper)/2;
    var half = parseFloat(igst)/2;

    var lower_cgst = 'cgst'.toLowerCase();
    var upper_cgst = 'cgst'.toUpperCase();
    var name_cgst = lower_cgst.substr(0,1).toUpperCase()+lower_cgst.substr(1);

    var lower_sgst = 'sgst'.toLowerCase();
    var upper_sgst = 'sgst'.toUpperCase();
    var name_sgst = lower_sgst.substr(0,1).toUpperCase()+lower_sgst.substr(1);

    $(this).closest("tr").find("."+lower_cgst+"_id").val(half_lower);
    $(this).closest("tr").find("."+upper_cgst+"_id").val(half_upper);
    $(this).closest("tr").find("."+name_cgst+"_id").val(half);

    $(this).closest("tr").find("."+lower_sgst+"_id").val(half_lower);
    $(this).closest("tr").find("."+upper_sgst+"_id").val(half_upper);
    $(this).closest("tr").find("."+name_sgst+"_id").val(half);

   // calc_gst(half,half_upper,half_lower);
 }
   });

   // $(document).on("change", ".valid_from", function() {
   //    var valid_from = new Array();
   //    $('.valid_from').each(function(key){
   //       //alert(key);
   //    valid_from = $(this).val();
   //  });
   //  console.log(valid_from);
   // });

   function calc_gst(half,half_upper,half_lower)
   {

      $(this).closest("tr").find(".cgst").val(cgst);
   }

   function s_no() {
    $(".s_no").each(function(key) {
        $(this).html(key + 1)
    });
}

   $(document).on("click",".add_tax_details",function(){
     add_item_tax_details();
   });
   
   $(document).on("click",".add_barcode_details",function(){
     add_barcode_details();
   });
   
   
   
   $(document).ready(function(){

     s_no();
     item_type();

     var is_minimum_sales_qty_applicable=$(".is_minimum_sales_qty_applicable:checked").val();

     var currentDate = new Date();
       $('.valid_from,.common_effective_from').datepicker({
       format: "dd-mm-yyyy",
       todayHighlight: true,
       startDate: currentDate,
       endDate: '',
       setDate: currentDate,
       autoclose: true
       });
   });
   
   
   
     $(".name").keyup(function(){
       $(".print_name_in_english").val($(this).val());
     });
   
   /* Repack */
   function item_type()
   {
     $(".weight_in_grams").removeAttr("required");
     $(".bulk_item_id").removeAttr('required');
   
     /* Item Type Parent  */
     $(".child_unit").removeAttr("required");
     $(".child_item_id").removeAttr('required');
     $(".uom_for_repack_item").removeAttr('required');



   
     var item_type=$(".item_type").val();
     if(item_type == "Bulk")
     {
       $(".weight_in_grams").attr('required', 'required');
     }
   
     if(item_type == "Repack")
     {
       $(".weight_in_grams").attr('required', 'required');
       $(".bulk_item_id").attr('required', 'required');
       $(".bulk_item_div").css("display","block");
       get_category_based_item($(".category_1").val(),$(".category_2").val(),$(".category_3").val(),item_id="")
     }else
     {
       $(".bulk_item_div").css("display","none");
     }
   
     if(item_type == "Parent")
     {

       $(".child_unit").attr('required', 'required');
       $(".child_item_id").attr('required', 'required');
       $(".uom_for_repack_item").attr('required', 'required');
       $(".child_div").css("display","block");
       //get_category_based_item($(".category_1").val(),$(".category_2").val(),$(".category_3").val(),item_id="")
     }else
     {
       $(".child_div").css("display","none");
     }

     
    

    $("select").select2();


   
   }
   
   
   $(document).on("change",".item_type",function(){
     item_type();
   
   });
   
   function get_category_based_item(category_one_id,category_two_id,category_three_id,item_id)
   {
     $.ajax({
                 type: "post",
                 url: "{{ url('common/get-category-based-bulk-item')}}",
                 data: {category_one_id:category_one_id,category_two_id: category_two_id, category_three_id:category_three_id,item_id:item_id},
                 success: function (res)
                 {
                   result = JSON.parse(res);
                   $(".bulk_item_id").html(result.option);
                 }
             });
   
   }
   
   
     
   
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
   
   
   
   $(document).on("click",".is_expiry_date",function()
   {
     var is_expiry_date=$(".is_expiry_date:checked").val();
     console.log("is_expiry_date == " + is_expiry_date);
     if(is_expiry_date == 1){
       $(".expiry_date_div").css("display","block");
     }else{
       $(".expiry_date_div").css("display","none");
     }
   });
   
   
   
   
   $(document).on("click",".is_minimum_sales_qty_applicable",function()
   {
     var is_minimum_sales_qty_applicable=$(".is_minimum_sales_qty_applicable:checked").val();
     $(".minimum_sales_qty").removeAttr("required");
     $(".minimum_sales_price").removeAttr("required");
     $(".uom_for_minimum_sales_item").removeAttr("required");

     
     

     if(is_minimum_sales_qty_applicable == 1){
      $(".minimum_sales_qty").attr('required', 'required');
      $(".minimum_sales_price").attr('required', 'required');
      $(".uom_for_minimum_sales_item").attr('required', 'required');

       $(".minimum_sales_div").css("display","block");
     }else{
       $(".minimum_sales_qty").removeAttr("required");
       $(".minimum_sales_price").removeAttr("required");
      $(".uom_for_minimum_sales_item").removeAttr("required");
       $(".minimum_sales_div").css("display","none");
     }
    $("select").select2();
   });
   
   
   $(document).on("click",".refresh_category_id",function(){
      var category_dets=refresh_category_master_details();
      $(".category_id").html(category_dets);
   });
   
   $(document).on("click",".refresh_uom_id",function(){
      var uom_dets=refresh_uom_master_details();
      $(".uom_id").html(uom_dets);
   });

   $(document).on("click",".refresh_uom_for_repack_item_id",function(){
      var uom_dets=refresh_uom_master_details();
      $(".uom_for_repack_item").html(uom_dets);
   });

   $(document).on("click",".refresh_uom_for_minimum_sales_item_id",function(){
      var uom_dets=refresh_uom_master_details();
      $(".uom_for_minimum_sales_item").html(uom_dets);
   });


   

   
   
   $(document).on("click",".refresh_item_id",function(){
      var item_dets=refresh_item_master_details();
      $(".bulk_item_id").html(item_dets);
   });
   
   $(document).on("click",".refresh_brand_id",function(){
      var brand_dets=refresh_brand_master_details();
      $(".brand_id").html(brand_dets);
   });
   
   $(document).on("click",".refresh_child_item_id",function(){
     var category_id=$(".category_id").val();
      var child_item_dets=refresh_child_item_master_details(category_id);
      $(".child_item_id").html(child_item_dets);
   });

   $(document).on("click",".refresh_supplier_id",function(){
      var supplier_dets=refresh_supplier_master_details();
      $(".supplier_id").html(supplier_dets);
   });

   
   
   
   
   
   
   
   $(document).ready(function()
   {
    var old_expiry_date="{{ old('is_expiry_date')}}";
     var is_expiry_date="";
     is_expiry_date=$(".is_expiry_date :checked").val();
     if(old_expiry_date != "")
     {
       is_expiry_date=old_expiry_date;
     }
     
     if(is_expiry_date == 1){
       $(".expiry_date_div").css("display","block");
     }else{
       $(".expiry_date_div").css("display","none");
     }
   
     var category_one_id=$(".category_1").val();
     var category_two_id="{{ old('category_2')}}";
     var category_three_id="{{ old('category_3')}}";
     var bulk_item_id="{{ old('bulk_item_id')}}";
   
     item_type();
   
     if(category_one_id !="")
     {
       get_category_one_based_category_two(category_one_id,category_two_id);
       get_category_based_item(category_one_id,category_two_id,category_three_id,bulk_item_id);
     }
   
     if(category_two_id !="")
     {
       get_category_two_based_category_three(category_two_id,category_three_id); 
     }
   
   });
   
</script>

@endsection