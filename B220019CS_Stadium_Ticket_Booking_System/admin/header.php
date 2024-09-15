<nav class="navbar-default navbar-static-top" role="navigation">
	<div class="navbar-header">
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
		<h2> <a class="navbar-brand" href="index.php">Stadium Ticket Booking</a></h2>
	</div>
	<div class=" border-bottom">
		<div class="full-left">
			<section class="full-top">
				<button id="toggle"><i class="fa fa-arrows-alt"></i></button>
			</section>
			
			<div class="clearfix"> </div>
		</div>
		<!-- Brand and toggle get grouped for better mobile display -->
		<!-- Collect the nav links, forms, and other content for toggling -->
		
		<div class="drop-men" >
			<ul class=" nav_1">
			
				<li class="dropdown">
					<a href="#" class="dropdown-toggle dropdown-at" data-toggle="dropdown"><span class=" name-caret"><?=ucwords($_SESSION['username']);?><i class="caret"></i></span>
					<img src="images/<?php if(empty($_SESSION['userimage'])) echo "users.png"; else echo $_SESSION['userimage']; ?>" style="border-radius: 50%;"></a>
					<ul class="dropdown-menu " role="menu">
						<li><a href="change_password.php"><i class="fa fa-edit"></i>Setting</a></li>
						<li><a href="change_profile_pic.php"><i class="fa fa-image"></i>Profile Picture</a></li>
						<li><a href="logout.php"><i class="fa fa-power-off"></i>Logout</a></li>
					</ul>
				</li>
			</ul>
		</div>
		
		<!-- /.navbar-collapse -->
		<div class="clearfix">
		</div>
		<div class="navbar-default sidebar" role="navigation">
			<div class="sidebar-nav navbar-collapse" >
				<ul class="nav" id="side-menu"  >
					<li>
						<a href="index.php" class=" hvr-bounce-to-right"><i class="fa fa-dashboard nav_icon "></i><span class="nav-label" style = "color : black ; font-weight : bold">Dashboard</span> </a>
					</li>
					<li>
						<a href="change_password.php" class=" hvr-bounce-to-right"><i class="fa fa-dashboard nav_icon "></i><span class="nav-label" style = "color : black ; font-weight : bold">Change Password</span> </a>
					</li>
					<li>
						<a href="change_profile_pic.php" class=" hvr-bounce-to-right"><i class="fa fa-dashboard nav_icon "></i><span class="nav-label" style = "color : black ; font-weight : bold">Change Profile Picture</span> </a>
					</li>
					<li>
						<a href="update_details.php" class=" hvr-bounce-to-right"><i class="fa fa-dashboard nav_icon "></i><span class="nav-label" style = "color : black ; font-weight : bold">Update Details</span> </a>
					</li>
					<li>
						<a href="#" class=" hvr-bounce-to-right"><i class="fa fa-indent nav_icon"></i> <span class="nav-label" style = "color : black ; font-weight : bold">Seats</span><span class="fa arrow"></span></a>
						<ul class="nav nav-second-level">
							<li><a href="add_seats.php" class=" hvr-bounce-to-right" style = "color : black ; font-weight : bold"> <i class="fa fa-area-chart nav_icon"  ></i>Add seats</a></li>
							<li><a href="view_seats.php" class=" hvr-bounce-to-right" style = "color : black ; font-weight : bold"><i  class="fa fa-map-marker nav_icon"></i>View seats</a></li>
						</ul>
					</li>
					<li>
						<a href="#" class=" hvr-bounce-to-right"><i class="fa fa-indent nav_icon"></i> <span class="nav-label" style = "color : black ; font-weight : bold">Slider</span><span class="fa arrow"></span></a>
						<ul class="nav nav-second-level">
							<li><a href="add_slider.php" class=" hvr-bounce-to-right" style = "color : black ; font-weight : bold"> <i  class="fa fa-area-chart nav_icon"></i>Add Slider</a></li>
							<li><a href="view_slides.php" style = "color : black ; font-weight : bold" class=" hvr-bounce-to-right"><i  class="fa fa-map-marker nav_icon"></i>View Slides</a></li>
						</ul>
					</li>
					<li>
						<a href="#" class=" hvr-bounce-to-right"><i class="fa fa-indent nav_icon"></i> <span class="nav-label" style = "color : black ; font-weight : bold" >Games</span><span class="fa arrow"></span></a>
						<ul class="nav nav-second-level">
							<li><a href="add_games.php" style = "color : black ; font-weight : bold" class=" hvr-bounce-to-right"> <i  class="fa fa-area-chart nav_icon"></i>Add games</a></li>
							<li><a style = "color : black ; font-weight : bold" href="view_games.php" class=" hvr-bounce-to-right"><i class="fa fa-map-marker nav_icon"></i>View games</a></li>
						</ul>
					</li>
					
					<li>
						<a href="#" class=" hvr-bounce-to-right"><i class="fa fa-indent nav_icon"></i> <span class="nav-label" style = "color : black ; font-weight : bold" >Booking</span><span class="fa arrow"></span></a>
						<ul class="nav nav-second-level">
						
							<li><a style = "color : black ; font-weight : bold" href="viewbooking.php" class=" hvr-bounce-to-right"><i class="fa fa-map-marker nav_icon"></i>View bookings</a></li>
						</ul>
					</li>
					
					<li>
						<a href="#" class=" hvr-bounce-to-right"><i class="fa fa-indent nav_icon"></i> <span class="nav-label" style = "color : black ; font-weight : bold">Users</span><span class="fa arrow"></span></a>
						<ul class="nav nav-second-level">
							<li><a style = "color : black ; font-weight : bold" href="viewuser.php" class=" hvr-bounce-to-right"><i class="fa fa-map-marker nav_icon"></i>View Users</a></li>
						</ul>
					</li>
					
					
				</ul>
			</div>
		</div>
	</nav>	