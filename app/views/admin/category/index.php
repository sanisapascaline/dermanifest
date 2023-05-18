<div class="content">
  <h2>Categories</h2>
  <hr>
  <div>
    <?php Flasher::flash(); ?>
  </div>
  <div>
    <a href="<?= ADMINURL;?>/category/add" class="add_prod_btn btn btn-positive">Add Category</a>
  </div>
  <div class="table-wrapper" style="overflow-x: auto;">
    <table class="table table-bordered table-striped table-hover">
      <thead>
        <tr>
          <th>No.</th>
          <th>Id Category</th>
          <th>Name</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php 
        $num = 1;
        foreach ($data['category_list'] as $category) : 
        ?>
        <tr>
          <td><?= $num; ?></td>
          <td><?= $category['id_category']; ?></td>
          <td><?= htmlspecialchars($category['name']); ?></td>    
          <td>
            <a href="<?= ADMINURL; ?>/category/update/<?= $category['id_category']; ?>" class="btn btn-primary">Update</a>
            <a href="#" class="btn btn-danger">Delete</a>
          </td>
        </tr>
        <?php endforeach;?>
      </tbody>
    </table>
  </div>
</div>
