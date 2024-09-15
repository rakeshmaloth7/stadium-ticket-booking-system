<?php
	require_once"admin/db/db_config.php";
	function get_seats_seats($date,$seats_id){
		if($date=="current"){  $date = date("Y-m-d"); }
		return mysqli_num_rows(select("SELECT bookingid  FROM `booking` WHERE `booking_for`  BETWEEN '$date 00:00:00' AND '$date 23:59:59' and seat_id = '$seats_id' and game_id='".$_REQUEST['gamesid']."'  "));
	}
	$seats_data = select("select * from seats where status = 1");
	$seats_available = 0;
	while($row = mysqli_fetch_array($seats_data)) {
		extract($row);
		$res = $seats_limit-get_seats_seats((isset($_POST['new_date'])) ? $_POST['new_date'] : "current",$seats_id);
		if($res>0)
		echo "<h4>",strtoupper($seats_name) ," - ",$res,"</h4><br/>";
		$seats_available+=$res;
	}
	if($seats_available>0){ ?>
	<div class="all-comments-info" id="booking_form">
		<h5 class="text-center" >Book Tickets</h5>
		<div class="agile-info-wthree-box">
			<div class="col-md-6 form-info">
				<input type="text" value="1" name="no_of_seats" id="no_of_seats"  placeholder="No of Seats" required="">
			</div>
			<?php $seats_data2 = select("select * from seats where status = 1"); ?>
			<div class="col-md-6 form-info">
				<select name="seats_id" id="seats_id"  class="form-control">
					<option value="">Select seats</option>
					<?php while($row1 = mysqli_fetch_array($seats_data2)) { extract($row1) ?>
						<?php
							$res2 = $seats_limit-get_seats_seats((isset($_POST['new_date'])) ? $_POST['new_date'] : "current",$seats_id);
						if($res2 > 0) : ?>
						<option data-seats_limit = "<?=$res2?>" value="<?=$seats_id?>" <?php if(isset($_POST['seats_id'])){ if( $_POST['seats_id']==$seats_id)  { echo "selected";  } } ?>><?=strtoupper($seats_name)?> - Rs. <?=$seats_rate?> /-</option>
						<?php endif;?>
					<?php } ?>
				</select>
			</div>
			<div class="clearfix"> </div>
			<br/>
			<div class="col-md-6 form-info">
				<input type="date" name="date" value="<?= (isset($_POST['new_date'])) ? $_POST['new_date'] : date("Y-m-d")?>" id="date" class="form-control" >
			</div>
			<input type="submit" id="book_ticket" value="Book" data-seats_available="0" data-gamesid="<?=$_REQUEST['gamesid']?> ">
			<div class="clearfix"> </div>
			<br/>
			<br/>
			<p class="myerror" id="error3"></p>
			<div class="clearfix"> </div>
		</div>
	</div>
	<?php } else{  ?>
	<div class="all-comments-info" id="booking_form">
		<h5 class="text-center" >No Seats Available For This Date</h5>
		<h5 class="text-center" >Choose Another</h5>
		<div class="agile-info-wthree-box">
			<div class="col-md-3 form-info">
			</div>
			<div class="col-md-6 form-info">
				<input type="date" name="date" value="<?= (isset($_POST['new_date'])) ? $_POST['new_date'] : date("Y-m-d")?>" id="date"  class="form-control" >
			</div>
		</div>
	</div>
<?php }  ?>