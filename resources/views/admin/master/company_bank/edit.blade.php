@extends('admin.layout.app')
@section('content')
<main class="page-content">

<div class="col-12 body-sec">
  <div class="card container px-0">
    <!-- card header start@ -->
    <div class="card-header px-2">
      <div class="row">
        <div class="col-4">
          <h3>Edit Company Bank</h3>
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

      <form method="post" class="form-horizontal needs-validation" novalidate action="{{route('company-bank.update',$company_bank->id)}}" enctype="multipart/form-data">
        {{csrf_field()}}
        @method('PATCH')

        <div class="form-row">

          <div class="col-md-8">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Bank <span class="mandatory">*</span></label>
              <div class="col-sm-6">
                <select class="js-example-basic-multiple col-12 custom-select bank_id" name="bank_id" required>
                  <option value="{{$company_bank->bank_id}}">{{$company_bank->bank->name}}</option>
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
              <label for="validationCustom01" class="col-sm-4 col-form-label">Branch Name <span class="mandatory">*</span></label>
              <div class="col-sm-6">
                <select class="js-example-basic-multiple col-12 custom-select bank_branch_id" name="bank_branch_id" required>
                  <option value="{{ $company_bank->bank_branch_id }}">{{$company_bank->bank_branch->branch}}</option>
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
              <label for="validationCustom01" class="col-sm-4 col-form-label">Account Type <span class="mandatory">*</span></label>
              <div class="col-sm-6">
                <select class="js-example-basic-multiple col-12 custom-select account_type_id" name="account_type_id" required>
                  <option value="{{ $company_bank->account_type_id }}">{{$company_bank->account_types->name}}</option>
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
              <label for="validationCustom01" class="col-sm-4 col-form-label">Account Holder Name <span class="mandatory">*</span></label>
              <div class="col-sm-8">
                <input type="text" class="form-control  only_allow_alp_numeric  holder_name caps" placeholder="Account Holder Name" name="holder_name" value="{{ $company_bank->holder_name }}" required>
                <span class="mandatory"> {{ $errors->first('holder_name')  }} </span>
                <div class="invalid-feedback">
                  Enter valid Account Holder Name 
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-8">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Account No <span class="mandatory">*</span></label>
              <div class="col-sm-8">
                <input type="text" class="form-control  only_allow_alp_numeric  account_no" placeholder="Account No" name="account_no" value="{{ $company_bank->account_no }}" required>
                <span class="mandatory"> {{ $errors->first('account_no')  }} </span>
                <div class="invalid-feedback">
                  Enter valid Account No
                </div>
              </div>
            </div>
          </div>
          
        </div>
        <div class="col-md-7 text-right">
          <button class="btn btn-success" name="add" type="submit">Submit</button>
        </div>
      </form>
    </div>
    <script src="{{asset('assets/js/master/capitalize.js')}}"></script>
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