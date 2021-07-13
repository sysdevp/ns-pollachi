@extends('admin.layout.app')
@section('content')
<main class="page-content">

<div class="col-12 body-sec">
  <div class="card">
    <!-- card header start@ -->
    <div class="card-header px-2">
      <div class="row">
        <div class="col-4">
          <h3>List Margin Setup</h3>
        </div>
        <div class="col-8 mr-auto">
          <ul class="h-right-btn mb-0 pl-0">
            <li><button type="button" class="btn btn-success"><a href="{{ route('margin-setup.create') }}">Margin Setup</a></button></li>
          </ul>
        </div>
      </div>
    </div>
    <!-- card header end@ -->
    <div class="card-body">
      <table id="master" class="table table-bordered table-hover PriceUpdation">
        <thead>
          <tr>
            <th>S.No</th>
            <th>Vendor Name </th>
           <th>Action </th>
          </tr>
        </thead>
        <tbody>
          @foreach($updations as $key => $value)
            <tr>
              <td>{{ @$key+1 }}</td>
              <td>{{ @$value->supplier->name }}</td>
              <td class="icon">
	<span class="tdshow"> 
                <a href="{{ route('margin-setup.show',@$supplier_id) }}" class="px-1 py-0 text-white rounded" title="View">><i class="fa fa-eye" aria-hidden="true"></i></a>
                <a href="{{ route('margin-setup.edit',@$supplier_id) }}" class="px-1 py-0  text-white rounded" title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                <a href="{{url('margin-setup/delete/'.@$supplier_id )}}" onclick="return confirm('Are you sure ?')" class="px-1 py-0  text-white rounded" title="Delete"><i class="fa fa-trash" aria-hidden="true"></i></a>

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