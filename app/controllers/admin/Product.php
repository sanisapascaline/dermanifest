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
    $data['product_list'] = $this->model('Product_model')->getAllProduct();
    $data['category_list'] = $this->model('Category_model')->getAllCategory();
    $product_category_names = [];

    foreach ($data['category_list'] as $category) {
      $product_category_names[$category['id_category']] = $category['name'];
    }
  
    $data['category_names'] = $product_category_names;
    $this->view('layout/admin/header', $data);
    $this->view('layout/admin/sidebar');
    $this->viewAdmin('product/index', $data);
    $this->view('layout/admin/footer');
  }
}
?>