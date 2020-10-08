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
          <h3>Purchase Entry</h3>
        </div>
        <div class="col-8 mr-auto">
          <ul class="h-right-btn mb-0 pl-0">
            <li><button type="button" class="btn btn-success"><a href="<?php echo e(route('purchase.index')); ?>">Back</a></button></li>
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
    
      

        <!-- <div class="form-row">
          <div class="col-md-3">
            <div class="form-group row">
              <label for="voucher_no" class="col-sm-5 col-form-label">Voucher No </label>
              <div class="col-sm-7">
                <input type="text" class="form-control voucher_no only_allow_alp_num_dot_com_amp" placeholder="Voucher No" name="voucher_no" value="<?php echo e(old('voucher_no')); ?>" required>
                <span class="mandatory"> <?php echo e($errors->first('voucher_no')); ?> </span>
                <div class="invalid-feedback">
                  Enter valid Voucher No
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-3">
            <div class="form-group row">
              <label for="voucher_no" class="col-sm-5 col-form-label">Voucher Date </label>
              <div class="col-sm-7">
                <input type="text" class="form-control voucher_no only_allow_alp_num_dot_com_amp" placeholder="Voucher Date" name="voucher_no" value="<?php echo e(old('voucher_no')); ?>" required>
                <span class="mandatory"> <?php echo e($errors->first('voucher_no')); ?> </span>
                <div class="invalid-feedback">
                  Enter valid Voucher No
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-3">
            <div class="form-group row">
              <label for="voucher_no" class="col-sm-5 col-form-label">Gatepass No </label>
              <div class="col-sm-7">
                <input type="text" class="form-control voucher_no only_allow_alp_num_dot_com_amp" placeholder="Gatepass No" name="voucher_no" value="<?php echo e(old('voucher_no')); ?>" required>
                <span class="mandatory"> <?php echo e($errors->first('voucher_no')); ?> </span>
                <div class="invalid-feedback">
                  Enter valid Voucher No
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-3">
            <div class="form-group row">
              <label for="voucher_no" class="col-sm-5 col-form-label">Receipt Note No.</label>
              <div class="col-sm-7">
                <input type="text" class="form-control voucher_no only_allow_alp_num_dot_com_amp" placeholder="Receipt Note No." name="voucher_no" value="<?php echo e(old('voucher_no')); ?>" required>
                <span class="mandatory"> <?php echo e($errors->first('voucher_no')); ?> </span>
                <div class="invalid-feedback">
                  Enter valid Voucher No
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-3">
            <div class="form-group row">
              <label for="voucher_no" class="col-sm-5 col-form-label">Supplier Invoice No</label>
              <div class="col-sm-7">
                <input type="text" class="form-control voucher_no only_allow_alp_num_dot_com_amp" placeholder="Supplier Invoice No" name="voucher_no" value="<?php echo e(old('voucher_no')); ?>" required>
                <span class="mandatory"> <?php echo e($errors->first('voucher_no')); ?> </span>
                <div class="invalid-feedback">
                  Enter valid Voucher No
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-3">
            <div class="form-group row">
              <label for="voucher_no" class="col-sm-5 col-form-label">Supplier Invoice Date</label>
              <div class="col-sm-7">
                <input type="text" class="form-control voucher_no only_allow_alp_num_dot_com_amp" placeholder="Supplier Invoice Date" name="voucher_no" value="<?php echo e(old('voucher_no')); ?>" required>
                <span class="mandatory"> <?php echo e($errors->first('voucher_no')); ?> </span>
                <div class="invalid-feedback">
                  Enter valid Voucher No
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-3">
            <div class="form-group row">
              <label for="voucher_no" class="col-sm-5 col-form-label">Supplier Details</label>
              <div class="col-sm-7">
                <select class="js-example-basic-multiple col-12 custom-select bank_id" name="bank_id" required>
                  <option value="">Choose Supplier</option>
                </select>
                <span class="mandatory"> <?php echo e($errors->first('voucher_no')); ?> </span>
                <div class="invalid-feedback">
                  Enter valid Voucher No
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-3">
            <div class="form-group row">
              <label for="voucher_no" class="col-sm-5 col-form-label">Order Details</label>
              <div class="col-sm-7">
                <input type="text" class="form-control voucher_no only_allow_alp_num_dot_com_amp" placeholder="Order Details" name="voucher_no" value="<?php echo e(old('voucher_no')); ?>" required>
                <span class="mandatory"> <?php echo e($errors->first('voucher_no')); ?> </span>
                <div class="invalid-feedback">
                  Enter valid Voucher No
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-3">
            <div class="form-group row">
              <label for="voucher_no" class="col-sm-5 col-form-label">Transport Details</label>
              <div class="col-sm-7">
                <input type="text" class="form-control voucher_no only_allow_alp_num_dot_com_amp" placeholder="Transport Details" name="voucher_no" value="<?php echo e(old('voucher_no')); ?>" required>
                <span class="mandatory"> <?php echo e($errors->first('voucher_no')); ?> </span>
                <div class="invalid-feedback">
                  Enter valid Voucher No
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-3">
            <div class="form-group row">
              <label for="voucher_no" class="col-sm-5 col-form-label">Supplier Invoice Value</label>
              <div class="col-sm-7">
                <input type="text" class="form-control voucher_no only_allow_alp_num_dot_com_amp" placeholder="Supplier Invoice Value" name="voucher_no" value="<?php echo e(old('voucher_no')); ?>" required>
                <span class="mandatory"> <?php echo e($errors->first('voucher_no')); ?> </span>
                <div class="invalid-feedback">
                  Enter valid Voucher No
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-3">
            <div class="form-group row">
              <label for="voucher_no" class="col-sm-5 col-form-label">Remarks</label>
              <div class="col-sm-7">
                <input type="text" class="form-control voucher_no only_allow_alp_num_dot_com_amp" placeholder="Remarks" name="voucher_no" value="<?php echo e(old('voucher_no')); ?>" required>
                <span class="mandatory"> <?php echo e($errors->first('voucher_no')); ?> </span>
                <div class="invalid-feedback">
                  Enter valid Voucher No
                </div>
              </div>
            </div>
          </div>
