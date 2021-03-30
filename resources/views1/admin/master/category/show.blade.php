@extends('admin.layout.app')
@section('content')
<main class="page-content">

<div class="col-12 body-sec">
  <div class="card container px-0">
    <!-- card header start@ -->
    <div class="card-header px-2">
      <div class="row">
        <div class="col-4">
          <h3>View Category</h3>
        </div>
        <div class="col-8 mr-auto">
          <ul class="h-right-btn mb-0 pl-0">
            <li><button type="button" class="btn btn-success"><a href="{{url('master/category')}}">Back</a></button></li>
          </ul>
        </div>
      </div>
    </div>
    <!-- card header end@ -->
    <div class="card-body">
      <div class="form-row">
        <div class="col-md-7">
          <div class="form-group row">
            <label for="validationCustom01" class="col-sm-4 col-form-label">Category Name :</label>
            <label for="validationCustom01" class="col-sm-4 col-form-label"> {{ $category->name }}</label>
          </div>
        </div>

        <div class="col-md-7">
          <div class="form-group row">
            <label for="validationCustom01" class="col-sm-4 col-form-label">Parent :</label>
            <label for="validationCustom01" class="col-sm-4 col-form-label"> {{ $category->parent_id == 0 ? "Parent" : $category->parent_category->name }}</label>
          </div>
        </div>

        <div class="col-md-7">
              <div class="form-group row">
                <label for="validationCustom01" class="col-sm-4 col-form-label">HSN :</label>
              <label for="validationCustom01" class="col-sm-4 col-form-label"> @if($category->hsn == '') 
                N/A 
             @else 
            {{ $category->hsn }}@endif</label>
              </div>
            </div>

        <div class="col-md-7">
          <div class="form-group row">
            <label for="validationCustom01" class="col-sm-4 col-form-label">GST % :</label>
            <label for="validationCustom01" class="col-sm-4 col-form-label">@if($category->gst_no == '') 
               N/A 
             @else 
            {{ $category->gst_no }}@endif</label>
          </div>
        </div>

          <div class="col-md-7">
              <div class="form-group row">
                <label for="validationCustom01" class="col-sm-4 col-form-label">Remark :</label>
                <label for="validationCustom01" class="col-sm-4 col-form-label"> {{ $category->remark }}</label>
              </div>
            </div>
        
        
      </div>
    </div>
    <!-- card body end@ -->
  </div>
</div>
@endsection