@extends('admin.layout.app')
@section('content')
<main class="page-content">

<div class="col-12 body-sec">
  <div class="card px-0">
    <!-- card header start@ -->
    <div class="card-header px-2">
      <div class="row">
        <div class="col-4">
          <h3>Individual Ledger</h3>
        </div>
        <div class="col-8 mr-auto">
          <ul class="h-right-btn mb-0 pl-0">
            <li><button type="button" class="btn btn-success"><a href="{{route('individual_ledger.index')}}">Back</a></button></li>
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
}
#stock_summary_filter {
    opacity: 0;
    z-index: -1;
}
#stock_summary_length {
  display: none;
}*/
/*#master_wrapper div.dt-buttons {
  z-index: 10;
}* {{route('individual_ledger.store')}} search_individual_ledger/
</style>
    <div class="card-body">
    
      <form  method="post" class="form-horizontal needs-validation" novalidate action="{{url('ledger_report')}}" enctype="multipart/form-data">
      {{csrf_field()}}

        <div class="form-row mb-3">

        

          <div class="col-md-12 form-row mb-3">

            <div class="col-md-4">
                  <label style="font-family: Times new roman;">Head</label><br>
                  <div class="form-group row">
                     <div class="col-sm-8">
                      <select class="js-example-basic-multiple col-12 form-control custom-select head_id" name="head_id" id="head_id">
                           <option value="">Choose Head Name</option>
                           @foreach($head as $value)
                           <option value="{{ $value->id }}">{{ $value->name }}</option>
                           @endforeach
                        </select>
                     </div>
                 
                  </div>
               </div>

            <div class="col-md-2">
              <label>From</label>
            <input type="date" class="form-control from" name="from" id="from">
            </div>

            <div class="col-md-2">
              <label>To</label>
            <input type="date" class="form-control to" name="to" id="to">
            </div>
          </div>
          
          </div>
          <div class="col-md-12 mb-3">
            <div class="col-md-2">
            <input type="submit" class="btn btn-success" name="add" value="Submit">
            </div>
          </div>
</form>
          <div class="col-md-12">
            <table class="table table-striped table-bordered" id="ageing_report">
                  <thead>
                    <th> S.no </th>
                    <th id="items">Date </th>
                    <th id="qty">Particulars Debit</th>
                    <th id="rate"> Debit</th>
                    <th id="amnt"> Particulars Credit</th>
                    <th id="0-30">Credit</th>
                    
                  </thead>
                  <tbody>
                    
                   @foreach($array_details as $key=> $value)
                  <tr>
                      
                      <td>{{ $key+1 }}</td>
                      <td>{{ $value['date'] }}</td>
                      <td>{{ $value['particular_db'] }}</td>
                      <td>{{ $value['debit'] }}</td>
                      <td>{{ $value['particular_cd'] }}</td>
                      <td>{{ $value['credit'] }}</td>
                    </tr>
                    @endforeach
                  </tbody>
                  
                </table>
          </div>

         
          
          
        </div>
        <!-- <div class="col-md-7 text-right">
          <button class="btn btn-success" name="add" type="submit">Submit</button>
        </div> -->
      
    </div>
    <script src="{{asset('assets/js/master/capitalize.js')}}"></script>
    <script src="{{asset('assets/js/ageing_analysis/ageing.js')}}"></script>

    <script>
      $(document).ready(function(){
      
       // alert();
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
    </script>
    
    <!-- card body end@ -->
  </div>
</div>
@endsection

