@extends('admin.layout.app')
@section('content')
<div class="col-12 body-sec">
  <div class="card">
    <!-- card header start@ -->
    <div class="card-header px-2">
      <div class="row">
        <div class="col-4">
          <h3>List Debit Note</h3>
        </div>
        <div class="col-8 mr-auto">
          <ul class="h-right-btn mb-0 pl-0">
            @if($check_id != 1)
            <li><button type="button" class="btn btn-success"><a href="{{ route('debit_note.create') }}">Debit Note</a></button></li>
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
            <th>Purchase Entry No </th>
            <th>Purchase Entry Date </th>
            <th>Rejection Out No </th>
            <th>Rejection Out Date</th>
            <th>Supplier Name</th>
            <th>overall Discount</th>
            <!-- <th>Round Off</th> -->
            <th>Taxable Value</th>
            <th>Tax Value</th>
            <th>Net Value</th>
           <th>Action </th>
          </tr>
        </thead>
        <tbody>
          @foreach($debit_note as $key => $value)
            <tr>
              <td>{{ $key+1 }}</td>
              <td>{{ $value->dn_no }}</td>
              <td>{{ $value->dn_date }}</td>
              <td>{{ $value->p_no }}</td>
              <td>{{ $value->p_date }}</td>
              <td>{{ $value->r_out_no }}</td>
              <td>{{ $value->r_out_date }}</td>
              @if(isset($value->supplier->name) && !empty($value->supplier->name))
              <td>{{ $value->supplier->name }}</td>
              @else
              <td></td>
              @endif
              <td>{{ $value->overall_discount }}</td>
              <!-- <td>{{ $value->round_off }}</td> -->
              <td></td>
              <td></td>
              <td>{{ $value->total_net_value }}</td>
              <td> 
                @if($value->cancel_status == 0)
                <a href="{{ route('debit_note.show',$value->dn_no) }}" class="px-2 py-1 bg-info text-white rounded"><i class="fa fa-eye" aria-hidden="true"></i></a>
                <a href="{{ route('debit_note.edit',$value->dn_no) }}" class="px-2 py-1 bg-success text-white rounded"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                <a href="{{url('debit_note/delete/'.$value->dn_no )}}" onclick="return confirm('Are you sure ?')" class="px-2 py-1 bg-danger text-white rounded"><i class="fa fa-trash" aria-hidden="true"></i></a>

                <a href="{{ url('debit_note/cancel/'.$value->dn_no) }}" class="px-2 py-1 bg-warning text-white rounded">Cancel</a>

                <br><br>
                <a href="{{url('debit_note/item_details/'.$value->dn_no )}}" class="px-1 py-0 bg-info text-white rounded"><i class="fa fa-eye" aria-hidden="true"></i>Item Details</a>
                <a href="{{url('debit_note/expense_details/'.$value->dn_no )}}" class="px-1 py-0 bg-info text-white rounded"><i class="fa fa-eye" aria-hidden="true"></i>Expense Details</a>
                @else
                <a href="{{ url('debit_note/retrieve/'.$value->dn_no) }}" class="px-2 py-1 bg-primary text-white rounded">Retrieve</a>
                @endif
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