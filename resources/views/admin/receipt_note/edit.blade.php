@extends('admin.layout.app')
@section('content')
<style type="text/css">
  tbody#team-list {
    counter-reset: rowNumber;
}

tbody#team-list tr:nth-child(n+1) {
    counter-increment: rowNumber;
}

tbody#team-list tr:nth-child(n+1) td:first-child::before {
    content: counter(rowNumber);
    min-width: 1em;
    margin-right: 0.5em;
}
</style>
<div class="col-12 body-sec">
  <div class="card container-fluid px-0">
    <!-- card header start@ -->
    <div class="card-header px-2">
      <div class="row">
        <div class="col-4">
          <h3>Edit Receipt Note</h3>
        </div>
        <div class="col-8 mr-auto">
          <ul class="h-right-btn mb-0 pl-0">
            <li><button type="button" class="btn btn-success"><a href="{{ url('receipt_note/index/0') }}">Back</a></button></li>
          </ul>
        </div>
      </div>
    </div>
    <style>
    .table{
      font-size: 13px;
    }
    </style>
    <!-- card header end@ -->
    <div class="card-body">
    


<style type="text/css">
  #middlecol {
   
    width: 45%;
  }

  #middlecol table {
    max-width: 99%;
    width: 100% !important;
  }
</style>


<form  method="post" class="form-horizontal" action="{{ route('receipt_note.update',$receipt_note->rn_no) }}" id="dataInput" enctype="multipart/form-data">
      {{csrf_field()}}
      @method('PATCH')


                      <div class="row col-md-12">
                                <div class="col-md-4">
                  <label style="font-family: Times new roman;">Party Name</label><br>
                  <div class="form-group row">
                     <div class="col-sm-8">
                      <select class="js-example-basic-multiple col-12 form-control custom-select supplier_id" onchange="supplier_details()" name="supplier_id" id="supplier_id">
                           @if(isset($receipt_note->supplier->name) && !empty($receipt_note->supplier->name))
                           <option value="{{ $receipt_note->supplier->id }}">{{ $receipt_note->supplier->name }}</option>
                           @else
                           <option value="">Choose Supplier Name</option>
                           @endif
                           @foreach($supplier as $suppliers)
                           <option value="{{ $suppliers->id }}">{{ $suppliers->name }}</option>
                           @endforeach
                        </select>
                     </div>
                     <a href="{{ url('master/supplier/create')}}" target="_blank">
                     <button type="button"  class="px-2 btn btn-success ml-2" title="Add Supplier"><i class="fa fa-plus-circle" aria-hidden="true"></i></button></a>
                     <button type="button"  class="px-2 btn btn-success mx-2 refresh_supplier_id" title="Add Brand"><i class="fa fa-refresh" aria-hidden="true"></i></button>
                  </div>
               </div>
                                <div class="col-md-4">
                                  <label style="font-family: Times new roman;">Party Address</label><br>
                                  <input type="hidden" name="address_line_1" id="address_line_1">
                                  
                                  <div class="address">
                                    {{ $address }}
                                  </div>
                                </div>

                              </div>
                              <br>  
      
                       <div class="row col-md-12">

                        <div class="col-md-2">
                                  <label style="font-family: Times new roman;">Voucher No</label><br>
                                  <div class="">
                                    <input type="hidden" readonly="" id="voucher_no" name="voucher_no" value="{{ $receipt_note->rn_no }}">
                                    <font size="2">{{ $receipt_note->rn_no }}</font>
                                  </div>
                                
                                 
                                </div>

                                <div class="col-md-2">
                                  <label style="font-family: Times new roman;">Voucher Date</label><br>
                                <input type="date" class="form-control voucher_date  required_for_proof_valid" id="voucher_date" placeholder="Voucher Date" name="voucher_date" value="{{ $receipt_note->rn_date }}">
                                 
                                </div>

                        <div class="col-md-2">
                                  <label style="font-family: Times new roman;">Purchase Order No</label><br>
                                <select class="js-example-basic-multiple form-control po_no" 
                                data-placeholder="Choose Purchase Order No" onchange="po_details()" id="po_no" name="po_no" >
                                <option value="{{ $receipt_note->po_no }}">{{ $receipt_note->po_no }}</option>
                                @foreach($purchaseorders as $purchaseorders)
                                <option value="{{ $purchaseorders->po_no }}">{{ $purchaseorders->po_no }}</option>
                                  @endforeach 
                                 </select>
                                 
                                </div>

                        <div class="col-md-2">
                                  <label style="font-family: Times new roman;">Purchase Order Date</label><br>
                                <input type="date" class="form-control po_date  required_for_proof_valid" readonly="" id="po_date" placeholder="Voucher Date" name="po_date" value="{{ $receipt_note->po_date }}">
                                 
                                </div>
                                
                                
                                <div class="col-md-2">
                                  <label style="font-family: Times new roman;">Estimation No</label><br>
                                <select class="js-example-basic-multiple form-control p_estimation_no" 
                                data-placeholder="Choose Estimation No" onchange="estimation_details()" id="p_estimation_no" name="p_estimation_no" >
                                <option value="{{ $receipt_note->estimation_no }}">{{ $receipt_note->estimation_no }}</option>
                                @foreach($estimation as $key => $value)
                                <option value="{{ $value->estimation_no }}">{{ $value->estimation_no }}</option>
                                @endforeach  
                                 </select>
                                 
                                </div>
                                <div class="col-md-2">
                                  <label style="font-family: Times new roman;">Estimation Date</label><br>
                                <input type="date" class="form-control p_estimation_date  required_for_proof_valid" readonly="" id="p_estimation_date" placeholder="Gate Pass Entry Date" name="p_estimation_date" value="{{ $receipt_note->estimation_date }}">
                                 
                                </div>
                                </div>
                                <br>
                                <div class="row col-md-12">

                                  <div class="col-md-2">
                                  <label style="font-family: Times new roman;">Rejection Out No</label><br>
                                <select class="js-example-basic-multiple form-control r_out_no" 
                                data-placeholder="Choose Gate Pass Entry No" onchange="r_out_details()" id="r_out_no" name="r_out_no" >
                                <option value="{{ $receipt_note->r_out_no }}">{{ $receipt_note->r_out_no }}</option>
                                  @foreach($rejection_out as $key => $value)
                                  <option value="{{ $value->r_out_no}}">{{ $value->r_out_no }}</option>
                                  @endforeach
                                 </select>
                                 
                                </div>
                                <div class="col-md-2">
                                  <label style="font-family: Times new roman;">Rejection Out Date</label><br>
                                <input type="date" class="form-control r_out_date  required_for_proof_valid" readonly="" id="r_out_date" placeholder="Voucher Date" name="r_out_date" value="{{ $receipt_note->r_out_date }}">
                                 
                                </div>

                                  <div class="col-md-2">
                                  <label style="font-family: Times new roman;">Number Of Items</label><br>
                                  <input type="hidden" name="no_items" id="no_items">
                                  
                                  <div class="no_items">
                                    {{$no_items}}
                                  </div>
                                
                                 
                                </div>
                                <div class="col-md-2">
                                  <label style="font-family: Times new roman;">Invoice Value</label><br>
                                  <input type="hidden" name="invoice_val" id="invoice_val">
                                  
                                  <div class="invoice_val">
                                    {{$item_net_value_sum}}
                                  </div>
                                
                                 
                                </div>
                                <div class="col-md-2 purchase_order">
                                  <label style="font-family: Times new roman;">Purchase Type</label><br>
                                  <input type="hidden" name="purchase_type" id="purchase_type">
                                  
                                  <div class="purchase_type">
                                    {{$type}}
                                  </div>
                                
                                </div>

                                <div class="col-md-2 purchase_order">
                                  <label style="font-family: Times new roman;">Purchase Order Date</label><br>
                                  <input type="hidden" name="purchase_date" id="purchase_date">
                                  
                                  <div class="purchase_date">
                                    {{$purchaseorder_date}}
                                  </div>
                                </div>

                              </div>
                              <br>

                              <div class="row col-md-12 mb-3">

                                <div class="col-md-2">
                                  <label style="font-family: Times new roman;">Company Location</label><br>
                                <select class="js-example-basic-multiple form-control location" 
                                data-placeholder="Choose Company Location" id="location" name="location" >
                                <option value="{{ @$receipt_note->location }}">{{ @$receipt_note->locations->name }}</option>
                                @foreach($location as $key => $value)
                                <option value="{{ $value->id }}">{{ $value->name }}</option>
                                  @endforeach
                                 </select>
                                 
                                </div>

                                <div class="col-md-2">
                                  <label style="font-family: Times new roman;">Estimation No</label><br>
                                  <input type="hidden" name="estimation_no" id="estimation_no">
                                  
                                  <div class="estimation_no">
                                    {{$estimation_no}}
                                  </div>
                                
                                 
                                </div>

                                <div class="col-md-2">
                                  <label style="font-family: Times new roman;">Estimation Date</label><br>
                                  <input type="hidden" name="estimation_date" id="estimation_date">
                                  
                                  <div class="estimation_date">
                                    {{$estimation_date}}
                                  </div>
                                
                                 
                                </div>
                              </div>
                              
    
      <div class="col-md-8">
                       <div class="form-group row">
                       <div class="col-md-4">
                       <label for="validationCustom01" class=" col-form-label"><h4>Item Details:</h4> </label><br>
                       
                           
                       </div>
                         </div>
              </div>

      <div class="row col-md-12">
        <div class="col-md-2">
          <label style="font-family: Times new roman;">Item Bill S.No</label>
        <input type="text" class="form-control item_sno " placeholder="Item S.no" id="item_sno" name="item_sno" value="">
         
        </div>

        <div class="col-md-2">
          <label style="font-family: Times new roman;">Item Code</label>
          <input type="text" class="form-control item_code  required_for_proof_valid" placeholder="Item Code" id="item_code" name="item_code" value="" oninput="get_details()">

          <input type="hidden" class="form-control items_codes  required_for_proof_valid" placeholder="Item Code" id="items_codes" name="items_codes" value="">
               
              </div>
              
                      <div class="cat" id="cat" style="display: none;" title="Search Here">
                        <div class="row col-md-8">

                          <div class="col-md-4">
                            <input list="browsers" class="form-control" placeholder="Item Name" name="browse_item" id="browse_item" onchange="browse_item()">
                            <datalist id="browsers">
                              @foreach($item as $key => $value)
                              <option value="{{$value->name}}">
                              @endforeach
                            </datalist>
                          </div>

                          <div class="col-md-4">
                            <select class="js-example-basic-multiple form-control brand" id="brand" name="brand" style="width: 100%;" style="margin-left: 50%;" data-placeholder="Choose Brand Name" onchange="brand_check()">
                          <option></option>
                          <option value="0">Not Applicable</option>
                          @foreach($brand as $brands)
                          <option value="{{ $brands->id }}">{{ $brands->name }}</option>
                          @endforeach
                        </select>

                          </div>
                          <div class="col-md-4">
                            <select class="js-example-basic-multiple form-control categories" id="categories" name="category" style="width: 100%;" style="margin-left: 50%;" data-placeholder="Choose Category" onchange="categories_check()">
                          <option value=""></option>
                          @foreach($categories as $category)
                          <option value="{{ $category->id }}">{{ $category->name }}</option>
                          @endforeach
                        </select>
                          </div>
                          
                        </div><br>
                        
                        <div class="form-row">
                            <div class="col-md-12">
                              <table class="item_code_table" style="width: 100%;">
                                  <thead>
                                  <th style="font-family: Times New Roman;">Select One</th>
                                  <th style="font-family: Times New Roman;">Item Code</th>
                                  <th style="font-family: Times New Roman;">Item Name</th>
                                  <th style="font-family: Times New Roman;">MRP</th>
                                  <th style="font-family: Times New Roman;">UOM</th>
                                  <th style="font-family: Times New Roman;">Brand</th>
                                  <th style="font-family: Times New Roman;">Category</th>
                                  <!-- <th style="font-family: Times New Roman;">PTC Code</th> -->
                                  <th style="font-family: Times New Roman;">Barcode</th>
                                  
                                </thead>
                                <tbody class="append_item">
                                </tbody>
                                <tfoot>
                                  <th></th>
                                  <th></th>
                                  <th></th>
                                  <th></th>
                                  <th></th>
                                  <th></th>
                                  <th></th>
                                  <th></th>
                                  <!-- <th></th> -->
                                </tfoot>
                              </table>
                            </div>
                          </div>
                        <!-- <select class="js-example-basic-multiple form-control codes" id="codes" name="codes" style="width: 100%;" style="margin-left: 50%;" data-placeholder="Choose Item Code" onchange="code_check()">
                          <option></option>
                          @foreach($item as $items)
                          <option value="{{ $items->id }}">{{ $items->code }}</option>
                          @endforeach
                        </select><br> -->
                            
                      </div>


                      <div class="item_display" id="item_display" style="display: none;" title="Choose Item">
                        
                        <div class="form-row">
                            <div class="col-md-12">
                              <table class="item_code_table" style="width: 100%;">
                                  <thead>
                                  <th style="font-family: Times New Roman;">Select One</th>
                                  <th style="font-family: Times New Roman;">Item Code</th>
                                  <th style="font-family: Times New Roman;">Item Name</th>
                                  <th style="font-family: Times New Roman;">MRP</th>
                                  <th style="font-family: Times New Roman;">UOM</th>
                                  <th style="font-family: Times New Roman;">Brand</th>
                                  <th style="font-family: Times New Roman;">Category</th>
                                  <!-- <th style="font-family: Times New Roman;">PTC Code</th> -->
                                  <th style="font-family: Times New Roman;">Barcode</th>
                                  
                                </thead>
                                <tbody class="append_item_display">
                                </tbody>
                                <tfoot>
                                  <th></th>
                                  <th></th>
                                  <th></th>
                                  <th></th>
                                  <th></th>
                                  <th></th>
                                  <th></th>
                                  <th></th>
                                  <!-- <th></th> -->
                                </tfoot>
                              </table>
                            </div>
                          </div>
                        <!-- <select class="js-example-basic-multiple form-control codes" id="codes" name="codes" style="width: 100%;" style="margin-left: 50%;" data-placeholder="Choose Item Code" onchange="code_check()">
                          <option></option>
                          @foreach($item as $items)
                          <option value="{{ $items->id }}">{{ $items->code }}</option>
                          @endforeach
                        </select><br> -->
                            
                      </div>


                      <div class="col-md-2">
                        <label><font color="white" style="font-family: Times new roman;">Find</font></label><br>
                      <input type="button" onclick="find_cat()" class="btn btn-info" value="Find" name="" id="find">
                    </div>
                    <div class="col-md-2">
                      <label style="font-family: Times new roman;">Item Name</label>
                      <input type="text" class="form-control item_name  required_for_proof_valid" id="item_name" placeholder="Item Name" name="item_name" readonly="" id="item_name" value="">
                    </div>
                    <div class="col-md-2">
                      <label style="font-family: Times new roman;">MRP</label>
                      <input type="number" class="form-control mrp required_for_proof_valid" placeholder="MRP" id="mrp" name="mrp" value="">
                       
                      </div>

                      <input type="hidden" class="form-control hsn  required_for_proof_valid"  placeholder="HSN" id="hsn" name="hsn" value="">

                      <input type="hidden" class="form-control uom  required_for_proof_valid"  placeholder="UOM" id="uom" name="uom" value="">

                      <input type="hidden" class="form-control uom_name  required_for_proof_valid"  placeholder="UOM" id="uom_name" name="uom_name" value="">

                    <div class="col-md-2">
                        <label style="font-family: Times new roman;">Quantity</label>
                      <input type="number" class="form-control quantity" id="quantity"  placeholder="Quantity" name="quantity" onchange="qty()" pattern="[0-9]{0,100}" title="Numbers Only" value="">

                      <input type="hidden" class="form-control actual_qty" id="actual_qty" name="actual_qty" value="">
                      </div>
                      </div>
                      


                      <div class="row col-md-12">
                        <div class="col-md-2">
                        <label style="font-family: Times new roman;">Tax Rate%</label>
                      <input type="number" class="form-control tax_rate  required_for_proof_valid"  placeholder="Tax Rate%" oninput="gst_calc()" name="tax_rate" value="" id="tax_rate">
                      </div>
                      <input type="hidden" class="form-control gst  required_for_proof_valid" readonly="" placeholder="Tax Rate" name="gst" value="" id="gst">

                      <div class="col-md-2">
                        <label style="font-family: Times new roman;">Rate Exclusive Tax</label>
                        <div class="form-group row">
                          
                          <div class="col-sm-12">
                            <div class="input-group">
                              <div class="input-group-prepend">
                                <select class="form-control uom_exclusive" name="uom_exclusive" onchange="uom_details_exclusive()">
                                </select>
                              </div>
                              <input type="number" class="form-control exclusive_rate" id="exclusive" placeholder="Exclusive Tax" oninput="calc_exclusive()" name="exclusive" pattern="[0-9][0-9 . 0-9]{0,100}" title="Numbers Only" aria-label="Text input with dropdown button" value="">

                            </div>
                            
                          </div>
                        </div>

                      </div>

                      <div class="col-md-2">
                        <label style="font-family: Times new roman;">Rate Inclusive Tax</label>
                        <div class="form-group row">
                          
                          <div class="col-sm-12">
                            <div class="input-group">
                              <div class="input-group-prepend">
                                <select class="form-control  uom_inclusive" name="uom_inclusive" onchange="uom_details_inclusive()">
                                </select>
                              </div>
                              <input type="number" class="form-control inclusive_rate" id="inclusive" placeholder="Inclusive Tax" oninput="calc_inclusive()" name="inclusive" pattern="[0-9][0-9 . 0-9]{0,100}" aria-label="Text input with dropdown button" title="Numbers Only" value="">

                            </div>
                            
                          </div>
                        </div>

                      </div>







                      
                      <!-- <div class="col-md-2" id="rate_exclusive">
                        <label style="font-family: Times new roman;">Rate Exclusive Tax</label>
                      <input type="text" class="form-control exclusive_rate" id="exclusive" placeholder="Exclusive Tax" style="margin-right: 80px;" oninput="calc_exclusive()" name="exclusive" pattern="[0-9][0-9 . 0-9]{0,100}" title="Numbers Only" value="">
                      </div>
                      <input type="text" name="" id="rate_exclusive_disc_val">
                      <input type="text" name="" id="rate_inclusive_disc_val">
                      <div class="col-md-2"  id="rate_inclusive">
                        <label style="font-family: Times new roman;">Rate Inclusive Tax</label>
                      <input type="text" class="form-control inclusive_rate" id="inclusive" placeholder="Inclusive Tax" oninput="calc_inclusive()" name="inclusive" pattern="[0-9][0-9 . 0-9]{0,100}" title="Numbers Only" value="">
                      </div> -->
                      <div class="col-md-2">
                        <label style="font-family: Times new roman;">Discount %</label>
                      <input type="number" class="form-control discount_percentage" oninput="discount_calc1()" id="discount_percentage"  placeholder="Discount %" name="discount_percentage" pattern="[0-9]{0,100}" title="Numbers Only" value="">
                      </div>

                      <input type="hidden" class="form-control amount  required_for_proof_valid" placeholder="Amount" id="amount" pattern="[0-9][0-9 . 0-9]{0,100}" title="Numbers Only" name="amount" value="" >
                        
                      
                      <div class="col-md-2">
                          <label style="font-family: Times new roman;">Discount Rs</label>
                        <input type="number" class="form-control discount_rs  required_for_proof_valid" placeholder="Discount Rs" id="discount" pattern="[0-9][0-9 . 0-9]{0,100}" title="Numbers Only" oninput="discount_calc()" name="discount" value="" >
                        </div>

                        <input type="hidden" name="discounts" id="discounts" value="0">
                        <input type="hidden" name="disc_total" id="disc_total" value="0">

                        <input type="hidden" class="form-control net_price  required_for_proof_valid" id="net_price" placeholder="Net Price" pattern="[0-9][0-9 . 0-9]{0,100}" title="Numbers Only" name="net_price" value="">

                    </div>
                      <br>
                                                          
                     <div class="" align="center">
                                   
                    <input type="button" class="btn btn-success add_items" value="Add More" name="" id="add_items0">  

                    <input type="button" style="display: none" class="btn btn-success update_items" value="Update" name="" id="update_items"> 

                    <input type="hidden" name="" id="dummy_table_id"> 
                     </div> <br>              
                   
