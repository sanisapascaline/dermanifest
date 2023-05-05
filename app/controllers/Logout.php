<?php 

class Logout extends Controller {
  public function index() {
    if (!session_id()) {
      session_start();
    }
    session_destroy();
    header('Location: ' . BASEURL);
  }
}
?>