<?php $__env->startSection('content'); ?>
<div class="col-12 body-sec">
  <div class="card container px-0">
    <!-- card header start@ -->
    <div class="card-header px-2">
      <div class="row">
        <div class="col-4">
          <h3>View Item</h3>
        </div>
        <div class="col-8 mr-auto">
          <ul class="h-right-btn mb-0 pl-0">
            <li><button type="button" class="btn btn-success"><a href="<?php echo e(url('master/item')); ?>">Back</a></button></li>
          </ul>
        </div>
      </div>
    </div>
    <!-- card header end@ -->
    <div class="card-body">
      <div class="form-row">
        <div class="col-md-6">
          <div class="form-group row">
            <label for="validationCustom01" class="col-sm-4 col-form-label">Item Name :</label>
            <label for="validationCustom01" class="col-sm-4 col-form-label"> <?php echo e($item->name); ?></label>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group row">
            <label for="validationCustom01" class="col-sm-4 col-form-label">Item Code :</label>
            <label for="validationCustom01" class="col-sm-4 col-form-label"><?php echo e($item->code); ?> </label>
          </div>
        </div>

        

        <?php
        $barnd_name="";
        if($item->brand_id > 0 && isset($item->brand->name))
        {
          $barnd_name=$item->brand->name;
        }
        else if($item->brand_id == 0)
        {
          $barnd_name="Not Applicable";
        }
      ?>

        <div class="col-md-6">
          <div class="form-group row">
            <label for="validationCustom01" class="col-sm-4 col-form-label">Brand Name :</label>
            <label for="validationCustom01" class="col-sm-4 col-form-label"><?php echo e($barnd_name); ?> </label>
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group row">
            <label for="validationCustom01" class="col-sm-4 col-form-label">Catgeory :</label>
            <label for="validationCustom01" class="col-sm-4 col-form-label"><?php echo e(isset($item->category->name) ? $item->category->name : ""); ?> </label>
          </div>
        </div>

              <div class="col-md-6">
                  <div class="form-group row">
                    <label for="validationCustom01" class="col-sm-4 col-form-label">Item Type :</label>
                    <label for="validationCustom01" class="col-sm-4 col-form-label"><?php echo e($item->item_type); ?> </label>
                  </div>
                </div>




          <div class="col-md-6">
              <div class="form-group row">
                <label for="validationCustom01" class="col-sm-4 col-form-label">Print Name in English:</label>
                <label for="validationCustom01" class="col-sm-4 col-form-label"><?php echo e($item->print_name_in_english); ?> </label>
              </div>
            </div>

            <div class="col-md-6">
                <div class="form-group row">
                  <label for="validationCustom01" class="col-sm-4 col-form-label">Print Name in <?php echo e($language_1); ?>:</label>
                  <label for="validationCustom01" class="col-sm-4 col-form-label"><?php echo e($item->print_name_in_language_1); ?> </label>
                </div>
              </div>

              <div class="col-md-6">
                  <div class="form-group row">
                    <label for="validationCustom01" class="col-sm-4 col-form-label">Print Name in <?php echo e($language_2); ?>:</label>
                    <label for="validationCustom01" class="col-sm-4 col-form-label"><?php echo e($item->print_name_in_language_2); ?> </label>
                  </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group row">
                      <label for="validationCustom01" class="col-sm-4 col-form-label">Print Name in <?php echo e($language_3); ?>:</label>
                      <label for="validationCustom01" class="col-sm-4 col-form-label"><?php echo e($item->print_name_in_language_3); ?> </label>
                    </div>
                  </div>


            <!-- <div class="col-md-6">
                <div class="form-group row">
                  <label for="validationCustom01" class="col-sm-4 col-form-label">PTC Code :</label>
                  <label for="validationCustom01" class="col-sm-4 col-form-label"><?php echo e($item->ptc); ?> </label>
                </div>
              </div> -->
              <div class="col-md-6">
                  <div class="form-group row">
                    <label for="validationCustom01" class="col-sm-4 col-form-label">Barcode :</label>
                    <label for="validationCustom01" class="col-sm-4 col-form-label"><?php echo e($item->barcode); ?> </label>
                  </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group row">
                      <label for="validationCustom01" class="col-sm-4 col-form-label">MRP :</label>
                      <label for="validationCustom01" class="col-sm-4 col-form-label"><?php echo e($item->mrp); ?> </label>
                    </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group row">
                        <label for="validationCustom01" class="col-sm-4 col-form-label">Default Selling Price :</label>
                        <label for="validationCustom01" class="col-sm-4 col-form-label"><?php echo e($item->default_selling_price); ?> </label>
                      </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                          <label for="validationCustom01" class="col-sm-4 col-form-label">UOM :</label>
                          <label for="validationCustom01" class="col-sm-4 col-form-label"><?php echo e($item->uom->name); ?> </label>
                        </div>
                      </div>
                      <div class="col-md-6">
                          <div class="form-group row">
                            <label for="validationCustom01" class="col-sm-4 col-form-label">Is Expiry Date Applicable  :</label>
                            <label for="validationCustom01" class="col-sm-4 col-form-label"><?php echo e($item->is_expiry_date == 1 ? "Yes" :"No"); ?> </label>
                          </div>
                        </div>
                      <?php if( $item->is_expiry_date == 1): ?>
                        <div class="col-md-6">
                            <div class="form-group row">
                              <label for="validationCustom01" class="col-sm-4 col-form-label">Expiry Date :</label>
                              <label for="validationCustom01" class="col-sm-4 col-form-label"><?php echo e(!empty($item->expiry_date) ? date('d-m-Y',strtotime($item->expiry_date)) : ""); ?> </label>
                            </div>
                          </div>
                          <?php endif; ?>

                          <div class="col-md-6">
                      <div class="form-group row">
                        <label for="validationCustom01" class="col-sm-4 col-form-label">Opening Quantity :</label>
                        <label for="validationCustom01" class="col-sm-4 col-form-label"><?php echo e($item->opening_stock); ?> </label>
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group row">
                        <label for="validationCustom01" class="col-sm-4 col-form-label">Rate :</label>
                        <label for="validationCustom01" class="col-sm-4 col-form-label"><?php echo e($item->rate); ?> </label>
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group row">
                        <label for="validationCustom01" class="col-sm-4 col-form-label">Amount :</label>
                        <label for="validationCustom01" class="col-sm-4 col-form-label"><?php echo e($item->amount); ?> </label>
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group row">
                        <label for="validationCustom01" class="col-sm-4 col-form-label">Applicable Date :</label>
                        <label for="validationCustom01" class="col-sm-4 col-form-label"><?php echo e($item->applicable_date); ?> </label>
                      </div>
                    </div>

                          <div class="col-md-6">
                              <div class="form-group row">
                                <label for="validationCustom01" class="col-sm-4 col-form-label">Item Image :</label>
                                <label for="validationCustom01" class="col-sm-4 col-form-label"> </label>
                              </div>
                            </div>
                          

        
      </div>
    </div>
    <!-- card body end@ -->
  </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ns_pollachi\resources\views/admin/master/item/show.blade.php ENDPATH**/ ?>