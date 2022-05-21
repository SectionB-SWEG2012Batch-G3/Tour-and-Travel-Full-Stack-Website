<?php
include_once 'includes/header.php';
include_once '../dbconfig/connection.php';
$stmt = $pdo->prepare("SELECT * FROM assigned_tourguide ORDER BY start_date");
$stmt->execute();
$schedules = $stmt->fetchAll();

?>
<li>
    <a class="active" href="#">Tourguide's Schedule</a>
</li>
</ul>
</div>
</div>
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
                <th scope="col">Action</th>
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