</div> -->
<!-- <h3 class="py-2 font-weight-bold h3-i">Item Details</h3> -->


<style type="text/css">
  #middlecol {
   
    width: 45%;
  }

  #middlecol table {
    max-width: 99%;
    width: 100% !important;
  }
</style>


<!-- <form  method="post" class="form-horizontal" action="<?php echo e(route('purchase.store')); ?>" id="dataInput" enctype="multipart/form-data">
      <?php echo e(csrf_field()); ?>


      
                       <div class="row col-md-12">

                                <div class="col-md-2">
                                  <label style="font-family: Times new roman;">Voucher No</label><br>
                                <input type="text" readonly="" class="form-control proof_file  required_for_proof_valid" id="voucher_no" placeholder="Auto Generate Voucher No" name="voucher_no" value="">
                                 
                                </div>

                                <div class="col-md-2">
                                  <label style="font-family: Times new roman;">Voucher Date</label><br>
                                <input type="date" class="form-control voucher_date  required_for_proof_valid" id="voucher_date" placeholder="Voucher Date" name="voucher_date" value="">
                                 
                                </div>
                                <div class="col-md-2">
                                  <label style="font-family: Times new roman;">Gate Pass No</label><br>
                                <select class="js-example-basic-multiple form-control gatepass_no" 
                                data-placeholder="Choose Gate Pass No" required="" id="gatepass_no" onchange="gatepass()" name="gatepass_no" >
                                <option value=""></option>
                                    <?php $__currentLoopData = $gatepass_no; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gatepass): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($gatepass->id); ?>"><?php echo e($gatepass->gate_pass_no); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                 </select>
                                 
                                </div>
                                <div class="col-md-2">
                                  <label style="font-family: Times new roman;">Receipt Note No</label><br>
                                <input type="text" class="form-control receipt_note_no  required_for_proof_valid" readonly="" id="receipt_note_no" placeholder="Receipt Note No" name="receipt_note_no" value="">
                                 
                                </div>

                                <div class="col-md-2">
                                  <label style="font-family: Times new roman;">Supplier Invoice No</label><br>
                                <input type="text" readonly="" class="form-control supplier_invoice_no  required_for_proof_valid" id="supplier_invoice_no" placeholder="Supplier Invoice No" name="supplier_invoice_no" value="">
                                 
                                </div>

                                <div class="col-md-2">
                                  <label style="font-family: Times new roman;">Supplier Invoice Date</label><br>
                                <input type="date" readonly="" class="form-control supplier_invoice_date  required_for_proof_valid" id="supplier_invoice_date" placeholder="Supplier Invoice Date" name="supplier_invoice_date" value="">
                                 
                                </div>
                              </div>

                              <div class="row col-md-12">

                                <div class="col-md-2">
                                  <label style="font-family: Times new roman;">Supplier Details</label><br>
                                <input type="text" readonly="" class="form-control supplier_details  required_for_proof_valid" id="supplier_details" placeholder="Supplier Details" name="supplier_details" value="">
                                 
                                </div>

                                <div class="col-md-2">
                                  <label style="font-family: Times new roman;">Order Details</label><br>
                                <input type="text" class="form-control order_details  required_for_proof_valid" id="order_details" placeholder="Order Details" name="order_details" value="">
                                 
                                </div>

                                <div class="col-md-2">
                                  <label style="font-family: Times new roman;">Transport Details</label><br>
                                <input type="text" class="form-control transport_details  required_for_proof_valid" id="transport_details" placeholder="Transport Details" name="transport_details" value="">
                                 
                                </div>

                                <div class="col-md-2">
                                  <label style="font-family: Times new roman;">Remarks</label><br>
                                <input type="text" class="form-control remarks  required_for_proof_valid" id="remarks" placeholder="Remarks" name="remarks" value="">
                                 
                                </div>

                                <div class="col-md-2">
                                  <label style="font-family: Times new roman;">Supplier Invoice Value</label><br>
                                <input type="text" readonly="" class="form-control supplier_invoice_value  required_for_proof_valid" id="supplier_invoice_value" placeholder="Supplier Invoice Value" name="supplier_invoice_value" value="">
                                 
                                </div>
                              </div><br>
    
      <div class="col-md-8">
                       <div class="form-group row">
                       <div class="col-md-4">
                       <label for="validationCustom01" class=" col-form-label"><h4>Item Details:</h4> </label><br>
                       
                           
                       </div>
                         </div>
              </div>

      <div class="row col-md-12">
        <div class="col-md-2">
          <label style="font-family: Times new roman;">Invoice No</label>
        <input type="text" class="form-control invoice_sno  required_for_proof_valid" placeholder="Invoice S.no" id="invoice_sno" name="invoice_sno" value="">
         
        </div>

        <div class="col-md-2">
          <label style="font-family: Times new roman;">Item Code</label>
              <select class="js-example-basic-multiple form-control" 
              data-placeholder="Choose Item Code" id="items_codes" onchange="item_codes()" name="item_code" >
              <option value=""></option>
                  <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <option value="<?php echo e($item->id); ?>"><?php echo e($item->code); ?></option>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
               </select>
               
              </div>
              
                      <div class="cat" id="cat" style="display: none;" title="Choose Category">
                        
                        <select class="js-example-basic-multiple form-control categories" id="categories" name="category" style="width: 100%;" style="margin-left: 50%;" data-placeholder="Choose Category" onchange="categories_check()">
                          <option></option>
                          <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <option value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                      </div>
                      <div class="col-md-2">
                        <label><font color="white" style="font-family: Times new roman;">Item Code</font></label><br>
                      <input type="button" onclick="find_cat()" class="btn btn-info" value="Find" name="" id="find">
                    </div>
                    <div class="col-md-2">
                      <label style="font-family: Times new roman;">Item Name</label>
                      <input type="text" class="form-control item_name  required_for_proof_valid" id="item_name" placeholder="Item Name" name="item_name" readonly="" id="item_name" value="">
                    </div>
                    <div class="col-md-2">
                      <label style="font-family: Times new roman;">MRP</label>
                      <input type="text" class="form-control mrp required_for_proof_valid" readonly="" placeholder="MRP" id="mrp" name="mrp" value="">
                       
                      </div>
                      <div class="col-md-2">
                      <label style="font-family: Times new roman;">HSN</label>
                      <input type="text" class="form-control hsn  required_for_proof_valid" readonly="" placeholder="HSN" id="hsn" name="hsn" value="">
                       
                      </div>
                    </div>
                      <div class="row col-md-12" >
                      <div class="col-md-2">
                        <label style="font-family: Times new roman;">Quantity</label>
                      <input type="text" class="form-control quantity only_allow_digit required_for_proof_valid" id="quantity"  placeholder="Quantity" name="quantity" pattern="[0-9]{0,100}" title="Numbers Only" value="">
                      </div>
                      <div class="col-md-2">
                        <label style="font-family: Times new roman;">Tax Rate%</label>
                      <input type="text" class="form-control tax_rate  required_for_proof_valid" readonly="" placeholder="Tax Rate%" name="tax_rate" value="" id="tax_rate">
                      </div>
                      <div class="col-md-2" style="margin-top: 5px;">
                        <label style="font-family: Times new roman;">Tax Exclusive/Inclusive</label><br>
                      <input type="radio"  onclick="calc_tax1()" checked="" name="tax" id="tax"  value="1">
                      <label style="font-family: Times new roman;">Exclusive</label>&nbsp;&nbsp;
                    
                      <input type="radio"  onclick="calc_tax()" name="tax" id="tax1" value="0">
                      <label style="font-family: Times new roman;">Inclusive</label>
                      </div>

                      <div class="col-md-2" id="rate_exclusive">
                        <label style="font-family: Times new roman;">Rate Exclusive Tax</label>
                      <input type="text" class="form-control exclusive" id="exclusive" placeholder="Exclusive Tax" style="margin-right: 80px;" onchange="calc()" name="exclusive" pattern="[0-9][0-9 . 0-9]{0,100}" title="Numbers Only" value="">
                      </div>
                      <div class="col-md-2"  id="rate_inclusive">
                        <label style="font-family: Times new roman;">Rate Inclusive Tax</label>
                      <input type="text" readonly="" class="form-control inclusive" id="inclusive" placeholder="Inclusive Tax" onchange="calc()" name="inclusive" pattern="[0-9][0-9 . 0-9]{0,100}" title="Numbers Only" value="">
                      </div>
                      <div class="col-md-2">
                        <label style="font-family: Times new roman;">Amount</label>
                        <input type="text" readonly="" class="form-control amount  required_for_proof_valid" placeholder="Amount" id="amount" pattern="[0-9][0-9 . 0-9]{0,100}" title="Numbers Only" name="amount" value="" >
                        </div>
                        <div class="col-md-2">
                          <label style="font-family: Times new roman;">Discount</label>
                        <input type="text" class="form-control discount  required_for_proof_valid" placeholder="Discount" id="discount" pattern="[0-9][0-9 . 0-9]{0,100}" title="Numbers Only" onchange="discount_calc()" name="discount" value="" >
                        </div>
                        <div class="col-md-2">
                          <label style="font-family: Times new roman;">Net Price</label>
                        <input type="text" class="form-control net_price  required_for_proof_valid" readonly="" id="net_price" placeholder="Net Price" pattern="[0-9][0-9 . 0-9]{0,100}" title="Numbers Only" name="net_price" value="">
                         
                        </div>
                      </div>
                                                          
                     <div class="" align="center">
                                   
                    <input type="button" class="btn btn-success add_items" value="Add" name="" id="add_items0">    
                     </div> <br>              
                   
