@extends('admin.layout.app')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker3.css" type="text/css" />
@section('content')
<?php
use App\Mandatoryfields;
?>
<main class="page-content">

<div class="col-12 body-sec">
  <div class="card container px-0">
    <!-- card header start@ -->
    <div class="card-header px-2">
      <div class="row">
        <div class="col-4">
          <h3>Edit Itemwise Offers</h3>
        </div>
        <div class="col-8 mr-auto">
          <ul class="h-right-btn mb-0 pl-0">
            <li><button type="button" class="btn btn-success"><a href="{{url('master/itemwiseoffer')}}">Back</a></button></li>
          </ul>
        </div>
      </div>
    </div>
    <!-- card header end@ -->
    <div class="card-body">
    
      <form  method="post" class="form-horizontal needs-validation" novalidate action="{{url('master/itemwiseoffer/update/'.$itemwise_offers->id)}}" enctype="multipart/form-data">
      {{csrf_field()}}

        <div class="form-row">
       
          <div class="col-md-6">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Offer Name <?php echo Mandatoryfields::mandatory('itemwiseoffer_name');?></label>
              <div class="col-sm-8">
                <input type="text" class="form-control offer_name only_allow_alp_num_dot_com_amp caps" placeholder="" name="offer_name" value="{{ $itemwise_offers->offer_name }}" <?php echo Mandatoryfields::validation('itemwiseoffer_name');?> tabindex="1" autofocus>
                <span class="mandatory"> {{ $errors->first('offer_name')  }} </span>
                <div class="invalid-feedback">
                  Enter valid Gift Voucher Name
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Offer Code <?php echo Mandatoryfields::mandatory('itemwiseoffer_code');?></label>
              <div class="col-sm-8">
                <input type="text" class="form-control only_allow_alp_num_dot_com_amp code" placeholder="Offer Code" name="code" value="{{ $itemwise_offers->offer_code }}" <?php echo Mandatoryfields::validation('itemwiseoffer_code');?> tabindex="2">
                <span class="mandatory"> {{ $errors->first('name')  }} </span>
                <div class="invalid-feedback">
                  Enter valid Gift Voucher Prefix Code
                </div>
              </div>
            </div>
          </div>

         

          <div class="col-md-6">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Valid From Date <?php echo Mandatoryfields::mandatory('itemwiseoffer_validfrom');?></label>
              <div class="col-sm-8">
                <input type="text" class="form-control from_date" placeholder="dd-mm-yyyy" name="valid_from" value="{{ $itemwise_offers->valid_from }}" <?php echo Mandatoryfields::validation('itemwiseoffer_validfrom');?> tabindex="3">
                <span class="mandatory"> {{ $errors->first('valid_from')  }} </span>
                <div class="invalid-feedback">
                  Enter valid From Date
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Valid To Date <?php echo Mandatoryfields::mandatory('itemwiseoffer_validto');?></label>
              <div class="col-sm-8">
                <input type="text" class="form-control to_date" placeholder="dd-mm-yyyy" name="valid_to" value="{{ $itemwise_offers->valid_to }}" <?php echo Mandatoryfields::validation('itemwiseoffer_validto');?> tabindex="4">
                <span class="mandatory"> {{ $errors->first('valid_to')  }} </span>
                <div class="invalid-feedback">
                  Enter valid To Date
                </div>
              </div>
            </div>
          </div>
		  
		    <div class="col-md-8">
                       <div class="form-group row">
                       <div class="col-md-4">
                       <label for="validationCustom01" class=" col-form-label"><h4>Buy:</h4> </label><br>
                       
                           
                       </div>
                         </div>
              </div>
		  
		   <div class="col-md-6">
            <div class="form-group row">
			<label for="validationCustom01" class="col-sm-4 col-form-label">Item Name <?php echo Mandatoryfields::mandatory('itemwiseoffer_buyitemid');?></label>
              <div class="col-sm-8">
             <select class="js-example-basic-multiple form-control custom-select buy_item_id" placeholder="Choose District" name="buy_item_id" <?php echo Mandatoryfields::validation('itemwiseoffer_buyitemid');?> tabindex="5">
                  <option value="">Choose Item</option>
                  @foreach($items as $value)
                  <option value="{{ $value->id }}" {{ old('buy_item_id', $itemwise_offers->buy_item_id) == $value->id ? 'selected' : '' }}>{{ $value->name }}</option>
                  @endforeach
                </select>
                <span class="mandatory"> {{ $errors->first('buy_item_id')  }} </span>
                <div class="invalid-feedback">
                  Enter valid District
                </div>
            </div>
          </div>
          </div>

          <div class="col-md-6">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Quantity<?php echo Mandatoryfields::mandatory('itemwiseoffer_buyitemquantity');?></label>
              <div class="col-sm-8">
                <input type="text" class="form-control only_allow_digit value" placeholder="Quantity" name="buy_item_quantity" value="{{ $itemwise_offers->buy_item_quantity }}" <?php echo Mandatoryfields::validation('itemwiseoffer_buyitemquantity');?> tabindex="6">
                <span class="mandatory"> {{ $errors->first('value')  }} </span>
                <div class="invalid-feedback">
                  Enter valid Gift Voucher Quantity
                </div>
              </div>
            </div>
          </div>
		  
		    <div class="col-md-8">
                       <div class="form-group row">
                       <div class="col-md-4">
                       <label for="validationCustom01" class=" col-form-label"><h4>Get:</h4> </label><br>
                       
                           
                       </div>
                         </div>
              </div>
		  
		  <div class="col-md-6">
            <div class="form-group row">
			<label for="validationCustom01" class="col-sm-4 col-form-label">Item Name <?php echo Mandatoryfields::mandatory('itemwiseoffer_getitemid');?></label>
              <div class="col-sm-8">
             <select class="js-example-basic-multiple form-control custom-select get_item_id" placeholder="Choose District" name="get_item_id" <?php echo Mandatoryfields::validation('itemwiseoffer_getitemid');?> tabindex="7">
                  <option value="">Choose Item</option>
                  @foreach($items as $value)
                 <option value="{{ $value->id }}" {{ old('get_item_id', $itemwise_offers->get_item_id) == $value->id ? 'selected' : '' }}>{{ $value->name }}</option>
                  @endforeach
                </select>
                <span class="mandatory"> {{ $errors->first('get_item_id')  }} </span>
                <div class="invalid-feedback">
                  Enter valid District
                </div>
            </div>
          </div>
          </div>

          <div class="col-md-6">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Quantity<?php echo Mandatoryfields::mandatory('itemwiseoffer_getitemquantity');?></label>
              <div class="col-sm-8">
                <input type="text" class="form-control only_allow_digit value" placeholder="Quantity" name="get_item_quantity" value="{{ $itemwise_offers->get_item_quantity }}" <?php echo Mandatoryfields::validation('itemwiseoffer_getitemid');?> tabindex="8">
                <span class="mandatory"> {{ $errors->first('value')  }} </span>
                <div class="invalid-feedback">
                  Enter valid Gift Voucher Quantity
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Remark <?php echo Mandatoryfields::mandatory('itemwiseoffer_remark');?></label>
              <div class="col-sm-8">
                <input type="text" class="form-control  remark" placeholder="Remark" name="remark" value="{{ $itemwise_offers->remark }}" <?php echo Mandatoryfields::validation('itemwiseoffer_remark');?> tabindex="9">
                <span class="mandatory"> {{ $errors->first('remark')  }} </span>
                <div class="invalid-feedback">
                  Enter valid Remark
                </div>
              </div>
            </div>
          </div>
          
        </div>
        <div class="col-md-7 text-right">
          <button class="btn btn-success" name="add" type="submit" tabindex="10">Submit</button>
        </div>
      </form>
    </div>
    <script src="{{asset('assets/js/master/capitalize.js')}}"></script>
    <!-- card body end@ -->
  </div>
</div>
<script>
    $(document).ready(function () {
        var date1 = new Date();
        $(".from_date").datepicker({
          format: 'dd-mm-yyyy',
          todayHighlight: true,
           autoclose: true, 
           startDate: date1,
           endDate: '',
          setDate: date1
          }).on('changeDate', function (selected) {
            var startDate = new Date(selected.date.valueOf());

            $('.to_date').datepicker('setStartDate', startDate);
        }).on('clearDate', function (selected) {
            $('.to_date').datepicker('setStartDate', null);
        });
        $(".to_date").datepicker({
          format: 'dd-mm-yyyy', 
          todayHighlight: true,
          autoclose: true,
          endDate: '',
          startDate: date1,
          setDate: date1, 
          }).on('changeDate', function (selected) {
            var endDate = new Date(selected.date.valueOf());
            $('.from_date').datepicker('setEndDate', endDate);
        }).on('clearDate', function (selected) {
            $('.from_date').datepicker('setEndDate', null);
        });


    });
</script>
@endsection

