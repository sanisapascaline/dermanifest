<?php 

class Product extends Controller {
  public function index()
  {
    $data['judul'] = 'Product List | Dermanifest';

    $this->view('layout/header', $data);
    $this->view('layout/navbar');
    $this->view('product/index', $data);
    $this->view('layout/bottom_navbar');
    $this->view('layout/footer');
  }
}
?>