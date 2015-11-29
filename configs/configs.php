<?php
return [
	# DATABASE
		'db_dsn' => "mysql:dbname=community_memory;host=localhost;port=3306",
		'db_user' => "root",
		'db_password' => "max2320hk",
		//'db_password' => "",
	# END DATABASE
	# ROUTES
		'route_root' => 'auth/login',
		'allow_framework' => true,
	# END ROUTES	
	# DOMAIN
		'domain_name' => 'http://localhost:3000',
	# END DOMAIN
	# SMTP SETTINGS // Conecta ao servidor, e envia o email para continuar preencher o perfil.
		'smtp_host' => 'smtp.domain.com',
		'smtp_username' => 'teste@maxfs.com',
		'smtp_password' => 'Larissa1234',
		'smtp_port' => 465,
		'smtp_security' => 'ssl', // tsl or ssl
		'smtp_from_name' => 'Community Memory',
		'smtp_from_email' => 'no-reply@maxfs.com',
	# END SMTP SETTINGS
	# UPLOADS PATH
		'UPLOADS_PATH' => "public/uploads"
	# END UPLOADS PATH
];

?>
