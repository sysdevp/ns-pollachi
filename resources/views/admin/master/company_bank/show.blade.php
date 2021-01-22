@extends('admin.layout.app')
@section('content')
<main class="page-content">

<div class="col-12 body-sec">
  <div class="card container px-0">
    <!-- card header start@ -->
    <div class="card-header px-2">
      <div class="row">
        <div class="col-4">
          <h3>View Company Bank</h3>
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
              <label for="validationCustom01" class="col-sm-4 col-form-label">{{$company_bank->bank->name}} </label>
              </div>
          </div>
          </div>

          <div class="col-md-8">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Branch Name <span class="mandatory">*</span></label>
              <div class="col-sm-6">
              <label for="validationCustom01" class="col-sm-4 col-form-label">{{$company_bank->bank_branch->branch}} </label>

                      </div>
                     </div>
          </div>
          
          <div class="col-md-8">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Account Type <span class="mandatory">*</span></label>
              <div class="col-sm-6">
               
              <label for="validationCustom01" class="col-sm-4 col-form-label">{{$company_bank->account_types->name}} </label>

               
              </div>
          
          </div>
          </div>

          <div class="col-md-8">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Account Holder Name <span class="mandatory">*</span></label>
              <div class="col-sm-8">
              <label for="validationCustom01" class="col-sm-4 col-form-label">{{$company_bank->holder_name}} </label>
              </div>
            </div>
          </div>

          <div class="col-md-8">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Account No <span class="mandatory">*</span></label>
              <div class="col-sm-8">
              <label for="validationCustom01" class="col-sm-4 col-form-label">{{$company_bank->account_no}} </label>


              </div>
            </div>
          </div>
          
        </div>
        <div class="col-md-7 text-right">
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