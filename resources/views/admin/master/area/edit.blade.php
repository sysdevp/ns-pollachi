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
          <h3>Edit Area</h3>
        </div>
        <div class="col-8 mr-auto">
          <ul class="h-right-btn mb-0 pl-0">
            <li><button type="button" class="btn btn-success"><a href="{{url('master/area')}}">Back</a></button></li>
          </ul>
        </div>
      </div>
    </div>
    <!-- card header end@ -->
    <div class="card-body">
    
      <form  method="post" class="form-horizontal needs-validation" novalidate action="{{url('master/area/update/'.$area->id)}}" enctype="multipart/form-data">
      {{csrf_field()}}

        <div class="form-row">
            <div class="col-md-7">
                <div class="form-group row">
                  <label for="validationCustom01" class="col-sm-4 col-form-label">Area Name <?php echo Mandatoryfields::mandatory('area_name');?></label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control name only_allow_alp_num_dot_com_amp caps" placeholder="Area Name" name="name" value="{{old('name',$area->name)}}" <?php echo Mandatoryfields::validation('area_name');?> autofocus>
                    <span class="mandatory"> {{ $errors->first('name')  }} </span>
                    <div class="invalid-feedback">
                      Enter valid Area Name
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-7">
                <div class="form-group row">
                  <label for="validationCustom01" class="col-sm-4 col-form-label">Postal Code <?php echo Mandatoryfields::mandatory('area_code');?></label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control code only_allow_digit" placeholder="Postal Code" name="code" value="{{old('code',$area->code)}}"  <?php echo Mandatoryfields::validation('area_code');?>>
                    <span class="mandatory"> {{ $errors->first('code')  }} </span>
                    <div class="invalid-feedback">
                      Enter valid Postal Code
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-7">
                <div class="form-group row">
                  <label for="validationCustom01" class="col-sm-4 col-form-label">Remark <?php echo Mandatoryfields::mandatory('area_remark');?></label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control remark" name="remark" value="{{old('remark',$area->remark)}}" placeholder="Remark" <?php echo Mandatoryfields::validation('area_remark');?>>
                  </div>
                </div>
              </div>
       
        
        </div>
        <div class="col-md-7 text-right">
          <button class="btn btn-success" type="submit">Submit</button>
        </div>
      </form>
    </div>
    <script src="{{asset('assets/js/master/capitalize.js')}}"></script>
    <!-- card body end@ -->
  </div>
</div>
@endsection