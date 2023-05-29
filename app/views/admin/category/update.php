<div class="content">
  <h2>Update Category</h2>
  <hr>
  <div>
    <?php Flasher::flash(); ?>
  </div>
  <form action="<?= ADMINURL; ?>/category/updatecategory" method="post">
    <div class="form-group mb-3">
      <label class="form-label">Id Category</label>
      <input type="text" class="form-control" value="<?= $data['category']['id_category']; ?>" disabled required>
      <input type="hidden" class="form-control" name="id_category" value="<?= $data['category']['id_category']; ?>" required>
    </div>
    <div class="form-group mb-3">
      <label class="form-label">Category Name</label>
      <input type="text" class="form-control" name="name" value="<?= $data['category']['name']; ?>" required>
    </div>
    <div class="form-group mb-3">
      <label class="form-label">Description</label>
      <input type="text" class="form-control" name="description" value="<?= $data['category']['description']; ?>" required>
    </div>
    <button type="submit" class="btn btn-primary-native">Update Category</button>
  </form>
</div>
