@extends('admin.layout.app')
@section('content')
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
          <h3>Edit Purchase Gate Pass Entry</h3>
        </div>
        <div class="col-8 mr-auto">
          <ul class="h-right-btn mb-0 pl-0">
            <li><button type="button" class="btn btn-success"><a href="{{ url('purchase_gatepass_entry/index/0') }}">Back</a></button></li>
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


<form  method="post" class="form-horizontal" action="{{ route('purchase_gatepass_entry.update',$purchase_gatepass->purchase_gatepass_no) }}" id="dataInput" enctype="multipart/form-data">
      {{csrf_field()}}
      @method('PATCH')

      
                       <div class="row col-md-12">

                                <div class="col-md-2">
                                  <label style="font-family: Times new roman;">Voucher No</label><br>
                                  <div class="">
                                    <input type="hidden" readonly="" class="form-control proof_file  required_for_proof_valid" id="voucher_no" placeholder="Auto Generate Voucher No" name="voucher_no" value="{{ $purchase_gatepass->purchase_gatepass_no }}">
                                    <font size="2">{{ $purchase_gatepass->purchase_gatepass_no }}</font>
                                  </div>
                                
                                 
                                </div>

                                <div class="col-md-2">
                                  <label style="font-family: Times new roman;">Voucher Date</label><br>
                                <input type="date" class="form-control voucher_date  required_for_proof_valid" id="voucher_date" placeholder="Voucher Date" name="voucher_date" value="{{ $purchase_gatepass->purchase_gatepass_date }}">
                                 
                                </div>

                                <div class="col-md-3">
                                  <label style="font-family: Times new roman;">Purchase Order No</label><br>
                                <select class="js-example-basic-multiple form-control po_no" 
                                data-placeholder="Choose Purchase Order No" onchange="po_details()" id="po_no"  name="po_no" >
                                <option value="{{ $purchase_gatepass->po_no }}">{{ $purchase_gatepass->po_no }}</option>
                                @foreach($purchaseorder as $purchaseorders)
                                <option value="{{ $purchaseorders->po_no }}">{{ $purchaseorders->po_no }}</option>
                                  @endforeach
                                 </select>
                                 
                                </div>
                                <div class="col-md-3">
                                  <label style="font-family: Times new roman;">Purchase Order Date</label><br>
                                <input type="date" class="form-control po_date  required_for_proof_valid" id="po_date" placeholder="Purchase Order Date" name="po_date" value="{{ $purchase_gatepass->po_date }}">
                                 
                                </div>

                                <!-- <div class="col-md-2">
                                  <label style="font-family: Times new roman;">Estimaton No</label><br>
                                <select class="js-example-basic-multiple form-control estimation_no" 
                                data-placeholder="Choose Estimation No"  id="estimation_no" name="estimation_no" >
                                <option value="{{ $purchase_gatepass->estimation_no }}">{{ $purchase_gatepass->estimation_no }}</option>
                                @foreach($estimation as $estimations)
                                <option value="{{ $estimations->estimation_no }}">{{ $estimations->estimation_no }}</option>
                                  @endforeach
                                  
                                 </select>
                                 
                                </div>
                                <div class="col-md-2">
                                  <label style="font-family: Times new roman;">Estimaton Date</label><br>
                                <input type="date" class="form-control estimation_date  required_for_proof_valid" id="estimaton_date" placeholder="Estimaton Date" name="estimation_date" value="{{ $purchase_gatepass->estimation_date }}">
                                 
                                </div> -->
                                
                                </div>

                                <div class="row col-md-12">

                                  <div class="col-md-4">
                  <label style="font-family: Times new roman;">Party Name</label><br>
                  <div class="form-group row">
                     <div class="col-sm-8">
                      <select class="js-example-basic-multiple col-12 form-control custom-select supplier_id" onchange="supplier_details()" name="supplier_id" id="supplier_id">
                           <option value="{{ $purchase_gatepass->supplier->id }}">{{$purchase_gatepass->supplier->name}}</option>
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
                                <div class="col-md-2">
                                  <label style="font-family: Times new roman;">Party Address</label><br>
                                  <input type="hidden" name="address_line_1" id="address_line_1">
                                  
                                  <div class="address">
                                    
                                  </div>
                                </div>
                                <div class="col-md-2">
                                  <label style="font-family: Times new roman;">Purchase Type</label><br>
                                  <input type="hidden" name="purchase_type" id="purchase_type">

                                  <div class="purchase_type">
                                    @if($purchase_type == 1)
                                    Cash Purchase  
                                    @else
                                    Credit Purchase 
                                    @endif
                                  </div>
                                </div>
                                <div class="col-md-2">
                                  <label style="font-family: Times new roman;">Taxable value</label><br>
                                  <input type="hidden" name="taxable_value" id="taxable_value">

                                  <div class="taxable_value">
                                    {{ $item_amount_sum }}
                                  </div>
                                </div>
                                <div class="col-md-2">
                                  <label style="font-family: Times new roman;">Tax value</label><br>
                                  <input type="hidden" name="tax_value" id="tax_value">

                                  <div class="tax_value">
                                    {{ $item_gst_rs_sum }}
                                  </div>
                                </div>
                                <div class="col-md-2">
                                  <label style="font-family: Times new roman;">Invoice value</label><br>
                                  <input type="hidden" name="invoice_value" id="invoice_value">

                                  <div class="invoice_value">
                                    {{ $item_net_value_sum }}
                                  </div>
                                </div>
                              </div>
                              <br>
              <div class="col-md-8">
                       <div class="form-group row">
                       <div class="col-md-4">
                       <label for="validationCustom01" class=" col-form-label"><h4>Weight Details:</h4> </label><br>
                       
                           
                       </div>
                         </div>
              </div>

              <div class="row col-md-12">

                      <div class="col-md-2">
                      <label style="font-family: Times new roman;">Load Bill</label><br>
                      <input type="text" class="form-control" name="load_bill" id="load_bill" placeholder="Load Bill" value="{{ $purchase_gatepass->load_bill }}">
                      </div>

                      <div class="col-md-2">
                      <label style="font-family: Times new roman;">Unload Bill</label><br>
                      <input type="text" class="form-control" name="unload_bill" id="unload_bill" placeholder="Unload Bill" value="{{ $purchase_gatepass->unload_bill }}">
                      </div>
                      
                      <div class="col-md-2">
                      <label style="font-family: Times new roman;">Load Live</label><br>
                      <input type="text" class="form-control" name="load_live" id="load_live" placeholder="Load Live" value="{{ $purchase_gatepass->load_live }}">
                      </div>

                      <div class="col-md-2">
                      <label style="font-family: Times new roman;">Unload Live</label><br>
                      <input type="text" class="form-control" name="unload_live" id="unload_live" placeholder="Unload Live" value="{{ $purchase_gatepass->unload_live }}">
                      </div>          
                                 
              </div>
              <br>
                                
      

                       

                       <div class="col-md-7 text-right">
          <input type="submit" class="btn btn-success save" style="margin-bottom: 150px;" name="save" value="Update">
        </div>
      </form>
                       
        <script type="text/javascript">
          

