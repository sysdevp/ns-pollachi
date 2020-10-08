<?php $__env->startSection('content'); ?>
<div class="col-12 body-sec">
  <div class="card container px-0">
    <!-- card header start@ -->
    <div class="card-header px-2">
      <div class="row">
        <div class="col-4">
          <h3>View Delivery Note Details</h3>
        </div>
        <div class="col-8 mr-auto">
          <ul class="h-right-btn mb-0 pl-0">
            <li><button type="button" class="btn btn-success"><a href="<?php echo e(url('delivery_note/index/0')); ?>">Back</a></button></li>
          </ul>
        </div>
      </div>
    </div>
    <!-- card header end@ -->
    <div class="card-body">
      <div class="row col-md-12">

            <div class="col-md-6">
              <div class="form-group row">
            <label for="validationCustom01" class="col-sm-4 col-form-label">Voucher No :</label>
            <label for="validationCustom01" class="col-sm-4 col-form-label"> <?php echo e($delivery_note->d_no); ?></label>
          </div>
              </div>
                                 

          <div class="col-md-6">
            <div class="form-group row">
            <label for="validationCustom01" class="col-sm-4 col-form-label">Voucher Date :</label>
            <label for="validationCustom01" class="col-sm-4 col-form-label"> <?php echo e($delivery_note->d_date); ?></label>
          </div>
              </div>
            </div>

            <div class="row col-md-12">

            <div class="col-md-6">
              <div class="form-group row">
            <label for="validationCustom01" class="col-sm-4 col-form-label">Sales Estimation No :</label>
            <label for="validationCustom01" class="col-sm-4 col-form-label"> <?php echo e($delivery_note->sale_estimation_no); ?></label>
          </div>
              </div>
                                 

          <div class="col-md-6">
            <div class="form-group row">
            <label for="validationCustom01" class="col-sm-4 col-form-label">Sales Estimation Date :</label>
            <label for="validationCustom01" class="col-sm-4 col-form-label"> <?php echo e($delivery_note->sale_estimation_date); ?></label>
          </div>
              </div>
            </div>


            <div class="row col-md-12">

            <div class="col-md-6">
              <div class="form-group row">
            <label for="validationCustom01" class="col-sm-4 col-form-label">Customer Name :</label>
            <label for="validationCustom01" class="col-sm-4 col-form-label"> 
              <?php if(isset($delivery_note->customer->name) && !empty($delivery_note->customer->name)): ?>
              <?php echo e($delivery_note->customer->name); ?>

              <?php else: ?>
               N/A 
              <?php endif; ?>
            </label>
          </div>
              </div>
                                 

          <div class="col-md-6">
            <div class="form-group row">
            <label for="validationCustom01" class="col-sm-4 col-form-label">Customer Address :</label>
            <label for="validationCustom01" class="col-sm-4 col-form-label"> <?php echo e($address); ?></label>
          </div>
              </div>
            </div>

            <div class="row col-md-12">
            <div class="col-md-6">
              <div class="form-group row">
            <label for="validationCustom01" class="col-sm-4 col-form-label">Sales Man Name :</label>
            <label for="validationCustom01" class="col-sm-4 col-form-label"> 
              <?php if(isset($delivery_note->salesman->name) && !empty($delivery_note->salesman->name)): ?>
              <?php echo e($delivery_note->salesman->name); ?>

              <?php else: ?>
               N/A 
              <?php endif; ?>
            </label>
          </div>
        </div>
      

            <!-- <div class="row col-md-12">

            <div class="col-md-6">
              <div class="form-group row">
            <label for="validationCustom01" class="col-sm-4 col-form-label">Purchase Type :</label>
            <label for="validationCustom01" class="col-sm-4 col-form-label"> 
              <?php if($delivery_note->purchase_type == 1): ?>
              Cash Purchase
              <?php else: ?>
               Credit purchase
              <?php endif; ?>
            </label>
          </div>
              </div>
              
            </div> -->
                              
                              <br>
    
      <div class="col-md-8">
       <div class="form-group row">
       <div class="col-md-4">
       <label for="validationCustom01" class=" col-form-label"><h4>Item Details:</h4> </label><br>           
           </div>
             </div>
              </div>



