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
$stmt = $pdo->prepare("SELECT * FROM destination WHERE id = :id");
$stmt->bindValue(':id', $id);
$stmt->execute();
$destination = $stmt->fetch();

$sql = "SELECT places_to_visit.id as id, places_to_visit.title,places_to_visit.description,places_to_visit.mapLink, destination.id as did, destination.RegionName, destination.description as region,destination.image,destination.wikiLink,destination.video FROM places_to_visit INNER JOIN destination ON places_to_visit.region_id = destination.id WHERE places_to_visit.regionName = :regionName && region_id = :region_id";
$stmt = $pdo->prepare($sql);
$stmt->execute([':region_id' => $id, ':regionName' => $regName]);
$places = $stmt->fetchAll();

$sql = "SELECT * FROM hotel WHERE region_name = :regname LIMIT 3";
$stmt = $pdo->prepare($sql);
$stmt->execute([':regname' => $regName]);
$hotels = $stmt->fetchAll();
