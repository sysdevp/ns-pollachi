<?php $__env->startSection('content'); ?>
<div class="col-12 body-sec">
  <div class="card px-0">
    <!-- card header start@ -->
    <div class="card-header px-2">
      <div class="row">
        <div class="col-4">
          <h3>GST Date Wise Report</h3>
        </div>
        <div class="col-8 mr-auto">
          <ul class="h-right-btn mb-0 pl-0">
            <li><button type="button" class="btn btn-success"><a href="<?php echo e(route('gst_report.index')); ?>">Back</a></button></li>
          </ul>
        </div>
      </div>
    </div>
    <!-- card header end@ -->

    <style>
table, th, td {
  border: 1px solid #E1E1E1;
}
/*#ageing_report_filter {
    opacity: 0;
    z-index: -1;
}
#ageing_report_length {
  display: none;
}
#ageing_report_wrapper div.dt-buttons {
  z-index: 10;
}
#stock_summary_filter {
    opacity: 0;
    z-index: -1;
}
#stock_summary_length {
  display: none;
}
#stock_summary_wrapper div.dt-buttons {
  z-index: 10;
}
#day_book_filter {
    opacity: 0;
    z-index: -1;
}
#day_book_length {
  display: none;
}
#day_book_wrapper div.dt-buttons {
  z-index: 10;
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

#b2b_filter {
    opacity: 0;
    z-index: -1;
}
#b2b_length {
  display: none;
}
#b2b_wrapper div.dt-buttons {
  z-index: 10;
}
#b2c_filter {
    opacity: 0;
    z-index: -1;
}
#b2c_length {
  display: none;
}
#b2c_wrapper div.dt-buttons {
  z-index: 10;
}
#registered_filter {
    opacity: 0;
    z-index: -1;
}
#registered_length {
  display: none;
}
#registered_wrapper div.dt-buttons {
  z-index: 10;
}

#unregistered_filter {
    opacity: 0;
    z-index: -1;
}
#unregistered_length {
  display: none;
}
#unregistered_wrapper div.dt-buttons {
  z-index: 10;
}*/
#inward .dataTables_scrollHeadInner {
    width: 100% !important;
}
</style>
    <div class="card-body">
    
      <form  method="post" class="form-horizontal needs-validation" novalidate action="<?php echo e(route('stock_ageing.store')); ?>" enctype="multipart/form-data">
      <?php echo e(csrf_field()); ?>


        <div class="form-row mb-3">

        

          <div class="col-md-12 form-row mb-3">

            <div class="col-md-2">
              <label>Select Any One</label>
            <select class="form-control" onchange="change()" id="select">
              <option>Choose Any One</option>
              <option value="1">Outward</option>
              <option value="2">Inward</option>
            </select>
            </div>

            <div class="col-md-2">
              <label>From</label>
            <input type="date" class="form-control from" name="from" id="from">
            </div>

            <div class="col-md-2">
              <label>To</label>
            <input type="date" class="form-control to" name="to" id="to">
            </div>
          </div>
          
          </div>
          <div class="col-md-12 mb-3">
            <div class="col-md-2">
            <input type="button" class="btn btn-success" value="Submit">
            </div>
          </div>

          <div class="col-md-12" id="outward">
            <center><label style="font-size: 150%; margin-left: 30px;">OUTWARD</label></center>
            <table class="table table-striped table-bordered" id="master">
              <label style="font-size: 110%; margin-left: 30px;">B2B</label>
                  <thead>
                    <th> S.no </th>
                    <th>Date </th>
                    <th>Customer Name</th>
                    <th>Particulars</th>
                    <th> Taxable Value</th>
                    <th> IGST</th>
                    <th>CGST</th>
                    <th>SGST</th>
                    <th>Total Tax</th>
                    <th>Total Invoice Value</th>
                    <th>Action</th>

                  </thead>
                  <tbody>

                  </tbody>
                  
                </table>

                <table class="table table-striped table-bordered" id="out_b2b">
            <label style="font-size: 110%; margin-left: 30px;">B2C</label>
                  <thead>
                    <th> S.no </th>
                    <th>Date </th>
                    <th>Customer Name</th>
                    <th>Particulars</th>
                    <th> Taxable Value</th>
                    <th> IGST</th>
                    <th>CGST</th>
                    <th>SGST</th>
                    <th>Total Tax</th>
                    <th>Total Invoice Value</th>
                    <th>Action</th>
                    
                  </thead>
                  <tbody>

                  </tbody>
                  
                </table>

                <!-- <table class="table table-striped table-bordered" id="day_book">
            <label style="font-size: 110%; margin-left: 30px;">Registered Customer</label>
                  <thead>
                    <th> S.no </th>
                    <th> S.no </th>
                    <th>Date </th>
                    <th>Customer Name</th>
                    <th>Particulars</th>
                    <th> Taxable Value</th>
                    <th> IGST</th>
                    <th>CGST</th>
                    <th>IGST</th>
                    <th>Total Tax</th>
                    <th>Total Invoice Value</th>
                    <th>Action</th>
                    
                  </thead>
                  <tbody>

                  </tbody>
                  
                </table> -->

                <table class="table table-striped table-bordered" id="payable_bill">
            <label style="font-size: 110%; margin-left: 30px;">Unregistered Customer</label>
                  <thead>
                    <th> S.no </th>
                    <th>Date </th>
                    <th>Customer Name</th>
                    <th>Particulars</th>
                    <th> Taxable Value</th>
                    <th> IGST</th>
                    <th>CGST</th>
                    <th>SGST</th>
                    <th>Total Tax</th>
                    <th>Total Invoice Value</th>
                    <th>Action</th>
                    
                  </thead>
                  <tbody>

                  </tbody>
                  
                </table>

          </div>

          <div class="col-md-12" id="inward" style="display: none;">
            <center><label style="font-size: 150%; margin-left: 30px;">INWARD</label></center>
            <table class="table table-striped table-bordered" id="b2b" >
              <label style="font-size: 110%; margin-left: 30px;">B2B</label>
                  <thead style="width: 100%;">
                    <th> S.no </th>
                    <th>Date </th>
                    <th>Supplier Name</th>
                    <th>Particulars</th>
                    <th> Taxable Value</th>
                    <th> IGST</th>
                    <th>CGST</th>
                    <th>SGST</th>
                    <th>Total Tax</th>
                    <th>Total Invoice Value</th>
                    <th>Action</th>

                  </thead>
                  <tbody>

                  </tbody>
                  
                </table>

                <table class="table table-striped table-bordered" id="b2c">
            <label style="font-size: 110%; margin-left: 30px;">B2C</label>
                  <thead>
                    <th> S.no </th>
                    <th>Date </th>
                    <th>Supplier Name</th>
                    <th>Particulars</th>
                    <th> Taxable Value</th>
                    <th> IGST</th>
                    <th>CGST</th>
                    <th>SGST</th>
                    <th>Total Tax</th>
                    <th>Total Invoice Value</th>
                    <th>Action</th>
                    
                  </thead>
                  <tbody>

                  </tbody>
                  
                </table>

                <!-- <table class="table table-striped table-bordered" id="registered">
            <label style="font-size: 110%; margin-left: 30px;">Registered Supplier</label>
                  <thead>
                    <th> S.no </th>
                    <th >Date </th>
                    <th>Supplier Name</th>
                    <th>Particulars</th>
                    <th > Taxable Value</th>
                    <th > IGST</th>
                    <th>CGST</th>
                    <th>IGST</th>
                    <th>Total Tax</th>
                    <th>Total Invoice Value</th>
                    <th>Action</th>
                    
                  </thead>
                  <tbody>

                  </tbody>
                  
                </table> -->

                <table class="table table-striped table-bordered" id="unregistered">
            <label style="font-size: 110%; margin-left: 30px;">Unregistered Supplier</label>
                  <thead>
                    <th> S.no </th>
                    <th>Date </th>
                    <th>Supplier Name</th>
                    <th>Particulars</th>
                    <th> Taxable Value</th>
                    <th> IGST</th>
                    <th>CGST</th>
                    <th>SGST</th>
                    <th>Total Tax</th>
                    <th>Total Invoice Value</th>
                    <th>Action</th>
                    
                  </thead>
                  <tbody>

                  </tbody>
                  
                </table>

          </div>
          
          
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

      function change()
      {
        if($('#select').val() == 2)
        {
          $('#inward').show();
          $('#outward').hide();
        }
        else
        {
          $('#inward').hide();
          $('#outward').show();
        }
      }
    </script>
    
    <!-- card body end@ -->
  </div>
</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ns_pollachi\resources\views/admin/gst_report/report.blade.php ENDPATH**/ ?>