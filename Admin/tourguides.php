<?php
include_once 'includes/header.php';
include_once '../dbconfig/connection.php';
$res = '';
if (isset($_GET['key'])) {
  if ($_GET['key']  === "age") {
    $search = $_GET['search'];
    $sql = "SELECT * FROM tourguide WHERE age = $search ";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $res = $stmt->fetchAll();
  } else if ($_GET['key']  === "ageless") {
    $search = $_GET['search'];
    $sql = "SELECT * FROM tourguide WHERE age < $search ";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $res = $stmt->fetchAll();
  } else if ($_GET['key']  === "agemore") {
    $search = $_GET['search'];
    $sql = "SELECT * FROM tourguide WHERE age > $search ";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $res = $stmt->fetchAll();
  } elseif ($_GET['key']  === "gender") {
    $search = $_GET['search'];
    $sql = "SELECT * FROM tourguide WHERE gender = '$search' ";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $res = $stmt->fetchAll();
  } elseif ($_GET['key']  === "email") {
    $search = $_GET['search'];
    $sql = "SELECT * FROM tourguide WHERE email LIKE '%$search%'  ";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $res = $stmt->fetchAll();
  } else {
    $search = $_GET['search'];
    $sql = "SELECT * FROM tourguide WHERE name LIKE '%$search%'   ";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $res = $stmt->fetchAll();
  }
} else {
  $sql = 'SELECT * FROM tourguide';
  $stmt = $pdo->prepare($sql);
  $stmt->execute();
  $res = $stmt->fetchAll();
}
?>

<li>
  <a class="active" href="#">Tourguides</a>
</li>
</ul>
</div>
</div>

<script>
  const search_container = document.querySelector("div.form-input");
  const select = document.createElement("select");
  select.innerHTML = "<option>search key</option><option value='name'>Name</option> <option value = 'age'> Age</option><option value = 'gender' >Gender</option><option value = 'email' >Email</option><option value = 'ageless'> Age < </option><option value = 'agemore'> Age > </option>";
  select.setAttribute("class", "form-select");
  select.setAttribute("name", "key");
  select.setAttribute("style", "width:160px");
  search_container.appendChild(select);
</script>

<div class="d-grid gap-2">
  <button class="btn btn-primary" type="button">
    <h1>Tour Guides</h1>
  </button>
  <?php if (!$res) : ?>
    <div class="d-grid gap-2 col-6 mx-auto alert alert-info">
      No such Tourguide
    </div>
  <?php endif ?>
  <?php if ($res) : ?>
    <table class="table">
      <tdead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">F Name</th>
          <th scope="col">L Name</th>
          <th scope="col">Email</th>
          <th scope="col">Age</th>
          <th scope="col">Qualification</th>
          <th scope="col">Experience</th>
          <th scope="col">Lang</th>
          <th scope="col">Salary</th>
          <th scope="col">Action</th>
        </tr>
      </tdead>
      <tbody>
        <?php foreach ($res as $i => $tourguide) : ?>
          <tr>
            <td scope="row"><?php echo $i + 1 ?></td>
            <td scope="row"><?php echo $tourguide['name'] ?></td>
            <td scope="row"></td>
            <td scope="row"><?php echo $tourguide['email'] ?></td>
            <td scope="row"><?php echo $tourguide['age'] ?></td>
            <td scope="row"><?php echo $tourguide['qualification'] ?></td>
            <td scope="row"><?php echo $tourguide['experience'] ?></td>
            <td scope="row"><?php echo $tourguide['lang'] ?></td>
            <td scope="row"><?php echo $tourguide['salaryPerHour'] ?></td>
            <td scope="row">
              <!-- <a href = "deleteTourGuide.php?id=<?php echo $tourguide['id']; ?>" class="btn btn-sm btn-outline-danger">Delete</a> -->
              <button type="button" class="btn  btn-danger" data-bs-toggle="modal" data-bs-target="#staticBackdrop<?php echo $i ?>">
                Delete
              </button>

              <!-- Modal -->
              <div class="modal fade" id="staticBackdrop<?php echo $i ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title alert alert-danger" id="staticBackdropLabel">Delete</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <i class="fa-solid fa-exclamation"></i>
                      Are sure to delete <?php echo $tourguide['name']; ?> from tourguides?
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                      <a href="deleteTourGuide.php?id=<?php echo $tourguide['id']; ?>" class="btn  btn-danger">Yes</a>
                    </div>
                  </div>
                </div>
              </div>
            </td>
          </tr>
          <tr>
          <?php endforeach; ?>
      </tbody>
    </table>
  <?php endif ?>
  <div class="d-grid gap-2 col-6 mx-auto">
    <a class="btn btn-primary" href="addTourGuides.php">Add</a>
  </div>


  <?php
  include_once 'includes/footer.php';
  ?>