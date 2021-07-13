@extends('admin.layout.app')
@section('content')
<main class="page-content">

<div class="col-12 body-sec">
  <div class="card container px-0">
    <!-- card header start@ -->
    <div class="card-header px-2">
      <div class="row">
        <div class="col-4">
          <h3>Margin Setup</h3>
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
    
      <form  method="post" class="form-horizontal needs-validation" novalidate action="{{route('margin-setup.store')}}" enctype="multipart/form-data">
      {{csrf_field()}}

        <div class="form-row">
          <div class="col-md-6">
                  <div class="form-group row">
                    <label for="validationCustom01" class="col-sm-4 col-form-label">Select Vendor :</label>
                     <div class="col-sm-6">
                      <select class="js-example-basic-multiple col-12 form-control custom-select supplier_id" name="supplier_id" id="supplier_id" required="">
                           <option value="">Choose Vendor Name</option>
                           @foreach($supplier as $value)
                           <option value="{{ $value->id }}">{{ $value->name }}</option>
                           @endforeach
                        </select>
                        <span class="mandatory"> {{ $errors->first('email')  }} </span>
                <div class="invalid-feedback">
                  Select valid Vendor 
                </div>
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

        <input type="hidden" name="tester" value="" id="tester">

        <div class="form-row mb-3">
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

