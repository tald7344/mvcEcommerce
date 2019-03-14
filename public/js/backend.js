$(function () {
	'use strict';

	$('.custom-card .cat_section h5').on('click', function () {
		$(this).siblings('.full-view').fadeToggle();
	});

});