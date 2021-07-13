@extends('admin.layout.app')
@section('content')
<main class="page-content">

<div class="col-12 body-sec">
  <div class="card px-0">
    <!-- card header start@ -->
    <div class="card-header px-2">
      <div class="row">
        <div class="col-4">
          <h3>Day Book</h3>
        </div>
        <div class="col-8 mr-auto">
          <ul class="h-right-btn mb-0 pl-0">
            <li><button type="button" class="btn btn-success"><a href="{{route('daybook.index')}}">Back</a></button></li>
          </ul>
        </div>
      </div>
    </div>
    <!-- card header end@ -->

    <style>
table, th, td {
  border: 1px solid #E1E1E1;
}
/*#day_book_filter {
    opacity: 0;
    z-index: -1;
}
#day_book_length {
  display: none;
}
#day_book_wrapper div.dt-buttons {
  z-index: 10;
}*/
</style>
    <div class="card-body">
    
      <form  method="post" class="form-horizontal needs-validation" novalidate action="{{url('daybook_report')}}" enctype="multipart/form-data">
      {{csrf_field()}}

        <div class="form-row">

          <!-- <div class="col-md-12 row hiding">
            <div class="col-md-2">
              <label>Particulars</label>
              <input type="checkbox" class="particulars" name="opening_stock" value="1" id="item_name">
            </div> 
            <div class="col-md-2">
              <label>Nature</label>
              <input type="checkbox" class="natures" name="closing_stock" value="1" id="item_qty">
            </div>
            <div class="col-md-2">
              <label>Debit</label>
              <input type="checkbox" class="debit" name="purchase_estimation" value="1" id="item_rate">
            </div>
            <div class="col-md-2">
              <label>Credit</label>
              <input type="checkbox" class="credit" name="purchase_order" value="1" id="item_amnt">
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
                <label>Nature </label>
                <select class="js-example-basic-multiple col-12 form-control custom-select nature"  name="nature" id="nature">
                  <option value="">Choose Nature</option>
                        </select>
              </div>
              <div class="col-md-2">
              <label>Head</label>
            <select class="js-example-basic-multiple col-12 form-control custom-select head_id" name="head_id" id="head_id">
                           <option value="">Choose Head Name</option>
                           @foreach($head as $value)
                           <option value="{{ $value->id }}">{{ $value->name }}</option>
                           @endforeach
                        </select>
            </div>
            <div class="col-md-12 mb-3">
            <div class="col-md-2">
            <input type="submit" class="btn btn-success" name="add" value="Submit">
            </div>
          </div>
</form>

            <!-- <div class="col-md-3">
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
          </div> -->

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
          
          <table class="table table-striped table-bordered" id="day_book">
                  <thead>
                    <th> S.no </th>
                    <th> Date </th>
                    <th id="particulars"> Particulars</th>
                    <th id="natures"> Nature</th>
                    <th id="debit"> Debit Amount</th>
                    <th id="credit"> Credit Amount</th>
                  </thead>
                  <tbody>
                    @foreach($array_details as $key=> $value)
                  <tr>
                      
                      <td>{{ $key+1 }}</td>
                      <td>{{ $value['date'] }}</td>
                      <td>{{ $value['particular_db'] }}</td>
                      <td>{{ $value['nature'] }}</td>
                      <td>{{ $value['debit'] }}</td>
                      <td>{{ $value['credit'] }}</td>
                    </tr>
                    @endforeach
                  </tbody>
                  
                </table>
          
        </div>
        <!-- <div class="col-md-7 text-right">
          <button class="btn btn-success" name="add" type="submit">Submit</button>
        </div> -->
      </form>
    </div>
    <script src="{{asset('assets/js/master/capitalize.js')}}"></script>

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