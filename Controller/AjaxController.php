<?php 


/**
 * 
 * 
 */
class AjaxController extends Controller
{

	function __construct(){
		$this->UserModel = new User();
		$this->OrderModel = new Order();
		$this->AddressModel = new Address();
		if (!empty($_SESSION['User'])) {
			$this->User = $_SESSION['User'];
		}
	}

	private function Get($param){

		$this->request = $_REQUEST;
		if (!empty($this->request[$param])) {
			return $this->request[$param];
		}else {
			return null;
		}
	}

	public function Init($request){
		$this->action = $request['action'];

		if ($this->action == 'Register') {
			$data = [
				'Name'=>htmlspecialchars($this->Get('Name')),
				'Mail'=>htmlspecialchars($this->Get('Mail')),
				'Password'=>htmlspecialchars($this->Get('Password')),
				'Age'=>intval($this->Get('Age')),
				'Job'=>htmlspecialchars($this->Get('Job'))
			];
			$empty = $this->isAnyEmpty($data,['Age']);
			if (!$empty) {
				$Id = $this->UserModel->Insert($data);
				$this->AddressModel->Insert([
					'UserId'=>$Id,
					'Content'=>htmlspecialchars($this->Get('Address'))
				]);
				$_SESSION['User'] = $this->UserModel->Get($Id);
				$result = ['outcome'=> true,'User'=>$_SESSION['User'], 'route'=>'/'];

			}else {
				$result = ['outcome'=>false,'ErrorMessage'=>'Lütfen tüm alanları doldurum','tag'=>$empty];
			}
			return json_encode($result);
		}
		///
		if ($this->action == 'Order'){
			$data = [
				'UserId'=>htmlspecialchars($this->Get('UserId') ?? $this->User['Id'] ),
				'Product'=>htmlspecialchars($this->Get('Product')),
				'Cost'=>intval($this->Get('Cost')),
				'Note'=>htmlspecialchars($this->Get('Note')),
				'Status'=>'1', /// consider paid
			];
			$empty = $this->isAnyEmpty($data);
			if (!$empty) {
				$this->OrderModel->Insert($data);
				$result = ['outcome'=>true,'Message'=>'Kiralama işlemi başarılı, Recep özmen size dönüş yapacak','route'=>'/list'];
			}else {
				$result = ['outcome'=>false,'ErrorMessage'=>'Lütfen tüm alanları doldurum','tag'=>$empty];
			}
			return json_encode($result);
		}
		if ($this->action=='GetUsers') {
			$data = [
				'Name'=>htmlspecialchars($this->Get('param'))
			];
			if (!$this->isAnyEmpty($data)) {
				$result = $this->UserModel->findALike($data['Name']);
			}else {
				$result = false;
			}
			return json_encode($result);
		}
		if ($this->action == 'Login') {
			$data = [
				'Mail'=>htmlspecialchars($this->Get('Mail')),
				'Password'=>htmlspecialchars($this->Get('Password')),
			];
			$empty = $this->isAnyEmpty($data);
			if (!$empty) {
				$User = $this->UserModel->find(['Mail'=>$data['Mail'],'Password'=>$data['Password']]);
				if (!empty($User)) {
					$_SESSION['User'] = $User;
					$result = ['outcome'=> true,'route'=>'/'];
				}else {
					$result = ['outcome'=>false,'ErrorMessage'=>'Kullanıcı bilgileri hatalı'];
				}				
			}else {
				$result = ['outcome'=>false,'ErrorMessage'=>'Lütfen tüm alanları doldurum','tag'=>$empty];
			}
			return json_encode($result);
		}
		//
		if ($this->action == 'UpdateUser') {
			$data = [
				'Id'=>htmlspecialchars($this->Get('Id')),
				'Name'=>htmlspecialchars($this->Get('Name')),
				'Mail'=>htmlspecialchars($this->Get('Mail')),
				'Job'=>htmlspecialchars($this->Get('Job'))
			];
			$empty = $this->isAnyEmpty($data);
			if (!$empty) {
				$action = $this->UserModel->Update($data['Id'],['Mail'=>$data['Mail'],'Name'=>$data['Name'],'Name'=>$data['Name'],'Job'=>$data['Job']]);
				if (!empty($action)) {
					$result = ['outcome'=> true,'route'=>'/list'];
				}else {
					$result = ['outcome'=>false,'ErrorMessage'=>'Kullanıcı güncellenemedi'];
				}				
			}else {
				$result = ['outcome'=>false,'ErrorMessage'=>'Lütfen tüm alanları doldurum','tag'=>$empty];
			}
			return json_encode($result);
		}


	}
}


?>