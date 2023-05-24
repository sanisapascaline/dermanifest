<div class="content">
  <h2>Products</h2>
  <hr>
  <div>
    <?php Flasher::flash(); ?>
  </div>
  <div>
    <a href="<?= ADMINURL;?>/product/add" class="btn btn-primary-native mb-3">Add Product</a>
  </div>
  <div class="table-wrapper" style="overflow-x: auto;">
    <table class="table table-bordered table-striped table-hover">
      <thead>
        <tr>
          <th>No.</th>
          <th>Id</th>
          <th>Picture</th>
          <th>Name</th>
          <th>Category</th>
          <th>Price</th>
          <th>Stock</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $num = 1;
        foreach ($data['product_list'] as $product) : 
        ?>
        <tr>
          <td><?= $num++; ?>.</td>
          <td><?= $product['id_product']; ?></td>
          <td><img src="<?= IMGURL; ?>/products/<?= $product['main_picture']; ?>" width="120" height="auto"></td>
          <td><?= $product['product_name']; ?></td>
          <td><?= $product['category_name']; ?></td>       
          <td>Rp<?= number_format($product['price'],0,',','.'); ?>,-</td>
          <td><?= $product['stock']; ?></td>
          <td>        
            <a href="<?= ADMINURL; ?>/product/detail/<?= $product['id_product']; ?>" class="btn btn-info">
              <span><i class="fa fa-circle-info me-1"></i></span>Detail
            </a>
            <a href="<?= ADMINURL; ?>/product/update/<?= $product['id_product']; ?>" class="btn btn-primary">
              <span><i class="fa-regular fa-pen-to-square me-1"></i></span>Update
            </a>
            <a href="#" class="btn btn-success">
              <span><i class="fa-regular fa-images me-1"></i></span>Pictures
            </a>
            <a href="#" class="btn btn-danger">
              <span><i class="fa-regular fa-trash-can me-1"></i></span>Delete
            </a>
          </td>
        </tr>
        <?php endforeach;?>
      </tbody>
    </table>
  </div>
</div>
