@extends('admin.layout.app')
@section('content')
<main class="page-content">

<div class="col-12 body-sec">
  <div class="card">
    <!-- card header start@ -->
    <div class="card-header px-2">
      <div class="row">
        <div class="col-4">
          <h3>List Category Name</h3>
        </div>
        <div class="col-8 mr-auto">
          @if(count($category_name) == 0)
          <ul class="h-right-btn mb-0 pl-0">
            <li><button type="button" class="btn btn-success"><a href="{{url('master/category-name/create')}}">Add Category Name</a></button></li>
          </ul>
          @endif
        </div>
      </div>
    </div>
    <!-- card header end@ -->
    <div class="card-body">
      <table id="master" class="table table-bordered table-hover">
        <thead>
          <tr>
            <th>S.No</th>
            <th>Category Name 1</th>
            <th>Category Name 2</th>
            <th>Category Name 3</th>
            
           <th>Action </th>
          </tr>
        </thead>
        <tbody>
          
          @foreach($category_name as $key=>$value)
            <tr>
              <td>{{ $key+1 }}</td>
              <td>{{ $value->category_1}}</td>
              <td>{{ $value->category_2}}</td>
              <td>{{ $value->category_3}}</td>
              
           
              <td> 
                <a href="{{url('master/category-name/show/'.$value->id )}}" class="px-1 py-0 text-white rounded" title="View">><i class="fa fa-eye" aria-hidden="true"></i></a>
                <a href="{{url('master/category-name/edit/'.$value->id )}}" class="px-1 py-0  text-white rounded" title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                <!--<a onclick="return confirm('Are you sure ?')" href="{{url('master/category-name/delete/'.$value->id )}}" class="px-1 py-0  text-white rounded" title="Delete"><i class="fa fa-trash" aria-hidden="true"></i></a>-->
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