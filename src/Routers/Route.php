<?php 



/**
 * 
 */



class Route 
{
	public static $request;

	public static function get($url, $MethodPair){

		$url = explode('/', $url);
		$params = [];
		foreach($url as $key => $param){
			if ($key!=0) {
				$params[] =  isset($_GET['param'.$key])? $_GET['param'.$key] : NULL;
			}
		}
		self::$request = $_REQUEST;
		if ($url[0] == (isset($_GET['page']) ? $_GET['page'] : '')) {
			if ($_SERVER['REQUEST_METHOD'] == 'GET') {
				[$class, $method] = $MethodPair;
				if (method_exists($class, $method)) {
					$result = call_user_func_array([new $class, $method], $params);
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
	}
	///
	public static function post($url, $MethodPair){
		self::$request = $_REQUEST;
		if ($url == (isset($_GET['page']) ? $_GET['page'] : '')) {
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