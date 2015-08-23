<html>
	<head>
		<?= Render::view('layouts/head'); ?>
	</head>
	<body>
		<?= Render::view('layouts/header'); ?>
		<h1>programa</h1>
		<?= $content; ?>
		<?= Render::view('layouts/footer'); ?>
	</body>
</html>