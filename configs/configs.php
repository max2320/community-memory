<?php
return [
	# DATABASE
		'db_dsn' => "mysql:dbname=community_memory;host=localhost;port=3306",
		'db_user' => "root",
		// 'db_password' => "", Larissa
		'db_password' => "max2320hk",
	# END DATABASE
	# ROUTES
		'route_root' => 'auth/login',
		'allow_framework' => true,
	# END ROUTES	
	# SMTP SETTINGS
		'smtp_host' => 'smtp.domain.com',
		'smtp_username' => 'teste@maxfs.com',
		'smtp_password' => 'T35t3M4x',
		'smtp_port' => 465,
		'smtp_security' => 'ssl', // tsl or ssl
		'smtp_from_name' => 'Community Memory',
		'smtp_from_email' => 'no-reply@maxfs.com',
	# END SMTP SETTINGS
	# UPLOADS PATH
		'UPLOADS_PATH' => ""
	# END UPLOADS PATH
];

?>