@extends('admin.layout.app')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker3.css" type="text/css" />
@section('content')
<main class="page-content">

<div class="col-12 body-sec">
  <div class="card container px-0">
    <!-- card header start@ -->
    <div class="card-header px-2">
      <div class="row">
        <div class="col-4">
          <h3>Add Itemwise Offers</h3>
        </div>
        <div class="col-8 mr-auto">
          <ul class="h-right-btn mb-0 pl-0">
            <li><button type="button" class="btn btn-success"><a href="{{url('master/itemwiseoffer')}}">Back</a></button></li>
          </ul>
        </div>
      </div>
    </div>
    <!-- card header end@ -->
    <div class="card-body">
    
      <form  method="post" class="form-horizontal needs-validation" novalidate action="{{url('master/itemwiseoffer/store')}}" enctype="multipart/form-data">
      {{csrf_field()}}

        <div class="form-row">
       
          <div class="col-md-6">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Offer Name <span class="mandatory">*</span></label>
              <div class="col-sm-8">
                <input type="text" class="form-control offer_name only_allow_alp_num_dot_com_amp caps" placeholder="Offer Name" name="offer_name" value="{{old('offer_name')}}" required>
                <span class="mandatory"> {{ $errors->first('offer_name')  }} </span>
                <div class="invalid-feedback">
                  Enter valid Gift Voucher Name
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Offer Code <span class="mandatory">*</span></label>
              <div class="col-sm-8">
                <input type="text" class="form-control only_allow_alp_num_dot_com_amp code" placeholder="Offer Code" name="code" value="{{old('code')}}" required>
                <span class="mandatory"> {{ $errors->first('name')  }} </span>
                <div class="invalid-feedback">
                  Enter valid Gift Voucher Prefix Code
                </div>
              </div>
            </div>
          </div>

         

          <div class="col-md-6">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Valid From Date <span class="mandatory">*</span></label>
              <div class="col-sm-8">
                <input type="text" class="form-control from_date" placeholder="dd-mm-yyyy" name="valid_from" value="{{old('valid_from')}}" required>
                <span class="mandatory"> {{ $errors->first('valid_from')  }} </span>
                <div class="invalid-feedback">
                  Enter valid From Date
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Valid To Date <span class="mandatory">*</span></label>
              <div class="col-sm-8">
                <input type="text" class="form-control to_date" placeholder="dd-mm-yyyy" name="valid_to" value="{{old('valid_to')}}" required>
                <span class="mandatory"> {{ $errors->first('valid_to')  }} </span>
                <div class="invalid-feedback">
                  Enter valid To Date
                </div>
              </div>
            </div>
          </div>
		  
		    <div class="col-md-8">
                       <div class="form-group row">
                       <div class="col-md-4">
                       <label for="validationCustom01" class=" col-form-label"><h4>Buy:</h4> </label><br>
                       
                           
                       </div>
                         </div>
              </div>
		  
		   <div class="col-md-6">
            <div class="form-group row">
			<label for="validationCustom01" class="col-sm-4 col-form-label">Item Name <span class="mandatory">*</span></label>
              <div class="col-sm-8">
             <select class="js-example-basic-multiple form-control custom-select buy_item_id" placeholder="Choose District" name="buy_item_id" required>
                  <option value="">Choose Item</option>
                  @foreach($items as $value)
                  @if (old('buy_item_id') == $value->id)
                  <option value="{{ $value->id }}" selected>{{ $value->name }}</option>
                  @else
                  <option value="{{ $value->id }}">{{ $value->name }}</option>
                  @endif
                  @endforeach
                </select>
                <span class="mandatory"> {{ $errors->first('buy_item_id')  }} </span>
                <div class="invalid-feedback">
                  Enter valid District
                </div>
            </div>
          </div>
          </div>

          <div class="col-md-6">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Quantity<span class="mandatory">*</span></label>
              <div class="col-sm-8">
                <input type="text" class="form-control only_allow_digit value" placeholder="Quantity" name="buy_item_quantity" value="{{old('buy_item_quantity')}}" required>
                <span class="mandatory"> {{ $errors->first('value')  }} </span>
                <div class="invalid-feedback">
                  Enter valid Gift Voucher Quantity
                </div>
              </div>
            </div>
          </div>
		  
		    <div class="col-md-8">
                       <div class="form-group row">
                       <div class="col-md-4">
                       <label for="validationCustom01" class=" col-form-label"><h4>Get:</h4> </label><br>
                       
                           
                       </div>
                         </div>
              </div>
		  
		  <div class="col-md-6">
            <div class="form-group row">
			<label for="validationCustom01" class="col-sm-4 col-form-label">Item Name <span class="mandatory">*</span></label>
              <div class="col-sm-8">
             <select class="js-example-basic-multiple form-control custom-select get_item_id" placeholder="Choose District" name="get_item_id" required>
                  <option value="">Choose Item</option>
                  @foreach($items as $value)
                  @if (old('get_item_id') == $value->id)
                  <option value="{{ $value->id }}" selected>{{ $value->name }}</option>
                  @else
                  <option value="{{ $value->id }}">{{ $value->name }}</option>
                  @endif
                  @endforeach
                </select>
                <span class="mandatory"> {{ $errors->first('get_item_id')  }} </span>
                <div class="invalid-feedback">
                  Enter valid District
                </div>
            </div>
          </div>
          </div>

          <div class="col-md-6">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Quantity<span class="mandatory">*</span></label>
              <div class="col-sm-8">
                <input type="text" class="form-control only_allow_digit value" placeholder="Quantity" name="get_item_quantity" value="{{old('get_item_quantity')}}" required>
                <span class="mandatory"> {{ $errors->first('value')  }} </span>
                <div class="invalid-feedback">
                  Enter valid Gift Voucher Quantity
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Remark </label>
              <div class="col-sm-8">
                <input type="text" class="form-control  remark" placeholder="Remark" name="remark" value="{{old('remark')}}">
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
        $(".from_date").datepicker({
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
        $(".to_date").datepicker({
          format: 'dd-mm-yyyy', 
          todayHighlight: true,
          autoclose: true,
          endDate: '',
          startDate: date1,
          setDate: date1, 
          }).on('changeDate', function (selected) {
            var endDate = new Date(selected.date.valueOf());
            $('.from_date').datepicker('setEndDate', endDate);
        }).on('clearDate', function (selected) {
            $('.from_date').datepicker('setEndDate', null);
        });


    });
</script>
@endsection

