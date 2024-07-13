<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

Class EBEC_Register_Block{
	

	private static $instance = null;

	public static function get_instance() {
		if ( ! isset( self::$instance ) ) {
			self::$instance = new self;
		}
		return self::$instance;
	}

		/**
	 * Constructor.
	 *
	 * @access private
	 */
	private function __construct() {
	add_action( 'enqueue_block_assets', array($this,'ebec_editor_assets'));
	add_action( 'enqueue_block_editor_assets', array($this,'ebec_block_editor_assets'));
	add_action('init',array($this,"ebec_register_block"));
	}

	public function ebec_editor_assets(){
			$id = get_the_ID();
            if (has_block('ebec/event-list', $id)) {
			wp_enqueue_style( "ebec-block-style-front", EBEC_URL."assets/css/ebec-style.css",array(), null, null, 'all');
			}
		}


	public function ebec_block_editor_assets(){
			wp_enqueue_script("ebec-block-editor",EBEC_URL."dist/blocks.build.js", array("wp-blocks","wp-i18n","wp-editor","wp-components","wp-element") );
			wp_enqueue_style( "ebec-block-style-editor", EBEC_URL."dist/blocks.style.build.css", array("wp-edit-blocks"), null, null, 'all' );
		}




		/**
		 * Register Block
		 */
	public function ebec_register_block(){
			if ( function_exists( 'register_block_type' ) ) {
			
			// Define the URL
			$url = EBEC_URL.'block.json';
			$response=wp_remote_get($url);
			if (is_wp_error($response)) {
				return false; // Bail early
			}
			$body = wp_remote_retrieve_body($response);
			$attributes=json_decode($body,true);
			$settings=array_merge($attributes['attributes'],array(
				"ebec_date_range_start"=>array(
						"type"=>"string",
						"default"=>gmdate('Y-m-d H:i', current_time('timestamp', 0))
				),
					"ebec_date_range_end"=>array(
						"type"=>"string",
						"default"=>gmdate('Y-m-d H:i', strtotime("+6 months", current_time('timestamp', 0)))
				)
			)
			);
			register_block_type('ebec/event-list',array(
				'render_callback' => array($this,'ebec_render_function'),
				"attributes" =>$settings
			)
		);
		}
		}

		/**
		 * Render Callback 
		 */
	public function ebec_render_function($attributes){
	
			$tax_query= "";
			$ebec_block_id = isset($attributes['ebec_block_id']) ? $attributes['ebec_block_id'] : "";
			$error="<div class='ebec_error'>".esc_html($attributes['no_event_text'])."</div>";
			$category = implode(",",$attributes['ebec_ev_category']);
			$time_range = ebec_fetch_start_end_time($attributes);
			$start_time = (array)$time_range[0];
			$end_time = (array)$time_range[1]; 
			$meta_date_compare = '>=';
			$attributes['key']='_EventStartDate'; 
			if ($attributes['ebec_type']=='past') {
				$meta_date_compare = '<';
			}
			else if($attributes['ebec_type']=='all'){
				$meta_date_compare = '';
			}
			$attributes['key'] = '_EventStartDate' ;
			$attributes['meta_date'] = '';
			$meta_date_date = '';
			if($meta_date_compare!=''){
			$meta_date_date = current_time( 'Y-m-d H:i:s' );
			$attributes['key']='_EventStartDate';
			$attributes['meta_date'] = array(
				array(
					'key' =>'_EventEndDate',
					'value' => $meta_date_date,
					'compare' => $meta_date_compare,
					'type' => 'DATETIME'
				));	
			}	
			if (!empty($attributes['ebec_ev_category'])) {
				if(!in_array('all',$attributes['ebec_ev_category'])){
					$tax_query = [
						[
							'taxonomy' => 'tribe_events_cat', 
							'field' => 'slug',
							'terms'    => $attributes['ebec_ev_category']
						]
					];
				}
			}
			$all_events = tribe_get_events( array('start_date'=>$start_time['date'],'end_date'=>$end_time['date'],'order'=>$attributes['ebec_order'] ,'orderby' => 'event_date','posts_per_page' => $attributes['ebec_max_events'], 'meta_key' => $attributes['key'],'meta_query' =>$attributes['meta_date'],'tax_query'=> $tax_query,));
			if(!empty($all_events)){
				$font_family_array= array($attributes['event_title_family'],
				$attributes['event_venue_family'],
										$attributes['event_description_family'],
										$attributes['event_date_family'],
										$attributes['event_link_family'],
									);
					$build_url = 'https://fonts.googleapis.com/css?family=';
					$build_url.=implode("|",array_filter($font_family_array));
					wp_enqueue_style('ebec-google-font',"$build_url", array(), null, null, 'all');
					$events = "";
					$html ="";
					$display_month = "";
					$display_year = "";
					$display_header = true;
					$events = $all_events;
					include EBEC_PATH.'/includes/ebec-style-setting.php';
					include EBEC_PATH.'/Layouts/list/ebec-list-style.php';
					$html.='<!---------- Event List Block Version:-'.EBEC_VERSION .' By Cool Plugins Team-------------->';
					$html .=  '<div id="ebec-events-list-content"  class= "ebec-list-wrapper ebec-block-'.esc_attr($ebec_block_id).'">';
					$html .= '<div id="list-wrp" class="ebec-list-wrapper  '.esc_attr($category).'">';
					foreach($events as $key=>$event){	
						$event_id = filter_var($event->ID,FILTER_SANITIZE_NUMBER_INT);	
						if($display_year == tribe_get_start_date( $event_id, false, 'Y' )){
							if($display_month == tribe_get_start_date( $event_id, false, 'm' )){
								$display_header = false;
							}
								else{
									$display_month = tribe_get_start_date( $event_id, false, 'm' );
									$display_header = true;
								}
							}
							else{
								$display_year = tribe_get_start_date( $event_id, false, 'Y' );
								$display_month = tribe_get_start_date( $event_id, false, 'm' );
								$display_header = true;
							}
							$event_value = $this->ebec_check_event_value($event_id);
							include EBEC_PATH.'/Layouts/list/ebec-list-layout.php';

					}
					$html .= '</div></div>';
					return $html;
				}
				else{
					return $error;
				}
		}
		public function ebec_check_event_value($event_id){
			$event_value_filter['venue_details'] = tribe_get_venue_details($event_id);
			if(!empty($event_value_filter['venue_details']['address']) && isset($event_value_filter['venue_details']['linked_name'])){
				$event_value_filter['have_venue_address'] = true;
			}
			else{
				$event_value_filter['have_venue_address'] = false;
			}
			$event_value_filter['event_start_date_details_year'] = tribe_get_start_date( $event_id, false, 'Y' );
			$event_value_filter['event_start_date_details_month'] = tribe_get_start_date( $event_id, false, 'm' );
			$event_value_filter['event_start_date_details_day'] = tribe_get_start_date($event_id, false, 'd');
			$event_value_filter['event_title'] = get_the_title($event_id);
			$event_value_filter['event_description'] = tribe_get_the_content(null,true,$event_id);
			$event_value_filter['event_cost'] =tribe_get_cost($event_id, true );
			$event_value_filter['event_url'] = tribe_get_event_link($event_id);
			$event_value_filter['image']  = tribe_event_featured_image($event_id,'full',false,false);
			return $event_value_filter;
		}
	}

	function ebec_register_block_call() {
		return EBEC_Register_Block::get_instance();
	}
	$GLOBALS['ebec_block'] = ebec_register_block_call();




