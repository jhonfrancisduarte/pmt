<?php
// Do not allow direct access to the file.
if( ! defined( 'ABSPATH' ) ) {
    exit;
}

add_action( 'customize_register', 'allx_sidebar_customize_register' );
function allx_sidebar_customize_register( $wp_customize ) {
	
/***********************************************************************************
 * Sidebar Sanitize
***********************************************************************************/
	
		function customize_sanitize_sidebar( $input ) {
			$valid = array(
				'1' => __( 'Left', 'allx' ),
				'2' => __( 'Right', 'allx' ),
				'3' => __( 'No Sidebar', 'allx' ),
			);

			if ( array_key_exists( $input, $valid ) ) {
				return $input;
			} else {
				return '';
			}
		}
		
/***********************************************************************************
 * Sidebar Options
***********************************************************************************/
 
		$wp_customize->add_section( 'allx_sidebar' , array(
			'title'       => __( 'Sidebar Options', 'allx' ),
			'description'       => __( 'The sidebar options can only be used if there are active widgets in the sidebar. Also make sure you do not use a page template because in some case they take precedence over the sidebar position. Sidebar position for single page or post is available in the premium version of the theme.', 'allx' ),
			'priority'   => 64,
		) );
	
		$wp_customize->add_setting( 'allx_sidebar_position_home', array (
			'sanitize_callback' => 'customize_sanitize_sidebar',
		) );
				
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'allx_sidebar_position_home', array(
			'label'    => __( 'Sidebar Position Home Page', 'allx' ),
			'section'  => 'allx_sidebar',
			'settings' => 'allx_sidebar_position_home',
			'type' => 'radio',
			'choices' => array(
				'1' => __( 'Left', 'allx' ),
				'2' => __( 'Right', 'allx' ),
				'3' => __( 'No Sidebar', 'allx' ),
				),
		) ) );
		
		$wp_customize->add_setting( 'sidebar_icons', array (
            'default' => '',		
			'sanitize_callback' => 'allx__sanitize_checkbox',
		) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'sidebar_icons', array(
			'label'    => __( 'Deactivate All Widget Icons', 'allx' ),
			'section'  => 'allx_sidebar',
			'priority'    => 13,				
			'settings' => 'sidebar_icons',
			'type' => 'checkbox',
		) ) );	
		
		$wp_customize->add_setting( 'allx_sidebar_position_blog', array (
			'sanitize_callback' => 'customize_sanitize_sidebar',
		) );
				
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'allx_sidebar_position_blog', array(
			'label'    => __( 'Sidebar Position Blog and Archive Pages', 'allx' ),
			'section'  => 'allx_sidebar',
			'settings' => 'allx_sidebar_position_blog',
			'type' => 'radio',
			'choices' => array(
				'1' => __( 'Left', 'allx' ),
				'2' => __( 'Right', 'allx' ),
				'3' => __( 'No Sidebar', 'allx' ),
				),
		) ) );

		$wp_customize->add_setting( 'allx_sidebar_position_categories', array (
			'sanitize_callback' => 'customize_sanitize_sidebar',
		) );
				
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'allx_sidebar_position_categories', array(
			'label'    => __( 'Sidebar Position Categories', 'allx' ),
			'section'  => 'allx_sidebar',
			'settings' => 'allx_sidebar_position_categories',
			'type' => 'radio',
			'choices' => array(
				'1' => __( 'Left', 'allx' ),
				'2' => __( 'Right', 'allx' ),
				'3' => __( 'No Sidebar', 'allx' ),
				),
		) ) );

		$wp_customize->add_setting( 'allx_sidebar_position_single', array (
			'sanitize_callback' => 'customize_sanitize_sidebar',
		) );
				
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'allx_sidebar_position_single', array(
			'label'    => __( 'Sidebar Position Single Pages and Posts', 'allx' ),
			'section'  => 'allx_sidebar',
			'settings' => 'allx_sidebar_position_single',
			'type' => 'radio',
			'choices' => array(
				'1' => __( 'Left', 'allx' ),
				'2' => __( 'Right', 'allx' ),
				'3' => __( 'No Sidebar', 'allx' ),
				),
		) ) );
		
		$wp_customize->add_setting( 'sidebar_width', array(
		    'sanitize_callback' => 'absint',
		) );
		$wp_customize->add_control( new WP_Customize_Range_Control( $wp_customize, 'sidebar_width', array(
			'type' => 'range',
			'priority' => 9,
			'section' => 'allx_sidebar',
			'label'       => __( 'Sidebar Width in % ', 'allx' ),
			'input_attrs' => array(
				'min'  => 20,
				'max'  => 30,
				'step' => 1,
			),
		) ) );			
}

/**
 *   Styles
 */ 
