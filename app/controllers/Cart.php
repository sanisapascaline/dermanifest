<?php

class Cart extends Controller {
  public function index() 
  {
    $data['judul'] = 'Cart | Dermanifest';
    
    $this->view('layout/header', $data);
    $this->view('layout/navbar');
    $this->view('cart/index', $data);
    $this->view('layout/bottom_navbar');
    $this->view('layout/footer');
  }

  public function add($id_product, $redirect_url)
  {
    $url = base64_decode($redirect_url);
    $product_row = $this->model('Product_model')->getProductById($id_product);
    if ($this->model('Product_model')->getProductById($id_product) > 0) {
      if (isset($_SESSION['cart'][$id_product])) {
        $_SESSION['cart'][$id_product] += 1;
        $_SESSION['cart']['total'] += 1;
      } else {
        $_SESSION['cart'][$id_product] = 1;
        $_SESSION['cart']['total'] +=  1;
      }
      Flasher::setFlash('Success.', '<strong>' . $product_row['product_name'] . '</strong> has been added into your cart!','success');
      header('location: '. HOSTURL  . $url);
      exit;
    } else {
      Flasher::setFlash('Error.', 'Cannot add product into cart.','danger');
      header('location: '. HOSTURL  . $url);
      exit;
    }
  }
}
?>