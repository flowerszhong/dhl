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
	?>
	<div class="new">
		<a href="<?php the_permalink(); ?>">
		<?php the_title( $before = '', $after = '', $echo = true ); ?>
		</a>
	</div>
	<?php
		}
	}
	?>
</div>

</div>

<?php get_sidebar(); ?>


<?php get_footer(); ?>

