@extends('admin.layout.app')
@section('content')
<main class="page-content">
@if(!empty($successMsg))
  <div class="alert alert-success"> {{ $successMsg }}</div>
@endif

<div class="col-12 body-sec">
  <div class="card">
    <!-- card header start@ -->
    <div class="card-header px-2">
      <div class="row">
        <div class="col-4">
          <h3>Add Multiple Parent Items</h3>
        </div>
        <div class="col-8 mr-auto">
        </div>
      </div>
    </div>
    <!-- card header end@ -->
    <div class="card-body">
    <form  method="post" class="form-horizontal needs-validation" action="{{url('master/item/parent-item-store')}}" enctype="multipart/form-data">
      {{csrf_field()}}

      <!-- <input type="text" class="form-control numberings" readonly="" name="numberings"> -->

      <div class="cat" id="cat" style="display: none;" title="Voucher Number Preview">
                        
                <div class="form-row">
                 <input type="text" class="form-control voucher_no" readonly="" name="voucher_no">           
                </div>
    
                            
      </div>
       @php
               $language_1=isset($language[0]->language_1) && !empty($language[0]->language_1) ? $language[0]->language_1 : "Language 1 " ;
               $language_2=isset($language[0]->language_2) && !empty($language[0]->language_2) ? $language[0]->language_2 : "Language 2 " ;
               $language_3=isset($language[0]->language_3) && !empty($language[0]->language_3) ? $language[0]->language_3 : "Language 3 " ;
               @endphp
      <table id="voucher" class="table table-bordered table-hover">
        <thead>
          <tr>
            <th>Item Name</th>
            <th>Item Code</th>
            <th>Brand </th>
            <th>Category </th>
            <th>Child </th>
            <th>No Of Units </th>
            <th>Weight In Grams </th>
            <th>Print Name in English  </th>
            <th>Print Name in {{$language_1}} </th>
            <th>Print Name in {{$language_2}} </th>
            <th>Print Name in {{$language_3}} </th>
            <th>Hsn Code </th>
            <th>MRP </th>
            <th>Default Selling Price </th>
            <th>UOM </th>
            <th>Supplier </th>
            <th>Location </th>
            <th>Batch No </th>
            <th>Opening Quantity </th>
            <th>Applicable Date </th>
            @foreach($tax as $key => $value)
            <th class="text-center">{{$value->name}} (%) </th>
            @endforeach
            <th>Valid From </th>
            <th>Barcode </th>
            <th>Action </th>
          </tr>
        </thead>
        <tbody id="test1" class="append_row">
            <tr>
              <td><input type="text" class="form-control name only_allow_alp_num_dot_com_amp caps" placeholder="Item Name" name="name[]" value=""></td>
              <td><input type="text" class="form-control code only_allow_alp_num_dot_com_amp" placeholder="Item Code" name="code[]" value=""></td>
              <td><select class="js-example-basic-multiple col-12 form-control custom-select brand_id" name="brand_id[]">
                           <option value="">Choose Brand</option>
                           <option value="0" {{ old('brand_id') == "0" ? 'selected' : '' }}> Not Applicable </option>
                           @foreach ($brand as $value)
                           <option value="{{ $value->id }}" {{ old('brand_id') == $value->id ? 'selected' : '' }}  >{{ $value->name }}</option>
                           @endforeach
                        </select></td>
              <td><select class="js-example-basic-multiple col-12 form-control custom-select category_id" name="category_id[]">
                           <option value="">Choose Category</option>
                           @foreach ($category as $value)
                           <option value="{{ $value->id }}" {{ old('category_id') == $value->id ? 'selected' : '' }}  >{{ $value->name }}</option>
                           @endforeach
                        </select></td>
                        <td><select class="js-example-basic-multiple col-12 form-control custom-select child_item_id" name="child_item_id[]">
                           <option value="">Choose Child</option>
                           @foreach ($items as $value)
                           <option value="{{ $value->id }}" {{ old('child_item_id') == $value->id ? 'selected' : '' }}  >{{ $value->name }}</option>
                           @endforeach
                        </select></td>
                        <td><input type="text" class="form-control child_unit only_allow_digit_and_dot" placeholder="Units" name="child_unit[]" value="" ></td>
                        <td><input type="text" class="form-control weight_in_grams only_allow_digit_and_dot" placeholder="Weight In Grams " name="weight_in_grams[]" value=""></td>

                        <td><input type="text" class="form-control print_name_in_english only_allow_alp_num_dot_com_amp" placeholder="Print Name in English " name="print_name_in_english[]" value=""></td>
                        <td><input type="text" class="form-control print_name_in_language_1 only_allow_alp_num_dot_com_amp" placeholder="Print Name in {{ $language_1 }}" name="print_name_in_language_1[]" value=""></td>
                        <td><input type="text" class="form-control print_name_in_language_2 only_allow_alp_num_dot_com_amp" placeholder="Print Name in {{ $language_2 }}" name="print_name_in_language_2[]" value=""></td>
                        <td><input type="text" class="form-control print_name_in_language_3 only_allow_alp_num_dot_com_amp" placeholder="Print Name in {{ $language_3 }}" name="print_name_in_language_3[]" value=""></td>
                        <td><input type="text" class="form-control hsn only_allow_alp_num_dot_com_amp" placeholder="Hsn Code" name="hsn[]" value=""></td>
                        <td><input type="text" class="form-control only_allow_digit_and_dot mrp only_allow_alp_num_dot_com_amp" placeholder="MRP" name="mrp[]" value=""></td>
                        <td><input type="text" class="form-control only_allow_digit_and_dot default_selling_price only_allow_alp_num_dot_com_amp" placeholder="Default Selling Price" name="default_selling_price[]" value=""></td>
                        <td><select class="js-example-basic-multiple col-12 form-control custom-select uom_id" name="uom_id[]">
                           <option value="">Choose UOM</option>
                           @foreach ($uom as $value)
                           <option value="" {{ old('uom_id') == $value->id ? 'selected' : '' }}  >{{ $value->name }}</option>
                           @endforeach
                        </select></td>
                        <td><select class="js-example-basic-multiple col-12 form-control custom-select supplier_id" name="supplier_id[]" >
                           <option value="">Choose Supplier</option>
                           @foreach ($supplier as $value)
                           <option value="{{ $value->id }}" {{ old('supplier_id') == $value->id ? 'selected' : '' }}  >{{ $value->name }}</option>
                           @endforeach
                        </select></td>
                        <td><select class="js-example-basic-multiple col-12 form-control custom-select location" name="location[]" id="location" data-select2-id="location" tabindex="-1" aria-hidden="true">
                           <option value="" data-select2-id="6">Choose Location</option>
                           @foreach($location as $key => $value)
                           <option value="{{$value->id}}">{{$value->name}}</option>
                           @endforeach
                        </select></td>
                        <td><input type="text" placeholder="Batch No" required="" name="batch_no[]" class="form-control batch_no mandatory" ></td>
                        <td><input type="number" id="quantity" placeholder="Opening Quantity" name="quantity[]" value="0" class="form-control quantity" ></td>
                        <td><input type="date" name="applicable_date[]" value="{{ $date }}" class="form-control applicable_date" ></td>
                        @foreach($tax as $key => $value)
                        <td>
                           <input type="text" class="form-control {{ $value->name }}_id only_allow_digit_and_dot common" name="{{ $value->name }}_id[]"  placeholder="{{$value->name}}" id="{{ $value->name }}_id{{ $key }}" value="0" required>
                            <input type="hidden" name="{{$value->name}}[]" id="{{$value->name}}[]" value="{{ $value->id }}">
                        </td>
                        @endforeach
                        <td>
                              <input type="text" class="form-control valid_from" name="valid_from[]" placeholder="dd-mm-yyyy" value="" required>
                        </td>
                        <td><input type="text" class="form-control barcode" name="barcode[]"  placeholder="Barcode" id="barcode0" value="" required></td>
                        <td>
                           <div class="form-group row">
                              <div class="col-sm-3 mr-1">
                                 <label class="btn btn-success add_multiple_items">+</label>
                              </div>
                              <div class="col-sm-3 mx-2">
                                 <!-- <label class="btn btn-danger remove_multiple_items">-</label> -->
                              </div>
                           </div>
                        </td>

            </tr>
         
        </tbody>

      </table>

      </center>
      <center>
      <div class="col-md-12">
         
         <input type="submit" name="" class="btn btn-success" value="Submit"> 

      </div>
      </center>
      </form>

      

    </div>
    <script src="{{asset('assets/js/master/add_more_barcode_details.js')}}"></script>
    <script src="{{asset('assets/js/master/capitalize.js')}}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script type="text/javascript">

      setTimeout(function() {
    $('.alert').fadeOut('fast');
    }, 2000); // <-- time in milliseconds
        
      $(document).on('click','.add_multiple_items',function(){

        var items = '<tr><td><input type="text" class="form-control name only_allow_alp_num_dot_com_amp caps" placeholder="Item Name" name="name[]" value=""></td>\
              <td><input type="text" class="form-control code only_allow_alp_num_dot_com_amp" placeholder="Item Code" name="code[]" value=""></td>\
              <td><select class="js-example-basic-multiple col-12 form-control custom-select brand_id" name="brand_id[]">\
                           <option value="">Choose Brand</option>\
                           <option value="0" {{ old('brand_id') == "0" ? 'selected' : '' }}> Not Applicable </option>\
                           @foreach ($brand as $value)\
                           <option value="{{ $value->id }}" {{ old('brand_id') == $value->id ? 'selected' : '' }}  >{{ $value->name }}</option>\
                           @endforeach\
                        </select></td>\
              <td><select class="js-example-basic-multiple col-12 form-control custom-select category_id" name="category_id[]">\
                           <option value="">Choose Category</option>\
                           @foreach ($category as $value)\
                           <option value="{{ $value->id }}" {{ old('category_id') == $value->id ? 'selected' : '' }}  >{{ $value->name }}</option>\
                           @endforeach\
                        </select></td>\
                        <td><select class="js-example-basic-multiple col-12 form-control custom-select child_item_id" name="child_item_id[]">\
                           <option value="">Choose Child</option>\
                           @foreach ($items as $value)\
                           <option value="{{ $value->id }}" {{ old('child_item_id') == $value->id ? 'selected' : '' }}  >{{ $value->name }}</option>\
                           @endforeach\
                        </select></td>\
                        <td><input type="text" class="form-control child_unit only_allow_digit_and_dot" placeholder="Units" name="child_unit[]" value="" ></td>\
              <td><input type="text" class="form-control weight_in_grams only_allow_digit_and_dot" placeholder="Weight In Grams " name="weight_in_grams[]" value=""></td>\
\
                        <td><input type="text" class="form-control print_name_in_english only_allow_alp_num_dot_com_amp" placeholder="Print Name in English " name="print_name_in_english[]" value=""></td>\
                        <td><input type="text" class="form-control print_name_in_language_1 only_allow_alp_num_dot_com_amp" placeholder="Print Name in {{ $language_1 }}" name="print_name_in_language_1[]" value=""></td>\
                        <td><input type="text" class="form-control print_name_in_language_2 only_allow_alp_num_dot_com_amp" placeholder="Print Name in {{ $language_2 }}" name="print_name_in_language_2[]" value=""></td>\
                        <td><input type="text" class="form-control print_name_in_language_3 only_allow_alp_num_dot_com_amp" placeholder="Print Name in {{ $language_3 }}" name="print_name_in_language_3[]" value=""></td>\
                        <td><input type="text" class="form-control hsn only_allow_alp_num_dot_com_amp" placeholder="Hsn Code" name="hsn[]" value=""></td>\
                        <td><input type="text" class="form-control only_allow_digit_and_dot mrp only_allow_alp_num_dot_com_amp" placeholder="MRP" name="mrp[]" value=""></td>\
                        <td><input type="text" class="form-control only_allow_digit_and_dot default_selling_price only_allow_alp_num_dot_com_amp" placeholder="Default Selling Price" name="default_selling_price[]" value=""></td>\
                        <td><select class="js-example-basic-multiple col-12 form-control custom-select uom_id" name="uom_id[]">\
                           <option value="">Choose UOM</option>\
                           @foreach ($uom as $value)\
                           <option value="" {{ old('uom_id') == $value->id ? 'selected' : '' }}  >{{ $value->name }}</option>\
                           @endforeach\
                        </select></td>\
                        <td><select class="js-example-basic-multiple col-12 form-control custom-select supplier_id" name="supplier_id[]" >\
                           <option value="">Choose Supplier</option>\
                           @foreach ($supplier as $value)\
                           <option value="{{ $value->id }}" {{ old('supplier_id') == $value->id ? 'selected' : '' }}  >{{ $value->name }}</option>\
                           @endforeach\
                        </select></td>\
                        <td><select class="js-example-basic-multiple col-md-12 form-control custom-select location" name="location[]" id="location" tabindex="-1" aria-hidden="true">\
                           <option value="">Choose Location</option>\
                           @foreach($location as $key => $value)\
                           <option value="{{$value->id}}">{{$value->name}}</option>\
                           @endforeach\
                        </select></td>\
                        <td><input type="text" placeholder="Batch No" required="" name="batch_no[]" class="form-control batch_no mandatory" ></td>\
                        <td><input type="number" id="quantity" placeholder="Opening Quantity" name="quantity[]" value="0" class="form-control quantity" ></td>\
                        <td><input type="date" name="applicable_date[]" value="{{ $date }}" class="form-control applicable_date" ></td>\
                        @foreach($tax as $key => $value)\
                        <td>\
                           <input type="text" class="form-control {{ $value->name }}_id only_allow_digit_and_dot common" name="{{ $value->name }}_id[]"  placeholder="{{$value->name}}" id="{{ $value->name }}_id{{ $key }}" value="0" required>\
                            <input type="hidden" name="{{$value->name}}[]" id="{{$value->name}}[]" value="{{ $value->id }}">\
                        </td>\
                        @endforeach\
                        <td>\
                              <input type="date" class="form-control valid_from" name="valid_from[]" placeholder="" value="" required>\
                        </td>\
                        <td><input type="text" class="form-control barcode" name="barcode[]"  placeholder="Barcode" id="barcode0" value="" required></td>\
                        <td>\
                           <div class="form-group row">\
                              <div class="col-sm-3 mr-1">\
                                 <label class="btn btn-success add_multiple_items">+</label>\
                              </div>\
                              <div class="col-sm-3 mx-2">\
                              </div>\
                           </div>\
                        </td></tr>';
     
      $(".append_row").append(items);


      });


  $(document).on("submit",".submit_form2",function(){
  var error_count=barcode_validation();
  if(error_count == 0){
   return true;
  }else{
    return false;
  }
});

      $(document).on('input','.hsn ',function(e){
         e.preventDefault();
        $(this).val($(this).val().replace(/[^0-9]/gi, ''));
        if($(this).val().replace(/[^0-9]/gi, '').length > 6)
        {
         return false
        }
        else
        {
          
        }

      });


