@extends('admin.layout.app')
@section('content')
<main class="page-content">

<style type="text/css">
  tbody#team-list {
    counter-reset: rowNumber;
}

tbody#team-list tr:nth-child(n+1) {
    counter-increment: rowNumber;
}

tbody#team-list tr:nth-child(n+1) td:first-child::before {
    content: counter(rowNumber);
    min-width: 1em;
    margin-right: 0.5em;
}
</style>
<div class="col-12 body-sec">
  <div class="card container-fluid px-0">
    <!-- card header start@ -->
    <div class="card-header px-2">
      <div class="row">
        <div class="col-4">
          <h3>BOM</h3>
        </div>
        <div class="col-8 mr-auto">
          <ul class="h-right-btn mb-0 pl-0">
            <li><button type="button" class="btn btn-success"><a href="{{ route('bom.index') }}">Back</a></button></li>
          </ul>
        </div>
      </div>
    </div>
    <style>
    .table{
      font-size: 13px;
    }
    </style>
    <!-- card header end@ -->
    <div class="card-body">
    


<style type="text/css">
  #middlecol {
   
    width: 45%;
  }

  #middlecol table {
    max-width: 99%;
    width: 100% !important;
  }
</style>


<form  method="post" class="form-horizontal" action="{{ route('bom.store') }}" id="dataInput" enctype="multipart/form-data">
      {{csrf_field()}}

<div class="col-md-12 row mb-3">
      <div class="col-md-3">
                    <label style="font-family: Times new roman;">Item Name</label><br>
                  <div class="form-group row">
                     <div class="col-sm-8">
                      <select class="js-example-basic-multiple col-12 form-control custom-select itemname" name="itemname" id="itemname" >
                           <option value="">Choose Item Name</option>
                           @foreach($item as $value)
                           <option value="{{ $value->id }}">{{ $value->name }}</option>
                           @endforeach
                        </select>
                     </div>
                  </div>
               </div>
