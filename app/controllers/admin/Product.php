<?php

class Product extends Controller {
  private $db;

  public function __construct()
	{
    $this->db = new Database;
    
		if (!isset($_SESSION['admin_login']) AND !isset($_SESSION['admin']['username'])) {
			header('Location: '. BASEURL . '/login');
			exit;
		}
	} 

  public function index() 
  {
    $data['judul'] = 'Product | Dermanifest Admin';
    
    $this->view('layout/admin/header', $data);
    $this->view('layout/admin/sidebar');
    $this->viewAdmin('product/index', $data);
    $this->view('layout/admin/footer');
  }
}
?>