$(document).ready(function() {
	$('.flipster').flipster();

	$('.menu-options').on('click', '.menu-option', function() {
		$(this).find('.submenu-options').slideToggle();
	});

	$('.alpha-only').bind('keyup',function(){ 
	    $(this).val( $(this).val().replace(/[^a-zA-Z]/g,'') ); 
	});

	$('.alpha-space-only').bind('keyup',function(){ 
	    $(this).val( $(this).val().replace(/[^a-zA-Z ]/g,'') ); 
	});

	$('.numbers-only').bind('keyup',function(){ 
	    $(this).val( $(this).val().replace(/[0-9]/g,'') ); 
	});

	$('.isbn-chek').bind('keyup',function(){ 
	     
	});

	$('.year-chek').bind('keyup',function(){ 
		$(this).val( $(this).val().match(/[1-9]{1,4}/) ); 
	});	

	window.setTimeout(function() {
		$('.alert-dismissable').fadeTo('slow', 0.5, function(){
			$('.alert-dismissable').alert('close');
		})
	}, 1000);
});