<?php

use Shuchkin\SimpleXLSXGen;

require_once "../../dbconfig/connection.php";
require_once "../../partials/SimpleXLSXGen.php";
require_once "../../partials/SimpleXLSXGen.php";

$data =  [
    ['ID', 'Place Name', 'Location', 'Description']
];

$sql  = "SELECT * FROM places_to_visit";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$places = $stmt->fetchAll();

foreach ($places as $place) {
    $data[] = array($place['id'], $place['title'], $place['regionName'], $place['description']);
}

$xlsx = SimpleXLSXGen::fromArray($data);
$xlsx->downloadAs("Places.xlsx"); // This will download the file to your local system
header("Location: ");