</div>

      <div class="col-md-8">
                       <div class="form-group row">
                       <div class="col-md-4">
                       <label for="validationCustom01" class=" col-form-label"><h4>Item Details:</h4> </label><br>
                       
                           
                       </div>
                         </div>
              </div>

      <div class="row col-md-12">

        <div class="col-md-2">
          <label style="font-family: Times new roman;">Item Code</label>
          <input type="text" class="form-control item_code  required_for_proof_valid" placeholder="Item Code" id="item_code" name="item_code" value="" oninput="get_details()">

          <input type="hidden" class="form-control items_codes  required_for_proof_valid" placeholder="Item Code" id="items_codes" name="items_codes" value="">
               
              </div>
              
                      <div class="cat" id="cat" style="display: none;" title="Search Here">
                        <div class="row col-md-8">

                          <div class="col-md-4">
                            <input list="browsers" class="form-control" placeholder="Item Name" name="browse_item" id="browse_item" onchange="browse_item()">
                            <datalist id="browsers">
                              @foreach($item as $key => $value)
                              <option value="{{$value->name}}">
                              @endforeach
                            </datalist>
                          </div>

                          <div class="col-md-4">
                            <select class="js-example-basic-multiple form-control brand" id="brand" name="brand" style="width: 100%;" style="margin-left: 50%;" data-placeholder="Choose Brand Name" onchange="brand_check()">
                          <option></option>
                          <option value="0">Not Applicable</option>
                          @foreach($brand as $brands)
                          <option value="{{ $brands->id }}">{{ $brands->name }}</option>
                          @endforeach
                        </select>

                          </div>
                          <div class="col-md-4">
                            <select class="js-example-basic-multiple form-control categories" id="categories" name="category" style="width: 100%;" style="margin-left: 50%;" data-placeholder="Choose Category" onchange="categories_check()">
                          <option value=""></option>
                          @foreach($categories as $category)
                          <option value="{{ $category->id }}">{{ $category->name }}</option>
                          @endforeach
                        </select>
                          </div>
                          
                        </div><br>
                        
                        <div class="form-row">
                            <div class="col-md-12">
                              <table class="item_code_table" style="width: 100%;">
                                  <thead>
                                  <th style="font-family: Times New Roman;">Select One</th>
                                  <th style="font-family: Times New Roman;">Item Code</th>
                                  <th style="font-family: Times New Roman;">Item Name</th>
                                  <th style="font-family: Times New Roman;">MRP</th>
                                  <th style="font-family: Times New Roman;">UOM</th>
                                  <th style="font-family: Times New Roman;">Brand</th>
                                  <th style="font-family: Times New Roman;">Category</th>
                                  <!-- <th style="font-family: Times New Roman;">PTC Code</th> -->
                                  <th style="font-family: Times New Roman;">Barcode</th>
                                  
                                </thead>
                                <tbody class="append_item">
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
                                  <!-- <th></th> -->
                                </tfoot>
                              </table>
                            </div>
                          </div>
                            
                      </div>


                      <div class="item_display" id="item_display" style="display: none;" title="Choose Item">
                        
                        <div class="form-row">
                            <div class="col-md-12">
                              <table class="item_code_table" style="width: 100%;">
                                  <thead>
                                  <th style="font-family: Times New Roman;">Select One</th>
                                  <th style="font-family: Times New Roman;">Item Code</th>
                                  <th style="font-family: Times New Roman;">Item Name</th>
                                  <th style="font-family: Times New Roman;">MRP</th>
                                  <th style="font-family: Times New Roman;">UOM</th>
                                  <th style="font-family: Times New Roman;">Brand</th>
                                  <th style="font-family: Times New Roman;">Category</th>
                                  <!-- <th style="font-family: Times New Roman;">PTC Code</th> -->
                                  <th style="font-family: Times New Roman;">Barcode</th>
                                  
                                </thead>
                                <tbody class="append_item_display">
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
                                  <!-- <th></th> -->
                                </tfoot>
                              </table>
                            </div>
                          </div>
                            
                      </div>


                      <div class="col-md-2">
                        <label><font color="white" style="font-family: Times new roman;">Find</font></label><br>
                      <input type="button" onclick="find_cat()" class="btn btn-info" value="Find" name="" id="find">
                    </div>
                    <div class="col-md-2">
                      <label style="font-family: Times new roman;">Item Name</label>
                      <input type="text" class="form-control item_name  required_for_proof_valid" id="item_name" placeholder="Item Name" name="item_name" readonly="" id="item_name" value="">
                    </div>


                    <div class="col-md-2">
                        <label style="font-family: Times new roman;">Quantity</label>
                      <input type="number" class="form-control quantity" id="quantity"  placeholder="Quantity" name="quantity" onchange="qty()" pattern="[0-9]{0,100}" title="Numbers Only" value="">
                      </div>

                      <div class="col-md-2">
                      <label style="font-family: Times new roman;">UOM</label>
                      <input type="text" class="form-control uom_name required_for_proof_valid" readonly="" placeholder="UOM" id="uom_name" name="uom_name" value="">

                      <input type="hidden" class="form-control uom_id  required_for_proof_valid"  placeholder="UOM" id="uom_id" name="uom_id" value="">
                       
                      </div>

                      <div class="col-md-2">
                      <label style="font-family: Times new roman;">Min</label>
                      <input type="number" class="form-control uom_name required_for_proof_valid"  placeholder="Min Qty" id="uom_name" name="uom_name" value="">

                      <input type="hidden" class="form-control uom_id  required_for_proof_valid"  placeholder="UOM" id="uom_id" name="uom_id" value="">
                       
                      </div>

                      <div class="col-md-2">
                      <label style="font-family: Times new roman;">Max</label>
                      <input type="number" class="form-control uom_name required_for_proof_valid"  placeholder="Max Qty" id="uom_name" name="uom_name" value="">

                      <input type="hidden" class="form-control uom_id  required_for_proof_valid"  placeholder="UOM" id="uom_id" name="uom_id" value="">
                       
                      </div>


                      </div>
                      
                     
                                                          
                     <div class="" align="center">
                                   
                    <input type="button" class="btn btn-success add_items" value="Add More" name="" id="add_items0">  

                    <input type="button" style="display: none" class="btn btn-success update_items" value="Update" name="" id="update_items"> 

                    <input type="hidden" name="" id="dummy_table_id"> 
                     </div> <br>              
                   
