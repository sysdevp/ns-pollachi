@extends('admin.layout.app')
@section('content')
<div class="col-12 body-sec">
  <div class="card">
    <!-- card header start@ -->
    <div class="card-header px-2">
      <div class="row">
        <div class="col-4">
          <h3>Item Details</h3>
        </div>
        <div class="col-8 mr-auto">
          <ul class="h-right-btn mb-0 pl-0">
            <li><button type="button" class="btn btn-success"><a href="{{ url('delivery_note/index/0') }}">Back</a></button></li>
          </ul>
        </div>
      </div>
    </div>
    <!-- card header end@ -->
    <div class="card-body">
      <table id="master" class="table table-striped table-bordered" style="width:100%">
        <thead>
          <tr>
            <th>S.No</th>
            <th>Item Bill S.No</th>
           <th>Item Name</th>
           <th>MRP</th>
           <th>HSN</th>
           <th>Tax</th>
           <th>Rate Exclusive Tax</th>
           <th>Rate Inclusive Tax</th>
           <th>Quantity</th>
           <th>UOM</th>
           <th>Amount</th>
           <th>Tax Rs</th>
           <th>Discount</th>
           <th>Net Price</th>
           <!-- <th>Action</th> -->
          </tr>
        </thead>
        <tbody>
          
          @foreach($item_details as $key => $value)
            <tr>
              <td>{{ $key+1 }}</td>
              <td>{{ $value->item_sno }}</td>
              @if(isset($value->item->name) && !empty($value->item->name))
              <td>{{ $value->item->name }}</td>
              @else
              <td></td>
              @endif
              <td>{{ $value->mrp }}</td>
              @if(isset($value->item->hsn) && !empty($value->item->hsn))
              <td>{{ $value->item->hsn }}</td>
              @else
              <td></td>
              @endif
              <td>{{ $value->gst }}</td>
              <td>{{ $value->rate_exclusive_tax }}</td>
              <td>{{ $value->rate_inclusive_tax }}</td>
              <td>{{ $value->qty }}</td>
              @if(isset($value->uom->name) && !empty($value->uom->name))
              <td>{{ $value->uom->name }}</td>
              @else
              <td></td>
              @endif
              <td>{{ $amount[$key] }}</td>
              <td>{{ $gst_rs[$key] }}</td>
              <td>{{ $value->discount }}</td>
              <td>{{ $net_value[$key] }}</td>
              <!-- <td> 
                <a href="" class="px-2 py-1 bg-info text-white rounded"><i class="fa fa-eye" aria-hidden="true"></i></a>
                <a href="" class="px-2 py-1 bg-success text-white rounded"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                <a onclick="return confirm('Are you sure ?')" href="" class="px-2 py-1 bg-danger text-white rounded"><i class="fa fa-trash" aria-hidden="true"></i></a>
              </td> -->
            </tr>
            @endforeach
        </tbody>
      </table>

    </div>
    <!-- card body end@ -->
  </div>
</div>
@endsection