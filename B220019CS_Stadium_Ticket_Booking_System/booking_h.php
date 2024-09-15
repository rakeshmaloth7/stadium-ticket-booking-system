<?php
session_start();
require_once"admin/db/db_config.php";


$query_fetch =select("SELECT book.booking_date,book.booking_for,seats.seats_name,seats.seats_rate,gamess.games_name,book.seats FROM book INNER JOIN gamess on book.game_id=gamess.gamesid INNER JOIN seats on book.seat_id = seats.seats_id where book.userid='".$_SESSION['usersid']."' ");



?>
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

<!--//tab-section-->
<?php //include_once"games.php";?>

<div class="container">
<h2><?=ucwords($_SESSION['usersname'])?> Booking History</h2></br>
<?php

if(mysqli_num_rows($query_fetch)>0){
?>




<table class="table table-hover">
<thead>
<tr style="font-family: Times ;font-size: 30px ">
<th>Booking Date</th>
<th>Booking For</th>
<th>seats Name</th>
<th>seats Rate</th>
<th>Game Name</th>
<th>Total Booked Seats</th>
</tr>
</thead>
<tbody>




<tr class="info" style="font-family: Times ;font-size: 20px ">
<?php 
while($row = mysqli_fetch_array($query_fetch)){
extract($row);
?>
<td><?=$booking_date?></td>
<td><?=$booking_for?></td>
<td><?=ucwords(strtolower($seats_name))?></td>
<td>Rs. <?=$seats_rate?></td>
<td><?=$games_name?></td>
<td><?=$seats?></td>
</tr>
<?php } ?>


</tbody>
</table>
<?php } else { echo "No Booking Till yet"; } ?>
</div>

<!--//top-games-->
</div>
</div>
<!--//content-inner-section-->
<!--/footer-bottom-->
<?php include_once"footer.php";?>
<?php include_once"footer_scripts.php";?>
</body>
</html>				