add_action( 'wp_enqueue_scripts', 'allx_sidebar_styles' );
function allx_sidebar_styles() {
        $sidebar_position_home = esc_html( get_theme_mod( 'allx_sidebar_position_home' ) );
        $sidebar_icons = esc_html( get_theme_mod( 'sidebar_icons' ) );
        $sidebar_position_blog = esc_html( get_theme_mod( 'allx_sidebar_position_blog' ) );	
        $allx_sidebar_position_categories = esc_html( get_theme_mod( 'allx_sidebar_position_categories' ) );	
        $allx_sidebar_position_single = esc_html( get_theme_mod( 'allx_sidebar_position_single' ) );
		
        $sidebar_width =  get_theme_mod( 'sidebar_width' );
## Home Page Sidebar

		if ( ( is_front_page() or is_home() ) and $sidebar_position_home == '2'){ $home = "
			.home #primary { float: left !important; }
			.home #content #secondary {  float: right !important; padding: 0 20px 20px 20px;}
			.home #primary {  padding: 0 20px 20px 20px; }	
			";
		}
		else if ( ( is_front_page() or is_home() ) and $sidebar_position_home == '3'){ $home = "
			.home #content #primary { width: 100%; float:none !important; } 
			.home #content #secondary { display: none !important; }
			#content, .h-center { padding: 0 !important; }
				
			";
		} 
		else { 
			$home = ""; 
		}
## Blog Pages Sidebar		
		if(((!is_singular() and $sidebar_position_blog == '2')  )  and !is_category() and ( !is_front_page() or !is_home() )) { $blog = "
			#content #primary { float: left !important; padding-top: 0 !important; }
			#content #secondary {  float: right !important;  padding: 0 20px 20px 20px !important;}	
			
			";
		}
		else if (((!is_singular() and $sidebar_position_blog == '3') and !is_category() and $sidebar_position_blog == '3') and ( !is_front_page() or !is_home() )) { $blog = "
			 #content #primary { width: 100% !important; float:none !important; padding-top: 0 !important; } 
			 #content #secondary { display: none !important; }
			";	
		}
		else if (((!is_singular() and $sidebar_position_blog == '1') ) and !is_category() and ( !is_front_page() or !is_home() )) { $blog = "
			 #content #primary { padding-top: 0; } 
			";	
		}		
		else { 
			$blog = ""; 
		}
		
		## Blog Pages Sidebar		
		if(((!is_singular() and $allx_sidebar_position_categories == '2')  )  and is_category() and ( !is_front_page() or !is_home() )) { $categories = "
			#content #primary { float: left !important; padding-top: 0 !important; }
			#content #secondary {  float: right !important;  padding: 0 20px 20px 20px !important;}	
			
			";
		}
		else if (((!is_singular() and $allx_sidebar_position_categories == '3') and is_category() and $allx_sidebar_position_categories == '3') and ( !is_front_page() or !is_home() )) { $categories = "
			 #content #primary { width: 100% !important; float:none !important; padding-top: 0 !important; } 
			 #content #secondary { display: none !important; }
			";	
		}
		else if (((!is_singular() and $allx_sidebar_position_categories == '1') ) and is_category() and ( !is_front_page() or !is_home() )) { $categories = "
			 #content #primary { padding-top: 0; } 
			";	
		}		
		else { 
			$categories = ""; 
		}
		
		
		## Blog Pages Sidebar		
		if( is_singular() and ( !is_front_page() or !is_home() ) and $allx_sidebar_position_single == '2') { $sigle = "
			#content #primary { float: left !important; padding-top: 0 !important; }
			#content #secondary { float: right !important;  padding: 0 20px 20px 20px !important;}	
			";
		}
		else if ( is_singular() and ( !is_front_page() or !is_home() ) and $allx_sidebar_position_single == '3' ) { $sigle = "
			 #content #primary { width: 100% !important; float:none !important; padding-top: 0 !important; } 
			 #content #secondary { display: none !important; }
			";	
		}
		else if ( is_singular() and ( !is_front_page() or !is_home() ) and $allx_sidebar_position_single == '1') { $sigle = "
			 #content #primary { padding-top: 0; } 
			";	
		}		
		else { 
			$sigle = ""; 
		}		
		
		
		
		
		if($sidebar_width) {
				if( 
					get_post_meta( get_the_ID(), 'allx_metabox_sidebar', true ) != "no" ||
					!is_page_template( 'template-blog-full-width.php') ||
					!is_page_template( 'templeat-page-bilder.php') ||
					!is_page_template( 'template-blog-three-columns.php') ||
					!is_page_template( 'template-blog-two-columns.php')
				) {
					$seos_content_width = 100;
					$content_width = $seos_content_width - $sidebar_width;
					$rez= "
						body #content #primary { width: {$content_width}%; }
						body #content #secondary { width: {$sidebar_width}%; }
					";
				} 
		} else 
			{ 
			$rez = ""; 
		} 

		if( $sidebar_icons ) { $sidebar_icons_style = "
		.widget_meta ul li a:before,
		.wp-block-pages-list__item a:before, .widget_pages ul li a:before,
		.wp-block-latest-posts__list li a:before, .widget_recent_entries ul li a:before,
		.wp-block-archives-list li a:before, .widget_archive ul li a:before,
		.wp-block-categories-list li a:before, .widget_categories ul li a:before
		{display: none !important; }";} else {$sidebar_icons_style ="";}
        wp_add_inline_style( 'custom-style-css', $home.$sidebar_icons_style.$blog.$rez.$categories.$sigle );
}