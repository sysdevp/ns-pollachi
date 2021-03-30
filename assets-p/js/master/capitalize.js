$(document).on("keyup",".caps",function() {
	var string = $( this).val();
	// var Capitalized = string.replace(/\w\S*/g, function(txt){return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();});
	var Capitalized = string.replace(/\w\S*/g, function(txt){return txt.charAt(0).toUpperCase() + txt.substr(1);});
 	$(this).val(Capitalized);
// var Capitalized = string.charAt(0).toUpperCase() + string.slice(1);

});