<style>
table, th, td {
  border: 1px solid #E1E1E1;
}
</style>
<div class="form-row">
             
              <div class="col-md-12" id="middlecol">
                
                <table class="table" id="team-list">
                  <thead>
                    <th> S.no </th>
                    <th> Invoice S.no </th>
                    <th> Item Code</th>
                    <th> Item Name</th>
                    <th> MRP</th>
                    <th> HSN</th>
                    <th> Quantity</th>
                    <th> Tax Rate%</th>
                    <th> Rate Exclusive</th>
                    <th> Rate Inclusive</th>
                    <th> Amount</th>
                    <th> Discount</th>
                    <th> Net Price</th>
                    <th>Action </th>
                  </thead>
                  <tbody class="append_proof_details" id="mytable">
                    
                            <input type="hidden" name="counts" value="" id="counts">
                            <input type="hidden" name="total_amount" value="0" id="total_amount">
                            <input type="hidden" name="total_price" value="0" id="total_price">

                  </tbody>
                  <tfoot>
                    <tr>
                      
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th><label class="total_amount"></label></th>
                      <th></th>
                      <th><label class="total_net_price"></label></th>
                      <th></th>
                    </tr>
                  </tfoot>

                </table>
                
                       </div>

                       <div class="col-md-7 text-right">
          <input type="submit" class="btn btn-success save" style="margin-bottom: 150px;" name="save">
        </div>
      </form> -->
                       
        <script type="text/javascript">
          var i=0;

