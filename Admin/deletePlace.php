<?php
include_once '../dbconfig/connection.php';
$id = $_GET['id'] ?? '';
$sql = "DELETE FROM places_to_visit WHERE id = :id";
echo $id;
$stmt = $pdo->prepare("SELECT * FROM places_to_visit WHERE id = :id");
$stmt->execute([':id' => $id]);
$place = $stmt->fetch();
var_dump($place);
$did = $place['region_id'] ?? '';
// if (!$id) {
//     if (!$did) {
//         header("Location: destination.php?active=destination");
//         exit;
//     }
//     header("Location: viewDestination.php?id=$did&active=destination");
//     exit;
// }

$stmt = $pdo->prepare("SELECT * FROM image WHERE imageFor = :id && description = :desc");
$stmt->execute([':id' => $id, ':desc' => $place['title']]);
$images = $stmt->fetchAll();

foreach ($images as $i => $image) {
    '<br>' . var_dump($image['path']) . '<br/>';
    echo '<br>' . $image['path'] . '<br/>';
    echo '<br>' . unlink($image['path']) . '<br/>';
    echo '<br>' . dirname($image['path']) . '<br/>';
    rmdir(dirname($image['path']));
}

$stmt = $pdo->prepare("DELETE FROM image WHERE imageFor = :id && description = :desc");
$stmt->execute([':id' => $id, ':desc' => $place['title']]);

$stmt = $pdo->prepare($sql);
$stmt->execute([':id' => $id]);
// header("Location: viewDestination.php?id=$did&active=destination");
