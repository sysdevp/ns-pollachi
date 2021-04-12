@extends('admin.layout.app')
@section('content')
<main class="page-content">

<div class="col-12 body-sec">
  <div class="card">
    <!-- card header start@ -->
    <div class="card-header px-2">
      <div class="row">
        <div class="col-4">
          <h3>List Sales Entry</h3>
        </div>
        <div class="col-8 mr-auto">
          <ul class="h-right-btn mb-0 pl-0">

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
            <th>Voucher No </th>
            <th>Voucher Date </th>
            <th>Sale Estimation No </th>
            <th>Sale Order No </th>
            <th>Sale Order Date </th>
            <th>Delivery Note No </th>
            <th>Customer Name</th>
            <th>Sales Man Name</th>
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
          @foreach($sale_entry as $key => $value)
            <tr>
              <td>{{ $key+1 }}</td>
              <td>{{ $value->s_no }}</td>
              <td>{{ $value->s_date }}</td>
              <td>{{ $value->sale_estimation_no }}</td>
              <td>{{ $value->so_no }}</td>
              <td>{{ $value->so_date }}</td>
              <td>{{ $value->d_no }}</td>
              @if(isset($value->customer->name) && !empty($value->customer->name))
              <td>{{ $value->customer->name }}</td>
              @else
              <td></td>
              @endif
              @if(isset($value->salesman->name) && !empty($value->salesman->name))
              <td>{{ $value->salesman->name }}</td>
              @else
              <td></td>
              @endif
              <td>{{ @$value->locations->name }}</td>
              <td>{{ $total_discount[$key] }}</td>
              <!-- <td>{{ $value->round_off }}</td> -->
              <td>{{ $expense_total[$key] }}</td>
              <td>{{ $taxable_value[$key] }}</td>
              <td>{{ $tax_value[$key] }}</td>
              <td>{{ $total[$key] }}</td>
              <td class="icon">
	<span class="tdshow"> 
                @if($value->cancel_status == 0)
                <a href="{{ route('sales_entry.show',$value->s_no) }}"  class="px-2 py-1 bg-info text-white rounded" title="View">
				<i class="fa fa-eye" aria-hidden="true"></i></a>
                <a href="{{ route('sales_entry.edit',$value->s_no) }}" class="px-2 py-1 bg-success text-white rounded"  title="Edit">
				<i class="fa fa-pencil" aria-hidden="true"></i></a>
                <a href="{{url('sales_entry/delete/'.$value->s_no )}}" onclick="return confirm('Are you sure ?')" class="px-2 py-1 bg-danger text-white rounded" title="Delete">
				<i class="fa fa-trash" aria-hidden="true" ></i></a>

                <a href="{{ url('sales_entry/cancel/'.$value->s_no) }}" class="px-2 py-1   bg-info text-white rounded" title="Cancel">
				<i class="fa fa-ban" aria-hidden="true" ></i></a>


               
                <a href="{{url('sales_entry/item_details/'.$value->s_no )}}" class="px-1 py-0 bg-info text-white rounded" title="Item Details">
				<i class="fa fa-info-circle" aria-hidden="true" ></i></a>
                <a href="{{url('sales_entry/expense_details/'.$value->s_no )}}" class="px-1 py-0 bg-info text-white rounded" title="Expenses Details">
				<i class="fa fa-inr" aria-hidden="true"></i></a>
                @else
                <a href="{{ url('sales_entry/retrieve/'.$value->s_no) }}" class="px-2 py-1 bg-primary text-white rounded">Retrieve</a>
                @endif
				</span>
              </td>
            </tr>
            @endforeach
         
        </tbody>

        <tbody id="test2" style="display: none;">
          @foreach($sale_entry_beta as $key => $value)
            <tr>
              <td>{{ $key+1 }}</td>
              <td>{{ $value->s_no }}</td>
              <td>{{ $value->s_date }}</td>
              <td>{{ $value->sale_estimation_no }}</td>
              <td>{{ $value->so_no }}</td>
              <td>{{ $value->so_date }}</td>
              <td>{{ $value->d_no }}</td>
              @if(isset($value->customer->name) && !empty($value->customer->name))
              <td>{{ $value->customer->name }}</td>
              @else
              <td></td>
              @endif
              @if(isset($value->salesman->name) && !empty($value->salesman->name))
              <td>{{ $value->salesman->name }}</td>
              @else
              <td></td>
              @endif
              <td>{{ @$value->locations->name }}</td>
              <td>{{ $total_discount_beta[$key] }}</td>
              <!-- <td>{{ $value->round_off }}</td> -->
              <td>{{ $expense_total_beta[$key] }}</td>
              <td>{{ $taxable_value_beta[$key] }}</td>
              <td>{{ $tax_value_beta[$key] }}</td>
              <td>{{ $total_beta[$key] }}</td>
              <td class="icon">
	<span class="tdshow"> 
                @if($value->cancel_status == 0)
                <a href="{{ route('sales_entry.show',$value->s_no) }}" class="px-1 py-0 text-white rounded" title="View">><i class="fa fa-eye" aria-hidden="true"></i></a>
                <a href="{{ url('sales_entry/edit_beta/'.$value->s_no) }}" class="px-2 py-1 bg-success text-white rounded"  title="Edit">
				<i class="fa fa-pencil" aria-hidden="true"></i></a>
                <a href="{{url('sales_entry/delete_beta/'.$value->s_no )}}" onclick="return confirm('Are you sure ?')" class="px-1 py-0  text-white rounded" title="Delete"><i class="fa fa-trash" aria-hidden="true"></i></a>

                <a href="{{ url('sales_entry/cancel_beta/'.$value->s_no) }}" class="px-2 py-1   bg-info text-white rounded" title="Cancel">
				<i class="fa fa-ban" aria-hidden="true" ></i></a>


               
                <a href="{{url('sales_entry/item_beta_details/'.$value->s_no )}}" class="px-1 py-0 bg-info text-white rounded" title="Item Details">
				<i class="fa fa-info-circle" aria-hidden="true" ></i></a>
                <a href="{{url('sales_entry/expense_beta_details/'.$value->s_no )}}" class="px-1 py-0 bg-info text-white rounded" title="Expenses Details">
				<i class="fa fa-inr" aria-hidden="true"></i></a>
                @else
                <a href="{{ url('sales_entry/retrieve_beta/'.$value->s_no) }}" class="px-2 py-1 bg-primary text-white rounded">Retrieve</a>
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