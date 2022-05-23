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
            <th scope="col">Car model</th>
        </tr>
    </tdead>
    <tbody>
        <?php foreach ($schedules as $i => $schedule) : ?>
            <tr>
                <td scope="row"><?php echo $i + 1 ?></td>
                <td scope="row"><?php echo $schedule['start_date'] ?></td>
                <td scope="row"><?php echo $schedule['end_date'] ?></td>
                <td scope="row"><?php echo $schedule['traveller_name'] ?></td>
                <td scope="row"><?php echo $schedule['phone'] ?></td>
                <td scope="row"><?php echo $schedule['email'] ?></td>
                <td scope="row"><?php echo $schedule['place'] ?></td>
                <td scope="row"><?php echo $schedule['car_model'] ?></td>
                <td scope="row">

                </td>
            </tr>
            <tr>
            <?php endforeach; ?>

            <?php
            include_once 'includes/footer.php';
            ?>