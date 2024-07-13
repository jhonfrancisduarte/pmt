<?php
	/*
		* A Simple Category Template
	*/
get_header(); ?>

<div id="primary" class="content-area">
	
	<main id="main" class="site-main" role="main">
		
		<?php if ( have_posts() ) : ?>
		
		<header class="page-header">
			<?php
				the_archive_title( '<h1 class="page-title">', '</h1>' );
				
				the_archive_description( '<div class="taxonomy-description">', '</div>' );
			?>
		</header><!-- .page-header -->
		
		<?php while ( have_posts() ) : the_post(); 
		
		if(get_theme_mod('cat_temp') == "temp2"){ ?>
		<article id="post-<?php the_ID(); ?>" <?php echo wp_kses_post( allx__animation('allx__articles_animation') ); ?>  <?php post_class(); ?>>
			<header class="entry-header">
				<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
				<?php if ( 'post' === get_post_type() ) : ?>
				<div class="entry-meta">
					<?php
						allx__posted_on();
						allx__posted_by();
						allx__entry_footer(); 
					?>
				</div><!-- .entry-meta -->
				<?php endif; ?>
			</header><!-- .entry-header -->
			<?php 	
			
				if ( has_post_thumbnail() ) { ?>
				<a class="app-img-effect" href="<?php the_permalink(); ?>">	
					<div class="app-first">
						<div class="app-sub">
							<div class="hover-eff">
								<div class="fig">
									<?php the_post_thumbnail( 'post-thumbnail', array( 'itemprop' => 'image', 'alt'   => get_the_title(), 'title' => get_the_title() ) ); ?>		
								</div>
							</div>
						</div>
					</div>
				</a> 
				<?php }  
			the_excerpt();  
			?>
		</article>
		<?php
		} 
		else {
		do_action('mp_search_query');// go to /include/search-query.php
		}
		 endwhile; ?>
		
		<div class="nextpage">
			
			<div class="pagination">
				
				<?php echo paginate_links(); ?>
				
			</div>
			
		</div> 
		
		<?php else : ?>
		
		<?php get_template_part( 'template-parts/content', 'none' ); ?>
		
		<?php endif; ?>		
	</main><!-- #main -->
</div><!-- #primary -->
<?php get_sidebar(); ?>	
<?php get_footer(); ?>				