var i = 0;
var j =$('#opening_cnt').val();
var cnt = 0;
function add_item_tax_details() {
   i++;
    var item_tax_dets = "";
    item_tax_dets += '<tr class="row_count">\
                        <td class="s_no">1</td>\
                        @foreach($tax as $key => $value)\
                        <td>\
                           <div class="col-sm-12">\
                              <input type="text" class="form-control {{$value->name}}_id only_allow_digit_and_dot common" name="{{$value->name}}_id[]"  placeholder="{{$value->name}}" value="0" id="{{$value->name}}_id'+i+'"  required>\
                              <input type="hidden" name="{{$value->name}}[]" id="{{$value->name}}[]" value="{{ $value->id }}">\
                              <span class="mandatory">  </span>\
                              <div class="invalid-feedback">\
                                 Enter valid {{$value->name}}\
                              </div>\
                           </div>\
                        </td>\
                        @endforeach\
                        <td>\
                           <div class="col-sm-12">\
                              <input type="text" class="form-control valid_from" name="valid_from[]" placeholder="dd-mm-yyyy" value="" required>\
                              <span class="mandatory"> </span>\
                              <div class="invalid-feedback">\
                                 Enter valid Effective From Date\
                              </div>\
                           </div>\
                        </td>\
                        <td>\
                           <div class="form-group row">\
                              <div class="col-sm-3 mr-1">\
                                 <label class="btn btn-success add_tax_details">+</label>\
                              </div>\
                              <div class="col-sm-3 mx-2">\
                                 <label class="btn btn-danger remove_tax_details">-</label>\
                              </div>\
                           </div>\
                        </td>\
                     </tr>';

    $(".append_row").append(item_tax_dets);
    $(".append_row").length;
    $('#count').val($(".row_count").length);
    var currentDate = new Date();
    $('.valid_from').datepicker({
        format: "dd-mm-yyyy",
        todayHighlight: true,
        startDate: currentDate,
        endDate: '',
        setDate: currentDate,
        autoclose: true
    });
    s_no();
    //common_igst_calculation();
}




