@extends('admin.layout.app')
@section('content')
<main class="page-content">

<div class="col-12 body-sec">
  <div class="card">
    <!-- card header start@ -->
    <div class="card-header px-2">
      <div class="row">
        <div class="col-4">
          <h3>List Receipt Process</h3>
        </div>
        <div class="col-8 mr-auto">
          <ul class="h-right-btn mb-0 pl-0">
            <li><button type="button" class="btn btn-success"><a href="{{ route('receipt_process.create') }}">Receipt Process</a></button></li>
          </ul>
        </div>
      </div>
    </div>
    <!-- card header end@ -->
    <div class="card-body">
      <table id="master" class="table table-bordered table-hover ReceiptProcess">
        <thead>
          <tr>
            <th>S.No</th>
            <th>Party Name </th>
            <th>Request No </th>
            <th>Request Date</th>
            <th>Bill No</th>
            <th>Bill Date</th>
            <th>Requested Amount</th>
            <th>Processed Amount</th>
            <th>Pending Amount</th>
           <th>Action </th>
          </tr>
        </thead>
        <tbody>
            @foreach($receipt_process as $key=> $value)
            <tr>
              <td>{{ $key+1 }}</td>
              <td>{{ $value->customers->name }}</td>
              <td>{{ $value->receipt_request_id }}</td>
              <td>{{ $value->receipt_request_id }}</td>
              <td>{{ $value->voucher_no }}</td>
              <td>{{ $value->voucher_date }}</td>
              <td>{{ $value->r_out_no }}</td>
              <td>{{ $value->net_value }}</td>
              <td>{{ $value->net_value }}</td>
              <td class="icon">
  <span class="tdshow">
                <!-- <a href="" class="px-1 py-0 text-white rounded" title="View">><i class="fa fa-eye" aria-hidden="true"></i></a>
                <a href="" class="px-1 py-0  text-white rounded" title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i></a> -->
                <a href="{{url('receipt_process/delete/'.$value->id )}}" onclick="return confirm('Are you sure ?')" class="px-1 py-0  text-white rounded" title="Delete"><i class="fa fa-trash" aria-hidden="true"></i></a>

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