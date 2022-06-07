<?php
include_once 'includes/header.php';
include_once '../dbconfig/connection.php';
$search = '';
if (isset($_GET['search'])) {
  $search = $_GET['search'];
  $sql = "SELECT * FROM destination WHERE RegionName LIKE '%$search%' ";
  $stmt = $pdo->prepare($sql);
  $stmt->execute();
  $res = $stmt->fetchAll();
} else {
  $sql = 'SELECT * FROM destination';
  $stmt = $pdo->prepare($sql);
  $stmt->execute();
  $res = $stmt->fetchAll();
}

?>

<li>
  <a class="active" href="#">Destinations</a>
</li>
</ul>
</div>
</div>

<div class="d-grid gap-2">
  <button class="btn btn-primary" type="button">
    <h1>Destinations</h1>
  </button>
  <?php if ($res) : ?>
    <div style="overflow-x: auto;">
      <table class="table table-hover table-striped">
        <thead class="table-dark">
          <tr>
            <th scope="col" class="border border-3">#</th>
            <th scope="col" class="border border-3">Region/City Name</th>
            <th scope="col" class="border border-3">Description</th>
            <th scope="col" class="border border-3">Wikipedia Link</th>
            <th scope="col" class="border border-3">Image</th>
            <th scope="col" class="border border-3">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($res as $i => $destination) : ?>
            <tr class="table-light">
              <td scope="row" class="border-light border-3"><?php echo $i + 1 ?></td>
              <td scope="row" class="border-light border-3"><?php echo $destination['RegionName'] ?></td>

              <td scope="row" class="border-light border-3"><?php echo explode('.', $destination['description'])[0] ?></td>
              <td scope="row" class="border-light border-3"><?php echo $destination['wikiLink']; ?></td>
              <td scope="row" class="border-light border-3"><img height="80px" width="130px" src="<?php echo $destination['image'] ?>"></td>
              <td scope="row" class="border-light border-3" rowspan="2" colspan="3">
                <a href="viewDestination.php?id=<?php echo $destination['id'] ?>&active=destination" class="btn btn-sm btn-outline-primary m-2">View</a>
                <!-- <a class="btn btn-sm btn-outline-danger">Delete</a><br/><br/> -->
                <!-- Button trigger modal -->


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
                        Are sure to delete <b><?php echo $destination['RegionName']; ?></b> from destinations?
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                        <a href="deleteDestination.php?id=<?php echo $destination['id']; ?>" class="btn  btn-danger">Yes</a>
                      </div>
                    </div>
                  </div>
                </div>
                <a href="addPlacesToVIsit.php?active=destination&id=<?php echo $destination['id'] ?>" class="btn btn-sm btn-outline-primary m-2">Add Places to Visit</a>
              </td>
            </tr>
            <tr>
            <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  <?php endif ?>
  <div class="d-grid gap-2 col-6 mx-auto">
    <a class="btn btn-primary" href="addDestination.php">Add</a>
  </div>

  <?php
  include_once 'includes/footer.php';
  ?>