<section class="navbar-fixed-top">
  <div class="container">
    <nav class="navbar navbar-expand-lg navbar-light nav-dermanifest">
      <div class="container-fluid">
        <a class="navbar-brand nav-logo" href="<?= BASEURL; ?>"><img src="<?= IMGURL; ?>/logo-dark.svg" alt="" srcset=""></a>
      </div>

      <button class="navbar-toggler nav-toggle" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <i class='bx bx-dots-horizontal-rounded nav-mobile-menu' ></i>
      </button>

      <li class="navbar-toggler nav-toggle">
        <a class="" href="<?= BASEURL; ?>/cart" aria-label="Cart"><i class='bx bx-cart'></i></a>
        <span class='badge badge-warning' id='lblCartCount'>
          <?= (isset($_SESSION['cart']) ? $_SESSION['cart']['total'] : 0)?>                    
        </span>
      </li>
      <div class="collapse navbar-collapse dorpdown-mobile" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item me-4">
            <a class="nav-link" href="<?= BASEURL; ?>">Home</a>
          </li>
          <li class="nav-item me-4">
            <a class="nav-link" href="<?= BASEURL; ?>#scroll-about">About</a>
          </li>
          <li class="nav-item me-4 dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Shop
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="<?= BASEURL; ?>/product">All Product</a></li>
              <li><a class="dropdown-item" href="#">Dermanifest Classic Powder Beauty Mask</a></li>
              <li><a class="dropdown-item" href="#">Dermanifest Classic Candlenut Oil</a></li>
              <li><a class="dropdown-item" href="#">Dermanifest Classic Scented Candle</a></li>
              <li><a class="dropdown-item" href="#">Featured Skincare</a></li>
            </ul>
          </li>
          <li class="nav-item me-4">
            <a class="nav-link" href="<?= BASEURL; ?>#scroll-footer">Contact</a>
          </li>
          
          <div class="nav-ico-mobile">
            <li class="nav-item me-4 cart-nav hide-med">
              <a class="nav-link" href="<?= BASEURL; ?>/cart" aria-label="Cart"><i class='bx bx-cart'></i></a>
              <span class='badge badge-warning' id='lblCartCount'>
                <?= (isset($_SESSION['cart']) ? $_SESSION['cart']['total'] : 0)?>                    
              </span>
            </li>
            <li class="nav-item me-4">
            <?php if (!empty($_SESSION['customer']['picture'])) : ?>
              <a class="nav-link" href="<?= BASEURL; ?>/profile"><img width="20px" height="20px"
                  src="<?=$_SESSION['customer']['picture'];?>" referrerpolicy="no-referrer" style="width: 25px; border-radius: 50px;" img-circle img-responsive img-thumbnail></a>
              <?php else: ?>
              <a class="nav-link" href="<?= BASEURL; ?>/profile"><i class='bx bx-user' ></i></a>
              <?php endif ?>
            </li>
            <?php if (isset($_SESSION['customer']['username']) AND isset($_SESSION['customer']['name'])) : ?>
            <li class="nav-item me-4">
              <a class="nav-link" href="<?= BASEURL; ?>/logout">Logout</a>
            </li>   
            <?php endif; ?>
          </div>
        </ul>
      </div>
    </nav>
  </div>
</section>
<div class="whitespace"></div>
