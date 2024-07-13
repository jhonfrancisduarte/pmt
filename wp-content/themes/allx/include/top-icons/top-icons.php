<?php if( ! defined( 'ABSPATH' ) ) exit;
/**
 * Header Top Icons
 */
function allx_top_icons_register( $wp_customize ) {
	
	
/************************************   Animations  ***********************************************/

function allx_animations_icons(){
	$array = array(
				'default0' => esc_attr__( 'Deactivate Animation', 'allx' ),			
				'fadeIn' => esc_attr__( 'fadeIn', 'allx' ),
				'flipInX' => esc_attr__( 'flipInX', 'allx' ),
				'flip' => esc_attr__( 'flip', 'allx' ),
				'flipInY' => esc_attr__( 'flipInY', 'allx' ),			
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
				'headShake' => esc_attr__( 'headShake', 'allx' ),
				'hinge' => esc_attr__( 'hinge', 'allx' ),
				'jello' => esc_attr__( 'jello', 'allx' ),
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
				'zoomIn' => esc_attr__( 'zoomIn', 'allx' ),
				'zoomInDown' => esc_attr__( 'zoomInDown', 'allx' ),
				'zoomInLeft' => esc_attr__( 'zoomInLeft', 'allx' ),
				'zoomInRight' => esc_attr__( 'zoomInRight', 'allx' ),
				'zoomInUp' => esc_attr__( 'zoomInUp', 'allx' ),
				);
	return $array;
}	
		function allx_sanitize_animations_icons( $input ) {

			$valid = allx_animations_icons();

			if ( array_key_exists( $input, $valid ) ) {
				return $input;
			} else {
				return '';
			}
		}

		function allx_icon_top_sanitize( $input ) {
			$valid = array(
					'home' => esc_attr__( 'Home Page', 'allx' ),
					'all' => esc_attr__( 'All Pages', 'allx' ),
			);
			if ( array_key_exists( $input, $valid ) ) {
				return $input;
			} else {
				return '';
			}
		}

		$wp_customize->add_panel( 'allx_top_icons_panel' , array(
			'title'       => __( 'Top Icons', 'allx' ),
			'priority'   => 7,
		) );

	$help_1 = '<div class="seos-help"><img class="seos-img" src="'.allx_THEME_URI .'images/faq.gif" /><img class="hidden-help" src="'.allx_THEME_URI .'images/1_help.webp" /></div>';
	$help_2 = '<div class="seos-help"><img class="seos-img" src="'.allx_THEME_URI .'images/faq.gif" /><img class="hidden-help" src="'.allx_THEME_URI .'images/2_help.webp" /></div>';
	$help_3 = '<div class="seos-help"><img class="seos-img" src="'.allx_THEME_URI .'images/faq.gif" /><img class="hidden-help" src="'.allx_THEME_URI .'images/3_help.webp" /></div>';
	$help_4 = '<div class="seos-help"><img class="seos-img" src="'.allx_THEME_URI .'images/faq.gif" /><img class="hidden-help" src="'.allx_THEME_URI .'images/3_help.webp" /></div> How to use the icons? <a target="_blank" href="https://developer.wordpress.org/resource/dashicons/#editor-video">You can find icons here.</a>.';
 	
	$wp_customize->add_section( 'global_top_icons' , array(
			'title'       => __( 'Global Options ', 'allx' ),
			'panel'       => 'allx_top_icons_panel',
			'priority'   => 0,
		) );
		
  		$wp_customize->add_setting( 'top_icons_show', array (
			'sanitize_callback' => 'allx_icon_top_sanitize',
			'default' => 'home'
			) );
			
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'top_icons_show', array(
			'label'    => __( 'Activate Icons', 'allx' ),
			'section'  => 'global_top_icons',		
			'settings' => 'top_icons_show',
			'type'     =>  'select',
			'priority'    => 1,			
            'choices'  => array(
				'home' => esc_attr__( 'Home Page', 'allx' ),
				'all' => esc_attr__( 'All Pages', 'allx' ),
            ),
			'default'  => 'home'	
		) ) );
		
	
