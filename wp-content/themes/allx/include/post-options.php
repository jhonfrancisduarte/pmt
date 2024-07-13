<?php if( ! defined( 'ABSPATH' ) ) exit;
function allx_customize_register_meta( $wp_customize ) {
	
	
		$wp_customize->selective_refresh->add_partial( 'hide_author', array(
			'selector' => '.entry-meta',
			'render_callback' => 'allx_customize_partial_hide_author',
		) );		
	
		$wp_customize->add_section( 'allx_hide_meta' , array(
			'title'       => __( 'Post Options', 'allx' ),
			'priority'    => 26,			) );
		$wp_customize->add_setting( 'hide_author', array (
            'default' => '',		
			'sanitize_callback' => 'allx__sanitize_checkbox',
		) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hide_author', array(
			'label'    => __( 'Hide Author', 'allx' ),
			'section'  => 'allx_hide_meta',
			'priority'    => 3,				
			'settings' => 'hide_author',
			'type' => 'checkbox',
		) ) );
		$wp_customize->add_setting( 'hide_date', array (
            'default' => '',		
			'sanitize_callback' => 'allx__sanitize_checkbox',
		) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hide_date', array(
			'label'    => __( 'Hide Calendar', 'allx' ),
			'section'  => 'allx_hide_meta',
			'priority'    => 3,				
			'settings' => 'hide_date',
			'type' => 'checkbox',
		) ) );
		$wp_customize->add_setting( 'hide_comments', array (
            'default' => '',		
			'sanitize_callback' => 'allx__sanitize_checkbox',
		) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hide_comments', array(
			'label'    => __( 'Hide Comments Link', 'allx' ),
			'section'  => 'allx_hide_meta',
			'priority'    => 3,				
			'settings' => 'hide_comments',
			'type' => 'checkbox',
		) ) );
		$wp_customize->add_setting( 'hide_posted_in', array (
            'default' => '',		
			'sanitize_callback' => 'allx__sanitize_checkbox',
		) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hide_posted_in', array(
			'label'    => __( 'Hide Posted in Category', 'allx' ),
			'section'  => 'allx_hide_meta',
			'priority'    => 3,				
			'settings' => 'hide_posted_in',
			'type' => 'checkbox',
		) ) );
		$wp_customize->add_setting( 'hide_posted_tags', array (
            'default' => '',		
			'sanitize_callback' => 'allx__sanitize_checkbox',
		) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hide_posted_tags', array(
			'label'    => __( 'Hide Tags', 'allx' ),
			'section'  => 'allx_hide_meta',
			'priority'    => 3,				
			'settings' => 'hide_posted_tags',
			'type' => 'checkbox',
		) ) );
	
}
add_action( 'customize_register', 'allx_customize_register_meta' );