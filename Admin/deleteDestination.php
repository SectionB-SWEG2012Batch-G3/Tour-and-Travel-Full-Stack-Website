<?php
    include_once '../dbconfig/connection.php';
    $sql = "DELETE FROM destination WHERE id = :id";
    $id = $_GET['id'];
    if(!$id){
        header('Location: destinations.php?active=destination');
        exit;
    }
    
    $stmt = $pdo->prepare("SELECT * FROM destination WHERE id = :id");
    $stmt->execute([':id'=>$id]);
    $city = $stmt->fetch();
    $filePath = $city['image'];
    echo '<br>'.$filePath.'<br/>';
    echo '<br>'.dirname($filePath).'<br/>';
    unlink($filePath);
    rmdir(dirname($filePath));

    $stmt = $pdo->prepare("SELECT * FROM places_to_visit WHERE regionName = :region_name");
    $stmt->execute([':region_name'=>$city['RegionName']]);
    $places = $stmt->fetchAll();

    foreach($places as $i => $place){
        $stmt = $pdo->prepare("SELECT path FROM image WHERE imageFor = :id OR description = :desc");
        $stmt->execute([':id' => $place['id'],':desc' => $place['title']]);
        $images = $stmt->fetchAll();
        
        foreach($images as $i => $image){
            '<br>'.var_dump($image['path']).'<br/>';
            echo '<br>'.$image['path'].'<br/>';
            echo '<br>'.unlink($image['path']).'<br/>';
            echo '<br>'.dirname($image['path']).'<br/>';
            rmdir(dirname($image['path']));
        }
        echo '<br>'.$place['id'].'<br/>';
        $stmt = $pdo->prepare("DELETE FROM image WHERE imageFor = :id");
        $stmt->execute([':id' => $place['id']]);
    }

    $stmt = $pdo->prepare("DELETE FROM places_to_visit WHERE regionName = :region_name");
    $stmt->execute([':region_name'=>$city['RegionName']]);

    $stmt = $pdo->prepare($sql);
    $stmt->execute([':id'=>$id]);
    header('Location: destinations.php?active=destination');
?>