@extends('admin.layout.app')
@section('content')
<main class="page-content">

<div class="col-12 body-sec">
  <div class="card container px-0">
    <!-- card header start@ -->
    <div class="card-header px-2">
      <div class="row">
        <div class="col-4">
          <h3> Cart To Gate Pass Entry</h3>
        </div>
        <div class="col-8 mr-auto">
          <ul class="h-right-btn mb-0 pl-0">
            <li><button type="button" class="btn btn-success"><a href="{{ route('cart.index') }}">Back</a></button></li>
          </ul>
        </div>
      </div>
    </div>
    <!-- card header end@ -->
    <div class="card-body">
    
      <form  method="post" class="form-horizontal needs-validation" action="{{ route('cart.update',$cart->cart_id) }}" enctype="multipart/form-data">
      {{csrf_field()}}
      @method('PATCH')


     
        <div class="form-row">
         

         <!--  <div class="col-md-8">
          <h4>Professional details:</h4>
          </div> -->
          <div class="col-md-6">
            
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Gate Pass No</label>
              <div class="col-sm-8">
            <div class="input-group">
            
                     <input type="text" class="form-control" readonly placeholder="Auto Generate" name="num" value="">
                
            
          </div>
          
          </div>
          </div>

          </div>

          <div class="col-md-6">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Date </label>
              <div class="col-sm-8">
                <input type="date" class="form-control"  placeholder="Date"  name="date" value="{{ $cart->date }}" >
                
                
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
                        <select class="js-example-basic-multiple col-12 form-control custom-select supplier_name required_for_valid" name="supplier_name">
                          <option value="{{ $cart->suppliers_id }}">{{ $cart->name }}</option>
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
            
                     <input type="text" class="form-control"   placeholder="Supplier Name" name="name" pattern="[a-z A-Z]{4,100}" title="Alphabetic Letters Only should be more than 3 letters" value="{{ $cart->name }}">
                
                 <input type="hidden" name="supplier_name" value="{{ $cart->suppliers_id }}">
            
          </div>
          
          </div> -->
          </div>

          </div>

          <div class="col-md-6">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Type</label>
              <div class="col-sm-8">
                <input type="hidden" name="value" value="{{ $type_value }}">
                @if($cart->type == 1)
               <input type="radio" name="type" checked="" value="1" onchange="invoice()">
               <label for="validationCustom01" class="col-sm-4 col-form-label">Invoice</label>
               <input type="radio" name="type"  value="0" onchange="delivery()">
                <label for="validationCustom01" class="col-sm-4 col-form-label">Delivery note</label>
               @else
               <input type="radio" name="type" value="1" onchange="invoice()">
               <label for="validationCustom01" class="col-sm-4 col-form-label">Invoice</label>
                <input type="radio" name="type"  value="0" checked="" onchange="delivery()">
                <label for="validationCustom01" class="col-sm-4 col-form-label">Delivery note</label>
                @endif
              </div>
            </div>
          </div>

 </div>

 <div class="form-row">
         

         <!--  <div class="col-md-8">
          <h4>Professional details:</h4>
          </div> -->
          <div class="col-md-6">
            @if($cart->type == 1)
            <div class="form-group row" id="invoice_number">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Supplier Invoice No</label>
              <div class="col-sm-8">
            <div class="input-group">
            
                     <input type="text" class="form-control" id="invoice_num"  placeholder="Supplier Invoice No" name="supplier_invoice_number"  value="{{ $cart->supplier_invoice_number }}">
                
          </div>
          
          </div>
          </div>

          <div class="form-group row"  style="display: none;" id="delivery_number">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Supplier Delivery No</label>
              <div class="col-sm-8">
            <div class="input-group">
            
                     <input type="text" class="form-control" id="delivery_num" placeholder="Supplier Delivery No" name="supplier_delivery_number"  value="{{ $cart->supplier_delivery_number }}">
                
          </div>
          
          </div>
          </div>
          @else

          <div class="form-group row" id="delivery_number">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Supplier Delivery No</label>
              <div class="col-sm-8">
            <div class="input-group">
            
                     <input type="text" class="form-control" id="delivery_num" placeholder="Supplier Delivery No" name="supplier_delivery_number"  value="{{ $cart->supplier_delivery_number }}">
                
          </div>
          
          </div>
          </div>

