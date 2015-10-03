<?php

class Redirect{
	public static function to($url){
		echo $url;
		header("Location: /{$url}");
	}
}
?>