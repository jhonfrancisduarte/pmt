<?php
// Do not allow direct access to the file.
if( ! defined( 'ABSPATH' ) ) {
    exit;
}
/**
 * WooCommerce template file.
 *
**/
get_header(); ?>
<div class="woo-page">
	<div id="primary" <?php if( get_theme_mod('allx_sidebar_position_categories') == "3" ) { echo "style='width: 100%;'"; } ?> class="content-area">
		<main id="main" class="site-main" role="main">
			<article id="post-<?php the_ID(); ?>">
				<?php woocommerce_content(); ?>
			</article>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php 
if( get_theme_mod('allx_sidebar_position_categories') != "3" ) {
    get_sidebar();
}
?>
</div>	
<?php
get_footer();