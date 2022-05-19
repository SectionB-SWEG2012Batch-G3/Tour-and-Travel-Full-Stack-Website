<?php
include_once '../dbconfig/connection.php';
$id = $_GET['id'];
if (!$id) {
    header('Location: cars.php?active=car');
    exit;
}

$stmt = $pdo->prepare("SELECT * FROM transport WHERE id = :id");
$stmt->execute([':id' => $id]);
$car = $stmt->fetch();

$stmt = $pdo->prepare("SELECT * FROM image WHERE imageFor = :id && description = :desc");
$stmt->execute([':id' => $id, ':desc' => $car['modelName']]);
$images = $stmt->fetchAll();

foreach ($images as $i => $image) {
    '<br>' . var_dump($image['path']) . '<br/>';
    echo '<br>' . $image['path'] . '<br/>';
    echo '<br>' . unlink($image['path']) . '<br/>';
    echo '<br>' . dirname($image['path']) . '<br/>';
    rmdir(dirname($image['path']));
}

$stmt = $pdo->prepare("DELETE FROM image WHERE imageFor = :id && description = :desc");
$stmt->execute([':id' => $id, ':desc' => $car['modelName']]);

$sql = "DELETE FROM transport WHERE id = :id";
$stmt = $pdo->prepare($sql);
$stmt->execute([':id' => $id]);
header('Location: cars.php?active=car');
