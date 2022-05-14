<?php
    include_once '../dbconfig/connection.php';
    $sql = "DELETE FROM hotel WHERE id = :id";
    $id = $_GET['id'];
    if(!$id){
        header('Location: hotel.php?active=hotel');
        exit;
    }
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':id'=>$id]);
    header('Location: hotels.php?active=hotel');
?>