<style>
table, th, td {
  border: 1px solid #E1E1E1;
}
</style>
<div class="form-row">
             
              <div class="col-md-12" id="middlecol">
                
                <table class="table" id="team-list">
                  <thead>
                    <th> S.no </th>
                    <th> Item S.no </th>
                    <th> Item Code</th>
                    <th> Item Name</th>
                    <th> HSN</th>
                    <th> MRP</th>
                    <th> Unit Price</th>
                    <th> Quantity</th>
                    <th> UOM</th>
                    <th> Amount</th>
                    <th> Item Discount</th>
                    <th> Overall Discount</th>
                    <th> Expense</th>
                    <th> Tax Rs</th>
                    <th> Net Value</th>
                    <th style="background-color: #FAF860;"> Last Purchase Rate(LPR)</th>
                    <th>Action </th>
                  </thead>
                  <tbody class="append_proof_details" id="mytable">
                    
                  <input type="hidden" name="counts" value="{{ $item_row_count }}" id="counts">
                  <input type="hidden" name="expense_count" value="{{$expense_row_count}}" id="expense_count">
                  <input type="hidden" name="total_amount" value="{{$item_amount_sum}}" id="total_amount">
                  <input type="hidden" name="total_gst" value="{{$item_gst_rs_sum}}" id="total_gst">
                  <input type="hidden" name="total_price" value="{{$receipt_note->total_net_value}}" id="total_price">
                  <input type="hidden" name="last_purchase_rate" value="0" id="last_purchase_rate">

                  @foreach($receipt_note_items as $key => $value)
                  

                  <tr id="row{{ $key }}" class="{{ $key }} tables"><td><span class="item_s_no"> {{ $key+1 }} </span></td><td><div class="form-group row"><div class="col-sm-12"><input class="invoice_no{{ $key }}" type="hidden" id="invoice{{ $key }}" value="{{ $value->item_sno }}" name="invoice_sno[]"><font class="item_no{{ $key }}">{{ $value->item_sno }}</font></div></div></td><td><div class="form-group row"><div class="col-sm-12"><input type="hidden" class="item_code{{ $key }}" value="{{ $value->item_id }}" name="item_code[]"><font class="items{{ $key }}">{{ $value->item->code }}</font></div></div></td><td><div class="form-group row"><div class="col-sm-12"><input class="item_name{{ $key }}" type="hidden" value="{{ $value->item->name }}" name="item_name[]"><font class="font_item_name{{ $key }}">{{ $value->item->name }}</font></div></div></td><td><div class="form-group row"><div class="col-sm-12"><input class="hsn{{ $key }}" type="hidden" value="{{ $value->item->hsn }}" name="hsn[]"><font class="font_hsn{{ $key }}">{{ $value->item->hsn }}</font></div></div></td><td><div class="form-group row"><div class="col-sm-12"><input type="hidden" class="mrp{{ $key }}" value="{{ $value->mrp }}" name="mrp[]"><font class="font_mrp{{ $key }}">{{ $value->mrp }}</font></div></div></td><td><div class="form-group row"><div class="col-sm-12" id="unit_price"><input type="hidden" class="exclusive{{ $key }}" value="{{ $value->rate_exclusive_tax }}" name="exclusive[]"><font class="font_exclusive{{ $key }}">{{ $value->rate_exclusive_tax }}</font><input type="hidden" class="inclusive{{ $key }}" value="{{ $value->rate_inclusive_tax }}" name="inclusive[]"></div></div></td><td><div class="form-group row"><div class="col-sm-12"><input type="hidden" class="quantity{{ $key }}" value="{{ $value->qty }}" name="quantity[]"><font class="font_quantity{{ $key }}">{{ $value->qty }}</font><input type="hidden" class="actual_quantity" id="actual_quantity{{$key}}" value="{{ $value->qty }}" name="actual_quantity[]"></div></div></td><td><div class="form-group row"><div class="col-sm-12"><input type="hidden" class="uom{{ $key }}" value="{{ $value->uom->id }}" name="uom[]"><font class="font_uom{{ $key }}">{{ $value->uom->name }}</font></div></div></td><td><div class="form-group row"><div class="col-sm-12"><input type="hidden" class="table_amount" id="amnt{{ $key }}" value="{{ $item_amount[$key] }}" name="amount[]"><font class="font_amount{{ $key }}"> {{$item_amount[$key]}} </font></div></div></td><td><div class="form-group row"><div class="col-sm-12"><input type="hidden" class="input_discounts {{ $key }}" value="{{ $value->discount }}" id="input_discount{{ $key }}" ><input class="discount_val{{ $key }}" type="hidden" value="{{ $value->discount }}" name="discount[]"><font class="font_discount" id="font_discount{{ $key }}">{{ $value->discount }}</font></div></div></td><td><div class="form-group row"><div class="col-sm-12"><input type="hidden" class="overall_disc" id="overall_disc{{$key}}" value="{{$value->overall_disc}}" name="overall_disc[]"><font class="font_overall_disc{{$key}}">{{$value->overall_disc}}</font></div></div></td><td><div class="form-group row"><div class="col-sm-12"><input type="hidden" class="expenses {{$key}}" id="expenses{{$key}}" value="{{$value->expenses}}" name="expenses[]"><font class="font_expenses{{$key}}">{{$value->expenses}}</font></div></div></td><td><div class="form-group row"><div class="col-sm-12"><input type="hidden" class="table_gst" id="tax{{ $key }}" value="{{$item_gst_rs[$key]}}" name="gst[]"><input type="hidden" class="tax_gst{{ $key }}"  value="{{ $value->gst }}" name="tax_rate[]"><font class="font_gst{{ $key }}"> {{$item_gst_rs[$key]}} </font></div></div></td><td><div class="form-group row"><div class="col-sm-12"><input type="hidden" class="table_net_price" id="net_price{{ $key }}" value="{{ $item_net_value[$key] }}" name="net_price[]"><font class="font_net_price{{ $key }}">{{ $item_net_value[$key] }}</font></div></div></td><td style="background-color: #FAF860;"><div class="form-group row"><div class="col-sm-12"><center><font class="last_purchase{{ $key }}">{{ $net_value[$key] }}</font></center></div></div></td><td><i class="fa fa-eye px-2 py-1 bg-info  text-white rounded show_items" id="{{ $key }}" aria-hidden="true"></i><i class="fa fa-pencil px-2 py-1 bg-success  text-white rounded edit_items" id="{{ $key }}" aria-hidden="true"></i><i class="fa fa-trash px-2 py-1 bg-danger  text-white rounded remove_items" id="{{ $key }}" aria-hidden="true"></i></td></tr>

                  @endforeach

                  <div class="item_show" id="item_show" style="display: none;" title="Item Details">
                    <div class="row col-md-12">
                    <div class="col-md-3">
                      <label style="font-family: Times New Roman;">Item Code: <font class="show_item_code" style="font-weight: bold;"></font></label>
                    </div>
                    <div class="col-md-3">
                      <label style="font-family: Times New Roman;">Item Name: <font class="show_item_name" style="font-weight: bold;"></font></label>
                    </div>
                    <div class="col-md-3">
                      <label style="font-family: Times New Roman;">HSN: <font class="show_hsn" style="font-weight: bold;"></font></label>
                    </div>
                    <div class="col-md-3">
                      <label style="font-family: Times New Roman;">MRP: <font class="show_mrp" style="font-weight: bold;"></font></label>
                    </div>
                    </div>
                    <div class="row col-md-12">
                      <div class="col-md-3">
                        <label style="font-family: Times New Roman;">Unit Price: <font class="show_unit_price" style="font-weight: bold;"></font></label>
                      </div>
                      <div class="col-md-3">
                        <label style="font-family: Times New Roman;">Quantity: <font class="show_quantity" style="font-weight: bold;"></font></label>
                      </div>
                      <div class="col-md-3">
                        <label style="font-family: Times New Roman;">UOM: <font class="show_uom" style="font-weight: bold;"></font></label>
                      </div>
                      <div class="col-md-3">
                        <label style="font-family: Times New Roman;">Amount: <font class="show_amount" style="font-weight: bold;"></font></label>
                      </div>
                  </div>
                  <div class="row col-md-12">
                      <div class="col-md-3">
                        <label style="font-family: Times New Roman;">Discount: <font class="show_discount" style="font-weight: bold;"></font></label>
                      </div>
                      <div class="col-md-3">
                        <label style="font-family: Times New Roman;">GST Rs: <font class="show_gst_rs" style="font-weight: bold;"></font></label>
                      </div>
                      <div class="col-md-3">
                        <label style="font-family: Times New Roman;">Net Value: <font class="show_net_value" style="font-weight: bold;"></font></label>
                      </div>
                      <div class="col-md-3">
                        <label style="font-family: Times New Roman;">Last Purchase Rate: <font class="show_last_purchase" style="font-weight: bold;"></font></label>
                      </div>
                      
                  </div>
                  </div>

                  </tbody>
                  <tfoot>
                    <tr>
                      
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th><label class="total_amount">{{$item_amount_sum}}</label></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th><label class="total_net_price">{{$item_net_value_sum}}</label></th>
                      <th style="background-color: #FAF860;"></th>
                      <th></th>
                    </tr>
                  </tfoot>

                </table>
                
                       </div>
                       <div class="row col-md-12">

                        <div class="col-md-2">
                        <label style="font-family: Times new roman;">Discount(-)</label>
                      <input type="number" readonly="" class="form-control total_discount" id="total_discount" name="total_discount" pattern="[0-9]{0,100}" title="Numbers Only" value="{{ $item_discount_sum }}">
                      </div>
                      <div class="col-md-2">
                        <label style="font-family: Times new roman;">Overall Discount</label>
                      <input type="number" class="form-control overall_discount" id="overall_discount" name="overall_discount" oninput="overall_discounts()" pattern="[0-9]{0,100}" title="Numbers Only" value="{{ $receipt_note->overall_discount }}">
                      </div>
                    </div>


                    <!-- <div class="row col-md-12">
                            <div class="col-md-2">
                              <label style="font-family: Times new roman;">Expense Type</label>
                            </div>
                            <div class="col-md-2">
                              <label style="font-family: Times new roman;">Expense Amount</label>
                            </div>
                          </div> -->
                        <div class="row col-md-12 append_expense">
                          @if($expense_row_count > 0)
                          @foreach($receipt_note_expense as $key => $value)
                          <div class="row col-md-12 expense">
                            <div class="col-md-3">
                    <label style="font-family: Times new roman;">Expense Type</label><br>
                  <div class="form-group row">
                     <div class="col-sm-8">
                      <select class="js-example-basic-multiple col-12 form-control custom-select expense_type" name="expense_type[]" id="expense_type" >
                         @if(isset($value->expense_types->name) && !empty($value->expense_types->name))
                           <option value="{{ $value->expense_types->id }}">{{ $value->expense_types->name }}</option>
                           @else
                           <option value="">Choose Expense Type</option>
                           @endif
                         @foreach($account_head as $expense_types)
                        <option value="{{ $expense_types->id}}">{{ $expense_types->name}}</option>
                        @endforeach
                        </select>
                     </div>
                     <a href="{{ route('account_head.create')}}" target="_blank">
                     <button type="button"  class="px-2 btn btn-success ml-2" title="Add Expense"><i class="fa fa-plus-circle" aria-hidden="true"></i></button></a>
                     <button type="button"  class="px-2 btn btn-success mx-2 refresh_expense_type_id" title="Add Expense Type"><i class="fa fa-refresh" aria-hidden="true"></i></button>
                  </div>
               </div>
                        <!-- <div class="col-md-2">
                          <label style="font-family: Times new roman;">Expense Type</label>
                        <select class="js-example-basic-multiple form-control expense_type" 
                        data-placeholder="Choose Expense Type" id="expense_type" name="expense_type[]" >
                        <option value=""></option>
                        @foreach($expense_type as $expense_types)
                        <option value="{{ $expense_types->id}}">{{ $expense_types->name}}</option>
                        @endforeach
                           
                         </select>
                         
                        </div> -->
                      <div class="col-md-2">
                        <label style="font-family: Times new roman;">Expense Amount</label>
                      <input type="number" class="form-control expense_amount" id="expense_amount"  placeholder="Expense Amount" name="expense_amount[]" step="any" title="Numbers Only" value="{{ $value->expense_amount }}">

                      <input type="hidden" name="expense_total" id="expense_total" value="0" class="expense_total">

                      </div>
                      <div class="col-md-2">
                        <label style="font-family: Times new roman; color: white;">Add Expense</label><br>
                      <input type="button" class="btn btn-success" value="+" onclick="expense_add()" name="" id="add_expense">&nbsp;<input type="button" class="btn btn-danger remove_expense" value="-" name="" id="remove_expense">
                    </div>
                  </div>
                    @endforeach
                    @else
                    <div class="row col-md-12 expense">
                            <div class="col-md-3">
                    <label style="font-family: Times new roman;">Expense Type</label><br>
                  <div class="form-group row">
                     <div class="col-sm-8">
                      <select class="js-example-basic-multiple col-12 form-control custom-select expense_type" name="expense_type[]" id="expense_type" >
                         <option value="">Choose Expense Type</option>
                         @foreach($account_head as $expense_types)
                        <option value="{{ $expense_types->id}}">{{ $expense_types->name}}</option>
                        @endforeach
                        </select>
                     </div>
                     <a href="{{ route('account_head.create')}}" target="_blank">
                     <button type="button"  class="px-2 btn btn-success ml-2" title="Add Expense"><i class="fa fa-plus-circle" aria-hidden="true"></i></button></a>
                     <button type="button"  class="px-2 btn btn-success mx-2 refresh_expense_type_id" title="Add Expense Type"><i class="fa fa-refresh" aria-hidden="true"></i></button>
                  </div>
               </div>
                        <!-- <div class="col-md-2">
                          <label style="font-family: Times new roman;">Expense Type</label>
                        <select class="js-example-basic-multiple form-control expense_type" 
                        data-placeholder="Choose Expense Type" id="expense_type" name="expense_type[]" >
                        <option value=""></option>
                        @foreach($expense_type as $expense_types)
                        <option value="{{ $expense_types->id}}">{{ $expense_types->name}}</option>
                        @endforeach
                           
                         </select>
                         
                        </div> -->
                      <div class="col-md-2">
                        <label style="font-family: Times new roman;">Expense Amount</label>
                      <input type="number" class="form-control expense_amount" id="expense_amount"  placeholder="Expense Amount" name="expense_amount[]" step="any" title="Numbers Only" value="">

                      <input type="hidden" name="expense_total" id="expense_total" value="0" class="expense_total">

                      </div>
                      <div class="col-md-2">
                        <label style="font-family: Times new roman; color: white;">Add Expense</label><br>
                      <input type="button" class="btn btn-success" value="+" onclick="expense_add()" name="" id="add_expense">&nbsp;<input type="button" class="btn btn-danger remove_expense" value="-" name="" id="remove_expense">
                    </div>
                  </div>
                    @endif
                       </div>


                       <div class="col-md-12" style="float: right;">

                        <font color="black" style="font-size: 150%; margin-left: 700px; font-weight: 900;">NET Value :</font>&nbsp;<font class="total_net_value" style="font-size: 150%; font-weight: 900;">{{$receipt_note->total_net_value}}</font> 
                       </div>
                    <!-- net value -->



                       <div class="row col-md-12">

                        <div class="col-md-2">
                        <label style="font-family: Times new roman;">Round Off(+/-)</label>
                      <input type="text" class="form-control round_off" readonly="" value="{{ $receipt_note->round_off }}" id="round_off" name="round_off" >
                      </div>
                        
                        <!-- <div class="col-md-2">
                        <label style="font-family: Times new roman;">CGST</label>
                      <input type="text" class="form-control cgst" readonly="" id="cgst" name="cgst" value="0">
                      </div>

                      <div class="col-md-2">
                        <label style="font-family: Times new roman;">SGST</label>
                      <input type="text" class="form-control sgst" readonly="" id="sgst" name="sgst" value="0">
                      </div> -->

                       
                       <div class="row col-md-12 taxes mb-3">
                        @foreach($tax as $value)
                         <div class="col-md-2">
                           <label style="font-family: Times new roman;">{{ $value->taxes->name }}</label>
                      <input type="text" class="form-control {{ $value->taxes->id }}" readonly="" id="{{ $value->taxes->id }}" name="{{ $value->taxes->name }}" value="{{ $value->value }}">

                      <input type="hidden" name="{{ $value->taxes->name }}_id" value="{{ $value->taxes->id }}">
                      
                         </div>
                         @endforeach
                          

                       </div>


                       
                       <div class="row col-md-12 text-center">
                          <div class="col-md-12">
                            
                          <p>
                             <button class="btn btn-success save" name="save" value="0" type="submit">Update</button>
                              <button class="btn btn-warning print" name="save" value="1" type="submit">Update & Print</button>

                          </p>
                          
                        </div>

                      </div>
      </form>
                       
        <script type="text/javascript">
          var i=1;
          var discount_total = 0;

