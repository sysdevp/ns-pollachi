@extends('admin.layout.app')
@section('content')
<main class="page-content">

<div class="col-12 body-sec">
  <div class="card">
    <!-- card header start@ -->
    <div class="card-header px-2">
      <div class="row">
        <div class="col-4">
          <h3>List Cart</h3>
        </div>
        
      </div>
    </div>
    <!-- card header end@ -->
    <div class="card-body">
        <table id="master" class="table table-striped table-bordered" style="width:100%">
        <thead>
          <tr>
            <th>S.No</th>
            <th>Date</th>
            <th>Supplier Name</th>
            <th>Type</th>
            <th> Supplier Invoice No</th>
            <th> Supplier Delivery No</th>
            <th> Taxable Value</th>
            <th> Tax Value </th>
            <th> Load Bill</th>
            <th>Load Live</th>
            <th>Unload Bill</th>
            <th>Unload Live</th>
            
            
            <th>Action </th>
          </tr>
        </thead>
        <tbody>
          <?php 
          $count=1;
          ?>
          @foreach($cart as $carts)
          
            <tr>
              <td>{{ $count }}</td>
              <td>{{ $carts->date }}</td>
              <td>{{ $carts->name }}</td>
              @if($carts->type == 1)
              <td> Invoice </td>
              @else
              <td> Delivery Note </td>
              @endif
              <td>{{ $carts->supplier_invoice_number }}</td>
              <td>{{ $carts->supplier_delivery_number }}</td>
              <td>{{ $carts->taxable_value }}</td>
              <td>{{ $carts->tax_value }}</td>
              <td>{{ $carts->load_bill }}</td>
              <td>{{ $carts->load_live }}</td>
              <td>{{ $carts->unload_bill }}</td>
              <td>{{ $carts->unload_live }}</td>
              
              <td> 
                <a href="{{ route('cart.edit',$carts->cart_id) }}" class="px-3 py-0 btn btn-success text-white rounded"><i class="fa fa-plus" aria-hidden="true"></i></a>
              </td>
              <!-- <td> 
                <a href="{{ url('to_gatepass/cart',$carts->id) }}" class="px-3 py-0 bg-info text-white rounded"><i class="fa fa-pencil" aria-hidden="true"></i></a>
              </td> -->
            </tr>
            <?php
            $count++;
            ?>
          

         @endforeach
        </tbody>
        
      </table>

    </div>
    <!-- card body end@ -->
  </div>
</div>
@endsection