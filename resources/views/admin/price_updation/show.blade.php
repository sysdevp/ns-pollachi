@extends('admin.layout.app')
@section('content')
<main class="page-content">

<div class="col-12 body-sec">
  <div class="card container px-0">
    <!-- card header start@ -->
    <div class="card-header px-2">
      <div class="row">
        <div class="col-4">
          <h3>View Price Updations</h3>
        </div>
        <div class="col-8 mr-auto">
          <ul class="h-right-btn mb-0 pl-0">
            <li><button type="button" class="btn btn-success"><a href="{{route('price_updation.index')}}">Back</a></button></li>
          </ul>
        </div>
      </div>
    </div>
    <!-- card header end@ -->
    <div class="card-body">
      <div class="row col-md-12">

            <div class="col-md-6">
              <div class="form-group row">
            <label for="validationCustom01" class="col-sm-5 col-form-label">With Effective From :</label>
            <label for="validationCustom01" class="col-sm-4 col-form-label"> {{ $updations->effective_from }}</label>
          </div>
              </div>
                                 

          <div class="col-md-6">
            <div class="form-group row">
            <label for="validationCustom01" class="col-sm-4 col-form-label">Category Name :</label>
            <label for="validationCustom01" class="col-sm-4 col-form-label"> {{ @$updations->item->categories->name }}</label>
          </div>
              </div>
            </div>

            <div class="row col-md-12">

            <div class="col-md-6">
              <div class="form-group row">
            <label for="validationCustom01" class="col-sm-4 col-form-label">Brand Name :</label>
            <label for="validationCustom01" class="col-sm-4 col-form-label"> 
              @if(@$updations->item->brand->name != 0)
              {{ @$updations->item->brand->name }}
              @else 
              Not Applicable 
              @endif
            </label>
          </div>
              </div>
                                 

          <div class="col-md-6">
            <div class="form-group row">
            <label for="validationCustom01" class="col-sm-4 col-form-label">Item Name :</label>
            <label for="validationCustom01" class="col-sm-4 col-form-label"> {{ @$updations->item->name }}</label>
          </div>
              </div>
            </div>


            <div class="card-body" style="height: 100%;">
      <table class="table table-responsive table-striped table-bordered" height=250>
        <thead>
          <tr>
            <th>S.No</th>
            <th>Item Code </th>
            <th>Item Name </th>
            <th>MRP</th>
            <th>HSN</th>
            <th>Last Purchase Cost</th>
            <th>Mark Up Type</th>
            <th>Mark Up Value</th>
            <th>Mark Down Type</th>
            <th>Mark Down Value</th>
            <th>Selling Price</th>
          </tr>
        </thead>
        <tbody class="append_item" id="myTable">
          <tr class="row_category" id=""><td><font style="font-family: Times new roman;">1</font></td><td><input type="hidden" value="{{ $updations->item_id }}" class="append_item_id1" name="item_id"><input type="hidden" value="{{ @$updations->item->code }}" class="actual_item_code1" name="item_code"><input type="hidden" value="{{ @$updations->item->code }}" class="append_item_code1"><font class="item_code1" style="font-family: Times new roman;">{{ @$updations->item->code }}</font></td><td><input type="hidden" value="{{ @$updations->item->name }}" class="actual_item_name1" name="item_name"><input type="hidden" value="{{ @$updations->item->name }}" class="append_item_name1"><font class="item_name1" style="font-family: Times new roman;">{{ @$updations->item->name }}</font></td><td><font style="font-family: Times new roman;">{{ @$updations->item->mrp }}</font></td><td><font style="font-family: Times new roman;">{{ @$updations->item->hsn }}</font></td><td><font style="font-family: Times new roman;">{{ @$item_rate }}</font></td><td><input type="hidden" class="append_mark_up_percent1" name="mark_up_percent" value="{{ @$updations->mark_up_type }}"><font class="mark_up_percent1" style="font-family: Times new roman;">@if(@$updations->mark_up_type == 1)Percentage @elseif(@$updations->mark_up_type == 2) Rupee @endif</font></td><td><input type="hidden" class="append_mark_up_rs1" name="mark_up_rs" value="{{ @$updations->mark_up_value }}"><font class="mark_up_rs1" style="font-family: Times new roman;">{{ @$updations->mark_up_value }}</font></td><td><input type="hidden" class="append_mark_down_percent1" name="mark_down_percent" value="{{ @$updations->mark_down_type }}"><font class="mark_down_percent1" style="font-family: Times new roman;">@if(@$updations->mark_down_type == 1)Percentage @elseif(@$updations->mark_down_type == 2) Rupee @endif</font></td><td><input type="hidden" class="append_mark_down_rs1" name="mark_down_rs" value="{{ @$updations->mark_down_value }}"><font class="mark_down_rs1" style="font-family: Times new roman;">{{ @$updations->mark_down_value }}</font></td><td><input type="hidden" value="{{ @$selling_price }}" class="actual_updated_selling_price1"><input type="hidden" value="{{ @$selling_price }}" class="append_updated_selling_price1" name="updated_selling_price"><font style="font-family: Times new roman;" class="updated_selling_price1">{{ $selling_price }}</font></td></tr>
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