<?php require_once"db/session.php";
	require_once"db/db_config.php";
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>View Users</title>
		<?php include_once"head_files.php";?>
		
		
		<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
  
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>

  <script type="text/javascript">
  $(document).ready(function () {
$('#myTable123').DataTable();
$('.dataTables_length').addClass('bs-select');
});

  </script>
		
		
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
							<span>View Users</span>
						</h2>
					</div>
					<!--//banner-->
					<!--faq-->
					<div class="blank">
						<div class="blank-page" id="display">
							
							
							
							<?php
include "dbconfigure.php" ;


$query = "select * from users";
$rs = my_select($query);

echo "<div class = container>";
 
echo "<div class = row>";
echo "<div class = col-sm-12>";
echo "<div class='table-responsive'>";
echo "<table class='table table-hover table-sm' style = 'overflow: scroll ; font-weight : bold' id=myTable123>";
echo "<thead style = 'background-color : yellow ; color : white ; font-weight : bold' >";
echo "<tr>";

echo "<th>User Name</th>";
echo "<th>Email ID</th>";
echo "<th>Remove</th>";
echo "</tr>";
echo "</thead>";

echo '<tbody id="myTable">';
while($column=mysqli_fetch_array($rs))
{
echo "<tr class='table-warning'>";
echo "<td>$column[1]</td>";

echo "<td>$column[3]</td>";

																					
echo '<td><a href="deleteuser.php?id='.$column['userid'].'">
													<i class="fa fa-remove"></i>
													</a></td>';
																

																
												
echo "</tr>";

}
echo "</tbody>";
echo "</table>";
echo "</div>";
echo "</div>";
echo "</div>";
echo "</div>";






?>

							
							
							
							
							
							
							
							
							
							
							
							
							
							
						</div>
					</div>
					<!--//faq-->
					<!---->
					<?php include_once"footer.php";?>
					</div>
			</div>
			<div class="clearfix"> </div>
		</div>
		
		
	</body>
</html>