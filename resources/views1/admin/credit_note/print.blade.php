<!DOCTYPE>
<html>
<head>
	<title></title>
</head>
<style>
table, th, td {
  border: 1px solid #E1E1E1;
}
</style>	

<body>
	<script type="text/javascript">
		window.print();
	</script>
<div class="col-md-12">
	<div class="col-md-6">
		<p>
		Voucher No:{{ $credit_note_print_data->cn_no }}
		</p>
	</div>

	 <div class="col-md-6">
	 	<p>
		Voucher Date:{{ $credit_note_print_data->cn_date }}
		</p>
	 </div>
</div>
<div class="row col-md-12">
	<div class="col-md-6">
		<p>
		Customer Details:<br>
		Name:{{ @$credit_note_print_data->customer->name }} <br>

		Address:{{ @$address->address_line_1 }},{{ @$address->address_line_2 }},{{ @$address->land_mark }},{{ @$address->state->name }},{{ @$address->district_id }},{{ @$address->postal_code }}.
		</p>
	</div>
	<div class="col-md-6">
		<p>
		Seller Details:
		</p> 
	</div>
</div>
	
<!-- <div class="row col-md-12">
	<div class="col-md-6">
		<p>
	Delivery Location:{{ @$estimation_print_data->locations->name }}
	</p>
	</div>
</div> -->

<div class="col-md-12 mb-3">
	<table class="table-responsive">
		 <thead>
		 	<tr>
		 	<th>
		 		S.No
		 	</th>
		 	<th>
		 		Item Name
		 	</th>
		 	<th>
		 		Item Code
		 	</th>
		 	<th>
		 		Hsn
		 	</th>
		 	<th>
		 		Mrp
		 	</th>
		 	<th>
		 		Unit Price
		 	</th>
		 	<th>
		 		Quantity
		 	</th>
		 	<th>
		 		UOM
		 	</th>
		 	<th>
		 		Amount
		 	</th>
		 	<th>
		 		Discount
		 	</th>
		 	<th>
		 		Tax Rs
		 	</th>
		 	<th>
		 		Net Value
		 	</th>
		 	</tr>
		 </thead>
		 <tbody>
		 	@foreach($credit_note_item_print_data as $key => $value)
		 	<tr>
		 	<td>{{ $key+1 }}</td>
		 	<td>{{ $value->item->name }}</td>
		 	<td>{{ $value->item->code }}</td>
		 	<td>{{ $value->item->hsn }}</td>
		 	<td>{{ $value->mrp }}</td>
		 	<td>{{ $value->rate_exclusive_tax }}</td>
		 	<td>{{ $value->remaining_qty }}</td>
		 	<td>{{ $value->uom->name }}</td>
		 	<?php $amount = $value->rate_exclusive_tax * $value->remaining_qty; ?> 
		 	<td>{{ number_format($amount, 2) }}</td>
		 	<td>{{ $value->discount }}</td>
		 	<?php $tax = $amount * $value->gst;
		 		  $tax_value = $tax / 100;
		 	 ?>
		 	<td>{{ number_format($tax_value, 2) }}</td>
		 	<?php $item_net_value = $amount + $tax_value - $value->discount;
		 	?>
		 	<td>{{ number_format($item_net_value, 2) }}</td>
		 	</tr>
		 	@endforeach
		 </tbody>
	</table>
</div>
<br><br>

<div class="col-md-12">
	<table class="table-responsive">
		 <thead>
		 	<tr>
		 	
		 	<th>
		 		Expense Type
		 	</th>
		 	<th>
		 		Expense Amount
		 	</th>
		 	</tr>
		 </thead>
		 <tbody>
		 	@foreach($credit_note_expense_print_data as $key => $value)
		 	<tr>
		 	<td>{{ @$value->expense_types->name }}</td>
		 	<td>{{ $value->expense_amount }}</td>
		 	</tr>
		 	@endforeach
		 </tbody>
	</table>
</div>

<div class="col-md-12">
	<div class="col-md-6">
		<p>
			Net Value: {{ $credit_note_print_data->total_net_value }}
		</p>
	</div>
	<div class="col-md-6">
		<p>
			Amount In Words:{{ $result }}{{ $points }}
		</p>
	</div>
</div>

</body>
</html>