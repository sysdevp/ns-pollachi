@extends('admin.layout.app')
@section('content')
<main class="page-content">

<div class="col-12 body-sec">
  <div class="card">
    <!-- card header start@ -->
    <div class="card-header px-2">
      <div class="row">
        <div class="col-4">
          <h3>List Account Type</h3>
        </div>
        <div class="col-8 mr-auto">
          <ul class="h-right-btn mb-0 pl-0">
            <li><button type="button" class="btn"><a target="_blank" href="{{url('master/accounts-type/import-data')}}"><i class="fa fa-plus"></i>  Bulk Import</a></button></li>
            <li><button type="button" class="btn btn-success"><a href="{{url('master/accounts-type/create')}}">Add Account Type</a></button></li>
          </ul>
        </div>
      </div>
    </div>
    <!-- card header end@ -->
    <div class="card-body">
      <table id="master" class="table table-bordered table-hover AccountsType">
        <thead>
          <tr>
            <th>S.No</th>
            <th>Accounts Type Name</th>
            <th>Remarks</th>
           <th>Action </th>
          </tr>
        </thead>
        <tbody>
          
          @foreach($accounts_type as $key=>$value)
            <tr>
              <td>{{ $key+1 }}</td>
              <td>{{ $value->name}}</td>
              <td>{{ $value->remark}}</td>
           
              <td class="icon">
	<span class="tdshow">
                <a href="{{url('master/accounts-type/show/'.$value->id )}}" class="px-1 py-0 text-white rounded" title="View"><i class="fa fa-eye" aria-hidden="true"></i></a>
                <a href="{{url('master/accounts-type/edit/'.$value->id )}}" class="px-1 py-0  text-white rounded" title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                <a onclick="return confirm('Are you sure ?')" href="{{url('master/accounts-type/delete/'.$value->id )}}" class="px-1 py-0  text-white rounded" title="Delete"><i class="fa fa-trash" aria-hidden="true"></i></a>
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