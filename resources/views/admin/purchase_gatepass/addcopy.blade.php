@extends('admin.layout.app')
@section('content')
<main class="page-content">
<div class="container-fuild" style="background:#28a745">
				<div class="text-right pr-3">sdfjsdfjl</div>
		</div>
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
          <h3>Purchase Gate Pass Entry</h3>
        </div>
        <div class="col-8 mr-auto">
          <ul class="h-right-btn mb-0 pl-0">
            <li><button type="button" class="btn btn-success"><a href="{{ route('purchase_gatepass_entry.index') }}">Back</a></button></li>
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


<form  method="post" class="form-horizontal" action="{{ route('purchase_gatepass_entry.store') }}" id="dataInput" enctype="multipart/form-data">
      {{csrf_field()}}

      
                       <div class="row col-md-12">

                                <div class="col-md-2">
                                  <label style="font-family: Times new roman;">Voucher No</label><br>
                                  <div class="">
                                    <!-- <input type="text" readonly="" class="form-control proof_file  required_for_proof_valid" id="voucher_no" placeholder="Auto Generate Voucher No" name="voucher_no" value=""> -->
                                    <font size="2">1</font>
                                  </div>
                                
                                 
                                </div>

                                <div class="col-md-2">
                                  <label style="font-family: Times new roman;">Voucher Date</label><br>
                                <input type="date" class="form-control voucher_date  required_for_proof_valid" id="voucher_date" placeholder="Voucher Date" name="voucher_date" value="{{ $date }}">
                                 
                                </div>

                                <div class="col-md-2">
                                  <label style="font-family: Times new roman;">Purchase Order No</label><br>
                                <select class="js-example-basic-multiple form-control po_no" 
                                data-placeholder="Choose Purchase Order No" required="" id="po_no" onchange="supplier_details()" name="po_no" >
                                <option value=""></option>
                                  
                                 </select>
                                 
                                </div>
                                <div class="col-md-2">
                                  <label style="font-family: Times new roman;">Purchase Order Date</label><br>
                                <input type="date" class="form-control po_date  required_for_proof_valid" id="po_date" placeholder="Purchase Order Date" name="po_date" value="{{ $date }}">
                                 
                                </div>

                                <div class="col-md-2">
                                  <label style="font-family: Times new roman;">Estimaton No</label><br>
                                <select class="js-example-basic-multiple form-control estimation_no" 
                                data-placeholder="Choose Estimation No" required="" id="estimation_no" onchange="supplier_details()" name="estimation_no" >
                                <option value=""></option>
                                  
                                 </select>
                                 
                                </div>
                                <div class="col-md-2">
                                  <label style="font-family: Times new roman;">Estimaton Date</label><br>
                                <input type="date" class="form-control estimaton_date  required_for_proof_valid" id="estimaton_date" placeholder="Estimaton Date" name="estimaton_date" value="{{ $date }}">
                                 
                                </div>
                                
                                </div>

                                <div class="row col-md-12">

                                  <div class="col-md-2">
                                  <label style="font-family: Times new roman;">Party Name</label><br>
                                <select class="js-example-basic-multiple form-control supplier_id" 
                                data-placeholder="Choose Supplier Name" required="" id="supplier_id" onchange="supplier_details()" name="supplier_id" >
                                <option value=""></option>
                                   @foreach($supplier as $suppliers)
                                   <option value="{{ $suppliers->id }}">{{ $suppliers->name }}</option>
                                   @endforeach
                                 </select>
                                 
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
                                    
                                  </div>
                                </div>
                                <div class="col-md-2">
                                  <label style="font-family: Times new roman;">Taxable value</label><br>
                                  <input type="hidden" name="taxable_value" id="taxable_value">

                                  <div class="taxable_value">
                                    
                                  </div>
                                </div>
                                <div class="col-md-2">
                                  <label style="font-family: Times new roman;">Tax value</label><br>
                                  <input type="hidden" name="tax_value" id="tax_value">

                                  <div class="tax_value">
                                    
                                  </div>
                                </div>
                                <div class="col-md-2">
                                  <label style="font-family: Times new roman;">Invoice value</label><br>
                                  <input type="hidden" name="invoice_value" id="invoice_value">

                                  <div class="invoice_value">
                                    
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
                      <input type="text" class="form-control" name="load_bill" id="load_bill" placeholder="Load Bill">
                      </div>

                      <div class="col-md-2">
                      <label style="font-family: Times new roman;">Unload Bill</label><br>
                      <input type="text" class="form-control" name="unload_bill" id="unload_bill" placeholder="Unload Bill">
                      </div>
                      
                      <div class="col-md-2">
                      <label style="font-family: Times new roman;">Load Live</label><br>
                      <input type="text" class="form-control" name="load_live" id="load_live" placeholder="Load Live">
                      </div>

                      <div class="col-md-2">
                      <label style="font-family: Times new roman;">Unload Live</label><br>
                      <input type="text" class="form-control" name="unload_live" id="unload_live" placeholder="Unload Live
                      ">
                      </div>          
                                 
              </div>
              <br>
                                
      

                       

                       <div class="col-md-7 text-right">
          <input type="submit" class="btn btn-success save" style="margin-bottom: 150px;" name="save" value="Save" disabled="">
        </div>
      </form>
                       
        <script type="text/javascript">
          

function supplier_details()
{

  var supplier_id=$('.supplier_id').val();


  $.ajax({
           type: "POST",
            url: "{{ url('estimation/address_details/') }}",
            data: { supplier_id : supplier_id },
           success: function(data) {

            console.log(data);
            $('#address_line_1').val(data);
            
           $('.address').text(data);
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

