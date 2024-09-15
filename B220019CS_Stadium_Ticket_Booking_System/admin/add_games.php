<?php require_once"db/session.php";
	require_once"db/db_config.php";
?>
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
			width: 100%;
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
							<span>Add games</span>
						</h2>
					</div>
					<!--//banner-->
					<!--grid-->
					<div class="grid-form">
						<div class="grid-form1">
							<h3>Add games</h3>
							<div class="panel-body">
								<form class="form-horizontal"  method="post" id="add_games" action="ajax/user.php"   enctype="multipart/form-data">
									<div class="form-group">
										<label class="col-md-2 control-label">game Name :</label>
										<div class="col-md-8">
											<div class="input-group">
												<span class="input-group-addon">
													<i class="fa fa-key"></i>
												</span>
												<input type="text" class="form-control1 myform" name="games_name" id="game_name" placeholder="game Name Here"/>
											</div>
										</div>
									</div>
									
									
									<div class="form-group">
										<label class="col-md-2 control-label">game Rating :</label>
										<div class="col-md-8">
											<div class="input-group">
												<span class="input-group-addon">
													<i class="fa fa-key"></i>
												</span>
												<select class="form-control1 myform" name="games_rating" id="game_rating" >
													<?php for($i=5;$i>=1;$i--) :  ?><option value="<?=$i?>"><?=$i?></option><?php endfor;  ?>
												</select>
											</div>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-2 control-label">Upload File</label>
										<div class="col-md-8">
											<div class="input-group">
												<span class="btn btn-default btn-file check"  >
													Browse…  <input type="file"  class="upload__input" name="myimage" id="file" onchange="return fileValidation()"/>
												</span>
											</div>
											<div id="imagePreview" style="text-align:center;"></div>
										</div>
									</div>
									<p class="myerror" id="error"></p><br/>
									<div class="col-md-4 login-do col-md-offset-4">
										<label class="hvr-shutter-in-horizontal login-sub">
											<input type="submit"  name="add_games" value="Add games">
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
			var maxSize = '1024';
			function fileSizeValidate(fdata) {
				if (fdata.files && fdata.files[0]) {
					var fsize = fdata.files[0].size/1024;
					if(fsize > maxSize) {
						return false;
						} else {
						return true;
					}
				}
			}
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
					if(fileSizeValidate(this)) {
						alert('Please upload valid file size');
						fileInput.value = '';
						imagePreview.innerHTML="";
						return false;
						}else{
						//Image preview
						if (fileInput.files && fileInput.files[0]) {
							var reader = new FileReader();
							reader.onload = function(e) {
								document.getElementById('imagePreview').innerHTML = '<img style="width:200px;" src="'+e.target.result+'"/>';
							};
							reader.readAsDataURL(fileInput.files[0]);
						}
					}
				}
			}
			$(document).ready(function(){
				$("#add_games").submit(function(){
					var file = $.trim($('#file').val());
					var game_name = $.trim($('#game_name').val());
					var game_year = $.trim($('#game_year').val());
					var games_label = $.trim($('#games_label').val());
					var game_rating = $.trim($('#game_rating').val());
					if(game_name=="")
					{
						$("#game_name").focus();
						$("#game_name").css('border','2px solid #ec000069');
						$("#error").text('Please Provide a game Name');
						alertify.error('Please Provide a game Name');
						return false;
					}
					
					
					if(game_rating=="")
					{
						$("#game_rating").focus();
						$("#game_rating").css('border','2px solid #ec000069');
						$("#error").text('Please Provide a game Rating');
						alertify.error('Please Provide a game Rating');
						return false;
					}
					if(file=="")
					{
						$("#file").focus();
						$("#file_error").css('border','2px solid #ec000069');
						$("#error").text('Please Select File');
						alertify.error('Please Select File');
						return false;
					}
					$("#file_error").css('border','1px solid green');
					$("#error").text('');
					return true;
				});
			});
		</script>
	</body>
</html>