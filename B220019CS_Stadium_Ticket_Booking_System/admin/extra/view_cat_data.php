<?php require_once"db/session.php"; require_once"db/db_config.php";	 ?>
<?php
	$res = select("select * from category");
	if(mysqli_num_rows($res)>0) {
	?>
	<div class="tables">
	<table class="table table-hover">
		<thead>
			<tr>
				<th>#</th>
				<th>Category Name</th>
				<th>Detail 1</th>
				<th>Detail 2</th>
				<th>Edit</th>
				<th>Delete</th>
			</tr>
		</thead>
		<tbody>
			<?php $i=1; while($row = mysqli_fetch_array($res)){ extract($row);	?>
				<tr id="category<?=$cat_id?>">
					<td><?=$i?> . </td>
					<td><?=ucwords($category_name)?></td>
					<td><?=ucwords($detail1)?></td>
					<td><?=ucwords($detail2)?></td>
					<td><a href="update-category.php?cat_id=<?=$cat_id?>" class="btn btn-primary"> <i class="fa fa-edit" style="color:#fff;"></i> Edit</a></td>
					<td><button class="btn btn-primary del_category" data-cat_name="<?=ucwords($category_name)?>" data-cat_id="<?=$cat_id?>" ><i class="fa fa-cut" style="color:#fff;"></i> Delete</button></td>
				</tr>
			<?php $i++; } ?>
		</tbody>
	</table>
	</div>
	<?php  } else { ?>
	<h2 class="text-center">No Category Yet</h2>
	
<?php  } ?>