function supplier_details()
{

  var supplier_id=$('.supplier_id').val();


  $.ajax({
           type: "POST",
            url: "{{ url('purchase_gatepass_entry/address_details/') }}",
            data: { supplier_id : supplier_id },
           success: function(data) {

            console.log(data);
            $('#address_line_1').val(data);
            
           $('.address').text(data);
           }
        });
}


$(document).on("click",".refresh_supplier_id",function(){
      var customer_dets=refresh_supplier_master_details();
      $(".supplier_id").html(customer_dets);
   });

function po_details()
{
  var po_no=$('.po_no').val();

  $.ajax({
           type: "POST",
            url: "{{ url('purchase_gatepass_entry/po_details/') }}",
            data: { po_no : po_no },
           success: function(data) {
            var result=JSON.parse(data);
          $('.taxable_value').text(result.item_amount_sum);
          $('.tax_value').text(result.item_gst_rs_sum);
          $('.invoice_value').text(result.item_net_value_sum);
          $('#po_date').val(result.date_po);
          if(result.purchase_type == 1)
          {
           $('.purchase_type').text('Cash Purchase'); 
          }
          else
          {
            $('.purchase_type').text('Credit Purchase'); 
          }
          

            
           }
        });
}


</script>
<script type="text/javascript">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" rel="stylesheet"/>
<script src="jquery.ui.position.js"></script>
</script>

<style type="text/css">
  .ui-dialog.ui-widget-content { background: #a3d072; }
</style>


    </div>
    <!-- card body end@ -->
  </div>
</div>
@endsection

