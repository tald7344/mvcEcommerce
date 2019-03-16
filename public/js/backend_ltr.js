$(function () {
	'use strict';

	// Hide The Detail For Categories Section
	$('.custom-card .cat_section h5').on('click', function () {
		$(this).siblings('.full-view').fadeToggle();
	});

});