<?php
include '../framework/init.php';



//$DB_DSN = "mysql:dbname=papaburger;host=localhost;port=3306";
//$DB_USER = "root";
//$DB_PASS = "max2320hk";

$GLOBALS['DB_DSN'] = "mysql:dbname=papaburger;host=localhost;port=3306";
$GLOBALS['DB_USER'] = "root";
$GLOBALS['DB_PASS'] = "";

// new Install(['Usuario']);
$user = new Usuario();
$user->create(['Larissa','lary','12345',1]);

?>
