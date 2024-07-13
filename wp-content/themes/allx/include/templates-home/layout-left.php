<?php if( ! defined( 'ABSPATH' ) ) exit;

function allx_layout_left_customize_register( $wp_customize ) {
	
	$img1 = '<div class="seos-help"><img class="seos-img" src="'. allx_THEME_URI .'images/faq.gif" /><img class="hidden-help" src="'. allx_THEME_URI .'images/4_help.webp" /></div>';
	
	$wp_customize->add_panel( 'homepage_templates' , array(
		'title'       => __( 'Layouts', 'allx' ),
	) );	
	
	$wp_customize->add_section( 'xm_layout_left' , array(
		'panel'       => 'homepage_templates',
		'title'       => __( 'Left Layout', 'allx' ),
		'description' => sprintf("%s", $img1).__(" The image is on the right and the content on the left", 'allx'),
		'priority'    => 1,
	) );

	$wp_customize->add_setting( 'xmlf_activate', array (
		'sanitize_callback' => 'allx__sanitize_checkbox',
		'default' => false
	) );
	
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'xmlf_activate', array(
		'label'    => __( 'Activate Layout on Homepage.', 'allx' ),
		'section'  => 'xm_layout_left',
		'type' => 'checkbox',
	) ) );
	
	
	$wp_customize->add_setting( 'xmlf_title', array (
		'sanitize_callback' => 'sanitize_text_field',
		'default' => 'Left Layout',
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'xmlf_title', array(
		'label'    => __( 'Title Text', 'allx' ),
		'section'  => 'xm_layout_left',
		'type' => 'text',
	) ) );
	
	$wp_customize->add_setting( 'xmlf_description', array (
		'sanitize_callback' => 'wp_kses_post',
		'default' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
	) );
			
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'xmlf_description', array(
		'label'    => __( 'Description Text', 'allx' ),
		'section'  => 'xm_layout_left',
		'type' => 'textarea',
	) ) );

	$wp_customize->add_setting( 'xmlf_button_text', array (
		'sanitize_callback' => 'sanitize_text_field',
		'default' => 'Read More',
	) );
			
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'xmlf_button_text', array(
		'label'    => __( 'Button Text', 'allx' ),
		'section'  => 'xm_layout_left',
		'type' => 'text',
	) ) );

	$wp_customize->add_setting( 'xmlf_url', array (			
		'sanitize_callback' => 'esc_url_raw',
	) );
		
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'xmlf_url', array(
		'label'    => __( 'Button URL', 'allx' ),		
		'section'  => 'xm_layout_left',			
	) ) );

	$wp_customize->add_setting( 'xmlf_image', array (			
		'sanitize_callback' => 'esc_url_raw',
		'default'  => get_template_directory_uri() . '/images/demo_1.webp',		
	) );
		
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'xmlf_image', array(
		'label'    => __( 'Load Image', 'allx' ),
		'section'  => 'xm_layout_left',			
	) ) );

	$wp_customize->add_setting( 'xmlf_image_animation', array (
		'sanitize_callback' => 'allx__sanitize_animations',
		'default'  => 'fade-left',	
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'xmlf_image_animation', array(
		'label'    => __( 'Image Animation', 'allx' ),
		'section'  => 'xm_layout_left',
		'type'     =>  'select',
        'choices'  => allx__animations(),
	) ) );

	$wp_customize->add_setting( 'xmlf_text_animation', array (
		'sanitize_callback' => 'allx__sanitize_animations',
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'xmlf_text_animation', array(
		'label'    => __( 'Text Animation', 'allx' ),
		'section'  => 'xm_layout_left',
		'type'     =>  'select',
        'choices'  => allx__animations(),
	) ) );

	$wp_customize->add_setting( 'xmlf_arrow', array (
		'sanitize_callback' => 'allx__sanitize_checkbox',
		'default' => false
	) );
	
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'xmlf_arrow', array(
		'label'    => __( 'Activate Arrow.', 'allx' ),
		'section'  => 'xm_layout_left',
		'type' => 'checkbox',
	) ) );
	
   	$wp_customize->add_setting( 'xmlf_text_color', array (
		'sanitize_callback' => 'sanitize_hex_color',
		'default' => '#eaeaea'	
	) );
		
 	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'xmlf_text_color', array(
		'label'    => __( 'Layout Text Color', 'allx' ),
		'section'  => 'xm_layout_left',
	) ) );
	
   	$wp_customize->add_setting( 'xmlf_background', array (
		'sanitize_callback' => 'sanitize_hex_color',
		'default' => '#333'
	) );
		
 	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'xmlf_background', array(
		'label'    => __( 'Layout Background Color', 'allx' ),
		'section'  => 'xm_layout_left',
	) ) );
	
   	$wp_customize->add_setting( 'xmlf_but_background', array (
		'sanitize_callback' => 'sanitize_hex_color',
		'default' => '#6AB0C4'		
	) );

 	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'xmlf_but_background', array(
		'label'    => __( 'Button Background Color', 'allx' ),
		'section'  => 'xm_layout_left',
	) ) );

   	$wp_customize->add_setting( 'xmlf_but_hover_background', array (
		'sanitize_callback' => 'sanitize_hex_color',
		'default' => '#5995A5'			
	) );
		
 	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'xmlf_but_hover_background', array(
		'label'    => __( 'Button Background Hover Color', 'allx' ),
		'section'  => 'xm_layout_left',
	) ) );	
	
   	$wp_customize->add_setting( 'xmlf_but_color', array (
		'sanitize_callback' => 'sanitize_hex_color',
		'default' => '#ffffff'		
	) );
		
 	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'xmlf_but_color', array(
		'label'    => __( 'Button Tex Color', 'allx' ),
		'section'  => 'xm_layout_left',
	) ) );
	
}
add_action( 'customize_register', 'allx_layout_left_customize_register' );

