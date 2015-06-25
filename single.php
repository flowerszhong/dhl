<?php
get_header(); ?>

<div id="content">
	<?php
if (have_posts()) {
	the_post();
	?>
	<div class="page-title">
		<?php the_title(); ?>
	</div>
	
	<div class="page-content">
		<?php the_content( ); ?>
	</div>
<?php }
?>
</div>

<?php get_sidebar(); ?>


<?php get_footer(); ?>
