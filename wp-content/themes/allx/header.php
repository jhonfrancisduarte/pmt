<?php
	// Do not allow direct access to the file.
	if( ! defined( 'ABSPATH' ) ) {
		exit;
	}
	/**
		* The header for our theme
		*
	*/
?>
<!DOCTYPE html>
<html itemscope itemtype="http://schema.org/WebPage" <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="profile" href="https://gmpg.org/xfn/11">
		<meta http-equiv="Permissions-Policy" content="interest-cohort=()">
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>
		<?php if ( function_exists( 'wp_body_open' ) ) { wp_body_open(); } else { do_action( 'wp_body_open' ); } ?>
		<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'allx' ); ?></a>
		<?php
			allx__header();
			if( is_front_page() && get_theme_mod( 'allx_slicebox_activate' ) ) {
			    echo allx_slicebox();
			}			
			if ( get_theme_mod('top_icons_show') == "all" ) {
				do_action('top_icons_allx');
			}
			if( is_front_page() || is_home() ) {
				
				if( get_theme_mod('top_icons_show', 'home') == "home" ) {
					do_action('top_icons_allx');
				}
				do_action('layout_left');
				do_action('layout_right');
			}

		?>
	<div id="content" class="site-content<?php if( is_page_template( 'templeat-page-bilder.php' ) ) { echo "bilder-template"; }?>">	