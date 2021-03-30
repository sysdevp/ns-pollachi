@extends('admin.layout.app')
@section('content')
<main class="page-content">

<div class="col-12 body-sec">
  <div class="card container px-0">
    <!-- card header start@ -->
    <div class="card-header px-2">
      <div class="row">
        <div class="col-4">
          <h3>Payment Process</h3>
        </div>
        <div class="col-8 mr-auto">
          <ul class="h-right-btn mb-0 pl-0">
            <li><button type="button" class="btn btn-success"><a href="">Back</a></button></li>
          </ul>
        </div>
      </div>
    </div>
    <!-- card header end@ -->
    <div class="card-body">
    
      <form  method="post" class="form-horizontal needs-validation" novalidate action="{{route('payment_process.store')}}" enctype="multipart/form-data">
      {{csrf_field()}}

        <div class="form-row">
          <div class="col-md-6">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Voucher No:</label>
              <div class="col-sm-8">
                <input type="text" class="form-control voucher_no" placeholder="Voucher No" name="voucher_no" value="">
                
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Voucher Date :</label>
              <div class="col-sm-8">
                <input type="date" class="form-control date" placeholder="Date" value="{{ $date }}" name="payment_date" value="" >
                
              </div>
            </div>
          </div>

          <div class="col-md-6">
                  <div class="form-group row">
                    <label for="validationCustom01" class="col-sm-4 col-form-label">Party Name :</label>
                     <div class="col-sm-6">
                      <select class="js-example-basic-multiple col-12 form-control custom-select supplier_id" onchange="supplier_det()"  name="supplier_id" id="supplier_id">
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
          
        </div>

       
        <div class="form-row">
        <div class="col-md-6">
            <div class="form-group row">
              <label class="col-sm-4 col-form-label" for="validationCustom01">Purchase Entry No</label><br>
              <div class="col-sm-8">
				 <select class="js-example-basic-multiple col-12 form-control custom-select purchase_entry_no" name="p_no" onchange="purchase_det()" id="purchase_entry_no">
                           <option value="">Choose Purcahse Entry No</option>
                           @foreach($purchase_entry as $purchase_entries)
                           <option value="{{ $purchase_entries->p_no }}">{{ $purchase_entries->p_no }}</option>
                           @endforeach
                        </select>
              </div>
            </div>
          </div>
        </div>

        <div class="form-row">
        <div class="col-md-6">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Ledger : </label>
              <div class="col-sm-8">
                <select class="js-example-basic-multiple col-12 form-control custom-select nature"  name="nature" id="nature">
                           <option value="">Ledger</option>
                           <option value="1">Pending</option>
                           <option value="2">Advance</option>
                        </select>
              </div>
            </div>
          </div>
           <div class="col-md-6">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Mode : </label>
              <div class="col-sm-8">
                <select class="js-example-basic-multiple col-12 form-control custom-select mode" onchange="payment_mode(this.value)"  name="mode" id="mode">
                           <option value="">Choose Mode</option>
                           <option value="1">Cash</option>
                           <option value="2">Bank</option>
                           <option value="3">Advance Adjustment</option>
                           <option value="4">Cheque</option>
                        </select>
              </div>
            </div>
          </div>
        </div>
        <br>
         <div class="form-row" id="cash_bill">
        <div class="col-md-6">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label"> Bill Amount : </label>
              <div class="col-sm-8">
                <input type="text" class="form-control amount" name="bill_amount" value="0">
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
  $(document).on("click",".refresh_supplier_id",function(){
      var supplier_dets=refresh_supplier_master_details();
      $(".supplier_id").html(supplier_dets);
   }); 



  function supplier_det()
{

  var supplier_id=$('#supplier_id').val();

   
  $.ajax({

            type: "POST",
            url: "{{ url('payment_process/purchase_entry_det/') }}",
            data: { supplier_id : supplier_id },
            success: function(data) {
            var result = JSON.parse(data);
            $('#myTable').append(result);
           
           }
        });
}

 function purchase_det()
{

  var purchase_entry_no=$('#purchase_entry_no').val();
  $('#single_row').remove();

  $.ajax({
            
            type: "POST",
            url: "{{ url('payment_process/purchase_entry_det/') }}",
            data: { p_no : purchase_entry_no },
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
    var supplier_id=$('#supplier_id').val();
     $.ajax({
            
            type: "POST",
            url: "{{ url('payment_process/advance_entry_det/') }}",
            data: { supplier_id : supplier_id },
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

@endsection

