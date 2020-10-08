@extends('admin.layout.app')
@section('content')
<div class="col-12 body-sec">
  <div class="card">
    <!-- card header start@ -->
    <div class="card-header px-2">
      <div class="row">
        <div class="col-4">
          <h3>List Supplier</h3>
        </div>
        <div class="col-8 mr-auto">
          <ul class="h-right-btn mb-0 pl-0">
            <li><button type="button" class="btn btn-success"><a href="{{url('master/supplier/create')}}">Add Supplier</a></button></li>
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
            <th>Company Name</th>
            <th>Supplier Name</th>
           <th>Phone No </th>
           <th>Whatsapp No </th>
           <th>Email </th>
           <th>Gst </th>
           <th>Opening Balance </th>
            <th>Action </th>
          </tr>
        </thead>
        <tbody>
          
          @foreach($supplier as $key=>$value)
            <tr>
              <td>{{ $key+1 }}</td>
              <td>{{ $value->company_name}}</td>
              <td>{{ $value->salutation }} {{ $value->name}}</td>
              
              <td>{{ $value->phone_no}}</td>
              <td>{{ $value->whatsapp_no}}</td>
              <td>{{ $value->email}}</td>
              
              <td>{{ $value->gst_no}}</td>
              
              <td>{{ $value->opening_balance}}</td>
             
              <td> 
                <a href="{{url('master/supplier/show/'.$value->id )}}" class="px-2 py-1 bg-info text-white rounded"><i class="fa fa-eye" aria-hidden="true"></i></a>
                <a href="{{url('master/supplier/edit/'.$value->id )}}" class="px-2 py-1 bg-success text-white rounded"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                <a onclick="return confirm('Are you sure ?')" href="{{url('master/supplier/delete/'.$value->id )}}" class="px-2 py-1 bg-danger text-white rounded"><i class="fa fa-trash" aria-hidden="true"></i></a>
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