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
    $this->db->query("SELECT *, product.name AS product_name, category.name AS category_name, product.description AS product_desc, category.description AS category_desc 
                      FROM " . $this->table . 
                      " LEFT JOIN category 
                      ON product.id_category = category.id_category");

    return $this->db->resultSet();
  }

  public function getProductById($id)
  {
    $this->db->query("SELECT *, product.name AS product_name, category.name AS category_name, product.description AS product_desc, category.description AS category_desc 
                      FROM " . $this->table . 
                      " LEFT JOIN category 
                      ON product.id_category = category.id_category
                      WHERE id_product = :id_product");
    $this->db->bind('id_product', $id);

    return $this->db->single();
  }

  public function insertDataProduct($data, $picture)
	{
		$query = "INSERT INTO " .$this->table . 
						 " (id_category, name, price, main_picture, stock, neto, description, instruction, ingredients, gross_weight) 
						 VALUES 
						 (:id_category, :name, :price, :main_picture, :stock, :neto, :description, :instruction, :ingredients, :gross_weight)";
		$this->db->query($query);
    
    $this->db->bind('id_category', $data['id_category']);
    $this->db->bind('name', $data['name']);
    $this->db->bind('price', $data['price']);
    $this->db->bind('main_picture', $picture);
    $this->db->bind('stock', $data['stock']);
    $this->db->bind('neto', $data['neto']);
    $this->db->bind('description', $data['description']);
    $this->db->bind('instruction', $data['instruction']);
    $this->db->bind('ingredients', $data['ingredients']);
    $this->db->bind('gross_weight', $data['gross_weight']);
    
    $this->db->execute();

    return $this->db->rowCount();
	}

  public function updateDataProduct($data, $picture)
  {
    $query = "UPDATE " . $this->table . " 
              SET id_category = :id_category,
              name = :name,
              price = :price,
              main_picture = :main_picture,
              stock = :stock,
              neto = :neto,
              description = :description,
              instruction = :instruction,
              ingredients = :ingredients,
              gross_weight = :gross_weight
              WHERE id_product = :id_product";
		$this->db->query($query);

		$this->db->bind('id_category', $data['id_category']);
    $this->db->bind('name', $data['name']);
    $this->db->bind('price', $data['price']);
    $this->db->bind('main_picture', $picture);
    $this->db->bind('stock', $data['stock']);
    $this->db->bind('neto', $data['neto']);
    $this->db->bind('description', $data['description']);
    $this->db->bind('instruction', $data['instruction']);
    $this->db->bind('ingredients', $data['ingredients']);
    $this->db->bind('gross_weight', $data['gross_weight']);
		$this->db->bind('id_product', $data['id_product']);
		
    $this->db->execute();

		return $this->db->rowCount();
  }

  public function deleteDataProduct($id)
  {
    $this->db->query('DELETE FROM ' . $this->table . ' WHERE id_product = :id_product');
		$this->db->bind('id_product', $id);

		$this->db->execute();

		return $this->db->rowCount();
  }
}
?>