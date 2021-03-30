@extends('admin.layout.app')
@section('content')
<main class="page-content">

<div class="col-12 body-sec">
  <div class="card">
    <!-- card header start@ -->
    <div class="card-header px-2">
      <div class="row">
        <div class="col-4">
          <h3>List Mail Settings</h3>
        </div>
        <div class="col-8 mr-auto">
          <ul class="h-right-btn mb-0 pl-0">
            <li><button type="button" class="btn btn-success"><a href="{{url('mailsetting-setup/create')}}">Add Mail</a></button></li>
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
            <th>Mail Driver</th>
            <th>Mail Host</th>
            <th>Mail Port</th>
            <th>Mail Username</th>
            <th>Mail Password</th>
            <th>Mail Encryption</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          
          @foreach($mailsetting as $key=>$value)
            <tr>
              <td>{{ $key+1 }}</td>
              <td>{{ $value->mail_driver}}</td>
              <td>{{ $value->mail_host}}</td>
              <td>{{ $value->mail_port}}</td>
              <td>{{ $value->mail_username}}</td>
              <td>{{ $value->mail_password}}</td>
              <td>{{ $value->mail_encryption}}</td>
           
              <td class="icon">
	<span class="tdshow">
                <a href="{{url('mailsetting-setup/show/'.$value->id )}}" class="px-1 py-0 text-white rounded" title="View">><i class="fa fa-eye" aria-hidden="true"></i></a>
                <a href="{{url('mailsetting-setup/edit/'.$value->id )}}" class="px-1 py-0  text-white rounded" title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                <a onclick="return confirm('Are you sure ?')" href="{{url('mailsetting-setup/delete/'.$value->id )}}" class="px-1 py-0  text-white rounded" title="Delete"><i class="fa fa-trash" aria-hidden="true"></i></a>
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