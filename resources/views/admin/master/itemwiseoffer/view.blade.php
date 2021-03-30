@extends('admin.layout.app')
@section('content')
<main class="page-content">

<div class="col-12 body-sec">
  <div class="card">
    <!-- card header start@ -->
    <div class="card-header px-2">
      <div class="row">
        <div class="col-4">
          <h3>List Itemwise Offers</h3>
        </div>
        <div class="col-8 mr-auto">
          <ul class="h-right-btn mb-0 pl-0">
            <li><button type="button" class="btn"><a target="_blank" href="{{url('master/itemwiseoffer/import-data')}}"><i class="fa fa-plus"></i>  Bulk Import</a></button></li>
            <li><button type="button" class="btn btn-success"><a href="{{url('master/itemwiseoffer/create')}}">Add Itemwise Offers</a></button></li>
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
            <th>Offer Name</th>
            <th>Offer Code</th>
            <th>Valid From</th>
            <th>Valid to</th>
            <th>Details </th>
            <th>Actions </th>
          </tr>
        </thead>
        <tbody>
          
          @foreach($items as $key=>$value)
            <tr>
              <td>{{ $key+1 }}</td>
              <td>{{ isset($value->offer_name) && !empty($value->offer_name) ? $value->offer_name : "" }}</td>
              <td>{{ isset($value->offer_code) && !empty($value->offer_code) ? $value->offer_code : "" }}</td>
			  <td>{{ isset($value->valid_from) && !empty($value->valid_from) ? $value->valid_from : "" }}</td>
			  <td>{{ isset($value->valid_to) && !empty($value->valid_to) ? $value->valid_to : "" }}</td>
              <td> Buy {{ $value->item_det->name }} - {{ $value->buy_item_quantity }} & Get {{ $value->get_item_det->name }} - {{ $value->get_item_quantity }}  </td>
              <td> 
               
                <a href="{{url('master/itemwiseoffer/edit/'.$value->id )}}" class="px-2 py-1 bg-success text-white rounded"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                <a onclick="return confirm('Are you sure ?')" href="{{url('master/itemwiseoffer/delete/'.$value->id )}}" class="px-2 py-1 bg-danger text-white rounded"><i class="fa fa-trash" aria-hidden="true"></i></a>
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