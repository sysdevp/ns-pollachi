@extends('admin.layout.app')
@section('content')
<main class="page-content">

<div class="col-12 body-sec">
  <div class="card container px-0">
    <!-- card header start@ -->
    <div class="card-header px-2">
      <div class="row">
        <div class="col-4">
          <h3>Edit Sales Men </h3>
        </div>
        <div class="col-8 mr-auto">
          <ul class="h-right-btn mb-0 pl-0">
            <li><button type="button" class="btn btn-success"><a href="{{route('sales_man.index')}}">Back</a></button></li>
          </ul>
        </div>
      </div>
    </div>
    <!-- card header end@ -->
    <div class="card-body">
    
      <form  method="post" class="form-horizontal needs-validation" novalidate action="{{route('sales_man.update',$sales_man->id)}}" enctype="multipart/form-data">
      {{csrf_field()}}
      @method('PATCH')

        <div class="form-row">
          <div class="col-md-7">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Name <span class="mandatory">*</span></label>
              <div class="col-sm-8">
                <input type="text" class="form-control name only_allow_alp_num_dot_com_amp" placeholder="Brand Name" name="name" value="{{old('name', $sales_man->name)
}}" required>
                <span class="mandatory"> {{ $errors->first('name')  }} </span>
                <div class="invalid-feedback">
                  Enter valid Sales Man Name
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-7">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Employee Code </label>
              <div class="col-sm-8">
                <input type="text" class="form-control code only_allow_alp_num_dot_com_amp" placeholder="Employee Code" name="code" value="{{old('code',$sales_man->code)}}" >
                <span class="mandatory"> {{ $errors->first('code')  }} </span>
                <div class="invalid-feedback">
                  Enter valid Employee Code
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-7">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Address </label>
              <div class="col-sm-8">
                <textarea class="form-control address" placeholder="Address" name="address" value="" style="height: 100px;">{{old('address',$sales_man->address)}}</textarea>
                <span class="mandatory"> {{ $errors->first('address')  }} </span>
                <div class="invalid-feedback">
                  Enter valid Address
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-7">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Phone No<span class="mandatory">*</span></label>
              <div class="col-sm-8">
                <input type="text" class="form-control phone_no" placeholder="Phone Number" name="phone_no" value="{{old('phone_no',$sales_man->phone_no)}}" pattern="[1-9]{1}[0-9]{9}" required>
                <span class="mandatory"> {{ $errors->first('phone_no')  }} </span>
                <div class="invalid-feedback">
                  Enter valid Phone Number
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-7">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Email Id</label>
              <div class="col-sm-8">
                <input type="email" class="form-control email" placeholder="Email Id" name="email" value="{{old('email',$sales_man->email)}}">
                <span class="mandatory"> {{ $errors->first('email')  }} </span>
                <div class="invalid-feedback">
                  Enter valid Email Id
                </div>
              </div>
            </div>
          </div>
         
        </div>
        <div class="col-md-7 text-right">
          <button class="btn btn-success" type="submit">Update</button>
        </div>
      </form>
    </div>
    <script src="{{asset('assets/js/master/capitalize.js')}}"></script>
    <script type="text/javascript">
          $('.name').keyup(function () { 
          this.value = this.value.replace(/[^A-Za-z\.]/g,'');
          });
          $('.phone_no').keyup(function () { 
          this.value = this.value.replace(/[^0-9\.]/g,'');
          });
    </script>
    <!-- card body end@ -->
  </div>
</div>
@endsection