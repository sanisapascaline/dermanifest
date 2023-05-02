<?php

class Home extends Controller {
  public function index() 
  {
    $data['judul'] = 'Home | Dermanifest';
    
    $this->view('home/index', $data);
  }
}
?>