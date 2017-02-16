<?php
/**
 * This interface defines the functions all server-side asset classes
 * should implement.
 *
 * @package TAN\Admin\Interfaces
 */

namespace TAN\Admin\Interfaces;

interface Asset {

	/**
	 * This function should be implemented for registering hooks with WordPress.
	 */
	public function init();

	/**
	 * This function should be used to enqueue the necessary assets with WordPress.
	 * Specifically, this should be used for JavaScript or CSS.
	 */
	public function enqueue();
}
