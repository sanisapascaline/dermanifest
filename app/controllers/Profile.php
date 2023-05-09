<?php

class Profile extends Controller {
  private $customer_profile;

  public function __construct()
	{	
    $this->customer_profile = $this->model('Customer_model')->getCustomerById($_SESSION['customer']['id_customer']);
		if (!isset($_SESSION['customer_login']) AND !isset($_SESSION['customer']['username'])) {
			header('Location: '. BASEURL . '/login');
			exit;
		}
	} 

  public function index()
  {
    $data['judul'] = 'Profile | Dermanifest';
    $data['session_cust'] = $_SESSION;
    $data['customer_profile'] = $this->customer_profile;
    if (empty($this->customer_profile['password'])) {
      Flasher::setFlash('Warning.', 'You haven\'t set your password yet. Please, set it on Manage Password.', 'warning');      
    }
  
    $this->view('layout/header', $data);
    $this->view('layout/navbar');
    $this->view('profile/index', $data);
    $this->view('layout/footer');
  }

  public function updateProfile()
  {
    $customer_username_row = $this->model('Register_model')->checkUsername($_POST['username']);
		$admin_username_row = $this->model('Register_model')->checkAdminUsername($_POST['username']);

    $customer_email_row = $this->model('Register_model')->checkEmail($_POST['email']);
    $admin_email_row = $this->model('Register_model')->checkAdminEmail($_POST['email']);
    
    if ($customer_username_row['id_customer'] != $_SESSION['customer']['id_customer'] && ($customer_username_row['username'] == $_POST['username'] || $admin_username_row['username'] == $_POST['username'])) {
      Flasher::setFlash('Failed.','Username has already been used.','danger');
      header('location: '. BASEURL . '/profile'); 
      exit;	
    } elseif ($customer_email_row['id_customer'] != $_SESSION['customer']['id_customer'] && ($customer_email_row['email'] == $_POST['email'] || $admin_email_row['email'] == $_POST['email'])) {
      Flasher::setFlash('Failed.','Email has already been used.','danger');
      header('location: '. BASEURL . '/profile'); 
      exit;	
    } else {
      if ($this->model('Customer_model')->updateDataCustomer($_POST) > 0) {
        Flasher::setFlash('Success.', 'Your Profile has been updated!', 'success');      
        header('Location:' . BASEURL .'/profile');
        exit;
      } else {
        Flasher::setFlash('Error.', 'Unable to update Profile.', 'danger');
        header('Location: ' . BASEURL . '/profile');
        exit;
      }
    }
  }

  public function updatePassword()
  {
    if (empty($this->customer_profile['password'])) {
      if ($_POST['new_password'] == $_POST['password_repeat']) {
        if ($this->model('Customer_model')->updateDataPassword($_POST) > 0) {
          Flasher::setFlash('Success.', 'Your Password has been set!', 'success');      
          header('Location:' . BASEURL .'/profile');
          exit;
        } else {
          Flasher::setFlash('Error.', 'Unable to set Password.', 'danger');
          header('Location: ' . BASEURL . '/profile');
          exit;
        } 
      } else {
        Flasher::setFlash('Failed.','New password doesn\'t match with the re-entered one.','danger');
        header('location: '. BASEURL . '/profile');
        exit;	
      }
    }
    else if (md5($_POST['old_password']) == $this->customer_profile['password']) {
      if ($_POST['new_password'] == $_POST['password_repeat']) {
        if ($this->model('Customer_model')->updateDataPassword($_POST) > 0) {
          Flasher::setFlash('Success.', 'Your Password has been updated!', 'success');      
          header('Location:' . BASEURL .'/profile');
          exit;
        } else {
          Flasher::setFlash('Error.', 'Unable to update Password.', 'danger');
          header('Location: ' . BASEURL . '/profile');
          exit;
        }
      } else {
        Flasher::setFlash('Failed.','New password doesn\'t match with the re-entered one.','danger');
        header('location: '. BASEURL . '/profile');
        exit;	
      }
    } else {
      Flasher::setFlash('Failed.','Old password isn\'t correct.','danger');
        header('location: '. BASEURL . '/profile');
        exit;	
    } 
  }
}
?>