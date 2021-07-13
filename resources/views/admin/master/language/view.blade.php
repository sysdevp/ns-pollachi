@extends('admin.layout.app')
@section('content')
<main class="page-content">

<div class="col-12 body-sec">
  <div class="card">
    <!-- card header start@ -->
    <div class="card-header px-2">
      <div class="row">
        <div class="col-4">
          <h3>List Language</h3>
        </div>
        <!-- <div class="col-8 mr-auto">
          @if(count($language) > 0)
          <ul class="h-right-btn mb-0 pl-0">
            <li><button type="button" class="btn btn-success"><a href="{{url('master/language/create')}}">Add Language</a></button></li>
          </ul>
          @endif
        </div> -->
      </div>
    </div>
    <!-- card header end@ -->
    <div class="card-body">
      <table id="master" class="table table-bordered table-hover Language">
        <thead>
          <tr>
            <th>S.No</th>
            <th>Language 1</th>
            <th>Language 2</th>
            <th>Language 3</th>
            
           <th>Action </th>
          </tr>
        </thead>
        <tbody>
          
          @foreach($language as $key=>$value)
            <tr>
              <td>{{ $key+1 }}</td>
              <td>{{ $value->language_1}}</td>
              <td>{{ $value->language_2}}</td>
              <td>{{ $value->language_3}}</td>
              
           
              <td class="icon">
	<span class="tdshow">
                <a href="{{url('master/language/show/'.$value->id )}}" class="px-1 py-0 text-white rounded" title="View">><i class="fa fa-eye" aria-hidden="true"></i></a>
                <a href="{{url('master/language/edit/'.$value->id )}}" class="px-1 py-0  text-white rounded" title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                <!--<a onclick="return confirm('Are you sure ?')" href="{{url('master/languagedelete/'.$value->id )}}" class="px-1 py-0  text-white rounded" title="Delete"><i class="fa fa-trash" aria-hidden="true"></i></a>-->
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