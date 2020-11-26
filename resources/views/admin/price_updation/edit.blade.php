@extends('admin.layout.app')
@section('content')
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
                    <label for="validationCustom01" class="col-sm-4 col-form-label">Date :</label>
                     <div class="col-sm-6">
                      <input type="date" name="date" class="form-control"  readonly id="date" value="{{ $updations->date }}">
                     </div>
                  </div>
               </div>
          <div class="col-md-6">
                  <div class="form-group row">
                    <label for="validationCustom01" class="col-sm-4 col-form-label">Category :</label>
                     <div class="col-sm-6">
                      <input type="text" class="form-control category" readonly="" value="{{ $updations->category->name }}">
                      <input type="hidden" value="{{ $updations->category_id }}" name="category_id" id="category_id">
                        
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
          @if($updations->mark_up_rs != '' || $updations->mark_up_percent != '')
          <div class="col-md-4">
            <label>Mark Up</label>
                  <input type="radio" class="price_updation_up" name="price_updation" onclick="mark_up($(this).val())" value="1" checked="">
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
              <input type="radio" name="price_updation" class="price_updation_down" onclick="mark_down($(this).val())" value="0" checked="">
          </div>
          @endif
            
        </div>

        <input type="hidden" name="tester" value="" id="tester">

        <div class="form-row mb-3">
          <div class="col-md-6">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label up_percent_label">Mark Up %:</label>
              <div class="col-sm-8 up_percent_div">
                <input type="text" class="form-control up_percent only_allow_digit_and_dot " placeholder="Mark Up %" name="up_percent" oninput="up_percents()" value="">
                
              </div>

              <label for="validationCustom01" class="col-sm-4 col-form-label down_percent_label" style="display: none;">Mark Down %:</label>
              <div class="col-sm-8 down_percent_div" style="display: none;">
                <input type="text" class="form-control down_percent only_allow_digit_and_dot" placeholder="Mark Down %" oninput="down_percents()" name="down_percent" value="">
                
              </div>

            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label up_rs_label">Mark Up Rs:</label>
              <div class="col-sm-8 up_rs_div">
                <input type="text" class="form-control up_rs only_allow_digit_and_dot" placeholder="Mark Up Rs" name="up_rs" oninput="up_rupees()" value="" >
                
              </div>

              <label for="validationCustom01" style="display: none;" class="col-sm-4 col-form-label down_rs_label">Mark Down Rs:</label>
              <div class="col-sm-8 down_rs_div" style="display: none;">
                <input type="text" class="form-control down_rs only_allow_digit_and_dot" placeholder="Mark Down Rs" name="down_rs" oninput="down_rupees()" value="">
                
              </div>

            </div>
          </div>
        </div>

        <div class="col-md-7 text-right">
          <button class="btn btn-success up_update" name="up_update" id="up_update" type="button">Update</button>
          <button class="btn btn-success down_update" style="display: none;" name="down_update" id="down_update" type="button">Update</button>
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
            <th>Mark Up Type</th>
            <th>Mark Up Value</th>
            <th>Mark Down Type</th>
            <th>Mark Down Value</th>
            <th>Selling Price</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody class="append_item" id="myTable">
          <tr class="row_category" id=""><td><font style="font-family: Times new roman;">1</font></td><td><input type="hidden" value="{{ $updations->item_id }}" class="append_item_id1" name="item_id"><input type="hidden" value="{{ @$updations->item->code }}" class="actual_item_code1" name="item_code"><input type="hidden" value="{{ @$updations->item->code }}" class="append_item_code1"><font class="item_code1" style="font-family: Times new roman;">{{ @$updations->item->code }}</font></td><td><input type="hidden" value="{{ @$updations->item->name }}" class="actual_item_name1" name="item_name"><input type="hidden" value="{{ @$updations->item->name }}" class="append_item_name1"><font class="item_name1" style="font-family: Times new roman;">{{ @$updations->item->name }}</font></td><td><input type="hidden" value="{{ @$updations->item->brand_id }}" class="actual_item_brand_name1" name="brand_id"><input type="hidden" value="{{ @$updations->item->brand_id }}" class="append_item_brand_name1"><font class="item_brand_name1" style="font-family: Times new roman;">@if(@$updations->item->brand_id != 0){{ @$updations->item->brand->name }}@else Not Applicable @endif</font></td><td><input type="hidden" value="{{ @$updations->item->category_id }}" class="actual_item_category_name1" name="category_id"><input type="hidden" value="{{@$updations->item->category_id}}" class="append_item_category_name1"><font class="item_category_name" style="font-family: Times new roman;">{{ @$updations->item->categories->name }}</font></td><td><input type="hidden" value="{{ @$updations->item->hsn }}" class="actual_item_hsn1" name="hsn"><input type="hidden" value="{{ @$updations->item->hsn }}" class="append_item_hsn1"><font style="font-family: Times new roman;" class="item_hsn1">{{ @$updations->item->hsn }}</font></td><td><input type="hidden" value="{{ @$updations->item->mrp }}" class="actual_item_mrp1" name="mrp"><input type="hidden" value="{{ @$updations->item->mrp }}" class="append_item_mrp1"><font class="item_mrp1" style="font-family: Times new roman;">{{ @$updations->item->mrp }}</font></td><td><input type="hidden" value="{{ @$updations->item->uom_id }}" class="actual_item_uom" name="uom_id"><input type="hidden" value="{{ @$updations->item->uom_id }} " class="append_item_uom"><font class="item_uom" style="font-family: Times new roman;">{{ @$updations->item->uom->name }}</font></td><td><input type="hidden" class="actual_last_purchase_cost1" value="{{ @$unit_price }}" name="last_purchase_cost"><input type="hidden" class="append_last_purchase_cost1" value="{{ @$unit_price }}"><font class="last_purchase_cost1">{{ @$unit_price }}</font></td><td><input type="hidden" class="append_mark_up_percent1" name="mark_up_percent" value="{{ $updations->mark_up_type }}"><font class="mark_up_percent1" style="font-family: Times new roman;">{{ @$up_type }}</font></td><td><input type="hidden" class="append_mark_up_rs1" name="mark_up_rs" value="{{ $updations->mark_up_value }}"><font class="mark_up_rs1" style="font-family: Times new roman;">{{ $updations->mark_up_value }}</font></td><td><input type="hidden" class="append_mark_down_percent1" name="mark_down_percent" value="{{ $updations->mark_down_type }}"><font class="mark_down_percent1" style="font-family: Times new roman;">{{ @$down_type }}</font></td><td><input type="hidden" class="append_mark_down_rs1" name="mark_down_rs" value="{{ $updations->mark_down_value }}"><font class="mark_down_rs1" style="font-family: Times new roman;">{{ $updations->mark_down_value }}</font></td><td><input type="hidden" value="{{ @$selling_price }}" class="actual_updated_selling_price1"><input type="hidden" value="{{ @$selling_price }}" class="append_updated_selling_price1" name="updated_selling_price"><font style="font-family: Times new roman;" class="updated_selling_price1">{{ @$selling_price }}</font></td><td><i class="fa fa-level-up px-2 py-1 bg-danger text-white rounded up" id="1" aria-hidden="true"></i>&nbsp;<i class="fa fa-level-down px-2 py-1 bg-warning  text-white rounded down" id="1" aria-hidden="true"></i></td></tr>
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
  if(cnt == '')
  {
    $('.up_rs').val('');  
  }
  else
  {
    var selling_price = $('.actual_last_purchase_cost'+cnt).val();
    var up_percent = $('.up_percent').val();

    var percentage_val = parseFloat(selling_price) * parseFloat(up_percent) / 100;

    $('.up_rs').val(parseFloat(percentage_val.toFixed(2)));
  }
}
function up_rupees()
{
  var cnt = $('#tester').val();
  if($('#tester').val() == '')
  {
    $('.up_percent').val('');
  }
  else
  {
    var selling_price = $('.actual_last_purchase_cost'+cnt).val();
    var up_rs = $('.up_rs').val();
    var percentage_val = parseFloat(up_rs)*100/parseFloat(selling_price);

   $(".up_percent").val(percentage_val.toFixed(2));
  }
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

    $('.down_rs').val(parseFloat(percentage_val.toFixed(2)));
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

   $(".down_percent").val(percentage_val.toFixed(2));
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
      else
      {
        var disc_amount_exclusive = parseFloat(up_rs)*100/parseFloat(selling_price);
        var total = parseFloat(selling_price) + parseFloat(up_rs);
        var percentage_val = parseFloat(up_rs);
        var value = 0;
      }
      
      if(parseFloat(total.toFixed(2)) <= parseFloat(mrp) || parseFloat(mrp) == 0)
      {
        if(value == 1)
        {
          $('.updated_selling_price'+count).text(parseFloat(total.toFixed(2)));
          $('.append_updated_selling_price'+count).val(parseFloat(total.toFixed(2)));
          $('.mark_up_percent'+count).text(parseFloat(percent.toFixed(2)));
          $('.append_mark_up_percent'+count).val(parseFloat(percent.toFixed(2)));
          $('.mark_up_rs'+count).text(parseFloat(disc_val_exclusive.toFixed(2)));
          $('.append_mark_up_rs'+count).val(parseFloat(disc_val_exclusive.toFixed(2)));
          $('.mark_down_percent'+count).text('');
          $('.append_mark_down_percent'+count).val('');
          $('.mark_down_rs'+count).text('');
          $('.append_mark_down_rs'+count).val('');
        }
       else
       {
          $('.updated_selling_price'+count).text(parseFloat(total.toFixed(2)));
          $('.append_updated_selling_price'+count).val(parseFloat(total.toFixed(2)));
          $('.mark_up_rs'+count).text(parseFloat(percentage_val.toFixed(2)));
          $('.append_mark_up_rs'+count).val(parseFloat(percentage_val.toFixed(2)));
          $('.mark_up_percent'+count).text(parseFloat(disc_amount_exclusive.toFixed(2)));
          $('.append_mark_up_percent'+count).val(parseFloat(disc_amount_exclusive.toFixed(2)));
          $('.mark_down_percent'+count).text('');
          $('.append_mark_down_percent'+count).val('');
          $('.mark_down_rs'+count).text('');
          $('.append_mark_down_rs'+count).val('');
       }
        
      }
      
    });
  $('.up_percent').val('');
  $('.up_rs').val('');
}

