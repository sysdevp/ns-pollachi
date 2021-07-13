@extends('admin.layout.app')
@section('content')
<main class="page-content">

<div class="col-12 body-sec">
  <div class="card">
    <!-- card header start@ -->
    <div class="card-header px-2">
      <div class="row">
        <div class="col-4">
          <h3>List City</h3>
        </div>
        <div class="col-8 mr-auto">
          <ul class="h-right-btn mb-0 pl-0">
            <li><button type="button" class="btn btn-success"><a href="{{url('master/city/create')}}">Add City</a></button></li>
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
            <th>State Name</th>
            <th>District Name</th>
            <th>City Name</th>
            <th>Remarks</th>
            <th>Action </th>
          </tr>
        </thead>
        <tbody>
          
          @foreach($city as $key=>$value)
            <tr>
              <td>{{ $key+1 }}</td>
              <td>{{ isset($value->state->name) && !empty($value->state->name) ? $value->state->name : "" }}</td>
              <td>{{ isset($value->district->name) && !empty($value->district->name) ? $value->district->name : "" }}</td>
               <td>{{ $value->name}}</td>
              <td>{{ $value->remark}}</td>
              <td class="icon">
	<span class="tdshow">
                <a href="{{url('master/city/show/'.$value->id )}}" class="px-1 py-0 text-white rounded" title="View">><i class="fa fa-eye" aria-hidden="true"></i></a>
                <a href="{{url('master/city/edit/'.$value->id )}}" class="px-1 py-0  text-white rounded" title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                <a onclick="return confirm('Are you sure ?')" href="{{url('master/city/delete/'.$value->id )}}" class="px-1 py-0  text-white rounded" title="Delete"><i class="fa fa-trash" aria-hidden="true"></i></a>
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