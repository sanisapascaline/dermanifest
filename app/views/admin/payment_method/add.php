<div class="content">
  <h2>Add Payment Method</h2>
  <hr>
  <div>
    <?php Flasher::flash(); ?>
  </div>
  <form action="<?= ADMINURL; ?>/payment_method/insert" method="post">
    <div class="form-group mb-3">
      <label class="form-label">Payment Service (Bank/App)</label>
      <input type="text" class="form-control" name="payment_service" required>
    </div>
    <div class="form-group mb-3">
      <label class="form-label">Account Number</label>
      <input type="text" class="form-control" name="account_number" required>
    </div>
    <div class="form-group mb-3">
      <label class="form-label">Account Name (On Behalf of)</label>
      <input type="text" class="form-control" name="account_name" required>
    </div>
    <button type="submit" class="btn btn-primary-native">Add Payment Method</button>
  </form>
</div>
