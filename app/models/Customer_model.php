<?php 

class Customer_model {
  private $table = 'customer';
  private $db;

	public function __construct()
	{
		$this->db = new Database;
	}

  public function getCustomerById($id) 
  {
    $this->db->query("SELECT * FROM " . $this->table . " WHERE id_customer = :id_customer");
    $this->db->bind('id_customer', $id);
    
    return $this->db->single();
  }

  public function updateDataCustomer($data) 
  {
    $query = "UPDATE " . $this->table . " 
              SET name = :name,
              username = :username,
              email = :email,
              phone = :phone
              WHERE id_customer = :id_customer";
		$this->db->query($query);
		$this->db->bind('name', $data['name']);
		$this->db->bind('username',$data['username']);
		$this->db->bind('email',$data['email']);
		$this->db->bind('phone',$data['phone']);
		$this->db->bind('id_customer', $data['id_customer']);
		
    $this->db->execute();

		return $this->db->rowCount();
  }

  public function updateDataPassword($data)
  {
    $query = "UPDATE " .$this->table . " 
              SET password = :password
              WHERE id_customer = :id_customer";
    $this->db->query($query);
    $this->db->bind('password', md5($data['new_password']));
		$this->db->bind('id_customer', $data['id_customer']);

    $this->db->execute();

		return $this->db->rowCount();
  }
}
?>