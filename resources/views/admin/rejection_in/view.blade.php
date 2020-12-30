@extends('admin.layout.app')
@section('content')
<main class="page-content">

<div class="col-12 body-sec">
  <div class="card">
    <!-- card header start@ -->
    <div class="card-header px-2">
      <div class="row">
        <div class="col-4">
          <h3>List Rejection In</h3>
        </div>
        <div class="col-8 mr-auto">
          <ul class="h-right-btn mb-0 pl-0">
            @if($check_id != 1)
            <li><button type="button" class="btn btn-success"><a href="{{ route('rejection_in.create') }}">Rejection In</a></button></li>
            @else
            @endif
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
            <th>Voucher No </th>
            <th>Voucher Date </th>
            <th>Sale Entry No </th>
            <th>Sale Entry Date </th>
            <th>Delivery Note No</th>
            <th>Delivery Note Date</th>
            <th>Sale Order No</th>
            <th>Sale Order Date</th>
            <th>Customer Name</th>
            <th>Sales Man Name</th>
            <th>Location</th>
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
          @foreach($rejection_in as $key => $value)
            <tr>
              <td>{{ $key+1 }}</td>
              <td>{{ $value->r_in_no }}</td>
              <td>{{ $value->r_in_date }}</td>
              <td>{{ $value->s_no }}</td>
              <td>{{ $value->s_date }}</td>
              <td>{{ $value->d_no }}</td>
              <td>{{ $value->d_date }}</td>
              <td></td>
              <td></td>
              @if(isset($value->customer->name) && !empty($value->customer->name))
              <td>{{ $value->customer->name }}</td>
              @else
              <td></td>
              @endif
              @if(isset($value->salesman->name) && !empty($value->salesman->name))
              <td>{{ $value->salesman->name }}</td>
              @else
              <td></td>
              @endif
              <td>{{ @$value->locations->name }}</td>
              <td>{{ $total_discount[$key] }}</td>
              <!-- <td>{{ $value->round_off }}</td> -->
              <td>{{ $expense_total[$key] }}</td>
              <td>{{ $taxable_value[$key] }}</td>
              <td>{{ $tax_value[$key] }}</td>
              <td>{{ $total[$key] }}</td>
              <td> 
                <!-- <a href="{{ route('rejection_in.show',$value->r_in_no) }}" class="px-2 py-1 bg-info text-white rounded"><i class="fa fa-eye" aria-hidden="true"></i></a> -->
                @if($value->cancel_status == 0)
                @if($value->d_no == '')
                <a href="{{url('rejection_in/delete/'.$value->s_no )}}" onclick="return confirm('Are you sure ?')" class="px-2 py-1 bg-danger text-white rounded"><i class="fa fa-trash" aria-hidden="true"></i></a>
                @else
                <a href="{{url('rejection_in/delete/'.$value->d_no )}}" onclick="return confirm('Are you sure ?')" class="px-2 py-1 bg-danger text-white rounded"><i class="fa fa-trash" aria-hidden="true"></i></a>
                @endif
                <a href="{{ url('rejection_in/cancel/'.$value->r_in_no) }}" class="px-2 py-1 bg-warning text-white rounded">Cancel</a>
                <br><br>
                <a href="{{url('rejection_in/item_details/'.$value->r_in_no )}}" class="px-1 py-0 bg-info text-white rounded"><i class="fa fa-eye" aria-hidden="true"></i>Rejected Item Details</a>
                <a href="{{url('rejection_in/expense_details/'.$value->r_in_no )}}" class="px-1 py-0 bg-info text-white rounded"><i class="fa fa-eye" aria-hidden="true"></i>Expense Details</a>
                @else
                <a href="{{ url('rejection_in/retrieve/'.$value->r_in_no) }}" class="px-2 py-1 bg-primary text-white rounded">Retrieve</a>
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