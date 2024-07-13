<?php
/**
 * The template for displaying 404 pages (not found)
 */
get_header(); ?>
	<div class="content-area">
			<section class="error-404 not-found">
				<header class="page-header"> </header><!-- .page-header -->
				<p><?php esc_html_e( 'OOPS! PAGE NOT FOUND', 'allx' ); ?></p>
				<h2><?php esc_html_e( '404', 'allx' ); ?></h2>
				<a title="home" href="<?php echo esc_url( home_url() ); ?>"><?php echo esc_html( 'HOME', 'allx' ); ?></a>
				<div class="page-content">
					<p class="cont-404"><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'allx' ); ?></p>
					<?php get_search_form( 'search-form' ); ?>
				</div><!-- .page-content -->
			</section><!-- .error-404 -->
	</div><!-- #primary -->
<?php
get_footer();