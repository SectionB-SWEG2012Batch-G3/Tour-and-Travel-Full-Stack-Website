<?php
#setting time zone
date_default_timezone_set('Africa/Nairobi');

#accepting data from the user 

$name = test_input($_POST['Fname'] ?? '');
$place = test_input($_POST['place'] ?? '');
$tele = test_input($_POST['mobile'] ?? '');
$email = test_input($_POST['E-mail'] ?? '');
$carName = test_input($_POST['guides'] ?? '');
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
