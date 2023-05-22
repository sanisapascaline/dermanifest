<?php 

class Picture_model {
  private $table = 'picture_list';
	private $db;

	public function __construct()
	{
		$this->db = new Database;
	}

  public function getAllPictureByIdProduct($id)
  {
    $this->db->query("SELECT * FROM " . $this->table . " WHERE id_product = :id_product");
    $this->db->bind('id_product', $id);
    
    $this->db->execute();

    return $this->db->resultSet();
  }

  public function insertDataPictures($picture_name, $id_product)
  {
    $query = "INSERT INTO " . $this->table . " (id_product, picture_name) VALUES (:id_product, :picture_name)";
		$this->db->query($query);


    $this->db->bind('id_product', $id_product);
    $this->db->bind('picture_name', $picture_name);

    $this->db->execute();

    return $this->db->rowCount();
  }
}
?>