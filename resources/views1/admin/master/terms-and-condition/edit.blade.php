@extends('admin.layout.app')
@section('content')
<main class="page-content">

<div class="col-12 body-sec">
  <div class="card container px-0">
    <!-- card header start@ -->
    <div class="card-header px-2">
      <div class="row">
        <div class="col-4">
          <h3>Edit Terms And Conditions</h3>
        </div>
        <div class="col-8 mr-auto">
          <ul class="h-right-btn mb-0 pl-0">
            <li><button type="button" class="btn btn-success"><a href="{{ route('terms-and-condition.index') }}">Back</a></button></li>
          </ul>
        </div>
      </div>
    </div>
    <!-- card header end@ -->
    <div class="card-body">
    
      <form  method="post" class="form-horizontal needs-validation" action="{{route('terms-and-condition.update',$terms->id)}}" enctype="multipart/form-data">
      {{csrf_field()}}
      @method('PATCH')


        <div class="form-row">

        <div class="col-md-6">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Types <span class="mandatory">*</span> </label>
              <div class="col-sm-8">
                <select class="js-example-basic-multiple col-12 form-control custom-select types"  name="types" id="types" required="">
                  <option value="{{ $terms->type }}">{{ $terms->type }}</option>
                  <option value="Purchase">Purchase</option>
                  <option value="Sales">Sales</option>
                  <option value="Payment">Payment</option>
                  <option value="Receipt">Receipt</option>
                  <option value="Advance Settlement">Advance Settlement</option>
                  <option value="Account Expenses">Account Expenses</option>
                  <option value="Production Module">Production Module</option>
                </select>
              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Name <span class="mandatory">*</span> </label>
              <div class="col-sm-8">
                <select class="js-example-basic-multiple col-12 form-control custom-select name"  name="name" id="name" required="">
                  @if($terms->type == 'Purchase')
                  <option value="{{ $terms->name }}">{{ $terms->name }}</option>
                  <option value="Estimation">Estimation</option>
                  <option value="Purchase Order">Purchase Order</option>
                  <option value="Receipt Note">Receipt Note</option>
                  <option value="Purchase Entry">Purchase Entry</option>
                  <option value="Rejection Out">Rejection Out</option>
                  <option value="Purchase Gatepass Entry">Purchase Gatepass Entry</option>
                  <option value="Debit Note">Debit Note</option>
                  @elseif($terms->type == 'Sales')
                  <option value="{{ $terms->name }}">{{ $terms->name }}</option>
                  <option value="Sales Estimation">Sales Estimation</option>
                  <option value="Sales Order">Sales Order</option>
                  <option value="Delivery Note">Delivery Note</option>
                  <option value="Sales Entry">Sales Entry</option>
                  <option value="Rejection In">Rejection In</option>
                  <option value="Sales Gatepass Entry">Sales Gatepass Entry</option>
                  <option value="Credit Note">Credit Note</option>
                  @elseif($terms->type == 'Payment')
                  <option value="{{ $terms->name }}">{{ $terms->name }}</option>
                  <option value="Payment Request">Payment Request</option>
                  <option value="Payment Process">Payment Process</option>
                  <option value="Payment Of Expenses">Payment Of Expenses</option>
                  @elseif($terms->type == 'Receipt')
                  <option value="{{ $terms->name }}">{{ $terms->name }}</option>
                  <option value="Receipt Request">Receipt Request</option>
                  <option value="Receipt Process">Receipt Process</option>
                  <option value="Receipt Of Income">Receipt Of Income</option>
                  @elseif($terms->type == 'Advance Settlement')
                  <option value="{{ $terms->name }}">{{ $terms->name }}</option>
                  <option value="Advance To Suppliers">Advance To Suppliers</option>
                  <option value="Advance From Customers">Advance From Customers</option>
                  @elseif($terms->type == 'Account Expenses')
                  <option value="{{ $terms->name }}">{{ $terms->name }}</option>
                  <option value="Account Transaction">Account Transaction</option>
                  @elseif($terms->type == 'Production Module')
                  <option value="{{ $terms->name }}">{{ $terms->name }}</option>
                  <option value="Production">Production</option>
                  @endif
                </select>
              </div>
            </div>
          </div>
          </div>

          <div class="form-row">
          <div class="col-md-6">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Terms And Condition<span class="mandatory">*</span></label>
              <div class="col-sm-8">
                <input type="text" class="form-control" placeholder="Terms" required="" name="terms" value="{{ $terms->terms }}">
              </div>
            </div>
          </div>

        </div>
        <br>


        <div class="col-md-7 text-right">
          <input type="submit" class="btn btn-success submit" name="submit" value="Submit">
          <!-- <input type="submit" class="btn btn-success add" name="add" value="Submit">
          <input type="button" class="btn btn-warning cancel" name="cancel" value="Cancel"> -->
        </div>
        <div class="col-md-7 text-right">
          
        </div>
      </form>
    </div>
    <script src="{{asset('assets/js/master/capitalize.js')}}"></script>
    <!-- card body end@ -->
  </div>
