<?php 
ob_start();
session_start();

require 'Model/Model.php';
require 'Controller/Controller.php';
require 'Controller/AjaxController.php';
require 'Controller/UserController.php';


$sayfa = $_GET['page']??'';
function Router($page, $Request){
	if ($page=='ajax') {
		return (new AjaxController)->Init($Request);
	}else {
		switch ($page) {
			case 'register':
				$result = (new UserController)->Register($Request);
				break;
			case 'order':
				$result = (new UserController)->Order($Request);
				break;
			case 'list':
				$result = (new UserController)->List($Request);
				break;
			default:
				$result = (new UserController)->Home($Request);
				break;
		}
		if (!empty($result[1])) {
			extract($result[1]);
		}
		require 'Header.php';
		require $result[0];
		require 'Footer.php';
	}
}
echo Router($sayfa, $_REQUEST);
?>