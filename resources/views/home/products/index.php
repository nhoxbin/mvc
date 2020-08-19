<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Products</title>
</head>
<body>
	<ul>
		<?php foreach ($products as $product) { ?>
			<li><?= $product['name'] ?></li>
		<?php } ?>
	</ul>
</body>
</html>