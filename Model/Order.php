<?php 

/**
 * 
 */

class Order extends Model
{
	private function SetData($data){
		$keys = '';
		$values = [];
		$Count = 0;
		foreach ($data as $key => $value) {

			$keys .= $key.'=?'.($Count != count($data)-1? ',' : '' );
			$Count++;
		}
		foreach ($data as $key => $value) {
			$values[] = $value;
		}
		return ['Keys'=>$keys,'Values'=>$values];
	}

	public function Get($Id=false){
		if ($Id) {
			$result = $this->Query("SELECT * FROM orders WHERE Id={$Id} limit 1");
		}else {
			$result = $this->Query("SELECT * FROM orders");
		}
		return $result->fetch(PDO::FETCH_ASSOC);
	}	

	public function Find($param=false){
		if ($param) {
			$data = $this->SetData($param);
			$result = $this->Query("SELECT * FROM orders WHERE {$data['Keys']}",  $data['Values']);
		}else {
			$result = $this->Query("SELECT * FROM orders");
		}
		return $result->fetchall(PDO::FETCH_ASSOC);
	}

	public function Update($Id, $data){
		$data = $this->SetData($data);

		return $this->Query("UPDATE orders SET {$data['Keys']} WHERE Id={$Id}", $data['Values']);
	}	

	public function Insert($data){
		$data = $this->SetData($data);
		$this->Query("INSERT INTO orders SET {$data['Keys']} ", $data['Values']);
		return $this->Con->lastInsertId();
	}
	public function Delete($Id){
		return $this->Query("DELETE FROM orders WHERE Id={$Id} ");
	}
}

?>