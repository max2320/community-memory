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
				.content-login{
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
			<div class="content-login">
				<form method="post">
					<div>
						<label>Usuario:</label>
						<input type="text" name="user" class="form-control">
					</div>
					<br clear="both"/>
					<div>
						<label>Senha:</label>
						<input type="password" name="password" class="form-control">
					</div>
					<br clear="both"/>
					<div>
						<button>Enviar</button>
					</div>
					<a>Esqueci minha senha!</a> &nbsp;
				</form>
			</div>
		</div>
	
	</body>
</html>