<?php
session_start();
require_once '../partials/require_login.php';
require_once '../partials/current_user.php';
require_once '../partials/require_previlage_of.php';
require_once '../partials/find_by_username.php';
$user_role = require_loggedin();
require_previlage_of($user_role, 'tourguide');

include_once 'includes/header.php';
include_once '../dbconfig/connection.php';

$email = current_user();
$sql = 'SELECT * FROM tourguide WHERE email = :email';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':email', $email);
$stmt->execute();
$res = $stmt->fetch();

$name = $res['name'];
$stmt = $pdo->prepare("SELECT * FROM assigned_tourguide WHERE guide_name = :gname ORDER BY start_date");
$stmt->bindValue(':gname', $name);
$stmt->execute();
$schedules = $stmt->fetchAll();

?><li>
    <a class="active" href="#">MySchedule</a>
</li>
</ul>
</div>
</div>
<article>
    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <a class="btn btn-primary mb-5 me-md-2" href="../homepage">Go to homepage</a>
    </div>
    <?php if ($schedules) : ?>
        <table class="table table-primary">
            <tdead>
                <tr>
                    <th scope="col" class="table-dark">#</th>
                    <th scope="col" class="table-dark">Start Date</th>
                    <th scope="col" class="table-dark">End Date</th>
                    <th scope="col" class="table-dark">Traveller Name</th>
                    <th scope="col" class="table-dark">Mobile Num.</th>
                    <th scope="col" class="table-dark">Email</th>
                    <th scope="col" class="table-dark">Destination</th>
                </tr>
            </tdead>
            <tbody>

                <?php foreach ($schedules as $i => $schedule) : ?>
                    <tr>
                        <td scope="row" class="table-secondary"><?php echo $i + 1 ?></td>
                        <td scope="row" class="table-light"><?php echo $schedule['start_date'] ?></td>
                        <td scope="row" class="table-secondary"><?php echo $schedule['end_date'] ?></td>
                        <td scope="row" class="table-light"><?php echo $schedule['traveller'] ?></td>
                        <td scope="row" class="table-secondary"><?php echo $schedule['tele'] ?></td>
                        <td scope="row" class="table-light"><?php echo $schedule['email'] ?></td>
                        <td scope="row" class="table-secondary"><?php echo $schedule['place'] ?></td>
                    </tr>
                    <tr>
                    <?php endforeach; ?>
                <?php endif ?>
                <?php if (!$schedules) : ?>
                    <div class="alert alert-primary" role="alert">
                        There is no Schedule
                    </div>
                <?php endif ?>
</article>
<?php
include_once 'includes/footer.php';
?>