<?php if( ! defined( 'ABSPATH' ) ) exit;

/*******************************
* Enqueue scripts and styles.
********************************/
 
function allx_anima_scripts() {
	if(!get_theme_mod('allx__header_animation')) {
		wp_enqueue_style( 'allx-anima-css', allx_THEME_URI . 'include/letters/anime.css');
		wp_enqueue_script( 'allx-anima-js', allx_THEME_URI . 'include/letters/anime.min.js', array( 'jquery' ), true);
		wp_enqueue_script( 'allx-anime-custom-js', allx_THEME_URI . 'include/letters/anime-custom.js', array( 'jquery' ), '', true);
	}
		
}

add_action( 'wp_enqueue_scripts', 'allx_anima_scripts' );


