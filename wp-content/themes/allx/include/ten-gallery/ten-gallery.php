<?php if( ! defined( 'ABSPATH' ) ) { exit; }
	
	/******************************************************
		* Admin Styles
	*******************************************************/
	add_action( 'admin_enqueue_scripts', 'allx_admin_ten_gallery_scripts' ); 
	function allx_admin_ten_gallery_scripts() { 
		global $post;
		
		if ( is_object( $post ) && $post->post_type=='seos_gallery' ) {
			wp_enqueue_style( 'ten-admin-css', allx_THEME_URI . 'include/ten-gallery/admin.css' );
			wp_enqueue_script( 'ten-admin-js', allx_THEME_URI . 'include/ten-gallery/admin.js', array(), '', true );
		}
	}
	
	/******************************************************
		* Styles
	*******************************************************/
	
	add_action( 'wp_enqueue_scripts', 'allx_ten_gallery_scripts' ); 
	
	function allx_ten_gallery_scripts() { 
		wp_enqueue_style( 'ten_gallery-styles-css', allx_THEME_URI . 'include/ten-gallery/style.css' );
		wp_enqueue_script( 'ten_gallery-js', allx_THEME_URI . 'include/ten-gallery/script.js', array(), '', true);	
	}
	
	/******************************************************
		* Function Front-end
	*******************************************************/	
	
	add_action('ten_gallery','allx_ten_gallery');	
	function allx_ten_gallery() { 
		$id = get_the_ID();
		$count_slides[$id] = 0;
		for( $i=1; $i<=10; $i++ ) {
			$images = get_post_meta( $id, 'mp_images_cat'.$i, true );	
			if( $images ){
				$count_slides[$id] += 1;
			} 
		}
		
		if( $count_slides[$id] > 0 ) {
		?>
		<div class="mp-2">
		<?php if( get_theme_mod( 'allx_cat_gallery_icon', '1' ) ) {  ?>
			<span id="ten-<?php echo $id; ?>" class="dashicons dashicons-images-alt2"></span>
		<?php } ?>
			<div id="ten-wrap<?php echo $id; ?>" class="ten-wrap">
				<div id="iframe-overlay"></div>
				<div class="ten-gallery">
					<span id="close-ten-<?php echo $id; ?>" class="close-ten">X</span>
					<div class="ten-cont">
						<div class="slideshow-container">
							<?php 
								for( $i=1; $i<=10; $i++ ) { 
									
									$images = get_post_meta( $id, 'mp_images_cat'.$i, true );	
									$description = get_post_meta( $id, 'mp_description'.$i, true );	
									if( $images ) { 
										$count_slides[$id] += 1;
									?>
									<div class="mySlides<?php echo $id; ?> fade">
										<img src="<?php echo esc_url( $images ); ?>">
										<p><?php echo esc_html( $description ); ?></p>
									</div>	
									<?php } 
								} 
								if($count_slides[$id] > 2) {
								?>
								<a class="prev-ten" onclick="plusSlides<?php echo $id; ?>(-1)">❮</a>
								<a class="next-ten" onclick="plusSlides<?php echo $id; ?>(1)">❯</a>
							<?php } ?>
							</div>	
						<?php if($count_slides[$id] > 0) { ?>
							<script>
								let slideIndex<?php echo $id; ?> = 1;
								showSlides<?php echo $id; ?>(slideIndex<?php echo $id; ?>);
								
								function plusSlides<?php echo $id; ?>(n<?php echo $id; ?>) {
									showSlides<?php echo $id; ?>(slideIndex<?php echo $id; ?> += n<?php echo $id; ?>);
								}
								function showSlides<?php echo $id; ?>(n<?php echo $id; ?>) {
									let i;
									let slides = document.getElementsByClassName("mySlides<?php echo $id; ?>");
									
									if (n<?php echo $id; ?> > slides.length) {slideIndex<?php echo $id; ?> = 1}    
									if (n<?php echo $id; ?> < 1) {slideIndex<?php echo $id; ?> = slides.length}
									for (i = 0; i < slides.length; i++) {
										slides[i].style.display = "none";  
									}
									slides[slideIndex<?php echo $id; ?>-1].style.display = "block";  
								}
							</script>
						<?php } ?>
					</div>
				</div>		
			</div>
			<p <?php if( !get_theme_mod( 'allx_cat_gallery_icon',"1") ) { ?> id="ten-<?php echo $id; ?>"<?php } ?> class="show-desc">
			<?php
			if(get_theme_mod( 'allx_cat_gallery' ) ) {
				echo esc_html( get_theme_mod( 'allx_cat_gallery' ) );
				} else { 
					esc_html_e( 'GALLERY', 'allx' );
				} ?>
				
				</p>	
		</div>
	<?php  } ?>
	
<?php }