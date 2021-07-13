@extends('admin.layout.app')
@section('content')
<main class="page-content">

<div class="col-12 body-sec">
  <div class="card container px-0">
    <!-- card header start@ -->
    <div class="card-header px-2">
      <div class="row">
        <div class="col-4">
          <h3>Receipt Of Income</h3>
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
    
      <form  method="post" class="form-horizontal needs-validation" novalidate action="{{route('payment_request.store')}}" enctype="multipart/form-data">
      {{csrf_field()}}

      <div class="form-row">
      <div class="col-md-6">
                  <div class="form-group row">
                    <label for="validationCustom01" class="col-sm-4 col-form-label">Voucher Types :</label>
                     <div class="col-md-8">
                      <select class="js-example-basic-multiple col-md-12 form-control custom-select voucher_type" name="voucher_type" onchange="voucher_types()" id="voucher_type" >
                           <option value="">Choose Voucher Types</option>
                           @foreach($type as $value)
                           <option value="{{ $value->id }}">{{ $value->type }}</option>
                           @endforeach
                        </select>
                     </div>
                  </div>
               </div>
            </div>

        <div class="form-row">
          <div class="col-md-6">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Direct Head:</label>
              <div class="col-sm-2">
                <input type="radio" class="request_no" placeholder="Request No" name="request_no" value="1" checked="" onclick="direct_head()">
                
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Against Bill:</label>
              <div class="col-sm-2">
                <input type="radio" class="request_no" placeholder="Request No" onclick="against_bill()" name="request_no" value="0">
                
              </div>
            </div>
          </div>
        </div>
        <div class="form-row">
          <div class="col-md-6">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Voucher No :</label>
              <div class="col-sm-8">
                <input type="text" class="form-control voucher_no" placeholder="Voucher No" value="" name="voucher_no" >
                
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Voucher Date :</label>
              <div class="col-sm-8">
                <input type="date" class="form-control date" placeholder="Date" value="{{ $date }}" name="date" >
                
              </div>
            </div>
          </div>
        </div>

        <div id="against_bill" style="display: none;">
        <div class="form-row" >
          <div class="col-md-6">
                  <div class="form-group row">
                    <label for="validationCustom01" class="col-sm-4 col-form-label">Party Name :</label>
                     <div class="col-sm-6">
                      <select class="js-example-basic-multiple col-12 form-control custom-select supplier_id" name="supplier_id" id="supplier_id">
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

               <div class="col-md-6">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Amount :</label>
              <div class="col-sm-8">
                <input type="Number" class="form-control amount" placeholder="Amount" value="" name="amount" >
                
              </div>
            </div>
          </div>

               <div class="col-md-8">
                       <div class="form-group row">
                       <div class="col-md-4">
                       <label for="validationCustom01" class=" col-form-label"><h4>Bill Details:</h4> </label><br>
                       
                           
                       </div>
                         </div>
              </div>

        <div class="card-body" style="height: 100%;">
      <table id="" class="table table-bordered table-hover">
        <thead>
          <tr>
            <th>S.No</th>
            <th>Bill.No</th>
            <th>Bill Date </th>
            <th>Bill Amount </th>
            <th>Already Paid</th>
            <th>Pending Amount</th>
            <th>Current Cleared Amount</th>
          </tr>
        </thead>
        <tbody class="append_proof_details" id="myTable">
        </tbody>
        <tfoot>
              <th></th>
              <th>Total</th>
              <th></th>
              <th></th>
              <th></th>
              <th></th>
              <th></th>
            </tfoot>
      </table>
    </div>

             </div>
      <div class="form-row">
        <div class="col-md-6">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Mode : </label>
              <div class="col-sm-8">
                <select class="js-example-basic-multiple col-12 form-control custom-select against_bill_mode"  name="against_bill_mode" id="against_bill_mode">
                           <option value="">Choose Mode</option>
                           <option value="">Cash</option>
                           <option value="">Bank</option>
                        </select>
              </div>
            </div>
          </div>
        </div>

        <div class="card-body" style="height: 100%;">
      <table id="" class="table table-bordered table-hover">
        <thead>
          <tr>
            <th>CH.No</th>
            <th>CH.Date </th>
            <th>CH.Amount </th>
            <th>UTR No.</th>
          </tr>
        </thead>
        <tbody class="append_proof_details" id="myTable">
        </tbody>
        <tfoot>
              <th></th>
              <th></th>
              <th></th>
              <th></th>
            </tfoot>
      </table>
    </div>

             </div>
          
      <div id="direct_head">
        <div class="form-row">
        <div class="col-md-6">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Nature Of Income: </label>
              <div class="col-sm-8">
                <select class="js-example-basic-multiple col-12 form-control custom-select income" name="income" id="income">
                  <option>Choose Nature Of Income</option>
                  @foreach($income as $value)
                  <option value="{{ $value->id }}">{{ $value->type }}</option>
                  @endforeach
                </select>
              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Amount :</label>
              <div class="col-sm-8">
                <input type="Number" class="form-control amount" placeholder="Amount" value="" name="amount" >
                
              </div>
            </div>
          </div>

        </div>
        <br>

        <div class="col-md-8">
                       <div class="form-group row">
                       <div class="col-md-4">
                       <label for="validationCustom01" class=" col-form-label"><h4>Bill Details:</h4> </label><br>
                       
                           
                       </div>
                         </div>
              </div>

        <div class="card-body" style="height: 100%;">
      <table id="" class="table table-bordered table-hover">
        <thead>
          <tr>
            <th rowspan="2">S.No</th>
            <th rowspan="2">Bill.No</th>
            <th rowspan="2">Bill Date </th>
            <th rowspan="2">Bill Amount </th>
            <th align="center" colspan="3">GST</th>
            <th rowspan="2">Total</th>
          </tr>
          <tr>
            <th>CGST</th>
            <th>SGST</th>
            <th>IGST</th>
          </tr>
        </thead>
        <tbody class="append_proof_details" id="myTable">
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
            </tfoot>
      </table>
    </div>

    <div class="form-row">
        <div class="col-md-6">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Mode : </label>
              <div class="col-sm-8">
                <select class="js-example-basic-multiple col-12 form-control custom-select direct_head_mode"  name="direct_head_mode" id="direct_head_mode">
                           <option value="">Choose Mode</option>
                           <option value="">Cash</option>
                           <option value="">Bank</option>
                        </select>
              </div>
            </div>
          </div>
        </div>

        <div class="card-body" style="height: 100%;">
      <table id="" class="table table-bordered table-hover">
        <thead>
          <tr>
            <th>CH.No</th>
            <th>CH.Date </th>
            <th>CH.Amount </th>
            <th>UTR No.</th>
          </tr>
        </thead>
        <tbody class="append_proof_details" id="myTable">
        </tbody>
        <tfoot>
              <th></th>
              <th></th>
              <th></th>
              <th></th>
            </tfoot>
      </table>
    </div>

    </div>
    <br>

    <div class="row col-md-12 append_tax">

                          <div class="row col-md-12 tax">
                            <div class="col-md-3">
                    <label style="font-family: Times new roman;">Tax</label><br>
                  <div class="form-group row">
                     <div class="col-sm-8">
                      <select class="js-example-basic-multiple col-12 form-control custom-select tax" name="tax[]" id="tax" >
                         <option value="">Choose Tax</option>
                         @foreach($tax as $value)
                        <option value="{{ $value->id}}">{{ $value->name}}</option>
                        @endforeach
                        </select>
                     </div>
                     <!-- <a href="{{ url('master/expense-type/create')}}" target="_blank">
                     <button type="button"  class="px-2 btn btn-success ml-2" title="Add Expense"><i class="fa fa-plus-circle" aria-hidden="true"></i></button></a>
                     <button type="button"  class="px-2 btn btn-success mx-2 refresh_expense_type_id" title="Add Expense Type"><i class="fa fa-refresh" aria-hidden="true"></i></button> -->
                  </div>
               </div>

                      <div class="col-md-2">
                        <label style="font-family: Times new roman;">Tax%</label>
                      <input type="number" class="form-control percent" id="percent"  placeholder="Tax %" name="percent[]" step="any" title="Numbers Only" value="">


                      </div>
                      <div class="col-md-2">
                        <label style="font-family: Times new roman; color: white;">Add Tax</label><br>
                      <input type="button" class="btn btn-success" value="+" onclick="tax_add()" name="" id="add_tax">&nbsp;<input type="button" class="btn btn-danger remove_tax" value="-" name="" id="remove_tax">
                    </div>
                  </div>
                    
                       </div>
                       <br>

    <div class="row col-md-12 append_expense">

                          <div class="row col-md-12 expense">
                            <div class="col-md-3">
                    <label style="font-family: Times new roman;">Income Type</label><br>
                  <div class="form-group row">
                     <div class="col-sm-8">
                      <select class="js-example-basic-multiple col-12 form-control custom-select expense_type" name="expense_type[]" id="expense_type" >
                         <option value="">Choose Income Type</option>
                         @foreach($income as $value)
                        <option value="{{ $value->id}}">{{ $value->type}}</option>
                        @endforeach
                        </select>
                     </div>
                     <!-- <a href="{{ route('tax.create')}}" target="_blank">
                     <button type="button"  class="px-2 btn btn-success ml-2" title="Add Expense"><i class="fa fa-plus-circle" aria-hidden="true"></i></button></a>
                     <button type="button"  class="px-2 btn btn-success mx-2 refresh_expense_type_id" title="Add Expense Type"><i class="fa fa-refresh" aria-hidden="true"></i></button> -->
                  </div>
               </div>

                      <div class="col-md-2">
                        <label style="font-family: Times new roman;">Income Amount</label>
                      <input type="number" class="form-control expense_amount" id="expense_amount"  placeholder="Expense Amount" name="expense_amount[]" step="any" title="Numbers Only" value="">

                      <input type="hidden" name="expense_total" id="expense_total" value="0" class="expense_total">

                      </div>
                      <div class="col-md-2">
                        <label style="font-family: Times new roman; color: white;">Add Expense</label><br>
                      <input type="button" class="btn btn-success" value="+" onclick="expense_add()" name="" id="add_expense">&nbsp;<input type="button" class="btn btn-danger remove_expense" value="-" name="" id="remove_expense">
                    </div>
                  </div>
                    
                       </div>
                       <br>

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
          <button class="btn btn-success" name="add" disabled="" type="submit">Submit</button>
          <button class="btn btn-warning" name="add" disabled="" type="submit">Cancel</button>
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
                url: "{{ url('receipt_income/voucher_type/') }}",
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

  $(document).on("click",".refresh_supplier_id",function(){
      var supplier_dets=refresh_supplier_master_details();
      $(".supplier_id").html(supplier_dets);
   }); 
  function direct_head()
  {
    $('#direct_head').show();
    $('#against_bill').hide();
  }

  function against_bill()
  {
    $('#direct_head').hide();
    $('#against_bill').show();
  }

  function expense_add()
  {
    
    

    var expense_details='<div class="row col-md-12 expense"><div class="col-md-3"><label style="font-family: Times new roman;">Income Type</label><br><div class="form-group row"><div class="col-sm-8"><select class="js-example-basic-multiple col-12 form-control custom-select expense_type" name="expense_type[]"><option value="">Choose Income Type</option>@foreach($income as $expense_types)<option value="{{ $expense_types->id}}">{{ $expense_types->type}}</option>@endforeach</select></div></div></div><div class="col-md-2"><label style="font-family: Times new roman;">Income Amount</label><input type="number" class="form-control expense_amount"  placeholder="Income Amount" name="expense_amount[]" pattern="[0-9]{0,100}" title="Numbers Only" value=""></div><div class="col-md-2"><label><font color="white" style="font-family: Times new roman;">Add Expense</font></label><br><input type="button" class="btn btn-success" value="+" onclick="expense_add()" name="" id="add_expense">&nbsp;<input type="button" class="btn btn-danger remove_expense" value="-" name="" id="remove_expense"></div></div>'

    $('.append_expense').append(expense_details);
    $("select").select2();


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

  });

