<?php if( ! defined( 'ABSPATH' ) ) exit;
	
function allx_cat_customize_register( $wp_customize ) {
	if( get_theme_mod('cat_temp') == "temp1" or get_theme_mod('cat_temp') == "" ){		
			
		/***************** Slider General *********************/
		
		$wp_customize->add_section( 'allx_cat_section' , array(
			'title'       => __( 'Default Categories Page Options', 'allx' ),
			'priority'   => 25,
		) );
		
		$wp_customize->add_setting( 'allx_cat_more', array (
			'sanitize_callback' => 'sanitize_text_field',
		) );
		
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'allx_cat_more', array(
			'label'    => __( 'Read More Text', 'allx' ),		
			'section'  => 'allx_cat_section',
			'settings' => 'allx_cat_more',
			'type'     =>  'text'				
		) ) );		


		$wp_customize->add_setting( 'allx_read_more_icon', array (
			   'default' => "1",		
			'sanitize_callback' => 'allx__sanitize_checkbox',
		) );
			
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'allx_read_more_icon', array(
			'label'    => __( 'Activate Read More Icons', 'allx' ),
			'section'  => 'allx_cat_section',
			'priority'    => 3,				
			'settings' => 'allx_read_more_icon',
			'type' => 'checkbox',
		) ) );	
	}
}
add_action( 'customize_register', 'allx_cat_customize_register' );

	function allx_cat_styles () {
		
        $allx_read_more_icon = esc_html(get_theme_mod( 'allx_read_more_icon','1' ) );
        $allx_cat_gallery_icon = esc_html(get_theme_mod( 'allx_cat_gallery_icon','1' ) );
        $allx_cat_video_icon = esc_html(get_theme_mod( 'allx_cat_video_icon','1' ) );

		
		if( !$allx_cat_gallery_icon ) { $menu_color_image_no_style = ".mp-details .mp-2 .show-desc { margin-top: 5px; }";} else {$menu_color_image_no_style ="";}
		if( !$allx_cat_video_icon ) { $allx_cat_video_icon_style = ".mp-details .mp-1 .show-desc { margin-top: 5px; }";} else {$allx_cat_video_icon_style ="";}
		if( !$allx_read_more_icon ) { $allx_cat_gallery_icon_style = ".mp-details .mp-3 .show-desc { margin-top: 5px; }";} else {$allx_cat_gallery_icon_style ="";}
			
		wp_add_inline_style( 'custom-style-css', 
		$menu_color_image_no_style.$allx_cat_video_icon_style.$allx_cat_gallery_icon_style
		);	


	}
add_action( 'wp_enqueue_scripts', 'allx_cat_styles' );