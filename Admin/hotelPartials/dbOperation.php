<?php
try {
    include_once '../dbconfig/connection.php';
    echo 'DB connected successfully';
} catch (PDOException $e) {
    echo 'connection exception ' . $e->getMessage();
}
include_once 'validation/test_input.php';
include_once 'validation/randomFileCreate.php';


$stmt = $pdo->prepare("SELECT * FROM hotel WHERE id = :id");
$stmt->execute([':id' => $id]);
$hotel = $stmt->fetch();

$hotelName = $hotel['hotel_name'] ?? '';
$oldhotelName = $hotelName;
$regionName = $hotel['region_name'] ?? '';
$minPrice = $hotel['min_price'] ?? '';
$rating = $hotel['rating'] ?? '';
$image = '';
$maxPrice = $hotel['max_price'] ?? '';
$link = $hotel['link'] ?? '';
$errors = [];
$imagePath = $hotel['image'] ?? '';
