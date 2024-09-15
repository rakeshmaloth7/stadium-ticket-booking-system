<?php require_once"db/session.php"; require_once"db/db_config.php";	 ?>
<?php
	$res = select("SELECT * FROM seats");
	if(mysqli_num_rows($res)>0) {
	?>
	<div class="table">
	<table class="table table-hover">
		<thead>
			<tr>
				<th>#</th>
				<th>seats Name</th>
				<th>seats Limit</th>
				<th>seats Rate</th>
				<th>Status</th>
			</tr>
		</thead>
		<tbody>
			<?php $i=1; while($row = mysqli_fetch_array($res)){ extract($row);	?>
				<tr >
					<td><?=$i?> . </td>
					<td><?=strtoupper($seats_name)?></td>
					<td><?=$seats_limit?></td>
					<td>Rs . <?=$seats_rate," /-"?></td>
					<?php if($status==1){ ?>
					<td><button class="btn btn-success del_seats" data-seats_id="<?=$seats_id?>" data-status="0"> Active</button></td>
					<?php } else { ?>
					<td><button class="btn btn-warning del_seats" data-seats_id="<?=$seats_id?>" data-status="1"> Deactive</button></td>
					<?php } ?>
					
				</tr>
			<?php $i++; } ?>
		</tbody>
	</table>
	</div>
	<?php  } else { ?>
	<h2 class="text-center">No seats Yet</h2>
<?php  } ?>
