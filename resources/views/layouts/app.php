<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?= $title ?></title>

	<?= push($css) ?>
</head>
<body>
	<?php include 'blocks/header.php'; ?>
	<?php include 'blocks/aside.php'; ?>
	<?= $page ?>
	<?php include 'blocks/footer.php'; ?>
</body>

<?= push($js) ?>
</html>