<div class="form-row">
             
              <div>
                
                <table class="table table-bordered table-responsive" style="max-width: 93%; height: 100%;">
                  <thead>
                    <th> S.no </th>
                    <th> Item S.no </th>
                    <th> Item Code</th>
                    <th> Item Name</th>
                    <th> HSN</th>
                    <th> MRP</th>
                    <th> Unit Price</th>
                    <th> Quantity</th>
                    <th> UOM</th>
                    <th> Amount</th>
                    <th> Discount</th>
                    <th> GST Rs</th>
                    <th> Net Value</th>
                    <th style="background-color: #FAF860;"> Last Purchase Rate(LPR)</th>
                    
                  </thead>
                  <tbody>
                   <?php $__currentLoopData = $delivery_note_items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr id="row<?php echo e($key); ?>" class="<?php echo e($key); ?> tables"><td><span class="item_s_no"> <?php echo e($key+1); ?> </span></td><td><div class="form-group row"><div class="col-sm-12"><input class="invoice_no<?php echo e($key); ?>" type="hidden" id="invoice<?php echo e($key); ?>" value="<?php echo e($value->item_sno); ?>" name="invoice_sno[]"><font class="item_no<?php echo e($key); ?>"><?php echo e($value->item_sno); ?></font></div></div></td><td><div class="form-group row"><div class="col-sm-12"><input type="hidden" class="item_code<?php echo e($key); ?>" value="<?php echo e($value->item_id); ?>" name="item_code[]"><font class="items<?php echo e($key); ?>"><?php echo e($value->item->code); ?></font></div></div></td><td><div class="form-group row"><div class="col-sm-12"><input class="item_name<?php echo e($key); ?>" type="hidden" value="<?php echo e($value->item->name); ?>" name="item_name[]"><font class="font_item_name<?php echo e($key); ?>"><?php echo e($value->item->name); ?></font></div></div></td><td><div class="form-group row"><div class="col-sm-12"><input class="hsn<?php echo e($key); ?>" type="hidden" value="<?php echo e($value->item->hsn); ?>" name="hsn[]"><font class="font_hsn<?php echo e($key); ?>"><?php echo e($value->item->hsn); ?></font></div></div></td><td><div class="form-group row"><div class="col-sm-12"><input type="hidden" class="mrp<?php echo e($key); ?>" value="<?php echo e($value->mrp); ?>" name="mrp[]"><font class="font_mrp<?php echo e($key); ?>"><?php echo e($value->mrp); ?></font></div></div></td><td><div class="form-group row"><div class="col-sm-12" id="unit_price"><input type="hidden" class="exclusive<?php echo e($key); ?>" value="<?php echo e($value->rate_exclusive_tax); ?>" name="exclusive[]"><font class="font_exclusive<?php echo e($key); ?>"><?php echo e($value->rate_exclusive_tax); ?></font><input type="hidden" class="inclusive<?php echo e($key); ?>" value="<?php echo e($value->rate_inclusive_tax); ?>" name="inclusive[]"></div></div></td><td><div class="form-group row"><div class="col-sm-12"><input type="hidden" class="quantity<?php echo e($key); ?>" value="<?php echo e($value->qty); ?>" name="quantity[]"><font class="font_quantity<?php echo e($key); ?>"><?php echo e($value->qty); ?></font></div></div></td><td><div class="form-group row"><div class="col-sm-12"><input type="hidden" class="uom<?php echo e($key); ?>" value="<?php echo e($value->uom->id); ?>" name="uom[]"><font class="font_uom<?php echo e($key); ?>"><?php echo e($value->uom->name); ?></font></div></div></td><td><div class="form-group row"><div class="col-sm-12"><input type="hidden" class="table_amount" id="amnt<?php echo e($key); ?>" value="<?php echo e($item_amount[$key]); ?>" name="amount[]"><font class="font_amount<?php echo e($key); ?>"> <?php echo e($item_amount[$key]); ?> </font></div></div></td><td><div class="form-group row"><div class="col-sm-12"><input type="hidden" class="input_discounts" value="<?php echo e($value->discount); ?>" id="input_discount<?php echo e($key); ?>" ><input class="discount_val<?php echo e($key); ?>" type="hidden" value="<?php echo e($value->discount); ?>" name="discount[]"><font class="font_discount" id="font_discount<?php echo e($key); ?>"><?php echo e($value->discount); ?></font></div></div></td><td><div class="form-group row"><div class="col-sm-12"><input type="hidden" class="table_gst" id="tax<?php echo e($key); ?>" value="<?php echo e($item_gst_rs[$key]); ?>" name="gst[]"><input type="hidden" class="tax_gst<?php echo e($key); ?>"  value="<?php echo e($value->gst); ?>" name="tax_rate[]"><font class="font_gst<?php echo e($key); ?>"> <?php echo e($item_gst_rs[$key]); ?> </font></div></div></td><td><div class="form-group row"><div class="col-sm-12"><input type="hidden" class="table_net_price" id="net_price<?php echo e($key); ?>" value="<?php echo e($item_net_value[$key]); ?>" name="net_price[]"><font class="font_net_price<?php echo e($key); ?>"><?php echo e($item_net_value[$key]); ?></font></div></div></td><td style="background-color: #FAF860;"><div class="form-group row"><div class="col-sm-12"><center><font class="last_purchase<?php echo e($key); ?>"><?php echo e($net_value[$key]); ?></font></center></div></div></td></tr>
                  
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </tbody>

                </table>
                
                       </div>
                     </div><br>


            <div class="row col-md-12">

            <div class="col-md-6">
              <div class="form-group row">
            <label for="validationCustom01" class="col-sm-4 col-form-label">Discount(-) :</label>
            <label for="validationCustom01" class="col-sm-4 col-form-label"> <?php echo e($item_discount_sum); ?></label>
          </div>
              </div>
                                 

          <div class="col-md-6">
            <div class="form-group row">
            <label for="validationCustom01" class="col-sm-4 col-form-label">Overall Discount :</label>
            <label for="validationCustom01" class="col-sm-4 col-form-label"> <?php echo e($delivery_note->overall_discount); ?></label>
          </div>
              </div>
            </div>


          <div class="form-row">
             
              <div>  
        
        <table class="table table-bordered table-responsive" style="width: 100%; height: 100%;">
          <thead>
            <th> S.no </th>
            <th> Expense Type </th>
            <th> Expense Amount</th>
            
          </thead>
              <tbody>
               <?php $__currentLoopData = $delivery_note_expense; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                  <td><?php echo e($key+1); ?></td>
                <td><?php if(isset($value->expense_types->type) && !empty($value->expense_types->type)): ?>
                <?php echo e($value->expense_types->type); ?>

              <?php endif; ?></td>
              <td><?php echo e($value->expense_amount); ?></td>
                    </tr>
                  
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </tbody>

        </table>
                
          </div></div><br>


            <div class="row col-md-12">

            <div class="col-md-6">
              <div class="form-group row">
            <label for="validationCustom01" class="col-sm-4 col-form-label">Round Off(+/-) :</label>
            <label for="validationCustom01" class="col-sm-4 col-form-label"> <?php echo e($delivery_note->round_off); ?></label>
          </div>
              </div>
                                 

          <?php $__currentLoopData = $tax; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <div class="col-md-6">
            <div class="form-group row">
            <label for="validationCustom01" class="col-sm-4 col-form-label"><?php echo e($value->taxes->name); ?> :</label>
            <label for="validationCustom01" class="col-sm-4 col-form-label"> <?php echo e($value->value); ?></label>
          </div>
              </div>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

            <div class="row col-md-12">

            <div class="col-md-6">
              <div class="form-group row">
            <label for="validationCustom01" class="col-sm-4 col-form-label">Net Value :</label>
            <label for="validationCustom01" class="col-sm-4 col-form-label"> <?php echo e($delivery_note->total_net_value); ?></label>
          </div>
              </div>
            </div>
                       
    </div>
    <!-- card body end@ -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ns_pollachi\resources\views/admin/delivery_note/show.blade.php ENDPATH**/ ?>