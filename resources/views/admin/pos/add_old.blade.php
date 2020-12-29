@extends('admin.layout.app')
@section('content')
<div class="row">
<div class="col-8 body-sec">
    <!-- card header start@ -->
   
    <!-- card header end@ -->


    <div class="card-body">
      <div class="col-md-12 row">
      <div class="col-md-2">
          <label style="font-family: Times new roman;">Item Code</label>
          <input type="text" class="form-control item_code  required_for_proof_valid" placeholder="Item Code" id="item_code" name="item_code" value="" oninput="get_details()">

          <input type="hidden" class="form-control items_codes  required_for_proof_valid" placeholder="Item Code" id="items_codes" name="items_codes" value="">

          <input type="hidden" class="form-control item_name  required_for_proof_valid" id="item_name" placeholder="Item Name" name="item_name" readonly="" id="item_name" value="">
          <input type="hidden" class="form-control mrp required_for_proof_valid" placeholder="MRP" id="mrp" name="mrp" value="">

          <input type="hidden" class="form-control" placeholder="" id="counts" name="counts" value="">
               
              </div>
              
                      <div class="cat" id="cat" style="display: none;" title="Search Here">
                        <div class="row col-md-8">
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

                    <style>
                    table, th, td 
                    {
                      border: 1px solid #E1E1E1;
                    }
                    </style>
                        
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
                        <label style="font-family: Times new roman;">Quantity</label>
                      <input type="number" class="form-control quantity" id="quantity"  placeholder="Quantity" name="quantity" oninput="qty()" pattern="[0-9]{0,100}" title="Numbers Only" value="">
                      </div>

                      <div class="col-md-2" id="rate_exclusive">
                        <label style="font-family: Times new roman;">Unit Price</label>
                      <input type="text" class="form-control exclusive_rate" id="exclusive" placeholder="Unit Price" style="margin-right: 80px;" oninput="calc_exclusive()" name="exclusive" pattern="[0-9][0-9 . 0-9]{0,100}" title="Numbers Only" value="">

                      <input type="hidden" class="form-control amount  required_for_proof_valid" placeholder="Amount" id="amount" pattern="[0-9][0-9 . 0-9]{0,100}" title="Numbers Only" name="amount" value="" >
                      </div>
                      <div class="col-md-4">
                      <button type="button" style="width: 100%; height: 100%;" class="btn btn-success btn-lg add_items">ADD</button>
                      </div>
               </div>      

    </div>
    <hr>

    <div class="card-body" style="height: 100%;">
      <table id="" class="table table-striped table-bordered" style="width:100%">
        <thead>
          <tr>
            <th>S.No</th>
            <th>Item Code </th>
            <th>Item Name </th>
            <th>Quantity</th>
            <th>MRP</th>
            <th>Price</th>
            <th>Discount</th>
            <th>Net Price</th>
          </tr>
        </thead>
        <tbody class="append_proof_details" id="myTable">
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
            </tfoot>
      </table>

      <div class="row col-md-12">
        <div class="col-md-4">
            <div class="form-group row">
              <label for="validationCustom01">Customer Id</label>
              <div class="col-sm-8">
                <input type="text" style="height: 25px;" class="form-control customer_id" placeholder="Customer Id" name="customer_id" value="" required>
                
              </div>
            </div>
          </div>

          <div class="col-md-5">
            <div class="form-group row">
              <label for="validationCustom01">Customer Name</label>
              <div class="col-sm-7">
                <input type="text" style="height: 25px;" class="form-control name" placeholder="Customer Name" name="name" value="" required>
                
              </div>
            </div>
          </div>

          <div class="col-md-3">
            <div class="form-group row">
              <label for="validationCustom01">Mobile</label>
              <div class="col-sm-9">
                <input type="text" style="height: 25px;" class="form-control mobile" placeholder="Mobile" name="mobile" value="" required>
                
              </div>
            </div>
          </div>
      </div>

    </div>
    <!-- card body end@ -->
 
</div>

<div class="col-4 body-sec">
   <div class="form-group row">
   <div class="col-md-12">
   <label for="validationCustom01" class=" col-form-label">Last Bill No: </label>
   </div>
  </div>

  <div class="form-group row">
   <div class="col-md-12">
   <label for="validationCustom01" class=" col-form-label">Last Bill Amount: </label>
   </div>
  </div>
