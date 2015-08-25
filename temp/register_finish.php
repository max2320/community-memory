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
				.content-register-finish{
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
			<div class="content-register-finish">
				<form method="post">
					<div>
						<label>Selecione uma imagem:</label>
						<input name="file" type="file" />
					</div>
					<br clear="both"/>
					<div>
						<label>CEP:</label>
						<input type="text" name="zipcode" class="form-control">
					</div>
					<br clear="both"/>
					<div>
						<label>Logradouro:</label>
						<input type="text" name="address" class="form-control">
					</div>
					<br clear="both"/>
					<div>
						<label>Numero:</label>
						<input type="text" name="number" class="form-control">
					</div>
					<br clear="both"/>
					<div>
						<label>Bairro:</label>
						<input type="text" name="district" class="form-control">
					</div>
					<br clear="both"/>
					<div>
						<label>Estado:</label>
						<input type="text" name="state" class="form-control">
					</div>
					<br clear="both"/>
					<div>
						<label>Pais:</label>
						<input type="text" name="country" class="form-control">
					</div>
					<br clear="both"/>
					<div>
						<label>Telefone:</label>
						<input type="text" name="phone" class="form-control">
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