$(document).on('change','.batch_no',function(){
var batch = Array();
   $('.batch_no').each(function(key){

      batch.push($(this).val());
   });

   for(var m=0;m<batch.length;m++)
   {
      var first = batch[m];

      for(var n=m+1;n<=batch.length;n++)
      {
         var second = batch[n];

         if(typeof second == 'undefined')
         {

         }
         else
         {
            if(first == second)
            {
               alert('uesd');
               $(this).val('');
               $(this).focus();
            }  
            else
            {

            }
         }
      }
   }

});

$(document).on('change','.applicable_date',function(){
var applicable_date = Array();

   $('.applicable_date').each(function(key){

      applicable_date.push($(this).val());
   });

   for(var m=0;m<applicable_date.length;m++)
   {
      var first = applicable_date[m];

      for(var n=m+1;n<=applicable_date.length;n++)
      {
         var second = applicable_date[n];

         if(typeof second == 'undefined')
         {

         }
         else
         {
            if(first == second)
            {
               alert('uesd');
               $(this).val('');
               $(this).focus();
            }  
            else
            {

            }
         }
      }
   }

});




$(document).on('click','#remove_opening',function (){

   var count = $('.opening_cnt').val();
   if(count == 1)
   {
      alert('Atleast One Row Present!');
   }
   else
   {
      $(this).closest($('.opening_row')).remove();
      $('#opening_cnt').val(--j);
   }


});

