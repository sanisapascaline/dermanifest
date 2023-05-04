<?php 

class Login extends Controller {
  public function index()
  {
    $data['judul'] = 'Login | Dermanifest';

    $this->view('layout/header', $data);
    $this->view('login/index', $data);
    $this->view('layout/footer');
  }
}
?>