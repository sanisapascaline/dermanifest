<section class="login-page">
  <div class="row login-row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-login-page">
      <div class="image-login-form">
        <img src="<?= IMGURL; ?>/login-pic.svg" alt="">
      </div>

      <div class="login-content">
        <div class="img-form mb-5">
          <a href="<?= BASEURL; ?>"><img src="<?= IMGURL; ?>/logo-light.svg" alt=""></a>
        </div>

        <div class="form">
          <form action="<?=BASEURL;?>/login/insert" method="post" class="register-form">
            <div class="mb-2 username form-group">
              <label for="inputUsername" class="form-label">Username/Email</label>
              <input type="text" class="form-text form-control" id="inputUsername" placeholder="Enter Username/Email" name="username_or_email_login" required>
            </div>
            <div class="mb-2 password form-group">
              <label for="inputPassword" class="form-label">Password</label>
              <input type="password" class="form-text form-control" id="inputPassword" placeholder="Enter password" name="password" required>
            </div>
            <div class="mb-5 form-group">
              <?php Flasher::flash(); ?>
            </div>
            <div class="login-button">
              <button type="submit" name="login" class="btn btn-primary btn-login">Log In</button>
            </div>
          </form> 

          <p class="text-center p-or">-OR-</p>

          <div>
            <a class="btn btn-outline-dark btn-login" href="<?= BASEURL; ?>/google_auth" role="button" style="text-transform:none; background-color: white; width: 100%">
              <img width="20px" style="width: 20px !important; margin-bottom:3px; margin-right:5px;" alt="Google sign-in" src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/53/Google_%22G%22_Logo.svg/512px-Google_%22G%22_Logo.svg.png" /> Log In with Google
            </a>
          </div>
        </div>

        <div class="text-signup">
          <p>Don't have an account? Please, 
            <span class="signup-text">
              <a href="<?= BASEURL; ?>/register">Register here</a>.
            </span>
          </p>
        </div>

      </div>
    </div>
  </div>
</section>
