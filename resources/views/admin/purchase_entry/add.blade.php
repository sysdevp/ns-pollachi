@extends('admin.layout.app')
@section('content')
<?php
use App\Mandatoryfields;
?>
<main class="page-content">

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
          <h3>Purchase Entry</h3>
        </div>
        <div class="col-8 mr-auto">
          <ul class="h-right-btn mb-0 pl-0">
            <li><button type="button" class="btn btn-success"><a href="{{ url('purchase_entry/index/0') }}">Back</a></button></li>
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


<form  method="post" class="form-horizontal" action="{{ route('purchase_entry.store') }}" id="dataInput" enctype="multipart/form-data">
      {{csrf_field()}}

                  <div class="row col-md-12">
                  <div class="col-md-4">
                  <label style="font-family: Times new roman;">Voucher Type<?php echo Mandatoryfields::mandatory('purchaseentry_vouchertype');?></label><br>
                  <div class="form-group row">
                     <div class="col-sm-8">
                      <select class="js-example-basic-multiple col-12 form-control custom-select voucher_type" onchange="voucher_types()" name="voucher_type" id="voucher_type" <?php echo Mandatoryfields::validation('purchaseentry_vouchertype');?> autofocus>
                           <option value="">Choose Voucher Type</option>
                           @foreach($voucher_type as $voucher_types)
                           <option value="{{ $voucher_types->id }}">{{ $voucher_types->type }}</option>
                           @endforeach
                        </select>
                     </div>
                     
                  </div>
               </div>
               </div>

                      <div class="row col-md-12" id="refresh_data1">
                                <div class="col-md-4">
                  <label style="font-family: Times new roman;">Party Name<?php echo Mandatoryfields::mandatory('purchaseentry_supplierid');?></label><br>
                  <div class="form-group row">
                     <div class="col-sm-8">
                      <select required="" class="js-example-basic-multiple col-12 form-control custom-select supplier_id" onchange="supplier_details()" name="supplier_id" id="supplier_id" <?php echo Mandatoryfields::validation('purchaseentry_supplierid');?>>
                           <option value="">Choose Supplier Name</option>
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
                                    
                                  </div>
                                </div>

                                <div class="col-md-2">
                                  <label style="font-family: Times new roman;">Voucher No</label><br>
                                  <div class=""> 
                                    <font size="2" id="voucher_no" class="vouchers">{{$voucher_no}}</font>
                                    <input type="hidden" class="form-control voucher_no  required_for_proof_valid" value="">
                                  </div>
                                
                                 
                                </div>

                                <div class="col-md-2">
                                  <label style="font-family: Times new roman;">Voucher Date<?php echo Mandatoryfields::mandatory('purchaseentry_voucherdate');?></label><br>
                                <input type="date" class="form-control voucher_date  required_for_proof_valid" id="voucher_date" placeholder="Voucher Date" name="voucher_date" value="{{ $date }}" <?php echo Mandatoryfields::validation('purchaseentry_voucherdate');?>>
                                 
                                </div>

                              </div>
                              <br>

                       <div class="row col-md-12" id="refresh_data2">


                                
                                <div class="col-md-2">
                                  <label style="font-family: Times new roman;">Estimation No</label><br>
                                <select class="js-example-basic-multiple form-control p_estimation_no" 
                                data-placeholder="Choose Estimation No" onchange="estimation_details()" id="p_estimation_no" name="p_estimation_no">
                                <option value=""></option>
                                  @foreach($estimation as $key => $value)
                                  <option value="{{ $value->estimation_no }}">{{ $value->estimation_no }}</option>
                                  @endforeach
                                 </select>
                                 
                                </div>

                                <div class="col-md-2">
                                  <label style="font-family: Times new roman;">Estimation Date</label><br>
                                <input type="date" class="form-control p_estimation_date  required_for_proof_valid" readonly="" id="p_estimation_date" placeholder="Estimation Date" name="p_estimation_date" value="">
                                 
                                </div>

                                <div class="col-md-2">
                                  <label style="font-family: Times new roman;">Purchase Order No</label><br>
                                <select class="js-example-basic-multiple form-control po_no" 
                                data-placeholder="Choose Purchase Order No" onchange="po_details()" id="po_no" name="po_no" >
                                <option value="">Choose Purchase Order No</option>
                                @foreach($purchaseorder as $purchaseorders)
                                <option value="{{ $purchaseorders->po_no }}">{{ $purchaseorders->po_no }}</option>
                                  @endforeach 
                                 </select>
                                 
                                </div>
                                <div class="col-md-2">
                                  <label style="font-family: Times new roman;">Purchase Order Date</label><br>
                                <input type="date" class="form-control po_date  required_for_proof_valid" readonly="" id="po_date" placeholder="Voucher Date" name="po_date" value="">
                                 
                                </div>
                                <div class="col-md-2">
                                  <label style="font-family: Times new roman;">Receipt Note No</label><br>
                                <select class="js-example-basic-multiple form-control receipt_no" 
                                data-placeholder="Choose Receipt Note No" onchange="receipt_details()" id="receipt_no" name="receipt_no" >
                                <option value=""></option>
                                  @foreach($receipt_note as $key => $value)
                                  <option value="{{ $value->rn_no }}">{{ $value->rn_no }}</option>
                                  @endforeach
                                 </select>
                                 
                                </div>

                                <div class="col-md-2">
                                  <label style="font-family: Times new roman;">Receipt Note Date</label><br>
                                <input type="date" class="form-control receipt_date  required_for_proof_valid" readonly="" id="receipt_date" placeholder="Receipt Note Date" name="receipt_date" value="">
                                 
                                </div>

                                </div>
                                <br>
                                <div class="row col-md-12" id="refresh_data3">

                                  <div class="col-md-2">
                                  <label style="font-family: Times new roman;">Number Of Items</label><br>
                                  <input type="hidden" name="no_items" id="no_items">
                                  
                                  <div class="no_items">
                                  </div>
                                
                                 
                                </div>
                                <div class="col-md-2">
                                  <label style="font-family: Times new roman;">Invoice Value</label><br>
                                  <input type="hidden" name="invoice_val" id="invoice_val">
                                  
                                  <div class="invoice_val">
                                    
                                  </div>
                                
                                 
                                </div>
                                <div class="col-md-2">
                                  <label style="font-family: Times new roman;">Purchase Type</label><br>
                                  <input type="hidden" name="purchase_type" id="purchase_type">
                                  
                                  <div class="purchase_type">
                                    
                                  </div>
                                
                                </div>

                                <div class="col-md-2">
                                  <label style="font-family: Times new roman;">Purchase Order Date</label><br>
                                  <input type="hidden" name="purchase_date" id="purchase_date">
                                  
                                  <div class="purchase_date">
                                    
                                  </div>
                                </div>

                                <div class="col-md-2">
                                  <label style="font-family: Times new roman;">Estimation No</label><br>
                                  <input type="hidden" name="estimation_no" id="estimation_no">
                                  
                                  <div class="estimation_no">
                                    
                                  </div>
                                
                                 
                                </div>

                                <div class="col-md-2">
                                  <label style="font-family: Times new roman;">Estimation Date</label><br>
                                  <input type="hidden" name="estimation_date" id="estimation_date">
                                  
                                  <div class="estimation_date">
                                    
                                  </div>
                                
                                 
                                </div>

                              </div>

                              <div class=" row col-md-12 mb-3">

                                <div class="col-md-2">
                                  <label style="font-family: Times new roman;">Company Location<?php echo Mandatoryfields::mandatory('purchaseentry_location');?></label><br>
                                <select class="js-example-basic-multiple form-control location" 
                                data-placeholder="Choose Location" id="location" name="location" <?php echo Mandatoryfields::validation('purchaseentry_location');?>>
                                <option value=""></option>
                                  @foreach($location as $key => $value)
                                  <option value="{{ $value->id }}">{{ $value->name }}</option>
                                  @endforeach
                                 </select>
                                 
                                </div>
                                <input type="checkbox" name="check" id="check" class="po_alpha_beta" value="1">
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
                              <table class="item_code_table" id="myTable" style="width: 100%;">
                                  <thead>

                                  <th style="font-family: Times New Roman;">Select One</th>
                                  <th style="font-family: Times New Roman;">Item Code<input type="text" class="form-control" id="item_table_code" onkeyup="myFunction()" placeholder="Search Item Code" title="Type in a name" style="height: 20px;"></th>
                                  <th style="font-family: Times New Roman;">Item Name<input type="text" id="item_table_name" class="form-control" onkeyup="myFunction1()" placeholder="Search Item Name" title="Type in a name" style="height: 20px;"></th>
                                  <th style="font-family: Times New Roman;">MRP<input type="text" id="item_table_mrp" class="form-control" onkeyup="myFunction2()" placeholder="Search MRP" title="Type in a name" style="height: 20px;"></th>
                                  <th style="font-family: Times New Roman;">UOM<input type="text" id="item_table_uom" class="form-control" onkeyup="myFunction3()" placeholder="Search UOM" title="Type in a name" style="height: 20px;"></th>
                                  <th style="font-family: Times New Roman;">Brand<input type="text" id="item_table_brand" class="form-control" onkeyup="myFunction4()" placeholder="Search Brand" title="Type in a name" style="height: 20px;"></th>
                                  <th style="font-family: Times New Roman;">Category<input type="text" id="item_table_category" class="form-control" onkeyup="myFunction5()" placeholder="Search Category" title="Type in a name" style="height: 20px;"></th>
                                  <!-- <th style="font-family: Times New Roman;">PTC Code</th> -->
                                  <th style="font-family: Times New Roman;">Barcode<input type="text" id="item_table_barcode" class="form-control" onkeyup="myFunction6()" placeholder="Search Barcode" title="Type in a name" style="height: 20px;"></th>
                                  
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

                      <div class="col-md-2">
                        <label style="font-family: Times new roman;">Discount %</label>
                      <input type="number" class="form-control discount_percentage" oninput="discount_calc1()" id="discount_percentage"  placeholder="Discount %" name="discount_percentage" pattern="[0-9]{0,100}" title="Numbers Only" value="">
                      </div>

                      <input type="hidden" class="form-control amount  required_for_proof_valid" placeholder="Amount" id="amount" pattern="[0-9][0-9 . 0-9]{0,100}" title="Numbers Only" name="amount" value="" >
                        
                      
                      <div class="col-md-2">
                          <label style="font-family: Times new roman;">Discount Rs</label>
                        <input type="number" class="form-control discount_rs  required_for_proof_valid" placeholder="Discount Rs" id="discount" pattern="[0-9][0-9 . 0-9]{0,100}" title="Numbers Only" oninput="discount_calc()" name="discount" value="" >
                        </div>

                        <!-- <div class="col-md-2">
                          <label style="font-family: Times new roman;">Batch No</label>
                        <input type="number" class="form-control batch_no required_for_proof_valid" placeholder="Batch No" id="batch_no" pattern="[0-9][0-9 . 0-9]{0,100}" title="Numbers Only" name="batch_no" value="" >
                        </div> -->

                        <input type="hidden" name="discounts" id="discounts" value="0">
                        <input type="hidden" name="disc_total" id="disc_total" value="0">

                        <input type="hidden" class="form-control net_price  required_for_proof_valid" id="net_price" placeholder="Net Price" pattern="[0-9][0-9 . 0-9]{0,100}" title="Numbers Only" name="net_price" value="">

                    </div>
                    <!-- <div class="col-md-12 row" id="b_w">
                        <div class="col-md-2">
                          <label style="font-family: Times new roman;">Balck OR White</label>
                        <select class="form-control" id="b_or_w">
                          <option value="1">W</option>
                          <option value="0">B</option>
                       </select>
                        </div>
                      </div> -->
                      <br>
                                                          
                     <div class="" align="center">
                                   
                    <input type="button" class="btn btn-success add_items" value="Add More" name="" id="add_items0">  

                    <input type="button" style="display: none" class="btn btn-success update_items" value="Update" name="" id="update_items">

                    <input type="button" style="display: none" class="btn btn-success add_free_items" value="Add Free Item" name="" id="add_free_items"> 

                    <input type="hidden" name="" id="dummy_table_id"> 
                     </div> <br>              
                   
