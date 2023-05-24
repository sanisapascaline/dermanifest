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

  public function add() 
  {
    $data['judul'] = 'Add Product | Dermanifest Admin';
    $data['category_list'] = $this->model('Category_model')->getAllCategory();

    $this->view('layout/admin/header', $data);
    $this->view('layout/admin/sidebar');
    $this->viewAdmin('product/add', $data);
    $this->view('layout/admin/footer');
  }

  public function detail($id)
  {
    $data['judul'] = 'Detail Product | Dermanifest Admin';
    $data['product'] = $this->model('Product_model')->getProductById($id);
    $data['product_picture_list'] = $this->model('Picture_model')->getAllPictureByIdProduct($id);

    $this->view('layout/admin/header', $data);
    $this->view('layout/admin/sidebar');
    $this->viewAdmin('product/detail', $data);
    $this->view('layout/admin/footer');
  }

  public function update($id) 
  {
    $data['judul'] = 'Detail Product | Dermanifest Admin';

    $this->view('layout/admin/header', $data);
    $this->view('layout/admin/sidebar');
    $this->viewAdmin('product/update', $data);
    $this->view('layout/admin/footer');
  }

  public function insert()
  {
    echo var_dump($_POST);
    echo var_dump($_FILES);
    $picture_names = $_FILES['pictures']['name'];
    $picture_tmp_names = $_FILES['pictures']['tmp_name'];
    
    if ($this->model('Product_model')->insertDataProduct($_POST, $picture_names) > 0) {
      $id_last_product = $this->db->lastInsertId();
      move_uploaded_file($picture_tmp_names[0], "../public/assets/img/products/" . $picture_names[0]);

      foreach ($picture_names as $key => $name) {
        $tmp_name = $picture_tmp_names[$key];
        echo var_dump($name);

        move_uploaded_file($tmp_name, "../public/assets/img/products/" . $name);

        $this->model('Picture_model')->insertDataPictures($name, $id_last_product);
      }

      Flasher::setFlash('Success.', 'Product: <strong>' . $_POST['name'] . '</strong> has been added.', 'success');
      header('Location:' . ADMINURL .'/product');
    } else {
      Flasher::setFlash('Error.', 'Failed to add Product.', 'danger');
      header('Location: ' . ADMINURL . '/product/add');
      exit;
    }
  }
}
?>