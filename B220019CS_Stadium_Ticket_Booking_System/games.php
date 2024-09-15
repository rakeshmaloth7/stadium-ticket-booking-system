<h3 class="agile_w3_title"> Latest <span>games</span></h3>
<!--/games-->
<div class="w3_agile_latest_games">
	<div id="owl-demo" class="owl-carousel owl-theme">
		<?php $q = select("select * from gamess"); while($games = mysqli_fetch_array($q)) {  extract($games); ?>
		<div class="item">
			<div class="w3l-movie-gride-agile w3l-movie-gride-slider ">
				<a href="single.php?gamesid=<?=$gamesid?>" class="hvr-sweep-to-bottom"><img src="games/<?=$games_image?>" title="games Pro" class="img-responsive" alt=" " />
					<div class="w3l-action-icon"><i class="fa fa-play-circle-o" aria-hidden="true"></i></div>
				</a>
				<div class="mid-1 agileits_w3layouts_mid_1_home">
					<div class="w3l-movie-text">
						<h6><a href="single.php?gamesid=<?=$gamesid?>"><?=$games_name?>	</a></h6>
					</div>
					<div class="mid-2 agile_mid_2_home">
						<div class="block-stars">
							<ul class="w3l-ratings">
								<?php for($i=1;$i<=$games_rating;$i++) :  ?>
								<li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
								<?php  endfor; ?>
							</ul>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
				
			</div>
		</div>
		<?php } ?>
	</div>
</div>