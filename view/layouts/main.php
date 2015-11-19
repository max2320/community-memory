<html>
	<head>
		<?= Render::view('layouts/head'); ?>
	</head>
	<body>
		<?= Render::view('layouts/header'); ?>
		<div class="content-center">
			<br />
			<?= $content; ?>
		</div>
		<?= Render::view('layouts/footer'); ?>
	</body>
</html>