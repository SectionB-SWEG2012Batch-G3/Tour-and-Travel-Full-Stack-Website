<?php
include_once '../dbconfig/connection.php';
include_once '../Admin/validation/test_input.php';
include_once '../transport/partials/varConfig.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    #fetching places to visit from places_to_visit DB
    $stmt = $pdo->prepare("SELECT title FROM places_to_visit");
    $stmt->execute();
    $places_to_visit = $stmt->fetchAll();

    var_dump($places_to_visit);

    include_once '../transport/partials/fome_data.php';
    #validating carname
    filter_var($carName, FILTER_SANITIZE_SPECIAL_CHARS);
    if (empty($carName)) {
        $carNameErr[] = 'Please select car model name';
        $errors = true;
    }
    $isExist = false;
    foreach ($cars as $car) {
        if (strtolower($car['modelName']) == strtolower($carName)) {
            $pricePerH = $car['price'];
            $isExist = true;
        }
    }

    if (!$isExist) {
        $carNameErr[] = 'The car model doesn\'t  exist';
        $errors = true;
    }
    if (strlen($carName) > 30) {
        $carNameErr[] = 'The car model name  is too long';
        $errors = true;
    }

    include_once 'partials/validation_calc.php';

    // echo '<br/>' . 'Year ' . date('Y') . '<br/>';
    // echo 'month ' . date('m') . '<br/>';
    // echo 'Day of the month ' . date('d') . '<br/>';
    // echo 'Day of the week ' . date('l') . '<br/>';
    // echo 'hour(24) ' . date('H') . '<br/>';
    // echo 'hour(12) ' . date('ha') . '<br/>';
    // echo 'minute ' . date('i') . '<br/>';
    // echo 'seconds ' . date('s') . '<br/>';
    // echo '<br/>' . $name . '<br/>' . $place . '<br/>' . $tele . '<br/>' . $email . '<br/>' . $carName . '<br/>' . $pricePerH . '<br/>' . $price . '<br/>' . $cardNum . '<br/>' . date('Y-m-d H:i:s', $stDate) . '<br/>' . date('Y-m-d H:i:s', $enDate) . '<br/>';

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
    // var_dump($carNameErr) . '<br/>';
    // echo '<br/>';
    // var_dump($perHourErr) . '<br/>';
    // echo '<br/>';
    // var_dump($stDateErr) . '<br/>';
    // echo '<br/>';
    // var_dump($priceErr) . '<br/>' . var_dump($cardNumErr) . '<br/>';



    if (!$errors) {
        try {
            $stmt = $pdo->prepare("INSERT INTO reserved_cars(traveller_name, place, phone, email, start_date, end_date, car_model, price, total_price, card_num) VALUES (:traveller, :place, :tele, :email, :start_date, :end_date, :guide_name, :price_per_hour ,:price, :credit_card_num)");
            $stmt->execute([
                ':traveller' => $name,
                ':place' => $place,
                ':tele' => $tele,
                ':email' => $email,
                ':start_date' => date('Y-m-d H:i:s', $stDate),
                ':end_date' => date('Y-m-d H:i:s', $enDate),
                ':guide_name' => $carName,
                ':price_per_hour' => $pricePerH,
                ':price' => $price,
                ':credit_card_num' => $cardNum
            ]);
            header("Location: reserve.php?success=true");
        } catch (PDOException $e) {
            echo "PDO exception occurred " . $e->getMessage();
        }
    }
}
include_once '../transport/partials/body.php';
