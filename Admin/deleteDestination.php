<?php
    include_once '../dbconfig/connection.php';
    $sql = "DELETE FROM destination WHERE id = :id";
    $id = $_GET['id'];
    if(!$id){
        header('Location: destinations.php?active=destination');
        exit;
    }
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':id'=>$id]);
    header('Location: destinations.php?active=destination');
?>