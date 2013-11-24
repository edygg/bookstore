$(document).ready(function() {
	$('.flipster').flipster();

	$('.menu-options').on('click', '.menu-option', function() {
		$(this).find('.submenu-options').slideToggle();
	});

	$('.alpha-only').bind('keyup',function() { 
	    $(this).val( $(this).val().replace(/[^a-zA-Z]/g,'') ); 
	});

	$('.alpha-space-only').bind('keyup',function() { 
	    $(this).val( $(this).val().replace(/[^a-zA-Z ]/g,'') ); 
	});

	$('.numbers-only').bind('keyup',function() { 
	    $(this).val( $(this).val().replace(/[0-9]/g,'') ); 
	});

	$('.isbn-chek').bind('keyup',function() { 
	     
	});

	$('.year-chek').bind('keyup',function() { 
		$(this).val( $(this).val().match(/[0-9]{1,4}/) ); 
	});

	$('.book').on('click', 'header', function() {
		$.ajax({
			url: 'BookInformation.php',
			cache: false,
			data: { 'idbook': $(this).closest('.book').data('idbook') }
		})
		  .done( function(html) {
		  	console.log(html);
		  	$(this).closest('.book').find('.book-details').html(html);
		  });
	});	

	window.setTimeout(function() {
		$('.alert-dismissable').fadeTo('slow', 0.5, function(){
			$('.alert-dismissable').alert('close');
		})
	}, 1000);
});