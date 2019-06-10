<?php

/*Load Stylesheet */
function kr8_childtheme() {
	wp_enqueue_style( 'kr8-childtheme-css', get_stylesheet_uri() );

}
add_action( 'wp_enqueue_scripts', 'kr8_childtheme',1000 );

function add_custom_categories_and_tags( ){
  if ( 'ai1ec_event' == get_post_type() ) {
	$category_list = get_the_term_list( '', 'events_categories', '<i class="fa fa-folder-open" aria-hidden="true"></i> ', ', ', '<span style="width:10px;display:inline-block;"></span>' );
	$tag_list = get_the_term_list( '', 'events_tags', '<i class="fa fa-tag" aria-hidden="true"></i> ', ', ', '<span style="width:10px;display:inline-block;"></span>' );
	if ( '' != $category_list && '' != $tag_list ) {
      echo ' ';
	} else {
      echo $category_list;
	  echo $tag_list;
	}										
  }
}
add_action( 'kr8_custom_categories_and_tags', 'add_custom_categories_and_tags' );

/**
* @param WP_Query $query
* @return WP_Query
*/
function add_custom_post_type( $query ) {
    if ( $query->is_main_query() && ( is_home() || is_archive() || is_category() ) )
        $query->set( 'post_type', array( 'post', 'ai1ec_event' ) );
    return $query;
}
add_action( 'pre_get_posts', 'add_custom_post_type' );
   

?>