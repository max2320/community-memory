<?php
$frameworkPath = dirname(__FILE__);
$appPath = $frameworkPath . "/../";
require $frameworkPath . '/autoloader.php';

session_start();

Router::act($_SESSION, new UrlParser);


?>