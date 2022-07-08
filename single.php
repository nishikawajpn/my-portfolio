<?php
  $post = $wp_query->post;
  if ( in_category('works') ) {
	  include(TEMPLATEPATH.'/single-works.php');
  } elseif ( in_category('blog') ) {
	  include(TEMPLATEPATH.'/single-blog.php');
  } else {
	  include(TEMPLATEPATH.'/single-default.php');
  }
?>
