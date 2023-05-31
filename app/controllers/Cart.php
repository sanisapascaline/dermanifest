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
}
?>