<?php

use Shuchkin\SimpleXLSXGen;

require_once "../../dbconfig/connection.php";
require_once "../../partials/SimpleXLSXGen.php";
require_once "../../partials/SimpleXLSXGen.php";

$data =  [
    ['ID', 'Hotel Name', 'Minimum price', 'Maximum Price', 'Location', 'Rating', 'Web Link']
];

$sql  = "SELECT * FROM hotel";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$hotels = $stmt->fetchAll();

foreach ($hotels as $hotel) {
    $data[] = array($hotel['id'], $hotel['hotel_name'], $hotel['min_price'], $hotel['max_price'], $hotel['region_name'], $hotel['rating'], $hotel['link']);
}

$xlsx = SimpleXLSXGen::fromArray($data);
$xlsx->downloadAs("Hotels.xlsx"); // This will download the file to your local system
header("Location: ");
