@extends('admin.layout.app')
@section('content')
<main class="page-content">

<div class="col-12 body-sec">
  <div class="card container px-0">
    <!-- card header start@ -->
    <div class="card-header px-2">
      <div class="row">
        <div class="col-4">
          <h3>Change Password</h3>
        </div>
        <div class="col-8 mr-auto">
          <ul class="h-right-btn mb-0 pl-0">
            <li><button type="button" class="btn btn-success"><a href="{{url('master/user')}}">Back</a></button></li>
          </ul>
        </div>
      </div>
    </div>
    <!-- card header end@ -->
    <div class="card-body">
    
      <form  method="post" class="form-horizontal needs-validation" novalidate action="{{url('update-password/'.$user->id)}}" enctype="multipart/form-data">
      {{csrf_field()}}

        <div class="form-row">

  

              <div class="col-md-6">
                <div class="form-group row">
                <label for="validationCustom01" class="col-sm-4 col-form-label">Name:</label>
                  <div class="col-sm-8">
                  <label for="validationCustom01" class="col-sm-4 col-form-label">{{@$name = ($employee->name!="")?$employee->name:"Admin"}}</label>

                  </div>
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group row">
                  <label for="validationCustom01" class="col-sm-4 col-form-label">User Name:</label>
                  <div class="col-sm-8">
                  <label for="validationCustom01" class="col-sm-4 col-form-label">{{$user->user_name}}</label>

                  </div>
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group row">
                  <label for="validationCustom01" class="col-sm-4 col-form-label">Change Password<span class="mandatory">*</span></label>
                  <div class="col-sm-8">
                    <input type="password" class="form-control user_name only_allow_alp_num_dot_com_amp" placeholder="Password" name="password" value="{{old('password')}}" required>
                    <span class="mandatory"> {{ $errors->first('password')  }} </span>
                    <div class="invalid-feedback">
                      Enter valid Password
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group row">
                  <label for="validationCustom01" class="col-sm-4 col-form-label">Confirm Password<span class="mandatory">*</span></label>
                  <div class="col-sm-8">
                    <input type="password" class="form-control confirm_password only_allow_alp_num_dot_com_amp" placeholder="Confirm Password" name="confirm_password" value="{{old('confirm_password')}}" required>
                    <span class="mandatory"> {{ $errors->first('confirm_password')  }} </span>
                    <div class="invalid-feedback">
                      Enter valid Confirm Password
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group row">
                <label for="validationCustom01" class="col-sm-4 col-form-label">Role:</label>
                  <div class="col-sm-8">
                  <label for="validationCustom01" class="col-sm-4 col-form-label">{{@$role = ($employee->role!="")?$employee->role:"Admin"}}</label>

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
    <!-- card body end@ -->
  </div>
</div>
@endsection

