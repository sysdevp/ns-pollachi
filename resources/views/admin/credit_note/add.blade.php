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
          <h3>Credit Note</h3>
        </div>
        <div class="col-8 mr-auto">
          <ul class="h-right-btn mb-0 pl-0">
            <li><button type="button" class="btn btn-success"><a href="{{ url('credit_note/index/0') }}">Back</a></button></li>
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


<form  method="post" class="form-horizontal" action="{{ route('credit_note.store') }}" id="dataInput" enctype="multipart/form-data">
      {{csrf_field()}}

                      <div class="row col-md-12">

                          <div class="col-md-4">
                  <label style="font-family: Times new roman;">Voucher Type<?php echo Mandatoryfields::mandatory('creditnote_vouchertype');?></label><br>
                  <div class="form-group row">
                     <div class="col-sm-8">
                      <select class="js-example-basic-multiple col-12 form-control custom-select voucher_type" onchange="voucher_types()" name="voucher_type" id="voucher_type" <?php echo Mandatoryfields::validation('creditnote_vouchertype');?> autofocus>
                           <option value="">Choose Voucher Type</option>
                           @foreach($voucher_type as $voucher_types)
                           <option value="{{ $voucher_types->id }}">{{ $voucher_types->type }}</option>
                           @endforeach
                        </select>
                     </div>
                     
                  </div>
               </div>
               </div>
      
                       <div class="row col-md-12">

                        <div class="col-md-4">
                  <label style="font-family: Times new roman;">Customer Name<?php echo Mandatoryfields::mandatory('creditnote_customerid');?></label><br>
                  <div class="form-group row">
                     <div class="col-sm-8">
                      <select class="js-example-basic-multiple col-12 form-control custom-select customer_id" onchange="customer_details()" name="customer_id" id="customer_id" <?php echo Mandatoryfields::validation('creditnote_customerid');?>>
                           <option value="">Choose Customer Name</option>
                           @foreach($customer as $customers)
                           <option value="{{ $customers->id }}">{{ $customers->name }}</option>
                           @endforeach
                        </select>
                     </div>
                     <a href="{{ url('master/customer/create')}}" target="_blank">
                     <button type="button"  class="px-2 btn btn-success ml-2" title="Add Supplier"><i class="fa fa-plus-circle" aria-hidden="true"></i></button></a>
                     <button type="button"  class="px-2 btn btn-success mx-2 refresh_customer_id" title="Add Brand"><i class="fa fa-refresh" aria-hidden="true"></i></button>
                  </div>
               </div>

               <div class="col-md-2">
                                  <label style="font-family: Times new roman;">Voucher No</label><br>
                                  <div class="">
                                    <font size="2" id="voucher_no" class="vouchers"></font>
                                    <input type="hidden" class="form-control voucher_no  required_for_proof_valid" value="">
                                  </div>
                                
                                 
                                </div>

                                <div class="col-md-2">
                                  <label style="font-family: Times new roman;">Voucher Date<?php echo Mandatoryfields::mandatory('creditnote_voucherdate');?></label><br>
                                <input type="date" class="form-control voucher_date  required_for_proof_valid" id="voucher_date" placeholder="Voucher Date" name="voucher_date" value="{{ $date }}" <?php echo Mandatoryfields::validation('creditnote_voucherdate');?>>
                                 
                                </div>

                        <div class="col-md-2">
                                  <label style="font-family: Times new roman;">Sales Entry No</label><br>
                                <select class="js-example-basic-multiple form-control s_no" 
                                data-placeholder="Choose Sale Entry No" onchange="s_details()" id="s_no" name="s_no" >
                                <option value="">Choose Sale Entry No</option>
                                @foreach($sale_entry as $sale_entries)
                                <option value="{{ $sale_entries->s_no }}">{{ $sale_entries->s_no }}</option>
                                  @endforeach 
                                 </select>
                                 
                                </div>

                        <div class="col-md-2">
                                  <label style="font-family: Times new roman;">Sale Entry Date</label><br>
                                <input type="date" class="form-control s_date  required_for_proof_valid" readonly="" id="s_date" placeholder="Voucher Date" name="s_date" value="">
                                 
                                </div>
                                
                                
                                
                                <!-- <div class="col-md-2">
                                  <label style="font-family: Times new roman;">Gate Pass Entry Date</label><br>
                                <input type="date" class="form-control gatepass_date  required_for_proof_valid" id="gatepass_date" placeholder="Gate Pass Entry Date" name="gatepass_date" value="{{ $date }}">
                                 
                                </div> -->
                                </div>
                                <br>
                                <div class="row col-md-12">

                                  <div class="col-md-2">
                                  <label style="font-family: Times new roman;">Rejection In No</label><br>
                                <select class="js-example-basic-multiple form-control r_in_no" 
                                data-placeholder="Choose Rejection In No" onchange="rejection_in_details()" id="r_in_no" name="r_in_no" >
                                <option value=""></option>
                                  @foreach($rejection_in as $value)
                                  <option value="{{ $value->r_in_no }}">{{ $value->r_in_no }}</option>
                                  @endforeach
                                 </select>
                                 
                                </div>

                                <div class="col-md-2">
                                  <label style="font-family: Times new roman;">Rejection In Date</label><br>
                                <input type="date" class="form-control r_in_date  required_for_proof_valid" readonly="" id="r_in_date" placeholder="Voucher Date" name="r_in_date" value="">
                                 
                                </div>

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
                                <!-- <div class="col-md-2">
                                  <label style="font-family: Times new roman;">Sales Type</label><br>
                                  <input type="hidden" name="sale_type" id="sale_type">
                                  
                                  <div class="sale_type">
                                    
                                  </div>
                                
                                </div> -->

                                <div class="col-md-2">
                                  <label style="font-family: Times new roman;">Sale Order Date</label><br>
                                  <input type="hidden" name="sale_date" id="sale_date">
                                  
                                  <div class="sale_date">
                                    
                                  </div>
                                </div>

                                
                                <div class="col-md-2">
                                  <label style="font-family: Times new roman;">Customer Address</label><br>
                                  <input type="hidden" name="address_line_1" id="address_line_1">
                                  
                                  <div class="address">
                                    
                                  </div>
                                </div>

                                <!-- <div class="col-md-2">
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
                                
                                 
                                </div> -->

                              </div>
                              <br>
                    <div class="row col-md-12 mb-3">
                      <div class="col-md-2">
                  <label style="font-family: Times new roman;">Company Location<?php echo Mandatoryfields::mandatory('creditnote_location');?></label><br>
                <select class="js-example-basic-multiple col-12 form-control custom-select location" name="location" data-placeholder="Choose Location" id="location" <?php echo Mandatoryfields::validation('creditnote_location');?>>
                 <option value="">Choose Location</option>
                 @foreach($location as $value)
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

                      <div class="col-md-2">
                        <label style="font-family: Times new roman;">Discount %</label>
                      <input type="number" class="form-control discount_percentage" oninput="discount_calc1()" id="discount_percentage"  placeholder="Discount %" name="discount_percentage" pattern="[0-9]{0,100}" title="Numbers Only" value="">
                      </div>

                      <input type="hidden" class="form-control amount  required_for_proof_valid" placeholder="Amount" id="amount" pattern="[0-9][0-9 . 0-9]{0,100}" title="Numbers Only" name="amount" value="" >
                        
                      
                      <div class="col-md-2">
                          <label style="font-family: Times new roman;">Discount Rs</label>
                        <input type="number" class="form-control discount_rs  required_for_proof_valid" placeholder="Discount Rs" id="discount" pattern="[0-9][0-9 . 0-9]{0,100}" title="Numbers Only" oninput="discount_calc()" name="discount" value="" >
                        </div>

                        <div class="col-md-2 display_rejected" style="display: none;">
                        <label style="font-family: Times new roman;">Qty To Be Debited</label>
                      <input type="number" class="form-control rejected" id="rejected"  placeholder="Qty To Be Debited" name="rejected" onchange="rejected_qty()" pattern="[0-9]{0,100}" title="Numbers Only" value="">
                      </div>

                        <input type="hidden" name="discounts" id="discounts" value="0">
                        <input type="hidden" name="disc_total" id="disc_total" value="0">

                        <input type="hidden" class="form-control net_price  required_for_proof_valid" id="net_price" placeholder="Net Price" pattern="[0-9][0-9 . 0-9]{0,100}" title="Numbers Only" name="net_price" value="">

                    </div>
                    <!-- <div class="col-md-12 row">

                      <div class="col-md-2">
                          <label style="font-family: Times new roman;">Batch No</label>
                        <input type="number" class="form-control batch_no required_for_proof_valid" placeholder="Batch No" id="batch_no" pattern="[0-9][0-9 . 0-9]{0,100}" title="Numbers Only" name="batch_no" value="" >
                        </div>

                        <div class="col-md-2">
                          <label style="font-family: Times new roman;">Balck OR White</label>
                        <select class="form-control" name="black_or_white[]">
                          <option value="1">W</option>
                          <option value="0">B</option>
                       </select>
                        </div>
                      </div> -->
                      <br>
                                                          
                     <div class="" align="center">
                                   
                    <input type="button" class="btn btn-success add_items" value="Add More" name="" id="add_items0" style="display: none">  

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
                
                <table class="table table-responsive" id="team-list">
                  <thead>
                    <th> S.no </th>
                    <th> Item S.no </th>
                    <th> Item Code</th>
                    <th> Item Name</th>
                    <th> HSN</th>
                    <th> MRP</th>
                    <th> Unit Price</th>
                    <th> Total Quantity</th>
                    <th> Rejected Quantity</th>
                    <th> Remaining Quantity</th>
                    <th> Credited Quantity</th>
                    <!-- <th> Remaining Quantity After Credit</th> -->
                    <th> UOM</th>
                    <th> Amount</th>
                    <th> Discount</th>
                    <th> Overall Discount</th>
                    <th> Expenses</th>
                    <th> Tax Rs</th>
                    <th> Net Value</th>
                    <th style="background-color: #FAF860;"> Last Purchase Rate(LPR)</th>
                    <th>Action </th>
                  </thead>
                  <tbody class="append_proof_details" id="mytable">
                    
                  <input type="hidden" name="counts" value="" id="counts">
                  <input type="hidden" name="expense_count" value="0" id="expense_count">
                  <input type="hidden" name="total_amount" value="0" id="total_amount">
                  <input type="hidden" name="total_gst" value="0" id="total_gst">
                  <input type="hidden" name="total_price" value="0" id="total_price">
                  <input type="hidden" name="last_purchase_rate" value="0" id="last_purchase_rate">

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
                      <th></th>
                      <th></th>
                      <!-- <th></th> -->
                      <th></th>
                      <th><label class="total_amount">0</label></th>
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
                        <label style="font-family: Times new roman;">Overall Discount<?php echo Mandatoryfields::mandatory('creditnote_overall_discount');?></label>
                      <input type="number" class="form-control overall_discount" id="overall_discount" name="overall_discount" oninput="overall_discounts()" pattern="[0-9]{0,100}" title="Numbers Only" value="0" <?php echo Mandatoryfields::validation('creditnote_overall_discount');?>>
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
                      </div>
                      <div class="col-md-4" style="float: right;">

                        <font color="black" style="font-size: 150%; margin-left: 100px; font-weight: 900;">NET Value :</font>&nbsp;<font class="total_net_value" style="font-size: 150%; font-weight: 900;">00.00</font> 
                       </div> -->
                       
                       <!-- <div class="row col-md-12"> -->
                         <!-- <div class="col-md-2">
                           <label style="font-family: Times new roman;">IGST</label>
                      <input type="text" class="form-control igst" readonly="" id="igst" name="igst" value="0">
                         </div> -->


                       </div>
                       <div class="row col-md-12 taxes mb-3">
                        @foreach($tax as $value)
                         <div class="col-md-2">
                           <label style="font-family: Times new roman;">{{ $value->name }}</label>
                      <input type="text" class="form-control {{ $value->id }}" readonly="" id="{{ $value->id }}" name="{{ $value->name }}" value="0">

                      <input type="hidden" name="{{ $value->name }}_id" value="{{ $value->id }}">
                      
                         </div>
                         @endforeach
                       </div>

                       <div class="row col-md-12 append_upload">

                          <div class="row col-md-12 upload">
                            <div class="col-md-3">
                    <label style="font-family: Times new roman;">Name Of Document</label><br>
                  <div class="form-group row">
                     <div class="col-sm-12">
                      <input type="text" class="form-control" placeholder="Name Of Document" name="documentname[]">
                     </div>
                  </div>
               </div>
                      
                      <div class="col-md-4">
                        <label style="font-family: Times new roman;">Upload Document</label>
                      <input type="file" class="form-control" name="document[]">

                      </div>
                      <div class="col-md-2">
                        <label style="font-family: Times new roman; color: white;">Upload</label><br>
                      <input type="button" class="btn btn-success" value="+" onclick="upload_add()" name="" id="add_upload">&nbsp;<input type="button" class="btn btn-danger remove_upload" value="-" name="" id="remove_upload">
                    </div>
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
                url: "{{ url('credit_note/voucher_type/') }}",
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

          var i=0;
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
  $( ".table" ).load(window.location.href + " .table" );
  $( ".append_expense" ).load(window.location.href + " .append_expense" );
  $( ".taxes" ).load(window.location.href + " .taxes" );
  $('.total_net_value').text('00.00');
  $('.round_off').val('0');
  $('.no_items').text('');
  $('.invoice_val').text('');
  $('.purchase_type').text('');
  $('.purchase_date').text('');
  $('.sale_date').text('');

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
            url: "{{ url('credit_note/po_alpha_beta/') }}",
            data: { id: val },
           success: function(data) {
            var result = JSON.parse(data);

            // console.log(result.r_out_no);
            var s_data = result.s_no;
            var r_in_no = result.r_in_no;

            $('.s_no').children('option:not(:first)').remove();
            $('.r_in_no').children('option:not(:first)').remove();
            
            $(s_data).appendTo('.s_no'); 
            $(r_in_no).appendTo('.r_in_no');
            $('#voucher_no').text(result.voucher_no);
            
           }



      });


});          

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
    overall_discounts();
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
    if(amount != 0)
    {
      var sum_of_total_discount = parseFloat(discount)+parseFloat(overall_disc);
      var exp_distribution = parseFloat(total_expense)/parseFloat(total_amount)*parseFloat(amount);
      var total_exp = parseFloat(0)+parseFloat(exp_distribution);


      var net_value = parseFloat(amount)+parseFloat(gst_rs)-parseFloat(sum_of_total_discount)+parseFloat(total_exp);
    $('#net_price'+count).val(net_value.toFixed(2));
      $('.font_net_price'+count).text(net_value.toFixed(2));
      $('.font_expenses'+count).text(total_exp.toFixed(2));

      $(this).val(total_exp);
    }
    else
    {
      
    }
    

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

 if(discount_rs == '')
 {
  var discount = 0;
 }
 else if(discount_percentage == '' && discount == '')
   {
    var discount=0;
   }
 else
 {
  var discount = discount_rs;
 }

 if(discounts == '')
 {
  discounts =0;
 }
  // if(discount == '' && discount_percentage != '')
  //  {
  //   var discount=discount_percentage+'%';
  //  }

   // else if(discount_percentage == '' && discount != '')
   // {
   //  var discount=discount;
   // }
   
 if(amount == '')
 {
  var amount=0;
 }
 if(net_price == '')
 {
  var net_price=0;
 }

 if(item_code == '' || invoice_no == '' || quantity == '' || exclusive == '' && inclusive == '')
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
 
  var items='<tr id="row'+i+'" class="'+i+' tables"><td><span class="item_s_no"> 1 </span></td><td><div class="form-group row"><div class="col-sm-12"><input class="invoice_no'+i+'" type="hidden" id="invoice'+i+'" value="'+invoice_no+'" name="invoice_sno[]"><font class="item_no'+i+'">'+invoice_no+'</font></div></div></td><td><div class="form-group row"><div class="col-sm-12"><input type="hidden" class="item_code'+i+'" value="'+items_codes+'" name="item_code[]"><font class="items'+i+'">'+item_code+'</font></div></div></td><td><div class="form-group row"><div class="col-sm-12"><input class="item_name'+i+'" type="hidden" value="'+item_name+'" name="item_name[]"><font class="font_item_name'+i+'">'+item_name+'</font></div></div></td><td><div class="form-group row"><div class="col-sm-12"><input class="hsn'+i+'" type="hidden" value="'+hsn+'" name="hsn[]"><font class="font_hsn'+i+'">'+hsn+'</font></div></div></td><td><div class="form-group row"><div class="col-sm-12"><input type="hidden" class="mrp'+i+'" value="'+mrp+'" name="mrp[]"><font class="font_mrp'+i+'">'+mrp+'</font></div></div></td><td><div class="form-group row"><div class="col-sm-12" id="unit_price"><input type="hidden" class="exclusive'+i+'" value="'+exclusive+'" name="exclusive[]"><font class="font_exclusive'+i+'">'+exclusive+'</font><input type="hidden" class="inclusive'+i+'" value="'+inclusive+'" name="inclusive[]"></div></div></td><td><div class="form-group row"><div class="col-sm-12"><input type="hidden" class="quantity'+i+'" value="'+quantity+'" name="quantity[]"><font class="font_quantity'+i+'">'+quantity+'</font></div></div></td><td><div class="form-group row"><div class="col-sm-12"><input type="hidden" class="uom'+i+'" value="'+uom_id+'" name="uom[]"><font class="font_uom'+i+'">'+uom_name+'</font></div></div></td><td><div class="form-group row"><div class="col-sm-12"><input type="hidden" class="table_amount" id="amnt'+i+'" value="'+amount+'" name="amount[]"><font class="font_amount'+i+'">'+amount+'</font></div></div></td><td><div class="form-group row"><div class="col-sm-12"><input type="hidden" class="input_discounts '+i+'" value="'+discounts+'" id="input_discount'+i+'" ><input class="discount_val'+i+'" type="hidden" value="'+discounts+'" name="discount[]"><font class="font_discount" id="font_discount'+i+'">'+discounts+'</font></div></div></td><td><div class="form-group row"><div class="col-sm-12"><input type="hidden" class="table_gst" id="tax'+i+'" value="'+gst+'" name="gst[]"><input type="hidden" class="tax_gst'+i+'"  value="'+tax_rate+'" name="tax_rate[]"><font class="font_gst'+i+'">'+gst+'</font></div></div></td><td><div class="form-group row"><div class="col-sm-12"><input type="hidden" class="table_net_price" id="net_price'+i+'" value="'+net_price+'" name="net_price[]"><font class="font_net_price'+i+'">'+net_price+'</font></div></div></td><td style="background-color: #FAF860;"><div class="form-group row"><div class="col-sm-12"><center><font class="last_purchase'+i+'">'+last_purchase_rate+'</font></center></div></div></td><td><i class="fa fa-eye px-2 py-1 bg-info rounded show_items" id="'+i+'" aria-hidden="true"></i><i class="fa fa-pencil px-2 py-1 bg-success rounded edit_items" id="'+i+'" aria-hidden="true"></i><i class="fa fa-trash px-2 py-1 bg-danger rounded remove_items" id="'+i+'" aria-hidden="true"></i></td></tr>'

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

