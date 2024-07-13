z<?php
/**
 * Title: Latest News
 * Slug: tourister/latest-news
 * Categories: tourister, latest-news
 */
?>

<!-- wp:group {"style":{"spacing":{"padding":{"top":"60px","bottom":"60px","left":"20px","right":"20px"},"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="margin-top:0;margin-bottom:0;padding-top:60px;padding-right:20px;padding-bottom:60px;padding-left:20px"><!-- wp:group {"align":"wide","layout":{"type":"default"}} -->
<div class="wp-block-group alignwide"><!-- wp:group {"layout":{"type":"constrained"}} -->
<div class="wp-block-group"><!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"center"}} -->
<div class="wp-block-group"><!-- wp:group {"style":{"spacing":{"padding":{"top":"10px","bottom":"10px","left":"25px","right":"25px"}},"border":{"width":"3px","color":"#176b87"}},"backgroundColor":"secondary","layout":{"type":"constrained"}} -->
<div class="wp-block-group has-border-color has-secondary-background-color has-background" style="border-color:#176b87;border-width:3px;padding-top:10px;padding-right:25px;padding-bottom:10px;padding-left:25px"><!-- wp:heading {"level":4,"style":{"typography":{"textTransform":"capitalize","fontStyle":"normal","fontWeight":"400","letterSpacing":"2px"},"elements":{"link":{"color":{"text":"var:preset|color|white"}}}},"textColor":"white","fontSize":"regular","fontFamily":"satisfy-font"} -->
<h4 class="wp-block-heading has-white-color has-text-color has-link-color has-satisfy-font-font-family has-regular-font-size" style="font-style:normal;font-weight:400;letter-spacing:2px;text-transform:capitalize"><?php esc_html_e('Recent News Feed','tourister'); ?></h4>
<!-- /wp:heading --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:heading {"textAlign":"center","style":{"spacing":{"margin":{"top":"var:preset|spacing|50"}}},"fontSize":"section-title"} -->
<h2 class="wp-block-heading has-text-align-center has-section-title-font-size" style="margin-top:var(--wp--preset--spacing--50)"><?php esc_html_e('Amazing News & Blog For Every Single Update','tourister'); ?></h2>
<!-- /wp:heading --></div>
<!-- /wp:group -->

<!-- wp:spacer {"height":"20px"} -->
<div style="height:20px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:query {"queryId":51,"query":{"perPage":"3","pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"exclude","inherit":false}} -->
<div class="wp-block-query"><!-- wp:post-template {"layout":{"type":"grid","columnCount":3}} -->
<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|70","right":"30px","bottom":"var:preset|spacing|70","left":"30px"}}},"className":"has-shadow","layout":{"inherit":false}} -->
<div class="wp-block-group has-shadow" style="padding-top:var(--wp--preset--spacing--70);padding-right:30px;padding-bottom:var(--wp--preset--spacing--70);padding-left:30px"><!-- wp:post-author {"showAvatar":false,"isLink":true,"style":{"typography":{"fontSize":"15px"},"elements":{"link":{"color":{"text":"var:preset|color|primary"},":hover":{"color":{"text":"var:preset|color|secondary"}}}}},"textColor":"primary"} /-->

<!-- wp:post-date {"style":{"typography":{"fontSize":"15px"},"elements":{"link":{"color":{"text":"var:preset|color|primary"},":hover":{"color":{"text":"var:preset|color|secondary"}}}},"spacing":{"padding":{"right":"0","left":"0","top":"0","bottom":"0"},"margin":{"top":"0.5rem"}}},"textColor":"primary"} /-->

<!-- wp:post-terms {"term":"category","style":{"typography":{"fontSize":"15px"},"elements":{"link":{"color":{"text":"var:preset|color|primary"},":hover":{"color":{"text":"var:preset|color|secondary"}}}},"spacing":{"margin":{"top":"0.5rem"}}},"textColor":"primary"} /-->

<!-- wp:post-title {"isLink":true,"style":{"typography":{"fontSize":"20px","fontStyle":"normal","fontWeight":"600","lineHeight":"1.8"}}} /--></div>
<!-- /wp:group -->
<!-- /wp:post-template --></div>
<!-- /wp:query --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->