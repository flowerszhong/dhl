<?php
get_header(); ?>


<div id="content">
<div class="page-title">
	<?php 
	   echo single_cat_title();
	?>
</div>
	
<div class="page-content">
	<?php
	if (have_posts()) {
		while (have_posts()){
			the_post();
			the_title( $before = '', $after = '', $echo = true );
			the_content();
		}
	}
	?>
</div>

</div>

<?php get_sidebar(); ?>


<?php get_footer(); ?>

