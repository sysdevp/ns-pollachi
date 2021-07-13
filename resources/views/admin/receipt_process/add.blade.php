@extends('admin.layout.app')
@section('content')
<?php
use App\Mandatoryfields;
?>
<main class="page-content">

<div class="col-12 body-sec">
  <div class="card container px-0">
    <!-- card header start@ -->
    <div class="card-header px-2">
      <div class="row">
        <div class="col-4">
          <h3>Receipt Process</h3>
        </div>
        <div class="col-8 mr-auto">
          <ul class="h-right-btn mb-0 pl-0">
            <li><button type="button" class="btn btn-success"><a href="{{route('receipt_process.index')}}">Back</a></button></li>
          </ul>
        </div>
      </div>
    </div>
    <!-- card header end@ -->
    <div class="card-body">
    
      <form  method="post" class="form-horizontal needs-validation" novalidate action="{{route('receipt_process.store')}}" enctype="multipart/form-data">
      {{csrf_field()}}

        <div class="form-row">

          <div class="col-md-6">
                  <div class="form-group row">
                    <label for="validationCustom01" class="col-sm-4 col-form-label">Voucher Types :<?php echo Mandatoryfields::mandatory('receiptprocess_vouchertype');?></label>
                     <div class="col-md-8">
                      <select class="js-example-basic-multiple col-md-12 form-control custom-select voucher_type" name="voucher_type" onchange="voucher_types()" id="voucher_type" <?php echo Mandatoryfields::validation('receiptprocess_vouchertype');?> autofocus>
                           <option value="">Choose Voucher Types</option>
                           @foreach($type as $value)
                           <option value="{{ $value->id }}">{{ $value->type }}</option>
                           @endforeach
                        </select>
                     </div>
                  </div>
               </div>

          <div class="col-md-6">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Receipt No:</label>
              <div class="col-sm-8">
                <input type="hidden" class="form-control receipt_no" placeholder="Receipt No" name="receipt_no" value="">

                <font size="2" id="voucher_no" class="vouchers"></font>
                
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Receipt Date :<?php echo Mandatoryfields::mandatory('receiptprocess_voucherdate');?></label>
              <div class="col-sm-8">
                <input type="date" class="form-control date" placeholder="Date" value="{{ $date }}" name="date" value="" <?php echo Mandatoryfields::validation('receiptprocess_voucherdate');?>>
                
              </div>
            </div>
          </div>

          <div class="col-md-6">
                  <div class="form-group row">
                    <label for="validationCustom01" class="col-sm-4 col-form-label">Party Name :<?php echo Mandatoryfields::mandatory('receiptprocess_supplierid');?></label>
                     <div class="col-sm-6">
                      <select class="js-example-basic-multiple col-12 form-control custom-select customer_id" name="customer_id" id="customer_id" <?php echo Mandatoryfields::validation('receiptprocess_supplierid');?>>
                           <option value="">Choose Customer Name</option>
                           @foreach($customer as $customers)
                           <option value="{{ $customers->id }}">{{ $customers->name }}</option>
                           @endforeach
                        </select>
                     </div>
                     <a href="{{ url('master/customer/create')}}" target="_blank">
                     <button type="button"  class="px-2 btn btn-success ml-2" title="Add Customer"><i class="fa fa-plus-circle" aria-hidden="true"></i></button></a>
                     <button type="button"  class="px-2 btn btn-success mx-2 refresh_customer_id" title="Add Brand"><i class="fa fa-refresh" aria-hidden="true"></i></button>
                  </div>
               </div>
          
        </div>

        <!-- <div class="form-row">
        <div class="col-md-6">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Receipt Request No : </label>
              <div class="col-sm-8">
                <input type="text" class="form-control receipt_request_no" placeholder="Receipt Request No" name="receipt_request_no" value="">
              </div>
            </div>
          </div>
        </div> -->
         <div class="form-row">
        <div class="col-md-6">
            <div class="form-group row">
              <label class="col-sm-4 col-form-label" for="validationCustom01">Sale Entry No<?php echo Mandatoryfields::mandatory('receiptrequest_ledger');?></label><br>
              <div class="col-sm-8">
         <select class="js-example-basic-multiple col-12 form-control custom-select receiptprocess_saleentryno" name="s_no" onchange="sale_det()" id="receiptprocess_saleentryno" <?php echo Mandatoryfields::validation('receiptrequest_ledger');?>>
                           <option value="">Choose Sale Entry No</option>
                           @foreach($sale_entry as $sale_entries)
                           <option value="{{ $sale_entries->s_no }}">{{ $sale_entries->s_no }}</option>
                           @endforeach
                        </select>
              </div>
            </div>
          </div>
        </div>

        <div class="form-row">
        <div class="col-md-6">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Ledger :<?php echo Mandatoryfields::mandatory('receiptprocess_nature');?> </label>
              <div class="col-sm-8">
                <select class="js-example-basic-multiple col-12 form-control custom-select nature" name="nature" id="nature" <?php echo Mandatoryfields::validation('receiptprocess_nature');?>>
                           <option value="">Ledger</option>
                           <option value="1">Pending</option>
                           <option value="2">Advance</option>
                        </select>
              </div>
            </div>
          </div>
      

        <div class="col-md-6">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Mode <?php echo Mandatoryfields::mandatory('receiptprocess_mode');?>: </label>
              <div class="col-sm-8">
                <select class="js-example-basic-multiple col-12 form-control custom-select mode" onchange="payment_mode(this.value)"  name="mode" id="mode" <?php echo Mandatoryfields::validation('receiptprocess_mode');?>>
                           <option value="">Choose Mode</option>
                           <option value="1">Cash</option>
                           <option value="2">Bank</option>
                           <option value="3">Advance Adjustment</option>
                        </select>
              </div>
            </div>
          </div>
        </div>
        <br>
         <div class="form-row" id="cash_bill">
        <div class="col-md-6">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label"> Bill Amount <?php echo Mandatoryfields::mandatory('receiptprocess_billamount');?>: </label>
              <div class="col-sm-8">
                <input type="text" class="form-control amount" name="bill_amount" value="0" <?php echo Mandatoryfields::validation('receiptprocess_billamount');?>>
              </div>
            </div>
          </div>
        </div>
        <br>

        <div class="col-md-8">
                       <div class="form-group row">
                       <div class="col-md-4">
                       <label for="validationCustom01" class=" col-form-label"><h4>Purchase Entry Details:</h4> </label><br>
                       
                           
                       </div>
                         </div>
              </div>

        <div class="card-body" style="height: 100%;">
      <table id="" class="table table-bordered table-hover">
        <thead>
          <tr>
            <th>Bill.No</th>
            <th>Bill Date </th>
            <th>Bill Amount </th>
            <th>Paid Amount</th>
            <th>Pending Amount</th>
          </tr>
        </thead>
        <tbody class="append_proof_details" id="myTable">
        </tbody>
        
      </table>
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
        <tbody class="append_proof_details" id="myTable_adv">
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

        <div class="form-row">
        <div class="col-md-6">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label"> Remarks : </label>
              <div class="col-sm-8">
                <input type="text" class="form-control remark" placeholder="Remarks" name="remark" value="">
              </div>
            </div>
          </div>
        </div>
        <br>

        <div class="col-md-7 text-right">
          <button class="btn btn-success" name="add" type="submit">Submit</button>
          <button class="btn btn-warning" name="add" type="submit">Cancel</button>
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

  function voucher_types(){


var voucher_type = $('.voucher_type').val();


  $.ajax({
                type: "POST",
                url: "{{ url('receipt_process/voucher_type/') }}",
                data: { voucher_type : voucher_type},
                success: function(data) 
                {

                  $('.receipt_no').val(data);
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

                    $('.receipt_no').val(prefix+preview+suffix);
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
                    $('.receipt_no').val(voucher);
                    $('.vouchers').text(voucher);
                  }


                }
        });

}

  $(document).on("click",".refresh_customer_id",function(){
      var customer_dets=refresh_customer_master_details();
      $(".customer_id").html(customer_dets);
   }); 

   function customer_det()
{

  var customer_id=$('#customer_id').val();

   
  $.ajax({

            type: "POST",
            url: "{{ url('receipt_process/sale_entry_det/') }}",
            data: { customer_id : customer_id },
            success: function(data) {
            var result = JSON.parse(data);
            $('#myTable').append(result);
           
           }
        });
}

 function sale_det()
{

  var sale_entry_no=$('#receiptprocess_saleentryno').val();
  $('#single_row').remove();

  $.ajax({
            
            type: "POST",
            url: "{{ url('receipt_process/sale_entry_det/') }}",
            data: { s_no : sale_entry_no },
            success: function(data) {

            var result = JSON.parse(data);
            $('#myTable').append(result);
            
           }
        });
}

function payment_mode(val)
{

  var payment_mode=val;
 if(payment_mode=="3"){
    $('#adv_det').show();
    $('#cash_bill').hide();
    var customer_id=$('#customer_id').val();
     $.ajax({
            
            type: "POST",
            url: "{{ url('receipt_process/advance_entry_det/') }}",
            data: { customer_id : customer_id },
            success: function(data) {
            var result = JSON.parse(data);
            $('#myTable_adv').append(result);
            
           }
        });

 } else {
$('#adv_det').hide();
$('#cash_bill').show();
 }


 
}

function myfunction(val) {
var sum = 0;
  $('.receipt_amount').each(function(){
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

@endsection

