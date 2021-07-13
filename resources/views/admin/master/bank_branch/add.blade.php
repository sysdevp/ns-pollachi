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
          <h3>Add Bank Branch</h3>
        </div>
        <div class="col-8 mr-auto">
          <ul class="h-right-btn mb-0 pl-0">
            <li><button type="button" class="btn btn-success"><a href="{{url('master/bank-branch')}}">Back</a></button></li>
          </ul>
        </div>
      </div>
    </div>
    <!-- card header end@ -->
    <div class="card-body">

      <form method="post" class="form-horizontal needs-validation" novalidate action="{{url('master/bank-branch/store')}}" enctype="multipart/form-data">
        {{csrf_field()}}

        <div class="form-row">
          <div class="col-md-8">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Branch Name <?php echo Mandatoryfields::mandatory('bankbranch_branch ');?></label>
              <div class="col-sm-8">
                <input type="text" class="form-control name only_allow_alp_num_dot_com_amp branch caps" placeholder="Branch Name" name="branch" value="{{old('branch')}}" <?php echo Mandatoryfields::validation('bankbranch_branch');?> tabindex="1" autofocus>
                <span class="mandatory"> {{ $errors->first('branch')  }} </span>
                <div class="invalid-feedback">
                  Enter valid Branch Name
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-8">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Bank <?php echo Mandatoryfields::mandatory('bankbranch_bankid ');?></label>
              <div class="col-sm-6">
                <select class="js-example-basic-multiple col-12 custom-select bank_id" name="bank_id" <?php echo Mandatoryfields::validation('bankbranch_bankid');?> tabindex="2">
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
              <label for="validationCustom01" class="col-sm-4 col-form-label">Ifsc Code <?php echo Mandatoryfields::mandatory('bankbranch_ifsc ');?></label>
              <div class="col-sm-8">
                <input type="text" class="form-control  only_allow_alp_numeric  ifsc" placeholder="IFSC Code" name="ifsc" value="{{old('ifsc')}}" <?php echo Mandatoryfields::validation('bankbranch_ifsc');?> tabindex="3">
                <span class="mandatory"> {{ $errors->first('ifsc')  }} </span>
                <div class="invalid-feedback">
                  Enter valid Ifsc Code
                </div>
              </div>
            </div>
          </div>
          
        </div>
        <div class="col-md-7 text-right">
          <button class="btn btn-success" name="add" type="submit" tabindex="4">Submit</button>
        </div>
      </form>
    </div>
    <script src="{{asset('assets/js/master/capitalize.js')}}"></script>
    <!-- card body end@ -->
  </div>
</div>
<script>

      $(document).on('input','.name',function(){

      $(this).val($(this).val().replace(/[^a-zA-Z0-9 ]/gi, ''));

      });

      $(document).on("click",".refresh_bank_id",function(){
         var bank_dets=refresh_bank_master_details();
        $(".bank_id").html(bank_dets);
      });
</script>
@endsection