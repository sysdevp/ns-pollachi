var i =$('#opening_cnt').val();
var cnt = 0;

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

$(document).on('click','#add_opening',function(){

	$('.batch_no').each(function(key){

		if($(this).val() == '')
		{
			alert('Enter Batch No');
			key.preventDefault();
			$(this).closest($('.opening_row')).remove();
			
		}

	});

	$('.quantity').each(function(key){

		if($(this).val() == '')
		{
			alert('Enter Quantity No');
			key.preventDefault();
			
		}

	});

	$('.rate').each(function(key){

		if($(this).val() == '')
		{
			alert('Enter Rate No');
			key.preventDefault();
			

		}

	});

	var opening_details = "";

	opening_details+= '<div class="row mb-3 opening_row">\
                     <div class="col-md-2">\
                  <!-- <div class="form-group row"> -->\
                     <label for="validationCustom01" class="">Batch No</label>\
                     <!-- <div class="col-sm-8"> -->\
                       <input type="text" placeholder="Batch No" required="" name="batch_no[]" class="form-control batch_no" >\
                     <span class="mandatory"> </span>\
                     <div class="invalid-feedback">\
                           Enter valid Batch No\
                     </div>\
                     <!-- /div>\
                  </div> -->\
               </div>\
                  <div class="col-md-2">\
                  <!-- <div class="form-group row"> -->\
                     <label for="validationCustom01" class="">Opening Quantity<span class="mandatory">*</span></label>\
                     <!-- <div class="col-sm-8"> -->\
                       <input type="text" required="" placeholder="Opening Quantity" name="quantity[]" class="form-control quantity mandatory" >\
                     <!-- </div> -->\
                     <span class="mandatory"> </span>\
                     <div class="invalid-feedback">\
                           Enter valid Quantity\
                     </div>\
                  <!-- </div> -->\
               </div>\
                                 <div class="col-md-1">\
                  <!-- <div class="form-group row"> -->\
                     <label for="validationCustom01" class="">Rate</label>\
                     <!-- <div class="col-sm-8"> -->\
                       <input type="text" placeholder="Rate" name="rate[]" class="form-control rate" >\
                     <!-- /div>\
                  </div> -->\
               </div>\
                                 <div class="col-md-2">\
                  <!-- <div class="form-group row"> -->\
                     <label for="validationCustom01" class="">Amount</label>\
                     <!-- <div class="col-sm-8"> -->\
                       <input type="text" name="amount[]" readonly placeholder="Amount" class="form-control amount" >\
                     <!-- </div>\
                     \
                  </div> -->\
               </div>\
                                 <div class="col-md-2">\
                  <!-- <div class="form-group row"> -->\
                     <label for="validationCustom01" class="">Applicable Date</label>\
                     <!-- <div class="col-sm-8"> -->\
                       <input type="date" name="applicable_date[]" class="form-control applicable_date" >\
                     <!-- /div>\
                  </div> -->\
               </div>\
               <div class="col-md-1">\
                  <!-- <div class="form-group row"> -->\
                     <label for="validationCustom01" class="">W/B</label>\
                     <!-- <div class="col-sm-8"> -->\
                       <select class="form-control" name="black_or_white[]">\
                          <option value="1">W</option>\
                          <option value="0">B</option>\
                       </select>\
                     <!-- /div>\
                  </div> -->\
               </div>\
               <div class="col-md-2 mt-4">\
                  <input type="button" id="add_opening" class="btn btn-success mb-3" name="" value="+">\
                  <input type="button" id="remove_opening" class="btn btn-danger mb-3" name="" value="-">\
               </div>\
            </div>';

$('.openings').append(opening_details);
++i;
$('#opening_cnt').val(i);
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
		$('#opening_cnt').val(--i);
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








            