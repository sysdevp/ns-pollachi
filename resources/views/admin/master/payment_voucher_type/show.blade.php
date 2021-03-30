@extends('admin.layout.app')
@section('content')
<main class="page-content">

<div class="col-12 body-sec">
  <div class="card container px-0">
    <!-- card header start@ -->
    <div class="card-header px-2">
      <div class="row">
        <div class="col-4">
          <h3>Show Payment Voucher Type</h3>
        </div>
        <div class="col-8 mr-auto">
          <ul class="h-right-btn mb-0 pl-0">
            <li><button type="button" class="btn btn-success"><a href="{{ route('payment-voucher-type.index') }}">Back</a></button></li>
          </ul>
        </div>
      </div>
    </div>
    <!-- card header end@ -->
    <div class="card-body">
    
      <form  method="post" class="form-horizontal needs-validation" action="{{route('payment-voucher-type.update',$voucher_data->id)}}" enctype="multipart/form-data">
      {{csrf_field()}}
      @method('PATCH')

      <div class="cat" id="cat" style="display: none;" title="Voucher Number Preview">
                        
                <div class="form-row">
                 <input type="text" class="form-control voucher_no" readonly="" name="voucher_no">           
                </div>
    
                            
      </div>

          <div class="col-md-6">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-6 col-form-label"><b>Purchase Voucher Name</b> : {{ $voucher_data->name }}</label>
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-6 col-form-label"><b>Type</b> : {{ $voucher_data->type }}</label>
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-6 col-form-label"><b>Prefix</b> : {{ $voucher_data->prefix }}</label>
              <div class="col-sm-8">
                <input type="hidden" class="form-control prefix" placeholder="Prefix" name="prefix" value="{{ $voucher_data->prefix }}">
                
              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-6 col-form-label"><b>Suffix</b> : {{ $voucher_data->suffix }}</label>
              <div class="col-sm-8">
                <input type="hidden" class="form-control suffix" placeholder="Suffix" name="suffix" value="{{ $voucher_data->suffix }}">
                
              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-6 col-form-label"><b>Starting No</b> : {{ $voucher_data->starting_no }}</label>
              <div class="col-sm-8">
                <input type="hidden" class="form-control starting" placeholder="Starting No" name="starting" value="{{ $voucher_data->starting_no }}">
                
              </div>
            </div>
          </div>  

          <div class="col-md-6">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-6 col-form-label"><b>No Of Digits</b> : {{ $voucher_data->no_digits }}</label>
              <div class="col-sm-8">
                <input type="hidden" class="form-control digits" placeholder="No Of Digits" name="digits" value="{{ $voucher_data->no_digits }}">
                
              </div>
            </div>
          </div>


        <div class="col-md-7 text-right">
          <button class="btn btn-success preview" name="preview">Preview</button>
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
  
  $( document ).ready(function() {
        var bootstrapButton = $.fn.button.noConflict()
        $.fn.bootstrapBtn = bootstrapButton;
      });

      $(document).on('click','.preview',function(){
        event.preventDefault();

        var prefix =$('.prefix').val();  
        var suffix = $('.suffix').val(); 
        var starting = $('.starting').val(); 
        var digits = $('.digits').val(); 


        if (starting == '') 
        {
          var starting = 1;

          var length = starting.toString().length;
          if (length >= digits) 
          {

            function pad (str, max) {
            str = str.toString();
            return str.length >= max ? str: '';
          }

          var preview = pad( starting, digits);

          }
          else
          {

            function pad (str, max) {
            str = str.toString();
            return str.length < max ? pad("0" + str, max) : str;
          }

          var preview = pad("0" + starting, digits);

          }

          $('.voucher_no').val(prefix+preview+suffix);
        }
        else
        {
          var length = starting.toString().length;
          if (length >= digits) 
          {

            function pad (str, max) {
            str = str.toString();
            return str.length >= max ? str: '';
          }

          var preview = pad( starting, digits);

          }
          else
          {

            function pad (str, max) {
            str = str.toString();
            return str.length < max ? pad("0" + str, max) : str;
          }

          var preview = pad("0" + starting, digits);

          }

          var voucher = prefix+preview+suffix;
          $('.voucher_no').val(voucher);
        }

        $('#cat').show();
        
        $('#cat').dialog().prev(".ui-dialog-titlebar").css("background","#28a745").prev(".ui-dialog.ui-widget-content");

      });

</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" rel="stylesheet"/>
    <script src="jquery.ui.position.js"></script>

    <style type="text/css">
    .ui-dialog.ui-widget-content { background: #a3d072; }
    </style>
@endsection

