<?php if( ! defined( 'ABSPATH' ) ) exit;
/**
 * Read More Button
 */
	function allx__excerpt_more( $more ) {
		if ( is_admin() ) {
			return $more;
		}
        return '<p class="link-more"><a class="myButt " href="'. esc_url(get_permalink( get_the_ID() ) ) . '">' . allx__return_read_more_text (). '</a></p>';
	}
	add_filter( 'excerpt_more', 'allx__excerpt_more' );
	
	function allx__excerpt_length( $length ) {
			if ( is_admin() ) {
				return $length;
			}
			return 22;
	}
	add_filter( 'excerpt_length', 'allx__excerpt_length', 999 );
	
	function allx__return_read_more_text () {
		if( get_theme_mod( 'allx__return_read_more_text' ) ) {
			return esc_html( get_theme_mod( 'allx__return_read_more_text' ) );
		} else {
		return __( 'Read More','allx');
		}
	}

add_action( 'customize_register', 'allx_read_more_customize_register' );
function allx_read_more_customize_register( $wp_customize ) {
/***********************************************************************************
 * Back to top button Options
***********************************************************************************/

		$wp_customize->selective_refresh->add_partial( 'allx__return_read_more_text', array(
			'selector'        => '.myButt',
			'render_callback' => 'allx__customize_partial_allx__return_read_more_text',
		) );
		
		$wp_customize->add_section( 'allx_read_more' , array(
			'title'       => __( 'Read More Button - Custom Text', 'allx' ),
			'priority'   => 34,
		) );
		$wp_customize->add_setting( 'allx__return_read_more_text', array (
			'sanitize_callback' => 'sanitize_text_field',
		) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'allx__return_read_more_text', array(
			'priority'    => 1,
			'label'    => __( 'Read More Text', 'allx' ),
			'section'  => 'allx_read_more',
			'settings' => 'allx__return_read_more_text',
			'type' => 'text',
		) ) );
}