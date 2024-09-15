<div class="contact-w3ls" id="contact">
	<div class="footer-w3lagile-inner">
		<div class=" w3-agileits">
			<div class="col-md-6 footer-grid">
				<h4>Latest games</h4>
				<?php $q = select("select * from gamess limit 0,4"); while($games = mysqli_fetch_array($q)) {  extract($games); ?>
					<div class="footer-grid1">
						<div class="footer-grid1-left">
							<a href="single.php?gamesid=<?=$gamesid?>"><img src="games/<?=$games_image?>" alt=" " class="img-responsive"></a>
						</div>
						<div class="footer-grid1-right">
							<a href="single.php?gamesid=<?=$gamesid?>"><?=ucwords($games_name)," | Official "?></a>
						</div>
						<div class="clearfix"> </div>
					</div>
					<?php } ?>
			</div>
			<div class="col-md-2 footer-grid" style="float:right">
				<h4 class="b-log"><a href="index.php"><span>G</span>ames <span>P</span>ro</a></h4>
				<?php $q2 = select("select * from gamess order by  gamesid desc  limit 0,4"); while($games2 = mysqli_fetch_array($q2)) {  extract($games2); ?>
					
				<div class="footer-grid-instagram">
					<a href="single.php?gamesid=<?=$gamesid?>"><img src="games/<?=$games_image?>" alt=" " class="img-responsive"></a>
				</div>
				<?php } ?>
				<div class="clearfix"> </div>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
</div>
<div class="w3agile_footer_copy">
	<p>© <script>document.write(new Date().getFullYear());</script> games Pro. All rights reserved  </p>
</div>
<a href="#home" id="toTop" class="scroll" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>