function calculate_total_net_price(){
  var total_net_price=0;
  $(".table_net_price").each(function(){
    total_net_price=parseFloat(total_net_price)+parseFloat($(this).val());
  });
  return total_net_price;
}
function calculate_total_amount(){
  var total_amount=0;
  $(".table_amount").each(function(){
    total_amount=parseFloat(total_amount)+parseFloat($(this).val());
  });
  return total_amount;
}
function add_items()
{
  var j=$('#mytable tr:last').attr('class');
 var l=parseInt(i)+1;
 var gatepass_no=$('.gatepass_no').val();
 var voucher_date=$('.voucher_date').val();
 var receipt_note_no=$('.receipt_note_no').val();
 var supplier_invoice_no=$('.supplier_invoice_no').val();
 var supplier_invoice_date=$('.supplier_invoice_date').val();
 var supplier_details=$('.supplier_details').val();
 var order_details=$('.order_details').val();
 var transport_details=$('.transport_details').val();
 var remarks=$('.remarks').val();
 var supplier_invoice_value=$('.supplier_invoice_value').val();
 var invoice_no=$('.invoice_sno').val();
 var item_code=$("#items_codes option:selected");
 var item_code=item_code.text();
 var items_codes=$('#items_codes').val();
 var item_name=$('.item_name').val();
 var mrp=$('.mrp').val();
 var hsn=$('.hsn').val();
 var quantity=$('.quantity').val();
 var tax_rate=$('.tax_rate').val();
 var exclusive=$('.exclusive').val();
 var inclusive=$('.inclusive').val();
 var amount=$('.amount').val();
 var discount=$('.discount').val();
 var net_price=$('.net_price').val();
 if(exclusive == '')
 {
  var exclusive=0;
 }
 if(inclusive == '')
 {
  var inclusive=0;
 }
 if(discount == '')
 {
  var discount=0;
 }
 if(amount == '')
 {
  var amount=0;
 }
 if(net_price == '')
 {
  var net_price=0;
 }

 if(gatepass_no == '' || items_codes == '' || invoice_no == '' || quantity == '' || amount == '' || net_price == '')
 {
  alert('Please Fill All The Input Fields');
 }

 else
 {
 
  var items='<tr id="row'+i+'" class="'+i+' tables"><td><span class="bank_s_no"> 1 </span></td><td><div class="form-group row"><div class="col-sm-12"><input class="invoice_no'+i+'" type="hidden" id="invoice'+i+'" value="'+invoice_no+'" name="invoice_sno[]">'+invoice_no+'</div></div></td><td><div class="form-group row"><div class="col-sm-12"><input type="hidden" value="'+items_codes+'" name="item_code[]">'+item_code+'</div></div></td><td><div class="form-group row"><div class="col-sm-12"><input type="hidden" value="'+item_name+'" name="item_name[]">'+item_name+'</div></div></td><td><div class="form-group row"><div class="col-sm-12"><input type="hidden" value="'+mrp+'" name="mrp[]">'+mrp+'</div></div></td><td><div class="form-group row"><div class="col-sm-12"><input type="hidden" value="'+hsn+'" name="hsn[]">'+hsn+'</div></div></td><td><div class="form-group row"><div class="col-sm-12"><input type="hidden" value="'+quantity+'" name="quantity[]">'+quantity+'</div></div></td><td><div class="form-group row"><div class="col-sm-12"><input type="hidden" value="'+tax_rate+'" name="tax_rate[]">'+tax_rate+'</div></div></td><td><div class="form-group row"><div class="col-sm-12" id="rate_exclusive"><input type="hidden" value="'+exclusive+'" name="exclusive[]">'+exclusive+'</div></div></td><td><div class="form-group row"><div class="col-sm-12"  id="rate_inclusive"><input type="hidden" value="'+inclusive+'" name="inclusive[]">'+inclusive+'</div></div></td><td><div class="form-group row"><div class="col-sm-12"><input type="hidden" class="table_amount" value="'+amount+'" name="amount[]">'+amount+'</div></div></td><td><div class="form-group row"><div class="col-sm-12"><input type="hidden" value="'+discount+'" name="discount[]">'+discount+'</div></div></td><td><div class="form-group row"><div class="col-sm-12"><input type="hidden" class="table_net_price" value="'+net_price+'" name="net_price[]">'+net_price+'</div></div></td><td><div class="form-group row"><div class="col-sm-3"><input type="button" class="btn btn-danger remove_items"  id="'+i+'" value="-" name=""></div></div></td></tr>'

  $('.append_proof_details').append(items);
var length=$('#mytable tr:last').attr('class').split(' ')[0];

for(var m=0;m<length+1;m++)
{

  var invoice_num = $('#invoice'+m).val();
  
  for(var n=m+1;n<=length+1;n++)
  {
    
    if(typeof $('#invoice'+n).val() == 'undefined')
    {

    }
    else
    {
      var invoice_num1 = $('#invoice'+n).val();

      if(invoice_num == invoice_num1)
      {
        alert('Invoice Number is Alredy Taken!');
        $('#row'+i).remove();
      }
      else
      {
        
      }
    }
  }
}

var total_net_price=calculate_total_net_price();
var total_amount=calculate_total_amount();
$("#total_price").val(total_net_price);
$("#total_amount").val(total_amount);

$(".total_net_price").html(parseFloat(total_net_price));
$(".total_amount").html(parseFloat(total_amount));
 var len=$('.tables').length;
$('#counts').val(len);
i++;

var array=[gatepass_no,invoice_no,items_codes,item_name,mrp,hsn,quantity,tax_rate,exclusive,
          inclusive,amount,discount,net_price];

var array_new=[voucher_date,receipt_note_no,supplier_invoice_no,supplier_invoice_date,
              supplier_details,order_details,transport_details,remarks,supplier_invoice_value];

$.ajax({
           type: "GET",
            url: "<?php echo e(url('purchase/get_items/{id}')); ?>",
            data: { id: len },
           success: function(data) {
             // console.log(data);
             $('#items_codes').children('option:not(:first)').remove();
             for (var k=0; k < data.length; k++)
            {
             name =data[k].name;
             code =data[k].code;
             id =data[k].id;
              names = name.replace('','');
              codes = code.replace('','');
              
              var div_data="<option value="+id+">"+codes+"</option>";
                
                $(div_data).appendTo('#items_codes');

            }
           }
           
        });

$.ajax({
           type: "POST",
            url: "<?php echo e(url('purchase/storedata/')); ?>",
            data: { array: array, array_new: array_new },
           success: function(data) {
             // console.log(data);
             
           }
        });

$('#cat').hide();
$('.invoice_sno').val('');
$('.items_codes').val('');
$('.item_name').val('');
$('.mrp').val('');
$('.hsn').val('');
$('.quantity').val('');
$('.tax_rate').val('');
$('.exclusive').val('');
$('.inclusive').val('');
$('.amount').val('');
$('.discount').val('');
$('.net_price').val('');
$('#tax').val('');
$('#tax1').val('');

}
} 
$(document).on("click",".add_items",function(){
    add_items();
    bank_details_sno();

  });

