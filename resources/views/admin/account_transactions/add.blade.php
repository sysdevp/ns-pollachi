@extends('admin.layout.app')
@section('content')
<main class="page-content">

<div class="col-12 body-sec">
  <div class="card container px-0">
    <!-- card header start@ -->
    <div class="card-header px-2">
      <div class="row">
        <div class="col-4">
          <h3>Account Expense</h3>
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
    
      <form  method="post" class="form-horizontal needs-validation" novalidate action="{{route('expense.store')}}" enctype="multipart/form-data">
      {{csrf_field()}}

        <div class="form-row">
          <div class="col-md-6">
                  <div class="form-group row">
                    <label for="validationCustom01" class="col-sm-4 col-form-label">Location :</label>
                     <div class="col-sm-6">
                      <select class="js-example-basic-multiple col-12 form-control custom-select location_id"  name="location_id" id="location_id">
                           <option value="">Choose location Name</option>
                           @foreach($location as $value)
                           <option value="{{ $value->id }}">{{ $value->name }}</option>
                           @endforeach
                        </select>
                     </div>
                     
                  </div>
               </div>

               <div class="col-md-6">
                  <div class="form-group row">
                        <label for="validationCustom01" class="col-sm-4 col-form-label">Date</label>
                        <div class="col-sm-6">
                      <input type="date" class="form-control date" id="date"  placeholder="" name="entry_date" step="any" value="">
                      </div>
            </div>
          </div>
        </div>


         <div class="form-row">
          <div class="col-md-6">
                  <div class="form-group row">
                    <label for="validationCustom01" class="col-sm-4 col-form-label">Voucher No :</label>
                     <div class="col-sm-6">
                      <input type="text" class="form-control voucher_no" id="voucher_no"  placeholder="Payment Voucher No" name="voucher_no" step="any"  value="">
                     </div>
                     
                  </div>
               </div>

               <div class="col-md-6">
                  <div class="form-group row">
                        <label for="validationCustom01" class="col-sm-4 col-form-label">Remarks</label>
                        <div class="col-sm-6">
                      <input type="text" class="form-control date" id="remarks"  placeholder="" name="remarks" step="any" value="">
                      </div>
            </div>
          </div>
        </div>

       
        <br>

        <div class="col-md-8">
                       <div class="form-group row">
                       <div class="col-md-4">
                       <label for="validationCustom01" class=" col-form-label"><h4>Debit:</h4> </label><br>
                       
                           
                       </div>
                         </div>
              </div>
 
 <div class="row col-md-12 append_expense">

                          <div class="row col-md-12 expense">
                            <div class="col-md-3">
                    <label style="font-family: Times new roman;">Head Name</label><br>
                  <div class="form-group row">
                     <div class="col-sm-12">
                      <select class="js-example-basic-multiple col-12 form-control custom-select expense_type" name="debit_account_head[]" id="expense_type" >
                         <option value="">Choose Head Name</option>
                         @foreach($account_head as $expense_types)
                        <option value="{{ $expense_types->id}}">{{ $expense_types->name}}</option>
                        @endforeach
                        </select>
                     </div>
                  </div>
               </div>
                        
                      <div class="col-md-3">
                        <label style="font-family: Times new roman;">Amount</label>
                      <input type="number" class="form-control debit_expense_amount" id="expense_amount" onkeyup="myfunction_debit(this.val)" name="debit_amount[]" step="any" title="Numbers Only" value="">

                      <input type="hidden" name="expense_total" id="expense_total" value="0" class="expense_total">

                      </div>

                      <div class="col-md-3">
                        <label style="font-family: Times new roman;">Remarks</label>
                      <input type="text" class="form-control remark_debit" id="remark_debit" name="debit_remarks[]" step="any" value="">

                      <input type="hidden" name="expense_total" id="expense_total" value="0" class="expense_total">

                      </div>

                      <div class="col-md-2">
                        <label style="font-family: Times new roman; color: white;">Add Expense</label><br>
                      <input type="button" class="btn btn-success" value="+" onclick="expense_add()" name="" id="add_expense">&nbsp;<input type="button" class="btn btn-danger remove_expense" value="-" name="" id="remove_expense">
                    </div>
                  </div>
                    
                       </div>