for(var m=0;m<length+1;m++)
{

  var item_code_id_first = $('.item_code'+m).val();
  
  for(var n=m+1;n<=length+1;n++)
  {
    
    if(typeof $('.item_code'+n).val() == 'undefined')
    {

    }
    else
    {
      var item_code_id_second = $('.item_code'+n).val();

      if(item_code_id_first == item_code_id_second)
      {
        alert('Item is Alredy Taken!');
        $('#row'+i).remove();
      }
      else
      {
        
      }
    }
  }
}

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
overall_discounts();
individual_expense();
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
    overall_discounts();
    individual_expense();
    roundoff_cal();
    
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
  if($('.s_no').val() != '')
  {
  $('#quantity').attr('readonly','readonly');
  $('.display_rejected').show();
  $('.display_remarks').show();

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
  // var quantity = $('.font_remaining_after_debit'+id).text();
  var actual_qty = $('#actual_quantity'+id).val();
  // var rejected_qty = $('#rejected_quantity'+id).val();
  var rejected_qty = 0;
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
  $('.rejected').val(rejected_qty);
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

  }

  else if($('.r_in_no').val() != '')
  {

    $('#quantity').attr('readonly','readonly');
  $('.display_rejected').show();
  $('.display_remarks').show();

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
  // var quantity = $('#remaining_qty'+id).val();
  // var quantity = $('.font_remaining_after_debit'+id).text();
  var actual_qty = $('#actual_quantity'+id).val();
  var quantity = $('#rejected_quantity'+id).val();
  var rejected_qty = 0;
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
  $('.rejected').val(rejected_qty);
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

  }
   // item_codes(item_code_id);

});