$(document).on("click",".remove_items",function(){
  

       var button_id = $(this).attr("id");
       var invoice_no=$('.invoice_no'+button_id).val();
       var gatepass_no=$('.gatepass_no').val();
       $('#row'+button_id).remove();
       
       var counts = $('#counts').val();
       $('#counts').val(counts-1); 
       bank_details_sno();
       //--i;
    var total_net_price=calculate_total_net_price();

    $(".total_net_price").html(parseFloat(total_net_price));

    var total_amount=calculate_total_amount();
    $(".total_amount").html(parseFloat(total_amount));

    $("#total_price").val(total_net_price);
    $("#total_amount").val(total_amount);

    $.ajax({
           type: "POST",
            url: "<?php echo e(url('purchase/remove_data/')); ?>",
            data: { invoice_no: invoice_no, gatepass_no: gatepass_no },
           success: function(data) {
             // console.log(data);
             
           }
        });
  
});

function bank_details_sno(){
  $(".bank_s_no").each(function(key,index){
      $(this).html((key+1));
    });
}


  $("form").submit(function(e){
  if($('#total_amount').val() == 0)
  {
    alert('There Is No Row To Submit');
    e.preventDefault();
  }
  else
  {

  }    
    });

function total_amounts()
{
  
  
  var sum=0;
  var count=$('#mytable tr:last').attr('class').split(' ')[0];
  
  
  for(i=0;i<=count;i++)
  {
    $('#amount')
    var tot_amnt=$('#amount'+i).val();
     if(tot_amnt == '')
     {
      
     }
     else
     {
     if(typeof $('#amount'+i).val() == 'undefined')
     {

     }
     else
     {
      sum=parseFloat(tot_amnt)+parseFloat(sum);
      
     }
    
    }
    
  }
  $('#total_amount').val(sum);
}

