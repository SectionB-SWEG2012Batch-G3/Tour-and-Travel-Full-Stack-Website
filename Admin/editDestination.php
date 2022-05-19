<?php
include_once 'destPartials/dbOperations.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $regionName = $_POST['name'] ?? $regionName;
    $desc = $_POST['desc'] ?? $desc;
    $link = $_POST['wiki'] ?? $link;
    $image = $_FILES['image'] ?? '';
    $vid = $_POST['vid'] ?? $vid;
    $oldPath = $imagePath;
    echo '<br/>' . $regionName . '<br/>' . $desc . '<br/>' . $link . '<br/>' . $imagePath . '<br/>' . $vid . '<br/>';
    if (!empty($image['name'])) {
        $imagePath = 'uploads/images/' . randomString(8) . '/' . $image['name'];
    }
    echo '<br/>' . $regionName . '<br/>' . $desc . '<br/>' . $link . '<br/>' . $imagePath . '<br/>' . $vid . '<br/>';

    if (empty($errors)) {

        $stmt = $pdo->prepare("UPDATE image SET description = :newDesc WHERE imageFor = :id && description = :desc");
        $stmt->bindParam(':newDesc', $regionName);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':desc', $oldregionName);
        $stmt->execute();

        echo '<br/> old nmae ' . $regionName . '<br/>';
        echo '<br/> old nmae ' . $oldregionName . '<br/>';
        echo '<br/> old nmae ' . $id . '<br/>';

        $stmt = $pdo->prepare("UPDATE places_to_visit SET regionName = :newName WHERE region_id = :id && regionName = :rName");
        $stmt->bindParam(':newName', $regionName);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':rName', $oldregionName);
        $stmt->execute();

        $sql = "UPDATE destination SET RegionName = :name, description = :desc, image = :imgPath, wikiLink = :link,video = :vid WHERE id = :id";
        if (!is_dir('uploads/images/')) {
            mkdir('uploads/images/');
        }
        if (!empty($image['name'])) {
            echo '<br/> old path ' . $oldPath . '<br/>';
            unlink($oldPath);
            rmdir(dirname($oldPath));
            $isCreated =  mkdir(dirname($imagePath));
            // mkdir(dirname('uploads/images/'.randomString(8).'/'.$image['name']));
            echo '<br/>' . $isCreated . '<br/>';
            move_uploaded_file($image['tmp_name'], $imagePath);
        }

        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':name', $regionName);
        $stmt->bindParam(':desc', $desc);
        $stmt->bindParam(':imgPath', $imagePath);
        $stmt->bindParam(':link', $link);
        $stmt->bindParam(':vid', $vid);
        $stmt->bindParam(':id', $id);

        $stmt->execute();
        // header('Location: destinations.php?active=destination');
    }
}
include_once 'destPartials/form.php';
