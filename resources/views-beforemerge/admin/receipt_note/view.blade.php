@extends('admin.layout.app')
@section('content')
<main class="page-content">

<div class="col-12 body-sec">
  <div class="card">
    <!-- card header start@ -->
    <div class="card-header px-2">
      <div class="row">
        <div class="col-4">
          <h3>List Receipt Note</h3>
        </div>
        <div class="col-8 mr-auto">
          <ul class="h-right-btn mb-0 pl-0">
            @if($check_id != 1)
            <input type="checkbox" name="alpha_beta" class="alpha_beta" value="1" >
            <li><button type="button" class="btn btn-success"><a href="{{ route('receipt_note.create') }}">Receipt Note</a></button></li>
            @else
            @endif
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
            <th>Voucher No </th>
            <th>Voucher Date </th>
            <th>Purchase Order No </th>
            <th>Purchase Order Date </th>
            <th>Estimation No </th>
            <th>Estimation Date </th>
            <th>Supplier Name</th>
            <th>Location </th>
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
          @foreach($receipt_note as $key => $value)
            <tr>
              <td>{{ $key+1 }}</td>
              <td>{{ $value->rn_no }}</td>
              <td>{{ $value->rn_date }}</td>
              <td>{{ $value->po_no }}</td>
              <td>{{ $value->po_date }}</td>
              <td>{{ $value->estimation_no }}</td>
              <td>{{ $value->estimation_date }}</td>
              @if(isset($value->supplier->name) && !empty($value->supplier->name))
              <td>{{ $value->supplier->name }}</td>
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
              <td> 
                @if($value->status == 0)
                <a href="{{ route('receipt_note.show',$value->rn_no) }}" class="px-2 py-1 bg-info text-white rounded"><i class="fa fa-eye" aria-hidden="true"></i></a>
                <a href="{{ route('receipt_note.edit',$value->rn_no) }}" class="px-2 py-1 bg-success text-white rounded"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                <a href="{{url('receipt_note/delete/'.$value->rn_no )}}" onclick="return confirm('Are you sure ?')" class="px-2 py-1 bg-danger text-white rounded"><i class="fa fa-trash" aria-hidden="true"></i></a>
                <a href="{{ url('receipt_note/cancel/'.$value->rn_no) }}" class="px-2 py-1 bg-warning text-white rounded">Cancel</a>

                <br><br>
                <a href="{{url('receipt_note/item_details/'.$value->rn_no )}}" class="px-1 py-0 bg-info text-white rounded"><i class="fa fa-eye" aria-hidden="true"></i>Item Details</a>
                <a href="{{url('receipt_note/expense_details/'.$value->rn_no )}}" class="px-1 py-0 bg-info text-white rounded"><i class="fa fa-eye" aria-hidden="true"></i>Expense Details</a>
                @else

                <a href="{{ url('receipt_note/retrieve/'.$value->rn_no) }}" class="px-2 py-1 bg-primary text-white rounded">Retrieve</a>
                @endif
              </td>
            </tr>
            @endforeach
         
        </tbody>

        <tbody id="test2" style="display: none;">
          @foreach($receipt_note_beta as $key => $value)
            <tr>
              <td>{{ $key+1 }}</td>
              <td>{{ $value->rn_no }}</td>
              <td>{{ $value->rn_date }}</td>
              <td>{{ $value->po_no }}</td>
              <td>{{ $value->po_date }}</td>
              <td>{{ $value->estimation_no }}</td>
              <td>{{ $value->estimation_date }}</td>
              @if(isset($value->supplier->name) && !empty($value->supplier->name))
              <td>{{ $value->supplier->name }}</td>
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
              <td> 
                @if($value->status == 0)
                <a href="{{ url('receipt_note/show_beta/'.$value->rn_no) }}" class="px-2 py-1 bg-info text-white rounded"><i class="fa fa-eye" aria-hidden="true"></i></a>
                <a href="{{ url('receipt_note/edit_beta/'.$value->rn_no) }}" class="px-2 py-1 bg-success text-white rounded"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                <a href="{{url('receipt_note/delete_beta/'.$value->rn_no )}}" onclick="return confirm('Are you sure ?')" class="px-2 py-1 bg-danger text-white rounded"><i class="fa fa-trash" aria-hidden="true"></i></a>
                <a href="{{ url('receipt_note/cancel_beta/'.$value->rn_no) }}" class="px-2 py-1 bg-warning text-white rounded">Cancel</a>

                <br><br>
                <a href="{{url('receipt_note/item_beta_details/'.$value->rn_no )}}" class="px-1 py-0 bg-info text-white rounded"><i class="fa fa-eye" aria-hidden="true"></i>Item Details</a>
                <a href="{{url('receipt_note/expense_beta_details/'.$value->rn_no )}}" class="px-1 py-0 bg-info text-white rounded"><i class="fa fa-eye" aria-hidden="true"></i>Expense Details</a>
                @else

                <a href="{{ url('receipt_note/retrieve_beta/'.$value->rn_no) }}" class="px-2 py-1 bg-primary text-white rounded">Retrieve</a>
                @endif
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