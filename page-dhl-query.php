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
		<?php the_content(); ?>
	</div>
	
	<div class="query-wrap">
		<form action="" class="dhl-query-form">
			<div class="dhl-query-box">

				<input name="postid" type="text" class="inp-metro" style="width: 444px; color: rgb(51, 51, 51);" id="postid" placeholder="请输入您要查询的单号" maxlength="26" url="true" autocomplete="off" x-webkit-speech="" x-webkit-grammar="builtin:translate">
				<input id="btn-query" type="button" class="btn-query">
			</div>
		</form>

		<div id="query-result-box">
			<table id="queryResult2" class="result-info2" cellspacing="0" style="width:610px">
				<tbody id="query-result-tbody">

				</tbody>
			</table>
		</div>
	</div>
	

	<script type="text/javascript">
		jQuery(function ($) {

			$("#btn-query").on('click',function () {
				var postid = $.trim($("#postid").val());
				dhl_query(postid);
			});


			var postid = "<?php echo $_GET['postid']; ?>";

			if(postid){
				dhl_query(postid);
			}

			function dhl_query (postid) {
				var query_url = '<?php echo THEME_DIR . "/inc/shipmentTracking.php";  ?>';
				
				if (postid == "") {
					alert("请输入您要查询的单号");
					return;
				}

				$.ajax({
					url: query_url,
					type: 'GET',
					dataType: 'json',
					data: {postid: postid},
				})
				.done(function(response) {
					
					if(response && response.message == "ok" ){
						$("#queryResult2").addClass('result-border');
						var checkpoints = response.data;
						var checkpointsListStr = makeCheckpoints(checkpoints);
						$("#query-result-tbody").empty().append(checkpointsListStr);
						if($("#postid").val() == ""){
							$("#postid").val(postid);
						}
					}else{
						alert("查询失败，请检查您的订单号是否正确！！！")
					}
				})
				.fail(function() {
					window.console && console.log("error");
				})
				.always(function() {
					window.console && console.log("complete");
				});
			}


			function makeCheckpoints (checkpoints) {
				var strs = "";
				var len = checkpoints.length;
				for (var i = len - 1; i >= 0; i--) {
					var checkpoint = checkpoints[i];
					var str = "<tr>";
					str += "<td class='row1'>" + checkpoint['time'] + "</td>";
					if(i == 0){
						str += "<td class='status status-wait'>&nbsp;</td>";
					} else if(i == len-1 ){
						str += "<td class='status status-first'>&nbsp;</td>";
					}else{
						str += "<td class='status'>&nbsp;</td>";
					}

					str += "<td>" + checkpoint['context'] + "</td>";
					strs += str;
					
				};

				return strs;
				

			}

			
			

		});
	</script>


<?php }
?>
</div>



<?php get_sidebar(); ?>


<?php get_footer(); ?>

