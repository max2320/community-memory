<header>
	<div class="header">
		<div class="content-center">
			<div class="logo">
				<img class="logo" src="../../img/logo.png" />
			</div>	
			<?php if(isset($_SESSION['auth']) && $_SESSION['auth'] == "ON" ){ ?>
				<div class="opcoes">
					<ul class="no-list inline">
						<li>
							<a class="link_laranja"href="/profile/show">Profile</a>
						</li>
						<li>
							<a class="link_laranja" href="/auth/logout">Sair</a>
						</li>
					</ul>
				</div>	

			<?php } ?>
		</div>
	</div>
</header>	
