@extends('admin.layout.app')
@section('content')
<div class="col-12 body-sec">
  <div class="card container px-0">
    <!-- card header start@ -->
    <div class="card-header px-2">
      <div class="row">
        <div class="col-4">
          <h3>Price Updation</h3>
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
    
      <form  method="post" class="form-horizontal needs-validation" novalidate action="{{route('price_updation.store')}}" enctype="multipart/form-data">
      {{csrf_field()}}

        <div class="form-row">
          <div class="col-md-6">
                  <div class="form-group row">
                    <label for="validationCustom01" class="col-sm-4 col-form-label">With Effect From :</label>
                     <div class="col-sm-6">
                      <input type="date" name="effective_from" class="form-control" value="{{$date}}">
                     </div>
                  </div>
               </div>
          <div class="col-md-6">
                  <div class="form-group row">
                    <label for="validationCustom01" class="col-sm-4 col-form-label">Category :</label>
                     <div class="col-sm-6">
                      <select class="js-example-basic-multiple col-12 form-control custom-select category_id" name="category_id" onchange="categories_check()" id="category_id">
                           <option value="">Choose Category Name</option>
                           @foreach($category as $value)
                           <option value="{{ $value->id }}">{{ $value->name }}</option>
                           @endforeach
                        </select>
                     </div>
                  </div>
               </div>
        </div>
        <div class="form-row">

          <div class="col-md-6">
                  <div class="form-group row">
                    <label for="validationCustom01" class="col-sm-4 col-form-label">Brand Name :</label>
                     <div class="col-sm-6">
                      <select class="js-example-basic-multiple col-12 form-control custom-select brand_id" name="brand_id" onchange="brand_check()" id="brand_id">
                           <option value="">Choose Brand Name</option>
                           <option value="0">Not Applicable</option>
                           @foreach($brand as $value)
                           <option value="{{ $value->id }}">{{ $value->name }}</option>
                           @endforeach
                        </select>
                     </div>
                  </div>
               </div>

          <div class="col-md-6">
                  <div class="form-group row">
                    <label for="validationCustom01" class="col-sm-4 col-form-label">Item Name :</label>
                     <div class="col-sm-6">
                      <select class="js-example-basic-multiple col-12 form-control custom-select" name="browse_item" id="browse_item" onchange="browse_items()">
                           <option value="">Choose Item Name</option>
                           @foreach($item as $value)
                           <option value="{{ $value->id }}">{{ $value->name }}</option>
                           @endforeach
                        </select>
                     </div>
                  </div>
               </div>
        </div>
        <br>
        <div class="form-row mb-3">
          <div class="col-md-4">
            <label>Mark Up</label>
                  <input type="radio" class="price_updation_up" name="price_updation" onclick="mark_up($(this).val())" value="1" checked="">
                </div>
          <div class="col-md-4">
            <label>Mark Down</label>
                  <input type="radio" name="price_updation" class="price_updation_down" onclick="mark_down($(this).val())" value="0">
          </div>      
            
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
            <th>Tax</th>
            <th>Mark Up  Type</th>
            <th>Mark Up Value</th>
            <th>Mark Down Type</th>
            <th>Mark Down Value</th>
            <th>Last Selling Price</th>
            <th>Updated Selling Price</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody class="append_item" id="myTable">
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
      else
      {
        var disc_amount_exclusive = parseFloat(up_rs)*100/parseFloat(selling_price);
        var total = parseFloat(selling_price) + parseFloat(up_rs);
        var percentage_val = parseFloat(up_rs);
        var value = 2;
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
      else
      {
        var disc_amount_exclusive = parseFloat(up_rs)*100/parseFloat(selling_price);
        var total = parseFloat(selling_price) + parseFloat(up_rs);
        var percentage_val = parseFloat(up_rs);
        var value = 2;
      }

    if(parseFloat(total.toFixed(2)) <= parseFloat(mrp) || parseFloat(mrp) == 0)
      {
        if(value == 1)
        {
          $('#row_check'+count).val(1);
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
          $('#row_check'+count).val(1);
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
        var value = 2;
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
          $('.mark_down_rs'+count).text(parseFloat(percentage_val.toFixed(2)));
          $('.append_mark_down_rs'+count).val(parseFloat(percentage_val.toFixed(2)));
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
      else
      {
        var disc_amount_exclusive = parseFloat(down_rs)*100/parseFloat(selling_price);
        var total = parseFloat(selling_price) - parseFloat(down_rs);
        var percentage_val = parseFloat(down_rs);
        var value = 2;
      }
      

    if(parseFloat(total.toFixed(2)) >= parseFloat(selling_price))
      {
        if(value == 1)
        {
          $('#row_check'+count).val(1);
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
          $('#row_check'+count).val(1);
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
          $('#row_check'+count).val(1);
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
          $('#row_check'+count).val(1);
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

