<?php
class Configs{
	public static function load($file){
		$configs = require($file);
		foreach($configs as $config => $value){
			$GLOBALS[strtoupper($config)] = $value;
		}
	}
}