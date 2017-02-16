<?php
/**
 * Toggle Admin Notices
 *
 * @package     TAN
 * @author      Tom McFarlin
 * @copyright   2016 Tom McFarlin
 * @license     GPL-2.0+
 *
 * @wordpress-plugin
 * Plugin Name: Toggle Admin Notices
 * Plugin URI:  https://tommcfarlin.com/toggle-admin-notices/
 * Description: Allows you to toggle the display of all errors, warnings, and notices in the WordPress dashboard using the admin bar.
 * Version:     0.1.0
 * Author:      Tom McFarlin
 * Author URI:  https://tommcfarlin.com
 * Text Domain: plugin-name
 * License:     GPL-3.0+
 * License URI: http://www.gnu.org/licenses/gpl-3.0.txt
 */

namespace TAN;
use TAN\Admin;

// TODO Include an autoloader.
include_once( 'admin/class-toggle-admin-notices-node.php' );
include_once( 'admin/interfaces/interface-asset.php' );
include_once( 'admin/class-javascript-assets.php' );

add_action( 'plugins_loaded', __NAMESPACE__ . '\\tan_start' );
/**
 * Initializes the JavaScript loader and the Administration Bar Node for
 * rendering the option to toggle admin notices.
 */
function tan_start() {

	$assets = new Admin\JavaScript_Assets();
	$assets->init();

	$plugin = new Admin\Toggle_Admin_Notices_Node();
	$plugin->init();
}