function calculate_total_net_price(){
  var total_net_price=0;
  $(".table_net_price").each(function(){
    total_net_price=parseFloat(total_net_price)+parseFloat($(this).val());
  });
  return total_net_price;
}
function calculate_total_amount(){
  var total_amount=0;
  $(".table_amount").each(function(){
    total_amount=parseFloat(total_amount)+parseFloat($(this).val());
  });
  return total_amount;
}
function calculate_total_gst(){
  var total_gst=0;
  $(".table_gst").each(function(){
    total_gst=parseFloat(total_gst)+parseFloat($(this).val());
  });
  return total_gst;
}

function calculate_total_discount()
{
  var q=0;
  var r=0;
    $(".input_discounts").each(function(){
    q = parseFloat(q)+parseFloat($(this).val());
    });
    $(".overall_disc").each(function(){
    r = parseFloat(r)+parseFloat($(this).val());
    });
    var total = parseFloat(q)+parseFloat(r);
    return total;
  
  

}

$(document).on("keyup",".expense_amount",function()
{
  var total = $('#total_price').val();
  var e_amount = $('.expense_amount').val();
  if(total == 0)
  {
    alert('You Cannot Add Expense Without Adding Item Details!!');
    $('.expense_amount').val('');
    $('.expense_type').val('');
    $('Select').select2();
  }
  else
  {
    if(e_amount == '' || e_amount == 0)
    {
      $(".expense_type").each(function(){
      if($(this).val() == '')
    {
      $(this).removeAttr('required');
      //$('.expense_amount').val('');
    }
    });
    }
    else
    {
      $(".expense_type").each(function(){
      if($(this).val() == '')
    {
      $(this).attr('required','required');
      //$('.expense_amount').val('');
    }
    });
    }
    
    total_expense_cal();
    individual_expense();
    roundoff_cal();
  }
  
});
function individual_expense()
{
$('.expenses').each(function(){

  var count = $(this).attr('class').split(' ')[1];
  var total_amount =calculate_total_amount();
    var total_expense = total_expense_cal();
    var amount = $('#amnt'+count).val();
    var gst_rs = $('#tax'+count).val();
    var discount = $('.discount_val'+count).val();
    var overall_disc = $('#overall_disc'+count).val();
    var sum_of_total_discount = parseFloat(discount)+parseFloat(overall_disc);
    var exp_distribution = parseFloat(total_expense)/parseFloat(total_amount)*parseFloat(amount);
    var total_exp = parseFloat(0)+parseFloat(exp_distribution);


    var net_value = parseFloat(amount)+parseFloat(gst_rs)-parseFloat(sum_of_total_discount)+parseFloat(total_exp);
  $('#net_price'+count).val(net_value.toFixed(2));
    $('.font_net_price'+count).text(net_value.toFixed(2));
    $('.font_expenses'+count).text(total_exp.toFixed(2));

    $(this).val(total_exp);

});

var total_net_price=calculate_total_net_price();

$(".total_net_price").html(parseFloat(total_net_price));
$('.total_net_value').text(total_net_price.toFixed(2));
$('#total_price').val(total_net_price.toFixed(2));
  
}

