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
          <h3>Add District</h3>
        </div>
        <div class="col-8 mr-auto">
          <ul class="h-right-btn mb-0 pl-0">
            <li><button type="button" class="btn btn-success"><a href="{{url('master/district')}}">Back</a></button></li>
          </ul>
        </div>
      </div>
    </div>
    <!-- card header end@ -->
    <div class="card-body">

      <form method="post" class="form-horizontal needs-validation" novalidate action="{{url('master/district/store')}}" enctype="multipart/form-data">
        {{csrf_field()}}

        <div class="form-row">
          <div class="col-md-8">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">District Name <?php echo Mandatoryfields::mandatory('district_name');?></label>
              <div class="col-sm-8">
                <input type="text" class="form-control name only_allow_alp_num_dot_com_amp caps" placeholder="District Name" name="name" value="{{old('name')}}" <?php echo Mandatoryfields::validation('district_name');?>>
                <span class="mandatory"> {{ $errors->first('name')  }} </span>
                <div class="invalid-feedback">
                  Enter valid District Name
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-8">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">State <?php echo Mandatoryfields::mandatory('district_state_id');?></label>
              <div class="col-sm-6">
                <select class="js-example-basic-multiple form-control col-12 custom-select state_id" name="state_id" <?php echo Mandatoryfields::validation('district_state_id');?>>
                  <option value="">Choose States</option>
                  @foreach($state as $value)
                  <option value="{{ $value->id }}" {{ old('state_id') == $value->id ? 'selected' : '' }}>{{ $value->name }}</option>
                  @endforeach
                </select>
                <span class="mandatory"> {{ $errors->first('state_id')  }} </span>
                <div class="invalid-feedback">
                  Select valid State Code
                </div>
              </div>
              <a href="{{ url('master/state/create')}}" target="_blank">
                <button type="button"  class="px-3 btn btn-success ml-2" title="Add State"><i class="fa fa-plus-circle" aria-hidden="true"></i></button></a>
               <button type="button" class="px-3 btn btn-success mx-2 refresh_state_id" title="Refresh"><i class="fa fa-refresh" aria-hidden="true"></i></button>
          
            </div>
          </div>

          <div class="col-md-8">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Remark <?php echo Mandatoryfields::mandatory('district_remark');?> </label>
              <div class="col-sm-8">
                <input type="text" class="form-control remark" name="remark" value="{{old('remark')}}" placeholder="Remark" <?php echo Mandatoryfields::validation('district_remark');?>>
              <div class="invalid-feedback">
                  Enter Remark
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

  $(document).on('input','.name',function(){

  $(this).val($(this).val().replace(/[^a-zA-Z ]/gi, ''));

  });

$(document).on("click",".refresh_state_id",function(){
   var state_dets=refresh_state_master_details();
  $(".state_id").html(state_dets);
});
</script>


@endsection