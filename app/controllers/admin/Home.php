<?php

class Home extends Controller {
  public function __construct()
	{	
		if (!isset($_SESSION['admin_login']) AND !isset($_SESSION['admin']['username'])) {
			header('Location: '. BASEURL . '/login');
			exit;
		}
	} 

  public function index() 
  {
    $data['judul'] = 'Home | Dermanifest Admin';
    
    $this->view('layout/admin/header', $data);
    $this->view('layout/admin/sidebar');
    $this->viewAdmin('home/index', $data);
    $this->view('layout/admin/footer');
  }
}
?>