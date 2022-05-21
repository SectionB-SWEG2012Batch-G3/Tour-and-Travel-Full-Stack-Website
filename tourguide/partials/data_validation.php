<?php
#fetching places to visit from places_to_visit DB
$stmt = $pdo->prepare("SELECT title FROM places_to_visit");
$stmt->execute();
$places_to_visit = $stmt->fetchAll();

#fetching tourguide's data from tourguide DB
$stmt = $pdo->prepare("SELECT * FROM tourguide");
$stmt->execute();
$guides = $stmt->fetchAll();
#setting time zone
date_default_timezone_set('Africa/Nairobi');

#accepting data from the user form
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

if (empty($name)) {
    $nameErr[] = 'Name field can\'t be empty';
    $errors = true;
}
# validarting place
filter_var($place, FILTER_SANITIZE_SPECIAL_CHARS);

$isexist = false;
foreach ($places_to_visit as $tovisit) {
    if (strtolower($tovisit[0]) == strtolower($place)) {
        $isexist = true;
    }
}

if (!$isexist) {
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
    if (strtolower($tourguide['name']) == strtolower($guideName)) {
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

if ($stDate < time()) {
    $stDateErr[] = 'This time has been passed';
}

if ($enDate < time()) {
    $enDateErr[] = 'This time has been passed';
}

//calculating the total price
if (empty($stDateErr) && empty($enDateErr) && empty($guideNameErr)) {
    $totalDays = date("d", $enDate) - date("d", $stDate);
    // echo '<br/>' . 'days ' . $totalDays . '<br/>';
    $price = $totalDays * $pricePerH;
}
if ($price <= 0) {
    $stDateErr[] = 'invalid date interval,date gap is less than 1 day';
    $enDateErr[] = 'invalid date interval';
    $errors = true;
}
#fetching all tourguides schedules data from asigned_tourguide DB
$stmt = $pdo->prepare("SELECT * FROM assigned_tourguide");
$stmt->execute();
$schedules = $stmt->fetchAll();
$scheduleErr = '';

$startDate = date('Y-m-d H:i:s', $stDate);
$endDate = date('Y-m-d H:i:s', $enDate);

foreach ($schedules as $i => $schedule) {
    if ($guideName == $schedule['guide_name']) {
        if (($startDate >= $schedule['start_date'] && $endDate <= $schedule['end_date']) ||
            ($startDate <= $schedule['start_date'] && $endDate >= $schedule['end_date']) ||
            ($startDate >= $schedule['start_date'] && $startDate <= $schedule['end_date']) ||
            ($endDate <= $schedule['end_date'] && $endDate >= $schedule['start_date'])
        ) {
            $scheduleErr = "$guideName has a schedule between " . $schedule['start_date'] . " and " . $schedule['end_date'] . ", please selece another days.";
            $stDateErr[] = 'Scheduled Date please chenge it';
            $enDateErr[] = 'Scheduled Date please chenge it';
            $errors = true;
        }
    }
}
