<?php if( ! defined( 'ABSPATH' ) ) exit;

function allx_layout_right_customize_register( $wp_customize ) {

	$img1 = '<div class="seos-help"><img class="seos-img" src="'. allx_THEME_URI .'images/faq.gif" /><img class="hidden-help" src="'. allx_THEME_URI .'images/5_help.webp" /></div>';

	$wp_customize->add_section( 'xm_layout_right' , array(
		'panel'       => 'homepage_templates',
		'title'       => __( 'Right Layout', 'allx' ),
		'description' => sprintf("%s", $img1).__(" The image is on the left and the content on the right", 'allx'),
		'priority'    => 1,
	) );

	$wp_customize->add_setting( 'xmrf_activate', array (
		'sanitize_callback' => 'allx__sanitize_checkbox',
		'default' => false
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'xmrf_activate', array(
		'label'    => __( 'Activate Layout on Homepage.', 'allx' ),
		'section'  => 'xm_layout_right',
		'type' => 'checkbox',
	) ) );
	
	$wp_customize->add_setting( 'xmrf_title', array (
		'sanitize_callback' => 'sanitize_text_field',
		'default' => 'Right Layout',
	) );
	
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'xmrf_title', array(
		'label'    => __( 'Title Text', 'allx' ),
		'section'  => 'xm_layout_right',
		'type' => 'text',
	) ) );

	$wp_customize->add_setting( 'xmrf_description', array (
		'sanitize_callback' => 'sanitize_text_field',
		'default' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
	) );
	
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'xmrf_description', array(
		'label'    => __( 'Description Text', 'allx' ),
		'section'  => 'xm_layout_right',
		'type' => 'textarea',
	) ) );

	$wp_customize->add_setting( 'xmrf_button_text', array (
		'sanitize_callback' => 'sanitize_text_field',
		'default' => 'Read More',
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'xmrf_button_text', array(
		'label'    => __( 'Button Text', 'allx' ),
		'section'  => 'xm_layout_right',
		'type' => 'text',
	) ) );

	$wp_customize->add_setting( 'xmrf_url', array (			
		'sanitize_callback' => 'esc_url_raw',
	) );
		
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'xmrf_url', array(
		'label'    => __( 'Button URL', 'allx' ),		
		'section'  => 'xm_layout_right',			
	) ) );

	$wp_customize->add_setting( 'xmrf_image', array (			
		'sanitize_callback' => 'esc_url_raw',
		'default'  => get_template_directory_uri() . '/images/demo_2.webp',		
	) );
		
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'xmrf_image', array(
		'label'    => __( 'Load Image', 'allx' ),
		'section'  => 'xm_layout_right',			
	) ) );

	$wp_customize->add_setting( 'xmrf_image_animation', array (
		'sanitize_callback' => 'allx__sanitize_animations',
		'default'  => 'fade-right',	
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'xmrf_image_animation', array(
		'label'    => __( 'Image Animation', 'allx' ),
		'section'  => 'xm_layout_right',
		'type'     =>  'select',
        'choices'  => allx__animations(),
	) ) );

	$wp_customize->add_setting( 'xmrf_text_animation', array (
		'sanitize_callback' => 'allx__sanitize_animations',
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'xmrf_text_animation', array(
		'label'    => __( 'Text Animation', 'allx' ),
		'section'  => 'xm_layout_right',
		'type'     =>  'select',
        'choices'  => allx__animations(),
	) ) );

	$wp_customize->add_setting( 'xmrf_arrow', array (
		'sanitize_callback' => 'allx__sanitize_checkbox',
		'default' => false
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'xmrf_arrow', array(
		'label'    => __( 'Activate Arrow.', 'allx' ),
		'section'  => 'xm_layout_right',
		'type' => 'checkbox',
	) ) );

   	$wp_customize->add_setting( 'xmrf_text_color', array (
		'sanitize_callback' => 'sanitize_hex_color',
		'default' => '#333333'	
	) );

 	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'xmrf_text_color', array(
		'label'    => __( 'Layout Text Color', 'allx' ),
		'section'  => 'xm_layout_right',
	) ) );

   	$wp_customize->add_setting( 'xmrf_background', array (
		'sanitize_callback' => 'sanitize_hex_color',
		'default' => '#ffffff'
	) );

 	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'xmrf_background', array(
		'label'    => __( 'Layout Background Color', 'allx' ),
		'section'  => 'xm_layout_right',
	) ) );

   	$wp_customize->add_setting( 'xmrf_but_background', array (
		'sanitize_callback' => 'sanitize_hex_color',
		'default' => '#6AB0C4'		
	) );

 	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'xmrf_but_background', array(
		'label'    => __( 'Button Background Color', 'allx' ),
		'section'  => 'xm_layout_right',
	) ) );

   	$wp_customize->add_setting( 'xmrf_but_hover_background', array (
		'sanitize_callback' => 'sanitize_hex_color',
		'default' => '#5995A5'			
	) );

 	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'xmrf_but_hover_background', array(
		'label'    => __( 'Button Background Hover Color', 'allx' ),
		'section'  => 'xm_layout_right',
	) ) );	

   	$wp_customize->add_setting( 'xmrf_but_color', array (
		'sanitize_callback' => 'sanitize_hex_color',
		'default' => '#ffffff'		
	) );

 	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'xmrf_but_color', array(
		'label'    => __( 'Button Tex Color', 'allx' ),
		'section'  => 'xm_layout_right',
	) ) );

}
add_action( 'customize_register', 'allx_layout_right_customize_register' );

