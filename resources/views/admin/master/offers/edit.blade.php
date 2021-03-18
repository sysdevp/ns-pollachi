@extends('admin.layout.app')
@section('content')
<?php
use App\Mandatoryfields;
?>
<main class="page-content">

<?php
  
  /**
  *
  * Get times as option-list.
  *
  * @return string List of times
  */
  function get_times ($default = '19:00', $interval = '+30 minutes') {
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

<div class="col-12 body-sec">
  <div class="card container px-0">
    <!-- card header start@ -->
    <div class="card-header px-2">
      <div class="row">
        <div class="col-4">
          <h3>Edit Gift Voucher </h3>
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
    
      <form  method="post" class="form-horizontal needs-validation" novalidate action="{{url('master/offers/update/'.$offers->id)}}" enctype="multipart/form-data">
      {{csrf_field()}}

      <div class="form-row">

        <div class="col-md-6">
          <div class="form-group row">
            <label for="validationCustom01" class="col-sm-4 col-form-label">Offer Name<?php echo Mandatoryfields::mandatory('offer_name');?></label>
            <div class="col-sm-8">
              <input type="text" class="form-control name only_allow_alp_num_dot_com_amp caps" placeholder="Offer Name" name="name" value="{{old('name',$offers->offer_name)}}" <?php echo Mandatoryfields::validation('offer_name');?> tabindex="1" autofocus>
              <span class="mandatory"> {{ $errors->first('name')  }} </span>
              <div class="invalid-feedback">
                Enter valid Offer Name
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group row">
            <label for="validationCustom01" class="col-sm-4 col-form-label">Choose Category<?php echo Mandatoryfields::mandatory('offer_categoryid');?></label>
            <div class="col-sm-8">
              <select class="js-example-basic-multiple form-control col-12 custom-select parent_id" name="parent_id" <?php echo Mandatoryfields::validation('offer_categoryid');?> tabindex="2">
                <option value="">Choose Category</option>
                <option value="0" {{ old('parent_id',$offers->offers_category_id) == "0" ? 'selected' : '' }} >Parent</option>
                @foreach($category as $value)
                  <option value="{{ $value->id }}" {{ old('parent_id',$offers->offers_category_id) == $value->id ? 'selected' : '' }}>{{ $value->name }}</option>
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
            <label for="validationCustom01" class="col-sm-4 col-form-label">Choose offer type<?php echo Mandatoryfields::mandatory('offer_offertype');?></label>
            <div class="col-sm-8">
              <select id="offer_type" class="s-example-basic-multiple form-control col-12 custom-select parent_id" name="offer_type" <?php echo Mandatoryfields::validation('offer_offertype');?> tabindex="3">
                <option value="">Choose an Offer type</option>
                @foreach ($offer_types as $value)
                  <option value="{{ $value }}" {{ old('value',$offers->offer_type) == $value ? 'selected' : '' }}>{{ $value }}</option>
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
            <label for="validationCustom01" class="col-sm-4 col-form-label">Select Offer date<?php echo Mandatoryfields::mandatory('offer_validfrom');?></label>
            <div class="col-sm-8">
              @php
                  $valid_from = $offers->valid_from !="" ? date('d-m-Y',strtotime($offers->valid_from)) : "";
                  $valid_to = $offers->valid_to !="" ? date('d-m-Y',strtotime($offers->valid_to)) : "";
              @endphp
              <div class="input-group input-daterange from_to">
                <input type="text" class="form-control from_date" placeholder="dd-mm-yyyy" name="valid_from" value="{{old('valid_from',$valid_from)}}" <?php echo Mandatoryfields::validation('offer_validfrom');?> tabindex="4">
                  <div class="input-group-addon">&nbsp;&nbsp;to&nbsp;&nbsp;</div>
                <input type="text" class="form-control to_date" placeholder="dd-mm-yyyy" name="valid_to" value="{{old('valid_to',$valid_to)}}" required tabindex="5">
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
              <label for="validationCustom01" class="col-sm-4 col-form-label">Select variable type <?php echo Mandatoryfields::mandatory('offer_variable');?></label>
              <div class="col-sm-8">
                <select id="f_and_c" class="s-example-basic-multiple form-control col-12 custom-select parent_id" name="variable" <?php echo Mandatoryfields::validation('offer_variable');?> tabindex="6">
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
              <label for="validationCustom01" class="col-sm-4 col-form-label">Select Offer time<?php echo Mandatoryfields::mandatory('offer_fromtime');?></label>
              <div class="col-sm-8">
                @php
                    $valid_from = $offers->valid_from !="" ? date('h:i a',strtotime($offers->valid_from)) : "";
                    $valid_to = $offers->valid_to !="" ? date('h:i a',strtotime($offers->valid_to)) : "";
                @endphp
                <div class="input-group input-daterange from_to">
                  <select name="from_time" id="from_time" class="s-example-basic-multiple form-control col-12 custom-select parent_id" <?php echo Mandatoryfields::validation('offer_fromtime');?> tabindex="7">
                    <?php echo get_times(); ?>
                    </select>
                    <div class="input-group-addon">&nbsp;&nbsp;to&nbsp;&nbsp;</div>
                  <select name="to_time" id="to_time" class="s-example-basic-multiple form-control col-12 custom-select parent_id" required><?php echo get_times(); ?></select required tabindex="8">
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
              <label for="validationCustom01" class="col-sm-4 col-form-label">Enter variable value<?php echo Mandatoryfields::mandatory('offer_value');?></label>
              <div class="input-group col-sm-8">
                <?php
                  if ($offers->percentage == "") {
                ?>
                <input type="text" class="value_custom form-control only_allow_digit_and_dot value" placeholder="Variable value" name="value" value="{{old('value', $offers->fixed_amount)}}" <?php echo Mandatoryfields::validation('offer_value');?> tabindex="9">
                <div class="input-group-append">
                  <span class="input-group-text" id="basic-addon1" style="height: 32px;">&#8377;</span>
                </div>
                <?php
                } else {
                ?>
                <input type="text" class="value_custom form-control only_allow_digit_and_dot value" placeholder="Variable value" name="value" value="{{old('value', $offers->percentage)}}" <?php echo Mandatoryfields::validation('offer_value');?> tabindex="10">
                <div class="input-group-append">
                  <span class="input-group-text" id="basic-addon1" style="height: 32px;">%</span>
                </div>
                <?php } ?>
                
                <span class="mandatory"> {{ $errors->first('value')  }} </span>
                <div class="invalid-feedback">
                  Enter a valid variable value
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Comments<?php echo Mandatoryfields::mandatory('offer_comments');?></label>
              <div class="col-sm-8">
                <input type="text" class="form-control  remark" placeholder="Remark" name="comments" value="{{old('comments', $offers->comments)}}" <?php echo Mandatoryfields::validation('offer_comments');?> tabindex="11">
                <span class="mandatory"> {{ $errors->first('remark')  }} </span>
                <div class="invalid-feedback">
                  Enter valid Comments
                </div>
              </div>
            </div>
          </div>
        
      </div>
        <div class="col-md-7 text-right">
          <button class="btn btn-success" type="submit" tabindex="12">Submit</button>
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
    let selectedName = $("select#offer_type option:selected").text();

    if (selectedName != "time") {
      $("#time_ranges").hide();
    } else {
      $("#time_ranges").show();
    }

    $('#offer_type').on('change', function() {
      const selectedValue = this.value;
      if (selectedValue == "day" || selectedValue == "date") {
        $("#time_ranges").hide();
      } else {
        $("#time_ranges").show();
      }
    });
    

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

  });
</script>
@endsection