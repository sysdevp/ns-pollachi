<?php $__env->startSection('content'); ?>
<div class="col-12 body-sec">
  <div class="card px-0">
    <!-- card header start@ -->
    <div class="card-header px-2">
      <div class="row">
        <div class="col-4">
          <h3>Stock Summary</h3>
        </div>
        <div class="col-8 mr-auto">
          <ul class="h-right-btn mb-0 pl-0">
            <li><button type="button" class="btn btn-success"><a href="<?php echo e(route('stock_summary.index')); ?>">Back</a></button></li>
          </ul>
        </div>
      </div>
    </div>
    <!-- card header end@ -->

    <style>
table, th, td {
  border: 1px solid #E1E1E1;
}
/*#stock_summary_filter {
    opacity: 0;
    z-index: -1;
}
#stock_summary_length {
  display: none;
}
#stock_summary_wrapper div.dt-buttons {
  z-index: 10;
}*/

</style>
    <div class="card-body">
    
      <form  method="post" class="form-horizontal needs-validation" novalidate action="<?php echo e(route('payable_billwise.store')); ?>" enctype="multipart/form-data">
      <?php echo e(csrf_field()); ?>


        <div class="form-row">

          <div class="col-md-12 row mb-3">

            <!-- <div class="col-md-2">
            <input type="button" class="btn btn-success" name="ageing" id="ageing" onclick="hide_column()" value="Hide Columns">
            </div> -->
            
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
              <label>Opening Stock</label>
              <input type="checkbox" class="op_stock" name="opening_stock" value="1" id="opening_stock">
            </div> 

            <div class="col-md-2">
              <label>Closing Stock</label>
              <input type="checkbox" class="cls_stock" name="closing_stock" value="1" id="closing_stock">
            </div>

            <div class="col-md-2">
              <label>Purchase Estimation</label>
              <input type="checkbox" class="p_e" name="purchase_estimation" value="1" id="purchase_estimation">
            </div>

            <div class="col-md-2">
              <label>Purchase Order</label>
              <input type="checkbox" class="p_o" name="purchase_order" value="1" id="purchase_order">
            </div> 

            <div class="col-md-2">
              <label>Receipt Note</label>
              <input type="checkbox" class="r_note" name="receipt_note" value="1" id="receipt_note">
            </div> 

            <div class="col-md-2">
              <label>Purchase Entry</label>
              <input type="checkbox" class="p_enrty" name="purchase_entry" value="1" id="purchase_entry">
            </div>

            </div>

            <div class="col-md-12 row hiding">
            <div class="col-md-2">
              <label>Rejection Out</label>
              <input type="checkbox" class="r_out" name="rejection_out" value="1" id="rejection_out">
            </div> 

            <div class="col-md-2">
              <label>Debit Note</label>
              <input type="checkbox" class="d_n" name="debit_note" value="1" id="debit_note">
            </div>

            <div class="col-md-2">
              <label>Sales Estimation</label>
              <input type="checkbox" class="s_e" name="purchase_estimation" value="1" id="purchase_estimation">
            </div>

            <div class="col-md-2">
              <label>Sales Order</label>
              <input type="checkbox" class="s_o" name="purchase_order" value="1" id="purchase_order">
            </div> 

            <div class="col-md-2">
              <label>Delivery Note</label>
              <input type="checkbox" class="d_note" name="delivery_note" value="1" id="delivery_note">
            </div> 

            <div class="col-md-2">
              <label>Sales Entry</label>
              <input type="checkbox" class="s_entry" name="purchase_entry" value="1" id="purchase_entry">
            </div>

            </div>

            <div class="col-md-12 mb-3 row hiding">
            <div class="col-md-2">
              <label>Rejection In</label>
              <input type="checkbox" class="r_in" name="rejection_in" value="1" id="rejection_in">
            </div> 

            <div class="col-md-2">
              <label>Credit Note</label>
              <input type="checkbox" class="c_note" name="credit_note" value="1" id="credit_note">
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
                <label>Category </label>
                <select class="js-example-basic-multiple col-12 form-control custom-select category"  name="category" id="category">
                  <option value="">Choose Category</option>
                  <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <option value="<?php echo e($value->id); ?>"><?php echo e($value->name); ?></option>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
              </div>
              <div class="col-sm-2">
                <label>Item Name </label>
                <select class="js-example-basic-multiple col-12 form-control custom-select item"  name="item" id="item">
                  <option value="">Choose Item Name</option>
                  <?php $__currentLoopData = $item; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <option value="<?php echo e($value->id); ?>"><?php echo e($value->name); ?></option>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
              </div>

              <div class="col-sm-2">
                <label>Party Name </label>
                <select class="js-example-basic-multiple col-12 form-control custom-select supplier"  name="supplier" id="supplier">
                  <option value="">Choose Party Name</option>
                  <?php $__currentLoopData = $supplier; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <option value="<?php echo e($value->id); ?>"><?php echo e($value->name); ?></option>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
              </div>

            
          </div>
          
          <table class="table table-striped table-bordered table-responsive" id="stock_summary">
                  <thead>
                    <tr>
                    <th rowspan="2"> S.no </th>
                    <th rowspan="2"> Date</th>
                    <th rowspan="2"> Name Of Item </th>
                    <th rowspan="2"> Group</th>
                    <th rowspan="2"> Category</th>
                    <th align="center" rowspan="2" id="op_stock"> Opening Stock</th>
                    <th align="center" rowspan="2" id="cls_stock"> Closing Stock</th>
                    <th align="center" colspan="3" id="p_e"> Purchase Estimation</th>
                    <th align="center" colspan="3" id="p_o"> Purchase Order</th>
                    <th align="center" colspan="3" id="r_note"> Receipt Note</th>
                    <th align="center" colspan="3" id="p_enrty"> Purchase Entry</th>
                    <th align="center" colspan="3" id="r_out"> Rejection Out</th>
                    <th align="center" colspan="3" id="d_n"> Debit Note</th>
                    <th align="center" colspan="3" id="s_e"> Sales Estimation</th>
                    <th align="center" colspan="3" id="s_o"> Sales Order</th>
                    <th align="center" colspan="3" id="d_note"> Delivery Note</th>
                    <th align="center" colspan="3" id="s_entry"> Sales Entry</th>
                    <th align="center" colspan="3" id="r_in"> Rejection In</th>
                    <th align="center" colspan="3" id="c_note"> Credit Note</th>
                    </tr>
                    <tr>
                      <!-- <th id="op_stock1">Qty</th>
                      <th id="op_stock2">Rate</th>
                      <th id="op_stock3">Amount</th>
                      <th id="cls_stock1">Qty</th>
                      <th id="cls_stock2">Rate</th>
                      <th id="cls_stock3">Amount</th> -->
                      <th id="p_e1">Qty</th>
                      <th id="p_e2">Rate</th>
                      <th id="p_e3">Amount</th>
                      <th id="p_o1">Qty</th>
                      <th id="p_o2">Rate</th>
                      <th id="p_o3">Amount</th>
                      <th id="r_note1">Qty</th>
                      <th id="r_note2">Rate</th>
                      <th id="r_note3"> Amount</th>
                      <th id="p_enrty1">Qty</th>
                      <th id="p_enrty2">Rate</th>
                      <th id="p_enrty3">Amount</th>
                      <th id="r_out1">Qty</th>
                      <th id="r_out2">Rate</th>
                      <th id="r_out3">Amount</th>
                      <th id="d_n1">Qty</th>
                      <th id="d_n2">Rate</th>
                      <th id="d_n3">Amount</th>
                      <th id="s_e1">Qty</th>
                      <th id="s_e2">Rate</th>
                      <th id="s_e3">Amount</th>
                      <th id="s_o1">Qty</th>
                      <th id="s_o2">Rate</th>
                      <th id="s_o3">Amount</th>
                      <th id="d_note1">Qty</th>
                      <th id="d_note2">Rate</th>
                      <th id="d_note3">Amount</th>
                      <th id="s_entry1">Qty</th>
                      <th id="s_entry2">Rate</th>
                      <th id="s_entry3">Amount</th>
                      <th id="r_in1">Qty</th>
                      <th id="r_in2">Rate</th>
                      <th id="r_in3">Amount</th>
                      <th id="c_note1">Qty</th>
                      <th id="c_note2">Rate</th>
                      <th id="c_note3">Amount</th> 
                    </tr>
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


<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ns_pollachi\resources\views/admin/stock_report/summary.blade.php ENDPATH**/ ?>