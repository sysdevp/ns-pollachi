@extends('admin.layout.app')
@section('content')
<main class="page-content">

<div class="col-12 body-sec">
  <div class="card">
    <!-- card header start@ -->
    <div class="card-header px-2">
      <div class="row">
        <div class="col-4">
          <h3>List Agent</h3>
        </div>
        <div class="col-8 mr-auto">
          <ul class="h-right-btn mb-0 pl-0">
            <li><button type="button" class="btn btn-success"><a href="{{url('master/agent/create')}}">Add Agent</a></button></li>
          </ul>
        </div>
      </div>
    </div>
    <!-- card header end@ -->
    <div class="card-body">
      <table id="master" class="table table-striped table-bordered display nowrap" style="width:100%;">
        <thead>
          <tr>
            <th>S.No</th>
            <th>Agent Name</th>
            <th>Agent Code</th>
           <th>Phone No </th>
           <th>Email </th>
         <th>Action </th>
          </tr>
        </thead>
        <tbody>
          
          @foreach($agent as $key=>$value)
            <tr>
              <td>{{ $key+1 }}</td>
              <td>{{ $value->salutation }} {{ $value->name}}</td>
              <td>{{ $value->code}}</td>
              <td>{{ $value->phone_no}}</td>
              <td>{{ $value->email}}</td>
             
           
              <td class="icon">
	<span class="tdshow">
                <a href="{{url('master/agent/show/'.$value->id )}}" class="px-1 py-0 text-white rounded" title="View"><i class="fa fa-eye" aria-hidden="true"></i></a>
                <a href="{{url('master/agent/edit/'.$value->id )}}" class="px-1 py-0  text-white rounded" title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                <a onclick="return confirm('Are you sure ?')" href="{{url('master/agent/delete/'.$value->id )}}" class="px-1 py-0  text-white rounded" title="Delete"><i class="fa fa-trash" aria-hidden="true"></i></a>
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