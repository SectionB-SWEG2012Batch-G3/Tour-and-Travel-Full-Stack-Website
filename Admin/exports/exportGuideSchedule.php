<?php

use Shuchkin\SimpleXLSXGen;

require_once "../../dbconfig/connection.php";
require_once "../../partials/SimpleXLSXGen.php";
require_once "../../partials/SimpleXLSXGen.php";

$data =  [
    ['ID', 'Travelller Full Name', 'Mobile  No.', 'Traveller Email', 'Place', 'Start Date', 'End Date', 'Guide Name', 'Total Price', 'Credit Card Number']
];

$sql  = "SELECT * FROM assigned_tourguide";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$guides = $stmt->fetchAll();

foreach ($guides as $guide) {
    // array_merge($data, array(array($guide['id'], $guide['name'], $guide['lname'], $guide['email'], $guide['gender'], $guide['age'], $guide['qualification'], $guide['experience'], $guide['lang'], $guide['services'], $guide['salaryPerHour'], $guide['resume'])));
    $data[] = array($guide['id'], $guide['traveller'], $guide['tele'], $guide['email'], $guide['place'], $guide['start_date'], $guide['end_date'], $guide['guide_name'], $guide['price'], $guide['credit_card_num']);
}

$xlsx = SimpleXLSXGen::fromArray($data);
$xlsx->downloadAs("tourguides schedules.xlsx"); // This will download the file to your local system
header("Location: ");
