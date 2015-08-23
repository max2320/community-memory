<html>
	<head>
		<title> TCC </title>

		<!-- Latest compiled and minified CSS -->
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

		<!-- Optional theme -->
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">

		<!-- Latest compiled and minified JavaScript -->
			<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

			<style>
				.content-center{
					width: 600px;
					margin: 0 auto;
					text-align: center;
				}
				.content-post-form{
					width: 300px;
					margin: 0 auto;
					text-align: center;	
				}
				label{
					display: block;
				}
			</style>
	</head>

	<body>

		<div class="content-center">
			Logo
			<div class="content-post-form">
				<form method="post">
					<div>
						<textarea rows="4" cols="50">Post do Dia</textarea>
					</div>
					<br clear="both"/>
					<div>
						<label>Selecione uma imagem:</label>
						<input name="file" type="file" />
					</div>
					<br clear="both"/>
					<div>
						<button>Enviar</button>
					</div>
				</form>
			</div>
		</div>
	
	</body>
</html>