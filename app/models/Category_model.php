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

  public function getCategoryById($id)
  {
    $this->db->query("SELECT * FROM " . $this->table . " WHERE id_category = :id_category");
    $this->db->bind('id_category', $id);

    return $this->db->single();
  }

  public function insertDataCategory($data) 
  {
    $query = "INSERT INTO " . $this->table . " (name) VALUES (:name)";
    $this->db->query($query);
    $this->db->bind('name', $data['name']);
    
    $this->db->execute();

    return $this->db->rowCount();
  }
}
?>