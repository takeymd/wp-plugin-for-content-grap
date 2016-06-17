<?php

include('simple_html_dom.php');

if( ! defined( 'BOT_VERSION' ) ) {
	exit;
}

/**
 * Get the plugin settings (merged with defaults)
 *
 * @return array
 */
function bot_get_settings() {

	static $settings = null;

	if ( is_null( $settings ) ) {

		$defaults = array(
			'schedule' => '',
			'language' => ''
		);

		// get user options
		$options = get_option( 'bot_settings', array() );
		$settings = array_merge( $defaults, $options );
	}

	return $settings;
}

function get_grab_content($sitename) {
	$appStore = array();
	$contents = get_option( 'grab_content', array() );
	switch ($sitename) {
		case 'google_play':
			$html = file_get_html('https://play.google.com/store/apps');
			foreach($html->find('div.card-content') as $div) {
				$href = 'https://play.google.com' . $div->find('a.card-click-target')[0]->href;
				$image = $div->find('img.cover-image')[0]->src;
				$title = $div->find('a.title')[0]->innertext;
				$app = array(
					'href' => $href,
					'image' => $image,
					'title' => $title
				);
				array_push($appStore, $app);
			}
			if (empty($contents)) add_option('grab_content', $appStore);
			else update_option('grab_content', $appStore);
			break;
	}
	return $appStore;
}

/**
 * @return bool
 */
function bot_valid_config() {
	$opts = bot_get_settings();
	return ( ! empty( $opts['schedule'] ) && ! empty( $opts['language'] ));
}

function get_languages() {
	$langJson = wp_remote_fopen(BOT_PLUGIN_URL . 'languages.json');
	$langStr = json_decode($langJson, true);
	return $langStr;
}

function get_localeStr($key) {
	$opts = bot_get_settings();
	$lang = empty($opts['language'])? "en" : $opts['language'];
	$locales = get_languages();
	return $locales[$lang][$key];
}