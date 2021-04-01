@extends('admin.layout.app')
@section('content')
<main class="page-content">

<div class="col-12 body-sec">
  <div class="card">
    <!-- card header start@ -->
    <div class="card-header px-2">
      <div class="row">
        <div class="col-4">
          <h3>List Productions</h3>
        </div>
        <div class="col-8 mr-auto">
          <ul class="h-right-btn mb-0 pl-0">
            <li><button type="button" class="btn btn-success"><a href="{{url('production/create')}}">Add Productions</a></button></li>
          </ul>
        </div>
      </div>
    </div>
    <!-- card header end@ -->
    <div class="card-body">
      <table id="master" class="table table-striped table-bordered Productions" style="width:100%">
        <thead>
          <tr>
            <th>S.No</th>
            <th>Location Name</th>
            <th>Production Date</th>
            <th>Item Name</th>
            <th>Production Quantity</th>
            <th>UOM </th>
            <th>Actions </th>
          </tr>
        </thead>
        <tbody>
          
          @foreach($items as $key=>$value)
            <tr>
              <td>{{ $key+1 }}</td>
              <td>{{ isset($value->location_det->name) && !empty($value->location_det->name) ? $value->location_det->name : "" }}</td>
              <td>{{ isset($value->production_date) && !empty($value->production_date) ? $value->production_date : "" }}</td>
			  <td> {{ isset($value->item_det->name) && !empty($value->item_det->name) ? $value->item_det->name : "" }} </td>
			  <td>{{ isset($value->quantity) && !empty($value->quantity) ? $value->quantity : "" }}</td>
			  <td>{{ isset($value->uom_det->name) && !empty($value->uom_det->name) ? $value->uom_det->name : "" }}</td>
              
              <td> 
               
                <a href="{{url('production/edit/'.$value->id )}}" class="px-2 py-1 bg-success text-white rounded"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                <a onclick="return confirm('Are you sure ?')" href="{{url('production/delete/'.$value->id )}}" class="px-2 py-1 bg-danger text-white rounded"><i class="fa fa-trash" aria-hidden="true"></i></a>
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