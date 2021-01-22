@extends('admin.layout.app')
@section('content')
<main class="page-content">

<div class="col-12 body-sec">
  <div class="card">
    <!-- card header start@ -->
    <div class="card-header px-2">
      <div class="row">
        <div class="col-4">
          <h3>List Paid Cheques</h3>
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
      <label></label>

      <div class="cat" id="cat" style="display: none;" title="Cheque Cleared">
      <form  method="post" class="form-horizontal needs-validation" novalidate action="{{route('paid.store')}}" enctype="multipart/form-data">
      {{csrf_field()}}
      <input type="hidden" name="payment_processes_id" value="" id="payment_processes_id"/>
      <input type="hidden" name="status" value="1" />

  

                        <div class="row col-md-12">
                        <label for="validationCustom01" class="col-sm-4 col-form-label">Bank Account Holder <span class="mandatory">*</span></label>


                       <div class="col-md-4">
                            <select class="js-example-basic-multiple form-control bank" id="bank" name="company_bank_id" style="width: 100%;" style="margin-left: 50%;" data-placeholder="Choose Bank Name" required>
                          <option value="">Select</option>
                          @foreach($company_bank as $value)
                          <option value="{{ $value->id }}">{{ $value->holder_name }}  -{{$value->account_no}}</option>
                          @endforeach
                        </select>
                        <span class="mandatory"> {{ $errors->first('company_bank_id')  }} </span>
                <div class="invalid-feedback">
                  Pls Select Account Holder
                </div>
                          </div>
                                <br/><br/>
                          <div class="row col-md-12">

                          <label for="validationCustom01" class="col-sm-4 col-form-label">Cleare Date <span class="mandatory">*</span></label>

                  <div class="col-md-4">
                          <input type="date" name="cleared_date" class="form-control" placeholder="Cheque Cleared Date" required>

                        </div>

                          </div><br/><br/>
                          <div class="row col-md-12">
                          <label for="validationCustom01" class="col-sm-4 col-form-label">Remarks </label>
                          <div class="col-md-4">
                            <textarea id="remarks" name="remarks" rows="2" cols="50"></textarea>
                          </div>
                          </div>
                          
                        </div><br>
                        
                        <div class="row col-md-8">


                        <div class="col-md-4">
                          </div>

                          
                          <div class="col-md-4">
                          <button class="btn btn-success" name="" type="submit">Submit</button>
                          </div>
</form>                          
                        </div>
                            
                      </div>

  <!-- Returned -->

                      <div class="card-body">
      <label>Paid Cheques from purchase entry</label>

      <div class="cat" id="cat1" style="display: none;" title="Cheque Returned">
      <form  method="post" class="form-horizontal needs-validation" novalidate action="{{route('paid.store')}}" enctype="multipart/form-data">
      {{csrf_field()}}
      <input type="hidden" name="payment_processes_id" value="" id="payment_processes_id1"/>
      <input type="hidden" name="status" value="2" />

                        <div class="row col-md-12">
                        <label for="validationCustom01" class="col-sm-4 col-form-label">Bank Account Holder <span class="mandatory">*</span></label>


                       <div class="col-md-4">
                            <select class="js-example-basic-multiple form-control bank" id="district_id" name="company_bank_id" style="width: 100%;" style="margin-left: 50%;" data-placeholder="Choose Bank Name" required>
                          <option value="">Select</option>
                          @foreach($company_bank as $value)
                          <option value="{{ $value->id }}">{{ $value->holder_name }}  -{{$value->account_no}}</option>
                          @endforeach
                        </select>
                        <span class="mandatory"> {{ $errors->first('company_bank_id')  }} </span>
                <div class="invalid-feedback">
                  Pls Select Account Holder
                </div>
                          </div>
                                <br/><br/>
                          <div class="row col-md-12">

                          <label for="validationCustom01" class="col-sm-4 col-form-label">Cleare Date <span class="mandatory">*</span></label>

                  <div class="col-md-4">
                          <input type="date" name="cleared_date" class="form-control" placeholder="Cheque Cleared Date" required>

                        </div>

                          </div><br/><br/>

                          <div class="row col-md-12">

                          <label for="validationCustom01" class="col-sm-4 col-form-label">Charge</label>

                  <div class="col-md-4">
                          <input type="number" name="charges" class="form-control" placeholder="Charges" >

                        </div>

                          </div><br/><br/>
                          <div class="row col-md-12">
                          <label for="validationCustom01" class="col-sm-4 col-form-label">Remarks </label>
                          <div class="col-md-4">
                            <textarea id="remarks" name="remarks" rows="2" cols="50"></textarea>
                          </div>
                          </div>
                          
                        </div><br>
                        
                        <div class="row col-md-8">


                        <div class="col-md-4">
                          </div>

                          
                          <div class="col-md-4">
                          <button class="btn btn-success" name="" type="submit">Submit</button>
                          </div>
</form>                          
                        </div>
                            
                      </div>


      <table id="master" class="table table-bordered table-hover">
        <thead>
          <tr>
            <th>S.No</th>
            <th>Voucher  No</th>
            <th>Voucher Date</th>
            <th>Party Name</th>
            <th>Phone</th>
            <th>cheque no</th> 
            <th>cheque date</th>
            <th>cheque amount</th>
           <th>Action </th>
          </tr>
        </thead>
        <tbody>
          
          @foreach($payment_process as $key => $value)

            <tr>
              <td>{{ $key+1 }}</td>
              <td>{{ $value->voucher_no }}</td>
              <td>{{ $value->voucher_date }}</td>
              <td>{{@$value->name }}</td>
              <td>{{@$value->phone_no }}</td>
              <td>{{ $value->reference_no }}</td>
              <td>{{ $value->payment_date }}</td>
              <td>{{ $value->payment_amount }}</td>
              
           <td class="icon">
	<span class="tdshow">
                <button onclick="cleared()" class="fa fa-check-circle-o "  name="{{$value->id}}" id="cleared" aria-hidden="true" title="Cleared"></button>
                
                <button onclick="return confirm('Are you sure ?')?returned(event):'';" name="{{$value->id}}" id="returned" class="fa fa-times-circle-o" name="{{$value->id}}" id="returned" aria-hidden="true" title="Returned"></button>
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
      var payment_processes_id  = $("#cleared").attr("name");
      $("#payment_processes_id").val(payment_processes_id);
    
    $('#cat').show();
    $('#cat').dialog({width:900},{height:250}).prev(".ui-dialog-titlebar").css("background","#28a745").prev(".ui-dialog.ui-widget-content");
  }
  function returned()
  {
    var payment_processes_id  = $("#returned").attr("name");
      $("#payment_processes_id1").val(payment_processes_id);
    $('#cat1').show();
    $('#cat1').dialog({width:900},{height:250}).prev(".ui-dialog-titlebar").css("background","#28a745").prev(".ui-dialog.ui-widget-content");
  }

  // function bank_details(value) 
  // {


  //       $.ajax({
  //          type: "POST",
  //           url: "{{ url('received/branch_details/') }}",
  //           data: { value: value },
  //          success: function(data) {

  //           $('.bank_branch').children('option:not(:first)').remove();

  //           $(data).appendTo('.bank_branch');
             
  //          }
  //       });
    
  // }

  // function act_type_details(value) 
  // {

  //       $.ajax({
  //          type: "POST",
  //           url: "{{ url('received/act_type_details/') }}",
  //           data: { value: value },
  //          success: function(data) {

  //           $('.account_holder').children('option:not(:first)').remove();

  //           $(data).appendTo('.account_holder');
             
  //          }
  //       });
    
  // }


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