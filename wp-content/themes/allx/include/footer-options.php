<?php 
	// Do not allow direct access to the file.
	if( ! defined( 'ABSPATH' ) ) {
		exit;
	}
	function allx_footer_customize_register( $wp_customize ) {
		$wp_customize->add_section( 'allx_footer_section' , array(
		'title'       => __( 'Footer Options', 'allx' ),
		'priority'   => 54,
		) );
		$wp_customize->add_setting( 'allx_copyright', array (
		'sanitize_callback' => 'wp_kses_post',
		) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'allx_copyright', array(
		'label'    => __( 'Custom Copyright ', 'allx' ),
		'section'  => 'allx_footer_section',
		'settings' => 'allx_copyright',
		'type' => 'textarea',
		) ) );
		
		$wp_customize->add_setting( 'allx_footer_image', array (			
		'sanitize_callback' => 'esc_url_raw',
		) );
		
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'allx_footer_image', array(
		'label'    => __( 'Footer Image', 'allx' ),		
		'section'  => 'allx_footer_section',	
		) ) );			
		
   	    $wp_customize->add_setting( 'color_footer', array (
		'sanitize_callback' => 'sanitize_hex_color',
		) );
 		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'color_footer', array(
		'label'    => __( 'Background Color Footer', 'allx' ),
		'section'  => 'allx_footer_section',
		'settings' => 'color_footer',
		) ) );
		
	}
	add_action( 'customize_register', 'allx_footer_customize_register' );
	
	
	
	/********************************************
		* Content Styles
	*********************************************/ 	
	function allx_footer () {
		
        $footer_image = esc_html(get_theme_mod( 'allx_footer_image' ) );
        $color_footer = esc_html(get_theme_mod( 'color_footer' ) );
		
		
		if( $footer_image ) { $footer_image_style = "body .site-info { background-image: url({$footer_image});}";} else {$footer_image_style ="";}
		if( $color_footer ) { $footer_color_style = "body .site-info { background-color: {$color_footer};}";} else {$footer_color_style ="";}
		
		wp_add_inline_style( 'custom-style-css', 
		$footer_image_style.$footer_color_style
		);
	}
add_action( 'wp_enqueue_scripts', 'allx_footer' );