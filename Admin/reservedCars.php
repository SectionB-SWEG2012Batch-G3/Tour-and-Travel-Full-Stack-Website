<?php
include_once 'includes/header.php';
include_once '../dbconfig/connection.php';
$schedules = '';

if (isset($_GET['key'])) {
    if ($_GET['key']  === "traveller") {
        $search = $_GET['search'];
        $sql = "SELECT * FROM reserved_cars WHERE traveller_name  LIKE '%$search%' ";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $schedules = $stmt->fetchAll();
    } elseif ($_GET['key']  === "dest") {
        $search = $_GET['search'];
        $sql = "SELECT * FROM reserved_cars WHERE place LIKE '%$search%' ";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $schedules = $stmt->fetchAll();
    } else if ($_GET['key']  === "car name") {
        $search = $_GET['search'];
        $sql = "SELECT * FROM reserved_cars WHERE car_model LIKE '%$search%' ";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $schedules = $stmt->fetchAll();
    }
} else {
    $stmt = $pdo->prepare("SELECT * FROM reserved_cars ORDER BY start_date");
    $stmt->execute();
    $schedules = $stmt->fetchAll();
}

?>
<li>
    <a class="active" href="#">Reserved Cars</a>
</li>
</ul>
</div>
<?php if ($schedules) : ?>
    <div class="m-5 download">
        <button class="btn btn-secondary">Export</button>
        <ul class="hidden">
            <li><a href="includes/export.php?ext=xlsx">Excel</a></li>
            <li><a href="includes/export.php?ext=pdf">Pdf</a></li>
        </ul>
    </div>
    <script src="scripts/download.js"></script>
<?php endif ?>
</div>
<script>
    const search_container = document.querySelector("div.form-input");
    const select = document.createElement("select");
    select.innerHTML = "<option>search key</option><option value='car name'>car name</option> <option value = 'dest'> Destination</option><option value = 'traveller' >traveller</option>";
    select.setAttribute("class", "form-select");
    select.setAttribute("name", "key");
    select.setAttribute("style", "width:160px");
    search_container.appendChild(select);
</script>

<table class="table table-bordered table-hover">
    <thead class="table-dark">
        <tr>
            <th scope="col" class="border border-3">#</th>
            <th scope="col" class="border border-3">Start Date</th>
            <th scope="col" class="border border-3">End Date</th>
            <th scope="col" class="border border-3">Traveller Name</th>
            <th scope="col" class="border border-3">Mobile Num.</th>
            <th scope="col" class="border border-3">Email</th>
            <th scope="col" class="border border-3">Destination</th>
            <th scope="col" class="border border-3">Car model</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($schedules as $i => $schedule) : ?>
            <tr>
                <td scope="row" class="border-light border-3"><?php echo $i + 1 ?></td>
                <td scope="row" class="border-light border-3"><?php echo $schedule['start_date'] ?></td>
                <td scope="row" class="border-light border-3"><?php echo $schedule['end_date'] ?></td>
                <td scope="row" class="border-light border-3"><?php echo $schedule['traveller_name'] ?></td>
                <td scope="row" class="border-light border-3"><?php echo $schedule['phone'] ?></td>
                <td scope="row" class="border-light border-3"><?php echo $schedule['email'] ?></td>
                <td scope="row" class="border-light border-3"><?php echo $schedule['place'] ?></td>
                <td scope="row" class="border-light border-3"><?php echo $schedule['car_model'] ?></td>
                <td scope="row" class="border-light border-3">

                </td>
            </tr>
            <tr>
            <?php endforeach; ?>

            <?php
            include_once 'includes/footer.php';
            ?>