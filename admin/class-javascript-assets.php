<?php
/**
 * Represents all of the JavaScript assets for the plugin.
 *
 * @package TAN\Admin
 */

namespace TAN\Admin;
use TAN\Admin\Interfaces;

/**
 * Represents all of the JavaScript assets for the plugin. This plugin is meant to run within the
 * context of the administration area of WordPress; otherwise, it would be separated into a
 * public-facing admin class.
 *
 * @package TAN\Admin
 */
class JavaScript_Assets implements Interfaces\Asset {

	/**
	 * Storees the value of the directory where all assets are kept.
	 *
	 * @access private
	 * @var    string $assets_dir The path to the assets.
	 */
	private $assets_dir;

	/**
	 * Stores the value of the directory where JavaScript files are stored.
	 *
	 * @access private
	 * @var    string $js_dir The path to JavaScript files.
	 */
	private $js_dir;

	/**
	 * Initializes this class by setting the values of the instance data. Namely the path to the
	 * assets and the JavaScript directory.
	 */
	public function __construct() {

		$this->assets_dir = trailingslashit(
			plugin_dir_url( __FILE__ ) . 'assets'
		);

		$this->js_dir = trailingslashit( $this->assets_dir . 'js' );
	}

	/**
	 * Initializes the class by registering the necessary functions with the
	 * `admin_enqueue_scripts` WordPress hook. This ensures all dependencies are
	 * registered within the
	 */
	public function init() {

		add_action(
			'admin_enqueue_scripts',
			array( $this, 'enqueue' )
		);
	}

	/**
	 * Enqueues the JavaScript required to control the admin bar in the WordPress admin.
	 *
	 * @access private
	 */
	public function enqueue() {

		wp_enqueue_script(
			'toggle-admin-notices',
			$this->js_dir . 'admin.js',
			array( 'jquery' ),
			false
		);
	}
}
