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
    $data['judul'] = 'Update Product | Dermanifest Admin';
    $data['product'] = $this->model('Product_model')->getProductById($id);
    $data['category_list'] = $this->model('Category_model')->getAllCategory();

    $this->view('layout/admin/header', $data);
    $this->view('layout/admin/sidebar');
    $this->viewAdmin('product/update', $data);
    $this->view('layout/admin/footer');
  }
  
  public function pictures($id) 
  {
    $main_picture = $this->model('Product_model')->getProductById($id)['main_picture'];
    $product_picture_list = $this->model('Picture_model')->getAllPictureByIdProduct($id);
    foreach ($product_picture_list as $key => $picture) {
      if ($picture['picture_name'] == $main_picture) {
       unset($product_picture_list[$key]);
      }
    }

    $data['judul'] = 'Manage Product Pictures | Dermanifest Admin';
    $data['product'] = $this->model('Product_model')->getProductById($id);
    $data['product_picture_list'] = $product_picture_list;

    $this->view('layout/admin/header', $data);
    $this->view('layout/admin/sidebar');
    $this->viewAdmin('product/pictures', $data);
    $this->view('layout/admin/footer');
  }

  public function insert()
  {         
    $picture_names =  $_FILES['pictures']['name'];
    $picture_tmp_names = $_FILES['pictures']['tmp_name'];
    $main_picture = $this->addTimeCreated($picture_names[0]);
    
    if ($this->model('Product_model')->insertDataProduct($_POST, $main_picture) > 0) {
      $id_last_product = $this->db->lastInsertId();
      move_uploaded_file($picture_tmp_names[0], PRODUCT_PICS . '/' . $main_picture);

      foreach ($picture_names as $key => $name) {
        $tmp_name = $picture_tmp_names[$key];
        $additional_pictures = $this->addTimeCreated($name);

        move_uploaded_file($tmp_name, PRODUCT_PICS . '/' . $additional_pictures);
        $this->model('Picture_model')->insertDataPictures($additional_pictures, $id_last_product);
      }

      Flasher::setFlash('Success.', 'Product: <strong>' . $_POST['name'] . '</strong> has been added.', 'success');
      header('Location:' . ADMINURL .'/product');
    } else {
      Flasher::setFlash('Error.', 'Failed to add Product.', 'danger');
      header('Location: ' . ADMINURL . '/product/add');
      exit;
    }
  }

  public function updateProduct()
  {
    if (!empty($_FILES['main_picture']['name'])) {
      $picture_name =  $_FILES['main_picture']['name'];
      $picture_tmp_name = $_FILES['main_picture']['tmp_name'];
      $new_main_picture = $this->addTimeCreated($picture_name);

      $row = $this->model('Product_model')->getProductById($_POST['id_product']);
      $id_new_main_picture = $this->model('Picture_model')->getPictureByName($row['main_picture']);

      if ($this->model('Product_model')->updateDataProduct($_POST, $new_main_picture) > 0) {
        unlink(PRODUCT_PICS . '/' . $row['main_picture']);
        move_uploaded_file($picture_tmp_name, PRODUCT_PICS . '/' . $new_main_picture);
        $this->model('Picture_model')->updateMainPicture($new_main_picture, $id_new_main_picture['id_picture']);

        Flasher::setFlash('Success.', 'Product with Id: <strong>' . $_POST['id_product'] . '</strong> has been updated.', 'success');      
        header('Location:' . ADMINURL .'/product');
        exit;
      }
      else {
        Flasher::setFlash('Error.', 'Unable to update Product.', 'danger');
        header('Location: ' . ADMINURL . '/product/update/' . $_POST['id_product']);
        exit;
      }
    } else {
      $row = $this->model('Product_model')->getProductById($_POST['id_product']);
      if ($this->model('Product_model')->updateDataProduct($_POST, $row['main_picture']) > 0) {
        Flasher::setFlash('Success.', 'Product with Id: <strong>' . $_POST['id_product'] . '</strong> has been updated.', 'success');      
        header('Location:' . ADMINURL .'/product');
        exit;
      } else {
        Flasher::setFlash('Error.', 'Unable to update Product.', 'danger');
        header('Location: ' . ADMINURL . '/product/update/' . $_POST['id_product']);
        exit;
      }
    }
  }

  public function addTimeCreated($file_name)
  {
    date_default_timezone_set("Asia/Jakarta");
    $date_created = date('d-m-Y_H-i-s');
    $final_name = $date_created . "_" . $file_name;
    return $final_name;
  }

  public function delete($id)
  {
    $row = $this->model('Product_model')->getProductById($id);
    $picture_list = $this->model('Picture_model')->getAllPictureByIdProduct($id);

    if (($this->model('Product_model')->deleteDataProduct($id) > 0) && ($this->model('Picture_model')->deletetPictureByIdProduct($id) > 0)) {    
      foreach ($picture_list as $pic) {
        $pic_file = PRODUCT_PICS. '/' . $pic['picture_name'];
        file_exists($pic_file) ? unlink($pic_file) : '' ;
      }

      Flasher::setFlash('Success.', 'Product: <strong>' . $row['product_name'] . '</strong> has been deleted', 'success');
      header('Location: ' . ADMINURL . '/product');
      exit;
    } else {
      Flasher::setFlash('Error.', 'Failed to delete Product', 'danger');
      header('Location: ' . ADMINURL . '/product');
      exit;
    }
  }

  public function deletePicture($id)
  {
    $row = $this->model('Picture_model')->getPictureByIdPicture($id);
    if ($this->model('Picture_model')->deletePictureByIdPicture($id)) {
      unlink(PRODUCT_PICS . '/' . $row['picture_name']);
      Flasher::setFlash('Success.', 'Product Picture: <strong>' . $row['picture_name'] . '</strong> has been deleted', 'success');
      header('Location: ' . ADMINURL . '/product/pictures/' . $row['id_product']);
      exit;
    } else {
      Flasher::setFlash('Error.', 'Failed to delete Product Picture', 'danger');
      header('Location: ' . ADMINURL . '/product/pictures/' . $row['id_product']);
      exit;
    }
  }

  public function insertPictures($id_product)
  {
    $picture_names =  $_FILES['pictures']['name'];
    $picture_tmp_names = $_FILES['pictures']['tmp_name'];

    foreach ($picture_names as $key => $name) {
      $tmp_name = $picture_tmp_names[$key];
      $additional_pictures = $this->addTimeCreated($name);

      move_uploaded_file($tmp_name, PRODUCT_PICS . '/' . $additional_pictures);

      if ($this->model('Picture_model')->insertDataPictures($additional_pictures, $id_product) > 0) {
        Flasher::setFlash('Success.', '<strong>' . count($picture_names) . ' New Product Picture(s)</strong> have been added.', 'success');
        header('Location:' . ADMINURL .'/product/pictures/' . $id_product);
      } else {
        Flasher::setFlash('Error.', 'Failed to add Product Pictures.', 'danger');
        header('Location: ' . ADMINURL . '/product/pictures/' . $id_product);
        exit;
      }
    }
  }
}
?>