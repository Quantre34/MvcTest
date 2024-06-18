<?php 

/**
 * 
 */

class User extends Model
{

	public function Get($Id=false){
		if ($Id) {
			$result = $this->Query("SELECT * FROM users WHERE Id={$Id} limit 1");
		}else {
			$result = $this->Query("SELECT * FROM users");
		}
		return $result->fetch(PDO::FETCH_ASSOC);
	}	

	public function find($param=false){
		if ($param) {
			$data = $this->SetData($param, ' and ');
			// return "SELECT * FROM users WHERE {$data['Keys']} limit 1";
			// return json_encode($data['Values']);

			$result = $this->Query("SELECT * FROM users WHERE {$data['Keys']}",  $data['Values']);
		}else {
			$result = $this->Query("SELECT * FROM users");
		}
		return $result->fetch(PDO::FETCH_ASSOC);
	}

	public function findALike($param=false){
		if ($param) {
			$result = $this->Exec("SELECT * FROM users WHERE Name LIKE '%{$param}%' ");
		}else {
			$result = $this->Exec("SELECT * FROM users");
		}
		return $result->fetchall(PDO::FETCH_ASSOC);
	}
	public function findAll($param=false){
		if ($param) {
			$result = $this->Exec("SELECT * FROM users WHERE Name LIKE '%{$param}%' ");
		}else {
			$result = $this->Exec("SELECT * FROM users");
		}
		return $result->fetchall(PDO::FETCH_ASSOC);
	}
	public function Update($Id, $data){
		$data = $this->SetData($data);

		return $this->Query("UPDATE users SET {$data['Keys']} WHERE Id={$Id}", $data['Values']);
	}	

	public function Insert($data){
		$data = $this->SetData($data);
		$this->Query("INSERT INTO users SET {$data['Keys']} ", $data['Values']);
		return $this->Con->lastInsertId();
	}
	public function Delete($Id){
		return $this->Query("DELETE FROM users WHERE Id={$Id} ");
	}
}

?>