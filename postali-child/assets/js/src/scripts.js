/**
 * Theme scripting
 *
 * @package Postali Child
 * @author Postali LLC
 */
/*global jQuery: true */
/*jslint white: true */
/*jshint browser: true, jquery: true */

jQuery( function ( $ ) {
	"use strict";
	$('#menu-icon').addClass('open');

	$(function(){  // $(document).ready shorthand
		$('.bio_img img').fadeIn('slow');
	});

	//Hamburger animation
	$('#menu-icon').click(function() {
		$(this).toggleClass('active');
		return false;
	});

	//Toggle mobile menu & search
	$('.toggle-nav').click(function() {
		$('#menu-main-menu').slideToggle(300);
	});
	 
	//Close navigation on anchor tap
	$('.toggle-nav.active').click(function() {	
		$('#menu-main-menu').slideUp(300);
	});	

	//Mobile menu accordion toggle for sub pages
	$('#menu-main-menu > li.menu-item-has-children > a').after('<div class="accordion-toggle"><span class="icon-drw-chevron-down"></span></div>');
	
	$('#menu-main-menu .accordion-toggle').click(function() {
		$(this).parent().find('> ul').slideToggle(300);
		$(this).toggleClass('toggle-background');
		$(this).find('.icon-arrow-down').toggleClass('toggle-rotate');
	});

	// View More Cases
	$('.active-cases #more-active-cases').click(function() {
		$(this).parents('.column-full').find('.show-six').removeClass('show-six');
		$(this).addClass('hide');
	});

	$(document).ready(function() {
		function scrollHandler() {
			var element = document.querySelector('#fade-img > img');
			var box = document.getElementById('att-bio-col');
			var distanceToTop = window.pageYOffset + box.getBoundingClientRect().top;
			var elementHeight = element.offsetHeight;
			var scrollTop = document.documentElement.scrollTop;
			var opacity = 1;
			
			if (scrollTop > distanceToTop) {
				opacity = 1 - ( 0.25 * (scrollTop - distanceToTop) ) / elementHeight;
			}

			if ((window.innerHeight + window.scrollY) >= document.body.offsetHeight) {
				opacity = 0;
			}
			
			if (opacity >= 0) {
				element.style.opacity = opacity;
			}
		}

		if ( $('#bio-container').length ) {
            window.addEventListener('scroll', scrollHandler);
        }
		
	});

	$(".accordion").on("click", ".accordion_title", function() {
		$(this).toggleClass("active").next().slideToggle();
	});

	//copy link
	(function(){
		if ( $('.share-link').length ) {
			$('.share-link').on('click', function(e) {
				e.preventDefault();
				var url = $(this).attr('href');			
				navigator.clipboard.writeText(url);

				$('.text-copied-notif').addClass('active');

				function removeNotif() {
					$('.text-copied-notif').removeClass('active');
				}
				setTimeout(removeNotif, 1500);
			});
		}
	})();

    $(document).ready(function() {
		$('.menu-item-has-children').on('focusin', function() {
			var subMenu = $(this).find('.sub-menu');
			subMenu.css('display', 'block');

			$(this).find('.sub-menu > li:last-child').on('focusout', function() {
				console.log('blur!');
				subMenu.css('display', 'none');
			});
		});
        
        $('.menu-item-has-children').on('mouseover', function() {
			var subMenu = $(this).find('.sub-menu');
			subMenu.css('display', 'block');

			$(this).on('mouseout', function() {
				console.log('blur!');
				subMenu.css('display', 'none');
			});
		});
	});
});