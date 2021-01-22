@extends('admin.layout.app')
@section('content')
<main class="page-content">

<div class="col-12 body-sec">
  <div class="card container px-0">
    <!-- card header start@ -->
    <div class="card-header px-2">
      <div class="row">
        <div class="col-4">
          <h3>Account Head</h3>
        </div>
        <div class="col-8 mr-auto">
          <ul class="h-right-btn mb-0 pl-0">
            <li><button type="button" class="btn btn-success"><a href="{{ route('account_head.index') }}">Back</a></button></li>
          </ul>
        </div>
      </div>
    </div>
    <!-- card header end@ -->
    <div class="card-body">
    
      <form  method="post" class="form-horizontal needs-validation" action="{{route('account_head.store')}}" enctype="multipart/form-data">
      {{csrf_field()}}

        <div class="form-row">
          <div class="col-md-6">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Name:</label>
              <div class="col-sm-8">
                <input type="text" class="form-control name caps" placeholder="Name" required="" name="name" value="">
                
              </div>
            </div>
          </div>

        <div class="col-md-6">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Under : </label>
              <div class="col-sm-8">
                <select class="js-example-basic-multiple col-12 form-control custom-select under"  name="under" id="under" data-placeholder="Choose Any" required="">
                  <option value="">Choose Any</option>
                  <option value="Primary">Primary</option>
                  <option value="Cash">Cash</option>
                  <option value="Bank">Bank</option>
                  <option value="Incomes">Incomes</option>
                  <option value="Expense">Expense</option>
                  <option value="Assets">Assets</option>
                  <option value="Liabilities">Liabilities</option>
                  @foreach($account_group as $value)
                  <option value="{{$value->id}}">{{$value->name}}</option>
                  @endforeach
                        </select>
              </div>
            </div>
          </div>
        </div>
        <br>

        <!-- <div class="form-row">
          <div class="col-md-6">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Tax:</label>
              <label for="validationCustom01" class="col-sm-3 col-form-label">Yes</label>
              
                <input type="radio" class="tax" checked="" placeholder="Name" onclick="yes()" name="tax" value="1">
                
              
              <label for="validationCustom01" class="col-sm-3 col-form-label">No</label>
              
                <input type="radio" class="tax" placeholder="Name" onclick="no()"  name="tax" value="0">
                
            </div>
          </div>
        </div>
        <br>

        <div class="form-row col-md-12 tax_details">
          <div class="col-md-4">
            <label for="validationCustom01" class="col-sm-4 col-form-label">Name</label><br>
            <select class="js-example-basic-multiple col-12 form-control custom-select type"  name="tax_name" id="tax_name">
                  <option value="">Choose Any</option>
                  @foreach($tax as $value)
                  <option value="{{ $value->id }}">{{ $value->name }}</option>
                  @endforeach
            </select> -->
            <!-- <input type="text" class="form-control tax_name" placeholder="Tax Name" name="tax_name" value=""> -->
          <!-- </div>
          <div class="col-md-4">
            <label for="validationCustom01" class="col-sm-4 col-form-label">Rate Of Tax</label><br>
            <input type="text" class="form-control tax_rate" placeholder="Rate Of Tax" name="tax_rate" value="">
          </div>
          <div class="col-md-4">
            <label for="validationCustom01" class="col-sm-4 col-form-label">Type</label><br>
          <select class="js-example-basic-multiple col-12 form-control custom-select type"  name="type" id="type">
                  <option value="">Choose Any</option>
                  <option value="1">Goods</option>
                  <option value="2">Service</option>
                        </select>
          
        </div>
      </div> -->
      <!-- <br> -->
      <div class="form-row">
          <div class="col-md-6">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Opening Balance:</label>
              <div class="col-sm-8">
                <input type="text" class="form-control balance" placeholder="Opening Balance" name="balance" value="0">
                
              </div>
            </div>
          </div>

        <div class="col-md-6">
            <div class="form-group row">
              <div class="col-sm-3">
                <select class=" col-12 form-control custom-select dr_or_cr"  name="dr_or_cr" id="dr_or_cr">
                  <option value="">Choose Any</option>
                  <option value="1">Credit</option>
                  <option value="2">Debit</option>
                        </select>
              </div>
            </div>
          </div>
        </div>

        <div class="form-row">
          <div class="col-md-6">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Tax Included:</label>
              <div class="col-sm-8">
                <input type="checkbox" class="check" checked="" name="check" value="1">
                
              </div>
            </div>
          </div>
        </div>


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
  function yes()
  {
    $('.tax_details').show();
  } 
  function no()
  {
    $('.tax_details').hide();
  } 
  $(document).on('input','.name',function(){

    $(this).val($(this).val().replace(/[^a-zA-Z ]/gi, ''));

  });

  $(document).on('input','.balance',function(){

    if($(this).val())
    {
      $('.dr_or_cr').attr('required','required');
    }
    else
    {
      $('.dr_or_cr').removeAttr('required');
    }

  });

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

  $(document).on('input','.balance',function(){
    
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

