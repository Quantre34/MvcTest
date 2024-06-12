<?php 

/**
 * 
 */

class User extends Model
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
			$result = $this->Query("SELECT * FROM users WHERE Id={$Id} limit 1");
		}else {
			$result = $this->Query("SELECT * FROM users");
		}
		return $result->fetch(PDO::FETCH_ASSOC);
	}	

	public function GetAll($Id=false){
		if ($Id) {
			$data = $this->SetData($param);
			$result = $this->Query("SELECT * FROM users WHERE {$data['Keys']}",  $data['Values']);
		}else {
			$result = $this->Query("SELECT * FROM users");
		}
		return $result->fetchall(PDO::FETCH_ASSOC);
	}	

	public function Find($param=false){
		if ($param) {
			$data = $this->SetData($param);
			$result = $this->Query("SELECT * FROM users WHERE {$data['Keys']} limit 1",  $data['Values']);
		}else {
			$result = $this->Query("SELECT * FROM users");
		}
		return $result->fetch(PDO::FETCH_ASSOC);
	}

	public function FindA($param=false){
		if ($param) {
			$result = $this->Exec("SELECT * FROM users WHERE Name LIKE '%{$param}%' ");
		}else {
			$result = $this->Exec("SELECT Id,Name FROM users");
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