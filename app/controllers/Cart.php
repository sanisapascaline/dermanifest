<?php

class Cart extends Controller {
  public function index() 
  {
    $data['judul'] = 'Cart | Dermanifest';
    $data['cart_product_list'] = [
      'items' => [],
      'subtotal' => 0
    ];
    if (isset($_SESSION['cart'])) {
      $cart_products = $_SESSION['cart']['products'];
  
      foreach ($cart_products as $id_product => $product_cart_quantity) {
        $product_row = $this->model('Product_model')->getProductById($id_product);
        $product_price_amount = $product_row['price'] * $product_cart_quantity;
        $data['cart_product_list']['subtotal'] += $product_price_amount;
        $product_row['cart_quantity'] = $product_cart_quantity;
        $product_row['price_amount'] = $product_price_amount;
        array_push($data['cart_product_list']['items'], $product_row);
      }
    }

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
      $stock = $product_row['stock'];
      if ($_SESSION['cart']['products'][$id_product] < $stock) {
        if (isset($_SESSION['cart']['products'][$id_product])) {
          $_SESSION['cart']['products'][$id_product] += 1;
        } else {
          $_SESSION['cart']['products'][$id_product] = 1;
        }
        $_SESSION['cart']['total'] += 1;

        Flasher::setFlash('Success.', '<strong>' . $product_row['product_name'] . '</strong> has been added into your Cart!','success');
        header('location: '. HOSTURL  . $url);
        exit;
      } else {
        Flasher::setFlash('Failed.', 'Cannot add more product. Exceeds remaining stock: ' . $stock . 'pc(s).','danger');
        header('location: '. HOSTURL  . $url);
        exit;
      }
    } else {
      Flasher::setFlash('Error.', 'Cannot add product into cart.','danger');
      header('location: '. HOSTURL  . $url);
      exit;
    }
  }

  public function update($id_product, $new_quantity)
  {
    $product_row = $this->model('Product_model')->getProductById($id_product);

    if ($this->model('Product_model')->getProductById($id_product) > 0) {
      $stock = $product_row['stock'];
      if ($new_quantity == 0) {
        $this->delete($id_product);
      }
      else if ($new_quantity <= $stock && $new_quantity > 0) {
        $_SESSION['cart']['total'] += $new_quantity - $_SESSION['cart']['products'][$id_product];
        $_SESSION['cart']['products'][$id_product] = $new_quantity;
  
        Flasher::setFlash('Success.', 'The quantity of <strong>' . $product_row['product_name'] . '</strong> has been updated', 'success');
        header('location: '. BASEURL . '/cart');        
        exit;
      } else if ($new_quantity > $stock) {
        Flasher::setFlash('Failed.', 'Cannot update quantity. New quantity exceeds remaining stock: ' . $stock . 'pc(s).', 'danger');
        header('location: '. BASEURL . '/cart');
        exit;
      } else {
        Flasher::setFlash('Failed.', 'Cannot update quantity. Invalid quantity input.', 'danger');
        header('location: '. BASEURL . '/cart');
        exit;
      }
    } else {
      Flasher::setFlash('Error.', 'Cannot update product quantity.','danger');
      header('location: '. BASEURL . '/cart');
      exit;
    }

  }

  public function delete($id_product)
  {
    $product_row = $this->model('Product_model')->getProductById($id_product);
    if ($this->model('Product_model')->getProductById($id_product) > 0) {
      $_SESSION['cart']['total'] -= $_SESSION['cart']['products'][$id_product];
      unset($_SESSION['cart']['products'][$id_product]);
      
      Flasher::setFlash('Success.', '<strong>' . $product_row['product_name'] . '</strong> has been removed from you Cart','success');
      header('location: '. BASEURL . '/cart');
      exit;
    } else {
      Flasher::setFlash('Error.', 'Cannot remove product from cart.','danger');
      header('location: '. BASEURL . '/cart');
      exit;
    }
  }

  public function emptyAll()
  {
    if (isset($_SESSION['cart'])) {
      unset($_SESSION['cart']);

      Flasher::setFlash('Success.', 'All product has been removed from you Cart', 'success');
      header('location: '. BASEURL . '/cart');
      exit;
    } else {
      Flasher::setFlash('Error.', 'Cannot empty cart.', 'danger');
      header('location: '. BASEURL . '/cart');
      exit;
    }
  }
}
?>