<div class="col-md-8">
                       <div class="form-group row">
                       <div class="col-md-4">
                       <label for="validationCustom01" class=" col-form-label"><h4>Debit Grand Total:</h4> </label><br>
                       <input type="text" class="form-control debit_grand_total" id="debit_grand_total" name="debit_grand_total" readonly>
                           
                       </div>
                         </div>
              </div>

              <div class="col-md-8">
                       <div class="form-group row">
                       <div class="col-md-4">
                       <label for="validationCustom01" class=" col-form-label"><h4>Credit:</h4> </label><br>
                       
                           
                       </div>
                         </div>
              </div>
 
 <div class="row col-md-12 append_expense_credit">

                          <div class="row col-md-12 expense_credit">
                            <div class="col-md-3">
                    <label style="font-family: Times new roman;">Head Name</label><br>
                  <div class="form-group row">
                     <div class="col-sm-12">
                      <select class="js-example-basic-multiple col-12 form-control custom-select expense_type" name="credit_account_head[]" id="expense_type" >
                         <option value="">Choose Head Name</option>
                         @foreach($account_head as $expense_types)
                        <option value="{{ $expense_types->id}}">{{ $expense_types->name}}</option>
                        @endforeach
                        </select>
                     </div>
                  </div>
               </div>
                        
                      <div class="col-md-3">
                        <label style="font-family: Times new roman;">Amount</label>
                      <input type="number" class="form-control credit_expense_amount" id="expense_amount"  placeholder="Expense Amount" name="credit_amount[]" onkeyup="myfunction(this.val)" step="any" title="Numbers Only" value="">

                      <input type="hidden" name="expense_total" id="expense_total" value="0" class="expense_total">

                      </div>

                      <div class="col-md-3">
                        <label style="font-family: Times new roman;">Remarks</label>
                      <input type="text" class="form-control remark_debit" id="remark_debit" name="credit_remarks[]" step="any" value="">

                      <input type="hidden" name="expense_total" id="expense_total" value="0" class="expense_total">

                      </div>

                      <div class="col-md-2">
                        <label style="font-family: Times new roman; color: white;">Add Expense</label><br>
                      <input type="button" class="btn btn-success" value="+" onclick="expense_add_credit()" name="" id="add_expense">&nbsp;<input type="button" class="btn btn-danger remove_expense_credit" value="-" name="" id="remove_expense_credit">
                    </div>
                  </div>
                    
                       </div>
