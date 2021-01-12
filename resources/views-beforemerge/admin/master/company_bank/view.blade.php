@extends('admin.layout.app')
@section('content')
<main class="page-content">

<div class="col-12 body-sec">
  <div class="card">
    <!-- card header start@ -->
    <div class="card-header px-2">
      <div class="row">
        <div class="col-4">
          <h3>List Company Bank</h3>
        </div>
        <div class="col-8 mr-auto">
          <ul class="h-right-btn mb-0 pl-0">
            <li><button type="button" class="btn btn-success"><a href="{{route('company-bank.create')}}">Add Company Bank</a></button></li>
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
            <th>Bank Name</th>
            <th>Branch Name</th>
            <th>Account Type</th>
            <th>Account Holder Name </th>
            <th>Account No</th>
            <th>Action </th>
          </tr>
        </thead>
        <tbody>
          
          
          @foreach($company_bank as $key=> $value)
            <tr>
              <td>{{ $key+1 }}</td>
             <td>{{ $value->bank->name }}</td>
              <td>{{ $value->bank_branch->branch }}</td>
              <td>{{ $value->account_types->name }}</td>
              <td>{{ $value->holder_name }}</td>
              <td>{{ $value->account_no }}</td>
              <td> 
                <a href="{{route('company-bank.show',$value->id )}}" class="px-1 py-0 text-white rounded" title="View">><i class="fa fa-eye" aria-hidden="true"></i></a>
                <a href="{{route('company-bank.edit',$value->id )}}" class="px-1 py-0  text-white rounded" title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                <a onclick="return confirm('Are you sure ?')" href="{{url('company-bank/delete/'.$value->id )}}" class="px-1 py-0  text-white rounded" title="Delete"><i class="fa fa-trash" aria-hidden="true"></i></a>
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