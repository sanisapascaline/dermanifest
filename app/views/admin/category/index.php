<div class="content">
  <h2>Categories</h2>
  <hr>
  <div>
    <?php Flasher::flash(); ?>
  </div>
  <div>
    <a href="<?= ADMINURL;?>/category/add" class="btn btn-primary-native mb-3">Add Category</a>
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
            <a class="btn btn-danger" data-toggle="modal" data-target="#modal-<?= $category['id_category']; ?>">Delete</a>
          </td>
        </tr>

        <div class="modal fade" id="modal-<?= $category['id_category']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                Are sure want to delete <strong> <?= $category['name']; ?> </strong>?
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary-native" data-dismiss="modal">Cancel, keep Category</button>
                <a type="button" href="<?= ADMINURL; ?>/category/delete/<?= $category['id_category']; ?>" class="btn btn-primary-native">Yes, delete Category</a>
              </div>
            </div>
          </div>
        </div>
        <?php endforeach;?>
      </tbody>
    </table>
  </div>
</div>