/********************************************
 * Icon 1
 *******************************************/
 
		$wp_customize->add_section( 'allx_icon_1', array(
			'title'       => __( 'Icon 1', 'allx' ),
			'panel'       => 'allx_top_icons_panel',
			'priority'   => 1,
		) );

		$wp_customize->add_setting( 'allx_icon_title_1', array (
			'sanitize_callback' => 'sanitize_text_field',
		) );
				
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'allx_icon_title_1', array(
			'description'   => sprintf( '%s', $help_1 ).__( 'Icon Title', 'allx' ),	
			'section'  => 'allx_icon_1',
			'settings' => 'allx_icon_title_1',
			'type' => 'text',
		) ) );

		$wp_customize->add_setting( 'allx_icon_description_1', array (
			'sanitize_callback' => 'sanitize_text_field',
		) );
	
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'allx_icon_description_1', array(
			'description'    => __( 'Description', 'allx' ),
			'description'   => sprintf( '%s', $help_2 ).__(' Description', 'allx' ),				
			'section'  => 'allx_icon_1',
			'type' => 'textarea',
		) ) );
		
		$wp_customize->add_setting( 'allx_icon_url_1', array (
			'sanitize_callback' => 'esc_url_raw',
		) );
				
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'allx_icon_url_1', array(
			'description'   => sprintf( '%s', $help_3 ).__(  'Icon URL', 'allx' ),	
			'section'  => 'allx_icon_1',
			'type' => 'text',
		) ) );
		
		$wp_customize->add_setting( 'allx_top_icon_1', array (
			'sanitize_callback' => 'wp_kses_post',
		) );

		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'allx_top_icon_1', array(
			'label'    => __( 'Add Icon', 'allx' ),			
			'description'   => sprintf('%s', $help_4).__('%s Select icon and then copy HTML code. Put the code in the field below.', 'allx' ),			
			'section'  => 'allx_icon_1',
			'type' => 'textarea',
		) ) );
		
   	    $wp_customize->add_setting( 'allx_top_icon_color_1', array (
			'sanitize_callback' => 'sanitize_hex_color',
		) );
 		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'allx_top_icon_color_1', array(
			'label'    => __( 'Icon Color', 'allx' ),
			'priority' => 14,
			'section'  => 'allx_icon_1',
		) ) );

   	    $wp_customize->add_setting( 'allx_top_icon_hover_color_1', array (
			'sanitize_callback' => 'sanitize_hex_color',
		) );
 		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'allx_top_icon_hover_color_1', array(
			'label'    => __( 'Icon Hover Color', 'allx' ),
			'priority' => 14,
			'section'  => 'allx_icon_1',
		) ) );
		
		$wp_customize->add_setting( 'allx_icons_animation_1', array (
			'sanitize_callback' => 'allx_sanitize_animations_icons',
			'default' => 'zoomIn',
		) );
		
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'allx_icons_animation_1', array(
			'label'    => __( 'Icon Animation', 'allx' ),
			'section'  => 'allx_icon_1',
			'type'     =>  'select',
            'choices'  => allx_animations_icons(),
		) ) );
		
		$wp_customize->add_setting( 'allx_icons_animation_speed_1', array(
		    'sanitize_callback' => 'sanitize_text_field',
		) );
		$wp_customize->add_control( new WP_Customize_Range_Control( $wp_customize, 'allx_icons_animation_speed_1', array(
			'type' => 'range',
			'section' => 'allx_icon_1',
			'label'       => __( 'Animation Speed / millisecond ', 'allx' ),
			'input_attrs' => array(
				'min'  => 0.1,
				'max'  => 3,
				'step' => 0.1,
			),
		) ) );		

