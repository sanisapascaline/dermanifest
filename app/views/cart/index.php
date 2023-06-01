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
            <tr class="mt-2">
              <td>
                <div class="table-product d-flex">
                  <img src="https://dummyimage.com/400x600/000/fbff00" alt="cart item">
                  <div class="product-text ms-3">
                    <h5>Artemis - Coffee Scented Aromatherapy Candle</h5>
                    <p class="text-small">Dermanifest Aromatherapy Candle</p>
                    <p class="text-small">30 gr</p>
                    <h5 class="my-3">Rp30.000,-</h5>
                    <a href="#" class="text-danger"><u>Remove item</u></a>              
                  </div>
                </div>  
              </td>
              <td><input type="number" name="quantity" class="form-control"></td>
              <td><h5>Rp60.000,-</h5></td>
            </tr>
            <tr class="mt-2">
              <td>
                <div class="table-product d-flex">
                  <img src="https://dummyimage.com/400x600/000/fbff00" alt="cart item">
                  <div class="product-text ms-3">
                    <h5>Artemis - Coffee Scented Aromatherapy Candle</h5>
                    <p class="text-small">Dermanifest Aromatherapy Candle</p>
                    <p class="text-small">30 gr</p>
                    <h5 class="my-3">Rp30.000,-</h5>
                    <a href="#" class="text-danger"><u>Remove item</u></a>              
                  </div>
                </div>  
              </td>
              <td><input type="number" name="quantity" class="form-control"></td>
              <td><h5>Rp60.000,-</h5></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>

    <div class="cart-summary col-md-4 px-4">
      <h3>Summary</h3>
      <h5>Quantity</h5>
      <p>2 pcs</p>
      <h5>Subtotal</h5>
      <h3>Rp120.000,-</h3>
      <div class="cart-btn d-flex flex-column mt-4">
        <a href="#" class="btn btn-primary-native">Checkout</a>
        <a href="#" class="btn btn-secondary-native mt-2">Empty Cart</a>
      </div>
    </div>
  </div>
</section>
