<?php
	
// Do not allow direct access to the file.
if ( !defined( 'ABSPATH' ) ) {
    exit;
}

define( 'allx_THEME_URI', trailingslashit( esc_url( get_template_directory_uri() ) ) );
define( 'allx_THEME_DIR', trailingslashit( get_template_directory() ) );

$allx_theme = wp_get_theme();
$allx_version = $allx_theme->get( 'Version' );
define( 'ALLX_THEME_VERSION', $allx_version );

if ( !function_exists( 'allx__setup' ) ) {
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     */
    function allx__setup()
    {
        /*
         * Make theme available for translation.
         */
        load_theme_textdomain( 'allx', allx_THEME_DIR . '/languages' );
        // Add default posts and comments RSS feed links to head.
        add_theme_support( 'automatic-feed-links' );
        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support( 'title-tag' );
        /*
         * Enable support for Post Thumbnails on posts and pages.
         */
        add_theme_support( 'post-thumbnails' );
        /*
         * WooCommerce Support
         */
        add_theme_support( 'woocommerce' );
        add_theme_support( 'wc-product-gallery-zoom' );
        add_theme_support( 'wc-product-gallery-lightbox' );
        add_theme_support( 'wc-product-gallery-slider' );
        /*
         * Gutenberg Support
         */
        add_theme_support( 'custom-line-height' );
        add_theme_support( 'align-wide' );
        add_theme_support( 'wp-block-styles' );
        add_theme_support( 'responsive-embeds' );
        add_theme_support( 'editor-styles' );
        add_action( 'init', function () {
            register_block_style( 'core/cover', [
                'name'         => 'my-cover-100',
                'label'        => __( 'Cover height 100px', 'allx' ),
                'inline_style' => '.is-style-my-cover-100 { min-height: 100px;}',
            ] );
            register_block_style( 'core/cover', [
                'name'         => 'my-cover-200',
                'label'        => __( 'Cover height 200px', 'allx' ),
                'inline_style' => '.is-style-my-cover-200 { min-height: 200px;}',
            ] );
            register_block_style( 'core/cover', [
                'name'         => 'my-cover-300',
                'label'        => __( 'Cover height 300px', 'allx' ),
                'inline_style' => '.is-style-my-cover-300 { min-height: 300px;}',
            ] );
            register_block_style( 'core/cover', [
                'name'         => 'my-cover-400',
                'label'        => __( 'Cover height 400px', 'allx' ),
                'inline_style' => '.is-style-my-cover-400 { min-height: 400px;}',
            ] );
            register_block_style( 'core/cover', [
                'name'         => 'my-cover-500',
                'label'        => __( 'Cover height 500px', 'allx' ),
                'inline_style' => '.is-style-my-cover-500 { min-height: 500px;}',
            ] );
            register_block_style( 'core/paragraph', array(
                'name'         => 'prefix-rounded-corners-5',
                'label'        => __( 'Rounded corners (Requires background color). Border radius 5px', 'allx' ),
                'inline_style' => '.is-style-prefix-rounded-corners-5 {  
						border-radius: 5px;
					}',
            ) );
            register_block_style( 'core/paragraph', array(
                'name'         => 'prefix-rounded-corners-10',
                'label'        => __( 'Rounded corners (Requires background color). Border radius 10px', 'allx' ),
                'inline_style' => '.is-style-prefix-rounded-corners-10 {  
						border-radius: 10px;
					}',
            ) );
        } );
        // This theme uses wp_nav_menu() in one location.
        add_theme_support( 'nav-menus' );
        register_nav_menu( 'primary', esc_html__( 'Primary', 'allx' ) );
        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support( 'html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption'
        ) );
        // Set up the WordPress core custom background feature.
        add_theme_support( 'custom-background', apply_filters( 'allx__custom_background_args', array(
            'default-color' => 'ffffff',
            'default-image' => '',
        ) ) );
        // Add theme support for selective refresh for widgets.
        add_theme_support( 'customize-selective-refresh-widgets' );
        /**
         * Add support for core custom logo.
         */
        add_theme_support( 'custom-logo', array(
            'flex-width'  => true,
            'flex-height' => true,
        ) );
        register_default_headers( array(
            'img1' => array(
            'url'           => allx_THEME_URI . 'images/header.jpg',
            'thumbnail_url' => allx_THEME_URI . 'images/header.jpg',
            'description'   => esc_html__( 'Default Image 1', 'allx' ),
        ),
        ) );
    }

}
add_action( 'after_setup_theme', 'allx__setup' );
function wpdocs_theme_add_editor_styles()
{
    add_editor_style( 'editor-styles.css' );
}

