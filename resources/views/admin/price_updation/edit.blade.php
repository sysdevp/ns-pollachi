@extends('admin.layout.app')
@section('content')
<main class="page-content">

<div class="col-12 body-sec">
  <div class="card container px-0">
    <!-- card header start@ -->
    <div class="card-header px-2">
      <div class="row">
        <div class="col-4">
          <h3>Edit</h3>
        </div>
        <div class="col-8 mr-auto">
          <ul class="h-right-btn mb-0 pl-0">
            <li><button type="button" class="btn btn-success"><a href="{{ route('price_updation.index') }}">Back</a></button></li>
          </ul>
        </div>
      </div>
    </div>
    <!-- card header end@ -->
    <div class="card-body">
    
      <form  method="post" class="form-horizontal needs-validation" novalidate action="{{route('price_updation.update',$updations->id)}}" enctype="multipart/form-data">
      {{csrf_field()}}
      @method('PATCH')

        <div class="form-row">
          <div class="col-md-6">
                  <div class="form-group row">
                    <label for="validationCustom01" class="col-sm-4 col-form-label">With Effect From :</label>
                     <div class="col-sm-6">
                      <input type="date" name="effective_from" class="form-control" id="effective_from" value="{{ $updations->effective_from }}" autofocus>
                     </div>
                  </div>
               </div>
          <div class="col-md-6">
                  <div class="form-group row">
                    <label for="validationCustom01" class="col-sm-4 col-form-label">Category :</label>
                     <div class="col-sm-6">
                      <input type="text" class="form-control category" readonly="" value="{{ $updations->item->categories->name }}">
                      <input type="hidden" value="{{ $updations->item->category_id }}" name="category_id" id="category_id">
                        
                     </div>
                  </div>
               </div>
        </div>
        <div class="form-row">

          <div class="col-md-6">
                  <div class="form-group row">
                    <label for="validationCustom01" class="col-sm-4 col-form-label">Brand Name :</label>
                     <div class="col-sm-6">
                      <input type="text" readonly="" class="form-control brand" name="brand" id="brand" value="@if(@$updations->brand->name != 0){{ @$updations->brand->name }}@else Not Applicable @endif">
                      <input type="hidden" value="{{ $updations->brand_id }}" name="brand_id" id="brand_id">
                           
                     </div>
                  </div>
               </div>

          <div class="col-md-6">
                  <div class="form-group row">
                    <label for="validationCustom01" class="col-sm-4 col-form-label">Item Name :</label>
                     <div class="col-sm-6">
                      <input type="text" class="form-control" readonly="" name="browse_item" id="browse_item" value="{{ $updations->item->name }}">

                      <input type="hidden" class="form-control" name="item_id" id="item_id" value="{{ $updations->item_id }}">

                  
                     </div>
                  </div>
               </div>
        </div>
        <br>
        <div class="form-row mb-3">
          @if($updations->mark_up_type != '')
          <div class="col-md-4">
            <label>Mark Up</label>
                  <input type="radio" class="price_updation_up" name="price_updation" onclick="mark_up($(this).val())" value="1" checked="checked">
          </div>
          <div class="col-md-4">
            <label>Mark Down</label>
              <input type="radio" name="price_updation" class="price_updation_down" onclick="mark_down($(this).val())" value="0">
          </div>  

          @else

            <div class="col-md-4">
            <label>Mark Up</label>
                  <input type="radio" class="price_updation_up" name="price_updation" onclick="mark_up($(this).val())" value="1">
            </div>
          <div class="col-md-4">
            <label>Mark Down</label>
              <input type="radio" name="price_updation" class="price_updation_down" onclick="mark_down($(this).val())" value="0" checked="checked">
          </div>
          @endif
            
        </div>

        <input type="hidden" name="tester" value="" id="tester">

        <div class="form-row mb-3">
          <div class="col-md-6">
            <div class="form-group row">
              @if($updations->mark_up_type != '')
              <label for="validationCustom01" class="col-sm-4 col-form-label up_percent_label">Mark Up %:</label>
              <div class="col-sm-8 up_percent_div">
                <input type="text" class="form-control up_percent only_allow_digit_and_dot " placeholder="Mark Up %" name="up_percent" oninput="up_percents()" value="">
                
              </div>

              <label for="validationCustom01" style="display: none;" class="col-sm-4 col-form-label down_percent_label">Mark Down %:</label>
              <div class="col-sm-8 down_percent_div" style="display: none;">
                <input type="text" class="form-control down_percent only_allow_digit_and_dot" placeholder="Mark Down %" oninput="down_percents()" name="down_percent" value="">
                
              </div>
              @elseif($updations->mark_down_type != '')

              <label for="validationCustom01" style="display: none;" class="col-sm-4 col-form-label up_percent_label">Mark Up %:</label>
              <div class="col-sm-8 up_percent_div" style="display: none;">
                <input type="text" class="form-control up_percent only_allow_digit_and_dot " placeholder="Mark Up %" name="up_percent" oninput="up_percents()" value="">
                
              </div>

              <label for="validationCustom01" class="col-sm-4 col-form-label down_percent_label">Mark Down %:</label>
              <div class="col-sm-8 down_percent_div">
                <input type="text" class="form-control down_percent only_allow_digit_and_dot" placeholder="Mark Down %" oninput="down_percents()" name="down_percent" value="">
                
              </div>
              @endif

            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group row">
              @if($updations->mark_up_type != '')
              <label for="validationCustom01" class="col-sm-4 col-form-label up_rs_label">Mark Up Rs:</label>
              <div class="col-sm-8 up_rs_div">
                <input type="text" class="form-control up_rs only_allow_digit_and_dot" placeholder="Mark Up Rs" name="up_rs" oninput="up_rupees()" value="" >
                
              </div>

              <label for="validationCustom01" style="display: none;" class="col-sm-4 col-form-label down_rs_label">Mark Down Rs:</label>
              <div class="col-sm-8 down_rs_div" style="display: none;">
                <input type="text" class="form-control down_rs only_allow_digit_and_dot" placeholder="Mark Down Rs" name="down_rs" oninput="down_rupees()" value="">
                
              </div>

              @elseif($updations->mark_down_type != '')

              <label for="validationCustom01" style="display: none;" class="col-sm-4 col-form-label up_rs_label">Mark Up Rs:</label>
              <div class="col-sm-8 up_rs_div" style="display: none;">
                <input type="text" class="form-control up_rs only_allow_digit_and_dot" placeholder="Mark Up Rs" name="up_rs" oninput="up_rupees()" value="" >
                
              </div>

              <label for="validationCustom01" class="col-sm-4 col-form-label down_rs_label">Mark Down Rs:</label>
              <div class="col-sm-8 down_rs_div">
                <input type="text" class="form-control down_rs only_allow_digit_and_dot" placeholder="Mark Down Rs" name="down_rs" oninput="down_rupees()" value="">
                
              </div>

              @endif

            </div>
          </div>
        </div>

        <div class="col-md-7 text-right">
          @if($updations->mark_up_type != '')
          <button class="btn btn-success up_update" name="up_update" id="up_update" type="button">Update</button>
          <button class="btn btn-success down_update" style="display: none;" name="down_update" id="down_update" type="button">Update</button>
          @else
          <button class="btn btn-success up_update" style="display: none;" name="up_update" id="up_update" type="button">Update</button>
          <button class="btn btn-success down_update" name="down_update" id="down_update" type="button">Update</button>
          @endif
        </div>

        <div class="col-md-8">
                       <div class="form-group row">
                       <div class="col-md-4">
                       <label for="validationCustom01" class=" col-form-label"><h4>Item Details:</h4> </label><br>
                       
                           
                       </div>
                         </div>
              </div>

        <div class="card-body" style="height: 100%;">
      <table class="table table-responsive table-striped table-bordered" height=250>
        <thead>
          <tr>
            <th>S.No</th>
            <th>Item Code </th>
            <th>Item Name </th>
            <th>Brand Name</th>
            <th>Category</th>
            <th>HSN</th>
            <th>MRP</th>
            <th>UOM</th>
            <th>Last Purchase Cost</th>
            <th>Tax</th>
            <th>Mark Up  Type</th>
            <th>Mark Up Value</th>
            <th>Mark Down Type</th>
            <th>Mark Down Value</th>
            <th>Updated Selling Price</th>
            <th>Action</th>
          </tr>
          </tr>
        </thead>
        <tbody class="append_item" id="myTable">
          <tr class="row_category" id="1"><input type="hidden" name="row_check" value="1" id="row_check1"><td><font style="font-family: Times new roman;">1</font><input type="hidden" name="table_count" value="1"></td><td><input type="hidden" value="{{@$updations->item_id}}" class="append_item_id1" name="item_id"><input type="hidden" value="{{ @$updations->tem->code }}" class="actual_item_code1" name="item_code"><input type="hidden" value="{{$updations->item->code}}" class="append_item_code1"><font class="item_code1" style="font-family: Times new roman;">{{@$updations->item->code}}</font></td><td><input type="hidden" value="{{@$updations->item->name}}" class="actual_item_name1" name="item_name"><input type="hidden" value="{{@$updations->item->name}}" class="append_item_name1"><font class="item_name1" style="font-family: Times new roman;">{{@$updations->item->name}}</font></td><td><input type="hidden" value="{{@$updations->item->brand->id}}" class="actual_item_brand_name1" name="brand_id"><input type="hidden" value="{{@$updations->item->brand->id}}" class="append_item_brand_name1"><font class="item_brand_name1" style="font-family: Times new roman;">{{@$brand_name }}</font></td><td><input type="hidden" value="{{@$updations->item->categories->id}}" class="actual_item_category_name1" name="category_id"><input type="hidden" value="{{@$updations->item->categories->id}}" class="append_item_category_name1"><font class="item_category_name1" style="font-family: Times new roman;">{{@$updations->item->categories->name}}</font></td><td><input type="hidden" value="{{@$updations->item->hsn}}" class="actual_item_hsn1" name="hsn"><input type="hidden" value="{{@$updations->item->hsn}}" class="append_item_hsn1"><font style="font-family: Times new roman;" class="item_hsn1">{{@$updations->item->hsn}}</font></td><td><input type="hidden" value="{{@$updations->item->mrp}}" class="actual_item_mrp1" name="mrp"><input type="hidden" value="{{@$updations->item->mrp}}" class="append_item_mrp1"><font class="item_mrp1" style="font-family: Times new roman;">{{$updations->item->mrp}}</font></td><td><input type="hidden" value="{{@$updations->item->uom->id}}" class="actual_item_uom1" name="uom_id"><input type="hidden" value="{{@$updations->item->uom->id}}" class="append_item_uom1"><font class="item_uom1" style="font-family: Times new roman;">{{ @$updations->item->uom->name }}</font></td><td><input type="hidden" class="actual_last_purchase_cost1" value="{{@$item_rate}}" name="last_purchase_cost"><input type="hidden" class="append_last_purchase_cost1" value="{{@$item_rate}}"><font class="last_purchase_cost1">{{@$item_rate}}</font></td><td><input type="hidden" class="tax1" value="{{@$tax}}" name="tax"><font class="tax1">{{@$tax}}</font></td><td><input type="hidden" class=" form-control append_mark_up_percent1" name="mark_up_percent" value="{{@$updated_selling_price->mark_up_type}}"><font class="mark_up_percent1" style="font-family: Times new roman;">{{@$up_type}}</font></td><td><input type="hidden" class="form-control append_mark_up_rs1" name="mark_up_rs" value="{{@$updated_selling_price->mark_up_value}}"><font class="mark_up_rs1" style="font-family: Times new roman;">{{@$updated_selling_price->mark_up_value}}</font></td><td><input type="hidden" class="form-control append_mark_down_percent1" name="mark_down_percent" value="{{@$updated_selling_price->mark_down_type}}"><font class="mark_down_percent1" style="font-family: Times new roman;">{{@$down_type}}</font></td><td><input type="hidden" class="form-control append_mark_down_rs1" name="mark_down_rs" value="{{@$updated_selling_price->mark_down_value}}"><font class="mark_down_rs1" style="font-family: Times new roman;">{{@$updated_selling_price->mark_down_value}}</font></td><td><input type="hidden" value="{{@$selling_price}}" class="actual_updated_selling_price1"><input type="hidden" value="{{@$selling_price}}" class="append_updated_selling_price1" name="updated_selling_price"><font style="font-family: Times new roman;" class="updated_selling_price1">{{@$selling_price}}</font></td><td><i class="fa fa-level-up px-2 py-1 bg-danger text-white rounded up" id="1" aria-hidden="true"></i>&nbsp;<i class="fa fa-level-down px-2 py-1 bg-warning  text-white rounded down" id="1" aria-hidden="true"></i></td></tr>
        </tbody>
        <tfoot>
              <th></th>
              <th></th>
              <th></th>
              <th></th>
              <th></th>
              <th></th>
              <th></th>
              <th></th>
              <th></th>
              <th></th>
              <th></th>
              <th></th>
              <th></th>
              <th></th>
              <th></th>
              <th></th>
              
              
            </tfoot>
      </table>
    </div>

        <div class="col-md-7 text-right">
          <button class="btn btn-success" name="add" type="submit">Submit</button>
        </div>
        <div class="col-md-7 text-right">
          
        </div>
      </form>
    </div>
    <!-- card body end@ -->
  </div>
