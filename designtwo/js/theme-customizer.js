/*
 * Partially based on Tom McFarlin's Theme Customizer Example (GPLv2)
 * See https://github.com/tommcfarlin/theme-customizer-example/
 */
(function( $ ) {
	"use strict";

	wp.customize( 'ed2_color_scheme', function( value ) {
		value.bind( function( to ) {

			var oldStylesheetURI = $( '#color-css' ).attr('href');
			var newStylesheetURI;
			var regEx = /\w+\.css/;
			switch (to) {
				case 'purple':
				case 'teal':
					newStylesheetURI = oldStylesheetURI.replace(regEx, to + '.css');
				break;
				case 'orange':
				default:
					newStylesheetURI = oldStylesheetURI.replace(regEx, 'orange.css');
				break;
			}
			$( '#color-css' ).attr('href', newStylesheetURI);
		});
	});

})( jQuery );
