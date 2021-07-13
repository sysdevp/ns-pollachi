@extends('admin.layout.app')
@section('content')
<main class="page-content">

<div class="col-12 body-sec">
  <div class="card container px-0">
    <!-- card header start@ -->
    <div class="card-header px-2">
      <div class="row">
        <div class="col-4">
          <h3>View Location</h3>
        </div>
        <div class="col-8 mr-auto">
          <ul class="h-right-btn mb-0 pl-0">
            <li><button type="button" class="btn btn-success"><a href="{{url('master/ho_details')}}">Back</a></button></li>
          </ul>
        </div>
      </div>
    </div>
    <!-- card header end@ -->
    <div class="card-body">
      <div class="form-row">
        <div class="col-md-6">
          <div class="form-group row">
            <label for="validationCustom01" class="col-sm-4 col-form-label">Location Name :</label>
            <label for="validationCustom01" class="col-sm-4 col-form-label"> {{ $location->name }}</label>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group row">
            <label for="validationCustom01" class="col-sm-4 col-form-label">GST Number :</label>
            <label for="validationCustom01" class="col-sm-4 col-form-label">{{ $location->gst_number }} </label>
          </div>
        </div>
        <div class="col-md-7">
          <div class="form-group row">
            <label for="validationCustom01" class="col-sm-4 col-form-label">Address :</label>
            <label for="validationCustom01" class="col-sm-4 col-form-label">
            @if($location->address_line_1 != "")
                  {{ $location->address_line_1 }},</br>
                  @endif
                  @if($location->address_line_2 != "")
                  {{ $location->address_line_2 }},</br>
                  @endif
                  
                  @if($location->land_mark != "" || $location->city->name != ""  || $location->district->name != "" )
                  @if($location->land_mark != "")
                  {{ $location->land_mark }},
                  @endif
                  @if(isset($location->city->name) && $location->city->name != "")
                  {{ $location->city->name }},
                  @endif

                  @if(isset($location->district->name) && $location->district->name != "")
                  {{ $location->district->name }},
                  @endif
</br>
@endif
                  @if(isset($location->state->name) && $location->state->name != "")
                  {{ $location->state->name }}
                  @endif
                  @if($location->postal_code != "")
                 - {{ $location->postal_code }},</br>
                  @endif    
          
          </label>
          </div>
        </div>
      </div>
    </div>
    <!-- card body end@ -->
  </div>
</div>
@endsection