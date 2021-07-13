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
          <h3>Edit Denomination </h3>
        </div>
        <div class="col-8 mr-auto">
          <ul class="h-right-btn mb-0 pl-0">
            <li><button type="button" class="btn btn-success"><a href="{{url('master/denomination')}}">Back</a></button></li>
          </ul>
        </div>
      </div>
    </div>
    <!-- card header end@ -->
    <div class="card-body">
    
      <form  method="post" class="form-horizontal needs-validation" novalidate action="{{url('master/denomination/update/'.$denomination->id)}}" enctype="multipart/form-data">
      {{csrf_field()}}

      <div class="form-row">
          <div class="col-md-7">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Amount <?php echo Mandatoryfields::mandatory('denomination_amount ');?></label>
              <div class="col-sm-8">
                <input type="text" class="form-control amount only_allow_alp_numeric" placeholder="Amount" name="amount" value="{{old('amount',$denomination->amount)}}" <?php echo Mandatoryfields::validation('denomination_amount');?> tabindex="1" autofocus>
                <span class="mandatory"> {{ $errors->first('amount')  }} </span>
                <div class="invalid-feedback">
                  Enter valid Amount
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-7">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Remarks <?php echo Mandatoryfields::mandatory('denomination_remark');?></label>
              <div class="col-sm-8">
                <input type="text" class="form-control remark" placeholder="Remarks" name="remark" value="{{old('remark',$denomination->remark)}}" <?php echo Mandatoryfields::validation('denomination_remark');?> tabindex="2">
                <span class="mandatory"> {{ $errors->first('remark')  }} </span>
                <div class="invalid-feedback">
                  Enter valid Bank Code
                </div>
              </div>
            </div>
          </div>
          
        </div>
        <div class="col-md-7 text-right">
          <button class="btn btn-success" type="submit" tabindex="3">Submit</button>
        </div>
      </form>
    </div>

    <script>
      
      // $(document).on('input','#amount',function(){

      // $(this).val($(this).val().replace(/[^0-9]/gi, ''));

      // });
  $(document).on('input','.amount',function(){

    $(this).val($(this).val().replace(/[^0-9.0-9]/gi, ''));
    if ($(this).val().replace(/[^.]/g, "").length > 1)
    {
    $(this).val(''); 
    }
    else
    {

    }

  });

    </script>

    <!-- card body end@ -->
  </div>
</div>
@endsection