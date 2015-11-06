<?php
$GLOBALS['frameworkPath'] = dirname(__FILE__);
$GLOBALS['appPath'] = $frameworkPath . "/../";
$GLOBALS['configFile'] = $appPath . "/configs/configs.php";

require $frameworkPath . '/autoloader.php';

session_start();
Configs::load($configFile);
Router::act($_SESSION, new UrlParser);

?>