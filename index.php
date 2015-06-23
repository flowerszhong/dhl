<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme and one of the
 * two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * For example, it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */
get_header(); ?>


<div id="content">
	<?php
if (have_posts()) {
	while (have_posts()){
		the_post();
		if(is_page()){
			echo "<div class='page-title'>". get_the_title() ."</div>";
		}

		if(is_category()){
			echo "<div class='page-title'>". get_category_link() ."</div>";
		}


		the_title( $before = '', $after = '', $echo = true );
		the_content();
	}
}
?>
</div>

<?php get_sidebar(); ?>


<?php get_footer(); ?>

