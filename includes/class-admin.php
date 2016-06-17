<?php

if( ! defined( 'BOT_VERSION' ) ) {
	exit;
}

class BOT_Admin {

	/**
	 * @var bool
	 */
	/*private $cache_cleared = false;*/

	/**
	 * Add hooks
	 */
	public function add_hooks() {
		//add_action( 'init', array( $this, 'on_init' ) );
		add_action( 'admin_init', array( $this, 'register_settings' ) );
		add_action( 'admin_menu', array( $this, 'build_menu' ) );

	}

	

	/**
	 * Register settings
	 */
	public function register_settings() {
		register_setting( 'bot_settings_group', 'bot_settings', array( $this, 'sanitize_settings' ) );
	}

	/**
	 * Sanitize settings
	 *
	 * @param $opts
	 *
	 * @return mixed
	 */
	public function sanitize_settings( $opts ) {
		$old_opts = bot_get_settings();

		// fb config
		$opts['schedule'] = sanitize_text_field( $opts['schedule'] );
		$opts['language'] = sanitize_text_field( $opts['language'] );

		// If FB configuration changed, delete transients with posts cache so they'll be renewed
		if( ( $old_opts['schedule'] !== $opts['schedule'] ) ||  ( $old_opts['language'] !== $opts['language']) ) {

			// delete cache transients
			delete_transient('bot_posts');
			delete_transient('bot_posts_fallback');

		}

		return $opts;
	}

	/**
	 * Add page to WP Admin > Settings
	 */
	public function build_menu() {
		//$page = add_options_page( 'Recent Facebook Posts - Settings', 'Recent Facebook Posts', 'manage_options', 'rfbp', array( $this, 'settings_page' ) );
		add_menu_page( 'CoreBot Plugin', 'Core Bot', 'manage_options', 'bot', array( $this, 'settings_page' ), /*BOT_PLUGIN_URL . 'corebot.png'*/'', 70);
		add_submenu_page('bot', 'Grabber Content', 'WP Graber', 'manage_options', 'graber', array($this, 'setting_graber'));
	}

	function setting_graber() {
		$opts = bot_get_settings();
		include BOT_PLUGIN_DIR . 'includes/views/setting_graber.php';
	}

	/**
	 * Shows the settings page
	 */
	public function settings_page() {

		$opts = bot_get_settings();

		include BOT_PLUGIN_DIR . 'includes/views/settings_page.php';
	}

	
}
