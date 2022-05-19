<?php
try {
    include_once '../dbconfig/connection.php';
    echo 'DB connected successfully';
} catch (PDOException $e) {
    echo 'connection exception ' . $e->getMessage();
}
include_once 'validation/test_input.php';
include_once 'validation/randomFileCreate.php';
$id = '';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}

$stmt = $pdo->prepare("SELECT * FROM destination WHERE id = :id");
$stmt->execute([':id' => $id]);
$region = $stmt->fetch();

$regionName = $region['RegionName'] ?? '';
$oldregionName = $regionName;
$desc = $region['description'] ?? '';
$link = $region['wikiLink'] ?? '';
$image = '';
$vid = $region['video'] ?? '';
$errors = [];
$imagePath = $region['image'] ?? '';
