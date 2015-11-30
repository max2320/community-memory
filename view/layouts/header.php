<header>
	<div class="header">
		<div class="content-center">
			<div class="row">
				<div class="col-sm-5">
					<img class="logo" src="../../img/logo_final.png" />
				</div>	
				<?php if(isset($_SESSION['auth']) && $_SESSION['auth'] == "ON" ){ ?>
					<div class="col-sm-1 logout-btn">
					</div>
					<div class="col-sm-1 logout-btn">
					</div>
					<div class="col-sm-1 logout-btn">
					</div>
					<div class="col-sm-1 logout-btn">
					</div>
					<div class="col-sm-1 logout-btn">
					</div>
					<div class="col-sm-1 logout-btn">
						<a class="link_laranja"href="/profile/show"><i class="fa fa-user"></i></a>
					</div>
					<div class="col-sm-1 logout-btn">
						<a class="link_laranja" href="/auth/logout"><i class="fa fa-power-off"></i></a>
					</div>

				<?php } ?>
			</div>
		</div>
	</div>
</header>	
