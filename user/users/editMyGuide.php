<?php
// session_start();
// $id = $_GET['id'] ?? '';
// $_SESSION['from'] = 'http://http://localhost/Tour-and-Travel-Full-Stack-Website/user/index.php?active=MyTourguide';
// header("Location: http://localhost/Tour-and-Travel-Full-Stack-Website/tourguide/tripForm.php?id=$id");
// exit;
include_once '../../dbconfig/connection.php';
include_once '../../Admin/validation/test_input.php';
include_once '../../partials/is_loggedin.php';
include_once '../../partials/current_user.php';
include_once '../../partials/find_by_username.php';
include_once '../../tourguide/partials/VarConfig.php';
include_once 'dataToBeEdited.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include_once '../../tourguide/partials/data_validation.php';
    if (!$errors) {

        echo '<br/>' . $name . '<br/>' . $place . '<br/>' . $tele . '<br/>' . $email . '<br/>' . $guideName . '<br/>' . $pricePerH . '<br/>' . $price . '<br/>' . $cardNum . '<br/>' . date('Y-m-d H:i:s', $stDate) . '<br/>' . date('Y-m-d H:i:s', $enDate) . '<br/>';
        try {
            $stmt = $pdo->prepare("UPDATE assigned_tourguide SET traveller = :traveller, place = :place , tele = :tele, email = :email, start_date = :start_date, end_date = :end_date, guide_name = :guide_name, price_per_hour = :price_per_hour , price = :price, credit_card_num = :credit_card_num WHERE id = :id");
            $id = $_GET['id'];
            $stmt->execute([
                ':traveller' => $name,
                ':place' => $place,
                ':tele' => $tele,
                ':email' => $email,
                ':start_date' => date('Y-m-d H:i:s', $stDate),
                ':end_date' => date('Y-m-d H:i:s', $enDate),
                ':guide_name' => $guideName,
                ':price_per_hour' => $pricePerH,
                ':price' => $price,
                ':credit_card_num' => $cardNum,
                ':id' => $id
            ]);

            header("Location: ../index.php?active=MyTourguide");
        } catch (PDOException $e) {
            echo "PDO exception occurred " . $e->getMessage();
        }
    }
}

// include_once 'saveAssignedTourGuides.php';
include_once '../../tourguide/partials/body.php';
