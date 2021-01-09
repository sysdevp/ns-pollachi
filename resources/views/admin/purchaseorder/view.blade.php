@extends('admin.layout.app')
@section('content')
<main class="page-content">
<div class="col-12 body-sec">
  <div class="card">
    <!-- card header start@ -->
    <div class="card-header px-2">
      <div class="row">
        <div class="col-4">
          <h3>List Purchase Order</h3>
        </div>
        <div class="col-8 mr-auto">
          <ul class="h-right-btn mb-0 pl-0">
            @if($check_id != 1)
            <li><button type="button" class="btn btn-success"><a href="{{ route('purchase_order.create') }}">Purchase Order</a></button></li>
            @else
            @endif
          </ul>
        </div>
      </div>
    </div>
    <div class="card-body">
    <form  method="post" class="form-horizontal needs-validation" novalidate action="{{url('purchase-order-report')}}" enctype="multipart/form-data">
      {{csrf_field()}}
      <div class="col-md-12 row mb-3">

      <div class="col-md-12 form-row mb-3">
            <div class="col-md-2">
              <label>From</label>
            
            <input type="date" class="form-control from" name="from" id="from" value="@if(isset($from)){{$from}}@endif" required>
            </div>

            <div class="col-md-2">
              <label>To</label>
            <input type="date" class="form-control to" name="to" id="to" value="@if(isset($to)){{$to}}@endif" required>
            </div>

           
            <div class="col-md-3">
              <label>Supplier</label>
              <select class="js-example-basic-multiple col-12 form-control custom-select supplier_id" name="supplier_id" id="supplier_id">
              <option value="">Choose Party Name</option>
                           @foreach($supplier as $suppliers)
                           <option value="{{ $suppliers->id }}"@if(isset($cond['supplier_id'])){{($suppliers->id==$cond['supplier_id']) ? 'selected' : '' }}@endif>{{ $suppliers->name }}</option>
                           @endforeach
                            </select>

          </div>
          <div class="col-md-2">
              <label>Location</label>
              <select class="js-example-basic-multiple col-12 form-control custom-select location" name="location" id="location">
                           <option value="">Choose Location</option>
                           @foreach($location as $data)
                           <option value="{{ $data->id }}"@if(isset($cond['location'])){{($suppliers->id==$cond['location']) ? 'selected' : '' }}@endif >{{ $data->name}}</option>
                           @endforeach
                            </select>

          </div>
          <div class="col-md-2">
              <label>Purchase Type</label>
              <select class="js-example-basic col-12 form-control" name="purchase_type" id="purchase_type">
                           <option value="">Choose Purchase Type</option>
                           
                           <option value="1" @if(isset($cond['purchase_type'])){{($cond['purchase_type']==1) ? 'selected' : '' }}@endif>Cash Purchase</option>
                           <option value="0" @if(isset($cond['purchase_type'])){{($cond['purchase_type']==0) ? 'selected' : '' }}@endif>Credit Purchase</option>
                                    </select>

          </div>


          </div>

           <div class="col-md-2">
            <label> </label>
            <input type="submit" class="btn btn-success" name="add" value="Submit">
            
          </div>
        <br>

    </form>

    </div>
    <!-- card header end@ -->
    <div class="card-body">
      <table id="master" class="table table-striped table-bordered" style="width:100%">
        <thead>
          <tr>
            <th>S.No</th>
            <th>Voucher No </th>
            <th>Voucher Date </th>
            <th>Estimation No </th>
            <th>Estimation Date </th>
            <th>Supplier Name</th>
            <th>Location</th>
            <th>Purchase Type</th>
            <th>overall Discount</th>
            <!-- <th>Round Off</th> -->
            <th>Total Expense</th>
            <th>Taxable Value</th>
            <th>Tax Value</th>
            <th>Net Value</th>
           <th>Action </th>
          </tr>
        </thead>
        <tbody>
          @foreach($purchaseorder as $key => $value)
            <tr>
              <td>{{ $key+1 }}</td>
              <td>{{ $value->po_no }}</td>
              <td>{{ $value->po_date }}</td>
              <td>{{ $value->estimation_no }}</td>
              <td>{{ $value->estimation_date }}</td>
              @if(isset($value->supplier->name) && !empty($value->supplier->name))
              <td>{{ $value->supplier->name }}</td>
              @else
              <td></td>
              @endif

              @if(isset($value->locations->name) && !empty($value->locations->name))
              <td>{{ $value->locations->name }}</td>
              @else
              <td></td>
              @endif

              @if($value->purchase_type == 1)
              <td>Cash Purchase</td>
              @else
              <td>Credit Purchase</td>
              @endif
              <td>{{ $total_discount[$key] }}</td>
              <!-- <td>{{ $value->round_off }}</td> -->
              <td>{{ $expense_total[$key] }}</td>
              <td>{{ $taxable_value[$key] }}</td>
              <td>{{ $tax_value[$key] }}</td>
              <td>{{ $total[$key] }}</td>
              <td> 
                @if($value->status == 0)
                <a href="{{ route('purchase_order.show',$value->po_no) }}" class="px-2 py-1 bg-info text-white rounded"><i class="fa fa-eye" aria-hidden="true"></i></a>
                <a href="{{ route('purchase_order.edit',$value->po_no) }}" class="px-2 py-1 bg-success text-white rounded"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                <a href="{{url('purchase_order/delete/'.$value->po_no )}}" onclick="return confirm('Are you sure ?')" class="px-2 py-1 bg-danger text-white rounded"><i class="fa fa-trash" aria-hidden="true"></i></a>

                <a href="{{ url('purchase_order/cancel/'.$value->po_no) }}" class="px-2 py-1 bg-warning text-white rounded">Cancel</a>

                <br><br>
                <a href="{{url('purchase_order/item_details/'.$value->po_no )}}" class="px-1 py-0 bg-info text-white rounded"><i class="fa fa-eye" aria-hidden="true"></i>Item Details</a>
                <a href="{{url('purchase_order/expense_details/'.$value->po_no )}}" class="px-1 py-0 bg-info text-white rounded"><i class="fa fa-eye" aria-hidden="true"></i>Expense Details</a>
                @else
                <a href="{{ url('purchase_order/retrieve/'.$value->po_no) }}" class="px-2 py-1 bg-primary text-white rounded">Retrieve</a>
                @endif
              </td>
            </tr>
            @endforeach
         
        </tbody>
      </table>

    </div>
    <!-- card body end@ -->
  </div>
</div>
@endsection