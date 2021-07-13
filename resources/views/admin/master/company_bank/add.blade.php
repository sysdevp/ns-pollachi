@extends('admin.layout.app')
@section('content')
<?php
use App\Mandatoryfields;
?>
<main class="page-content">

<div class="col-12 body-sec">
  <div class="card container px-0">
    <!-- card header start@ -->
    <div class="card-header px-2">
      <div class="row">
        <div class="col-4">
          <h3>Add Company Bank</h3>
        </div>
        <div class="col-8 mr-auto">
          <ul class="h-right-btn mb-0 pl-0">
            <li><button type="button" class="btn btn-success"><a href="{{route('company-bank.index')}}">Back</a></button></li>
          </ul>
        </div>
      </div>
    </div>
    <!-- card header end@ -->
    <div class="card-body">

      <form method="post" class="form-horizontal needs-validation" novalidate action="{{route('company-bank.store')}}" enctype="multipart/form-data">
        {{csrf_field()}}

        <div class="form-row">

          <div class="col-md-8">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Bank <?php echo Mandatoryfields::mandatory('companybank_bankid ');?></label>
              <div class="col-sm-6">
                <select class="js-example-basic-multiple col-12 custom-select bank_id" name="bank_id" <?php echo Mandatoryfields::validation('companybank_bankid');?> tabindex="1" autofocus>
                  <option value="">Choose Bank</option>
                  @foreach($bank as $value)
                  <option value="{{ $value->id }}" {{ old('bank_id') == $value->id ? 'selected' : '' }} >{{ $value->name }}</option>
                  @endforeach
                </select>
                <span class="mandatory"> {{ $errors->first('bank_id')  }} </span>
                <div class="invalid-feedback">
                  Enter valid Bank
                </div>
              </div>
              <a href="{{ url('master/bank/create')}}" target="_blank">
                <button type="button"  class="px-3 btn btn-success ml-2 " title="Add Bank"><i class="fa fa-plus-circle" aria-hidden="true"></i></button></a>
               <button type="button"  class="px-3 btn btn-success mx-2 refresh_bank_id" title="Refresh"><i class="fa fa-refresh" aria-hidden="true"></i></button>
          </div>
          </div>

          <div class="col-md-8">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Branch Name <?php echo Mandatoryfields::mandatory('companybank_bankbranchid ');?></label>
              <div class="col-sm-6">
                <select class="js-example-basic-multiple col-12 custom-select bank_branch_id" name="bank_branch_id" <?php echo Mandatoryfields::validation('companybank_bankbranchid');?> tabindex="2">
                  <option value="">Choose Branch Name</option>
                  @foreach($branch as $value)
                  <option value="{{ $value->id }}" {{ old('bank_id') == $value->id ? 'selected' : '' }} >{{ $value->branch }}</option>
                  @endforeach
                </select>
                <span class="mandatory"> {{ $errors->first('bank_branch_id')  }} </span>
                <div class="invalid-feedback">
                  Enter valid Branch Name
                </div>
              </div>
              <a href="{{ url('master/bank/create')}}" target="_blank">
                <button type="button"  class="px-3 btn btn-success ml-2 " title="Add Bank"><i class="fa fa-plus-circle" aria-hidden="true"></i></button></a>
               <button type="button"  class="px-3 btn btn-success mx-2 refresh_bank_id" title="Refresh"><i class="fa fa-refresh" aria-hidden="true"></i></button>
          </div>
          </div>
          
          <div class="col-md-8">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Account Type <?php echo Mandatoryfields::mandatory('companybank_accounttypeid ');?></label>
              <div class="col-sm-6">
                <select class="js-example-basic-multiple col-12 custom-select account_type_id" name="account_type_id" <?php echo Mandatoryfields::validation('companybank_accounttypeid');?> tabindex="3">
                  <option value="">Choose Account Type</option>
                  @foreach($account_type as $value)
                  <option value="{{ $value->id }}" {{ old('bank_id') == $value->id ? 'selected' : '' }} >{{ $value->name }}</option>
                  @endforeach
                </select>
                <span class="mandatory"> {{ $errors->first('account_type')  }} </span>
                <div class="invalid-feedback">
                  Enter valid Account Type
                </div>
              </div>
              <a href="{{ url('master/bank/create')}}" target="_blank">
                <button type="button"  class="px-3 btn btn-success ml-2 " title="Add Bank"><i class="fa fa-plus-circle" aria-hidden="true"></i></button></a>
               <button type="button"  class="px-3 btn btn-success mx-2 refresh_bank_id" title="Refresh"><i class="fa fa-refresh" aria-hidden="true"></i></button>
          </div>
          </div>

          <div class="col-md-8">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Account Holder Name <?php echo Mandatoryfields::mandatory('companybank_holdername ');?></label>
              <div class="col-sm-8">
                <input type="text" class="form-control  only_allow_alp_numeric  holder_name" placeholder="Account Holder Name" name="holder_name" value="{{old('ifsc')}}" <?php echo Mandatoryfields::validation('companybank_holdername');?> tabindex="4">
                <span class="mandatory"> {{ $errors->first('holder_name')  }} </span>
                <div class="invalid-feedback">
                  Enter valid Account Holder Name 
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-8">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Account No <?php echo Mandatoryfields::mandatory('companybank_accountno ');?></label>
              <div class="col-sm-8">
                <input type="text" class="form-control  only_allow_digit account_no" placeholder="Account No" name="account_no" value="{{old('ifsc')}}" <?php echo Mandatoryfields::validation('companybank_accountno');?> tabindex="5">
                <span class="mandatory"> {{ $errors->first('account_no')  }} </span>
                <div class="invalid-feedback">
                  Enter valid Account No
                </div>
              </div>
            </div>
          </div>
          
        </div>
        <div class="col-md-7 text-right">
          <button class="btn btn-success" name="add" type="submit" tabindex="6">Submit</button>
        </div>
      </form>
    </div>
    <!-- <script src="{{asset('assets/js/master/capitalize.js')}}"></script> -->
    <!-- card body end@ -->
  </div>
</div>
<script>

      $(document).on('change','.bank_id',function(){

        var value = $(this).val();

        $.ajax({
           type: "POST",
            url: "{{ url('company-bank/branch_details/') }}",
            data: { value: value },
           success: function(data) {

            $('.bank_branch_id').children('option:not(:first)').remove();

            $(data).appendTo('.bank_branch_id');
             
           }
        });

      });
</script>
@endsection