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
          <h3>Account Group Tax</h3>
        </div>
        <div class="col-8 mr-auto">
          <ul class="h-right-btn mb-0 pl-0">
            <li><button type="button" class="btn btn-success"><a href="{{ route('account_group_tax.index') }}">Back</a></button></li>
          </ul>
        </div>
      </div>
    </div>
    <!-- card header end@ -->
    <div class="card-body">
    
      <form  method="post" class="form-horizontal needs-validation" action="{{route('account_group_tax.store')}}" enctype="multipart/form-data">
      {{csrf_field()}}

        <div class="form-row col-md-12 tax_details mb-3">
          <div class="col-md-4">
            <label for="validationCustom01" class="col-sm-4 col-form-label">Account Group<?php echo Mandatoryfields::mandatory('accountgrouptax_group');?></label><br>
            <select class="js-example-basic-multiple col-12 form-control custom-select group"  name="group" id="group" <?php echo Mandatoryfields::validation('accountgrouptax_group');?> autofocus>
                  <option value="">Choose Account Group</option>
                  @foreach($account_group as $value)
                  <option value="{{ $value->id }}">{{ $value->name }}</option>
                  @endforeach
            </select>
          </div>
        </div>


        <div class="form-row col-md-12 tax_details mb-3">
          <div class="col-md-4">
            <label for="validationCustom01" class="col-sm-4 col-form-label">Tax Name<?php echo Mandatoryfields::mandatory('accountgrouptax_taxname');?></label><br>
            <select class="js-example-basic-multiple col-12 form-control custom-select type"  name="tax_name" id="tax_name" <?php echo Mandatoryfields::validation('accountgrouptax_taxname');?>>
                  <option value="">Choose Tax Name</option>
                  @foreach($tax as $value)
                  @if($value->name == 'SGST' || $value->name == 'CGST' || $value->name == 'sgst' || $value->name == 'cgst' || $value->name == 'Sgst' || $value->name == 'Cgst')
                  @else
                  <option value="{{ $value->id }}">{{ $value->name }}</option>
                  @endif
                  @endforeach
            </select>
          </div>
          <div class="col-md-4">
            <label for="validationCustom01" class="col-sm-4 col-form-label">Tax%<?php echo Mandatoryfields::mandatory('accountgrouptax_taxrate');?></label><br>
            <input type="text" class="form-control tax_rate" placeholder="Rate Of Tax" name="tax_rate" value="0" <?php echo Mandatoryfields::validation('accountgrouptax_taxrate');?>>
          </div>
          <div class="col-md-4">
            <label for="validationCustom01" class="col-sm-4 col-form-label">Type<?php echo Mandatoryfields::mandatory('accountgrouptax_type');?></label><br>
          <select class="js-example-basic-multiple col-12 form-control custom-select type"  name="type" id="type" <?php echo Mandatoryfields::validation('accountgrouptax_type');?>>
                  <option value="">Choose Any</option>
                  <option value="1">Credit</option>
                  <option value="2">Debit</option>
                        </select>
          
        </div>
      </div>
      <!-- <br> -->


        <div class="col-md-7 text-right">
          <button class="btn btn-success add" name="add" type="submit">Submit</button>
          <button class="btn btn-warning cancel" name="cancel" type="button">Cancel</button>
        </div>
        <div class="col-md-7 text-right">
          
        </div>
      </form>
    </div>
    <script src="{{asset('assets/js/master/capitalize.js')}}"></script>
    <!-- card body end@ -->
  </div>
</div>

<script type="text/javascript">


  $(document).on('input','.tax_rate',function(){

    $(this).val($(this).val().replace(/[^0-9.0-9]/gi, ''));
    if ($(this).val().replace(/[^.]/g, "").length > 1)
    {
    $(this).val(''); 
    }
    else
    {

    }

  });

  $(document).on('click','.cancel', function(){
    $('input').val('');
    $('select').val('');
    $('select').select2();
  });
</script>

@endsection

