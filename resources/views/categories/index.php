<table>
	<tr>
		<th>Brand</th>
		<th>Name</th>
	</tr>
	<?php foreach ($categories as $cate) { ?>
		<tr>
			<td><?= $cate['brand'] ?></td>
			<td><?= $cate['name'] ?></td>
		</tr>
	<?php } ?>
</table>

<?php
	$css = "
	<style>
		table, th, td {
		  border: 1px solid black;
		}
	</style>
	";
?>