</div>

<script type="text/javascript">

$(document).on('change','.types',function(){

  if($(this).val() == 'Purchase')
  {
    var purchase = '<option value="Estimation">Estimation</option>\
                  <option value="Purchase Order">Purchase Order</option>\
                  <option value="Receipt Note">Receipt Note</option>\
                  <option value="Purchase Entry">Purchase Entry</option>\
                  <option value="Rejection Out">Rejection Out</option>\
                  <option value="Purchase Gatepass Entry">Purchase Gatepass Entry</option>\
                  <option value="Debit Note">Debit Note</option>';
  $('.name').find('option').remove();                
  $(purchase).appendTo('#name');                  
  }

  else if ($(this).val() == 'Sales')
  {
  var sales = '<option value="Sales Estimation">Sales Estimation</option>\
              <option value="Sales Order">Sales Order</option>\
              <option value="Delivery Note">Delivery Note</option>\
              <option value="Sales Entry">Sales Entry</option>\
              <option value="Rejection In">Rejection In</option>\
              <option value="Sales Gatepass Entry">Sales Gatepass Entry</option>\
              <option value="Credit Note">Credit Note</option>';
  $('.name').find('option').remove(); 
  $(sales).appendTo('#name');              
  }  

  else if ($(this).val() == 'Payment')
  {
  var payment = '<option value="Payment Request">Payment Request</option>\
              <option value="Payment Process">Payment Process</option>\
              <option value="Payment Of Expenses">Payment Of Expenses</option>';
  $('.name').find('option').remove(); 
  $(payment).appendTo('#name');              
  }

  else if ($(this).val() == 'Receipt')
  {
  var receipt = '<option value="Receipt Request">Receipt Request</option>\
              <option value="Receipt Process">Receipt Process</option>\
              <option value="Receipt Of Income">Receipt Of Income</option>';
  $('.name').find('option').remove(); 
  $(receipt).appendTo('#name');              
  }

  else if ($(this).val() == 'Advance Settlement')
  {
  var advancesettlement = '<option value="Advance To Suppliers">Advance To Suppliers</option>\
              <option value="Advance From Customers">Advance From Customers</option>';
  $('.name').find('option').remove(); 
  $(advancesettlement).appendTo('#name');              
  }

  else if ($(this).val() == 'Account Expenses')
  {
  var accountexpenses = '<option value="Account Transaction">Account Transaction</option>';
  $('.name').find('option').remove(); 
  $(accountexpenses).appendTo('#name');              
  }

  else if ($(this).val() == 'Production Module')
  {
  var productionmodule = '<option value="Production">Production</option>';
  $('.name').find('option').remove(); 
  $(productionmodule).appendTo('#name');              
  }
  

});

</script>

@endsection

