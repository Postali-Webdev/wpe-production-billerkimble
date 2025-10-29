/**
 * Slick Custom
 *
 * @package Postali Child
 * @author Postali LLC
 */
/*global jQuery: true */
/*jslint white: true */
/*jshint browser: true, jquery: true */

jQuery( function ( $ ) {
	"use strict";

	$('.slides').slick({
		infinite: true,
		autoplay: false,
  		autoplaySpeed: 5000,
  		speed: 1300,
		slidesToShow: 2,
		slidesToScroll: 1,
		arrows: true,
    	swipeToSlide: true,
		cssEase: 'ease-in-out',
		responsive: [
			{
			breakpoint: 667,
				settings: {
					slidesToShow: 1,
				}
			},
		]
	});
	
});