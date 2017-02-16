<?php
/**
 * Represents the admin bar node responsible toggling admin notices.
 *
 * @package TAN\Admin
 */

namespace TAN\Admin;

/**
 * Represents the admin bar node responsible toggling admin notices. This works by placing
 * a node in the admin bar just after the 'New Post' admin bar menu item.
 *
 * @package TAN\Admin
 */
class Toggle_Admin_Notices_Node {

	/**
	 * Initializes the class by registering a function with the WordPress `admin_bar_menu` hook.
	 * The hooked function will introduce a new admin bar menu item right after the '+ New'
	 * menu item (unless another plugin has hijacked priorities).
	 */
	public function init() {

		add_action(
			'admin_bar_menu',
			array( $this, 'toggle_notices' ),
			80
		);
	}

	/**
	 * Adds the 'Toggle Admin Notices' to the admin bar.
	 *
	 * @param WP_Admin_Bar $wp_admin_bar A reference to the admin bar where we're adding a new item.
	 */
	public function toggle_notices( $wp_admin_bar ) {

		$args = array(
			'id'    => 'toggle-admin-notices',
			'title' => 'Toggle Admin Notices',
			'href'  => 'javascript:;',
			'meta'  => array(
				'class' => 'toggle-admin-notices',
			),
		);
		$wp_admin_bar->add_node( $args );
	}
}
