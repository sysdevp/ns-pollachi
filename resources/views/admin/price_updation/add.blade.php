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
          
        </div>
        <div class="form-row">
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
                  <input type="radio" name="price_updation" onclick="mark_up($(this).val())" value="1" checked="">
                </div>
          <div class="col-md-4">
            <label>Mark Down</label>
                  <input type="radio" name="price_updation" onclick="mark_down($(this).val())" value="0">
          </div>      
            
        </div>

        <div class="form-row mb-3">
          <div class="col-md-6">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label up_percent_label">Mark Up %:</label>
              <div class="col-sm-8 up_percent_div">
                <input type="text" class="form-control up_percent only_allow_digit_and_dot " placeholder="Mark Up %" name="up_percent" onchange="up_percents()" value="">
                
              </div>

              <label for="validationCustom01" class="col-sm-4 col-form-label down_percent_label" style="display: none;">Mark Down %:</label>
              <div class="col-sm-8 down_percent_div" style="display: none;">
                <input type="text" class="form-control down_percent only_allow_digit_and_dot" placeholder="Mark Down %" onchange="down_percent()" name="down_percent" value="">
                
              </div>

            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group row">
              <label for="validationCustom01" class="col-sm-4 col-form-label up_rs_label">Mark Up Rs:</label>
              <div class="col-sm-8 up_rs_div">
                <input type="text" class="form-control up_rs only_allow_digit_and_dot" placeholder="Mark Up Rs" name="up_rs" onchange="up_rs()" value="" >
                
              </div>

              <label for="validationCustom01" style="display: none;" class="col-sm-4 col-form-label down_rs_label">Mark Down Rs:</label>
              <div class="col-sm-8 down_rs_div" style="display: none;">
                <input type="text" class="form-control down_rs only_allow_digit_and_dot" placeholder="Mark Down Rs" name="down_rs" onchange="down_rs()" value="">
                
              </div>

            </div>
          </div>
        </div>

        <div class="col-md-7 text-right">
          <button class="btn btn-success update" name="add" type="button">Update</button>
        </div>

        <div class="col-md-8">
                       <div class="form-group row">
                       <div class="col-md-4">
                       <label for="validationCustom01" class=" col-form-label"><h4>Item Details:</h4> </label><br>
                       
                           
                       </div>
                         </div>
              </div>

        <div class="card-body" style="height: 100%;">
      <table id="" class="table table-striped table-bordered" style="width:100%">
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
            <th>Selling Price</th>
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

     $('.down_rs_label').hide();
     $('.down_percent_label').hide();
     $('.down_rs_div').hide();
     $('.down_percent_div').hide();

   }

   function mark_down(val) 
   {
     $('.up_rs_label').hide();
     $('.up_percent_label').hide();
     $('.up_rs_div').hide();
     $('.up_percent_div').hide();

     $('.down_rs_label').show();
     $('.down_percent_label').show();
     $('.down_rs_div').show();
     $('.down_percent_div').show();

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
          
        $('.row_brand').remove(); 
        $('.row_category').remove(); 
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
          console.log(data);
          $('.row_brand').remove(); 
        $('.row_category').remove(); 
        $(".append_item").html(data);
        }
      });
}

function up_percents()
{
  $('.row_category').each(function(key){
    var count = $(this).attr('id');

    var selling_price = $('.append_item_selling_price'+count).val();
    var mrp = $('.append_item_mrp'+count).val();

    var up_percent = $('.up_percent').val();

  });
}

</script>
@endsection

