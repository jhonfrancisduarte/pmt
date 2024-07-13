<?php if( ! defined( 'ABSPATH' ) ) exit;
/**
 * Enqueue scripts and styles.
 */
function allx__animations_scripts() {	
	wp_enqueue_style( 'style-aos-css', allx_THEME_URI . 'include/animations/aos.css' );
	wp_enqueue_script( 'style-aos-js', allx_THEME_URI . 'include/animations/aos.js', array(), '', true);
	wp_enqueue_script( 'style-aos-options-js', allx_THEME_URI . 'include/animations/aos-options.js', array(), '', true);
}
add_action( 'wp_enqueue_scripts', 'allx__animations_scripts' );
function  allx__animation ($animation) {
	if ( get_theme_mod( $animation ) != "none" and get_theme_mod( $animation ) != ""  )  {
		return "data-aos-delay='300'"." ".
		"data-aos-duration='1000'"." ".
		"data-aos='".esc_html ( get_theme_mod( $animation ) )."'";
	}
	if ( get_theme_mod( $animation  ) == "" ) {
		return "data-aos-delay='300'"." ".
		"data-aos-duration='1000'"." ".
		"data-aos='zoom-out-down'";		
	}
}
function allx__animations() {
	$array = array(
				'' => esc_attr__( 'Default', 'allx' ),			
				'none' => esc_attr__( 'Deactivate Animation', 'allx' ),			
				'fade' => esc_attr__( 'fade', 'allx' ),
				'fade-up' => esc_attr__( 'fade-up', 'allx' ),
				'fade-down' => esc_attr__( 'fade-down', 'allx' ),
				'fade-left' => esc_attr__( 'fade-left', 'allx' ),
				'fade-right' => esc_attr__( 'fade-right', 'allx' ),
				'fade-up-right' => esc_attr__( 'fade-up-right', 'allx' ),
				'fade-up-left' => esc_attr__( 'fade-up-left', 'allx' ),
				'fade-down-right' => esc_attr__( 'fade-down-right', 'allx' ),
				'fade-down-left' => esc_attr__( 'fade-down-left', 'allx' ),
				'flip-up' => esc_attr__( 'flip-up', 'allx' ),
				'flip-down' => esc_attr__( 'flip-down', 'allx' ),
				'flip-left' => esc_attr__( 'flip-left', 'allx' ),
				'flip-right' => esc_attr__( 'flip-right', 'allx' ),
				'slide-up' => esc_attr__( 'slide-up', 'allx' ),
				'slide-down' => esc_attr__( 'slide-down', 'allx' ),
				'slide-left' => esc_attr__( 'slide-left', 'allx' ),
				'slide-right' => esc_attr__( 'slide-right', 'allx' ),
				'zoom-in' => esc_attr__( 'zoom-in', 'allx' ),
				'zoom-in-up' => esc_attr__( 'zoom-in-up', 'allx' ),
				'zoom-in-down' => esc_attr__( 'zoom-in-down', 'allx' ),
				'zoom-in-left' => esc_attr__( 'zoom-in-left', 'allx' ),
				'zoom-in-right' => esc_attr__( 'zoom-in-right', 'allx' ),
				'zoom-out' => esc_attr__( 'zoom-out', 'allx' ),
				'zoom-out-up' => esc_attr__( 'zoom-out-up', 'allx' ),
				'zoom-out-down' => esc_attr__( 'zoom-out-down', 'allx' ),
				'zoom-out-left' => esc_attr__( 'zoom-out-left', 'allx' ),
				'zoom-out-right' => esc_attr__( 'zoom-out-right', 'allx' ),
				);
	return $array;
}
		function allx__sanitize_animations( $input ) {
			$valid = allx__animations();
			if ( array_key_exists( $input, $valid ) ) {
				return $input;
			} else {
				return '';
			}
		}
