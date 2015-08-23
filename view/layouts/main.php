<html>
	<head>
		<?= Render::view('layouts/head'); ?>
	</head>
	<body>
		<div class="content-center">
			<?= Render::view('layouts/header'); ?>
				<?= $content; ?>
			<?= Render::view('layouts/footer'); ?>
		</div>
	</body>
</html>