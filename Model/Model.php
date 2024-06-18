<?php 
require './env.php';

/**
 * 
 */
class Model extends Env {

	function __construct()
	{
		$this->Settings = $this->DbSettings();
		try {
			$this->Con = new PDO("mysql:host={$this->Settings['host']};dbname={$this->Settings['dbname']};charset=utf8", $this->Settings['dbusername'],$this->Settings['dbpassword']);
			$this->Con->exec("SET NAMES utf8");
			$this->Con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$this->Con->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
		} catch (Exception $e) {
			return $e->getMessage();
		}
	}

    public function SetData($data, $seperator=','){
        $keys = '';
        $values = [];
        $Count = 0;
        foreach ($data as $key => $value) {

            $keys .= $key.'=?'.($Count != count($data)-1? $seperator : '' );
            $Count++;
        }
        foreach ($data as $key => $value) {
            $values[] = $value;
        }
        return ['Keys'=>$keys,'Values'=>$values];
    }

	public function Query($sql="", $parameters=[]){

        try{
            return $this->ExecuteSql($sql, $parameters);
        }catch(Exception $e){
            throw new Exception($e->getMessage());
        }
    }

	public function Exec($sql=""){

        try{
            return $this->Con->query($sql);
        }catch(Exception $e){
            throw new Exception($e->getMessage());
        }
    }

    private function ExecuteSql($sql="", $parameters=[]){

        try{
            $data = $this->Con->prepare($sql);
            $data->execute($parameters);
            return $data;
        }catch(Exception $e){
            throw new Exception($e->getMessage());
        }
    }
}


?>