<style>
table, th, td {
  border: 1px solid #E1E1E1;
}
</style>
<div class="form-row">
             
              <div class="col-md-12" id="middlecol">
                
                <table class="table table-responsive" id="team-list">
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
                    <th> Free Item For</th>
                    <th> Is Free</th>
                    <th> Net Value</th>
                    <th style="background-color: #FAF860;"> Last Purchase Rate(LPR)</th>
                    <th>Action </th>
                  </thead>
                  <tbody class="append_proof_details" id="mytable">
                    
                  <input type="hidden" name="counts" value="" id="counts">
                  <input type="hidden" name="expense_count" value="1" id="expense_count">
                  <input type="hidden" name="total_amount" value="0" id="total_amount">
                  <input type="hidden" name="total_gst" value="0" id="total_gst">
                  <input type="hidden" name="total_price" value="0" id="total_price">
                  <input type="hidden" name="last_purchase_rate" value="0" id="last_purchase_rate">
                  <input type="hidden" name="total_quantity" value="0" id="total_quantity">
                  <input type="hidden" name="item_free_for" value="" id="item_free_for">
                  <input type="hidden" name="item_code_free_for" value="" id="item_code_free_for">
                  <input type="hidden" name="margin_block" id="margin_block" value="0"> 

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
                      <th><label class="total_amount">0</label></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th><label class="total_net_price">0</label></th>
                      <th style="background-color: #FAF860;"></th>
                      <th></th>
                    </tr>
                  </tfoot>

                </table>
                
                       </div>
                       <div class="row col-md-12" id="discount_div">

                        <div class="col-md-2">
                        <label style="font-family: Times new roman;">Discount(-)</label>
                      <input type="number" readonly="" class="form-control total_discount" id="total_discount" name="total_discount" pattern="[0-9]{0,100}" title="Numbers Only" value="0">
                      </div>
                      <div class="col-md-2">
                        <label style="font-family: Times new roman;">Overall Discount<?php echo Mandatoryfields::mandatory('purchaseentry_overall_discount');?></label>
                      <input type="number" class="form-control overall_discount" id="overall_discount" name="overall_discount" oninput="overall_discounts()" pattern="[0-9]{0,100}" title="Numbers Only" value="0" <?php echo Mandatoryfields::validation('purchaseentry_overall_discount');?>>
                      </div>
                    </div>


                        <div class="row col-md-12 append_expense">

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
                    
                       </div>


                       <div class="col-md-12" style="float: right;">

                        <font color="black" style="font-size: 150%; margin-left: 700px; font-weight: 900;">NET Value :</font>&nbsp;<font class="total_net_value" style="font-size: 150%; font-weight: 900;">00.00</font> 
                       </div>
                    <!-- net value -->



                       <div class="row col-md-12">

                        <div class="col-md-2">
                        <label style="font-family: Times new roman;">Round Off(+/-)</label>
                      <input type="text" class="form-control round_off" readonly="" value="0" id="round_off" name="round_off" >
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
                           <label style="font-family: Times new roman;">{{ $value->name }}</label>
                      <input type="text" class="form-control {{ $value->id }}" readonly="" id="{{ $value->id }}" name="{{ $value->name }}" value="0">

                      <input type="hidden" name="{{ $value->name }}_id" value="{{ $value->id }}">
                      
                         </div>
                         @endforeach
                          

                       </div>
                       <div class="row col-md-12">
        <div class="col-md-6">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label"> Bill Amount : </label>
              <div class="col-sm-8">
                <input type="text" class="form-control amount" required="" name="bill_amount" value="0">
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Mode : </label>
              <div class="col-sm-8">
                <select class="js-example-basic-multiple col-12 form-control custom-select mode" onchange="payment_mode(this.value)"  name="mode" id="mode" required="">
                           <option value="">Choose Mode</option>
                           <option value="1">Cash</option>
                           <option value="2">NEFT</option>
                           <option value="3">Advance Adjustment</option>
                           <option value="4">Cheque</option>
                           <option value="5">UPI</option>
                        </select>
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-12 row mb-3" id="bank_reference" style="display: none;">
          <div class="col-md-3">
            <input type="text" placeholder="Reference No" class="form-control" name="reference_no" id="reference_no">
          </div>
          <div class="col-md-3">
            <input type="date" class="form-control" value="{{ $date }}" name="payment_date" id="payment_date">
          </div>
          <div class="col-md-3">
            <input type="text" class="form-control" placeholder="Remarks" value="" name="remarks" id="remarks">
          </div>
        </div>
        
 <div id="adv_det" style="display:none">
        <div class="col-md-8">
                       <div class="form-group row">
                       <div class="col-md-4">
                       <label for="validationCustom01" class=" col-form-label"><h4>Advance Bill Details:</h4> </label><br>
                       
                           
                       </div>
                         </div>
              </div>

        <div class="card-body" style="height: 100%;">
      <table id="" class="table table-bordered table-hover">
        <thead>
          <tr>
            <th>Advance Voucher.No</th>
            <th>Voucher Date </th>
            <th>Advance Amount </th>
            <th>Advance Available Amount</th>
            <th>Current Cleared Amount</th>
          </tr>
        </thead>
        <tbody class="append_proof_details_adv" id="myTable_adv">
        </tbody>
        <tfoot>
              <th>Total</th>
              <th></th>
              <th></th>
              <th></th>
              <th><input type="text" name="total_net_value" class="total_net_value" id="total_net_value"></th>
            </tfoot>
      </table>
    </div>
