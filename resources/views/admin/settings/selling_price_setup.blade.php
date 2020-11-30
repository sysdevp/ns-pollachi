@extends('admin.layout.app')
@section('content')
<div class="col-12 body-sec">
  <div class="card container px-0">
    <!-- card header start@ -->
    <div class="card-header px-2">
      <div class="row">
        <div class="col-4">
          <h3>Selling Price Setup</h3>
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
    
      <form  method="post" class="form-horizontal needs-validation" novalidate action="{{route('selling-price-setup.store')}}" enctype="multipart/form-data">
      {{csrf_field()}}

        <div class="form-row col-md-12 mb-4">
              <div class="col-md-6">
                <div class="form-group row">
                  <label for="validationCustom01" class="col-sm-6 col-form-label">Based On Price Defined in Item Master</label>
                  <div class="col-sm-6">
                    <input type="radio" class="static" name="selling_price_setup" value="1">
                  </div>
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group row">
                  <label for="validationCustom01" class="col-sm-6 col-form-label">Based On Last Purchase Cost</label>
                  <div class="col-sm-6">
                    <input type="radio" class="" name="selling_price_setup" value="2">
                  </div>
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

