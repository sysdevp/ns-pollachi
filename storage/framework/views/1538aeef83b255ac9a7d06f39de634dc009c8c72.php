<?php $__env->startSection('content'); ?>

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

<div class="col-12 body-sec">
<div class="container">
        <div class="row">
            <div class="col-lg-3 col-sm-6">
                <div class="card-box bg-blue">
                    <div class="inner">
                        <h3> 10000 </h3>
                        <p> Receivables </p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-usd" aria-hidden="true"></i>
                    </div>
                    <a href="#" class="card-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-3 col-sm-6">
                <div class="card-box bg-green">
                    <div class="inner">
                        <h3> 6000 </h3>
                        <p> Payable </p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-money" aria-hidden="true"></i>
                    </div>
                    <a href="#" class="card-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card-box bg-orange">
                    <div class="inner">
                        <h3> 4000 </h3>
                        <p> Collection</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-user-plus" aria-hidden="true"></i>
                    </div>
                    <a href="#" class="card-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card-box bg-red">
                    <div class="inner">
                        <h3> 2400</h3>
                        <p> Payment </p>
                    </div>
                    <div class="icon">
                       <i class="fa fa-ticket" aria-hidden="true"></i>
                    </div>
                    <a href="#" class="card-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
		
		
	

		
		<div class="row">
            <div class="col-lg-3 col-sm-6">
                <div class="card-box bg-gray">
                    <div class="inner">
                        <h3><span class="balcktext">4564 </span> </h3>
                        <p class="balcktext"> Total Customers </p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-users" aria-hidden="true"></i>
                    </div>
                    <a href="#" class="card-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-3 col-sm-6">
                <div class="card-box bg-darkorange">
                    <div class="inner">
                        <h3> 1767 </h3>
                        <p> Toatl Suppliers </p>
                    </div>
                    <div class="icon">
						<i class="fa fa-info-circle" aria-hidden="true"></i>

                    </div>
                    <a href="#" class="card-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card-box bg-violet">
                    <div class="inner">
                        <h3> 46987 </h3>
                        <p> Expenses</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-exchange" aria-hidden="true"></i>
                    </div>
                    <a href="#" class="card-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card-box bg-darkgreen">
                    <div class="inner">
                        <h3> 7500</h3>
                        <p> Uncleared Cheques </p>
                    </div>
                    <div class="icon">
                      <i class="fa fa-list-alt" aria-hidden="true"></i>
                    </div>
                    <a href="#" class="card-box-footer">More info<i class="fa fa-arrow-circle-right"></i></a>
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
google.load("visualization", "1", {packages:["corechart"]});
google.setOnLoadCallback(drawCharts);
function drawCharts() {
  
  
  // pie chart data
  var pieData = google.visualization.arrayToDataTable([
    ['Country', 'Page Hits'],
    ['Receivables',      7242],
    ['Payable',   4563],
    ['Collection',   1345],
   // ['Sweden',    946],
   // ['Germany',  2150]
  ]);
  // pie chart options
  var pieOptions = {
    backgroundColor: 'transparent',
    pieHole: 0.4,
    colors: [ "#dc143c",    "#ffa500",   "#6495ed"],
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
  pieChart.draw(pieData, pieOptions);
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
var ctx = document.getElementById("barchart").getContext('2d');
var barchart = new Chart(ctx, {
  type: 'bar',
  data: {
    labels: ["M", "T", "W", "T", "F", "S", "S" ],
    datasets: [{
      label: 'Receivables',
      data: [12, 19, 3,],
      backgroundColor: "#6495ed"
    }, {
      label: 'Payable',
      data: [30, 29, 5,],
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
<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ns_pollachi\resources\views/admin/master/empty.blade.php ENDPATH**/ ?>