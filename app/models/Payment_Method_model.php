<?php

class Payment_Method_model {
  private $table = 'payment_method';
	private $db;

	public function __construct()
	{
		$this->db = new Database;
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
}
?>