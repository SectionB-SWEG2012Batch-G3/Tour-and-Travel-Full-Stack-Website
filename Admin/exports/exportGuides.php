<?php

use Shuchkin\SimpleXLSXGen;

require_once "../../dbconfig/connection.php";
require_once "../../partials/SimpleXLSXGen.php";
require_once "../../partials/SimpleXLSXGen.php";

$data =  [
    ['ID', 'First Name', 'Last Name', 'Email', 'Gender', 'Age', 'Qualification', 'Experience', 'Language', 'Service', 'Salary', 'Resume']
];

$sql  = "SELECT * FROM tourguide";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$guides = $stmt->fetchAll();

foreach ($guides as $guide) {
    // array_merge($data, array(array($guide['id'], $guide['name'], $guide['lname'], $guide['email'], $guide['gender'], $guide['age'], $guide['qualification'], $guide['experience'], $guide['lang'], $guide['services'], $guide['salaryPerHour'], $guide['resume'])));
    $data[] = array($guide['id'], $guide['name'], $guide['lname'], $guide['email'], $guide['gender'], $guide['age'], $guide['qualification'], $guide['experience'], $guide['lang'], $guide['services'], $guide['salaryPerHour'], $guide['resume']);
}

$xlsx = SimpleXLSXGen::fromArray($data);
$xlsx->downloadAs("tourguides.xlsx"); // This will download the file to your local system
header("Location: ");
