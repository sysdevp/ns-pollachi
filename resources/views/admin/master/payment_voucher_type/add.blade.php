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
          <h3>Payment Voucher Type</h3>
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
    
      <form  method="post" class="form-horizontal needs-validation" action="{{route('payment-voucher-type.store')}}" enctype="multipart/form-data">
      {{csrf_field()}}

      <div class="cat" id="cat" style="display: none;" title="Voucher Number Preview">
                        
                <div class="form-row">
                 <input type="text" class="form-control voucher_no" readonly="" name="voucher_no">           
                </div>
    
                            
      </div>

          <div class="col-md-6">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Payment Voucher Name <?php echo Mandatoryfields::mandatory('paymentvoucher_name');?> </label>
              <div class="col-sm-8">
                <select class="js-example-basic-multiple col-12 form-control custom-select name"  name="name" id="name" <?php echo Mandatoryfields::validation('paymentvoucher_name');?> autofocus>
                  <option value="">Choose Any</option>
                  <option value="Payment Request">Payment Request</option>
                  <option value="Payment Process">Payment Process</option>
                </select>
              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Type:<?php echo Mandatoryfields::mandatory('paymentvoucher_type');?></label>
              <div class="col-sm-8">
                <input type="text" class="form-control type caps" placeholder="Type" <?php echo Mandatoryfields::validation('paymentvoucher_type');?> name="type" value="">
                
              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Prefix:<?php echo Mandatoryfields::mandatory('paymentvoucher_prefix');?></label>
              <div class="col-sm-8">
                <input type="text" class="form-control prefix" placeholder="Prefix" name="prefix" <?php echo Mandatoryfields::validation('paymentvoucher_prefix');?>>
                
              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Suffix:<?php echo Mandatoryfields::mandatory('paymentvoucher_suffix');?></label>
              <div class="col-sm-8">
                <input type="text" class="form-control suffix" placeholder="Suffix" name="suffix" <?php echo Mandatoryfields::validation('paymentvoucher_suffix');?>>
                
              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Starting No:<?php echo Mandatoryfields::mandatory('paymentvoucher_starting');?></label>
              <div class="col-sm-8">
                <input type="text" class="form-control starting" placeholder="Starting No" name="starting"<?php echo Mandatoryfields::validation('paymentvoucher_starting');?>>
                
              </div>
            </div>
          </div>  

          <div class="col-md-6">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">No Of Digits:<?php echo Mandatoryfields::mandatory('paymentvoucher_digits');?></label>
              <div class="col-sm-8">
                <input type="text" class="form-control digits" placeholder="No Of Digits" name="digits" <?php echo Mandatoryfields::validation('paymentvoucher_digits');?>>
                
              </div>
            </div>
          </div>


        <div class="col-md-7 text-right">
          <button class="btn btn-success add" name="add" type="submit">Submit</button>
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

