@extends('admin.layout.app')
@section('content')
<div class="col-12 body-sec">
  <div class="card px-0">
    <!-- card header start@ -->
    <div class="card-header px-2">
      <div class="row">
        <div class="col-4">
          <h3>Stock Ageing</h3>
        </div>
        <div class="col-8 mr-auto">
          <ul class="h-right-btn mb-0 pl-0">
            <li><button type="button" class="btn btn-success"><a href="{{route('stock_ageing.index')}}">Back</a></button></li>
          </ul>
        </div>
      </div>
    </div>
    <!-- card header end@ -->

    <style>
table, th, td {
  border: 1px solid #E1E1E1;
}
/*#ageing_report_filter {
    opacity: 0;
    z-index: -1;
}
#ageing_report_length {
  display: none;
}
#ageing_report_wrapper div.dt-buttons {
  z-index: 10;
}*/
</style>
    <div class="card-body">
    
      <form  method="post" class="form-horizontal needs-validation" novalidate action="{{route('stock_ageing.store')}}" enctype="multipart/form-data">
      {{csrf_field()}}

        <div class="form-row">

          <div class="col-md-12 row mb-3">

            <div class="col-md-2">
            <input type="button" class="btn btn-success" name="ageing" id="ageing" onclick="ageing_analysis()" value="Ageing Analysis">
            </div>
            
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
              <label>Name Of Item</label>
              <input type="checkbox" class="items" name="opening_stock" value="1" id="item_name">
            </div> 

            <div class="col-md-2">
              <label>Quantity</label>
              <input type="checkbox" class="qty" name="closing_stock" value="1" id="item_qty">
            </div>

            <div class="col-md-2">
              <label>Rate</label>
              <input type="checkbox" class="rate" name="purchase_estimation" value="1" id="item_rate">
            </div>

            <div class="col-md-2">
              <label>Amount</label>
              <input type="checkbox" class="amnt" name="purchase_order" value="1" id="item_amnt">
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

          <div class="col-md-12 form-row mb-3">
            <div class="col-md-2">
              <label>From</label>
            <input type="date" class="form-control from" name="from" id="from">
            </div>

            <div class="col-md-2">
              <label>To</label>
            <input type="date" class="form-control to" name="to" id="to">
            </div>

              <div class="col-sm-2">
                <label>Item Name </label>
                <select class="js-example-basic-multiple col-12 form-control custom-select item"  name="item" id="item">
                  <option value="">Choose Item Name</option>
                  @foreach($items as $value)
                  <option value="{{ $value->id }}">{{ $value->name }}</option>
                  @endforeach
                        </select>
              </div>
              <div class="col-md-2">
              <label>Head</label>
            <input type="text" class="form-control head" placeholder="Head" name="head" id="head">
            </div>

            <div class="col-md-3">
              <label>Amount</label>
            <div class="input-group">
              <input type="text" class="form-control col-md-9" aria-label="Text input with dropdown button" placeholder="Amount" name="amount">
              <div class="input-group-append col-md-3 p-0">
 
                  <select class=" form-control custom-select operator"  name="operator" id="operator">
                  <option value="">Operator</option>
                           <option value="1">></option>
                           <option value="2"><</option>
                           <option value="3">=</option>
                        </select>

              </div>
            </div>
          </div>


            <!-- <div class="col-md-2">
              <label>Amount</label>
            <input type="Number" class="form-control amount" placeholder="Amont" name="amount" id="amount">
            </div>
            <div class="col-sm-2">
                <label>Choose Any One</label>
                <select class="js-example-basic-multiple col-12 form-control custom-select nature"  name="nature" id="nature">
                  <option value="">Choose Any One</option>
                           <option value="">Greater Than</option>
                           <option value="">Less Than</option>
                           <option value="">Equal To</option>
                        </select>
              </div> -->
          </div>
          
          <table class="table table-striped table-bordered" id="ageing_report">
                  <thead>
                    <th> S.no </th>
                    <th id="items"> Name Of Item </th>
                    <th id="qty">Quantity</th>
                    <th id="rate"> Rate</th>
                    <th id="amnt"> Amount</th>
                    <th id="0-30" style="display: none;">0-30 Days</th>
                    <th id="31-60" style="display: none;">31-60 Days</th>
                    <th id="61-90" style="display: none;">61-90 Days</th>
                    <th id="91-120" style="display: none;">91-120 Days</th>
                    <th id="120" style="display: none;">(>120 Days)</th>
                  </thead>
                  <tbody>
                      @for($i = 0; $i < $count; $i++)
                      <tr>
                      <td><?php echo $i+1; ?></td>
                      <td>{{ $array_details[$i]['item'] }}</td>
                      <td>{{ $array_details[$i]['quantity'] }}</td>
                      <td>{{ $array_details[$i]['rate'] }}</td>
                      <td>{{ $array_details[$i]['amount'] }}</td>
                      </tr>
                      @endfor
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

