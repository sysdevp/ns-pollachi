@extends('admin.layout.app')
@section('content')
<main class="page-content">

<div class="col-12 body-sec">
  <div class="card container px-0">
    <!-- card header start@ -->
    <div class="card-header px-2">
      <div class="row">
        <div class="col-4">
          <h3>View Mail Setting</h3>
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
    <form  method="post" class="form-horizontal needs-validation" novalidate action="{{url('mailsetting-setup/send_email/'.$mailsetting->id)}}" enctype="multipart/form-data">
      {{csrf_field()}}

      <div class="form-row">
        <div class="col-md-7">
          <div class="form-group row">
            <label for="validationCustom01" class="col-sm-4 col-form-label">Mail Driver :</label>
            <label for="validationCustom01" class="col-sm-4 col-form-label"> {{ $mailsetting->mail_driver }}</label>
          </div>
        </div>
        <div class="col-md-7">
          <div class="form-group row">
            <label for="validationCustom01" class="col-sm-4 col-form-label">Mail Port :</label>
            <label for="validationCustom01" class="col-sm-4 col-form-label">{{ $mailsetting->mail_port }} </label>
          </div>
        </div>

        <div class="col-md-7">
          <div class="form-group row">
            <label for="validationCustom01" class="col-sm-4 col-form-label">Mail Host :</label>
            <label for="validationCustom01" class="col-sm-4 col-form-label">{{ $mailsetting->mail_host }} </label>
          </div>
        </div>

        <div class="col-md-7">
          <div class="form-group row">
            <label for="validationCustom01" class="col-sm-4 col-form-label">Mail Username :</label>
            <label for="validationCustom01" class="col-sm-4 col-form-label">{{ $mailsetting->mail_username }} </label>
          </div>
        </div>
        <div class="col-md-7">
          <div class="form-group row">
            <label for="validationCustom01" class="col-sm-4 col-form-label">Mail Password :</label>
            <label for="validationCustom01" class="col-sm-4 col-form-label">{{ $mailsetting->mail_password }} </label>
          </div>
        </div>

        <div class="col-md-7">
          <div class="form-group row">
            <label for="validationCustom01" class="col-sm-4 col-form-label">Mail Encryption :</label>
            <label for="validationCustom01" class="col-sm-4 col-form-label">{{ $mailsetting->mail_encryption }} </label>
          </div>
        </div>
        <div class="col-md-7">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Send Mail <span class="mandatory">*</span></label>
              <div class="col-sm-8">
                <input type="text" class="form-control" placeholder="Ex: test@gmail.com" name="send_email"  required>
                <span class="mandatory"> {{ $errors->first('mail_encryption')  }} </span>
                <div class="invalid-feedback">
                  Enter valid Mail Password
                </div>
              </div>
            </div>
          </div>
      <div class="col-md-7 text-right">
          <button class="btn btn-success" name="add" type="submit">Submit</button>
        </div>
      </div>
      
      </form>
    </div>
    <!-- card body end@ -->
  </div>
</div>
@endsection