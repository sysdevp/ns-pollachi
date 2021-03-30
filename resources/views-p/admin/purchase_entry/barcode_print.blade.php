

<script src="{{asset('assets/jquery-latest.min.js')}}"></script>

<script type="text/javascript" src="{{asset('assets/jquery-barcode.js')}}"></script>
<?php
  $count = count($printing_id);
  //print_r($count);exit;
$mrps = array();
for($i=0;$i<$count;$i++){
  $mrps = $mrp[$i];
  ?>
<ul >
<li><?php echo $printing_id[$i].'-'.$uom[$i].'-'.$mrps;?></li>
</ul>

<?php 
        }

?>
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

// $( "#GenerateBarcode" ).on( "click", function() {
  $("li").each(function(){
  //    alert($(this).text())
  var code  = $(this).text();
$(".test").barcode( 
code, // Value barcode (dependent on the type of barcode)
"code128", // type (string)
settings
);
});
});     
// });
</script>
<?php 
// print_r($printing_template);exit;
$count1 = count($printing_qty);
//print_r($coun1);exit;

for($j=0;$j<$count1;$j++)
{
  for($k=0;$k<$printing_qty[$j];$k++)
  {
?>

          <?php if($printing_template==1){
            ?>
            <div style="margin-top:22px;"> </div>
          <div id="demo" class="test"></div>
            </br>
          <?php } elseif($printing_template==2) {?>

            <table width="50%" border="0">
              <tbody>
                <tr>
                  <td class="test"></td>
                  <td class="test"></td>
                </tr>
              </tbody>
            </table>

         
          <?php } elseif($printing_template==3) {?>

            <table width="100%" border="0">
              <tbody>
                <tr>
                  <td class="test"></td>
                  <td class="test"></td>
                  <td class="test"></td>
                </tr>
              </tbody>
            </table>
          <?php } elseif($printing_template==4) {?>

            <table width="100%" border="0">
              <tbody>
                <tr>
                  <td class="test"></td>
                  <td class="test"></td>
                  <td class="test"></td>
                  <td class="test"></td>
                </tr>
              </tbody>
            </table>
            <?php } ?>

<?php 
}
}
?>
          
     