add_action( 'admin_init', 'wpdocs_theme_add_editor_styles' );
/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 */
function allx__content_width()
{
    // This variable is intended to be overruled from themes.
    $GLOBALS['content_width'] = apply_filters( 'allx__content_width', 640 );
}

add_action( 'after_setup_theme', 'allx__content_width', 0 );
/**
 * Register widget area.
 */
function allx__widgets_init()
{
    register_sidebar( array(
        'name'          => esc_html__( 'Sidebar', 'allx' ),
        'id'            => 'sidebar-1',
        'description'   => esc_html__( 'Add widgets here.', 'allx' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );

    register_sidebar( array(
        'name'          => esc_html__( 'Footer 1', 'allx' ),
        'id'            => 'footer-1',
        'description'   => '',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );
    register_sidebar( array(
        'name'          => esc_html__( 'Footer 2', 'allx' ),
        'id'            => 'footer-2',
        'description'   => '',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );
    register_sidebar( array(
        'name'          => esc_html__( 'Footer 3', 'allx' ),
        'id'            => 'footer-3',
        'description'   => '',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );
    register_sidebar( array(
        'name'          => esc_html__( 'Footer 4', 'allx' ),
        'id'            => 'footer-4',
        'description'   => '',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );
}

add_action( 'widgets_init', 'allx__widgets_init' );
/**
 * Enqueue scripts and styles.
 */
function allx__scripts()
{
    wp_enqueue_script( 'jquery' );
    wp_enqueue_script(
        'allx-menu',
        allx_THEME_URI . 'js/menu.js',
        array(),
        '',
        true
    );
    wp_enqueue_style( 'custom-style-css', get_stylesheet_uri() );
    wp_enqueue_style( 'dashicons' );
    wp_enqueue_style( 'allx-animate-css', allx_THEME_URI . 'css/animate.css' );
    wp_enqueue_style( 'allx-form-css', allx_THEME_URI . 'css/form-styles.css' );
    wp_enqueue_script(
        'allx-search-top-js',
        allx_THEME_URI . 'js/search-top.js',
        array(),
        '',
        false
    );
    wp_enqueue_script(
        'allx-select-search-js',
        allx_THEME_URI . 'js/select-search.js',
        array(),
        ALLX_THEME_VERSION,
        true
    );
    wp_enqueue_style(
        'allx-font-awesome',
        allx_THEME_URI . 'css/font-awesome.css',
        array(),
        '',
        false
    );
    wp_enqueue_style(
        'allx-font-awesome-v4-shims',
        allx_THEME_URI . 'css/v4-shims.css',
        array(),
        '',
        false
    );
    wp_enqueue_style(
        'allx-font-awesome-v5-font-face',
        allx_THEME_URI . 'css/v5-font-face.css',
        array(),
        '',
        false
    );
    wp_enqueue_style(
        'allx-font-awesome-v4-font-face',
        allx_THEME_URI . 'css/v4-font-face.css',
        array(),
        '',
        false
    );
    wp_enqueue_style(
        'allx-font-woo-css',
        allx_THEME_URI . 'include/woocommerce/woo-css.css',
        array(),
        '4.7.0'
    );
    wp_enqueue_style( 'allx-font-oswald', allx_THEME_URI . 'css/oswald.css' );
    wp_enqueue_script(
        'allx-navigation',
        allx_THEME_URI . 'js/navigation.js',
        array(),
        ALLX_THEME_VERSION,
        true
    );
    wp_enqueue_script(
        'allx-mobile-menu',
        allx_THEME_URI . 'js/mobile-menu.js',
        array(),
        ALLX_THEME_VERSION,
        false
    );
    wp_enqueue_script(
        'allx-viewportchecker',
        allx_THEME_URI . 'js/viewportchecker.js',
        array(),
        ALLX_THEME_VERSION,
        true
    );
    wp_enqueue_script(
        'allx-top',
        allx_THEME_URI . 'js/to-top.js',
        array(),
        ALLX_THEME_VERSION,
        true
    );
    wp_enqueue_style( 'allx-back-top-css', allx_THEME_URI . 'include/back-to-top/style.css' );
    wp_enqueue_script(
        'allx-search-top-main-js',
        allx_THEME_URI . 'include/back-to-top/main.js',
        array(),
        ALLX_THEME_VERSION,
        true
    );
    wp_enqueue_script(
        'allx-search-top-util-js',
        allx_THEME_URI . 'include/back-to-top/util.js',
        array(),
        ALLX_THEME_VERSION,
        true
    );
    wp_enqueue_script(
        'allx-skip-link-focus-fix',
        allx_THEME_URI . 'js/skip-link-focus-fix.js',
        array(),
        ALLX_THEME_VERSION,
        true
    );
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
    wp_localize_script( 'allx-menu', 'menuObject', array(
        'menu_position_abs' => esc_html( get_theme_mod( 'menu_position_absolute' ) ),
    ) );
	wp_enqueue_style( 'slicebox-styles-css', allx_THEME_URI . 'include/slicebox/style.css' );
	wp_enqueue_script( 'slicebox-modernizr-js', allx_THEME_URI . 'include/slicebox/modernizr.js', array(), ALLX_THEME_VERSION, false);
	wp_enqueue_script( 'slicebox-js', allx_THEME_URI . 'include/slicebox/slicebox.js', array(), ALLX_THEME_VERSION, true);		
}

add_action( 'wp_enqueue_scripts', 'allx__scripts' );

function allx_admin_scripts() {
    wp_enqueue_style( 'wp-color-picker' );
    wp_enqueue_style( 'style-admin-css', allx_THEME_URI . 'css/admin.css' );
    wp_enqueue_script( 'admin-js',  allx_THEME_URI . 'js/admin.js', array(), '', true );
	wp_enqueue_script( 'wp-color-picker-alpha', allx_THEME_URI . 'js/wp-color-picker-alpha.js', array( 'wp-color-picker' ), ALLX_THEME_VERSION, true );
	wp_add_inline_script('wp-color-picker-alpha', 'jQuery( function() { jQuery( ".color-picker-alpha-options" ).wpColorPicker(); } );');
}

add_action( 'admin_enqueue_scripts', 'allx_admin_scripts' );


function custom_editor_styles() {
    add_editor_style('css/editor-style.css'); 
}

add_action('admin_init', 'custom_editor_styles');
/**
 * Includes
 */
 
require_once allx_THEME_DIR . '/include/content-customizer.php';
require_once allx_THEME_DIR . '/include/custom-header.php';
require_once allx_THEME_DIR . '/include/template-tags.php';
require_once allx_THEME_DIR . '/include/customizer.php';
require_once allx_THEME_DIR . '/include/header-top.php';
require_once allx_THEME_DIR . '/include/read-more-button.php';
require_once allx_THEME_DIR . '/include/animations/animations.php';
require_once allx_THEME_DIR . '/include/menu-options.php';
require_once allx_THEME_DIR . '/include/post-options.php';
require_once allx_THEME_DIR . '/include/color-scheme.php';
require_once allx_THEME_DIR . '/include/back-to-top/back-to-top-button.php';
require_once allx_THEME_DIR . '/include/header-buttons.php';
require_once allx_THEME_DIR . '/include/footer-options.php';
require_once allx_THEME_DIR . '/include/range/range-class.php';
require_once allx_THEME_DIR . '/include/typography.php';
require_once allx_THEME_DIR . '/include/dark-mode/dark-mode.php';
require_once allx_THEME_DIR . '/include/letters/anime.php';
require_once allx_THEME_DIR . '/css/animation-speed.php';
require_once allx_THEME_DIR . '/js/viewportchecker.php';
require_once allx_THEME_DIR . '/include/search-query.php';
require_once allx_THEME_DIR . '/include/categories-options.php';
require_once allx_THEME_DIR . '/include/colors.php';
require_once allx_THEME_DIR . '/include/templates-home/layout-left.php';
require_once allx_THEME_DIR . '/include/templates-home/layout-right.php';
require_once allx_THEME_DIR . '/include/categories-templates.php';
require_once allx_THEME_DIR . '/include/sc.php';
require_once allx_THEME_DIR . '/include/pro/pro.php';
require_once allx_THEME_DIR . '/include/customize-pro/class-customize.php';
require_once allx_THEME_DIR . '/include/top-icons/top-icons.php';
require_once allx_THEME_DIR . '/include/sidebar-position.php';
require_once allx_THEME_DIR . '/include/slicebox/slicebox.php';
require_once allx_THEME_DIR . '/include/slicebox/slicebox.php';
require_once allx_THEME_DIR . '/include/page-404.php';

if ( class_exists( 'WooCommerce' ) ) {
    require_once allx_THEME_DIR . '/include/woocommerce/cart.php';
}

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
    require_once allx_THEME_DIR . '/include/jetpack.php';
}
/**
 * Adds custom classes to the array of body classes.
 */
function allx__body_classes( $classes )
{
    // Adds a class of hfeed to non-singular pages.
    if ( !is_singular() ) {
        $classes[] = 'hfeed';
    }
    // Adds a class of no-sidebar when there is no sidebar present.
    if ( !is_active_sidebar( 'sidebar-1' ) ) {
        $classes[] = 'no-sidebar';
    }
    return $classes;
}

add_filter( 'body_class', 'allx__body_classes' );
function allx__sidebar_position()
{
    if ( is_active_sidebar( 'sidebar-1' ) ) {
        wp_enqueue_style( 'style-sidebar', allx_THEME_URI . 'layouts/left-sidebar.css' );
    }
}

add_action( 'wp_enqueue_scripts', 'allx__sidebar_position' );
/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function allx__pingback_header()
{
    if ( is_singular() && pings_open() ) {
        printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
    }
}

add_action( 'wp_head', 'allx__pingback_header' );

function allx_customizer_styles() {
    wp_enqueue_style( 'allx-customizer-styles', allx_THEME_URI . 'css/customize.css' );
}
add_action( 'customize_controls_enqueue_scripts', 'allx_customizer_styles' );

/*********************************************************************************************************
* Customizer Styles
**********************************************************************************************************/
function allx__customize_checkbox_styles( $input )
{
    ?>
	<style>

	</style>	
	<?php
}

add_action( 'customize_controls_print_styles', 'allx__customize_checkbox_styles' );
/**
 * Header Image Animation
 */
function allx__header_image_zoom()
{
    if ( !get_theme_mod( 'allx__header_zoom' ) ) {
        ?>
		<style>
@-webkit-keyframes header-image {
  0% {
    -webkit-transform: scale(1) translateY(0);
            transform: scale(1) translateY(0);
    -webkit-transform-origin: 50% 16%;
            transform-origin: 50% 16%;
  }
  100% {
    -webkit-transform: scale(1.25) translateY(-15px);
            transform: scale(1.25) translateY(-15px);
    -webkit-transform-origin: top;
            transform-origin: top;
  }
}
@keyframes header-image {
  0% {
    -webkit-transform: scale(1) translateY(0);
            transform: scale(1) translateY(0);
    -webkit-transform-origin: 50% 16%;
            transform-origin: 50% 16%;
  }
  100% {
    -webkit-transform: scale(1.25) translateY(-15px);
            transform: scale(1.25) translateY(-15px);
    -webkit-transform-origin: top;
            transform-origin: top;
  }
}
	</style>
	<?php 
    }
}

add_action( 'wp_head', 'allx__header_image_zoom' );
/**
 * Header Image - Zoom Animation Speed
 */
function allx__heade_image_zoom_speed()
{
    ?>
	-webkit-animation: header-image 
	<?php 
    
    if ( get_theme_mod( 'header_zoom_speed' ) ) {
        echo  esc_attr( get_theme_mod( 'header_zoom_speed' ) ) ;
    } else {
        echo  "20" ;
    }
    
    ?>s ease-out both; 
	animation: header-image
	<?php 
    
    if ( get_theme_mod( 'header_zoom_speed' ) ) {
        echo  esc_attr( get_theme_mod( 'header_zoom_speed' ) ) ;
    } else {
        echo  "20" ;
    }
    
    ?>s ease-out 0s 1 normal both running;
<?php 
}

/** 
 * Replace empty paragraph tags with <br>.
 */
function allx_replace_empty_p( $content )
{
    $replace = array(
        '<p></p>' => '<br>',
    );
    return strtr( $content, $replace );
}

add_filter( 'the_content', 'allx_replace_empty_p' );
remove_filter( 'widget_text_content', 'wpautop' );