</div>

<script type="text/javascript">

  // document.addEventListener('contextmenu', event => event.preventDefault());

  function mark_up(val) 
   {
      
     $('.up_rs_label').show();
     $('.up_percent_label').show();
     $('.up_rs_div').show();
     $('.up_percent_div').show();
     $('.up_update').show();

     $('.down_rs_label').hide();
     $('.down_percent_label').hide();
     $('.down_rs_div').hide();
     $('.down_percent_div').hide();
     $('.down_update').hide();
     $('#tester').val('');

   }

   function mark_down(val) 
   {
     $('.up_rs_label').hide();
     $('.up_percent_label').hide();
     $('.up_rs_div').hide();
     $('.up_percent_div').hide();
     $('.up_update').hide();

     $('.down_rs_label').show();
     $('.down_percent_label').show();
     $('.down_rs_div').show();
     $('.down_percent_div').show();
     $('.down_update').show();
     $('#tester').val('');

   }

   function categories_check()
{
  var  categories=$('.category_id').val();
  var  brand=$('.brand_id').val();
  if(brand == '')
  {
    brand ='no_val';
  }
  $.ajax({  
        
        type: "GET",
        url: "{{ url('price_updation/change_items/{id}') }}",
        data: { categories: categories, brand: brand },             
             
        success: function(data){ 
          console.log(data);
        $('.row_brand').remove(); 
        $('.row_category').remove(); 
        $('#tester').val('');
        $(".append_item").html(data);
        return false;
          
        }


    });
}

