<?php

class Date{
  public static function formatToStore($str, $time = false){
    $date_arr = explode(" ", $str);
    $date = implode("-", array_reverse(explode('/', $date_arr[0])));

    $time = isset($date_arr[1]) ? $date_arr[1] : "00:00:00";
    if (!$time) {
        //data
        $return = $date;
    } else {
        // data e hora
        $return = $date . " " . $time;
    }
    return $return;
  }
  
  public static function formatToShow($date, $time = false) {
    if (!$time) {
        //data
        $return = date('d/m/Y', strtotime($date));
    } else {
        // data e hora
        $return = date('d/m/Y H:i', strtotime($date));
    }
    return $return;
  }
}
?>