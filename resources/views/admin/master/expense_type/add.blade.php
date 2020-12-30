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
          <h3>Add Expense Type</h3>
        </div>
        <div class="col-8 mr-auto">
          <ul class="h-right-btn mb-0 pl-0">
            <li><button type="button" class="btn btn-success"><a href="{{url('master/expense-type')}}">Back</a></button></li>
          </ul>
        </div>
      </div>
    </div>
    <!-- card header end@ -->
    <div class="card-body">
    
      <form  method="post" class="form-horizontal needs-validation" novalidate action="{{url('master/expense-type/store')}}" enctype="multipart/form-data">
      {{csrf_field()}}

        <div class="form-row">
        <div class="col-md-7">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Expense Type <span class="mandatory">*</span></label>
              <div class="col-sm-8">
                <select class="js-example-basic-multiple form-control col-12 custom-select type" data-placeholder="Choose Expense Type" name="type" required>
                <option value="">Choose Expense Type</option>
                 <option value="Direct" {{ old('type') == 'Direct' ? 'selected' : '' }}>Direct</option>
                  <option value="Indirect" {{ old('type') == 'Indirect' ? 'selected' : '' }}>Indirect</option>
                 </select>
                <span class="mandatory"> {{ $errors->first('type')  }} </span>
                <div class="invalid-feedback">
                  Enter valid Expense Type
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-7">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Expense Name <span class="mandatory">*</span></label>
              <div class="col-sm-8">
                <input type="text" class="form-control name only_allow_alp_num_dot_com_amp" placeholder="Expense Name" name="name" value="{{old('name')}}" required>
                <span class="mandatory"> {{ $errors->first('name')  }} </span>
                <div class="invalid-feedback">
                  Enter valid Expense Name
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-7">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Remark </label>
              <div class="col-sm-8">
                <input type="text" class="form-control  only_allow_alp_num_dot_com_amp remark" placeholder="Remark" name="remark" value="{{old('remark')}}">
                <span class="mandatory"> {{ $errors->first('remark')  }} </span>
                <div class="invalid-feedback">
                  Enter valid Bank Code
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
    <script>
      
      $(document).on('input','.name ',function(){

      $(this).val($(this).val().replace(/[^a-zA-Z ]/gi, ''));

      });

    </script>
    <!-- card body end@ -->
  </div>
</div>
@endsection

