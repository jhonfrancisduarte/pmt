<?php if( ! defined( 'ABSPATH' ) ) exit;
	
	function allx_how_to_scripts() {
		wp_enqueue_style( 'how-to-use', allx_THEME_URI . 'include/pro/pro.css' );
	}
	
	add_action( 'admin_enqueue_scripts', 'allx_how_to_scripts' );	
	
	// create custom plugin settings menu
	add_action('admin_menu', 'allx__create_menu');
	
	function allx__create_menu() {
		
		//create new top-level menu
		global $allx__settings_page;
		
		$allx__settings_page = add_theme_page('AllX', 'AllX', 'edit_theme_options',  'allx-unique-identifier', 'allx__settings_page',1);
		
		//call register settings function
		add_action( 'admin_init', 'register_mysettings' );
	}
	
	function register_mysettings() {
		//register our settings
		register_setting( 'seos-settings-group', 'adsense' );
	}
	
	function allx__settings_page() {	
	$path_img = get_template_directory_uri()."/include/pro/"; ?>
	<div id="cont-pro">
		<h1><?php esc_html_e('AllX WordPress Theme', 'allx'); ?></h1>	
		<div class="pro-links">	
			<p><?php esc_html_e('We create free themes and have helped thousands of users to build their sites. You can also support us using the allx Pro theme with many new features and extensions.', 'allx'); ?></p>
			<a class="button button-primary" target="_blank" href="https://seosthemes.com/themes/allx-wordpress-theme/"><?php esc_html_e('Theme Demo', 'allx'); ?></a>
			<a style="background: #A83625;" class="reds button button-primary" target="_blank" href="https://seosthemes.com/allx-wordpress-theme/"><?php esc_html_e('Upgrade to PRO', 'allx'); ?></a>
		</div>	
		<table id="table-colors" class="free-wp-theme">
			<tbody>
				<tr>
					<th><?php esc_html_e('AllX WordPress Theme', 'allx'); ?></th>
					<th><?php esc_html_e('Free WP Theme','allx'); ?></th>
					<th><?php esc_html_e('Premium WP Theme','allx'); ?></th>
				</tr>				
				<tr>
					<td><strong><?php esc_html_e('YouTybe Player', 'allx'); ?></strong></td>
					<td><img src="<?php echo esc_url($path_img); ?>NO.ico" alt="free-wp-theme" /></td>
					<td><img src="<?php echo esc_url($path_img); ?>YES.ico" alt="free-wp-theme" /></td>
				</tr>
				<tr class="s-white">
					<td><strong><?php esc_html_e('Homepage Image Slider 10 Images', 'allx'); ?></strong></td>
					<td><img src="<?php echo esc_url($path_img); ?>NO.ico" alt="free-wp-theme" /></td>
					<td><img src="<?php echo esc_url($path_img); ?>YES.ico" alt="free-wp-theme" /></td>
				</tr>
				<tr>
					<td><strong><?php esc_html_e('MP4 Player', 'allx'); ?></strong></td>
					<td><img src="<?php echo esc_url($path_img); ?>NO.ico" alt="free-wp-theme" /></td>
					<td><img src="<?php echo esc_url($path_img); ?>YES.ico" alt="free-wp-theme" /></td>
				</tr>	
				<tr class="s-white">
					<td><strong><?php esc_html_e('Audio Tracks', 'allx'); ?></strong></td>
					<td><img src="<?php echo esc_url($path_img); ?>NO.ico" alt="free-wp-theme" /></td>
					<td><img src="<?php echo esc_url($path_img); ?>YES.ico" alt="free-wp-theme" /></td>
				</tr>					
				<tr>
					<td><strong><?php esc_html_e('Featured Header Image on Each Single Page', 'allx'); ?></strong></td>
					<td><img src="<?php echo esc_url($path_img); ?>NO.ico" alt="free-wp-theme" /></td>
					<td><img src="<?php echo esc_url($path_img); ?>YES.ico" alt="free-wp-theme" /></td>
				</tr>
				<tr class="s-white">
					<td><strong><?php esc_html_e('Timeline', 'allx'); ?></strong></td>
					<td><img src="<?php echo esc_url($path_img); ?>NO.ico" alt="free-wp-theme" /></td>
					<td><img src="<?php echo esc_url($path_img); ?>YES.ico" alt="free-wp-theme" /></td>
				</tr>
				<tr>
					<td><strong><?php esc_html_e('Search Filter by Post Name and Category', 'allx'); ?></strong></td>
					<td><img src="<?php echo esc_url($path_img); ?>NO.ico" alt="free-wp-theme" /></td>
					<td><img src="<?php echo esc_url($path_img); ?>YES.ico" alt="free-wp-theme" /></td>
				</tr>				
				<tr class="s-white">
					<td><strong><?php esc_html_e('Widget Top', 'allx'); ?></strong></td>
					<td><img src="<?php echo esc_url($path_img); ?>NO.ico" alt="free-wp-theme" /></td>
					<td><img src="<?php echo esc_url($path_img); ?>YES.ico" alt="free-wp-theme" /></td>
				</tr>
				<tr>
					<td><strong><?php esc_html_e('Widget Bottom', 'allx'); ?></strong></td>
					<td><img src="<?php echo esc_url($path_img); ?>NO.ico" alt="free-wp-theme" /></td>
					<td><img src="<?php echo esc_url($path_img); ?>YES.ico" alt="free-wp-theme" /></td>
				</tr>
				<tr class="s-white">
					<td><strong><?php esc_html_e('Breadcrumbs', 'allx'); ?></strong></td>
					<td><img src="<?php echo esc_url($path_img); ?>NO.ico" alt="free-wp-theme" /></td>
					<td><img src="<?php echo esc_url($path_img); ?>YES.ico" alt="free-wp-theme" /></td>
				</tr>
				<tr>
					<td><strong><?php esc_html_e('Category Page - Video, Slider and Video Options', 'allx'); ?></strong></td>
					<td><img src="<?php echo esc_url($path_img); ?>NO.ico" alt="free-wp-theme" /></td>
					<td><img src="<?php echo esc_url($path_img); ?>YES.ico" alt="free-wp-theme" /></td>
				</tr>
				<tr class="s-white">
					<td><strong><?php esc_html_e('Testimonials', 'allx'); ?></strong></td>
					<td><img src="<?php echo esc_url($path_img); ?>NO.ico" alt="free-wp-theme" /></td>
					<td><img src="<?php echo esc_url($path_img); ?>YES.ico" alt="free-wp-theme" /></td>
				</tr>
				<tr>
					<td><strong><?php esc_html_e('Preloader', 'allx'); ?></strong></td>
					<td><img src="<?php echo esc_url($path_img); ?>NO.ico" alt="free-wp-theme" /></td>
					<td><img src="<?php echo esc_url($path_img); ?>YES.ico" alt="free-wp-theme" /></td>
				</tr>					
				<tr class="s-white">
					<td><strong><?php esc_html_e('About US', 'allx'); ?></strong></td>
					<td><img src="<?php echo esc_url($path_img); ?>NO.ico" alt="free-wp-theme" /></td>
					<td><img src="<?php echo esc_url($path_img); ?>YES.ico" alt="free-wp-theme" /></td>
				</tr>				
				<tr>
					<td><strong><?php esc_html_e('Sidebar Position Single Pages', 'allx'); ?></strong></td>
					<td><img src="<?php echo esc_url($path_img); ?>YES.ico" alt="free-wp-theme" /></td>
					<td><img src="<?php echo esc_url($path_img); ?>YES.ico" alt="free-wp-theme" /></td>
				</tr>
				<tr class="s-white">
					<td><strong><?php esc_html_e('Counter', 'allx'); ?></strong></td>
					<td><img src="<?php echo esc_url($path_img); ?>NO.ico" alt="free-wp-theme" /></td>
					<td><img src="<?php echo esc_url($path_img); ?>YES.ico" alt="free-wp-theme" /></td>
				</tr>								
					<tr>
						<td><strong><?php esc_html_e('Video Header', 'allx'); ?></strong></td>
						<td><img src="<?php echo esc_url($path_img); ?>YES.ico" alt="free-wp-theme" /></td>
						<td><img src="<?php echo esc_url($path_img); ?>YES.ico" alt="free-wp-theme" /></td>
				</tr>
				<tr class="s-white">
					<td><strong><?php esc_html_e('Recent Posts Slider', 'allx'); ?></strong></td>
					<td><img src="<?php echo esc_url($path_img); ?>NO.ico" alt="free-wp-theme" /></td>
					<td><img src="<?php echo esc_url($path_img); ?>YES.ico" alt="free-wp-theme" /></td>
				</tr>
				<tr>
					<td><strong><?php esc_html_e('Popular Posts', 'allx'); ?></strong></td>
					<td><img src="<?php echo esc_url($path_img); ?>NO.ico" alt="free-wp-theme" /></td>
					<td><img src="<?php echo esc_url($path_img); ?>YES.ico" alt="free-wp-theme" /></td>
				</tr>							
				<tr class="s-white">
					<td><strong><?php esc_html_e('Page Right Sidebar', 'allx'); ?></strong></td>
					<td><img src="<?php echo esc_url($path_img); ?>NO.ico" alt="free-wp-theme" /></td>
					<td><img src="<?php echo esc_url($path_img); ?>YES.ico" alt="free-wp-theme" /></td>
				</tr>				
				<tr>
					<td><strong><?php esc_html_e('Page Left Sidebar', 'allx'); ?></strong></td>
					<td><img src="<?php echo esc_url($path_img); ?>NO.ico" alt="free-wp-theme" /></td>
					<td><img src="<?php echo esc_url($path_img); ?>YES.ico" alt="free-wp-theme" /></td>
				</tr>					
				<tr class="s-white">
					<td><strong><?php esc_html_e('Blog Page', 'allx'); ?></strong></td>
					<td><img src="<?php echo esc_url($path_img); ?>NO.ico" alt="free-wp-theme" /></td>
					<td><img src="<?php echo esc_url($path_img); ?>YES.ico" alt="free-wp-theme" /></td>
				</tr>
				<tr>
					<td><strong><?php esc_html_e('Blog Page Right Sidebar', 'allx'); ?></strong></td>
					<td><img src="<?php echo esc_url($path_img); ?>NO.ico" alt="free-wp-theme" /></td>
					<td><img src="<?php echo esc_url($path_img); ?>YES.ico" alt="free-wp-theme" /></td>
				</tr>
				<tr class="s-white">
					<td><strong><?php esc_html_e('Blog Page Full Width', 'allx'); ?></strong></td>
					<td><img src="<?php echo esc_url($path_img); ?>NO.ico" alt="free-wp-theme" /></td>
					<td><img src="<?php echo esc_url($path_img); ?>YES.ico" alt="free-wp-theme" /></td>
				</tr>
				<tr>
					<td><strong><?php esc_html_e('Blog Page Three Columns', 'allx'); ?></strong></td>
					<td><img src="<?php echo esc_url($path_img); ?>NO.ico" alt="free-wp-theme" /></td>
					<td><img src="<?php echo esc_url($path_img); ?>YES.ico" alt="free-wp-theme" /></td>
				</tr>
				<tr class="s-white">
					<td><strong><?php esc_html_e('Blog Page Two Columns', 'allx'); ?></strong></td>
					<td><img src="<?php echo esc_url($path_img); ?>NO.ico" alt="free-wp-theme" /></td>
					<td><img src="<?php echo esc_url($path_img); ?>YES.ico" alt="free-wp-theme" /></td>
				</tr>					
				<tr>
					<td><strong><?php esc_html_e('Camera Slider', 'allx'); ?></strong></td>
					<td><img src="<?php echo esc_url($path_img); ?>NO.ico" alt="free-wp-theme" /></td>
					<td><img src="<?php echo esc_url($path_img); ?>YES.ico" alt="free-wp-theme" /></td>
				</tr>
				<tr class="s-white">
					<td><strong><?php esc_html_e('Title Position', 'allx'); ?></strong></td>
					<td><img src="<?php echo esc_url($path_img); ?>NO.ico" alt="free-wp-theme" /></td>
					<td><img src="<?php echo esc_url($path_img); ?>YES.ico" alt="free-wp-theme" /></td>
				</tr>
				<tr>
					<td><strong><?php esc_html_e('One Click Demo Import', 'allx'); ?></strong></td>
					<td><img src="<?php echo esc_url($path_img); ?>NO.ico" alt="free-wp-theme" /></td>
					<td><img src="<?php echo esc_url($path_img); ?>YES.ico" alt="free-wp-theme" /></td>
				</tr>					
				<tr class="s-white">
					<td><strong><?php esc_html_e('Post Options', 'allx'); ?></strong></td>
					<td><img src="<?php echo esc_url($path_img); ?>YES.ico" alt="free-wp-theme" /></td>
					<td><img src="<?php echo esc_url($path_img); ?>YES.ico" alt="free-wp-theme" /></td>
				</tr>
				<tr>
					<td><strong><?php esc_html_e('WooCommerce My Account Icon', 'allx'); ?></strong></td>
					<td><img src="<?php echo esc_url($path_img); ?>NO.ico" alt="free-wp-theme" /></td>
					<td><img src="<?php echo esc_url($path_img); ?>YES.ico" alt="free-wp-theme" /></td>
				</tr>
				<tr class="s-white">
					<td><strong><?php esc_html_e('Multiple Gallery', 'allx'); ?></strong></td>
					<td><img src="<?php echo esc_url($path_img); ?>NO.ico" alt="free-wp-theme" /></td>
					<td><img src="<?php echo esc_url($path_img); ?>YES.ico" alt="free-wp-theme" /></td>
				</tr>
				<tr>
					<td><strong><?php esc_html_e('Animations of all elements', 'allx'); ?></strong></td>
					<td><img src="<?php echo esc_url($path_img); ?>NO.ico" alt="free-wp-theme" /></td>
					<td><img src="<?php echo esc_url($path_img); ?>YES.ico" alt="free-wp-theme" /></td>
				</tr>
				<tr class="s-white">
					<td><strong><?php esc_html_e('Header Options', 'allx'); ?></strong></td>
					<td><img src="<?php echo esc_url($path_img); ?>YES.ico" alt="free-wp-theme" /></td>
					<td><img src="<?php echo esc_url($path_img); ?>YES.ico" alt="free-wp-theme" /></td>
				</tr>
				<tr>
					<td><strong><?php esc_html_e('Hide Single Page Title', 'allx'); ?></strong></td>
					<td><img src="<?php echo esc_url($path_img); ?>NO.ico" alt="free-wp-theme" /></td>
					<td><img src="<?php echo esc_url($path_img); ?>YES.ico" alt="free-wp-theme" /></td>
				</tr>
				<tr class="s-white">
					<td><strong><?php esc_html_e('Featured Image', 'allx'); ?></strong></td>
					<td><img src="<?php echo esc_url($path_img); ?>YES.ico" alt="free-wp-theme" /></td>
					<td><img src="<?php echo esc_url($path_img); ?>YES.ico" alt="free-wp-theme" /></td>
				</tr>
				<tr>
					<td><strong><?php esc_html_e('WooCommerce Product Zoom', 'allx'); ?></strong></td>
					<td><img src="<?php echo esc_url($path_img); ?>YES.ico" alt="free-wp-theme" /></td>
					<td><img src="<?php echo esc_url($path_img); ?>YES.ico" alt="free-wp-theme" /></td>
				</tr>
				<tr class="s-white">
					<td><strong><?php esc_html_e('WooCommerce Cart Options', 'allx'); ?></strong></td>
					<td><img src="<?php echo esc_url($path_img); ?>YES.ico" alt="free-wp-theme" /></td>
					<td><img src="<?php echo esc_url($path_img); ?>YES.ico" alt="free-wp-theme" /></td>
				</tr>
				<tr>
					<td><strong><?php esc_html_e('WooCommerce Pagination', 'allx'); ?></strong></td>
					<td><img src="<?php echo esc_url($path_img); ?>NO.ico" alt="free-wp-theme" /></td>
					<td><img src="<?php echo esc_url($path_img); ?>YES.ico" alt="free-wp-theme" /></td>
				</tr>
				
				<tr class="s-white">
					<td><strong><?php esc_html_e('Google Fonts', 'allx'); ?></strong></td>
					<td><img src="<?php echo esc_url($path_img); ?>NO.ico" alt="free-wp-theme" /></td>
					<td><img src="<?php echo esc_url($path_img); ?>YES.ico" alt="free-wp-theme" /></td>
				</tr>
				<tr>
					<td><strong><?php esc_html_e('Shortcode', 'allx'); ?></strong></td>
					<td><img src="<?php echo esc_url($path_img); ?>NO.ico" alt="free-wp-theme" /></td>
					<td><img src="<?php echo esc_url($path_img); ?>YES.ico" alt="free-wp-theme" /></td>
				</tr>
				<tr class="s-white">
					<td><strong><?php esc_html_e('Color of All Elements', 'allx'); ?></strong></td>
					<td><img src="<?php echo esc_url($path_img); ?>NO.ico" alt="free-wp-theme" /></td>
					<td><img src="<?php echo esc_url($path_img); ?>YES.ico" alt="free-wp-theme" /></td>
				</tr>
				<tr>
					<td><strong><?php esc_html_e('Full Width Page', 'allx'); ?></strong></td>
					<td><img src="<?php echo esc_url($path_img); ?>NO.ico" alt="free-wp-theme" /></td>
					<td><img src="<?php echo esc_url($path_img); ?>YES.ico" alt="free-wp-theme" /></td>
				</tr>	
				<tr class="s-white">
					<td><strong><?php esc_html_e('Social Media Icons', 'allx'); ?></strong></td>
					<td><img src="<?php echo esc_url($path_img); ?>NO.ico" alt="free-wp-theme" /></td>
					<td><img src="<?php echo esc_url($path_img); ?>YES.ico" alt="free-wp-theme" /></td>
				</tr>
				<tr>
					<td><strong><?php esc_html_e('Custom Footer Copyright', 'allx'); ?></strong></td>
					<td><img src="<?php echo esc_url($path_img); ?>NO.ico" alt="free-wp-theme" /></td>
					<td><img src="<?php echo esc_url($path_img); ?>YES.ico" alt="free-wp-theme" /></td>
				</tr>
				<tr class="s-white">
					<td><strong><?php esc_html_e('Microdata', 'allx'); ?></strong></td>
					<td><img src="<?php echo esc_url($path_img); ?>YES.ico" alt="free-wp-theme" /></td>
					<td><img src="<?php echo esc_url($path_img); ?>YES.ico" alt="free-wp-theme" /></td>
				</tr>
				<tr>
					<td><strong><?php esc_html_e('Translation Ready', 'allx'); ?></strong></td>
					<td><img src="<?php echo esc_url($path_img); ?>YES.ico" alt="free-wp-theme" /></td>
					<td><img src="<?php echo esc_url($path_img); ?>YES.ico" alt="free-wp-theme" /></td>
				</tr>
				<tr class="s-white">
					<td><strong><?php esc_html_e('Header Logo', 'allx'); ?></strong></td>
					<td><img src="<?php echo esc_url($path_img); ?>YES.ico" alt="free-wp-theme" /></td>
					<td><img src="<?php echo esc_url($path_img); ?>YES.ico" alt="free-wp-theme" /></td>
				</tr>
				<tr>
					<td><strong><?php esc_html_e('Homepage Widgets', 'allx'); ?></strong></td>
					<td><img src="<?php echo esc_url($path_img); ?>NO.ico" alt="free-wp-theme" /></td>
					<td><img src="<?php echo esc_url($path_img); ?>YES.ico" alt="free-wp-theme" /></td>
				</tr>
				<tr>
					<tr class="s-white">
						<td><strong><?php esc_html_e('Header Image', 'allx'); ?></strong></td>
						<td><img src="<?php echo esc_url($path_img); ?>YES.ico" alt="free-wp-theme" /></td>
						<td><img src="<?php echo esc_url($path_img); ?>YES.ico" alt="free-wp-theme" /></td>
					</tr>
					<tr>
						<td><strong><?php esc_html_e('Background Image', 'allx'); ?></strong></td>
						<td><img src="<?php echo esc_url($path_img); ?>YES.ico" alt="free-wp-theme" /></td>
						<td><img src="<?php echo esc_url($path_img); ?>YES.ico" alt="free-wp-theme" /></td>
					</tr>
					<tr class="s-white">
						<td><strong><?php esc_html_e('404 Page Template', 'allx'); ?></strong></td>
						<td><img src="<?php echo esc_url($path_img); ?>YES.ico" alt="free-wp-theme" /></td>
						<td><img src="<?php echo esc_url($path_img); ?>YES.ico" alt="free-wp-theme" /></td>
					</tr>
					<tr>
						<td><strong><?php esc_html_e('Footer Widgets', 'allx'); ?></strong></td>
						<td><img src="<?php echo esc_url($path_img); ?>YES.ico" alt="free-wp-theme" /></td>
						<td><img src="<?php echo esc_url($path_img); ?>YES.ico" alt="free-wp-theme" /></td>
					</tr>
					<tr class="s-white">
						<td><strong><?php esc_html_e('WooCommerce Plugin Support', 'allx'); ?></strong></td>
						<td><img src="<?php echo esc_url($path_img); ?>YES.ico" alt="free-wp-theme" /></td>
						<td><img src="<?php echo esc_url($path_img); ?>YES.ico" alt="free-wp-theme" /></td>
					</tr>
					<tr>
						<td><strong><?php esc_html_e('Back to top button', 'allx'); ?></strong></td>
						<td><img src="<?php echo esc_url($path_img); ?>YES.ico" alt="free-wp-theme" /></td>
						<td><img src="<?php echo esc_url($path_img); ?>YES.ico" alt="free-wp-theme" /></td>
					</tr>
				<tr class="s-white">
					<td><strong><?php esc_html_e('9 Top Icons', 'allx'); ?></strong></td>
					<td><img src=" <?php echo esc_url($path_img); ?>NO.ico" alt="free-wp-theme" /></td>
					<td><img src="<?php echo esc_url($path_img); ?>YES.ico" alt="free-wp-theme" /></td>
				</tr>
				<tr>
					<td><strong><?php esc_html_e('Price List Shortcode', 'allx'); ?></strong></td>
					<td><img src=" <?php echo esc_url($path_img); ?>NO.ico" alt="free-wp-theme" /></td>
					<td><img src="<?php echo esc_url($path_img); ?>YES.ico" alt="free-wp-theme" /></td>
				</tr>
				<tr class="s-white">
					<td><strong><?php esc_html_e('Right Layout', 'allx'); ?></strong></td>
					<td><img src=" <?php echo esc_url($path_img); ?>YES.ico" alt="free-wp-theme" /></td>
					<td><img src="<?php echo esc_url($path_img); ?>YES.ico" alt="free-wp-theme" /></td>
				</tr>
				<tr>
					<td><strong><?php esc_html_e('Left Layout', 'allx'); ?></strong></td>
					<td><img src=" <?php echo esc_url($path_img); ?>YES.ico" alt="free-wp-theme" /></td>
					<td><img src="<?php echo esc_url($path_img); ?>YES.ico" alt="free-wp-theme" /></td>
				</tr>				
					<tr>
						
						<td><a class="button button-primary" target="_blank" href="https://seosthemes.com/themes/allx-wordpress-theme/"><?php esc_html_e('Theme Demo', 'allx'); ?></a></td>
						<td> </td>
						<td style=" text-align:center;"><a style="background: #A83625;" class="reds button button-primary" target="_blank" href="https://seosthemes.com/allx-wordpress-theme/"><?php esc_html_e('Upgrade to PRO', 'allx'); ?></a></td>
					</tr>					
				</tbody>
			</table>
		</div>
		<?php	
		}				