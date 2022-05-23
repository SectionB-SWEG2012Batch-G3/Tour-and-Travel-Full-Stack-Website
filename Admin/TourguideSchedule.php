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
    <table class="table">
        <tdead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Start Date</th>
                <th scope="col">End Date</th>
                <th scope="col">Traveller Name</th>
                <th scope="col">Mobile Num.</th>
                <th scope="col">Email</th>
                <th scope="col">Destination</th>
                <th scope="col">Guide Name</th>
            </tr>
        </tdead>
        <tbody>
            <?php foreach ($schedules as $i => $schedule) : ?>
                <tr>
                    <td scope="row"><?php echo $i + 1 ?></td>
                    <td scope="row"><?php echo $schedule['start_date'] ?></td>
                    <td scope="row"><?php echo $schedule['end_date'] ?></td>
                    <td scope="row"><?php echo $schedule['traveller'] ?></td>
                    <td scope="row"><?php echo $schedule['tele'] ?></td>
                    <td scope="row"><?php echo $schedule['email'] ?></td>
                    <td scope="row"><?php echo $schedule['place'] ?></td>
                    <td scope="row"><?php echo $schedule['guide_name'] ?></td>
                    <td scope="row">

                    </td>
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