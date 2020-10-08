<?php $__env->startSection('content'); ?>
<div class="col-12 body-sec">
  <div class="card px-0">
    <!-- card header start@ -->
    <div class="card-header px-2">
      <div class="row">
        <div class="col-4">
          <h3>Party Wise(Receivables)</h3>
        </div>
        <div class="col-8 mr-auto">
          <ul class="h-right-btn mb-0 pl-0">
            <li><button type="button" class="btn btn-success"><a href="<?php echo e(route('receivable_partywise.index')); ?>">Back</a></button></li>
          </ul>
        </div>
      </div>
    </div>
    <!-- card header end@ -->

    <style>
table, th, td {
  border: 1px solid #E1E1E1;
}
#receivable_party_filter {
    opacity: 0;
    z-index: -1;
}
#receivable_party_length {
  display: none;
}
#receivable_party_wrapper div.dt-buttons {
  z-index: 10;
}
</style>
    <div class="card-body">
    
      <form  method="post" class="form-horizontal needs-validation" novalidate action="<?php echo e(route('receivable_partywise.store')); ?>" enctype="multipart/form-data">
      <?php echo e(csrf_field()); ?>


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
          <br>

      <div class="col-md-12 row mb-3">


        <div class="col-md-3">
          <label style="font-family: Times new roman;color: white;">Choose Any</label><br>
          <label style="font-family: Times new roman;">All</label>&nbsp;&nbsp;
          <input type="radio" name="choose" checked="" value="1">&nbsp;&nbsp;
          <label style="font-family: Times new roman;">Single</label>&nbsp;&nbsp;
          <input type="radio" name="choose" value="0">
          
        </div>

        <div class="col-md-4">
                  <label style="font-family: Times new roman;">Party Name</label><br>
                  <div class="form-group row">
                     <div class="col-sm-8">
                      <select class="js-example-basic-multiple col-12 form-control custom-select supplier_id" name="supplier_id" id="supplier_id">
                           <option value="">Choose Party Name</option>
                           <?php $__currentLoopData = $supplier; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $suppliers): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                           <option value="<?php echo e($suppliers->id); ?>"><?php echo e($suppliers->name); ?></option>
                           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                     </div>
                     <a href="<?php echo e(url('master/supplier/create')); ?>" target="_blank">
                     <button type="button"  class="px-2 btn btn-success ml-2" title="Add Supplier"><i class="fa fa-plus-circle" aria-hidden="true"></i></button></a>
                     <button type="button"  class="px-2 btn btn-success mx-2 refresh_supplier_id" title="Add Brand"><i class="fa fa-refresh" aria-hidden="true"></i></button>
                  </div>
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

            <div class="col-md-12 row hiding mb-3">
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
              <label>Supplier Name</label>
              <input type="checkbox" class="supplier" name="purchase_order" value="1" id="item_amnt">
            </div> 

            <div class="col-md-2">
              <label>Contact Number</label>
              <input type="checkbox" class="contact" name="purchase_order" value="1" id="item_amnt">
            </div> 

            <div class="col-md-2">
              <label>Supplier Email Id</label>
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

        <div class="form-row">
          
          <table class="table table-striped table-bordered table-responsive" id="receivable_party">
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
                    <th id="supplier"> Supplier Contact Name</th>
                    <th id="contact"> Supplier Contact Number</th>
                    <th id="email"> Supplier Contact Email Id</th>
                    
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


<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ns_pollachi\resources\views/admin/outstanding/receivables/partywise/bill.blade.php ENDPATH**/ ?>