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
				.content-register{
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
			<div class="content-register">
				<form method="post">
					<div>
						<label>Nome:</label>
						<input type="text" name="name" class="form-control">
					</div>
					<br clear="both"/>
					<div>
						<label>Email:</label>
						<input type="text" name="email" class="form-control">
					</div>
					<br clear="both"/>
					<div>
						<label>Senha:</label>
						<input type="text" name="password" class="form-control">
					</div>
					<br clear="both"/>
					<div>
						<label>Confirme a Senha:</label>
						<input type="text" name="name" class="form-control">
					</div>
					<br clear="both"/>
					<div>
						<label>Data de Nascimento:</label>
						<select name="day">
						  <option value="day" selected>Data</option> 
						</select>
						<select name="month">
						  <option value="month" selected>Mes</option> 
						</select>
						<select name="year">
						  <option value="year" selected>Ano</option> 
						</select>
					</div>
					<br clear="both"/>
					<div>
						<label>Sexo:</label>
						<input type="radio" name="sex" value="male">Masculino &nbsp;
						<input type="radio" name="sex" value="female">Feminino
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