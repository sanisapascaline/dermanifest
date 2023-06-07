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
        <?php 
        $num = 1;
        foreach ($data['payment_method_list'] as $pay_method) : ?>
        <tr>
          <td><?= $num++; ?></td>
          <td><?= $pay_method['id_payment_method']; ?></td>
          <td><?= $pay_method['payment_service']; ?></td>    
          <td><?= $pay_method['account_number']; ?></td>    
          <td><?= $pay_method['account_name']; ?></td>    
          <td>
            <a href="<?= ADMINURL; ?>/payment_method/update/<?= $pay_method['id_payment_method']; ?>" class="btn btn-primary">
              <span><i class="fa-regular fa-pen-to-square me-1"></i></span>Update
            </a>
            <a class="btn btn-danger" data-toggle="modal" data-target="#modal-<?= $pay_method['id_payment_method']; ?>">
              <span><i class="fa-regular fa-trash-can me-1"></i></span>Delete
            </a>
          </td>
        </tr>
        
        <!-- MODAL DELETE PAYMENT METHOD -->
        <div class="modal fade" id="modal-<?= $pay_method['id_payment_method']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete Payment Method</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                Are you sure want to delete <strong> <?= $pay_method['payment_service']; ?> - <?= $pay_method['account_name']; ?> </strong>?
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary-native" data-dismiss="modal">Cancel, keep Payment Method</button>
                <a type="button" href="<?= ADMINURL; ?>/payment_method/delete/<?= $pay_method['id_payment_method']; ?>" class="btn btn-primary-native">Yes, delete Payment Method</a>
              </div>
            </div>
          </div>
        </div>
        <?php endforeach;?>
      </tbody>
    </table>
  </div>
</div>
