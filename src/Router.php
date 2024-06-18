<?php 



/**
 * 
 */



class Route 
{
	public static $request;
	function __construct(){
		
	}	

	public static function get($url, $MethodPair){
		self::$request = $_REQUEST;
		if ($_SERVER['REQUEST_METHOD'] == 'GET') {
			[$class, $method] = $MethodPair;
			if ($url == $_GET['page']) {
				$result = (new $class)->$method();

				if (!empty($result[1])) {
					extract($result[1]);
				}
			require './Header.php';
			require './'.$result[0];
			require './Footer.php';
			}
			return false;
		}else {
			echo 'Invalid Request Method';
			return false;
		}
	}
	///
	public static function post($url, $MethodPair){
		self::$request = $_REQUEST;
		if ($url == $_GET['page']) {
			if ($_SERVER['REQUEST_METHOD'] == 'POST') {
				[$class, $method] = $MethodPair;
					$result = (new $class)->$method(self::$request);
					return $result;
				return false;
			}else {
				header('Content-Type: application/json');
				echo 'Invalid Request Method';
				return false;
			}
		}
	}
	
}


?>