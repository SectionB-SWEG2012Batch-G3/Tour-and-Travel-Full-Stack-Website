<?php
include_once '../dbconfig/connection.php';
include_once 'partials/test_input.php';
include_once '../partials/is_loggedin.php';
include_once '../partials/current_user.php';
include_once '../partials/find_by_username.php';
include_once 'partials/VarConfig.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include_once 'partials/data_validation.php';
    // echo '<br/>' . 'Year ' . date('Y') . '<br/>';
    // echo 'month ' . date('m') . '<br/>';
    // echo 'Day of the month ' . date('d') . '<br/>';
    // echo 'Day of the week ' . date('l') . '<br/>';
    // echo 'hour(24) ' . date('H') . '<br/>';
    // echo 'hour(12) ' . date('ha') . '<br/>';
    // echo 'minute ' . date('i') . '<br/>';
    // echo 'seconds ' . date('s') . '<br/>';
    // echo '<br/>' . $name . '<br/>' . $place . '<br/>' . $tele . '<br/>' . $email . '<br/>' . $guideName . '<br/>' . $pricePerH . '<br/>' . $price . '<br/>' . $cardNum . '<br/>' . date('Y-m-d H:i:s', $stDate) . '<br/>' . date('Y-m-d H:i:s', $enDate) . '<br/>';

    // echo "errors<br/>";
    // // var_dump($errors);
    // echo '<br/>';
    // var_dump($nameErr);
    // echo '<br/>';
    // var_dump($placeErr) . '<br/>';
    // echo '<br/>';
    // var_dump($teleErr) . '<br/>';
    // echo '<br/>';
    // var_dump($emailErr) . '<br/>';
    // echo '<br/>';
    // var_dump($guideNameErr) . '<br/>';
    // echo '<br/>';
    // var_dump($perHourErr) . '<br/>';
    // echo '<br/>';
    // var_dump($stDateErr) . '<br/>';
    // echo '<br/>';
    // var_dump($priceErr) . '<br/>' . var_dump($cardNumErr) . '<br/>';


    if (!$errors) {
        try {
            $stmt = $pdo->prepare("INSERT INTO assigned_tourguide(traveller, place, tele, email, start_date, end_date, guide_name, price_per_hour, price, credit_card_num) VALUES (:traveller, :place, :tele, :email, :start_date, :end_date, :guide_name, :price_per_hour ,:price, :credit_card_num)");
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
                ':credit_card_num' => $cardNum
            ]);
            header("Location: tripForm.php?success=true");
        } catch (PDOException $e) {
            echo "PDO exception occurred " . $e->getMessage();
        }
    }
}

// include_once 'saveAssignedTourGuides.php';
include_once 'partials/body.php';
