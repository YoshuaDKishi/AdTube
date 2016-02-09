<?php 
function getPostByCatId($cat_id, $page_num) {

	$args = array(
          'posts_per_page'   => $page_num,
          'offset'           => 0,
          'category'         => $cat_id,
          'orderby'          => 'post_date',
          'order'            => 'DESC',
          'include'          => '',
          'exclude'          => '',
          'meta_key'         => '',
          'meta_value'       => '',
          'post_type'        => 'post',
          'post_mime_type'   => '',
          'post_parent'      => '',
          'post_status'      => 'publish',
          'suppress_filters' => true ); 


  $myposts = get_posts( $args );

  return $myposts;
}


?>