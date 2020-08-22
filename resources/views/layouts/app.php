<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?= $title ?></title>

	@yield('css')
</head>
<body>
	<?php include 'blocks/header.php'; ?>
	<?php include 'blocks/aside.php'; ?>
	@yield('page')
	<?php include 'blocks/footer.php'; ?>
</body>


@yield('js')
</html>