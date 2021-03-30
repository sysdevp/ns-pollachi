@extends('admin.layout.app')
@section('content')
<main class="page-content">

<div class="col-12 body-sec">
  <div class="card">
    <!-- card header start@ -->
    <div class="card-header px-2">
      <div class="row">
        <div class="col-4">
          <h3>Voucher Numbering</h3>
        </div>
        <div class="col-8 mr-auto">
        </div>
      </div>
    </div>
    <!-- card header end@ -->
    <div class="card-body">
    <form  method="post" class="form-horizontal needs-validation" action="{{route('voucher-numbering.store')}}" enctype="multipart/form-data">
      {{csrf_field()}}

      <!-- <input type="text" class="form-control numberings" readonly="" name="numberings"> -->

      <div class="cat" id="cat" style="display: none;" title="Voucher Number Preview">
                        
                <div class="form-row">
                 <input type="text" class="form-control voucher_no" readonly="" name="voucher_no">           
                </div>
    
                            
      </div>
      <table id="voucher" class="table table-bordered table-hover">
        <thead>
          <tr>
            <th>S.No</th>
            <th>Voucher</th>
            <th>Prefix </th>
            <th>Suffix </th>
            <th>Starting No </th>
            <th>No of Digits </th>
            <th>Preview </th>
          </tr>
        </thead>
        <tbody id="test1">
          @foreach($voucher as $key => $value)
          <input type="hidden" class="form-control value" value="{{ $value->value }}" name="value">
            <tr>
              <td>{{ $key+1 }}</td>
              <td>{{ $value->transaction }}</td>
              <td><input type="text" class="form-control prefix{{ $key }}" value="{{ $value->prefix }}" name="prefix[]" placeholder="Prefix"></td>
              <td><input type="text" class="form-control suffix{{ $key }}" name="suffix[]" value="{{ $value->suffix }}" placeholder="Suffix"></td>
              <td><input type="text" class="form-control starting{{ $key }}" name="starting[]" value="{{ $value->starting_no }}" placeholder="Starting No"></td>
              <td><input type="text" class="form-control digits{{ $key }}" name="digits[]" value="{{ $value->digits }}" placeholder="No of Digits"></td>
              <td><i class="fa fa-eye preview" id="{{ $key }}" aria-hidden="true"></i></td>
            </tr>
            @endforeach
         
        </tbody>

      </table>
     <label style="font-weight: 700;">Reset Voucher Number on all</label>
        <div class="col-md-4">
          <label>Calender Year</label>
          @if($value->value == '1')
          <input type="radio" value="1" name="radio" checked="">
          @else
          <input type="radio" value="1" name="radio">
          @endif
        </div>
        <div class="col-md-4">
          <label>Financial Year</label>
          @if($value->value == '2')
          <input type="radio" value="2" name="radio" checked="">
          @else
          <input type="radio" value="2" name="radio">
          @endif
        </div>
        <div class="col-md-4">
          <label>None</label>
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          @if($value->value == '3')
          <input type="radio" value="3" name="radio" checked="">
          @else
          <input type="radio" value="3" name="radio">
          @endif
        </div>
      <center>
      <div class="col-md-12">

        <input type="submit" class="btn btn-success save" name="none" value="submit">

      </div>
      </center>
      </form>

      

    </div>
    <script type="text/javascript">
      
      $( document ).ready(function() {
        var bootstrapButton = $.fn.button.noConflict()
        $.fn.bootstrapBtn = bootstrapButton;
      });

      $(document).on('click','.preview',function(){
        var val = $(this).attr('id');

        var prefix =$('.prefix'+val).val();  
        var suffix = $('.suffix'+val).val(); 
        var starting = $('.starting'+val).val(); 
        var digits = $('.digits'+val).val(); 


        if (starting == '') 
        {
          var starting = 1;

          var length = starting.toString().length;
          if (length >= digits) 
          {

            function pad (str, max) {
            str = str.toString();
            return str.length >= max ? str: '';
          }

          var preview = pad( starting, digits);

          }
          else
          {

            function pad (str, max) {
            str = str.toString();
            return str.length < max ? pad("0" + str, max) : str;
          }

          var preview = pad("0" + starting, digits);

          }

          $('.voucher_no').val(prefix+preview+suffix);
        }
        else
        {
          var length = starting.toString().length;
          if (length >= digits) 
          {

            function pad (str, max) {
            str = str.toString();
            return str.length >= max ? str: '';
          }

          var preview = pad( starting, digits);

          }
          else
          {

            function pad (str, max) {
            str = str.toString();
            return str.length < max ? pad("0" + str, max) : str;
          }

          var preview = pad("0" + starting, digits);

          }

          var voucher = prefix+preview+suffix;
          $('.voucher_no').val(voucher);
        }

        $('#cat').show();
        
        $('#cat').dialog().prev(".ui-dialog-titlebar").css("background","#28a745").prev(".ui-dialog.ui-widget-content");

      });
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" rel="stylesheet"/>
    <script src="jquery.ui.position.js"></script>

    <style type="text/css">
    .ui-dialog.ui-widget-content { background: #a3d072; }
    </style>
    <!-- card body end@ -->
  </div>
</div>
@endsection