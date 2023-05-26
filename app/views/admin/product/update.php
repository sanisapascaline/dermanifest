<div class="content">
<h2>Update Product</h2>
  <hr>
  <div>
    <?php Flasher::flash(); ?>
  </div>
  <form action="<?= ADMINURL; ?>/product/updateProduct" method="post" enctype="multipart/form-data">
  <div class="form-group mb-3">
      <label class="form-label">Id Product</label>
      <input type="text" class="form-control" value="<?= $data['product']['id_product']; ?>" disabled required>
      <input type="hidden" class="form-control" name="id_product" value="<?= $data['product']['id_product']; ?>" required>
    </div>
    <div class="form-group mb-3">
      <label class="form-label">Product Name</label>
      <input type="text" class="form-control" name="name" value="<?= $data['product']['product_name']; ?>" required>
    </div>
    <div class="form-group mb-3">
      <label class="form-label">Product Category</label> <br>
      <select class="form-select" name="id_category" required>
        <option value="<?= $data['product']['id_category']; ?>" selected="selected">Current category: <?= $data['product']['category_name']; ?></option>
        <option disabled>-------</option>
        <?php foreach ($data['category_list'] as $category) :?>
          <option value="<?= $category['id_category']; ?>"><?= $category['name']; ?></option>
        <?php endforeach; ?>
      </select>
	  </div>
    <div class="form-group mb-3">
      <label class="form-label">Price (Rupiah)</label>
      <input type="text" class="form-control" name="price" value="<?= $data['product']['price']; ?>" required>
    </div>
    <div class="form-group mb-3">
      <label class="form-label">Stock</label>
      <input type="text" class="form-control" name="stock" value="<?= $data['product']['stock']; ?>" required>
    </div>
    <div class="form-group mb-3">
      <label class="form-label">Neto (gram)</label>
      <input type="text" class="form-control" name="neto" value="<?= $data['product']['neto']; ?>" required>
    </div>
    <div class="form-group mb-3">
      <label class="form-label">Gross Weight (In gram. For Delivery) </label>
      <input type="text" class="form-control" name="gross_weight" value="<?= $data['product']['gross_weight']; ?>" required>
    </div>
    <div class="form-group mb-3">
      <label class="form-label">Description</label>
      <textarea class="summernote desc form-control" name="description" rows="10" required><?= $data['product']['description']; ?></textarea> 
    </div>
    <div class="form-group mb-3">
      <label class="form-label">Instruction</label>
      <textarea class="summernote inst form-control" name="instruction" rows="10" required><?= $data['product']['instruction']; ?></textarea> 
    </div>
    <div class="form-group mb-3">
      <label class="form-label">Ingredients</label>
      <textarea class="summernote ingr form-control" name="ingredients" rows="10" required><?= $data['product']['ingredients']; ?></textarea> 
    </div>
    <div class="form-group mb-3">
      <label class="form-label"><h4>Main Picture</h4></label>
      <h6>Current Product Main Picture:</h6>
      <img src="<?= IMGURL; ?>/products/<?= $data['product']['main_picture']; ?>" class="mb-3" width="200vw" height="auto" alt="Product main picture">
      <div class="picture-input">
        <input type="file" class="form-control" name="main_picture" required>			
        <p>Ignore this input if the product main picture is not mean to be updated.</p>
      </div>
    </div>
    <button type="submit" class="btn btn-primary-native">Update Product</button>
  </form>
</div>
