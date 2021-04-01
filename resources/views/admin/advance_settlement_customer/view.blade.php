@extends('admin.layout.app')
@section('content')
<main class="page-content">

<div class="col-12 body-sec">
  <div class="card">
    <!-- card header start@ -->
    <div class="card-header px-2">
      <div class="row">
        <div class="col-4">
          <h3>Advance Payment from Customers</h3>
        </div>
        <div class="col-8 mr-auto">
          <ul class="h-right-btn mb-0 pl-0">
            <li><button type="button" class="btn btn-success"><a href="{{url('advance_settlement_customer/create')}}">Add Advance Receipt</a></button></li>
          </ul>
        </div>
      </div>
    </div>
    <!-- card header end@ -->
    <div class="card-body">
      <table id="master" class="table table-bordered table-hover AdvancePaymentfromCustomers">
        <thead>
          <tr>
            <th>S.No</th>
            <th>Supplier Name</th>
            <th>Receipt Date </th>
            <th>Voucher No </th>
            <th>Advance Amount </th>
            <th>Actions </th>
          </tr>
        </thead>
        <tbody>
          
          @foreach($advances as $key=>$value)
            <tr>
              <td>{{ $key+1 }}</td>
              <td>{{ $value->customer->name}}</td>
              <td>{{ $value->receipt_date}}</td>
              <td>{{ $value->voucher_no}}</td>
              <td>{{ $value->advance_amount}}</td>
               <td class="icon">
	<span class="tdshow">
               
                <a href="{{route('advance_settlement_customer.edit',$value->id)}}" class="px-1 py-0  text-white rounded" title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                <a onclick="return confirm('Are you sure ?')" href="{{url('advance_settlement_customer/delete/'.$value->id )}}" class="px-1 py-0  text-white rounded" title="Delete"><i class="fa fa-trash" aria-hidden="true"></i></a>
				</span>
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