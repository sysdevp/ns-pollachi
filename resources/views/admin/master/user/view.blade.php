@extends('admin.layout.app')
@section('content')
<main class="page-content">

<div class="col-12 body-sec">
  <div class="card">
    <!-- card header start@ -->
    <div class="card-header px-2">
      <div class="row">
        <div class="col-4">
          <h3>List Users</h3>
        </div>
        <div class="col-8 mr-auto">
         
          <ul class="h-right-btn mb-0 pl-0">
            <li><button type="button" class="btn"><a target="_blank" href="{{url('master/user/import-data')}}"><i class="fa fa-plus"></i>  Bulk Import</a></button></li>
            <li><button type="button" class="btn btn-success"><a href="{{url('master/user/create')}}">Add Users</a></button></li>
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
            <th>User</th>
            <th> User Name</th>
            <th>Role</th>
             <th>Action </th>
          </tr>
        </thead>
        <tbody>
          @php
              $i=0;
          @endphp
          @foreach($users as $key=>$value)
          @if (isset($value->employee->name))
             <tr>
             <td>{{ $key }} </td>
              <td>{{ isset($value->employee->name) ? $value->employee->name : ""}}</td>
              <td>{{ $value->user_name}}</td>
              <td>{{ $value->role->name}}</td>
              
              
           
              <td class="icon">
	<span class="tdshow">
                <a href="{{url('master/user/show/'.$value->id )}}" class="px-1 py-0 text-white rounded" title="View">><i class="fa fa-eye" aria-hidden="true"></i></a>
                <a href="{{url('master/user/edit/'.$value->id )}}" class="px-1 py-0  text-white rounded" title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                <a onclick="return confirm('Are you sure ?')" href="{{url('master/user/delete/'.$value->id )}}" class="px-1 py-0  text-white rounded" title="Delete"><i class="fa fa-trash" aria-hidden="true"></i></a>
				</span>
              </td>
            </tr>
          @endif
          @endforeach
         
        </tbody>
      </table>

    </div>
    <!-- card body end@ -->
  </div>
</div>
@endsection