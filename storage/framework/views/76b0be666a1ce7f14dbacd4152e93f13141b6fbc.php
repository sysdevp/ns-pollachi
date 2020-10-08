<?php $__env->startSection('content'); ?>
<div class="col-12 body-sec">
  <div class="card px-0">
    <!-- card header start@ -->
    <div class="card-header px-2">
      <div class="row">
        <div class="col-4">
          <h3>Bill Wise(Payables)</h3>
        </div>
        <div class="col-8 mr-auto">
          <ul class="h-right-btn mb-0 pl-0">
            <li><button type="button" class="btn btn-success"><a href="<?php echo e(route('payable_billwise.index')); ?>">Back</a></button></li>
          </ul>
        </div>
      </div>
    </div>
    <!-- card header end@ -->

    <style>
table, th, td {
  border: 1px solid #E1E1E1;
}
#payable_bill_filter {
    opacity: 0;
    z-index: -1;
}
#payable_bill_length {
  display: none;
}
#payable_bill_wrapper div.dt-buttons {
  z-index: 10;
}
</style>
    <div class="card-body">
    
      <form  method="post" class="form-horizontal needs-validation" novalidate action="<?php echo e(route('payable_billwise.store')); ?>" enctype="multipart/form-data">
      <?php echo e(csrf_field()); ?>


        <div class="form-row">

          <div class="col-md-12 row">

            <div class="col-md-2">
            <input type="button" class="btn btn-success" name="ageing" id="ageing" onclick="ageing_analysis()" value="Ageing Analysis">
            </div>
            
            <div class="col-md-2 analysis1" style="display: none;">
              <label>From</label>
              <input type="Number" class="form-control" oninput="from_value1()" style="display: none;" name="from1" value="0" id="from1"><br>
              <input type="Number" class="form-control" oninput="from_value2()" style="display: none;" name="from2" value="0" id="from2"><br>
              <input type="Number" class="form-control" oninput="from_value3()" style="display: none;" name="from3" value="0" id="from3"><br>
              <input type="Number" class="form-control" oninput="from_value4()" style="display: none;" name="from4" value="0" id="from4"><br>
              <input type="Number" class="form-control" oninput="from_value5()" style="display: none;" name="from5" value="0" id="from5"><br>
              
            </div>


            <div class="col-md-2 analysis2" style="display: none;">
              <label>To</label>
              <div class="input-group-prepend">
              <input type="Number" class="form-control" onchange="to_value1()" style="display: none;" name="to1" id="to1">&nbsp;&nbsp;<input type="button" class="btn btn-success go" id="go" value="Go" name="go">
              </div><br>
              <input type="Number" class="form-control" onchange="to_value2()" style="display: none;" name="to2" id="to2"><br>
              <input type="Number" class="form-control" onchange="to_value3()" style="display: none;" name="to3" id="to3"><br>
              <input type="Number" class="form-control" onchange="to_value4()" style="display: none;" name="to4" id="to4"><br>
              <input type="Number" class="form-control" onchange="to_value5()" style="display: none;" name="to5" id="to5"><br>
            </div>

            
          </div>

          <!-- <div class="col-md-12 row hiding">
            <div class="col-md-2">
              <label>Bill No</label>
              <input type="checkbox" class="bill_no" name="opening_stock" value="1" id="item_name">
            </div> 

            <div class="col-md-2">
              <label>Bill Date</label>
              <input type="checkbox" class="bill_date" name="closing_stock" value="1" id="item_qty">
            </div>

            <div class="col-md-2">
              <label>Party Name</label>
              <input type="checkbox" class="party" name="purchase_estimation" value="1" id="item_rate">
            </div>

            <div class="col-md-2">
              <label>Bill Amount</label>
              <input type="checkbox" class="bill_amount" name="purchase_order" value="1" id="item_amnt">
            </div> 

            <div class="col-md-2">
              <label>Cleared Amount</label>
              <input type="checkbox" class="cleared_amount" name="purchase_order" value="1" id="item_amnt">
            </div> 

            <div class="col-md-2">
              <label>Pending Amount</label>
              <input type="checkbox" class="pending_amount" name="purchase_order" value="1" id="item_amnt">
            </div> 

            </div>

            <div class="col-md-12 row hiding">
            <div class="col-md-2">
              <label>Days From Bill Date</label>
              <input type="checkbox" class="no_days" name="opening_stock" value="1" id="item_name">
            </div> 

            <div class="col-md-2">
              <label>Days From Due Date</label>
              <input type="checkbox" class="due_date" name="closing_stock" value="1" id="item_qty">
            </div>

            <div class="col-md-2">
              <label>Sales Man Name</label>
              <input type="checkbox" class="salesman" name="purchase_estimation" value="1" id="item_rate">
            </div>

            <div class="col-md-2">
              <label>Customer Name</label>
              <input type="checkbox" class="customer" name="purchase_order" value="1" id="item_amnt">
            </div> 

            <div class="col-md-2">
              <label>Contact Number</label>
              <input type="checkbox" class="contact" name="purchase_order" value="1" id="item_amnt">
            </div> 

            <div class="col-md-2">
              <label>Customer Email Id</label>
              <input type="checkbox" class="email" name="purchase_order" value="1" id="item_amnt">
            </div> 

            </div>

            <div class="col-md-12 row mb-3">
            <div class="col-md-2">
            <input type="button" class="btn btn-success" name="ageing" id="ageing" onclick="hide_column()" value="Hide Columns">
            </div>
            <div class="col-md-2">
            <input type="button" class="btn btn-success" name="ageing" id="ageing" onclick="show_column()" value="Show All Columns">
            </div>
          </div> -->

          <div class="col-md-12 form-row mb-3">
            <div class="col-md-2">
              <label>From</label>
            <input type="date" class="form-control from" name="from" id="from">
            </div>

            <div class="col-md-2">
              <label>To</label>
            <input type="date" class="form-control to" name="to" id="to">
            </div>

              <div class="col-sm-2">
                <label>Nature </label>
                <select class="js-example-basic-multiple col-12 form-control custom-select nature"  name="nature" id="nature">
                  <option value="">Choose Nature</option>
                        </select>
              </div>
              <div class="col-md-2">
              <label>Head</label>
            <input type="text" class="form-control head" placeholder="Head" name="head" id="head">
            </div>

            <div class="col-md-3">
              <label>Amount</label>
            <div class="input-group">
              <input type="text" class="form-control col-md-9" aria-label="Text input with dropdown button" placeholder="Amount" name="amount">
              <div class="input-group-append col-md-3 p-0">
 
                  <select class=" form-control custom-select operator"  name="operator" id="operator">
                  <option value="">Operator</option>
                           <option value="1">></option>
                           <option value="2"><</option>
                           <option value="3">=</option>
                        </select>

              </div>
            </div>
          </div>


            <!-- <div class="col-md-2">
              <label>Amount</label>
            <input type="Number" class="form-control amount" placeholder="Amont" name="amount" id="amount">
            </div>
            <div class="col-sm-2">
                <label>Choose Any One</label>
                <select class="js-example-basic-multiple col-12 form-control custom-select nature"  name="nature" id="nature">
                  <option value="">Choose Any One</option>
                           <option value="">Greater Than</option>
                           <option value="">Less Than</option>
                           <option value="">Equal To</option>
                        </select>
              </div> -->
          </div>
          
          <table class="table table-striped table-bordered" id="payable_bill">
                  <thead>
                    <th> S.no </th>
                    <th id="bill_no"> Bill.no </th>
                    <th id="bill_date"> Bill Date</th>
                    <th id="party"> Party Name</th>
                    <th id="bill_amount"> Bill Amount</th>
                    <th id="cleared_amount"> Cleared Amount</th>
                    <th id="pending_amount"> Pending Amount</th>
                    <th id="0-30" style="display: none;">0-30 Days</th>
                    <th id="31-60" style="display: none;">31-60 Days</th>
                    <th id="61-90" style="display: none;">61-90 Days</th>
                    <th id="91-120" style="display: none;">91-120 Days</th>
                    <th id="120" style="display: none;">(>120 Days)</th>
                    <th id="no_days"> No Of Days From Bill Date</th>
                    <th id="due_date\"> No Of Days From Due Date</th>
                    <th id="salesman"> Sales Man Name</th>
                    <th id="customer"> Customer Contact Name</th>
                    <th id="contact"> Customer Contact Number</th>
                    <th id="email"> Customer Contact Email Id</th>
                  </thead>
                  <tbody>

                  </tbody>
                  
                </table>
          
        </div>
        <!-- <div class="col-md-7 text-right">
          <button class="btn btn-success" name="add" type="submit">Submit</button>
        </div> -->
      </form>
    </div>
    <script src="<?php echo e(asset('assets/js/master/capitalize.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/ageing_analysis/ageing.js')); ?>"></script>

    <script>
      function hide_column()
      {
        $('input[type=checkbox]').each(function(){
            if($(this).prop("checked") == true){
                var name = $(this).attr('class');
                $('#'+name).hide();  
                }
              });
      }

      function show_column()
      {
        $('input[type=checkbox]').each(function(){
            if($(this).prop("checked") == true){
                var name = $(this).attr('class');
                $('#'+name).show();  
                this.checked = false;
                }
              });
      }
    </script>
    <!-- card body end@ -->
  </div>
</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ns_pollachi\resources\views/admin/outstanding/payables/billwise/bill.blade.php ENDPATH**/ ?>