$(document).on('input','.rate',function(){
var quantity = $(this).closest($('.opening_row')).find('.quantity').val();
var rate = $(this).closest($('.opening_row')).find('.rate').val();
if(quantity == '')
{
   alert('Enter Quantity First');
   $(this).closest($('.opening_row')).find('.rate').val('');
}
else
{
   var amount = parseInt(quantity)*parseFloat(rate);
   $(this).closest($('.opening_row')).find('.amount').val(parseFloat(amount).toFixed(2));
}

});

$(document).on('input','.quantity',function(){
   var quantity = $(this).closest($('.opening_row')).find('.quantity').val();
    var rate = $(this).closest($('.opening_row')).find('.rate').val();

   if(rate != '')
   {
      $(this).closest($('.opening_row')).find('.rate').val('');
      $(this).closest($('.opening_row')).find('.amount').val('');
   }
});



 
$(document).on('change','.valid_from',function(){
var valid_from = Array();

console.log($(this).val());

  $('.valid_from').each(function(key){

    valid_from.push($(this).val());
  });

  for(var m=0;m<valid_from.length;m++)
  {
    var first = valid_from[m];

    for(var n=m+1;n<=valid_from.length;n++)
    {
      var second = valid_from[n];

      if(typeof second == 'undefined')
      {

      }
      else
      {
        if(first == second)
        {
          alert('uesd');
          $(this).val('');
          $(this).focus();
        } 
        else
        {

        }
      }
    }
  }

});   

