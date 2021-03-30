@extends('admin.layout.app')
@section('content')
<main class="page-content">

<div class="col-12 body-sec">
  <div class="card px-0">
    <!-- card header start@ -->
    <div class="card-header px-2">
      <div class="row">
        <div class="col-4">
          <h3>{{ $item->name }}</h3>
        </div>
        <div class="col-8 mr-auto">
          <ul class="h-right-btn mb-0 pl-0">
            <li><button type="button" class="btn btn-success"><a href="{{route('purchase_cost.index')}}">Back</a></button></li>
          </ul>
        </div>
      </div>
    </div>
    <!-- card header end@ -->

    <style>
table, th, td {
  border: 1px solid #E1E1E1;
}
/*#stock_summary_filter {
    opacity: 0;
    z-index: -1;
}
#stock_summary_length {
  display: none;
}
#stock_summary_wrapper div.dt-buttons {
  z-index: 10;
}*/

</style>
    <div class="card-body">
    
      <form  method="post" class="form-horizontal needs-validation" novalidate action="{{route('payable_billwise.store')}}" enctype="multipart/form-data">
      {{csrf_field()}}

        <div class="form-row">

          <div class="col-md-12 row mb-3">

            <!-- <div class="col-md-2">
            <input type="button" class="btn btn-success" name="ageing" id="ageing" onclick="hide_column()" value="Hide Columns">
            </div> -->
            
            <div class="col-md-2 analysis1" style="display: none;">
              <label>From</label>
              <input type="Number" class="form-control" oninput="from_value1()" style="display: none;" name="from1" value="0" id="from1"><br>
              <input type="Number" class="form-control" oninput="from_value2()" style="display: none;" name="from2" value="0" id="from2"><br>
              <input type="Number" class="form-control" oninput="from_value3()" style="display: none;" name="from3" value="0" id="from3"><br>
              <input type="Number" class="form-control" oninput="from_value4()" style="display: none;" name="from4" value="0" id="from4"><br>
              <input type="Number" class="form-control" oninput="from_value5()" style="display: none;" name="from5" value="0" id="from5"><br>
              
            </div>


            <div class="col-md-2 analysis2" style="display: none;">
              <label>To</label>
              <div class="input-group-prepend">
              <input type="Number" class="form-control" onchange="to_value1()" style="display: none;" name="to1" id="to1">&nbsp;&nbsp;<input type="button" class="btn btn-success go" id="go" value="Go" name="go">
              </div><br>
              <input type="Number" class="form-control" onchange="to_value2()" style="display: none;" name="to2" id="to2"><br>
              <input type="Number" class="form-control" onchange="to_value3()" style="display: none;" name="to3" id="to3"><br>
              <input type="Number" class="form-control" onchange="to_value4()" style="display: none;" name="to4" id="to4"><br>
              <input type="Number" class="form-control" onchange="to_value5()" style="display: none;" name="to5" id="to5"><br>
            </div>

            
          </div>

          <!-- <div class="col-md-12 row hiding">
            <div class="col-md-2">
              <label>Opening Stock</label>
              <input type="checkbox" class="op_stock" name="opening_stock" value="1" id="opening_stock">
            </div> 

            <div class="col-md-2">
              <label>Closing Stock</label>
              <input type="checkbox" class="cls_stock" name="closing_stock" value="1" id="closing_stock">
            </div>

            <div class="col-md-2">
              <label>Purchase Estimation</label>
              <input type="checkbox" class="p_e" name="purchase_estimation" value="1" id="purchase_estimation">
            </div>

            <div class="col-md-2">
              <label>Purchase Order</label>
              <input type="checkbox" class="p_o" name="purchase_order" value="1" id="purchase_order">
            </div> 

            <div class="col-md-2">
              <label>Receipt Note</label>
              <input type="checkbox" class="r_note" name="receipt_note" value="1" id="receipt_note">
            </div> 

            <div class="col-md-2">
              <label>Purchase Entry</label>
              <input type="checkbox" class="p_enrty" name="purchase_entry" value="1" id="purchase_entry">
            </div>

            </div>

            <div class="col-md-12 row hiding">
            <div class="col-md-2">
              <label>Rejection Out</label>
              <input type="checkbox" class="r_out" name="rejection_out" value="1" id="rejection_out">
            </div> 

            <div class="col-md-2">
              <label>Debit Note</label>
              <input type="checkbox" class="d_n" name="debit_note" value="1" id="debit_note">
            </div>

            <div class="col-md-2">
              <label>Sales Estimation</label>
              <input type="checkbox" class="s_e" name="purchase_estimation" value="1" id="purchase_estimation">
            </div>

            <div class="col-md-2">
              <label>Sales Order</label>
              <input type="checkbox" class="s_o" name="purchase_order" value="1" id="purchase_order">
            </div> 

            <div class="col-md-2">
              <label>Delivery Note</label>
              <input type="checkbox" class="d_note" name="delivery_note" value="1" id="delivery_note">
            </div> 

            <div class="col-md-2">
              <label>Sales Entry</label>
              <input type="checkbox" class="s_entry" name="purchase_entry" value="1" id="purchase_entry">
            </div>

            </div>

            <div class="col-md-12 mb-3 row hiding">
            <div class="col-md-2">
              <label>Rejection In</label>
              <input type="checkbox" class="r_in" name="rejection_in" value="1" id="rejection_in">
            </div> 

            <div class="col-md-2">
              <label>Credit Note</label>
              <input type="checkbox" class="c_note" name="credit_note" value="1" id="credit_note">
            </div>

            </div>

            <div class="col-md-12 row mb-3">
            <div class="col-md-2">
            <input type="button" class="btn btn-success" name="ageing" id="ageing" onclick="hide_column()" value="Hide Columns">
            </div>
            <div class="col-md-2">
            <input type="button" class="btn btn-success" name="ageing" id="ageing" onclick="show_column()" value="Show All Columns">
            </div>
          </div> -->

          <!-- <div class="col-md-12 form-row mb-3">
            <div class="col-md-2">
              <label>From</label>
            <input type="date" class="form-control from" name="from" id="from">
            </div>

            <div class="col-md-2">
              <label>To</label>
            <input type="date" class="form-control to" name="to" id="to">
            </div>

              <div class="col-sm-2">
                <label>Category </label>
                <select class="js-example-basic-multiple col-12 form-control custom-select category"  name="category" id="category">
                 
                        </select>
              </div>
              <div class="col-sm-2">
                <label>Item Name </label>
                <select class="js-example-basic-multiple col-12 form-control custom-select item"  name="item" id="item">
                  
                        </select>
              </div>

              <div class="col-sm-2">
                <label>Party Name </label>
                <select class="js-example-basic-multiple col-12 form-control custom-select supplier"  name="supplier" id="supplier">
                  <
                        </select>
              </div>

            
          </div> -->
          
          <table class="table table-striped table-bordered" id="stock_summary">
                  <thead>
                    <tr>
                    <th> S.no </th>
                    <th>Supplier</th>
                    <th>Last Purchase Cost</th>
                    </tr>
                  </thead>
                  <tbody>
                    @php
                    $total = 0;
                    @endphp

                    @foreach($item_data as $key => $value)

                    @php
                      $barnd_name="";
                      if(isset($value->item->brand->name))
                      {
                        $barnd_name=$value->item->brand->name;
                      }
                      else
                      {
                        $barnd_name="Not Applicable";
                      }
                    @endphp

                    <tr>
                      <td>{{ $key+1 }}</td>
                      <td>{{ @$value->purchase_entries->supplier->name }}</td>
                      @php
                      
                      $amount = $value->qty * $value->rate_exclusive_tax;
                      $gst_rs = $amount * $value->gst / 100;
                      $total_discount = $value->discount + $value->overall_disc;
                      $net_value = $amount + $gst_rs - $total_discount + $value->expenses; 

                      $values = $net_value / $value->qty;

                      $total = $total + $values;

                      @endphp
                      <td>{{ @$values }}</td>
                      
                    </tr>

                    @endforeach
                    @php
                    $average = $total/$count;
                    $avg = number_format((float)$average, 2, '.', '');
                    @endphp
                    <tr><td><b>Average Purchase Cost</b></td>
                      <td></td>
                      <td><b>{{$avg}}</b></td>
                    </tr>
                      
                  </tbody>
                  
                </table>

          
        </div>
        <!-- <div class="col-md-7 text-right">
          <button class="btn btn-success" name="add" type="submit">Submit</button>
        </div> -->
      </form>
    </div>
    <script src="{{asset('assets/js/master/capitalize.js')}}"></script>
    <script src="{{asset('assets/js/ageing_analysis/ageing.js')}}"></script>
    <script>
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
    </script>
    <!-- card body end@ -->
  </div>
</div>
@endsection

