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
            <a href="<?= ADMINURL; ?>/product/pictures/<?= $product['id_product']; ?>" class="btn btn-success">
              <span><i class="fa-regular fa-images me-1"></i></span>Pictures
            </a>
            <a class="btn btn-danger" data-toggle="modal" data-target="#modal-<?= $product['id_product']; ?>">
              <span><i class="fa-regular fa-trash-can me-1"></i></span>Delete
            </a>
          </td>
        </tr>

        <!-- DELETE PRODUCT MODAL -->
        <div class="modal fade" id="modal-<?= $product['id_product']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                Are you sure want to delete <strong> <?= $product['product_name']; ?> </strong>?
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary-native" data-dismiss="modal">No, keep Product</button>
                <a type="button" href="<?= ADMINURL; ?>/product/delete/<?= $product['id_product']; ?>" class="btn btn-primary-native">Yes, delete Product</a>
              </div>
            </div>
          </div>
        </div>
        <?php endforeach;?>
      </tbody>
    </table>
  </div>
</div>
