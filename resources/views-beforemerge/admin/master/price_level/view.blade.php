@extends('admin.layout.app')
@section('content')
<main class="page-content">

<div class="col-12 body-sec">
  <div class="card">
    <!-- card header start@ -->
    <div class="card-header px-2">
      <div class="row">
        <div class="col-4">
          <h3>List Price Level</h3>
        </div>
        <div class="col-8 mr-auto">
          <ul class="h-right-btn mb-0 pl-0">
            <li><button type="button" class="btn btn-success"><a href="{{route('price-level.create')}}">Add Price Level</a></button></li>
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
            <th>Name</th>
            <th>Type</th>
            <th>Value</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          
          @foreach($price_level as $key => $value)
            <tr>
              <td>{{ $key+1 }}</td>
               <td>{{ $value->level }}</td>
               @if($value->type == 1)
                <td>Percentage</td>
                @else
                <td>Rs</td>
                @endif
                <td>{{ $value->value }}</td>
              <td> 
                <a href="{{ route('price-level.show',$value->id) }}" class="px-1 py-0 text-white rounded" title="View">><i class="fa fa-eye" aria-hidden="true"></i></a>
                <a href="{{ route('price-level.edit',$value->id) }}" class="px-1 py-0  text-white rounded" title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                <a onclick="return confirm('Are you sure ?')" href="{{ url('price-level/delete/'.$value->id ) }}" class="px-1 py-0  text-white rounded" title="Delete"><i class="fa fa-trash" aria-hidden="true"></i></a>
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