<?php

class Category_model {
  private $table = 'category';
	private $db;

	public function __construct()
	{
		$this->db = new Database;
	}

  public function getAllCategory()
  {
    $this->db->query("SELECT * FROM " . $this->table);
    
    return $this->db->resultSet();
  }
}
?>