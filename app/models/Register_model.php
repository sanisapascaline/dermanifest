<?php

class Register_model {
  private $table = 'customer';
	private $db;

	public function __construct()
	{
		$this->db = new Database;
	}

  public function checkUsername($username) {
    $this->db->query("SELECT * FROM " . $this->table . " WHERE username = :username");
    $this->db->bind('username', $username);

    return $this->db->single();
  }
  
  public function checkAdminUsername($username) {
    $this->db->query("SELECT * FROM admin WHERE username = :username");
    $this->db->bind('username', $username);

    return $this->db->single();
  }

  public function checkEmail($email) {
    $this->db->query("SELECT * FROM " . $this->table . " WHERE email = :email");
    $this->db->bind('email', $email);

    return $this->db->single();
  }
  
  public function checkAdminEmail($email) {
    $this->db->query("SELECT * FROM admin WHERE email = :email");
    $this->db->bind('email', $email);

    return $this->db->single();
  }

  public function doRegister($data) {
    $query = "INSERT INTO " . $this->table . " 
              (name, username, email, phone, password)
                VALUES
              (:name, :username, :email, :phone, :password)";
    $this->db->query($query);
    $this->db->bind('name', $data['name']);
    $this->db->bind('username', $data['username']);
    $this->db->bind('email', $data['email']);
    $this->db->bind('phone', $data['phone']);
    $this->db->bind('password', md5($data['password']));

    $this->db->execute();

    return $this->db->rowCount();
  }
}
?>