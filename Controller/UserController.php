<?php 

/**
 * 
 */
class UserController extends Controller
{
	
	function __construct()
	{	
		$this->Model = new Model();
		$this->UserModel = new User();
		$this->OrderModel = new Order();
		if (!empty($_SESSION['User'])) {
			$this->User = $_SESSION['User'];
		}
	}
	public function Home(){
		return $this->view('View/Home');
	}
	public function List(){
		$Users = $this->UserModel->findAll();
		foreach($Users as $key => $User){
			$User['Orders'] = $this->OrderModel->Find(['UserId'=>$User['Id']]);
			$User['Status'] = count($User['Orders']) >= 5 ? 'active' : 'inactive';
			$Users[$key] = $User;
		}  
		 // THİS WOULD BE MORE PROPER, dont need to much code this way

		$Users = $this->Model->Exec("SELECT 
				users.Id,
			    users.Name,
			    users.Mail,
			    users.create_at,
			    COUNT(orders.Id) AS number_of_purchases,
			    MAX(orders.create_at) AS last_purchase_date,
			    CASE 
			        WHEN COUNT(orders.Id) >= 5 THEN 'active' ELSE 'inactive'
			    END AS status
				FROM 
				    users
				LEFT  JOIN 
				    orders ON users.Id = orders.UserId
				GROUP BY 
				    users.Id
				ORDER BY 
			    number_of_purchases DESC;
		    ");
		$Users = $Users->fetchall();
		return $this->view('View/List',['Users'=>$Users]);
	}
	public function Register(){
		return $this->view('View/Register');
	}
	public function Order(){
		return $this->view('View/Order');
	}
	public function Login(){
		return $this->view('View/Login');
	}
	public function UserDetail($Id){
		$User = $this->UserModel->get($Id);
		return $this->view('View/User-Detail',['User'=>$User]);
	}
}

?>