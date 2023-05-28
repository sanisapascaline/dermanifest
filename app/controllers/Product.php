<?php 

class Product extends Controller {
  public function index()
  {
    $data['judul'] = 'Product List | Dermanifest';
    $data['product_list'] = $this->model('Product_model')->getAllProduct();
    $data['category_list'] = $this->model('Category_model')->getAllCategory();

    foreach ($data['category_list'] as $cat_key => $category) {
      $prod_match_category = [];
      foreach ($data['product_list'] as $product) {
        if ($category['id_category'] == $product['id_category']) {
          array_push($prod_match_category, $product);
        }
      }
      $category_with_product[$cat_key] = [
        ...$category, 
        'category_product' => $prod_match_category
      ];
    }

    $data['categorized_product'] = $category_with_product;
    $this->view('layout/header', $data);
    $this->view('layout/navbar');
    $this->view('product/index', $data);
    $this->view('layout/bottom_navbar');
    $this->view('layout/footer');
  }

  public function detail($id) 
  {
    $main_picture = $this->model('Product_model')->getProductById($id)['main_picture'];
    $product_picture_list = $this->model('Picture_model')->getAllPictureByIdProduct($id);
    foreach ($product_picture_list as $key => $picture) {
      if ($picture['picture_name'] == $main_picture) {
       unset($product_picture_list[$key]);
      }
    }
    $data['product'] = $this->model('Product_model')->getProductById($id);
    $data['product_picture_list'] = $product_picture_list;
    $data['judul'] = $data['product']['product_name'] . ' | Dermanifest';

    $this->view('layout/header', $data);
    $this->view('layout/navbar');
    $this->view('product/detail', $data);
    $this->view('layout/bottom_navbar');
    $this->view('layout/footer');
  }
}
?>