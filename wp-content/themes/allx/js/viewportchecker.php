<?php if( ! defined( 'ABSPATH' ) ) exit;
	
	function allx_animation_classes () { ?>
	<script>
		
		jQuery("body").ready(function() {
			
			
			jQuery('.lt-left').addClass("hidden").viewportChecker({
				classToAdd: 'animated fadeInLeft',
				offset: 0  
			}); 
			
			jQuery('.lt-right').addClass("hidden").viewportChecker({
				classToAdd: 'animated fadeInRight',
				offset: 0  
			});

			
		});
		

		
	</script>
	<?php } 
	
	add_action('wp_footer', 'allx_animation_classes');				   
	
	
