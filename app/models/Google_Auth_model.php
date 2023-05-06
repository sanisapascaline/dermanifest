<?php

class Google_Auth_model {
  private $table = 'customer';
	private $db;

	public function __construct()
	{
		$this->db = new Database;
	}

  public function checkGoogleEmail($googleEmail)
  {
    $this->db->query("SELECT * FROM " . $this->table . " WHERE email = :email");
    $this->db->bind('email', $googleEmail);

    return $this->db->single();
  }

  public function doGoogleEmailRegister($data)
  {
    $query = "INSERT INTO " . $this->table . " 
    (name, username, email)
      VALUES
    (:name, :username, :email)";
    $this->db->query($query);
    $this->db->bind('name', $data['name']);
    $this->db->bind('username', $data['username']);
    $this->db->bind('email', $data['email']);

    $this->db->execute();

    return $this->db->rowCount();
  }
}
?>