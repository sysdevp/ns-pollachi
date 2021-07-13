@extends('admin.layout.app')
@section('content')
<main class="page-content">

<div class="col-12 body-sec">
  <div class="card container px-0">
    <!-- card header start@ -->
    <div class="card-header px-2">
      <div class="row">
        <div class="col-4">
          <h3>Gate Pass Entry</h3>
        </div>
        <div class="col-8 mr-auto">
          <ul class="h-right-btn mb-0 pl-0">
            <li><button type="button" class="btn btn-success"><a href="{{ route('gate_pass_entry.index') }}">Back</a></button></li>
          </ul>
        </div>
      </div>
    </div>
    <!-- card header end@ -->
    <div class="card-body">
    
      <form  method="post" class="form-horizontal needs-validation" action="{{ route('gate_pass_entry.store') }}" enctype="multipart/form-data">
      {{csrf_field()}}
      @method('POST')


     
        <div class="form-row">
         

         <!--  <div class="col-md-8">
          <h4>Professional details:</h4>
          </div> -->
          <div class="col-md-6">
            
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Gate Pass No</label>
              <div class="col-sm-8">
            <div class="input-group">
            
                     <input type="text" class="form-control" readonly placeholder="Auto  Generate" name="num" value="">
                
            
          </div>
          
          </div>
          </div>

          </div>

          <div class="col-md-6">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Date </label>
              <div class="col-sm-8">
                <input type="date" class="form-control"  placeholder="Date" name="date" value="{{ $date }}" >
                
                
              </div>
            </div>
          </div>

 </div>

 <div class="form-row">
         

         <!--  <div class="col-md-8">
          <h4>Professional details:</h4>
          </div> -->

          <div class="col-md-6">
            
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Supplier Name</label>

              <div class="col-sm-6">
                        <select class="js-example-basic-multiple col-12 form-control custom-select supplier_name " name="supplier_name">
                          <option value="">Choose Supplier Name</option>
                          @foreach($supplier as $value)
                          <option value="{{ $value->id }}">{{ $value->name }}</option>
                          @endforeach
                        </select>
                      </div>
                      <a href="{{ url('master/supplier/create')}}" target="_blank">
                     <button type="button"  class="px-2 btn btn-success ml-2" title="Add New Supplier"><i class="fa fa-plus-circle" aria-hidden="true"></i></button></a>
                     <button type="button"  class="px-2 btn btn-success mx-2 refresh_supplier_name" title="Add supplier Name"><i class="fa fa-refresh" aria-hidden="true"></i></button>
              <!-- <div class="col-sm-8">
            <div class="input-group">

              <select class="form-control" name="supplier_name" required="">
                <option></option>
                @foreach($supplier as $value)
                <option value="{{ $value->id }}">{{ $value->name }}</option>
                @endforeach
              </select> -->
            
                     <!-- <input type="text" class="form-control"   placeholder="Supplier Name" name="supplier_name" pattern="[a-zA-Z]{4,100}" title="Alphabetic Letters Only should be more than 3 letters"> -->
                
                 
            
          <!-- </div>
          
          </div> -->
          </div>

          </div>

          <div class="col-md-6">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Type</label>
              <div class="col-sm-8">
               <input type="radio" name="type" checked="" value="1" onchange="invoice()">
               <label for="validationCustom01" class="col-sm-4 col-form-label">Invoice</label>
                <input type="radio" name="type"  value="0" onclick="delivery()">
                <label for="validationCustom01" class="col-sm-4 col-form-label">Delivery note</label>
              </div>
            </div>
          </div>

 </div>

 <div class="form-row">
         

         <!--  <div class="col-md-8">
          <h4>Professional details:</h4>
          </div> -->
          <div class="col-md-6">
            
            <div class="form-group row" id="invoice_number">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Supplier Invoice No</label>
              <div class="col-sm-8">
            <div class="input-group">
            
                     <input type="text" class="form-control" id="invoice_num"  placeholder="Supplier Invoice No" name="supplier_invoice_number">
                
          </div>
          
          </div>
          </div>


          <div class="form-group row" style="display: none;" id="delivery_number">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Supplier Delivery No</label>
              <div class="col-sm-8">
            <div class="input-group">
            
                     <input type="text" class="form-control" id="delivery_num" placeholder="Supplier Delivery No" name="supplier_delivery_number" >
                
          </div>
          
          </div>
          </div>

          </div>

          <div class="col-md-6">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Taxable Value </label>
              <div class="col-sm-8">
                <input type="text" class="form-control" id="taxable_value" required="" placeholder="Taxable Value" name="taxable_value" pattern="[0-9][0-9 . 0-9]{0,100}" title="Numbers Only">
               
                
              </div>
            </div>
          </div>

 </div>

 <div class="form-row">
         

         <!--  <div class="col-md-8">
          <h4>Professional details:</h4>
          </div> -->
          <div class="col-md-6">
            
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Tax Value</label>
              <div class="col-sm-8">
            <div class="input-group">
            
                     <input type="text" class="form-control" id="tax_value" required="" onchange="calc()"  placeholder="Tax Value" name="tax_value"  pattern="[0-9][0-9 . 0-9]{0,100}" title="Numbers Only">
                
          </div>
          
          </div>
          </div>

          </div>

          <div class="col-md-6">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Total Invoice Value </label>
              <div class="col-sm-8">
                <input type="text" class="form-control" readonly="" required="" id="total_invoice_value"  placeholder="Total invoice Value" name="total_invoice_value"  pattern="[0-9][0-9 . 0-9]{0,100}" title="Numbers Only">
               
                
              </div>
            </div>
          </div>

 </div>

         <div>
          <h6>Weight Info*</h6>
          </div>

          
         <div class="form-row">
         

         <!--  <div class="col-md-8">
          <h4>Professional details:</h4>
          </div> -->
          <div class="col-md-6">
            
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Load Bill</label>
              <div class="col-sm-8">
            <div class="input-group">
            
                     <input type="text" class="form-control" required="" placeholder="Load Bill" name="load_bill" pattern="[0-9][0-9 . 0-9]{0,100}" title="Numbers Only">
                
          </div>
          
          </div>
          </div>

          </div>

          <div class="col-md-6">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Load Live </label>
              <div class="col-sm-8">
                <input type="text" class="form-control" required="" placeholder="Load Live" name="load_live"  pattern="[0-9][0-9 . 0-9]{0,100}" title="Numbers Only">
               
                
              </div>
            </div>
          </div>

 </div> 

 <div class="form-row">
         

         <!--  <div class="col-md-8">
          <h4>Professional details:</h4>
          </div> -->
          <div class="col-md-6">
            
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Unload Bill</label>
              <div class="col-sm-8">
            <div class="input-group">
            
                     <input type="text" class="form-control"  placeholder="Unload Bill" name="unload_bill" pattern="[0-9][0-9 . 0-9]{0,100}" title="Numbers Only">
                
          </div>
          
          </div>
          </div>

          </div>

          <div class="col-md-6">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Unload Live </label>
              <div class="col-sm-8">
                <input type="text" class="form-control"  placeholder="Unload Live" name="unload_live" pattern="[0-9][0-9 . 0-9]{0,100}" title="Numbers Only">
               
                
              </div>
            </div>
          </div>

 </div> 
          
        <div class="col-md-7 text-right">
          <input type="submit" class="btn btn-success" name="save" value="Save">
          <input type="submit" class="btn btn-success" name="cart" value="Add To Cart"> 
        </div>
      </form>
    </div>
    <!-- card body end@ -->
  </div>
</div>
<script src="{{asset('assets/js/master/add_more_item_tax_details.js')}}"></script>
<script src="{{asset('assets/js/master/add_more_barcode_details.js')}}"></script>

<script>
function delivery()
{
  $('#invoice_number').hide();
  $('#delivery_number').show();
  $('#delivery_num').focus();
}

function invoice()
{
  $('#invoice_number').show();
  $('#invoice_num').focus();
  $('#delivery_number').hide();
}

function calc()
{
  var taxable_value=$('#taxable_value').val();
  var tax_value=$('#tax_value').val();
  if (taxable_value == '') 
  {
    alert('Please Fill Taxable Value First');
    $('#tax_value').val('');
  }
  else
  {
    var total = parseFloat(taxable_value) + parseFloat(tax_value);
    $('#total_invoice_value').val(total.toFixed(2));
  }
}

$(document).on("click",".refresh_supplier_name",function(){
      var supplier_dets=refresh_brand_master_details();
      $(".supplier_name").html(supplier_dets);
   });
</script>

@endsection

