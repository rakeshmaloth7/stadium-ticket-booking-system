<div class="w3_agilits_banner_bootm">
	<div class="w3_agilits_inner_bottom">
		<div class="col-md-12 wthree_agile_login">
			<ul>
				<li><i class="fa fa-phone" aria-hidden="true"></i> (+91) 777989801</li>
				<?php if(!isset($_SESSION['user_login'])){ ?>
				<li><a href="#" class="login"  data-toggle="modal" data-target="#myModal4">Login</a></li>
				
				<li><a href="#" class="login reg"  data-toggle="modal" data-target="#myModal5">Register</a></li>
				<?php }else
				{ ?>
				<li style="margin-left: 2%;float:right"><a href="logout.php" class="login reg" >Logout</a></li>
				<li style="margin-left: 2%;		float:right"><a class="login reg"  href="booking_h.php">Booking History</a> </li>
				<li style="    float:right"><a class="login reg" >Welcome <?=ucwords($_SESSION['usersname'])?></a> </li>
				
				<?php }?>
			</ul>
		</div>
		
	</div>
</div>
<div class="modal fade" id="myModal4" tabindex="-1" role="dialog" >
	<div class="modal-dialog">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4>Login</h4>
				<div class="login-form">
					 
						<input type="email" name="email" id="email" placeholder="E-mail">
						<input type="password" name="password"  id="password"  name="password" placeholder="Password">
						<p class="myerror" id="error"></p>
						<div class="tp">
							<input type="submit"  id="login_check" value="LOGIN NOW">
						</div>
						
						<div class="forgot-grid">
							<div class="log-check">
								<label class="checkbox"><input type="checkbox" name="checkbox">Remember me</label>
							</div>
							<div class="forgot">
								<a href="#" data-toggle="modal" data-target="#myModal2">Forgot Password?</a>
							</div>
							<div class="clearfix"></div>
						</div>
					 
				</div>
			</div>
		</div>
	</div>
</div>
<!-- //Modal1 -->
<!-- Modal1 -->
<div class="modal fade" id="myModal5" tabindex="-1" role="dialog" >
	<div class="modal-dialog">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4>Register</h4>
				<div class="login-form">
					 	<input type="text" name="name"  id="signup_name" placeholder="Name">
						<input type="email" name="email" id="signup_email" placeholder="E-mail">
						<input type="password" name="password" id="signup_password" placeholder="Password">
						<input type="password" name="conform password" id="signup_cpassword" placeholder="Confirm Password">
						<div class="signin-rit">
							<span class="agree-checkbox">
								<label class="checkbox"><input type="checkbox" checked="checked" id="agree" name="checkbox">I agree to your <a class="w3layouts-t" href="#" target="_blank">Terms of Use</a> and <a class="w3layouts-t" href="#" target="_blank">Privacy Policy</a></label>
							</span>
						</div>
						<p class="myerror" id="error2"></p>
						
						<div class="tp">
							<input type="submit" id="signup" value="REGISTER NOW">
						</div> 
				</div>
			</div>
		</div>
	</div>
</div>