function brand_check()
{
  
  var brand = $('.brand_id').val();
  var categories = $('.category_id').val();

  if(categories == '')
  {
    categories ='no_val';
  }
  

  $.ajax({

        type: "GET",
        url: "{{ url('price_updation/brand_filter/{id}') }}",
        data: {brand: brand, categories: categories },             
             
        success: function(data)
        {
          console.log(data);
          $('.row_category').remove();
          $('.row_brand').remove();
          $('#tester').val('');
          $(".append_item").html(data);
          return false;

        }

  });
}

function browse_items()
{
  var browse_item = $('#browse_item').val();
  var brand = $('.brand_id').val();
  var categories = $('.category_id').val();


  if(brand == '')
    {
      brand ='no_val';
    }
  if(categories == '')
    {
      categories ='no_val';
    }

  $.ajax({  
        
        type: "GET",
        url: "{{ url('price_updation/browse_item/{id}') }}",
        data: { browse_item: browse_item, brand: brand, categories: categories},             
             
        success: function(data){
          $('.row_brand').remove(); 
        $('.row_category').remove();
        $('#tester').val(''); 
        $(".append_item").html(data);
        }
      });
}

function up_percents()
{
  var cnt = $('#tester').val();
    $('.up_rs').val('');  

    var selling_price = $('.actual_last_purchase_cost'+cnt).val();
    var up_percent = $('.up_percent').val();

    var percentage_val = parseFloat(selling_price) * parseFloat(up_percent) / 100;

    // $('.up_rs').val(parseFloat(percentage_val.toFixed(2)));
  
}
function up_rupees()
{
  var cnt = $('#tester').val();
  
    $('.up_percent').val('');
 
    var selling_price = $('.actual_last_purchase_cost'+cnt).val();
    var up_rs = $('.up_rs').val();
    var percentage_val = parseFloat(up_rs)*100/parseFloat(selling_price);

   // $(".up_percent").val(percentage_val.toFixed(2));
  
}
  

