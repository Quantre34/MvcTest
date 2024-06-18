<?php 


/**
 * 
 */
class Redirect extends Route
{
	

	public static function to($url,$params = []){
		if (!empty($parameters)) {
			$data = http_build_query($param);
			$url .= '?'.$url; 
		}
		header('location: '.$url);
		exit;
	}

	public static function back($param=[]){
		$url = $_SERVER['HTTP_REFERER']??'/';
		if (!empty($parameters)) {
			$data = http_build_query($param);
			$url .= '?'.$url; 
		}

		header('location: '.$url);
		exit;
	} 
}



?>