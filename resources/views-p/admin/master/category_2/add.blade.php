@extends('admin.layout.app')
@section('content')
<main class="page-content">

<div class="col-12 body-sec">
  <div class="card container px-0">
    <!-- card header start@ -->
    <div class="card-header px-2">
      <div class="row">
        <div class="col-4">
          <h3>Add Category - 2</h3>
        </div>
        <div class="col-8 mr-auto">
          <ul class="h-right-btn mb-0 pl-0">
            <li><button type="button" class="btn btn-success"><a href="{{url('master/category-two')}}">Back</a></button></li>
          </ul>
        </div>
      </div>
    </div>
    <!-- card header end@ -->
    <div class="card-body">
    
      <form  method="post" class="form-horizontal needs-validation" novalidate action="{{url('master/category-two/store')}}" enctype="multipart/form-data">
      {{csrf_field()}}

        <div class="form-row">

            <div class="col-md-7">
                <div class="form-group row">
                <label for="validationCustom01" class="col-sm-4 col-form-label">Category 1 <span class="mandatory">*</span></label>
                  <div class="col-sm-8">
                  <select class="js-example-basic-multiple col-12 form-control custom-select category_one_id required_for_valid" error-data="Enter valid Category 1" name="category_one_id" required>
                      <option value="">Choose Category 1</option>
                      @foreach($category_one as $value)
                      <option value="{{ $value->id }}" {{ old('category_one_id') == $value->id ? 'selected' : '' }} >{{ $value->name }}</option>
                      @endforeach
                    </select>
                    <span class="mandatory"> {{ $errors->first('category_one_id')  }} </span>
                   <div class="invalid-feedback">
                      Enter valid Category 
                    </div>
                  </div>
                </div>
              </div>
          <div class="col-md-7">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Name<span class="mandatory">*</span></label>
              <div class="col-sm-8">
                <input type="text" class="form-control name only_allow_alp_num_dot_com_amp" placeholder="Name" name="name" value="{{old('name')}}" required>
                <span class="mandatory"> {{ $errors->first('name')  }} </span>
                <div class="invalid-feedback">
                  Enter valid Name
                </div>
              </div>
            </div>
          </div>



          

            <div class="col-md-7">
                <div class="form-group row">
                  <label for="validationCustom01" class="col-sm-4 col-form-label"> Remark </label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control remark only_allow_alp_num_dot_com_amp" placeholder="Remark" name="remark" value="{{old('remark')}}">
                    <span class="mandatory"> {{ $errors->first('remark')  }} </span>
                    <div class="invalid-feedback">
                      Enter valid Remark
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
    <!-- card body end@ -->
  </div>
</div>
@endsection

