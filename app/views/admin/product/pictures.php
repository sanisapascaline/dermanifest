<div class="content">
  <h2>Manage Product Pictures</h2>
  <hr>
  <div>
    <?php Flasher::flash(); ?>
  </div>
  <table class="table table-bordered table-striped table-hover table-header-on-left">
    <tbody>
      <tr>
        <th>Id</th>
        <td><?= $data['product']['id_product']; ?></td>
      </tr>
      <tr>
        <th>Name</th>
        <td><?= $data['product']['product_name']; ?></td>
      </tr>
    </tbody>
  </table>

  <h3 class="mt-20px">Pictures</h3>
  <div class="row justify-content-start mt-3 align-items-start">
    <div class="d-flex flex-column col-md-2 me-3 border border-2 rounded-3 mb-3 p-2">
      <h4 class="mb-2">Main Picture</h4>
      <img src="<?= IMGURL; ?>/products/<?= $data['product']['main_picture']; ?>">
      <p class="text-break"><?= $data['product']['main_picture']?></p>
    </div>

    <?php 
    $num = 1;
    foreach ($data['product_picture_list'] as $picture) : ?>
      <div class="d-flex flex-column col-md-2 me-3 border border-2 rounded-3 mb-3 p-2">
        <h4 class="mb-2">Additional Picture #<?= $num++; ?></h4>
        <img src="<?= IMGURL; ?>/products/<?= $picture['picture_name']; ?>">
        <p class="text-break"><?= $picture['picture_name']?></p>
        <a class="btn btn-danger mt-1" data-toggle="modal" data-target="#modal-<?= $picture['id_picture']; ?>">
          <span><i class="fa-regular fa-trash-can me-1"></i></span>Delete
        </a>
      </div>

      <!-- DELETE PRODUCT PICTURE MODAL -->
      <div class="modal fade" id="modal-<?= $picture['id_picture']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Delete Product</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              Are sure want to delete <strong> <?= $picture['picture_name']; ?> </strong>?
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary-native" data-dismiss="modal">No, keep Picture</button>
              <a type="button" href="<?= ADMINURL; ?>/product/deletepicture/<?= $picture['id_picture']; ?>" class="btn btn-primary-native">Yes, delete Picture</a>
            </div>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>

  <form action="<?= ADMINURL; ?>/product/insertpictures/<?= $data['product']['id_product']; ?>" method="post" enctype="multipart/form-data">
    <div class="form-group mb-3 mt-4">
      <label class="form-label"><h3>Add More Pictures (Max. 6 Additional Pictures)</h3></label>
      <div class="picture-input mt-2">
        <input type="file" class="form-control first-pic" name="pictures[]" required>			
      </div>
      <div class="pic-btn mt-3">
        <span id="add-input" class="btn btn-primary add-input" style="width: 60px">
          <i class="fa fa-plus"></i>
        </span>
        <span id="remove-input" class="btn btn-danger remove-input" style="width: 60px">
          <i class="fa fa-minus"></i>
        </span>
      </div>
    </div>
    <button type="submit" class="pic-submit btn btn-primary-native">Add Pictures</button>
  </form>
</div>

<script>
$(document).ready(function () {
  let count = 1;
  let total_pic = <?= count($data['product_picture_list']); ?>;
  let remaining_pic = 6 - total_pic;

  if (remaining_pic === 0) {
    $(".picture-input").prepend(`<p class="text-danger">The maximum amount of pictures has been reached. Cannot add any pictures.</p>`);
    $(".first-pic").attr('disabled','disabled');
    $(".pic-submit").attr('disabled','disabled');
    $("#add-input").hide();
    $("#remove-input").hide();
  } else {
    $(".picture-input").prepend(`<p class="text-primary">Remaining pictures can be uploaded: ${remaining_pic}</p>`);
  
    if (count === 1) {
      $("#remove-input").hide();
    } else if (count === remaining_pic) {
      $("#add-input").hide();
    }

    $(".add-input").on("click", function(){
      if (count <= remaining_pic) {
        $(".picture-input").append(`<input type="file" id="picture-input-${count}" class="form-control mt-3" name="pictures[]">`);
        count++;

        if (count === remaining_pic) {
          $("#add-input").hide();
        } else {
          $("#remove-input").show();
        }
      }
    });

    $(".remove-input").on("click", function(){
      if (count > 0) {
        $(`#picture-input-${count-1}`).remove();
        count--;

        if (count === 1) {
          $("#remove-input").hide();
        } else {
          $("#add-input").show();
        }
      }
    });
  }
});
</script>
