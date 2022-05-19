<?php
try {
    include_once '../dbconfig/connection.php';
} catch (PDOException $e) {
    echo 'connection exception ' . $e->getMessage();
}
include_once 'validation/test_input.php';
include_once 'validation/randomFileCreate.php';

$id = $_GET['pid'] ?? '';

$stmt = $pdo->prepare("SELECT * FROM places_to_visit WHERE id = :id");
$stmt->execute([':id' => $id]);
$place = $stmt->fetch();

$placeName = $place['title'] ?? '';
$oldplaceName = $placeName;
$desc = $place['description'] ?? '';
$mapLink = $place['mapLink'] ?? '';
$errors = [];
