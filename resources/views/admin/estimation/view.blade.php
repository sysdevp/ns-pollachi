@extends('admin.layout.app')
@section('content')
<main class="page-content">

<div class="col-12 body-sec">
  <div class="card">
    <!-- card header start@ -->
    <div class="card-header px-2">
      <div class="row">
        <div class="col-4">
          <h3>List Estimation</h3>
        </div>
        <div class="col-8 mr-auto">
          <ul class="h-right-btn mb-0 pl-0">
            @if($check_id != 1)
            <li><button type="button" class="btn btn-success"><a href="{{ route('estimation.create') }}">Estimation</a></button></li>
            @endif
          </ul>
        </div>
      </div>
    </div>
    @if($check_id == 1)
    <div class="card-body">
    <form  method="post" class="form-horizontal needs-validation" novalidate action="{{url('estimation-report')}}" enctype="multipart/form-data">
      {{csrf_field()}}
      <div class="col-md-12 row mb-3">

      <div class="col-md-12 form-row mb-3">
            <div class="col-md-2">
              <label>From</label>
            <input type="date" class="form-control from" name="from" id="from" value="@if(isset($from)){{$from}}@endif" required>
            </div>

            <div class="col-md-2">
              <label>To</label>
            <input type="date" class="form-control to" name="to" id="to" value="@if(isset($to)){{$to}}@endif" required>
            </div>

           
            <div class="col-md-3">
              <label>Supplier</label>
              <select class="js-example-basic-multiple col-12 form-control custom-select supplier_id" name="supplier_id" id="supplier_id">
                           <option value="">Choose Party Name</option>
                           @foreach($supplier as $suppliers)
                           <option value="{{ $suppliers->id }}" @if(isset($cond['supplier_id'])){{($suppliers->id==$cond['supplier_id']) ? 'selected' : '' }}@endif>{{ $suppliers->name }}</option>
                           @endforeach
                            </select>

          </div>
          <div class="col-md-3">
              <label>Agent</label>
              <select class="js-example-basic-multiple col-12 form-control custom-select agent_id" name="agent_id" id="agent_id">
                           <option value="">Choose Agent Name</option>
                           @foreach($agent as $data)
                           <option value="{{ $data->id }}" @if(isset($cond['agent_id'])){{($data->id==$cond['agent_id']) ? 'selected' : '' }}@endif>{{ $data->name }}</option>
                           @endforeach                        </select>

          </div>


          </div>

           <div class="col-md-2">
            <label> </label>
            <input type="submit" class="btn btn-success" name="add" value="Submit">
            
          </div>
        <br>

    </form>

    </div>
    @endif
    
    <!-- card header end@ -->
    <div class="card-body" id="DivIdToPrint">
      <table id="master" class="table table-bordered table-hover">
        <thead>
          <tr>
            <th>S.No</th>
            <th>Voucher No </th>
            <th>Voucher Date </th>
            <th>Supplier Name</th>
            <th>Agent Name</th>
            <th>overall Discount</th>
            <!-- <th>Round Off</th> -->
            <th>Total Expense</th>
            <th>Taxable Value</th>
            <th>Tax Value</th>
            <th>Net Value</th>
           <th>Action </th>
          </tr>
        </thead>
        <tbody>
          @foreach($estimation as $key => $value)
            <tr>
              <td>{{ $key+1 }}</td>
              <td>{{ $value->estimation_no }}</td>
              <td>{{ $value->estimation_date }}</td>
              @if(isset($value->supplier->name) && !empty($value->supplier->name))
              <td>{{ $value->supplier->name }}</td>
              @else
              <td></td>
              @endif
              @if(isset($value->agent->name) && !empty($value->agent->name))
              <td>{{ $value->agent->name }}</td>
              @else
              <td></td>
              @endif
              <td>{{ $total_discount[$key] }}</td>
              <!-- <td>{{ $value->round_off }}</td> -->
              <td>{{ $expense_total[$key] }}</td>
              <td>{{ $taxable_value[$key] }}</td>
              <td>{{ $tax_value[$key] }}</td>
              <td>{{ $total[$key] }}</td>
              <td class="icon">
	<span class="tdshow"> 
                @if($value->status == '0')
                <a href="{{ route('estimation.show',$value->estimation_no) }}"  class="px-2 py-1 bg-info text-white rounded" title="View">
				<i class="fa fa-eye" aria-hidden="true"></i></a>
                <a href="{{ route('estimation.edit',$value->estimation_no) }}" class="px-2 py-1 bg-success text-white rounded"  title="Edit">
				<i class="fa fa-pencil" aria-hidden="true"></i></a>
                <a href="{{url('estimation/delete/'.$value->estimation_no )}}" onclick="return confirm('Are you sure ?')" class="px-2 py-1 bg-danger text-white rounded" title="Delete">
				<i class="fa fa-trash" aria-hidden="true" ></i></a>
                <a href="{{ url('estimation/cancel/'.$value->estimation_no) }}" class="px-2 py-1   bg-info text-white rounded" title="Cancel">
				<i class="fa fa-ban" aria-hidden="true" ></i></a>


                
                <a href="{{url('estimation/item_details/'.$value->estimation_no )}}" class="px-1 py-0 bg-info text-white rounded" title="Item Details">
				<i class="fa fa-info-circle" aria-hidden="true" ></i></a>
                <a href="{{url('estimation/expense_details/'.$value->estimation_no )}}" class="px-1 py-0 bg-info text-white rounded" title="Expenses Details">
				<i class="fa fa-inr" aria-hidden="true"></i></a>
                @else
                <a href="{{ url('estimation/retrieve/'.$value->estimation_no) }}" class="px-2 py-1 bg-primary text-white rounded">Retrieve</a>

                @endif
	</span>
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