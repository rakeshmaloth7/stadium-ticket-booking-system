<?php require_once"db/session.php"; require_once"db/db_config.php";	 ?>
<?php
	$res = select("SELECT * FROM gamess");
	if(mysqli_num_rows($res)>0) {
	?>
	<div class="table">
	<table class="table table-hover">
		<thead>
			<tr>
				<th>#</th>
				<th>games Name</th>
				<th>games Image</th>
				<th>games Rating</th>
				<th>Delete</th>
			</tr>
		</thead>
		<tbody>
			<?php $i=1; while($row = mysqli_fetch_array($res)){ extract($row);	?>
				<tr >
					<td><?=$i?> . </td>
					<td><?=$games_name?></td>
					<td><img src="../games/<?=$games_image?>" width="100"></td>
					<td><?=$games_rating?></td>
					<td><button class="btn btn-primary del_games" data-games_id="<?=$gamesid?>" ><i class="fa fa-cut" style="color:#fff;"></i> Delete</button></td>
				</tr>
			<?php $i++; } ?>
		</tbody>
	</table>
	</div>
	<?php  } else { ?>
	<h2 class="text-center">No games Yet</h2>
<?php  } ?>
