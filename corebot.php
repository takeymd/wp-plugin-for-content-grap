<?php
/*
Plugin Name: Corebot
Version: 1.0
Author: Max Doll

*/

// Plugin Constants
define( 'BOT_VERSION', '1.0.0' );
define('BOT_PLUGIN_URL', plugin_dir_url( __FILE__ ));
define( 'BOT_PLUGIN_DIR', dirname( __FILE__ ) . '/' );

function schedule() {
	echo "<script>alert(0)</script>";
}

/**
 * Load the plugin files at `plugins_loaded:10`
 */
function __bot_bootstrap() {

	// Include Global code
	require BOT_PLUGIN_DIR . 'includes/functions/global.php';

	//wp_schedule_single_event(time() + 50, schedule());

	if( ! is_admin() ) {

		// frontend requests

	} elseif( ! defined( 'DOING_AJAX' ) || ! DOING_AJAX ) {

		// admin requests
		require BOT_PLUGIN_DIR . 'includes/class-admin.php';
		$admin = new BOT_Admin();
		$admin->add_hooks();

	}

}

add_action( 'plugins_loaded', '__bot_bootstrap' );