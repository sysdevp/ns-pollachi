@extends('admin.layout.app')
@section('content')
<main class="page-content">
<div class="container-fuild" style="background:#28a745">
				<div class="text-right pr-3">sdfjsdfjl</div>
		</div>
<div class="col-12 body-sec">
  <div class="card container px-0">
    <!-- card header start@ -->
    <div class="card-header px-2">
      <div class="row">
        <div class="col-4">
          <h3>View Offers</h3>
        </div>
        <div class="col-8 mr-auto">
          <ul class="h-right-btn mb-0 pl-0">
            <li><button type="button" class="btn btn-success"><a href="{{url('master/offers')}}">Back</a></button></li>
          </ul>
        </div>
      </div>
    </div>
    <!-- card header end@ -->
    <div class="card-body">
      <div class="form-row">
        <div class="col-md-6">
          <div class="form-group row">
            <label for="validationCustom01" class="col-sm-4 col-form-label">Offer Name :</label>
            <label for="validationCustom01" class="col-sm-4 col-form-label"> {{ $offers->offer_name }}</label>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group row">
            <label for="validationCustom01" class="col-sm-4 col-form-label">Category :</label>
            <label for="validationCustom01" class="col-sm-4 col-form-label">{{ $offers->offers_category_id }} </label>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group row">
            <label for="validationCustom01" class="col-sm-4 col-form-label">Offer type :</label>
            <label for="validationCustom01" class="col-sm-4 col-form-label">{{ $offers->offer_type }} </label>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group row">
            <label for="validationCustom01" class="col-sm-4 col-form-label">Offer valid from :</label>
            <label for="validationCustom01" class="col-sm-4 col-form-label">{{ $offers->valid_from !="" ? date('d-m-Y',strtotime($offers->valid_from)) : "" }} </label>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group row">
            <label for="validationCustom01" class="col-sm-4 col-form-label">Offer valid from :</label>
            <label for="validationCustom01" class="col-sm-4 col-form-label">{{ $offers->valid_to !="" ? date('d-m-Y',strtotime($offers->valid_to)) : "" }} </label>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group row">
            <label for="validationCustom01" class="col-sm-4 col-form-label">Variable type :</label>
            <label for="validationCustom01" class="col-sm-4 col-form-label">{{ $offers->variable }} </label>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group row">
            <label for="validationCustom01" class="col-sm-4 col-form-label">Offer time valid from :</label>
            <label for="validationCustom01" class="col-sm-4 col-form-label">{{ $offers->from_time !="" ? date('h:i a',strtotime($offers->from_time)) : "" }} </label>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group row">
            <label for="validationCustom01" class="col-sm-4 col-form-label">Offer time valid to :</label>
            <label for="validationCustom01" class="col-sm-4 col-form-label">{{ $offers->to_time !="" ? date('h:i a',strtotime($offers->to_time)) : "" }} </label>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group row">
            <label for="validationCustom01" class="col-sm-4 col-form-label">Offer Percentage :</label>
            <label for="validationCustom01" class="col-sm-4 col-form-label">{{ $offers->percentage }} </label>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group row">
            <label for="validationCustom01" class="col-sm-4 col-form-label">Fixed Amount :</label>
            <label for="validationCustom01" class="col-sm-4 col-form-label">{{ $offers->fixed_amount }} </label>
          </div>
        </div>        
        <div class="col-md-6">
          <div class="form-group row">
            <label for="validationCustom01" class="col-sm-4 col-form-label">Comments :</label>
            <label for="validationCustom01" class="col-sm-4 col-form-label">{{ $offers->comments }} </label>
          </div>
        </div>
        
      </div>
    </div>
    <!-- card body end@ -->
  </div>
</div>
@endsection