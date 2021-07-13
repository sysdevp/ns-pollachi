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
          <h3>Add Role</h3>
        </div>
        <div class="col-8 mr-auto">
          <ul class="h-right-btn mb-0 pl-0">
            <li><button type="button" class="btn btn-success"><a href="{{url('master/designation')}}">Back</a></button></li>
          </ul>
        </div>
      </div>
    </div>
    <!-- card header end@ -->
    <div class="card-body">
    
      <form  method="post" class="form-horizontal needs-validation" novalidate action="{{url('master/designation/store')}}" enctype="multipart/form-data">
      {{csrf_field()}}

        <div class="form-row">
          <div class="col-md-7">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Role Name <?php echo Mandatoryfields::mandatory('designation_name');?></label>
              <div class="col-sm-8">
                <input type="text" class="form-control name only_allow_alp_numeric caps" placeholder="Role Name" name="name" value="{{old('name')}}" <?php echo Mandatoryfields::validation('designation_name');?> tabindex="1" autofocus>
                <span class="mandatory"> {{ $errors->first('name')  }} </span>
                <div class="invalid-feedback">
                  Enter valid Role Name
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-7">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Short Name <?php echo Mandatoryfields::mandatory('designation_shortname');?></label>
              <div class="col-sm-8">
                <input type="text" class="form-control only_allow_alp_numeric short_name" placeholder="Short Name" name="short_name" value="{{old('short_name')}}" <?php echo Mandatoryfields::validation('designation_shortname');?> tabindex="2">
                <span class="mandatory"> {{ $errors->first('short_name')  }} </span>
                <div class="invalid-feedback">
                  Enter valid Short Name
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-7">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Remarks <?php echo Mandatoryfields::mandatory('designation_remark');?></label>
              <div class="col-sm-8">
                <input type="text" class="form-control remark" placeholder="Remarks" name="remark" value="{{old('remark')}}" <?php echo Mandatoryfields::validation('designation_remark');?> tabindex="3">
                <span class="mandatory"> {{ $errors->first('remark')  }} </span>
                <div class="invalid-feedback">
                  Enter valid Remark
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
@endsection

