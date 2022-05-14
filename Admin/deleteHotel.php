<?php
    include_once '../dbconfig/connection.php';
    $sql = "DELETE FROM hotel WHERE id = :id";
    $id = $_GET['id'];
    if(!$id){
        header('Location: hotel.php?active=hotel');
        exit;
    }

    $stmt = $pdo->prepare("SELECT * FROM hotel WHERE id = :id");
    $stmt->execute([':id'=>$id]);
    $hotel = $stmt->fetch();

    $filePath = $hotel['image'];
    echo '<br>'.$filePath.'<br/>';
    echo '<br>'.dirname($filePath).'<br/>';
    unlink($filePath);
    rmdir(dirname($filePath));

    $stmt = $pdo->prepare("SELECT * FROM image WHERE imageFor = :id OR description = :desc");
    $stmt->execute([':id'=> $id, ':desc' => $hotel['hotel_name']]);
    $images = $stmt->fetchAll();

    foreach($images as $i => $image){
        '<br>'.var_dump($image['path']).'<br/>';
        echo '<br>'.$image['path'].'<br/>';
        echo '<br>'.unlink($image['path']).'<br/>';
        echo '<br>'.dirname($image['path']).'<br/>';
        rmdir(dirname($image['path']));
    }

    $stmt = $pdo->prepare("DELETE FROM image WHERE imageFor = :id OR description = :desc");
    $stmt->execute([':id'=> $id, ':desc' => $hotel['hotel_name']]);

    $stmt = $pdo->prepare($sql);
    $stmt->execute([':id'=>$id]);
    header('Location: hotels.php?active=hotel');
?>