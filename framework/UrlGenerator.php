<?php
class UrlGenerator{
  public static function generate($path, $params = []){
    return self::getDomain() . $path . self::queryString($params);
  }

  public static function getDomain(){
    global $DOMAIN_NAME;
    return $DOMAIN_NAME;
  }

  public static function queryString($params){
    $query = http_build_query($params);
    
    if($query){
      return "/?" . $query;
    }

    return '';
  }
}
?>