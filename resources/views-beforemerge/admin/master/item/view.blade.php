@extends('admin.layout.app')
@section('content')
<main class="page-content">

<div class="col-12 body-sec">
  <div class="card">
    <!-- card header start@ -->
    <div class="card-header px-2">
      <div class="row">
        <div class="col-4">
          <h3>List Item</h3>
        </div>
        <div class="col-8 mr-auto">
          <ul class="h-right-btn mb-0 pl-0">
            <li><button type="button" class="btn btn-success"><a href="{{url('master/item/create')}}">Add Item</a></button></li>
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
            <th>Category </th>
            <th>Brand Name </th>
            <th> Item Type</th>
            <th> Bulk Item Name</th>
            <th> Weight In Grams </th>
            <th> Weight In Kg</th>
            <th>Item Name in English</th>
            <th>Item Name in Tamil</th>
            <th>Item Name in Malayalam</th>
            <th>Item Name in Hindi</th>
            <th>Default Selling Price</th>
            <th>Mrp</th>
            <th>Uom</th>
            
            <th>Action </th>
          </tr>
        </thead>
        <tbody>
          
          @foreach($item as $key=>$value)
            @php
              $barnd_name="";
              if($value->brand_id > 0 && isset($value->brand->name))
              {
                $barnd_name=$value->brand->name;
              }
              else if($value->brand_id == 0)
              {
                $barnd_name="Not Applicable";
              }
            @endphp
            <tr>
              <td>{{ $key+1 }}</td>
              <td>{{ $value->name}}</td>
              <td>{{ $value->code}}</td>
              <td>{{ isset($value->category->name) ? $value->category->name : ""}}</td>
              <td>{{ $barnd_name }}</td>
              <td>{{ $value->item_type}}</td>
              <td>{{ isset($value->bulk_item->name) ? $value->bulk_item->name : ""}}</td>
              <td>{{ $value->weight_in_grams}}</td>
              <td>{{ $value->weight_in_kg}}</td>
              <td>{{ $value->print_name_in_english}}</td>
              <td>{{ $value->print_name_in_language_1}}</td>
              <td>{{ $value->print_name_in_language_2}}</td>
              <td>{{ $value->print_name_in_language_3}}</td>
              <td class="amount">{{ $value->default_selling_price}}</td>
              <td class="amount">{{ $value->mrp}}</td>
              <td>{{ isset($value->uom->name) ? $value->uom->name : ""}}</td>
              
              <td> 
                <a href="{{url('master/item/show/'.$value->id )}}" class="px-1 py-0 bg-info text-white rounded"><i class="fa fa-eye" aria-hidden="true"></i></a>
                <a href="{{url('master/item/edit/'.$value->id )}}" class="px-1 py-0 bg-success text-white rounded"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                <a onclick="return confirm('Are you sure ?')" href="{{url('master/item/delete/'.$value->id )}}" class="px-1 py-0 bg-danger text-white rounded"><i class="fa fa-trash" aria-hidden="true"></i></a>
                <!-- @if ($value->item_type == "Bulk")
                <a href="{{url('master/item/uom-factor-convertion-for-item/'.$value->id )}}" class="px-1 py-0 bg-info text-white rounded"><i class="fa fa-plus" aria-hidden="true"></i>Uom Factor Convertion</a>
                @endif -->
               
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