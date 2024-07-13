<?php if( ! defined( 'ABSPATH' ) ) exit;
	
	function allx_orientation() {
		$array = array(
		'v' => esc_attr__( 'Vertical', 'allx' ),
		'h' => esc_attr__( 'Horizontal', 'allx' ),
		'r' => esc_attr__( 'Random', 'allx' ),
		);
		return $array;
	}
	function allx_sanitize_orientation( $input ) {
		$valid = allx_orientation();
		if ( array_key_exists( $input, $valid ) ) {
			return $input;
			} else {
			return '';
		}
	}		
	
	function allx_slicebox_customize_register( $wp_customize ) {

		/***************** Slider General *********************/
		
		$wp_customize->add_panel( 'allx_homepage_slider_options' , array(
		'title'       => __( 'Homepage Slider', 'allx' ),
		'priority'   => 2,
		) );
		
		$wp_customize->add_section( 'allx_slicebox_general_options' , array(
		'title'       => __( 'General Options', 'allx' ),
		'panel'       => 'allx_homepage_slider_options',
		'priority'   => 25,
		) );
		
		$wp_customize->add_setting( 'allx_slicebox_activate', array (
		'sanitize_callback' => 'allx__sanitize_checkbox',
		'default' => false
		) );
		
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'allx_slicebox_activate', array(
		'label'    => __( 'Activate on Homepage Top', 'allx' ),
		'description'    => __( 'The slider uses fixed dimensions for the image. Before uploading your image you need to resize it to 740px width and 500px height.', 'allx' ),
		'section'  => 'allx_slicebox_general_options',
		'type' => 'checkbox',
		) ) );	
		
		$wp_customize->add_setting( 'allx_slicebox_orientation', array (
		'sanitize_callback' => 'allx_sanitize_orientation',
		'default' => 'v',
		) );
		
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'allx_slicebox_orientation', array(
		'label'    => __( 'Slider', 'allx' ),
		'section'  => 'allx_slicebox_general_options',		
		'type'     =>  'select',		
		'choices'  => array(
		'v' => esc_attr__( 'Vertical', 'allx' ),
		'h' => esc_attr__( 'Horizontal', 'allx' ),
		'r' => esc_attr__( 'Random', 'allx' ),
		)
		) ) );
		
		$wp_customize->add_setting( 'allx_slicebox_speed', array (
		'sanitize_callback' => 'absint',
		'default' => 3000
		) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'allx_slicebox_speed', array(
		'section'  => 'allx_slicebox_general_options',
		'priority'    => 10,
		'label'       => __( 'Slider Interval in milliseconds.', 'allx' ),			
		'type'     =>  'number',
		'input_attrs'     => array(
		'min'  => 2000,
		'max'  => 10000,
		'step' => 500,
		),
		) ) );
		
		$wp_customize->add_setting( 'allx_slicebox_title', array (
		'sanitize_callback' => 'sanitize_text_field',
		) );
		
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'allx_slicebox_title', array(
		'label'    => __( 'Slider Title', 'allx' ),		
		'section'  => 'allx_slicebox_general_options',
		'type'     =>  'text'				
		) ) );	
		
		$wp_customize->add_setting('slicebox_button_color', array(
		'sanitize_callback' => 'sanitize_hex_color'
		) ); 		
		$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'slicebox_button_color', array(
		'label' => __('Pagination Color', 'allx'),        
		'section' => 'allx_slicebox_general_options',
		) ) );
		
		$wp_customize->add_setting( 'allx_slicebox_pagi', array (
		'sanitize_callback' => 'allx__sanitize_checkbox',
		'default' => true
		) );
		
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'allx_slicebox_pagi', array(
		'label'    => __( 'Activate Pgination', 'allx' ),
		'section'  => 'allx_slicebox_general_options',
		'type' => 'checkbox',
		) ) );
		
		$slides = array(
			array(
			'section' => 'allx_slicebox_slides',
			'setting' => 'allx_slicebox_slide_1',
			'title_setting' => 'allx_slicebox_title_1',
			'url_setting' => 'allx_slicebox_url_1',			
			'title_label' => __( 'Slide Title', 'allx' ),
			'default' =>  allx_THEME_URI.'images/slide-1.webp',
			),
			array(
			'section' => 'allx_slicebox_slides_2',
			'setting' => 'allx_slicebox_slide_2',
			'title_setting' => 'allx_slicebox_title_2',
			'url_setting' => 'allx_slicebox_url_2',			
			'title_label' => __( 'Slide Title', 'allx' ),
			'default' =>  allx_THEME_URI.'images/slide-2.webp',
			),
			array(
			'section' => 'allx_slicebox_slides_3',
			'setting' => 'allx_slicebox_slide_3',
			'title_setting' => 'allx_slicebox_title_3',
			'url_setting' => 'allx_slicebox_url_3',
			'title_label' => __( 'Slide Title', 'allx' ),
			'default' =>  allx_THEME_URI.'images/slide-3.webp',
			),
		);
		
		foreach ($slides as $slide) {
			
			$wp_customize->add_section( $slide['section'], array(
			'title'       => sprintf( __( 'Slide %d', 'allx' ), array_search($slide, $slides) + 1 ),
			'panel'       => 'allx_homepage_slider_options',
			'priority'   => 25,
			) );
			
			$wp_customize->add_setting( $slide['setting'], array (
			'sanitize_callback' => 'esc_url_raw',
			'default' => $slide['default'],
			) );
			
			$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, $slide['setting'], array(
			'label'    => __( 'Upload Image', 'allx' ),
			'description'    => __( 'Requires image size width 740px height 500px.', 'allx' ),
			'section'  => $slide['section'],
			) ) );
			
			$wp_customize->add_setting( $slide['title_setting'], array (
			'sanitize_callback' => 'sanitize_text_field',
			) );
			
			$wp_customize->add_control( new WP_Customize_Control( $wp_customize, $slide['title_setting'], array(
			'label'    => $slide['title_label'],
			'section'  => $slide['section'],
			'type'     => 'text'
			) ) );
			
			$wp_customize->add_setting( $slide['url_setting'], array (
			'sanitize_callback' => 'esc_url_raw',
			) );
			
			$wp_customize->add_control( new WP_Customize_Control( $wp_customize, $slide['url_setting'], array(
			'label'    => __( 'URL', 'allx' ),
			'section'  => $slide['section'],
			'type'     => 'url'
			) ) );			
		}
	}
	add_action( 'customize_register', 'allx_slicebox_customize_register' );
	
	/********************************************
		* Styles
	*********************************************/ 	
	add_action( 'wp_enqueue_scripts', 'allx_slicebox_method' );	
	function allx_slicebox_method() {
        $slicebox_button_color = esc_attr( get_theme_mod( 'slicebox_button_color' ) );
		if( $slicebox_button_color ) { $style1 = "body .ssbox .container-seos-slicebox .nav-dots span.nav-dot-current {box-shadow: 0 1px 1px rgba(255,255,255,0.6), inset 0 1px 1px rgba(0,0,0,0.1), inset 0 0 0 3px {$slicebox_button_color}, inset 0 0 0 8px {$slicebox_button_color};}";} else {$style1 ="";}
        wp_add_inline_style( 'custom-style-css', 
		$style1
		);
	}	
	
	function allx_slicebox() { ?>
	
	<div class="ssbox">
		<div class="container-seos-slicebox">
			<?php if( get_theme_mod( 'allx_slicebox_title' ) ){?>
				<h2><?php echo esc_html( get_theme_mod( 'allx_slicebox_title' ) ); ?></h2>
			<?php } ?>
			<div class="wrapper">
				<ul id="sb-slider" class="sb-slider">
					<?php
						for ($i=1; $i<=10; $i++) {
							
							$image = get_theme_mod('allx_slicebox_slide_'.$i);
							$title = get_theme_mod('allx_slicebox_title_'.$i);
							$url = get_theme_mod('allx_slicebox_url_'.$i);
							
							if( $image ) { ?>
							<li>
								<img class="ssbox-img" src="<?php echo esc_url( $image ); ?>" alt="image<?php echo $i; ?>"/>
								<?php if( $title ) { ?>
									<div class="sb-description">
									    <?php if( $url ) { ?><a href="<?php echo esc_url( $url ); ?>" target="_blank"><?php } ?>
										<h3><?php echo esc_html( $title ); ?></h3>
										<?php if( $url ) { ?></a><?php } ?>
									</div>
								<?php } ?>
							</li>
							<?php }
						}
					?>
				</ul>
				<div id="shadow" class="shadow"></div>
				<div id="nav-arrows" class="nav-arrows">
					<a href="#"><span class="dashicons dashicons-arrow-right-alt2"></span></a>
					<a href="#"><span class="dashicons dashicons-arrow-left-alt2"></span></a>
				</div>
				<?php if ( get_theme_mod( 'allx_slicebox_pagi', true ) ) { ?>
					<div id="nav-dots" class="nav-dots">
						<?php 
							$nums = 0;
							for ($i=1; $i<=10; $i++) {
								$nums++;
								$image = get_theme_mod('allx_slicebox_slide_'.$i);
								if( $image ) { 
									if($nums == 1){ ?>
									<span class="nav-dot-current"></span>
									<?php	}
									else {
									?>
									<span></span>
									<?php }
								}
							} ?>
					</div>
				<?php } ?>
			</div><!-- /wrapper -->
		</div>	
	</div>
	<script>
		jQuery(function() {	
			let PageAllx = (function() {
			let actualIntervalAllX = 3000;
			let orientationlInterVal =  "r";
				let intervalVal = <?php echo esc_html(get_theme_mod( 'allx_slicebox_speed', 3000)); ?>;
				let orientationVal = "<?php echo esc_html( get_theme_mod( 'allx_slicebox_orientation', 'r' ) ); ?>";
				actualIntervalAllX = intervalVal ? intervalVal : 3000;
				orientationlInterVal = orientationVal ? orientationVal : "r";
				
				let $navArrows = jQuery( '#nav-arrows' ).hide(),
				$navDots = jQuery( '#nav-dots' ).hide(),
				$nav = $navDots.children( 'span' ),
				$shadow = jQuery( '#shadow' ).hide(),
				slicebox = jQuery( '#sb-slider' ).slicebox( {
					onReady : function() {
						$navArrows.show();
						$navDots.show();
						$shadow.show();
						slicebox.play();
					},
					interval: actualIntervalAllX,
					cuboidsCount : 3,
					orientation : orientationlInterVal, // (v)ertical, (h)orizontal or (r)andom
					onBeforeChange : function( pos ) {
						$nav.removeClass( 'nav-dot-current' );
						$nav.eq( pos ).addClass( 'nav-dot-current' );
					}
				} ),
				init = function() {
					initEvents();	
				},
				initEvents = function() {
					// add navigation events
					$navArrows.children( ':first' ).on( 'click', function() {
						slicebox.next();
						return false;	
					} );
					$navArrows.children( ':last' ).on( 'click', function() {
						slicebox.previous();
						return false;
					} );
					$nav.each( function( i ) {
						jQuery( this ).on( 'click', function( event ) {
							
							let $dot = jQuery( this );
							
							if( !slicebox.isActive() ) {
								$nav.removeClass( 'nav-dot-current' );
								$dot.addClass( 'nav-dot-current' );	
							}
							slicebox.jump( i + 1 );
							return false;
							
						} );
					} );
				};
				return { init : init };
				
			})();
			PageAllx.init();
		});
	</script>
	
<?php }