function down_percents()
{
  var cnt = $('#tester').val();
  if(cnt == '')
  {
    $('.down_rs').val('');  
  }
  else
  {
    var selling_price = $('.actual_last_purchase_cost'+cnt).val();
    var down_percent = $('.down_percent').val();

    var percentage_val = parseFloat(selling_price) * parseFloat(down_percent) / 100;

    // $('.down_rs').val(parseFloat(percentage_val.toFixed(2)));
  }
}
function down_rupees()
{
  var cnt = $('#tester').val();
  if($('#tester').val() == '')
  {
    $('.down_percent').val('');
  }
  else
  {
    var selling_price = $('.actual_last_purchase_cost'+cnt).val();
    var down_rs = $('.down_rs').val();
    var percentage_val = parseFloat(down_rs)*100/parseFloat(selling_price);

   // $(".down_percent").val(percentage_val.toFixed(2));
  }
}  


$(document).on('click','.up_update',function(){

if($('#tester').val() == '')
{
    $('.row_category').each(function(key){
      var count = $(this).attr('id');

      var selling_price = $('.actual_last_purchase_cost'+count).val();
      var mrp = $('.append_item_mrp'+count).val();
      var up_percent = $('.up_percent').val();
      var up_rs = $('.up_rs').val();
      if(up_percent != '')
      {
        var disc_rate = parseFloat(up_percent)/100;
        var disc_val_exclusive = parseFloat(selling_price)*parseFloat(disc_rate);
        var percentage_val = parseFloat(selling_price) * parseFloat(up_percent) / 100;
        var percent = parseFloat(up_percent);
        var total = parseFloat(selling_price) + parseFloat(percentage_val);
        var value = 1;
      }
      else if(up_rs != '')
      {
        var disc_amount_exclusive = parseFloat(up_rs)*100/parseFloat(selling_price);
        var total = parseFloat(selling_price) + parseFloat(up_rs);
        var percentage_val = parseFloat(up_rs);
        var value = 2;
      }
      else if(up_percent == '' && up_rs == '')
      {
        alert('Please Provide Any Value');
      }
      
      if(parseFloat(total.toFixed(2)) <= parseFloat(mrp) || parseFloat(mrp) == 0)
      {
        if(value == 1)
        {
          $('#row_check'+count).val(1);
          $('.updated_selling_price'+count).text(parseFloat(total.toFixed(2)));
          $('.append_updated_selling_price'+count).val(parseFloat(total.toFixed(2)));
          $('.mark_up_percent'+count).text('Percentage');
          $('.append_mark_up_percent'+count).val(parseInt(value));
          $('.mark_up_rs'+count).text(parseFloat(percent.toFixed(2)));
          $('.append_mark_up_rs'+count).val(parseFloat(percent.toFixed(2)));
          $('.mark_down_percent'+count).text('');
          $('.append_mark_down_percent'+count).val('');
          $('.mark_down_rs'+count).text('');
          $('.append_mark_down_rs'+count).val('');
          $(this).css('color', 'green');
        }
       else
       {
          $('#row_check'+count).val(1);
          $('.updated_selling_price'+count).text(parseFloat(total.toFixed(2)));
          $('.append_updated_selling_price'+count).val(parseFloat(total.toFixed(2)));
          $('.mark_up_rs'+count).text(parseFloat(percentage_val.toFixed(2)));
          $('.append_mark_up_rs'+count).val(parseFloat(percentage_val.toFixed(2)));
          $('.mark_up_percent'+count).text('Rupee');
          $('.append_mark_up_percent'+count).val(parseInt(value));
          $('.mark_down_percent'+count).text('');
          $('.append_mark_down_percent'+count).val('');
          $('.mark_down_rs'+count).text('');
          $('.append_mark_down_rs'+count).val('');
          $(this).css('color', 'green');

       }
        
      }

      else
      {

        if(value == 1)
        {
          $('#row_check'+count).val(2);
          $('.updated_selling_price'+count).text(parseFloat(total.toFixed(2)));
          $('.append_updated_selling_price'+count).val(parseFloat(total.toFixed(2)));
          $('.mark_up_percent'+count).text('Percentage');
          $('.append_mark_up_percent'+count).val(parseInt(value));
          $('.mark_up_rs'+count).text(parseFloat(percent.toFixed(2)));
          $('.append_mark_up_rs'+count).val(parseFloat(percent.toFixed(2)));
          $('.mark_down_percent'+count).text('');
          $('.append_mark_down_percent'+count).val('');
          $('.mark_down_rs'+count).text('');
          $('.append_mark_down_rs'+count).val('');
          $(this).css('color', 'red');
        }
       else
       {
          $('#row_check'+count).val(2);
          $('.updated_selling_price'+count).text(parseFloat(total.toFixed(2)));
          $('.append_updated_selling_price'+count).val(parseFloat(total.toFixed(2)));
          $('.mark_up_rs'+count).text(parseFloat(percentage_val.toFixed(2)));
          $('.append_mark_up_rs'+count).val(parseFloat(percentage_val.toFixed(2)));
          $('.mark_up_percent'+count).text('Rupee');
          $('.append_mark_up_percent'+count).val(parseInt(value));
          $('.mark_down_percent'+count).text('');
          $('.append_mark_down_percent'+count).val('');
          $('.mark_down_rs'+count).text('');
          $('.append_mark_down_rs'+count).val('');
          $(this).css('color', 'red');

       }

      }
      
    });
  $('.up_percent').val('');
  $('.up_rs').val('');
}

else
{
    var cnt = $('#tester').val();

    var selling_price = $('.actual_last_purchase_cost'+cnt).val();
      var mrp = $('.append_item_mrp'+cnt).val();
      var up_percent = $('.up_percent').val();
      var up_rs = $('.up_rs').val();
      if(up_percent != '')
      {
        var disc_rate = parseFloat(up_percent)/100;
        var disc_val_exclusive = parseFloat(selling_price)*parseFloat(disc_rate);
        var percentage_val = parseFloat(selling_price) * parseFloat(up_percent) / 100;
        var percent = parseFloat(up_percent);
        var total = parseFloat(selling_price) + parseFloat(percentage_val);
        var value = 1;
      }
      else if(up_rs != '')
      {
        var disc_amount_exclusive = parseFloat(up_rs)*100/parseFloat(selling_price);
        var total = parseFloat(selling_price) + parseFloat(up_rs);
        var percentage_val = parseFloat(up_rs);
        var value = 2;
      }
      else if(up_percent == '' && up_rs == '')
      {
        alert('Please Provide Any Value');
      }

    if(parseFloat(total.toFixed(2)) <= parseFloat(mrp) || parseFloat(mrp) == 0)
      {
        if(value == 1)
        {
          $('#row_check'+cnt).val(1);
          $('.updated_selling_price'+cnt).text(parseFloat(total.toFixed(2)));
          $('.append_updated_selling_price'+cnt).val(parseFloat(total.toFixed(2)));
          $('.mark_up_percent'+cnt).text('Percentage');
          $('.append_mark_up_percent'+cnt).val(parseInt(value));
          $('.mark_up_rs'+cnt).text(parseFloat(percent.toFixed(2)));
          $('.append_mark_up_rs'+cnt).val(parseFloat(percent.toFixed(2)));
          $('.mark_down_percent'+cnt).text('');
          $('.append_mark_down_percent'+cnt).val('');
          $('.mark_down_rs'+cnt).text('');
          $('.append_mark_down_rs'+cnt).val('');
        }
       else
       {
          $('#row_check'+cnt).val(1);
          $('.updated_selling_price'+cnt).text(parseFloat(total.toFixed(2)));
          $('.append_updated_selling_price'+cnt).val(parseFloat(total.toFixed(2)));
          $('.mark_up_rs'+cnt).text(parseFloat(percentage_val.toFixed(2)));
          $('.append_mark_up_rs'+cnt).val(parseFloat(percentage_val.toFixed(2)));
          $('.mark_up_percent'+cnt).text('Rupee');
          $('.append_mark_up_percent'+cnt).val(parseInt(value));
          $('.mark_down_percent'+cnt).text('');
          $('.append_mark_down_percent'+cnt).val('');
          $('.mark_down_rs'+cnt).text('');
          $('.append_mark_down_rs'+cnt).val('');

       }
        
      }
    else
    {
      alert('Selling Price Exceeds MRP!!');
      $('#row_check'+cnt).val(1);
    }
    $('.up_percent').val('');
    $('.up_rs').val('');
}
$('#tester').val('');
$('.price_updation_up').attr('checked');
$('.price_updation_down').removeAttr('checked');
  
});

