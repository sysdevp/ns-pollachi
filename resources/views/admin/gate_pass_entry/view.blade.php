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
          <h3>List Gate Pass Entry</h3>
        </div>
        <div class="col-8 mr-auto">
          <ul class="h-right-btn mb-0 pl-0">
            <li><button type="button" class="btn btn-success"><a href="{{ route('gate_pass_entry.create') }}">Add Gate Pass</a></button></li>
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
            <th>Gate Pass No</th>
            <th>Date</th>
            <th>Supplier Name </th>
            <th>Type</th>
            <th> Supplier Invoice No</th>
            <th> Supplier Delivery No</th>
            <th> Taxable Value</th>
            <th> Tax Value </th>
            <th> Total Invoice Value</th>
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
          @foreach($gatepassentry as $gate_pass_entry)
          
            <tr>
              <td>{{ $count }}</td>
              <td>{{ $gate_pass_entry->gate_pass_no }}</td>
              <td>{{ $gate_pass_entry->date }}</td>
              <td>{{ $gate_pass_entry->name }}</td>
              @if($gate_pass_entry->type == 1)
              <td> Invoice </td>
              @else
              <td> Delivery Note </td>
              @endif
              <td>{{ $gate_pass_entry->supplier_invoice_number }}</td>
              <td>{{ $gate_pass_entry->supplier_delivery_number }}</td>
              <td>{{ $gate_pass_entry->taxable_value }}</td>
              <td>{{ $gate_pass_entry->tax_value }}</td>
              <td>{{ $gate_pass_entry->total_invoice_value }}</td>
              <td>{{ $gate_pass_entry->load_bill }}</td>
              <td>{{ $gate_pass_entry->load_live }}</td>
              <td>{{ $gate_pass_entry->unload_bill }}</td>
              <td>{{ $gate_pass_entry->unload_live }}</td>
              
              <td> 
                <a href="{{ route('gate_pass_entry.edit',$gate_pass_entry->gatepass_id) }}" class="px-3 py-0 bg-info text-white rounded"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                
              </td>
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