<div class="col-md-8">
                       <div class="form-group row">
                       <div class="col-md-4">
                       <label for="validationCustom01" class=" col-form-label"><h4>Credit Grand Total:</h4> </label><br>
                       <input type="text" class="form-control credit_grand_total" id="credit_grand_total" name="credit_grand_total[]" readonly>
                           
                       </div>
                         </div>
              </div>
       

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
  $(document).on("click",".refresh_customer_id",function(){
      var customer_dets=refresh_customer_master_details();
      $(".customer_id").html(customer_dets);
   }); 
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
function expense_add()
{
  
  if($("#total_price").val() == 0 || $("#total_price").val() == '')
  {
    alert('You Cannot Add Expense Without Adding Item Details!!');
  }
  else
  {
  var expense_details='<div class="row col-md-12"><div class="row col-md-12 expense"><div class="col-md-3"><label style="font-family: Times new roman;">Head Name</label><br><div class="form-group row"><div class="col-sm-12"><select class="js-example-basic-multiple col-12 form-control custom-select expense_type" name="debit_account_head[]" id="expense_type" ><option value="">Choose Head Name</option>@foreach($account_head as $expense_types)<option value="{{ $expense_types->id}}">{{ $expense_types->name}}</option>@endforeach</select></div></div></div><div class="col-md-3"><label style="font-family: Times new roman;">Amount</label><input type="number" class="form-control debit_expense_amount" id="expense_amount" onkeyup="myfunction_debit(this.val)"  placeholder="Expense Amount" name="debit_amount[]" step="any" title="Numbers Only" value=""><input type="hidden" name="expense_total" id="expense_total" value="0" class="expense_total"></div><div class="col-md-3"><label style="font-family: Times new roman;">Remarks</label><input type="text" class="form-control remark_debit" id="remark_debit" name="debit_remarks[]" step="any" value=""><input type="hidden" name="expense_total" id="expense_total" value="0" class="expense_total"></div><div class="col-md-2"><label style="font-family: Times new roman; color: white;">Add Expense</label><br><input type="button" class="btn btn-success" value="+" onclick="expense_add()" name="" id="add_expense">&nbsp;<input type="button" class="btn btn-danger remove_expense" value="-" name="" id="remove_expense"></div></div></div>'
  $('.append_expense').append(expense_details);
  $("select").select2();
  total_expense_cal();
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
  });
function expense_add_credit()
{
  
  if($("#total_price").val() == 0 || $("#total_price").val() == '')
  {
    alert('You Cannot Add Expense Without Adding Item Details!!');
  }
  else
  {
  var expense_details='<div class="row col-md-12"><div class="row col-md-12 expense"><div class="col-md-3"><label style="font-family: Times new roman;">Head Name</label><br><div class="form-group row"><div class="col-sm-12"><select class="js-example-basic-multiple col-12 form-control custom-select expense_type" name="credit_account_head[]" id="expense_type" ><option value="">Choose Head Name</option>@foreach($account_head as $expense_types)<option value="{{ $expense_types->id}}">{{ $expense_types->name}}</option>@endforeach</select></div></div></div><div class="col-md-3"><label style="font-family: Times new roman;">Amount</label><input type="number" class="form-control credit_expense_amount" id="expense_amount" onkeyup="myfunction(this.val)"  placeholder="Expense Amount" name="credit_amount[]" step="any" title="Numbers Only" value=""><input type="hidden" name="expense_total" id="expense_total" value="0" class="expense_total"></div><div class="col-md-3"><label style="font-family: Times new roman;">Remarks</label><input type="text" class="form-control remark_debit" id="remark_debit" name="credit_remarks[]" step="any" value=""><input type="hidden" name="expense_total" id="expense_total" value="0" class="expense_total"></div><div class="col-md-2"><label style="font-family: Times new roman; color: white;">Add Expense</label><br><input type="button" class="btn btn-success" value="+" onclick="expense_add_credit()" name="" id="add_expense">&nbsp;<input type="button" class="btn btn-danger remove_expense" value="-" name="" id="remove_expense"></div></div></div>'
  $('.append_expense_credit').append(expense_details);
  $("select").select2();
  total_expense_cal();
  roundoff_cal();
  var length=$('.expense').length;
  $('#expense_count').val(length);
  }
}
$(document).on("click",".remove_expense_credit",function(){
  if($(".remove_expense_credit").length > 1){
    $(this).closest('.expense_credit').remove();
    var length = $('#expense_count').val();
    $('#expense_count_credit').val(length-1);
  }
  else{
    alert("Atleast One row present");
  }
  });
function myfunction(val) {
var sum = 0;
;
  $('.credit_expense_amount').each(function(){
 sum = parseInt(sum) + parseInt($(this).val());
  });
  $('.credit_grand_total').val(sum);
            }
function myfunction_debit(val) {
var sum = 0;
;
  $('.debit_expense_amount').each(function(){
 sum = parseInt(sum) + parseInt($(this).val());
  });
  $('.debit_grand_total').val(sum);
            }
 
</script>

@endsection