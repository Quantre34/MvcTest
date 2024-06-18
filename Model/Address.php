<?php 

/**
 * 
 */

class Address extends Model
{


	public function Get($Id=false){
		if ($Id) {
			$result = $this->Query("SELECT * FROM address WHERE Id={$Id} limit 1");
		}else {
			$result = $this->Query("SELECT * FROM address");
		}
		return $result->fetch(PDO::FETCH_ASSOC);
	}	

	public function Find($param=false){
		if ($param) {
			$data = $this->SetData($param);
			$result = $this->Query("SELECT * FROM address WHERE {$data['Keys']} limit 1",  $data['Values']);
		}else {
			$result = $this->Query("SELECT * FROM address");
		}
		return $result->fetch(PDO::FETCH_ASSOC);
	}

	public function Update($Id, $data){
		$data = $this->SetData($data);

		return $this->Query("UPDATE address SET {$data['Keys']} WHERE Id={$Id}", $data['Values']);
	}	

	public function Insert($data){
		$data = $this->SetData($data);
		$this->Query("INSERT INTO address SET {$data['Keys']} ", $data['Values']);
		return $this->Con->lastInsertId();
	}
	public function Delete($Id){
		return $this->Query("DELETE FROM address WHERE Id={$Id} ");
	}
}

?>