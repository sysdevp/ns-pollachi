@extends('admin.layout.app')
@section('content')
<main class="page-content">
<div class="container-fuild" style="background:#28a745">
				<div class="text-right pr-3">sdfjsdfjl</div>
		</div>
<div class="col-12 body-sec">
  <div class="card">
    <!-- card header start@ -->
    <div class="card-header px-2">
      <div class="row">
        <div class="col-4">
          <h3>Advance Payment from Suppliers</h3>
        </div>
        <div class="col-8 mr-auto">
          <ul class="h-right-btn mb-0 pl-0">
            <li><button type="button" class="btn btn-success"><a href="{{url('advance_settlement_supplier/create')}}">Add Advance Payment</a></button></li>
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
            <th>Supplier Name</th>
            <th>Payment Date </th>
            <th>Voucher No </th>
            <th>Advance Amount </th>
            <th>Actions </th>
          </tr>
        </thead>
        <tbody>
          
          @foreach($advances as $key=>$value)
            <tr>
              <td>{{ $key+1 }}</td>
              <td>{{ $value->supplier->name}}</td>
              <td>{{ $value->payment_date}}</td>
              <td>{{ $value->voucher_no}}</td>
              <td>{{ $value->advance_amount}}</td>
               <td> 
               
                <a href="{{route('advance_settlement_supplier.edit',$value->id)}}" class="px-2 py-1 bg-success text-white rounded"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                <a onclick="return confirm('Are you sure ?')" href="{{url('advance_settlement_supplier/delete/'.$value->id )}}" class="px-2 py-1 bg-danger text-white rounded"><i class="fa fa-trash" aria-hidden="true"></i></a>
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