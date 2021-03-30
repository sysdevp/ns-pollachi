@extends('admin.layout.app')
@section('content')
<main class="page-content">

<div class="col-12 body-sec">
  <div class="card px-0">
    <!-- card header start@ -->
    <div class="card-header px-2">
      <div class="row">
        <div class="col-4">
          <h3>Bill Wise(Receivables)</h3>
        </div>
        <div class="col-8 mr-auto">
          <ul class="h-right-btn mb-0 pl-0">
            <li><button type="button" class="btn btn-success"><a href="{{route('receivable_partywise.index')}}">Back</a></button></li>
          </ul>
        </div>
      </div>
    </div>
    <!-- card header end@ -->

    <style>
table, th, td {
  border: 1px solid #E1E1E1;
}
#receivable_bill_filter {
    opacity: 0;
    z-index: -1;
}
#receivable_bill_length {
  display: none;
}
#receivable_bill_wrapper div.dt-buttons {
  z-index: 10;
}
</style>
    <div class="card-body">
    
      <form  method="post" class="form-horizontal needs-validation" novalidate action="{{route('receivable_partywise.index')}}" enctype="multipart/form-data">
      {{csrf_field()}}

        <div class="form-row">
          <div class="col-md-12 row mb-3">


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
          
          <div class="col-md-12">
            
          <table id="receivable_bill" class="table table-striped table-bordered" style="width: 100%;">
                  <thead>
                    <th> S.no </th>
                    <th id="bill_no"> Bill.no </th>
                    <th id="bill_date"> Bill Date</th>
                    <th id="party"> Party Name</th>
                    <th id="bill_amount"> Bill Amount</th>
                    <th id="cleared_amount"> Cleared Amount</th>
                    <th id="pending_amount"> Pending Amount</th>
                    <th id="0-30" style="display: none;">0-30 Days</th>
                    <th id="31-60" style="display: none;">31-60 Days</th>
                    <th id="61-90" style="display: none;">61-90 Days</th>
                    <th id="91-120" style="display: none;">91-120 Days</th>
                    <th id="120" style="display: none;">(>120 Days)</th>
                    <th id="no_days"> No Of Days From Bill Date</th>
                    <th id="due_date\"> No Of Days From Due Date</th>
                    <th id="salesman"> Sales Man Name</th>
                    <th id="customer"> Customer Contact Name</th>
                    <th id="contact"> Customer Contact Number</th>
                    <th id="email"> Customer Contact Email Id</th>
                  </thead>
                  <tbody>
                   @foreach($purchaseentry_datas as $key=> $value)
                    <tr>
                      <td>{{ $key+1 }}</td>
                      <td>{{ $value->s_no }}</td>
                      <td>{{ $value->s_date }}</td>
                      <td>{{ $value->customer->name }}</td>
                      <td>{{ $value->total_net_value }}</td>
                      <td>{{ $value->paid_amount }}</td>
                      <td>{{ $value->pending_amount }}</td>
                      <td>{{ $value->no_of_days }}</td>
                      <td>{{ $value->no_of_days }}</td>
                      <td>{{ $value->salesman->name }}</td>
                      <td>{{ $value->customer->name }}</td>
                      <td>{{ $value->customer->phone_no }}</td>
                      <td>{{ $value->customer->email }}</td>
                     
            </tr>
         @endforeach
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

