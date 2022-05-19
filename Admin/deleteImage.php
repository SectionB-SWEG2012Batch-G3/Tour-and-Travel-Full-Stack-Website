<?php
include_once '../dbconfig/connection.php';

$id = '';
$title = '';
$active = '';
if (isset($_GET['title'])) {
    $title = $_GET['title'];
}
if (isset($_GET['active'])) {
    $active = $_GET['active'];
}
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
echo $active;

$stmt = $pdo->prepare("SELECT * FROM image WHERE id = :id");
$stmt->execute([':id' => $id]);
$image = $stmt->fetch();
$imageFor = $image['imageFor'];

$filpath = $image['path'];
unlink($filpath);
rmdir(dirname($filpath));

$stmt = $pdo->prepare("DELETE FROM image WHERE id = :id");
$stmt->execute([':id' => $id]);
header("Location: manageImages.php?id=$imageFor&name=$title&active=$active");
