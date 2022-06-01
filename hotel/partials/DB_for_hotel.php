<?php
try {
    include_once '../dbconfig/connection.php';
} catch (PDOException $e) {
    echo 'connection exception ' . $e->getMessage();
}
$id = '';
$hotelName = '';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
}

if (isset($_GET['name'])) {
    $hotelName = $_GET['name'];
}

$stmt = $pdo->prepare("SELECT * FROM hotel WHERE id = :id");
$stmt->bindValue(':id', $id);
$stmt->execute();
$hotel = $stmt->fetch();

$stmt = $pdo->prepare("SELECT * FROM image WHERE imageFor = :id && description = :desc");
$stmt->bindValue(':id', $id);
$stmt->bindValue(':desc', $hotelName);
$stmt->execute();
$images = $stmt->fetchAll();
