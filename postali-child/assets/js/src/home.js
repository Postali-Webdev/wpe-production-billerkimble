/**
 * Home Page Scripting
 *
 * @package Postali Child
 * @author Postali LLC
 */
/*global jQuery: true */
/*jslint white: true */
/*jshint browser: true, jquery: true */

jQuery( function ( $ ) {

	/* practice area boxes */

	$('.open_1').click(function () { $('#detail_1').toggleClass('clicked', function () { }); });
	$('.open_2').click(function () { $('#detail_2').toggleClass('clicked', function () { }); });
	$('.open_3').click(function () { $('#detail_3').toggleClass('clicked', function () { }); });
	$('.open_4').click(function () { $('#detail_4').toggleClass('clicked', function () { }); });
	$('.open_5').click(function () { $('#detail_5').toggleClass('clicked', function () { }); });
	
});

