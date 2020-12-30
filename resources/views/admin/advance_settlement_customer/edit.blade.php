@extends('admin.layout.app')
@section('content')
<main class="page-content">
<div class="container-fuild" style="background:#28a745">
				<div class="text-right pr-3">sdfjsdfjl</div>
		</div>
<div class="col-12 body-sec">
  <div class="card container px-0">
    <!-- card header start@ -->
    <div class="card-header px-2">
      <div class="row">
        <div class="col-4">
          <h3>Edit Advance Settlement For Customers</h3>
        </div>
        <div class="col-8 mr-auto">
          <ul class="h-right-btn mb-0 pl-0">
            <li><button type="button" class="btn btn-success"><a href="{{url('advance_settlement_customer')}}">Back</a></button></li>
          </ul>
        </div>
      </div>
    </div>
    <!-- card header end@ -->
    <div class="card-body">
    
      <form  method="post" class="form-horizontal needs-validation" novalidate action="{{route('advance_settlement_customer.update',$advance->id)}}" enctype="multipart/form-data">
      {{csrf_field()}}
      @method('PATCH')
        <div class="form-row">
          <div class="col-md-6">
                  <div class="form-group row">
                    <label for="validationCustom01" class="col-sm-4 col-form-label">Party Name :</label>
                     <div class="col-sm-6">
                      <select class="js-example-basic-multiple col-12 form-control custom-select customer_id"  name="customer_id" id="customer_id">
                           <option value="">Choose Supplier Name</option>
                           @foreach($customer as $customers)
                           <option value="{{ $customers->id }}"  {{$advance->customer_id == $customers->id ? 'selected' : '' }}>{{ $customers->name }}</option>
                           @endforeach
                        </select>
                     </div>
                     <a href="{{ url('master/supplier/create')}}" target="_blank">
                     <button type="button"  class="px-2 btn btn-success ml-2" title="Add customer"><i class="fa fa-plus-circle" aria-hidden="true"></i></button></a>
                     <button type="button"  class="px-2 btn btn-success mx-2 refresh_supplier_id" title="Add Brand"><i class="fa fa-refresh" aria-hidden="true"></i></button>
                  </div>
               </div>
          
        </div>

        <div class="row col-md-12 append_expense">

                          <div class="row col-md-12 expense">
                            <div class="col-md-3">
                    <label style="font-family: Times new roman;">Payment Voucher No</label><br>
                  <div class="form-group row">
                     <input type="text" class="form-control voucher_no" id="voucher_no"  placeholder="Payment Voucher No" name="voucher_no" step="any"  value="{{$advance->voucher_no}}">
                     
                  </div>
               </div>
                      <div class="col-md-3">
                        <label style="font-family: Times new roman;">Date</label>
                      <input type="date" class="form-control date" id="date"  placeholder="" name="receipt_date" step="any" value="{{$advance->receipt_date}}">

                      <input type="hidden" name="expense_total" id="expense_total" value="{{$advance->receipt_date}}" class="expense_total">

                      </div>
                     <!--  <div class="col-md-2">
                        <label style="font-family: Times new roman; color: white;">Add Expense</label><br>
                      <input type="button" class="btn btn-success" value="+" onclick="expense_add()" name="" id="add_expense">&nbsp;<input type="button" class="btn btn-danger remove_expense" value="-" name="" id="remove_expense">
                    </div> -->
                  </div>
                    
                       </div>

        <div class="form-row">
        <div class="col-md-6">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Total Advance Amount : </label>
              <div class="col-sm-8">
                <input type="text" class="form-control request_no" placeholder="Total Advance Amount" name="advance_amount" value="{{$advance->advance_amount}}">
              </div>
            </div>
          </div>
        </div>

        <br>

        <div class="form-row">
        <div class="col-md-6">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label"> Remarks : </label>
              <div class="col-sm-8">
                <input type="text" class="form-control remark" placeholder="Remarks" name="remark" value="{{$advance->remarks}}">
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

  function expense_add()
{

  var expense_details='<div class="row col-md-12 expense"><div class="col-md-3"><label style="font-family: Times new roman;">Payment Voucher No</label><br><div class="form-group row"><input type="text" class="form-control voucher_no"  placeholder="Payment Voucher No" name="voucher_no[]" pattern="[0-9]{0,100}" value=""></div></div><div class="col-md-3"><label style="font-family: Times new roman;">Date</label><input type="date" class="form-control date"  placeholder="" name="date[]" pattern="[0-9]{0,100}"  value=""></div><div class="col-md-3"><label><font color="white" style="font-family: Times new roman;">Add Expense</font></label><br><input type="button" class="btn btn-success" value="+" onclick="expense_add()" name="" id="add_expense">&nbsp;<input type="button" class="btn btn-danger remove_expense" value="-" name="" id="remove_expense"></div></div>'
  $('.append_expense').append(expense_details);
  
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
</script>

@endsection

