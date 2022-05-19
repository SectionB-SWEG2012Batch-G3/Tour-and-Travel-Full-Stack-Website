<?php
include_once '../dbconfig/connection.php';
include_once '../Admin/validation/randomFileCreate.php';
include_once '../Admin/validation/test_input.php';
$id = '';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
$stmt = $pdo->prepare("SELECT * FROM transport WHERE id = :id");
$stmt->execute([':id' => $id]);
$Car = $stmt->fetch();

$carName = $Car['modelName'] ?? '';
$oldcarName = $carName;
$price = $Car['price'] ?? '';
$category = $Car['category'] ?? '';
$desc = $Car['description'] ?? '';
$images = '';
$imagePath = '';


$carNameErr = [];
$priceErr = [];
$categoryErr = [];
$descErr = [];
$imagesErr = [];

$errors = false;
