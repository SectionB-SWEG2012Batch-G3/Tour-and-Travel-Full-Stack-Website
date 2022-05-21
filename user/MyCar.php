<?php
session_start();
include_once 'includes/header.php';
include_once '../dbconfig/connection.php';
require_once '../partials/require_login.php';
require_once '../partials/require_previlage_of.php';
require_once '../partials/current_user.php';
$role = require_loggedin();
require_previlage_of($role, 'user');


$stmt = $pdo->prepare("SELECT * FROM reserved_cars WHERE email = :email ORDER BY start_date ");
$username = current_user();
$stmt->bindParam(':email', $username);
$stmt->execute();
$schedules = $stmt->fetchAll();

?>
<li>
    <a class="active" href="#">MyTourguides</a>
</li>
</ul>
</div>
</div>
<div class="d-grid gap-2 d-md-flex justify-content-md-end">
    <a class="btn btn-primary mb-5 me-md-2" href="../homepage">Go to homepage</a>
</div>
<?php if (!empty($schedules)) : ?>
    <table class="table">
        <tdead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">My Name</th>
                <th scope="col">Start Date</th>
                <th scope="col">End Date</th>
                <th scope="col">Car Model</th>
                <th scope="col">Mobile Num.</th>
                <th scope="col">Email</th>
                <th scope="col">Destination</th>
                <th scope="col">Price/Day</th>
                <th scope="col">Total price</th>
                <th scope="col">Action</th>
            </tr>
        </tdead>
        <tbody>
            <?php foreach ($schedules as $i => $schedule) : ?>
                <tr>
                    <td scope="row"><?php echo $i + 1 ?></td>
                    <td scope="row"><?php echo $schedule['traveller_name'] ?></td>
                    <td scope="row"><?php echo $schedule['start_date'] ?></td>
                    <td scope="row"><?php echo $schedule['end_date'] ?></td>
                    <td scope="row"><?php echo $schedule['car_model'] ?></td>
                    <td scope="row"><?php echo $schedule['phone'] ?></td>
                    <td scope="row"><?php echo $schedule['email'] ?></td>
                    <td scope="row"><?php echo $schedule['place'] ?></td>
                    <td scope="row"><?php echo $schedule['price'] ?> Birr</td>
                    <td scope="row"><?php echo $schedule['total_price'] ?> Birr</td>
                    <td scope="row">
                        <a class="btn btn-sm btn-primary me-md-2" href="users/editMyCar.php?id=<?php echo $schedule['id'] ?>">Click to Change</a>
                    </td>


                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php endif ?>

<?php if (empty($schedules)) : ?>
    <div class="alert alert-primary" role="alert">
        There is no reserved car Schedule
    </div>
    <a href="../transport/reserve.php" class="btn btn-success mt-5 col-2">Reserve car</a>
<?php endif ?>




<?php include_once 'includes/footer.php';  ?>