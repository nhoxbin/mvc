<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?= $title ?></title>

	<link rel="stylesheet" href="">
	<?= $css ?>
</head>
<body>
	<?php include 'blocks/header.php'; ?>
	<?php include 'blocks/aside.php'; ?>
	<?php include $page; ?>
	<?php include 'blocks/footer.php'; ?>
</body>


<script src=""></script>
<?= $js ?>
</html>