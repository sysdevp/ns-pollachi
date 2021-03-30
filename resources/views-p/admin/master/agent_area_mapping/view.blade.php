@extends('admin.layout.app')
@section('content')
<main class="page-content">

<div class="col-12 body-sec">
  <div class="card">
    <!-- card header start@ -->
    <div class="card-header px-2">
      <div class="row">
        <div class="col-4">
          <h3>List Agent and Area Mapping</h3>
        </div>
        <div class="col-8 mr-auto">
          <ul class="h-right-btn mb-0 pl-0">
            <li><button type="button" class="btn btn-success"><a href="{{url('master/agent-area-mapping/create')}}">Add Agent and Area mapping</a></button></li>
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
            <th>Agent Name</th>
            <th>Area Name</th>
          
            <th>Action </th>
          </tr>
        </thead>
        <tbody>
          
          @foreach($agent_area_mapping as $key=>$value)
          
       
            <tr>
              <td>{{ $key+1 }}</td>
              <td>{{ $value->agent->name}}</td>
              <td>{{ $value->agent->name}}</td>
             
              <td>{{ $value->agent_id}}</td>
              <td class="icon">
	<span class="tdshow">
                <a href="{{url('master/agent-area-mapping/show/'.$value->id )}}" class="px-1 py-0 bg-info text-white rounded"><i class="fa fa-eye" aria-hidden="true"></i></a>
                <a href="{{url('master/agent-area-mapping/edit/'.$value->id )}}" class="px-1 py-0 bg-success text-white rounded"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                <a onclick="return confirm('Are you sure ?')" href="{{url('master/agent-area-mapping/delete/'.$value->id )}}" class="px-1 py-0 bg-danger text-white rounded"><i class="fa fa-trash" aria-hidden="true"></i></a>
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