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








            