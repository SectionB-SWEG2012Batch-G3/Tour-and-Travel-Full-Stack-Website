<?php
include_once '../dbconfig/connection.php';

$id = '';
$title = '';
if (isset($_GET['title'])) {
    $title = $_GET['title'];
}
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
$stmt = $pdo->prepare("SELECT * FROM image WHERE id = :id");
$stmt->execute([':id' => $id]);
$image = $stmt->fetch();
$imageFor = $image['imageFor'];

$filpath = $image['path'];
unlink($filpath);
rmdir(dirname($filpath));

$stmt = $pdo->prepare("DELETE FROM image WHERE id = :id");
$stmt->execute([':id' => $id]);
header("Location: manageHotelImages.php?active=hotel&id=$imageFor&name=$title");
