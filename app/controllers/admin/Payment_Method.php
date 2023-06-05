<?php

class Payment_Method extends Controller {
  public function __construct()
	{	
		if (!isset($_SESSION['admin_login']) AND !isset($_SESSION['admin']['username'])) {
			header('Location: '. BASEURL . '/login');
			exit;
		}
	} 

  public function index() 
  {
    $data['judul'] = 'Payment Methods | Dermanifest Admin';
    
    $this->view('layout/admin/header', $data);
    $this->view('layout/admin/sidebar');
    $this->viewAdmin('payment_method/index', $data);
    $this->view('layout/admin/footer');
  }
  
  public function add() 
  {
    $data['judul'] = 'Add Payment Method | Dermanifest Admin';
    
    $this->view('layout/admin/header', $data);
    $this->view('layout/admin/sidebar');
    $this->viewAdmin('payment_method/add', $data);
    $this->view('layout/admin/footer');
  }
}
?>