<hr>
<div class="form-group row">
   <div class="col-md-12">
   <label for="validationCustom01" class=" col-form-label">Total Item: <font class="total_itme"></font> </label>
   </div>
  </div>

  <div class="form-group row">
   <div class="col-md-12">
   <label for="validationCustom01" class=" col-form-label">Total Quantity: <font class="total_quantity"></font> </label>
   </div>
  </div>

  <div class="form-group row">
   <div class="col-md-12">
   <label for="validationCustom01" class=" col-form-label">Sub Total: <font class="sub_total"></font></label>
   </div>
  </div>

  <div class="form-group row">
   <div class="col-md-12">
   <label for="validationCustom01" class=" col-form-label">Other Charges: </label>
   </div>
  </div>

  <div class="form-group row">
   <div class="col-md-12">
   <label for="validationCustom01" class=" col-form-label">Discount: </label>
   </div>
  </div>

  <div class="p-5 mb-2 bg-success text-white"><center><font color="yellow" size="6">Total&nbsp;&nbsp;&nbsp;</font><font class="total" color="yellow" size="6"></font></center></div>

  <div class="p-5 mb-2 bg-success text-white"><center><font size="5">Received Amount&nbsp;&nbsp;&nbsp;</font><font class="received" size="5"></font></center></div>

  <div class="p-5 mb-2 bg-success text-white"><center><font size="5">Remaining Amount&nbsp;&nbsp;&nbsp;</font><font class="remaining" size="5"></font></center></div>

  <button style="float: left; width: 30%;" type="button" class="btn btn-success">Receipt</button>&nbsp;&nbsp;&nbsp;&nbsp;
  <button type="button" style="width: 30%;" class="btn btn-warning">Save</button>
  <button type="button" style="float: right; width: 30%;" class="btn btn-danger">Cancel</button>

  </div>

  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" rel="stylesheet"/>
<script src="jquery.ui.position.js"></script>