/********************************************
 * Icon 2
 *******************************************/
 
		$wp_customize->add_section( 'allx_icon_2', array(
			'title'       => __( 'Icon 2', 'allx' ),
			'panel'       => 'allx_top_icons_panel',
			'priority'   => 1,
		) );

		$wp_customize->add_setting( 'allx_icon_title_2', array (
			'sanitize_callback' => 'sanitize_text_field',
		) );
				
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'allx_icon_title_2', array(
			'description'   => sprintf( '%s', $help_1 ).__( ' Icon Title', 'allx' ),	
			'section'  => 'allx_icon_2',
			'settings' => 'allx_icon_title_2',
			'type' => 'text',
		) ) );

		$wp_customize->add_setting( 'allx_icon_description_2', array (
			'sanitize_callback' => 'sanitize_text_field',
		) );
	
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'allx_icon_description_2', array(

			'description'   => sprintf( '%s', $help_2 ).__(' Description', 'allx' ),				
			'section'  => 'allx_icon_2',
			'type' => 'textarea',
		) ) );
		
		$wp_customize->add_setting( 'allx_icon_url_2', array (
			'sanitize_callback' => 'esc_url_raw',
		) );
				
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'allx_icon_url_2', array(
			'description'   => sprintf( '%s', $help_3 ).__(  ' Icon URL', 'allx' ),	
			'section'  => 'allx_icon_2',
			'type' => 'text',
		) ) );
		
		$wp_customize->add_setting( 'allx_top_icon_2', array (
			'sanitize_callback' => 'wp_kses_post',
		) );

		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'allx_top_icon_2', array(
			'label'    => __( 'Add Icon', 'allx' ),			
			'description'   => sprintf('%s', $help_4).__('%s Select icon and then copy HTML code. Put the code in the field below.', 'allx' ),			
			'section'  => 'allx_icon_2',
			'type' => 'textarea',
		) ) );
		
   	    $wp_customize->add_setting( 'allx_top_icon_color_2', array (
			'sanitize_callback' => 'sanitize_hex_color',
		) );
 		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'allx_top_icon_color_2', array(
			'label'    => __( 'Icon Color', 'allx' ),
			'priority' => 14,
			'section'  => 'allx_icon_2',
		) ) );

   	    $wp_customize->add_setting( 'allx_top_icon_hover_color_2', array (
			'sanitize_callback' => 'sanitize_hex_color',
		) );
 		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'allx_top_icon_hover_color_2', array(
			'label'    => __( 'Icon Hover Color', 'allx' ),
			'priority' => 14,
			'section'  => 'allx_icon_2',
		) ) );
		
		$wp_customize->add_setting( 'allx_icons_animation_2', array (
			'sanitize_callback' => 'allx_sanitize_animations_icons',
			'default' => 'zoomIn',
		) );
		
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'allx_icons_animation_2', array(
			'label'    => __( 'Icon Animation', 'allx' ),
			'section'  => 'allx_icon_2',
			'type'     =>  'select',
            'choices'  => allx_animations_icons(),
		) ) );
		
		$wp_customize->add_setting( 'allx_icons_animation_speed_2', array(
		    'sanitize_callback' => 'sanitize_text_field',
		) );
		$wp_customize->add_control( new WP_Customize_Range_Control( $wp_customize, 'allx_icons_animation_speed_2', array(
			'type' => 'range',
			'section' => 'allx_icon_2',
			'label'       => __( 'Animation Speed / millisecond ', 'allx' ),
			'input_attrs' => array(
				'min'  => 0.1,
				'max'  => 3,
				'step' => 0.1,
			),
		) ) );		
/********************************************
 * Icon 3
 *******************************************/
 
		$wp_customize->add_section( 'allx_icon_3', array(
			'title'       => __( 'Icon 3', 'allx' ),
			'panel'       => 'allx_top_icons_panel',
			'priority'   => 1,
		) );

		$wp_customize->add_setting( 'allx_icon_title_3', array (
			'sanitize_callback' => 'sanitize_text_field',
		) );
				
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'allx_icon_title_3', array(
			'description'   => sprintf( '%s', $help_1 ).__( 'Icon Title', 'allx' ),	
			'section'  => 'allx_icon_3',
			'type' => 'text',
		) ) );

		$wp_customize->add_setting( 'allx_icon_description_3', array (
			'sanitize_callback' => 'sanitize_text_field',
		) );
	
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'allx_icon_description_3', array(
			'description'    => __( 'Description', 'allx' ),
			'description'   => sprintf( '%s', $help_2 ).__(' Description', 'allx' ),				
			'section'  => 'allx_icon_3',
			'type' => 'textarea',
		) ) );
		
		$wp_customize->add_setting( 'allx_icon_url_3', array (
			'sanitize_callback' => 'esc_url_raw',
		) );
				
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'allx_icon_url_3', array(
			'description'   => sprintf( '%s', $help_3 ).__(  'Icon URL', 'allx' ),	
			'section'  => 'allx_icon_3',
			'type' => 'text',
		) ) );
		
		$wp_customize->add_setting( 'allx_top_icon_3', array (
			'sanitize_callback' => 'wp_kses_post',
		) );

		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'allx_top_icon_3', array(
			'label'    => __( 'Add Icon', 'allx' ),			
			'description'   => sprintf('%s', $help_4).__('%s Select icon and then copy HTML code. Put the code in the field below.', 'allx' ),			
			'section'  => 'allx_icon_3',
			'type' => 'textarea',
		) ) );
		
   	    $wp_customize->add_setting( 'allx_top_icon_color_3', array (
			'sanitize_callback' => 'sanitize_hex_color',
		) );
 		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'allx_top_icon_color_3', array(
			'label'    => __( 'Icon Color', 'allx' ),
			'priority' => 14,
			'section'  => 'allx_icon_3',
		) ) );

   	    $wp_customize->add_setting( 'allx_top_icon_hover_color_3', array (
			'sanitize_callback' => 'sanitize_hex_color',
		) );
 		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'allx_top_icon_hover_color_3', array(
			'label'    => __( 'Icon Hover Color', 'allx' ),
			'priority' => 14,
			'section'  => 'allx_icon_3',
		) ) );
		
		$wp_customize->add_setting( 'allx_icons_animation_3', array (
			'sanitize_callback' => 'allx_sanitize_animations_icons',
			'default' => 'zoomIn',
		) );
		
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'allx_icons_animation_3', array(
			'label'    => __( 'Icon Animation', 'allx' ),
			'section'  => 'allx_icon_3',
			'type'     =>  'select',
            'choices'  => allx_animations_icons(),
		) ) );
		
		$wp_customize->add_setting( 'allx_icons_animation_speed_3', array(
		    'sanitize_callback' => 'sanitize_text_field',
		) );
		$wp_customize->add_control( new WP_Customize_Range_Control( $wp_customize, 'allx_icons_animation_speed_3', array(
			'type' => 'range',
			'section' => 'allx_icon_3',
			'label'       => __( 'Animation Speed / millisecond ', 'allx' ),
			'input_attrs' => array(
				'min'  => 0.1,
				'max'  => 3,
				'step' => 0.1,
			),
		) ) );		
}
add_action( 'customize_register', 'allx_top_icons_register' );

