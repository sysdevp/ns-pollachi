@extends('admin.layout.app')
@section('content')
<div class="col-12 body-sec">
  <div class="card container px-0">
    <!-- card header start@ -->
    <div class="card-header px-2">
      <div class="row">
        <div class="col-4">
          <h3>View Item Tax Details</h3>
        </div>
        <div class="col-8 mr-auto">
          <ul class="h-right-btn mb-0 pl-0">
            <li><button type="button" class="btn btn-success"><a href="{{url('master/item-tax-details')}}">Back</a></button></li>
          </ul>
        </div>
      </div>
    </div>

    <!-- card header end@ -->
    <div class="card-body">
      <div class="form-row">
        <div class="col-md-6">
          <div class="form-group row">
            <label for="validationCustom01" class="col-sm-4 col-form-label">Item Name :</label>
            <label for="validationCustom01" class="col-sm-4 col-form-label"> {{ $item_tax_details->item->name }}</label>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group row">
            <label for="validationCustom01" class="col-sm-4 col-form-label">Item Code :</label>
            <label for="validationCustom01" class="col-sm-4 col-form-label">{{ $item_tax_details->item->code }} </label>
          </div>
        </div>

        
            @foreach($tax as $key => $value)
              <div class="col-md-6">
                  <div class="form-group row">
                    <label for="validationCustom01" class="col-sm-4 col-form-label">{{$value->name}} (%) :</label>
                    <label for="validationCustom01" class="col-sm-4 col-form-label">{{ $item_tax_details->value  }} </label>
                  </div>
                </div>
                @endforeach

                    <div class="col-md-6">
                        <div class="form-group row">
                          <label for="validationCustom01" class="col-sm-4 col-form-label">Effective From :</label>
                          <label for="validationCustom01" class="col-sm-4 col-form-label">{{  $item_tax_details->valid_from !="" ? date('d-m-Y',strtotime($item_tax_details->valid_from))  : ""  }} </label>
                        </div>
                      </div>






          


                          

        
      </div>
    </div>
    <!-- card body end@ -->
  </div>
</div>
@endsection