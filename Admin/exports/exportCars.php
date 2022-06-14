<?php

use Shuchkin\SimpleXLSXGen;

require_once "../../dbconfig/connection.php";
require_once "../../partials/SimpleXLSXGen.php";
require_once "../../partials/SimpleXLSXGen.php";

$data =  [
    ['ID', 'Car Model', 'Category', 'Price', 'Description']
];

$sql  = "SELECT * FROM transport";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$cars = $stmt->fetchAll();

foreach ($cars as $car) {
    $data[] = array($car['id'], $car['modelName'], $car['category'], $car['price'], $car['description']);
}

$xlsx = SimpleXLSXGen::fromArray($data);
$xlsx->downloadAs("Cars.xlsx"); // This will download the file to your local system
header("Location: ");
