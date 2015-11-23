<html>
	<head>
		<?= Render::view('layouts/head'); ?>
	</head>
	<body>
		<?= Render::view('layouts/header'); ?>
		<div class="content-center">
			<?= $content; ?>
		</div>
		<br clear="both">
		<?= Render::view('layouts/footer'); ?>
	</body>
</html>