function total_expense_cal(){

  var total_amount=calculate_total_net_price();
  var total_expense_amount=0;
  $(".expense_amount").each(function(){
 if($(this).val() !=""){
total_expense_amount=parseFloat(total_expense_amount)+parseFloat($(this).val());
 }
  });

  var total_net_amount=parseFloat(total_amount)+parseFloat(total_expense_amount);
   // $('.total_net_value').text(total_net_amount.toFixed(2));
   // $('#total_price').val(total_net_amount.toFixed(2));
   return total_expense_amount;
}

function roundoff_cal()
{
  var substr = $("#total_price").val().split('.');
if(substr[1] >= 50)
{
  var round_off = 100-substr[1];
  var symbol ='+'+'0.'+round_off;
  $("#round_off").val(symbol);
}
else if(substr[1] == 5 || substr[1] == 6 || substr[1] == 7 || substr[1] == 8 || substr[1] == 9)
{
  var sub = substr[1]+'0';
  var round_off = 100-sub;
  var symbol ='+'+'0.'+round_off;
  $("#round_off").val(symbol);
}
else if(substr[1] == '01' || substr[1] == '02' || substr[1] == '03' || substr[1] == '04' || substr[1] =='05' || substr[1] == '06' || substr[1] == '07' || substr[1] == '08' || substr[1] == '09')
{
  var symbol ='-'+'0.'+substr[1];
  $("#round_off").val(symbol);
}
else if(typeof substr[1] == 'undefined')
{
  var symbol = 0;
  $("#round_off").val(symbol);
}
else if(substr[1] == '00')
{
  var symbol = 0;
  $("#round_off").val(symbol);
}
else if(substr[1] < 50)
{
  var symbol ='-'+'0.'+substr[1];
  $("#round_off").val(symbol);
}
}
function add_items()
{
  var j=$('#mytable tr:last').attr('class');
 var l=parseInt(i)+1;
 var voucher_date=$('.voucher_date').val();
 var invoice_no=$('.item_sno').val();
 var uom_name = $('.uom_name').val();
 var uom_id = $('.uom').val();
 // var item_code=$("#items_codes option:selected");
 // var item_code=item_code.text();
 var item_code=$("#item_code").val();
 var items_codes=$('#items_codes').val();
 var item_name=$('.item_name').val();
 var mrp=$('.mrp').val();
 var hsn=$('.hsn').val();
 var gst=$('.gst').val();
 var quantity=$('.quantity').val();
 var tax_rate=$('.tax_rate').val();
 var exclusive=$('#exclusive').val();
 var inclusive=$('#inclusive').val();
 var amount=$('.amount').val();
 var discounts=$('#discounts').val();
 var discount=$('#discount').val();
 var discount_percentage=$('.discount_percentage').val();
 var discount_rs=$('.discount_rs').val();
 var net_price=$('.net_price').val();

 if($('.discount_percentage').val() == '' && $('.discount_rs').val() == '')
  {
    discounts = 0;
  }
   
 if(amount == '')
 {
  var amount=0;
 }
 if(net_price == '')
 {
  var net_price=0;
 }

 if(item_code == '' || quantity == '' || exclusive == '' && inclusive == '')
 {
  alert('Please Fill All The Input Fields');
 }
 else if(item_name == '')
 {
  alert('Sorry There Is No  Such Item Code!!');
  $("#item_code").val('');
  $("#item_code").focus();
 }

 // else if(parseFloat(net_price)>parseFloat(mrp) && parseFloat(mrp) != 0)
 // {
 //  alert('The Total Net Value Exceeds The MRP!!');
 //    $('#discount').val('');
 //    $('.discount_percentage').val('');
 //    $('#exclusive').val('');
 //    $('#inclusive').val('');
 //    $('.amount').val('');
 //    $('.net_price').val('');
 //    $('.gst').val('');
 // }
 else
 {


  var last_purchase_rate = $('#last_purchase_rate').val();
 
  var items='<tr id="row'+i+'" class="'+i+' tables"><td><span class="item_s_no"> 1 </span></td><td><div class="form-group row"><div class="col-sm-12"><input class="invoice_no'+i+'" type="hidden" id="invoice'+i+'" value="'+invoice_no+'" name="invoice_sno[]"><font class="item_no'+i+'">'+invoice_no+'</font></div></div></td><td><div class="form-group row"><div class="col-sm-12"><input type="hidden" class="item_code'+i+'" value="'+items_codes+'" name="item_code[]"><font class="items'+i+'">'+item_code+'</font></div></div></td><td><div class="form-group row"><div class="col-sm-12"><input class="item_name'+i+'" type="hidden" value="'+item_name+'" name="item_name[]"><font class="font_item_name'+i+'">'+item_name+'</font></div></div></td><td><div class="form-group row"><div class="col-sm-12"><input class="hsn'+i+'" type="hidden" value="'+hsn+'" name="hsn[]"><font class="font_hsn'+i+'">'+hsn+'</font></div></div></td><td><div class="form-group row"><div class="col-sm-12"><input type="hidden" class="mrp'+i+'" value="'+mrp+'" name="mrp[]"><font class="font_mrp'+i+'">'+mrp+'</font></div></div></td><td><div class="form-group row"><div class="col-sm-12" id="unit_price"><input type="hidden" class="exclusive'+i+'" value="'+exclusive+'" name="exclusive[]"><font class="font_exclusive'+i+'">'+exclusive+'</font><input type="hidden" class="inclusive'+i+'" value="'+inclusive+'" name="inclusive[]"></div></div></td><td><div class="form-group row"><div class="col-sm-12"><input type="hidden" class="quantity'+i+'" value="'+quantity+'" name="quantity[]"><font class="font_quantity'+i+'">'+quantity+'</font></div></div></td><td><div class="form-group row"><div class="col-sm-12"><input type="hidden" class="uom'+i+'" value="'+uom_id+'" name="uom[]"><font class="font_uom'+i+'">'+uom_name+'</font></div></div></td><td><div class="form-group row"><div class="col-sm-12"><input type="hidden" class="table_amount" id="amnt'+i+'" value="'+amount+'" name="amount[]"><font class="font_amount'+i+'">'+amount+'</font></div></div></td><td><div class="form-group row"><div class="col-sm-12"><input type="hidden" class="input_discounts '+i+'" value="'+discounts+'" id="input_discount'+i+'" ><input class="discount_val'+i+'" type="hidden" value="'+discounts+'" name="discount[]"><font class="font_discount" id="font_discount'+i+'">'+discounts+'</font></div></div></td><td><div class="form-group row"><div class="col-sm-12"><input type="hidden" class="overall_disc" id="overall_disc'+i+'" value="0" name="overall_disc[]"><font class="font_overall_disc'+i+'">0</font></div></div></td><td><div class="form-group row"><div class="col-sm-12"><input type="hidden" class="expenses '+i+'" id="expenses'+i+'" value="0" name="expenses[]"><font class="font_expenses'+i+'">0</font></div></div></td><td><div class="form-group row"><div class="col-sm-12"><input type="hidden" class="table_gst" id="tax'+i+'" value="'+gst+'" name="gst[]"><input type="hidden" class="tax_gst'+i+'"  value="'+tax_rate+'" name="tax_rate[]"><font class="font_gst'+i+'">'+gst+'</font></div></div></td><td><div class="form-group row"><div class="col-sm-12"><input type="hidden" class="table_net_price" id="net_price'+i+'" value="'+net_price+'" name="net_price[]"><font class="font_net_price'+i+'">'+net_price+'</font></div></div></td><td style="background-color: #FAF860;"><div class="form-group row"><div class="col-sm-12"><center><font class="last_purchase'+i+'">'+last_purchase_rate+'</font></center></div></div></td><td><i class="fa fa-eye px-2 py-1 bg-info  text-white rounded show_items" id="'+i+'" aria-hidden="true"></i><i class="fa fa-pencil px-2 py-1 bg-success  text-white rounded edit_items" id="'+i+'" aria-hidden="true"></i><i class="fa fa-trash px-2 py-1 bg-danger  text-white rounded remove_items" id="'+i+'" aria-hidden="true"></i></td></tr>'

  $('.append_proof_details').append(items);
var length=$('#mytable tr:last').attr('class').split(' ')[0];

for(var m=0;m<length+1;m++)
{

  var invoice_num = $('#invoice'+m).val();
  
  for(var n=m+1;n<=length+1;n++)
  {
    
    if(typeof $('#invoice'+n).val() == 'undefined')
    {

    }
    else
    {
      var invoice_num1 = $('#invoice'+n).val();

      if(invoice_num == invoice_num1)
      {
        alert('Item S.No is Alredy Taken!');
        $('#row'+i).remove();
      }
      else
      {
        
      }
    }
  }
}

// for(var m=0;m<length+1;m++)
// {

//   var item_code_id_first = $('.item_code'+m).val();
  
//   for(var n=m+1;n<=length+1;n++)
//   {
    
//     if(typeof $('.item_code'+n).val() == 'undefined')
//     {

//     }
//     else
//     {
//       var item_code_id_second = $('.item_code'+n).val();

//       if(item_code_id_first == item_code_id_second)
//       {
//         alert('Item is Alredy Taken!');
//         $('#row'+i).remove();
//       }
//       else
//       {
        
//       }
//     }
//   }
// }

var total_net_price=calculate_total_net_price();
var total_amount=calculate_total_amount();
var total_gst=calculate_total_gst();

$("#total_price").val(total_net_price.toFixed(2));
$(".total_net_value").text(total_net_price.toFixed(2));
$("#total_amount").val(total_amount.toFixed(2));
$("#total_gst").val(total_gst.toFixed(2));
$("#igst").val(total_gst.toFixed(2));
var half_gst = parseFloat(total_gst)/2;
$("#cgst").val(half_gst.toFixed(2));
$("#sgst").val(half_gst.toFixed(2));

var to_html_total_net = total_net_price.toFixed(2);
var to_html_total_amount = total_amount.toFixed(2);
$(".total_net_price").html(parseFloat(to_html_total_net));
$(".total_amount").html(parseFloat(to_html_total_amount));


var q=calculate_total_discount();
$('#total_discount').val(q.toFixed(2));
$('#disc_total').val(q.toFixed(2));
total_expense_cal();
individual_expense();
overall_discounts();
roundoff_cal();

var len=$('.tables').length;
$('#counts').val(len);
i++;

// var array=[invoice_no,voucher_date,items_codes,item_code,item_name,mrp,hsn,quantity,tax_rate,gst,exclusive,uom_id,uom_name,inclusive,amount,discount,discount_percentage,net_price];

// var array_new=[voucher_date,receipt_note_no,supplier_invoice_no,supplier_invoice_date,
//               supplier_details,order_details,transport_details,remarks,supplier_invoice_value];

// $.ajax({
//            type: "GET",
//             url: "{{ url('purchase/get_items/{id}') }}",
//             data: { id: len },
//            success: function(data) {
//              // console.log(data);
//              $('#items_codes').children('option:not(:first)').remove();
//              for (var k=0; k < data.length; k++)
//             {
//              name =data[k].name;
//              code =data[k].code;
//              id =data[k].id;
//               names = name.replace('','');
//               codes = code.replace('','');
              
//               var div_data="<option value="+id+">"+codes+"</option>";
                
//                 $(div_data).appendTo('#items_codes');

//             }
//            }
           
//         });



$('#cat').hide();
$('.item_sno').val('');
$('.items_codes').val('');
$('.item_name').val('');
$('.mrp').val('');
$('.hsn').val('');
$('.quantity').val('');
$('.tax_rate').val('');
$('#exclusive').val('');
$('#inclusive').val('');
$('.amount').val('');
$('#discount').val('');
$('#discounts').val('');
$('.discount_percentage').val('');
$('.net_price').val('');
$('.gst').val('');
$('.item_code').val('');
$('#last_purchase_rate').val(0);
$('.uom_inclusive').children('option').remove();
$('.uom_exclusive').children('option').remove();
$("select").select2();
}
} 
$(document).on("click",".add_items",function(){
    add_items();
    item_details_sno();

  });

