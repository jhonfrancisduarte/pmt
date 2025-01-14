<?php
// Do not allow direct access to the file.
if( ! defined( 'ABSPATH' ) ) {
    exit;
}
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 */
get_header();
?>
	<div id="primary" class="content-area">
		<main id="main" class="disable-title site-main">
		<?php
		while ( have_posts() ) :
			the_post();
			get_template_part( 'template-parts/content', get_post_type() ); 
		
			?>
				<div class="postnav">
					<div class="nav-previous">
					    <span class="dashicons dashicons-arrow-left"></span>
						<?php previous_post_link( '%link', __(' Previous', 'allx') );  ?>
					</div>
					<div class="nav-next">
						<?php next_post_link( '%link', __( 'Next ', 'allx' ) ); ?>						
						<span class="dashicons dashicons-arrow-right"></span>
					</div>
					</div>
		    <?php
			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;
		endwhile; // End of the loop.
		?>
		</main><!-- #main -->
	</div><!-- #primary -->
<?php
get_sidebar();
get_footer();