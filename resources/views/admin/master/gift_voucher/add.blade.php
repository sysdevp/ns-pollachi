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
          <h3>Add Gift Voucher</h3>
        </div>
        <div class="col-8 mr-auto">
          <ul class="h-right-btn mb-0 pl-0">
            <li><button type="button" class="btn btn-success"><a href="{{url('master/gift-voucher')}}">Back</a></button></li>
          </ul>
        </div>
      </div>
    </div>
    <!-- card header end@ -->
    <div class="card-body">
    
      <form  method="post" class="form-horizontal needs-validation" novalidate action="{{url('master/gift-voucher/store')}}" enctype="multipart/form-data">
      {{csrf_field()}}

        <div class="form-row">
       
          <div class="col-md-6">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Gift Voucher Name <?php echo Mandatoryfields::mandatory('giftvoucher_name');?></label>
              <div class="col-sm-8">
                <input type="text" class="form-control name only_allow_alp_num_dot_com_amp caps" placeholder="Gift Voucher Name" name="name" value="{{old('name')}}" <?php echo Mandatoryfields::validation('giftvoucher_name');?> tabindex="1" autofocus>
                <span class="mandatory"> {{ $errors->first('name')  }} </span>
                <div class="invalid-feedback">
                  Enter valid Gift Voucher Name
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Gift Voucher Prefix Code <?php echo Mandatoryfields::mandatory('giftvoucher_code');?></label>
              <div class="col-sm-8">
                <input type="text" class="form-control only_allow_alp_num_dot_com_amp code" placeholder="Gift Voucher Prefix Code" name="code" value="{{old('code')}}" <?php echo Mandatoryfields::validation('giftvoucher_code');?> tabindex="2">
                <span class="mandatory"> {{ $errors->first('name')  }} </span>
                <div class="invalid-feedback">
                  Enter valid Gift Voucher Prefix Code
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Gift Voucher Value <?php echo Mandatoryfields::mandatory('giftvoucher_value');?></label>
              <div class="col-sm-8">
                <input type="text" class="form-control only_allow_digit value" placeholder="Gift Voucher Value" name="value" value="{{old('value')}}" <?php echo Mandatoryfields::validation('giftvoucher_value');?> tabindex="3">
                <span class="mandatory"> {{ $errors->first('value')  }} </span>
                <div class="invalid-feedback">
                  Enter valid Gift Voucher Value
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Quantity<?php echo Mandatoryfields::mandatory('giftvoucher_quantity');?></label>
              <div class="col-sm-8">
                <input type="text" class="form-control only_allow_digit value" placeholder="Quantity" name="quantity" value="{{old('quantity')}}" <?php echo Mandatoryfields::validation('giftvoucher_quantity');?> tabindex="4">
                <span class="mandatory"> {{ $errors->first('value')  }} </span>
                <div class="invalid-feedback">
                  Enter valid Gift Voucher Quantity
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Valid From Date <?php echo Mandatoryfields::mandatory('giftvoucher_validfrom');?></label>
              <div class="col-sm-8">
                <input type="text" class="form-control from_date" placeholder="dd-mm-yyyy" name="valid_from" value="{{old('valid_from')}}" <?php echo Mandatoryfields::validation('giftvoucher_validfrom');?> tabindex="5">
                <span class="mandatory"> {{ $errors->first('valid_from')  }} </span>
                <div class="invalid-feedback">
                  Enter valid From Date
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Valid To Date <?php echo Mandatoryfields::mandatory('giftvoucher_validto');?></label>
              <div class="col-sm-8">
                <input type="text" class="form-control to_date" placeholder="dd-mm-yyyy" name="valid_to" value="{{old('valid_to')}}" <?php echo Mandatoryfields::validation('giftvoucher_validto');?> tabindex="6">
                <span class="mandatory"> {{ $errors->first('valid_to')  }} </span>
                <div class="invalid-feedback">
                  Enter valid To Date
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Remark <?php echo Mandatoryfields::mandatory('giftvoucher_remark');?></label>
              <div class="col-sm-8">
                <input type="text" class="form-control  remark" placeholder="Remark" name="remark" value="{{old('remark')}}" <?php echo Mandatoryfields::validation('giftvoucher_remark');?> tabindex="7">
                <span class="mandatory"> {{ $errors->first('remark')  }} </span>
                <div class="invalid-feedback">
                  Enter valid Remark
                </div>
              </div>
            </div>
          </div>
          
        </div>
        <div class="col-md-7 text-right">
          <button class="btn btn-success" name="add" type="submit" tabindex="8">Submit</button>
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