function confirm_barcode()
{
   barcode_validation();
}

function testing(val)
{
    var value = $('#num'+val).val();
     test($('.barcode').val(),value);
}

   
   $(document).on("click", ".remove_tax_details", function() {
    var $tr = $(this).closest("tr");
    if ($(".remove_tax_details").length > 1) {
        $(this).closest("tr").remove();
        s_no();
        i--;
        $('#count').val($(".row_count").length);
    } else {
        alert("Atleast One Row Present");
    }
});

   $(document).on("input", ".common", function() {

      var common=$(this).val();
   //newfun($(this).attr('id'),common);
   
   var tax_name = $(this).attr('class').split(' ')[1].slice(0,-3).toLowerCase();
   //alert(tax_name);
   if(tax_name == 'igst')
   {
      //alert('hi');
    var gst_lower = $(this).attr('class').split(' ')[1].slice(0,-3).toLowerCase();
    var gst_upper = $(this).attr('class').split(' ')[1].slice(0,-3).toUpperCase();
    var gst = tax_name.substr(0,1).toUpperCase()+tax_name.substr(1);

    var igst_upper = $(this).closest("tr").find("."+gst_upper+"_id").val();
    var igst_lower = $(this).closest("tr").find("."+gst_lower+"_id").val();
    var igst = $(this).closest("tr").find("."+gst+"_id").val();

    var half_lower = parseFloat(igst_lower)/2;
    var half_upper = parseFloat(igst_upper)/2;
    var half = parseFloat(igst)/2;

    var lower_cgst = 'cgst'.toLowerCase();
    var upper_cgst = 'cgst'.toUpperCase();
    var name_cgst = lower_cgst.substr(0,1).toUpperCase()+lower_cgst.substr(1);

    var lower_sgst = 'sgst'.toLowerCase();
    var upper_sgst = 'sgst'.toUpperCase();
    var name_sgst = lower_sgst.substr(0,1).toUpperCase()+lower_sgst.substr(1);

    $(this).closest("tr").find("."+lower_cgst+"_id").val(half_lower);
    $(this).closest("tr").find("."+upper_cgst+"_id").val(half_upper);
    $(this).closest("tr").find("."+name_cgst+"_id").val(half);

    $(this).closest("tr").find("."+lower_sgst+"_id").val(half_lower);
    $(this).closest("tr").find("."+upper_sgst+"_id").val(half_upper);
    $(this).closest("tr").find("."+name_sgst+"_id").val(half);

   // calc_gst(half,half_upper,half_lower);
 }
   });

   // $(document).on("change", ".valid_from", function() {
   //    var valid_from = new Array();
   //    $('.valid_from').each(function(key){
   //       //alert(key);
   //    valid_from = $(this).val();
   //  });
   //  console.log(valid_from);
   // });

   function calc_gst(half,half_upper,half_lower)
   {

      $(this).closest("tr").find(".cgst").val(cgst);
   }

   function s_no() {
    $(".s_no").each(function(key) {
        $(this).html(key + 1)
    });
}

   $(document).on("click",".add_tax_details",function(){
     add_item_tax_details();
   });
   
   $(document).on("click",".add_barcode_details",function(){
     add_barcode_details();
   });
   
   
   
   $(document).ready(function(){

     s_no();
     item_type();

     var is_minimum_sales_qty_applicable=$(".is_minimum_sales_qty_applicable:checked").val();

     var currentDate = new Date();
       $('.valid_from,.common_effective_from').datepicker({
       format: "dd-mm-yyyy",
       todayHighlight: true,
       startDate: currentDate,
       endDate: '',
       setDate: currentDate,
       autoclose: true
       });
   });
   
   
   
     $(".name").keyup(function(){
       $(".print_name_in_english").val($(this).val());
     });
   
   /* Repack */
   function item_type()
   {
     $(".weight_in_grams").removeAttr("required");
     $(".bulk_item_id").removeAttr('required');
   
     /* Item Type Parent  */
     $(".child_unit").removeAttr("required");
     $(".child_item_id").removeAttr('required');
     $(".uom_for_repack_item").removeAttr('required');



   
     var item_type=$(".item_type").val();
     if(item_type == "Bulk")
     {
       $(".weight_in_grams").attr('required', 'required');
     }
   
     if(item_type == "Repack")
     {
       $(".weight_in_grams").attr('required', 'required');
       $(".bulk_item_id").attr('required', 'required');
       $(".bulk_item_div").css("display","block");
       get_category_based_item($(".category_1").val(),$(".category_2").val(),$(".category_3").val(),item_id="")
     }else
     {
       $(".bulk_item_div").css("display","none");
     }
   
     if(item_type == "Parent")
     {

       $(".child_unit").attr('required', 'required');
       $(".child_item_id").attr('required', 'required');
       $(".uom_for_repack_item").attr('required', 'required');
       $(".child_div").css("display","block");
       //get_category_based_item($(".category_1").val(),$(".category_2").val(),$(".category_3").val(),item_id="")
     }else
     {
       $(".child_div").css("display","none");
     }

     
    

    $("select").select2();


   
   }
   
   
   $(document).on("change",".item_type",function(){
     item_type();
   
   });
   
   function get_category_based_item(category_one_id,category_two_id,category_three_id,item_id)
   {
     $.ajax({
                 type: "post",
                 url: "{{ url('common/get-category-based-bulk-item')}}",
                 data: {category_one_id:category_one_id,category_two_id: category_two_id, category_three_id:category_three_id,item_id:item_id},
                 success: function (res)
                 {
                   result = JSON.parse(res);
                   $(".bulk_item_id").html(result.option);
                 }
             });
   
   }
   
   
     
   
    function get_category_one_based_category_two(category_one_id,category_two_id)
   {
     $.ajax({
                 type: "post",
                 url: "{{ url('common/get-category-one-based-category-two')}}",
                 data: {category_one_id: category_one_id, category_two_id:category_two_id},
                 success: function (res)
                 {
                   result = JSON.parse(res);
                   $(".category_2").html(result.option);
                   $(".category_3").html("<option value=''>Choose Category 3</option>");
                 }
             });
   
   }
   
   function get_category_two_based_category_three(category_two_id,category_three_id)
   {
     $.ajax({
                 type: "post",
                 url: "{{ url('common/get-category-two-based-category-three')}}",
                 data: {category_two_id: category_two_id, category_three_id:category_three_id},
                 success: function (res)
                 {
                   result = JSON.parse(res);
                   $(".category_3").html(result.option);
                 }
             });
   
   }
   
   
   
   $(document).on("click",".is_expiry_date",function()
   {
     var is_expiry_date=$(".is_expiry_date:checked").val();
     console.log("is_expiry_date == " + is_expiry_date);
     if(is_expiry_date == 1){
       $(".expiry_date_div").css("display","block");
     }else{
       $(".expiry_date_div").css("display","none");
     }
   });
   
   
   
   
   $(document).on("click",".is_minimum_sales_qty_applicable",function()
   {
     var is_minimum_sales_qty_applicable=$(".is_minimum_sales_qty_applicable:checked").val();
     $(".minimum_sales_qty").removeAttr("required");
     $(".minimum_sales_price").removeAttr("required");
     $(".uom_for_minimum_sales_item").removeAttr("required");

     
     

     if(is_minimum_sales_qty_applicable == 1){
      $(".minimum_sales_qty").attr('required', 'required');
      $(".minimum_sales_price").attr('required', 'required');
      $(".uom_for_minimum_sales_item").attr('required', 'required');

       $(".minimum_sales_div").css("display","block");
     }else{
       $(".minimum_sales_qty").removeAttr("required");
       $(".minimum_sales_price").removeAttr("required");
      $(".uom_for_minimum_sales_item").removeAttr("required");
       $(".minimum_sales_div").css("display","none");
     }
    $("select").select2();
   });
   
   
   $(document).on("click",".refresh_category_id",function(){
      var category_dets=refresh_category_master_details();
      $(".category_id").html(category_dets);
   });
   
   $(document).on("click",".refresh_uom_id",function(){
      var uom_dets=refresh_uom_master_details();
      $(".uom_id").html(uom_dets);
   });

   $(document).on("click",".refresh_uom_for_repack_item_id",function(){
      var uom_dets=refresh_uom_master_details();
      $(".uom_for_repack_item").html(uom_dets);
   });

   $(document).on("click",".refresh_uom_for_minimum_sales_item_id",function(){
      var uom_dets=refresh_uom_master_details();
      $(".uom_for_minimum_sales_item").html(uom_dets);
   });


   

   
   
   $(document).on("click",".refresh_item_id",function(){
      var item_dets=refresh_item_master_details();
      $(".bulk_item_id").html(item_dets);
   });
   
   $(document).on("click",".refresh_brand_id",function(){
      var brand_dets=refresh_brand_master_details();
      $(".brand_id").html(brand_dets);
   });
   
   $(document).on("click",".refresh_child_item_id",function(){
     var category_id=$(".category_id").val();
      var child_item_dets=refresh_child_item_master_details(category_id);
      $(".child_item_id").html(child_item_dets);
   });

   $(document).on("click",".refresh_supplier_id",function(){
      var supplier_dets=refresh_supplier_master_details();
      $(".supplier_id").html(supplier_dets);
   });

   
   
   
   
   
   
   
   $(document).ready(function()
   {
    var old_expiry_date="{{ old('is_expiry_date')}}";
     var is_expiry_date="";
     is_expiry_date=$(".is_expiry_date :checked").val();
     if(old_expiry_date != "")
     {
       is_expiry_date=old_expiry_date;
     }
     
     if(is_expiry_date == 1){
       $(".expiry_date_div").css("display","block");
     }else{
       $(".expiry_date_div").css("display","none");
     }
   
     var category_one_id=$(".category_1").val();
     var category_two_id="{{ old('category_2')}}";
     var category_three_id="{{ old('category_3')}}";
     var bulk_item_id="{{ old('bulk_item_id')}}";
   
     item_type();
   
     if(category_one_id !="")
     {
       get_category_one_based_category_two(category_one_id,category_two_id);
       get_category_based_item(category_one_id,category_two_id,category_three_id,bulk_item_id);
     }
   
     if(category_two_id !="")
     {
       get_category_two_based_category_three(category_two_id,category_three_id); 
     }
   
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