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
            <li><button type="button" class="btn btn-success"><a href="{{ route('margin-setup.index') }}">Back</a></button></li>
          </ul>
        </div>
      </div>
    </div>
    <!-- card header end@ -->
    <div class="card-body">
    
      <form  method="post" class="form-horizontal needs-validation" novalidate action="{{route('margin-setup.update',$supplier_id)}}" enctype="multipart/form-data">
      {{csrf_field()}}
      @method('PATCH')

        <div class="form-row">
          <div class="col-md-6">
                  <div class="form-group row">
                    <label for="validationCustom01" class="col-sm-4 col-form-label"> Vendor Name:</label>
                     <div class="col-sm-6">
                      <font> {{ $supplier }} </font>
                     </div>
                  </div>
               </div>
          
        <br>

        <input type="hidden" name="tester" value="" id="tester">

        <div class="form-row col-md-12 mb-3">
          <div class="col-md-6">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label up_percent_label">Margin %:</label>
              <div class="col-sm-8 up_percent_div">
                <input type="text" class="form-control margin_percent_value only_allow_digit_and_dot " placeholder="Margin %" name="margin_percent_value" value="">
                
              </div>

            </div>
          </div>
        </div>

        <div class="col-md-7 text-right">
          <button class="btn btn-success up_update" name="up_update" id="up_update" type="button">Update</button>
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
            <th>Margin Percentage</th>
            <th>Updated Buying Price</th>
          </tr>
        </thead>
        <tbody class="append_item" id="myTable">

          @foreach($updations as $key => $value)
          <tr class="row_category" id="{{++$key}}"><input type="hidden" name="row_check[]" value="1" id="row_check{{$key}}"><td><font style="font-family: Times new roman;">{{$key}}</font><input type="hidden" name="table_count" value=""></td><td><input type="hidden" value="{{@$value->item_id}}" class="append_item_id{{$key}}" name="item_id[]"><input type="hidden" value="{{@$value->item->code}}" class="actual_item_code{{$key}}" name="item_code[]"><input type="hidden" value="{{@$value->item->code}}" class="append_item_code{{$key}}"><font class="item_code{{$key}}" style="font-family: Times new roman;">{{@$value->item->code}}</font></td><td><input type="hidden" value="{{@$value->item->name}}" class="actual_item_name{{$key}}" name="item_name[]"><input type="hidden" value="{{@$value->item->name}}" class="append_item_name{{$key}}"><font class="item_name{{$key}}" style="font-family: Times new roman;">{{@$value->item->name}}</font></td><td><input type="hidden" value="" class="actual_item_brand_name{{$key}}" name="brand_id[]"><input type="hidden" value="" class="append_item_brand_name{{$key}}"><font class="item_brand_name{{$key}}" style="font-family: Times new roman;"><?php @$brand = ($value->item->brand->name == '')? $brand = 'Not Applicable': $brand = $value->item->brand->name;  ?>{{ $brand }}</font></td><td><input type="hidden" value="" class="actual_item_category_name{{$key}}" name="category_id[]"><input type="hidden" value="" class="append_item_category_name{{$key}}"><font class="item_category_name{{$key}}" style="font-family: Times new roman;">{{@$value->item->category->name }}</font></td><td><input type="hidden" value="{{@$value->item->hsn}}" class="actual_item_hsn{{$key}}" name="hsn[]"><input type="hidden" value="{{@$value->item->hsn}}" class="append_item_hsn{{$key}}"><font style="font-family: Times new roman;" class="item_hsn{{$key}}">{{@$value->item->hsn}}</font></td><td><input type="hidden" value="{{@$value->item->mrp}}" class="actual_item_mrp{{$key}}" name="mrp[]"><font class="item_mrp{{$key}}" style="font-family: Times new roman;">{{@$value->item->mrp}}</font></td><td><input type="hidden" value="" class="actual_item_uom{{$key}}" name="uom_id[]"><input type="hidden" value="" class="append_item_uom"><font class="item_uom" style="font-family: Times new roman;">{{@$value->item->uom->name}}</font></td><td><input type="number" name="margin_percentage[]" value="{{ @$value->margin_percentage }}" class="form-control margin_percentage" placeholder="Margin Percentage" id="{{$key}}"></td><td><input type="hidden" value="{{ @$value->buying_price }}" name="updated_buying_price[]" class="actual_updated_buying_price{{$key}}"><font style="font-family: Times new roman;" class="updated_buying_price{{$key}}">{{ @$value->buying_price }}</font></td></tr>
          @endforeach

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

  $("form").submit(function(e)
  {
      var length = $('.row_category').length;
      if(length == 0)
      {
        alert('Choose Any Item!');
        e.preventDefault();
      }
      else
      {

      }    
  });

   

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
            url: "{{ url('margin_setup/change_items/{id}') }}",
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
        url: "{{ url('margin_setup/brand_filter/{id}') }}",
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
        url: "{{ url('margin_setup/browse_item/{id}') }}",
        data: { browse_item: browse_item, brand: brand, categories: categories},             
             
        success: function(data){
          $('.row_brand').remove(); 
        $('.row_category').remove();
        $('#tester').val(''); 
        $(".append_item").html(data);
        }
      });
}


$(document).on('click','.up_update',function(){


  var up_percent = $('.margin_percent_value').val();
  if(up_percent == '')
      {
        alert('Please Provide Any Value');
      }
      else
      {
        $('.margin_percentage').each(function(keys){
          $(this).val(up_percent);
        });

        $('.row_category').each(function(key){
      var count = $(this).attr('id');

      var mrp = $('.actual_item_mrp'+count).val();
      
        var disc_rate = parseFloat(mrp) * parseFloat(up_percent)/100;
        var total = parseFloat(mrp) - parseFloat(disc_rate);
        
        $('.updated_buying_price'+count).text(total);
        $('.actual_updated_buying_price'+count).val(total);
      
      
    });

      }


});

$(document).on('input','.margin_percentage',function(){

  var count = $(this).attr('id');
  var up_percent = $(this).val();

  var mrp = $('.actual_item_mrp'+count).val();

if($(this).val() == '')
{
  $(this).val(0);
  $('.updated_buying_price'+count).text(mrp);
  $('.actual_updated_buying_price'+count).val(mrp);
}
else
{

  var disc_rate = parseFloat(mrp) * parseFloat(up_percent)/100;
  var total = parseFloat(mrp) - parseFloat(disc_rate);
  
  $('.updated_buying_price'+count).text(total);
  $('.actual_updated_buying_price'+count).val(total);
}

});



</script>
@endsection

