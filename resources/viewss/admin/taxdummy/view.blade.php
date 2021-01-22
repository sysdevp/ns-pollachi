@extends('admin.layout.app')
@section('content')
<main class="page-content">

<div class="col-12 body-sec">
  <div class="card">
    <!-- card header start@ -->
    <div class="card-header px-2">
      <div class="row">
        <div class="col-4">
          <h3> List Item Tax Details </h3>
        </div>
        <div class="col-8 mr-auto">
          <ul class="h-right-btn mb-0 pl-0">
            <li><button type="button" class="btn btn-success"><a href="{{url('master/item-tax-details/create')}}">Add Item Tax Details </a></button></li>
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
            
            <th>Brand</th>
            <th>Category</th>
            <th>SGST</th>
            <th>IGST</th>
            <th>CGST</th>
            <th>Effective From Date</th>
            <th> Action </th>
          </tr>
        </thead>
        <tbody>
          
          @foreach($item_tax_details as $key=>$value)
          @php
              $barnd_name="";
              if($value->item->brand_id > 0 && isset($value->item->brand->name))
              {
                $barnd_name=$value->item->brand->name;
              }
              else if($value->item->brand_id == 0)
              {
                $barnd_name="Not Applicable";
              }
            @endphp
            <tr>
              <td>{{ $key+1 }}</td>
              <td>{{ isset($value->item->name) && !empty($value->item->name) ? $value->item->name : "" }}</td>
              <td>{{ $barnd_name }}</td>
              <td>{{ isset($value->item->category->name) && !empty($value->item->category->name) ? $value->item->category->name : ""}}</td>
              
         
              <td>{{ $value->sgst}}</td>
              <td>{{ $value->igst}}</td>
              <td>{{ $value->cgst}}</td>
              <td>{{ $value->valid_from !="" ? date('d-m-Y',strtotime($value->valid_from )) : ""}}</td>
            
              
              <td> 
                <a href="{{url('master/item-tax-details/show/'.$value->id )}}" class="px-1 py-0 bg-info text-white rounded"><i class="fa fa-eye" aria-hidden="true"></i></a>
                <a href="{{url('master/item-tax-details/edit/'.$value->id )}}" class="px-1 py-0 bg-success text-white rounded"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                <a onclick="return confirm('Are you sure ?')" href="{{url('master/item-tax-details/delete/'.$value->id )}}" class="px-1 py-0 bg-danger text-white rounded"><i class="fa fa-trash" aria-hidden="true"></i></a>
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