<style>
table, th, td {
  border: 1px solid #E1E1E1;
}
</style>
<div class="form-row">
             
              <div class="col-md-3" id="middlecol">
                
                <table class="table table-responsive" style="float: right;" id="team-list">
                  <thead>
                    <th> S.no </th>
                    <th> Item Code</th>
                    <th> Item Name</th>
                    <th> Quantity</th>
                    <th> UOM</th>
                    <th>Action </th>
                  </thead>
                  <tbody class="append_proof_details" id="mytable">
                    
                  <input type="hidden" name="counts" value="" id="counts">

                  </tbody>
                  <tfoot>
                    <tr>
                      
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      
                    </tr>
                  </tfoot>

                </table>
                
                       </div>

                       <div class="row col-md-12 text-center">
                       <div class="col-md-12 row">
                        <div class="col-md-2">
                          <label style="font-family: Times new roman;">Balck OR White</label>
                        <select class="form-control" name="black_or_white[]">
                          <option value="1">W</option>
                          <option value="0">B</option>
                       </select>
                        </div>
                      </div>
                          <div class="col-md-12">
                            
                          <p>
                             <input type="submit" class="btn btn-success save" name="save" value="Save" value="0">

                          </p>
                          
                        </div>

                      </div>

                        <!-- <div class="row col-md-12 text-center">
                          <div class="col-md-12">
                            
                          <p>
                             <button class="btn btn-success save" name="save" value="0" type="submit">Save</button>
                              <input class="btn btn-warning print" name="save" onclick="new_page()" value="Save & Print" type="button">

                          </p>
                          
                        </div>

                      </div> -->

                       

                     
      </form>
                       
        <script type="text/javascript">

          var i=1;

function add_items()
{
  var j=$('#mytable tr:last').attr('class');
 var l=parseInt(i)+1;
 var uom_name = $('.uom_name').val();
 var uom_id = $('.uom_id').val();
 // var item_code=$("#items_codes option:selected");
 // var item_code=item_code.text();
 var item_code=$("#item_code").val();
 var items_codes=$('#items_codes').val();
 var item_name=$('.item_name').val();
 var mrp=$('.mrp').val();
 var quantity=$('.quantity').val();
 

 if(item_code == '' || quantity == '')
 {
  alert('Please Fill All The Input Fields');
 }
 else if(item_name == '')
 {
  alert('Sorry There Is No  Such Item Code!!');
  $("#item_code").val('');
  $("#item_code").focus();
 }

 else
 {

 
  var items='<tr id="row'+i+'" class="'+i+' tables"><td><span class="item_s_no"> 1 </span></td><td><font class="items'+i+'">'+item_code+'</font></td><td><div class="form-group row"><div class="col-sm-12"><input class="item_name'+i+'" type="hidden" value="'+item_name+'" name="item_name[]"><input type="hidden" class="item_code'+i+'" value="'+items_codes+'" name="item_code[]"><input type="hidden" class="items_id" value="'+items_codes+'"><font class="font_item_name'+i+'">'+item_name+'</font></div></div></td><td><div class="form-group row"><div class="col-sm-12"><input type="hidden" class="quantity'+i+'" value="'+quantity+'" name="quantity[]"><font class="font_quantity'+i+'">'+quantity+'</font></div></div></td><td><div class="form-group row"><div class="col-sm-12"><input type="hidden" class="uom'+i+'" value="'+uom_id+'" name="uom[]"><font class="font_uom'+i+'">'+uom_name+'</font></div></div></td><td><i class="fa fa-eye px-2 py-1 bg-info  text-white rounded show_items" id="'+i+'" aria-hidden="true"></i><i class="fa fa-pencil px-2 py-1 bg-success  text-white rounded edit_items" id="'+i+'" aria-hidden="true"></i><i class="fa fa-trash px-2 py-1 bg-danger  text-white rounded remove_items" id="'+i+'" aria-hidden="true"></i></td></tr>'

var result_val;

if($('.tables').length == 0)
{
  $('.append_proof_details').append(items);
}
else
{
  $('.items_id').each(function(){

    if($(this).val() == items_codes)
    {
      result_val = 1;
      return false;
    }
    else
    {
      result_val = 0;
    }

  });

  if(result_val == 1)
  {
    alert('Item Alredy Taken');
  }
  else
  {
    $('.append_proof_details').append(items);
  }
}




var len=$('.tables').length;
$('#counts').val(len);
i++;


$('#cat').hide();
$('.item_sno').val('');
$('.items_codes').val('');
$('.item_name').val('');
$('.quantity').val('');
$('.item_code').val('');
$('.uom_name').val('');
$('.uom_id').val('');
$("select").select2();
}
} 
$(document).on("click",".add_items",function(){
    add_items();
    item_details_sno();

  });

