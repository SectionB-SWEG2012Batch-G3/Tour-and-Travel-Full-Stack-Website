<?php
include_once 'includes/header.php';
include_once '../dbconfig/connection.php';

$sql = 'SELECT * FROM transport';
$stmt = $pdo->prepare($sql);
$stmt->execute();
$res = $stmt->fetchAll();
?>

<li>
  <a class="active" href="#">Cars</a>
</li>
</ul>
</div>
</div>

<div class="d-grid gap-2">
  <button class="btn btn-primary" type="button">
    <h1>Cars</h1>
  </button>

  <table class="table">
    <tdead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Brand/Model</th>
        <th scope="col">Category</th>
        <th scope="col">Cost/Day</th>
        <th scope="col">Descrition</th>
        <th scope="col">Rating</th>
        <th scope="col">Image</th>
        <th scope="col">Action</th>
      </tr>
    </tdead>
    <tbody>
      <?php foreach ($res as $i => $car) : ?>
        <tr>
          <td scope="row"><?php echo $i + 1 ?></td>
          <td scope="row"><?php echo $car['modelName'] ?></td>
          <td scope="row"><?php echo $car['category'] ?></td>
          <td scope="row"><?php echo $car['price'] ?></td>
          <td scope="row"><?php echo $car['description'] ?></td>
          <td scope="row"><?php echo $car['rating'] ?></td>
          <td scope="row"><?php  ?></td>
          <td scope="row">
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

  <div class="d-grid gap-2 col-6 mx-auto">
    <a class="btn btn-primary" href="carform.php">Add</a>
  </div>

  <?php
  include_once 'includes/footer.php';
  ?>