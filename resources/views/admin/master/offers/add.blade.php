@extends('admin.layout.app')

<?php
  
  /**
  *
  * Get times as option-list.
  *
  * @return string List of times
  */
  function get_times ($default = '00:00', $interval = '+30 minutes') {
    $output = '';

    $current = strtotime('00:00');
    $end = strtotime('23:59');

    while ($current <= $end) {
      $time = date('H:i', $current);
      $sel = ($time == $default) ? ' selected' : '';

      $output .= "<option value=\"{$time}\"{$sel}>" . date('h.i A', $current) .'</option>';
      $current = strtotime($interval, $current);
    }

    return $output;
  }

?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker3.css" type="text/css" />
@section('content')
<main class="page-content">

<div class="col-12 body-sec">
  <div class="card container px-0">
    <!-- card header start@ -->
    <div class="card-header px-2">
      <div class="row">
        <div class="col-4">
          <h3>Create new Offers</h3>
        </div>
        <div class="col-8 mr-auto">
          <ul class="h-right-btn mb-0 pl-0">
            <li><button type="button" class="btn btn-success"><a href="{{url('master/offers')}}">Back</a></button></li>
          </ul>
        </div>
      </div>
    </div>
    <!-- card header end@ -->
    <div class="card-body">
    
      <form  method="post" class="form-horizontal needs-validation" novalidate action="{{url('master/offers/store')}}" enctype="multipart/form-data">
      {{csrf_field()}}

        <div class="form-row">

          <div class="col-md-6">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Offer Name<span class="mandatory">*</span></label>
              <div class="col-sm-8">
                <input type="text" class="form-control name only_allow_alp_num_dot_com_amp caps" placeholder="Offer Name" name="name" value="{{old('name')}}" required>
                <span class="mandatory"> {{ $errors->first('name')  }} </span>
                <div class="invalid-feedback">
                  Enter valid Offer Name
                </div>
              </div>
            </div>
          </div>
       
          <div class="col-md-6">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Choose Category<span class="mandatory">*</span></label>
              <div class="col-sm-8">
                <select class="js-example-basic-multiple form-control col-12 custom-select parent_id" name="parent_id" required>
                  <option value="">Choose Category</option>
                  <option value="0" {{ old('parent_id') == "0" ? 'selected' : '' }} >Parent</option>
                  @foreach($category as $value)
                  <option value="{{ $value->id }}" {{ old('parent_id') == $value->id ? 'selected' : '' }}>{{ $value->name }}</option>
                  @endforeach
                </select>
                <span class="mandatory"> {{ $errors->first('parent_id')  }} </span>
                <div class="invalid-feedback">
                  Please select a valid Category
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Choose offer type<span class="mandatory">*</span></label>
              <div class="col-sm-8">
                <select id="offer_type" class="s-example-basic-multiple form-control col-12 custom-select parent_id" name="offer_type" required>
                  <option value="">Choose an Offer type</option>
                  @foreach ($offer_types as $value)                    
                    <option value="{{$value}}" selected="">{{$value}}</option>
                  @endforeach
                </select>
                <span class="mandatory"> {{ $errors->first('name')  }} </span>
                <div class="invalid-feedback">
                  Please select a valid Offer type
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-6" id="date_ranges">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Select Offer date<span class="mandatory">*</span></label>
              <div class="col-sm-8">
                <div class="input-group input-daterange from_to">
                  <input type="text" class="form-control from_date" placeholder="dd-mm-yyyy" name="valid_from" value="{{old('valid_from')}}" required>
                    <div class="input-group-addon">&nbsp;&nbsp;to&nbsp;&nbsp;</div>
                  <input type="text" class="form-control to_date" placeholder="dd-mm-yyyy" name="valid_to" value="{{old('valid_to')}}" required>
                  <span class="mandatory"> {{ $errors->first('valid_from')  }} </span>
                  <div class="invalid-feedback">
                    Please select a valid date range
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Select variable type <span class="mandatory">*</span></label>
              <div class="col-sm-8">
                <select id="f_and_c" class="s-example-basic-multiple form-control col-12 custom-select parent_id" name="variable" required>
                  <option value="0">Choose an Offer variable</option>
                  <option value="fixed">Fixed</option>
                  <option value="percentage">Percentage</option>
                </select>
                <span class="mandatory"> {{ $errors->first('value')  }} </span>
                <div class="invalid-feedback">
                  Please choose a valid Offer variable
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-6" id="time_ranges">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Select Offer time<span class="mandatory">*</span></label>
              <div class="col-sm-8">
                <div class="input-group input-daterange from_to">
                  <select name="from_time" id="from_time" class="s-example-basic-multiple form-control col-12 custom-select parent_id" required><?php echo get_times(); ?></select>
                    <div class="input-group-addon">&nbsp;&nbsp;to&nbsp;&nbsp;</div>
                  <select name="to_time" id="to_time" class="s-example-basic-multiple form-control col-12 custom-select parent_id" required><?php echo get_times(); ?></select required>
                  <span class="mandatory"> {{ $errors->first('valid_from')  }} </span>
                  <div class="invalid-feedback">
                    Please select a valid date range
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Enter variable value<span class="mandatory">*</span></label>
              <div class="input-group col-sm-8">                
                <input type="text" class="value_custom form-control only_allow_digit_and_dot value" placeholder="Variable value" name="value" value="{{old('value')}}" required>
                <div class="input-group-append">
                  <span class="input-group-text" id="basic-addon1" style="height: 32px;">%</span>
                </div>
                <span class="mandatory"> {{ $errors->first('value')  }} </span>
                <div class="invalid-feedback">
                  Enter a valid variable value
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Comments</label>
              <div class="col-sm-8">
                <input type="text" class="form-control  remark" placeholder="Remark" name="comments" value="{{old('remark')}}">
                <span class="mandatory"> {{ $errors->first('remark')  }} </span>
                <div class="invalid-feedback">
                  Enter valid Bank Code
                </div>
              </div>
            </div>
          </div>
          
        </div>
        <div class="col-md-7 text-right">
          <button class="btn btn-success" name="add" type="submit">Submit</button>
        </div>
      </form>
    </div>
    <script src="{{asset('assets/js/master/capitalize.js')}}"></script>
    <!-- card body end@ -->
  </div>
</div>
<script>
  $(document).ready(function () {

    var date1 = new Date();

    $('.from_to input').each(function() {
      $(this).datepicker({
        format: 'dd-mm-yyyy',
        todayHighlight: true,
        autoclose: true, 
        startDate: date1,
        endDate: '',
        setDate: date1
      }).on('changeDate', function (selected) {
          var startDate = new Date(selected.date.valueOf());
          $('.to_date').datepicker('setStartDate', startDate);
        }).on('clearDate', function (selected) {
          $('.to_date').datepicker('setStartDate', null);
        });
    });

    $('#offer_type').on('change', function() {
      const selectedValue = this.value;
      if (selectedValue == "day" || selectedValue == "date") {
        $("#time_ranges").hide();
      } else {
        $("#time_ranges").show();
      }
    });

    $('#f_and_c').on('change', function() {
      const fixed_and_c = this.value;
      if (fixed_and_c == "fixed") {
        $("input").removeClass("only_allow_digit_and_dot");
        $("input").addClass("only_allow_digit");
        $('span#basic-addon1').html('&#8377;');
      } else if(fixed_and_c == "percentage") {
        $("input").removeClass("only_allow_digit");
        $("input").addClass("only_allow_digit_and_dot");
        $('span#basic-addon1').text('%');
      }
    });

  });
</script>
@endsection

