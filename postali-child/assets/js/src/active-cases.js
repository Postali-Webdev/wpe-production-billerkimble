/**
 * Active Cases Scripts
 *
 * @package Postali Child
 * @author Postali LLC
 */
/*global jQuery: true */
/*jslint white: true */
/*jshint browser: true, jquery: true */

jQuery( function ( $ ) {
    $(document).ready(function() {
        let allBtn = "<div class='btn'>See All Active Cases</div>";
        $('show-six').on('load', '#card_8', function() {
            $(this).before(allBtn);
        });

 		
	}); 
	
});