// Front-end
function allx_layout_right () {
	if( get_theme_mod( 'xmrf_activate', false) ) { 
		$title = get_theme_mod( 'xmrf_title', 'Right Layout' );
		$description = get_theme_mod( 'xmrf_description', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. ' );
		$image = get_theme_mod( 'xmrf_image', allx_THEME_URI . 'images/demo_2.webp' );
		$button_text = get_theme_mod( 'xmrf_button_text', 'Read More' );
		$xmrf_url = get_theme_mod( 'xmrf_url');
		$xmrf_arrow = get_theme_mod( 'xmrf_arrow', false );
		?>
		<div class="xm-right-layout">
			<div class="xm-right-img"><img <?php echo wp_kses_post( allx__animation( "xmrf_image_animation" ) ); ?> alt="<?php echo esc_html( $title ); ?>" src="<?php if($image) { echo esc_url( $image ); } else { echo esc_url(allx_THEME_URI."images/demo.jpg"); } ?>"></div>
			<?php if( $xmrf_arrow ) { ?>
			<img alt="Arrow" class="xm-right-arrow" src="<?php echo esc_url(allx_THEME_URI."images/arrow1.png"); ?>" />
			<?php } ?>
				<div class="xm-text" <?php echo wp_kses_post( allx__animation( "xmrf_text_animation" ) ); ?>>
				<div class="xm-position">
					<div class="xm-right-title"><?php echo esc_html( $title ); ?></div>
					<div class="xm-right-description"><?php echo esc_html( $description ); ?></div>
					<a href="<?php if($xmrf_url) { echo esc_url( $xmrf_url ); } else { echo "#"; } ?>"><div class="button"><?php echo esc_html( $button_text ); ?></div></a>
				</div>
			</div>
		</div>
		<?php
	}
}

add_action('layout_right','allx_layout_right');


function allx_layout_right_styles() {
        $xmrf_background = esc_attr( get_theme_mod( 'xmrf_background', '#ffffff' ) );
        $xmrf_text_color = esc_attr( get_theme_mod( 'xmrf_text_color', '#333333' ) );
        $xmrf_but_background = esc_attr( get_theme_mod( 'xmrf_but_background', '#6AB0C4' ) );
        $xmrf_but_hover_background = esc_attr( get_theme_mod( 'xmrf_but_hover_background', '#5995A5' ) );
        $xmrf_but_color = esc_attr( get_theme_mod( 'xmrf_but_color', '#ffffff' ) );
## Colors Styles
		if( $xmrf_but_background) { $style3 = ".xm-right-layout .button { background: {$xmrf_but_background};}";} else { $style3 =""; }
		if( $xmrf_background) { $style1 = ".xm-right-layout, .xm-right-img img { background: {$xmrf_background};}";} else { $style1 =""; }
		if( $xmrf_text_color) { $style2 = ".xm-right-layout .xm-right-description, .xm-right-layout .xm-right-title { color: {$xmrf_text_color};}";} else { $style2 =""; }
		if( $xmrf_but_hover_background) { $style4 = ".xm-right-layout .button:hover { background: {$xmrf_but_hover_background};}";} else { $style4 =""; }
		if( $xmrf_but_color) { $style5 = ".xm-right-layout .button { color: {$xmrf_but_color};}";} else { $style5 =""; }
        wp_add_inline_style( 'custom-style-css', 
		$style1.$style2.$style3.$style4.$style5
		);
}
add_action( 'wp_enqueue_scripts', 'allx_layout_right_styles' );