</div>

                       <div class="row col-md-12 text-center">
                          <div class="col-md-12">
                            
                          <p>
                             <button class="btn btn-success save" name="save" value="0" type="submit">Save</button>
                              <button class="btn btn-warning print" name="save" value="1" type="submit">Save & Print</button>

                          </p>
                          
                        </div>

                      </div>
      </form>
                       
        <script type="text/javascript">

          function voucher_types(){


var voucher_type = $('.voucher_type').val();

  $.ajax({
                type: "POST",
                url: "{{ url('purchase_entry/voucher_type/') }}",
                data: { voucher_type : voucher_type},
                success: function(data) 
                {

                  $('.voucher_no').val(data);
                  $('.vouchers').text(data);
                  // alert(data);
                  return false;

                  var prefix = data.prefix;
                  var suffix = data.suffix;
                  var starting = data.starting_no;
                  var digits = data.no_digits;

                  if (starting == '') 
                  {
                    var starting = 1;

                    var length = starting.toString().length;
                    if (length >= digits) 
                    {

                      function pad (str, max) {
                      str = str.toString();
                      return str.length >= max ? str: '';
                    }

                    var preview = pad( starting, digits);

                    }
                    else
                    {

                      function pad (str, max) {
                      str = str.toString();
                      return str.length < max ? pad("0" + str, max) : str;
                    }

                    var preview = pad("0" + starting, digits);

                    }

                    $('.voucher_no').val(prefix+preview+suffix);
                    $('.vouchers').text(prefix+preview+suffix);
                  }
                  else
                  {
                    var length = starting.toString().length;
                    if (length >= digits) 
                    {

                      function pad (str, max) {
                      str = str.toString();
                      return str.length >= max ? str: '';
                    }

                    var preview = pad( starting, digits);

                    }
                    else
                    {

                      function pad (str, max) {
                      str = str.toString();
                      return str.length < max ? pad("0" + str, max) : str;
                    }

                    var preview = pad("0" + starting, digits);

                    }

                    var voucher = prefix+preview+suffix;
                    $('.voucher_no').val(voucher);
                    $('.vouchers').text(voucher);
                  }


                }
        });

}

          var i=1;
          var discount_total = 0;

          function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("item_table_code");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