$(document).on("click",".remove_items",function(){
  

     var button_id = $(this).attr("id");
     var data_val = $('.item_code'+button_id).val();
     var invoice_no=$('.invoice_no'+button_id).val();

     $('#row'+button_id).remove();
     var q=calculate_total_discount();
     $('#total_discount').val(q.toFixed(2));
     $('#disc_total').val(q.toFixed(2));
     var counts = $('#counts').val();
     $('#counts').val(counts-1); 
     item_details_sno();

       
        
        

    var total_net_price=calculate_total_net_price();
    var to_html_total_net = total_net_price.toFixed(2);

    $(".total_net_price").html(parseFloat(to_html_total_net));

    var total_amount=calculate_total_amount();
    var to_html_total_amount = total_amount.toFixed(2);
    $(".total_amount").html(parseFloat(to_html_total_amount));
    $(".total_net_value").text(to_html_total_net);
    var total_gst=calculate_total_gst();

    $("#total_price").val(total_net_price.toFixed(2));
    $("#total_amount").val(total_amount.toFixed(2));
    $("#total_gst").val(total_gst.toFixed(2));
    $("#igst").val(total_gst.toFixed(2));
    var half_gst = parseFloat(total_gst)/2;
    $("#cgst").val(half_gst.toFixed(2));
    $("#sgst").val(half_gst.toFixed(2));
    total_expense_cal();
    individual_expense();
    overall_discounts();
    roundoff_cal();

    $.ajax({
           type: "GET",
            url: "{{ url('receipt_note/remove_data/{id}') }}",
            data: { data_val: data_val },
           success: function(data) {
             console.log(data);

             for(var new_val = 0; new_val < data[1].cnt; new_val++)
             {
              var tax_master_id = data[1].tax_master[new_val];

              var tax_master_input_val = $('#'+tax_master_id).attr('class').split(' ')[1];

              if(tax_master_id == tax_master_input_val)
              {
                var sub = parseFloat($('#'+tax_master_id).val()) - parseFloat(data[1].tax_val[new_val]);

                $('#'+tax_master_id).val(sub);
              }
              else
              {

              }

             }


             
           }
        });
    
    $('#cat').hide();
    $('.item_sno').val('');
    $('.items_codes').val('');
    $('.item_name').val('');
    $('.mrp').val('');
    $('.hsn').val('');
    $('.quantity').val('');
    $('.tax_rate').val('');
    $('#exclusive').val('');
    $('#inclusive').val('');
    $('.amount').val('');
    $('#discount').val('');
    $('#discounts').val('');
    $('.discount_percentage').val('');
    $('.net_price').val('');
    $('.gst').val('');
    $('.item_code').val('');
    $('#last_purchase_rate').val(0);
    $('.uom_inclusive').children('option').remove();
    $('.uom_exclusive').children('option').remove();
    $("select").select2();
    $('.add_items').show();
    $('.update_items').hide();
    

    $.ajax({
           type: "POST",
            url: "{{ url('purchase/remove_data/') }}",
            data: { invoice_no: invoice_no, gatepass_no: gatepass_no },
           success: function(data) {
             // console.log(data);
             
           }
        });


  
});

$(document).on("click",".edit_items",function(){
  $('.update_items').show();
  $('.add_items').hide();

  var id = $(this).attr("id");
  $('#dummy_table_id').val(id);
  var invoice_no = $('.invoice_no'+id).val(); 
  var item_code_id = $('.item_code'+id).val();
  var item_code_name = $('.items'+id).text(); 
  var item_name = $('.item_name'+id).val();
  var hsn = $('.hsn'+id).val(); 
  var mrp = $('.mrp'+id).val();
  var discount_val = $('.discount_val'+id).val(); 
  var exclusive = $('.exclusive'+id).val();
  var inclusive = $('.inclusive'+id).val(); 
  var quantity = $('.quantity'+id).val();
  var actual_qty = $('#actual_quantity'+id).val();
  var uom = $('.uom'+id).val(); 
  var uom_name = $('.font_uom'+id).text();
  var amnt = $('#amnt'+id).val();
  var tax = $('#tax'+id).val(); 
  var tax_gst = $('.tax_gst'+id).val();
  var net_price = $('#net_price'+id).val(); 
  var last_purchase_rate = $('.last_purchase'+id).text();

  $('.exclusive_rate').val(exclusive);
  $('.inclusive_rate').val(inclusive);
  $('.item_sno').val(invoice_no);
  $('.items_codes').val(item_code_id);
  $('.item_name').val(item_name);
  $('.item_code').val(item_code_name);
  $('.mrp').val(mrp);
  $('.hsn').val(hsn);
  $('.quantity').val(quantity);
  $('.actual_qty').val(actual_qty);
  $('.tax_rate').val(tax_gst);
  $('.amount').val(amnt);
  $('.net_price').val(net_price);
  $('.gst').val(tax);
  $('.uom').val(uom);
  $('.uom_name').val(uom_name);
  $('#last_purchase_rate').val(last_purchase_rate);
  var disc_value = parseFloat(discount_val)/parseFloat(quantity);
   $('.discount_rs').val(disc_value.toFixed(2));
   discount_calc();
   
  if(discount_val == 0)
  {
    $('.discount_percentage').val('');
  $('.discount_rs').val('');
  }
   // item_codes(item_code_id);

});

$(document).on("click",".refresh_supplier_id",function(){
      var supplier_dets=refresh_supplier_master_details();
      $(".supplier_id").html(supplier_dets);
   });

$(document).on("click",".refresh_agent_id",function(){
      var agent_dets=refresh_agent_master_details();
      $(".agent_id").html(agent_dets);
   });

$(document).on("click",".refresh_expense_type_id",function(){
      var expense_type_dets=refresh_expense_type_master_details();
      $(".expense_type").html(expense_type_dets);
   });

$(document).on("click",".update_items",function(){
  var discount_total = 0;

  var td_id = $('#dummy_table_id').val(); 

 var invoice_no=$('.item_sno').val();
 var item_code=$("#item_code").val();
 var item_name=$('.item_name').val();
 var mrp=$('.mrp').val();
 var quantity=$('.quantity').val();
 var exclusive=$('#exclusive').val();
 var inclusive=$('#inclusive').val();
 var net_price=$('.net_price').val();
  
  if(item_code == '' || quantity == '' || exclusive == '' && inclusive == '')
 {
  alert('Please Fill All The Input Fields');
 }
 else if(item_name == '')
 {
  alert('Sorry There Is No  Such Item Code!!');
  $("#item_code").val('');
  $("#item_code").focus();
 }
 // else if(parseFloat(inclusive)>parseFloat(mrp))
 // {
 //  alert('Rate Exceeds The MRP!!');
 //  $('#exclusive').val('');
 //  $('#inclusive').val('');
 // }

 else
 {
  
  $('.invoice_no'+td_id).val($('.item_sno').val());
  $('.item_no'+td_id).text($('.item_sno').val());
  $('.item_code'+td_id).val($('.items_codes').val());
  $('.items'+td_id).text($('.item_code').val());
  $('.item_name'+td_id).val($('.item_name').val());
  $('.font_item_name'+td_id).text($('.item_name').val());
  $('.hsn'+td_id).val($('.hsn').val());
  $('.font_hsn'+td_id).text($('.hsn').val());
  $('.mrp'+td_id).val($('.mrp').val());
  $('.font_mrp'+td_id).text($('.mrp').val());
  $('.exclusive'+td_id).val($('.exclusive_rate').val());
  $('.font_exclusive'+td_id).text($('.exclusive_rate').val());
  $('.inclusive'+td_id).val($('.inclusive_rate').val());
  $('.quantity'+td_id).val($('.quantity').val());
  $('#actual_quantity'+td_id).val($('.actual_qty').val());
  $('.font_quantity'+td_id).text($('.quantity').val());
  $('.uom'+td_id).val($('.uom').val());
  $('.font_uom'+td_id).text($('.uom_name').val());
  $('#amnt'+td_id).val($('.amount').val());
  $('.font_amount'+td_id).text($('.amount').val());
  $('#tax'+td_id).val($('.gst').val());
  $('.tax_gst'+td_id).val($('.tax_rate').val());
  $('.font_gst'+td_id).text($('.gst').val());
  $('.last_purchase'+td_id).text($('#last_purchase_rate').val());


   if($('.discount_percentage').val() == '' && $('.discount_rs').val() == '')
   {
    var discount=0;
    $('.discount_val'+td_id).val(discount);
    $('#font_discount'+td_id).text(discount);
    $('#input_discount'+td_id).val(discount);
    var q=calculate_total_discount();
    $('#total_discount').val(q.toFixed(2));
    $('#disc_total').val(q.toFixed(2));

   }
   else
   {
    $('.discount_val'+td_id).val($('#discounts').val());
    $('#font_discount'+td_id).text($('#discounts').val());
    $('#input_discount'+td_id).val($('#discounts').val());
    var q=calculate_total_discount();
    $('#total_discount').val(q.toFixed(2));
    $('#disc_total').val(q.toFixed(2));
   }

  $('#net_price'+td_id).val($('.net_price').val());
  $('.font_net_price'+td_id).text($('.net_price').val());

  var total_net_price=calculate_total_net_price();
  var total_amount=calculate_total_amount();
  var total_gst=calculate_total_gst();
  $("#total_price").val(total_net_price.toFixed(2));
  $(".total_net_value").text(total_net_price.toFixed(2));
  $("#total_amount").val(total_amount.toFixed(2));
  $("#total_gst").val(total_gst.toFixed(2));
  $("#igst").val(total_gst.toFixed(2));
  var half_gst = parseFloat(total_gst)/2;
  $("#cgst").val(half_gst.toFixed(2));
  $("#sgst").val(half_gst.toFixed(2));
  var to_html_total_net = total_net_price.toFixed(2);
  var to_html_total_amount = total_amount.toFixed(2);
  $(".total_net_price").html(parseFloat(to_html_total_net));
  $(".total_amount").html(parseFloat(to_html_total_amount));
  total_expense_cal();
  individual_expense();
  overall_discounts();
  roundoff_cal();

  

  
  $('.item_sno').val('');
  $('.items_codes').val('');
  $('.item_name').val('');
  $('.mrp').val('');
  $('.hsn').val('');
  $('.quantity').val('');
  $('.tax_rate').val('');
  $('#exclusive').val('');
  $('#inclusive').val('');
  $('.amount').val('');
  $('#discount').val('');
  $('.discount_percentage').val('');
  $('.net_price').val('');
  $('.gst').val('');
  $('.item_code').val('');
  $('#discounts').val('');
  $('#last_purchase_rate').val(0);
  $('.uom_inclusive').children('option').remove();
  $('.uom_exclusive').children('option').remove();
  $("select").select2();
  $('.update_items').hide();
  $('.add_items').show();
  
  }
  
  });

$(document).on("click",".show_items",function(){
  var id = $(this).attr("id");
  $('.item_show').dialog({width : 1000}).prev(".ui-dialog-titlebar").css("background","#28a745");
  $('.show_item_code').text($('.items'+id).text());
  $('.show_item_name').text($('.item_name'+id).val());
  $('.show_hsn').text($('.hsn'+id).val());
  $('.show_mrp').text($('.mrp'+id).val());
  $('.show_unit_price').text($('.exclusive'+id).val());
  $('.show_quantity').text($('.quantity'+id).val());
  $('.show_uom').text($('.font_uom'+id).text());
  $('.show_amount').text($('#amnt'+id).val());
  $('.show_discount').text($('.discount_val'+id).val());
  $('.show_gst_rs').text($('#tax'+id).val());
  $('.show_net_value').text($('#net_price'+id).val());
  $('.show_last_purchase').text($('.last_purchase'+id).text());

});

function expense_add()
{
  
  if($("#total_price").val() == 0 || $("#total_price").val() == '')
  {
    alert('You Cannot Add Expense Without Adding Item Details!!');
  }
  else
  {

  var expense_details='<div class="row col-md-12 expense"><div class="col-md-3"><label style="font-family: Times new roman;">Expense Type</label><br><div class="form-group row"><div class="col-sm-8"><select class="js-example-basic-multiple col-12 form-control custom-select expense_type" name="expense_type[]"><option value="">Choose Expense Type</option>@foreach($expense_type as $expense_types)<option value="{{ $expense_types->id}}">{{ $expense_types->type}}</option>@endforeach</select></div><a href="{{ url("master/expense-type/create")}}" target="_blank"><button type="button"  class="px-2 btn btn-success ml-2" title="Add Expense type"><i class="fa fa-plus-circle" aria-hidden="true"></i></button></a><button type="button"  class="px-2 btn btn-success mx-2 refresh_expense_type_id" title="Add Expense Type"><i class="fa fa-refresh" aria-hidden="true"></i></button></div></div><div class="col-md-2"><label style="font-family: Times new roman;">Expense Amount</label><input type="number" class="form-control expense_amount"  placeholder="Expense Amount" name="expense_amount[]" pattern="[0-9]{0,100}" title="Numbers Only" value=""></div><div class="col-md-2"><label><font color="white" style="font-family: Times new roman;">Add Expense</font></label><br><input type="button" class="btn btn-success" value="+" onclick="expense_add()" name="" id="add_expense">&nbsp;<input type="button" class="btn btn-danger remove_expense" value="-" name="" id="remove_expense"></div></div>'

  $('.append_expense').append(expense_details);
  $("select").select2();
  total_expense_cal();
  roundoff_cal();
  var length=$('.expense').length;
  $('#expense_count').val(length);

  }

}