$(document).on("click",".remove_tax",function(){

  if($(".remove_tax").length > 1){

    $(this).closest('.tax').remove();
  }
  else{
    alert("Atleast One row present");

  }

  });

function tax_add()
{

  var tax_details='<div class="row col-md-12 tax"><div class="col-md-3"><label style="font-family: Times new roman;">Tax</label><br><div class="form-group row"><div class="col-sm-8"><select class="js-example-basic-multiple col-12 form-control custom-select tax" name="tax[]"><option value="">Choose Tax</option>@foreach($tax as $value)<option value="{{ $value->id}}">{{ $value->name}}</option>@endforeach</select></div></div></div><div class="col-md-2"><label style="font-family: Times new roman;">Tax %</label><input type="number" class="form-control percent"  placeholder="Tax %" name="percent[]" pattern="[0-9]{0,100}" title="Numbers Only" value=""></div><div class="col-md-2"><label><font color="white" style="font-family: Times new roman;">Add Tax</font></label><br><input type="button" class="btn btn-success" value="+" onclick="tax_add()" name="" id="add_tax">&nbsp;<input type="button" class="btn btn-danger remove_tax" value="-" name="" id="remove_tax"></div></div>'

  $('.append_tax').append(tax_details);
  $("select").select2();


}
   
</script>

@endsection