$(document).on("click",".refresh_supplier_id",function(){
      var supplier_dets=refresh_supplier_master_details();
      $(".supplier_id").html(supplier_dets);
   });

$(document).on("click",".refresh_customer_id",function(){
      var customer_dets=refresh_customer_master_details();
      $(".customer_id").html(customer_dets);
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
  
  if(item_code == '' || invoice_no == '' || quantity == '' || exclusive == '' && inclusive == '')
 {
  alert('Please Fill All The Input Fields');
 }
 else if(item_name == '')
 {
  alert('Sorry There Is No  Such Item Code!!');
  $("#item_code").val('');
  $("#item_code").focus();
 }

 else if($('.s_no').val() != '')
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
              $('.font_quantity'+td_id).text($('.quantity').val());
              // $('#remaining_after_debit'+td_id).val($('.quantity').val());
              // $('.font_remaining_after_debit'+td_id).text($('.quantity').val());
              // $('#rejected_quantity'+td_id).val($('.rejected').val());
              // $('.font_rejected_qty'+td_id).text($('.rejected').val());
              $('#debited_qty'+td_id).val($('.rejected').val());
              $('.font_debited_qty'+td_id).text($('.rejected').val());
              $('#remarks_val'+td_id).val($('.remarks').val());
              $('.font_remarks'+td_id).text($('.remarks').val());
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
              overall_discounts();
              individual_expense();
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
              $('.remarks').val('');
              $('.rejected').val('');
              $('#last_purchase_rate').val(0);
              $('.uom_inclusive').children('option').remove();
              $('.uom_exclusive').children('option').remove();
              $("select").select2();
              $('.update_items').hide();
              $('.display_remarks').hide();
              $('.display_rejected').hide();
              $('.add_items').hide();

            
}

else if($('.r_in_no').val() != '')
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
              $('.font_quantity'+td_id).text($('.quantity').val());
              // $('#rejected_quantity'+td_id).val($('.quantity').val());
              // $('.font_rejected_qty'+td_id).text($('.quantity').val());
              $('#remaining_after_debit'+td_id).val($('.quantity').val());
              $('.font_remaining_after_debit'+td_id).text($('.quantity').val());
              $('#debited_qty'+td_id).val($('.rejected').val());
              $('.font_debited_qty'+td_id).text($('.rejected').val());
              $('#remarks_val'+td_id).val($('.remarks').val());
              $('.font_remarks'+td_id).text($('.remarks').val());
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
              overall_discounts();
              individual_expense();
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
              $('.remarks').val('');
              $('.rejected').val('');
              $('#last_purchase_rate').val(0);
              $('.uom_inclusive').children('option').remove();
              $('.uom_exclusive').children('option').remove();
              $("select").select2();
              $('.update_items').hide();
              $('.display_remarks').hide();
              $('.display_rejected').hide();
              $('.add_items').hide();
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

function rejected_qty()
{
  var actual_qty = $('.actual_qty').val();
  var rejected_qty = $('.rejected').val();

  if(parseInt(rejected_qty) > parseInt(actual_qty))
  {
    alert('Quantity Exceeds!!');
    $('.rejected').val(0);
  }
  else
  {
    var qty = parseInt(actual_qty)-parseInt(rejected_qty);
    $('.quantity').val(qty);
    calc_exclusive();
  }
}

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
  overall_discounts();
  individual_expense();

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
  overall_discounts();
  individual_expense();
  
  roundoff_cal();

  });

