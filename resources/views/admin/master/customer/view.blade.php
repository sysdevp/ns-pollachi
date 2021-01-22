@extends('admin.layout.app')
@section('content')
<main class="page-content">

<div class="col-12 body-sec">
  <div class="card">
    <!-- card header start@ -->
    <div class="card-header px-2">
      <div class="row">
        <div class="col-4">
          <h3>List Customer</h3>
        </div>
        <div class="col-8 mr-auto">
          <ul class="h-right-btn mb-0 pl-0">
            <li><button type="button" class="btn btn-success"><a href="{{url('master/customer/create')}}">Add Customer</a></button></li>
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
            <th>Company Name</th>
            <th>Customer Name</th>
           <th>Phone No </th>
           <th>Email </th>
           <th>Pan Card </th>
           <th>Gst </th>
           <th>Maximum Credit Limit </th>
           <th>Maximum Credit Days </th>
           <th>Opening Balance </th>
           <th>Price Level </th>
         <th>Action </th>
          </tr>
        </thead>
        <tbody>
          
          @foreach($customer as $key=>$value)
            <tr>
              <td>{{ $key+1 }}</td>
              <td>{{ $value->company_name}}</td>
              <td>{{ $value->salutation }} {{ $value->name}}</td>
              
              <td>{{ $value->phone_no}}</td>
              <td>{{ $value->email}}</td>
              <td>{{ $value->pan_card}}</td>
              <td>{{ $value->gst_no}}</td>
              <td>{{ $value->max_credit_limit}}</td>
              <td>{{ $value->max_credit_days}}</td>
              <td>{{ $value->opening_balance}}</td>
              <td>{{ $value->price_level}}</td>
              <td class="icon">
	<span class="tdshow">
                <a href="{{url('master/customer/show/'.$value->id )}}" class="px-1 py-0 text-white rounded" title="View">><i class="fa fa-eye" aria-hidden="true"></i></a>
                <a href="{{url('master/customer/edit/'.$value->id )}}" class="px-1 py-0  text-white rounded" title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                <a onclick="return confirm('Are you sure ?')" href="{{url('master/customer/delete/'.$value->id )}}" class="px-1 py-0  text-white rounded" title="Delete"><i class="fa fa-trash" aria-hidden="true"></i></a>
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