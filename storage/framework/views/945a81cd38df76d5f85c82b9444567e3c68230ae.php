<?php $__env->startSection('content'); ?>
<style type="text/css">
  tbody#team-list {
    counter-reset: rowNumber;
}

tbody#team-list tr:nth-child(n+1) {
    counter-increment: rowNumber;
}

tbody#team-list tr:nth-child(n+1) td:first-child::before {
    content: counter(rowNumber);
    min-width: 1em;
    margin-right: 0.5em;
}
</style>
<div class="col-12 body-sec">
  <div class="card container-fluid px-0">
    <!-- card header start@ -->
    <div class="card-header px-2">
      <div class="row">
        <div class="col-4">
          <h3>Sales Gate Pass Entry</h3>
        </div>
        <div class="col-8 mr-auto">
          <ul class="h-right-btn mb-0 pl-0">
            <li><button type="button" class="btn btn-success"><a href="<?php echo e(route('sales_gatepass_entry.index')); ?>">Back</a></button></li>
          </ul>
        </div>
      </div>
    </div>
    <style>
    .table{
      font-size: 13px;
    }
    </style>
    <!-- card header end@ -->
    <div class="card-body">
    


<style type="text/css">
  #middlecol {
   
    width: 45%;
  }

  #middlecol table {
    max-width: 99%;
    width: 100% !important;
  }
</style>


<form  method="post" class="form-horizontal" action="<?php echo e(route('sales_gatepass_entry.store')); ?>" id="dataInput" enctype="multipart/form-data">
      <?php echo e(csrf_field()); ?>


      
                       <div class="row col-md-12">

                                <div class="col-md-2">
                                  <label style="font-family: Times new roman;">Voucher No</label><br>
                                  <div class="">
                                    <!-- <input type="text" readonly="" class="form-control proof_file  required_for_proof_valid" id="voucher_no" placeholder="Auto Generate Voucher No" name="voucher_no" value=""> -->
                                    <font size="2"><?php echo e($voucher_no); ?></font>
                                  </div>
                                
                                 
                                </div>

                                <div class="col-md-2">
                                  <label style="font-family: Times new roman;">Voucher Date</label><br>
                                <input type="date" class="form-control voucher_date  required_for_proof_valid" id="voucher_date" placeholder="Voucher Date" name="voucher_date" value="<?php echo e($date); ?>">
                                 
                                </div>

                                <div class="col-md-3">
                                  <label style="font-family: Times new roman;">Sales Order No</label><br>
                                <select class="js-example-basic-multiple form-control so_no" 
                                data-placeholder="Choose Sales Order No" onchange="so_details()" id="so_no"  name="so_no" >
                                <option value="">Choose Sale Order No</option>
                                <?php $__currentLoopData = $saleorder; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $saleorders): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($saleorders->so_no); ?>"><?php echo e($saleorders->so_no); ?></option>
                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                 </select>
                                 
                                </div>
                                <div class="col-md-3">
                                  <label style="font-family: Times new roman;">Sales Order Date</label><br>
                                <input type="date" class="form-control so_date  required_for_proof_valid" id="so_date" placeholder="Purchase Order Date" name="so_date" value="<?php echo e($date); ?>">
                                 
                                </div>

                                <!-- <div class="col-md-2">
                                  <label style="font-family: Times new roman;">Estimaton No</label><br>
                                <select class="js-example-basic-multiple form-control estimation_no" 
                                data-placeholder="Choose Estimation No" id="estimation_no" name="estimation_no" >
                                <option value="">Choose Estimation No</option>
                                <?php $__currentLoopData = $estimation; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $estimations): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($estimations->estimation_no); ?>"><?php echo e($estimations->estimation_no); ?></option>
                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                  
                                 </select>
                                 
                                </div>
                                <div class="col-md-2">
                                  <label style="font-family: Times new roman;">Estimaton Date</label><br>
                                <input type="date" class="form-control estimation_date  required_for_proof_valid" id="estimaton_date" placeholder="Estimaton Date" name="estimation_date" value="<?php echo e($date); ?>">
                                 
                                </div> -->
                                
                                </div>

                                <div class="row col-md-12">

                                  <div class="col-md-4">
                  <label style="font-family: Times new roman;">Customer Name</label><br>
                  <div class="form-group row">
                     <div class="col-sm-8">
                      <select class="js-example-basic-multiple col-12 form-control custom-select customer_id" onchange="customer_details()" name="customer_id" id="customer_id">
                           <option value="">Choose Customer Name</option>
                           <?php $__currentLoopData = $customer; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customers): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                           <option value="<?php echo e($customers->id); ?>"><?php echo e($customers->name); ?></option>
                           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                     </div>
                     <a href="<?php echo e(url('master/customer/create')); ?>" target="_blank">
                     <button type="button"  class="px-2 btn btn-success ml-2" title="Add Supplier"><i class="fa fa-plus-circle" aria-hidden="true"></i></button></a>
                     <button type="button"  class="px-2 btn btn-success mx-2 refresh_customer_id" title="Add Brand"><i class="fa fa-refresh" aria-hidden="true"></i></button>
                  </div>
               </div>
                                <div class="col-md-2">
                                  <label style="font-family: Times new roman;">Customer Address</label><br>
                                  <input type="hidden" name="address_line_1" id="address_line_1">
                                  
                                  <div class="address">
                                    
                                  </div>
                                </div>
                                <div class="col-md-2">
                                  <label style="font-family: Times new roman;">Sales Type</label><br>
                                  <input type="hidden" name="sales_type" id="sales_type">

                                  <div class="sales_type">
                                    
                                  </div>
                                </div>
                                <div class="col-md-2">
                                  <label style="font-family: Times new roman;">Taxable value</label><br>
                                  <input type="hidden" name="taxable_value" id="taxable_value">

                                  <div class="taxable_value">
                                    
                                  </div>
                                </div>
                                <div class="col-md-2">
                                  <label style="font-family: Times new roman;">Tax value</label><br>
                                  <input type="hidden" name="tax_value" id="tax_value">

                                  <div class="tax_value">
                                    
                                  </div>
                                </div>
                                <div class="col-md-2">
                                  <label style="font-family: Times new roman;">Invoice value</label><br>
                                  <input type="hidden" name="invoice_value" id="invoice_value">

                                  <div class="invoice_value">
                                    
                                  </div>
                                </div>
                              </div>
                              <br>
              <div class="col-md-8">
                       <div class="form-group row">
                       <div class="col-md-4">
                       <label for="validationCustom01" class=" col-form-label"><h4>Weight Details:</h4> </label><br>
                       
                           
                       </div>
                         </div>
              </div>

              <div class="row col-md-12">

                      <div class="col-md-2">
                      <label style="font-family: Times new roman;">Load Bill</label><br>
                      <input type="text" class="form-control" name="load_bill" id="load_bill" placeholder="Load Bill">
                      </div>

                      <div class="col-md-2">
                      <label style="font-family: Times new roman;">Unload Bill</label><br>
                      <input type="text" class="form-control" name="unload_bill" id="unload_bill" placeholder="Unload Bill">
                      </div>
                      
                      <div class="col-md-2">
                      <label style="font-family: Times new roman;">Load Live</label><br>
                      <input type="text" class="form-control" name="load_live" id="load_live" placeholder="Load Live">
                      </div>

                      <div class="col-md-2">
                      <label style="font-family: Times new roman;">Unload Live</label><br>
                      <input type="text" class="form-control" name="unload_live" id="unload_live" placeholder="Unload Live
                      ">
                      </div>          
                                 
              </div>
              <br>
                                
      

                       

                       <div class="col-md-7 text-right">
          <input type="submit" class="btn btn-success save" style="margin-bottom: 150px;" name="save" value="Save">
        </div>
      </form>
                       
        <script type="text/javascript">
          

