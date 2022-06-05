<?php
include_once 'includes/header.php';
include_once '../dbconfig/connection.php';
$hotels = '';
if (isset($_GET['key'])) {
  if ($_GET['key']  === "rating") {
    $search = $_GET['search'];
    $sql = "SELECT * FROM hotel WHERE rating = $search ";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $hotels = $stmt->fetchAll();
  } elseif ($_GET['key']  === "city name") {
    $search = $_GET['search'];
    $sql = "SELECT * FROM hotel WHERE region_name LIKE '%$search%' ";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $hotels = $stmt->fetchAll();
  } else {
    $search = $_GET['search'];
    $sql = "SELECT * FROM hotel WHERE hotel_name  LIKE '%$search%' ";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $hotels = $stmt->fetchAll();
  }
} else {
  $sql = 'SELECT * FROM hotel';
  $stmt = $pdo->prepare($sql);
  $stmt->execute();
  $hotels = $stmt->fetchAll();
}

?>


<li>
  <a class="active" href="#">Hotels</a>
</li>
</ul>
</div>
</div>

<script>
  const search_container = document.querySelector("div.form-input");
  const select = document.createElement("select");
  select.innerHTML = "<option>search key</option><option value='city name'>city name</option> <option value = 'hotel name'> hotel name </option><option value = 'rating' >rating</option>";
  select.setAttribute("class", "form-select");
  select.setAttribute("name", "key");
  select.setAttribute("style", "width:160px");
  search_container.appendChild(select);
</script>

<div class="d-grid gap-2">
  <button class="btn btn-primary" type="button">
    <h1>Hotels</h1>
  </button>
  <li class="<?php if (isset($_GET['active']))  echo ($_GET['active'] === 'index' ? 'active' : '') ?>">
    <?php if (isset($_GET['active'])) echo ($_GET['active'] === 'index' ? 'active' : '') ?>
  </li>
  <?php if (!$hotels) : ?>
    <div class="d-grid gap-2 col-6 mx-auto alert alert-info">
      No such hotel
    </div>
  <?php endif ?>
  <?php if ($hotels) : ?>
    <table class="table">
      <tdead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Region/city</th>
          <th scope="col">Hotel Name</th>
          <th scope="col">Cost range</th>
          <th scope="col">Rating</th>
          <th scope="col">Image</th>
          <th scope="col">Action</th>
        </tr>
      </tdead>
      <tbody>
        <?php foreach ($hotels as $i => $hotel) : ?>
          <tr>
            <td scope="row"><?php echo $i + 1 ?></td>
            <td scope="row"><?php echo $hotel['region_name'] ?></td>
            <td scope="row"><?php echo $hotel['hotel_name'] ?></td>
            <td scope="row"><?php echo '$' . $hotel['min_price'] . ' - $' . $hotel['max_price'] ?></td>
            <td scope="row"><?php echo $hotel['rating'] . ' Star'; ?></td>
            <td scope="row"><img src="<?php echo $hotel['image'] ?>" width="200px" height="130px" alt="<?php echo $hotel['region_name'] ?>"></td>
            <td scope="row">
              <a class="btn btn-sm btn-outline-primary m-2 px-3" href="editHotel.php?id=<?php echo $hotel['id'] ?>&active=hotel">Edit</a>

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
                      Are sure to delete <b><?php echo $hotel['region_name']; ?></b> from hotels?
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                      <a href="deleteHotel.php?id=<?php echo $hotel['id']; ?>" class="btn  btn-danger">Yes</a>
                    </div>
                  </div>
                </div>
              </div>
              <a class="btn btn-sm btn-outline-primary" href="manageImages.php?id=<?php echo $hotel['id'] ?>&active=hotel&name=<?php echo $hotel['hotel_name'] ?>"><?php echo $hotel['hotel_name'] ?>'s Images</a>
            </td>
          </tr>
          <tr>
          <?php endforeach; ?>
      </tbody>
    </table>
  <?php endif  ?>

  <div class="d-grid gap-2 col-6 mx-auto">
    <a class="btn btn-primary" href="addHotel.php?active=hotel">Add</a>
  </div>


  <?php
  include_once 'includes/footer.php';
  ?>