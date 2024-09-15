<?php require_once"db/session.php";
	require_once"db/db_config.php";
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Minimal | Author</title>
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
							<span>Add Author</span>
						</h2>
					</div>
					<!--//banner-->
					<!--grid-->
					<div class="grid-form">
						<div class="grid-form1">
							<h3>Add Author</h3>
							<div class="panel-body">
								<form class="form-horizontal"  method="post" id="add_author" action="ajax/user.php"   enctype="multipart/form-data">
									<div class="form-group">
										<label class="col-md-2 control-label">Author Name*</label>
										<div class="col-md-8">
											<div class="input-group">
												<span class="input-group-addon">
													<i class="fa fa-key"></i>
												</span>
												<input type="text" class="form-control1 myform"  name="author_name" id="author_name" placeholder="Author Name"/>
											</div>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-2 control-label">Category</label>
										<div class="col-md-8">
											<div class="input-group">
												<span class="input-group-addon">
													<i class="fa fa-key"></i>
												</span>
												<select name="category" id="category" class="form-control1 myform" >
													<option value="">Select Category</option>
													<?php $res = select("select * from category"); $cat = 1; while($categories = mysqli_fetch_array($res)){ extract($categories); if($cat==1){ $fcat = $cat_id; } ?>
														<option value="<?=$cat_id?>"><?=ucwords($category_name)?></option>
													<?php $cat++; } ?>
												</select>
											</div>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-2 control-label">Detail 1 :</label>
										<div class="col-md-8">
											<div class="input-group">
												<span class="input-group-addon">
													<i class="fa fa-key"></i>
												</span>
												<input type="text" class="form-control1 myform" name="detail1" id="detail1" placeholder="Detail 1 Here"/>
											</div>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-2 control-label">Detail 2 :</label>
										<div class="col-md-8">
											<div class="input-group">
												<span class="input-group-addon">
													<i class="fa fa-key"></i>
												</span>
												<input type="text" class="form-control1 myform" name="detail2" id="detail2" placeholder="Detail 2 Here"/>
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
											<input type="submit"  name="add_author" value="Add Author">
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
				$("#author_name").focus();
				$("#add_author").submit(function(){
					var author_name = $.trim($('#author_name').val());
					var category = $.trim($('#category').val());
					var detail1 = $.trim($('#detail1').val());
					var detail2 = $.trim($('#detail2').val());
					var file = $.trim($('#file').val());
					var alphanum_valid = /^[-_ a-zA-Z0-9]+$/;
					if(author_name=="")
					{
						$("#author_name").focus();
						$("#author_name").css('border','2px solid #ec000069');
						$("#error").text('Please Provide a Author Name');
						alertify.error('Please Provide a Author Name');
						return false;
					}
					if(author_name.length<3)
					{
						$("#author_name").focus();
						$("#author_name").css('border','2px solid #ec000069');
						$("#error").text('Author Name Should be Minimum 3 Charachter');
						alertify.error('Author Name Should be Minimum 3 Charachter');
						return false;
					}
					if(!alphanum_valid.test(author_name))
					{
						$("#author_name").focus();
						$("#author_name").css('border','2px solid #ec000069');
						$("#error").text('Author Name can Only Contains Alpha Numeric Charachter');
						alertify.error('Author Name can Only Contains Alpha Numeric Charachter');
						return false;
					}
					$("#author_name").css('border','1px solid green');
					if(category=="")
					{
						$("#category").focus();
						$("#category").css('border','2px solid #ec000069');
						$("#error").text('Please Select Category');
						alertify.error('Please Select Category');
						return false;
					}
					$("#category").css('border','1px solid green');
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