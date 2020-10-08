@extends('admin.layout.app')
@section('content')
<div class="col-12 body-sec">
  <div class="card container px-0">
    <!-- card header start@ -->
    <div class="card-header px-2">
      <div class="row">
        <div class="col-4">
          <h3>Add Category Name</h3>
        </div>
        <div class="col-8 mr-auto">
          <ul class="h-right-btn mb-0 pl-0">
            <li><button type="button" class="btn btn-success"><a href="{{url('master/category-name')}}">Back</a></button></li>
          </ul>
        </div>
      </div>
    </div>
    <!-- card header end@ -->
    <div class="card-body">
    
      <form  method="post" class="form-horizontal needs-validation" novalidate action="{{url('master/category-name/store')}}" enctype="multipart/form-data">
      {{csrf_field()}}

        <div class="form-row">
          <div class="col-md-7">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Category Name 1<span class="mandatory">*</span></label>
              <div class="col-sm-8">
                <input type="text" class="form-control category_name_1 only_allow_alp_num_dot_com_amp" placeholder="Category Name 1" name="category_name_1" value="{{old('category_name_1')}}" required>
                <span class="mandatory"> {{ $errors->first('category_name_1')  }} </span>
                <div class="invalid-feedback">
                  Enter valid Category Name 1
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-7">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Category Name 2<span class="mandatory">*</span></label>
              <div class="col-sm-8">
                <input type="text" class="form-control category_name_2 only_allow_alp_num_dot_com_amp" placeholder="Category Name 2" name="category_name_2" value="{{old('category_name_2')}}" required>
                <span class="mandatory"> {{ $errors->first('category_name_2')  }} </span>
                <div class="invalid-feedback">
                  Enter valid Category Name 2
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-7">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Category Name 3<span class="mandatory">*</span></label>
              <div class="col-sm-8">
                <input type="text" class="form-control category_name_3 only_allow_alp_num_dot_com_amp" placeholder="Category Name 3" name="category_name_3" value="{{old('category_name_3')}}" required>
                <span class="mandatory"> {{ $errors->first('category_name_3')  }} </span>
                <div class="invalid-feedback">
                  Enter valid Category Name 3
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

