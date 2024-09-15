<?php require_once"db/session.php";?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Stadium Ticket Booking</title>
		<?php include_once"head_files.php";?>
		<style>
			
			.file-upload__input {
			position: absolute;
			left: 0;
			top: 0;
			right: 0;
			bottom: 0;
			font-size: 1;
			width:0;
			height: 100%;
			opacity: 0;
			}
			
			.btn-file {
			position: relative;
			overflow: hidden;
			}
			.btn-file input[type=file] {
			position: absolute;
			top: 0;
			right: 0;
			min-width: 100%;
			min-height: 100%;
			font-size: 100px;
			text-align: right;
			filter: alpha(opacity=0);
			opacity: 0;
			outline: none;
			background: white;
			cursor: inherit;
			display: block;
			
			}
			
			#imagePreview{
			width: 100%;
			}
			.input-group {
			position: relative;
			display: table;
			width: 100%;
			float: left;
			margin: 0;
			border-collapse: separate;
			}
			.check{
			width: 50%;
			background: #5dc7fb;
			margin: 9px auto;
			color: white;
			font-weight: bolder;}
		</style>
	</head>
	<body>
		<div id="wrapper">
			<!----->
			<?php include_once"header.php";?>
			<div id="page-wrapper" class="gray-bg dashbard-1">
				<div class="content-main">
					
					<!--banner-->
					<div class="banner">
						<h2>
							<a href="index.php">Home</a>
							<i class="fa fa-angle-right"></i>
							<span>Change Profile Picture</span>
						</h2>
					</div>
					<!--//banner-->
					<!--grid-->
					<div class="grid-form">
						
						
						<div class="grid-form1">
							<h3 class="text-center">Change Profile Picture</h3>
							
							
							<div class="panel-body">
								<form class="form-horizontal" method="post" action="ajax/upload.php" id="change_pic" enctype="multipart/form-data">
									<div class="form-group">
										<div >
											<center>
											<img src="images/<?php if(empty($_SESSION['userimage'])) echo "users.png"; else echo $_SESSION['userimage']; ?>" style="width:220px;">
											</center>
											
										</div>
									</div>
									
									<div class="form-group ">
										<center>
											<label>Upload Image</label>
											<div class="input-group">
												
												<span class="btn btn-default btn-file check">
													Browse…  <input type="file"  class="upload__input" name="myimage" id="file" onchange="return fileValidation()"/>
												</span>
											</div>
											<div id="imagePreview" style="text-align:center;"></div>
										</center>
									</div>
									
									<p class="myerror" id="error"></p>
									<br/>
									<br/>
									<div class="col-md-4 login-do col-md-offset-4">
										<label class="hvr-shutter-in-horizontal login-sub">
											<input type="submit"  name="upload" id="img_upload" value="Change">
										</label>
									</div>
								</form>
								</div>
								
									</div>
					</div>
					<!--//grid-->
					<!---->
					<?php include_once"footer.php";?>
				</div>
			</div>
			<div class="clearfix"> </div>
		</div>
		<?php include_once"footer_scripts.php";?>
		<script>
			function fileValidation(){
				var fileInput = document.getElementById('file');
				var imagePreview = document.getElementById('imagePreview');
				var filePath = fileInput.value;
				var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;
				if(!allowedExtensions.exec(filePath)){
					alert('Please upload file having extensions .jpeg/.jpg/.png/.gif only.');
					fileInput.value = '';
					imagePreview.innerHTML="";
					return false;
					}else{
					//Image preview
					if (fileInput.files && fileInput.files[0]) {
						var reader = new FileReader();
						reader.onload = function(e) {
							document.getElementById('imagePreview').innerHTML = '<img style="width:300px;" src="'+e.target.result+'"/>';
						};
						reader.readAsDataURL(fileInput.files[0]);
					}
				}
			}
			
			$(document).ready(function(){
				
				$("#change_pic").submit(function(){
					var image = $("#file").val();
					if(image=='')
					{
						alertify.error('Invalid Image');
						$(".check").css('border','1.5px solid #fc5757');
						$("#error").text('Please Select Image');
						return false;
					}
					return true;
				});
			});
		</script>
	</body>
</html>

