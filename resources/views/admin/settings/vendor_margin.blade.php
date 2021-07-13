@extends('admin.layout.app')
@section('content')
<main class="page-content">

<div class="col-12 body-sec">
  <div class="card container px-0">
    <!-- card header start@ -->
    <div class="card-header px-2">
      <div class="row">
        <div class="col-4">
          <h3>Vendor Margin Setup</h3>
        </div>
        <div class="col-8 mr-auto">
          <ul class="h-right-btn mb-0 pl-0">
            <li><button type="button" class="btn btn-success"><a href="{{url('/')}}">Back</a></button></li>
          </ul>
        </div>
      </div>
    </div>
    <!-- card header end@ -->
    <div class="card-body">
    
      <form  method="post" class="form-horizontal needs-validation" novalidate action="{{route('vendor-margin.store')}}" enctype="multipart/form-data">
      {{csrf_field()}}

        <div class="form-row col-md-12 mb-4">

          <div class="col-md-12 mb-4">
            <label>Margin Depends Upon Excess Amount</label> 
          </div>

              <div class="col-md-6">
                <div class="form-group row">
                  @if(@$vendor_margin_setup->setup == 1 && $count == 1)
                  <label for="validationCustom01" class="col-sm-6 col-form-label">Block</label>
                  <div class="col-sm-6">
                    <input type="radio" class="static" checked="" name="vendor_margin_setup" value="1">
                  </div>
                  @else
                  <label for="validationCustom01" class="col-sm-6 col-form-label">Block</label>
                  <div class="col-sm-6">
                    <input type="radio" class="static" name="vendor_margin_setup" value="1">
                  </div>
                  @endif
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group row">
                  @if(@$vendor_margin_setup->setup == 2 && $count == 1)
                  <label for="validationCustom01" class="col-sm-6 col-form-label"> Alert</label>
                  <div class="col-sm-6">
                    <input type="radio" class="" checked="" name="vendor_margin_setup" value="2">
                  </div>
                  @else
                  <label for="validationCustom01" class="col-sm-6 col-form-label"> Alert</label>
                  <div class="col-sm-6">
                    <input type="radio" class="" name="vendor_margin_setup" value="2">
                  </div>
                  @endif
                </div>
              </div>    

  </div>
        <div class="col-md-7 text-right">
          <button class="btn btn-success" name="add" type="submit">Submit</button>
        </div>
      </form>
    </div>
    <!-- <script src="{{asset('assets/js/master/capitalize.js')}}"></script> -->
    <!-- card body end@ -->
  </div>
</div>
@endsection

