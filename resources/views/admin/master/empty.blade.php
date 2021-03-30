@extends('admin.layout.app2')



@section('content')
<?php
// echo "<pre>";
// print_r($bar_chart);exit;
?>
<style>
.balcktext{color:#000;}
.card-box {
    position: relative;
    color: #fff;
    padding: 12px 10px 20px;
    margin: 10px 0px 20px 0px;
}
.card-box:hover {
    text-decoration: none;
    color: #f1f1f1;
}
.card-box:hover .icon i {
    font-size: 100px;
    transition: 1s;
    -webkit-transition: 1s;
}
.card-box .inner {
    padding: 5px 6px 0 6px;
}
.card-box h3 {
    font-size: 27px;
    font-weight: bold;
    margin: 0 0 8px 0;
    white-space: nowrap;
    padding: 0;
    text-align: left;
	    color: #fff;
}
.card-box p {
    font-size: 15px;
}
.card-box .icon {
    position: absolute;
    top: auto;
    bottom: 5px;
    right: 5px;
    z-index: 0;
    font-size: 72px;
    color: rgba(0, 0, 0, 0.15);
}
.card-box .card-box-footer {
    position: absolute;
    left: 0px;
    bottom: 0px;
    text-align: center;
    padding: 3px 0;
    color: rgba(255, 255, 255, 0.8);
    background: rgba(0, 0, 0, 0.1);
    width: 100%;
    text-decoration: none;
}
.card-box:hover .card-box-footer {
    background: rgba(0, 0, 0, 0.3);
}
.bg-blue {
    background-color: #00c0ef !important;
}
.bg-green {
    background-color: #00a65a !important;
}
.bg-orange {
    background-color: #f39c12 !important;
}
.bg-red {
    background-color: #d9534f !important;
}
.bg-gray {
    background-color: #d2d6de !important;
}
.bg-darkorange {
    background-color: #ff851b !important;
}
.bg-violet {
    background-color: #605ca8 !important;
}
.bg-darkgreen {
    background-color: #00a65a !important;
}
</style>    


<main class="page-content">

<h2 class="pl-3">Dashboard</h2>
<!-- model start receivables -->
<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Launch demo modal
</button> -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Receivables</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

      <!-- <div class="row col-md-12">
            <label for="validationCustom01" class="col-sm-4 col-form-label">tester :</label> 
        <div class="col-md-4">
            <label for="validationCustom01" class="col-sm-4 col-form-label">tess</label> 
        </div>
      </div> -->

      <table class="table table-bordered" style="width:100%;">
  <thead >
  <tr>
      <th scope="col">Sales Entry</th>
      <th scope="col" colspan="2" style="text-align: right;">{{$sales_entry}}</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">Received Amount</th>
      <td colspan="2" style="text-align: right;">{{$received_amount}}</td>

    </tr>
        <tr >
      <th scope="row">Total Receivable</th>
      <th colspan="2" style="text-align: right;">{{$receivables}}.00</th>
    </tr>
  </tbody>
</table>


      </div>
    
    </div>
  </div>
</div>

<!--  model end-->
<!-- model start payables -->
<!-- Modal -->
<div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Payables</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <table class="table table-bordered" style="width:100%;">
      <thead >
    <tr>
      <th scope="col">Purchase Entry</th>
      <th scope="col" colspan="2" style="text-align: right;">{{$purchase_entry}}</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">Payment Amount</th>
      <td colspan="2" style="text-align: right;">{{$payment_amount}}</td>

    </tr>
        <tr >
      <th scope="row">Total Payables</th>
      <th colspan="2" style="text-align: right;">{{$payables}}.00</th>
    </tr>
  </tbody>
</table>


      </div>
    
    </div>
  </div>
</div>

<!--  model end-->

<!-- model start collection -->
<!-- Modal -->
<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Collection</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          
      <table class="table table-bordered" style="width:100%;">
      <thead>
    <tr>
      <th scope="col">Sno</th>
      <th scope="col">Voucher No</th>
      <th scope="col">Customer Name</th>
      <th scope="col">Receipt Amount</th>
      <th scope="col">Payment Date</th>
    </tr>
  </thead>
  <tbody>
    @foreach($collection as $key =>$value)
    <tr>
      <th scope="row">{{$key +1}}</th>
      <td>{{$value->voucher_no}}</td>
      <td>{{$value->name}}</td>
      <td>{{@$value->receipt_amount}}</td>
      <td>{{@$value->payment_date}}</td>
    </tr>
    @endforeach
  </tbody>

        </table>

      </div>
    
    </div>
  </div>
</div>

<!--  model end-->

<!-- model start Payment -->
<!-- Modal -->
<div class="modal fade" id="exampleModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Payment</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <table class="table table-bordered" style="width:100%;">
      <thead>
    <tr>
      <th scope="col">Sno</th>
      <th scope="col">Voucher No</th>
      <th scope="col">Supplier Name</th>
      <th scope="col">Payment Amount</th>
      <th scope="col">Payment Date</th>
    </tr>
  </thead>
  <tbody>
    @foreach($payment as $key =>$value)
    <tr>
      <th scope="row">{{$key +1}}</th>
      <td>{{$value->voucher_no}}</td>
      <td>{{$value->name}}</td>
      <td>{{@$value->payment_amount}}</td>
      <td>{{@$value->payment_date}}</td>
    </tr>
    @endforeach
  </tbody>

        </table>     
     

      </div>
    
    </div>
  </div>
</div>

<!--  model end-->


<!-- model start Customers -->
<!-- Modal -->
<div class="modal fade" id="exampleModal4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Customers</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <table class="table table-bordered" style="width:100%;">
      <thead>
    <tr>
      <th scope="col">Sno</th>
      <th scope="col">Customer Name</th>
      <th scope="col">Company Name</th>
      <th scope="col">Code</th>
      <th scope="col">Phone No</th>
    </tr>
  </thead>
  <tbody>
    @foreach($customer as $key =>$value)
    <tr>
      <th scope="row">{{$key +1}}</th>
      <td>{{$value->name}}</td>
      <td>{{$value->company_name}}</td>
      <td>{{@$value->code}}</td>
      <td>{{@$value->phone_no}}</td>
    </tr>
    @endforeach
  </tbody>

        </table>


      </div>
    
    </div>
  </div>
</div>

<!--  model end-->

<!-- model start Suppliers -->
<!-- Modal -->
<div class="modal fade" id="exampleModal5" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Suppliers</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <table class="table table-bordered" style="width:100%;">
      <thead>
    <tr>
      <th scope="col">Sno</th>
      <th scope="col">Supplier Name</th>
      <th scope="col">Company Name</th>
      <th scope="col">Code</th>
      <th scope="col">Phone No</th>
    </tr>
  </thead>
  <tbody>
    @foreach($supplier as $key =>$value)
    <tr>
      <th scope="row">{{$key +1}}</th>
      <td>{{$value->name}}</td>
      <td>{{$value->company_name}}</td>
      <td>{{@$value->code}}</td>
      <td>{{@$value->phone_no}}</td>
    </tr>
    @endforeach
  </tbody>

        </table>


      </div>
    
    </div>
  </div>
</div>

<!--  model end-->



<!-- model start Expense -->
<!-- Modal -->
<div class="modal fade" id="exampleModal6" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Expense</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          
      <table class="table table-bordered" style="width:100%;">
      <thead>
    <tr>
      <th scope="col">Sno</th>
      <th scope="col">Voucher No</th>
      <th scope="col">Account Head Name</th>
      <th scope="col">Payment Amount</th>
      <th scope="col">Payment Date</th>
    </tr>
  </thead>
  <tbody>
    @foreach($expenses_popup as $key =>$value)
    <tr>
      <th scope="row">{{$key +1}}</th>
      <td>{{$value->voucher_no}}</td>
      <td>{{$value->name}}</td>
      <td>{{@$value->debit_amount}}</td>
      <td>{{@$value->entry_date}}</td>
    </tr>
    @endforeach
  </tbody>

        </table>     
     

      </div>
    
    </div>
  </div>
</div>

<!--  model end-->


<!-- model start Unreleased Cheque -->
<!-- Modal -->
<div class="modal fade" id="exampleModal7" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Unreleased Cheque</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          
      <div class="row col-md-12">
            <label for="validationCustom01" class="col-sm-4 col-form-label">Uncleared Cheque:</label> 
        <div class="col-md-4">
            <label for="validationCustom01" class="col-sm-4 col-form-label">{{$uncleared_cheque}}</label> 
        </div>
      </div>

      </div>
    
    </div>
  </div>
</div>

<!--  model end-->

<div class="col-12 body-sec">
<div class="container">
        <div class="row">
            <div class="col-lg-3 col-sm-6">
                <div class="card-box bg-blue">
                    <div class="inner">
                        <h3 id="receivables"> {{$receivables}} </h3>
                        <p> Receivables </p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-usd" aria-hidden="true"></i>
                    </div>
                    <a href="#" data-toggle="modal" data-target="#exampleModal" class="card-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-3 col-sm-6">
                <div class="card-box bg-green">
                    <div class="inner">
                        <h3> {{$payables}} </h3>
                        <p> Payable </p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-money" aria-hidden="true"></i>
                    </div>
                    <a href="#" data-toggle="modal" data-target="#exampleModal1" class="card-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card-box bg-orange">
                    <div class="inner">
                        <h3> {{$current_month_received_amount}} </h3>
                        <p> Collection</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-user-plus" aria-hidden="true"></i>
                    </div>
                    <a href="#" data-toggle="modal" data-target="#exampleModal2" class="card-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card-box bg-red">
                    <div class="inner">
                        <h3> {{$current_month_payment_amount}}</h3>
                        <p> Payment </p>
                    </div>
                    <div class="icon">
                       <i class="fa fa-ticket" aria-hidden="true"></i>
                    </div>
                    <a href="#" data-toggle="modal" data-target="#exampleModal3" class="card-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
		
		
	

		
		<div class="row">
            <div class="col-lg-3 col-sm-6">
                <div class="card-box bg-gray">
                    <div class="inner">
                        <h3><span class="balcktext">{{$customer_cnt}} </span> </h3>
                        <p class="balcktext"> Total Customers </p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-users" aria-hidden="true"></i>
                    </div>
                    <a href="#" data-toggle="modal" data-target="#exampleModal4" class="card-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-3 col-sm-6">
                <div class="card-box bg-darkorange">
                    <div class="inner">
                        <h3> {{$supplier_cnt}} </h3>
                        <p> Toatl Suppliers </p>
                    </div>
                    <div class="icon">
						<i class="fa fa-info-circle" aria-hidden="true"></i>

                    </div>
                    <a href="#" data-toggle="modal" data-target="#exampleModal5" class="card-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card-box bg-violet">
                    <div class="inner">
                        <h3> {{$expenses}} </h3>
                        <p> Expenses</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-exchange" aria-hidden="true"></i>
                    </div>
                    <a href="#" data-toggle="modal" data-target="#exampleModal6" class="card-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card-box bg-darkgreen">
                    <div class="inner">
                        <h3>{{$uncleared_cheque}}</h3>
                        <p> Uncleared Cheques </p>
                    </div>
                    <div class="icon">
                      <i class="fa fa-list-alt" aria-hidden="true"></i>
                    </div>
                    <a href="#" data-toggle="modal" data-target="#exampleModal7" class="card-box-footer">More info<i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>		
    </div>
	
	<br/>
	
	<div class="container">
        <div class="row">
            <div class="col-lg-6 col-sm-6">
				<h4>Pie Chart</h4>				
		<div style="padding: 50px 0px 50px 0px;    background: #f5f5f5;  
					-webkit-box-shadow: 0px 0px 5px 0px rgba(142, 142, 142, 0.75);
-moz-box-shadow:    0px 0px 5px 0px rgba(142, 142, 142, 0.75);
box-shadow:         0px 0px 5px 0px rgba(142, 142, 142, 0.75);">
		<div id="pie-chart"></div>

<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script>

// function find_receivables()
// {
  
//     $('#find_receivables').show();
//     $('#find_receivables').dialog({width:900},{height:250}).prev(".ui-dialog-titlebar").css("background","#28a745").prev(".ui-dialog.ui-widget-content");

    
// }
google.load("visualization", "1", {packages:["corechart"]});
google.setOnLoadCallback(drawCharts);
function drawCharts() {
    var receivables = {{$receivables}};
    var payables = {{$payables}};
    var collection = {{$current_month_received_amount}};
    
  // pie chart data
  var pieData = google.visualization.arrayToDataTable([
    ['Country', 'Page Hits'],
    ['Receivables',      receivables],
    ['Payable',   payables],
    ['Collection',   collection],
   // ['Sweden',    946],
   // ['Germany',  2150]
  ]);
  // pie chart options
  var pieOptions = {
    backgroundColor: 'transparent',
    pieHole: 0.4,
    colors: [ "#00c0ef",    "#00a65a",   "#f39c12"],
    pieSliceText: 'value',
    tooltip: {
      text: 'percentage'
    },
    fontName: 'Open Sans',
    chartArea: {
      width: '100%',
      height: '94%'
    },
    legend: {
      textStyle: {
        fontSize: 15
      }
    }
  };
  // draw pie chart
  var pieChart = new google.visualization.PieChart(document.getElementById('pie-chart'));
  pieChart.draw(pieData, pieOptions,receivables,payables,collection);
}
</script>
	<script src='https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.2.2/Chart.min.js'>	</script>
	</div>

	
		
			</div>
			
			<div class="col-lg-6 col-sm-6">
				<h4>Bar Chart</h4>			
  <div style="padding: 10px 0px 30px 0px;    background: #f5f5f5;  
  -webkit-box-shadow: 0px 0px 5px 0px rgba(142, 142, 142, 0.75);
-moz-box-shadow:    0px 0px 5px 0px rgba(142, 142, 142, 0.75);
box-shadow:         0px 0px 5px 0px rgba(142, 142, 142, 0.75);">
    <canvas id="barchart"></canvas>
  </div>

<script>
    var m_p = {{$bar_chart[0]['monday_payable']}};
    var m_r = {{$bar_chart[0]['monday_receivable']}};

    var t_p = {{$bar_chart[0]['tuesday_payable']}};
    var t_r = {{$bar_chart[0]['tuesday_receivable']}};

    var w_p = {{$bar_chart[0]['wednesday_payable']}};
    var w_r = {{$bar_chart[0]['wednesday_receivable']}};

var ctx = document.getElementById("barchart").getContext('2d');
var barchart = new Chart(ctx, {
  type: 'bar',
  data: {
    labels: ["M", "T", "W", "T", "F", "S", "S" ],
    datasets: [{
      label: 'Receivables',
      data: [m_p, t_p, w_p,50],
      backgroundColor: "#6495ed"
    }, {
      label: 'Payable',
      data: [m_r, t_r, w_r,100],
      backgroundColor: "#ff6347"
    },	
	]
  }
});
</script>
				
			</div>
		</div>
	
	
</div>
	<br/><br/><br/>
    </br>
    <div class="card-body">
      <table id="master" class="table table-striped table-bordered" style="width:100%">
        <thead>
          <tr>
            <th>S.No</th>
            <th>Item Name</th>
            <th>Item Code</th>
            <th>Uom</th>
            <th>Mrp</th>
            <th>Sold Quantity</th>
          </tr>
        </thead>
        <tbody>
        @foreach($array_det  as $key => $value)
        
        <tr>
        <td>{{$key +1}}</td>
        <td>{{$value['item_name']}}</td>
        <td>{{$value['item_code']}}</td>
        <td>{{$value['uom']}}</td>
        <td>{{$value['mrp']}}</td>
        <td>{{$value['pos']}}</td>
      </tr>
    
    @endforeach
		</tbody>
		
		</table>
		</div>
		


</div>
@endsection

