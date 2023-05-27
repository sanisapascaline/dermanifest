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
        <td>dummy</td>
      </tr>
      <tr>
        <th>Name</th>
        <td>dummy</td>
      </tr>
    </tbody>
  </table>

  <h3 class="mt-20px">Pictures</h3>
  <div class="row justify-content-start mt-3">
    <div class="d-flex flex-column col-md-2 me-3">
  		<img src="https://dummyimage.com/200x300/000/fff.png">
      <a href="#" class="btn btn-danger mt-2">
       <span><i class="fa-regular fa-trash-can me-1"></i></span>Delete
      </a>
    </div>
    <div class="d-flex flex-column col-md-2 me-3">
  		<img src="https://dummyimage.com/200x300/000/fff.png">
      <a href="#" class="btn btn-danger mt-2">
       <span><i class="fa-regular fa-trash-can me-1"></i></span>Delete
      </a>
    </div>
    <div class="d-flex flex-column col-md-2 me-3">
  		<img src="https://dummyimage.com/200x300/000/fff.png">
      <a href="#" class="btn btn-danger mt-2">
       <span><i class="fa-regular fa-trash-can me-1"></i></span>Delete
      </a>
    </div>
  </div>

  <form action="">
    <div class="form-group mb-3 mt-4">
      <label class="form-label"><h3>Add More Pictures (Max. 7 Pictures)</h3></label>
      <div class="picture-input mt-2">
        <input type="file" class="form-control" name="pictures[]" required>			
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
    <button type="submit" class="btn btn-primary-native">Add Pictures</button>
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
