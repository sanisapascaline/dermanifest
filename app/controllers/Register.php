<?php 

class Register extends Controller {
  private $db;

  public function __construct() {
    $this->db = new Database;
		if (isset($_SESSION['admin_login']) OR isset($_SESSION['customer_login'])) {
			header('location: '. BASEURL);
			exit;
		}
  }

  public function index() {
    $data['judul'] = 'Register | Dermanifest';
    
    $this->view('layout/header', $data);
    $this->view('register/index', $data);
    $this->view('layout/footer');
  }

  public function insert() {
    if($_POST['password'] == $_POST['password_repeat']) {	
			$customer_row = $this->model('Register_model')->checkUsername($_POST['username']);
			$admin_row = $this->model('Register_model')->checkAdminUsername($_POST['username']);

			if ($customer_row['username'] == $_POST['username'] || $admin_row['username'] == $_POST['username']) {
				Flasher::setFlash('Failed.','Username has already been used.','danger');
				header('location: '. BASEURL . '/register'); 
				exit;	
			} elseif ($customer_row['email'] == $_POST['email'] || $admin_row['email'] == $_POST['email']) {
        Flasher::setFlash('Failed.','Email has already been used.','danger');
				header('location: '. BASEURL . '/register'); 
				exit;	
      } else {
				if ($this->model('Register_model')->doRegister($_POST) > 0) {
					$customer_row = $this->model('Login_model')->doLogin($_POST);
					$_SESSION['customer'] = $customer_row;
					$_SESSION['customer_login'] = "customer_is_logged_in";
					header('location: '. BASEURL . '');
					exit;			
				} else {
					Flasher::setFlash('Error.','Unable to regist your account.','danger');
					header('location: '. BASEURL . '/register');
					exit;	
				}
			}
		} else {  
			Flasher::setFlash('Failed.','The entered passwords are not the same.','danger');
			header('location: '. BASEURL . '/register');
			exit;	
		}
  }
}
?>