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
    var selling_price = $('.actual_item_selling_price'+cnt).val();
    var up_percent = $('.up_percent').val();

    var percentage_val = parseInt(selling_price) * parseFloat(up_percent) / 100;

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
    var selling_price = $('.actual_item_selling_price'+cnt).val();
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
    var selling_price = $('.actual_item_selling_price'+cnt).val();
    var down_percent = $('.down_percent').val();

    var percentage_val = parseInt(selling_price) * parseFloat(down_percent) / 100;

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
    var selling_price = $('.actual_item_selling_price'+cnt).val();
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

      var selling_price = $('.actual_item_selling_price'+count).val();
      var mrp = $('.append_item_mrp'+count).val();
      var up_percent = $('.up_percent').val();
      var up_rs = $('.up_rs').val();
      if(up_percent != '')
      {
        var percentage_val = parseInt(selling_price) * parseFloat(up_percent) / 100;
        var total = parseInt(selling_price) + parseFloat(percentage_val);
      }
      else
      {
        var total = parseInt(selling_price) + parseFloat(up_rs);
        var percentage_val = parseFloat(up_rs);
      }
      
      if(parseFloat(total.toFixed(2)) <= parseFloat(mrp))
      {
        $('.item_selling_price'+count).text(parseFloat(total.toFixed(2)));
        $('.mark_up'+count).text(parseFloat(percentage_val.toFixed(2)));
        $('.append_mark_up'+count).val(parseFloat(percentage_val.toFixed(2)));
        $('.mark_down'+count).text('');
        $('.append_mark_down'+count).val('');
      }
    });
  $('.up_percent').val('');
  $('.up_rs').val('');
}

else
{
    var cnt = $('#tester').val();
    var mrp = $('.append_item_mrp'+cnt).val();
    var selling_price = $('.actual_item_selling_price'+cnt).val();
    var up_percent = $('.up_percent').val();
    var up_rs = $('.up_rs').val();
      if(up_percent != '')
      {
        var percentage_val = parseInt(selling_price) * parseFloat(up_percent) / 100;
        var total = parseInt(selling_price) + parseFloat(percentage_val);
      }
      else
      {
        var total = parseInt(selling_price) + parseFloat(up_rs);
        var percentage_val = parseFloat(up_rs);
      }

    if(parseFloat(total.toFixed(2)) <= parseFloat(mrp))
    {
      $('.item_selling_price'+cnt).text(parseFloat(total.toFixed(2)));
      $('.mark_up'+cnt).text(parseFloat(percentage_val.toFixed(2)));
      $('.append_mark_up'+cnt).val(parseFloat(percentage_val.toFixed(2)));
      $('.mark_down'+cnt).text('');
      $('.append_mark_down'+cnt).val('');
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

      var selling_price = $('.actual_item_selling_price'+count).val();
      var mrp = $('.append_item_mrp'+count).val();
      var down_percent = $('.down_percent').val();
      var down_rs = $('.down_rs').val();
      if(down_percent != '')
      {
        var percentage_val = parseInt(selling_price) * parseFloat(down_percent) / 100;
        var total = parseInt(selling_price) - parseFloat(percentage_val);
      }
      else
      {
        var total = parseInt(selling_price) - parseFloat(down_rs);
        var percentage_val = parseFloat(down_rs);
      }
      
      if(parseFloat(total.toFixed(2)) <= parseFloat(mrp))
      {
        $('.item_selling_price'+count).text(parseFloat(total.toFixed(2)));
        $('.mark_down'+count).text(parseFloat(percentage_val.toFixed(2)));
        $('.append_mark_down'+count).val(parseFloat(percentage_val.toFixed(2)));
        $('.mark_up'+count).text('');
        $('.append_mark_up'+count).val('');
      }
    });
  $('.down_percent').val('');
  $('.down_rs').val('');
}

else
{
    var cnt = $('#tester').val();
    var mrp = $('.append_item_mrp'+cnt).val();
    var selling_price = $('.actual_item_selling_price'+cnt).val();
    var down_percent = $('.down_percent').val();
    var down_rs = $('.down_rs').val();

      if(down_percent != '')
      {
        var percentage_val = parseInt(selling_price) * parseFloat(down_percent) / 100;
        var total = parseInt(selling_price) - parseFloat(percentage_val);
      }
      else
      {
        var total = parseInt(selling_price) - parseFloat(down_rs);
        var percentage_val = parseFloat(down_rs);
      }

    if(parseFloat(total.toFixed(2)) <= parseFloat(mrp))
    {
      $('.item_selling_price'+cnt).text(parseFloat(total.toFixed(2)));
      $('.mark_down'+cnt).text(parseFloat(percentage_val.toFixed(2)));
      $('.append_mark_down'+cnt).val(parseFloat(percentage_val.toFixed(2)));
      $('.mark_up'+cnt).text('');
      $('.append_mark_up'+cnt).val('');
    }
    else
    {
      alert('Selling Price Exceeds MRP!!');
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