function myFunction1() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("item_table_name");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[2];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
function myFunction2() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("item_table_mrp");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[3];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
function myFunction3() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("item_table_uom");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[4];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
function myFunction4() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("item_table_brand");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[5];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
function myFunction5() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("item_table_category");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[6];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
function myFunction6() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("item_table_barcode");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[7];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}

$(document).on('click','.po_alpha_beta',function(){
  $( "#discount_div" ).load(window.location.href + " #discount_div" );
  $( "#team-list" ).load(window.location.href + " #team-list" );
  $( ".append_expense" ).load(window.location.href + " .append_expense" );
  $( ".taxes" ).load(window.location.href + " .taxes" );
  $('.total_net_value').text('00.00');
  $('.round_off').val('0');
  
  $('.no_items').text('');
  $('.invoice_val').text('');
  $('.purchase_type').text('');
  $('.purchase_date').text('');
  $('.estimation_no').text('');
  $('.estimation_date').text('');
  $('.p_estimation_date').val('');
  $('.po_date').val('');
  $('.receipt_date').val('');

if($(this).prop('checked'))
{
  var val = 1;
  
}
else
{
  var val = 0;
}

$.ajax({
           type: "POST",
            url: "{{ url('purchase_entry/po_alpha_beta/') }}",
            data: { id: val },
           success: function(data) {
            var result = JSON.parse(data);

            // console.log(result.r_out_no);
            var po_data = result.po_no;
            var receipt_no = result.rn_no;

            $('.po_no').children('option:not(:first)').remove();
            $('.receipt_no').children('option:not(:first)').remove();
            
            $(po_data).appendTo('.po_no'); 
            $(receipt_no).appendTo('.receipt_no');

            $('#voucher_no').text(result.voucher_no);
            
           }



      });


});          