// Front-end
function allx_layout_left () {
	if( get_theme_mod( 'xmlf_activate', false) ) { 
		$title = get_theme_mod( 'xmlf_title', 'Left Layout' );
		$description = get_theme_mod( 'xmlf_description', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. ' );
		$image = get_theme_mod( 'xmlf_image', allx_THEME_URI . 'images/demo_1.webp' );
		$button_text = get_theme_mod( 'xmlf_button_text', 'Read More' );
		$xmlf_url = get_theme_mod( 'xmlf_url');
		$xmlf_arrow = get_theme_mod( 'xmlf_arrow', false );
		?>
		<div class="xm-left-layout">
			<div class="xm-text" <?php echo wp_kses_post( allx__animation( "xmlf_text_animation" ) ); ?>>
				<div class="xm-position">
					<div class="xm-left-title"><?php echo esc_html( $title ); ?></div>
					<div class="xm-left-description"><?php echo wp_kses_post( $description ); ?></div>
					<a href="<?php if($xmlf_url) { echo esc_url( $xmlf_url ); } else { echo "#"; } ?>"><div class="button"><?php echo esc_html( $button_text ); ?></div></a>
				</div>
			</div>
			<?php if( $xmlf_arrow ) { ?>
			<img alt="Arrow" class="xm-left-arrow" src="<?php echo esc_url(allx_THEME_URI."images/arrow.png"); ?>" />
			<?php } ?>
			<div class="xm-left-img"><img <?php echo wp_kses_post( allx__animation( "xmlf_image_animation" ) ); ?> alt="<?php echo esc_html( $title ); ?>" src="<?php if($image) { echo esc_url( $image ); } else { echo esc_url( allx_THEME_URI."images/demo.jpg" ); } ?>"></div>
		</div>
		<?php
	}
}

add_action('layout_left','allx_layout_left');

function allx_layout_left_styles() {
        $xmlf_background = esc_attr( get_theme_mod( 'xmlf_background', '#333' ) );
        $xmlf_text_color = esc_attr( get_theme_mod( 'xmlf_text_color', '#eaeaea' ) );
        $xmlf_but_background = esc_attr( get_theme_mod( 'xmlf_but_background', '#6AB0C4' ) );
        $xmlf_but_hover_background = esc_attr( get_theme_mod( 'xmlf_but_hover_background', '#5995A5' ) );
        $xmlf_but_color = esc_attr( get_theme_mod( 'xmlf_but_color', '#ffffff' ) );
## Colors Styles
		if( $xmlf_but_background) { $style3 = ".xm-left-layout .button { background: {$xmlf_but_background};}";} else { $style3 =""; }
		if( $xmlf_background) { $style1 = ".xm-left-layout, .xm-left-img img { background: {$xmlf_background};}";} else { $style1 =""; }
		if( $xmlf_text_color) { $style2 = ".xm-left-layout .xm-left-description, .xm-left-layout .xm-left-title { color: {$xmlf_text_color};}";} else { $style2 =""; }
		if( $xmlf_but_hover_background) { $style4 = ".xm-left-layout .button:hover { background: {$xmlf_but_hover_background};}";} else { $style4 =""; }
		if( $xmlf_but_color) { $style5 = ".xm-left-layout .button { color: {$xmlf_but_color};}";} else { $style5 =""; }
        wp_add_inline_style( 'custom-style-css', 
		$style1.$style2.$style3.$style4.$style5
		);
}
add_action( 'wp_enqueue_scripts', 'allx_layout_left_styles' );