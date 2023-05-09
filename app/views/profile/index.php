<section class="account">
  <div class="container">
    <div class="row account-row">
      <div class="col-lg-12 col-md-12 col-sm-12 title-account">                
        <h1>Profile</h1>
      </div>
      <?php if (isset($_SESSION['customer']['picture'])) : ?>
      <div class="col-lg-3 col-md-3 col-sm-12 image-account">
        <img src="<?=$_SESSION['customer']['picture']; ?>" referrerpolicy="no-referrer" class="img-fluid" img-responsive img-thumbnail>
      </div>
      <?php endif; ?>
      <div class="<?= isset($_SESSION['customer']['picture']) ? "col-lg-9 col-md-9 " : "col-lg-12 col-md-12 " ?> col-sm-12 detail-account col-tabdetail">
        <div class="accdetail form">
          <div>
            <?php Flasher::flash(); ?>
          </div>
          <h5>Profile Details</h5>
          <div class="ms-3">
            <div class="mb-2 accname form-group">             
              <label for="accName" class="form-label">Name</label>
              <input type="text" id="accName" class="form-control" name="name" value="<?= $data['customer_profile']['name']; ?>" required readonly>
            </div>
            <div class="mb-2 accusername form-group">
              <label for="accUsername" class="form-label">Userame</label>            
              <input type="text" id="accUsername" class="form-control" name="username" value="<?= $data['customer_profile']['username']; ?>" required readonly>
            </div>
            <div class="mb-2 accemail form-group">
              <label for="accEmail" class="form-label">Email</label>            
              <input type="email" id="accEmail" class="form-control" name="email" value="<?= $data['customer_profile']['email']; ?>" required readonly>
            </div>
            <div class="mb-2 accphone form-group">
              <label for="accPhone" class="form-label">Phone</label>            
              <input type="tel" id="accPhone" class="form-control" name="phone" value="<?= $data['customer_profile']['phone']?>" minlength="11" required readonly>
            </div>
          </div>
          <div class="d-flex flex-row-reverse">
            <button data-bs-toggle="modal" data-bs-target="#profileUpdateModal" class="btn btn-primary-native-regular mt-4">
              <span><i class="fa-regular fa-pen-to-square"></i></span> Update Profile              
            </button>
            <button data-bs-toggle="modal" data-bs-target="#passwordUpdateModal" class="btn btn-secondary-native-regular mt-4 me-2">
             <span><i class="fa-solid fa-key"></i></span> Manage Password              
            </button>
          </div>
        </div>
      </div>  
    </div>
  </div>
</section>

<!-- MODAL: PROFILE UPDATE-->
<div class="modal fade" id="profileUpdateModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalTitle" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="judulModal">Update Profile Data
        </h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="<?= BASEURL?>/profile/updateprofile" method="post" enctype="multipart/form-data">
        <div class="modal-body">
          <input type="hidden" class="form-control" name="id_customer" value="<?= $data['customer_profile']['id_customer']; ?>" required>
          <div class="mb-2 accname form-group">             
            <label for="accName" class="form-label">Name</label>
            <input type="text" id="accName" class="form-control" name="name" value="<?= $data['customer_profile']['name']; ?>" required>
          </div>
          <div class="mb-2 accusername form-group">
            <label for="accUsername" class="form-label">Userame</label>            
            <input type="text" id="accUsername" class="form-control" name="username" value="<?= $data['customer_profile']['username']; ?>" required>
          </div>
          <div class="mb-2 accemail form-group">
            <label for="accEmail" class="form-label">Email</label>            
            <input type="email" id="accEmail" class="form-control" name="email" value="<?= $data['customer_profile']['email']; ?>" required>
          </div>
          <div class="mb-2 accphone form-group">
            <label for="accPhone" class="form-label">Phone</label>            
            <input type="tel" id="accPhone" class="form-control" name="phone" value="<?= $data['customer_profile']['phone']?>" minlength="11" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Update Profile Data</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- MODAL: PASSWORD UPDATE -->
<div class="modal fade" id="passwordUpdateModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalTitle" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="judulModal">
          <?= !empty($data['customer_profile']['password']) ? 'Update Password' : 'Set Password'?>
        </h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="<?= BASEURL?>/profile/updatePassword" method="post" enctype="multipart/form-data">
        <div class="modal-body">
          <input type="hidden" class="form-control" name="id_customer" value="<?= $data['customer_profile']['id_customer']; ?>" required>
          <?php if (!empty($data['customer_profile']['password'])) :?>
          <div class="mb-2 accname form-group">             
            <label for="accName" class="form-label">Enter Old Password</label>
            <input type="password" id="accOldPass" class="form-control" name="old_password" required>
          </div>
          <?php endif;?>
          <div class="mb-2 accusername form-group">
            <label for="accUsername" class="form-label">Enter New Password</label>            
            <input type="password" id="accNewPass" class="form-control" name="new_password" required>
          </div>
          <div class="mb-2 accemail form-group">
            <label for="accEmail" class="form-label">Reenter New Password to Confirm</label>            
            <input type="password" id="accRepeatPass" class="form-control" name="password_repeat" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">
            <?= !empty($data['customer_profile']['password']) ? 'Update Password' : 'Set Password'?>        
          </button>
        </div>
      </form>
    </div>
  </div>
</div>