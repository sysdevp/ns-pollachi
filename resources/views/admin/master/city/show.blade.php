@extends('admin.layout.app')
@section('content')
<div class="col-12 body-sec">
  <div class="card container px-0">
    <!-- card header start@ -->
    <div class="card-header px-2">
      <div class="row">
        <div class="col-4">
          <h3>View City</h3>
        </div>
        <div class="col-8 mr-auto">
          <ul class="h-right-btn mb-0 pl-0">
            <li><button type="button" class="btn btn-success"><a href="{{url('master/city')}}">Back</a></button></li>
          </ul>
        </div>
      </div>
    </div>
    <!-- card header end@ -->
    <div class="card-body">
      <div class="form-row">
        <div class="col-md-7">
          <div class="form-group row">
            <label for="validationCustom01" class="col-sm-4 col-form-label">State Name :</label>
            <label for="validationCustom01" class="col-sm-4 col-form-label"> {{ isset($city->state->name) && !empty( $city->state->name) ?  $city->state->name : "" }}</label>
          </div>
        </div>
        <div class="col-md-7">
          <div class="form-group row">
            <label for="validationCustom01" class="col-sm-4 col-form-label">District Name :</label>
            <label for="validationCustom01" class="col-sm-4 col-form-label">{{ isset($city->district->name) && !empty( $city->district->name) ?  $city->district->name : "" }} </label>
          </div>
        </div>
        <div class="col-md-7">
          <div class="form-group row">
            <label for="validationCustom01" class="col-sm-4 col-form-label">City Name :</label>
            <label for="validationCustom01" class="col-sm-4 col-form-label">{{ $city->name }} </label>
          </div>
        </div>
        <div class="col-md-7">
          <div class="form-group row">
            <label for="validationCustom01" class="col-sm-4 col-form-label">Remark :</label>
            <label for="validationCustom01" class="col-sm-4 col-form-label">{{ $city->remark }} </label>
          </div>
        </div>
      </div>
    </div>
    <!-- card body end@ -->
  </div>
</div>
@endsection