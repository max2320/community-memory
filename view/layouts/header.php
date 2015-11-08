<header>
	<div class="header">
		<div class="content-center">
			<div class="logo">
				<img src=""/>
			</div>	
			<?php if(isset($_SESSION['auth']) && $_SESSION['auth'] == "ON" ){ ?>
				<div class="opcoes">
					<a href="/auth/logout">Sair</a>
				</div>	
			<?php } ?>
		</div>
	</div>
</header>	