<?php if( ! defined( 'ABSPATH' ) ) exit;
	function allx_animation() { 
		$article_speed = get_theme_mod( 'allx_animation_content_speed' );	
		$speed = get_theme_mod('allx_sub_menu_animation_speed');
		$gallery_speed = get_theme_mod( 'allx_animation_gallery_speed' );
		$sidebar_speed = get_theme_mod( 'allx_animation_sidebar_speed' );	
		$popular_speed = get_theme_mod( 'allx_animation_popular_speed' );	
		$about_us_speed = get_theme_mod( 'allx_animation_about_speed' );
		$footer_speed = get_theme_mod( 'allx_animation_footer_speed' );		
		$animation_speed_1 = get_theme_mod( 'allx_icons_animation_speed_1' );	
		$animation_speed_2 = get_theme_mod( 'allx_icons_animation_speed_2' );	
		$animation_speed_3 = get_theme_mod( 'allx_icons_animation_speed_3' );	
		$animation_speed_4 = get_theme_mod( 'allx_icons_animation_speed_4' );	
		$animation_speed_5 = get_theme_mod( 'allx_icons_animation_speed_5' );	
		$animation_speed_6 = get_theme_mod( 'allx_icons_animation_speed_6' );	
		$animation_speed_7 = get_theme_mod( 'allx_icons_animation_speed_7' );	
		$animation_speed_8 = get_theme_mod( 'allx_icons_animation_speed_8' );	
		$animation_speed_9 = get_theme_mod( 'allx_icons_animation_speed_9' );		
	?>
	<style>
		<?php if (get_theme_mod( 'allx_animation_content'  )) { ?>			
			article {
			-webkit-animation-duration: <?php if ($article_speed ) { echo esc_html( $article_speed ); } else echo "0.3"; ?>s !important;
			animation-duration: <?php if ($article_speed ) { echo esc_html( $article_speed ); } else echo "0.3"; ?>s !important;
			-webkit-animation-fill-mode: both;
			animation-fill-mode: both;
			-webkit-transition: all 0.1s ease-in-out;
			-moz-transition: all 0.1s ease-in-out;
			-o-transition: all 0.1s ease-in-out;
			-ms-transition: all 0.1s ease-in-out;
			transition: all 0.1s ease-in-out;
			}
		<?php } ?>
		
		.main-navigation ul li:hover > ul {
		-webkit-animation-duration: <?php echo $speed; ?>s !important;
		animation-duration: <?php echo $speed; ?>s  !important;
		-webkit-animation-fill-mode: both;
		animation-fill-mode: both;
		-webkit-transition: all 0.1s ease-in-out;
		-moz-transition: all 0.1s ease-in-out;
		-o-transition: all 0.1s ease-in-out;
		-ms-transition: all 0.1s ease-in-out;
		transition: all 0.1s ease-in-out;
		z-index: 99999;
		}
		
		<?php if (get_theme_mod( 'allx_animation_gallery'  )) { ?>		
			#seos-gallery a, .album a {
			-webkit-animation-duration: <?php if ($gallery_speed) { echo esc_html( $gallery_speed ); } else echo "0.3"; ?>s !important;
			animation-duration: <?php if ($gallery_speed) { echo esc_html( $gallery_speed ); } else echo "0.3"; ?>s !important;		
			-webkit-animation-fill-mode: both;
			animation-fill-mode: both;
			-webkit-transition: all 0.1s ease-in-out;
			-moz-transition: all 0.1s ease-in-out;
			-o-transition: all 0.1s ease-in-out;
			-ms-transition: all 0.1s ease-in-out;
			transition: all 0.1s ease-in-out;
			}
		<?php } ?>

		<?php if (get_theme_mod( 'allx_animation_about'  )) { ?>		
			.about-us-container, .about_us-card {
			-webkit-animation-duration: <?php if ($about_us_speed) { echo esc_html( $about_us_speed ); } else echo "0.3"; ?>s !important;
			animation-duration: <?php if ($about_us_speed) { echo esc_html( $about_us_speed ); } else echo "0.3"; ?>s !important;		
			-webkit-animation-fill-mode: both;
			animation-fill-mode: both;
			-webkit-transition: all 0.1s ease-in-out;
			-moz-transition: all 0.1s ease-in-out;
			-o-transition: all 0.1s ease-in-out;
			-ms-transition: all 0.1s ease-in-out;
			transition: all 0.1s ease-in-out;
			}
		<?php } ?>
		
		
		<?php if (get_theme_mod( 'allx_animation_popular'  )) { ?>		
			.top-popular {
			-webkit-animation-duration: <?php if ($popular_speed ) { echo esc_html( $popular_speed  ); } else echo "0.3"; ?>s !important;
			animation-duration: <?php if ($popular_speed ) { echo esc_html( $popular_speed ); } else echo "0.3"; ?>s !important;
			-webkit-animation-fill-mode: both;
			animation-fill-mode: both;
			-webkit-transition: all 0.1s ease-in-out;
			-moz-transition: all 0.1s ease-in-out;
			-o-transition: all 0.1s ease-in-out;
			-ms-transition: all 0.1s ease-in-out;
			transition: all 0.1s ease-in-out;
			}
		<?php } ?>
		
		
		<?php if (get_theme_mod( 'allx_animation_sidebar'  )) { ?>		
			aside section {
			display: block;
			-webkit-animation-duration: <?php if ($sidebar_speed ) { echo esc_html( $sidebar_speed ); } else echo "0.3"; ?>s !important;
			animation-duration: <?php if ($sidebar_speed ) { echo esc_html( $sidebar_speed ); } else echo "0.3"; ?>s !important;
			-webkit-animation-fill-mode: both;
			animation-fill-mode: both;
			-webkit-transition: all 0.1s ease-in-out;
			-moz-transition: all 0.1s ease-in-out;
			-o-transition: all 0.1s ease-in-out;
			-ms-transition: all 0.1s ease-in-out;
			transition: all 0.1s ease-in-out;
			}
		<?php } ?>

		
		<?php if (get_theme_mod( 'allx_animation_footer'  )) { ?>			
			.footer-widgets {
			-webkit-animation-duration: <?php if ($footer_speed) { echo esc_html( $footer_speed ); } else echo "0.3"; ?>s !important;
			animation-duration: <?php if ($footer_speed) { echo esc_html( $footer_speed ); } else echo "0.3"; ?>s !important;
			-webkit-animation-fill-mode: both;
			animation-fill-mode: both;
			-webkit-transition: all 0.1s ease-in-out;
			-moz-transition: all 0.1s ease-in-out;
			-o-transition: all 0.1s ease-in-out;
			-ms-transition: all 0.1s ease-in-out;
			transition: all 0.1s ease-in-out;
			}
		<?php } ?>
		
		<?php if (get_theme_mod( 'allx_icons_animation_1', 'zoomInDown')) { ?>			
			.tic_1 {
			-webkit-animation-duration: <?php if ($animation_speed_1) { echo esc_html( $animation_speed_1 ); } else echo "0.9"; ?>s !important;
			animation-duration: <?php if ($animation_speed_1) { echo esc_html( $animation_speed_1 ); } else echo "0.9"; ?>s !important;
			-webkit-animation-fill-mode: both;
			animation-fill-mode: both;
			-webkit-transition: all 0.1s ease-in-out;
			-moz-transition: all 0.1s ease-in-out;
			-o-transition: all 0.1s ease-in-out;
			-ms-transition: all 0.1s ease-in-out;
			transition: all 0.1s ease-in-out;
			}
		<?php } ?>			

		<?php if (get_theme_mod( 'allx_icons_animation_2', 'zoomInDown'  )) { ?>			
			.tic_2 {
			-webkit-animation-duration: <?php if ($animation_speed_2) { echo esc_html( $animation_speed_2 ); } else echo "0.9"; ?>s !important;
			animation-duration: <?php if ($animation_speed_2) { echo esc_html( $animation_speed_2 ); } else echo "0.9"; ?>s !important;
			-webkit-animation-fill-mode: both;
			animation-fill-mode: both;
			-webkit-transition: all 0.1s ease-in-out;
			-moz-transition: all 0.1s ease-in-out;
			-o-transition: all 0.1s ease-in-out;
			-ms-transition: all 0.1s ease-in-out;
			transition: all 0.1s ease-in-out;
			}
		<?php } ?>

		<?php if (get_theme_mod( 'allx_icons_animation_3', 'zoomInDown'  )) { ?>			
			.tic_3 {
			-webkit-animation-duration: <?php if ($animation_speed_3) { echo esc_html( $animation_speed_3 ); } else echo "0.9"; ?>s !important;
			animation-duration: <?php if ($animation_speed_3) { echo esc_html( $animation_speed_3 ); } else echo "0.9"; ?>s !important;
			-webkit-animation-fill-mode: both;
			animation-fill-mode: both;
			-webkit-transition: all 0.1s ease-in-out;
			-moz-transition: all 0.1s ease-in-out;
			-o-transition: all 0.1s ease-in-out;
			-ms-transition: all 0.1s ease-in-out;
			transition: all 0.1s ease-in-out;
			}
		<?php } ?>	
		
		<?php if (get_theme_mod( 'allx_icons_animation_4', 'zoomInDown'  )) { ?>			
			.tic_4 {
			-webkit-animation-duration: <?php if ($animation_speed_4) { echo esc_html( $animation_speed_4 ); } else echo "0.9"; ?>s !important;
			animation-duration: <?php if ($animation_speed_4) { echo esc_html( $animation_speed_4 ); } else echo "0.9"; ?>s !important;
			-webkit-animation-fill-mode: both;
			animation-fill-mode: both;
			-webkit-transition: all 0.1s ease-in-out;
			-moz-transition: all 0.1s ease-in-out;
			-o-transition: all 0.1s ease-in-out;
			-ms-transition: all 0.1s ease-in-out;
			transition: all 0.1s ease-in-out;
			}
		<?php } ?>			
		
		
		<?php if (get_theme_mod( 'allx_icons_animation_5', 'zoomInDown'  )) { ?>			
			.tic_5 {
			-webkit-animation-duration: <?php if ($animation_speed_5) { echo esc_html( $animation_speed_5 ); } else echo "0.9"; ?>s !important;
			animation-duration: <?php if ($animation_speed_5) { echo esc_html( $animation_speed_5 ); } else echo "0.9"; ?>s !important;
			-webkit-animation-fill-mode: both;
			animation-fill-mode: both;
			-webkit-transition: all 0.1s ease-in-out;
			-moz-transition: all 0.1s ease-in-out;
			-o-transition: all 0.1s ease-in-out;
			-ms-transition: all 0.1s ease-in-out;
			transition: all 0.1s ease-in-out;
			}
		<?php } ?>			
		
		
		<?php if (get_theme_mod( 'allx_icons_animation_6', 'zoomInDown'  )) { ?>			
			.tic_6 {
			-webkit-animation-duration: <?php if ($animation_speed_6) { echo esc_html( $animation_speed_6 ); } else echo "0.9"; ?>s !important;
			animation-duration: <?php if ($animation_speed_6) { echo esc_html( $animation_speed_6 ); } else echo "0.9"; ?>s !important;
			-webkit-animation-fill-mode: both;
			animation-fill-mode: both;
			-webkit-transition: all 0.1s ease-in-out;
			-moz-transition: all 0.1s ease-in-out;
			-o-transition: all 0.1s ease-in-out;
			-ms-transition: all 0.1s ease-in-out;
			transition: all 0.1s ease-in-out;
			}
		<?php } ?>			
		
		
		<?php if (get_theme_mod( 'allx_icons_animation_7', 'zoomInDown'  )) { ?>			
			.tic_7 {
			-webkit-animation-duration: <?php if ($animation_speed_7) { echo esc_html( $animation_speed_7 ); } else echo "0.9"; ?>s !important;
			animation-duration: <?php if ($animation_speed_7) { echo esc_html( $animation_speed_7 ); } else echo "0.9"; ?>s !important;
			-webkit-animation-fill-mode: both;
			animation-fill-mode: both;
			-webkit-transition: all 0.1s ease-in-out;
			-moz-transition: all 0.1s ease-in-out;
			-o-transition: all 0.1s ease-in-out;
			-ms-transition: all 0.1s ease-in-out;
			transition: all 0.1s ease-in-out;
			}
		<?php } ?>			
		
		<?php if (get_theme_mod( 'allx_icons_animation_8', 'zoomInDown'  )) { ?>			
			.tic_8 {
			-webkit-animation-duration: <?php if ($animation_speed_8) { echo esc_html( $animation_speed_8 ); } else echo "0.9"; ?>s !important;
			animation-duration: <?php if ($animation_speed_8) { echo esc_html( $animation_speed_8 ); } else echo "0.9"; ?>s !important;
			-webkit-animation-fill-mode: both;
			animation-fill-mode: both;
			-webkit-transition: all 0.1s ease-in-out;
			-moz-transition: all 0.1s ease-in-out;
			-o-transition: all 0.1s ease-in-out;
			-ms-transition: all 0.1s ease-in-out;
			transition: all 0.1s ease-in-out;
			}
		<?php } ?>			
		
				
		<?php if (get_theme_mod( 'allx_icons_animation_9', 'zoomInDown' )) { ?>			
			.tic_9 {
			-webkit-animation-duration: <?php if ($animation_speed_9) { echo esc_html( $animation_speed_9 ); } else echo "0.9"; ?>s !important;
			animation-duration: <?php if ($animation_speed_9) { echo esc_html( $animation_speed_9 ); } else echo "0.9"; ?>s !important;
			-webkit-animation-fill-mode: both;
			animation-fill-mode: both;
			-webkit-transition: all 0.1s ease-in-out;
			-moz-transition: all 0.1s ease-in-out;
			-o-transition: all 0.1s ease-in-out;
			-ms-transition: all 0.1s ease-in-out;
			transition: all 0.1s ease-in-out;
			}
		<?php } ?>			
		
	</style>
	<?php }
	
add_action('wp_footer', 'allx_animation');