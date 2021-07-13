@extends('admin.layout.app')
@section('content')
<main class="page-content">

		
	<div class="container-fuild">
    <div id="page-content-wrapper">
<div class="col-12 body-sec">
  <div class="card">
    <!-- card header start@ -->
    <div class="card-header px-2">
      <div class="row">
        <div class="col-4">
          <h3>List State</h3>
        </div>
        <div class="col-8 mr-auto">
          @can('state_create')
          <ul class="h-right-btn mb-0 pl-0">
            <li><button type="button" class="btn"><a target="_blank" href="{{url('master/state/import-data')}}"><i class="fa fa-plus"></i>  Bulk Import</a></button></li>
            <li><button type="button" class="btn"><a href="{{url('master/state/create')}}"><i class="fa fa-plus"></i>  Add State</a></button></li>
          </ul>
          @endcan
        </div>
      </div>
    </div>
    <!-- card header end@ -->
    <div class="card-body">
      <table id="master" class="table table-bordered table-hover State">
        <thead>
          <tr>
            <th>S.No</th>
            <th>Name</th>
            <th>Code</th>
            <th>Remarks</th>
            <th>Action </th>
          </tr>
        </thead>
        <tbody>
          
          @foreach($state as $key=>$value)
            <tr>
              <td>{{ $key+1 }}</td>
              <td>{{ $value->name}}</td>
              <td>{{ $value->code}}</td>
              <td>{{ $value->remark}}</td>
                <td class="icon">
					<span class="tdshow">	
                  @can('state_list')
                <a href="{{url('master/state/show/'.$value->id )}}" class="px-1 py-0 bg-info text-white rounded" title="View"><i class="fa fa-eye" aria-hidden="true"></i></a>
                @endcan
                @can('state_edit')
                <a href="{{url('master/state/edit/'.$value->id )}}" class="px-1 py-0 bg-success text-white rounded" title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                @endcan
                @can('state_delete')
                <a onclick="return confirm('Are you sure ?')" href="{{url('master/state/delete/'.$value->id )}}" class="px-1 py-0 bg-danger text-white rounded" title="Delete"><i class="fa fa-trash" aria-hidden="true"></i></a>
                @endcan
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