$(document).on('click','.down_update',function(){

if($('#tester').val() == '')
{
    $('.row_category').each(function(key){
      var count = $(this).attr('id');

      var selling_price = $('.actual_last_purchase_cost'+count).val();
      var mrp = $('.append_item_mrp'+count).val();
      var down_percent = $('.down_percent').val();
      var down_rs = $('.down_rs').val();
      if(down_percent != '')
      {
        var disc_rate = parseFloat(down_percent)/100;
        var disc_val_exclusive = parseFloat(selling_price)*parseFloat(disc_rate);
        var percentage_val = parseFloat(selling_price) * parseFloat(down_percent) / 100;
        var total = parseFloat(selling_price) - parseFloat(percentage_val);
        var percent = parseFloat(down_percent);
        var value = 1;
      }
      else if(down_rs != '')
      {
        var disc_amount_exclusive = parseFloat(down_rs)*100/parseFloat(selling_price);
        var total = parseFloat(selling_price) - parseFloat(down_rs);
        var percentage_val = parseFloat(down_rs);
        var value = 2;
      }
      else if(down_percent == '' && down_rs == '')
      {
        alert('Please Provide Any Value');
      }
      
      if(parseFloat(total.toFixed(2)) >= parseFloat(selling_price))
      {
        if(value == 1)
        {
          $('#row_check'+count).val(1);
          $('.updated_selling_price'+count).text(parseFloat(total.toFixed(2)));
          $('.append_updated_selling_price'+count).val(parseFloat(total.toFixed(2)));
          $('.mark_down_percent'+count).text('Percentage');
          $('.append_mark_down_percent'+count).val(parseInt(value));
          $('.mark_down_rs'+count).text(parseFloat(percent.toFixed(2)));
          $('.append_mark_down_rs'+count).val(parseFloat(percent.toFixed(2)));
          $('.mark_up_percent'+count).text('');
          $('.append_mark_up_percent'+count).val('');
          $('.mark_up_rs'+count).text('');
          $('.append_mark_up_rs'+count).val('');
          $(this).css('color','green');
        }
       else
       {
          $('#row_check'+count).val(1);
          $('.updated_selling_price'+count).text(parseFloat(total.toFixed(2)));
          $('.append_updated_selling_price'+count).val(parseFloat(total.toFixed(2)));
          $('.mark_down_rs'+count).text(parseFloat(percentage_val.toFixed(2)));
          $('.append_mark_down_rs'+count).val(parseFloat(percentage_val.toFixed(2)));
          $('.mark_down_percent'+count).text('Rupee');
          $('.append_mark_down_percent'+count).val(parseInt(value));
          $('.mark_up_percent'+count).text('');
          $('.append_mark_up_percent'+count).val('');
          $('.mark_up_rs'+count).text('');
          $('.append_mark_up_rs'+count).val('');
          $(this).css('color','green');
       }
      }
      else
      {
        if(value == 1)
        {
          $('#row_check'+count).val(1);
          $('.updated_selling_price'+count).text(parseFloat(total.toFixed(2)));
          $('.append_updated_selling_price'+count).val(parseFloat(total.toFixed(2)));
          $('.mark_down_percent'+count).text('Percentage');
          $('.append_mark_down_percent'+count).val(parseInt(value));
          $('.mark_down_rs'+count).text(parseFloat(percent.toFixed(2)));
          $('.append_mark_down_rs'+count).val(parseFloat(percent.toFixed(2)));
          $('.mark_up_percent'+count).text('');
          $('.append_mark_up_percent'+count).val('');
          $('.mark_up_rs'+count).text('');
          $('.append_mark_up_rs'+count).val('');
          $(this).css('color','red');
        }
       else
       {
          $('#row_check'+count).val(1);
          $('.updated_selling_price'+count).text(parseFloat(total.toFixed(2)));
          $('.append_updated_selling_price'+count).val(parseFloat(total.toFixed(2)));
          $('.mark_down_rs'+count).text(parseFloat(percentage_val.toFixed(2)));
          $('.append_mark_down_rs'+count).val(parseFloat(percentage_val.toFixed(2)));
          $('.mark_down_percent'+count).text('Rupee');
          $('.append_mark_down_percent'+count).val(parseInt(value));
          $('.mark_up_percent'+count).text('');
          $('.append_mark_up_percent'+count).val('');
          $('.mark_up_rs'+count).text('');
          $('.append_mark_up_rs'+count).val('');
          $(this).css('color','red');
       }
      }
    });
  $('.down_percent').val('');
  $('.down_rs').val('');
}

else
{
    var cnt = $('#tester').val();
    var mrp = $('.append_item_mrp'+cnt).val();
    var selling_price = $('.actual_last_purchase_cost'+cnt).val();
    var down_percent = $('.down_percent').val();
    var down_rs = $('.down_rs').val();

      
    if(down_percent != '')
      {
        var disc_rate = parseFloat(down_percent)/100;
        var disc_val_exclusive = parseFloat(selling_price)*parseFloat(disc_rate);
        var percentage_val = parseFloat(selling_price) * parseFloat(down_percent) / 100;
        var total = parseFloat(selling_price) - parseFloat(percentage_val);
        var percent = parseFloat(down_percent);
        var value = 1;
      }
      else if(down_rs != '')
      {
        var disc_amount_exclusive = parseFloat(down_rs)*100/parseFloat(selling_price);
        var total = parseFloat(selling_price) - parseFloat(down_rs);
        var percentage_val = parseFloat(down_rs);
        var value = 2;
      }
      else if(down_percent == '' && down_rs == '')
      {
        alert('Please Provide Any Value');
      }
      

    if(parseFloat(total.toFixed(2)) >= parseFloat(selling_price))
      {
        if(value == 1)
        {
          $('#row_check'+cnt).val(1);
          $('.updated_selling_price'+cnt).text(parseFloat(total.toFixed(2)));
          $('.append_updated_selling_price'+cnt).val(parseFloat(total.toFixed(2)));
          $('.mark_down_percent'+cnt).text('Percentage');
          $('.append_mark_down_percent'+cnt).val(parseInt(value));
          $('.mark_down_rs'+cnt).text(parseFloat(percent.toFixed(2)));
          $('.append_mark_down_rs'+cnt).val(parseFloat(percent.toFixed(2)));
          $('.mark_up_percent'+cnt).text('');
          $('.append_mark_up_percent'+cnt).val('');
          $('.mark_up_rs'+cnt).text('');
          $('.append_mark_up_rs'+cnt).val('');
          // $(this).css('color','green');
        }
       else
       {
          $('#row_check'+cnt).val(1);
          $('.updated_selling_price'+cnt).text(parseFloat(total.toFixed(2)));
          $('.append_updated_selling_price'+cnt).val(parseFloat(total.toFixed(2)));
          $('.mark_down_rs'+cnt).text(parseFloat(percentage_val.toFixed(2)));
          $('.append_mark_down_rs'+cnt).val(parseFloat(percentage_val.toFixed(2)));
          $('.mark_down_percent'+cnt).text('Rupee');
          $('.append_mark_down_percent'+cnt).val(parseInt(value));
          $('.mark_up_percent'+cnt).text('');
          $('.append_mark_up_percent'+cnt).val('');
          $('.mark_up_rs'+cnt).text('');
          $('.append_mark_up_rs'+cnt).val('');
          // $(this).css('color','green');
       }
      }
    else
    {
      if(value == 1)
        {
          alert('Less Than Last Purchase Cost!!');
          $('#row_check'+cnt).val(1);
          $('.updated_selling_price'+cnt).text(parseFloat(total.toFixed(2)));
          $('.append_updated_selling_price'+cnt).val(parseFloat(total.toFixed(2)));
          $('.mark_down_percent'+cnt).text('Percentage');
          $('.append_mark_down_percent'+cnt).val(parseInt(value));
          $('.mark_down_rs'+cnt).text(parseFloat(percent.toFixed(2)));
          $('.append_mark_down_rs'+cnt).val(parseFloat(percent.toFixed(2)));
          $('.mark_up_percent'+cnt).text('');
          $('.append_mark_up_percent'+cnt).val('');
          $('.mark_up_rs'+cnt).text('');
          $('.append_mark_up_rs'+cnt).val('');
          // $(this).css('color','red');
        }
       else
       {
          alert('Less Than Last Purchase Cost!!');
          $('#row_check'+cnt).val(1);
          $('.updated_selling_price'+cnt).text(parseFloat(total.toFixed(2)));
          $('.append_updated_selling_price'+cnt).val(parseFloat(total.toFixed(2)));
          $('.mark_down_rs'+cnt).text(parseFloat(percentage_val.toFixed(2)));
          $('.append_mark_down_rs'+cnt).val(parseFloat(percentage_val.toFixed(2)));
          $('.mark_down_percent'+cnt).text('Rupee');
          $('.append_mark_down_percent'+cnt).val(parseInt(value));
          $('.mark_up_percent'+cnt).text('');
          $('.append_mark_up_percent'+cnt).val('');
          $('.mark_up_rs'+cnt).text('');
          $('.append_mark_up_rs'+cnt).val('');
          // $(this).css('color','red');
       }
    }
    $('.down_percent').val('');
    $('.down_rs').val('');
}
$('#tester').val('');
$('.price_updation_up').removeAttr('checked');
$('.price_updation_down').attr('checked');
  
});

