<div class="container">
<!-- SIDEBAR -->
<div class="my-navbar navi active">
  <ul>
    <li>
      <a href="<?= ADMINURL; ?>">
        <span class="icon"></span>
        <span class="title"><h3>Dermanifest Admin</h3></span>
      </a>
    </li>
    <li>
      <a href="<?= ADMINURL; ?>">
        <span class="icon"><i class="fa fa-home" aria-hidden="true"></i></span>
        <span class="title">Home</span>
      </a>
    </li>
    <li>
      <a href="<?= ADMINURL; ?>/product">
        <span class="icon"><i class="fa fa-shopping-bag" aria-hidden="true"></i></span>
        <span class="title">Products</span>
      </a>
    </li>
    <li>
      <a href="<?= ADMINURL; ?>/category">
        <span class="icon"><i class="fa fa-tags" aria-hidden="true"></i></span>
        <span class="title">Categories</span>
      </a>
    </li>
    <li>
      <a href="<?= ADMINURL; ?>">
        <span class="icon"><i class="fa fa-users" aria-hidden="true"></i></span>
        <span class="title">Customer</span>
      </a>					
    </li>
    <li>
      <a href="<?= ADMINURL; ?>">
        <span class="icon"><i class="fa fa-shopping-cart" aria-hidden="true"></i></span>
        <span class="title">Orders</span>
      </a>
    </li>
    <li>
      <a href="<?= ADMINURL; ?>">
        <span class="icon"><i class="fa fa-check-circle" aria-hidden="true"></i></span>
        <span class="title">Completed Orders</span>
      </a>
    </li>
    <li>
      <a href="<?= ADMINURL; ?>">
        <span class="icon"><i class="fa fa-sign-out" aria-hidden="true"></i></span>
        <span class="title">Log Out</span>
      </a>
    </li>
  </ul>
</div>

<!-- NAVBAR -->
<div class="main active">
  <div class="topbar sticky-div">
    <div class="toggle active" onclick="toggleMenu();"></div>
    <div class="logout">
      <a href="<?= BASEURL; ?>/logout" class="btn-primary-native">
        <span><i class="fa fa-sign-out" aria-hidden="true"></i></span>
        <span>Log Out</span>
      </a>
    </div>
  </div>