<html>
	<head>
		<?= Render::view('layouts/head'); ?>
	</head>
	<body>
		<?= Render::view('layouts/header'); ?>
		<div class="content-center">
			<?= $content; ?>
		</div>
		<?= Render::view('layouts/footer'); ?>
	</body>
</html>