/**
 * Customize Styles
 */
function allx_top_icons_method() {
		$allx_top_icon_color_1 = esc_html( get_theme_mod( 'allx_top_icon_color_1' ) );
		$allx_top_icon_hover_color_1 = esc_html( get_theme_mod( 'allx_top_icon_hover_color_1' ) );
		if($allx_top_icon_color_1) { $atic_style_1 = ".at-icons .tic_1 .dashicons {color: {$allx_top_icon_color_1};}";} else {$atic_style_1 ="";}
		if($allx_top_icon_hover_color_1) { $atic_style_h_1 = ".at-icons .tic_1 .dashicons:hover {color: {$allx_top_icon_hover_color_1};}";} else {$atic_style_h_1 ="";}
		
		$allx_top_icon_color_2 = esc_html( get_theme_mod( 'allx_top_icon_color_2' ) );
		$allx_top_icon_hover_color_2 = esc_html( get_theme_mod( 'allx_top_icon_hover_color_2' ) );
		if($allx_top_icon_color_2) { $atic_style_2 = ".at-icons .tic_2 .dashicons {color: {$allx_top_icon_color_2};}";} else {$atic_style_2 ="";}
		if($allx_top_icon_hover_color_2) { $atic_style_h_2 = ".at-icons .tic_2 .dashicons:hover {color: {$allx_top_icon_hover_color_2};}";} else {$atic_style_h_2 ="";}		
		
		$allx_top_icon_color_3 = esc_html( get_theme_mod( 'allx_top_icon_color_3' ) );
		$allx_top_icon_hover_color_3 = esc_html( get_theme_mod( 'allx_top_icon_hover_color_3' ) );
		if($allx_top_icon_color_3) { $atic_style_3 = ".at-icons .tic_3 .dashicons {color: {$allx_top_icon_color_3};}";} else {$atic_style_3 ="";}
		if($allx_top_icon_hover_color_3) { $atic_style_h_3 = ".at-icons .tic_3 .dashicons:hover {color: {$allx_top_icon_hover_color_3};}";} else {$atic_style_h_3 ="";}
		
        wp_add_inline_style( 'custom-style-css', 
		$atic_style_1.$atic_style_h_1.
		$atic_style_2.$atic_style_h_2.
		$atic_style_3.$atic_style_h_3
		);
}
add_action( 'wp_enqueue_scripts', 'allx_top_icons_method' );	

/**
 * Icons Action
 */
function allx_top_icons_include () { ?>
	<div class="at-icons">
	<?php 
	for($i=1;$i<=3;$i++) { 
	$allx_icon_url = get_theme_mod( 'allx_icon_url_'.$i);
	$allx_icon_title = get_theme_mod( 'allx_icon_title_'.$i);
	$allx_top_icon = get_theme_mod( 'allx_top_icon_'.$i);
	$allx_icon_description = get_theme_mod( 'allx_icon_description_'.$i);	
	if($allx_icon_title or $allx_top_icon or $allx_icon_description) {
		?>
			<div class="top_icons-container tic_<?php echo $i; ?>">
				<a target="_blank" href="<?php echo esc_url( $allx_icon_url ); ?>">
					<div class="at-top-icon"><?php echo wp_kses_post( $allx_top_icon ); ?></div>
				</a>	
					<div class="top-icon-title"><?php echo esc_html( $allx_icon_title ); ?></div>
					<div class="top-icon-description"><?php echo esc_html( $allx_icon_description ); ?></div>
			</div>	
		<?php } 
	}?>
	</div>
<?php
}
add_action( 'top_icons_allx', 'allx_top_icons_include' );

function top_icons_enqueue_scripts() {
	wp_enqueue_style( 'style-top-icons-css', allx_THEME_URI . 'include/top-icons/style.css');	
}

add_action( 'wp_enqueue_scripts', 'top_icons_enqueue_scripts' );