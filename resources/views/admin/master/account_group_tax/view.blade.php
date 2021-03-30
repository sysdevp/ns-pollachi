@extends('admin.layout.app')
@section('content')
<main class="page-content">

<div class="col-12 body-sec">
  <div class="card">
    <!-- card header start@ -->
    <div class="card-header px-2">
      <div class="row">
        <div class="col-4">
          <h3>List Account Group Tax</h3>
        </div>
        <div class="col-8 mr-auto">
          <ul class="h-right-btn mb-0 pl-0">
            <li><button type="button" class="btn"><a target="_blank" href="{{url('master/account_group_tax/import-data')}}"><i class="fa fa-plus"></i>  Bulk Import</a></button></li>
            <li><button type="button" class="btn btn-success"><a href="{{route('account_group_tax.create')}}">Add Account Group Tax</a></button></li>
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
            <th>Account Group Name</th>
            <th>Name Of Tax</th>
            <th>Rate Of Tax</th>
            <th>Type</th>
           <th>Action </th>
          </tr>
        </thead>
        <tbody>
          
          @foreach($account_group_tax as $key => $value)
            <tr>
              <td>{{ $key+1 }}</td>
              @if($value->under == 'Primary')
              <td>Primary</td>
              @else
              @if(isset($value->under_data->name) && !empty($value->under_data->name))
              <td>{{ $value->under_data->name }}</td>
              @endif
              @endif
              <td>{{ @$value->taxes->name }}</td>
              <td>{{ $value->tax_value }}</td>
              @if($value->type == 1)
              <td>Credit</td>
              @elseif($value->type == 2)
              <td>Debit</td>
              @else
              <td></td>
              @endif
               
			  <td class="icon">
	<span class="tdshow">
                <a href="{{ route('account_group_tax.show',$value->id) }}" class="px-1 py-0 text-white rounded" title="View"><i class="fa fa-eye" aria-hidden="true"></i></a>
                <a href="{{ route('account_group_tax.edit',$value->id) }}" class="px-1 py-0  text-white rounded" title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                <a onclick="return confirm('Are you sure ?')" href="{{ url('account_group_tax/delete/'.$value->id ) }}" class="px-1 py-0  text-white rounded" title="Delete"><i class="fa fa-trash" aria-hidden="true"></i></a>
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