function total_net_price()
{
  
  var sum=0;
  var count=$('#mytable tr:last').attr('class').split(' ')[0];
  
  for(i=0;i<=count;i++)
  {
    var tot_amnt=$('#net_price'+i).val();
     if(tot_amnt == '')
     {
      
     }
     else
     {
     if(typeof $('#net_price'+i).val() == 'undefined')
     {

     }
     else
     {
      sum=parseFloat(tot_amnt)+parseFloat(sum);
      
     }
    
    }
    
  }
  $('#total_price').val(sum);
}


function calc()
{
  var quantity = $('#quantity').val();
  var rate_exclusive = $('#exclusive').val();
  var rate_inclusive = $('#inclusive').val();

  if (quantity == '') 
  {
    alert('Please Enter Quantity First');
    $('#exclusive').val('');
    $('#inclusive').val('');
    $('#quantity').focus();
  }
  else
  {
    if(rate_exclusive)
    {
      var total = parseInt(quantity)*parseFloat(rate_exclusive);
    }
    else
    {
      var total = parseInt(quantity)*parseFloat(rate_inclusive);
    }
    
    $('#amount').val(total.toFixed(2));
    $('#net_price').val(total.toFixed(2));
  }
}

function calc_tax()
{
  
  $("#exclusive").attr('readonly','readonly');
  $("#inclusive").removeAttr('readonly');
  $("#inclusive").focus();
  $("#exclusive").val('');
  $("#amount").val('');
  $("#net_price").val('');
  $("#discount").val('');
  
}

function calc_tax1()
{
  
  
  $("#exclusive").removeAttr('readonly');
  $("#inclusive").attr('readonly','readonly');
  $("#exclusive").focus();
  $("#inclusive").val('');
  $("#amount").val('');
  $("#net_price").val('');
  $("#discount").val('');
}

function discount_calc()
{
  var discount = $("#discount").val();
  var amount = $("#amount").val();
  var quantity = $("#quantity").val();
  var exclusive = $("#exclusive").val();
  var inclusive = $("#inclusive").val();

  if ($("#tax").prop("checked")) 
  {
   if(exclusive == '' || quantity == '')
   {
    alert('Please Fill Above Boxes');
    $("#discount").val('');
   }
   else
  {
    $(".net_price").val((parseFloat(amount)-parseFloat(discount)).toFixed(2));
  }
  }
  if ($("#tax1").prop("checked")) 
  {
   if(inclusive == '' || quantity == '')
   {
    alert('Please Fill Above Boxes');
    $("#discount").val('');
   }
   else
  {
    $(".net_price").val((parseFloat(amount)-parseFloat(discount)).toFixed(2));
  }
  }
  
  
}

function item_codes()
{

var item_code=$('#items_codes').val();
var row_id=$('#last').val();

      $.ajax({  
        
        type: "GET",
        url: "<?php echo e(url('purchase/getdata/{id}')); ?>",
        data: { id: item_code },             
                        
        success: function(data){ 
       
             name =data[0].name;
             code =data[0].code;
             mrp =data[0].mrp;
             hsn =data[0].hsn;
             igst =data[1].igst;
          
                       
             $('#item_codes').val(code);
            $('#item_name').val(name);
             $('#mrp').val(mrp);
             $('#hsn').val(hsn);
             $('#tax_rate').val(igst);
             $('#quantity').focus();
             $('#cat').hide();
        }

    });

}


function find_cat()
{
  
  $('#cat').show();
  $('#cat').dialog();
  $('.categories').focus();

}

