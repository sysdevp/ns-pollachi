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
          <h3> Item Tax Details </h3>
        </div>
        <div class="col-8 mr-auto">
          <ul class="h-right-btn mb-0 pl-0">
            <li><button type="button" class="btn btn-success"><a href="{{url('master/item-tax-details')}}">Back </a></button></li>
          </ul>
        </div>
      </div>
    </div>
    <!-- card header end@ -->
    <div class="card-body">
      <table id="master" class="table table-striped table-bordered" style="width:100%">
        <thead>
          <tr>
            
            @foreach($taxes as $value)
            <th>{{$value->name}}</th>
            @endforeach
            <th>Effective From Date</th>
          </tr>
        </thead>
        <tbody>
          
            <tr>
              @foreach($tax_value as $tax)
              <td>{{ $tax->value}}</td>
              @endforeach
              @foreach($valid_from as $valid_date)
              <td>{{ $valid_date->valid_from}}</td> 
              @endforeach
            </tr>
          
         
        </tbody>
      </table>

    </div>
    <!-- card body end@ -->
  </div>
</div>
@endsection