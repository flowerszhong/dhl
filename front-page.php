<?php 
get_header();
?>


<div id="home-content" class="home-content">
	<div id="boxWrap">
	        <ul>
	          <li class="box1"><a href=""></a></li>          
	          <li class="box4"><a href=""></a></li>
	          <li class="box3"><a href=""></a></li>
	          <li class="box2"><a href=""></a></li>
	          <li class="box5"><a href=""></a></li>
	          <li class="box6"><a href=""></a></li>
	        </ul>
	      </div>
</div>

<div id="home-sidebar" class="home-sidebar">
	<?php dynamic_sidebar( 'home-sidebar' ); ?>
	<div id="text-2" class="widget widget_text">
	<h2 class="widgettitle">查询</h2>			
	<div class="textwidget">

		<form action="<?php echo home_url(). '/dhl-query' ?>" method="GET">
			<div class="widget-container">
				<input type="text" name="postid" id="query-postid" placeholder="请输入订单号">
				<input type="submit" id="submit-btn" value="查询">
			</div>
		</form>
	</div>
	</div>

	<div id="text-3" class="widget widget_text">
	<h2 class="widgettitle">在线咨询</h2>			
	<div class="textwidget">
		<div class="widget-container">
			<div class="call-me-online">  线  上  咨  询</div>
		</div>
	</div>
	</div>
	</div>


<?php 
get_footer();
?>

