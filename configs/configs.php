<?php
return [
	# DATABASE
		'db_dsn' => empty(getenv("DB_DSN")) ? "mysql:dbname=kk;host=localhost;port=3306" : getenv("DB_DSN"),
		'db_user' => empty(getenv("DB_USER")) ? "root" : getenv("DB_USER"),
		'db_password' => empty(getenv("DB_PASSWORD")) ? "" : getenv("DB_PASSWORD"),
	# END DATABASE
	# ROUTESn
		'route_root' => 'auth/login',
		'allow_framework' => true,
	# END ROUTES	
	# DOMAIN
		'domain_name' => empty(getenv("DOMAIN_NAME")) ? 'http://localhost:3000' : getenv("DOMAIN_NAME"),
	# END DOMAIN
	# SMTP SETTINGS // Conecta ao servidor, e envia o email para continuar preencher o perfil.
		'smtp_host' => empty(getenv("SMTP_HOST")) ? 'smtp.domain.com' : getenv("SMTP_HOST"),
		'smtp_username' => empty(getenv("SMTP_USERNAME")) ? 'teste@maxfs.com' : getenv("SMTP_USERNAME"),
		'smtp_password' => empty(getenv("SMTP_PASSWORD")) ? 'Larissa1234' : getenv("SMTP_PASSWORD"),
		'smtp_port' => empty(getenv("SMTP_PORT")) ? 465 : getenv("SMTP_PORT"),
		'smtp_security' => empty(getenv("SMTP_SECURITY")) ? 'ssl' : getenv("SMTP_SECURITY"), // tsl or ssl
		'smtp_from_name' => empty(getenv("SMTP_FROM_NAME")) ? 'Community Memory' : getenv("SMTP_FROM_NAME"),
		'smtp_from_email' => empty(getenv("SMTP_FROM_EMAIL")) ? 'no-reply@maxfs.com' : getenv("SMTP_FROM_EMAIL"),
	# END SMTP SETTINGS
	# UPLOADS PATH
		'UPLOADS_PATH' => "public/uploads"
	# END UPLOADS PATH
];

?>

