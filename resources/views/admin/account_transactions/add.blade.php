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
    
      <form  method="post" class="form-horizontal needs-validation" novalidate action="" enctype="multipart/form-data">
      {{csrf_field()}}

        <div class="form-row">
          <div class="col-md-6">
                  <div class="form-group row">
                    <label for="validationCustom01" class="col-sm-4 col-form-label">Location <?php echo Mandatoryfields::mandatory('accountexpense_location_id');?>:</label>
                     <div class="col-sm-6">
                      <select class="js-example-basic-multiple col-12 form-control custom-select location_id"  name="location_id" id="location_id" <?php echo Mandatoryfields::validation('accountexpense_location_id');?> autofocus>
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
                        <label for="validationCustom01" class="col-sm-4 col-form-label">Date<?php echo Mandatoryfields::mandatory('accountexpense_date');?></label>
                        <div class="col-sm-6">
                      <input type="date" class="form-control date" id="date"  placeholder="" name="receipt_date" step="any" value="" <?php echo Mandatoryfields::validation('accountexpense_date');?>>
                      </div>
            </div>
          </div>
        </div>


         <div class="form-row">
          <div class="col-md-6">
                  <div class="form-group row">
                    <label for="validationCustom01" class="col-sm-4 col-form-label">Voucher No <?php echo Mandatoryfields::mandatory('accountexpense_voucher_no');?>:</label>
                     <div class="col-sm-6">
                      <input type="text" class="form-control voucher_no" id="voucher_no"  placeholder="Payment Voucher No" name="voucher_no" step="any"  value="" <?php echo Mandatoryfields::validation('accountexpense_voucher_no');?>>
                     </div>
                     
                  </div>
               </div>

               <div class="col-md-6">
                  <div class="form-group row">
                        <label for="validationCustom01" class="col-sm-4 col-form-label">Remarks<?php echo Mandatoryfields::mandatory('accountexpense_remark');?></label>
                        <div class="col-sm-6">
                      <input type="text" class="form-control date" id="remarks"  placeholder="" name="remarks" step="any" value="" <?php echo Mandatoryfields::validation('accountexpense_remark');?>>
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
                    <label style="font-family: Times new roman;">Head Name<?php echo Mandatoryfields::mandatory('accountexpense_debit_expense_type');?></label><br>
                  <div class="form-group row">
                     <div class="col-sm-12">
                      <select class="js-example-basic-multiple col-12 form-control custom-select expense_type" name="debit_expense_type[]" id="expense_type" <?php echo Mandatoryfields::validation('accountexpense_debit_expense_type');?>>
                         <option value="">Choose Head Name</option>
                         @foreach($account_head as $expense_types)
                        <option value="{{ $expense_types->id}}">{{ $expense_types->name}}</option>
                        @endforeach
                        </select>
                     </div>
                  </div>
               </div>
                        
                      <div class="col-md-3">
                        <label style="font-family: Times new roman;">Amount<?php echo Mandatoryfields::mandatory('accountexpense_debit_expense_amount');?></label>
                      <input type="number" class="form-control expense_amount" id="expense_amount"  placeholder="Expense Amount" name="debit_expense_amount[]" step="any" title="Numbers Only" value="" <?php echo Mandatoryfields::validation('accountexpense_debit_expense_amount');?>>

                      <input type="hidden" name="expense_total" id="expense_total" value="0" class="expense_total">

                      </div>

                      <div class="col-md-3">
                        <label style="font-family: Times new roman;">Remarks<?php echo Mandatoryfields::mandatory('accountexpense_debit_remark');?></label>
                      <input type="text" class="form-control remark_debit" id="remark_debit" name="debit_remark[]" step="any" value="" <?php echo Mandatoryfields::validation('accountexpense_debit_remark');?>>

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
                       <input type="text" class="form-control remark_debit" id="remark_debit" name="remark_debit[]" readonly>
                           
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
                    <label style="font-family: Times new roman;">Head Name<?php echo Mandatoryfields::mandatory('accountexpense_expense_type_credit');?></label><br>
                  <div class="form-group row">
                     <div class="col-sm-12">
                      <select class="js-example-basic-multiple col-12 form-control custom-select expense_type" name="expense_type_credit[]" id="expense_type" <?php echo Mandatoryfields::validation('accountexpense_expense_type_credit');?>>
                         <option value="">Choose Head Name</option>
                         @foreach($account_head as $expense_types)
                        <option value="{{ $expense_types->id}}">{{ $expense_types->name}}</option>
                        @endforeach
                        </select>
                     </div>
                  </div>
               </div>
                        
                      <div class="col-md-3">
                        <label style="font-family: Times new roman;">Amount<?php echo Mandatoryfields::mandatory('accountexpense_expense_amoun_credit');?></label>
                      <input type="number" class="form-control expense_amount" id="expense_amount"  placeholder="Expense Amount" name="expense_amoun_credit[]" step="any" title="Numbers Only" value="" <?php echo Mandatoryfields::validation('accountexpense_expense_amoun_credit');?>>

                      <input type="hidden" name="expense_total" id="expense_total" value="0" class="expense_total">

                      </div>

                      <div class="col-md-3">
                        <label style="font-family: Times new roman;">Remarks<?php echo Mandatoryfields::mandatory('accountexpense_remark_debit_credit');?></label>
                      <input type="text" class="form-control remark_debit" id="remark_debit" name="remark_debit_credit[]" step="any" value="" <?php echo Mandatoryfields::validation('accountexpense_remark_debit_credit');?>>

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
                       <input type="text" class="form-control remark_debit" id="remark_debit" name="remark_debit[]" readonly>
                           
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

  var expense_details='<div class="row col-md-12"><div class="row col-md-12 expense"><div class="col-md-3"><label style="font-family: Times new roman;">Head Name</label><br><div class="form-group row"><div class="col-sm-12"><select class="js-example-basic-multiple col-12 form-control custom-select expense_type" name="debit_expense_type[]" id="expense_type" ><option value="">Choose Head Name</option>@foreach($account_head as $expense_types)<option value="{{ $expense_types->id}}">{{ $expense_types->name}}</option>@endforeach</select></div></div></div><div class="col-md-3"><label style="font-family: Times new roman;">Amount</label><input type="number" class="form-control expense_amount" id="expense_amount"  placeholder="Expense Amount" name="debit_expense_amount[]" step="any" title="Numbers Only" value=""><input type="hidden" name="expense_total" id="expense_total" value="0" class="expense_total"></div><div class="col-md-3"><label style="font-family: Times new roman;">Remarks</label><input type="text" class="form-control remark_debit" id="remark_debit" name="debit_remark[]" step="any" value=""><input type="hidden" name="expense_total" id="expense_total" value="0" class="expense_total"></div><div class="col-md-2"><label style="font-family: Times new roman; color: white;">Add Expense</label><br><input type="button" class="btn btn-success" value="+" onclick="expense_add()" name="" id="add_expense">&nbsp;<input type="button" class="btn btn-danger remove_expense" value="-" name="" id="remove_expense"></div></div></div>'

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

  var expense_details='<div class="row col-md-12"><div class="row col-md-12 expense"><div class="col-md-3"><label style="font-family: Times new roman;">Head Name</label><br><div class="form-group row"><div class="col-sm-12"><select class="js-example-basic-multiple col-12 form-control custom-select expense_type" name="credit_expense_type[]" id="expense_type" ><option value="">Choose Head Name</option>@foreach($account_head as $expense_types)<option value="{{ $expense_types->id}}">{{ $expense_types->name}}</option>@endforeach</select></div></div></div><div class="col-md-3"><label style="font-family: Times new roman;">Amount</label><input type="number" class="form-control expense_amount" id="expense_amount"  placeholder="Expense Amount" name="credit_expense_amount[]" step="any" title="Numbers Only" value=""><input type="hidden" name="expense_total" id="expense_total" value="0" class="expense_total"></div><div class="col-md-3"><label style="font-family: Times new roman;">Remarks</label><input type="text" class="form-control remark_debit" id="remark_debit" name="credit_remark[]" step="any" value=""><input type="hidden" name="expense_total" id="expense_total" value="0" class="expense_total"></div><div class="col-md-2"><label style="font-family: Times new roman; color: white;">Add Expense</label><br><input type="button" class="btn btn-success" value="+" onclick="expense_add_credit()" name="" id="add_expense">&nbsp;<input type="button" class="btn btn-danger remove_expense" value="-" name="" id="remove_expense"></div></div></div>'

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
</script>

@endsection

