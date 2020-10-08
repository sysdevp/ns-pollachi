@extends('admin.layout.app')
@section('content')
<div class="col-12 body-sec">
  <div class="card">
    <!-- card header start@ -->
    <div class="card-header px-2">
      <div class="row">
        <div class="col-4">
          <h3>List Sales Gatepass Entry</h3>
        </div>
        <div class="col-8 mr-auto">
          <ul class="h-right-btn mb-0 pl-0">
            @if($check_id != 1)
            <li><button type="button" class="btn btn-success"><a href="{{ route('sales_gatepass_entry.create') }}">Sales Gatepass Entry</a></button></li>
            @else
            @endif
          </ul>
        </div>
      </div>
    </div>
    <!-- card header end@ -->
    <div class="card-body">
      <table id="master" class="table table-striped table-bordered" style="width:100%">
        <thead>
          <tr>
            <th>S.No</th>
            <th>Voucher No </th>
            <th>Voucher Date </th>
            <th>Customer Name</th>
            <th>Load Live</th>
            <th>Unload Live</th>
            <th>Load Bill</th>
            <th>Unload Bill</th>
           <th>Action </th>
          </tr>
        </thead>
        <tbody>
          @foreach($sales_gatepass as $key => $value)
            <tr>
              <td>{{ $key+1 }}</td>
              <td>{{ $value->sales_gatepass_no }}</td>
              <td>{{ $value->sales_gatepass_date }}</td>
              @if(isset($value->customer->name) && !empty($value->customer->name))
              <td>{{ $value->customer->name }}</td>
              @else
              <td></td>
              @endif
              
              <td>{{ $value->load_live }}</td>
              <td>{{ $value->unload_live }}</td>
              <td>{{ $value->load_bill }}</td>
              <td>{{ $value->unload_bill }}</td>
              <td> 
                <a href="{{ route('sales_gatepass_entry.show',$value->sales_gatepass_no) }}" class="px-2 py-1 bg-info text-white rounded"><i class="fa fa-eye" aria-hidden="true"></i></a>
                <a href="{{ route('sales_gatepass_entry.edit',$value->sales_gatepass_no) }}" class="px-2 py-1 bg-success text-white rounded"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                <a href="{{url('sales_gatepass_entry/delete/'.$value->sales_gatepass_no )}}" onclick="return confirm('Are you sure ?')" class="px-2 py-1 bg-danger text-white rounded"><i class="fa fa-trash" aria-hidden="true"></i></a>

                
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