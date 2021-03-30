@extends('admin.layout.app')
@section('content')
<main class="page-content">

<div class="col-12 body-sec">
  <div class="card px-0">
    <!-- card header start@ -->
    <div class="card-header px-2">
      <div class="row">
        <div class="col-4">
          <h3>Bill Wise(Payables)</h3>
        </div>
        <div class="col-8 mr-auto">
          <ul class="h-right-btn mb-0 pl-0">
            <li><button type="button" class="btn btn-success"><a href="{{route('payable_billwise.index')}}">Back</a></button></li>
          </ul>
        </div>
      </div>
    </div>
    <!-- card header end@ -->

    <style>
table, th, td {
  border: 1px solid #E1E1E1;
}
#payable_bill_filter {
    opacity: 0;
    z-index: -1;
}
#payable_bill_length {
  display: none;
}
#payable_bill_wrapper div.dt-buttons {
  z-index: 10;
}
</style>
    <div class="card-body">
    
      <form  method="post" class="form-horizontal needs-validation" novalidate action="{{url('payable_billwise_report')}}" enctype="multipart/form-data">
      {{csrf_field()}}

        

          <table class="table table-striped table-bordered" id="payable_bill">
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
                      <td>{{ $value->p_no }}</td>
                      <td>{{ $value->p_date }}</td>
                      <td>{{ $value->supplier->name }}</td>
                      <td>{{ $value->total_net_value }}</td>
                      <td>{{ $value->paid_amount }}</td>
                      <td>{{ $value->pending_amount }}</td>
                      <td>{{ $value->no_of_days }}</td>
                      <td>{{ $value->no_of_days }}</td>
                      <td>{{ $value->no_of_days }}</td>
                      <td>{{ $value->supplier->name }}</td>
                      <td>{{ $value->supplier->phone_no }}</td>
                      <td>{{ $value->supplier->email }}</td>
                     
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

