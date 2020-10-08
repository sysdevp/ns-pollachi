
<?php if(count($item_dets) >0): ?>
    <?php $__currentLoopData = $item_dets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td class="s_no"></td> 
            <td>
                <p> <?php echo e($value->name); ?> </p>
                <input type="hidden" class="form-control item_id" name="item_id[]" value="<?php echo e($value->id); ?>">
                <input type="hidden" class="form-control item_name" name="item_name[]" value="<?php echo e($value->name); ?>">
            </td>
            <?php $__currentLoopData = $taxes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <td>
                <div class="col-sm-12">
                <input type="text" class="form-control <?php echo e($value->name); ?>_id only_allow_digit_and_dot commons" name="<?php echo e($value->name); ?>_id[]" placeholder="<?php echo e($value->name); ?>" value="" required>
                <input type="hidden" name="<?php echo e($value->name); ?>[]" id="<?php echo e($value->name); ?>" value="<?php echo e($value->id); ?>">
                  <div class="invalid-feedback">
                    Enter valid IGST
                  </div>
                </div>
              </td>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              <td>
                      <div class="col-sm-12">
                       <input type="date" class="form-control valid_from" name="valid_from[]" placeholder="dd-mm-yyyy" value="" required>
                        <div class="invalid-feedback">
                          Enter valid Effective From Date
                        </div>
                      </div>
                    </td>
            <!-- <td>
                <div class="col-sm-12">
                <input type="text" class="form-control cgst only_allow_digit_and_dot" name="cgst[]" placeholder="CGST" value="" required>
                  <div class="invalid-feedback">
                    Enter valid CGST
                  </div>
                </div>
              </td>

          <td>
                    <div class="col-sm-12">
                    <input type="text" class="form-control sgst only_allow_digit_and_dot" name="sgst[]" placeholder="SGST" value="" required>
                      <div class="invalid-feedback">
                        Enter valid SGST
                      </div>
                    </div>
                  </td>

                  <td>
                      <div class="col-sm-12">
                       <input type="text" class="form-control valid_from" name="valid_from[]" placeholder="dd-mm-yyyy" value="" required>
                        <div class="invalid-feedback">
                          Enter valid Effective From Date
                        </div>
                      </div>
                    </td> -->
           <!--   <td>
                  <div class="form-group row">
                      <div class="col-sm-3">
                      <label class="btn btn-success add_more">+</label>
                      </div>
                      <div class="col-sm-3 mx-2">
                      <label class="btn btn-danger remove_row">-</label>
                        </div>
                    </div>
              </td> -->

        </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php else: ?>
<tr>
    <td colspan="7" style="text-align:center;font-weight:bold">No Data Found</td>
    
  </tr>
  
<?php endif; ?>







<?php /**PATH C:\xampp\htdocs\ns_pollachi\resources\views/admin/master/item_tax_details/search_item_by_category.blade.php ENDPATH**/ ?>