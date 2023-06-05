<div class="content">
  <h2>Payment Methods</h2>
  <hr>
  <div>
    <?php Flasher::flash(); ?>
  </div>
  <div>
    <a href="<?= ADMINURL ?>/payment_method/add" class="btn btn-primary-native mb-3">Add Payment Method</a>
  </div>
  <div class="table-wrapper" style="overflow-x: auto;">
    <table class="table table-bordered table-striped table-hover">
      <thead>
        <tr>
          <th>No.</th>
          <th>Id</th>
          <th>Payment Service</th>
          <th>Account Number</th>
          <th>Account Name</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>1.</td>
          <td>Id 1</td>
          <td>Payment Service 1</td>    
          <td>Account Number 1</td>    
          <td>Account Name 1</td>    
          <td>
            <a href="#" class="btn btn-primary">
              <span><i class="fa-regular fa-pen-to-square me-1"></i></span>Update
            </a>
            <a class="btn btn-danger">
              <span><i class="fa-regular fa-trash-can me-1"></i></span>Delete
            </a>
          </td>
        </tr> 
        <tr>
          <td>2.</td>
          <td>Id 2</td>
          <td>Payment Service 2</td>    
          <td>Account Number 2</td>    
          <td>Account Name 2</td>    
          <td>
            <a href="#" class="btn btn-primary">
              <span><i class="fa-regular fa-pen-to-square me-1"></i></span>Update
            </a>
            <a class="btn btn-danger">
              <span><i class="fa-regular fa-trash-can me-1"></i></span>Delete
            </a>
          </td>
        </tr> 
      </tbody>
    </table>
  </div>
</div>
