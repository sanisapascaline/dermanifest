<section class="product container container-product">
  <h1>All Product</h1>
  <?php foreach ($data['categorized_product'] as $category) :?>
  <div class="swiper productSwiper mb-4">
    <div class="row row-title-product">
      <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="product-content">
          <div class="title">
            <h3><?= $category['name']; ?></h3>
          </div>
          <div class="paragraph">
            <p><?= $category['description']; ?></p>
          </div>
        </div>
      </div>
    </div>
    <div class="row row-product swiper-wrapper mb-5" id="scrollhere">
      <?php foreach ($category['category_product'] as $key => $product) : ?>     
      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 swiper-slide">
        <a href="<?= BASEURL?>/product/detail/<?= $product['id_product']; ?>">
          <div class="card swiper-slide">
            <div class="image-product">
              <div class="hover-desc">
                <p><i class="fa fa-search" aria-hidden="true"></i></p>
              </div>
              <img src="<?= IMGURL; ?>/products/<?= $product['main_picture']; ?>" alt="...">
            </div>

            <div class="product-content">
              <div class="text-content">
                <h5><?= $product['product_name']; ?></h5>
                <p><?= $product['category_name']; ?></p>
              </div>

              <div class="price-rate">
                <div class="product-price">
                  <p>Rp<?= number_format($product['price'],0,',','.'); ?>,-</p>
                </div>
              </div>

              <a href="#" class="btn btn-buy btn-cart">
                <box-icon type='solid' name='cart-add'><i class='bx bxs-cart-add' style="width: 20px; height: auto;"></i></box-icon> Add to Cart 
              </a>
            </div>
          </div>
        </a>
      </div>
      <?php endforeach;?>
    </div> 
    
    <div class="row">
      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 d-flex col-button">
        <p class="button-prev me-3">PREV</p>
        <p class="button-next">NEXT</p>
      </div>
    </div>
  </div>
  <?php endforeach; ?>
</section> 
