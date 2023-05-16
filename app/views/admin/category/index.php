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
        <tr>
          <td>1.</td>
          <td>id</td>
          <td>name</td>    
          <td>
            <a href="#" class="btn btn-primary">Update</a>
            <a href="#" class="btn btn-danger">Delete</a>
          </td>
        </tr>

        <tr>
          <td>2.</td>
          <td>id2</td>
          <td>name2</td>    
          <td>
            <a href="#" class="btn btn-primary">Update</a>
            <a href="#" class="btn btn-danger">Delete</a>
          </td>
        </tr>
      
        <tr>
          <td>3.</td>
          <td>id3</td>
          <td>name3</td>    
          <td>
            <a href="#" class="btn btn-primary">Update</a>
            <a href="#" class="btn btn-danger">Delete</a>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</div>
