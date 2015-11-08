<form method="post">
	<?php if(!empty($error)){ ?>
    <div class="alert alert-warning">
      <?php echo $error; ?>
    </div>
  <?php } ?>
	<div>
		<label>Usuario:</label>
		<input type="text" name="user[email]" class="form-control" required='true'>
	</div>
	
	<br clear="both"/>
	
	<div>
		<label>Senha:</label>
		<input type="password" name="user[password]" class="form-control" required='true'>
	</div>
	
	<br clear="both"/>
	
	<div>
		<button class="btn btn-primary">Enviar</button>
	</div>

	<div>
		<a href="/auth/recovery_password">Esqueci minha senha</a>
	</div>
</form>
<a class="btn btn-success" href="/auth/register">
	Resgistrar-se
</a>