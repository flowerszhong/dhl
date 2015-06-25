<?php
/**
 * @Author: www.mzh.ren
 * @Date:   2015-06-19 11:40:02
 * @Last Modified by:   mzhong
 * @Last Modified time: 2015-06-19 11:40:32
 */

?>

<div id="sidebar">
<div class="sidebar-title">
	<?php

global $post;     // if outside the loop
$id;

if ( is_page()  ) {
	if($post->post_parent){
		echo get_the_title( $post->post_parent );
	}else{
    	echo get_the_title();
	}
} else {
	if (is_category( ) || is_single( )) {
		if(in_category( array('news'), $post )){
			echo "新闻管理";
		}else{
			echo single_cat_title();
		}
	}
}

?>
</div>





<div class="sub-pages">
<?php
global $post; 
if($post->post_parent){
	$children = wp_list_pages("title_li=&child_of=".$post->post_parent."&echo=0");
}
else{
	$children = wp_list_pages("title_li=&child_of=".$post->ID."&echo=0");
}
if ($children) { ?>
<ul>
	<?php echo $children; ?>
</ul>
<?php } ?>
</div>

</div>