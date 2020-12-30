@extends('admin.layout.app')
@section('content')
<main class="page-content">
<div class="container-fuild" style="background:#28a745">
				<div class="text-right pr-3">sdfjsdfjl</div>
		</div>
<div class="col-12 body-sec">
  <div class="card">
    <!-- card header start@ -->
    <div class="card-header px-2">
      <div class="row">
        <div class="col-4">
          <h3>List Gift Voucher</h3>
        </div>
        <div class="col-8 mr-auto">
          <ul class="h-right-btn mb-0 pl-0">
            <li><button type="button" class="btn btn-success"><a href="{{url('master/gift-voucher/print')}}">Print</a></button></li>
            <li><button type="button" class="btn btn-success"><a href="{{url('master/gift-voucher/create')}}">Add Gift Voucher</a></button></li>
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
            <th>Gift Voucher Name</th>
            <th>Gift Voucher Code</th>
            <th>Gift Voucher Value</th>
            <th> Voucher Valid From Date</th>
            <th> Voucher Valid To Date</th>
            <th>Remark</th>
           <th>Action </th>
          </tr>
        </thead>
        <tbody>
          
          @foreach($gift_voucher as $key=>$value)
            <tr>
              <td>{{ $key+1 }}</td>
              <td>{{ $value->name}}</td>
              <td>{{ $value->code}}</td>
              <td>{{ $value->value}}</td>
             
              <td>{{ $value->valid_from !="" ? date('d-m-Y',strtotime($value->valid_from)) : ""}}</td>
              <td>{{ $value->valid_to !="" ? date('d-m-Y',strtotime($value->valid_to)) : ""}}</td>
               <td>{{ $value->remark}}</td>
              <td> 
                <a href="{{url('master/gift-voucher/show/'.$value->id )}}" class="px-2 py-1 bg-info text-white rounded"><i class="fa fa-eye" aria-hidden="true"></i></a>
                <a href="{{url('master/gift-voucher/edit/'.$value->id )}}" class="px-2 py-1 bg-success text-white rounded"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                <a onclick="return confirm('Are you sure ?')" href="{{url('master/gift-voucher/delete/'.$value->id )}}" class="px-2 py-1 bg-danger text-white rounded"><i class="fa fa-trash" aria-hidden="true"></i></a>
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