<?php
try {
    include_once '../dbconfig/connection.php';
} catch (PDOException $e) {
    echo 'connection exception ' . $e->getMessage();
}

$id = '';
$regName = '';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
}

if (isset($_GET['name'])) {
    $regName = $_GET['name'];
}
$sql = "SELECT * FROM places_to_visit WHERE id = :id";
$stmt = $pdo->prepare($sql);
$stmt->execute([':id' => $id]);
$place = $stmt->fetch();

$sql = "SELECT * FROM hotel WHERE region_name = :regname LIMIT 3";
$stmt = $pdo->prepare($sql);
$stmt->execute([':regname' => $place['regionName']]);
$hotels = $stmt->fetchAll();

$sql = "SELECT * FROM image WHERE imageFor = :for && description = :desc";
$stmt = $pdo->prepare($sql);
$stmt->execute([':for' => $place['id'], ':desc' => $place['title']]);
$images = $stmt->fetchAll();
