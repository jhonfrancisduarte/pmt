<?php if( ! defined( 'ABSPATH' ) ) exit;
function allx_customize_register_header_buttons( $wp_customize ) {

		$wp_customize->selective_refresh->add_partial( 'button_1', array(
			'selector' => '.h-button-1 ',
			'render_callback' => 'allx_customize_partial_button_1',
		) );	
		
		$wp_customize->selective_refresh->add_partial( 'button_2', array(
			'selector' => '.h-button-2 ',
			'render_callback' => 'allx_customize_partial_button_2',
		) );	
		
		
		$wp_customize->add_section( 'seos_header_buttons_section' , array(
			'title'       => __( 'Homepage Header Buttons', 'allx' ),
			'priority'    => 26,	
			//'description' => __( 'Social media buttons', 'seos-white' ),
		) );
		
		$wp_customize->add_setting( 'button_1', array (
            'default' => '',		
			'sanitize_callback' => 'sanitize_text_field',
		) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'button_1', array(
			'label'    => __( 'Button 1 Text', 'allx' ),
			'description'    => __( 'The button will be activated if you insert text', 'allx' ),			
			'section'  => 'seos_header_buttons_section',			
			'settings' => 'button_1',
			'type' => 'text',
		) ) );
		
		$wp_customize->add_setting( 'button_1_link', array (
			'sanitize_callback' => 'esc_url_raw',
		) );
		
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'button_1_link', array(
			'label'    => __( 'Button 1 URL', 'allx' ),		
			'section'  => 'seos_header_buttons_section',
			'settings' => 'button_1_link',
		) ) );

/************************************
* Animation Articles
************************************/

		$wp_customize->add_setting( 'allx_button_1_animation', array (
			'sanitize_callback' => 'allx_sanitize_menu_animations',
		) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'allx_button_1_animation', array(
			'label'    => __( 'Button 1 Animation', 'allx' ),
			'section'  => 'seos_header_buttons_section',
			'settings' => 'allx_button_1_animation',
			'type'     =>  'select',
            'choices'  => allx_animations_menu(),		
		) ) );		

		$wp_customize->add_setting( 'button_2', array (
            'default' => '',		
			'sanitize_callback' => 'sanitize_text_field',
		) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'button_2', array(
			'label'    => __( 'Button 2 Text', 'allx' ),
			'description'    => __( 'The button will be activated if you insert text', 'allx' ),			
			'section'  => 'seos_header_buttons_section',			
			'settings' => 'button_2',
			'type' => 'text',
		) ) );
		
		$wp_customize->add_setting( 'button_2_link', array (
			'sanitize_callback' => 'esc_url_raw',
		) );
		
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'button_2_link', array(
			'label'    => __( 'Button 2 URL', 'allx' ),		
			'section'  => 'seos_header_buttons_section',
			'settings' => 'button_2_link',
		) ) );
		
		$wp_customize->add_setting( 'allx_button_2_animation', array (
			'sanitize_callback' => 'allx_sanitize_menu_animations',
		) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'allx_button_2_animation', array(
			'label'    => __( 'Button 2 Animation', 'allx' ),
			'section'  => 'seos_header_buttons_section',
			'settings' => 'allx_button_2_animation',
			'type'     =>  'select',
            'choices'  => allx_animations_menu(),		
		) ) );					
}
add_action( 'customize_register', 'allx_customize_register_header_buttons' );



function allx_buttons () {
	$button1 =  get_theme_mod( 'button_1' );
	$button2 = get_theme_mod( 'button_2' );
	$button_1_link = get_theme_mod( 'button_1_link' );
	$button_2_link = get_theme_mod( 'button_2_link' );
	$button_1_animation = get_theme_mod( 'allx_button_1_animation' );
	$button_2_animation = get_theme_mod( 'allx_button_2_animation' );

	?>
	<div>
	<?php if($button1) { ?>	
	<div class='h-button-1 animated <?php if($button_1_animation) { echo esc_html( $button_1_animation ); } else { echo "fadeInLeft"; } ?>'>	
		<a href='<?php echo esc_url( $button_1_link ); ?>'><?php echo esc_html( $button1 ); ?></a>
	</div>
	<?php } ?>
	<?php if($button2) { ?>	
	<div class='h-button-2 animated <?php if($button_2_animation) { echo esc_html( $button_2_animation ); } else { echo "fadeInRight"; } ?>'>	
		<a href='<?php echo esc_url( $button_2_link ); ?>'><?php echo esc_html( $button2 ); ?></a>	
	</div>
	<?php } ?>
	</div>
<?php
}
add_action('allx_buttons_header', 'allx_buttons');

