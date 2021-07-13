<html>
<head>
<script src="http://code.jquery.com/jquery-latest.min.js"></script>
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
</head>
<body style="margin:100px auto;width:500px"> 
<h2> JQuery Barcode Generator </h2>
<input type="text" id ="barcode" name="barcode" autocomplete="off" />
<input type="button" class="button" id="GenerateBarcode" name="GenerateBarcode" value="Generate Barcode">
<div style="margin-top:22px;"> </div>
<div id="demo"></div>
</body>
</html>
