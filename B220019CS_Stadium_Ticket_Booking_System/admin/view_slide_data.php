<?php require_once"db/session.php"; require_once"db/db_config.php";	 ?>
<?php
	$res = select("SELECT * FROM slider");
	if(mysqli_num_rows($res)>0) {
	?>
	<div class="table">
	<table class="table table-hover">
		<thead>
			<tr>
				<th>#</th>
				<th>Slide Image</th>
				<th>Delete</th>
			</tr>
		</thead>
		<tbody>
			<?php $i=1; while($row = mysqli_fetch_array($res)){ extract($row);	?>
				<tr id="category<?=$slider_id?>">
					<td><?=$i?> . </td>
					<td><img src="../images/slides/<?=$path?>" width="250"></td>
					<td><button class="btn btn-primary del_slider" data-slider_id="<?=$sliderid?>" ><i class="fa fa-cut" style="color:#fff;"></i> Delete</button></td>
				</tr>
			<?php $i++; } ?>
		</tbody>
	</table>
	</div>
	<?php  } else { ?>
	<h2 class="text-center">No Slider Yet</h2>
<?php  } ?>
