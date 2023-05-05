<?php 

class Login_model {
	private $db;

	public function __construct()
	{
		$this->db = new Database;
	}

  public function doLogin($data)
  {
    $query = "SELECT * FROM customer WHERE username = :username OR email = :email AND password = :password";
    $this->db->query($query);

    if (isset($data['username']) AND isset($data['email'])) {
      $this->db->bind('username', $data['username']);
      $this->db->bind('email', $data['email']);
    } else {
      $this->db->bind('username', $data['username_or_email_login']);
      $this->db->bind('email', $data['username_or_email_login']);
    }

    $this->db->bind('password', md5($data['password']));
    $data = $this->db->single();

    return $data;
  }

  public function doAdminLogin($data)
  {
    $query = "SELECT * FROM admin WHERE username = :username OR email = :email AND password = :password";
    $this->db->query($query);
    $this->db->bind('username', $data['username_or_email_login']);
    $this->db->bind('email', $data['username_or_email_login']);
    $this->db->bind('password', md5($data['password']));
    $data = $this->db->single();

    return $data;
  }
}
?>