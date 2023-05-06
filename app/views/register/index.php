<section class="register-page">
  <div class="row register-row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-register-page">
      <div class="image-register-form">
        <img src="<?= IMGURL; ?>/register-pic.svg" alt="">
      </div>

      <div class="register-content">
        <div class="img-form mb-3">
          <a href="<?= BASEURL; ?>"><img src="<?= IMGURL; ?>/logo-light.svg" alt=""></a>
        </div>

        <div class="form">
          <form action="<?=BASEURL;?>/register/insert" method="post" class="register-form">
            <div class="mb-2 fullname">
              <label for="inputFullname" class="form-label">Full Name</label>
              <input type="text" class="form-text" id="inputFullname" placeholder="Enter Full Name" name="name" required>
            </div>
            <div class="mb-2 username">
              <label for="inputFullname" class="form-label">Username</label>
              <input type="text" class="form-text" id="inputUsername" placeholder="Enter Username" name="username" required>
            </div>
            <div class="mb-2 email">
              <label for="inputEmail" class="form-label">Email</label>
              <input type="email" class="form-text" id="inputEmail" placeholder="Enter Email" name="email" required>
            </div>
            <div class="mb-2 notelp">
              <label for="inputNotelp" class="form-label">Phone Number</label>
              <input type="tel" class="form-text" id="inputNotelp" placeholder="Enter Phone Number" name="phone" minlength="11" required>
            </div>
            <div class="mb-2 password">
              <label for="inputPassword" class="form-label">Password</label>
              <input type="password" class="form-text" id="inputPassword" placeholder="Enter password" name="password" required>
            </div>
            <div class="mb-2 password">
              <label for="inputPasswordRepeat" class="form-label">Confirm Password</label>
              <input type="password" class="form-text" id="inputPasswordRepeat" placeholder="Reenter password to confirm" name="password_repeat" required>
            </div>
            <div class="mb-5 form-group">
              <?php Flasher::flash(); ?>
            </div>
            <div class="register-button">
                <button type="submit" id="tombolRegister" name="register_customer" class="btn btn-primary btn-register">Register</button>
            </div>
          </form>

          <p class="text-center p-or">-OR-</p>

          <div>
            <a class="btn btn-outline-dark btn-login" href="<?= BASEURL; ?>/google_auth" role="button" style="text-transform:none; background-color: white; width: 100%">
              <img width="20px" style="width: 20px !important; margin-bottom:3px; margin-right:5px;" alt="Google sign-in" src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/53/Google_%22G%22_Logo.svg/512px-Google_%22G%22_Logo.svg.png" />
              Login with Google
            </a>
          </div>
        </div>

      <div class="text-signup">
        <p>Already have an account? Please, 
          <span class="signup-text">
            <a href="<?= BASEURL; ?>/login">Log In here</a>.
          </span>
        </p>
      </div>
      
      </div>
    </div>
  </div>
</section>
