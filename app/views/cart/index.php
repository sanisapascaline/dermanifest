<section class="cart-page container py-5 mb-5">
  <h1 class="mb-5">My Shopping Cart</h1>
  <div class="cart-empty-container d-flex align-items-center flex-column p-5 d-none">
    <h2>Your cart is still empty. Let's shop something!</h2>
    <a href="<?= BASEURL; ?>/product" class="shop-button btn btn-primary-native mt-3">Shop Products</a>
  </div>
  <div class="cart-filled-container row px-3">
    <div class="cart-table col-md-8 mb-4">
      <div class="table-responsive py-2">
        <table class="table">
          <thead>
            <tr>
              <th class="text-center" scope="col"><h6 class="fw-bold">Product</h6></th>
              <th scope="col"><h6 class="fw-bold">Quantity</h6></th>
              <th scope="col"><h6 class="fw-bold">Amount</h6></th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($data['cart_product_list']['items'] as $product) :?>
            <tr class="mt-2">
              <td>
                <div class="table-product d-flex">
                  <img src="<?= IMGURL; ?>/products/<?= $product['main_picture']; ?>" alt="cart item">
                  <div class="product-text ms-3">
                    <h5><?= $product['product_name']; ?></h5>
                    <p class="text-small"><?= $product['category_name']; ?></p>
                    <p class="text-small"><?= $product['neto']; ?> gr</p>
                    <h5 class="my-3">Rp<?= number_format($product['price'], 0, ',', '.'); ?>,-</h5>
                    <a href="#" class="text-danger"><u>Remove item</u></a>              
                  </div>
                </div>  
              </td>
              <td><input type="number" name="quantity" value="<?= $product['cart_quantity']; ?>" class="form-control"></td>
              <td><h5>Rp<?= number_format($product['price'] * $product['cart_quantity'], 0, ',', '.'); ?>,-</h5></td>
            </tr>
            <?php endforeach; ?>
           </tbody>
        </table>
      </div>
    </div>

    <div class="cart-summary col-md-4 px-4">
      <h3>Summary</h3>
      <h5>Quantity</h5>
      <p><?= $_SESSION['cart']['total']; ?> pcs</p>
      <h5>Subtotal</h5>
      <h3>Rp<?= number_format($data['cart_product_list']['subtotal'], 0, ',', '.'); ?>,-</h3>
      <div class="cart-btn d-flex flex-column mt-4">
        <a href="#" class="btn btn-primary-native">Checkout</a>
        <a href="#" class="btn btn-secondary-native mt-2">Empty Cart</a>
      </div>
    </div>
  </div>
</section>