function categories_check()
{
  var  categories=$('#categories').val();
  $.ajax({  
        
        type: "GET",
        url: "<?php echo e(url('purchase/change_items/{id}')); ?>",
        data: { id: categories },             
             
        success: function(data){ 
         
        $('#items_codes').children('option:not(:first)').remove();                  
            for (var i=0; i < data.length; i++)
            {
             name =data[i].name;
             code =data[i].code;
             id=data[i].id;
              names = name.replace('','');
              codes = code.replace('','');
              
              var div_data="<option value="+id+">"+codes+"</option>";
                
                $(div_data).appendTo('#items_codes');

            }
            $(".cat").dialog('close');
            $("#items_codes").focus();
        }


    });
}

function gatepass()
{
  var gatepass_no=$('.gatepass_no').val();
 
  $.ajax({
           type: "POST",
            url: "<?php echo e(url('purchase/gatepass_details/')); ?>",
            data: { gatepass_no : gatepass_no },
           success: function(data) {
              
              $('.supplier_invoice_no').val(data.supplier_invoice_number);
              $('.supplier_invoice_date').val(data.date);
              $('.supplier_details').val(data.name);
              $('.supplier_invoice_value').val(data.total_invoice_value);
              $('.receipt_note_no').val(data.supplier_delivery_number);
              
             
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


<!-- <div class="form-row">
  <div class="col-md-3">
    <div class="form-group row">
      <label for="voucher_no" class="col-sm-5 col-form-label">Item Code </label>
      <div class="col-sm-7">
        <input type="text" class="form-control voucher_no only_allow_alp_num_dot_com_amp" placeholder="item Code" name="voucher_no" value="<?php echo e(old('voucher_no')); ?>" required>
        <span class="mandatory"> <?php echo e($errors->first('voucher_no')); ?> </span>
        <div class="invalid-feedback">
          Enter valid Voucher No
        </div>
      </div>
    </div>
  </div>

  <div class="col-md-3">
    <div class="form-group row">
      <label for="voucher_no" class="col-sm-5 col-form-label">Item Name </label>
      <div class="col-sm-7">
        <input type="text" class="form-control voucher_no only_allow_alp_num_dot_com_amp" placeholder="Item Name" name="voucher_no" value="<?php echo e(old('voucher_no')); ?>" required>
        <span class="mandatory"> <?php echo e($errors->first('voucher_no')); ?> </span>
        <div class="invalid-feedback">
          Enter valid Voucher No
        </div>
      </div>
    </div>
  </div>

  <div class="col-md-3">
    <div class="form-group row">
      <label for="voucher_no" class="col-sm-5 col-form-label">Mrp </label>
      <div class="col-sm-7">
        <input type="text" class="form-control voucher_no only_allow_alp_num_dot_com_amp" placeholder="MRP" name="voucher_no" value="<?php echo e(old('voucher_no')); ?>" required>
        <span class="mandatory"> <?php echo e($errors->first('voucher_no')); ?> </span>
        <div class="invalid-feedback">
          Enter valid Voucher No
        </div>
      </div>
    </div>
  </div>

  <div class="col-md-3">
    <div class="form-group row">
      <label for="voucher_no" class="col-sm-5 col-form-label">Qty</label>
      <div class="col-sm-7">
        <input type="text" class="form-control voucher_no only_allow_alp_num_dot_com_amp" placeholder="Qty" name="voucher_no" value="<?php echo e(old('voucher_no')); ?>" required>
        <span class="mandatory"> <?php echo e($errors->first('voucher_no')); ?> </span>
        <div class="invalid-feedback">
          Enter valid Voucher No
        </div>
      </div>
    </div>
  </div>

  <div class="col-md-3">
    <div class="form-group row">
      <label for="voucher_no" class="col-sm-5 col-form-label">Tax Rate % </label>
      <div class="col-sm-7">
        <input type="text" class="form-control voucher_no only_allow_alp_num_dot_com_amp" placeholder="Tax Rate % " name="voucher_no" value="<?php echo e(old('voucher_no')); ?>" required>
        <span class="mandatory"> <?php echo e($errors->first('voucher_no')); ?> </span>
        <div class="invalid-feedback">
          Enter valid Voucher No
        </div>
      </div>
    </div>
  </div>

  <div class="col-md-3">
    <div class="form-group row">
      <label for="voucher_no" class="col-sm-5 col-form-label">Rate (Inclusive Tax)</label>
      <div class="col-sm-7">
        <input type="text" class="form-control voucher_no only_allow_alp_num_dot_com_amp" placeholder="Rate (Inclusive Tax)" name="voucher_no" value="<?php echo e(old('voucher_no')); ?>" required>
        <span class="mandatory"> <?php echo e($errors->first('voucher_no')); ?> </span>
        <div class="invalid-feedback">
          Enter valid Voucher No
        </div>
      </div>
    </div>
  </div>

  <div class="col-md-3">
    <div class="form-group row">
      <label for="voucher_no" class="col-sm-5 col-form-label">Rate (Exclusive Tax)</label>
      <div class="col-sm-7">
        <input type="text" class="form-control voucher_no only_allow_alp_num_dot_com_amp" placeholder="Rate (Exclusive Tax)" name="voucher_no" value="<?php echo e(old('voucher_no')); ?>" required>
        <span class="mandatory"> <?php echo e($errors->first('voucher_no')); ?> </span>
        <div class="invalid-feedback">
          Enter valid Voucher No
        </div>
      </div>
    </div>
  </div>


  <div class="col-md-3">
    <div class="form-group row">
      <label for="voucher_no" class="col-sm-5 col-form-label">Discount</label>
      <div class="col-sm-7">
        <input type="text" class="form-control voucher_no only_allow_alp_num_dot_com_amp" placeholder="Discount" name="voucher_no" value="<?php echo e(old('voucher_no')); ?>" required>
        <span class="mandatory"> <?php echo e($errors->first('voucher_no')); ?> </span>
        <div class="invalid-feedback">
          Enter valid Voucher No
        </div>
      </div>
    </div>
  </div>

  
  <div class="col-md-3">
    <div class="form-group row">
      <label for="voucher_no" class="col-sm-5 col-form-label">Amount</label>
      <div class="col-sm-7">
        <input type="text" class="form-control voucher_no only_allow_alp_num_dot_com_amp" placeholder="Amount" name="voucher_no" value="<?php echo e(old('voucher_no')); ?>" required>
        <span class="mandatory"> <?php echo e($errors->first('voucher_no')); ?> </span>
        <div class="invalid-feedback">
          Enter valid Voucher No
        </div>
      </div>
    </div>
  </div>

  <div class="col-md-3 text-left">
    <button class="btn btn-success" name="add" type="submit">Add</button>
  </div>
</div> -->

<!-- <div class="row">
    <div class="col-md-12">
<div class="form-row custom-table">
               <table class="table table-bordered " style="margin-top: 20px;">
                  <thead class="thead-gray"> -->
                  <!-- <tr>
                        <th class="text-center" rowspan="1" colspan="10">Common</th>
                     </tr> -->
                     <!-- <tr>
                        <th class="text-center">S.No</th>
                        <th class="text-center">Item Code</th>
                        <th class="text-center">Description</th>
                        <th class="text-center">Rate Rs.</th>
                        <th class="text-center">Qty</th> -->
                        <!-- <th class="text-center">UOM</th> -->
                        <!-- <th class="text-center">Rate </th> -->
<!--                         <th class="text-center">Amount</th>
                        <th class="text-center">Discount</th>
                        <th class="text-center">Tax Rs.</th>
                        <th class="text-center">Net Value</th>
                        <th class="text-center">Action</th>
                     </tr>
                  </thead>

                  <tfoot class="thead-gray">
                    <tr>
                      <th class="text-right" colspan="6">Total</th>
                      <th class="text-center"></th>
                      <th class="text-center"></th>
                      <th class="text-center"></th>
                      <th class="text-center" colspan="2"></th>
                    
                   </tr>
                    </tfoot>
                  <tbody class="append_barcode_dets">
                    <?php for($i=0;$i<10;$i++) {?>
                     <tr>
                     <td> <?php echo e($i+1); ?> </td>
                       <td></td>
                       <td></td>
                       <td></td>
                       <td></td>
                       <td></td>
                       <td></td>
                       <td></td>
                       <td></td>
                       <td></td>
                     </tr>
                    <?php } ?>
                
                     
                  </tbody>
                 
               </table>
            </div>
            </div>

            <div class="col-md-5">
              <div class="form-row custom-table price-tbl">
                <table class="table table-bordered table-responsive">
                    <tr class="thead-gray">
                      <th rowspan="1" colspan="6">Price Level</th>
                      <th rowspan="1" colspan="2">%</th>
                      <th rowspan="1" colspan="2">Rate</th>
                    </tr>
                    <tr>
                      <th>S.No</th>
                      <th class="cus-wd">Item Name</th>
                      <th class="cus-wd">Purchase Cost</th>
                      <th>MRP</th>
                      <th class="cus-wd">Last Purchase Rate(LPR)</th>
                      <th class="cus-wd">Updated Sales Price</th>
                      <th>Markup</th>
                      <th>MarkDown</th>
                      <th>Markup</th>
                      <th>MarkDown</th>
                    </tr>
                    <tbody>
                      <tr>
                        <td>1</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                      </tr>
                      <tr>
                        <td>2</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                      </tr>
                      <tr>
                        <td>3</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                      </tr>
                      <tr>
                        <td>4</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                      </tr>
                      <tr>
                        <td>5</td>
                        <td></td>
                        <td></td>
                        <td></td>
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
            </div>
</div> -->


        

    </div>
    <!-- card body end@ -->
  </div>
</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ns_pollachi\resources\views/admin/purchase/add.blade.php ENDPATH**/ ?>