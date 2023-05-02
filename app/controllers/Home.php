<?php

class Home extends Controller {
  public function index() 
  {
    $data['judul'] = 'Home | Dermanifest';
    
    $this->view('layout/header', $data);
    $this->view('layout/navbar');
    $this->view('home/index', $data);
    $this->view('layout/bottom_navbar');
    $this->view('layout/footer');
  }
}
?>