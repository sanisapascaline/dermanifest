<?php 

class Product extends Controller {
  public function index()
  {
    $data['judul'] = 'Product List | Dermanifest';
    $data['product_list'] = $this->model('Product_model')->getAllProduct();
    $data['category_list'] = $this->model('Category_model')->getAllCategory();
    $product_category_names = [];

    foreach ($data['category_list'] as $category) {
      $product_category_names[$category['id_category']] = $category['name'];
    }
  
    $data['category_names'] = $product_category_names;

    $this->view('layout/header', $data);
    $this->view('layout/navbar');
    $this->view('product/index', $data);
    $this->view('layout/bottom_navbar');
    $this->view('layout/footer');
  }
}
?>