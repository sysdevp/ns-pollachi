@extends('admin.layout.app')
@section('content')
<main class="page-content">

<div class="col-12 body-sec">
  <div class="card container px-0">
    <!-- card header start@ -->
    <div class="card-header px-2">
      <div class="row">
        <div class="col-4">
          <h3>Edit Category - 1 </h3>
        </div>
        <div class="col-8 mr-auto">
          <ul class="h-right-btn mb-0 pl-0">
            <li><button type="button" class="btn btn-success"><a href="{{url('master/category-one')}}">Back</a></button></li>
          </ul>
        </div>
      </div>
    </div>
    <!-- card header end@ -->
    <div class="card-body">
    
      <form  method="post" class="form-horizontal needs-validation" novalidate action="{{url('master/category-one/update/'.$category_one->id)}}" enctype="multipart/form-data">
      {{csrf_field()}}

        <div class="form-row">
            <div class="col-md-7">
                <div class="form-group row">
                  <label for="validationCustom01" class="col-sm-4 col-form-label">Name<span class="mandatory">*</span></label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control name only_allow_alp_num_dot_com_amp caps" placeholder="Name" name="name" value="{{old('name',$category_one->name)}}" required>
                    <span class="mandatory"> {{ $errors->first('name')  }} </span>
                    <div class="invalid-feedback">
                      Enter valid Name
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-md-7">
                  <div class="form-group row">
                    <label for="validationCustom01" class="col-sm-4 col-form-label">Remark</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control remark" placeholder="Remark" name="remark" value="{{old('remark',$category_one->remark)}}">
                      <span class="mandatory"> {{ $errors->first('remark')  }} </span>
                      <div class="invalid-feedback">
                        Enter valid Remark
                      </div>
                    </div>
                  </div>
                </div>
    
              
    
          
         
        </div>
        <div class="col-md-7 text-right">
          <button class="btn btn-success" type="submit">Submit</button>
        </div>
      </form>
    </div>
    <!-- card body end@ -->
  </div>
</div>
@endsection