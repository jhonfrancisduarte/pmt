<?php

define('WP_HOME', 'http://localhost/pmt-tpb');
define('WP_SITEURL', 'http://localhost/pmt-tpb');

define( 'DB_NAME','pmt-tpb' );
define( 'DB_USER', 'root');
define( 'DB_PASSWORD', '' );

define( 'DB_HOST', 'localhost' );
define( 'DB_CHARSET', 'utf8' );
define( 'DB_COLLATE',  '' );

define( 'AUTH_KEY',        'aaa12be6de2043cb894dfc944284ceb25e2c8ab9' );
define( 'SECURE_AUTH_KEY', '701d9da0a370c5c5765e9207173ab4dcaef17b61' );
define( 'LOGGED_IN_KEY',   'ce47a15a8fe916d9ce954f3776199c4ca06a7f68' );
define( 'NONCE_KEY',       '373d0fa11a1cbde26ed0886ae662b0f4b5f0e263' );
define( 'AUTH_SALT',       'ca5f30cadd25b517446eef01f98b967f0cf6a6b1' );
define( 'SECURE_AUTH_SALT','ef182a3d4dae6e5dbc17423252ce2761d00f3af0' );
define( 'LOGGED_IN_SALT',  '81a706b4508a3bffcea18155b02a7441d97e487b' );
define( 'NONCE_SALT',      '012cd8d83370852cd13ef6d42292c055ded4cd49' );

$table_prefix = 'wp_';

define( 'WP_DEBUG', false );

if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

require_once ABSPATH . 'wp-settings.php';