$(document).on("click",".remove_items",function(){
  

     var button_id = $(this).attr("id");
     var data_val = $('.item_code'+button_id).val();
     var invoice_no=$('.invoice_no'+button_id).val();

     $('#row'+button_id).remove();
     var q=calculate_total_discount();
     $('#total_discount').val(q.toFixed(2));
     $('#disc_total').val(q.toFixed(2));
     var counts = $('#counts').val();
     $('#counts').val(counts-1); 
     item_details_sno();

       
        
        

    var total_net_price=calculate_total_net_price();
    var to_html_total_net = total_net_price.toFixed(2);

    $(".total_net_price").html(parseFloat(to_html_total_net));

    var total_amount=calculate_total_amount();
    var to_html_total_amount = total_amount.toFixed(2);
    $(".total_amount").html(parseFloat(to_html_total_amount));
    $(".total_net_value").text(to_html_total_net);
    var total_gst=calculate_total_gst();

    $("#total_price").val(total_net_price.toFixed(2));
    $("#total_amount").val(total_amount.toFixed(2));
    $("#total_gst").val(total_gst.toFixed(2));
    $("#igst").val(total_gst.toFixed(2));
    var half_gst = parseFloat(total_gst)/2;
    $("#cgst").val(half_gst.toFixed(2));
    $("#sgst").val(half_gst.toFixed(2));
    
    $('#cat').hide();
    $('.item_sno').val('');
    $('.items_codes').val('');
    $('.item_name').val('');
    $('.mrp').val('');
    $('.hsn').val('');
    $('.quantity').val('');
    $('.tax_rate').val('');
    $('#exclusive').val('');
    $('#inclusive').val('');
    $('.amount').val('');
    $('#discount').val('');
    $('#discounts').val('');
    $('.discount_percentage').val('');
    $('.net_price').val('');
    $('.gst').val('');
    $('.item_code').val('');
    $('#last_purchase_rate').val(0);
    $('.uom_inclusive').children('option').remove();
    $('.uom_exclusive').children('option').remove();
    $("select").select2();
    $('.add_items').show();
    $('.update_items').hide();
    

    // $.ajax({
    //        type: "POST",
    //         url: "{{ url('purchase/remove_data/') }}",
    //         data: { invoice_no: invoice_no, gatepass_no: gatepass_no },
    //        success: function(data) {
    //          // console.log(data);
             
    //        }
    //     });


  
});

