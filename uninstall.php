<?php

//if uninstall not called from WordPress exit
if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	exit();
}

delete_transient( 'bot_posts' );
delete_transient( 'bot_posts_fallback' );

delete_option( 'bot_settings' );