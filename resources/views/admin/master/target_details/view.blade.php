@extends('admin.layout.app')
@section('content')
<main class="page-content">

<div class="col-12 body-sec">
  <div class="card">
    <!-- card header start@ -->
    <div class="card-header px-2">
      <div class="row">
        <div class="col-4">
          <h3>Sales Man Target Details </h3>
        </div>
        <div class="col-8 mr-auto">
          <ul class="h-right-btn mb-0 pl-0">
            <!-- <li><button type="button" class="btn"><a target="_blank" href="{{url('master/sales-voucher-type/import-data')}}"><i class="fa fa-plus"></i>  Import Data</a></button></li> -->
            <li><button type="button" class="btn btn-success"><a href="{{route('salesman-target-details.create')}}">Assign New Target To Sales Man</a></button></li>
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
            <th>Sales Man Name</th>
            <th>Created Date</th>
            <th>Updated Date</th>
            <th>Total Target Amount</th>
            <th>Total Achieved</th>
           <th>Action </th>
          </tr>
        </thead>
        <tbody>
          
          @foreach(@$target_details as $key => $value)
            <tr>
              <td>{{ @$key+1 }}</td>
              <td>{{ @$value->salesman->name}}</td>
              <td>{{ @$value->created_date }}</td>
              <td>{{ @$value->updated_date }}</td>
              <td>{{ @$total_target_amount[$key] }}</td>
              <td>{{ @$total_achieved[$key] }}</td>
              <td class="icon">
	<span class="tdshow">
                <a href="{{ route('salesman-target-details.show',@$value->target_id) }}" class="px-1 py-0 text-white rounded" title="View"><i class="fa fa-eye" aria-hidden="true"></i></a>
                <a href="{{ route('salesman-target-details.edit',@$value->target_id) }}" class="px-1 py-0  text-white rounded" title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                <a onclick="return confirm('Are you sure ?')" href="{{ url('salesman-target-details/delete/'.@$value->target_id ) }}" class="px-1 py-0  text-white rounded" title="Delete"><i class="fa fa-trash" aria-hidden="true"></i></a>
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