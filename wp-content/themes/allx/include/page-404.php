<?php if( ! defined( 'ABSPATH' ) ) exit;
	
function allx__404_styles () {
    $image_404_style = '
		.error404 #content {
			max-width: 100%;
			background-size: cover;
			background-position: center;
			width: 100%;
			background-repeat: no-repeat;
			background-image: url('.allx_THEME_URI.'images/404.webp);
		}
			
		.error-404 p {
			color: #c0c0c0;
		}
			
		.error-404 .cont-404 {
			color: #c0c0c0;
			font-size: 1.5em;
		}
			
		.error-404 h2 {
			color: #c0c0c0;
			font-size: 10.5em;
			margin: 10px;
		}
		';
	wp_add_inline_style( 'custom-style-css', $image_404_style );
}
add_action( 'wp_enqueue_scripts', 'allx__404_styles' );