$(document).on("click",".remove_expense",function(){

  if($(".remove_expense").length > 1){

    $(this).closest('.expense').remove();
    var length = $('#expense_count').val();

    $('#expense_count').val(length-1);
  }
  else{
    alert("Atleast One row present");

  }
  total_expense_cal();
  individual_expense();
  overall_discounts();
  roundoff_cal();

  });

function item_details_sno(){
  $(".item_s_no").each(function(key,index){
      $(this).html((key+1));
    });
}


  $("form").submit(function(e){
  if($('#total_price').val() == 0 || $('#total_price').val() == '')
  {
    alert('There Is No Row To Submit');
    e.preventDefault();
  }
  else
  {

  }    
    });

  
function qty()
{
  var actual_qty= $('#actual_qty').val();
  var qty = $('.quantity').val();
  if(parseInt(qty) > parseInt(actual_qty))
  {
    alert('Quantity Exceeds!');
    $('.quantity').val('')
  }
  var rate_exclusive = $('#exclusive').val();
  var rate_inclusive = $('#inclusive').val();

  if(rate_exclusive == '' && rate_inclusive == '')
  {

  }
  else
  {
    calc_exclusive();
  }
}

function gst_calc()
{
  var quantity = $('#quantity').val();
  var rate_exclusive = $('#exclusive').val();
  var rate_inclusive = $('#inclusive').val();
  var tax_rate = $('.tax_rate').val();

  if(rate_exclusive != '' && rate_inclusive != '' && quantity != '')
  {
    calc_exclusive();
  }
  else
  {

  }
}


function calc_exclusive()
{
  var quantity = $('#quantity').val();
  var rate_exclusive = $('#exclusive').val();
  var rate_inclusive = $('#inclusive').val();
  var tax_rate = $('.tax_rate').val();
  var mrp = $('.mrp').val();



  if (quantity == '') 
  {
    alert('Please Enter Quantity First');
    $('#exclusive').val('');
    $('#inclusive').val('');
    $('#quantity').focus();
  }

  // else if(mrp == '')
  // {
  //   alert('Please Select Any Item');
  //   $('#exclusive').val('');
  //   $('#inclusive').val('');
  // }
  // else if(parseFloat(rate_inclusive)>parseFloat(mrp))
  // {
  //   alert('Rate Exceeds The MRP!!');
  //   $('#exclusive').val('');
  //   $('#inclusive').val('');
  // }
  
  else
  {
    // if(quantity == 0)
    // {
    //   quantity =1;
    //   $('#quantity').val(1);
    // }
  
      var total = parseInt(quantity)*parseFloat(rate_exclusive);
    
    $('#amount').val(total.toFixed(2));

    if(tax_rate == '')
    {
      $('#net_price').val(total.toFixed(2));
    }
    else
    {

      var rate = parseFloat(tax_rate)/100;
      var gst_rate = parseFloat(rate_exclusive)*parseFloat(rate);
      var gst_rate_inclusive = parseFloat(rate_exclusive)+parseFloat(gst_rate);
      $('#inclusive').val(gst_rate_inclusive.toFixed(2));
      if($('#inclusive').val()>parseFloat(mrp))
      {
        if(mrp == 0 || mrp == '')
        {
          var net_val = parseFloat(total)*parseFloat(rate);
      //alert(net_val);
          $('.gst').val(net_val.toFixed(2));

          var total_net_val = parseFloat(total)+parseFloat(net_val);
          $('#net_price').val(total_net_val.toFixed(2));
        }
        else
        {
          alert('Rate Exceeds The MRP!!');
        $('#exclusive').val('');
        $('#inclusive').val('');
        }
        
      }
      else
      {
        //alert(rate);
      var net_val = parseFloat(total)*parseFloat(rate);
      //alert(net_val);
      $('.gst').val(net_val.toFixed(2));

      var total_net_val = parseFloat(total)+parseFloat(net_val);
      $('#net_price').val(total_net_val.toFixed(2));
      }
      

    }

   } 
  
}

function calc_inclusive()
{
  
  var quantity = $('#quantity').val();
  var rate_exclusive = $('#exclusive').val();
  var rate_inclusive = $('#inclusive').val();
  var mrp = $('.mrp').val();
  var tax_rate = $('.tax_rate').val();
  

  if (quantity == '') 
  {
    alert('Please Enter Quantity First');
    $('#exclusive').val('');
    $('#inclusive').val('');
    $('#quantity').focus();
  }
  // else if(mrp == '')
  // {
  //   alert('Please Select Any Item');
  //   $('#exclusive').val('');
  //   $('#inclusive').val('');
  // }
  
  // else if(parseFloat(rate_inclusive)>parseFloat(mrp))
  // {
  //   if(mrp == 0 || mrp == '')
  //       {

  //       }
  //       else
  //       {
  //         alert('Rate Exceeds The MRP!!');
  //       $('#exclusive').val('');
  //       $('#inclusive').val('');
  //       }
  // }
    else
    {
    if(tax_rate == '')
    {
      $('#net_price').val(total.toFixed(2));
    }
    else
    {
      // if(quantity == 0)
      // {
      //   quantity =1;
      //   $('#quantity').val(1);
      // }

      var rate=parseFloat(tax_rate)/100+1;
      var actual_tax = parseFloat(tax_rate)/100;
      var gst_rate = parseFloat(rate_inclusive)/parseFloat(rate);
      var total = parseInt(quantity)*parseFloat(gst_rate.toFixed(2));
      $('#amount').val(total.toFixed(2));
      $('#exclusive').val(gst_rate.toFixed(2));
      if(parseFloat(rate_inclusive)>parseFloat(mrp))
      {
        if(mrp == 0 || mrp == '')
            {

            }
            else
            {
              alert('Rate Exceeds The MRP!!');
            $('#exclusive').val('');
            $('#inclusive').val('');
            }
      }
      var net_val = parseFloat(total)*parseFloat(actual_tax);
      $('.gst').val(net_val.toFixed(2));
      var total_net_val = parseFloat(total)+parseFloat(net_val);
      $('#net_price').val(total_net_val.toFixed(2));

    }

  }
    
  
}

function calc_tax()
{
  
  $("#exclusive").attr('readonly','readonly');
  $("#inclusive").removeAttr('readonly');
  $("#inclusive").focus();
  $("#exclusive").val('');
  $("#amount").val('');
  $("#net_price").val('');
  $("#discount").val('');
  
}

function calc_tax1()
{
  
  
  $("#exclusive").removeAttr('readonly');
  $("#inclusive").attr('readonly','readonly');
  $("#exclusive").focus();
  $("#inclusive").val('');
  $("#amount").val('');
  $("#net_price").val('');
  $("#discount").val('');
}

function discount_calc()
{
  var discount = $(".discount_rs").val();
  var discount_percentage = $(".discount_percentage").val();
  //alert(discount_percentage);
  var amount = $("#amount").val();
  var quantity = $("#quantity").val();
  var exclusive = $("#exclusive").val();
  var inclusive = $("#inclusive").val();
  var tax_rate = $("#tax_rate").val();
 
  if(amount == '' || quantity == '' || exclusive == '' && inclusive == '')
  {
    alert('There is no amount to Discount');
    $("#quantity").val('');
    $("#exclusive").val('');
    $("#inclusive").val('');
    $("#amount").val('');
    $(".discount_percentage").val('');
    $(".discount_rs").val('');
    $(".gst").val('');

  }

  else if(discount == '' && discount_percentage == '')
  {
    
  }

  else
  {

  // var rate_exclusive_disc_val = parseFloat(exclusive) - parseFloat(discount);
  // var rate_inclusive_disc_val = parseFloat(inclusive) - parseFloat(discount);

  // $('#rate_exclusive_disc_val').val(rate_exclusive_disc_val.toFixed(2));
  // $('#rate_inclusive_disc_val').val(rate_inclusive_disc_val.toFixed(2));
  var disc_amount_exclusive = parseFloat(discount)*100/parseFloat(exclusive);

   $(".discount_percentage").val(disc_amount_exclusive.toFixed(2));

  calc_exclusive();
  var amount = $(".amount").val();
  var discounts = parseInt(quantity)*parseFloat(discount);
  $('#discounts').val(discounts.toFixed(2));
  var rate=parseFloat(tax_rate)/100;
  var net_val = parseFloat(amount)*parseFloat(rate);
  $('.gst').val(net_val.toFixed(2));

  var total_net_val = parseFloat(amount)+parseFloat(net_val);
  total_net_val = parseFloat(total_net_val)-parseFloat(discounts);
  $('#net_price').val(total_net_val.toFixed(2));

  }
  
}

function discount_calc1()
{
  var discount = $(".discount_rs").val();
  var discount_percentage = $(".discount_percentage").val();
  var amount = $("#amount").val();
  var quantity = $("#quantity").val();
  var exclusive = $("#exclusive").val();
  var inclusive = $("#inclusive").val();
  var tax_rate = $("#tax_rate").val();
 
  if(amount == '' || quantity == '' || exclusive == '' && inclusive == '')
  {
    alert('There is no amount to Discount');
    $("#quantity").val('');
    $("#exclusive").val('');
    $("#inclusive").val('');
    $("#amount").val('');
    $(".discount_percentage").val('');
    $(".discount_rs").val('');
    $(".gst").val('');
  }
  else if(discount == '' && discount_percentage == '')
  {

  }
  
  else
  {

  var disc_rate = parseFloat(discount_percentage)/100;
  var disc_val_exclusive = parseFloat(exclusive)*parseFloat(disc_rate);
  var disc_val_inclusive = parseFloat(inclusive)*parseFloat(disc_rate);
  
  var disc_amount_exclusive = parseFloat(exclusive)-parseFloat(disc_val_exclusive);
  var disc_amount_inclusive = parseFloat(inclusive)-parseFloat(disc_val_inclusive);

  $(".discount_rs").val(disc_val_exclusive.toFixed(2));
  calc_exclusive();
  var amount = $(".amount").val();
  var discounts = parseInt(quantity)*parseFloat(disc_val_exclusive.toFixed(2));
  $('#discounts').val(discounts.toFixed(2));
  var rate=parseFloat(tax_rate)/100;
  var net_val = parseFloat(amount)*parseFloat(rate);
  $('.gst').val(net_val.toFixed(2));

  var total_net_val = parseFloat(amount)+parseFloat(net_val);
  total_net_val = parseFloat(total_net_val)-parseFloat(discounts);
  $('#net_price').val(total_net_val.toFixed(2));

  }
  
  
  
}

