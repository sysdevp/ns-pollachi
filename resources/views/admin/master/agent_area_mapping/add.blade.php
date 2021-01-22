@extends('admin.layout.app')
@section('content')
<main class="page-content">

<div class="col-12 body-sec">
  <div class="card container px-0">
    <!-- card header start@ -->
    <div class="card-header px-2">
      <div class="row">
        <div class="col-4">
          <h3>Add Agent Area Mapping </h3>
        </div>
        <div class="col-8 mr-auto">
          <ul class="h-right-btn mb-0 pl-0">
            <li><button type="button" class="btn btn-success"><a href="{{url('master/agent-area-mapping')}}">Back</a></button></li>
          </ul>
        </div>
      </div>
    </div>
    <!-- card header end@ -->
    <div class="card-body">
    
      <form  method="post" class="form-horizontal needs-validation" novalidate action="{{url('master/agent-area-mapping/store')}}" enctype="multipart/form-data">
      {{csrf_field()}}

        <div class="form-row">
            <div class="col-md-7">
                <div class="form-group row">
                  <label for="validationCustom01" class="col-sm-4 col-form-label">Agent Name <span class="mandatory">*</span></label>
                  <div class="col-sm-8">
                    <select class="js-example-basic-multiple form-control col-12 custom-select agent_id" data-placeholder="Choose Agent Name" name="agent_id" required>
                      <option value="">Choose Agent Name</option>
                      @foreach($agent as $value)
                      <option value="{{ $value->id }}" {{ old('agent_id') == $value->id ? 'selected' : '' }}>{{ $value->name }}</option>
                      @endforeach
                    </select>
                    <span class="mandatory"> {{ $errors->first('agent_id')  }} </span>
                    <div class="invalid-feedback">
                     Please Choose valid Agent Name
                    </div>
                  </div>
                </div>
              </div>


              <div class="col-md-7">
                  <div class="form-group row">
                    <label for="validationCustom01" class="col-sm-4 col-form-label">Area Name {{ old('area_id.*')}} <span class="mandatory">*</span></label>
                    <div class="col-sm-8">
                      <select class="js-example-basic-multiple form-control col-12 custom-select area_id" data-placeholder="Choose Area Name" multiple name="area_id[]" required>
                        <option value="">Choose Area Name</option>

                        @if (is_array(old('area_id')))
                        @foreach($area as $value)
                        <option value="{{ $value->id }}" <?php if(in_array($value->id, old('area_id'))) {echo 'selected';} ?> >{{ $value->name }}</option>
                        @endforeach
                        @else
                        @foreach($area as $value)
                        <option value="{{ $value->id }}" >{{ $value->name }}</option>
                        @endforeach
                        @endif


                        
                      </select>
                      <span class="mandatory"> {{ $errors->first('area_id')  }} </span>
                      <div class="invalid-feedback">
                       Please Choose valid Agent Name
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
@endsection

