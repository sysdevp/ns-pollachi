@extends('admin.layout.app')
@section('content')
<div class="col-12 body-sec">
  <div class="card">
    <!-- card header start@ -->
    <div class="card-header px-2">
      <div class="row">
        <div class="col-4">
          <h3>List Area</h3>
        </div>
        <div class="col-8 mr-auto">
          <ul class="h-right-btn mb-0 pl-0">
            <li><button type="button" class="btn btn-success"><a href="{{url('master/area/create')}}">Add Area</a></button></li>
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
            <th>Name</th>
            <th>Code</th>
            <th>Remarks</th>
            <th>Action </th>
          </tr>
        </thead>
        <tbody>
          
          @foreach($area as $key=>$value)
            <tr>
              <td>{{ $key+1 }}</td>
              <td>{{ $value->name}}</td>
              <td>{{ $value->code}}</td>
              <td>{{ $value->remark}}</td>
              <td> 
                <a href="{{url('master/area/show/'.$value->id )}}" class="px-1 py-0 bg-info text-white rounded"><i class="fa fa-eye" aria-hidden="true"></i></a>
                <a href="{{url('master/area/edit/'.$value->id )}}" class="px-1 py-0 bg-success text-white rounded"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                <a onclick="return confirm('Are you sure ?')" href="{{url('master/area/delete/'.$value->id )}}" class="px-1 py-0 bg-danger text-white rounded"><i class="fa fa-trash" aria-hidden="true"></i></a>
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