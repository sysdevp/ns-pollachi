@extends('admin.layout.app')
@section('content')
<main class="page-content">

<style type="text/css">
  tbody#team-list {
    counter-reset: rowNumber;
}

tbody#team-list tr:nth-child(n+1) {
    counter-increment: rowNumber;
}

tbody#team-list tr:nth-child(n+1) td:first-child::before {
    content: counter(rowNumber);
    min-width: 1em;
    margin-right: 0.5em;
}
</style>
<div class="col-12 body-sec">
  <div class="card container-fluid px-0">
    <!-- card header start@ -->
    <div class="card-header px-2">
      <div class="row">
        <div class="col-4">
          <h3>View BOM</h3>
        </div>
        <div class="col-8 mr-auto">
          <ul class="h-right-btn mb-0 pl-0">
            <li><button type="button" class="btn btn-success"><a href="{{ route('bom.index') }}">Back</a></button></li>
          </ul>
        </div>
      </div>
    </div>
    <style>
    .table{
      font-size: 13px;
    }
    </style>
    <!-- card header end@ -->
    <div class="card-body">
    


<style type="text/css">
  #middlecol {
   
    width: 45%;
  }

  #middlecol table {
    max-width: 99%;
    width: 100% !important;
  }
</style>


<form  method="post" class="form-horizontal" action="" id="dataInput" enctype="multipart/form-data">

<div class="col-md-12 row mb-3">
      <div class="col-md-3">
                  <div class="form-group row">
                     <div class="col-sm-8">
                      <label>Item Name : {{$bom->items->name}}</label>
                     </div>
                  </div>
               </div>
</div>

      <div class="col-md-8">
                       <div class="form-group row">
                       <div class="col-md-4">
                       <label for="validationCustom01" class=" col-form-label"><h4>Sub Item Details:</h4> </label><br>
                       
                           
                       </div>
                         </div>
              </div>
                              
                   
<style>
table, th, td {
  border: 1px solid #E1E1E1;
}
</style>
<div class="form-row">
             
              <div class="col-md-3" id="middlecol">
                
                <table class="table table-responsive" style="float: right;" id="team-list">
                  <thead>
                    <th> S.no </th>
                    <th> Item Code</th>
                    <th> Item Name</th>
                    <th> Quantity</th>
                    <th> UOM</th>
                  </thead>
                  <tbody class="append_proof_details" id="mytable">

                  @foreach($bom_items as $key => $value)
                    <tr><td><span> {{$key+1}} </span></td><td><font>{{$value->items->code}}</font></td><td><font>{{$value->items->name}}</font></td><td><font>{{$value->qty}}</font></td><td><font>{{$value->uoms->name}}</font></td></tr>
                    @endforeach

                  </tbody>
                  <tfoot>

                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    
                  </tfoot>

                </table>
                
                       </div>

                       

                     
      </form>
                       
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" rel="stylesheet"/>
<script src="jquery.ui.position.js"></script>


<style type="text/css">
  .ui-dialog.ui-widget-content { background: #a3d072; }
</style>

        

    </div>
    <!-- card body end@ -->
  </div>
</div>
@endsection

