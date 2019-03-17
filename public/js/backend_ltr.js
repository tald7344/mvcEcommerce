$(function () {
	'use strict';

	// Hide The Detail For Categories Section
	$('.custom-card .cat_section h5').on('click', function () {
		$(this).siblings('.full-view').fadeToggle();
	});

	// Show And Hide Control Edit/Delete In Category Page
	$('.custom-card .cat_section').hover(function () {
		$(this).find('.control_section').css('right', '0');
	}, function () {
		$(this).find('.control_section').css('right', '-137px');
	});


	// Hide The Session Message After Show It
	$('.hidden').delay(5000).fadeOut(1000);	

});