<?php

function __autoload($className)  {
  $fileName= str_replace('\\', DIRECTORY_SEPARATOR, $className) . '.php';
  $file = dirname(__FILE__) . "/" . $fileName;
  if (!file_exists($file)) {
    $file = dirname(__FILE__) . "/../model/" . $fileName;
    if (!file_exists($file)) {
      $file = dirname(__FILE__) . "/../controllers/" . $fileName;
      if (!file_exists($file)) {
        return false;
      }
    }
  }
  require $file;
}

?>
