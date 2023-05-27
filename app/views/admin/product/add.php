<div class="content">
<h2>Add Product</h2>
  <hr>
  <div>
    <?php Flasher::flash(); ?>
  </div>
  <form action="<?= ADMINURL; ?>/product/insert" method="post" enctype="multipart/form-data">
    <div class="form-group mb-3">
      <label class="form-label">Product Name</label>
      <input type="text" class="form-control" name="name" required>
    </div>
    <div class="form-group mb-3">
      <label class="form-label">Product Category</label> <br>
      <select class="form-select" name="id_category" required>
        <option value="">Category</option>
        <?php foreach ($data['category_list'] as $category) :?>
          <option value="<?= $category['id_category']; ?>"><?= $category['name']; ?></option>
        <?php endforeach; ?>
      </select>
	  </div>
    <div class="form-group mb-3">
      <label class="form-label">Price</label>
      <input type="text" class="form-control" name="price" required>
    </div>
    <div class="form-group mb-3">
      <label class="form-label">Stock</label>
      <input type="text" class="form-control" name="stock" required>
    </div>
    <div class="form-group mb-3">
      <label class="form-label">Neto</label>
      <input type="text" class="form-control" name="neto" required>
    </div>
    <div class="form-group mb-3">
      <label class="form-label">Gross Weight (For Delivery) </label>
      <input type="text" class="form-control" name="gross_weight" required>
    </div>
    <div class="form-group mb-3">
      <label class="form-label">Description</label>
      <textarea class="summernote desc form-control" name="description" rows="10" required></textarea> 
    </div>
    <div class="form-group mb-3">
      <label class="form-label">Instruction</label>
      <textarea class="summernote inst form-control" name="instruction" rows="10" required></textarea> 
    </div>
    <div class="form-group mb-3">
      <label class="form-label">Ingredients</label>
      <textarea class="summernote ingr form-control" name="ingredients" rows="10" required></textarea> 
    </div>
    <div class="form-group mb-3">
      <label class="form-label"><h4>Pictures</h4></label>
      <p>Main Picture (For Product List Cover Display)</p>
      <div class="picture-input">
        <input type="file" class="form-control" name="pictures[]" required>			
        <p class="mt-3" >Add Additional Pictures (Max. 6 Pictures)</p>
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
    <button type="submit" class="btn btn-primary-native">Add Product</button>
  </form>
</div>        

<script>
  $(document).ready(function () {
    let count = 0;

    $(".add-input").on("click", function(){
      if (count < 6) {
        $(".picture-input").append(`<input type="file" id="picture-input-${count}" class="form-control mt-3" name="pictures[]">`);
        count++;

        if (count === 6) {
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

        if (count === 0) {
          $("#remove-input").hide();
        } else {
          $("#add-input").show();
        }
      }
 		});

    if (count < 1) {
      $("#remove-input").hide();
    } else if (count > 0) {
      $("#remove-input").show();
    }
  });
  </script>