function item_codes(item_code,append_value)
{

if(append_value == 1)
{
  var row_id=$('#last').val();

      $.ajax({  
        
        type: "GET",
        url: "{{ url('receipt_note/getdata/{id}') }}",
        data: { id: item_code },             
                        
        success: function(data){ 
          //alert(data);
             // $('.uom_exclusive').children('option:(:first)').remove();
             // $('.uom_inclusive').children('option:(:first)').remove();
             $('.uom_exclusive').children('option').remove();
             $('.uom_inclusive').children('option').remove();

             id = data[0].item_id;
             name =data[0].item_name;
             code =data[0].code;
             mrp =data[0].mrp;
             hsn =data[0].hsn;
             uom_id =data[0].uom_id;
             ptc_code =data[0].ptc;
             uom_name =data[0].uom_name;
             igst =data[1].igst;
             barcode = data[2].barcode;

             for(var new_val = 0; new_val < data[1].cnt; new_val++)
             {
              var tax_master_id = data[1].tax_master[new_val];

              var tax_master_input_val = $('#'+tax_master_id).attr('class').split(' ')[1];

              if(tax_master_id == tax_master_input_val)
              {
                var sum = parseFloat($('#'+tax_master_id).val()) + parseFloat(data[1].tax_val[new_val]);

                $('#'+tax_master_id).val(sum);
              }
              else
              {

              }

             }

              var first_data='<option value="'+id+'">'+uom_name+'</option>';
              $('.uom_exclusive').append(first_data);
              $('.uom_inclusive').append(first_data);
              for(var i=0;i<data[3].length;i++)
             {
              var item_uom_id=data[3][i].id;
              var item_uom_name=data[3][i].name;
              var item_id=data[3][i].item_id;
              if(item_uom_name == uom_name)
              {

              }
              else
              {
                var div_data='<option value="'+item_id+'">'+item_uom_name+'</option>';
                $('.uom_exclusive').append(div_data);
                $('.uom_inclusive').append(div_data);
              }
              
             }
                       
             //$('#item_code').val(code);
             $('#items_codes').val(id);
            $('#item_name').val(name);
             $('#mrp').val(mrp);
             $('#hsn').val(hsn);
             $('#uom').val(uom_id);
              $('#uom_name').val(uom_name);
             $('#tax_rate').val(igst);
             $('#quantity').val(1);

             
             $('.item_display').dialog('close');
             $('#exclusive').focus();

              var rate_exclusive = $('#exclusive').val();
              var rate_inclusive = $('#inclusive').val();
              var quantity = $('#quantity').val();
              var tax_rate = $('.tax_rate').val();
              var total = parseInt(quantity)*parseFloat(rate_exclusive);
              $('#amount').val(total.toFixed(2));
              if(tax_rate == '')
              {
                $('#net_price').val(total.toFixed(2));
              }
              
              var rate = parseFloat(tax_rate)/100;
              var gst_rate = parseFloat(rate_exclusive)*parseFloat(rate);
              var gst_rate_inclusive = parseFloat(rate_exclusive)+parseFloat(gst_rate);
              $('#inclusive').val(gst_rate_inclusive.toFixed(2));
              var net_val = parseFloat(total)*parseFloat(rate);
      
              $('.gst').val(net_val.toFixed(2));

              var total_net_val = parseFloat(total)+parseFloat(net_val);
              $('#net_price').val(total_net_val.toFixed(2));
             
        }

    });

      $.ajax({
           type: "POST",
            url: "{{ url('receipt_note/last_purchase_rate/') }}",
            data: { id: item_code },
           success: function(data) {
             $('#last_purchase_rate').val(data);
             
           }
        });
}
else
{
  var row_id=$('#last').val();

      $.ajax({  
        
        type: "GET",
        url: "{{ url('receipt_note/getdata/{id}') }}",
        data: { id: item_code },             
                        
        success: function(data){ 
          //console.log(data);
              $('.uom_exclusive').children('option').remove();
              $('.uom_inclusive').children('option').remove();
             // $('.uom_inclusive').children('option:not(:first)').remove();
             id = data[0].item_id;
             name =data[0].item_name;
             code =data[0].code;
             mrp =data[0].mrp;
             hsn =data[0].hsn;
             uom_id =data[0].uom_id;
             ptc_code =data[0].ptc;
             uom_name =data[0].uom_name;
             igst =data[1].igst;
             barcode = data[2].barcode;

             for(var new_val = 0; new_val < data[1].cnt; new_val++)
             {
              var tax_master_id = data[1].tax_master[new_val];

              var tax_master_input_val = $('#'+tax_master_id).attr('class').split(' ')[1];

              if(tax_master_id == tax_master_input_val)
              {
                var sum = parseFloat($('#'+tax_master_id).val()) + parseFloat(data[1].tax_val[new_val]);

                $('#'+tax_master_id).val(sum);
              }
              else
              {

              }

             }
              
              var first_data='<option value="'+id+'">'+uom_name+'</option>';
              //console.log(first_data);
              $('.uom_exclusive').append(first_data);
              $('.uom_inclusive').append(first_data);
              for(var i=0;i<data[3].length;i++)
             {
              var item_uom_id=data[3][i].id;
              var item_uom_name=data[3][i].name;
              var item_id=data[3][i].item_id;
              if(item_uom_name == uom_name)
              {

              }
              else
              {
                var div_data='<option value="'+item_id+'">'+item_uom_name+'</option>';
                $('.uom_exclusive').append(div_data);
                $('.uom_inclusive').append(div_data);
              }
              
             }
                       
             $('#item_code').val(code);
             $('#items_codes').val(id);
            $('#item_name').val(name);
             $('#mrp').val(mrp);
             $('#hsn').val(hsn);
             $('#uom').val(uom_id);
              $('#uom_name').val(uom_name);
             $('#tax_rate').val(igst);
             $('#quantity').val(1);

             
             $('#cat').dialog('close');
             $('#exclusive').focus();

              var rate_exclusive = $('#exclusive').val();
              var rate_inclusive = $('#inclusive').val();
              var quantity = $('#quantity').val();
              var tax_rate = $('.tax_rate').val();
              var total = parseInt(quantity)*parseFloat(rate_exclusive);
              $('#amount').val(total.toFixed(2));
              if(tax_rate == '')
              {
                $('#net_price').val(total.toFixed(2));
              }
              var rate = parseFloat(tax_rate)/100;
              var gst_rate = parseFloat(rate_exclusive)*parseFloat(rate);
              var gst_rate_inclusive = parseFloat(rate_exclusive)+parseFloat(gst_rate);
              $('#inclusive').val(gst_rate_inclusive.toFixed(2));
              var net_val = parseFloat(total)*parseFloat(rate);
      
              $('.gst').val(net_val.toFixed(2));

              var total_net_val = parseFloat(total)+parseFloat(net_val);
              $('#net_price').val(total_net_val.toFixed(2));
             
        }

    });

      $.ajax({
           type: "POST",
            url: "{{ url('receipt_note/last_purchase_rate/') }}",
            data: { id: item_code },
           success: function(data) {
             // console.log(data);
             $('#last_purchase_rate').val(data);
             
           }
        });
}


}

function get_details()
{

  var item_code=$('#item_code').val();
  //$('#item_code').val('');
  $('#items_codes').val('');
  $('#item_name').val('');
  $('#mrp').val('');
  $('#hsn').val('');
  $('#uom').val('');
  $('#uom_name').val('');
  $('#tax_rate').val('');
//
$("select").select2();
var row_id=$('#last').val();

      $.ajax({  
        
        type: "GET",
        url: "{{ url('receipt_note/getdata_item/{id}') }}",
        data: { id: item_code },             
                        
        success: function(data){
         console.log(data);
             if(data[3]==1)
             {
              // $('.uom_exclusive').children('option').remove();
              // $('.uom_inclusive').children('option').remove();
             //$('.uom_inclusive').children('option:not(:first)').remove();
             id = data[0].item_id;

             item_codes(id);
            //  name =data[0].item_name;
            //  code =data[0].code;
            //  mrp =data[0].mrp;
            //  hsn =data[0].hsn;
            //  uom_id =data[0].uom_id;
            //  uom_name =data[0].uom_name;
            //  igst =data[1].igst;

            //  var first_data='<option value="'+code+'">'+uom_name+'</option>';
            //   $('.uom_exclusive').append(first_data);
            //   $('.uom_inclusive').append(first_data);

            //  for(var i=0;i<data[2].length;i++)
            //  {
            //   var item_uom_id=data[2][i].id;
            //   var item_uom_name=data[2][i].name;
            //   var item_uom_code=data[2][i].item_code;
            //   if(item_uom_name == uom_name)
            //   {

            //   }
            //   else
            //   {
            //     var div_data='<option value="'+item_uom_code+'">'+item_uom_name+'</option>';
            //   $('.uom_exclusive').append(div_data);
            //   $('.uom_inclusive').append(div_data);
            //   }

            //  }


            //  $('#item_code').val(item_code);
            //  $('#items_codes').val(id);
            //  $('#item_name').val(name);
            //  $('#mrp').val(mrp);
            //  $('#hsn').val(hsn);
            //  $('#uom').val(uom_id);
            //  $('#uom_name').val(uom_name);
            //  $('#tax_rate').val(igst);
            //  $('#quantity').focus();
            //  $('#cat').hide();


            //  if($('#quantity').val() != '')
            //  {
              
              
            //   var rate_exclusive = $('#exclusive').val();
            //   var rate_inclusive = $('#inclusive').val();
            //   var quantity = $('#quantity').val();
            //   var tax_rate = $('.tax_rate').val();
            //   var total = parseInt(quantity)*parseFloat(rate_exclusive);
            //   $('#amount').val(total.toFixed(2));
            //   if(tax_rate == '')
            //   {
            //     $('#net_price').val(total.toFixed(2));
            //   }
              
            //   var rate = parseFloat(tax_rate)/100;
            //   var gst_rate = parseFloat(rate_exclusive)*parseFloat(rate);
            //   var gst_rate_inclusive = parseFloat(rate_exclusive)+parseFloat(gst_rate);
            //   $('#inclusive').val(gst_rate_inclusive.toFixed(2));
            //   var net_val = parseFloat(total)*parseFloat(rate);
      
            //   $('.gst').val(net_val.toFixed(2));

            //   var total_net_val = parseFloat(total)+parseFloat(net_val);
            //   $('#net_price').val(total_net_val.toFixed(2));
            //  }
            // else
            // {

            // }

             }
                    
             else
             {
              item_with_same_data(item_code);
             }
              
        }

    });
      var item_id=$('#items_codes').val();
      $.ajax({

           type: "POST",
            url: "{{ url('receipt_note/last_purchase_rate/') }}",
            data: { id: item_id },
           success: function(data) {
             $('#last_purchase_rate').val(data);
             
           }
        });


}

function item_with_same_data(item_code)
{
  $.ajax({

        type: "GET",
        url: "{{ url('receipt_note/same_items/{id}') }}",
        data: { id: item_code },

        success:function(data){
          console.log(data);
          $('.item_display').show();
          $('.item_display').dialog({width:1000},{height:250});
          $('.append_item_display').html(data);
        }

  })
}


function find_cat()
{
  
  $('#categories').val("");
  $('#brand').val("");
  $("select").select2();
  $('#browse_item').val("");
  $('#cat').show();
  $('.row_brand').remove(); 
  $('.row_category').remove();
  $('#cat').dialog({width:900},{height:250}).prev(".ui-dialog-titlebar").css("background","#28a745").prev(".ui-dialog.ui-widget-content");
    
}

function browse_item()
{
  var browse_item = $('#browse_item').val();
  $.ajax({  
        
        type: "GET",
        url: "{{ url('receipt_note/browse_item/{id}') }}",
        data: { browse_item: browse_item},             
             
        success: function(data){
          $('.row_brand').remove(); 
        $('.row_category').remove(); 
        $(".append_item").html(data);
        }
      });
}

function categories_check()
{
  var  categories=$('#categories').val();
  var  brand=$('#brand').val();
  if(brand == '')
  {
    brand ='no_val';
  }
  $.ajax({  
        
        type: "GET",
        url: "{{ url('receipt_note/change_items/{id}') }}",
        data: { categories: categories, brand: brand },             
             
        success: function(data){ 
          

          

          
        $('.row_brand').remove(); 
        $('.row_category').remove(); 
        $(".append_item").html(data);
        return false;
          var bar_code = [];
          var item_id =[];
          var item_code =[];
          var item_name =[];
          var item_brand_id =[];
          var item_brand_name =[];
          var item_category_name =[];
          var item_category_id =[];
          var item_ptc =[];
          var barcode_last = data.length-1;
          var item_last = data[barcode_last].length;
          for(var i=0;i<barcode_last;i++)
          {
            
             bar_code.push(data[i][0].barcode);
             item_brand_name.push(data[i][0].brand_name)
            
          }
          for(var j=0;j<item_last;j++)
            {
              item_code.push(data[item_last][j].item_code);
              item_id.push(data[item_last][j].item_id);
              item_name.push(data[item_last][j].item_name);
              if(data[item_last][j].brand_id == 0)
              {
                item_brand_name.push('Not Applicable');
              }
              else
              {
                item_brand_id.push(data[item_last][j].brand_id);
              }
              item_category_name.push(data[item_last][j].category_name);
              item_category_id.push(data[item_last][j].categories_id);
              item_ptc.push(data[item_last][j].ptc);
            }

            for (var k=0; k < barcode_last; k++)
            {

              var table_data='<tr class="row_category"><td><input type="hidden" value="'+item_id[k]+'" class="append_item_id'+k+'"><input type="hidden" value="'+item_code[k]+'" class="append_item_code'+k+'"><font style="font-family: Times new roman;">'+item_code[k]+'</font></td><td><input type="hidden" value="'+item_name[k]+'" class="append_item_name'+k+'"><font style="font-family: Times new roman;">'+item_name[k]+'</font></td><td><input type="hidden" value="'+item_brand_id[k]+'" class="append_item_brand_name'+k+'"><font style="font-family: Times new roman;">'+item_brand_name[k]+'</font></td><td><input type="hidden" value="'+item_category_id[k]+'" class="append_item_brand_name'+k+'"><font style="font-family: Times new roman;">'+item_category_name[k]+'</font></td><td><input type="hidden" value="'+item_ptc[k]+'" class="append_item_brand_name'+k+'"><font style="font-family: Times new roman;">'+item_ptc[k]+'</font></td><td><input type="hidden" value="'+bar_code[k]+'" class="append_item_brand_name'+k+'"><font style="font-family: Times new roman;">'+bar_code[k]+'</font></td><td><center><input type="radio" name="select" onclick="add_data('+k+')"></center></td></tr>';
                
                $(table_data).appendTo('.append_item');

            }
        }


    });
}

