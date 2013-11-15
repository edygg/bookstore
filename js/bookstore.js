$(document).ready(function() {
	$('.flipster').flipster();

	$('.menu-options').on('click', '.menu-option', function() {
		$(this).find('.submenu-options').slideToggle();
	});
});