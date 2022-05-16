<?php
    include_once '../dbconfig/connection.php';
    $sql = "DELETE FROM tourguide WHERE id = :id";
    $id = $_GET['id'];
    if(!$id){
        header('Location: tourguides.php?active=tourguide');
        exit;
    }

    $stmt = $pdo->prepare("SELECT * FROM tourguide WHERE id = :id");
    $stmt->execute([':id'=>$id]);
    $tourguide = $stmt->fetch();
    $filpath = $tourguide['image'];
    unlink($filpath);
    rmdir(dirname($filpath));
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':id'=>$id]);
    header('Location: tourguides.php?active=tourguide');
