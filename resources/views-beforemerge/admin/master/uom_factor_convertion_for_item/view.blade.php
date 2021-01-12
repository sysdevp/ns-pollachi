@extends('admin.layout.app')
@section('content')
<main class="page-content">

<div class="col-12 body-sec">
  <div class="card">
    <!-- card header start@ -->
    <div class="card-header px-2">
      <div class="row">
        <div class="col-4">
          <h3>List Uom Factor Convertion For Item</h3>
        </div>
        <div class="col-8 mr-auto">
          <ul class="h-right-btn mb-0 pl-0">
            <li><button type="button" class="btn btn-success"><a href="{{url('master/uom-factor-convertion-for-item/create')}}">Add Uom Factor Convertion For Item</a></button></li>
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
            <th>Item Name</th>
            <th>Item Code</th>
          <th>{{ $category_1 }}</th>
            <th>{{ $category_2 }}</th>
            <th>{{ $category_3 }}</th>
            <th>Default uom</th>
            <th>Uom</th>
            <th>Factor Convertion</th>
            
            <th>Action </th>
          </tr>
        </thead>
        <tbody>
          
          @foreach($uom_factor_convertion_for_item as $key=>$value)
            <tr>
              <td>{{ $key+1 }}</td>
              <td>{{ $value->name}}</td>
              <td>{{ $value->code}}</td>
              <td>{{ isset($value->category_one->name) ? $value->category_one->name : ""}}</td>
              <td>{{ isset($value->category_two->name) ? $value->category_two->name : ""}}</td>
              <td>{{ isset($value->category_three->name) ? $value->category_three->name : ""}}</td>
              <td class="amount">{{ $value->default_selling_price}}</td>
              <td class="amount">{{ $value->mrp}}</td>
              <td>{{ $value->uom->name}}</td>
              
              <td> 
                <a href="{{url('master/uom-factor-convertion-for-item/show/'.$value->id )}}" class="px-1 py-0 bg-info text-white rounded"><i class="fa fa-eye" aria-hidden="true"></i></a>
                <a href="{{url('master/uom-factor-convertion-for-item/edit/'.$value->id )}}" class="px-1 py-0 bg-success text-white rounded"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                <a onclick="return confirm('Are you sure ?')" href="{{url('master/uom-factor-convertion-for-item/delete/'.$value->id )}}" class="px-1 py-0 bg-danger text-white rounded"><i class="fa fa-trash" aria-hidden="true"></i></a>
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