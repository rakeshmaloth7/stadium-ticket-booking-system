<?php
	session_start();
	if(!isset($_SESSION['user_login'])){
		echo "<script>alert('Please Login First');window.location='index.php';</script>";
	}
	require_once"admin/db/db_config.php";
	$movie_data = mysqli_fetch_array(select("select * from gamess where gamesid='".$_REQUEST['gamesid']."'"));
?>
<!DOCTYPE html>
<html>
	<head>
		<title>games Pro | Home</title>
		<?php include_once"head_files.php";?>
	</head>
	<body>
		<!--/main-header-->
		<!--/banner-section-->
		<?php include_once"home_banner.php";?>
		<!--/banner-section-->
		<!--//main-header-->
		<!--/banner-bottom-->
		<?php include_once"login-section.php";?>
		<!--/content-inner-section-->
		<div class="w3_content_agilleinfo_inner">
			<div class="agile_featured_games">
				<div class="inner-agile-w3l-part-head">
					<h3 class="w3l-inner-h-title"><?=$movie_data['games_name']?></h3>
				</div>
				<div class="latest-news-agile-info text-center" >
					<div class="col-md-8 latest-news-agile-left-content">
						<img src="games/<?=$movie_data['games_image']?>" alt=" " class="img-responsive">
						<div class="single video_agile_player">
							<h4><?=$movie_data['games_name']?> | Official </h4>
						</div>
						<div id="show">
							<?php include_once"game_data.php";?>
						</div>
					</div>
					<div class="col-md-4 latest-news-agile-right-content">
						<div class="clearfix"> </div>
						<div class="agile-info-recent">
							<h4 class="side-t-w3l-agile">Latest <span>games</span></h4>
							<div class="w3ls-recent-grids">
							<input type="hidden" id="gamesid"  data-gamesid="<?=$movie_data['gamesid']?>" >
								<?php $q = select("select * from gamess  where gamesid!='".$_REQUEST['gamesid']."' limit 0,4"); while($games = mysqli_fetch_array($q)) {  extract($games); ?>
									<div class="w3l-recent-grid">
										<div class="wom">
											<a href="single.php?gamesid=<?=$gamesid?>"><img src="games/<?=$games_image?>" alt=" " class="img-responsive"></a>
										</div>
										<div class="wom-right">
											<h5><a href="single.php?gamesid=<?=$gamesid?>"><?=$games_name?></a></h5>
											<div class="mid-2 agile_mid_2_home">
												<div class="clearfix"></div>
												<div class="block-stars">
													<ul class="w3l-ratings">
														<?php for($i=1;$i<=$games_rating;$i++) :  ?>
														<li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
														<?php  endfor; ?>
													</ul>
												</div>
												<div class="clearfix"></div>
												<a class="w3_play_icon1" href="single.php?gamesid=<?=$gamesid?>">
													Book Now
												</a>
												<div class="clearfix"></div>
												<div class="clearfix"></div>
											</div>
										</div>
										<div class="clearfix"> </div>
									</div>
								<?php } ?>
							</div>
						</div>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
		<!--//content-inner-section-->
		<!--/footer-bottom-->
		<?php include_once"footer.php";?>
		<?php include_once"footer_scripts.php";?>
	</body>
	</html>	