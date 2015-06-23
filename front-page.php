<?php 
get_header();
?>




<div id="content">
	<?php
if (have_posts()) {
   while (have_posts()) : the_post();
   	the_title( $before = '', $after = '', $echo = true );
      the_content();
   endwhile;
}
?>
</div>


<?php 
get_sidebar();
get_footer();
?>

