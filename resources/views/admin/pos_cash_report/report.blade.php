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

<h2 class="pl-3">POS Cash Report</h2>
<!-- model start receivables -->
<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Launch demo modal
</button> -->

<form  method="post" class="form-horizontal needs-validation" novalidate action="{{route('pos-cash-report.store')}}" enctype="multipart/form-data">
      {{csrf_field()}}

<div class="col-md-12 form-row mb-3">
            <div class="col-md-2">
              <label>From</label>
            <input type="date" class="form-control from" name="from" id="from" autofocus="" value="{{ $from }}">
            </div>

            <div class="col-md-2">
              <label>To</label>
            <input type="date" class="form-control to" name="to" id="to" value="{{ $to }}">
            </div>
          </div>

        <input type="submit" name="" class="btn btn-success" value="Submit">
         </form> 

<!-- model start payables -->
<!-- Modal -->
<div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cash</h5>
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
      <th scope="col">Date</th>
      <th scope="col">Customer</th>
      <th scope="col">Amount</th>
    </tr>
  </thead>
  <tbody>
    @foreach($cash_report as $key => $value)
    <tr>
      <td>{{ $key+1 }}</td>
      <td>{{ @$value->pos_no }}</td>
      <td>{{ @$value->pos_date }}</td>
      <td>{{ @$value->customers->name }}</td>
      <td>{{ @$value->cash }}</td>
    </tr>
    @endforeach
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
        <h5 class="modal-title" id="exampleModalLabel">Card</h5>
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
      <th scope="col">Date</th>
      <th scope="col">Customer</th>
      <th scope="col">Amount</th>
    </tr>
  </thead>
  <tbody>
    @foreach($card_report as $key => $value)
    <tr>
      <td>{{ $key+1 }}</td>
      <td>{{ @$value->pos_no }}</td>
      <td>{{ @$value->pos_date }}</td>
      <td>{{ @$value->customers->name }}</td>
      <td>{{ @$value->card }}</td>
    </tr>
    @endforeach
  </tbody>

        </table>

      </div>
    
    </div>
  </div>
</div>

<!--  model end-->

<!-- Modal -->
<div class="modal fade" id="exampleModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cheque</h5>
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
      <th scope="col">Date</th>
      <th scope="col">Customer</th>
      <th scope="col">Amount</th>
    </tr>
  </thead>
  <tbody>
    @foreach($cheque_report as $key => $value)
    <tr>
      <td>{{ $key+1 }}</td>
      <td>{{ @$value->pos_no }}</td>
      <td>{{ @$value->pos_date }}</td>
      <td>{{ @$value->customers->name }}</td>
      <td>{{ @$value->cheque }}</td>
    </tr>
    @endforeach
  </tbody>

        </table>

      </div>
    
    </div>
  </div>
</div>

<!--  model end-->


<!-- Modal -->
<div class="modal fade" id="exampleModal4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Voucher</h5>
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
      <th scope="col">Date</th>
      <th scope="col">Customer</th>
      <th scope="col">Amount</th>
    </tr>
  </thead>
  <tbody>
    @foreach($voucher_report as $key => $value)
    <tr>
      <td>{{ $key+1 }}</td>
      <td>{{ @$value->pos_no }}</td>
      <td>{{ @$value->pos_date }}</td>
      <td>{{ @$value->customers->name }}</td>
      <td>{{ @$value->voucher }}</td>
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


<div class="col-12 body-sec">
<div class="container">
        <div class="row">
            <div class="col-lg-3 col-sm-6">
                <div class="card-box bg-blue">
                    <div class="inner">
                        <h3 id="receivables">{{$cash_sum}} </h3>
                        <p> Cash </p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-usd" aria-hidden="true"></i>
                    </div>
                    <a href="#" data-toggle="modal" data-target="#exampleModal1" class="card-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-3 col-sm-6">
                <div class="card-box bg-green">
                    <div class="inner">
                        <h3> {{$card_sum}} </h3>
                        <p> Card </p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-money" aria-hidden="true"></i>
                    </div>
                    <a href="#" data-toggle="modal" data-target="#exampleModal2" class="card-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card-box bg-orange">
                    <div class="inner">
                        <h3>{{$cheque_sum}} </h3>
                        <p> Cheque</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-user-plus" aria-hidden="true"></i>
                    </div>
                    <a href="#" data-toggle="modal" data-target="#exampleModal3" class="card-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card-box bg-red">
                    <div class="inner">
                        <h3>{{$voucher_sum}}</h3>
                        <p> Voucher </p>
                    </div>
                    <div class="icon">
                       <i class="fa fa-ticket" aria-hidden="true"></i>
                    </div>
                    <a href="#" data-toggle="modal" data-target="#exampleModal4" class="card-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
		
		
		
    </div>
	
	<br/>
	
	
	<br/><br/><br/>
    </br>
    
		


</div>
@endsection

