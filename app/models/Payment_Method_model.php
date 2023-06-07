<?php

class Payment_Method_model {
  private $table = 'payment_method';
	private $db;

	public function __construct()
	{
		$this->db = new Database;
	}

  public function getAllPaymentMethod()
  {
    $this->db->query("SELECT * FROM " . $this->table);
    
    return $this->db->resultSet();
  }

  public function getPaymentMethodById($id)
  {
    $this->db->query("SELECT * FROM " . $this->table . " WHERE id_payment_method = :id_payment_method");
    $this->db->bind('id_payment_method', $id);

    return $this->db->single();
  }

  public function insertDataPaymentMethod($data) 
  {
    $query = "INSERT INTO " . $this->table . " (payment_service, account_number, account_name) VALUES (:payment_service, :account_number, :account_name)";
    $this->db->query($query);
    $this->db->bind('payment_service', $data['payment_service']);
    $this->db->bind('account_number', $data['account_number']);
    $this->db->bind('account_name', $data['account_name']);
    
    $this->db->execute();

    return $this->db->rowCount();
  }

  public function updateDataPaymentMethod($data)
  {
    $query = "UPDATE " . $this->table . " SET payment_service = :payment_service, account_number = :account_number, account_name = :account_name WHERE id_payment_method = :id_payment_method";
		$this->db->query($query);
		$this->db->bind('id_payment_method', $data['id_payment_method']);
		$this->db->bind('payment_service', $data['payment_service']);
    $this->db->bind('account_number', $data['account_number']);
    $this->db->bind('account_name', $data['account_name']);
		
    $this->db->execute();

		return $this->db->rowCount();
  }
}
?>