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
          <h3>Add Production</h3>
        </div>
        <div class="col-8 mr-auto">
          <ul class="h-right-btn mb-0 pl-0">
            <li><button type="button" class="btn btn-success"><a href="{{url('production')}}">Back</a></button></li>
          </ul>
        </div>
      </div>
    </div>
    <!-- card header end@ -->
    <div class="card-body">
    
      <form  method="post" class="form-horizontal needs-validation" novalidate action="{{url('production/store')}}" enctype="multipart/form-data">
      {{csrf_field()}}

        <div class="form-row">
       
         <div class="col-md-6">
            <div class="form-group row">
			<label for="validationCustom01" class="col-sm-4 col-form-label">Production Location <span class="mandatory">*</span></label>
              <div class="col-sm-8">
             <select class="js-example-basic-multiple form-control custom-select location" placeholder="" name="location_id" required>
                  <option value="">Choose location</option>
                  @foreach($locations as $value)
                  @if (old('location_id') == $value->id)
                  <option value="{{ $value->id }}" selected>{{ $value->name }}</option>
                  @else
                  <option value="{{ $value->id }}">{{ $value->name }}</option>
                  @endif
                  @endforeach
                </select>
                <span class="mandatory"> {{ $errors->first('location_id')  }} </span>
                <div class="invalid-feedback">
                  Enter valid District
                </div>
            </div>
          </div>
          </div>

         
          <div class="col-md-6">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">Production Date <span class="mandatory">*</span></label>
              <div class="col-sm-8">
                <input type="text" class="form-control to_date" placeholder="dd-mm-yyyy" name="entry_date" value="{{old('valid_to')}}" required>
                <span class="mandatory"> {{ $errors->first('valid_to')  }} </span>
                <div class="invalid-feedback">
                  Enter valid To Date
                </div>
              </div>
            </div>
          </div>
		  
		  
		   <div class="col-md-6">
            <div class="form-group row">
			<label for="validationCustom01" class="col-sm-4 col-form-label">Production Item Name <span class="mandatory">*</span></label>
              <div class="col-sm-8">
             <select class="js-example-basic-multiple form-control custom-select wastage_item_id" placeholder="Choose District" id="item_id" name="item_id" required>
                  <option value="">Choose Item</option>
                  @foreach($items as $value)
                  @if (old('wastage_item_id') == $value->id)
                  <option value="{{ $value->id }}" selected>{{ $value->name }}</option>
                  @else
                  <option value="{{ $value->id }}">{{ $value->name }}</option>
                  @endif
                  @endforeach
                </select>
                <span class="mandatory"> {{ $errors->first('wastage_item_id')  }} </span>
                <div class="invalid-feedback">
                  Enter valid District
                </div>
            </div>
          </div>
          </div>

          <div class="col-md-4">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-6 col-form-label">Production Quantity<span class="mandatory">*</span></label>
              <div class="col-sm-6">
                <input type="text" class="form-control only_allow_digit value" placeholder="Quantity" name="quantity" value="{{old('buy_item_quantity')}}" required>
                <span class="mandatory"> {{ $errors->first('value')  }} </span>
                <div class="invalid-feedback">
                  Enter valid Gift Voucher Quantity
                </div>
              </div>
			  </div>
			  </div>
			  
			   <div class="col-sm-2">
             <select class="js-example-basic-multiple form-control custom-select wastage_item_id" placeholder="Choose District" name="uom_id" required>
                  <option value="">Choose UOM</option>
                  @foreach($uoms as $value)
                  @if (old('uom_id') == $value->id)
                  <option value="{{ $value->id }}" selected>{{ $value->name }}</option>
                  @else
                  <option value="{{ $value->id }}">{{ $value->name }}</option>
                  @endif
                  @endforeach
                </select>
                <span class="mandatory"> {{ $errors->first('uom_id')  }} </span>
                <div class="invalid-feedback">
                  Enter valid District
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
          
          @foreach($account_group as $value)
          <div class="col-md-6 hide" id="id_{{$value->id}}" >
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label">{{$value->name}} </label>
              <div class="col-sm-8">
              <input type="number" class="form-control  remark" placeholder="Amount" name="amount[]" value="" >
              <input type="hidden" class="form-control  remark" placeholder="Amount" name="account_group_id[]" value="{{$value->id}}" >
              
                <span class="mandatory"> {{ $errors->first('remark')  }} </span>
                <div class="invalid-feedback">
                  Enter valid Bank Code
                </div>
              </div>
            </div>
          </div>
          @endforeach

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
$("#item_id").change(function(){
  var item_id = $(this).val();
  // alert(item_id);
  $.ajax({
           type: "POST",
            url: "{{ url('production/account_group/') }}",
            data: { item_id: item_id},
           success: function(data) {
             if(data!="")
             {
            var count = data.length;
            var split = data.split(',');
            for($i=0;$i<count;$i++)
            {
              $('#id_'+split[$i]).show();
            }
          }
          else
          {
            $('.hide').hide();
          }

            // $('#id_'+data).hide();  
            // alert(data);
             
           },
           error: function (error) {
            $('.hide').hide();
    }

        });

});

    $(document).ready(function () {
      $('.hide').hide();
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

