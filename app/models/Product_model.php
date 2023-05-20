<?php 

class Product_model {
  private $table = 'product';
	private $db;

	public function __construct()
	{
		$this->db = new Database;
	}

  public function getAllProduct()
  {
    $this->db->query("SELECT *, product.name AS product_name, category.name AS category_name 
                      FROM " . $this->table . 
                      " LEFT JOIN category 
                      ON product.id_category = category.id_category");

    return $this->db->resultSet();
  }
}
?>