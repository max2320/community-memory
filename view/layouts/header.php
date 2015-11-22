<header>
	<div class="header">
		<div class="content-center">
			<div class="logo">
				<img src="/../public/img/logo1.png" />
			</div>	
			<?php if(isset($_SESSION['auth']) && $_SESSION['auth'] == "ON" ){ ?>
				<div class="opcoes">
					<a class="link_laranja" href="/auth/perfil">Editar Perfil</a>
					&nbsp;
					&nbsp;
					<a class="link_laranja" href="/auth/logout">Sair</a>
				</div>	
			<?php } ?>
		</div>
	</div>
</header>	