function customer_details()
{

  var customer_id=$('.customer_id').val();


  $.ajax({
           type: "POST",
            url: "<?php echo e(url('sales_gatepass_entry/address_details/')); ?>",
            data: { customer_id : customer_id },
           success: function(data) {

            console.log(data);
            $('#address_line_1').val(data);
            
           $('.address').text(data);
           }
        });
}


$(document).on("click",".refresh_customer_id",function(){
      var customer_dets=refresh_customer_master_details();
      $(".customer_id").html(customer_dets);
   });


function so_details()
{

  var so_no=$('.so_no').val();
  $.ajax({
           type: "POST",
            url: "<?php echo e(url('sales_gatepass_entry/so_details/')); ?>",
            data: { so_no : so_no },
           success: function(data) {
            console.log(data);
            var result=JSON.parse(data);
          $('.taxable_value').text(result.item_amount_sum);
          $('.tax_value').text(result.item_gst_rs_sum);
          $('.invoice_value').text(result.item_net_value_sum);
          $('#so_date').val(result.date_so);
          if(result.sales_type == 1)
          {
           $('.sales_type').text('Cash Sale'); 
          }
          else
          {
            $('.sales_type').text('Credit Sale'); 
          }
          

            
           }
        });
}




</script>
<script type="text/javascript">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" rel="stylesheet"/>
<script src="jquery.ui.position.js"></script>
</script>

<style type="text/css">
  .ui-dialog.ui-widget-content { background: #a3d072; }
</style>


    </div>
    <!-- card body end@ -->
  </div>
</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ns_pollachi\resources\views/admin/sales_gatepass/add.blade.php ENDPATH**/ ?>