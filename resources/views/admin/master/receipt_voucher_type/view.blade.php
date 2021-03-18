@extends('admin.layout.app')
@section('content')
<main class="page-content">

<div class="col-12 body-sec">
  <div class="card">
    <!-- card header start@ -->
    <div class="card-header px-2">
      <div class="row">
        <div class="col-4">
          <h3>Receipt Voucher Type</h3>
        </div>
        <div class="col-8 mr-auto">
          <ul class="h-right-btn mb-0 pl-0">
            <li><button type="button" class="btn btn-success"><a href="{{route('receipt-voucher-type.create')}}">Add Receipt Voucher Type</a></button></li>
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
            <th>Receipt Voucher Name</th>
            <th>Type</th>
            <th>Prefix</th>
            <th>Suffix</th>
            <th>Starting No</th>
            <th>No Digits</th>
           <th>Action </th>
          </tr>
        </thead>
        <tbody>
          
          @foreach($voucher_data as $key => $value)
            <tr>
              <td>{{ $key+1 }}</td>
              <td>{{ $value->name }}</td>
              <td>{{ $value->type }}</td>
              <td>{{ $value->prefix }}</td>
              <td>{{ $value->suffix }}</td>
              <td>{{ $value->starting_no }}</td>
              <td>{{ $value->no_digits }}</td>
              <td class="icon">
	<span class="tdshow">
                <a href="{{ route('receipt-voucher-type.show',$value->id) }}" class="px-1 py-0 text-white rounded" title="View"><i class="fa fa-eye" aria-hidden="true"></i></a>
                <a href="{{ route('receipt-voucher-type.edit',$value->id) }}" class="px-1 py-0  text-white rounded" title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                <a onclick="return confirm('Are you sure ?')" href="{{ url('receipt-voucher-type/delete/'.$value->id ) }}" class="px-1 py-0  text-white rounded" title="Delete"><i class="fa fa-trash" aria-hidden="true"></i></a>
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