function upload_add()
{
  var upload_details='<div class="row col-md-12 upload">\
                            <div class="col-md-3">\
                    <label style="font-family: Times new roman;">Name Of Document</label><br>\
                  <div class="form-group row">\
                     <div class="col-sm-12">\
                      <input type="text" class="form-control" placeholder="Name Of Document" name="documentname[]">\
                     </div>\
                  </div>\
               </div>\
                      \
                      <div class="col-md-4">\
                        <label style="font-family: Times new roman;">Upload Document</label>\
                      <input type="file" class="form-control" name="document[]">\
\
                      </div>\
                      <div class="col-md-2">\
                        <label style="font-family: Times new roman; color: white;">Upload</label><br>\
                      <input type="button" class="btn btn-success" value="+" onclick="upload_add()" name="" id="add_upload">&nbsp;<input type="button" class="btn btn-danger remove_upload" value="-" name="" id="remove_upload">\
                    </div>\
                       </div>';

  $('.append_upload').append(upload_details);
  $("select").select2();

}

$(document).on("click",".remove_upload",function(){

  if($(".remove_upload").length > 1){

    $(this).closest('.upload').remove();
  }
  else{
    alert("Atleast One row present");

  }

  });

function item_details_sno(){
  $(".item_s_no").each(function(key,index){
      $(this).html((key+1));
    });
}


  $("form").submit(function(e){
  var count = $('.tables').length;
    var total_rejected = calculate_total_rejected();
  if(count == 0)
  {
    alert('There Is No Row To Submit');
    e.preventDefault();
  }
  else if(total_rejected == 0)
  {
    alert('You Are Not Allowed To Submit!');
    e.preventDefault();
  } 
  else
  {

  }   
    });

  
