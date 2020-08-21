<ul>
	<?php foreach ($products as $product) { ?>
		<li><?= $product['name'] ?></li>
	<?php } ?>
</ul>

<?php
$js = "<script src='abc.css'></script>";
$css = "
	<style>
		table, th, td {
		  border: 1px solid black;
		}
	</style>
	<link rel='stylesheet' href='abc.css'>";