function brand_check()
{
  
  var brand = $('.brand').val();
  

  $.ajax({

        type: "POST",
        url: "{{ url('receipt_note/brand_filter/') }}",
        data: {brand: brand },             
             
        success: function(data)
        {
          $('.row_category').remove();
          $('.row_brand').remove();
          $(".append_item").html(data);
          return false;

          var bar_code = [];
          var item_id =[];
          var item_code =[];
          var item_name =[];
          var item_brand_id =[];
          var item_brand_name =[];
          var item_category_name =[];
          var item_category_id =[];
          var item_ptc =[];
          var item_mrp =[];
          var barcode_last = data.length-1;
          var item_last = data[barcode_last].length;
          for(var i=0;i<barcode_last;i++)
          {
            //console.log(data[i][0].barcode);
             bar_code.push(data[i][0].barcode);
            
          }
          for(var j=0;j<item_last;j++)
            {
              item_code.push(data[item_last][j].item_code);
              item_id.push(data[item_last][j].item_id);
              item_name.push(data[item_last][j].item_name);
              item_brand_id.push(data[item_last][j].brand_id);
              item_brand_name.push(data[item_last][j].brand_name);
              item_category_name.push(data[item_last][j].category_name);
              item_category_id.push(data[item_last][j].categories_id);
              item_ptc.push(data[item_last][j].ptc);
              item_mrp.push(data[item_last][j].mrp);
            }

            for (var k=0; k < barcode_last; k++)
            {

              var table_data='<tr class="row_brand"><td><center><input type="radio" name="select" onclick="add_data('+k+')"></center></td><td><input type="hidden" value="'+item_id[k]+'" class="append_item_id'+k+'"><input type="hidden" value="'+item_code[k]+'" class="append_item_code'+k+'"><font style="font-family: Times new roman;">'+item_code[k]+'</font></td><td><input type="hidden" value="'+item_name[k]+'" class="append_item_name'+k+'"><font style="font-family: Times new roman;">'+item_name[k]+'</font></td><td><input type="hidden" value="'+item_mrp[k]+'" class="append_item_name'+k+'"><font style="font-family: Times new roman;">'+item_mrp[k]+'</font></td><td><input type="hidden" value="'+item_brand_id[k]+'" class="append_item_brand_name'+k+'"><font style="font-family: Times new roman;">'+item_brand_name[k]+'</font></td><td><input type="hidden" value="'+item_category_id[k]+'" class="append_item_brand_name'+k+'"><font style="font-family: Times new roman;">'+item_category_name[k]+'</font></td><td><input type="hidden" value="'+item_ptc[k]+'" class="append_item_brand_name'+k+'"><font style="font-family: Times new roman;">'+item_ptc[k]+'</font></td><td><input type="hidden" value="'+bar_code[k]+'" class="append_item_brand_name'+k+'"><font style="font-family: Times new roman;">'+bar_code[k]+'</font></td></tr>';
                
                $(table_data).appendTo('.append_item');

            }
        }

  });
}

function add_data(val)
{
  // $('.item_display').dialog('close');
  item_codes($('.append_item_id'+val).val(),$('.append_value'+val).val());
}
function add_append_data(val)
{
  item_codes($('.item_id'+val).val(),$('.append_value'+val).val());
}

function code_check()
{
  
  item_codes();
  
}

function supplier_details()
{

  var supplier_id=$('.supplier_id').val();


  $.ajax({
           type: "POST",
            url: "{{ url('receipt_note/address_details/') }}",
            data: { supplier_id : supplier_id },
           success: function(data) {
            var result = JSON.parse(data);
            console.log(result.po_options);
            $('#address_line_1').val(result.address);
           $('.address').text(result.address);
           $('.p_estimation_no').children('option:not(:first)').remove()
            .end().append(result.estimation_options);
            $('.po_no').children('option:not(:first)').remove()
            .end().append(result.po_options);
           }
        });
}


function estimation_details()
{

  var p_estimation_no=$('.p_estimation_no').val();
  
  $('.po_no').val('');
  $('.po_date').val('');
  $('.r_out_no').val('');
  $('.r_out_date').val('');
  $('select').select2();

  $.ajax({
           type: "POST",
            url: "{{ url('receipt_note/estimation_details/') }}",
            data: { p_estimation_no : p_estimation_no },
           success: function(data) {
            $('.tables').remove();
            $('.expense').remove();
            $('.purchase_type').hide();
            $('.purchase_date').hide();
            // $('.purchase_order').hide();
            var result=JSON.parse(data);
            if(result.status>0){
$('.append_proof_details').append(result.data);
var expense_length=$(".expense_type").length;
if(expense_length >1)
{
$('.append_expense').append(result.expense_typess);
$('#expense_count').val(result.expense_cnt);
}
else if(result.expense_cnt == 0)
{
  $('.append_expense').html(result.expense_typess);
  $('#expense_count').val(result.expense_cnt+1);
}
else
{
  $('.append_expense').html(result.expense_typess);
  $('#expense_count').val(result.expense_cnt);
}
$('.taxes').html(result.tax_append);
$('#counts').val(result.status);
$('.no_items').text(result.status);
$('.invoice_val').text(result.item_net_value_sum);
$('.estimation_date').text(result.date_estimation);
$('.p_estimation_date').val(result.date_estimation);
$('.estimation_no').text(result.estimation_no);

$('#total_discount').val(result.item_discount_sum);
$('.overall_discount').val(result.overall_discount);
$('.overall_discount').attr('readonly','readonly');
$('#round_off').val(result.round_off);
$('.total_net_value').text(result.total_net_value);
$('#total_price').val(result.total_net_value);
$('#po_date').val(result.date_purchaseorder);
 

var total_net_price=calculate_total_net_price();
var total_amount=calculate_total_amount();
var total_gst=calculate_total_gst();
$("#total_gst").val(total_gst.toFixed(2));
    $("#igst").val(total_gst.toFixed(2));
    var half_gst = parseFloat(total_gst)/2;
    $("#cgst").val(half_gst.toFixed(2));
    $("#sgst").val(half_gst.toFixed(2));
var q=calculate_total_discount();
$('#total_discount').val(q.toFixed(2));
$('#disc_total').val(q.toFixed(2));
total_expense_cal();
overall_discounts();
roundoff_cal();


var to_html_total_net = total_net_price.toFixed(2);
var to_html_total_amount = total_amount.toFixed(2);
$(".total_net_price").html(parseFloat(to_html_total_net));
$(".total_amount").html(parseFloat(to_html_total_amount));




            }
           }
        });
}



function po_details()
{

  var po_no=$('.po_no').val();
  $('.purchase_type').show();
  $('.purchase_date').show();
  $('.p_estimation_no').val('');
  $('.p_estimation_date').val('');
  $('.r_out_no').val('');
  $('.r_out_date').val('');
  $('select').select2();

  $.ajax({
           type: "POST",
            url: "{{ url('receipt_note/po_details/') }}",
            data: { po_no : po_no },
           success: function(data) {
            $('.tables').remove();
            $('.expense').remove();
            var result=JSON.parse(data);
            if(result.status>0){
$('.append_proof_details').append(result.data);
var expense_length=$(".expense_type").length;
if(expense_length >1)
{
$('.append_expense').append(result.expense_typess);
$('#expense_count').val(result.expense_cnt);
}
else if(result.expense_cnt == 0)
{
  $('.append_expense').html(result.expense_typess);
  $('#expense_count').val(result.expense_cnt+1);
}
else
{
  $('.append_expense').html(result.expense_typess);
  $('#expense_count').val(result.expense_cnt);
}
$('.taxes').html(result.tax_append);
$('#counts').val(result.status);
$('.no_items').text(result.status);
$('.invoice_val').text(result.item_net_value_sum);
if(result.purchase_type == 1)
$('.purchase_type').text('Cash Purchase');
else
$('.purchase_type').text('Credit Purchase');
$('.purchase_date').text(result.date_purchaseorder);
$('.estimation_date').text(result.date_estimation);
$('.estimation_no').text(result.estimation_no);

$('#total_discount').val(result.item_discount_sum);
$('.overall_discount').val(result.overall_discount);
$('.overall_discount').attr('readonly','readonly');
$('#round_off').val(result.round_off);
$('.total_net_value').text(result.total_net_value);
$('#total_price').val(result.total_net_value);
$('#po_date').val(result.date_purchaseorder);
 

var total_net_price=calculate_total_net_price();
var total_amount=calculate_total_amount();
var total_gst=calculate_total_gst();
$("#total_gst").val(total_gst.toFixed(2));
    $("#igst").val(total_gst.toFixed(2));
    var half_gst = parseFloat(total_gst)/2;
    $("#cgst").val(half_gst.toFixed(2));
    $("#sgst").val(half_gst.toFixed(2));
var q=calculate_total_discount();
$('#total_discount').val(q.toFixed(2));
$('#disc_total').val(q.toFixed(2));
total_expense_cal();
overall_discounts();
roundoff_cal();


var to_html_total_net = total_net_price.toFixed(2);
var to_html_total_amount = total_amount.toFixed(2);
$(".total_net_price").html(parseFloat(to_html_total_net));
$(".total_amount").html(parseFloat(to_html_total_amount));




            }
           }
        });
}

function r_out_details()
{

  var r_out_no=$('.r_out_no').val();
  $('.p_estimation_no').val('');
  $('.p_estimation_date').val('');
  $('.po_no').val('');
  $('.po_date').val('');
  $('actual_qty').val('');
  $('select').select2();

  $('.purchase_type').text('');
  $('.purchase_date').text('');
  $('.estimation_date').text('');
  $('.estimation_no').text('');


  $.ajax({
           type: "POST",
            url: "{{ url('receipt_note/r_out_details/') }}",
            data: { r_out_no : r_out_no },
           success: function(data) {
            $('.tables').remove();
            $('.expense').remove();
            var result=JSON.parse(data);
            if(result.status>0){
$('.append_proof_details').append(result.data);
var expense_length=$(".expense_type").length;
if(expense_length >0)
{
$('.append_expense').append(result.expense_typess);
$('#expense_count').val(result.expense_cnt);
}
// else if(result.expense_cnt == 0)
// {
//   $('.append_expense').html(result.expense_typess);
//   $('#expense_count').val(result.expense_cnt+1);
// }
else
{
  $('.append_expense').html(result.expense_typess);
  $('#expense_count').val(result.expense_cnt);
}
$('#counts').val(result.status);
$('.no_items').text(result.status);
$('.invoice_val').text(result.item_net_value_sum);
$('.r_out_date').val(result.date_rejection_out);

$('#total_discount').val(result.item_discount_sum);
$('.overall_discount').val(result.overall_discount);
$('.overall_discount').attr('readonly','readonly');
$('#round_off').val(result.round_off);
$('.total_net_value').text(result.total_net_value);
 $('#total_price').val(result.total_net_value);
 $('#po_date').val(result.date_purchaseorder);
 

var total_net_price=calculate_total_net_price();
var total_amount=calculate_total_amount();
var total_gst=calculate_total_gst();
$("#total_gst").val(total_gst.toFixed(2));
    $("#igst").val(total_gst.toFixed(2));
    var half_gst = parseFloat(total_gst)/2;
    $("#cgst").val(half_gst.toFixed(2));
    $("#sgst").val(half_gst.toFixed(2));
var q=calculate_total_discount();
$('#total_discount').val(q.toFixed(2));
$('#disc_total').val(q.toFixed(2));
total_expense_cal();
overall_discounts();
roundoff_cal();


var to_html_total_net = total_net_price.toFixed(2);
var to_html_total_amount = total_amount.toFixed(2);
$(".total_net_price").html(parseFloat(to_html_total_net));
$(".total_amount").html(parseFloat(to_html_total_amount));




            }
           }
        });
}

function uom_details_inclusive()
{
var uom_inclusive=$('.uom_inclusive').val();

item_codes(uom_inclusive);
}

function uom_details_exclusive()
{

var uom_exclusive=$('.uom_exclusive').val();
item_codes(uom_exclusive);
}

 function overall_discounts()
 {

    $(".overall_discount").blur(function() {
    if ($(this).val() == "" || $(this).val() == 0) 
    {
        $(this).val('0');
        $('#overall_discount').val(0);
    }
});
  

      var total = $('#total_price').val();
    if(total == 0)
    {
      alert('You Cannot Add Overall Discount Without Adding Item Details!!');
      $('.overall_discount').val(0);
    }
    else
    {

  $('.input_discounts').each(function(){
      var count = $(this).attr('class').split(' ')[1];
      var overall_discount = $('#overall_discount').val();
      if(overall_discount == '')
      {
        overall_discount = 0;
      }
      console.log(overall_discount);
      var amount = $('#amnt'+count).val();
      var gst_rs = $('#tax'+count).val();
      var total_amount =calculate_total_amount();
      var disc_distribution = parseFloat(overall_discount)/parseFloat(total_amount)*parseFloat(amount);
      var total_discount = parseFloat($(this).val())+parseFloat(disc_distribution);
      var net_value = parseFloat(amount)+parseFloat(gst_rs)-parseFloat(total_discount);
      //$('#input_discount'+count).val(total_discount);
      $('.font_overall_disc'+count).text(disc_distribution.toFixed(2));
      $('#overall_disc'+count).val(disc_distribution.toFixed(2));
      // $('#font_discount'+count).text(total_discount.toFixed(2));
      // $('.discount_val'+count).val(total_discount.toFixed(2));
      $('#net_price'+count).val(net_value.toFixed(2));
      $('.font_net_price'+count).text(net_value.toFixed(2));
  });

}
  var total_net_price = calculate_total_net_price();
  $("#total_price").val(total_net_price.toFixed(2));
  $(".total_net_value").text(total_net_price.toFixed(2));
  var to_html_total_net = total_net_price.toFixed(2);
  $(".total_net_price").html(parseFloat(to_html_total_net));
  roundoff_cal();
  individual_expense();
  total_expense_cal();
  var q=calculate_total_discount();
  $('#total_discount').val(q.toFixed(2));
  $('#disc_total').val(q.toFixed(2));
}


</script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" rel="stylesheet"/>
<script src="jquery.ui.position.js"></script>


<style type="text/css">
  .ui-dialog.ui-widget-content { background: #a3d072; }
</style>

    </div>
    <!-- card body end@ -->
  </div>
</div>
@endsection

