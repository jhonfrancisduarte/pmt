<?php if( ! defined( 'ABSPATH' ) ) exit;	
/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function score_customize_preview_js() {
	wp_enqueue_script( 'my-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'score_customize_preview_js' );
	
	function allx__customize_register_menu( $wp_customize ) {
		
		require_once get_template_directory() . '/include/alpha-color-picker/alpha-color-picker.php';		
		
		/**
			* Sanitize colors.
			*
			* @since 1.0.0
			* @param string $value The color.
			* @return string
		*/
		function allx_sanitization_alpha_colors( $value ) {
			// This pattern will check and match 3/6/8-character hex, rgb, rgba, hsl, & hsla colors.
			$pattern = '/^(\#[\da-f]{3}|\#[\da-f]{6}|\#[\da-f]{8}|rgba\(((\d{1,2}|1\d\d|2([0-4]\d|5[0-5]))\s*,\s*){2}((\d{1,2}|1\d\d|2([0-4]\d|5[0-5]))\s*)(,\s*(0\.\d+|1))\)|hsla\(\s*((\d{1,2}|[1-2]\d{2}|3([0-5]\d|60)))\s*,\s*((\d{1,2}|100)\s*%)\s*,\s*((\d{1,2}|100)\s*%)(,\s*(0\.\d+|1))\)|rgb\(((\d{1,2}|1\d\d|2([0-4]\d|5[0-5]))\s*,\s*){2}((\d{1,2}|1\d\d|2([0-4]\d|5[0-5]))\s*)|hsl\(\s*((\d{1,2}|[1-2]\d{2}|3([0-5]\d|60)))\s*,\s*((\d{1,2}|100)\s*%)\s*,\s*((\d{1,2}|100)\s*%)\))$/';
			\preg_match( $pattern, $value, $matches );
			// Return the 1st match found.
			if ( isset( $matches[0] ) ) {
				if ( is_string( $matches[0] ) ) {
					return $matches[0];
				}
				if ( is_array( $matches[0] ) && isset( $matches[0][0] ) ) {
					return $matches[0][0];
				}
			}
			// If no match was found, return an empty string.
			return '';
		}
		
		
		function allx_menu_position_sanitize_position( $input ) {
			$valid = array(
			'left' => esc_attr__( 'Left', 'allx' ),
			'right' => esc_attr__( 'Right', 'allx' ),
			'center' => esc_attr__( 'Center', 'allx' ),
			);
			if ( array_key_exists( $input, $valid ) ) {
				return $input;
				} else {
				return '';
			}
		}
	
		$wp_customize->selective_refresh->add_partial( 'menu_font_size', array(
			'selector' => '#primary-menu',
			'render_callback' => 'allx_customize_partial_menu_font_size',
		) );		
		
		$wp_customize->add_section( 'seos_menu_section' , array(
			'title'       => __( 'Menu Options', 'allx' ),
			'priority'    => 24,	
		//'description' => __( 'Social media buttons', 'seos-white' ),
		) );
		
		$wp_customize->add_setting( 'hide_menu', array (
			'default' => '',		
			'sanitize_callback' => 'allx__sanitize_checkbox',
		) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'hide_menu', array(
			'label'    => __( 'Hide Menu Top', 'allx' ),
			'section'  => 'seos_menu_section',
			'priority'    => 1,				
			'settings' => 'hide_menu',
			'type' => 'checkbox',
		) ) );
		
		$wp_customize->add_setting( 'allx_header_search', array (
		'default' => '',		
		'sanitize_callback' => 'allx__sanitize_checkbox',
		) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'allx_header_search', array(
		'label'    => __( 'Activate search', 'allx' ),
		'section'  => 'seos_menu_section',
		'priority'    => 1,				
		'settings' => 'allx_header_search',
		'type' => 'checkbox',
		) ) );
		
		if( class_exists( 'WooCommerce' ) ) {		
			$wp_customize->add_setting( 'allx_header_cart', array (
			'default' => '',		
			'sanitize_callback' => 'allx__sanitize_checkbox',
			) );
			$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'allx_header_cart', array(
			'label'    => __( 'Activate WooCommerce Cart', 'allx' ),
			'section'  => 'seos_menu_section',
			'priority'    => 1,				
			'settings' => 'allx_header_cart',
			'type' => 'checkbox',
			) ) );
		}	
		
		$wp_customize->add_setting( 'menu_position_absolute', array (
			'default' => '',		
			'sanitize_callback' => 'allx__sanitize_checkbox',
		) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'menu_position_absolute', array(
			'label'    => __( 'Deactivate menu top position absolute', 'allx' ),
			'description'    => __( 'The option is active only if has header image or video.', 'allx' ),
			'section'  => 'seos_menu_section',
			'priority'    => 1,				
			'settings' => 'menu_position_absolute',
			'type' => 'checkbox',
		) ) );

		$wp_customize->add_setting( 'menu_position', array (
			'sanitize_callback' => 'allx_menu_position_sanitize_position',
			'default'  => 'right'	
		) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'menu_position', array(
			'label'    => __( 'Menu Top Position', 'allx' ),
			'section'  => 'seos_menu_section',		
			'settings' => 'menu_position',
			'type'     =>  'select',
			'priority'    => 1,			
			'choices'  => array(
			'left' => esc_attr__( 'Left', 'allx' ),
			'right' => esc_attr__( 'Right', 'allx' ),
			'center' => esc_attr__( 'Center', 'allx' ),
			),
		'default'  => 'right'	
		) ) );		
		


		
		$wp_customize->add_setting( 'menu_font_size', array (
			'sanitize_callback' => 'absint',
		) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'menu_font_size', array(
			'section'  => 'seos_menu_section',
			'priority'    => 1,
			'settings' => 'menu_font_size',
			'label'       => __( 'Menu Top Font Size', 'allx' ),			
			'type'     =>  'number',
			'input_attrs'     => array(
			'min'  => 11,
			'max'  => 30,
			'step' => 1,
			),
		) ) );
		
		$wp_customize->add_setting( 'menu_weight', array (
			'sanitize_callback' => 'allx_sanitize_fonts_weight',
		) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'menu_weight', array(
			'label'    => __( 'Menu Top Font Weight', 'allx' ),
			'settings' => 'menu_weight',
			'section'  => 'seos_menu_section',
			'priority'    => 1,
			'type'     =>  'select',
			'choices'  => allx_array_font_weight(),		
		) ) );
		
		$wp_customize->add_setting( 'menu_font', array (
			'sanitize_callback' => 'allx_sanitize_fonts',
		) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'menu_font', array(
			'label'    => __( 'Menu Top Font', 'allx' ),
			'section'  => 'seos_menu_section',
			'priority'    => 1,
			'settings' => 'menu_font',
			'type'     =>  'select',
			'choices'  => allx_array_fonts(),		
		) ) );
		
				/******************************
			* Text Transform
		******************************/		
		$wp_customize->add_setting( 'menu_transform', array (
			'sanitize_callback' => 'allx_sanitize_text_transform',
		) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'menu_transform', array(
			'label'    => __( 'Menu Top Text Transform', 'allx' ),
			'section'  => 'seos_menu_section',
			'settings' => 'menu_transform',
			'priority'    => 1,
			'type'     =>  'select',
			'choices'  => allx_array_text_transform(),		
		) ) );	
		
		
		// Alpha Color Picker setting.
		$wp_customize->add_setting(
			'menu_background_image', array(
			'default'    => 'rgba(22, 36, 40,0.4)',
			'sanitize_callback' => 'allx_sanitization_alpha_colors',
			)
		);
		
		// Alpha Color Picker control.
		$wp_customize->add_control( new Customize_Alpha_Color_Control( $wp_customize, 'menu_background_image',
		array(
		'label'        => __( 'Menu Top Background', 'allx' ),
		'description'        => __( 'When there is a header image and menu position absolute', 'allx' ),
		'section'      => 'seos_menu_section',
		'priority' => 14,
		'settings'     => 'menu_background_image',
		'show_opacity' => true, // Optional.
		'palette'      => array(
		'rgba(114,42,191,0.38)',
		'rgba(10,10,10,0.31)',
		'rgba(10,0,0,0.47)',
		'rgba(0,109,193,0.78)',
		'rgba(0,165,66,0.16)',
		'rgba(10,0,0,0.44)',
		'rgba(109,14,0,0.27)',
		'rgba( 255, 255, 255, 0.2 )'
		) 
		)
        ) );		
		
		$wp_customize->add_setting( 'menu_background_no_image', array (
		'sanitize_callback' => 'sanitize_hex_color',
		'default' => "#2C4951",
		) );
 		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'menu_background_no_image', array(
		'label'        => __( 'Menu Top Background', 'allx' ),
		'description'        => __( 'When there is no header image or video', 'allx' ),
		'priority' => 14,
		'section'  => 'seos_menu_section',
		'settings' => 'menu_background_no_image',
		) ) );
		
		
   	    $wp_customize->add_setting( 'menu_color_no_img', array (
		'sanitize_callback' => 'sanitize_hex_color',
		) );
 		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'menu_color_no_img', array(
		'label'    => __( 'Menu Top Color', 'allx' ),
		'priority' => 14,
		'section'  => 'seos_menu_section',
		'settings' => 'menu_color_no_img',
		) ) );
		
   	    $wp_customize->add_setting( 'menu_hover_color', array (
		'sanitize_callback' => 'sanitize_hex_color',
		) );
 		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'menu_hover_color', array(
		'label'    => __( 'Menu Top Hover Color', 'allx' ),
		'priority' => 14,
		'section'  => 'seos_menu_section',
		'settings' => 'menu_hover_color',
		) ) );
		
   	    $wp_customize->add_setting( 'menu_border_top', array (
			'sanitize_callback' => 'sanitize_hex_color',
		) );
 		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'menu_border_top', array(
			'label'    => __( 'Menu Border Top Color', 'allx' ),
			'priority' => 14,
			'section'  => 'seos_menu_section',
		) ) );		

   	    $wp_customize->add_setting( 'menu_sub_color', array (
		'sanitize_callback' => 'sanitize_hex_color',
		) );
 		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'menu_sub_color', array(
		'label'    => __( 'Sub Menu Top Color', 'allx' ),
		'priority' => 14,
		'section'  => 'seos_menu_section',
		'settings' => 'menu_sub_color',
		) ) );
		
   	    $wp_customize->add_setting( 'menu_sub_hover_color', array (
		'sanitize_callback' => 'sanitize_hex_color',
		) );
 		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'menu_sub_hover_color', array(
		'label'    => __( 'Sub Menu Top Hover Color', 'allx' ),
		'priority' => 14,
		'section'  => 'seos_menu_section',
		'settings' => 'menu_sub_hover_color',
		) ) );		
		
   	    $wp_customize->add_setting( 'menu_sub_top', array (
		'sanitize_callback' => 'sanitize_hex_color',
		) );
 		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'menu_sub_top', array(
		'label'    => __( 'Sub Menu Top Border Top Color', 'allx' ),
		'priority' => 14,
		'section'  => 'seos_menu_section',
		'settings' => 'menu_sub_top',
		) ) );
   	    $wp_customize->add_setting( 'menu_sub_background', array (
		'sanitize_callback' => 'sanitize_hex_color',
		) );
 		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'menu_sub_background', array(
		'label'    => __( 'Sub Menu Top Background Color', 'allx' ),
		'priority' => 14,
		'section'  => 'seos_menu_section',
		'settings' => 'menu_sub_background',
		) ) );
   	    $wp_customize->add_setting( 'menu_sub_hover_background', array (
		'sanitize_callback' => 'sanitize_hex_color',
		) );
		
 		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'menu_sub_hover_background', array(
			'label'    => __( 'Sub Menu Top Background Hover Color', 'allx' ),
			'priority' => 14,
			'section'  => 'seos_menu_section',
			'settings' => 'menu_sub_hover_background',
		) ) );
	}
	add_action( 'customize_register', 'allx__customize_register_menu' );
	/********************************************
		* Content Styles
	*********************************************/ 	
	
	function allx__menu_styles () {
		
        $menu_left  = esc_html(get_theme_mod( 'menu_left' ) );
        $menu_left_margin = esc_html(get_theme_mod( 'menu_left_margin' ) );
        $menu_left_margin_top = esc_html(get_theme_mod( 'menu_left_margin_top' ) );
        $menu_font_size = esc_html(get_theme_mod( 'menu_font_size' ) );
        $hide_arrow = esc_html(get_theme_mod( 'hide_arrow' ) );
        $menu_color = esc_html(get_theme_mod( 'menu_color' ) );
        $menu_hover_color = esc_html(get_theme_mod( 'menu_hover_color' ) );
        $menu_sub_hover_color = esc_html(get_theme_mod( 'menu_sub_hover_color' ) );
        $menu_sub_color = esc_html(get_theme_mod( 'menu_sub_color' ) );
        $menu_background_image = esc_html(get_theme_mod( 'menu_background_image','rgba(22, 36, 40,0.4)' ) );
        $menu_sub_top = esc_html(get_theme_mod( 'menu_sub_top' ) );
        $menu_sub_background = esc_html(get_theme_mod( 'menu_sub_background' ) );
        $menu_sub_hover_background = esc_html(get_theme_mod( 'menu_sub_hover_background' ) );
        $menu_position = esc_html(get_theme_mod( 'menu_position',  'right' ) );
        $menu_font = esc_html(get_theme_mod( 'menu_font' ) );
        $menu_weight = esc_html(get_theme_mod( 'menu_weight' ) );
        $menu_color_no_img = esc_html(get_theme_mod( 'menu_color_no_img' ) );
        $menu_background_no_image = esc_html(get_theme_mod( 'menu_background_no_image' ) );
        $menu_position_absolute = esc_html(get_theme_mod( 'menu_position_absolute' ) );
        $menu_transform = esc_html(get_theme_mod( 'menu_transform' ) );
        $menu_left_background = esc_html(get_theme_mod( 'menu_left_background' ) );
        $menu_left_hover_background = esc_html(get_theme_mod( 'menu_left_hover_background' ) );
        $menu_border_top = esc_html(get_theme_mod( 'menu_border_top' ) );
		
		if(!$menu_position_absolute) { $abs = ".site-branding{ top: 50%; }"; } else { $abs = ""; }
		if($menu_border_top) { $btop = ".rp-menu { border-top: 1px solid {$menu_border_top}; }"; } else { $btop = ""; }
		
		if( $menu_color ) { $menu_color_image_no_style = "@media screen and (min-width: 800px) {body .my-cart .fa-solid, .s-search-top .dashicons-search, .main-navigation ul li a {color: {$menu_color};}}";} else {$menu_color_image_no_style ="";}
		if( $menu_hover_color ) { $menu_hover_color_style = "@media screen and (min-width: 800px) {body .my-cart .fa-solid:hover, .s-search-top .dashicons-search:hover, .main-navigation ul li a:hover, .menu-cont .main-navigation ul li a:hover {color: {$menu_hover_color};}}";} else {$menu_hover_color_style ="";}
		
		if( $menu_position == "left" ) { 
			$menu_position_style = "
			
			 .menu-and-detiles {
				 justify-content: left;
			 }
			
			.grid-top .left-detiles {
				display: inline-table;
				vertical-align: middle;
				margin-right: 100px;
			} 
			
			body .header-right {
				margin-left: 80px;
 
			}
			
			#big-search {
				left: 100%;
			}
			";
		}
		
		elseif ( $menu_position == "right" ) {
			$menu_position_style = " @media screen and (min-width: 800px) {
			
				.grid-top{
				    text-align: right; 
					
				}
				
				.menu-and-detiles {
					justify-content: right;
				}
				
				#primary-menu {
				    top: auto; 
					left:0;
				}
				
				.left-detiles {
				    display: inline-block;
					right: 80px;
				}
				
				#site-navigation { 
				    margin-top: 2px;
					padding-left: 20px;
				} 
					
				body .header-right {
					padding-right: 80px;
 
				}
			}";
		}
	    elseif ( $menu_position == "center" ) {
			$menu_position_style = "

				.header-right { 
					display: block;
					position: static;
					width: fit-content;
					margin: 0 auto;
					text-align: center;
				}
				.grid-top {
					display: block;
					text-align: center;
				}
				
				.left-detiles {
					position: static;
					text-align: center;
					width: max-content;
					margin: 0 auto;
					padding: 20px 0;
				}
				.left-detiles .cart-contents {
					position: relative;			
				}
				#site-navigation {
					padding-left: 20px;
				}
				.header-right {
				    padding-top: 10px;
				}
			
			";
		}			
		else { 
			$menu_position_style = "";
		}
		
		if( $menu_position == "center" and  $menu_left == "mobile") {
		    $mob_positon = "
			@media screen and (max-width: 900px) {
				body .grid-top {
					padding: 20px 0;
				}
				body .grid-top .left-detiles {
				    left: 0 !important;
				}
				 .cart-contents {
					top: 5px;
				}
			}
			";
		} else {
		    $mob_positon = "";
		}

		if( $menu_position == "center" and ($menu_left == "desktop" or $menu_left == "")) {
		    $center_desktop = "
			@media screen and (max-width: 900px) {
				 .cart-contents {
					top: 5px !important;
				}
			}
			";
		} else {
		    $center_desktop = "";
		}
		
		if( $menu_position == "center" and $menu_left == "all") {
		    $center_all = "
			@media screen and (max-width: 900px) {
				body .grid-top .left-detiles {
					left: 0 !important;
					padding: 20px 0;
				}
				.cart-contents {
					top: 5px !important;
				}
			}
			";
		} else {
		    $center_all = "";
		}

		if( $menu_position == "right" and $menu_left == "all") {
		    $right_all = "
			@media screen and (max-width: 900px) {
				body .grid-top .left-detiles {
				    position: static !important;	
				}
				.cart-contents {
				     position: relative !important;
					top: 5px !important;
				}
			}
			";
		} else {
		    $right_all = "";
		}
		
		if( $menu_position == "right" and $menu_left == "mobile") {
		    $right_mobile = "
			@media screen and (max-width: 900px) {
				body .grid-top .left-detiles {
				    position: static !important;	
				}
				.cart-contents {
				     position: relative !important;
					top: 5px !important;
				}
			}
			";
		} else {
		    $right_mobile = "";
		}
		
		if( $menu_left_margin ) { $menu_left_margin_style = "body .main-left-but {left: {$menu_left_margin}px;}";} else {$menu_left_margin_style ="";}
		if( $menu_left_margin_top ) { $menu_left_margin_top_style = "@media screen and (min-width: 800px) {body .menu-mobile {margin-top: {$menu_left_margin_top}px;}}";} else {$menu_left_margin_top_style ="";}
		
		
		if( $menu_font ) { $menu_font_style = ".main-navigation ul li a {font-family: '{$menu_font}', 'sans-serif';}";} else {$menu_font_style ="";}
		if( $menu_weight ) { $menu_weight_style = ".main-navigation ul li a {font-weight: {$menu_weight};}";} else {$menu_weight_style ="";}
		if( $menu_transform ) { $menu_transform_style = ".main-navigation ul li a, .main-navigation ul ul li a  {text-transform: {$menu_transform};}";} else {$menu_transform_style ="";}
		
		if( $menu_left_background ) { $menu_left_background_style = "body .nav-right .button {background: {$menu_left_background};}";} else {$menu_left_background_style ="";}
		if( $menu_left_hover_background ) { $menu_left_hover_background_style = "body .nav-right .button:hover {background: {$menu_left_hover_background};}";} else {$menu_left_hover_background_style ="";}
		
		// If has logo
		if( !has_custom_logo() ) { $left_detiles = "#site-navigation {max-width: 90%;}"; } else {$left_detiles ="";}
		
		
		if( ( has_header_image() or get_theme_mod('video_upload') ) and  (is_front_page() or is_home() ) and get_theme_mod( 'header_image_show', 'home' ) == 'home' and !get_theme_mod('menu_position_absolute') ) { 
		    $absolute = ".menu-cont{ position: absolute; }";
			if( $menu_background_image ) { $menu_background_image_style = "@media screen and (min-width: 800px) {body .menu-cont { background: {$menu_background_image};}}";} else {$menu_background_image_style ="";}
		} 
		else if( ( has_header_image() or get_theme_mod('video_upload') ) and get_theme_mod( 'header_image_show' ) == 'all' and !get_theme_mod('menu_position_absolute') ) { 
			$absolute = ".menu-cont{ position: absolute; }";
			if( $menu_background_image ) { $menu_background_image_style = "@media screen and (min-width: 800px) {body .menu-cont { background: {$menu_background_image};}}";} else {$menu_background_image_style ="";}
		}
		else if( get_post_meta( get_the_ID(),'allx_value_header_image', true ) and has_post_thumbnail() and ( (get_theme_mod( 'header_image_show' ) == 'all' or get_theme_mod( 'header_image_show', 'home' ) == 'home') ) and !get_theme_mod('menu_position_absolute') ) { 
			$absolute = ".menu-cont{ position: absolute; }";
			if( $menu_background_image ) { $menu_background_image_style = "@media screen and (min-width: 800px) {body .menu-cont { background: {$menu_background_image};}}";} else {$menu_background_image_style ="";}
		}		
		
		else {
			$absolute = "";
			$menu_background_image_style = "";
		}
		
		if( $menu_color_no_img) { $style_color_no_img = "@media screen and (min-width: 800px) { .rp-menu .my-cart .fa-solid, .s-search-top .dashicons-search, .rp-menu .main-navigation ul li a{ color: {$menu_color_no_img};}}";} else {$style_color_no_img ="";}
		if( $menu_background_no_image  ) { $bg_no_img = "@media screen and (min-width: 800px) {.rp-menu{ background: {$menu_background_no_image};}}";} else {$bg_no_img ="";}	
		if( $menu_left == "all" or $menu_left == "mobile") { $mob_logo = "@media screen and (max-width: 900px) {
			body .grid-top { text-align: center; } 
			body .grid-top .left-detiles { top: 0; left: 10px !important; position: relative !important; } 
			.menu-and-detiles{ position: static !important; padding: 20px 0 !important;
			body .center-detiles, body .grid-menu #grid-top .left-detiles {position: static !important;}
			body .center-detiles {top: 0 !important;}
			}
		}";} else {$mob_logo ="";}	


		
		if( $menu_sub_hover_color ) { $menu_sub_hover_color_style = "@media screen and (min-width: 800px) {.menu-cont .main-navigation ul ul li a:hover, .main-navigation ul ul li a:hover, .rp-menu .main-navigation ul li a:hover {color: {$menu_sub_hover_color};}}";} else {$menu_sub_hover_color_style ="";}
		if( $menu_sub_color ) { $menu_color_image_style = "@media screen and (min-width: 800px) {.rp-menu .main-navigation ul ul li a, .main-navigation ul ul li a {color: {$menu_sub_color};}}";} else {$menu_color_image_style ="";}
		if( $menu_font_size ) { $menu_font_size_style = "@media screen and (min-width: 800px) {.main-navigation ul li a {font-size: {$menu_font_size}px;}}";} else {$menu_font_size_style ="";}

		
		
		if( $menu_sub_top ) { $menu_sub_top_style = "@media screen and (min-width: 800px) { .nav-menu ul { border-top: 3px solid {$menu_sub_top}; }}" ;} else {$menu_sub_top_style ="";}
		if( $menu_sub_background ) { $menu_sub_background_style = "@media screen and (min-width: 800px) {.main-navigation ul ul { background: {$menu_sub_background};}}";} else {$menu_sub_background_style ="";}
		if( $menu_sub_hover_background ) { $menu_sub_hover_background_style = "@media screen and (min-width: 800px) { .main-navigation ul ul li a:hover { background: {$menu_sub_hover_background};}}";} else {$menu_sub_hover_background_style ="";}
		
		wp_add_inline_style( 'custom-style-css', 
		$menu_color_image_no_style.$menu_color_image_style.$menu_background_image_style.$menu_sub_top_style.$menu_sub_background_style.$menu_sub_hover_background_style.$menu_transform_style.
		$menu_sub_hover_color_style.$menu_hover_color_style.$menu_position_style.$menu_font_size_style.$menu_font_style.$menu_weight_style.$absolute.$style_color_no_img.$bg_no_img.
		$menu_left_margin_style.$menu_left_margin_top_style.$abs.$left_detiles.$mob_logo.$mob_positon.$center_desktop.$center_all.$right_all.$right_mobile.$menu_left_background_style.$menu_left_hover_background_style.
		$btop
		);
	}
add_action( 'wp_enqueue_scripts', 'allx__menu_styles' );