<?php
// session_start();
// $id = $_GET['id'] ?? '';
// $_SESSION['from'] = 'http://localhost/Tour-and-Travel-Full-Stack-Website/user/MyCar.php?active=MyCar';
// header("Location: http://localhost/Tour-and-Travel-Full-Stack-Website/transport/reserve.php?id=$id");
// exit;
include_once '../../dbconfig/connection.php';
include_once '../../Admin/validation/test_input.php';
include_once '../../transport/partials/varConfig.php';
include_once 'carDataToBeEdited.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    #fetching places to visit from places_to_visit DB
    $stmt = $pdo->prepare("SELECT title FROM places_to_visit");
    $stmt->execute();
    $places_to_visit = $stmt->fetchAll();

    var_dump($places_to_visit);

    include_once '../../transport/partials/fome_data.php';
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

    include_once '../../transport/partials/validation_calc.php';

    echo '<br/>' . $name . '<br/>' . $place . '<br/>' . $tele . '<br/>' . $email . '<br/>' . $carName . '<br/>' . $pricePerH . '<br/>' . $price . '<br/>' . $cardNum . '<br/>' . date('Y-m-d H:i:s', $stDate) . '<br/>' . date('Y-m-d H:i:s', $enDate) . '<br/>';

    if (!$errors) {
        echo "it is erro free";
        $id = $_GET['id'];
        try {
            $stmt = $pdo->prepare("UPDATE reserved_cars SET traveller_name = :traveller, place =:place, phone =  :tele, email = :email, start_date = :start_date, end_date =:end_date, car_model = :car_name, price = :price_per_hour, total_price =:price , card_num = :credit_card_num WHERE id = $id");
            $stmt->execute([
                ':traveller' => $name,
                ':place' => $place,
                ':tele' => $tele,
                ':email' => $email,
                ':start_date' => date('Y-m-d H:i:s', $stDate),
                ':end_date' => date('Y-m-d H:i:s', $enDate),
                ':car_name' => $carName,
                ':price_per_hour' => $pricePerH,
                ':price' => $price,
                ':credit_card_num' => $cardNum
            ]);
            header("Location: ../MyCar.php?active=MyCar");
        } catch (PDOException $e) {
            echo "PDO exception occurred " . $e->getMessage();
        }
    }
}
include_once '../../transport/partials/body.php';
