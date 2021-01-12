@extends('admin.layout.app')
@section('content')
<main class="page-content">

<div class="col-12 body-sec">
  <div class="card">
    <!-- card header start@ -->
    <div class="card-header px-2">
      <div class="row">
        <div class="col-4">
          <h3>List Rejection Out</h3>
        </div>
        <div class="col-8 mr-auto">
          <ul class="h-right-btn mb-0 pl-0">
            @if($check_id != 1)
            <input type="checkbox" name="alpha_beta" class="alpha_beta" value="1">
            <li><button type="button" class="btn btn-success"><a href="{{ route('rejection_out.create') }}">Rejection Out</a></button></li>
            @else
            @endif
          </ul>
        </div>
      </div>
    </div>
    @if($check_id == 1)

    <div class="card-body">
    <form  method="post" class="form-horizontal needs-validation" novalidate action="{{url('rejection-out-report')}}" enctype="multipart/form-data">
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
                           <option value="{{ $suppliers->id }}"@if(isset($cond['supplier_id'])){{($suppliers->id==$cond['supplier_id']) ? 'selected' : '' }}@endif>{{ $suppliers->name }}</option>
                           @endforeach
                            </select>

          </div>
          
          <div class="col-md-2">
              <label>Location</label>
              <select class="js-example-basic-multiple col-12 form-control custom-select location" name="location" id="location">
                           <option value="">Choose Location</option>
                           @foreach($location as $data)
                           <option value="{{ $data->id }}"@if(isset($cond['location'])){{($suppliers->id==$cond['location']) ? 'selected' : '' }}@endif >{{ $data->name}}</option>
                           @endforeach
                            </select>

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
    <div class="card-body">
      <table id="master" class="table table-bordered table-hover">
        <thead>
          <tr>
            <th>S.No</th>
            <th>Voucher No </th>
            <th>Voucher Date </th>
            <th>Purchase Entry No </th>
            <th>Purchase Entry Date </th>
            <th>Receipt Note No</th>
            <th>Receipt Note Date</th>
            <th>Purchase Order No</th>
            <th>Purchase Order Date</th>
            <th>Supplier Name</th>
            <th>Location</th>
            <th>overall Discount</th>
            <!-- <th>Round Off</th> -->
            <th>Total Expense</th>
            <th>Taxable Value</th>
            <th>Tax Value</th>
            <th>Net Value</th>
           <th>Action </th>
          </tr>
        </thead>
        <tbody id="test1">
          @foreach($rejection_out as $key=> $value)
            <tr>
              <td>{{ $key+1 }}</td>
              <td>{{ $value->r_out_no }}</td>
              <td>{{ $value->r_out_date }}</td>
              <td>{{ $value->p_no }}</td>
              <td>{{ $value->p_date }}</td>
              <td>{{ $value->rn_no }}</td>
              <td>{{ $value->rn_date }}</td>
              <td></td>
              <td></td>
              @if(isset($value->supplier->name) && !empty($value->supplier->name))
              <td>{{ $value->supplier->name }}</td>
              @else
              <td></td>
              @endif
              <td>{{@$value->locations->name}}</td>
              <td>{{ $total_discount[$key] }}</td>
              <!-- <td>{{ $value->round_off }}</td> -->
              <td>{{ $expense_total[$key] }}</td>
              <td>{{ $taxable_value[$key] }}</td>
              <td>{{ $tax_value[$key] }}</td>
              <td>{{ $total[$key] }}</td>
              <td class="icon">
	<span class="tdshow"> 
                <!-- <a href="{{ route('rejection_out.show',$value->r_out_no) }}" class="px-1 py-0 text-white rounded" title="View">><i class="fa fa-eye" aria-hidden="true"></i></a> -->
                @if($value->cancel_status == 0)
                @if($value->rn_no == '')
                <a href="{{url('rejection_out/delete/'.$value->p_no,$value->r_out_no )}}" onclick="return confirm('Are you sure ?')"  class="px-2 py-1 bg-danger text-white rounded" title="Delete">
				<i class="fa fa-trash" aria-hidden="true" ></i></a>
                @else
                <a href="{{url('rejection_out/delete/'.$value->rn_no,$value->r_out_no )}}" onclick="return confirm('Are you sure ?')" class="px-2 py-1 bg-danger text-white rounded" title="Delete">
				<i class="fa fa-trash" aria-hidden="true" ></i></a>
                
                @endif
                
                
                <a href="{{ url('rejection_out/cancel/'.$value->r_out_no) }}" class="px-2 py-1   bg-info text-white rounded" title="Cancel">
				<i class="fa fa-ban" aria-hidden="true" ></i></a>

               
                <a href="{{url('rejection_out/item_details/'.$value->r_out_no )}}" class="px-1 py-0 bg-info text-white rounded" title="Item Details">
				<i class="fa fa-info-circle" aria-hidden="true" ></i></a>
                <a href="{{url('rejection_out/expense_details/'.$value->r_out_no )}}" class="px-1 py-0 bg-info text-white rounded" title="Expenses Details">
				<i class="fa fa-inr" aria-hidden="true"></i></a>
                @else

                <a href="{{ url('rejection_out/retrieve/'.$value->r_out_no) }}" class="px-2 py-1 bg-primary text-white rounded">Retrieve</a>
                @endif
				</span>
              </td>
            </tr>
         @endforeach
        </tbody>

        <tbody id="test2" style="display: none;">
          @foreach($rejection_out_beta as $key=> $value)
            <tr>
              <td>{{ $key+1 }}</td>
              <td>{{ $value->r_out_no }}</td>
              <td>{{ $value->r_out_date }}</td>
              <td>{{ $value->p_no }}</td>
              <td>{{ $value->p_date }}</td>
              <td>{{ $value->rn_no }}</td>
              <td>{{ $value->rn_date }}</td>
              <td></td>
              <td></td>
              @if(isset($value->supplier->name) && !empty($value->supplier->name))
              <td>{{ $value->supplier->name }}</td>
              @else
              <td></td>
              @endif
              <td>{{@$value->locations->name}}</td>
              <td>{{ $total_discount_beta[$key] }}</td>
              <!-- <td>{{ $value->round_off }}</td> -->
              <td>{{ $expense_total_beta[$key] }}</td>
              <td>{{ $taxable_value_beta[$key] }}</td>
              <td>{{ $tax_value_beta[$key] }}</td>
              <td>{{ $total_beta[$key] }}</td>
              <td class="icon">
	<span class="tdshow"> 
                <!-- <a href="{{ route('rejection_out.show',$value->r_out_no) }}" class="px-1 py-0 text-white rounded" title="View">><i class="fa fa-eye" aria-hidden="true"></i></a> -->
                @if($value->cancel_status == 0)
                @if($value->rn_no == '')
                <a href="{{url('rejection_out/delete/'.$value->p_no,$value->r_out_no )}}" onclick="return confirm('Are you sure ?')" class="px-2 py-1 bg-danger text-white rounded" title="Delete">
				<i class="fa fa-trash" aria-hidden="true" ></i></a>
                @else
                <a href="{{url('rejection_out/delete_beta/'.$value->rn_no,$value->r_out_no )}}" onclick="return confirm('Are you sure ?')" class="px-2 py-1 bg-success text-white rounded"  title="Edit">
				<i class="fa fa-pencil" aria-hidden="true"></i></a>
                
                @endif
                
                
                <a href="{{ url('rejection_out/cancel_beta/'.$value->r_out_no) }}" class="px-2 py-1   bg-info text-white rounded" title="Cancel">
				<i class="fa fa-ban" aria-hidden="true" ></i></a>

               
                <a href="{{url('rejection_out/item_beta_details/'.$value->r_out_no )}}" class="px-1 py-0 bg-info text-white rounded" title="Item Details">
				<i class="fa fa-info-circle" aria-hidden="true" ></i></a>
                <a href="{{url('rejection_out/expense_beta_details/'.$value->r_out_no )}}" class="px-1 py-0 bg-info text-white rounded" title="Expenses Details">
				<i class="fa fa-inr" aria-hidden="true"></i></a>
                @else

                <a href="{{ url('rejection_out/retrieve_beta/'.$value->r_out_no) }}" class="px-2 py-1 bg-primary text-white rounded">Retrieve</a>
                @endif
				</span>
              </td>
            </tr>
         @endforeach
        </tbody>

      </table>

    </div>

    <script>
  $(document).on('click','.alpha_beta',function(){

    if($('.alpha_beta').prop('checked'))
    {
      var val = 1;

      $('#test1').hide();

      $('#test2').show();
    }
    else
    {
      var val =0;

      $('#test1').show();

      $('#test2').hide();
    }

  });
</script>
    <!-- card body end@ -->
  </div>
</div>
@endsection