$(document).on("click",".edit_items",function(){
  $('.update_items').show();
  $('.add_items').hide();

  var id = $(this).attr("id");
  $('#dummy_table_id').val(id);
  var invoice_no = $('.invoice_no'+id).val(); 
  var item_code_id = $('.item_code'+id).val();
  var item_code_name = $('.items'+id).text(); 
  var item_name = $('.item_name'+id).val();
  var hsn = $('.hsn'+id).val(); 
  var mrp = $('.mrp'+id).val();
  var discount_val = $('.discount_val'+id).val(); 
  var exclusive = $('.exclusive'+id).val();
  var inclusive = $('.inclusive'+id).val(); 
  var quantity = $('.quantity'+id).val();
  var uom = $('.uom'+id).val(); 
  var uom_name = $('.font_uom'+id).text();
  var amnt = $('#amnt'+id).val();
  var tax = $('#tax'+id).val(); 
  var tax_gst = $('.tax_gst'+id).val();
  var net_price = $('#net_price'+id).val(); 
  var last_purchase_rate = $('.last_purchase'+id).text();

  $('.exclusive_rate').val(exclusive);
  $('.inclusive_rate').val(inclusive);
  $('.item_sno').val(invoice_no);
  $('.items_codes').val(item_code_id);
  $('.item_name').val(item_name);
  $('.item_code').val(item_code_name);
  $('.mrp').val(mrp);
  $('.hsn').val(hsn);
  $('.quantity').val(quantity);
  $('.tax_rate').val(tax_gst);
  $('.amount').val(amnt);
  $('.net_price').val(net_price);
  $('.gst').val(tax);
  $('.uom').val(uom);
  $('.uom_name').val(uom_name);
  $('#last_purchase_rate').val(last_purchase_rate);
  var disc_value = parseFloat(discount_val)/parseFloat(quantity);
   $('.discount_rs').val(disc_value.toFixed(2));
   discount_calc();
   
  if(discount_val == 0)
  {
    $('.discount_percentage').val('');
  $('.discount_rs').val('');
  }
   // item_codes(item_code_id);

});

$(document).on("click",".refresh_supplier_id",function(){
      var supplier_dets=refresh_supplier_master_details();
      $(".supplier_id").html(supplier_dets);
   });

$(document).on("click",".refresh_agent_id",function(){
      var agent_dets=refresh_agent_master_details();
      $(".agent_id").html(agent_dets);
   });

$(document).on("click",".refresh_expense_type_id",function(){
      var expense_type_dets=refresh_expense_type_master_details();
      $(".expense_type").html(expense_type_dets);
   });

