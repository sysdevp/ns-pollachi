@extends('admin.layout.app')
@section('content')
<main class="page-content">

<div class="col-12 body-sec">
  <div class="card container px-0">
    <!-- card header start@ -->
    <div class="card-header px-2">
      <div class="row">
        <div class="col-4">
          <h3>View Gift Voucher</h3>
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
      <div class="form-row">
        <div class="col-md-6">
          <div class="form-group row">
            <label for="validationCustom01" class="col-sm-4 col-form-label">Gift Voucher Name :</label>
            <label for="validationCustom01" class="col-sm-4 col-form-label"> {{ $giftvoucher->name }}</label>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group row">
            <label for="validationCustom01" class="col-sm-4 col-form-label">Gift Voucher Code :</label>
            <label for="validationCustom01" class="col-sm-4 col-form-label">{{ $giftvoucher->code }} </label>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group row">
            <label for="validationCustom01" class="col-sm-4 col-form-label">Gift Voucher Value :</label>
            <label for="validationCustom01" class="col-sm-4 col-form-label">{{ $giftvoucher->value }} </label>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group row">
            <label for="validationCustom01" class="col-sm-4 col-form-label">Gift Voucher Valid From :</label>
            <label for="validationCustom01" class="col-sm-4 col-form-label">{{ $giftvoucher->valid_from !="" ? date('d-m-Y',strtotime($giftvoucher->valid_from)) : "" }} </label>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group row">
            <label for="validationCustom01" class="col-sm-4 col-form-label">Gift Voucher Valid To :</label>
            <label for="validationCustom01" class="col-sm-4 col-form-label">{{ $giftvoucher->valid_to !="" ? date('d-m-Y',strtotime($giftvoucher->valid_to)) : "" }} </label>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group row">
            <label for="validationCustom01" class="col-sm-4 col-form-label">Remarks :</label>
            <label for="validationCustom01" class="col-sm-4 col-form-label">{{ $giftvoucher->remark }} </label>
          </div>
        </div>
        
      </div>
    </div>
    <!-- card body end@ -->
  </div>
</div>
@endsection