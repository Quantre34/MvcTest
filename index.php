<?php 
ob_start();
session_start();

require 'Model/Model.php';
require 'Controller/Controller.php';
require 'Controller/AjaxController.php';
require 'Controller/UserController.php';
require 'src/Routers/Route.php';
require 'src/Routers/Redirect.php';

$sayfa = $_GET['page']??'';


echo Route::post('ajax', ['AjaxController','Init']);


Route::get('', ['UserController','Home']);
Route::get('register', ['UserController','Register']);
Route::get('order', ['UserController','Order']);
Route::get('list', ['UserController','List']);
Route::get('login', ['UserController','Login']);
Route::get('users/{Id}', ['UserController','UserDetail']);


?>