$(document).on("click",".update_items",function(){
  var discount_total = 0;

  var td_id = $('#dummy_table_id').val(); 

 var invoice_no=$('.item_sno').val();
 var item_code=$("#item_code").val();
 var item_name=$('.item_name').val();
 var mrp=$('.mrp').val();
 var quantity=$('.quantity').val();
 var exclusive=$('#exclusive').val();
 var inclusive=$('#inclusive').val();
 var net_price=$('.net_price').val();
  
  if(item_code == '' || invoice_no == '' || quantity == '' || exclusive == '' && inclusive == '')
 {
  alert('Please Fill All The Input Fields');
 }
 else if(item_name == '')
 {
  alert('Sorry There Is No  Such Item Code!!');
  $("#item_code").val('');
  $("#item_code").focus();
 }
 // else if(parseFloat(inclusive)>parseFloat(mrp))
 // {
 //  alert('Rate Exceeds The MRP!!');
 //  $('#exclusive').val('');
 //  $('#inclusive').val('');
 // }

 else
 {
  
  $('.invoice_no'+td_id).val($('.item_sno').val());
  $('.item_no'+td_id).text($('.item_sno').val());
  $('.item_code'+td_id).val($('.items_codes').val());
  $('.items'+td_id).text($('.item_code').val());
  $('.item_name'+td_id).val($('.item_name').val());
  $('.font_item_name'+td_id).text($('.item_name').val());
  $('.hsn'+td_id).val($('.hsn').val());
  $('.font_hsn'+td_id).text($('.hsn').val());
  $('.mrp'+td_id).val($('.mrp').val());
  $('.font_mrp'+td_id).text($('.mrp').val());
  $('.exclusive'+td_id).val($('.exclusive_rate').val());
  $('.font_exclusive'+td_id).text($('.exclusive_rate').val());
  $('.inclusive'+td_id).val($('.inclusive_rate').val());
  $('.quantity'+td_id).val($('.quantity').val());
  $('.font_quantity'+td_id).text($('.quantity').val());
  $('.uom'+td_id).val($('.uom').val());
  $('.font_uom'+td_id).text($('.uom_name').val());
  $('#amnt'+td_id).val($('.amount').val());
  $('.font_amount'+td_id).text($('.amount').val());
  $('#tax'+td_id).val($('.gst').val());
  $('.tax_gst'+td_id).val($('.tax_rate').val());
  $('.font_gst'+td_id).text($('.gst').val());
  $('.last_purchase'+td_id).text($('#last_purchase_rate').val());


   if($('.discount_percentage').val() == '' && $('.discount_rs').val() == '')
   {
    var discount=0;
    $('.discount_val'+td_id).val(discount);
    $('#font_discount'+td_id).text(discount);
    $('#input_discount'+td_id).val(discount);
    var q=calculate_total_discount();
    $('#total_discount').val(q.toFixed(2));
    $('#disc_total').val(q.toFixed(2));

   }
   else
   {
    $('.discount_val'+td_id).val($('#discounts').val());
    $('#font_discount'+td_id).text($('#discounts').val());
    $('#input_discount'+td_id).val($('#discounts').val());
    var q=calculate_total_discount();
    $('#total_discount').val(q.toFixed(2));
    $('#disc_total').val(q.toFixed(2));
   }

  $('#net_price'+td_id).val($('.net_price').val());
  $('.font_net_price'+td_id).text($('.net_price').val());

  var total_net_price=calculate_total_net_price();
  var total_amount=calculate_total_amount();
  var total_gst=calculate_total_gst();
  $("#total_price").val(total_net_price.toFixed(2));
  $(".total_net_value").text(total_net_price.toFixed(2));
  $("#total_amount").val(total_amount.toFixed(2));
  $("#total_gst").val(total_gst.toFixed(2));
  $("#igst").val(total_gst.toFixed(2));
  var half_gst = parseFloat(total_gst)/2;
  $("#cgst").val(half_gst.toFixed(2));
  $("#sgst").val(half_gst.toFixed(2));
  var to_html_total_net = total_net_price.toFixed(2);
  var to_html_total_amount = total_amount.toFixed(2);
  $(".total_net_price").html(parseFloat(to_html_total_net));
  $(".total_amount").html(parseFloat(to_html_total_amount));

  

  
  $('.item_sno').val('');
  $('.items_codes').val('');
  $('.item_name').val('');
  $('.mrp').val('');
  $('.hsn').val('');
  $('.quantity').val('');
  $('.tax_rate').val('');
  $('#exclusive').val('');
  $('#inclusive').val('');
  $('.amount').val('');
  $('#discount').val('');
  $('.discount_percentage').val('');
  $('.net_price').val('');
  $('.gst').val('');
  $('.item_code').val('');
  $('#discounts').val('');
  $('#last_purchase_rate').val(0);
  $('.uom_inclusive').children('option').remove();
  $('.uom_exclusive').children('option').remove();
  $("select").select2();
  $('.update_items').hide();
  $('.add_items').show();
  
  }
  
  });

function item_details_sno(){
  $(".item_s_no").each(function(key,index){
      $(this).html((key+1));
    });
}


  $("form").submit(function(e){
  if($('#total_price').val() == 0 || $('#total_price').val() == '')
  {
    alert('There Is No Row To Submit');
    e.preventDefault();
  }
  else
  {

  }    
    });

