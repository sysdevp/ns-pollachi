@extends('admin.layout.app')
@section('content')
<main class="page-content">

<div class="col-12 body-sec">
  <div class="card container px-0">
    <!-- card header start@ -->
    <div class="card-header px-2">
      <div class="row">
        <div class="col-4">
          <h3>Add Mail</h3>
        </div>
        <div class="col-8 mr-auto">
          <ul class="h-right-btn mb-0 pl-0">
            <li><button type="button" class="btn btn-success"><a href="{{url('mailsetting-setup')}}">Back</a></button></li>
          </ul>
        </div>
      </div>
    </div>
    <!-- card header end@ -->
    <div class="card-body">
    
      <form  method="post" class="form-horizontal needs-validation" novalidate action="{{url('mailsetting-setup/store')}}" enctype="multipart/form-data">
      {{csrf_field()}}

        <div class="form-row">
          <div class="col-md-7">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Mail Driver <span class="mandatory">*</span></label>
              <div class="col-sm-8">
                <input type="text" class="form-control name only_allow_alp_num_dot_com_amp" placeholder="Ex: smtp" name="mail_driver" value="{{old('mail_driver')}}" required>
                <span class="mandatory"> {{ $errors->first('mail_driver')  }} </span>
                <div class="invalid-feedback">
                  Enter valid Mail Driver
                </div>
              </div>
            </div>
          </div>
         
          
          <div class="col-md-7">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Mail Host <span class="mandatory">*</span></label>
              <div class="col-sm-8">
                <input type="text" class="form-control code only_allow_alp_num_dot_com_amp" placeholder="Ex: smtp.gmail.com	" name="mail_host" value="{{old('mail_host')}}"  required>
                <span class="mandatory"> {{ $errors->first('mail_host')  }} </span>
                <div class="invalid-feedback">
                  Enter valid Mail Host
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-7">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Mail Port <span class="mandatory">*</span></label>
              <div class="col-sm-8">
                <input type="text" class="form-control code only_allow_alp_num_dot_com_amp" placeholder="Ex: 587" name="mail_port" value="{{old('mail_port')}}"  required>
                <span class="mandatory"> {{ $errors->first('mail_port')  }} </span>
                <div class="invalid-feedback">
                  Enter valid Mail Port
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-7">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Mail Username <span class="mandatory">*</span></label>
              <div class="col-sm-8">
                <input type="text" class="form-control code only_allow_alp_num_dot_com_amp" placeholder="Ex: abc@gmail.com" name="mail_username" value="{{old('mail_username')}}"  required>
                <span class="mandatory"> {{ $errors->first('mail_username')  }} </span>
                <div class="invalid-feedback">
                  Enter valid Mail Username
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-7">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Mail Password <span class="mandatory">*</span></label>
              <div class="col-sm-8">
                <input type="text" class="form-control code only_allow_alp_num_dot_com_amp" placeholder="Mail Password" name="mail_password" value="{{old('mail_password')}}"  required>
                <span class="mandatory"> {{ $errors->first('mail_password')  }} </span>
                <div class="invalid-feedback">
                  Enter valid Mail Password
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-7">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Mail Encryption <span class="mandatory">*</span></label>
              <div class="col-sm-8">
                <input type="text" class="form-control code only_allow_alp_num_dot_com_amp" placeholder="Ex: tls" name="mail_encryption" value="{{old('mail_encryption')}}"  required>
                <span class="mandatory"> {{ $errors->first('mail_encryption')  }} </span>
                <div class="invalid-feedback">
                  Enter valid Mail Password
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
    <!-- <script src="{{asset('assets/js/master/capitalize.js')}}"></script> -->
    <script type="text/javascript">
      $(document).on('input','.name',function(){

      $(this).val($(this).val().replace(/[^a-zA-Z0-9 ]/gi, ''));

      });

      $(document).on('input','.code',function(){

      $(this).val($(this).val().replace(/[^a-zA-Z0-9 ]/gi, ''));

      });

    </script>
    <!-- card body end@ -->
  </div>
</div>
@endsection