$(document).on('click','.up',function(){

     $('.up_rs_label').show();
     $('.up_percent_label').show();
     $('.up_rs_div').show();
     $('.up_percent_div').show();
     $('.up_update').show();

     $('.down_rs_label').hide();
     $('.down_percent_label').hide();
     $('.down_rs_div').hide();
     $('.down_percent_div').hide();
     $('.down_update').hide();

     $('.price_updation_up').attr('checked');
     $('.price_updation_down').removeAttr('checked');

    $('.up_rs').val('');
    $('.up_percent').val('');
    $('.up_percent').focus();
    $('#tester').val($(this).attr('id'));
});

$(document).on('click','.down',function(){

     $('.up_rs_label').hide();
     $('.up_percent_label').hide();
     $('.up_rs_div').hide();
     $('.up_percent_div').hide();
     $('.up_update').hide();

     $('.down_rs_label').show();
     $('.down_percent_label').show();
     $('.down_rs_div').show();
     $('.down_percent_div').show();
     $('.down_update').show();

     $('.price_updation_up').removeAttr('checked');
     $('.price_updation_down').attr('checked');

    $('.down_rs').val('');
    $('.down_percent').val('');
    $('.down_percent').focus();
    $('#tester').val($(this).attr('id'));
});

</script>
@endsection

