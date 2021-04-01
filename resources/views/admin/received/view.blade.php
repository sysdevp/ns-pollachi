@extends('admin.layout.app')
@section('content')
<?php
use App\Mandatoryfields;
?>
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
      <label></label>

      <div class="cat" id="cat" style="display: none;" title="Cheque Cleared">
      <form  method="post" class="form-horizontal needs-validation" novalidate action="{{route('received.store')}}" enctype="multipart/form-data">
      {{csrf_field()}}
      <input type="hidden" name="receipt_processes_id" value="" id="receipt_processes_id"/>
      <input type="hidden" name="status" value="1" />

  

                        <div class="row col-md-12">
                        <label for="validationCustom01" class="col-sm-4 col-form-label">Bank Account Holder <?php echo Mandatoryfields::mandatory('receivedsalecleared_companybankid');?></label>


                       <div class="col-md-4">
                            <select class="js-example-basic-multiple form-control bank" id="bank" name="company_bank_id" style="width: 100%;" style="margin-left: 50%;" data-placeholder="Choose Bank Name" <?php echo Mandatoryfields::validation('receivedsalecleared_companybankid');?>>
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

                          <label for="validationCustom01" class="col-sm-4 col-form-label">Cleare Date <?php echo Mandatoryfields::mandatory('receivedsalecleared_cleareddate');?></label>

                  <div class="col-md-4">
                          <input type="date" name="cleared_date" class="form-control" placeholder="Cheque Cleared Date" <?php echo Mandatoryfields::validation('receivedsalecleared_cleareddate');?>>

                        </div>

                          </div><br/><br/>
                          <div class="row col-md-12">
                          <label for="validationCustom01" class="col-sm-4 col-form-label">Remarks <?php echo Mandatoryfields::mandatory('receivedsalecleared_remarks');?></label>
                          <div class="col-md-4">
                            <textarea id="remarks" name="remarks" rows="2" cols="50" <?php echo Mandatoryfields::validation('receivedsalecleared_remarks');?>></textarea>
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
      <label>Received Cheques from sale entry</label>

      <div class="cat" id="cat1" style="display: none;" title="Cheque Returned">
      <form  method="post" class="form-horizontal needs-validation" novalidate action="{{route('received.store')}}" enctype="multipart/form-data">
      {{csrf_field()}}
      <input type="hidden" name="receipt_processes_id" value="" id="receipt_processes_id1"/>
      <input type="hidden" name="status" value="2" />

                        <div class="row col-md-12">
                        <label for="validationCustom01" class="col-sm-4 col-form-label">Bank Account Holder <?php echo Mandatoryfields::mandatory('receivedsalereturned_companybankid');?></label>


                       <div class="col-md-4">
                            <select class="js-example-basic-multiple form-control state_id" id="state_id" name="company_bank_id" style="width: 100%;" style="margin-left: 50%;" data-placeholder="Choose Bank Name" <?php echo Mandatoryfields::validation('receivedsalereturned_companybankid');?>>
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

                          <label for="validationCustom01" class="col-sm-4 col-form-label">Cleare Date <?php echo Mandatoryfields::mandatory('receivedsalereturned_cleareddate');?></label>

                  <div class="col-md-4">
                          <input type="date" name="cleared_date" class="form-control" placeholder="Cheque Cleared Date" <?php echo Mandatoryfields::validation('receivedsalereturned_cleareddate');?>>

                        </div>

                          </div><br/><br/>

                          <div class="row col-md-12">

                          <label for="validationCustom01" class="col-sm-4 col-form-label">Charge<?php echo Mandatoryfields::mandatory('receivedsalereturned_charges');?></label>

                  <div class="col-md-4">
                          <input type="number" name="charges" class="form-control" placeholder="Charges" <?php echo Mandatoryfields::validation('receivedsalereturned_charges');?>>

                        </div>

                          </div><br/><br/>
                          <div class="row col-md-12">
                          <label for="validationCustom01" class="col-sm-4 col-form-label">Remarks <?php echo Mandatoryfields::mandatory('receivedsalereturned_remarks');?></label>
                          <div class="col-md-4">
                            <textarea id="remarks" name="remarks" rows="2" cols="50" <?php echo Mandatoryfields::validation('receivedsalereturned_remarks');?>></textarea>
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


                      <!-- pos -->

                      <div class="card-body">
      <label></label>

      <div class="cat" id="cat2" style="display: none;" title="POS Cheque Cleared">
      <form  method="post" class="form-horizontal needs-validation" novalidate action="{{url('received/store_pos/')}}" enctype="multipart/form-data">
      {{csrf_field()}}
      <input type="hidden" name="pos_payment_id" value="" id="pos_payment_id"/>
      <input type="hidden" name="status" value="1" />

  

                        <div class="row col-md-12">
                        <label for="validationCustom01" class="col-sm-4 col-form-label">Bank Account Holder <?php echo Mandatoryfields::mandatory('receivedposcleared_companybankid');?></label>


                       <div class="col-md-4">
                            <select class="js-example-basic-multiple form-control district_id" id="district_id" name="company_bank_id" style="width: 100%;" style="margin-left: 50%;" data-placeholder="Choose Bank Name" <?php echo Mandatoryfields::validation('receivedposcleared_companybankid');?>>
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

                          <label for="validationCustom01" class="col-sm-4 col-form-label">Cleare Date <?php echo Mandatoryfields::mandatory('receivedposcleared_cleareddate');?></label>

                  <div class="col-md-4">
                          <input type="date" name="cleared_date" class="form-control" placeholder="Cheque Cleared Date" <?php echo Mandatoryfields::validation('receivedposcleared_cleareddate');?>>

                        </div>

                          </div><br/><br/>
                          <div class="row col-md-12">
                          <label for="validationCustom01" class="col-sm-4 col-form-label">Remarks <?php echo Mandatoryfields::mandatory('receivedposcleared_remarks');?></label>
                          <div class="col-md-4">
                            <textarea id="remarks" name="remarks" rows="2" cols="50" <?php echo Mandatoryfields::validation('receivedposcleared_remarks');?>></textarea>
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
      <label>Received Cheques from sale entry</label>

      <div class="cat" id="cat3" style="display: none;" title="POS Cheque Returned">
      <form  method="post" class="form-horizontal needs-validation" novalidate action="{{url('received/store_pos/')}}" enctype="multipart/form-data">
      {{csrf_field()}}
      <input type="hidden" name="pos_payment_id" value="" id="pos_payment_id1"/>
      <input type="hidden" name="status" value="2" />

                        <div class="row col-md-12">
                        <label for="validationCustom01" class="col-sm-4 col-form-label">Bank Account Holder <?php echo Mandatoryfields::mandatory('receivedposreturned_companybankid');?></label>


                       <div class="col-md-4">
                            <select class="js-example-basic-multiple form-control employee_id" id="employee_id" name="company_bank_id" style="width: 100%;" style="margin-left: 50%;" data-placeholder="Choose Bank Name" <?php echo Mandatoryfields::validation('receivedposreturned_companybankid');?>>
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

                          <label for="validationCustom01" class="col-sm-4 col-form-label">Cleare Date <?php echo Mandatoryfields::mandatory('receivedposreturned_cleareddate');?></label>

                  <div class="col-md-4">
                          <input type="date" name="cleared_date" class="form-control" placeholder="Cheque Cleared Date" <?php echo Mandatoryfields::validation('receivedposreturned_cleareddate');?>>

                        </div>

                          </div><br/><br/>

                          <div class="row col-md-12">

                          <label for="validationCustom01" class="col-sm-4 col-form-label">Charge<?php echo Mandatoryfields::mandatory('receivedposreturned_charges');?></label>

                  <div class="col-md-4">
                          <input type="number" name="charges" class="form-control" placeholder="Charges" <?php echo Mandatoryfields::validation('receivedposreturned_charges');?>>

                        </div>

                          </div><br/><br/>
                          <div class="row col-md-12">
                          <label for="validationCustom01" class="col-sm-4 col-form-label">Remarks <?php echo Mandatoryfields::mandatory('receivedposreturned_remarks');?></label>
                          <div class="col-md-4">
                            <textarea id="remarks" name="remarks" rows="2" cols="50" <?php echo Mandatoryfields::validation('receivedposreturned_remarks');?>></textarea>
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
                      <!-- end -->


      <table id="master" class="table table-bordered table-hover ReceivedChequesFromSaleEntry">
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
          
          @foreach($receipt_process as $key => $value)
            <tr>
              <td>{{ $key+1 }}</td>
              <td>{{ $value->voucher_no }}</td>
              <td>{{ $value->voucher_date }}</td>
              <td>{{ @$value->customers->name }}</td>
              <td>{{ @$value->customers->phone_no }}</td>
              <td>{{ $value->reference_no }}</td>
              <td>{{ $value->payment_date }}</td>
              <td>{{ $value->receipt_amount }}</td>
              
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

      <label>Received Cheques from pos</label>
      <table id="purchaseorder" class="table table-bordered table-hover ReceivedChequesFromPOS">
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
          
          @foreach($pos_payment as $key => $value)
            <tr>
              <td>{{ $key+1 }}</td>
              <td>{{ $value->voucher }}</td>
              <td>{{ $value->cheque_date }}</td>
              <td>{{ @$value->customer }}</td>
              <td>{{ @$value->phoneno }}</td>
              <td>{{ $value->cheque_remark }}</td>
              <td>{{ $value->cheque_date }}</td>
              <td>{{ $value->cheque }}</td>
              
           <td class="icon">
  <span class="tdshow">
                <button onclick="pos_cleared()" class="fa fa-check-circle-o " aria-hidden="true" title="Cleared" name="{{$value->id}}" id="pos_cleared"></button>
                
                <button onclick="return confirm('Are you sure ?')?pos_returned(event):'';" class="fa fa-times-circle-o" aria-hidden="true" title="Returned" name="{{$value->id}}" id="pos_returned"></button>
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
      var receipt_processes_id  = $("#cleared").attr("name");
      $("#receipt_processes_id").val(receipt_processes_id);
    
    $('#cat').show();
    $('#cat').dialog({width:900},{height:250}).prev(".ui-dialog-titlebar").css("background","#28a745").prev(".ui-dialog.ui-widget-content");
  }
  function returned()
  {
    var receipt_processes_id  = $("#returned").attr("name");
      $("#receipt_processes_id1").val(receipt_processes_id);
    $('#cat1').show();
    $('#cat1').dialog({width:900},{height:250}).prev(".ui-dialog-titlebar").css("background","#28a745").prev(".ui-dialog.ui-widget-content");
  }

  function pos_cleared() {

      var pos_payment_id  = $("#pos_cleared").attr("name");
      $("#pos_payment_id").val(pos_payment_id);
    
    $('#cat2').show();
    $('#cat2').dialog({width:900},{height:250}).prev(".ui-dialog-titlebar").css("background","#28a745").prev(".ui-dialog.ui-widget-content");
  }
  function pos_returned()
  {
    var pos_payment_id  = $("#pos_returned").attr("name");
      $("#pos_payment_id1").val(pos_payment_id);
    $('#cat3').show();
    $('#cat3').dialog({width:900},{height:250}).prev(".ui-dialog-titlebar").css("background","#28a745").prev(".ui-dialog.ui-widget-content");
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