function calculate_total_net_price(){
  var total_net_price=0;
  $(".table_net_price").each(function(){
    console.log($(this).closest('#is_free'));
    total_net_price=parseFloat(total_net_price)+parseFloat($(this).val());
  });
  return total_net_price;
}
function calculate_total_qty(){
  var total_qty=0;
  $(".table_qty").each(function(){
    total_qty=parseFloat(total_qty)+parseFloat($(this).val());
  });
  return total_qty;
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
    roundoff_cal();
    individual_expense();


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
 var black_or_white = $('#b_or_w').val();
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
 var margin_block = $('#margin_block').val();

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
 else if(margin_block == 1)
 {
  alert('Rate Exceeds The Margin Value');
 }
 else
 {

  $('#margin_block').val(0);
  var last_purchase_rate = $('#last_purchase_rate').val();
 
  var items='<tr id="row'+i+'" class="'+i+' tables"><td><span class="item_s_no"> 1 </span></td><td><div class="form-group row"><div class="col-sm-12"><input class="invoice_no'+i+'" type="hidden" id="invoice'+i+'" value="'+invoice_no+'" name="invoice_sno[]"><font class="item_no'+i+'">'+invoice_no+'</font></div></div></td><td><div class="form-group row"><div class="col-sm-12"><input type="hidden" class="items_id" value="'+items_codes+'"><input type="hidden" class="item_code'+i+'" value="'+items_codes+'" name="item_code[]"><font class="items'+i+'">'+item_code+'</font></div></div></td><td><div class="form-group row"><div class="col-sm-12"><input class="item_name'+i+'" type="hidden" value="'+item_name+'" name="item_name[]"><font class="font_item_name'+i+'">'+item_name+'</font></div></div></td><td><div class="form-group row"><div class="col-sm-12"><input class="hsn'+i+'" type="hidden" value="'+hsn+'" name="hsn[]"><font class="font_hsn'+i+'">'+hsn+'</font></div></div></td><td><div class="form-group row"><div class="col-sm-12"><input type="hidden" class="mrp'+i+'" value="'+mrp+'" name="mrp[]"><font class="font_mrp'+i+'">'+mrp+'</font></div></div></td><td><div class="form-group row"><div class="col-sm-12" id="unit_price"><input type="hidden" class="exclusive'+i+'" value="'+exclusive+'" name="exclusive[]"><font class="font_exclusive'+i+'">'+exclusive+'</font><input type="hidden" class="inclusive'+i+'" value="'+inclusive+'" name="inclusive[]"></div></div></td><td><div class="form-group row"><div class="col-sm-12"><input type="hidden" class="quantity'+i+'" value="'+quantity+'" name="quantity[]"><input type="hidden" class="table_qty" id="table_qty'+i+'" value="'+quantity+'"><font class="font_quantity'+i+'">'+quantity+'</font></div></div></td><td><div class="form-group row"><div class="col-sm-12"><input type="hidden" class="uom'+i+'" value="'+uom_id+'" name="uom[]"><font class="font_uom'+i+'">'+uom_name+'</font></div></div></td><td><div class="form-group row"><div class="col-sm-12"><input type="hidden" class="table_amount" id="amnt'+i+'" value="'+amount+'" name="amount[]"><font class="font_amount'+i+'">'+amount+'</font></div></div></td><td><div class="form-group row"><div class="col-sm-12"><input type="hidden" class="input_discounts '+i+'" value="'+discounts+'" id="input_discount'+i+'" ><input class="discount_val'+i+'" type="hidden" value="'+discounts+'" name="discount[]"><font class="font_discount" id="font_discount'+i+'">'+discounts+'</font></div></div></td><td><div class="form-group row"><div class="col-sm-12"><input type="hidden" class="overall_disc" id="overall_disc'+i+'" value="0" name="overall_disc[]"><font class="font_overall_disc'+i+'">0</font></div></div></td><td><div class="form-group row"><div class="col-sm-12"><input type="hidden" class="expenses '+i+'" id="expenses'+i+'" value="0" name="expenses[]"><font class="font_expenses'+i+'">0</font></div></div></td><td><div class="form-group row"><div class="col-sm-12"><input type="hidden" class="table_gst" id="tax'+i+'" value="'+gst+'" name="gst[]"><input type="hidden" class="tax_gst'+i+'"  value="'+tax_rate+'" name="tax_rate[]"><font class="font_gst'+i+'">'+gst+'</font></div></div></td><td><input type="hidden" class="free_for'+i+'"  value="'+0+'" name="free_for[]"></td><td><input type="hidden" class="is_free'+i+'" id="is_free"  value="'+0+'" name="is_free[]"><font>No</font></td><td><div class="form-group row"><div class="col-sm-12"><input type="hidden" class="table_net_price" id="net_price'+i+'" value="'+net_price+'" name="net_price[]"><input type="hidden" class="black_or_white'+i+'"  value="'+black_or_white+'" name="black_or_white[]"><font class="font_net_price'+i+'">'+net_price+'</font></div></div></td><td style="background-color: #FAF860;"><div class="form-group row"><div class="col-sm-12"><center><font class="last_purchase'+i+'">'+last_purchase_rate+'</font></center></div></div></td><td><i class="fa fa-eye px-2 py-1 bg-info rounded show_items" id="'+i+'" aria-hidden="true"></i><i class="fa fa-pencil px-2 py-1 bg-success rounded edit_items" id="'+i+'" aria-hidden="true"></i><i class="fa fa-trash px-2 py-1 bg-danger rounded remove_items" id="'+i+'" aria-hidden="true"></i><i class="fa fa-gift px-2 py-1 bg-danger rounded free_items" id="'+i+'" aria-hidden="true"></i></td></tr>';

  var result_val;

if($('.tables').length == 0)
{
  $('.append_proof_details').append(items);
}
else
{
  $('.items_id').each(function(){

    if($(this).val() == items_codes)
    {
      result_val = 1;
      return false;
    }
    else
    {
      result_val = 0;
    }

  });

  if(result_val == 1)
  {
    alert('Item Alredy Taken');
  }
  else
  {
    $('.append_proof_details').append(items);
  }
}

var total_net_price=calculate_total_net_price();
var total_amount=calculate_total_amount();
var total_gst=calculate_total_gst();
var total_qty=calculate_total_qty();

$("#total_price").val(total_net_price.toFixed(2));
$("#total_quantity").val(total_qty);
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
overall_discounts();
roundoff_cal();
individual_expense();
var len=$('.tables').length;
$('#counts').val(len);
i++;


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

function margin_checking()
{
  var supplier_id = $('.supplier_id').val();
  var item_id=$('#items_codes').val();
  var exclusive = $('#exclusive').val();
  $.ajax({

    type:"POST",
    url:"{{url('purchase_entry/margin_check/')}}",
    data:{supplier_id: supplier_id, item_id: item_id},
    success:function(data)
    {
      if(data['buying_price'] == null)
      {
        
      }
      else
      {

        if(data['setup'] == 2 && exclusive > data['buying_price'])
      {
        alert('Rate Exceeds The Margin Value, Margin Value Set For This Item Is :'+data['buying_price']);
      }
      else if((data['setup'] == 1 && exclusive > data['buying_price']))
      {
        $('#margin_block').val(1);
      }
      else
      {
        $('#margin_block').val(0);
      }

      }
      

    }

  });
}

function for_free()
{
 find_cat();
 $('.add_free_items').show();
 $('.add_items').hide();
 $('.update_items').hide();

 $

}

$(document).on('click','.add_free_items',function(){

  free_items();
  item_details_sno();

});

function free_items()
{
 var j=$('#mytable tr:last').attr('class');
 var l=parseInt(i)+1;
 var voucher_date=$('.voucher_date').val();
 var invoice_no=$('.item_sno').val();
 var uom_name = $('.uom_name').val();
 var uom_id = $('.uom').val();
 var black_or_white = $('#b_or_w').val();
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

 var item_free_for=$('#item_free_for').val();
 var item_code_free_for=$('#item_code_free_for').val();

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
 else
 {


  var last_purchase_rate = $('#last_purchase_rate').val();
 
  var items='<tr id="row'+i+'" class="'+i+' tables"><td><span class="item_s_no">'+i+'</span></td><td><div class="form-group row"><div class="col-sm-12"><input class="invoice_no'+i+'" type="hidden" id="invoice'+i+'" value="'+invoice_no+'" name="invoice_sno[]"><font class="item_no'+i+'">'+invoice_no+'</font></div></div></td><td><div class="form-group row"><div class="col-sm-12"><input type="hidden" class="items_id" value="'+items_codes+'"><input type="hidden" class="item_code'+i+'" value="'+items_codes+'" name="item_code[]"><font class="items'+i+'">'+item_code+'</font></div></div></td><td><div class="form-group row"><div class="col-sm-12"><input class="item_name'+i+'" type="hidden" value="'+item_name+'" name="item_name[]"><font class="font_item_name'+i+'">'+item_name+'</font></div></div></td><td><div class="form-group row"><div class="col-sm-12"><input class="hsn'+i+'" type="hidden" value="'+hsn+'" name="hsn[]"><font class="font_hsn'+i+'">'+hsn+'</font></div></div></td><td><div class="form-group row"><div class="col-sm-12"><input type="hidden" class="mrp'+i+'" value="'+mrp+'" name="mrp[]"><font class="font_mrp'+i+'">'+mrp+'</font></div></div></td><td><div class="form-group row"><div class="col-sm-12" id="unit_price"><input type="hidden" class="exclusive'+i+'" value="'+exclusive+'" name="exclusive[]"><font class="font_exclusive'+i+'">'+exclusive+'</font><input type="hidden" class="inclusive'+i+'" value="'+inclusive+'" name="inclusive[]"></div></div></td><td><div class="form-group row"><div class="col-sm-12"><input type="hidden" class="quantity'+i+'" value="'+quantity+'" name="quantity[]"><input type="hidden" class="table_qty" id="table_qty'+i+'" value="'+quantity+'"><font class="font_quantity'+i+'">'+quantity+'</font></div></div></td><td><div class="form-group row"><div class="col-sm-12"><input type="hidden" class="uom'+i+'" value="'+uom_id+'" name="uom[]"><font class="font_uom'+i+'">'+uom_name+'</font></div></div></td><td><div class="form-group row"><div class="col-sm-12"><input type="hidden" class="table_amount" id="amnt'+i+'" value="'+amount+'" name="amount[]"><font class="font_amount'+i+'">'+amount+'</font></div></div></td><td><div class="form-group row"><div class="col-sm-12"><input type="hidden" class="input_discounts '+i+'" value="'+discounts+'" id="input_discount'+i+'" ><input class="discount_val'+i+'" type="hidden" value="'+discounts+'" name="discount[]"><font class="font_discount" id="font_discount'+i+'">'+discounts+'</font></div></div></td><td><div class="form-group row"><div class="col-sm-12"><input type="hidden" class="overall_disc" id="overall_disc'+i+'" value="0" name="overall_disc[]"><font class="font_overall_disc'+i+'">0</font></div></div></td><td><div class="form-group row"><div class="col-sm-12"><input type="hidden" class="expenses '+i+'" id="expenses'+i+'" value="0" name="expenses[]"><font class="font_expenses'+i+'">0</font></div></div></td><td><div class="form-group row"><div class="col-sm-12"><input type="hidden" class="table_gst" id="tax'+i+'" value="'+gst+'" name="gst[]"><input type="hidden" class="tax_gst'+i+'"  value="'+tax_rate+'" name="tax_rate[]"><font class="font_gst'+i+'">'+gst+'</font></div></div></td><td><input type="hidden" class="free_for'+i+'"  value="'+item_free_for+'" name="free_for[]"><font class="font_free_for'+i+'">'+item_code_free_for+'</font></td><td><input type="hidden" class="is_free'+i+'" id="is_free" value="'+1+'" name="is_free[]"><font>Yes</font></td><td><div class="form-group row"><div class="col-sm-12"><input type="hidden" class="table_net_price_free" id="net_price'+i+'" value="'+net_price+'" name="net_price[]"><input type="hidden" class="black_or_white'+i+'"  value="'+black_or_white+'" name="black_or_white[]"><font class="font_net_price'+i+'">'+net_price+'</font></div></div></td><td style="background-color: #FAF860;"><div class="form-group row"><div class="col-sm-12"><center><font class="last_purchase'+i+'">'+last_purchase_rate+'</font></center></div></div></td><td><i class="fa fa-eye px-2 py-1 bg-info rounded show_items" id="'+i+'" aria-hidden="true"></i><i class="fa fa-pencil px-2 py-1 bg-success rounded edit_items" id="'+i+'" aria-hidden="true"></i><i class="fa fa-trash px-2 py-1 bg-danger rounded remove_items" id="'+i+'" aria-hidden="true"></i></td></tr>';

    $('.append_proof_details').append(items);
//   var result_val;

// if($('.tables').length == 0)
// {
//   $('.append_proof_details').append(items);
// }
// else
// {
//   $('.items_id').each(function(){

//     if($(this).val() == items_codes)
//     {
//       result_val = 1;
//       return false;
//     }
//     else
//     {
//       result_val = 0;
//     }

//   });

//   if(result_val == 1)
//   {
//     alert('Item Alredy Taken');
//   }
//   else
//   {
    
//   }
// }



var total_net_price=calculate_total_net_price();
var total_amount=calculate_total_amount();
var total_gst=calculate_total_gst();
var total_qty=calculate_total_qty();

$("#total_price").val(total_net_price.toFixed(2));
$("#total_quantity").val(total_qty);
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
overall_discounts();
roundoff_cal();
individual_expense();
var len=$('.tables').length;
$('#counts').val(len);
i++;

$('.add_free_items').hide();
 $('.add_items').show();
 $('.update_items').hide();


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
$(document).on("click",".free_items",function(){
    
    var count = $(this).attr('id');
    var item_id = $('.item_code'+count).val();
    var item_code = $('.items'+count).text();

    $('#item_free_for').val(item_id);
    $('#item_code_free_for').val(item_code);
    for_free();

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

       
        
        
    var total_qty=calculate_total_qty();
    $("#total_quantity").val(total_qty);
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
    overall_discounts();
    roundoff_cal();
    individual_expense();

    $.ajax({
           type: "GET",
            url: "{{ url('purchase_entry/remove_data/{id}') }}",
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
   item_codes(item_code_id);

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
  $('#table_qty'+td_id).val($('.quantity').val());
  $('.font_quantity'+td_id).text($('.quantity').val());
  $('.uom'+td_id).val($('.uom').val());
  $('.font_uom'+td_id).text($('.uom_name').val());
  $('#amnt'+td_id).val($('.amount').val());
  $('.font_amount'+td_id).text($('.amount').val());
  $('.black_or_white'+td_id).val($('#b_or_w').val());
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
  var total_qty=calculate_total_qty();
  $("#total_quantity").val(total_qty);
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
  overall_discounts();
  roundoff_cal();
  individual_expense();

  

  
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

  $("#b_w").load(" #b_w > *");
  
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
  individual_expense();
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
  roundoff_cal();
  individual_expense();

  });

function item_details_sno(){
  $(".item_s_no").each(function(key,index){
      $(this).html((key+1));
    });
}


  $("form").submit(function(e){
    var count = $('.tables').length;
  if(count == 0)
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
  var checkbox = $('#check').prop('checked');



  if (quantity == '') 
  {
    alert('Please Enter Quantity First');
    $('#exclusive').val('');
    $('#inclusive').val('');
    $('#quantity').focus();
  }
  
  else if (checkbox == false)
  {
  
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

   else
   {
  
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
          $('.gst').val(0);

          var total_net_val = parseFloat(total)+parseFloat(net_val);
          $('#net_price').val(total.toFixed(2));
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
      $('.gst').val(0);

      var total_net_val = parseFloat(total)+parseFloat(net_val);
      $('#net_price').val(total.toFixed(2));
      }
      

    }

   }  

   margin_checking();
  
}

function calc_inclusive()
{
  
  var quantity = $('#quantity').val();
  var rate_exclusive = $('#exclusive').val();
  var rate_inclusive = $('#inclusive').val();
  var mrp = $('.mrp').val();
  var tax_rate = $('.tax_rate').val();
  var checkbox = $('#check').prop('checked');
  

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
    else if (checkbox == false)
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
      $('.gst').val(0);
      $('#net_price').val(total.toFixed(2));

    }

  }
  margin_checking();
    
  
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
  var checkbox = $('#check').prop('checked');
 
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

  else if (checkbox == false)
  {

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
  
  else
  {

  var disc_amount_exclusive = parseFloat(discount)*100/parseFloat(exclusive);

   $(".discount_percentage").val(disc_amount_exclusive.toFixed(2));

  calc_exclusive();
  var amount = $(".amount").val();
  var discounts = parseInt(quantity)*parseFloat(discount);
  $('#discounts').val(discounts.toFixed(2));
  var rate=parseFloat(tax_rate)/100;
  var net_val = parseFloat(amount)*parseFloat(rate);
  $('.gst').val(0);

  $('#net_price').val(amount.toFixed(2));

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
  var checkbox = $('#check').prop('checked');
 
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
  
  else if (checkbox == false)
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
  $('.gst').val(0);

  $('#net_price').val(amount.toFixed(2));

  }  
  
  
  
}

function item_codes(item_code,append_value)
{
  var checkbox = $('#check').prop('checked');

if(append_value == 1)
{
  var row_id=$('#last').val();

      $.ajax({  
        
        type: "GET",
        url: "{{ url('purchase_entry/getdata/{id}') }}",
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

             if (checkbox == false) 
             {
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
             }
             else
            {
              for(var new_val = 0; new_val < data[1].cnt; new_val++)
             {
              var tax_master_id = data[1].tax_master[new_val];

              var tax_master_input_val = $('#'+tax_master_id).attr('class').split(' ')[1];

              if(tax_master_id == tax_master_input_val)
              {
                var sum = parseFloat($('#'+tax_master_id).val()) + parseFloat(data[1].tax_val[new_val]);

                $('#'+tax_master_id).val(0);
              }
              else
              {

              }

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
            url: "{{ url('purchase_entry/last_purchase_rate/') }}",
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
        url: "{{ url('purchase_entry/getdata/{id}') }}",
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

             if (checkbox == false) 
             {
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
             }
             else
            {
              for(var new_val = 0; new_val < data[1].cnt; new_val++)
             {
              var tax_master_id = data[1].tax_master[new_val];

              var tax_master_input_val = $('#'+tax_master_id).attr('class').split(' ')[1];

              if(tax_master_id == tax_master_input_val)
              {
                var sum = parseFloat($('#'+tax_master_id).val()) + parseFloat(data[1].tax_val[new_val]);

                $('#'+tax_master_id).val(0);
              }
              else
              {

              }

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
            url: "{{ url('purchase_entry/last_purchase_rate/') }}",
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
        url: "{{ url('estimation/getdata_item/{id}') }}",
        data: { id: item_code },             
                        
        success: function(data){
         console.log(data);
             if(data[3]==1)
             {

             id = data[0].item_id;

             item_codes(id);
            

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
            url: "{{ url('estimation/last_purchase_rate/') }}",
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
        url: "{{ url('purchase_entry/same_items/{id}') }}",
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
  var supplier_id =  $('#supplier_id').val();
  if(supplier_id == '')
  {
    alert('Please Select Party Name First');
  }
  else
  {

    $('#margin_block').val(0);   
  $('#exclusive').val('');
  $('#inclusive').val('');
  $('#exclusive').focus();

    $('#categories').val("");
  $('#brand').val("");
  $("select").select2();
  $('#browse_item').val("");
  $('#cat').show();
  $('.row_brand').remove(); 
  $('.row_category').remove();
  $('#cat').dialog({width:900},{height:250}).prev(".ui-dialog-titlebar").css("background","#28a745").prev(".ui-dialog.ui-widget-content");
    
  }
  
    
}

function browse_item()
{
  var browse_item = $('#browse_item').val();
  $.ajax({  
        
        type: "GET",
        url: "{{ url('purchase_entry/browse_item/{id}') }}",
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
        url: "{{ url('purchase_entry/change_items/{id}') }}",
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
        url: "{{ url('purchase_entry/brand_filter/') }}",
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

  $( "#discount_div" ).load(window.location.href + " #discount_div" );
  $( "#team-list" ).load(window.location.href + " #team-list" );
  $( ".append_expense" ).load(window.location.href + " .append_expense" );
  $( ".taxes" ).load(window.location.href + " .taxes" );
  $('.total_net_value').text('00.00');
  $('.round_off').val('0');
  
  $('.no_items').text('');
  $('.invoice_val').text('');
  $('.purchase_type').text('');
  $('.purchase_date').text('');
  $('.estimation_no').text('');
  $('.estimation_date').text('');
  $('.p_estimation_date').val('');
  $('.po_date').val('');
  $('.receipt_date').val('');

  var supplier_id=$('.supplier_id').val();


  $.ajax({
           type: "POST",
            url: "{{ url('purchase_entry/address_details/') }}",
            data: { supplier_id : supplier_id },
           success: function(data) {
            var result = JSON.parse(data);
             $('#address_line_1').val(result.address);
             $('.address').text(result.address);
             $('.p_estimation_no').children('option:not(:first)').remove()
             .end().append(result.estimation_options);
             $('.po_no').children('option:not(:first)').remove()
             .end().append(result.po_options);
             $('.receipt_no').children('option:not(:first)').remove()
            .end().append(result.receipt_options);
           }
        });
}


function estimation_details()
{

  var p_estimation_no=$('.p_estimation_no').val();
  
  

  $.ajax({
           type: "POST",
            url: "{{ url('purchase_entry/estimation_details/') }}",
            data: { p_estimation_no : p_estimation_no },
           success: function(data) {
            $('.tables').remove();
            $('.expense').remove();
            $('.purchase_type').text('');
            $('.purchase_date').text('');

            $('.po_no').val('');
            $('.receipt_no').val('');
            $('.receipt_date').val('');
            $('.po_date').val('');
            $('select').select2();

            $(".total_net_price").text(0);
            $(".total_amount").text(0);
            $('.total_discount').val(0);
            $('.overall_discount').val(0);
            $('#round_off').val(0);
            $('.total_net_value').text('00.00');
            $("#total_gst").val(0);
            $("#igst").val(0);
            $("#cgst").val(0);
            $("#sgst").val(0);
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
$('#overall_discount').val(result.overall_discount);
$('#overall_discount').attr('readonly','readonly');
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
individual_expense();
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

  if($('.po_alpha_beta').prop('checked'))
  {
    var alpha_beta = 1;
  }
  else
  {
    var alpha_beta = 0;
  }
  var po_no=$('.po_no').val();
  

  $.ajax({
           type: "POST",
            url: "{{ url('purchase_entry/po_details/') }}",
            data: { po_no : po_no, alpha_beta : alpha_beta },
           success: function(data) {
            // $('.purchase_type').show();
            // $('.purchase_date').show();
            $('.tables').remove();
            $('.expense').remove();

            $('.p_estimation_no').val('');
            $('.receipt_no').val('');
            $('.p_estimation_date').val('');
            $('.receipt_date').val('');
            $('select').select2();

            $(".total_net_price").text(0);
            $(".total_amount").text(0);
            $('.total_discount').val(0);
            $('.overall_discount').val(0);
            $('#round_off').val(0);
            $('.total_net_value').text('00.00');
            $("#total_gst").val(0);
            $("#igst").val(0);
            $("#cgst").val(0);
            $("#sgst").val(0);

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
            $('#overall_discount').val(result.overall_discount);
            $('#overall_discount').attr('readonly','readonly');
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
            individual_expense();
            roundoff_cal();


            var to_html_total_net = total_net_price.toFixed(2);
            var to_html_total_amount = total_amount.toFixed(2);
            $(".total_net_price").html(parseFloat(to_html_total_net));
            $(".total_amount").html(parseFloat(to_html_total_amount));




            }
           }
        });
}


function receipt_details()
{

  if($('.po_alpha_beta').prop('checked'))
  {
    var alpha_beta = 1;
  }
  else
  {
    var alpha_beta = 0;
  }

  var receipt_no=$('.receipt_no').val();
  

  $.ajax({
           type: "POST",
            url: "{{ url('purchase_entry/receipt_details/') }}",
            data: { receipt_no : receipt_no, alpha_beta : alpha_beta },
           success: function(data) {
            
            $('.tables').remove();
            $('.expense').remove();
            $('.purchase_type').text('');
            $('.purchase_date').text('');

            $('.po_no').val('');
            $('.p_estimation_no').val('');
            $('select').select2();


            $(".total_net_price").text(0);
            $(".total_amount").text(0);
            $('.total_discount').val(0);
            $('.overall_discount').val(0);
            $('#round_off').val(0);
            $('.total_net_value').text('00.00');
            $("#total_gst").val(0);
            $("#igst").val(0);
            $("#cgst").val(0);
            $("#sgst").val(0);

            var result=JSON.parse(data);
            if(result.status>0 && result.item_net_value_sum >0){
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
            $('#counts').val(result.status);
            $('.no_items').text(result.status);
            $('.invoice_val').text(result.item_net_value_sum);
            if(result.purchase_type == '')
            {

            }
            else
            {
             if(result.purchase_type == 1)
            $('.purchase_type').text('Cash Purchase');
            else if(result.purchase_type == 0)
            $('.purchase_type').text('Credit Purchase'); 
            }

            $('.taxes').html(result.tax_append);

            $('.purchase_date').text(result.po_date);
            $('.estimation_date').text(result.date_estimation);
            $('.estimation_no').text(result.estimation_no);
            $('.receipt_date').val(result.receipt_note_date);

            $('#total_discount').val(result.item_discount_sum);
            $('#overall_discount').val(result.overall_discount);
            $('#overall_discount').attr('readonly','readonly');
            $('#round_off').val(result.round_off);
            $('.total_net_value').text(result.item_net_value_sum);
             $('#total_price').val(result.item_net_value_sum);
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
            individual_expense();
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
  // individual_expense();
  // total_expense_cal();
  var q=calculate_total_discount();
  $('#total_discount').val(q.toFixed(2));
  $('#disc_total').val(q.toFixed(2));
}

function payment_mode(val)
{

  var payment_mode=val;
 if(payment_mode=="3"){
    $('#adv_det').show();
    $('#cash_bill').hide();
    $('#bank_reference').hide();
    var customer_id=$('#customer_id').val();
     $.ajax({
            
            type: "POST",
            url: "{{ url('payment_process/advance_entry_det/') }}",
            data: { customer_id : customer_id },
            success: function(data) {
            var result = JSON.parse(data);
            $('#myTable_adv').append(result);
            
           }
        });

 } 
 else if(payment_mode=="2" || payment_mode=="5")
 {
  $('#adv_det').hide();
  $('#cash_bill').hide();

  $('#bank_reference').show();
  $('#payment_date').attr('readonly','readonly');
 }
 else if(payment_mode=="4")
 {
  $('#adv_det').hide();
  $('#cash_bill').hide();

  $('#bank_reference').show();
  $('#payment_date').removeAttr('readonly');

 }
 else 
 {
$('#adv_det').hide();
$('#bank_reference').hide();
$('#cash_bill').show();
 }


 
}

function myfunction(val) {

var sum = 0;
  $('.payment_amount').each(function(){
 sum = parseInt(sum) + parseInt($(this).val());
  });

  $('.total_net_value').val(sum);
//                 var sum = 0;
//                 var amounts = $('.amount').val();

//                 for(var i=0; i<amounts.length; i++) {
//                     var a = +amounts[i].value;
//                     sum += parseFloat(a) || 0;
//                 }
// alert(sum);
//                 $('#total_net_value').val(sum);
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

