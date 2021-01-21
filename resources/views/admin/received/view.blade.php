@extends('admin.layout.app')
@section('content')
<main class="page-content">

<div class="col-12 body-sec">
  <div class="card">
    <!-- card header start@ -->
    <div class="card-header px-2">
      <div class="row">
        <div class="col-4">
          <h3>List Received Cheques</h3>
        </div>
        <!-- <div class="col-8 mr-auto">
          <ul class="h-right-btn mb-0 pl-0">
            <li><button type="button" class="btn btn-success"><a href="{{route('account_group.create')}}">Add Account Group</a></button></li>
          </ul>
        </div> -->
      </div>
    </div>
    <!-- card header end@ -->
    <div class="card-body">
      <label>Received Cheques from sale entry</label>

      <div class="cat" id="cat" style="display: none;" title="Search Here">
                        <div class="row col-md-8">


                          <div class="col-md-4">
                            <select class="js-example-basic-multiple form-control bank" id="bank" name="bank" style="width: 100%;" style="margin-left: 50%;" data-placeholder="Choose Bank Name" onchange="bank_details($(this).val())">
                          <option></option>
                          @foreach($bank as $banks)
                          <option value="{{ $banks->id }}">{{ $banks->name }}</option>
                          @endforeach
                        </select>

                          </div>

                          <div class="col-md-4">
                            <select class="js-example-basic-multiple form-control bank_branch" id="bank_branch" name="bank_branch" style="width: 100%;" style="margin-left: 50%;" data-placeholder="Choose Bank Branch Name" onchange="bank_branch_details()">
                          <option></option>
                          @foreach($bank_branch as $bank_branches)
                          <option value="{{ $bank_branches->id }}">{{ $bank_branches->branch }}</option>
                          @endforeach
                        </select>

                          </div>
                          <div class="col-md-4">
                            <select class="js-example-basic-multiple form-control act_type" id="act_type" name="act_type" style="width: 100%;" style="margin-left: 50%;" data-placeholder="Choose Account type" onchange="act_type_details($(this).val())">
                          <option value=""></option>
                          @foreach($act_type as $act_types)
                          <option value="{{ $act_types->id }}">{{ $act_types->name }}</option>
                          @endforeach
                        </select>
                          </div>
                          
                        </div><br>
                        
                        <div class="row col-md-8">


                          <div class="col-md-4">
                            <select class="js-example-basic-multiple form-control account_holder" id="account_holder" name="account_holder" style="width: 100%;" style="margin-left: 50%;" data-placeholder="Choose Account Holder Name" onchange="account_holder_details()">
                          <option></option>
                        </select>

                          </div>

                          <div class="col-md-4">
                            <input type="text" name="remarks" class="form-control" placeholder="Remarks">

                          </div>
                          
                        </div>
                            
                      </div>


      <table id="master" class="table table-bordered table-hover">
        <thead>
          <tr>
            <th>S.No</th>
            <th>Voucher  No</th>
            <th>Voucher Date</th>
            <th>Customer Name</th>
            <th>Phone</th>
            <th>cheque no</th> 
            <th>cheque date</th>
            <th>cheque amount</th>
           <th>Action </th>
          </tr>
        </thead>
        <tbody>
          
          @foreach($receipt_process as $key => $value)
            <tr>
              <td>{{ $key+1 }}</td>
              <td>{{ $value->voucher_no }}</td>
              <td>{{ $value->voucher_date }}</td>
              <td>{{ $value->customers->name }}</td>
              <td>{{ $value->customers->phone_no }}</td>
              <td>{{ $value->reference_no }}</td>
              <td>{{ $value->payment_date }}</td>
              <td>{{ $value->receipt_amount }}</td>
              
           <td class="icon">
	<span class="tdshow">
                <button onclick="cleared()" class="fa fa-check-circle-o " aria-hidden="true" title="Cleared"></button>
                
                <button onclick="return confirm('Are you sure ?')" class="fa fa-times-circle-o" aria-hidden="true" title="Returned"></button>
				</span>
              </td>
            </tr>
         @endforeach
        </tbody>
      </table>

      <label>Received Cheques from pos</label>
      <table id="purchaseorder" class="table table-bordered table-hover">
        <thead>
          <tr>
            <th>S.No</th>
            <th>Voucher  No</th>
            <th>Voucher Date</th>
            <th>Customer Name</th>
            <th>Phone</th>
            <th>cheque no</th> 
            <th>cheque date</th>
            <th>cheque amount</th>
           <th>Action </th>
          </tr>
        </thead>
        <tbody>
          
          @foreach($pos_payment as $key => $value)
            <tr>
              <td>{{ $key+1 }}</td>
              <td>{{ $value->voucher_no }}</td>
              <td>{{ $value->voucher_date }}</td>
              <td>{{ $value->payment_date }}</td>
              <td>{{ $value->payment_date }}</td>
              <td>{{ $value->payment_date }}</td>
              <td>{{ $value->cheque_date }}</td>
              <td>{{ $value->cheque }}</td>
              
           <td class="icon">
  <span class="tdshow">
                <button onclick="cleared()" class="fa fa-check-circle-o " aria-hidden="true" title="Cleared"></button>
                
                <button onclick="return confirm('Are you sure ?')" class="fa fa-times-circle-o" aria-hidden="true" title="Returned"></button>
        </span>
              </td>
            </tr>
         @endforeach
        </tbody>
      </table>


    </div>
    <!-- card body end@ -->
<script type="text/javascript">
  
  function cleared() {
    $('#cat').show();
    $('#cat').dialog({width:900},{height:250}).prev(".ui-dialog-titlebar").css("background","#28a745").prev(".ui-dialog.ui-widget-content");
  }

  function bank_details(value) 
  {


        $.ajax({
           type: "POST",
            url: "{{ url('received/branch_details/') }}",
            data: { value: value },
           success: function(data) {

            $('.bank_branch').children('option:not(:first)').remove();

            $(data).appendTo('.bank_branch');
             
           }
        });
    
  }

  function act_type_details(value) 
  {

        $.ajax({
           type: "POST",
            url: "{{ url('received/act_type_details/') }}",
            data: { value: value },
           success: function(data) {

            $('.account_holder').children('option:not(:first)').remove();

            $(data).appendTo('.account_holder');
             
           }
        });
    
  }


</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" rel="stylesheet"/>
<script src="jquery.ui.position.js"></script>


<style type="text/css">
  .ui-dialog.ui-widget-content { background: #a3d072; }
</style>

  </div>
</div>
@endsection