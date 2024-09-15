<?php require_once"db/session.php"; require_once"db/db_config.php";	 ?>
<?php
	$res = select("SELECT author.*,category.cat_id,category.category_name FROM author INNER JOIN category on author.cat_id = category.cat_id");
	if(mysqli_num_rows($res)>0) {
	?>
	<div class="table">
	<table class="table table-hover">
		<thead>
			<tr>
				<th>#</th>
				<th>Author Image</th>
				<th>Author Name</th>
				<th>Category Name</th>
				<th>Detail 1</th>
				<th>Detail 2</th>
				<th>Edit</th>
				<th>Delete</th>
			</tr>
		</thead>
		<tbody>
			<?php $i=1; while($row = mysqli_fetch_array($res)){ extract($row);	?>
				<tr id="category<?=$author_id?>">
					<td><?=$i?> . </td>
					<td><img src="author/<?=$image?>" width="100"></td>
					<td><?=ucwords($author_name)?></td>
					<td><?=ucwords($category_name)?></td>
					<td><?=ucwords($detail1)?></td>
					<td><?=ucwords($detail2)?></td>
					<td><a href="update-author.php?author_id=<?=$author_id?>" class="btn btn-primary"> <i class="fa fa-edit" style="color:#fff;"></i> Edit</a></td>
					<td><button class="btn btn-primary del_author" data-author_name="<?=ucwords($author_name)?>" data-author_id="<?=$author_id?>" ><i class="fa fa-cut" style="color:#fff;"></i> Delete</button></td>
				</tr>
			<?php $i++; } ?>
		</tbody>
	</table>
	</div>
	<?php  } else { ?>
	<h2 class="text-center">No Author Yet</h2>
<?php  } ?>
