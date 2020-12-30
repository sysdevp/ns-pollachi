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
          <h3>Add Category</h3>
        </div>
        <div class="col-8 mr-auto">
          <ul class="h-right-btn mb-0 pl-0">
            <li><button type="button" class="btn btn-success"><a href="{{url('master/category')}}">Back</a></button></li>
          </ul>
        </div>
      </div>
    </div>
    <!-- card header end@ -->
    <div class="card-body">
    
      <form  method="post" class="form-horizontal needs-validation" novalidate action="{{url('master/category/store')}}" enctype="multipart/form-data">
      {{csrf_field()}}

        <div class="form-row">
          <div class="col-md-7">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Belongs To<span class="mandatory">*</span></label>
              <div class="col-sm-8">
                <select class="js-example-basic-multiple form-control col-12 custom-select parent_id" name="parent_id" required>
                  <option value="">Choose Category</option>
                  <option value="0" {{ old('parent_id') == "0" ? 'selected' : '' }} >Parent</option>
                  @foreach($category as $value)
                  <option value="{{ $value->id }}" {{ old('parent_id') == $value->id ? 'selected' : '' }}>{{ $value->name }}</option>
                  @endforeach
                </select>
                <span class="mandatory"> {{ $errors->first('parent_id')  }} </span>
                <div class="invalid-feedback">
                  Enter valid Belongs To
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-7">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Name<span class="mandatory">*</span></label>
              <div class="col-sm-8">
                <input type="text" class="form-control name only_allow_alp_num_dot_com_amp caps" placeholder="Name" name="name" value="{{old('name')}}" required>
                <span class="mandatory"> {{ $errors->first('name')  }} </span>
                <div class="invalid-feedback">
                  Enter valid Name
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-7">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">HSN</label>
              <div class="col-sm-8">
                <input type="text" class="form-control hsn" placeholder="HSN" name="hsn" value="{{old('hsn')}}">
                
              </div>
            </div>
          </div>

          <div class="col-md-7">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">GST %</label>
              <div class="col-sm-8">
                <input type="text" class="form-control gst_no" onkeypress="return isNumberKey(event)" placeholder="GST %" name="gst_no" value="{{old('gst_no')}}">
                
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
      <SCRIPT language=Javascript>
       function isNumberKey(evt)
       {
          var charCode = (evt.which) ? evt.which : evt.keyCode;
          if (charCode != 46 && charCode > 31 && (charCode < 48 || charCode > 57))
            return false;

            return true;
       }

       $(document).on('input','.hsn ',function(){

        $(this).val($(this).val().replace(/[^0-9]/gi, ''));
        if($(this).val().replace(/[^0-9]/gi, '').length > 6)
        {
          $(this).val('');
        }
        else
        {
          
        }

      });
       
    </SCRIPT>
    </div>
    <script src="{{asset('assets/js/master/capitalize.js')}}"></script>
    <!-- card body end@ -->
  </div>
</div>
@endsection

