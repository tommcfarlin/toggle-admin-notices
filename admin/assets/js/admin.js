/**
 * This script is responsible for toggling the display of all admin notices on the current page.
 *
 * @package TAN\Admin\JS
 */
(function( $ ) {
	'use strict';

	$(function() {

		// Go ahead and setup references to the plugin menu item and all admin notices.
		var $admin_button = $( '#wp-admin-bar-toggle-admin-notices a' ),
			$messages     = $( '.notice, .warning, .error' );

		/**
		 * Hide all of the messages when the option is include and restore the menu items'
		 * defult hover state style.
		 */
		$admin_button.on( 'click', function( evt ) {
			evt.preventDefault();

			$messages.toggle( 'medium' );
			$( this ).trigger( 'blur' );
		});
	});
})( jQuery );
