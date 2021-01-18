<?php $__env->startSection('content'); ?>
<main class="page-content">

<div class="col-12 body-sec">
  <div class="card px-0">
    <!-- card header start@ -->
    <div class="card-header px-2">
      <div class="row">
        <div class="col-4">
          <h3>GST Report</h3>
        </div>
        <div class="col-8 mr-auto">
          <ul class="h-right-btn mb-0 pl-0">
            
            <li><button type="button" class="btn btn-success"><a href="<?php echo e(url('date_wise/gst_report/')); ?>">Date Wise Report</a></button></li>
          </ul>
        </div>
      </div>
    </div>
    <!-- card header end@ -->

    <style>
table, th, td {
  border: 1px solid #E1E1E1;
}
/*#day_book_filter {
    opacity: 0;
    z-index: -1;
}
#day_book_length {
  display: none;
}
#day_book_wrapper div.dt-buttons {
  z-index: 10;
}*/
</style>
    <div class="card-body">
    
      <form  method="post" class="form-horizontal needs-validation" novalidate action="<?php echo e(route('daybook.store')); ?>" enctype="multipart/form-data">
      <?php echo e(csrf_field()); ?>


        <div class="form-row">

          <!-- <div class="col-md-12 row hiding">
            <div class="col-md-2">
              <label>Particulars</label>
              <input type="checkbox" class="particulars" name="opening_stock" value="1" id="item_name">
            </div> 

            <div class="col-md-2">
              <label>Nature</label>
              <input type="checkbox" class="natures" name="closing_stock" value="1" id="item_qty">
            </div>

            <div class="col-md-2">
              <label>Debit</label>
              <input type="checkbox" class="debit" name="purchase_estimation" value="1" id="item_rate">
            </div>

            <div class="col-md-2">
              <label>Credit</label>
              <input type="checkbox" class="credit" name="purchase_order" value="1" id="item_amnt">
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


          <!-- <div class="col-md-12 form-row mb-3">
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
          </div> -->

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
          <!-- </div> -->

          <div class="col-md-12 form-row mb-3">

            <div class="col-md-2">
              <label>From</label>
            <input type="date" class="form-control from" name="from" id="from">
            </div>

            <div class="col-md-2">
              <label>To</label>
            <input type="date" class="form-control to" name="to" id="to">
            </div>
          </div>
          
          <table class="table table-striped table-bordered" id="consolidate">
                  <thead>
                    <tr>
                    <th> S.no </th>
                    <th id="natures"> Outwards</th>
                    <th> Taxable Value </th>
                    <th id="particulars"> IGST</th>
                    <th id="natures"> CGST</th>
                    <th id="debit"> SGST</th>
                    <th id="credit"> Tax Value</th>
                    <th id="credit"> Total Invoice Value</th>
                    </tr>
                    <tr>
                      <td>1</td>
                      <td>B2B</td>
                      <td class="cust_sum_taxable"><?php echo e($cust_sum_taxable_b2b); ?></td>
                      <td class="cust_igst_val"><?php echo e($cust_igst_b2b); ?></td>
                      <td class="cust_cgst_val"><?php echo e($cust_c_s_gst_b2b); ?></td>
                      <td class="cust_sgst_val"><?php echo e($cust_c_s_gst_b2b); ?></td>
                      <td class="cust_sum_tax"><?php echo e($cust_sum_tax_b2b); ?></td>
                      <td class="cust_invoice_total"><?php echo e($cust_tot_b2b); ?></td>
                    </tr>
                    
                    <tr>
                      <td>2</td>
                      <td>B2C</td>
                      <td class="cust_sum_taxable"><?php echo e($cust_sum_taxable_b2c); ?></td>
                      <td class="cust_igst_val"><?php echo e($cust_igst_b2c); ?></td>
                      <td class="cust_cgst_val"><?php echo e($cust_c_s_gst_b2c); ?></td>
                      <td class="cust_sgst_val"><?php echo e($cust_c_s_gst_b2c); ?></td>
                      <td class="cust_sum_tax"><?php echo e($cust_sum_tax_b2c); ?></td>
                      <td class="cust_invoice_total"><?php echo e($cust_tot_b2c); ?></td>
                    </tr>

                    <tr>
                      <td>3</td>
                      <td>Unregistered Customer</td>
                      <td class="cust_sum_taxable"><?php echo e($cust_sum_taxable_unreg); ?></td>
                      <td class="cust_igst_val"><?php echo e($cust_igst_unreg); ?></td>
                      <td class="cust_cgst_val"><?php echo e($cust_c_s_gst_unreg); ?></td>
                      <td class="cust_sgst_val"><?php echo e($cust_c_s_gst_unreg); ?></td>
                      <td class="cust_sum_tax"><?php echo e($cust_sum_tax_unreg); ?></td>
                      <td class="cust_invoice_total"><?php echo e($cust_tot_unreg); ?></td>
                    </tr>
                    <tr>
                      <td></td>
                      <td>Total</td>
                      <td id="cust_taxable_value"></td>
                      <td id="cust_igst"></td>
                      <td id="cust_cgst"></td>
                      <td id="cust_sgst"></td>
                      <td id="cust_tax_value"></td>
                      <td id="cust_total_value"></td>
                    </tr>
                    <tr>
                      <th> S.no </th>
                    <th id="natures"> Inwards</th>
                    <th> Taxable Value </th>
                    <th id="particulars"> IGST</th>
                    <th id="natures"> CGST</th>
                    <th id="debit"> SGST</th>
                    <th id="credit"> Tax Value</th>
                    <th id="credit"> Total Invoice Value</th>
                    </tr>
                    <tr>
                      <td>1</td>
                      <td>B2B</td>
                      <td class="sum_taxable"><?php echo e($sum_taxable_b2b); ?></td>
                      <td class="igst_val"><?php echo e($igst_b2b); ?></td>
                      <td class="cgst_val"><?php echo e($c_s_gst_b2b); ?></td>
                      <td class="sgst_val"><?php echo e($c_s_gst_b2b); ?></td>
                      <td class="sum_tax"><?php echo e($sum_tax_b2b); ?></td>
                      <td class="invoice_total"><?php echo e($tot_b2b); ?></td>
                    </tr>
                    
                    <tr>
                      <td>2</td>
                      <td>B2C</td>
                      <td class="sum_taxable"><?php echo e($sum_taxable_b2c); ?></td>
                      <td class="igst_val"><?php echo e($igst_b2c); ?></td>
                      <td class="cgst_val"><?php echo e($c_s_gst_b2c); ?></td>
                      <td class="sgst_val"><?php echo e($c_s_gst_b2c); ?></td>
                      <td class="sum_tax"><?php echo e($sum_tax_b2c); ?></td>
                      <td class="invoice_total"><?php echo e($tot_b2c); ?></td>
                    </tr>

                    <tr>
                      <td>3</td>
                      <td>Unregistered Supplier</td>
                      <td class="sum_taxable"><?php echo e($sum_taxable_unreg); ?></td>
                      <td class="igst_val"><?php echo e($igst_unreg); ?></td>
                      <td class="cgst_val"><?php echo e($c_s_gst_unreg); ?></td>
                      <td class="sgst_val"><?php echo e($c_s_gst_unreg); ?></td>
                      <td class="sum_tax"><?php echo e($sum_tax_unreg); ?></td>
                      <td class="invoice_total"><?php echo e($tot_unreg); ?></td>
                    </tr>
                    <tr>
                      <td></td>
                      <td>Total</td>
                      <td id="taxable_value"></td>
                      <td id="igst"></td>
                      <td id="cgst"></td>
                      <td id="sgst"></td>
                      <td id="tax_value"></td>
                      <td id="total_value"></td>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td></td>
                      <td>Net Vlue</td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                    </tr>
                  </tbody>
                  
                </table>
          
        </div>
        <!-- <div class="col-md-7 text-right">
          <button class="btn btn-success" name="add" type="submit">Submit</button>
        </div> -->
      </form>
    </div>
    <script src="<?php echo e(asset('assets/js/master/capitalize.js')); ?>"></script>

    <script>

      $(document).ready(function(){

        var sum_taxable = 0;        var cust_sum_taxable = 0;
        var igst_val = 0;           var cust_igst_val = 0;
        var cgst_val = 0;           var cust_cgst_val = 0;
        var sgst_val = 0;           var cust_sgst_val = 0;
        var sum_tax = 0;            var cust_sum_tax = 0;
        var invoice_total = 0;      var cust_invoice_total = 0;

        /*supplier Total View Starts Here*/

        $('.sum_taxable').each(function(){
          sum_taxable = parseFloat(sum_taxable) + parseFloat($(this).text());
        });

        $('.igst_val').each(function(){
          igst_val = parseFloat(igst_val) + parseFloat($(this).text());
        });

        $('.cgst_val').each(function(){
          cgst_val = parseFloat(cgst_val) + parseFloat($(this).text());
        });

        $('.sgst_val').each(function(){
          sgst_val = parseFloat(sgst_val) + parseFloat($(this).text());
        });

        $('.sum_tax').each(function(){
          sum_tax = parseFloat(sum_tax) + parseFloat($(this).text());
        });

        $('.invoice_total').each(function(){
          invoice_total = parseFloat(invoice_total) + parseFloat($(this).text());
        });

        $('#taxable_value').text(parseFloat(sum_taxable).toFixed(2));
        $('#igst').text(parseFloat(igst_val).toFixed(2));
        $('#cgst').text(parseFloat(cgst_val).toFixed(2));
        $('#sgst').text(parseFloat(cgst_val).toFixed(2));
        $('#tax_value').text(parseFloat(sum_tax).toFixed(2));
        $('#total_value').text(parseFloat(invoice_total).toFixed(2));

        /*supplier Total View Ends Here*/

        /*Customer Total View Starts Here*/

        $('.cust_sum_taxable').each(function(){
          cust_sum_taxable = parseFloat(cust_sum_taxable) + parseFloat($(this).text());
        });

        $('.cust_igst_val').each(function(){
          cust_igst_val = parseFloat(cust_igst_val) + parseFloat($(this).text());
        });

        $('.cust_cgst_val').each(function(){
          cust_cgst_val = parseFloat(cust_cgst_val) + parseFloat($(this).text());
        });

        $('.cust_sgst_val').each(function(){
          cust_sgst_val = parseFloat(cust_sgst_val) + parseFloat($(this).text());
        });

        $('.cust_sum_tax').each(function(){
          cust_sum_tax = parseFloat(cust_sum_tax) + parseFloat($(this).text());
        });

        $('.cust_invoice_total').each(function(){
          cust_invoice_total = parseFloat(cust_invoice_total) + parseFloat($(this).text());
        });

        $('#cust_taxable_value').text(parseFloat(cust_sum_taxable).toFixed(2));
        $('#cust_igst').text(parseFloat(cust_igst_val).toFixed(2));
        $('#cust_cgst').text(parseFloat(cust_cgst_val).toFixed(2));
        $('#cust_sgst').text(parseFloat(cust_cgst_val).toFixed(2));
        $('#cust_tax_value').text(parseFloat(cust_sum_tax).toFixed(2));
        $('#cust_total_value').text(parseFloat(cust_invoice_total).toFixed(2));

        /*Customer Total View Ends Here*/
        

        
        
      });

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


<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ns_pollachi\resources\views/admin/gst_report/consolidated.blade.php ENDPATH**/ ?>