<?php $__env->startSection('content'); ?>
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
            <li><button type="button" class="btn btn-success"><a href="">Back</a></button></li>
          </ul>
        </div>
      </div>
    </div>
    <!-- card header end@ -->
    <div class="card-body">
    
      <form  method="post" class="form-horizontal needs-validation" novalidate action="<?php echo e(route('receipt_process.store')); ?>" enctype="multipart/form-data">
      <?php echo e(csrf_field()); ?>


        <div class="form-row">
          <div class="col-md-6">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Receipt No:</label>
              <div class="col-sm-8">
                <input type="text" class="form-control receipt_no" placeholder="Receipt No" name="receipt_no" value="">
                
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Receipt Date :</label>
              <div class="col-sm-8">
                <input type="date" class="form-control date" placeholder="Date" value="<?php echo e($date); ?>" name="date" value="" >
                
              </div>
            </div>
          </div>

          <div class="col-md-6">
                  <div class="form-group row">
                    <label for="validationCustom01" class="col-sm-4 col-form-label">Party Name :</label>
                     <div class="col-sm-6">
                      <select class="js-example-basic-multiple col-12 form-control custom-select customer_id" name="customer_id" id="customer_id">
                           <option value="">Choose Customer Name</option>
                           <?php $__currentLoopData = $customer; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customers): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                           <option value="<?php echo e($customers->id); ?>"><?php echo e($customers->name); ?></option>
                           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                     </div>
                     <a href="<?php echo e(url('master/customer/create')); ?>" target="_blank">
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
              <label class="col-sm-4 col-form-label" for="validationCustom01">Sale Entry No</label><br>
              <div class="col-sm-8">
         <select class="js-example-basic-multiple col-12 form-control custom-select sale_entry_no" name="s_no" onchange="sale_det()" id="sale_entry_no">
                           <option value="">Choose Sale Entry No</option>
                           <?php $__currentLoopData = $sale_entry; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sale_entries): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                           <option value="<?php echo e($sale_entries->s_no); ?>"><?php echo e($sale_entries->s_no); ?></option>
                           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                <select class="js-example-basic-multiple col-12 form-control custom-select nature" name="nature" id="nature">
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
      <table id="" class="table table-striped table-bordered" style="width:100%">
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
      <table id="" class="table table-striped table-bordered" style="width:100%">
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
    <script src="<?php echo e(asset('assets/js/master/capitalize.js')); ?>"></script>
    <!-- card body end@ -->
  </div>
</div>

<script type="text/javascript">
  $(document).on("click",".refresh_customer_id",function(){
      var customer_dets=refresh_customer_master_details();
      $(".customer_id").html(customer_dets);
   }); 

   function customer_det()
{

  var customer_id=$('#customer_id').val();

   
  $.ajax({

            type: "POST",
            url: "<?php echo e(url('receipt_process/sale_entry_det/')); ?>",
            data: { customer_id : customer_id },
            success: function(data) {
            var result = JSON.parse(data);
            $('#myTable').append(result);
           
           }
        });
}

 function sale_det()
{

  var sale_entry_no=$('#sale_entry_no').val();
  $('#single_row').remove();

  $.ajax({
            
            type: "POST",
            url: "<?php echo e(url('receipt_process/sale_entry_det/')); ?>",
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
            url: "<?php echo e(url('receipt_process/advance_entry_det/')); ?>",
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
  $('.amount').each(function(){
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

<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ns_pollachi\resources\views/admin/receipt_process/add.blade.php ENDPATH**/ ?>