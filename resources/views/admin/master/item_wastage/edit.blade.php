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
          <h3>Add Item Wastage</h3>
        </div>
        <div class="col-8 mr-auto">
          <ul class="h-right-btn mb-0 pl-0">
            <li><button type="button" class="btn btn-success"><a href="{{url('master/item_wastage')}}">Back</a></button></li>
          </ul>
        </div>
      </div>
    </div>
    <!-- card header end@ -->
    <div class="card-body">
    
      <form  method="post" class="form-horizontal needs-validation" novalidate action="{{url('master/item_wastage/update'.$item_wastage->id)}}" enctype="multipart/form-data">
      {{csrf_field()}}

        <div class="form-row">
       
         <div class="col-md-6">
            <div class="form-group row">
			<label for="validationCustom01" class="col-sm-4 col-form-label">Location <?php echo Mandatoryfields::mandatory('itemwastage_locationid');?></label>
              <div class="col-sm-8">
             <select class="js-example-basic-multiple form-control custom-select location" placeholder="" name="location_id" <?php echo Mandatoryfields::validation('itemwastage_locationid');?> autofocus>
                  <option value="">Choose location</option>
                  @foreach($locations as $value)
                   <option value="{{ $value->id }}" {{ old('location_id', $item_wastage->location_id) == $value->id ? 'selected' : '' }}>{{ $value->name }}</option>
                  @endforeach
                </select>
                <span class="mandatory"> {{ $errors->first('location_id')  }} </span>
                <div class="invalid-feedback">
                  Enter valid District
                </div>
            </div>
          </div>
          </div>

         
          <div class="col-md-6">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Date <?php echo Mandatoryfields::mandatory('itemwastage_entrydate');?></label>
              <div class="col-sm-8">
                <input type="text" class="form-control to_date" placeholder="dd-mm-yyyy" name="entry_date" value="{{$item_wastage->entry_date}}" <?php echo Mandatoryfields::validation('itemwastage_entrydate');?>>
                <span class="mandatory"> {{ $errors->first('valid_to')  }} </span>
                <div class="invalid-feedback">
                  Enter valid To Date
                </div>
              </div>
            </div>
          </div>
		  
		  
		   <div class="col-md-6">
            <div class="form-group row">
			<label for="validationCustom01" class="col-sm-4 col-form-label">Wastage Item Name <?php echo Mandatoryfields::mandatory('itemwastage_itemid');?></label>
              <div class="col-sm-8">
             <select class="js-example-basic-multiple form-control custom-select wastage_item_id" placeholder="Choose District" name="item_id" <?php echo Mandatoryfields::validation('itemwastage_itemid');?>>
                  <option value="">Choose Item</option>
                  @foreach($items as $value)
                  <option value="{{ $value->id }}" {{ old('item_id', $item_wastage->item_id) == $value->id ? 'selected' : '' }}>{{ $value->name }}</option>
                  @endforeach
                </select>
                <span class="mandatory"> {{ $errors->first('wastage_item_id')  }} </span>
                <div class="invalid-feedback">
                  Enter valid District
                </div>
            </div>
          </div>
          </div>

          <div class="col-md-4">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-6 col-form-label">Quantity<?php echo Mandatoryfields::mandatory('itemwastage_quantity');?></label>
              <div class="col-sm-6">
                <input type="text" class="form-control only_allow_digit value" placeholder="Quantity" name="quantity" value="{{ $item_wastage->quantity }}" <?php echo Mandatoryfields::validation('itemwastage_quantity');?>>
                <span class="mandatory"> {{ $errors->first('value')  }} </span>
                <div class="invalid-feedback">
                  Enter valid Gift Voucher Quantity
                </div>
              </div>
			  </div>
			  </div>
			  
			   <div class="col-sm-2">
             <select class="js-example-basic-multiple form-control custom-select wastage_item_id" placeholder="Choose District" name="uom_id" <?php echo Mandatoryfields::validation('itemwastage_uomid');?>>
                  <option value="">Choose UOM</option>
                  @foreach($uoms as $value)
                  <option value="{{ $value->id }}" {{ old('uom_id', $item_wastage->uom_id) == $value->id ? 'selected' : '' }}>{{ $value->name }}</option>
                  @endforeach
                </select>
                <span class="mandatory"> {{ $errors->first('uom_id')  }} </span>
                <div class="invalid-feedback">
                  Enter valid District
                </div>
            </div>
            
          
		  
          <div class="col-md-6">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Remark <?php echo Mandatoryfields::mandatory('itemwastage_remark');?></label>
              <div class="col-sm-8">
                <input type="text" class="form-control  remark" placeholder="Remark" name="remark" value="{{$item_wastage->remark}}" <?php echo Mandatoryfields::validation('itemwastage_remark');?>>
                <span class="mandatory"> {{ $errors->first('remark')  }} </span>
                <div class="invalid-feedback">
                  Enter valid Bank Code
                </div>
              </div>
            </div>
          </div>
          
        </div>
        <div class="col-md-7 text-right">
          <button class="btn btn-success" name="add" type="submit">Submit</button>
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

