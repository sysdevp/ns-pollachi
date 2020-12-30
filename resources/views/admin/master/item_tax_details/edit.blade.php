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
          <h3>Edit Item Tax Details </h3>
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
    
      <form  method="post" class="form-horizontal needs-validation" novalidate action="{{url('master/item-tax-details/update/'.$item_tax_details->id)}}" enctype="multipart/form-data">
      {{csrf_field()}}
      @method('PATCH')

        <iv class="form-row">
          <div class="col-md-7">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Item Name</label>
              <div class="col-sm-8">
                <select class="js-example-basic-multiple form-control col-12 custom-select item_id" name="item_id" required>
                  <option value="{{ $item_tax_details->item->id }}">{{ $item_tax_details->item->name }}</option>
                  @foreach($item as $key=> $value)
                  <option value="{{ $value->id }}" >{{ $value->name }}</option>
                  @endforeach
                </select>
                
              </div>
            </div>
          </div>

          <div class="col-md-7">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Tax Name</label>
              <div class="col-sm-8">
                <select class="js-example-basic-multiple form-control col-12 custom-select tax_id" name="tax_id" required>
                  <option value="{{ $item_tax_details->tax->id }}">{{ $item_tax_details->tax->name }}</option>
                  @foreach($tax as $key=> $value)
                  <option value="{{ $value->id }}" >{{ $value->name }}</option>
                  @endforeach
                </select>
                
              </div>
            </div>
          </div>


          <div class="col-md-7">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Tax %</label>
              <div class="col-sm-8">
                <input type="text" class="form-control tax_value" placeholder="Tax %" name="tax_value" value="{{$item_tax_details->value}}">
              </div>
            </div>
          </div>


          <div class="col-md-7">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Effective From</label>
              <div class="col-sm-8">
                <input type="date" class="form-control valid_from" placeholder="GST %" name="valid_from" value="{{$item_tax_details->valid_from}}">
              </div>
            </div>
          </div>

          
         
          
        </div>
        <div class="col-md-7 text-right">
          <button class="btn btn-success" type="submit">Update</button>
        </div>
      </form>
      
    </div>
    <!-- card body end@ -->
  </div>
</div>
@endsection