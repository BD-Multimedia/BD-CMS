$(document).ready(function() {

	// Open menu
	$('#menu-button').click(function(){
		$('#main-nav').css('right', '0px');
	});

	$('#menu-button-close').click(function(){
		$('#main-nav').css('right', '-270px');
	});

});