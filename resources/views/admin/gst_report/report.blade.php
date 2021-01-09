@extends('admin.layout.app')
@section('content')
<?php
use App\Models\GstReport;

?>
<main class="page-content">

<div class="col-12 body-sec">
  <div class="card px-0">
    <!-- card header start@ -->
    <div class="card-header px-2">
      <div class="row">
        <div class="col-4">
          <h3>GST Date Wise Report</h3>
        </div>
        <div class="col-8 mr-auto">
          <ul class="h-right-btn mb-0 pl-0">
            <li><button type="button" class="btn btn-success"><a href="{{url('date_wise/gst_report')}}">Back</a></button></li>
          </ul>
        </div>
      </div>
    </div>
    <!-- card header end@ -->

    <style>
table, th, td {
  border: 1px solid #E1E1E1;
}
#inward .dataTables_scrollHeadInner {
    width: 100% !important;
}
</style>
    <div class="card-body">
    <!-- {{route('stock_ageing.store')}} -->
      <form  method="post" class="form-horizontal needs-validation" novalidate action="{{url('gst_report/report/')}}" enctype="multipart/form-data">
      {{csrf_field()}}
        <input type="hidden" id="check_dropdown" value="{{$select}}"/>
        <div class="form-row mb-3">

        

          <div class="col-md-12 form-row mb-3">

            <div class="col-md-2">
              <label>Select Any One</label>
            <select class="form-control" onchange="change()" id="select" name="select" required>
              <option val="">Choose Any One</option>
              @if($select=="1")
              <option value="1" selected>Outward</option>
              <option value="2">Inward</option>
              @elseif($select=="2")
              <option value="1">Outward</option>
              <option value="2" selected>Inward</option>
              @else
              <option value="1">Outward</option>
              <option value="2" >Inward</option>
              @endif
            </select>
            </div>

            <div class="col-md-2">
              <label>From</label>
            <input type="date" class="form-control from" name="from" id="from" value="{{$from_date}}" required>
            </div>

            <div class="col-md-2">
              <label>To</label>
            <input type="date" class="form-control to" name="to" id="to" value="{{$to}}" required>
            </div>
          </div>
          
          </div>
          <div class="col-md-12 mb-3">
            <div class="col-md-2">
            <input type="submit" class="btn btn-success" id="submit" value="Submit">
            </div>
          </div>

          <div class="col-md-12" id="outward">
            <center><label style="font-size: 150%; margin-left: 30px;">OUTWARD</label></center>
            <table class="table table-striped table-bordered" id="out_b2b">
              <label style="font-size: 110%; margin-left: 30px;">B2B</label>
                  <thead>
                    <th> S.no </th>
                    <th>Date </th>
                    <th>Customer Name</th>
                    <th> Taxable Value</th>
                    <th> IGST</th>
                    <th>CGST</th>
                    <th>SGST</th>
                    <th>Total Tax</th>
                    <th>Total Invoice Value</th>


                  </thead>
                  <tbody>
                 
                    <?php 
                    $i=1;
                    foreach($out_b2b as $data)
                    {
                      $remaining_qty      = GstReport::outward_cal($data->s_no,"remaining_qty");
                      $rate_exclusive_tax = GstReport::outward_cal($data->s_no,"rate_exclusive_tax");
                      $rate_inclusive_tax = GstReport::outward_cal($data->s_no,"rate_inclusive_tax");
                      $tot_exclusive_tax = $remaining_qty * $rate_exclusive_tax;
                      $tot_inclusive_tax = $remaining_qty * $rate_inclusive_tax;
                      $igst = $tot_inclusive_tax - $tot_exclusive_tax;
                      $total_invoice = $tot_exclusive_tax + $igst;
                      // $taxable_value = $data->remaining_qty * $data->rate_inclusive_tax;
//echo"<pre>"; print_r($remaining_qty);
                      ?>
                       <tr>
                      <td><?php echo $i;?></td>
                      <td><?php echo date("d-m-Y",strtotime($data->s_date));?></td>
                      <td><?php echo $data->name;?></td>
                      <td><?php echo $tot_exclusive_tax;?></td>
                      <td><?php echo $igst;?></td>
                      <td><?php echo round($igst/2,2);?></td>
                      <td><?php echo round($igst/2,2); ?></td>
                      <td><?php echo $igst;?></td>
                      <td><?php echo $total_invoice;?></td>

                      </tr>
                    <?php
                    $i++;
                    }
                    ?>
                  
                  </tbody>
                  
                </table>

                <table class="table table-striped table-bordered" id="out_b2c">
            <label style="font-size: 110%; margin-left: 30px;">B2C</label>
                  <thead>
                    <th> S.no </th>
                    <th>Date </th>
                    <th>Customer Name</th>
                    <th> Taxable Value</th>
                    <th> IGST</th>
                    <th>CGST</th>
                    <th>SGST</th>
                    <th>Total Tax</th>
                    <th>Total Invoice Value</th>
                    
                  </thead>
                  <tbody>
                 
                 <?php 
                 $i=1;
                 foreach($out_b2c as $data)
                 {
                   $remaining_qty = GstReport::outward_cal($data->s_no,"remaining_qty");
                  //  echo $remaining_qty;
                   $rate_exclusive_tax = GstReport::outward_cal($data->s_no,"rate_exclusive_tax");
                   $rate_inclusive_tax = GstReport::outward_cal($data->s_no,"rate_inclusive_tax");
                   $tot_exclusive_tax = $remaining_qty * $rate_exclusive_tax;
                   $tot_inclusive_tax = $remaining_qty * $rate_inclusive_tax;
                   $igst = $tot_inclusive_tax - $tot_exclusive_tax;
                   $total_invoice = $tot_exclusive_tax + $igst;
                   // $taxable_value = $data->remaining_qty * $data->rate_inclusive_tax;
//echo"<pre>"; print_r($remaining_qty);
                   ?>
                    <tr>
                   <td><?php echo $i;?></td>
                   <td><?php echo date("d-m-Y",strtotime($data->s_date));?></td>
                   <td><?php echo $data->name;?></td>
                   <td><?php echo $tot_exclusive_tax;?></td>
                   <td><?php echo $igst;?></td>
                   <td><?php echo round($igst/2,2);?></td>
                   <td><?php echo round($igst/2,2); ?></td>
                   <td><?php echo $igst;?></td>
                   <td><?php echo $total_invoice;?></td>

                   </tr>
                 <?php
                 $i++;
                 }
                 ?>
               
               </tbody>
                  
                </table>



                <table class="table table-striped table-bordered" id="payable_bill">
            <label style="font-size: 110%; margin-left: 30px;">Unregistered Customer</label>
                  <thead>
                    <th> S.no </th>
                    <th>Date </th>
                    <th>Customer Name</th>
                    <th> Taxable Value</th>
                    <th> IGST</th>
                    <th>CGST</th>
                    <th>SGST</th>
                    <th>Total Tax</th>
                    <th>Total Invoice Value</th>
                    
                  </thead>
                  <tbody>
                 
                 <?php 
                 $i=1;
                 foreach($out_unreg as $data)
                 {
                   $remaining_qty = GstReport::outward_cal($data->s_no,"remaining_qty");
                  //  echo $remaining_qty;
                   $rate_exclusive_tax = GstReport::outward_cal($data->s_no,"rate_exclusive_tax");
                   $rate_inclusive_tax = GstReport::outward_cal($data->s_no,"rate_inclusive_tax");
                   $tot_exclusive_tax = $remaining_qty * $rate_exclusive_tax;
                   $tot_inclusive_tax = $remaining_qty * $rate_inclusive_tax;
                   $igst = $tot_inclusive_tax - $tot_exclusive_tax;
                   $total_invoice = $tot_exclusive_tax + $igst;
                   // $taxable_value = $data->remaining_qty * $data->rate_inclusive_tax;
//echo"<pre>"; print_r($remaining_qty);
                   ?>
                    <tr>
                   <td><?php echo $i;?></td>
                   <td><?php echo date("d-m-Y",strtotime($data->s_date));?></td>
                   <td><?php echo $data->name;?></td>
                   <td><?php echo $tot_exclusive_tax;?></td>
                   <td><?php echo $igst;?></td>
                   <td><?php echo round($igst/2,2);?></td>
                   <td><?php echo round($igst/2,2); ?></td>
                   <td><?php echo $igst;?></td>
                   <td><?php echo $total_invoice;?></td>

                   </tr>
                 <?php
                 $i++;
                 }
                 ?>
               
               </tbody>
                  
                </table>

          </div>

          <div class="col-md-12" id="inward" style="display: none;">
            <center><label style="font-size: 150%; margin-left: 30px;">INWARD</label></center>
            <table class="table table-striped table-bordered" id="b2b" >
              <label style="font-size: 110%; margin-left: 30px;">B2B</label>
                  <thead style="width: 100%;">
                    <th> S.no </th>
                    <th>Date </th>
                    <th>Supplier Name</th>
                    <!-- <th>Particulars</th> -->
                    <th> Taxable Value</th>
                    <th> IGST</th>
                    <th>CGST</th>
                    <th>SGST</th>
                    <th>Total Tax</th>
                    <th>Total Invoice Value</th>
                    <!-- <th>Action</th> -->

                  </thead>
                  <tbody>
                  <?php 
                 $i=1;
                 foreach($in_b2b as $data)
                 {
                   echo $data->p_no;
                  $remaining_qty = GstReport::inward_cal($data->p_no,"remaining_qty");
                  //  echo $remaining_qty;
                   $rate_exclusive_tax = GstReport::inward_cal($data->p_no,"rate_exclusive_tax");
                   $rate_inclusive_tax = GstReport::inward_cal($data->p_no,"rate_inclusive_tax");
                   $tot_exclusive_tax = $remaining_qty * $rate_exclusive_tax;
                   $tot_inclusive_tax = $remaining_qty * $rate_inclusive_tax;
                   $igst = $tot_inclusive_tax - $tot_exclusive_tax;
                   $total_invoice = $tot_exclusive_tax + $igst;
                   // $taxable_value = $data->remaining_qty * $data->rate_inclusive_tax;
//echo"<pre>"; print_r($remaining_qty);
                   ?>
                    <tr>
                   <td><?php echo $i;?></td>
                   <td><?php echo date("d-m-Y",strtotime($data->p_date));?></td>
                   <td><?php echo $data->name;?></td>
                   <td><?php echo $tot_exclusive_tax;?></td>
                   <td><?php echo $igst;?></td>
                   <td><?php echo round($igst/2,2);?></td>
                   <td><?php echo round($igst/2,2); ?></td>
                   <td><?php echo $igst;?></td>
                   <td><?php echo $total_invoice;?></td>

                   </tr>
                 <?php
                 $i++;
                 }
                 ?>
                  </tbody>
                  
                </table>

                <table class="table table-striped table-bordered" id="b2c">
            <label style="font-size: 110%; margin-left: 30px;">B2C</label>
                  <thead>
                    <th> S.no </th>
                    <th>Date </th>
                    <th>Supplier Name</th>
                    <!-- <th>Particulars</th> -->
                    <th> Taxable Value</th>
                    <th> IGST</th>
                    <th>CGST</th>
                    <th>SGST</th>
                    <th>Total Tax</th>
                    <th>Total Invoice Value</th>
                    <!-- <th>Action</th> -->
                    
                  </thead>
                  <tbody>
                  <?php 
                 $i=1;
                 foreach($in_b2c as $data)
                 {
                  $remaining_qty = GstReport::inward_cal($data->p_no,"remaining_qty");
                  //  echo $remaining_qty;
                   $rate_exclusive_tax = GstReport::inward_cal($data->p_no,"rate_exclusive_tax");
                   $rate_inclusive_tax = GstReport::inward_cal($data->p_no,"rate_inclusive_tax");
                   $tot_exclusive_tax = $remaining_qty * $rate_exclusive_tax;
                   $tot_inclusive_tax = $remaining_qty * $rate_inclusive_tax;
                   $igst = $tot_inclusive_tax - $tot_exclusive_tax;
                   $total_invoice = $tot_exclusive_tax + $igst;
                   // $taxable_value = $data->remaining_qty * $data->rate_inclusive_tax;
//echo"<pre>"; print_r($remaining_qty);
                   ?>
                    <tr>
                   <td><?php echo $i;?></td>
                   <td><?php echo date("d-m-Y",strtotime($data->p_date));?></td>
                   <td><?php echo $data->name;?></td>
                   <td><?php echo $tot_exclusive_tax;?></td>
                   <td><?php echo $igst;?></td>
                   <td><?php echo round($igst/2,2);?></td>
                   <td><?php echo round($igst/2,2); ?></td>
                   <td><?php echo $igst;?></td>
                   <td><?php echo $total_invoice;?></td>

                   </tr>
                 <?php
                 $i++;
                 }
                 ?>
                  </tbody>
                  
                </table>



                <table class="table table-striped table-bordered" id="unregistered">
            <label style="font-size: 110%; margin-left: 30px;">Unregistered Supplier</label>
                  <thead>
                    <th> S.no </th>
                    <th>Date </th>
                    <th>Supplier Name</th>
                    <!-- <th>Particulars</th> -->
                    <th> Taxable Value</th>
                    <th> IGST</th>
                    <th>CGST</th>
                    <th>SGST</th>
                    <th>Total Tax</th>
                    <th>Total Invoice Value</th>
                    <!-- <th>Action</th> -->
                    
                  </thead>
                  <tbody>
                  <?php 
                 $i=1;
                 foreach($in_unreg as $data)
                 {
                   $remaining_qty = GstReport::inward_cal($data->p_no,"remaining_qty");
                  //  echo $remaining_qty;
                   $rate_exclusive_tax = GstReport::inward_cal($data->p_no,"rate_exclusive_tax");
                   $rate_inclusive_tax = GstReport::inward_cal($data->p_no,"rate_inclusive_tax");
                   $tot_exclusive_tax = $remaining_qty * $rate_exclusive_tax;
                   $tot_inclusive_tax = $remaining_qty * $rate_inclusive_tax;
                   $igst = $tot_inclusive_tax - $tot_exclusive_tax;
                   $total_invoice = $tot_exclusive_tax + $igst;
                   // $taxable_value = $data->remaining_qty * $data->rate_inclusive_tax;
//echo"<pre>"; print_r($remaining_qty);
                   ?>
                    <tr>
                   <td><?php echo $i;?></td>
                   <td><?php echo date("d-m-Y",strtotime($data->p_date));?></td>
                   <td><?php echo $data->name;?></td>
                   <td><?php echo $tot_exclusive_tax;?></td>
                   <td><?php echo $igst;?></td>
                   <td><?php echo round($igst/2,2);?></td>
                   <td><?php echo round($igst/2,2); ?></td>
                   <td><?php echo $igst;?></td>
                   <td><?php echo $total_invoice;?></td>

                   </tr>
                 <?php
                 $i++;
                 }
                 ?>
                  </tbody>
                  
                </table>

          </div>
          
          
        </div>
        <!-- <div class="col-md-7 text-right">
          <button class="btn btn-success" name="add" type="submit">Submit</button>
        </div> -->
      </form>
    </div>
    <script src="{{asset('assets/js/master/capitalize.js')}}"></script>
    <script src="{{asset('assets/js/ageing_analysis/ageing.js')}}"></script>

    <script>
    $(document).ready(function (){
        // var from_date = $("#from").val();
        // var to = $("#to").val();
        var select = $("#check_dropdown").val();
        //alert(select);
        if(select==2)
        {
          $('#inward').show();
          $('#outward').hide();
        }
        else
        {
          $('#inward').hide();
          $('#outward').show();

        }
    });
      function hide_column()
      {
        $('input[type=checkbox]').each(function(){
            if($(this).prop("checked") == true){
                var name = $(this).attr('class');
                $('#'+name).hide();  
                }
              });
      }

      function show_column()
      {
        $('input[type=checkbox]').each(function(){
            if($(this).prop("checked") == true){
                var name = $(this).attr('class');
                $('#'+name).show();  
                this.checked = false;
                }
              });
      }

      function change()
      {
        if($('#select').val() == 2)
        {
          $('#inward').show();
          $('#outward').hide();
        }
        else
        {
          $('#inward').hide();
          $('#outward').show();
        }
      }
    </script>
    
    <!-- card body end@ -->
  </div>
</div>
@endsection