<div class="form-group row" style="display: none;" id="invoice_number">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Supplier Invoice No</label>
              <div class="col-sm-8">
            <div class="input-group">
            
                     <input type="text" class="form-control" id="invoice_num" placeholder="Supplier Invoice No" name="supplier_invoice_number"  value="{{ $cart->supplier_invoice_number }}">
                
          </div>
          
          </div>
          </div>

          @endif

          </div>

          <div class="col-md-6">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Taxable Value </label>
              <div class="col-sm-8">
                <input type="text" class="form-control" id="taxable_value" onchange="calc1()"  placeholder="Taxable Value" name="taxable_value" pattern="[0-9][0-9 . 0-9]{0,100}" title="Numbers Only" required="" value="{{ $cart->taxable_value }}">
               
                
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
            
                     <input type="text" class="form-control" id="tax_value" onchange="calc2()"  placeholder="Tax Value" name="tax_value"  pattern="[0-9][0-9 . 0-9]{0,100}" title="Numbers Only" required="" value="{{ $cart->tax_value }}">
                
          </div>
          
          </div>
          </div>

          </div>

          <div class="col-md-6">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Total Invoice Value </label>
              <div class="col-sm-8">
                <input type="text" class="form-control" readonly="" id="total_invoice_value" onclick="calc()" placeholder="Total invoice Value" name="total_invoice_value"  pattern="[0-9][0-9 . 0-9]{0,100}" required="" title="Numbers Only" value="{{ $cart->total_invoice_value }}">
               
                
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
            
                     <input type="text" class="form-control"  placeholder="Load Bill" name="load_bill" pattern="[0-9][0-9 . 0-9]{0,100}" required="" title="Numbers Only" value="{{ $cart->load_bill }}">
                
          </div>
          
          </div>
          </div>

          </div>

          <div class="col-md-6">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Load Live </label>
              <div class="col-sm-8">
                <input type="text" class="form-control"  placeholder="Load Live" name="load_live"  pattern="[0-9][0-9 . 0-9]{0,100}" required="" title="Numbers Only" value="{{ $cart->load_live }}">
               
                
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
            
                     <input type="text" class="form-control"  placeholder="Unload Bill" name="unload_bill" pattern="[0-9][0-9 . 0-9]{0,100}" title="Numbers Only" value="{{ $cart->unload_bill }}">
                
          </div>
          
          </div>
          </div>

          </div>

          <div class="col-md-6">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Unload Live </label>
              <div class="col-sm-8">
                <input type="text" class="form-control"  placeholder="Unload Live" name="unload_live" pattern="[0-9][0-9 . 0-9]{0,100}" title="Numbers Only" value="{{ $cart->unload_live }}">
               
                
              </div>
            </div>
          </div>

 </div> 
          
        <div class="col-md-7 text-right">
          <input type="submit" class="btn btn-success" name="update" value="Add">
           
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
  
    var total = parseFloat(taxable_value) + parseFloat(tax_value);
    $('#total_invoice_value').val(total.toFixed(2));
  
}
function calc1()
{
  
  var taxable_value=$('#taxable_value').val();
  var tax_value=$('#tax_value').val();
  
    var total = parseFloat(taxable_value) + parseFloat(tax_value);
    $('#total_invoice_value').val(total.toFixed(2));
  
}
function calc2()
{
  
  var taxable_value=$('#taxable_value').val();
  var tax_value=$('#tax_value').val();
  
    var total = parseFloat(taxable_value) + parseFloat(tax_value);
    $('#total_invoice_value').val(total.toFixed(2));
  
}

$(document).on("click",".refresh_supplier_name",function(){
      var supplier_dets=refresh_supplier_master_details();
      $(".supplier_name").html(supplier_dets);
   });
</script>

@endsection

