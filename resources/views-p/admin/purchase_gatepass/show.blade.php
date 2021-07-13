@extends('admin.layout.app')
@section('content')
<main class="page-content">

<div class="col-12 body-sec">
  <div class="card container px-0">
    <!-- card header start@ -->
    <div class="card-header px-2">
      <div class="row">
        <div class="col-4">
          <h3>View Purchase GatepassEntry Data</h3>
        </div>
        <div class="col-8 mr-auto">
          <ul class="h-right-btn mb-0 pl-0">
            <li><button type="button" class="btn btn-success"><a href="{{url('purchase_gatepass_entry/index/0')}}">Back</a></button></li>
          </ul>
        </div>
      </div>
    </div>
    <!-- card header end@ -->
    <div class="card-body">
      <div class="row col-md-12">

            <div class="col-md-6">
              <div class="form-group row">
            <label for="validationCustom01" class="col-sm-4 col-form-label">Voucher No :</label>
            <label for="validationCustom01" class="col-sm-4 col-form-label"> {{ $purchase_gatepass->purchase_gatepass_no }}</label>
          </div>
              </div>
                                 

          <div class="col-md-6">
            <div class="form-group row">
            <label for="validationCustom01" class="col-sm-4 col-form-label">Voucher Date :</label>
            <label for="validationCustom01" class="col-sm-4 col-form-label"> {{ $purchase_gatepass->purchase_gatepass_date }}</label>
          </div>
              </div>
            </div>

            <div class="row col-md-12">

            <div class="col-md-6">
              <div class="form-group row">
            <label for="validationCustom01" class="col-sm-4 col-form-label">Purchase Order No :</label>
            <label for="validationCustom01" class="col-sm-4 col-form-label"> {{ $purchase_gatepass->po_no }}</label>
          </div>
              </div>
                                 

          <div class="col-md-6">
            <div class="form-group row">
            <label for="validationCustom01" class="col-sm-4 col-form-label">Purchase Order Date :</label>
            <label for="validationCustom01" class="col-sm-4 col-form-label"> {{ $purchase_gatepass->po_date }}</label>
          </div>
              </div>
            </div>



            <div class="row col-md-12">

            <div class="col-md-6">
              <div class="form-group row">
            <label for="validationCustom01" class="col-sm-4 col-form-label">Party Name :</label>
            <label for="validationCustom01" class="col-sm-4 col-form-label"> 
              @if(isset($purchase_gatepass->supplier->name) && !empty($purchase_gatepass->supplier->name))
              {{ $purchase_gatepass->supplier->name }}
              @else
               N/A 
              @endif
            </label>
          </div>
              </div>
                                 

          <div class="col-md-6">
            <div class="form-group row">
            <label for="validationCustom01" class="col-sm-4 col-form-label">Party Address :</label>
            <label for="validationCustom01" class="col-sm-4 col-form-label"> {{ $address }}</label>
          </div>
              </div>
            </div>

            <div class="row col-md-12">

            <div class="col-md-6">
              <div class="form-group row">
            <label for="validationCustom01" class="col-sm-4 col-form-label">Estimation No :</label>
            <label for="validationCustom01" class="col-sm-4 col-form-label"> 
              {{ $purchase_gatepass->estimation_no }}
              
            </label>
          </div>
              </div>

              <div class="col-md-6">
              <div class="form-group row">
            <label for="validationCustom01" class="col-sm-4 col-form-label">Estimation Date :</label>
            <label for="validationCustom01" class="col-sm-4 col-form-label"> 
              {{ $purchase_gatepass->estimation_date }}
              
            </label>
          </div>
              </div>
              
            </div>
                        
            <div class="row col-md-12">

            <div class="col-md-6">
              <div class="form-group row">
            <label for="validationCustom01" class="col-sm-4 col-form-label">Load Live :</label>
            <label for="validationCustom01" class="col-sm-4 col-form-label"> {{ $purchase_gatepass->load_live }}</label>
          </div>
              </div>
                                 

          <div class="col-md-6">
            <div class="form-group row">
            <label for="validationCustom01" class="col-sm-4 col-form-label">Unload Live :</label>
            <label for="validationCustom01" class="col-sm-4 col-form-label"> {{ $purchase_gatepass->unload_live }}</label>
          </div>
              </div>
            </div>


          

            <div class="row col-md-12">

            <div class="col-md-6">
              <div class="form-group row">
            <label for="validationCustom01" class="col-sm-4 col-form-label">Load Bill :</label>
            <label for="validationCustom01" class="col-sm-4 col-form-label"> {{ $purchase_gatepass->load_bill }}</label>
          </div>
              </div>
                                 

          <div class="col-md-6">
            <div class="form-group row">
            <label for="validationCustom01" class="col-sm-4 col-form-label">Unload Bill :</label>
            <label for="validationCustom01" class="col-sm-4 col-form-label"> {{$purchase_gatepass->unload_bill}}</label>
          </div>
              </div>
            </div>
                       
    </div>
    <!-- card body end@ -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  </div>
</div>
@endsection