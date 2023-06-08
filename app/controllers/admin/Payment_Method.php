<?php

class Payment_Method extends Controller {
  public function __construct()
	{	
		if (!isset($_SESSION['admin_login']) AND !isset($_SESSION['admin']['username'])) {
			header('Location: '. BASEURL . '/login');
			exit;
		}
	} 

  public function index() 
  {
    $data['judul'] = 'Payment Methods | Dermanifest Admin';
    $data['payment_method_list'] = $this->model('Payment_Method_model')->getAllPaymentMethod();
    
    $this->view('layout/admin/header', $data);
    $this->view('layout/admin/sidebar');
    $this->viewAdmin('payment_method/index', $data);
    $this->view('layout/admin/footer');
  }
  
  public function add() 
  {
    $data['judul'] = 'Add Payment Method | Dermanifest Admin';
    
    $this->view('layout/admin/header', $data);
    $this->view('layout/admin/sidebar');
    $this->viewAdmin('payment_method/add', $data);
    $this->view('layout/admin/footer');
  }

  public function update($id) 
  {
    $data['judul'] = 'Update Payment Method | Dermanifest Admin';
    $data['payment_method'] = $this->model('Payment_Method_model')->getPaymentMethodById($id);
    
    $this->view('layout/admin/header', $data);
    $this->view('layout/admin/sidebar');
    $this->viewAdmin('payment_method/update', $data);
    $this->view('layout/admin/footer');
  }
  
  public function insert() 
  {
    if ($this->model('Payment_Method_model')->insertDataPaymentMethod($_POST) > 0) {
      Flasher::setFlash('Success.', 'Payment Method: <strong>' . $_POST['payment_service'] . '</strong> has been added.', 'success');
      header('Location:' . ADMINURL .'/payment_method');
    } else {
      Flasher::setFlash('Error.', 'Failed to add Payment Method.', 'danger');
      header('Location: ' . ADMINURL . '/payment_method/add');
      exit;
    }
  }

  public function updatePaymentMethod()
  {
    if ($this->model('Payment_Method_model')->updateDataPaymentMethod($_POST) > 0) {
      Flasher::setFlash('Success.', 'Payment Method with Id: <strong>' . $_POST['id_payment_method'] . '</strong> has been updated.', 'success');      
      header('Location:' . ADMINURL .'/payment_method');
      exit;
    } else {
      Flasher::setFlash('Error.', 'Failed to update Payment Method.', 'danger');
      header('Location: ' . ADMINURL . '/payment_method/update/' . $_POST['id_payment_method']);
      exit;
    }
  }

  public function delete($id)
  {
    $row = $this->model('Payment_Method_model')->getPaymentMethodById($id);
    if ($this->model('Payment_Method_model')->deleteDataPaymentMethod($id) > 0) {
      Flasher::setFlash('Success.', 'Payment Method: <strong>' . $row['payment_service'] . ' - ' . $row['account_name'] . '</strong> has been deleted', 'success');
      header('Location: ' . ADMINURL . '/payment_method');
      exit;
    } else {
      Flasher::setFlash('Error.', 'Failed to delete Payment Method', 'danger');
      header('Location: ' . ADMINURL . '/payment_method');
      exit;
    }
  }
}
?>