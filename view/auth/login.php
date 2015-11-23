<form method="post">
	<?php if(!empty($error)){ ?>
    <div class="alert alert-warning">
      <?php echo $error; ?>
    </div>
  <?php } ?>
	<div>
		<br /><br />
		<label>E-mail:</label>
		<input type="text" name="user[email]" class="form-control" required='true'>
	</div>
	
	<br clear="both"/>
	
	<div>
		<label>Senha:</label>
		<input type="password" name="user[password]" class="form-control" required='true'>
	</div>
	
	<br clear="both"/>
	
	<br />
	<div>
		<button class="btn btn-info active">Entrar</button>
		&nbsp;
		<a class="btn btn-warning active" href="/auth/register">
			Resgistrar-se
		</a>
	</div>
	
	<br clear="both"/>

	<div>
		<a href="/auth/recovery_password">Esqueci minha senha</a>
	</div>
</form>
