@extends('admin.layout.app')
@section('content')
<script src="{{asset('assets/jquery-latest.min.js')}}"></script>

<script type="text/javascript" src="{{asset('assets/jquery-barcode.js')}}"></script>

<script>
$(document).ready(function() {

var settings = {
barWidth: 2,
barHeight: 50,
moduleSize: 5,
showHRI: true,
addQuietZone: true,
marginHRI: 5,
bgColor: "#FFFFFF",
color: "#000000",
fontSize: 10,
output: "css",
posX: 0,
posY: 0
};

$( "#GenerateBarcode" ).on( "click", function() {
var code = $("#barcode").val() ;
$("#demo").barcode(
code, // Value barcode (dependent on the type of barcode)
"code128", // type (string)
settings
);
});
     
});
</script>

<main class="page-content">

	<div class="container-fuild">
    <div id="page-content-wrapper">
<div class="col-12 body-sec">
  <div class="card container px-0">
    <!-- card header start@ -->
    <div class="card-header px-2">
      <div class="row">
        <div class="col-4">
          <h3>Add State</h3>
        </div>
        <div class="col-8 mr-auto">
          <ul class="h-right-btn mb-0 pl-0">
            <li><button type="button" class="btn btn-success"><a href="{{url('master/state')}}">Back</a></button></li>
          </ul>
        </div>
      </div>
    </div>
    <!-- card header end@ -->
    <div class="card-body">
    

        <div class="form-row">
          <div class="col-md-7">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">State Name <?php //echo Mandatoryfields::mandatory('state_name');?>
</label>
              <div class="col-sm-8">
                <input type="text" class="form-control name only_allow_alp_num_dot_com_amp caps"  name="barcode" id="barcode" value="{{old('name')}}" <?php //echo Mandatoryfields::validation('state_name');?> autofocus>
                <span class="mandatory"> {{ $errors->first('name')  }} </span>
                <div class="invalid-feedback">
                  Enter valid State Name
                </div>
              </div>
            </div>
          </div>
         
            </div>
          </div>
          <div style="margin-top:22px;"> </div>
<div id="demo"></div>

        </div>
        <div class="col-md-7 text-right">
          <button class="btn btn-success" name="GenerateBarcode" id="GenerateBarcode" type="submit">Submit</button>
        </div>
      
     
@endsection

