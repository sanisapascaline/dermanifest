<?php 

class Login extends Controller {
  public function __construct()
	{	
		if(isset($_SESSION['customer_login'])) {
			header('location: '. BASEURL);
			exit;
		} else if (isset($_SESSION['admin_login'])) {
      header('location: '. ADMINURL);
			exit;
    }
	} 

  public function index()
  {
    $data['judul'] = 'Login | Dermanifest';

    $this->view('layout/header', $data);
    $this->view('login/index', $data);
    $this->view('layout/footer');
  }

  public function insert()
  {
    if ($this->model('Login_model')->doLogin($_POST) > 0) {
      session_destroy();
      session_start();
      $row = $this->model('Login_model')->doLogin($_POST);
      $_SESSION['customer'] = $row;
      $_SESSION['customer_login'] = "customer_is_logged_in";
      header('Location: ' . BASEURL);
    } else if ($this->model('Login_model')->doAdminLogin($_POST) > 0) {
      session_destroy();
      session_start();  
      $row = $this->model('Login_model')->doAdminLogin($_POST);
      $_SESSION['admin'] = $row;
      $_SESSION['admin_login'] = "admin_is_logged_in";
      header('Location: ' . BASEURL . '/admin');
    } else {
      Flasher::setFlash('Failed','Username/Email or Password are wrong.','danger');
			header('location: '. BASEURL . '/login');
			exit;
    }
  }
}
?>