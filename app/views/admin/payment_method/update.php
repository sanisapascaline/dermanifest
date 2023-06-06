<div class="content">
  <h2>Update Payment Method</h2>
  <hr>
  <div>
    <?php Flasher::flash(); ?>
  </div>
  <form action="#" method="post">
  <div class="form-group mb-3">
      <label class="form-label">Id Payment Method</label>
      <input type="text" class="form-control" value="<?= $data['payment_method']['id_payment_method']; ?>" disabled required>
      <input type="hidden" class="form-control" name="id_payment_method" value="<?= $data['payment_method']['id_payment_method']; ?>" required>
    </div>
    <div class="form-group mb-3">
      <label class="form-label">Payment Service (Bank/App)</label>
      <input type="text" class="form-control" name="payment_service" value="<?= $data['payment_method']['payment_service']; ?>" required>
    </div>
    <div class="form-group mb-3">
      <label class="form-label">Account Number</label>
      <input type="text" class="form-control" name="account_number" value="<?= $data['payment_method']['account_number']; ?>" required>
    </div>
    <div class="form-group mb-3">
      <label class="form-label">Account Name (On Behalf of)</label>
      <input type="text" class="form-control" name="account_name" value="<?= $data['payment_method']['account_name']; ?>" required>
    </div>
    <button type="submit" class="btn btn-primary-native">Update Payment Method</button>
  </form>
</div>
