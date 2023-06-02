<!-- HERO -->
<section class="hero">
  <div class="container hero-container">
    <div class="row hero-row">
      <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="hero-col">
          <div class="text-hero">
          <?php if (isset($_SESSION['customer']['username']) AND isset($_SESSION['customer']['name'])) :?>
              <h2>Hello, <?php echo $_SESSION['customer']['name']; ?></h2>
              <p>
                Take a litte journey today</br>
                and search anything you want.
              </p>
            <?php else : ?>
              <h2>
                Welcome to</br>Dermanifest!
              </h2>
              <p>
                Take a litte journey here</br>
                and we will guide you manifest your inner-out tranquilty.
              </p>
              <br>
              <div>
                <a href="<?= BASEURL;?>/login" class="btn btn-primary-native">Log In</a>
                <a href="<?= BASEURL;?>/register" class="btn btn-secondary-native secondary-color-light">Register</a>
              </div>
            <?php endif; ?>            
          </div>
          
          <div id="carouselExampleIndicators" class="image-hero carousel slide" data-bs-ride="carousel" data-bs-touch="true">
            <div class="carousel-indicators">
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button>
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="4" aria-label="Slide 5"></button>
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="5" aria-label="Slide 6"></button>
            </div>
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="<?= IMGURL; ?>/hero-1.svg" class="d-block w-100" alt="Visit Dermanifest on Shopee">
              </div>
              <div class="carousel-item">
                <img src="<?= IMGURL; ?>/hero-2.svg" class="d-block w-100" alt="Dermanifest Aromatherapy Candles New Edition">
              </div>
              <div class="carousel-item">
                <img src="<?= IMGURL; ?>/hero-3.svg" class="d-block w-100" alt="Dermanifest Organic Beauty Mask">
              </div>
              <div class="carousel-item">
                <img src="<?= IMGURL; ?>/hero-4.svg" class="d-block w-100" alt="Dermanifest Etawa Goat Milk Mask">
              </div>
              <div class="carousel-item">
                <img src="<?= IMGURL; ?>/hero-5.svg" class="d-block w-100" alt="Dermanifest Scented Candle Classic Edtion">
              </div>
              <div class="carousel-item">
                <img src="<?= IMGURL; ?>/hero-6.svg" class="d-block w-100" alt="Dermanifest Candlenut Oil">
              </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- SPACER -->
<section class="spacer">
  <div class="container spacer-container">
    <div class="row spacer-row">
      <div class="col-lg-2 col-md-2 col-sm-4 col-4 col-item mb-3 p-5">              
      </div>
    </div>
  </div>
</section>

<!-- ABOUT -->
<section class="about" id="scroll-about">
  <div class="container about-container">
    <div class="row about-row">
      <div class="col-lg-8 col-md-6 col-sm-12">
        <div class="title mb-3">
          <h1>About Us</h1>
        </div>
        <div class="paragpraph mb-5">
          <p>Dermanifest is a skincare product made from natural and cruelty ingredients,
              made with love for everyone with any skin and any ages.
          </p>
        </div>
        <div class="subtitle mb-3">
          <h5>What do we have for you?</h5>
        </div>
        <div class="item-product mb-5">
          <ul class="items">
            <li class="item">Dermanifest Classic Powder Beauty Mask</li>
            <li class="item">Dermanifest Classic Candlenut Oil</li>
            <li class="item">Dermanifest Classic Scented Candle</li>
            <li class="item">Featured Skincare</li>
          </ul>
        </div>
      </div>

      <div class="col-lg-4 col-md-6 col-sm-12">
        <div class="vmage-about">
          <img src="<?= IMGURL; ?>/about-pics.svg" alt="">
        </div>
      </div>
    </div>
  </div>
</section>

<!-- PRODUCT -->
<section class="product">
  <div class="cart-alert px-3">
    <?php Flasher::flash(); ?>
  </div>
  <div class="container container-product swiper productSwiper">
    <div class="row row-title-product mb-5">
      <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="product-content">
          <div class="title">
            <h1>Top Products</h1>
          </div>
          <div class="paragraph">
            <p>Our top products, truthfully crafted for you.</p>
          </div>
        </div>
      </div>
    </div>
    <div class="row row-product swiper-wrapper mb-5" id="scrollhere">
    <?php foreach ($data['product_list'] as $key => $product) : ?>     
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

              <a href="<?= BASEURL; ?>/cart/add/<?= $product['id_product']; ?>/<?= base64_encode($_SERVER['REQUEST_URI']); ?>" class="btn btn-buy btn-cart">
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
</section> 

<!-- BUY -->
<section>
  <div class="container buy-container">
    <div class="row buy-row">
      <div class="col-lg-6 col-md-6 col-sm-12 col-12 col-buy">
        <div class="title mb-3">
          <h1>Buy Here</h1>
        </div>
        <div class="paragraph mb-5">
          <p>You can purchase our products comfortably and 
              safely through the following media or
              <span class="link-contact">
                <a href="#" target="_blank">Whatsapp us for fast service</a>
              </span>
            </p>
        </div>
        <div class="button-buy">
          <a href="<?= BASEURL; ?>/product" class="btn btn-buy">Shop Now</a>
        </div>
      </div>
      <div class="col-lg-6 col-md-6 col-sm-12 col-12 col-img">
        <img src="<?= IMGURL; ?>/buy-pic.svg" alt="Dermanifest Organic Beauty Mask">
      </div>
    </div>

    <div class="row eshop-row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-12 col-eshop">
        <div class="image-item">
            <a href="https://shopee.co.id/dermanifest">
              <img src="<?= IMGURL; ?>/shopee.svg" alt="Shopee Logo">
            </a>
        </div>
        <div class="image-item">
            <a href="https://www.instagram.com/dermanifest/">
              <img src="<?= IMGURL; ?>/instagram.svg" alt="Instagram Logo">
            </a>
        </div>
      </div>
    </div>
  </div>
</section>
