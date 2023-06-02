<section class="product-detail container mb-5">
  <div class="cart-alert px-3">
    <?php Flasher::flash(); ?>
  </div>
  <div class="row mt-3">
    <div class="pictures d-flex justify-content-center col-md-6">
      <div class="">
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
          <div class="carousel-indicators">
          <?php ?>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <?php 
          $num = 1;
          foreach ($data['product_picture_list'] as $pic) : ?>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="<?= $num++; ?>" aria-label="<?= $pic['picture_name'] ?>"></button>
          <?php endforeach; ?>
        </div>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="<?= IMGURL; ?>/products/<?= $data['product']['main_picture']; ?>" class="d-block w-100" alt="...">
          </div>
          <?php foreach ($data['product_picture_list'] as $pic) : ?>
          <div class="carousel-item">
            <img src="<?= IMGURL; ?>/products/<?= $pic['picture_name']; ?>" class="d-block w-100" alt="...">
          </div>
          <?php endforeach; ?>
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

    <div class="details col-md-6">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?= BASEURL; ?>"><u>Home</a></u></li>
          <li class="breadcrumb-item"><a href="<?= BASEURL; ?>/product"><u>Product List</a></u></li>
          <li class="breadcrumb-item active" aria-current="page"><?= $data['product']['product_name']; ?></li>
        </ol>
      </nav>
      <h2><?= $data['product']['product_name']; ?></h2>
      <div class="description-detail mt-3">
        <h4>Description</h4>
        <p><?= $data['product']['description']; ?></p>
      </div>
      <div class="instruction-detail mt-3">
        <h4>How to Use</h4>
        <p><?= $data['product']['instruction']; ?></p>
      </div>
      <div class="ingredients-detail mt-3">
        <h4>Ingredients</h4>
        <p><?= $data['product']['ingredients']; ?></p>
      </div>
      <div class="neto-price d-flex justify-content-between">
        <div class="neto-detail mt-3">
          <h4>Neto</h4>
          <p><?= $data['product']['neto']; ?> gram</p>
        </div>
        <div class="price-detail mt-3">
          <h4>Price</h4>
          <h3>Rp<?= number_format($data['product']['price'], 0, ',' , '.'); ?>,-</h3>
        </div>    
      </div>
      <div class="d-flex mt-4">
        <a href="<?= BASEURL; ?>/cart/add/<?= $data['product']['id_product']; ?>/<?= base64_encode($_SERVER['REQUEST_URI']); ?>" class="btn btn-buy w-100"><i class="fas fa-cart-plus"></i>Add to Cart</a>
      </div>
    </div>
  </div>
</section>
