@extends('admin.layout.app')
@section('content')
<main class="page-content">
<div class="container-fuild" style="background:#28a745">
				<div class="text-right pr-3">sdfjsdfjl</div>
		</div>
<div class="col-12 body-sec">
  <div class="card container px-0">
    <!-- card header start@ -->
    <div class="card-header px-2">
      <div class="row">
        <div class="col-4">
          <h3>View User </h3>
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
      <div class="form-row">
        <div class="col-md-7">
          <div class="form-group row">
            <label for="validationCustom01" class="col-sm-4 col-form-label">Name :</label>
            <label for="validationCustom01" class="col-sm-4 col-form-label"> {{ isset($user->employee->name) && !empty($user->employee->name) ? $user->employee->name : "" }}</label>
          </div>
        </div>

        <div class="col-md-7">
          <div class="form-group row">
            <label for="validationCustom01" class="col-sm-4 col-form-label">User Name :</label>
            <label for="validationCustom01" class="col-sm-4 col-form-label"> {{ $user->user_name }}</label>
          </div>
        </div>

          <div class="col-md-7">
              <div class="form-group row">
                <label for="validationCustom01" class="col-sm-4 col-form-label">Role :</label>
                <label for="validationCustom01" class="col-sm-4 col-form-label"> {{ isset($user->role->name) && !empty($user->role->name) ? $user->role->name : "" }}</label>
              </div>
            </div>
        
        
      </div>
    </div>
    <!-- card body end@ -->
  </div>
</div>
@endsection