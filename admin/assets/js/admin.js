/**
 * This script is responsible for toggling the display of all admin notices on the current page.
 *
 * @package TAN\Admin\JS
 */
( function( $ ) {
	'use strict';

	$( function() {

		// Go ahead and setup references to the plugin menu item and all admin notices.
		var $admin_button = $( '#wp-admin-bar-toggle-admin-notices a' ),
			$messages     = $( '.notice, .warning, .error' ),
			currentState  = localStorage.getItem( 'toggleAdminNoticesState' );

		if ( null === currentState ) {
			currentState = 'show';
			localStorage.setItem( 'toggleAdminNoticesState', currentState );
		}

		/**
		 * Toggle the state and save the setting to the local storage
		 */
		var toggleState = function toggleState() {
			currentState = 'show' === currentState ? 'hide' : 'show';
			localStorage.setItem( 'toggleAdminNoticesState', currentState );
		}

		/**
		 * Hide all of the messages when the option is include and restore the menu items'
		 * defult hover state style.
		 */
		$admin_button.on( 'click', function( evt ) {
			evt.preventDefault();

			$messages.toggle( 'medium' );
			$( this ).trigger( 'blur' );

			toggleState();
		} );

		/**
		 * Permanently hidden
		 */
		if ( 'hide' === currentState ) {
			$messages.hide();
		}
	} );
} )( jQuery );
