
<!DOCTYPE html>
<html lang="en" >
<head>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

  <meta charset="UTF-8">
  <title>Receipt</title>
  <style>
  #invoice-POS {
  box-shadow: -1px -2px 11px -5px rgba(0,0,0,0.75);
-webkit-box-shadow: -1px -2px 11px -5px rgba(0,0,0,0.75);
-moz-box-shadow: -1px -2px 11px -5px rgba(0,0,0,0.75);
  padding: 2mm;
text-align:right;
  width: 80mm;
  background: #FFF;
}
#invoice-POS td:first-child{text-align:left;}
#invoice-POS h1 {
  font-size: 1.5em;
  color: #222;
}
#invoice-POS h2 {
  font-size: 15px;   line-height: 8px;
}

#invoice-POS .title p {
  text-align: right;
}
#invoice-POS table {
  width: 100%;
  border-collapse: collapse;
}
#invoice-POS .tabletitle {
  font-size: 12px;
  background: #fff;
  border-top:#000 dashed 1px;   border-bottom:#000 dashed 1px;
}
#invoice-POS .total {
  font-size: 12px;
  background: #fff; font-weight:bold;
  border-top:#000 dashed 1px;   border-bottom:#000 dashed 1px;
}
#invoice-POS .itemtext {
  font-size:12px;     line-height: 4px;
}
#invoice-POS #legalcopy {
  margin-top: 2mm;
}
.textcenter{text-align:center;} .textright{text-align:right;} .textleft{text-align:left;}
  </style>
</head>
<body>
<!-- partial:index.partial.html -->
<div id="invoice-POS">
    
    <center id="top">
      <div class="info"> 

        <h2>{{$address->name}}</h2>
		<p> 
            Address : {{$address->address_line_1}}, {{$address->address_line_2}} {{$address->postal_code}}</br>
            Email   : nsp@gmail.com</br>
            Phone   : 7474857485</br>
			      GSTIN   : {{$address->gst_number}}</br>
        </p>
      </div><!--End Info-->
    </center><!--End InvoiceTop-->
    
   
    
    <div id="bot">

					<div id="table">
						<table>
						
						<tr class="service">
								<td class="tableitem"><p class="itemtext">Bill No: {{$voucher_no}}</p></td>
								<td class="tableitem"><p class="itemtext">&nbsp;</p></td>
								<td class="tableitem"><p class="itemtext">&nbsp;</p></td>
								<td class="tableitem"><p class="itemtext">Date: <?php echo date("d-m-Y"); ?></p></td>
							</tr>
						
							<tr class="tabletitle">
              <td class="sno"><h2>S.no</h2></td>
              <td class="item"><h2>Item</h2></td>
								<td class="Hours"><h2>Qty</h2></td>
								<td class="Rate"><h2>Price</h2></td>
								<td class="Rate"><h2>Amt</h2></td>
							</tr>
              @foreach($pos_item as $key => $value)
							<tr class="service">
              <td class="tableitem"><p class="itemtext">{{$key+1}}</p></td>
              <td class="tableitem"><p class="itemtext">{{$value->item->name}}</p></td>
								<td class="tableitem"><p class="itemtext textright">{{$value->qty}}</p></td>
								<td class="tableitem"><p class="itemtext textright">{{$value->rate_inclusive_tax}}</p></td>
								<td class="tableitem"><p class="itemtext ">{{$value->amount}}</p></td>
							</tr>
              @endforeach
					

						

							<tr class="tabletitle">
              <td class="tableitem"><p class="itemtext">Subtotal</p></td>
              <td class="tableitem"><p class="itemtext">&nbsp;</p></td>
										<td class="tableitem"><p class="itemtext">{{$pos->no_item}}</p></td>
								<td class="tableitem"><p class="itemtext">&nbsp;</p></td>
							
								<td class="tableitem"><p class="itemtext">{{$pos->total_net_value}}</p></td>
							</tr>
							
							
							
							<!-- <tr class="service">
								<td class="tableitem"><p class="itemtext">&nbsp;</p></td>
								<td class="tableitem"><p class="itemtext">&nbsp;</p></td>
								<td class="tableitem"><p class="itemtext">CGST@9.00%</p></td>
								<td class="tableitem"><p class="itemtext">2750.00</p></td>
							</tr>
								<tr class="service">
								<td class="tableitem"><p class="itemtext">&nbsp;</p></td>
								<td class="tableitem"><p class="itemtext">&nbsp;</p></td>
								<td class="tableitem"><p class="itemtext">CGST@9.00%</p></td>
								<td class="tableitem"><p class="itemtext">2750.00</p></td>
							</tr>
								<tr class="service">
								<td class="tableitem"><p class="itemtext">&nbsp;</p></td>
								<td class="tableitem"><p class="itemtext">&nbsp;</p></td>
								<td class="tableitem"><p class="itemtext">CGST@9.00%</p></td>
								<td class="tableitem"><p class="itemtext">2750.00</p></td>
							</tr>
								<tr class="service">
								<td class="tableitem"><p class="itemtext">&nbsp;</p></td>
								<td class="tableitem"><p class="itemtext">&nbsp;</p></td>
								<td class="tableitem"><p class="itemtext">CGST@9.00%</p></td>
								<td class="tableitem"><p class="itemtext">2750.00</p></td>
							</tr>
								<tr class="service">
								<td class="tableitem"><p class="itemtext">&nbsp;</p></td>
								<td class="tableitem"><p class="itemtext">&nbsp;</p></td>
								<td class="tableitem"><p class="itemtext">CGST@9.00%</p></td>
								<td class="tableitem"><p class="itemtext">2750.00</p></td>
							</tr>
								<tr class="service">
								<td class="tableitem"><p class="itemtext">&nbsp;</p></td>
								<td class="tableitem"><p class="itemtext">&nbsp;</p></td>
								<td class="tableitem"><p class="itemtext">CGST@9.00%</p></td>
								<td class="tableitem"><p class="itemtext">2750.00</p></td>
							</tr>

							<tr class="total">
									<td class="tableitem"><p class="itemtext">Subtotal</p></td>
										<td class="tableitem"><p class="itemtext">&nbsp;</p></td>
								<td class="tableitem"><p class="itemtext">&nbsp;</p></td>
							
								<td class="tableitem"><p class="itemtext">RS. 56,2256</p></td>
							</tr> -->

						</table>
					</div><!--End Table-->

					<div id="thankyou">
						<p class="legal  textcenter"><strong>Thank you for your business!</strong> 
						</p>
					</div>

				</div><!--End InvoiceBot-->
  </div><!--End Invoice-->
<!-- partial -->
  
<script>
$(document).ready(function(){
window.print();

});

</script>
</body>
</html>

