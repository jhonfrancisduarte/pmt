<?php // Do not allow direct access to the file.
	if( ! defined( 'ABSPATH' ) ) {
		exit;
	}
	
	add_action( 'wp_enqueue_scripts', 'allx_dark_mode_scripts' );
	function allx_dark_mode_scripts() {	
 
		if( get_theme_mod( 'activate_dark_mode') == "dark") {
		     wp_enqueue_style( 'mode-dark', allx_THEME_URI . 'include/dark-mode/dark.css');
		}
 		
	}

	add_action( 'customize_register', 'allx_dark_mode_customize' );
	function allx_dark_mode_customize( $wp_customize ) {
	
		function allx_dark_sanitize( $input ) {
			$valid = array(
				'dark' => esc_attr__( 'Activate Dark Mode', 'allx' ),
				'white' => esc_attr__( 'Activate White Mode', 'allx' ),
			);
			if ( array_key_exists( $input, $valid ) ) {
				return $input;
				} else {
				return '';
			}
		}
		
		$wp_customize->add_section( 'section_dark_mode' , array(
			'title'       => __( 'Button Dark Mode', 'allx' ),
			'priority'    => 1,
		) );
		
		$wp_customize->add_setting( 'activate_dark_mode', array (
			'sanitize_callback' => 'allx_dark_sanitize',
			'default'  => 'white'	
		) );		

		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'activate_dark_mode', array(
			'label'    => __( 'Activate Dark and White Mode', 'allx' ),
			'description'    => __( 'This option allows you to switch between dark and white mode.', 'allx' ),
			'section'  => 'section_dark_mode',		
			'settings' => 'activate_dark_mode',
			'type'     =>  'select',
			'priority'    => 1,			
			'choices'  => array(
				'dark' => esc_attr__( 'Activate Dark Mode', 'allx' ),
				'white' => esc_attr__( 'Activate White Mode', 'allx' ),
		),
		) ) );
		
	}
