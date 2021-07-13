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
          <h3>Edit Target To Sales Man</h3>
        </div>
        <div class="col-8 mr-auto">
          <ul class="h-right-btn mb-0 pl-0">
            <li><button type="button" class="btn btn-success"><a href="{{route('salesman-target-details.index')}}">Back</a></button></li>
          </ul>
        </div>
      </div>
    </div>
    <!-- card header end@ -->
    <div class="card-body">
    
      <form  method="post" class="form-horizontal needs-validation" novalidate action="{{route('salesman-target-details.update',$salesman_target->target_id)}}" enctype="multipart/form-data">
      {{csrf_field()}}
      @method('PATCH')

        <div class="form-row">
          <div class="col-md-7">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Sales Man <?php echo Mandatoryfields::mandatory('bank_name');?></label>
              <div class="col-sm-8">
                <select class="js-example-basic-multiple col-12 form-control custom-select" required="" name="salesman_id">
                  
                  @foreach($sales_man as $key => $value)
                  <?php $select = ($salesman_target->salesman_id == $value->id)? $select = 'selected': $select = ''; ?>
                  <option value="{{ $value->id }}" <?php echo $select; ?>>{{ $value->name }}</option>
                  @endforeach
                </select>
                <span class="mandatory"> {{ $errors->first('name')  }} </span>
                <div class="invalid-feedback">
                  Select valid Sales Man Name
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-7">
            
            <table id="master" class="table table-bordered table-hover">
        <thead>
          <tr>
            <th>S.No</th>
            <th>Location Name</th>
            <th>Target Amount</th>
            <th>Target From Date</th>
            <th>Target Till Date</th>
          </tr>
        </thead>
        <tbody>
          
          @foreach($target_details as $key => $value)
            <tr>
              <td>{{ $key+1 }}</td>
              <td>{{ $value->locations->name}}<input type="hidden" name="location_id[]" value="{{ $value->locations->id}}"></td>
              <td><input type="number" placeholder="Target Amount" value="{{ $value->target_amount}}" name="target_amount[]"></td>
              <td><input type="date" autocomplete="off" name="target_from_date[]" value="{{ $value->target_from_date}}"></td>
              <td><input type="date" autocomplete="off" name="target_date[]" value="{{ $value->target_date}}"></td>
            </tr>
         @endforeach
        </tbody>
      </table>

          </div>
          
        </div>
        <div class="col-md-7 text-right">
          <button class="btn btn-success" name="add" type="submit" tabindex="3">Submit</button>
        </div>
      </form>
    </div>
    <!-- <script src="{{asset('assets/js/master/capitalize.js')}}"></script> -->
   
        <script src="{{asset('assets/js/master/capitalize.js')}}"></script>

    <!-- card body end@ -->
  </div>
</div>
@endsection

