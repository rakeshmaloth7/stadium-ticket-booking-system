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
							<span>Add Slide</span>
						</h2>
					</div>
					<!--//banner-->
					<!--grid-->
					<div class="grid-form">
						<div class="grid-form1">
							<h3>Add Slide</h3>
							<div class="panel-body">
								<form class="form-horizontal"  method="post" id="add_Slide" action="ajax/user.php"   enctype="multipart/form-data">
									<div class="form-group">
										<label class="col-md-2 control-label">Slide Title</label>
										<div class="col-md-8">
											<div class="input-group">
												<span class="input-group-addon">
													<i class="fa fa-key"></i>
												</span>
												<input type="text" class="form-control1 myform"  name="slide_title" id="slide_title" placeholder="Slide Title"/>
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
											<input type="submit"  name="add_Slide" value="Add Slide">
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
				$("#slide_title").focus();
				$("#add_Slide").submit(function(){
					var slide_title = $.trim($('#slide_title').val());
					var file = $.trim($('#file').val());
				var alphanum_valid = /^[-_ a-zA-Z0-9]+$/;
				if(slide_title.length>0)
				{
					if(slide_title.length<3)
					{
						$("#slide_title").focus();
						$("#slide_title").css('border','2px solid #ec000069');
						$("#error").text('Slide Title Should be Minimum 3 Charachter');
						alertify.error('Slide Title Should be Minimum 3 Charachter');
						return false;
					}
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