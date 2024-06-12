<?php 


require './Model/User.php';
require './Model/Order.php';
require './Model/Address.php';
/**
 * 
 */
class Controller {


    static function isAnyEmpty($array, $exceptions=[]){

        if (empty($exceptions)){
            foreach ($array as $key => $value){
                if (is_array($value)){
                    $repeat = $this->isAnyEmpty($value, $exceptions);
                    if($repeat) {
                        return $repeat;
                    }
                }else {
                    if (empty($value) || $value == 'null'  || $value == null || $value == '' || $value == NULL) {
                        return $key;
                    }
                }
            }
            return false;
        }else {
            $i=0;
            foreach ($array as $key => $value){
                if (is_array($value)){
                    $repeat = $this->isAnyEmpty($value, $exceptions);
                    if($repeat) {
                        return $repeat;
                    }
                }else {
                    if (empty($value) || $value == 'null' || $value == null || $value == '' || $value == NULL) {
                        if (!in_array($key, $exceptions)){
                            return $key;
                        }
                    }
                }
                $i++;
            }
            return false;
        }
    }	
    public function View($url, $param=false){
        if ($param) {
            return [$url, $param];
        }else {
            return [$url];
        }
        
    }
}


?>