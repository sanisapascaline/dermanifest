<?php 

class Register extends Controller {
  public function index() {
    $data['judul'] = 'Register | Dermanifest';
    
    $this->view('layout/header', $data);
    $this->view('register/index', $data);
    $this->view('layout/footer');
  }
}
?>