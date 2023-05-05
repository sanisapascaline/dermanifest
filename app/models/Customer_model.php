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
}
?>