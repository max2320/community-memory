<?php
$frameworkPath = dirname(__FILE__);
$appPath = $frameworkPath . "/../";
$configFile = $appPath . "/configs/configs.php";
require $frameworkPath . '/autoloader.php';

session_start();
Configs::load($configFile);
Router::act($_SESSION, new UrlParser);


?>