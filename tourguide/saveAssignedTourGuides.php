<?php
include_once '../dbconfig/connection.php';
include_once 'partials/test_input.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $pdo->prepare("SELECT title FROM places_to_visit");
    $stmt->execute();
    $places_to_visit = $stmt->fetchAll();

    $stmt = $pdo->prepare("SELECT * FROM tourguide");
    $stmt->execute();
    $guides = $stmt->fetchAll();
    #setting time zone
    date_default_timezone_set('Africa/Nairobi');
    $name = test_input($_POST['Fname'] ?? '');
    $place = test_input($_POST['place'] ?? '');
    $tele = test_input($_POST['mobile'] ?? '');
    $email = test_input($_POST['E-mail'] ?? '');
    $guideName = test_input($_POST['guides'] ?? '');
    $stDate = strtotime(test_input($_POST['Date-st'] ?? ''));
    $enDate = strtotime(test_input($_POST['Date-en'] ?? ''));
    $pricePerH = test_input($_POST['perHour'] ?? '');
    $price = test_input($_POST['price'] ?? '');
    $cardNum = test_input($_POST['credit-card'] ?? '');

    #validating name of traveller
    filter_var($name, FILTER_SANITIZE_SPECIAL_CHARS);
    filter_var($name, FILTER_SANITIZE_STRING);
    if (empty($name)) {
        $nameErr[] = 'Name field can\'t be empty';
        $errors = true;
    }
    # validarting place
    filter_var($place, FILTER_SANITIZE_SPECIAL_CHARS);
    filter_var($place, FILTER_SANITIZE_STRING);
    if (!in_array($place, $places_to_visit)) {
        $placeErr[] = 'Place name doesn\'t exist';
        $errors = true;
    }
    if (empty($place)) {
        $placeErr[] = 'Name field can\'t be empty';
        $errors = true;
    }

    if (strlen($place) > 30) {
        $placeErr[] = 'Place name is too long';
        $errors = true;
    }

    # validating phone number
    if (empty($tele)) {
        $teleErr[] = 'Name field can\'t be empty';
        $errors = true;
    }

    if (!preg_match('/^(\+251|0)([\s-]?9\d{1}|(9\d{1}))[\s-]?\d{3}[\s-]?\d{4}$/', $tele)) {
        $teleErr[] = 'phone number doesn\'t match the pattern';
        $errors = true;
    }

    #validating guidename
    filter_var($guideName, FILTER_SANITIZE_SPECIAL_CHARS);
    if (empty($guideName)) {
        $guideNameErr[] = 'Please select tourguide name';
        $errors = true;
    }
    $isExist = false;
    foreach ($guides as $tourguide) {
        if ($tourguide['name'] == $guideName) {
            $pricePerH = $tourguide['salaryPerHour'];
            $isExist = true;
        }
    }

    if (!$isExist) {
        $guideNameErr[] = 'The tour guide is doesn\'t  exist';
        $errors = true;
    }
    if (strlen($guideName) > 30) {
        $guideNameErr[] = 'Tourguide name  is too long';
        $errors = true;
    }

    #validating email
    filter_var($email, FILTER_SANITIZE_EMAIL);
    if (empty($email)) {
        $emailErr[] = 'Email is requied';
        $errors = true;
    }
    if (!filter_var($email)) {
        $emailErr[] = 'Email is not valid';
        $errors = true;
    }
    if (strlen($email) > 30) {
        $emailErr[] = 'Email is too long';
        $errors = true;
    }
    #validating card number
    filter_var($cardNum, FILTER_SANITIZE_NUMBER_INT);
    if (empty($cardNum)) {
        $cardNumErr[] = 'Please inset your creadit card number';
        $errors = true;
    }
    if (!(filter_var($cardNum, FILTER_VALIDATE_INT))) {
        $cardNumErr[] = 'Credit card number must type of number';
    }
    if ($cardNum <= 100000) {
        $cardNumErr[] = 'Credit card number should have at least 6 chars';
        $errors = true;
    }

    #validating the dates
    if ($stDate > $enDate) {
        $stDateErr[] = 'Start date must be earlier than the end date';
        $enDateErr[] = 'End date must be earlier than the end date';
    }
    var_dump($stDate - time()) . '<br/>';
    if ($stDate < time()) {
        $stDateErr[] = 'This time has been passed';
    }

    echo '<br/>' . 'Year ' . date('Y') . '<br/>';
    echo 'month ' . date('m') . '<br/>';
    echo 'Day of the month ' . date('d') . '<br/>';
    echo 'Day of the week ' . date('l') . '<br/>';
    echo 'hour(24) ' . date('H') . '<br/>';
    echo 'hour(12) ' . date('ha') . '<br/>';
    echo 'minute ' . date('i') . '<br/>';
    echo 'seconds ' . date('s') . '<br/>';
    echo '<br/>' . $name . '<br/>' . $place . '<br/>' . $tele . '<br/>' . $email . '<br/>' . $guideName . '<br/>' . $pricePerH . '<br/>' . $price . '<br/>' . $cardNum . '<br/>' . $stDate . '<br/>' . $enDate . '<br/>';

    echo "errors";
    echo '<br/>';
    var_dump($nameErr) . '<br/>';
    var_dump($placeErr) . '<br/>';
    var_dump($teleErr) . '<br/>';
    var_dump($emailErr) . '<br/>';
    var_dump($guideNameErr) . '<br/>';
    var_dump($perHourErr) . '<br/>';
    var_dump($stDateErr) . '<br/>';
    var_dump($priceErr) . '<br/>' . var_dump($cardNumErr) . '<br/>';

    //header('Location: tripForm.php');

    // if (!$errors) {
    //     $stmt = $pdo->prepare("INSERT INTO assigned_tourguide(traveller, place, tele, email, start_date, end_date, guide_name, price, credit_card_num) VALUES (:traveller, :place, :tele, :email, :start_date, :end_date, :guide_name, :price, :credit_card_num)");
    //     $stmt->execute([
    //         ':traveller' => $name,
    //         ':place' => $place,
    //         ':tele' => $tele,
    //         ':email' => $email,
    //         ':start_date' => $stDate,
    //         ':end_date' => $enDate,
    //         ':guide_name' => $guideName,
    //         ':price' => $price,
    //         ':credit_card_num' => $cardNum
    //     ]);
    // }
}