else
{
    var cnt = $('#tester').val();
    var mrp = $('.append_item_mrp'+cnt).val();
    var selling_price = $('.actual_last_purchase_cost'+cnt).val();
    var up_percent = $('.up_percent').val();
    var up_rs = $('.up_rs').val();
      
    var total = parseFloat(selling_price) + parseFloat(up_rs);

    if(parseFloat(total.toFixed(2)) <= parseFloat(mrp) || parseFloat(mrp) == 0)
    {


          $('.updated_selling_price'+cnt).text(parseFloat(total.toFixed(2)));
          $('.append_updated_selling_price'+cnt).val(parseFloat(total.toFixed(2)));
          $('.mark_up_percent'+cnt).text(up_percent);
          $('.append_mark_up_percent'+cnt).val(up_percent);
          $('.mark_up_rs'+cnt).text(up_rs);
          $('.append_mark_up_rs'+cnt).val(up_rs);
          $('.mark_down_percent'+cnt).text('');
          $('.append_mark_down_percent'+cnt).val('');
          $('.mark_down_rs'+cnt).text('');
          $('.append_mark_down_rs'+cnt).val('');


    }
    else
    {
      alert('Selling Price Exceeds MRP!!');
    }
    $('.up_percent').val('');
    $('.up_rs').val('');
}
$('#tester').val('');
$('.price_updation_up').attr('checked', 'checked');
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
      else
      {
        var disc_amount_exclusive = parseFloat(down_rs)*100/parseFloat(selling_price);
        var total = parseFloat(selling_price) - parseFloat(down_rs);
        var percentage_val = parseFloat(down_rs);
        var value = 0;
      }
      
      if(parseFloat(total.toFixed(2)) <= parseFloat(mrp) || parseFloat(mrp) == 0)
      {
        if(value == 1)
        {
          $('.updated_selling_price'+count).text(parseFloat(total.toFixed(2)));
          $('.append_updated_selling_price'+count).val(parseFloat(total.toFixed(2)));
          $('.mark_down_percent'+count).text(parseFloat(percent.toFixed(2)));
          $('.append_mark_down_percent'+count).val(parseFloat(percent.toFixed(2)));
          $('.mark_down_rs'+count).text(parseFloat(disc_val_exclusive.toFixed(2)));
          $('.append_mark_down_rs'+count).val(parseFloat(disc_val_exclusive.toFixed(2)));
          $('.mark_up_percent'+count).text('');
          $('.append_mark_up_percent'+count).val('');
          $('.mark_up_rs'+count).text('');
          $('.append_mark_up_rs'+count).val('');
        }
       else
       {
          $('.updated_selling_price'+count).text(parseFloat(total.toFixed(2)));
          $('.append_updated_selling_price'+count).val(parseFloat(total.toFixed(2)));
          $('.mark_down_rs'+count).text(parseFloat(percentage_val.toFixed(2)));
          $('.append_mark_down_rs'+count).val(parseFloat(percentage_val.toFixed(2)));
          $('.mark_down_percent'+count).text(parseFloat(disc_amount_exclusive.toFixed(2)));
          $('.append_mark_down_percent'+count).val(parseFloat(disc_amount_exclusive.toFixed(2)));
          $('.mark_up_percent'+count).text('');
          $('.append_mark_up_percent'+count).val('');
          $('.mark_up_rs'+count).text('');
          $('.append_mark_up_rs'+count).val('');
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

      
    var total = parseFloat(selling_price) - parseFloat(down_rs);
    var percentage_val = parseFloat(down_rs);
      

    if(parseFloat(total.toFixed(2)) >= parseFloat(selling_price))
    {
      $('.updated_selling_price'+cnt).text(parseFloat(total.toFixed(2)));
      $('.append_updated_selling_price'+cnt).val(parseFloat(total.toFixed(2)));
      $('.mark_down_percent'+cnt).text(down_percent);
      $('.append_mark_down_percent'+cnt).val(down_percent);
      $('.mark_down_rs'+cnt).text(down_rs);
      $('.append_mark_down_rs'+cnt).val(down_rs);
      $('.mark_up_percent'+cnt).text('');
      $('.append_mark_up_percent'+cnt).val('');
      $('.mark_up_rs'+cnt).text('');
      $('.append_mark_up_rs'+cnt).val('');
    }
    else
    {
      alert('Less Than Last Purchase Cost!!');
      $('.updated_selling_price'+cnt).text(parseFloat(total.toFixed(2)));
      $('.append_updated_selling_price'+cnt).val(parseFloat(total.toFixed(2)));
      $('.mark_down_percent'+cnt).text(down_percent);
      $('.append_mark_down_percent'+cnt).val(down_percent);
      $('.mark_down_rs'+cnt).text(down_rs);
      $('.append_mark_down_rs'+cnt).val(down_rs);
      $('.mark_up_percent'+cnt).text('');
      $('.append_mark_up_percent'+cnt).val('');
      $('.mark_up_rs'+cnt).text('');
      $('.append_mark_up_rs'+cnt).val('');
    }
    $('.down_percent').val('');
    $('.down_rs').val('');
}
$('#tester').val('');
$('.price_updation_up').removeAttr('checked');
$('.price_updation_down').attr('checked', 'checked');
  
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

     $('.price_updation_up').attr('checked', 'checked');
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
     $('.price_updation_down').attr('checked', 'checked');

    $('.down_rs').val('');
    $('.down_percent').val('');
    $('.down_percent').focus();
    $('#tester').val($(this).attr('id'));
});

</script>
@endsection

