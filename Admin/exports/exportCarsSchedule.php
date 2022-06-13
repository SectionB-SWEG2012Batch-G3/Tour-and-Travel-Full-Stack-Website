<?php

use Shuchkin\SimpleXLSXGen;

require_once "../../dbconfig/connection.php";
require_once "../../partials/SimpleXLSXGen.php";
require_once "../../partials/SimpleXLSXGen.php";

$data =  [
    ['ID', 'Travelller Full Name', 'Mobile  No.', 'Traveller Email', 'Place', 'Start Date', 'End Date', 'Car Model', 'Total Price', 'Credit Card Number']
];

$sql  = "SELECT * FROM reserved_cars";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$cars = $stmt->fetchAll();

foreach ($cars as $guide) {
    $data[] = array($guide['id'], $guide['traveller_name'], $guide['phone'], $guide['email'], $guide['place'], $guide['start_date'], $guide['end_date'], $guide['car_model'], $guide['total_price'], $guide['card_num']);
}

$xlsx = SimpleXLSXGen::fromArray($data);
$xlsx->downloadAs("reserved cars.xlsx"); // This will download the file to your local system
header("Location: ");
