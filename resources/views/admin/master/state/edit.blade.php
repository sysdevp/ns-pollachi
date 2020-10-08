@extends('admin.layout.app')
@section('content')
<div class="col-12 body-sec">
  <div class="card container px-0">
    <!-- card header start@ -->
    <div class="card-header px-2">
      <div class="row">
        <div class="col-4">
          <h3>Edit State</h3>
        </div>
        <div class="col-8 mr-auto">
          <ul class="h-right-btn mb-0 pl-0">
            <li><button type="button" class="btn btn-success"><a href="{{url('master/state')}}">Back</a></button></li>
          </ul>
        </div>
      </div>
    </div>
    <!-- card header end@ -->
    <div class="card-body">
    
      <form  method="post" class="form-horizontal needs-validation" novalidate action="{{url('master/state/update/'.$state->id)}}" enctype="multipart/form-data">
      {{csrf_field()}}

        <div class="form-row">
          <div class="col-md-7">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">State Name <span class="mandatory">*</span></label>
              <div class="col-sm-8">
                <input type="text" class="form-control name only_allow_alp_num_dot_com_amp" placeholder="State Name" name="name" value="{{old('name', $state->name)
}}" required>
                <span class="mandatory"> {{ $errors->first('name')  }} </span>
                <div class="invalid-feedback">
                  Enter valid State Name
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-7">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">State Code <span class="mandatory">*</span></label>
              <div class="col-sm-8">
                <input type="text" class="form-control code only_allow_digit" placeholder="State Code" name="code" value="{{old('code',$state->code)}}"  required>
                <span class="mandatory"> {{ $errors->first('code')  }} </span>
                <div class="invalid-feedback">
                  Enter valid State Code
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-7">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Remark </label>
              <div class="col-sm-8">
                <input type="text" class="form-control remark" name="remark" value="{{old('remark',$state->remark)}}" placeholder="Remark">
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
    <script>
      
      $(document).on('input','.name',function(){

      $(this).val($(this).val().replace(/[^a-zA-Z ]/gi, ''));

      });

      $(document).on('input','.code',function(){

        $(this).val($(this).val().replace(/[^0-9.0-9]/gi, ''));
        if ($(this).val().replace(/[^.]/g, "").length > 1)
        {
        $(this).val(''); 
        }
        else
        {

        }

  });
    </script>
    <!-- card body end@ -->
  </div>
</div>
@endsection