<style type="text/css">
  .ui-dialog.ui-widget-content { background: #a3d072; }
</style> 

  <script type="text/javascript">
          var i=0;
          var discount_total = 0;

function calculate_total_net_price(){
  var total_net_price=0;
  $(".table_net_price").each(function(){
    total_net_price=parseFloat(total_net_price)+parseFloat($(this).val());
  });
  return total_net_price;
}
function calculate_total_amount(){
  var total_amount=0;
  $(".table_amount").each(function(){
    total_amount=parseFloat(total_amount)+parseFloat($(this).val());
  });
  return total_amount;
}

function calculate_total_quantity(){
  var total_quantity=0;
  $(".table_quantity").each(function(){
    total_quantity=parseFloat(total_quantity)+parseFloat($(this).val());
  });
  return total_quantity;
}



function calculate_total_discount()
{
  var q=0;
  if($(".overall_discount").val() == '' || $(".overall_discount").val() == 0)
  {
    $(".input_discounts").each(function(){
    q = parseFloat(q)+parseFloat($(this).val());
    });
    return q;
  }
  else
  {
    $(".font_discount").each(function(){
    q = parseFloat(q)+parseFloat($(this).text());
  });
    return q;
  }
  
}



function add_items()
{
  var j=$('#mytable tr:last').attr('class');
 var l=parseInt(i)+1;
 var voucher_date=$('.voucher_date').val();
 var invoice_no=$('.item_sno').val();
 var uom_name = $('.uom_name').val();
 var uom_id = $('.uom').val();
 // var item_code=$("#items_codes option:selected");
 // var item_code=item_code.text();
 var item_code=$("#item_code").val();
 var items_codes=$('#items_codes').val();
 var item_name=$('.item_name').val();
 var mrp=$('.mrp').val();
 var hsn=$('.hsn').val();
 var gst=$('.gst').val();
 var quantity=$('.quantity').val();
 var tax_rate=$('.tax_rate').val();
 var exclusive=$('#exclusive').val();
 var inclusive=$('#inclusive').val();
 var amount=$('.amount').val();
 var discounts=$('#discounts').val();
 var discount=$('#discount').val();
 var discount_percentage=$('.discount_percentage').val();
 var discount_rs=$('.discount_rs').val();
 var net_price=$('.net_price').val();

 if(discount_rs == '')
 {
  var discount = 0;
 }
 else if(discount_percentage == '' && discount == '')
   {
    var discount=0;
   }
 else
 {
  var discount = discount_rs;
 }

 if(discounts == '')
 {
  discounts =0;
 }
  // if(discount == '' && discount_percentage != '')
  //  {
  //   var discount=discount_percentage+'%';
  //  }

   // else if(discount_percentage == '' && discount != '')
   // {
   //  var discount=discount;
   // }
   
 if(amount == '')
 {
  var amount=0;
 }
 if(net_price == '')
 {
  var net_price=0;
 }

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

 else
 {
 
  var items='<tr id="row'+i+'" class="'+i+' tables"><td><span class="item_s_no"> 1 </span></td><td><div class="form-group row"><div class="col-sm-12"><input type="hidden" class="item_code'+i+'" value="'+items_codes+'" name="item_code[]"><font class="items'+i+'">'+item_code+'</font></div></div></td><td><div class="form-group row"><div class="col-sm-12"><input class="item_name'+i+'" type="hidden" value="'+item_name+'" name="item_name[]"><font class="font_item_name'+i+'">'+item_name+'</font></div></div></td><td><div class="form-group row"><div class="col-sm-12"><input type="hidden" class="quantity'+i+' table_quantity" value="'+quantity+'" name="quantity[]"><font class="font_quantity'+i+'">'+quantity+'</font></div></div></td><td><div class="form-group row"><div class="col-sm-12"><input type="hidden" class="mrp'+i+'" value="'+mrp+'" name="mrp[]"><font class="font_mrp'+i+'">'+mrp+'</font></div></div></td><td><div class="form-group row"><div class="col-sm-12" id="unit_price"><input type="hidden" class="exclusive'+i+'" value="'+exclusive+'" name="exclusive[]"><font class="font_exclusive'+i+'">'+exclusive+'</font></div></div></td><td><div class="form-group row"><div class="col-sm-12"><input type="hidden" class="input_discounts" value="'+0+'" id="input_discount'+i+'" ><input class="discount_val'+i+'" type="hidden" value="'+0+'" name="discount[]"><font class="font_discount" id="font_discount'+i+'">'+0+'</font></div></div></td><td><div class="form-group row"><div class="col-sm-12"><input type="hidden" class="table_net_price" id="net_price'+i+'" value="'+amount+'" name="net_price[]"><font class="font_net_price'+i+'">'+amount+'</font></div></div></td></tr>'

  $('.append_proof_details').append(items);



var total_net_price=calculate_total_net_price();
var total_quantity=calculate_total_quantity();

var len = $('#myTable tr').length;
$('#counts').val(len);
$('.total_itme').text(len);
$('.total_quantity').text(total_quantity);
$('.sub_total').text(total_net_price);
$('.total').text(total_net_price);
i++;

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
}
} 
$(document).on("click",".add_items",function(){
    add_items();
    item_details_sno();

  });

$(document).on("click",".remove_items",function(){
  

     var button_id = $(this).attr("id");
     var invoice_no=$('.invoice_no'+button_id).val();

     $('#row'+button_id).remove();
     $('#total_discount').val(q.toFixed(2));
     $('#disc_total').val(q.toFixed(2));
     var counts = $('#counts').val();
     $('#counts').val(counts-1); 
     item_details_sno();

       
        
        

    var total_net_price=calculate_total_net_price();
    
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

  
function qty()
{
  var rate_exclusive = $('#exclusive').val();

  if(rate_exclusive == '')
  {

  }
  else
  {
    calc_exclusive();
  }
}



function calc_exclusive()
{
  
  var quantity = $('#quantity').val();
  var rate_exclusive = $('#exclusive').val();
  var rate_inclusive = $('#inclusive').val();
  var tax_rate = $('.tax_rate').val();
  var mrp = $('.mrp').val();

  if (quantity == '') 
  {
    alert('Please Enter Quantity First');
    $('#exclusive').val('');
    $('#inclusive').val('');
    $('#quantity').focus();
  }
   
  else
  {
  
      var total = parseInt(quantity)*parseFloat(rate_exclusive);
    
    $('#amount').val(total.toFixed(2));

    if(tax_rate == '')
    {
      $('#net_price').val(total.toFixed(2));
    }
    else
    {

      var rate = parseFloat(tax_rate)/100;
      var gst_rate = parseFloat(rate_exclusive)*parseFloat(rate);
      var gst_rate_inclusive = parseFloat(rate_exclusive)+parseFloat(gst_rate);
      $('#inclusive').val(gst_rate_inclusive.toFixed(2));
      if($('#exclusive').val()>parseFloat(mrp))
      {
        if(mrp == 0 || mrp == '')
        {

        }
        else
        {
          alert('Rate Exceeds The MRP!!');
        $('#exclusive').val('');
        $('#inclusive').val('');
        }
        
      }
      else
      {
        //alert(rate);
      var net_val = parseFloat(total)*parseFloat(rate);
      //alert(net_val);
      $('.gst').val(net_val.toFixed(2));

      var total_net_val = parseFloat(total)+parseFloat(net_val);
      $('#net_price').val(total_net_val.toFixed(2));
      }
      

    }

   } 
  
}


function item_codes(item_code,append_value)
{

if(append_value == 1)
{
  var row_id=$('#last').val();

      $.ajax({  
        
        type: "GET",
        url: "{{ url('estimation/getdata/{id}') }}",
        data: { id: item_code },             
                        
        success: function(data){ 
          //alert(data);
             // $('.uom_exclusive').children('option:(:first)').remove();
             // $('.uom_inclusive').children('option:(:first)').remove();
             $('.uom_exclusive').children('option').remove();
             $('.uom_inclusive').children('option').remove();

             id = data[0].item_id;
             name =data[0].item_name;
             code =data[0].code;
             mrp =data[0].mrp;
             hsn =data[0].hsn;
             uom_id =data[0].uom_id;
             ptc_code =data[0].ptc;
             uom_name =data[0].uom_name;
             igst =data[1].igst;
             barcode = data[2].barcode;
              var first_data='<option value="'+id+'">'+uom_name+'</option>';
              $('.uom_exclusive').append(first_data);
              $('.uom_inclusive').append(first_data);
              for(var i=0;i<data[3].length;i++)
             {
              var item_uom_id=data[3][i].id;
              var item_uom_name=data[3][i].name;
              var item_id=data[3][i].item_id;
              if(item_uom_name == uom_name)
              {

              }
              else
              {
                var div_data='<option value="'+item_id+'">'+item_uom_name+'</option>';
                $('.uom_exclusive').append(div_data);
                $('.uom_inclusive').append(div_data);
              }
              
             }
                       
             //$('#item_code').val(code);
             $('#items_codes').val(id);
            $('#item_name').val(name);
             $('#mrp').val(mrp);
             $('#hsn').val(hsn);
             $('#uom').val(uom_id);
              $('#uom_name').val(uom_name);
             $('#tax_rate').val(igst);

             
             $('.item_display').dialog('close');
             $('#quantity').focus();

             if($('#quantity').val() != '')
             {
              
              var rate_exclusive = $('#exclusive').val();
              var rate_inclusive = $('#inclusive').val();
              var quantity = $('#quantity').val();
              var tax_rate = $('.tax_rate').val();
              var total = parseInt(quantity)*parseFloat(rate_exclusive);
              $('#amount').val(total.toFixed(2));
              if(tax_rate == '')
              {
                $('#net_price').val(total.toFixed(2));
              }
              
              var rate = parseFloat(tax_rate)/100;
              var gst_rate = parseFloat(rate_exclusive)*parseFloat(rate);
              var gst_rate_inclusive = parseFloat(rate_exclusive)+parseFloat(gst_rate);
              $('#inclusive').val(gst_rate_inclusive.toFixed(2));
              var net_val = parseFloat(total)*parseFloat(rate);
      
              $('.gst').val(net_val.toFixed(2));

              var total_net_val = parseFloat(total)+parseFloat(net_val);
              $('#net_price').val(total_net_val.toFixed(2));
             }
            else
            {

            }
        }

    });

      // $.ajax({
      //      type: "POST",
      //       url: "{{ url('estimation/last_purchase_rate/') }}",
      //       data: { id: item_code },
      //      success: function(data) {
      //        $('#last_purchase_rate').val(data);
             
      //      }
      //   });
}
else
{
  var row_id=$('#last').val();

      $.ajax({  
        
        type: "GET",
        url: "{{ url('estimation/getdata/{id}') }}",
        data: { id: item_code },             
                        
        success: function(data){ 
          // console.log(data);
              $('.uom_exclusive').children('option').remove();
              $('.uom_inclusive').children('option').remove();
             // $('.uom_inclusive').children('option:not(:first)').remove();
             id = data[0].item_id;
             name =data[0].item_name;
             code =data[0].code;
             mrp =data[0].mrp;
             hsn =data[0].hsn;
             uom_id =data[0].uom_id;
             ptc_code =data[0].ptc;
             uom_name =data[0].uom_name;
             igst =data[1].igst;
             barcode = data[2].barcode;
              
              var first_data='<option value="'+id+'">'+uom_name+'</option>';
              //console.log(first_data);
              $('.uom_exclusive').append(first_data);
              $('.uom_inclusive').append(first_data);
              for(var i=0;i<data[3].length;i++)
             {
              var item_uom_id=data[3][i].id;
              var item_uom_name=data[3][i].name;
              var item_id=data[3][i].item_id;
              if(item_uom_name == uom_name)
              {

              }
              else
              {
                var div_data='<option value="'+item_id+'">'+item_uom_name+'</option>';
                $('.uom_exclusive').append(div_data);
                $('.uom_inclusive').append(div_data);
              }
              
             }
                       
             $('#item_code').val(code);
             $('#items_codes').val(id);
            $('#item_name').val(name);
             $('#mrp').val(mrp);
             $('#hsn').val(hsn);
             $('#uom').val(uom_id);
              $('#uom_name').val(uom_name);
             $('#tax_rate').val(igst);

             
             $('#cat').dialog('close');
             $('#quantity').focus();

             if($('#quantity').val() != '')
             {
              
              var rate_exclusive = $('#exclusive').val();
              var rate_inclusive = $('#inclusive').val();
              var quantity = $('#quantity').val();
              var tax_rate = $('.tax_rate').val();
              var total = parseInt(quantity)*parseFloat(rate_exclusive);
              $('#amount').val(total.toFixed(2));
              if(tax_rate == '')
              {
                $('#net_price').val(total.toFixed(2));
              }
              var rate = parseFloat(tax_rate)/100;
              var gst_rate = parseFloat(rate_exclusive)*parseFloat(rate);
              var gst_rate_inclusive = parseFloat(rate_exclusive)+parseFloat(gst_rate);
              $('#inclusive').val(gst_rate_inclusive.toFixed(2));
              var net_val = parseFloat(total)*parseFloat(rate);
      
              $('.gst').val(net_val.toFixed(2));

              var total_net_val = parseFloat(total)+parseFloat(net_val);
              $('#net_price').val(total_net_val.toFixed(2));
             }
            else
            {

            }
        }

    });

      // $.ajax({
      //      type: "POST",
      //       url: "{{ url('estimation/last_purchase_rate/') }}",
      //       data: { id: item_code },
      //      success: function(data) {
      //        // console.log(data);
      //        $('#last_purchase_rate').val(data);
             
      //      }
      //   });
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
        url: "{{ url('estimation/getdata_item/{id}') }}",
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
      // var item_id=$('#items_codes').val();
      // $.ajax({

      //      type: "POST",
      //       url: "{{ url('estimation/last_purchase_rate/') }}",
      //       data: { id: item_id },
      //      success: function(data) {
      //        $('#last_purchase_rate').val(data);
             
      //      }
      //   });


}

function item_with_same_data(item_code)
{
  $.ajax({

        type: "GET",
        url: "{{ url('estimation/same_items/{id}') }}",
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
  $("select").select2();
  $('#cat').show();
  $('.row_brand').remove(); 
  $('.row_category').remove();
  $('#cat').dialog({width:900},{height:250}).prev(".ui-dialog-titlebar").css("background","#28a745").prev(".ui-dialog.ui-widget-content");
    
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
        url: "{{ url('estimation/change_items/{id}') }}",
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

   
@endsection