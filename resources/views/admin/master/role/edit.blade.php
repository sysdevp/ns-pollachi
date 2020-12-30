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
          <h3>Edit Role </h3>
        </div>
        <div class="col-8 mr-auto">
          <ul class="h-right-btn mb-0 pl-0">
            <li><button type="button" class="btn btn-success"><a href="{{url('master/role')}}">Back</a></button></li>
          </ul>
        </div>
      </div>
    </div>
    <!-- card header end@ -->
    <div class="card-body">
    
      <form  method="post" class="form-horizontal needs-validation" novalidate action="{{url('master/role/update/'.$role->id)}}" enctype="multipart/form-data">
      {{csrf_field()}}
      <span class="mandatory"> {{ $errors->first('permission')  }} </span>
        <div class="form-row">
          <div class="col-md-12">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-2 col-form-label">Role Name <span class="mandatory">*</span></label>
              <div class="col-sm-7">
                <input type="text" class="form-control name only_allow_alp_num_dot_com_amp" placeholder="Role Name" name="name" value="{{old('name', $role->name)
}}" required>
                <span class="mandatory"> {{ $errors->first('name')  }} </span>
                <div class="invalid-feedback">
                  Enter valid Role Name
                </div>
              </div>
            </div>
          </div>

          <div class="col-12 col-sm-12 col-md-12">
            <div class="form-group row">
                <p class="col-md-2">Permission:</p>
                <br/>
                <div class="col-md-10">
                    <div class="row">
                @foreach($permission as $value)
                <label class="col-md-3"> 
                     <input type="checkbox" name="permission[]" class="permission"  {{ in_array($value->id, $rolePermissions) ? "checked" : "" }} value="{{$value->id}}"  >  
                    {{ $value->label }}
                </label>
                    
                  
                
                @endforeach
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
    <!-- <script src="{{asset('assets/js/master/capitalize.js')}}"></script> -->
    <!-- card body end@ -->
  </div>
</div>
@endsection