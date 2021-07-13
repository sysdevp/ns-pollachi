@extends('admin.layout.app')
@section('content')
<main class="page-content">

<div class="col-12 body-sec">
  <div class="card container px-0">
    <!-- card header start@ -->
    <div class="card-header px-2">
      <div class="row">
        <div class="col-4">
          <h3>View Margin Setup</h3>
        </div>
        <div class="col-8 mr-auto">
          <ul class="h-right-btn mb-0 pl-0">
            <li><button type="button" class="btn btn-success"><a href="{{route('margin-setup.index')}}">Back</a></button></li>
          </ul>
        </div>
      </div>
    </div>
    <!-- card header end@ -->
    <div class="card-body">
      <div class="row col-md-12">

            <div class="col-md-6">
              <div class="form-group row">
            <label for="validationCustom01" class="col-sm-5 col-form-label">Supplier :</label>
            <label for="validationCustom01" class="col-sm-4 col-form-label"> {{ @$supplier }}</label>
          </div>
              </div>
                                 

          


            <div class="card-body" style="height: 100%;">
      <table class="table table-responsive table-striped table-bordered" height=250>
        <thead>
          <tr>
            <th>S.No</th>
            <th>Item Code </th>
            <th>Item Name </th>
            <th>Category </th>
            <th>MRP</th>
            <th>HSN</th>
            <th>Margin Percentage</th>
            <th>Buying Price</th>
          </tr>
        </thead>
        <tbody class="append_item" id="myTable">
          @foreach($updations as $key => $value)
          <tr class="row_category" id=""><td><font style="font-family: Times new roman;">{{++$key}}</font></td><td><input type="hidden" value="{{ @$value->item_id }}" class="append_item_id1" name="item_id"><input type="hidden" value="{{ @$value->item->code }}" class="actual_item_code1" name="item_code"><input type="hidden" value="{{ @$value->item->code }}" class="append_item_code1"><font class="item_code1" style="font-family: Times new roman;">{{ @$value->item->code }}</font></td><td><input type="hidden" value="{{ @$value->item->name }}" class="actual_item_name1" name="item_name"><input type="hidden" value="{{ @$value->item->name }}" class="append_item_name1"><font class="item_name1" style="font-family: Times new roman;">{{ @$value->item->name }}</font></td><td><font style="font-family: Times new roman;">{{ @$value->item->category->name }}</font></td><td><font style="font-family: Times new roman;">{{ @$value->item->mrp }}</font></td><td><font style="font-family: Times new roman;">{{ @$value->item->hsn }}</font></td><td><font style="font-family: Times new roman;">{{ @$value->margin_percentage }}</font></td><td><input type="hidden" value="" class="actual_updated_selling_price1"><input type="hidden" value="" class="append_updated_selling_price1" name="updated_selling_price"><font style="font-family: Times new roman;" class="updated_selling_price1">{{ $value->buying_price }}</font></td></tr>
          @endforeach
        </tbody>
        <tfoot>
              
              
              <th></th>
              <th></th>
              <th></th>
              <th></th>
              <th></th>
              <th></th>
              <th></th>
              <th></th>
              <th></th>
              <th></th>
              <th></th>
            </tfoot>
      </table>
    </div>

    </div>
    <!-- card body end@ -->
  </div>
</div>
@endsection