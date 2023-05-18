<div class="content">
  <h2>Add Category</h2>
  <hr>
  <div>
    <?php Flasher::flash(); ?>
  </div>
  <form action="<?= ADMINURL; ?>/category/insert" method="post">
    <div class="form-group mb-3">
      <label class="form-label">Category Name</label>
      <input type="text" class="form-control" name="name" required>
    </div>
    <button type="submit" class="btn-save btn btn-positive">Add Category</button>
  </form>
</div>
