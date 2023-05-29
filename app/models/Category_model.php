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
    $query = "INSERT INTO " . $this->table . " (name, description) VALUES (:name, :description)";
    $this->db->query($query);
    $this->db->bind('name', $data['name']);
    $this->db->bind('description', $data['description']);
    
    $this->db->execute();

    return $this->db->rowCount();
  }

  public function updateDataCategory($data)
  {
    $query = "UPDATE " . $this->table . " SET name = :name, description = :description WHERE id_category = :id_category";
		$this->db->query($query);
		$this->db->bind('name',$data['name']);
		$this->db->bind('id_category', $data['id_category']);
    $this->db->bind('description', $data['description']);
		
    $this->db->execute();

		return $this->db->rowCount();
  }

  public function deleteDataCategory($id)
  {
    $this->db->query('DELETE FROM ' . $this->table . ' WHERE id_category = :id_category');
		$this->db->bind('id_category', $id);

		$this->db->execute();

		return $this->db->rowCount();
  }
}
?>