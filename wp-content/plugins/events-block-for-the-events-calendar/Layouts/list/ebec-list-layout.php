<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
if(isset($selectors)){
wp_add_inline_style("ebec-google-font" ,$selectors);
}
$longMonthStart=DateTime::createFromFormat('!m', $event_value['event_start_date_details_month'])->format('F');
$shortMonthStart=DateTime::createFromFormat('!m', $event_value['event_start_date_details_month'])->format('M');
$event_type = tribe( 'tec.featured_events' )->is_featured( $event_id )? 'ebec-featured-event':'ebec-simple-event';

//Layout
if($display_header===true){
    $html .='<div class="ebec-month-header '.esc_attr($event_type).'"><span class="ebec-header-year" >'.esc_html($longMonthStart).' '.esc_html($event_value['event_start_date_details_year']).'</span><span class="ebec-header-line"></span></div>';
}

    $html .='<div id="event-'.esc_attr($event_id).'" class="ebec-list-posts style-1 '.esc_attr($event_type).'">';
    $html .='<div class="ebec-event-date-tag"><div class="ebec-event-datetimes">
            <span class="ev-mo" >'.esc_html($shortMonthStart).'</span>
            <span class="ebec-ev-day" >'.esc_html($event_value['event_start_date_details_day']).'</span>
            </div></div>';
    $html .='<div class="ebec-event-details" >';
    $html .='<div class="ebec-event-datetime">
             <span class="ebec-minimal-list-time">
             '.ebec_date_style($event,$attributes).'
             </span>
             </div>';
    $html  .='<a href='.esc_url($event_value['event_url']).' class="ebec-events-title" >'.esc_html($event_value['event_title']).'</a>';
    if($attributes['ebec_venue'] == "no" && tribe_has_venue($event_id)){
    $html  .= '<div class="ebec-list-venue" >';
    if($event_value['have_venue_address']){
        $html  .= '<span class="ebec-icon"><i class="ebec-icon-location" aria-hidden="true"></i></span>';
    }
     $html  .= implode(',', $event_value['venue_details']);
     $html  .= '</div>';
    }
               
        if($attributes['ebec_display_desc'] == "yes" && !empty($event_value['event_description'])){
        $html .='<div class="ebec-minimal-list-desc">
                <div class="ebec-event-content" itemprop="description" >
                <div>'.wp_kses_post($event_value['event_description']).'</div>
                </div>
              </div>';
        }
        if(!empty($event_value['event_cost'])){
        $html .='<div class="ebec-list-cost">'.esc_html($event_value['event_cost']).'</div>';
        }
        $html .= '<div class="ebec-style-1-more" ><a href='.esc_url($event_value['event_url']).' class="ebec-events-read-more" rel="bookmark" >'.esc_html($attributes['event_link_name'],'ebec').'</a></div>';
    $html .='</div>';
    $html .='<div class="ebec-right-wrapper">';
    if($event_value['image'] != null){
        $html .='<a class="ebec-static-small-list-ev-img" href='.esc_url($event_value['event_url']).'>
            <img src='.esc_url($event_value['image']).'></img><span class="ebec-image-overlay ebec-overlay-type-extern"><span class="ebec-image-overlay-inside"></span></span>
            </a>';
        }
        $html .='  </div>';
    $html .='</div>';

