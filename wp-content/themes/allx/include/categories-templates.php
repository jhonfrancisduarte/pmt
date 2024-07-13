<?php if( ! defined( 'ABSPATH' ) ) exit;

		function allx_template_select_cat( $input ) {
			$valid = array(
				'' => esc_attr__( 'Default', 'allx' ),
				'temp1' => esc_attr__( 'Template 1', 'allx' ),
				'temp2' => esc_attr__( 'Template 2', 'allx' ),
			);
			
			if ( array_key_exists( $input, $valid ) ) {
				return $input;
				} else {
				return '';
			}
		}

function allx_all_cat_customize_register( $wp_customize ) {

 

	$wp_customize->add_section( 'select_templates_cat' , array(
		'title'       => __( 'Categories Templates', 'allx' ),
		'priority'   => 25,
	) );

	$wp_customize->add_setting( 'cat_temp', array (
		'sanitize_callback' => 'allx_template_select_cat',
		'default' => 'all',
	) );
	
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'cat_temp', array(
		'label'    => __( 'Categories Templates', 'allx' ),
		'section'  => 'select_templates_cat',		
		'settings' => 'cat_temp',
		'type'     =>  'select',		
		'choices'  => array(
				'' => esc_attr__( 'Default', 'allx' ),
				'temp1' => esc_attr__( 'Template 1', 'allx' ),
				'temp2' => esc_attr__( 'Template 2', 'allx' ),
		)
	) ) );
}
add_action( 'customize_register', 'allx_all_cat_customize_register' );


function allx_cat_scripts() {
	if( get_theme_mod('cat_temp') == "temp1" or get_theme_mod('cat_temp') == "" ){
		wp_enqueue_style( 'allx-cat-1-css', allx_THEME_URI . 'css/cat-1.css' );
	}

}

add_action( 'wp_enqueue_scripts', 'allx_cat_scripts' );
