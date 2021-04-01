@extends('admin.layout.app')
@section('content')
<main class="page-content">

<div class="col-12 body-sec">
  <div class="card">
    <!-- card header start@ -->
    <div class="card-header px-2">
      <div class="row">
        <div class="col-4">
          <h3>List Credit Note</h3>
        </div>
        <div class="col-8 mr-auto">
          <ul class="h-right-btn mb-0 pl-0">
            @if($check_id != 1)
            <input type="checkbox" name="alpha_beta" class="alpha_beta" value="1">
            <li><button type="button" class="btn btn-success"><a href="{{ route('credit_note.create') }}">Credit Note</a></button></li>
            @endif
          </ul>
        </div>
      </div>
    </div>
    @if($check_id == 1)


    <div class="card-body">
    <form  method="post" class="form-horizontal needs-validation" novalidate action="{{url('credit-note-report')}}" enctype="multipart/form-data">
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
              <label>Customer</label>
              <select class="js-example-basic-multiple col-12 form-control custom-select customer_id" name="customer_id" id="customer_id">
              <option value="">Choose Customer Name</option>
                           @foreach($customer as $data)
                           <option value="{{ $data->id }}"@if(isset($cond['customer_id'])){{($suppliers->id==$cond['customer_id']) ? 'selected' : '' }}@endif>{{ $data->name }}</option>
                           @endforeach
                            </select>

          </div>
          
          <div class="col-md-2">
              <label>Location</label>
              <select class="js-example-basic-multiple col-12 form-control custom-select location" name="location" id="location">
                           <option value="">Choose Location</option>
                           @foreach($location as $data)
                           <option value="{{ $data->id }}"@if(isset($cond['location'])){{($data->id==$cond['location']) ? 'selected' : '' }}@endif >{{ $data->name}}</option>
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
      <table id="master" class="table table-bordered table-hover CreditNote">
        <thead>
          <tr>
            <th>S.No</th>
            <th>Voucher No </th>
            <th>Voucher Date </th>
            <th>Sale Entry No </th>
            <th>Sale Entry Date </th>
            <th>Rejection In No </th>
            <th>Rejection In Date </th>
            <th>Customer Name</th>
            <th>Location</th>
            <th>overall Discount</th>
            <!-- <th>Round Off</th> -->
            <th>Taxable Value</th>
            <th>Tax Value</th>
            <th>Net Value</th>
           <th>Action </th>
          </tr>
        </thead>
        <tbody id="test1">
          @foreach($credit_note as $key => $value)
            <tr>
              <td>{{ $key+1 }}</td>
              <td>{{ $value->cn_no }}</td>
              <td>{{ $value->cn_date }}</td>
              <td>{{ $value->s_no }}</td>
              <td>{{ $value->s_date }}</td>
              <td>{{ $value->r_in_no }}</td>
              <td>{{ $value->r_in_date }}</td>
              @if(isset($value->customer->name) && !empty($value->customer->name))
              <td>{{ $value->customer->name }}</td>
              @else
              <td></td>
              @endif
              <td>{{ @$value->locations->name }}</td>
              <td>{{ $value->overall_discount }}</td>
              <!-- <td>{{ $value->round_off }}</td> -->
              <td></td>
              <td></td>
              <td>{{ $value->total_net_value }}</td>
              <td class="icon">
	<span class="tdshow"> 
                @if($value->cancel_status == 0)
                <!-- <a href="{{ route('credit_note.show',$value->cn_no) }}" class="px-1 py-0 text-white rounded" title="View"><i class="fa fa-eye" aria-hidden="true"></i></a> -->
                <!-- <a href="{{ route('credit_note.edit',$value->cn_no) }}" class="px-1 py-0  text-white rounded" title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i></a> -->
                <a href="{{url('credit_note/delete/'.$value->cn_no )}}" onclick="return confirm('Are you sure ?')" class="px-2 py-1 bg-danger text-white rounded" title="Delete">
				<i class="fa fa-trash" aria-hidden="true" ></i></a>

                <a href="{{ url('credit_note/cancel/'.$value->cn_no) }}" class="px-2 py-1   bg-info text-white rounded" title="Cancel">
				<i class="fa fa-ban" aria-hidden="true" ></i></a>


               
                <a href="{{url('credit_note/item_details/'.$value->cn_no )}}" class="px-1 py-0 bg-info text-white rounded" title="Item Details">
				<i class="fa fa-info-circle" aria-hidden="true" ></i></a>
                <a href="{{url('credit_note/expense_details/'.$value->cn_no )}}" class="px-1 py-0 bg-info text-white rounded" title="Expenses Details">
				<i class="fa fa-inr" aria-hidden="true"></i></a>
                @else
                <a href="{{ url('credit_note/retrieve/'.$value->cn_no) }}" class="px-2 py-1 bg-primary text-white rounded">Retrieve</a>
                @endif
				</span>
              </td>
            </tr>
            @endforeach
         
        </tbody>

        <tbody id="test2" style="display: none;">
          @foreach($credit_note_beta as $key => $value)
            <tr>
              <td>{{ $key+1 }}</td>
              <td>{{ $value->cn_no }}</td>
              <td>{{ $value->cn_date }}</td>
              <td>{{ $value->s_no }}</td>
              <td>{{ $value->s_date }}</td>
              <td>{{ $value->r_in_no }}</td>
              <td>{{ $value->r_in_date }}</td>
              @if(isset($value->customer->name) && !empty($value->customer->name))
              <td>{{ $value->customer->name }}</td>
              @else
              <td></td>
              @endif
              <td>{{ @$value->locations->name }}</td>
              <td>{{ $value->overall_discount }}</td>
              <!-- <td>{{ $value->round_off }}</td> -->
              <td></td>
              <td></td>
              <td>{{ $value->total_net_value }}</td>
             <td class="icon">
	<span class="tdshow">
                @if($value->cancel_status == 0)
                <!-- <a href="{{ route('credit_note.show',$value->cn_no) }}" class="px-1 py-0 text-white rounded" title="View"><i class="fa fa-eye" aria-hidden="true"></i></a> -->
                <!-- <a href="{{ route('credit_note.edit',$value->cn_no) }}" class="px-1 py-0  text-white rounded" title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i></a> -->
                <a href="{{url('credit_note/delete_beta/'.$value->cn_no )}}" onclick="return confirm('Are you sure ?')" class="px-2 py-1 bg-danger text-white rounded" title="Delete">
				<i class="fa fa-trash" aria-hidden="true" ></i></a>

                <a href="{{ url('credit_note/cancel_beta/'.$value->cn_no) }}" class="px-2 py-1   bg-info text-white rounded" title="Cancel">
				<i class="fa fa-ban" aria-hidden="true" ></i></a>


               
                <a href="{{url('credit_note/item_beta_details/'.$value->cn_no )}}" class="px-1 py-0 bg-info text-white rounded" title="Item Details">
				<i class="fa fa-info-circle" aria-hidden="true" ></i></a>
                <a href="{{url('credit_note/expense_beta_details/'.$value->cn_no )}}" class="px-1 py-0 bg-info text-white rounded" title="Expenses Details">
				<i class="fa fa-inr" aria-hidden="true"></i></a>
                @else
                <a href="{{ url('credit_note/retrieve_beta/'.$value->cn_no) }}" class="px-2 py-1 bg-primary text-white rounded">Retrieve</a>
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