<?php
include_once 'includes/header.php';
include_once '../dbconfig/connection.php';
$res = '';
if (isset($_GET['key'])) {
  if ($_GET['key']  === "category") {
    $search = $_GET['search'];
    $sql = "SELECT * FROM transport WHERE category Like '%$search%' ";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $res = $stmt->fetchAll();
  } elseif ($_GET['key']  === "costmore") {
    $search = $_GET['search'];
    $sql = "SELECT * FROM transport WHERE price > $search ";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $res = $stmt->fetchAll();
  } elseif ($_GET['key']  === "costless") {
    $search = $_GET['search'];
    $sql = "SELECT * FROM transport WHERE price < $search  ";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $res = $stmt->fetchAll();
  } else {
    $search = $_GET['search'];
    $sql = "SELECT * FROM transport WHERE modelName LIKe '%$search%'   ";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $res = $stmt->fetchAll();
  }
} else {
  $sql = 'SELECT * FROM transport';
  $stmt = $pdo->prepare($sql);
  $stmt->execute();
  $res = $stmt->fetchAll();
}
?>

<li>
  <a class="active" href="#">Cars</a>
</li>
</ul>
</div>

<div class="download container">
  <div class="row">
    <?php if ($res) : ?>
      <div class="col export btn btn-secondary">
        Export
        <ul class="hidden">
          <li><a href="exports/exportCars.php">Excel</a></li>
          <!-- <li><a href="includes/export.php?ext=pdf">Pdf</a></li> -->
        </ul>
      </div>
    <?php endif ?>
    <div class="col import btn btn-secondary" data-bs-toggle="modal" data-bs-target="#exampleModal">
      Import
      <ul class="hidden">
        <!-- <li><a href="imports/importCars.php">Excel</a></li> -->
      </ul>
    </div>
  </div>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Import Excel Data</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="POST" id="form-import" action="imports/importCars.php" enctype="multipart/form-data">
        <div class="modal-body">
          <div class="mb-3">
            <input type="file" class="form-control" name='imported' id="imported">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" form="form-import" class="btn mx-3 btn-primary">Submit</button>
        </div>
      </form>
    </div>
  </div>
</div>
<script src="scripts/download1.js"></script>

<script>
  const search_container = document.querySelector("div.form-input");
  const select = document.createElement("select");
  select.innerHTML = "<option>search key</option><option value='car name'>car name</option> <option value = 'category'> category</option><option value = 'costmore' >cost ></option><option value = 'costless' >cost <</option>";
  select.setAttribute("class", "form-select");
  select.setAttribute("name", "key");
  select.setAttribute("style", "width:160px");
  search_container.appendChild(select);
</script>
</div>

<div class="d-grid gap-2">
  <button class="btn btn-primary" type="button">
    <h1 class="head">Cars</h1>
  </button>
  <?php if (!$res) : ?>
    <div class="d-grid gap-2 col-6 mx-auto alert alert-info">
      No such Car
    </div>
  <?php endif ?>
  <?php if ($res) : ?>
    <table class="table table-hover">
      <thead class="table-dark">
        <tr>
          <th scope="col" class="border border-3">#</th>
          <th scope="col" class="border border-3">Brand/Model</th>
          <th scope="col" class="border border-3">Category</th>
          <th scope="col" class="border border-3">Cost/Day</th>
          <th scope="col" class="border border-3">Descrition</th>
          <th scope="col" class="border border-3">Rating</th>
          <th scope="col" class="border border-3">Image</th>
          <th scope="col" class="border border-3">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($res as $i => $car) : ?>
          <?php
          $stmt = $pdo->prepare("SELECT * FROM image WHERE imageFor = :id && description = :desc LIMIT 1");
          $stmt->bindParam(':id', $car['id']);
          $stmt->bindParam(':desc', $car['modelName']);
          $stmt->execute();
          $image = $stmt->fetch();
          ?>
          <tr>
            <td scope="row" class="border-light border-3"><?php echo $i + 1 ?></td>
            <td scope="row" class="border-light border-3"><?php echo $car['modelName'] ?></td>
            <td scope="row" class="border-light border-3"><?php echo $car['category'] ?></td>
            <td scope="row" class="border-light border-3"><?php echo $car['price'] ?></td>
            <td scope="row" class="border-light border-3"><?php echo $car['description'] ?></td>
            <td scope="row" class="border-light border-3"><?php echo $car['rating'] ?></td>
            <td scope="row" class="border-light border-3"> <img src="<?php echo ($image ? $image['path'] :  '') ?>" width="200px" height="130px" alt="<?php echo $image['description'] ?? $car['modelName'] ?>"></td>
            <td scope="row" class="border-light border-3">
              <a href="editCar.php?id=<?php echo $car['id'] ?>" class="btn btn-sm btn-outline-primary m-2">Edit</a>

              <button type="button" class="btn btn-sm btn-outline-danger m-2" data-bs-toggle="modal" data-bs-target="#staticBackdrop<?php echo $i ?>">
                Delete
              </button>

              <div class="modal fade" id="staticBackdrop<?php echo $i ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title alert alert-danger" id="staticBackdropLabel">Delete</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      Are sure to delete <b><?php echo $car['modelName']; ?></b> from Cars List?
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                      <a href="deleteCar.php?id=<?php echo $car['id'] ?>" class="btn btn-sm btn-danger m-2">Yes</a>
                    </div>
                  </div>
                </div>
              </div>
              <a href="manageImages.php?id=<?php echo $car['id'] ?>&name=<?php echo $car['modelName'] ?>&active=cars" class="btn btn-sm btn-outline-primary ">Manage Car Images</a>
            </td>
          </tr>
          <tr>
          <?php endforeach; ?>
      </tbody>
    </table>
  <?php endif ?>

  <div class="d-grid gap-2 col-6 mx-auto">
    <a class="btn btn-primary" href="carform.php">Add</a>
  </div>

  <?php
  include_once 'includes/footer.php';
  ?>