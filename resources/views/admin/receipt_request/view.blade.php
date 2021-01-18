@extends('admin.layout.app')
@section('content')
<main class="page-content">

<div class="col-12 body-sec">
  <div class="card">
    <!-- card header start@ -->
    <div class="card-header px-2">
      <div class="row">
        <div class="col-4">
          <h3>List Receipt Request</h3>
        </div>
        <div class="col-8 mr-auto">
          <ul class="h-right-btn mb-0 pl-0">
            <li><button type="button" class="btn btn-success"><a href="{{ route('receipt_request.create') }}">Receipt Request</a></button></li>
          </ul>
        </div>
      </div>
    </div>
    <!-- card header end@ -->
    <div class="card-body">
      <table id="master" class="table table-bordered table-hover">
        <thead>
          <tr>
            <th>S.No</th>
            <th>Party Name </th>
            <th>Request No </th>
            <th>Request Date</th>
            <th>Bill No</th>
            <th>Bill Date</th>
            <th>Paid Amount</th>
           <th>Action </th>
          </tr>
        </thead>
       <tbody>
		 @foreach($receipt_request as $key=>$value)
            <tr>
              <td>{{ $key+1 }}</td>
			  @if(isset($value->supplier_det->name) && !empty($value->supplier_det->name))
              <td>{{ $value->supplier_det->name }}</td>
              @else
              <td></td>
              @endif
              <td>{{ $value->request_no}}</td>
              <td>{{ $value->request_date}}</td>
              <td>{{ $value->purchase_id}}</td>
              <td>{{ $value->purchase_id}}</td>
              <td>{{ $value->request_amount}}</td>
              
              <td class="icon">
	<span class="tdshow"> 
                <a href="" class="px-1 py-0 text-white rounded" title="View">><i class="fa fa-eye" aria-hidden="true"></i></a>
                <a href="" class="px-1 py-0  text-white rounded" title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                <a href="" onclick="return confirm('Are you sure ?')" class="px-1 py-0  text-white rounded" title="Delete"><i class="fa fa-trash" aria-hidden="true"></i></a> 
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