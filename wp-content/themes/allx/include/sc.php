<?php
function allx_setup_sc () {
		$is_fresh_site = get_option( 'fresh_site');

		if ( ! $is_fresh_site ) {
			return;
		}
	
	$demo_content = array(
		'options' => array(
		'allx_loop' => '1',
		'allx_header_shadow' => '0.1',
		'top_icons_show' => 'home',		
		'allx_icon_title_1' => 'Write Blog',
		'allx_icon_description_1' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
		'allx_top_icon_1' => '<span class="dashicons dashicons-welcome-write-blog"></span>',
		'allx_icon_title_2' => 'Portfolio',
		'allx_icon_description_2' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
		'allx_top_icon_2' => '<span class="dashicons dashicons-portfolio"></span>',
		'allx_icon_title_3' => 'Shop',
		'allx_icon_description_3' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
		'allx_top_icon_3' => '<span class="dashicons dashicons-cart"></span>',
		
		'xmrf_activate' => true,
		'xmrf_title' => 'Right Layout',
		'xmrf_description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
		'xmrf_button_text' => 'Read More',
		'xmrf_image' => allx_THEME_URI . 'images/demo_2.webp',
		'xmrf_image_animation' => 'fade-right',
		'xmrf_text_animation' => 'fade-left',
		
		'xmlf_activate' => true,
		'xmlf_title' => 'Left Layout',
		'xmlf_description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
		'xmlf_button_text' => 'Read More',
		'xmlf_image' => allx_THEME_URI . 'images/demo_1.webp',
		'xmlf_image_animation' => 'fade-left',
		'xmlf_text_animation' => 'fade-right',
		
		'allx_slicebox_activate' => true,
		'allx_slicebox_orientation' => 'r',
		'allx_slicebox_speed' => 3000,
		'allx_slicebox_title' => 'Homepage Image Slider',
		'allx_slicebox_pagi' => true,
		'allx_slicebox_title_1' => 'Image description',
		'allx_slicebox_title_2' => 'Image description',
		'allx_slicebox_title_3' => 'Image description',
		'allx_slicebox_slide_1' => allx_THEME_URI . 'images/slide-1.webp',
		'allx_slicebox_slide_2' => allx_THEME_URI . 'images/slide-2.webp',
		'allx_slicebox_slide_3' => allx_THEME_URI . 'images/slide-3.webp',
		),
	);
	set_theme_mod( 'allx_loop', '1');
	set_theme_mod( 'allx_header_shadow', '0.1');
	
	set_theme_mod( 'xmrf_activate', true );	
	set_theme_mod( 'xmlf_activate', true );	
	set_theme_mod( 'top_icons_show', 'home' );
	set_theme_mod( 'allx_icons_margin', 20 );
	set_theme_mod( 'allx_icon_title_1', 'Write Blog');
	set_theme_mod( 'allx_icon_description_1', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.');
	set_theme_mod( 'allx_top_icon_1', '<span class="dashicons dashicons-welcome-write-blog"></span>');
	set_theme_mod( 'allx_icon_title_2', 'Portfolio');
	set_theme_mod( 'allx_icon_description_2', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.');
	set_theme_mod( 'allx_top_icon_2', '<span class="dashicons dashicons-portfolio"></span>');
	set_theme_mod( 'allx_icon_title_3', 'Shop');
	set_theme_mod( 'allx_icon_description_3', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.');
	set_theme_mod( 'allx_top_icon_3', '<span class="dashicons dashicons-cart"></span>');
	
	set_theme_mod( 'allx_slicebox_activate', true);
	set_theme_mod( 'allx_slicebox_orientation', 'r');
	set_theme_mod( 'allx_slicebox_speed', 3000);
	set_theme_mod( 'allx_slicebox_title', 'Homepage Image Slider');
	set_theme_mod( 'allx_slicebox_pagi', true);
	set_theme_mod( 'allx_slicebox_title_1', 'Image description 1');
	set_theme_mod( 'allx_slicebox_title_2', 'Image description 2');
	set_theme_mod( 'allx_slicebox_title_3', 'Image description 3');
	set_theme_mod( 'allx_slicebox_slide_1', allx_THEME_URI . 'images/slide-1.webp');
	set_theme_mod( 'allx_slicebox_slide_2', allx_THEME_URI . 'images/slide-2.webp');
	set_theme_mod( 'allx_slicebox_slide_3', allx_THEME_URI . 'images/slide-3.webp');
		

	
	add_theme_support( 'starter-content', $demo_content );
    return apply_filters( 'allx_starter_content', $demo_content );

}
	
add_action( 'after_setup_theme', 'allx_setup_sc' );