function qty()
{
  // var actual_qty= $('#actual_qty').val();
  // var qty = $('.quantity').val();
  // if(parseInt(qty) > parseInt(actual_qty))
  // {
  //   alert('Quantity Exceeds!');
  //   $('.quantity').val('')
  // }
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
  var rejected = $('#rejected').val();
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
  
      var total = parseInt(rejected)*parseFloat(rate_exclusive);
    
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
  
      var total = parseInt(rejected)*parseFloat(rate_exclusive);
    
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
  
    else if (checkbox == false)
    {
    if(tax_rate == '')
    {
      $('#net_price').val(total.toFixed(2));
    }
    else
    {

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
      var total_net_val = parseFloat(total)+parseFloat(net_val);
      $('#net_price').val(total.toFixed(2));

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

  var total_net_val = parseFloat(amount)+parseFloat(net_val);
  total_net_val = parseFloat(total_net_val)-parseFloat(discounts);
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

  var total_net_val = parseFloat(amount)+parseFloat(net_val);
  total_net_val = parseFloat(total_net_val)-parseFloat(discounts);
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
        url: "{{ url('credit_note/getdata/{id}') }}",
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

             
             $('.item_display').dialog('close');
             $('#quantity').focus();

             if($('#quantity').val() != '')
             {
              
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
            else
            {

            }
        }

    });

      $.ajax({
           type: "POST",
            url: "{{ url('credit_note/last_purchase_rate/') }}",
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
        url: "{{ url('credit_note/getdata/{id}') }}",
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

             
             $('#cat').dialog('close');
             $('#quantity').focus();

             if($('#quantity').val() != '')
             {
              
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
            else
            {

            }
        }

    });

      $.ajax({
           type: "POST",
            url: "{{ url('credit_note/last_purchase_rate/') }}",
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
        url: "{{ url('credit_note/getdata_item/{id}') }}",
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
            url: "{{ url('credit_note/last_purchase_rate/') }}",
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
        url: "{{ url('credit_note/same_items/{id}') }}",
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
  $('#browse_item').val("");
  $("select").select2();
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
        url: "{{ url('credit_note/browse_item/{id}') }}",
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
        url: "{{ url('credit_note/change_items/{id}') }}",
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
        url: "{{ url('credit_note/brand_filter/') }}",
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

function customer_details()
{

  var customer_id=$('.customer_id').val();


  $.ajax({
           type: "POST",
            url: "{{ url('credit_note/address_details/') }}",
            data: { customer_id : customer_id },
           success: function(data) {
            var result = JSON.parse(data);
            $('#address_line_1').val(result.address);
           $('.address').text(result.address);
           $('.s_no').children('option:not(:first)').remove().end().append(result.options);
           $('.r_in_no').children('option:not(:first)').remove().end().append(result.r_in_options);
           }
        });
}

function s_details()
{

  if($('.po_alpha_beta').prop('checked'))
  {
    var alpha_beta = 1;
  }
  else
  {
    var alpha_beta = 0;
  }
  var s_no=$('.s_no').val();
  $('.r_in_no').val('');
  $('.r_in_date').val('');
  $('select').select2();

  $.ajax({
           type: "POST",
            url: "{{ url('credit_note/s_details/') }}",
            data: { s_no : s_no, alpha_beta : alpha_beta },
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
$('.s_date').val(result.date_sale_entry);
$('.sale_date').text(result.date_sale_entry);
$('.taxes').html(result.tax_append);

$('#total_discount').val(result.item_discount_sum);
$('#overall_discount').val(result.overall_discount);
$('#overall_discount').attr('readonly','readonly');
$('#round_off').val(result.round_off);
$('.total_net_value').text(result.total_net_value);
 $('#total_price').val(result.total_net_value);
 $('#so_date').val(result.date_saleorder);
 

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

function rejection_in_details()
{

  if($('.po_alpha_beta').prop('checked'))
  {
    var alpha_beta = 1;
  }
  else
  {
    var alpha_beta = 0;
  }

  var r_in_no=$('.r_in_no').val();
  $('.s_no').val('');
  $('.s_date').val('');
  $('select').select2();

  $.ajax({
           type: "POST",
            url: "{{ url('credit_note/rejection_in_details/') }}",
            data: { r_in_no : r_in_no, alpha_beta : alpha_beta },
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
$('.r_in_date').val(result.date_rejection_in);
$('.sale_date').text(result.date_sale_entry);
$('.taxes').html(result.tax_append);

$('#total_discount').val(result.item_discount_sum);
$('#overall_discount').val(result.overall_discount);
$('#overall_discount').attr('readonly','readonly');
$('#round_off').val(result.round_off);
$('.total_net_value').text(result.total_net_value);
 $('#total_price').val(result.total_net_value);
 $('#so_date').val(result.date_saleorder);
 

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
    var sum=0;
    var num=0;

    $(".overall_discount").blur(function() {
    if ($(this).val() == "" || $(this).val() == 0) 
    {
        $(this).val('0');
        //$(".overall_discount").val(0);


  $('.input_discounts').each(function(){
      var overall_discount = 0;
      var count = $(this).attr('class').split(' ')[1];
      var overall_discount = $('#overall_discount').val();

      //console.log(overall_discount);
      var amount = $('#amnt'+count).val();
      var gst_rs = $('#tax'+count).val();
      var total_amount =calculate_total_amount();
      var disc_distribution = parseFloat(overall_discount)/parseFloat(total_amount)*parseFloat(amount);
      var total_discount = parseFloat($(this).val())+parseFloat(disc_distribution);
      var net_value = parseFloat(amount)+parseFloat(gst_rs)-parseFloat(total_discount);
      //$('#input_discount'+count).val(total_discount);
      $('#font_discount'+count).text(total_discount.toFixed(2));
      $('.discount_val'+count).val(total_discount.toFixed(2));
      $('#net_price'+count).val(net_value.toFixed(2));
      $('.font_net_price'+count).text(net_value.toFixed(2));
      num++;
  });
  // if(num == 0)
  //   {
  //     alert('you Cannot Add Overall Discount!');
  //     $('.overall_discount').val(0);
  //   }
  var total_net_price = calculate_total_net_price();
  $("#total_price").val(total_net_price.toFixed(2));
  $(".total_net_value").text(total_net_price.toFixed(2));
  var to_html_total_net = total_net_price.toFixed(2);
  $(".total_net_price").html(parseFloat(to_html_total_net));
  roundoff_cal();
  var q=calculate_total_discount();
  $('#total_discount').val(q.toFixed(2));
  $('#disc_total').val(q.toFixed(2));


    }
    else
    {

    var total = $('#total_price').val();
  if(total == 0)
  {
    alert('You Cannot Add Overall Discount Without Adding Item Details!!');
    $('.overall_discount').val(0);
  }
  else
  {

  $('.input_discounts').each(function(){
      var overall_discount = 0;
      var count = $(this).attr('class').split(' ')[1];
      var overall_discount = $('#overall_discount').val();

      // console.log(overall_discount);
      var amount = $('#amnt'+count).val();
      var gst_rs = $('#tax'+count).val();
      var total_amount =calculate_total_amount();
      var disc_distribution = parseFloat(overall_discount)/parseFloat(total_amount)*parseFloat(amount);
      var total_discount = parseFloat($(this).val())+parseFloat(disc_distribution);
      var net_value = parseFloat(amount)+parseFloat(gst_rs)-parseFloat(total_discount);
      //$('#input_discount'+count).val(total_discount);
      $('#font_discount'+count).text(total_discount.toFixed(2));
      $('.discount_val'+count).val(total_discount.toFixed(2));
      $('#net_price'+count).val(net_value.toFixed(2));
      $('.font_net_price'+count).text(net_value.toFixed(2));
      num++;
  });
  // if(num == 0)
  //   {
  //     alert('you Cannot Add Overall Discount!');
  //     $('.overall_discount').val(0);
  //   }
  var total_net_price = calculate_total_net_price();
  $("#total_price").val(total_net_price.toFixed(2));
  $(".total_net_value").text(total_net_price.toFixed(2));
  var to_html_total_net = total_net_price.toFixed(2);
  $(".total_net_price").html(parseFloat(to_html_total_net));
  roundoff_cal();
  var q=calculate_total_discount();
  $('#total_discount').val(q.toFixed(2));
  $('#disc_total').val(q.toFixed(2));

}
}
 }); 
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

