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
          <h3>Edit POS</h3>
        </div>
        <div class="col-8 mr-auto">
          <ul class="h-right-btn mb-0 pl-0">
            <li><button type="button" class="btn btn-success"><a href="{{route('po-sales.index')}}">Back</a></button></li>
          </ul>
        </div>
      </div>
    </div>
    <!-- card header end@ -->
    <div class="card-body">
    
      <form  method="post" class="form-horizontal needs-validation" novalidate action="{{route('po-sales.update',$pos_master->id)}}" enctype="multipart/form-data">
      {{csrf_field()}}
      @method('PATCH')

        <div class="form-row">

          <div class="col-md-7">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Pos Number <?php echo Mandatoryfields::mandatory('bank_name');?></label>
              <div class="col-sm-8">
                <input type="number" class="form-control name only_allow_alp_num_dot_com_amp pos_number" placeholder="POS Number" name="pos_number" value="{{ $pos_master->pos_no }}" <?php echo Mandatoryfields::validation('bank_name');?> tabindex="1" autofocus>
                <span class="mandatory"> {{ $errors->first('name')  }} </span>
                <div class="invalid-feedback">
                  Enter valid Bank Name
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-7">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Pos Name <?php echo Mandatoryfields::mandatory('bank_name');?></label>
              <div class="col-sm-8">
                <input type="text" class="form-control name only_allow_alp_num_dot_com_amp pos_name" placeholder="POS Name" name="pos_name" value="{{ $pos_master->pos_name }}" <?php echo Mandatoryfields::validation('bank_name');?> tabindex="1" autofocus>
                <span class="mandatory"> {{ $errors->first('name')  }} </span>
                <div class="invalid-feedback">
                  Enter valid Bank Name
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-7">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Location Name <?php echo Mandatoryfields::mandatory('bank_name');?></label>
              <div class="col-sm-8">
              <select class="js-example-basic-multiple form-control location" data-placeholder="Choose Location" id="location" name="location" <?php echo Mandatoryfields::validation('purchaseentry_location');?>>
                @foreach($location as $key => $value)
                <?php $select = ($pos_master->location_id == $value->id) ? $select = 'selected' : $select = ''; ?>
                <option value="{{ $value->id }}" <?php echo $select; ?> >{{ $value->name }}</option>
                @endforeach
               </select>
                <span class="mandatory"> {{ $errors->first('name')  }} </span>
                <div class="invalid-feedback">
                  Enter valid Bank Name
                </div>
              </div>
            </div>
          </div>
          
        </div>
        <div class="col-md-7 text-right">
          <button class="btn btn-success" name="add" type="submit" tabindex="3">Submit</button>
        </div>
      </form>
    </div>
    <!-- <script src="{{asset('assets/js/master/capitalize.js')}}"></script> -->
    <script type="text/javascript">
      $(document).on('input','.name',function(){

      $(this).val($(this).val().replace(/[^a-zA-Z0-9 ]/gi, ''));

      });

      $(document).on('input','.code',function(){

      $(this).val($(this).val().replace(/[^a-zA-Z0-9 ]/gi, ''));

      });

    </script>
        <script src="{{asset('assets/js/master/capitalize.js')}}"></script>

    <!-- card body end@ -->
  </div>
</div>
@endsection