function allx__animations_customize_register( $wp_customize ) {
		$wp_customize->add_panel( 'panel_animations' , array(
			'title'       => __( 'Animations', 'allx' ),
			'priority'   => 3,
		) );

	//Menu Animations
function allx_animations_menu(){
	$array = array(
				'none' => esc_attr__( 'Deactivate Animation', 'allx' ),
				'fadeInUp' => esc_attr__( 'Default', 'allx' ),				
				'fadeIn' => esc_attr__( 'fadeIn', 'allx' ),		
				'bounce' => esc_attr__( 'bounce', 'allx' ),
				'bounceIn' => esc_attr__( 'bounceIn', 'allx' ),
				'bounceInDown' => esc_attr__( 'bounceInDown', 'allx' ),
				'bounceInLeft' => esc_attr__( 'bounceInLeft', 'allx' ),
				'bounceInRight' => esc_attr__( 'bounceInRight', 'allx' ),
				'bounceInUp' => esc_attr__( 'bounceInUp', 'allx' ),
				'fadeInDownBig' => esc_attr__( 'fadeInDownBig', 'allx' ),
				'fadeInLeft' => esc_attr__( 'fadeInLeft', 'allx' ),
				'fadeInLeftBig' => esc_attr__( 'fadeInLeftBig', 'allx' ),
				'fadeInRight' => esc_attr__( 'fadeInRight', 'allx' ),
				'fadeInRightBig' => esc_attr__( 'fadeInRightBig', 'allx' ),
				'fadeInUp' => esc_attr__( 'fadeInUp', 'allx' ),
				'fadeInUpBig' => esc_attr__( 'fadeInUpBig', 'allx' ),
				'flash' => esc_attr__( 'flash', 'allx' ),
				'lightSpeedIn' => esc_attr__( 'lightSpeedIn', 'allx' ),
				'pulse' => esc_attr__( 'pulse', 'allx' ),
				'rollIn' => esc_attr__( 'rollIn', 'allx' ),
				'rotateIn' => esc_attr__( 'rotateIn', 'allx' ),
				'rotateInDownLeft' => esc_attr__( 'rotateInDownLeft', 'allx' ),
				'rotateInDownRight' => esc_attr__( 'rotateInDownRight', 'allx' ),
				'rotateInUpLeft' => esc_attr__( 'rotateInUpLeft', 'allx' ),
				'rotateInUpRight' => esc_attr__( 'rotateInUpRight', 'allx' ),
				'shake' => esc_attr__( 'shake', 'allx' ),
				'slideInDown' => esc_attr__( 'slideInDown', 'allx' ),
				'slideInLeft' => esc_attr__( 'slideInLeft', 'allx' ),
				'slideInRight' => esc_attr__( 'slideInRight', 'allx' ),
				'slideInUp' => esc_attr__( 'slideInUp', 'allx' ),
				'swing' => esc_attr__( 'swing', 'allx' ),
				'tada' => esc_attr__( 'tada', 'allx' ),
				'wobble' => esc_attr__( 'wobble', 'allx' ),
				'zoomInDown' => esc_attr__( 'zoomInDown', 'allx' ),
				'zoomInLeft' => esc_attr__( 'zoomInLeft', 'allx' ),
				'zoomInRight' => esc_attr__( 'zoomInRight', 'allx' ),
				'zoomInUp' => esc_attr__( 'zoomInUp', 'allx' ),
				);
	return $array;
}

		function allx_sanitize_menu_animations( $input ) {
			$valid = allx_animations_menu();
			if ( array_key_exists( $input, $valid ) ) {
				return $input;
			} else {
				return '';
			}
		}	

			
/************************************
* Animation Articles
************************************/
		$wp_customize->add_section( 'allx__animations_section_articles' , array(
			'title'       => __( 'Animation Articles', 'allx' ),
			'panel'       => 'panel_animations',
			'priority'   => 64,
		) );
		$wp_customize->add_setting( 'allx__articles_animation', array (
			'sanitize_callback' => 'allx__sanitize_animations',
		) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'allx__articles_animation', array(
			'label'    => __( 'Animation Articles', 'allx' ),
			'section'  => 'allx__animations_section_articles',
			'type'     =>  'select',
            'choices'  => allx__animations(),		
		) ) );

}
add_action( 'customize_register', 'allx__animations_customize_register' );


function allx_hide_menu_animation () {
	if ( get_theme_mod( 'allx_sub_menu_animation' ) == "none" ) {
	?>
	<style>
	nav ul li:hover > ul {
		-webkit-animation-name: none !important;
		animation-name: none !important;
		-webkit-transform-origin: none !important;
		transform-origin: none !important;
	}
	<style>
	<?php
	}
}
add_action ('wp_head','allx_hide_menu_animation');
