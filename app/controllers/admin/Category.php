<?php

class Category extends Controller {
  public function __construct()
	{	
		if (!isset($_SESSION['admin_login']) AND !isset($_SESSION['admin']['username'])) {
			header('Location: '. BASEURL . '/login');
			exit;
		}
	} 

  public function index() 
  {
    $data['judul'] = 'Category | Dermanifest Admin';
    $data['category_list'] = $this->model('Category_model')->getAllCategory();
    
    $this->view('layout/admin/header', $data);
    $this->view('layout/admin/sidebar');
    $this->viewAdmin('category/index', $data);
    $this->view('layout/admin/footer');
  }

  public function add() 
  {
    $data['judul'] = 'Add Category | Dermanifest Admin';

    $this->view('layout/admin/header', $data);
    $this->view('layout/admin/sidebar');
    $this->viewAdmin('category/add', $data);
    $this->view('layout/admin/footer');
  }

  public function update($id) 
  {
    $data['judul'] = 'Update Category | Dermanifest Admin';
    $data['category'] = $this->model('Category_model')->getCategoryById($id);

    $this->view('layout/admin/header', $data);
    $this->view('layout/admin/sidebar');
    $this->viewAdmin('category/update', $data);
    $this->view('layout/admin/footer');
  }

  public function insert() 
  {
    if ($this->model('Category_model')->insertDataCategory($_POST) > 0) {
      Flasher::setFlash('Success.', 'Category: <strong>' . $_POST['name'] . '</strong> has been added.', 'success');
      header('Location:' . ADMINURL .'/category');
    } else {
      Flasher::setFlash('Error.', 'Failed to add Category.', 'danger');
      header('Location: ' . ADMINURL . '/category/add');
      exit;
    }
  }

}
?>