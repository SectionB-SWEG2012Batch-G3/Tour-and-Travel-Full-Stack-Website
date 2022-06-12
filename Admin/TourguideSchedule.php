<?php
include_once 'includes/header.php';
include_once '../dbconfig/connection.php';

$schedules = '';
if (isset($_GET['key'])) {
    if ($_GET['key']  === "traveller") {
        $search = $_GET['search'];
        $sql = "SELECT * FROM assigned_tourguide WHERE traveller LIKE '%$search%' ";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $schedules = $stmt->fetchAll();
    } elseif ($_GET['key']  === "dest") {
        $search = $_GET['search'];
        $sql = "SELECT * FROM assigned_tourguide WHERE place  LIKE '%$search%' ";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $schedules = $stmt->fetchAll();
    } else {
        $search = $_GET['search'];
        $sql = "SELECT * FROM assigned_tourguide WHERE guide_name LIKE '%$search%' ";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $schedules = $stmt->fetchAll();
    }
} else {
    $stmt = $pdo->prepare("SELECT * FROM assigned_tourguide ORDER BY start_date");
    $stmt->execute();
    $schedules = $stmt->fetchAll();
}

?>
<li>
    <a class="active" href="#">Tourguide's Schedule</a>
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
    select.innerHTML = "<option>search key</option><option value='traveller'>Traveller</option> <option value = 'guide'> Guide</option><option value = 'dest' >Destination</option>";
    select.setAttribute("class", "form-select");
    select.setAttribute("name", "key");
    select.setAttribute("style", "width:160px");
    search_container.appendChild(select);
</script>
<?php if ($schedules) : ?>
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
                <th scope="col" class="border border-3">Guide Name</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($schedules as $i => $schedule) : ?>
                <tr>
                    <td scope="row" class="border-light border-3"><?php echo $i + 1 ?></td>
                    <td scope="row" class="border-light border-3"><?php echo $schedule['start_date'] ?></td>
                    <td scope="row" class="border-light border-3"><?php echo $schedule['end_date'] ?></td>
                    <td scope="row" class="border-light border-3"><?php echo $schedule['traveller'] ?></td>
                    <td scope="row" class="border-light border-3"><?php echo $schedule['tele'] ?></td>
                    <td scope="row" class="border-light border-3"><?php echo $schedule['email'] ?></td>
                    <td scope="row" class="border-light border-3"><?php echo $schedule['place'] ?></td>
                    <td scope="row" class="border-light border-3"><?php echo $schedule['guide_name'] ?></td>
                </tr>
                <tr>
                <?php endforeach; ?>
            <?php endif ?>
            <?php if (!$schedules) : ?>
                <?php if (empty($schedules)) : ?>
                    <div class="alert alert-primary" role="alert">
                        There is no Travel Schedule
                    </div>
                <?php endif ?>

            <?php endif ?>
            <?php
            include_once 'includes/footer.php';
            ?>