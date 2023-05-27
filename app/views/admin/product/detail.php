<div class="content">
  <h2>Product Detail</h2>
  <hr>
  <div>
    <?php Flasher::flash(); ?>
  </div>
  <table class="table table-bordered table-striped table-hover table-header-on-left">
    <tbody>
      <tr>
        <th>Id</th>
        <td><?= $data['product']['id_product']; ?></td>
      </tr>
      <tr>
        <th>Name</th>
        <td><?= $data['product']['product_name']; ?></td>
      </tr>
      <tr>
        <th>Category</th>
        <td><?= $data['product']['category_name']; ?></td>
      </tr>
      <tr>
        <th>Price</th>
        <td>Rp<?= number_format($data['product']['price'], 0, ',' , '.'); ?>,-</td>
      </tr>
      <tr>
        <th>Stock</th>
        <td><?= $data['product']['stock']; ?></td>
      </tr>
      <tr>
        <th>Neto</th>
        <td><?= $data['product']['neto']; ?> gr</td>
      </tr>
      <tr>
        <th>Gross Weight</th>
        <td><?= $data['product']['gross_weight']; ?> gr</td>
      </tr>
      <tr>
        <th>Description</th>
        <td><?= $data['product']['description']; ?></td>
      </tr>
      <tr>
        <th>Instruction</th>
        <td><?= $data['product']['instruction']; ?></td>
      </tr>
      <tr>
        <th>Ingredients</th>
        <td><?= $data['product']['ingredients']; ?></td>
      </tr>
    </tbody>
  </table>

  <h3 class="mt-20px">Pictures</h3>
  <div class="row">
    <?php foreach ($data['product_picture_list'] as $picture) :?>
    <div class="col-md-3">
  		<img src="<?= IMGURL; ?>/products/<?= $picture['picture_name']; ?>" width="80%" height="auto"> <br>
    </div>
    <?php endforeach;?>
  </div>
</div>