function item_codes(item_code,append_value)
{

if(append_value == 1)
{
  var row_id=$('#last').val();

      $.ajax({  
        
        type: "GET",
        url: "{{ url('bom/getdata/{id}') }}",
        data: { id: item_code },             
                        
        success: function(data){ 
          console.log(data);

             id = data[0].item_id;
             name =data[0].item_name;
             code =data[0].code;
             uom_id =data[0].uom_id;
             uom_name =data[0].uom_name;

             $('#items_codes').val(id);
              $('#item_name').val(name);
             
             $('#uom_id').val(uom_id);
              $('#uom_name').val(uom_name);
             
             $('.item_display').dialog('close');
             
        }

    });

}
else
{
  var row_id=$('#last').val();

      $.ajax({  
        
        type: "GET",
        url: "{{ url('bom/getdata/{id}') }}",
        data: { id: item_code },             
                        
        success: function(data){ 

             id = data[0].item_id;
             name =data[0].item_name;
             code =data[0].code;
             uom_id =data[0].uom_id;
             uom_name =data[0].uom_name;

                       
             $('#item_code').val(code);
             $('#items_codes').val(id);
            $('#item_name').val(name);
             $('#uom_id').val(uom_id);
              $('#uom_name').val(uom_name);

             
             $('#cat').dialog('close');
             $('#exclusive').focus();

        }

    });
}


}

function get_details()
{

  var item_code=$('#item_code').val();
  //$('#item_code').val('');
  $('#items_codes').val('');
  $('#item_name').val('');
  $('#mrp').val('');
  $('#hsn').val('');
  $('#uom').val('');
  $('#uom_name').val('');
  $('#tax_rate').val('');
//
$("select").select2();
var row_id=$('#last').val();

      $.ajax({  
        
        type: "GET",
        url: "{{ url('bom/getdata_item/{id}') }}",
        data: { id: item_code },             
                        
        success: function(data){
         console.log(data);
             if(data[3]==1)
             {

             id = data[0].item_id;

             item_codes(id);

             }
                    
             else
             {
              item_with_same_data(item_code);
             }
              
        }

    });


}

function item_with_same_data(item_code)
{
  $.ajax({

        type: "GET",
        url: "{{ url('bom/same_items/{id}') }}",
        data: { id: item_code },

        success:function(data){
          console.log(data);
          $('.item_display').show();
          $('.item_display').dialog({width:1000},{height:250});
          $('.append_item_display').html(data);
        }

  })
}


function find_cat()
{
  
  $('#categories').val("");
  $('#brand').val("");
  $('#browse_item').val("");
  $("select").select2();
  $('#cat').show();
  $('.row_brand').remove(); 
  $('.row_category').remove();
  $('#cat').dialog({width:900},{height:250}).prev(".ui-dialog-titlebar").css("background","#28a745").prev(".ui-dialog.ui-widget-content");
    
}

function browse_item()
{
  var browse_item = $('#browse_item').val();
  $.ajax({  
        
        type: "GET",
        url: "{{ url('bom/browse_item/{id}') }}",
        data: { browse_item: browse_item},             
             
        success: function(data){
          $('.row_brand').remove(); 
        $('.row_category').remove(); 
        $(".append_item").html(data);
        }
      });
}

function categories_check()
{
  var  categories=$('#categories').val();
  var  brand=$('#brand').val();
  if(brand == '')
  {
    brand ='no_val';
  }
  $.ajax({  
        
        type: "GET",
        url: "{{ url('bom/change_items/{id}') }}",
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
  
  var brand = $('.brand').val();
  

  $.ajax({

        type: "POST",
        url: "{{ url('estimation/brand_filter/') }}",
        data: {brand: brand },             
             
        success: function(data)
        {
          $('.row_category').remove();
          $('.row_brand').remove();
          $(".append_item").html(data);
          return false;

          
        }

  });
}

function add_data(val)
{
  // $('.item_display').dialog('close');
  item_codes($('.append_item_id'+val).val(),$('.append_value'+val).val());
}
function add_append_data(val)
{
  item_codes($('.item_id'+val).val(),$('.append_value'+val).val());
}

function code_check()
{
  
  item_codes();
  
}






</script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" rel="stylesheet"/>
<script src="jquery.ui.position.js"></script>


<style type="text/css">
  .ui-dialog.ui-widget-content { background: #a3d072; }
</style>

        

    </div>
    <!-- card body end@ -->
  </div>
</div>
@endsection

